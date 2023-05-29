<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUsers {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle( Request $request, Closure $next ): Response{
        $email = $request->email;
        $password = $request->password;
        if ( 'tufikhasan05@gmail.com' != $email && '12345' != $password ) {
            return response()->json( ['error' => 'You are not an authenticated user'], 401 );
        }
        return $next( $request );
    }
}
