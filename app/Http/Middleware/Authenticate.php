<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     *
     * @return string|null
     */
    protected function redirectTo( $request )
    {
        if ( Str::startsWith( $request->route()->uri, 'api' ) && in_array( 'auth:sanctum', $request->route()->middleware() ) ) {
            return response()->json( [ 'error' => 'Unauthenticated.' ], 401 );
        } else if ( ! $request->expectsJson() ) {
            return route( 'login' );
        }
    }
}
