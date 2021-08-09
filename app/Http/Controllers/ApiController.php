<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    private $statusCode = 200;
    private $statusMessage = 'success';

    public function getStatusCode(){

        // get status code
        return $this->statusCode;

    }

    public function getStatusMessage(){

        // get status message
        return $this->statusMessage;

    }

    /**
     * Set status code
     *
     * @param $code int 200, 401, 500, 404
     */

    public function setStatusCode($code){

        // set status code
        $this->statusCode = $code;
        return $this;

    }

    /**
     * Set status message
     *
     * @param $message string 
     */

    public function setStatusMessage($message){

        // set status message
        $this->statusMessage = $message;
        return $this;

    }

    /**
     * return json response
     *
     * @param $data array
     * @param $headers array
     */

    public function respond($data, $headers = []){

        return response()->json([
            'status' => $this->getStatusMessage(),
            'data' => $data
        ], $this->getStatusCode(), $headers);

    }
}
