<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class AuthController extends ApiController
{
    //

    public function login(LoginRequest $request){


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

    public function logout(Request $request){

        // Revoke users token
        $request->user()->tokens()->revoke();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'message' => 'Logout successfully'
        ]);

    }
}
