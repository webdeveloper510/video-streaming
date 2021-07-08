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

       

           $redirect_url = $request->route()->uri;
           
           Session::put('redirect_url',$redirect_url); 

          $session_data =   Session::get('userType');
        //$url = $request;
        if($session_data=='contentUser'){
            return redirect('artists/dashboard');
        }
        else if($session_data=='User'){
           return $next($request);
       }

       else{

        //echo "xssssss";die;

      return $request->route()->uri == '/' ?  $next($request) :   redirect('/register');
    
       }
    }
}
