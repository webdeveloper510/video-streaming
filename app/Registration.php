<?php

namespace App;
use DB;
use Session;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function registration($data)
    {
        //print_r($data->all()); die;
        $value=DB::table('users')->where('email', $data['email'])->get();
        //print_r($value->count());die;
        if($value->count() == 0){
            $userdata=$data->all();
            $userdata['password']= md5($data['password']);
            $userdata['created_at']= now();
            $userdata['updated_at']= now();
                $inserted_data =  DB::table('users')->insert($userdata);
                $insertedid=DB::table('users')->insertGetId($userdata);
             //echo $insertedid;die;
            if($inserted_data){
                $session_data =   Session::get('User');
                $userid=$session_data ? $session_data->id : $insertedid;
                // $userid = $session_data->id;
                $data=array(
                    'backupemail' => '',
                    'aboutme' => '',
                    'profilepicture' => '',
                    'gender' => '',
                    'sexology' => '', 
                    'titssize' => '',
                    'privy' => '',
                    'ass' => '',
                    'hairlength' => '',
                    'haircolor' => '',
                    'eyecolor'=>'',
                    'height' => '',
                    'weight' => '',
                    'created_at'=> now(),
                    'updated_at'=> now(),
                    'userid' =>  $userid
                );
                $inserted_data =  DB::table('profiletable')->insert($data);
                // $insertedid=$inserted_data->id;
                return $inserted_data ? '1':'0';
                }
            
         }
        else{
             return 0; 
        }
}
        public function Contentlogin($data){
            $value = DB::table('content')->where(array(
                'email'=> $data->email,
                'password'=>md5($data->password)))
                ->get()
                ->first();
           // print_r($value);die;
                if(is_null($value)){
                    return 0;
                }
                else{
                    Session::put('contentUser', $value);
                // $data->session()->put('User', $value);
                    return 1;
        }
}
public function uploadContentData($userdata){
    $value=DB::table('content')->where('email', $userdata['email'])->get();
    if($value->count() == 0){
        $userdata['catid']=$userdata['category'];
        unset($userdata['category']);
        //print_r($userdata);
        $userdata['password']= md5($userdata['password']);
        $userdata['created_at']= now();
        $userdata['updated_at']= now();
        $inserted_data =  DB::table('content')->insert($userdata);
        return $inserted_data ? '1':'0';
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
            $data->session()->put('User', $value);
           // Session::put('User', $value);
            return 1;
        }
    

        
}
public function uploadDataFile($data){
    $session_data =   Session::get('User');
     $userid=$session_data->id;
    // print_r($data->all());
    // print_r($userid);die;
    $update = DB::table('profiletable')->where('userid',$userid)->update([
        'backupemail' => $data['backupemail'],
        'aboutme' => $data['aboutme'],
        'profilepicture' => $data['profilepicture'],
        'gender' => $data['gender'],
        'sexology' => $data['sexology'],
        'titssize' => $data['titssize'],
        'privy' => $data['privy'],
        'ass' =>$data['ass'],
        'hairlength' => $data['hairlength'],
        'haircolor' => $data['haircolor'],
        'eyecolor' => $data['eyecolor'],
        'height' => $data['height'],
        'weight' => $data['weight'],
        'created_at'=> now(),
        'updated_at'=> now()
    ]);
    return $update ? 1 : 0;
}
public function getContentProvider($type){
    $value=DB::table('provider')->where('type', $type)->get();
    if($value->count()>=1){
        return $value;
    }

}
public function addCategorytable($category){
    $category['created_at']=now();
    $category['updated_at']=now();
    $sucess_insert=DB::table('category')->insert($category);
    return $sucess_insert ? '1' :'0';
}
public function uploadContentProvider($contentdata){
    $session_data =   Session::get('User');
    $userid=$session_data->id;
    unset($contentdata['email']);
    $contentdata['userid']=$userid;
    $contentdata['created_at']= now();
    $contentdata['updated_at']= now();
    $inserted_data =  DB::table('provider')->insert($contentdata);
    return $inserted_data ? '1':'0';
}
public function getCategory(){
    $category = DB::table('category')->get();
    return $category;
}
}
