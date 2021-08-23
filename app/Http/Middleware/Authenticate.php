<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if($request->is('api/*') && ! $request->expectsJson()){

            return response()->json([
                'message' => 'You need to login to access this page',
                'status' => 'error'
            ], 200);

        } else if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
