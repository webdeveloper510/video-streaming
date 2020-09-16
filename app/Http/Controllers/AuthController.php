<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use App\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
//use Validator;


use App\Http\Requests;

class AuthController extends Controller
{

    public function register(){
        
      return view('registration') ;     
    } 

        public function login(){
          $user=Session::get('User');
          print_r($user);
        return view('login') ;     
      } 



    public function profile(){
        $user=Session::get('User');

        return view('profile',['user' => $user]);
    }
      public function getLogin(){
        return view('contentLoginform');
      }


      public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'

        ]
        
        );
        $model = new Registration();
         $get = $model->login($request);
        if($get){
         // echo "yes";die;
          return redirect('/profile')->with('success','Login Successfully!');
        }
        else{
          return redirect('/login')->with('error','invalid credentials!');
        }

      }
      public function contentPostLogin(Request $request){
        $this->validate($request,[
          'email'=>'required',
          'password'=>'required'
      ]
      );
      $model = new Registration();
       $get = $model->Contentlogin($request);
      if($get){
        return redirect('/getLogin')->with('success','Login Successfully!');
      }
      else{
        return redirect('/getLogin')->with('error','invalid credentials!');
      }
      }
   
    public function UserRegistration(Request $request){
        //print_r($_POST); die;
        $this->validate($request,[
          'email'=>'required',
          'nickname'=>'required',
          'password'=>'required',
          'terms'=>'required'
      ]
      
      );
      unset($request['_token']);
    // print_r($request->all()); die;
        $model = new Registration();
       $get = $model->registration($request);
       if($get){
        // echo "yes";die;
         return redirect('/register')->with('success','Registered successfully');
       }
       else{
        return redirect('/register')->with('error','Email Already Exist!');
       }
    }
    public function updateProfile(Request $request){
    
      $image = $request->image;
     // print_r($image);die;
     // print_r($request->all());die;
      $this->validate($request,[
        'profilepicture' => 'required|file',
        'backupemail'=>'required',
        'aboutme'=>'required',
        'sexology'=>'required',
        'titssize'=>'required',
        'privy'=>'required',
        'ass'=>'required',
        'hairlength'=>'required',
        'haircolor'=>'required',
        'height'=>'required',
        'weight'=>'required',        
    ]
      );
    if($request->image){
      //echo "yes";
       $fileName = time().'_'.$request->image->getClientOriginalName();
       $filePath = $request->image->storeAs('uploads', $fileName, 'public');
       //unset($request['image']);
       unset($request['_token']);
       $request['profilepicture']=$fileName;
       if($filePath){
          $model=new Registration();
         $update_data = $model->uploadDataFile($request);
          if($update_data){
            return redirect('/profile')->with('success','Data Updated Successfully!');
          }
          else{
            return redirect('/profile')->with('error','Some Error Occure!');
          }
       }
    }
    }
    public function logout(Request $request){
      Session::forget('User');
      Session::flush();
   return redirect('/login');
    }
    public function contentForm(){
      return view('content');
    }
    public function contentProvider1(Request $request){

      $this->validate($request,[
        'image' => 'required|file',
        'email'=>'required',
        'aboutme'=>'required',
        'sexology'=>'required',
        'nickname'=>'required',
        'password'=>'required',
        'titssize'=>'required',
        'privy'=>'required',
        'ass'=>'required',
        'hairlength'=>'required',
        'haircolor'=>'required',
        'height'=>'required',
        'weight'=>'required',        
    ]
      );
  
      if($request->image){
        //$data=$request->all();
        //echo "yes";
         $fileName = time().'_'.$request->image->getClientOriginalName();
         $filePath = $request->image->storeAs('uploads', $fileName, 'public');
         array_splice($data,'image', 1); 
         unset($request['_token']);
         $request['profilepicture']=$fileName;
         if($filePath){
          //print_r($request->all());die;
            $model=new Registration();
           $update_data = $model->uploadContentData($request);
            if($update_data){
              return redirect('/getContent')->with('success','Data Updated Successfully!');
            }
            else{
              return redirect('/getContent')->with('error','Some Error Occure!');
            }
         }
      }
    }
}
