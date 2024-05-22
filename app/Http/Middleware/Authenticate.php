<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)//: ?string
    {
        //return $request->expectsJson() ? null : route('login');

        //logar em duas tabelas

        if (! $request->expectsJson()) {
            if($request->routeIs('atleta.*')) {
                return route('a.login');
            }

            if($request->routeIs('painel-*')) {
                return route('p-login');
            }
        }
    }
}
