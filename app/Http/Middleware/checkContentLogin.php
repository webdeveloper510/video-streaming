<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkContentLogin
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

        $route=$request->route()->uri;
        //print_r($next);die;
        $session_data =   Session::get('userType');

        //print_r($session_data);die;
        //$url = $request;
        if($session_data=='User'){

            return redirect('/');
        }

        else if($session_data=='contentUser'){ 
            //return redirect('.$route.');
           return $next($request);
        }

        else{

            return redirect('login');
        }
     }
}
