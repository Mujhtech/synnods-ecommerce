<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\SendMailService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SendChamp;
use App\Events\NewUserEvent;

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

    
}
