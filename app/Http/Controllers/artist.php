<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use App\File;
//  use Stripe\Error\Card;

//use Stripe;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
  $path = base_path() . '/vendor';
require_once($path.'/autoload.php');
require_once($path.'/stripe/stripe-php/init.php');

class artist extends Controller
{
    private $model;

	  public function __construct(Request $request, Redirector $redirect)
    {
    		$this->model = new Registration();
    
      
    }
    //
    public function getArtists(){
   
      $artistData = Session::get('artistData');
      if($artistData){
        $artists = $this->model->getArtistsbyfilter($artistData);
      }
      else{
        $artists=$this->model->getArtists($paginate='');
      }
      
      $data = $this->model->getCategory();
      

    	return view('artists',['artists'=>$artists, 'category'=>$data]);
    }
    public function getRequests($type,$status=null){
      //echo $status;
      $data = array();
    $show_requests = $type =='projects' ?  $this->model->showProjectsRequests() : $this->model->show_offer_Requests($status);
  //   echo "<pre>";
  //  print_r($show_requests);die;
    $data['data'] = $show_requests;
    // echo "<pre>";
    //     print_r($data);die;
      echo json_encode($data);

    }

    public function showRequest($text=null){

      

      $navbaractive = 'requests';

      
      

        return view('artists.request',['tab'=>$navbaractive,'box'=>$text]);

    }


    public function artistDetail($artistid){

         Session::forget('SessionmultipleIds');
         
         $allArtistsVideo =     $this->model->getArtistDetail($artistid,'video');
         
         $allArtistsAudio=      $this->model->getArtistDetail($artistid,'audio');
        //   echo "<pre>";
        //  print_r($allArtistsAudio);die;

         $allArtistOffer =      $this->model->getArtistOffer($artistid);

         $subscriber =  $this->model->count_subscriber($artistid);

        //  echo "<pre>";
        //    print_r($subscriber);die;

           //$getLevel= $this->model->getlevel();

          $isSubscribe =         $this->model->isSubscribe($artistid);

         $onlyArtistDetail =      $this->model->onlyArtistDetail($artistid);

         $allPlaylist =      $this->model->getAllPlaylist();

       

         $category_data = $this->model->getCategory();      

         return view('artistDetail',['countSub'=>$subscriber,'cartVideo'=>'','details'=>isset($allArtistsVideo) ? $allArtistsVideo:[],'artist'=>$onlyArtistDetail,'playlist'=>isset($allPlaylist) ? $allPlaylist:[],'audio'=>isset($allArtistsAudio) ? $allArtistsAudio : [],'category'=> $category_data, 'offerData'=>isset($allArtistOffer) ? $allArtistOffer :[],'isSubscribed'=>$isSubscribe]);
    
  }

  

    public function cartSbmit(Request $req){
        
            $data=$req->all();

          
            $arrayId=Session::get('ids');

            if($arrayId){
          
                    if(!in_array($data['id'], $arrayId)){
                        
                        $arrayId[] =$data['id'];

                        Session::put('ids',$arrayId);
                    }

            }
            else{
              
                 $arr = array();
                 $arr[]=$data['id'];
                 Session::put('ids',$arr);
            }
            
              $arrayId=Session::get('ids');
               $insert = $this->model->addWishlist($arrayId);

              if($insert==1){
                return count($arrayId);
              }


           
    }

    public function cart(){
        $arrayId=Session::get('ids');
                
        $cartData= $this->model->getCart($arrayId);

        $totalPrice= $this->model->getTotalPrice($arrayId);

          //print_r($cartData);die;
        
        return view('cart',['cart'=>$cartData,'totalPrice'=>$totalPrice]);
    }

    public function artistProfile(){

    
        return view('artistProfile');
    }

    public function feed(){
      $tab='feed';
        return view('artists/feedartists',['tab'=>$tab]);
    }

    public function artistVideo($vedioid){
      
          $allVedios = $this->model->getVideo($vedioid);
          // echo "<pre>";
          // print_r($allVedios);die;

         $all_play_lists = $this->model->getPlaylist();

          $arrayId=Session::get('ids');
          $count=$arrayId ? count($arrayId) : '';
          $category_data = $this->model->getCategory();
  
       return view('artistVideo',['vedios'=>$allVedios,'listname'=>$all_play_lists,'category'=>$category_data, 'count'=>$count]);
    }



    public function createPlaylist(Request $request){

      $createList = $this->model->createPlaylist($request);

      if($createList==1){

      }
      else{

      }

}


    public function getRespectedSubId(Request $req){

     
        $subCategory = $this->model->getRespectedSub($req);

        $returnData= $subCategory ? response()->json($subCategory) : response()->json(array('status'=>0, 'messege'=>'No Data Found'));

        return $returnData;
        
      
    }

