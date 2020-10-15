<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use App\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
//use Validator;

class AuthController extends Controller
{

  private $model;

  public function __construct()
    {
      $this->model= new Registration();
     }

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


      
      return view('/play');

    }

    /*----------------Filter Result------------------------*/

    public function search(){

       $contentLogin =   Session::get('contentUser');
      if(!$contentLogin){
        return redirect('/getLogin');
    }



     

           $data=Session::get('filterData');

           
             $recentSelected=Session::get('recentSearch');

            $session_data =   Session::get('User');

           unset($data['_token']);


         $search_data = $this->model->getVedio($data);

       

          $sub=$search_data['subcategory'];



            if(Session::get('subid')){


                $sessionGet=Session::get('subid');

            }
            else{


                $resultSubId=$this->model->getSubcategoryById($sub);

              

                 Session::put('subid',$resultSubId);

          }




          $search_data->forget('subcategory');

            if($recentSelected && $session_data){

            $this->recentData($search_data);

        }
         return view('/search',['video'=>$search_data,'subcategory'=>$sessionGet ? $sessionGet : '']);
    }


    /*----------------End Filter Result------------------------*/

    public function recentData($search_data){

           $this->model->insertRecentTable($search_data);
    }
    public function playlist(){
    
       $data=Session::get('User');


        if(!$data){
            return redirect('/login');
        }
    
      
      return view('playlist') ;
      //return view('/playlist');
    }
    public function withdraw(){
       $contentLogin =   Session::get('contentUser');
      if(!$contentLogin){
        return redirect('/getLogin');
    }
  
     
      return view('/withdraw');
    }
    public function upload(){
      $contentLogin =   Session::get('contentUser');
      if(!$contentLogin){
        return redirect('/getLogin');
    }
      

      return view('/upload');

    }

        public function login(){

         

     
        return view('login') ;     
      } 

    public function profile(){
      
        

        return view('profile');
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
     

      return view('Dashboard');
    }

    public function subcat_video($subid){
     

        $data = Session::get('filterData');

        $data['subid'] = $subid;

        Session::put('filterData',$data);

         return redirect('/search');

  // return view('/search',['category'=>$category_data,'video'=>$subcategories]);

    }


      public function postLogin(Request $request){

            $this->validate($request,[
                'email'=>'required',
                'email.required' => 'The User Email must be a valid email address.',
                'password'=>'required'

            ]
            
            );

            $get = $this->model->login($request);
            if($get){
            // echo "yes";die;
              return redirect('/')->with('success','Login Successfully!');
            }
            else{
              return redirect('/login')->with('error','invalid credentials!');
            }

      }
      public function home(){



         $Recentlydata= $this->model->getRecentlySearch();
      //   print_r($Recentlydata);die;

          $newComes=$this->model->getNewComes();


        return view('/initial',['recently'=>$Recentlydata, 'newComes'=>$newComes]);
      }
      public function contentPostLogin(Request $request){
        $this->validate($request,[
          'email'=>'required',
          'email.required' => 'The User Email must be a valid email address.',
          'password'=>'required'
      ]
      );
     
   
       $get = $this->model->Contentlogin($request);
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
       $get = $this->model->registration($request);
       if($get){
        //echo "yes";die;
         return redirect('/register')->with('success','Registered successfully');
       }
       else{
        return redirect('/register#error')->with('error','Email Already Exist!');
       }
    }



    public function updateProfile(Request $request){
      //print_r($request->all());die;
              if($request['gender']=='male'){
                  unset($request['ass']);
                   unset($request['titssize']);
              }
            $this->validate($request,[
              'image' => 'required|file',
              'backupemail'=>'required',
              'aboutme'=>'required',
              'sexology'=>'required',
              'gender'=>'required',
              'privy'=>'required',
              'ass'=>'sometimes|required',
              'titssize'=>'sometimes|required',
              'hairlength'=>'required',
              'haircolor'=>'required',
              'eyecolor'=>'required',
              'height'=>'required',
              'weight'=>'required'       
          ]
          );
     // print_r($request->all());die;

    if($request->image){
    
       $fileName = time().'_'.$request->image->getClientOriginalName();
      // print_r($fileName);die;
       $filePath = $request->image->storeAs('uploads', $fileName, 'public');
       unset($request['image']);
       unset($request['_token']);
       $request['profilepicture']=$fileName;
         if($filePath){
           // echo "yes";die;
           
           $update_data = $this->model->uploadDataFile($request);
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

      $data = $this->model->getCategory();
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
          
          $update_data = $this->model->uploadContentData($data);
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
          'category'=>'required',    
          'subcategory'=>'required'    
      ]
        );
        //print_r($request->media->getSize());die;
      if($request->media){
            $data=$request->all();
              $fileName = time().'_'.$request->media->getClientOriginalName();
              $ext =$request->media->getClientOriginalExtension();
              $filePath= $ext=='mp3' ? $request->media->storeAs('audio', $fileName, 'public') : $request->media->storeAs('video', $fileName, 'public');
                 $size=$request->media->getSize();
               $data['size'] = number_format($size / 1048576,2);
              unset($data['_token']);
              $data['media']=$fileName;
              $data['type']=  $ext=='mp3' ? 'audio' : 'video'; 
                if($filePath){

                $update_data = $this->model->uploadContentProvider($data);
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
   

    $update_data = $this->model->getContentProvider('audio');
    //print_r($update_data);
  }
  public function contentProv(){
    $contentLogin =   Session::get('contentUser');
    if(!$contentLogin){
      return redirect('/getLogin');
  }
   


    $subcategory=$this->model->getSubcategory($id='');

    return view('provider',['subcategory'=>$subcategory]) ;

  }
  public function Postdashboard()
  {
    return view('Dashbaord');
  }


}
