<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Models\ErrorLog;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $e, $request) {

            if ($request->is('api/*') || $request->wantsJson() || $request->expectsJson() || $request->isJson()) {
                
                return $this->customApiResponse($e);

            }

        });

    }


    private function customApiResponse($exception)
    {
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }
    
        $response = [];
    
        switch ($statusCode) {
            case 401:
                $response['responseMessage'] = 'Unauthorized';
                break;
            case 403:
                $response['responseMessage'] = 'Forbidden';
                break;
            case 404:
                $response['responseMessage'] = 'Not Found';
                break;
            case 405:
                $response['responseMessage'] = 'Method Not Allowed';
                break;
            case 422:
                $response['responseMessage'] = $exception->original['message'];
                $response['responseError'] = $exception->original['errors'];
                break;
            default:
                $response['responseMessage'] = $this->logError($statusCode, $exception);
                break;
        }
    
    
        $response['responseCode'] = $statusCode;
    
        return response()->json(['status' => $response['responseCode'], 'message' => $response['responseMessage']], $statusCode);
    }

    private function logError($code, $exception){

        if($code == 500){

            $log = new ErrorLog;
            $log->traces = json_encode($exception->getTrace());
            $log->line = $exception->getLine();
            $log->file = $exception->getFile();
            $log->code = $code;
            $log->save();

            //return $exception->getTrace();

            return $exception->getMessage().', File: '.$exception->getFile().', Line: '.$exception->getLine();

        } else {

            $log = new ErrorLog;
            $log->traces = $exception->getMessage();
            $log->line = $exception->getLine();
            $log->file = $exception->getFile();
            $log->code = $code;
            $log->save();

            return $exception->getMessage().', File: '.$exception->getFile().', Line: '.$exception->getLine();
        }

    }
}