    public function dashboard()
    {

      $navbaractive = 'dashboard';

      $contentType =   Session::get('User');

      $info = $this->model->selectDataById('id','contentprovider',$contentType->id);


      if(array_key_exists(0,$info) && $info[0]->gender==''){

        return redirect('artist/edit');
      }

      $today_PAZ = $this->model->today_PAZ();

      $count_new_offer = $this->model->count_orders('offer');

      $count_process_project = $this->model->count_process_orders('offer');

      $count_new_projects = $this->model->count_orders('add_request');

       $dayDiffernce = $this->model->getDayDiffrence();

      $count_social_media = $this->model->getSocialMediaCount();

      $count_process_offer = $this->model->count_process_orders('add_request');

      $total_count = $count_new_projects + $count_new_offer;

      $total_process_offer = $count_process_offer + $count_process_project;

      $count_due_offer = $this->model->count_due_offer('offer');

      $totalCollection  =  $this->model->count_collection_items();

      //print_r($totalCollection);die;

      $getLevel= $this->model->getlevel();
      //print_r($getLevel);die;

      $percentage = $getLevel ? ($getLevel[0]->countsubscriber * 100)/$getLevel[0]->max :[];

      //print_r($dayDiffernce);die;

      $count_due_project = $this->model->count_due_offer('add_request');

      $count_result = array_merge($count_due_offer,$count_due_project);
       

      $monthly_PAZ = $this->model->month_PAZ();

      $year_PAZ = $this->model->year_PAZ();
      

      return view('artists.dashboard_home',['day_difference'=>$dayDiffernce,'social_count'=>$count_social_media,'totalCollection'=>$totalCollection,'personal_info'=>$info,'process_total'=>$total_process_offer,'levelData'=>$getLevel,'percentage'=>$percentage,'count_due_project'=>$count_result,'count_new_projects'=>$total_count,'today_paz'=>$today_PAZ,'contentUser'=>$contentType,'tab'=>$navbaractive,'month_paz'=>$monthly_PAZ,'year_PAZ'=>$year_PAZ]);

    }

    public function profile($text=null){

      $navbaractive = 'profile';

      $session_data =   Session::get('User');

      $userid=  $session_data->id;

      $allArtistsVideo =     $this->model->getArtistDetail($userid,'video');
         
      $allArtistsAudio=     $this->model->getArtistDetail($userid,'audio');

       $random =            $this->model->getRandomData();

      $allArtistOffer =      $this->model->getArtistOffer($userid);

      $quality = $this->model->getQuality();

      $getLevel= $this->model->getlevel();


      $allPlaylist =      $this->model->getAllPlaylist();

      //   echo "<pre>";

      // print_r($allArtistOffer);die;

      $contentLogin =   Session::get('User');
      
      return view('artists.profile',['collection_selection'=>$text,'getLevel'=>$getLevel,'random'=>$random,'qualities'=>$quality,'tab'=>$navbaractive,'contentUser'=>$contentLogin,'details'=>isset($allArtistsVideo) ? $allArtistsVideo:[],'playlist'=>isset($allPlaylist) ? $allPlaylist:[],'audio'=>isset($allArtistsAudio) ? $allArtistsAudio : [], 'offerData'=>isset($allArtistOffer) ? $allArtistOffer :[]]);

  }

  public function addDescription(Request $req){

      unset($req['_token']);

      $update = $this->model->updateArtistDes($req);

      if($update==1){

        return redirect('artist/requests');
      }
      //print_r($req->all());
  }

  public function offer(){

    $navbaractive = 'offer';

    return view('artists.offer',['tab'=>$navbaractive]);

  }

  public function createOffer(Request $req){

    


          $validator = \Validator::make($req->all(), [
            'media' => $req->type=='video' ? 'required|mimes:mp4,ppx,pdf,ogv,jpg,webm':'required|mimes:mp3',
            'title'=>'required',
            'offer_status'=>'required',
            'delieveryspeed'=>'required',
            'additional_price'=>'required',
            'quality'=>$req->type=='video'? 'required': '',
            'delieveryspeed'=>'required',
            'description'=>'required|max:2000',
            'category'=>'required',
            'price'=>'required|max:50000'
        ]);

        //print_r($req->all());die;
              
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

   
         

        if($req->media){

            $data=$req->all();
              $fileName = time().'_'.$req->media->getClientOriginalName();
              $ext =$req->media->getClientOriginalExtension();
              $audio_pics = $req->audio_pic ? time().'_'.$req->audio_pic->getClientOriginalName():'';
              $req->audio_pic ? $req->audio_pic->storeAs('uploads',$audio_pics,'public'): '';
              $filePath= $ext=='mp3' ? $req->media->storeAs('audio', $fileName, 'public') : $req->media->storeAs('video', $fileName, 'public');

              unset($data['_token']);
              $data['media']=$fileName;
              $data['categoryid']=$req->category;
              $data['type']=  $data['type'];
              $data['audio_pic'] = $audio_pics;
                if($filePath){

                $createOffer = $this->model->createOffer($data);
                  if($createOffer==1){
                    return response()->json(array('status'=>1, 'messge'=>'Offer Created!'));
                    }
                    else
                    {
                      return response()->json(array('status'=>0, 'messge'=>'Some Error Ocure!'));
                    }
              }
      }


  }

