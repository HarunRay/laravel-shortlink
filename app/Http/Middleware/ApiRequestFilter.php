<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Support\Exceptions\Auth\AuthenticationRequiredException;

class ApiRequestFilter extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     *
     * @param array $guards
     *
     * @return mixed
     *
     * @throws AuthenticationException
     */
    public function handle( $request, Closure $next, ...$guards )
    {
//        $request->setRequestFormat('Content-Type:', 'application/json');
//        $request->headers->set( 'Accept', 'application/json' );

//        return response()->json( [ 'json' => $request->expectsJson() ] );

//        $response = $next( $request );

//        return response()->json( [ 'data' => $response ] );

//        return $response;

        $this->authenticate( $request, [ 'api', 'sanctum' ] );

        return $next( $request );
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param Request $request
     * @param array $guards
     *
     * @return void
     */
    protected function authenticate( $request, array $guards )
    {
        try {
            parent::authenticate( $request, $guards );
        } catch ( AuthenticationException $e ) {
        } // catch and do nothing
    }
}
