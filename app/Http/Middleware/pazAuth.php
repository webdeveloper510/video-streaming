<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class pazAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionLogin = Session::get('pazLogin');

        return $sessionLogin ?  $next($request) :   redirect('/paz-Team-Login');
    }
}
