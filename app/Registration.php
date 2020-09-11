<?php

namespace App;
use DB;
use Session;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function registration($data)
    {
        //print_r($data->email); die;
        $value=DB::table('users')->where('email', $data->email)->get(); 
        if($value->count() == 0){
            $userdata=$data->all();
            $userdata['password']= md5($data->password);
            $userdata['created_at']= now();
            $userdata['updated_at']= now();
             DB::table('users')->insert($userdata);
             return 1;
         }
        else{
             return 0; 
    }
}
public function login($data){
    $value = DB::table('users')->where(array(
        'email'=> $data->email,
        'password'=>md5($data->password)))
        ->get()
        ->first();
        //print_r($value);die;
        if(is_null($value)){
            return 0;
        }
        else{
            Session::put('User', $value);
            return 1;
        }
    

        
}

}
