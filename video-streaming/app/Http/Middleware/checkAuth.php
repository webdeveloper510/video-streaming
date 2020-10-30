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
        $session_data =   Session::get('userType');
        //$url = $request;
        if($session_data=='contentUser'){
            return redirect('artists/dashboard');
        }
        else if($session_data=='User'){
           return $next($request);
       }

       else{

      return $request->route()->uri == '/' ?  $next($request) :   redirect('/register');
    
       }
    }
}
