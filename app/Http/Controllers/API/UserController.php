<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends ApiController
{
    //
    public function store(Request $request){

        $user = $request->user();

        if(!empty($request->password)){

            $request->validate([
                'password' => 'required|string|min:8|confirmed'
            ]);

            $user->password = $request->password;

        }
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        
        if($user->save()) {

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'message' => 'Data updated successfully',
                'user' => UserResource::make($user)
            ]);
            
        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Something went wrong'
            ]);

        }



    }
}
