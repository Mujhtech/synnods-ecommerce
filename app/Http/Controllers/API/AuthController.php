<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use App\Http\Requests\VerifyRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\RecoverRequest;
use Str;
use App\Services\SendMailService;
use SendChamp;
use App\Models\EmailVerifier;

class AuthController extends ApiController
{
    //
    private $email;

    public function __construct(SendMailService $email){

        $this->email = $email;

    }

    public function login(LoginRequest $request){

        $request->validated();

        // Authenticate user if user validation is true
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            return $this->setStatusCode(500)->setStatusMessage('error')->respond(['message' => 'Invalid username/password']);

        }

        $user = $request->user();

        $tokenData = $user->createToken('Personal Access Token', ['user']);

        $token = $tokenData->token;

        // if remember me is true add weeks to token expiration
        if ($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks();
        }

        if ($token->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'user' => UserResource::make($user),
                'access_token' => $tokenData->accessToken,
                'token_type' => 'Bearer',
                //'token_scope' => $tokenData->token->scope[0],
                'expires_at' => Carbon::parse($tokenData->token->expired_at)->toDayDateTimeString()
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Some error occurred, try again'
            ]);

        }

    }

    public function register(RegisterRequest $request){

        $request->validated();

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->phone = '234'.substr($request->phone, 1);
        $user->role_id = 4;
        $user->password = $request->password;

        if ($user->save()){

            $token = Str::random(60);

            $email_code = rand(100000,999999);
            $sms_code = rand(100000,999999);

            DB::table('email_verifiers')->where('email', $user->email)->delete();
            DB::table('email_verifiers')->insert([
                'email' => $user->email,
                'token' => $token,
                'sms_code' => $sms_code,
                'email_code' => $email_code,
                'expires_at' => Carbon::now()->addMinutes(60)
            ]);          

            SendChamp::sendSms('You phone verification code is '.$sms_code.' from Synoods Ecommerce', 'Sendchamp', [$user->phone]);

            //$this->email->email_type('verify_account')->verify_account($token, $email_code)->send($request->email);

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'A verification code has been sent to your email address and phone number',
                'token' => $token
            ]);

        } else {
            
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Some error occurred, try again'
            ]);

        }

    }

    public function user(Request $request){

        if($request->user()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'user' => UserResource::make($request->user())
            ]);

        } else {

            return $this->setStatusCode(403)->setStatusMessage('error')->respond([
                'message' => 'Not authorized'
            ]);

        }

    }

    public function logout(Request $request){

        // Revoke users token
        if($request->user()){
            $request->user()->tokens()->revoke();
        }

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'message' => 'Logout successfully'
        ]);

    }

    public function recover(RecoverRequest $request){

        $request->validated();

        $user = User::where('email', $request->email)->first();
        if (!$user) {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Email not found'
            ]);
            
        }

        $token = Str::random(60);

        DB::table('password_resets')->where('email', $request->email)->delete();
        DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]);

        //$this->email->email_type('reset_password')->reset_account($token)->send($request->email);

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'message' => 'An email has been sent with a link to reset the password',
            //'token' => $token
        ]);

    }

    public function reset(ResetRequest $request){

        $request->validated();
        // Get token
        $tokenData = DB::table('password_resets')->where('token', $request->get('token'))->first();
        if ($tokenData) {

            $user = User::where('email', $tokenData->email)->first();

            if (!$user) {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Email not found'
                ]);
            }

            $user->password = $request->password;

            if (is_null($user->email_verified_at)) {
                $user->email_verified_at = Carbon::now();
            }
            $user->save();

            DB::table('password_resets')->where('email', $user->email)->delete();

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Password recover successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'The recovery token is incorrect or has already been used'
            ]);
        }

    }

    public function verify(VerifyRequest $request){

        $request->validated();

        $tokenData = DB::table('email_verifiers')->where('token', $request->token)->first();
        if ($tokenData) {

            if (Carbon::now() > Carbon::create($tokenData->expires_at)) {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Verification code has expired'
                ]);
            }

            $user = User::where('email', $tokenData->email)->first();

            if (!$user) {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Email not found'
                ]);
                
            }

            $code = EmailVerifier::where('token', $request->token)->first();

            if ($request->email_code != $code->email_code) {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'The entered email verification code is incorrect'
                ]);

            }

            if ($request->sms_code != $code->sms_code) {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'The entered sms verification code is incorrect'
                ]);

            }

            $user->email_verified_at = Carbon::now();
            $user->verified = 1;
            $user->save();

            DB::table('email_verifiers')->where('email', $user->email)->delete();

            //$this->email->email_type('welcome_user')->welcome_user($user->fullname)->send($user->email);

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Account verified successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'The verification token is incorrect or has already been used'
            ]);
        }

    }


    public function resend(Request $request){

        $tokenData = DB::table('email_verifiers')->where('token', $request->token)->first();
        if ($tokenData) {

            $user = User::where('email', $tokenData->email)->first();

            if (!$user) {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Email not found'
                ]);
                
            }

            $code = EmailVerifier::where('token', $request->token)->first();
            
            $email_code = rand(100000,999999);
            $sms_code = rand(100000,999999);

            $code->sms_code = $sms_code;
            $code->email_code = $email_code;
            $code->expires_at = Carbon::now()->addMinutes(60)   ;
            $code->save() ;  

            SendChamp::sendSms('You phone verification code is '.$sms_code.' from Synoods Ecommerce', 'Sendchamp', [$user->phone]);

            //$this->email->email_type('verify_account')->verify_account($token, $email_code)->send($user->email);

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'A verification code has been sent to your email address and phone number'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'The verification token is incorrect or has already been used'
            ]);
        }


    }
}