  public function offerpage($id){

    $navbaractive = 'withdraw';


    $offerData = $this->model->getOfferById($id);

    //print_r($offerData);die;

    return view('artists/offerpage',['offer'=>$offerData,'tab'=>$navbaractive]);

  }

  public function myoffer(){

    $navbaractive = 'offer';

     $offer = $this->model->getOffer();

    // print_r($offer);die;

    return view('artists.myoffer',['offer'=>$offer,'tab'=>$navbaractive]);
  }

  public function editDescription(Request $req){

            unset($req['_token']);

          $data = $this->model->editDescription($req);
          if($data==1){
            return redirect('/my-requests')->with('success','Updated Successfully!');
          }
    }


  public function editOffer(Request $req){

    //print_r($req->all());die;

    unset($req['_token']);

        $offer = $this->model->editOfferDescription($req);

        if($offer==1){

            return redirect('artist/my-offer')->with('success','Update Successfully!');
        }

        else{
          return redirect('artist/my-offer')->with('success','Error Occure!');
        }

  }

  public function addUserDescription(Request $req){

        unset($req['_token']);

        $success = $this->model->updateUserDesc($req);

        if($success ==1){
          return redirect('/showOffers')->with('success','Add Description!');
        }
        else{
           return redirect('/showOffers')->with('error','Some Error!');
        }
  }

  public function subscribe(Request $req){

          $subscriber = $this->model->subscribe($req->all());

          if($subscriber==1){

            return response()->json(array('status'=>1));

          }

          else{
            return response()->json(array('status'=>0));
          }

          
  }

  public function edit_offer(Request $req){    

    //print_r($req->all());die;
    
       $fileName = $req->file ? time().'_'.$req->file->getClientOriginalName() : '';

      $filePath = $req->file ? $req->file->storeAs('video', $fileName, 'public') : '';

      $req['media'] = $fileName ? $fileName : $req['file_url'];

        if($filePath || $filePath==''){ 

           $update_data = $this->model->editOfferDetail($req);

           return $update_data ? response()->json(array('status'=>1,'message'=>'Offer Edit Successfully!')) :  response()->json(array('status'=>0,'message'=>'Some Error Occure!'));
   }
  }

  public function change_image(Request $req){

    

    $filename= time().'_'.$req->image->getClientOriginalName();
    //print_r($filename);die;
    $filepath = $req->image->storeAs('uploads', $filename, 'public');

    //$req['profilepicture'] = $filename ;

    $update = $this->model->update_cover($filename,$req);

    return $update ? response()->json(array('status'=>1)) :  response()->json(array('status'=>0));

  }


  public function edit_info(Request $req){


        unset($req['_token']);

      // print_r($req->all());die;

        if($req->media || $req->audio_pic){

          $fileName = time().'_'.$req->media->getClientOriginalName();
          $audio_pics = $req->audio_pic ? time().'_'.$req->audio_pic->getClientOriginalName():'';
          $req->audio_pic ? $req->audio_pic->storeAs('uploads',$audio_pics,'public'):'';
          $ext =$req->media->getClientOriginalExtension();
          $filePath= $ext=='mp3' ? $req->media->storeAs('audio', $fileName, 'public') : $req->media->storeAs('video', $fileName, 'public');
          $size=$req->media->getSize();
          $data['size'] = number_format($size / 1048576,2);
          $data['media']=$fileName;
          $data['hid']=$req['hid'];
          $data['audio_pic'] = $audio_pics;
          $data['convert'] = $req['convert'] ? $req['convert'] : '';

          $inputData = Arr::except($req->all(),['media', 'hid','audio_pic','convert','radio']);

         // print_r($inputData);die;

          $data['type']=  $ext=='mp3' ? 'audio' : 'video'; 

        }
         

          //print_r($input);die;
        $update = $this->model->edit_other($inputData,$data);

        return $update ? response()->json(array('status'=>1,'message'=>'Update Successfully!')) :  response()->json(array('status'=>0,'message'=>'Some Error Occure'));
  }

  public function sendTip(Request $req ){

    //print_r($req->all());die;

    $update = $this->model->sendTip($req->all());

    return $update==1 ? response()->json(array('status'=>1,'message'=>'You Tipped!')) :  response()->json(array('status'=>0,'message'=>'InEfficient PAZ Tokens'));


  }

