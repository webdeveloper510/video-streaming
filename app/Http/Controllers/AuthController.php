<?php

namespace App\Http\Controllers;

use App\Registration;

use DateTime;

use Timezone;

use App\Classes\includeClass;

use Session;

use App\File;

use View;

use Illuminate\Support\Facades\Validator;

include('php-sdk/vendor/autoload.php');

use transloadit\Transloadit;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Http\Request;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Mail;


use App\Mail\verifyEmail;

use App\Mail\email_reporting;

use App\Mail\artistSupport;

use App\Mail\customer_issue;

use App\Mail\forgotPassword;

use App\Mail\notifyEmail;

use Illuminate\Http\RedirectResponse;


use \Illuminate\Http\UploadedFile;

use Stripe\Error\Card;

use Stripe;
use Illuminate\Routing\Redirector;

use Illuminate\Support\Facades\Input;



class AuthController extends Controller
{

  private $model;

  use ThrottlesLogins;
  

    public function __construct(Request $request, Redirector $redirect)
    {


       
       $this->model= new Registration();     



      

    }



    public function register($id=null){

      Session::forget('login_attempt');   


       Session::put('reffer_by',$id);

       
      $session_data =   Session::get('userType');


        $userRadio =   Session::get('existRadio');

        if($session_data=='contentUser'){

             return redirect('artists/dashboard') ;

        }
           
          return view('registration',['checkRadio'=>$userRadio]) ;

    }

    public function overview(){
        return view('overview');
    }



    
    public function contact(){

      return view('/contact');
    }


    /*----------------------------------------------------Filter Result-------------------------------------------*/

    public function search(){

       $session_type =   Session::get('userType');

       Session::forget('SessionmultipleIds');

            if($session_type=='contentUser'){

            return redirect('artists/dashboard');

          }

           $data=Session::get('filterData');     


            $recentSelected = Session::get('recentSearch');

       
            unset($data['_token']);


         $search_data = $this->model->getVedio($data);  // GET SUBCATEGORY ID AND DATA USING FILTER 

          $search=$search_data['search'];

            unset($search_data['search']);

            if($recentSelected && $session_type=='User'){

              $this->recentData($search_data,$search);

        }
         return view('/search',['search'=>$search,'video'=>$search_data,'subcategory'=>isset($sessionGet) ? $sessionGet : null]);
    }


    /*--------------------------------------------  End Filter Result--------------------------------------*/

    public function recentData($search_data,$search){

           $this->model->insertRecentTable($search_data,$search);
    }
    public function playlist(){
    
      
    
      
      return view('playlist') ;
      //return view('/playlist');
    }
    public function withdraw(){
      $navbaractive = 'withdraw';
              
   
      
      $user =   Session::get('User');

      $level_system = array();
      $b = [0,2,4,6,8,10,12,14,16,18,20];
      for($i=0;$i<11;$i++){
      $level_system[$i]['level'] = 'Lvl'.$i;
      $level_system[$i]['fee'] = $b[$i];
      }

      $artistId = $user->id;

      $passive = $this->model->getSumOfPassive($artistId);

      $passive_artist = $this->model->getRefersArtist($artistId);

      

      

       $type =   Session::get('userType');
      if($type=='User'){
        return redirect('/');
    }
      return view('/withdraw',['artistPassive'=>$passive_artist,'passive_income'=>$passive,'tab'=>$navbaractive,'artistid'=>$artistId,'level_system'=>$level_system]);
    }
    public function upload(){
      $contentLogin =   Session::get('contentUser');
              if(!$contentLogin){
                return redirect('/artistLogin');
            }
      

      return view('/upload');

    }

        public function login(){

             $type =   Session::get('userType');

             $attempt =   Session::get('login_attempt');


             if($type=='contentUser'){
                
                 return redirect('artists/dashboard');

             }
             

         
            return view('login',['attempt'=>$attempt]) ;     
      } 

    public function profile(){

       $type = Session::get('userType');

       if($type=='contentUser'){
        return redirect('artists/dashboard');
       }

        return view('profile');
    }


    public function check($user){

      //echo $user;die;

        Session::put('existRadio',$user);


        return redirect('/register');

    }
    public function getLogin(){

      $type = Session::get('userType');

       if($type=='User'){

        return redirect('/');

       }

       else{
      return view('contentLoginform');
    }
    }

    public function getVedio(Request $request){

         $data=$request->all();

         //print_r($data);die;

      Session::put('filterData',$data);


      Session::put('recentSearch',1);

        
         
          return redirect('/search');
        //print_r($data);
    }


     public function Dashboard()
    {
     

      return view('Dashboard');
    }
    public function supportlogin()
    {
     

      return view('supportlogin');
    }
    public function report_media()
    {

      $sessionLogin = Session::get('pazLogin');

      $notVerifiedContent = $this->model->getNotVerifiedContent('media');

      $profile = $this->model->getArtistnotVerified('is_verified','profilepicture');
      $background = $this->model->getArtistnotVerified('background_verified','cover_photo');

      
//       echo "<pre>";

//       print_r($profile);
//       print_r($background);
// die;

      $offer_not_VerifiedContent = $this->model->getNotVerifiedContent('offer');

      $notVerifyContentOrder = $this->model->getNotVerifiedOrders('offer');


      // echo "<pre>";

      // print_r($notVerifyContentOrder);die;

      $history = $this->model->getHistoryVerifiedContent('media');

      $reports = $this->model->getReportVerifiedContent('media');
      // echo "<pre>";
      // // print_r($notVerifiedContent);
      // // print_r($history);
      // print_r($notVerifiedContent);

// die;

      return view('report-media',['notVerifyOrder'=>$notVerifyContentOrder,'background'=>$background,'artists'=>$profile,'services'=>$offer_not_VerifiedContent,'reports'=>$reports,'verifyHistory'=>$history,'teamLogin'=>$sessionLogin,'notVerified'=>$notVerifiedContent]);
    }
    public function legal()
    {
     

      return view('legal-notice');
    }

    
    public function verifyMedia(Request $req){

      $array_data = $req->data;

     // print_r($array_data);


      $return = $this->model->insertVerifyMediaData($req->all());

      //$video_id = $return[0]->mediaid;

      //echo $video_id;

      if(is_array($return)){


        return 'already';

            //   foreach($array_data as $key=>$val){

            //     if($val['id']==$video_id){

            //       //echo "yes";

            //       unset($array_data[$key]);


            //     }

                
            // }

            // $arrext = reset($array_data);

            // return response()->json($arrext);
           // return $array_data;

      }

     
    else{

      return $return;

    }


}

