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

class AuthController extends ApiController
{
    //

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
                'token_scope' => $tokenData->token->scope[0],
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
        $user->phone = $request->phone;
        $user->role_id = 4;
        $user->password = $request->password;

        if ($user->save()){

            $token = Str::random(60);

            DB::table('email_verifiers')->where('email', $user->email)->delete();
            DB::table('email_verifiers')->insert([
                'email' => $user->email,
                'token' => $token,
                'expires_at' => Carbon::now()->addMinutes(60)
            ]);

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'User created successfully'
            ]);

        } else {
            
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Some error occurred, try again'
            ]);

        }

    }

    public function user(Request $request){

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'user' => UserResources::make($request->user())
        ]);

    }

    public function logout(Request $request){

        // Revoke users token
        $request->user()->tokens()->revoke();

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

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'message' => 'An email has been sent with a link to reset the password'
        ]);

    }

    public function reset(ResetReqest $request){

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

        $tokenData = DB::table('email_verifiers')->where('token', $request->get('token'))->first();
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

            if (!password_verify($request->get('password'), $user->password)) {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'The entered password is incorrect'
                ]);

            }

            $user->email_verified_at = Carbon::now();
            $user->verified = 1;
            $user->save();

            DB::table('email_verifiers')->where('email', $user->email)->delete();

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Account verified successfully'
            ]);

        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'The verification token is incorrect or has already been used'
            ]);
        }

    }
}
