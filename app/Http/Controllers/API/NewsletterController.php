<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Http\Resources\NewsletterResource;

class NewsletterController extends ApiController
{
    //
    public function index(){

        $newsletter = Newsletter::get();

        return $this->setStatusCode(200)->setStatusMessage('success')->respond([
            'data' => NewsletterResource::collection($newsletter)
        ]);

    }

    public function subscribe(Request $request){

        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {

            if(Newsletter::where('email', $request->email)->exists()){

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'You are already subscribed to our newsletter'
                ]);

            }

            $newsletter = new Newsletter;
            $newsletter->email = $request->email;
            $newsletter->subscribed = 1;

            if($newsletter->save()){

                return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                    'message' => 'Subscribe successfuly'
                ]);

            } else {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Something went wrong'
                ]);

            }

            
        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Invalid email address'
            ]);

        }

    }

    public function unsubscribe(Request $request){


        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {

            if(!Newsletter::where('email', $request->email)->exists()){

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Email not found'
                ]);

            }

            $newsletter = Newsletter::where('email', $request->email)->first();
            $newsletter->subscribed = 0;

            if($newsletter->save()){

                return $this->setStatusCode(200)->setStatusMessage('success')->respond([
                    'message' => 'Unsubscribe successfuly'
                ]);

            } else {

                return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                    'message' => 'Something went wrong'
                ]);

            }

            
        } else {

            return $this->setStatusCode(500)->setStatusMessage('error')->respond([
                'message' => 'Invalid email address'
            ]);

        }



    }
}
