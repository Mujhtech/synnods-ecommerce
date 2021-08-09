<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\DeliveryAddress;
use Hash;

class UserController extends ApiController
{
    //
    public function store(Request $request){

        $user = $request->user();

        if(!empty($request->password)){

            $request->validate([
                'password' => 'required|string|min:8',
                'old_password' => 'required|string'
            ]);

            if(!Hash::check($request->old_password, $user->password)){

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Invalid old password'
                ]);

            }

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


    public function updateBilling(Request $request){

        $user = $request->user();

        $user->state = $request->state;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;

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

    public function createShipping(Request $request){

        $user = $request->user();
        $shipping = new DeliveryAddress;
        $shipping->address = $request->address;
        $shipping->state = $request->state;
        $shipping->country = $request->country;
        $shipping->postal_code = $request->postal_code;
        $shipping->city = $request->city;
        $shipping->user_id = $user->id;
        $shipping->phone = $request->phone;

        if($shipping->save()) {

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
