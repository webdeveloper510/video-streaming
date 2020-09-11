<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{

    public function register(){
        

      return view('registration') ;     
    } 
    public function login(){
        return view('login') ;     
      } 



public function profile(){
    $user=Session::get('User');
    return view('profile',['user' => $user]);
}



      public function postLogin(Request $request){
        $model = new Registration();
        $get = $model->login($request);
        return $get;

      }
    public function UserRegistration(Request $request){
        //print_r($_POST); die;
        
        $model = new Registration();
       $get = $model->registration($request);
       return $get;
    }
}