  public function draw_money(Request $req){

    $stripe = new \Stripe\StripeClient([
      'api_key'=>'sk_test_ChfSSXaILXyDtixAjzFD4sYx',
      "stripe_version" => "2020-08-27"]);

   $account = $stripe->accounts->create([
      'type' => 'custom',
      'country' => 'US',
      'email' => 'navdeep@codenomad.net',
      'capabilities' => [
        'card_payments' => ['requested' => true],
        'transfers' => ['requested' => true],
      //  'legacy_payments'=>['requested' => true]
       
      ],
      //'legal_entity' => "individual",
     'business_type'=>'individual',
      'individual'=>[
        'address' => [
          'city' => 'Athens',
          'country' =>'US' ,
          'state'=>'OH',
          'line1'=>'3096  Robinson Lane',
          'line2'=>'US',
          //'zip'=>45701
        ],
        'first_name'=>'Navdeep',

        'ssn_last_4'=>2212,
        'id_number'=>111122212,
        'last_name'=>'tondon',
        'email'=>'amit@codenomad.net',
        'phone'=>'8295013844',
        'dob'=>[
          'day'=>12,
          'month'=>11,
          'year'=>1998
        ]
        ],
       'business_profile'=>[
         'url'=>'http://pornartistzone.com/developing-streaming'
       ],
      'external_account'=>[
        'object'=>'bank_account',
         'country'=>'US',
         'currency'=>'USD',
         'account_number'=>'000123456789',
         'routing_number'=>'110000000'
      ]
      ]);

     print_r($account);die;

          if((array)$account){

           $transfer =  \Stripe\Transfer::create([
              'amount' => 4,
              'currency' => 'usd',
              'destination' => $account->id,
              'transfer_group' => 'ORDER_95',
            ]);

            // $payment_intent = \Stripe\PaymentIntent::create([
            //   'payment_method_types' => ['card'],
            //   'amount' => 1000,
            //   'currency' => 'usd',
            //   'application_fee_amount' => 4,
            //   'transfer_data' => [
            //     'destination' => $account->id,
            //   ],
            // ]);

            print_r ($transfer);
           
        }

  }

  public function support(){
    return view('artists/support',['tab'=>'dashboard']);
  }


  public function deleteOfer(Request $req){

    //print_r($req->all());die;

    $delete = $this->model->deleteoffer($req->all());

    if($delete){

          return 1;
    }

    else{
      return 0;
    }

  }

  public function socialUpload(Request $req){

    $this->validate($req,[
      'media' => 'required|mimes:mp4,ppx,mp3,pdf,ogv,jpg,webm',
     // 'description'=>'required|max:2000',
     // 'username'=>'required|max:30',   
  ]
    );

    //print_r($req->all());die;

    if($req->media){
      $data=$req->all();
        $fileName = time().'_'.$req->media->getClientOriginalName();
        $ext =$req->media->getClientOriginalExtension();
        $filePath= ($ext=='mp3') ? $req->media->storeAs('audio', $fileName, 'public') : (($ext=='mp4') ? $req->media->storeAs('video', $fileName, 'public'): $req->media->storeAs('uploads', $fileName, 'public'));
        unset($data['_token']);
        $data['media']=$fileName;
        $data['description'] = $data['description'] ? $data['description'] : '';
        $data['username'] = $data['username'] ? $data['username'] : '';
        $data['type'] = ($ext=='mp4') ? 'video' : (($ext=='mp3') ? 'audio' : 'image');

        
          if($filePath){

          $insert = $this->model->uploadSocialMedia($data);
          //print_r($insert);die;
            if($insert){
                return response()->json(array('status'=>1, 'messge'=>'Media Uploaded!'));
              }
              else
              {
                  return response()->json(array('status'=>0, 'messge'=>'Some Error!'));
              }
        }
}

  }

  public function updateartist(Request $req){
    
        $session_data =   Session::get('User');
        
        $userid =  $session_data->id;

    
    $session_data =   Session::get('User');
    
    $userid =  $session_data->id;

        unset($req['_token']);

           $updateInfo = $this->model->UpdateData('contentprovider','id',$req->all(),$userid);


              return $updateInfo;

  }

  public function showSocialMedia(){

      $socialVideo = $this->model->getSocialInfo('video');
      $socialAudio = $this->model->getSocialInfo('audio');
     // print_r($socialAudio);die;
      $socialImage = $this->model->getSocialInfo('image');

    return view('artists.support1',['social_video'=>$socialVideo,'social_audio'=>$socialAudio,'social_image'=>$socialImage]);

  }

  public function sendTimeFrame(Request $req){
        print_r($req->all());
  }

  }
