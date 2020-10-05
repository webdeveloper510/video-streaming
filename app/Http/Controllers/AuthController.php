<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use App\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
//use Validator;

class AuthController extends Controller
{

    public function register(){
        
      return view('registration') ;     
    }
    
    public function contact(){
      return view('/contact');
    }
    public function play(){
       $contentLogin =   Session::get('contentUser');
      if(!$contentLogin){
        return redirect('/getLogin');
    }


       $model = new Registration();
       $data = $model->getCategory();
      
      return view('/play',['category'=>$data]);
    }
    public function search(){
       $contentLogin =   Session::get('contentUser');
      if(!$contentLogin){
        return redirect('/getLogin');
    }


        $model = new Registration();
        $category_data = $model->getCategory();

        // get filterData from session
        //$data = Session::get('user')['filterData'];

           $data=Session::get('filterData');
            //print_r($data);die;
           $recentSelected=Session::get('recentSearch');

        unset($data['_token']);
        //$recentSelected = Session::get('user')['recentSearch'];
       //  print_r($data);die;
        //unset($data['_token']);
        $search_data = $model->getVedio($data);
            if($recentSelected){
              //echo "yes";
            $this->recentData($search_data);
          //$search_data = $model->getVedio($data);
        }
         return view('/search',['category'=>$category_data,'video'=>$search_data]);
    }

    public function recentData($search_data){
          $model = new Registration();
           $model->insertRecentTable($search_data);
    }
    public function playlist(){
       $session_data =   Session::get('User');
        //$url = $request;
        if(!$session_data){
            return redirect('/login');
        }
      $model = new Registration();
      $data = $model->getCategory();
      
      return view('playlist',['category'=>$data]) ;
      //return view('/playlist');
    }
    public function withdraw(){
       $contentLogin =   Session::get('contentUser');
      if(!$contentLogin){
        return redirect('/getLogin');
    }
      $model = new Registration();
      $data = $model->getCategory();
      return view('/withdraw',['category'=>$data]);
    }
    public function upload(){
      $contentLogin =   Session::get('contentUser');
      if(!$contentLogin){
        return redirect('/getLogin');
    }
      $model = new Registration();
      $data = $model->getCategory();
      return view('/upload',['category'=> $data]);
    }

        public function login(){
          $user=Session::get('User');
         // print_r($user);
        return view('login') ;     
      } 

    public function profile(){
      
        $user=Session::get('User');

        return view('profile',['user' => $user]);
    }
    public function getLogin(){
        
      return view('contentLoginform');
    }

    public function getVedio(Request $request){
         $data=$request->all();
        
      Session::put('filterData',$data);


      Session::put('recentSearch',1);

        
         
          return redirect('/search');
        //print_r($data);
    }


     public function Dashboard()
    {
      $user=Session::get('User');

      return view('Dashboard',['user' => $user]);
    }


