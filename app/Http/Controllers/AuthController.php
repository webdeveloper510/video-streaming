<?php

namespace App\Http\Controllers;

use App\Registration;

use Session;

use App\File;

use View;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Mail;


use App\Mail\verifyEmail;

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

    public function __construct(Request $request, Redirector $redirect)
    {


       
       $this->model= new Registration();



      

    }



    public function register(){
        
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


           
            $recentSelected = Session::get('recentSearch');

       

               unset($data['_token']);

                //print_r($data);die;


         $search_data = $this->model->getVedio($data);  // GET SUBCATEGORY ID AND DATA USING FILTER 


        //  print_r($search_data);die;
       

          $sub=$search_data['subcategory'];



            if(Session::get('subid')){


                $sessionGet=Session::get('subid');

                //    print_r($sessionGet);die;

            }
            else{


                $resultSubId=$this->model->getSubcategoryById($sub);

              

                 Session::put('subid',$resultSubId);

          }




          $search_data->forget('subcategory'); // Remove subcategory key from filter result data

         //print_r($search_data);die;

            if($recentSelected && $session_type=='User'){

              $this->recentData($search_data);

        }
         return view('/search',['video'=>$search_data,'subcategory'=>isset($sessionGet) ? $sessionGet : null]);
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
       $type =   Session::get('userType');
      if($type=='User'){
        return redirect('/');
    }
      return view('/withdraw');
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


             if($type=='contentUser'){
                
                 return redirect('artists/dashboard');

             }
             

         
            return view('login') ;     
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

            $data=$request->all();


            $get = $this->model->login($data);




             $redirect_url=Session::get('redirect_url');

    

            if($get==1 && $data['g-recaptcha-response']){
        return  $data['user']=='users' ?  redirect('/'.$redirect_url)->with('success','Login Successfully!'): redirect('artists/dashboard')->with('success','Login Successfully!');
            }

           else if($data['g-recaptcha-response']==''){

               return redirect('/login')->with('captcha','invalid Captcha!!');
           }
            else if($get=='Not Verify'){
              return redirect('/login')->with('error','Please Verify Your Email!');
            }
            else{
              return redirect('/login')->with('error','Invalid Email and Password!');
            }

      }
      public function home(){


         $Recentlydata= $this->model->getRecentlySearch();

           $artists=$this->model->getArtists($paginate='No');

           $offersVideos = $this->model->getallOffer($paginate='No');

           $popularVideos = $this->model->PopularVideos($paginate='No','video');
           $popularaudios = $this->model->PopularVideos($paginate='No','audio');

          //print_r($Recentlydata);die;

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
       // print_r($_POST); die;
        $this->validate($request,[
          'person'=>'required',
          'email'=>'required',
          'nickname'=>'required',
          'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
          'terms'=>'required',
          'AgeRestriction'=>'required'
      ]
      
      );

        $user = $request->person;


      unset($request['_token']);
      unset($request['terms']);
      unset($request['AgeRestriction']);
     //print_r($request->all()); die;
         $model = new Registration();

        if($request->person=='user'){


            unset($request['person']);
          //echo "yes";die;
           $get = $this->model->registration($request);
         }

         else{

            $get = $this->artistPost($request);
         }


       if($get){
        //echo "yes";die;
          Mail::to($request->email)->send(new verifyEmail($request,$get,$user));
         return redirect('/register')->with('success','Registration Successfull ! Please Verify To Login');
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

        $type=Session::get('userType');

        if($type=='User'){

           return redirect('/');
        }



      $data = $this->model->getCategory();
      //print_r($data);die;
      return view('content',['category'=>$data]);
    }
    public function contentProvider1(Request $request){

        if($request['gender']=='male'){
              unset($request['ass']);
              unset($request['titssize']);
              }

      $this->validate($request,[
        'image' => 'required|file',
       
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
            if($update_data==1){
                return redirect('artists/dashboard');
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
                      return redirect('artist/contentUpload#success')->with('success','Data Created Successfully!');
                    }
                    else
                    {
                        return redirect('artist/contentUpload#error')->with('error','Some Error Occure!');
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
  public function contentProv(){

    $contenttype =   Session::get('userType');
    if($contenttype=='User'){
      return redirect('/');
  }


   


    $subcategory=$this->model->getSubcategory($id='');

    return view('artists.provider',['subcategory'=>$subcategory]) ;

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

      //print_r($user);die;

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

  //         $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
  //       $customer = $stripe->customers->createBalanceTransaction(
  //       'cus_IHUegG2m98Pw2L',
  //       ['amount' => -500, 'currency' => 'usd']
  // );

      print_r($token);die;

      $input = $request->all();

      $userData = $this->model->getUserData($userId);

       $customerId = isset($userData[0]->customer_id) ? $userData[0]->customer_id : '';

       if($customerId){


            $charge = $this->createCharge($input,$customerId);/*---------------Call Create Charge Function-----------*/



                     if((array)$charge){

        Session::flash('test', array('test1', 'test2', 'test3'));
        return redirect('/paymentSuccess');


        }

       }

      else{

        $customerData = $this->createCustomer($input,$userData,$token);/*---------------Call Create customer Function-----------*/

          
          if((array)$customerData){

              $charge = $this->createCharge($input,$customerData->id);   //Create Charge

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

public function createCharge($data,$cusid){


    $charge = \Stripe\Charge::create([
      'customer' => $cusid, 
      'currency' => 'USD',
      'amount' =>$data['amount']*100,
      'description' => 'wallet',
      ]);

    //print_r($charge);die;
    if((array)$charge){


        $response = $this->model->insertTransection($charge,$data);

        if($response==1){

            return $charge;

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
         // 'price'=>'required_without_all:total',
        // 'total'=>'required_without_all|price',
          'title'=>'required',
          'min'=>'required|numeric|lt:max',
          'max'=>'required|numeric|gt:min',
          'categories'=>'required'
      ]
        );

         //print_r($req->all());die;

         unset($req['_token']);

        $add = $this->model->addRequest($req);

        if($add == 1){

          echo "yes";

            return redirect('/my-requests')->with('success','Thank You Your Request Sent Successfully!');
        }
        else{
          echo "no";
          return redirect('/')->with('success','Some Error Occure!');
        }

    }

    public function updateStatus(Request $request){

        //print_r($request->all());
        $updateStatus =  $this->model->updateStatus($request->all());

 $returnData= $updateStatus==1 ? response()->json(array('status'=>1, 'messge'=>'Updated Successfully!')) : response()->json(array('status'=>1, 'messge'=>'Already Exist'));

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

      $showOffer = $this->model->showOfer($data);

      return view('showoffer',['offer'=>$showOffer]);
      
    }

   
 public function seeNotification($text){

      $all_data = $this->model->allNotication($text);

      return view('notification',['viewName'=>$text, 'notification1'=>$all_data]);
  
}
   public function play(){

    $ids = Session::get('listid');

     //$wishlistids=Session::get('ids');

    //print_r($ids);

    $playName = $this->model->getPlayListName();

      $wishList = $this->model->getWishlist();

            //print_r($wishList);die;

    $videos = $this->model->getVideosbyList($ids);

    $historyVideos = $this->model->getHistoryVideo();

  

     return view('play',['listname'=>$playName,'videos'=>$videos,'history'=>$historyVideos,'wishList'=>$wishList]);

  }


public function selectListname(Request $request){

  //print_r($request->listname);die;

      Session::put('listname',$request->listname);

}
  public function listname(){

    $playName = $this->model->getPlayListName();

    // play

      return view('listname',['listname'=>$playName]);

  }
public function addToLibrary(Request $req){

        unset($req['_token']);

        $addTolibrary = $req->all();


        $data = $this->model->addToLibrary($addTolibrary);

        if($data=='Insufficient Paz Tokens'){

            return response()->json(array('status'=>1, 'messge'=>'Insufficient Paz Tokens!'));
        }

        else if($data==1){

           return response()->json(array('status'=>1, 'messge'=>'Video Add Successfully!'));

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

      echo "false";

        echo $idsData['id'];

        $pos = array_search($idsData['id'], $multipleIds);

       echo $pos;

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
    print_r($multipleIds);

}

public function addMultipleVideo(Request $req){


          $multipleIds = Session::get('SessionmultipleIds');

            $remove = $req['isRemove'];
        
        //print_r($req->all());
      
       if($remove=='yes'){

            echo "removed";

            echo $req['id'];

             $pos = array_search($req['id'], $multipleIds);

            echo $pos;

            unset($multipleIds[$pos]);

           Session::put('SessionmultipleIds',$multipleIds);
           $multipleIds = Session::get('SessionmultipleIds');

           print_r($multipleIds);

        
       }

        $cartVideo = $this->model->getVideoWhereIn($multipleIds);

            $all_play_lists = $this->model->getPlaylist();


        $total = $cartVideo['sum'];
        $result = $cartVideo['result'];

        //print_r($multipleIds);


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

   public function addToWish(Request $req){

    $multipleIds = Session::get('SessionmultipleIds');

    //print_r($multipleIds);

      $return = $this->model->addWishlist($multipleIds);

     // print_r($return);die;

      $returnData = $return==1 ? response()->json(array('status'=>1,'message'=>'Video Added Successfully!')) :response()->json(array('status'=>1, 'message'=>'Some Error Occure'));

      return $returnData;

      //

}

public function addmMltiple(Request $req){

         $addTolibrary = $req->all();

        // print_r($addTolibrary);die;

        $data = $this->model->addToLibrary($addTolibrary);

        //print_r($data);die;

        
        if($data=='Insufficient Paz Tokens'){

            return response()->json(array('status'=>1, 'messge'=>'Insufficient Paz Tokens!'));
        }

        else if($data==1){

           return response()->json(array('status'=>1, 'messge'=>'Video Add Successfully!'));

        }

        else{
             return response()->json(array('status'=>1, 'messge'=>'Some Error Occure!'));
        }
}

public function addTohistory(Request $req){

     // print_r($req->all());

      $this->model->addToHistory($req->all());

}

public function seeall($flag){
    // echo $flag;
     if($flag=='audio'){

      $audios = $this->model->PopularVideos($paginate='yes',$flag);

     }

     if($flag=='offer'){

      $videos = $this->model->getallOffer($paginate='yes');
    }

    if($flag=='video'){

      $videos = $this->model->PopularVideos($paginate='yes',$flag);

    }
    if($flag=='artists'){

            return redirect('/getArtists');

    }

   // print_r($videos);die;

    return view('getAlldata',['videos'=>isset($videos) ? $videos : '','audio'=>$audios]);
     
}

 }