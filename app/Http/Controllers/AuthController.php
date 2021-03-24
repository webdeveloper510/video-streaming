<?php

namespace App\Http\Controllers;

use App\Registration;

use Session;

use App\File;

use View;

use Illuminate\Support\Facades\Validator;


use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Http\Request;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Mail;


use App\Mail\verifyEmail;

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


           //print_r($data);die;


           
            $recentSelected = Session::get('recentSearch');

       

               unset($data['_token']);

                //print_r($data);die;
              


         $search_data = $this->model->getVedio($data);  // GET SUBCATEGORY ID AND DATA USING FILTER 

           //echo "<pre>";
        
       

          $search=$search_data['search'];

         // print_r($search);die;

          //   if(Session::get('subid')){


          //       $sessionGet=Session::get('subid');

          //       //    print_r($sessionGet);die;

          //   }
          //   else{
          //       $resultSubId=$this->model->getSubcategoryById($sub);

              

          //        Session::put('subid',$resultSubId);

          // }




          $search_data->forget('search'); // Remove subcategory key from filter result data

      //print_r($search);die;

            if($recentSelected && $session_type=='User'){

              $this->recentData($search_data);

        }
         return view('/search',['search'=>$search,'video'=>$search_data,'subcategory'=>isset($sessionGet) ? $sessionGet : null]);
    }


    /*--------------------------------------------  End Filter Result--------------------------------------*/

    public function recentData($search_data){

           $this->model->insertRecentTable($search_data);
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

      

       $type =   Session::get('userType');
      if($type=='User'){
        return redirect('/');
    }
      return view('/withdraw',['passive_income'=>$passive,'tab'=>$navbaractive,'artistid'=>$artistId,'level_system'=>$level_system]);
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
     

      return view('report-media');
    }
    public function legal()
    {
     

      return view('legal-notice');
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

        return  $data['user']=='users' ?  redirect($redirect_url)->with('loginSuccess','Login Successfully!'): redirect('artists/dashboard')->with('success','Login Successfully!');

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
      public function home(){

        Session::forget('login_attempt');   



         $Recentlydata= $this->model->getRecentlySearch();

           $artists=$this->model->getArtists($paginate='No');

           $offersVideos = $this->model->getallOffer($paginate='No');

           $popularVideos = $this->model->PopularVideos($paginate='No','video');

           $popularaudios = $this->model->PopularVideos($paginate='No','audio');
      

          $newComes=$this->model->getNewComes();

    return view('/initial',['recently'=>$Recentlydata, 'artists'=>$artists, 'newComes'=>$newComes,'offers'=>$offersVideos,'popular'=>$popularVideos,'popularAudios'=>$popularaudios]);

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



    public function logout(Request $request){
      Session::forget('User');
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

              print_r($update_data);die;

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
      'media' => $request->radio=='video' ? 'required|mimes:mp4,ppx,pdf,ogv,webm':'required|mimes:mp3',
      'description'=>'required|max:2000',
      'title'=>'required|max:30',
      'price'=>'required|max:50000',
      //'category'=>'required', 
      'audio_pic'=>$request->radio=='audio' ? 'required|mimes:jpg,png,jpeg' : ''
  ]);
        
  if ($validator->fails())
  {
      return response()->json(['errors'=>$validator->errors()->all()]);
  }

       // print_r($request->all());die;
      if($request->media){
            $data=$request->all();
              $fileName = time().'_'.$request->media->getClientOriginalName();
              $audio_pics = $request->audio_pic ? time().'_'.$request->audio_pic->getClientOriginalName():'';
              $request->audio_pic ? $request->audio_pic->storeAs('uploads',$audio_pics,'public'): '';
              $ext =$request->media->getClientOriginalExtension();
              $filePath= $ext=='mp3' ? $request->media->storeAs('audio', $fileName, 'public') : $request->media->storeAs('video', $fileName, 'public');
                 $size=$request->media->getSize();
               $data['size'] = number_format($size / 1048576,2);
              unset($data['_token']);
              $data['media']=$fileName;

              $data['audio_pic'] = $audio_pics ? $audio_pics : '';
              $data['convert'] = $data['convert'] ? $data['convert'] : '';

              $data['type']=  $ext=='mp3' ? 'audio' : 'video'; 

                if($filePath){

                $update_data = $this->model->uploadContentProvider($data);
                  if($update_data){
                      return response()->json(array('status'=>1, 'messge'=>'Content Uploaded!'));
                    }
                    else
                    {
                        return response()->json(array('status'=>0, 'messge'=>'Some Eror!'));
                    }
              }
      }
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
  public function artistoffers($id){

    $data = $this->model->getofferByid($id);

     $artId = $data[0]->artistid;

    $isSubscribe =$this->model->isSubscribe($artId);

   
        
    return view('artistoffers',['offer'=>isset($data) ? $data :[],'isSubscribed'=>$isSubscribe]);

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
  

    $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
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


    $charge = \Stripe\Charge::create([
      'customer' => $cusid, 
      'currency' => 'USD',
      'amount' =>$data['amount']*100,
      'description' => 'wallet',
      ]);

    //print_r($charge);die;
    if((array)$charge){


      //   Here return 10 % passively to artist of fees
          
         
        $response = $this->model->insertTransection($charge,$data);

        if($response==1){

         

          if($userdata[0]->reffered_by!=0){

           // echo "hello";die;
      $amount = $input['fees'];
      $passive_amount = $amount*10/100;
    $insert_passive = $this->model->insertPaymentStatus($uid,$userdata[0]->reffered_by,'',$passive_amount,'passive-income');     
    $bonus_inserted_done = $insert_passive ? $this->model->insert_in_bonus($uid,$userdata[0]->reffered_by,$passive_amount) : 0;

    //print_r($bonus_inserted_done);die;
               
          }

            return $bonus_inserted_done;

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

         //print_r($data);die;

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

      if($insertid!=0){

         Mail::to($req->emails)->send(new notifyEmail($insertid));



      }      

    }

    public function notify($notifyId){

      $notId = base64_decode($notifyId);

      $up = $this->model->notifyConfirm($notId);

      if($up){

        echo 'yes';
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
   public function play(){

    $ids = Session::get('listid');

    //print_r($ids);die;

   

    $playName = $this->model->getAllPlaylist();


    $wishList = $this->model->getWishlist();

         

    $videos = $this->model->getVideosbyList();

    // echo "<pre>";

    // print_r($playName);die;

    $historyVideos = $this->model->getHistoryVideo();

  

     return view('play',['listname'=>$playName,'videos'=>$videos,'history'=>$historyVideos,'wishList'=>$wishList]);

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

       // print_r($data);die;

        if($data=='Insufficient Paz Tokens'){

            return response()->json(array('status'=>1, 'messge'=>'Insufficient Paz Tokens!'));
        }

        else if($data==1){

           return response()->json(array('status'=>1, 'messge'=>'Video Add Successfully!'));

        }

        else if($data=='Already'){

          return response()->json(array('status'=>1, 'messge'=>'Already Add in your library!'));

       }

        else{
             return response()->json(array('status'=>1, 'messge'=>'Some Error Occure!'));
        }


}


public function selectMultiple(Request $req){

        $idsData = $req->all();

        //print_r($idsData);die;
       

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

$cartVideo = $this->model->getVideoWhereIn($multipleIds);

       return response()->json($cartVideo);

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

       //print_r($multipleIds);

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

       

      
        $response =array();
        if($data ==='Insufficient Paz Tokens'){

        
          $response['status'] =1;
          $response['messge'] = 'Insufficient Paz Tokens!';
            
        }

        else if($data){

          $response['status'] =1;
          $response['messge'] = 'Video Add Successfully!';

          

        }

        else{

          $response['status'] = 1;
          $response['messge'] = 'Some Error Occure!';
            
        }

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

/*-----------------------------------------------Order Video By User-------------------------------------------------*/
      public function orderVideo(Request $request){

        $data = json_decode($request->allinfo);

        $offerInfo = (array)$data;

        $offerInfo['created_at'] = now();
        $offerInfo['updated_at'] = now();
        $offerInfo['status'] = 'new';
        $offerInfo['choice'] = $request->duration;
        $offerInfo['userdescription'] = $request->description ? $request->description : 'No Additioal Requests' ;

        $requestData = $this->model->buyofferVideo($request->all(),$offerInfo);


        //print_r($requestData);die;


          if($requestData==1){

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

        $artistOfferId =   Session::get('offer_artist_id');

        //print_r( $artistOfferId);die;

        //$userid=$session_data->id;

        $data= array(
          'is_seen'=>'yes'
        );

        $this->model->UpdateData('offer','id',$data,$artistOfferId);

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

            if($done){

              Mail::to('contact@pornartistzone.com')->send(new customer_issue($req->all()));
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

}