      public function postLogin(Request $request){
            $this->validate($request,[
                'email'=>'required',
                'email.required' => 'The User Email must be a valid email address.',
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
      public function home(){
          $model = new Registration();
         $data = $model->getCategory();

         $Recentlydata=$model->getRecentlySearch();
      //   print_r($Recentlydata);die;

          $newComes=$model->getNewComes();


        return view('/initial',['category'=>$data, 'recently'=>$Recentlydata, 'newComes'=>$newComes]);
      }
      public function contentPostLogin(Request $request){
        $this->validate($request,[
          'email'=>'required',
          'email.required' => 'The User Email must be a valid email address.',
          'password'=>'required'
      ]
      );
     
      $model = new Registration();
       $get = $model->Contentlogin($request);
      if($get){
        return redirect('/contentProvider')->with('success','Login Successfully!');
      }
      else{
        return redirect('/getLogin')->with('error','invalid credentials!');
      }
      }
   
    public function UserRegistration(Request $request){
       // print_r($_POST); die;
        $this->validate($request,[
          'email'=>'required',
          'nickname'=>'required',
          'password'=>'required',
          // 'terms'=>'required'
      ]
      
      );
      unset($request['_token']);
      unset($request['terms']);
   //  print_r($request->all()); die;
        $model = new Registration();
       $get = $model->registration($request);
       if($get){
        //echo "yes";die;
         return redirect('/register')->with('success','Registered successfully');
       }
       else{
        return redirect('/register#error')->with('error','Email Already Exist!');
       }
    }
    public function updateProfile(Request $request){
    
    $image = $request->image;
     // print_r($image);die;
      //print_r($request->all());die;
      $this->validate($request,[
        'image' => 'required|file',
        'backupemail'=>'required',
        'aboutme'=>'required',
        'sexology'=>'required',
        'titssize'=>'required',
        'privy'=>'required',
        'ass'=>'required',
        'hairlength'=>'required',
        'haircolor'=>'required',
        'eyecolor'=>'required',
        'height'=>'required',
        'weight'=>'required',        
    ]
      );
    if($request->image){
      //echo "yes";
       $fileName = time().'_'.$request->image->getClientOriginalName();
      // print_r($fileName);die;
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
    public function logout(Request $request,$args){
      Session::forget('User');
      Session::flush();

      if($args=='profile'){
      return redirect('/login');
    }
    else{
      return redirect('/getLogin');
    }
  }
    public function contentForm(){
      $model = new Registration();
      $data = $model->getCategory();
      //print_r($data);die;
      return view('content',['category'=>$data]);
    }
    public function contentProvider1(Request $request){
      $this->validate($request,[
        'image' => 'required|file',
        'email'=>'required', 
        'category'=>'required',
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
        $data=$request->all();  
      ///echo "<pre>";
        //print_r($data); die;
        //echo "yes";
         $fileName = time().'_'.$request->image->getClientOriginalName();
         $ext =$request->image->getClientOriginalExtension();
         $filePath = $request->image->storeAs('uploads', $fileName, 'public');
         $data['image'] = '';
         unset($data['image']);
         unset($data['_token']);
         //echo "<pre>";
         //print_r($data);die;
         $data['profilepicture']=$fileName;
         if($filePath){
          //print_r($request->all());die;
          $model=new Registration();
          $update_data = $model->uploadContentData($data);
            if($update_data){
                return redirect('/getLogin');
              }
              else
              {
                  return redirect('/getContent#error')->with('error','Some Error Occure!');
          }
        }
      }
  }
  public function providerContent(Request $request){
        $this->validate($request,[
          'media' => 'required|mimes:mp4,ppx,mp3,pdf,ogv,jpg,webm',
          'email'=>'required', 
          'description'=>'required',
          'hour'=>'required',
          'minutes'=>'required',
          'seconds'=>'required',
          'keyword'=>'required',
          'title'=>'required',
          'price'=>'required',
          'category'=>'required'    
      ]
        );

      if($request->media){
            $data=$request->all();
              $fileName = time().'_'.$request->media->getClientOriginalName();
              $ext =$request->media->getClientOriginalExtension();
              $filePath= $ext=='mp3' ? $request->media->storeAs('audio', $fileName, 'public') : $request->media->storeAs('video', $fileName, 'public');
              unset($data['_token']);
              $data['media']=$fileName;
              $data['type']=  $ext=='mp3' ? 'audio' : 'video'; 
                if($filePath){
                $model=new Registration();
                $update_data = $model->uploadContentProvider($data);
                  if($update_data){
                      return redirect('/contentProvider#success')->with('success','Data Created Successfully!');
                    }
                    else
                    {
                        return redirect('/contentProvider#error')->with('error','Some Error Occure!');
                    }
              }
      }
  }
 


  public function getProvider(){
    $model=new Registration();
    $update_data = $model->getContentProvider('audio');
    //print_r($update_data);
  }
  public function contentProv(){
    $contentLogin =   Session::get('contentUser');
    if(!$contentLogin){
      return redirect('/getLogin');
  }
    $model = new Registration();
    $data = $model->getCategory();
    return view('provider',['category'=>$data]) ;
  }
  public function Postdashboard()
  {
    return view('Dashbaord');
  }
}
