<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkAuth
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
        $session_data =   Session::get('User');
        //$url = $request;
        if(!$session_data){
            return redirect('/login');
        }
        return $next($request);
    }
}
