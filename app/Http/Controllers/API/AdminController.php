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

    
}