    public function isVerifyOrNot(Request $req){

      $array_data = $req->data;

      if($req->bool=='true'){


        $is_verified = 1;

      }
      else{

        $is_verified= -1;
      }

      if($req->image!=''){


        $type = $req->image=='profilepicture' ? 'is_verified' : 'background_verified'; 
              
        $updated = $this->UpdateArtistTable($type,$is_verified,$req->videoid);

       


      }

      else{

      $table = $req->type=='offer' ? 'offer' : 'media';

      $req->type=='orders' ? $this->model->addonContentProvider($req) : '';
      
      $verify = array('is_verified'=>$is_verified);

      $updated = $this->model->UpdateData($table,'id',$verify,$req->videoid);

      $type= $req->type;
      }

      if($updated){
        $verify1 = array('is_deleted'=>1);

          $done = $this->model->UpdateDatainVideoVerified($verify1,$req->videoid,$type);


          if($done){

                  return 1;
          }

          else{
           return 0;
          }

        
          //print_r($array_data);
          //   foreach($array_data as $key=>$val){

          //     if($val['id']==$req->videoid){

          //       //echo "yes";

          //       unset($array_data[$key]);

          //     }

              
          // }
         

          // $arrext = reset($array_data);
          // return response()->json($arrext);
      
      }

    }

    public function UpdateArtistTable($key,$verify,$id){

      $array= array($key=>$verify);

      $updated = $this->model->UpdateData('contentprovider','id',$array,$id);

      return $updated;

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
                'password'=>'required',

            ]
            
            );

            if(Session::get('login_attempt')){

              $val = Session::get('login_attempt');

              $i = $val+1;


            }

            else{

              $i=1;

            }

        
            
            $data=$request->all();




            $get = $this->model->login($data);

            //$get!='' ? Session::forget('login_attempt') : '';




            $redirect_url=Session::get('redirect_url');

    

            if($get==1 && $data['g-recaptcha-response']){

              Session::forget('login_attempt');

        return  $data['user']=='users' ?  redirect('/')->with('loginSuccess','Login Successfully!'): redirect('artists/dashboard')->with('success','Login Successfully!');

            }

           else if($data['g-recaptcha-response']==''){

               return redirect('/login')->with('captcha','invalid Captcha!!');
           }
            else if($get=='Not Verify'){
              return redirect('/login')->with('error','Please Verify Your Email!');
            }
            else{
              Session::put('login_attempt',$i);
              return redirect('/login')->with('error','Invalid Email or Password!');

            }

      }

