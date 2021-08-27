<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Http\Resources\ErrorLogResource;
use App\Http\Resources\ActivityLogResource;
use App\Http\Resources\RoleResource;
use App\Models\User;
use App\Services\SendMailService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SendChamp;
use App\Events\NewUserEvent;
use App\Models\ActivityLog;
use App\Models\ErrorLog;
use App\Models\Role;
use App\Models\Contact;
use App\Http\Resources\ContactResource;

class AdminController extends ApiController
{
    //
    private $email;

    public function __construct(SendMailService $email)
    {

        $this->email = $email;

    }

    public function users(){

        $users = User::where('role_id', '!=', 4)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => UserResource::collection($users)
        ]);
    }

    public function customers(){

        $users = User::where('role_id', 4)->get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => UserResource::collection($users)
        ]);
    }

    public function user(User $user){

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => UserResource::make($user)
        ]);
    }

    public function updateUser(Request $request){

        $user = User::findOrFail($request->user_id);

        if($request->type == "password"){
            $user->password = $request->password;
        } else {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
        }

        $user->first_name = $request->first_name;

        if($user->save()){

            return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                'data' => UserResource::make($user),
                'message' => 'Data saved successfully'
            ]);

        } else {
            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Error in saving data'
            ]);
        }
    }

    public function errors(){

        $errors = ErrorLog::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ErrorLogResource::collection($errors)
        ]);
    }

    public function activities(){

        $activities = ActivityLog::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ActivityLogResource::collection($activities)
        ]);
    }

    public function roles(){

        $roles = Role::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => RoleResource::collection($roles)
        ]);
    }


    public function contacts(){

        $contact = Contact::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ContactResource::collection($contact)
        ]);
    }


    public function getContact(Contact $contact){

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => ContactResource::make($contact)
        ]);
    }

    
}