public function pazLogin(Request $request){

  $this->validate($request,[
    'email'=>'required',
    'email.required' => 'The User Email must be a valid email address.',
    'password'=>'required',

]

);




$data=$request->all();




$get = $this->model->pazLogin($data);


//print_r($data);


if($get=='1' && $data['g-recaptcha-response']){

  if($data['pagesUrl']=='admin'){

    return redirect('/admin-panel');

  }

  if($data['pagesUrl']=='content'){

    return redirect('/Content-review');


  }
  if($data['pagesUrl']=='social'){

    return redirect('/Social-Media-Download');

    
  }
  if($data['pagesUrl']=='support'){

    return redirect('/support-team');

    
  }


}

else if($data['g-recaptcha-response']==''){

   return redirect('/paz-Team-Login')->with('captcha','invalid Captcha!!');
}
else{
  return redirect('/paz-Team-Login')->with('error','Invalid Email or Password!');

}


}
      public function home(){

       

        Session::forget('login_attempt');   


         $Recentlydata= $this->model->getRecentlySearch();

           $artists=$this->model->getArtists($paginate='No');

          // print_r($artists);die;

           $offersVideos = $this->model->getallOffer($paginate='No');

           $isData = $this->model->isSubscribe($id='');


           $popularVideos = $this->model->PopularVideos($paginate='No','video');

           $popularaudios = $this->model->PopularVideos($paginate='No','audio');      

          $newComes=$this->model->getNewComes();

          //print_r('dddd');die;

    return view('/initial',['isSubscribed'=>$isData,'recently'=>$Recentlydata, 'artists'=>$artists, 'newComes'=>$newComes,'offers'=>$offersVideos,'popular'=>$popularVideos,'popularAudios'=>$popularaudios]);

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
        return redirect('/artists/dashboard')->with('success','Login Successfully!');
      }
      else{
        return redirect('/artistLogin')->with('error','invalid credentials!');
      }
      }


   
    public function UserRegistration(Request $request){

      $messages = [
        'password.regex'=>"Password must contain at least one number, one character and one special character (@#%^&,.) and minimum 8 characters all together",
    ];
       // print_r($_POST); die;
        $this->validate($request,[
          'person'=>'required',
          'email1'=>'required',
          'nickname'=>'required|max:25',
          'password' => 'min:8|required_with:confirm|same:confirm|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.,()]).{8,}$/',
          'confirm' => 'min:8',
          'terms'=>'required',
          'AgeRestriction'=>'required'
      ], $messages
      
      );

        $user = $request->person;


      unset($request['_token']);
      unset($request['terms']);
      //unset($request['News']);
      unset($request['AgeRestriction']);
     //print_r($request->all()); die;
         $model = new Registration();

        if($request->person=='users'){


            unset($request['person']);
          //echo "yes";die;
           $get = $this->model->registration($request);
         }

         else{
              //print_r($request->all());die;
            $get = $this->artistPost($request);
         }


       if($get){
        //echo "yes";die;
          Mail::to($request->email1)->send(new verifyEmail($request,$get,$user));
         return redirect('/register')->with('success','Please check Email Inbox and/or Spam Folder');
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
           //echo "yes";die;
           
           $update_data = $this->model->uploadDataFile($request);
            if($update_data==1){
              return redirect('/profile')->with('success','Data Updated Successfully!');
            }
            else{
              return redirect('/profile')->with('error','Some Error Occure!');
            }
         }
    }
    }



    public function logout($text=null){
      if($text=='default'){

        Session::forget('pazLogin');


      }

      else{
        Session::forget('User');
      }
    
       Session::flush();

       return redirect('/');
    //   if($args=='profile'){
    //   return redirect('/login');
    // }
    // else{
    //   return redirect('/getLogin');
    // }
  }

  public function artistRegister(){

    return view('artistRegister');

  }
 



    public function contentForm(){

       $tab='artist_info';

        $type=Session::get('userType');

        if($type=='User'){

           return redirect('/');
        }
      $data = $this->model->getCategory();
      //print_r($data);die;
      return view('content',['category'=>$data,'tab'=>$tab]);
    }
    public function contentProvider1(Request $request){
     // print_r($request->all());die;
        if($request['gender']=='male'){
              unset($request['ass']);
              unset($request['titssize']);
              }

       $this->validate($request,[
        //'image' => 'required|mimes:jpg,png,jpeg',
       // 'cover_photo'=>'required|mimes:jpg,png,jpeg',
        'aboutme'=>'required',
        'sexology'=>'required',
        'ass'=>'sometimes|required',
        'titssize'=>'sometimes|required',
        'privy'=>'required',
        'hairlength'=>'required',
        'haircolor'=>'required',
        'height'=>'required',
        'weight'=>'required',        
           ]
      );

    
  
    //  if($request->image){

              // $data=$request->all();  
              // $fileName = time().'_'.$request->image->getClientOriginalName();
              // $cover_photo = time().'_'.$request->cover_photo->getClientOriginalName();
              // $ext = $request->image->getClientOriginalExtension();
              // $filePath = $request->image->storeAs('uploads', $fileName, 'public');
              // $filePath1 = $request->image->storeAs('uploads', $cover_photo, 'public');
              // $data['image'] = '';
              // unset($data['image']);
              // unset($data['_token']);
              $data=$request->all();  
              unset($data['_token']);
              $data['profilepicture']='';
              $data['cover_photo']='';
              //print_r($data);die;
         //if($filePath){          
              $update_data = $this->model->uploadContentData($data);

              //print_r($update_data);die;

              return $update_data;
              //   if($update_data){
              //       return redirect('artists/dashboard');
              //     }
              // else
              // {
              //     return redirect('/getContent#error')->with('error','Some Error Occure!');
              //  }
        //}
  }
  public function providerContent(Request $request){

    $validator = \Validator::make($request->all(), [
      //'media' => $request->radio=='video' ? 'required|mimes:mp4,ppx,pdf,ogv,webm':'required|mimes:mp3',
      'description'=>'required|max:2000',
      'title'=>'required|max:30',
      'price'=>'required|max:50000',
      //'category'=>'required', 
      //'thumbnail_pic'=>'required|mimes:jpg,png,jpeg'
  ]);     
        
  if ($validator->fails())
  {
      return response()->json(['errors'=>$validator->errors()->all()]);
  }

 // print_r($request->all());die;
      if($request->radio=='video'){
            $data=$request->all();
              $fileName = time().'_'.$request->media->getClientOriginalName();
              $audio_pics = $request->thumbnail_pic ? time().'_'.$request->thumbnail_pic->getClientOriginalName():'';
              $request->thumbnail_pic ? $request->thumbnail_pic->storeAs('uploads',$audio_pics,'public'): '';
              $ext =$request->media->getClientOriginalExtension();
              $filePath= $request->media->storeAs('video', $fileName, 'public');
                $size  = $request->media->getSize();
               $data['size'] = number_format($size / 1048576,2);
              unset($data['_token']);
              $data['media']=$fileName;

              $data['audio_pic'] = $audio_pics ? $audio_pics : '';
              unset($data['thumbnail_pic']);
              $data['convert'] = $data['convert'] ? $data['convert'] : '';

              $data['type']= 'video'; 
              $data['catid']= $data['video_cat'];
              
              unset($data['audio_cat']);
              unset($data['video_cat']);
              unset($data['transloadit']);
              unset($data['transloadit_image']);
              unset($data['assembly_id']);

             
              //print_r($data);die;

                if($filePath){

                $update_data = $this->model->uploadContentProvider($data);
              }
      }

      else{
      
        $data=$request->all();

        //print_r($data);die;

        $audio_pics = '';
          $size  = '';
         $data['size'] = '0';
        unset($data['_token']);
        $data['media']='';
        $data['audio_pic'] = $audio_pics ? $audio_pics : '';
        unset($data['thumbnail_pic']);
        $data['convert'] = $data['convert'] ? $data['convert'] : '';

        $data['type']= 'audio'; 
        $data['assembly_id']=$data['assembly_id'];
        $data['catid']= $data['audio_cat'];
        
        unset($data['audio_cat']);
        unset($data['video_cat']);
        unset($data['transloadit']);
        unset($data['transloadit_image']);

        if($data){

          $update_data = $this->model->uploadContentProvider($data);

        }


      }

      if($request->transloadit){

        $this->notifyUrl($request->transloadit);
        
      }


      if($update_data){
        return response()->json(array('status'=>1, 'messge'=>'Content Uploaded!'));
      }
      else
      {
          return response()->json(array('status'=>0, 'messge'=>'Some Eror!'));
      }
  }

  public function notifyUrl(Request $req){

    $app = app_path();

    if(isset($_POST['transloadit'])){

      $data = $_POST['transloadit'];

      $decode = json_encode($data);

      $json = file_get_contents("php://input");

      $obj = json_decode($decode);



      try{
            $messge = "All Good";

            $file = fopen($app.'/dummy.php',"w");
            //fwrite($file,"Hello World. Testing!");
            fwrite($file,"Hello World. Testing!".$messge." ".$obj);
            fclose($file);
      }

      catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
      }
      return 'I am in if';
    } 

    else{
      $messge= "nothing";
            $file = fopen($app.'\dummy.php',"w");
           fwrite($file,"Hello World. Testing!".$messge);
           fclose($file);
           return 'I am in else';
    }

  //   $app = app_path();
  

  //   $file = fopen($app.'\dummy.php',"w");
  //   fwrite($file,"Hello World. Testing!".json_encode($_POST));
  //   fclose($file);

  //  return  response()->json(['success' => 'success'], 200);
    // $homepage = file_get_contents($app.'\dummy.php');
    // echo $homepage;
    // die;

    // if($req){

    //   echo "yes";

    //   return '200';

    // }

   

    // $data = json_decode($req); //  Decode json here

    // //print_r($data);die;

    // if($data){

    // $assem_id = $data['assembly_id'];

    // $fileName = $this->saveContent($data); // This function gives us video name

    // $imagename = $this->saveTransloaditImage($data); // This function gives us image name

    // $data1 = array('media'=>$fileName,'audio_pic'=>$imagename);

    // $this->model->UpdateData('media','assembly_id',$data1,$assem_id); // Update data based on Assembly id
    
    // }
  }     


  public function saveContent($data){

    $media_url = $data['results']['merged'][0]['ssl_url'];

    $path = storage_path('app/public/video/');

    //$ch     =   curl_init($data->transloadit);

    $ch     =   curl_init($media_url);
    $dir            =   $path;
    //$fileName       =   basename($data->transloadit);
    $fileName       =   basename($media_url);
    $saveFilePath   =   $dir . $fileName;
    $fp             =   fopen($saveFilePath, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $execute = curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    return $execute==1 ? $fileName : 0;
  }

  public function saveTransloaditImage($data){

    $image_url = $data['results']['resized_image'][0]['ssl_url'];


    $path = storage_path('app/public/uploads/');

   // $ch     =   curl_init($data->transloadit_image);

    $ch     =   curl_init($image_url);

    $dir            =   $path;

    $fileName       =   basename($image_url);

    $saveFilePath   =   $dir . $fileName;

    $fp             =   fopen($saveFilePath, 'wb');

    curl_setopt($ch, CURLOPT_FILE, $fp);

    curl_setopt($ch, CURLOPT_HEADER, 0);

    $execute = curl_exec($ch);

    curl_close($ch);

    fclose($fp);

    return $execute==1 ? $fileName : 0;

  }

public function getResponse(){
    print_r('eeee');
}


  public function getProvider(){
   

    $update_data = $this->model->getContentProvider('audio');
    //print_r($update_data);
  }

  public function addtoken(){

    return view('addToken');
    
  }

public function artistselling(){
  

    return view('artistselling');
  }

  public function popupClose(Request $req){

        $this->model->insertPopupNotification();

  }
  public function artistoffers($id){

    $date = new DateTime();

     //echo $date->getTimestamp();

    $data = $this->model->getofferByid($id);

     $artId = $data[0]->artistid;

     $contentData=Session::get('User');

     $contentId=$contentData->id;

     $popup_visible = $this->model->selectDataById('userid','popup_visibility',$contentId);

     //print_r(count($popup_visible));die;

    $isSubscribe =$this->model->isSubscribe($artId);

   
        
    return view('artistoffers',['visible'=>count($popup_visible),'offer'=>isset($data) ? $data :[],'isSubscribed'=>$isSubscribe]);

  }

  public function accept(){

        return view('acceptable');
  }
  public function dmca(){

    return view('dmca');
}
public function cookie(){

  return view('cookie');
}
public function acceptable(){

  return view('acceptable');
}
public function disclaimer(){

  return view('disclaimer');
}
public function terms(){

  return view('terms');
}
public function privacy(){

  return view('privacy');
}

  public function view1(){

    echo "yes";

    return view('view1');
  }



  
  public function contentProv(){

    $navbaractive = 'upload';

    $contenttype =   Session::get('userType');
    if($contenttype=='User'){
      return redirect('/');
  }

    $subcategory=$this->model->getSubcategory($id='');

    return view('artists.provider',['tab'=>$navbaractive,'subcategory'=>$subcategory]) ;

  }


  public function Postdashboard()
  {
    return view('Dashbaord');
  }

   public function artistPost($request){

    // print_r($request->all());die;

      unset($request['person']);

       $get = $this->model->postArtist($request);
       if($get){

        return $get;
         
       }
       else{

        return 0;

       }

  }

  public function price(Request $req){

          $token = $req->token;

        $data=$this->model->tokenExist($token);


  $returnData= $data ? response()->json(array('status'=>1, 'fee'=>$data[0], 'token'=>$token)) :response()->json(array('status'=>0, 'messege'=>'No Data Found'));

            return $returnData;

  }

  public function payWithStripe(){

    return view('stripe');
  }




/*----------------------------------------------Stripe Payment-------------------------------------------------------*/
  public function postPaymentStripe(Request $request)
   {

      $user=Session::get('User');

      //print_r($request->all());die;

      $userId =$user->id;


      $validator = Validator::make($request->all(), [
     'card_no' => 'required',
     'ccExpiryMonth' => 'required',
     'ccExpiryYear' => 'required',
     'cvvNumber' => 'required',
     //'amount' => 'required',
     ]);

 if ($validator->passes()) { 
  

    $stripe = Stripe\Stripe::setApiKey('sk_test_ChfSSXaILXyDtixAjzFD4sYx');
    try {
         $token = \Stripe\Token::create([
              'card' => [
              'number' => $request->get('card_no'),
              'exp_month' => $request->get('ccExpiryMonth'),
              'exp_year' => $request->get('ccExpiryYear'),
              'cvc' => $request->get('cvvNumber'),
              ],
         ]);

      $input = $request->all();

     

      $userData = $this->model->getUserData($userId);

      

              // if($userData[0]->reffered_by!=0){

              //   print_r($input);die;

              //       $amount = $input['fees'];
              //       $passive_amount = $amount*10/100;
              //       $input['amount']=$input['amount']-$passive_amount;
                   
              // }

            

       $customerId = isset($userData[0]->customer_id) ? $userData[0]->customer_id : '';

      

       if($customerId){

            $charge = $this->createCharge($input,$customerId,$userId,$userData);/*---------------Call Create Charge Function-----------*/

              if((array)$charge){

              Session::flash('test', array('test1', 'test2', 'test3'));
              return redirect('/paymentSuccess');


        }

       }

      else{

        $customerData = $this->createCustomer($input,$userData,$token);/*---------------Call Create customer Function-----------*/

          
          if((array)$customerData){

              $charge = $this->createCharge($input,$customerData->id,$userId,$userData);   //Create Charge

               if((array)$charge){



            return redirect('/paymentSuccess');


        }

          }

       }
 } 

 catch(Exception $e){

    print_r($e);
 }
 
 }
 }


 /*----------------------------------------------End------------------------------------------------------*/

public function createCustomer($data,$userdata,$token){


    $customer = \Stripe\Customer::create([
       'name'=>$userdata[0]->nickname,
        'source'  => $token['id'],
      "address" => ["city" =>'Fleming Island', "country" =>'US', "postal_code" => '32006', "state" => 'Florida',"line1" =>'abc']
     ]);

    return $customer;

}

public function createCharge($data,$cusid,$uid,$userdata){

  //print_r($cusid);die;


    $charge = \Stripe\Charge::create([
      'customer' => $cusid, 
      'currency' => 'USD',
      'amount' =>$data['amount']*100,
      'description' => 'wallet',
      ]);

   // print_r($charge);die;
    if((array)$charge){


      //   Here return 10 % passively to artist of fees
          
         
        $response = $this->model->insertTransection($charge,$data);

        if($response==1){

         

          if($userdata[0]->reffered_by!=0){

           // print_r($data);die;

           // echo "hello";die;
      $amount = $input['fees'];
      $passive_amount = $amount*10/100;
    $insert_passive = $this->model->insertPaymentStatus($uid,$userdata[0]->reffered_by,'',$passive_amount,'passive-income');     
    $bonus_inserted_done = $insert_passive ? $this->model->insert_in_bonus($uid,$userdata[0]->reffered_by,$passive_amount) : 0;

    //print_r($bonus_inserted_done);die;
               
          }

            return $bonus_inserted_done ? $bonus_inserted_done : $charge;

        }

    }

}

 public function success(){

    return view('/success');

}


public function verifyEmail($id, $type){
    $type = base64_decode($type);
    $id = base64_decode($id);

    //echo $type. $id;die;
  $verified = $this->model->verifyEmail($id,$type);
  if($verified){

    return redirect('/success');

  }
}
public function draw(){

  return view('/userDraw');

}

public function succssPage(){
  
  return view('emailVerifySuccess');
}

public function getSelectingArtist(Request $req){

    $data=$req->all();

        // print_r($data);die;

      Session::put('artistData',$data);


        
         
          return redirect('/getArtists');
}

public function process(){

  return view('siteProcess');

}

public function notifyEmail(Request $req){

     $this->validate($req,[
           
              'emails'=>'required',   
          ]
            );

      unset($req['_token']);

      $insertid = $this->model->notifyMe($req);

      //print_r($insertid);

      if($insertid!='0'){

         Mail::to($req->emails)->send(new notifyEmail($insertid));

          return redirect('inProcess')->with('success','Email Sent You Successfully!');

      }      

    }

    public function notify($notifyId){

      $notId = base64_decode($notifyId);

      $up = $this->model->notifyConfirm($notId);
      if($up==1){

                echo "yes";
            }

      else{
        echo "no";
      }

    }

    public function addRequest(Request $req){
         $this->validate($req,[
          'media' => 'required',
          'description'=>'required',
          'duration'=>'required',
           'total'=>'required',
          'title'=>'required',
          'delieveryspeed'=>'required',
          'quality'=>'required',
         // 'min'=>'required|numeric|lt:max',
         // 'max'=>'required|numeric|gt:min',
          'categories'=>'required'
      ]
        );

         //print_r($req->all());die;

         unset($req['_token']);

        $add = $this->model->addRequest($req);

        if($add == 1){
            return redirect('/my-requests')->with('success','Thank You Your Request Sent Successfully!');
        }
        else{
    
          return redirect('/')->with('success','Some Error Occure!');
        }

    }

    public function feedPage(){

      $data = $this->model->getSubscribeArtist();

        return view('feed',['artist'=>$data]);

    }

    public function updateStatus(Request $request){

        $updateStatus =  $this->model->updateStatus($request->all());

     $returnData= $updateStatus ? response()->json(array('status'=>1, 'messge'=>'Updated Successfully!')) : response()->json(array('status'=>1, 'messge'=>'Already Exist'));

      return $returnData;

    }


    public function myRequests(){

      $data = $this->model->showUserRequests();

        return view('all_requests',['requests'=>$data]);

    }

    public function showOffer(Request $req){

      unset($req['_token']);

      

      Session::put('offer',$req->all());

      

       return redirect('/showoffers');

    }

    public function offers(){

      $data = Session::get('offer');

     // print_r($data);die;

      $showOffer = $this->model->showOfer($data);

    

      return view('showoffer',['offer'=>isset($showOffer) ? $showOffer :[]]);
      
    }

   
 public function seeNotification($text){

      $all_data = $this->model->allNotication($text);

      return view('notification',['viewName'=>$text, 'notification1'=>$all_data]);
  
}

public function artistPage(){

        return view('show_artist');
}
   public function play($id=null){

    $update = $this->model->UpdateData('notification','id',array('read'=>1),$id);

    $ids = Session::get('listid');
         Session::forget('SessionmultipleIds');


    $playName = $this->model->getAllPlaylist();
    
    $all_play_lists = $this->model->getPlaylist();
    
    //print_r($all_play_lists);die;


    $wishList = $this->model->getWishlist();

         

    $videos = $this->model->getVideosbyList();

    $historyVideos = $this->model->getHistoryVideo();

  

     return view('play',['listname1'=>$all_play_lists,'listname'=>$playName,'videos'=>$videos,'history'=>$historyVideos,'wishList'=>$wishList]);

  }


public function selectListname(Request $request){


      Session::put('listname',$request->listname);

}
  public function listname(){

    $playName = $this->model->getPlayListName();

      return view('listname',['listname'=>$playName]);

  }

  /**-------------------------------------------------------------  Add To Library------------------------------------------------------------ */
      
    public function addToLibrary(Request $req){

        unset($req['_token']);

        $addTolibrary = $req->all();

        //print_r($addTolibrary);die;

        $data = $this->model->addToLibrary($addTolibrary);

       

        if($data==1 || $data=='1'){

          return response()->json(array('status'=>1, 'messge'=>'Video Add Successfully!'));

        }

        else if($data=='insufficient'){

          return response()->json(array('status'=>1, 'messge'=>'Insufficient Paz Tokens!'));



        }

        else if($data=='Already'){

          return response()->json(array('status'=>1, 'messge'=>'Already Add in your library!'));

       }

        else{
             return response()->json(array('status'=>1, 'messge'=>'Some Error Occure!'));
        }


}


public function editPlaylist(Request $req){

  $listname = array(
    'listname'=>$req->listname
  );

  $updated = $this->model->UpdateData('listname','id',$listname,$req->id);

  if($updated){
    return response()->json(array('status'=>1, 'listname'=>$req->listname));
  }

  else{
    return response()->json(array('status'=>0, 'messge'=>'Some Error Occure!'));
  }

          print_r($req->all());
}




public function selectMultiple(Request $req){

        $idsData = $req->all();

     $multipleIds = Session::get('SessionmultipleIds');
  
    if($idsData['isCheck']=='false'){

        $pos = array_search($idsData['id'], $multipleIds);


           unset($multipleIds[$pos]);
          

           Session::put('SessionmultipleIds',$multipleIds);

  }

  else{
        
              if($multipleIds){

                  if(!in_array($idsData['id'], $multipleIds)){

               

                      $multipleIds[] = $idsData['id'];

                      Session::put('SessionmultipleIds',$multipleIds);
                  }

            }

  else{


                $arr=array();

                $arr[] = $idsData['id'];

                Session::put('SessionmultipleIds',$arr);
      }   

}  

$multipleIds = Session::get('SessionmultipleIds');

//print_r($multipleIds);



$cartVideo = $this->model->getVideoWhereIn($multipleIds);

  // print_r($cartVideo);die;

       return response()->json($cartVideo);

}


public function addInLibrary(){
    
    $multipleIds = Session::get('SessionmultipleIds');
    $listname = Session::get('listname');
    
    $added = $this->model->addInLibrary($multipleIds,$listname);
    
    return $added;
    
   // print_r($multipleIds);

    
}

public function addMultipleVideo(Request $req){


          $multipleIds = Session::get('SessionmultipleIds');


            $remove = $req['isRemove'];
        
         
      
       if($remove=='yes'){

             $pos = array_search($req['id'], $multipleIds);


            unset($multipleIds[$pos]);

           Session::put('SessionmultipleIds',$multipleIds);
           $multipleIds = Session::get('SessionmultipleIds');

     
       }

     //  print_r($multipleIds);

        $cartVideo = $this->model->getVideoWhereIn($multipleIds);

            $all_play_lists = $this->model->getPlaylist();


              $total = $cartVideo['sum'];

              $result = $cartVideo['result'];

              //print_r($req->all());

                //print_r($result);die;


 return view('playlistpop',['cartVideo'=>$result, 'total_sum'=>$total,'listname'=>$all_play_lists]);

}

public function buyVideo(Request $req){

      unset($req['_token']);

      $this->model->buyVideo($req);

}

public function new(){

   $this->model->addToLibrary1();

}

public function createList(Request $request){


      $yes = $this->model->createList($request);

   $returnData = $yes==1 ? response()->json(array('status'=>1,'message'=>'List Created Successfully!','listname'=>$request->listname)) :response()->json(array('status'=>0, 'message'=>'Some Error Occure'));

   return $returnData;

}

public function showLists(Request $request){

  Session::put('listid',$request->all());

    //print_r($request->all());
}

/*-------------------------------------------------------------------Add To Wishlist------------------------------------------------------ */

   public function addToWish(Request $req){

    $multipleIds = Session::get('SessionmultipleIds');


      $return = $this->model->addWishlist($multipleIds);


      $returnData = $return==1 ? response()->json(array('status'=>1,'message'=>'Video Added Successfully!')) :response()->json(array('status'=>1, 'message'=>'Some Error Occure'));

      return $returnData;

}

/*-------------------------------------------------------Add Multiple Media and Buy------------------------------------------- */

public function addmMltiple(Request $req){

         $addTolibrary = $req->all();


        $data = $this->model->addToLibrary($addTolibrary);

      
        //print_r($data);
      
        $response =array();
        if($data ==='Insufficient Paz Tokens'){

        
          $response['status'] =1;
          $response['messge'] = 'Insufficient Paz Tokens!';
            
        }

        else if($data==1 || $data=='1'){

          $response['status'] =1;
          $response['messge'] = 'Video Add Successfully!';

          

        }

        else if($data=='Already'){

          $response['status'] =1;
          $response['messge'] = 'Already Buyed!';

          

        }


        else{

          $response['status'] = 1;
          $response['messge'] = 'Some Error Occure!';
            
        }

        //print_r($response);die;

        //print_r($response);

        return response()->json($response);


}

/*------------------------------------------------------------ Add To History--------------------------------------------------------- */

public function addTohistory(Request $req){

     // print_r($req->all());

      $this->model->addToHistory($req->all());

}

public function seeall($flag){
     if($flag=='audio'){

      $audios = $this->model->PopularVideos($paginate='yes',$flag);

     }

     if($flag=='offer'){

      //$isActive = false;

      $videos = $this->model->getallOffer($paginate='yes');

      //print_r($videos);die;
    }

    if($flag=='video'){

      $videos = $this->model->PopularVideos($paginate='yes',$flag);

    }
    if($flag=='artists'){

            return redirect('/getArtists');

    }

// echo "<pre>";
//     print_r($videos);die;

    return view('getAlldata',['flag'=>$flag,'videos'=>isset($videos) ? $videos : '','audio'=>isset($audios) ? $audios : '']);
     
}
/*----------------------------------------------------Check Already Nickname Exist-------------------------------------------------*/
public function checknameExist(Request $req){

  $flag = $this->model->checkNameExist($req->all());

  return $flag;

}

public function readNotification(Request $request){

  $ids = $request->id;

  $notificationids = explode(',',$ids);

  $readUpdate = $this->model->readNotification($notificationids);

  if($readUpdate==1){
    return 1;
  }

  else{
    return 0;
  }

 // print_r($readUpdate);

//   print_r($request->all());
//   $notificationRead = $this->model->readNotification($id);

//   if($notificationRead ==1){
//   return redirect('artist/my-offer')->with('success','Add Description!');
// }
// else{
//    return redirect('artist/my-offer')->with('error','Some Error!');
// }

}

/*------------------------------------------------Reset  Password---------------------------------------------------*/
    public function resetPassword(Request $req){

      Session::forget('login_attempt');   

      $email = $req->email;

      Session::put('email',$email);

     Mail::to($email)->send(new forgotPassword());
        return 1;
      

    }

    public function personal_info(Request $req){

             // print_r($req->all());

              unset($req['_token']);

              $done = $this->model->personal_info($req);

              if($done){

                return redirect('/artists/dashboard');

              }
    }

    public function reset(){
      
          return view('resetPass');
    }

    public function passwordReset(Request $req){

            $messages = [
              'password.regex'=>"Password must contain at least one number, one character and one special character (@#%^&,.)and minimum 8 characters all together",
          ];
            // print_r($_POST); die;
              $this->validate($req,[
                'password' => 'min:8|required_with:confirm|same:confirm|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.,()]).{8,}$/',
                'password.regex'=>"Password must contain at least one number, one character and one special character",
                'confirm' => 'min:8'
            ], $messages
            
            );

          $email = Session::get('email');

          $confirm = $req->confirm;

          $update = $this->model->updatePassword($email,md5($confirm));

        if($update!=''){
          return redirect('/reset')->with('success','Reset Successfull!');
        }

        else{
          return redirect('/reset')->with('error','Not Reset!');
        }
    
    }

/*-----------------------------------------------Order Video By User-----------------------------------------------------------------------------------------*/
      public function orderVideo(Request $request){

        $data = json_decode($request->allinfo);

        //print_r($request->all());die;

        $offerInfo = (array)$data;
        
          //print_r($offerInfo);die;


          //print_r($offerInfo['id']);die;
        Session::put('offer_artist_id',$offerInfo['id']);

        $offerInfo['created_at'] = $request->created_at;
        //$offerInfo['userid'] = 
        $offerInfo['updated_at'] = $request->updated_at;
        $offerInfo['status'] = 'new';
        $offerInfo['is_seen'] = 'no';
        $offerInfo['choice'] = $request->duration;
        $offerInfo['userdescription'] = $request->description ? $request->description : 'No Additional Requests' ;

        // print_r($request->all());

        // print_r($offerInfo);

        //die;

        $requestData = $this->model->buyofferVideo($request->all(),$offerInfo);
        //print_r($requestData);die;


          if($requestData==1 || $requestData=='1'){

            return response()->json(array('status'=>1, 'message'=>'Order Created Successfully!'));      

          }

          else
          {
            return response()->json(array('status'=>0, 'message'=>'Insufficient PAZ Tokens!'));
          }


      }

      public function duration(Request $request){

          //print_r($request->all());die;

          $updateInfo = $this->model->UpdateData('media','id',$request->all(),$request['id']);

          return $updateInfo;
      }


      public function playlistByid($playId){

              $data = $this->model->getPlaylistById($playId);

              return view('playlistdata',['playlist'=>$data]);

      }

      public function update_due_Status(Request $req){

       // print_r($req->all());die;

               $update = $this->model->update_due_to_process($req->all());
      }

      public function support_team(){

        return view('support-team');

      }

      public function seeOrder(){

       // $artistOfferId =   Session::get('offer_artist_id');
       $session_data =   Session::get('User');
   

       $userid =  $session_data->id;

        //print_r( $artistOfferId);die;

        //$userid=$session_data->id;

        $data= array(
          'is_seen'=>'yes'
        );

        //$this->model->UpdateData('offer','userid',$data,$userid);

            return view('all_orders');

      }


      public function getRequests($type){

        //print_r($type);die;

        $data = array();
      $show_requests = $type =='projects' ?  $this->model->showProjectsRequests() : $this->model->show_customer_orders();
  
       $data['data'] = $show_requests;

      //  echo "<pre>";

      //  print_r($data);die;
    
        echo json_encode($data);
  
      }



      public function technical_issue(Request $req){

        if($req->all()){

            $done = $this->model->customer_issue($req->all());
            
            

            $exis_user = $this->model->selectDataById('email','users',$req->customer_email);

            $exist_artist = $this->model->selectDataById('email','contentprovider',$req->customer_email);

           $mail =  (count($exis_user) > 0) ? "customer@pornartistzone.com" : ((count($exist_artist) > 0)  ? "artist@pornartistzone.com" : "contact@pornartistzone.com");

            if($done){

              Mail::to($mail)->send(new artistSupport($req->all()));
              return 1;

            }

           else{

            return 0;

           }



        }
      }

      public function checktitleExist(Request $req){

        $value = $this->model->selectDataById('title',$req['table'],$req['title']);


        return count($value) > 0 ? 1 : 0;
      }
      
      
      public function deletePlaylist1(Request $req){
          
          $data = $this->model->deleteListFromLibrary($req->all());
          
          return $data;
    //print_r($req->all());
}

      public function updateNoti(Request $req){


            $this->model->UpdateMediaNotification($req->id);

            $this->model->UpdateOFFERnOTI($req->id);

                //print_r($req->all());
      }


      public function reportVideo(Request $req){

                $data = $this->model->insertReport($req->all());

                return $data;
      }

      public function islegelOrNot(Request $req){

        $sessionLogin = Session::get('pazLogin');


        if($req->bool==-1){

          $array= array('is_report'=>-1,'team_user_id'=>$sessionLogin->id);

            $delete = $this->model->deleteIllegeContent($req->videoid);

            if($delete){

              $data = $this->model->selectDataById('id','contentprovider',$req->artistid);

              Mail::to($data[0]->email)->send(new email_reporting($data[0]->nickname));

            }

            $this->model->UpdateData('report_media','id',$array,$req->reportid);
        }

        else{

          $array= array('is_report'=>1,'team_user_id'=>$sessionLogin->id);


          $this->model->UpdateData('report_media','id',$array,$req->reportid);


        }

      }

      public function adminPanel(){

          return view('admin-panel');
      }
     
      public function CancelStatus(Request $request){
    
        $status = array('status'=>'Expired');

        $return  = $this->model->updateData('offer','id',$status,$request->id);

               return $return;

        }

        public function contentReview($text){

          $sessionLogin = Session::get('pazLogin');
      
          if($text=='offer'){

            $notVerifyContent = $this->model->getNotVerifiedContent('offer');

          }

          if($text=='collection'){

            $notVerifyContent = $this->model->getNotVerifiedContent('media');

          }

          
          if($text=='overview'){

            $notVerifyContent = $this->model->getNotVerifiedOverview('media');

          }

          if($text=='orders'){

            $notVerifyContent = $this->model->getNotVerifiedOrders('offer');

          }


          if($text=='picture'){

            $profile = $this->model->getArtistnotVerified('is_verified','profilepicture');
            $background = $this->model->getArtistnotVerified('background_verified','cover_photo');

            // echo "<pre>";

            // print_r($profile);

            // print_r($background);die;


          }


    
    
    
                  return view('reviewContent',['type'=>$text,'profile'=>$profile,'backgound'=>$background,'teamLogin'=>$sessionLogin,'notVerified'=>$notVerifyContent]);

        }

}