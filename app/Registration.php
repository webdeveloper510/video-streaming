<?php

namespace App;
use DB;
use Session;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Arr;

class Registration extends Model
{
    public function registration($data)
    {

        $value = $this->selectDataById('email','users',$data['email1']);

         $reffer_id = Session::get('reffer_by');
        if(!$value){
            $userdata=$data->all();
            $userdata['email']=$data['email1'];
            unset($userdata['email1']);
            unset($userdata['confirm']);
            $userdata['password']= md5($data['confirm']);

            $userdata['created_at']= now();
            $userdata['reffered_by']= $reffer_id ? $reffer_id : 0;
            $userdata['updated_at']= now();
                $insertedid=DB::table('users')->insertGetId($userdata);
           
            if($insertedid){
                $session_data =   Session::get('User');
                $userid= $session_data ? $session_data->id : $insertedid;
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
                return $inserted_data ? $insertedid :'0';

                }
            
         }
        else{
             return 0; 
        }
}

 public function postArtist($data)
    {
        $value = $this->selectDataById('email','contentprovider',$data['email1']);

        $reffer_id = Session::get('reffer_by');
        if(!$value){

            $userdata = $data->all();

            $userdata['password']= md5($data['confirm']);

            $userdata['email']= $data['email1'];

            unset($userdata['email1']);

            unset($userdata['confirm']);

            $userdata['created_at']= now();

            $userdata['updated_at']= now();

            $userdata['reffered_by']= $reffer_id ? $reffer_id : 0;
           
            $userdata['cover_photo']= '';
            
            $insertedid =  DB::table('contentprovider')->insertGetId($userdata);

            return $insertedid ? $insertedid : '0';
            
         }
        else{
             return 0; 
        }
}

        public function Contentlogin($data){
            $value = DB::table('contentprovider')->where(array(
                'email'=> $data->email,
                'password'=>md5($data->password)))
                ->get()
                ->first();
           // print_r($value);die;
                if(is_null($value)){
                    return 0;
                }
                else{
                    Session::put('User', $value);
                    Session::put('userType','contentUser');
                // $data->session()->put('User', $value);
                    return 1;
        }
}



public function getCart($cartid){

   $value = $this->selectDataById('id','media',$cartid);

       return $value;
}
public function getTotalPrice($cartid){
       $value=DB::table('media')
       
       ->select(DB::raw('SUM(price) as total_price'))

       ->whereIn('id',$cartid)->get();
       return $value;
}

public function uploadContentData($userdata){

     $array = array();

       $contentData=Session::get('User');

        $contentId=$contentData->id;

       //print_r($userdata);

    $value=DB::table('contentprovider')->where('id',$contentId)->get();
    if($value->count() > 0){

      foreach ($userdata as $key => $value) {

            if($key=='category'){
                $array['catid']=$value; 
              }

              else{

               $array[$key]= $value;
           }

  }
  
  $update = $this->UpdateData('contentprovider','id',$array,$contentId);

    //$update=DB::table('contentprovider')->where('id',$contentId)->update($array);

      //print_r($update);die;

      return $update ? 1 : 0;
      
    }

    else{
      return 0;
    }
}


      public function login($data){

        
         $table = $data['user'];
   
            $value = DB::table($table)->where(array(
              'email'=> $data['email'],
              'password'=>md5($data['password'])))
              ->get()
              ->first();
             
              
           $return = 0;
          

           if(is_null($value)){
             //echo "eee";die;
             $return = 0;
            }
              else{

                if($value->verify!=1){

                 // echo "if";

                 $return = 'Not Verify';
                }

                else{
           

    $data['user'] == 'users' ? Session::put('userType','User'): Session::put('userType','contentUser');
     Session::put('User', $value);
                  $return =1;
            }
            return $return;
              }


     
  

        
}
public function uploadDataFile($data){
    $session_data =   Session::get('User');

      $userid=$session_data->id;

      $data['titssize'] = $data['titssize'] ? $data['titssize']:'';
      $data['ass'] = $data['ass'] ? $data['ass']:'';
      $data['created_at'] = now();
      $data['updated_at'] = now();

      $update = $this->UpdateData('profiletable','userid',$data,$userid);

        return $update ? 1 : 0;
}
public function getContentProvider($type){
    $value=DB::table('media')->where('type', $type)->get();
    if($value->count()>=1){
        return $value;
    }

}



public function getVedio($data){


   
/* ----------------------------------------------Filter Data Using WhereIn-------------------------------------- */


  $result = DB::table('media')
          ->leftjoin('contentprovider', 'media.contentProviderid', '=', 'contentprovider.id')
          ->select('contentprovider.*', 'media.*')
          ->where(function($query) use ($data)
                {
                     foreach($data as $key=>$val){
                     
                  if(is_array($val))
                     $query->whereIn($key, $val);
                  
                }

                });

/* -------------------------------------------End Filter Data Using --------------------------- */

/* -------------------------------------------Filter Data Using -------------------------------- */

       foreach($data as $key=>$val){
           
          if($key=='price' || $key=='duration'){
             $val=='free' ? $result->where($key,$val) : $result->orderBy($key, $val);
          }

       }

       /* -----------------------End Filter Data Using orderBy-------------------------------------- */


                $response = $result->get();

      


                   $subid=$response->pluck("subid");
                    //print_r($subid);die;

                     $products = DB::table("subcategory")->whereIn('id', $subid)
                     ->pluck('id')
                     ->toArray();
                    $response['subcategory']=$products;

                     return $response;

   
}
/*-----------------------------------------Get Vedio By Subcategory -----------------------------*/

public function getSubcatVid($subid){

    $value=DB::table('media')->where('subid', $subid)->get();

    return $value;

}


/*-----------------------------------------End---------------------------------------------------*/


public function getNewComes(){

     $newComes = DB::table('media')->orderBy('contentProviderid','desc')->take(10)->get();
    return $newComes;

}


/*------------------------Insert Recent Vedio media--------------------------------------------*/

public function insertRecentTable($data){

     $fetchData=$data->pluck('id')->toArray();

     $insertData['mediaId']=implode(',', $fetchData);

      $session_data =   Session::get('User');

      $insertData['userId']= $session_data->id;

      $insertData['created_at']=now();

    $insertData['updated_at']=now();

     $insert=DB::table('recentmedia')->insert($insertData);
     if($insert){

        Session::forget('recentSearch');
     
     }
     
}
/*----------------------------------------------------End---------------------------------------------------*/
public function addCategorytable($category){
    $category['created_at']=now();
    $category['updated_at']=now();
    $sucess_insert=DB::table('category')->insert($category);
    return $sucess_insert ? '1' :'0';
}

public function getSubcategory(){
   $subcategory= DB::table('subcategory');
    return $subcategory->get();
}
public function insertSubcategory($sub){
     $sub['created_at']=now();
    $sub['updated_at']=now();
    $sucess_insert=DB::table('subcategory')->insert($sub);
      return $sucess_insert ? '1' :'0';
}
public function uploadContentProvider($contentdata){
    $session_data =   Session::get('User');
     $contentid=$session_data->id;
    //print_r($contentdata);die;
    unset($contentdata['email']);
   
    $contentdata['contentProviderid']=$contentid;
     $contentdata['catid']=$contentdata['category'];
    // $contentdata['subid']=1;
      unset($contentdata['category']);
      unset($contentdata['subcategory']);
      unset($contentdata['radio']);
    //$duration=$contentdata['hour'].':'.$contentdata['minutes'].':'.$contentdata['seconds'];
   // $timeArr = explode(':', $duration);
    // $contentdata['duration']= ($timeArr[0]*3600 ) + ($timeArr[1]*60) + ($timeArr[2]);
       $contentdata['duration']='';
    //  unset($contentdata['hour']);
    //  unset($contentdata['minutes']);
    //  unset($contentdata['seconds']);
    $contentdata['created_at']= now();
    $contentdata['updated_at']= now();
    $inserted_data =  DB::table('media')->insert($contentdata);
    return $inserted_data ? '1':'0';
}

public function getRecentlySearch(){
    $session_data =   Session::get('User');
    //print_r($session_data);die;
    if($session_data){
      //echo "ss";die;
          $usertid = $session_data->id;
           $data = array();
 $count = DB::table("recentmedia")->select('mediaId')->from('recentmedia')
                     ->where('userId',$usertid)->orderBy('id','desc')->take(1)->get()->toArray();
                   //  echo $count;die;
                //   print_r($count);die;
    if(count($count)>0){
        $media_array = explode(',',$count[0]->mediaId);
       // print_r($media_array);die;
         $data = DB::table("media")->select('*')
            ->whereIn('id',$media_array)
            //->toSql();
            ->get()
            ->toArray();
           
    }
    
     return $data;
    }
  
}

public function getArtists($flag){
    if($flag=='No'){

      $ArtistTimeFrame = DB::table('contentprovider')
      ->leftjoin('timeframe', 'contentprovider.id', '=','timeframe.artist_id')
      ->select('contentprovider.profilepicture', 'timeframe.timeframe','timeframe.created_at','contentprovider.id','contentprovider.nickname')
      //->where(array('contentprovider.id'=>$artid,'media.type'=>$type))
      //->orWhere('contentprovider.id',$artid)
      ->get()->toArray();

        return $ArtistTimeFrame;
     
    }
    else{

      $artists=DB::table('contentprovider')->paginate(10);
    }
  return $artists;
}

public function getArtistDetail($artid,$type){


      $artistsDetail = DB::table('contentprovider')
       ->leftjoin('media', 'contentprovider.id', '=','media.contentProviderid')
       ->select('contentprovider.*', 'media.*')
       ->where(array('contentprovider.id'=>$artid,'media.type'=>$type))
       //->orWhere('contentprovider.id',$artid)
       ->get()->toArray();

       if($artistsDetail){

           $data =  $artistsDetail;
       }

       else{
          //echo "yes";die;
          $artistsDetail = DB::table('contentprovider')
          ->where('id',$artid)
          ->get()
          ->toArray();
          $data =  $artistsDetail;

       }

       return $data;

  }


  public function count_subscriber($id){

         return DB::table('subscriber')->where('artistid',$id)->pluck('count')->toArray();
  }

  public function edit_other($profile,$data){


    $session_data =   Session::get('User');

    $contentid=$session_data->id;


    $update = $this->UpdateData('contentprovider','id',$profile,$contentid);


       $id=$data['hid'];

      unset($data['hid']);

      $update1 = $this->UpdateData('media','id',$data,$id);

      return $update1; 


   // print_r($update);die;

    

    

  }


  public function getQuality(){

    return DB::table('quality')->get()->toArray();
  }

  public function onlyArtistDetail($id){
    $details = DB::table('contentprovider')->where('id',$id)->get()->toArray();
    return $details;
  }

  public function getArtistOffer($artistId){

    //echo $artistId;die;

    $offer=DB::table('offer')
    ->join('category', 'category.id', '=','offer.categoryid')
    ->join('subscriber','subscriber.artistid','=','offer.artistid')
     ->select('offer.*', 'category.category','subscriber.count')
     ->where('offer.artistid',$artistId)
     ->get()->toArray();
      if($offer){
          return $offer;
      }

  }

public function getCategory(){
    $category = DB::table('category')->get()->sortBy('category')->toArray();
    return $category;
}

public function getVideo($vid){
  $videos=DB::table('contentprovider')
      ->leftjoin('media', 'contentprovider.id', '=','media.contentProviderid')
       ->select('contentprovider.*', 'media.*')
       ->where('media.id',$vid)
       ->get()->toArray();
       if($videos){
           return $videos;
       }
}

public function getRespectedSub($data){

    $value=DB::table('subcategory')->where('catid', $data->id)->get()->toArray();

    return $value;
}
    

    public function getSubcategoryById($subId){

      $value=DB::table('subcategory')->whereIn('id', $subId)->get()->toArray();

           return $value;

    }

    public function tokenExist($token){
      $data = DB::table('tokenpercentage')->where([
        ['min', '<=', $token],
        ['max', '>=', $token],
      ])->pluck('rateOfPercentage')->toArray();

      return $data;
    }

    public function getUserData($userId){

       $data = DB::table('users')
       ->join('profiletable', 'profiletable.userid', '=', 'users.id')
       ->select('profiletable.profilepicture', 'users.tokens','users.nickname')
       ->where('userid',$userId)
       ->get()->toArray();

       return $data;

    }

    public function insertTransection($charge,$input){

       $user=Session::get('User');

       $userId =$user->id;

        $transection = array(
          'created_at'=>now(),
          'updated_at'=>now(),
          'userid'=>$userId,
          'status'=>$charge->status,
          'transectionid'=>$charge->balance_transaction,
          'amount'=>$input['amount']

        );        

        $insert = DB::table('transection')->insert($transection);

        if($insert){

                 $token = $input['token'];


          $update = DB::table('users')->where('id',$userId)->update([

            'tokens' =>  DB::raw('tokens +'.$token),
            'customer_id' => $charge->customer

          ]);

                 return $update ? 1 : 0;

        }


    }

    public function verifyEmail($userId, $type){

      $table_name = $type == 'users' ? 'users' : 'contentprovider'; 

      $update = $this->UpdateData($table_name,'id',array('verify'=>1),$userId);


        return $update ? 1 : 0;

    }

    public function getArtistsbyfilter($filter){

             $result = DB::table('contentprovider')
                     ->where(function($query) use ($filter)
                        {
                             foreach($filter as $key=>$val){
                             
                          if(is_array($val))
                             $query->whereIn($key, $val,'or');
                          
                        }

                        })->paginate(10);
                    
                    return $result;

    }

    public function notifyMe($data){

        $data= $data->all();

     $data['created_at']=now();
    $data['updated_at']=now();
    $data['status'] = 0 ;
    $inserted=DB::table('all_emails')->insertGetId($data);
      return $inserted ? $inserted :'0';

    }

    public function notifyConfirm($notify){

      $data = array(

        'status'=> 1
      );

      $update = $this->UpdateData('all_emails','id',array('status'=>1),$notify);

     // $update = DB::table('all_emails')->where('id',$notify)->update($data);

      return $update ? 1 : 0 ; 

    }


    public function showProjectsRequests(){

     $data = DB::select("SELECT i.id,i.title,i.price,i.total_price,i.sexology,i.titssize,i.ass,i.privy,i.height,i.eyecolor,i.haircolor,i.hairlength,i.weight,i.duration, i.quality,i.delieveryspeed,i.artist_description, DATEDIFF(DATE(DATE_ADD(i.created_at, INTERVAL i.delieveryspeed DAY)),now()) as remaining_days ,i.status,i.description,i.media,i.userid,GROUP_CONCAT(c.category) as category_name,(SELECT nickname from users WHERE i.userid=users.id) as user_name FROM add_request i, category c, offer o WHERE FIND_IN_SET(c.id, i.cat) GROUP BY i.id,i.title,i.price,i.duration, i.total_price,i.artist_description ,i.quality, i.delieveryspeed,i.created_at,i.status,i.description,i.sexology,i.titssize,i.ass,i.privy,i.height,i.eyecolor,i.haircolor,i.hairlength,i.weight,i.media,i.userid");
     
         return $data;
    }

    public function show_offer_Requests($sts){
      //DB::enableQueryLog();
      
      $data = \DB::table("offer")
      ->select("users.nickname","offer.id","offer.title","offer.offer_status","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.userdescription","offer.description","offer.quality","offer.status",\DB::raw("GROUP_CONCAT(category.category) as catgories"),\DB::raw("DATEDIFF(DATE(DATE_ADD(offer.created_at, INTERVAL offer.delieveryspeed DAY)),now()) as remaining_days"))
      ->leftjoin("category",\DB::raw("FIND_IN_SET(category.id,offer.categoryid)"),">",\DB::raw("'0'"))
      ->leftjoin("users","users.id","=","offer.userid")
      ->groupBy("offer.id","offer.title","offer.created_at","offer.description","offer.offer_status","offer.quality","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.userdescription","offer.status","users.nickname");
     
       
      if ($sts) {
            //echo $sts;
        $data = $data->where('status', '=', $sts);
    }


      
         return $data->get();
    }

    public function show_customer_orders(){
      
      $data = \DB::table("offer")
      ->select("users.nickname","offer.id","offer.title","offer.offer_status","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.userdescription","offer.description","offer.quality","offer.status",\DB::raw("GROUP_CONCAT(category.category) as catgories"),\DB::raw("DATEDIFF(DATE(DATE_ADD(offer.created_at, INTERVAL offer.delieveryspeed DAY)),now()) as remaining_days"))
      ->leftjoin("category",\DB::raw("FIND_IN_SET(category.id,offer.categoryid)"),">",\DB::raw("'0'"))
      ->leftjoin("users","users.id","=","offer.userid")
      ->groupBy("offer.id","offer.title","offer.created_at","offer.description","offer.offer_status","offer.quality","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.userdescription","offer.status","users.nickname");
     
       
      if ($sts) {
            //echo $sts;
        $data = $data->where('status', '=', $sts);
    }


      
         return $data->get();
    }


    public function count_orders($table){

      $value=DB::table($table)->where('status','new')->count();

      return $value;



    }

    public function count_process_orders($table){

      $value=DB::table($table)->where('status','process')->count();

      return $value;


    }

    public function sendTip($data){

      //print_r($data);die;

      $session_data =   Session::get('User');

      $userid=  $session_data->id;

      $checkTokn = $this->selectDataById('id','users',$userid);

      $getData = $this->reduceTokens($checkTokn,$userid,$data['price'],$data['artistid']);

      $insert_in_payment = $getData==1 ? $this->insertPaymentStatus($userid,$data['artistid'],'',$data['price']):'';
      //print_r($getData);die;

      return $insert_in_payment;




    }

    public function count_due_offer($table){
        $current = date('Y-m-d');
        $data = DB::table($table)
        ->select(DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed-1 DAY)) as dates'))
       ->get()->toArray();

        return $data;
    }


    public function addRequest($data){



        $session_data =   Session::get('User');

        $reqData = $data->all();

        //print_r($reqData);die;

        $reqData['created_at']=now();

        $reqData['updated_at']=now();

         $reqData['userid'] =  $session_data->id ;

        $reqData['duration'] = $reqData['duration'];

        $reqData['total_price'] = $reqData['total'];
        $reqData['price'] = 0;

        $reqData['sexology'] = $reqData['sexology'] ? implode(',', $reqData['sexology']) : '';
        $reqData['titssize'] = $reqData['titssize'] ? implode(',', $reqData['titssize']) : '';
        $reqData['ass'] = $reqData['ass'] ? implode(',', $reqData['ass']) : '';
        $reqData['privy'] = $reqData['privy'] ? implode(',', $reqData['privy']) : '';
        $reqData['height'] = $reqData['height'] ? implode(',', $reqData['height']) : '';
        $reqData['eyecolor'] = $reqData['eyecolor'] ? implode(',', $reqData['eyecolor']) : '';
        $reqData['haircolor'] = $reqData['haircolor'] ? implode(',', $reqData['haircolor']) : '';
        $reqData['hairlength'] = $reqData['hairlength'] ? implode(',', $reqData['hairlength']) : '';
        $reqData['weight'] = $reqData['weight'] ? implode(',', $reqData['weight']) : '';
     

        $reqData['quality'] = $reqData['media']=='audio' ? '' : $reqData['quality'];

         $reqData['artist_description']= '';

        unset($reqData['total']);
    

       $category = implode(',', $reqData['categories']);

       unset($reqData['categories']);


       $reqData['cat'] = $category;



     //  print_r($reqData);die;

        $req = DB::table('add_request')->insert($reqData);

       

        return $req ? 1 : 0 ;
    }


    public function showUserRequests(){


          $session_data =   Session::get('User');
        $userid=  $session_data->id;


    $data = DB::select("SELECT i.id,i.title,i.price,i.artist_description,i.duration, i.description,i.media,i.userid,i.status,GROUP_CONCAT(c.category) as category_name, (SELECT nickname from users WHERE i.userid=users.id  ) as user_name FROM add_request i, category c WHERE FIND_IN_SET(c.id, i.cat) && i.userid=$userid GROUP BY i.id,i.title,i.artist_description,i.price,i.duration, i.status,i.description,i.media,i.userid");
  
        return $data;

    }



    public function updateStatus($data){

          $status= array(
            'status'=>$data['status']
          );


            $getData = $this->selectDataById('id','add_request',$data['key']);

              //print_r($getData);die;
         

         $update = DB::table('add_request')->where('id',$data['key'])->update($status);

         if($update==1){

               $session_data =   Session::get('User');

              $data= array(

              'created_at'=>now(),
              'updated_at'=>now(),
              'artistid'=>$session_data->id,
              'userid'=>$data['userid'],
              //'message'=>"Your request of'".$getData[0]['title'].'has been'." ".$data['status'],
              'message'=>"Your Request of "." ".$getData[0]->title." "."has Been"." ".$data['status'],
              'notificationfor'=>'user'
              );

              //print_r($data);

                $success = $this->insertNotification($data);
                


         }

        // print_r($update);die;

         return $success ? 1 : 0;

    }

    public function editOfferDetail($data){

         
           $update = array(
              'title'=>$data['title'],
              'price'=>$data['price'],
              'description'=>$data['description'],
              'categoryid'=>$data['category'],
              'min'=>$data['min'],
              'max'=>$data['max'],
              'type'=>$data['type'],
              'additional_price'=>$data['additional_price'],
              'offer_status'=>$data['offer_status'],
              'delieveryspeed'=>$data['delieveryspeed'],
              'quality'=>$data['quality'],
              'media'=>$data['media'],
           );
           //print_r($update);die;

           $update = $this->UpdateData('offer','id',$update,$data['offerid']);
           

           return $update ? 1 : 0;
    }

    public function selectDataById($key,$table,$where){

        $value=DB::table($table)->where($key, $where)->get()->toArray();

        return $value;

    }

    public function insertNotification($data){

      return DB::table('notification')->insert($data);

    }

    public function updateArtistDes($data){

        $description = $data->all();

         $status= array(
            'artist_description'=>$data['Description']
          );

      $update = DB::table('add_request')->where('id',$data['reqId'])->update($status);

      return $update ? 1 : 0 ;

    }


    public function createOffer($data){

        unset($data['category']);

         $session_data =   Session::get('User');
        $userid=  $session_data->id;

      $data['status'] = '';
      $data['offer_status'] = $data['offer_status'];
      $data['created_at'] = now();
      $data['updated_at'] = now();
       $data['by_created']=1;
       $data['quality'] = $data['quality'] ? $data['quality'] : '';


      $data['artistid'] = $userid;
      $data['userdescription'] = '';

      $data['userid'] =0;

      //print_r($data);die;


        $insert = DB::table('offer')->insert($data);


        return $insert ? 1 :0;

    }

    public function showOfer($data){

      // $key_value = array();

      // foreach($data as $key=>val){

      //       if(is_array($val)){

      //       }

      //       else{
      //             echo 'dd';
      //       }

      // }

    // print_r($data);die;

      
      $offers = DB::table('offer')
               ->leftJoin('category', function($join) use($data) {
                      //$join->where('category.id','=', $data['catid'][0])
                      $join->on("category.id", "=", "offer.categoryid");
              })
              ->whereIn('offer.categoryid', $data['catid'])
              ->orderBy('offer.price', $data['price'])
               ->select('offer.*','category.category')
               ->get();

               //echo "<pre>";

               return $offers;

      //   $result = $data;
      //  // print_r($result);die;
      //   $fetch = DB::table('offer')

      //   ->leftJoin('category',function($query) use ($result){

      //       foreach ($result as $key => $value) {

      //           if(is_array($value)){

      //             $query->where('category.id','=', $value)
      //             ->on("category.id", "=", "offer.categoryid");

      //             //$query->whereIn('categoryid',$value);

      //           }

      //           else{

      //             if($key=='price'){

      //               $query->orderBy('price',$value);
      //             }

      //             else{

      //              $query->where($key,$value);

      //            }
      //           }

      //       }

      //   })

      //   ->select('offer.*','category.*')

      //   ->get();

      //   print_r($fetch);die;

        // // echo "<pre>";

        // // print_r($fetch->get());die;

        //   return $fetch->get('A.*','B.*');

    }

    

    public function editDescription($data)

    {


        $session_data =   Session::get('User');
        $userid=  $session_data->id;

           $status= array(

            'description'=>$data['Description']
          );

        $update = DB::table('add_request')->where('id',$data['reqId'])->update($status);

        if($update==1){

           $value = $this->selectDataById('id','users',$userid);

            $data = array(
              'created_at'=>now(),
              'updated_at'=>now(),
              'read'=>0,
              'artistid'=>0,
              'userid'=>$userid,
              'message'=>'You`ve got a new Job-Request from'.$value[0]->nickname,
              'notificationfor'=>'artist'
            );

             $success = $this->insertNotification($data);

             return $success;
        }



    }

    

    public function readNotification($id){

        $data=array('read'=>1);

        $update = DB::table('notification')->whereIn('id',$id)->update($data);

        return $update ? 1 : 0;

    }

    public function getOffer(){



      return DB::table('offer')
      ->leftjoin('category','offer.categoryid','=','category.id')
      ->select('offer.*','category.category')
      ->get()
      ->toArray();

    }

    public function getofferByid($id){
      
      $offer=DB::table('offer')
    ->join('category', 'category.id', '=', 'offer.categoryid')
    ->join('contentprovider', 'contentprovider.id', '=', 'offer.artistid')
    ->join('subscriber','subscriber.artistid','=','offer.artistid')
     ->select('offer.*', 'category.category','subscriber.count','contentprovider.nickname')
     ->where('offer.id',$id)
     ->get()->toArray();
     if($offer){
         return $offer;
     }
    }

    public function editOfferDescription($data){

      //print_r($data->all());die;

         $session_data =   Session::get('User');
        $userid=  $session_data->id;

           $status= array(

            'description'=>$data['Description'],
            'userid'=>$data['user_id']
          );

        $update = DB::table('offer')->where('id',$data['reqId'])->update($status);

        if($update==1){

           //$value = $this->selectDataById('id','users',$userid);

            $data = array(
              'read'=>0,
              'artistid'=>$userid,
              'userid'=>$data['user_id'],
              'message'=>'Artist Edit Description',
              'notificationfor'=>'user'
            );

             $success = $this->insertNotification($data);

             return $success;
        }

    }

    public function getNotification(){

      $session_data =   Session::get('userType');

      //$userid=  $session_data->id;

         $count = $this->getCountofNotification(array('read'=>0,'notificationfor'=>$session_data=='User' ? 'user' : 'artist'));


        $data = DB::table('notification')->where('read',0)->orderBy('id','desc')->take(4)->get()->toArray();

           return array('count'=>$count,'notifications'=>$data);
    }


    public function getCountofNotification($where){

      $count = DB::table('notification')->where($where)->count();

      return $count;
      
    }

    public function updateUserDesc($userdata){

          $session_data =   Session::get('User');
        $userid=  $session_data->id;

      $data = array(

        'userdescription'=>$userdata['Description'],
        'userid' =>$userid
      );

      $update = DB::table('offer')->where('id',$userdata['reqId'])->update($data);

      if($update){

        $offerdescription = $this->selectDataById('id','offer',$userdata['reqId']);
        $nickname = $this->getUserProfile($userid);
        //print_r($nickname);die;
     $data = array(
        'created_at'=>now(),
        'updated_at'=>now(),
        'read'=>0,
        'artistid'=>$offerdescription[0]->artistid,
        'userid'=>$userid,
        'message'=>$nickname[0]->nickname." ".'Submit a request to your offer'." ".$offerdescription[0]->title,
        'notificationfor'=>'artist'
      );

             $success = $this->insertNotification($data);

             return $success ? 1 : 0;
      }

    }


    public function getUserProfile($uid){

       $value=DB::table('users')->where('id', $uid)->get()->toArray();
       return $value;

    }
    public function allNotication($user){

      $this->updateAllNotification($user);

      if($user=='user'){

         $session_data =   Session::get('User');
        $userid=  $session_data->id;


        $data=DB::table('notification')
        ->join('users', 'notification.userid', '=','users.id')
        ->join('profiletable','profiletable.userid','=','notification.userid')
         ->select('notification.*', 'users.*','profiletable.profilepicture')
         ->where('notification.notificationfor',$user)
         ->get()->toArray();
      }
      else{
        $data=DB::table('notification')
        ->leftjoin('contentprovider', 'notification.artistid', '=','contentprovider.id')
         ->select('notification.*', 'contentprovider.*')
         ->where('notification.notificationfor',$user)
         ->get()->toArray();
      }

      return $data;

    }

    public function updateAllNotification($user){

      $session_data =   Session::get('User');
      $userid=  $session_data->id;

      $status= array(

        'read'=>1
      );

      $update = DB::table('notification')->where($user=='user'?'userid':'artistid',$userid)->update($status);


  }

    public function createPlaylist($data){

        $result = $data->all();

        $insert  = DB::table('listname')->insert($result);

        return $insert ? 1 : 0;


    }

    public function getPlaylist(){

        $session_data =   Session::get('User');
        $userid=  $session_data->id;

       $value=DB::table('listname')->where('userid', $userid)->get()->toArray();

       return $value;

    }

    public function buyVideo($vid){

        $session_data =   Session::get('User');

        $userid=  $session_data->id;


        $checkTokn = $this->selectDataById('id','users',$userid);

        $token = $checkTokn[0]->tokens;

        if($token > $vid['price']){


       
         $value=DB::table('user_video')->where(array('userid'=>$userid,'type'=>'normal'))->get()->toArray();

        $return  = count($value) > 0 ? $this->updateUserVideo($userid,$vid,$token,'normal') : $this->insertUserVideo($userid,$vid,$token,'normal');

          return $return;

        }


    }

    public function updateUserVideo($uid,$video,$tok,$type){

         
     // print_r($video);die;

      if(isset($video['userdescription'])){

          $videoId = $video['id'];

          $getOffer = $this->selectDataById('id','offer',$videoId);

          //print_r($getOffer);die;

          unset($video['id']);
          unset($video['nickname']);
          unset($video['category']);
          unset($video['count']);

          $done = $getOffer[0]->userid==0 || $getOffer[0]->userid==$uid ? $this->updateOffer($videoId,$video):$this->insertOffer($video);

         // $insert  = DB::table('offer')->insert($video);

            $update = DB::table('user_video')->where(array('userid'=>$uid,'type'=>$type))
            ->update([
                  'videoid' => DB::raw("CONCAT(videoid,',".$videoId."')"),
                ]);
      }

      else{

        
             $update = DB::table('user_video')->where(array('userid'=>$uid,'type'=>$type))
            ->update([
                  'videoid' => DB::raw("CONCAT(videoid,',".$video['videoid']."')"),
                ]);
      }

      return $update;
    }

    public function insertUserVideo($uid,$video,$tok,$type){

      //print_r($video);die;
      if(isset($video['userdescription'])){

     


      $getOffer = $this->selectDataById('id','offer',$video['id']);
        $video_id = $video['id'];
      unset($video['id']);
      unset($video['nickname']);
      unset($video['category']);
      unset($video['count']);

      $done = $getOffer[0]->userid==0 || $getOffer[0]->userid==$uid ? $this->updateOffer($videoId,$video):$this->insertOffer($video);

      }
  
      $video_data['created_at'] = now();
      $video_data['updated_at'] = now();
      $video_data['userid'] =$uid;
      $video_data['videoid'] = isset($video['videoid']) ? $video['videoid'] : $video_id;
      $video_data['type'] = $type;

      $insert = DB::table('user_video')->insert($video_data);

      return $insert;

        // if($insert==1){

        //       $return = DB::table('users')->where(array('id'=>$uid))->update([
        //       'tokens' =>  DB::raw('tokens -'.$price)
        //       ]);
        //       if($return){
        //         $return = DB::table('contentprovider')->where(array('id'=>$artistId))->update([
        //           'token' =>  DB::raw('token +'.$price)
        //           ]);
        //       }
        //       return $return;
        // }

        // else{
        //   return 0;
        // }


      
    }

    public function updateOffer($vidid,$data){

          //print_r($data);die;

      $return = DB::table('offer')->where(array('id'=>$vidid))->update([
        'userdescription' =>$data['userdescription'],
        'choice'=>$data['choice'],
        'userid'=>$data['userid']
        ]);

        return $return;


    }

    public function insertOffer($data){



      $insert  = DB::table('offer')->insert($data);

      return $insert;
    }

    public function addToLibrary($lists){

      $newData =array();

      //print_r($lists);die;

        $session_data =   Session::get('User');

        $userid =  $session_data->id;

        $tokens = $lists['price'];

        //$lists['art_id'] = $lists['art_id'];

         $listname = Session::get('listname');

        $lists['playlistname'] = $listname;

       // print_r($lists);die;
        $newData = array_key_exists("videoid",$lists) ? $lists['videoid'] : Session::get('SessionmultipleIds');

        

        $videoIds = (is_array($newData)) ? implode(',',$newData):'';
      
        
        $lists['userid'] = $userid;

        $ids[]  = $newData ;

       // print_r($ids);die;

        //$lists['videoid'] = $videoIds;

        

        $return = 0;

        //print_r($ids);die;

        $tokensData = $this->selectDataById('id','users',$userid);
   
          
    $data = DB::table('playlist')->where(array('userid'=>$userid,'playlistname'=>$listname))->get()->toArray();


      if($tokens < $tokensData[0]->tokens){

      //echo "yes";die;

        if(count($data)>0){


        $newArray = explode(",",$data[0]->listvideo);
        
      
       
 
   $aunion=  array_merge(array_intersect($ids, $newArray),array_diff($ids, $newArray),array_diff($newArray, $ids));

  $result_array = array_unique($aunion);

    $newListid = implode(',',$result_array);

    //print_r($lists);die;

     $update = DB::table('playlist')->where(array('userid'=>$userid,'playlistname'=>$listname))->update([
            'listvideo' =>$newListid  //DB::raw("CONCAT(listvideo,',".$videoid."')")
          ]);

      //print_r($update);die;

         if(isset($update)){         

              $data = \DB::table("user_video")
              ->select("user_video.*")
              ->whereRaw("find_in_set('".$lists['videoid']."',user_video.videoid)")
              ->get();
                  if(count($data)<1){

                    //echo "yes";die;

                 $buyed = $this->buyVideo($lists);


                $reduce  = $buyed  ? $this->reduceTokens($tokensData,$userid,$tokens,$lists['art_id']): 0;

                              
                $status_succedd = $reduce  ? $this->insertPaymentStatus($userid,$lists['art_id'],$videoIds ? $videoIds : $ids[0],$tokens) : 0;

                $return = $status_succedd;

            }
            else{
              $return = 'Already';
            }

         }

         else
         {
           //echo "yes";die;
           $return =   false;
         }  

        }

        else {
           $playlist['listvideo'] = $videoIds;
           $playlist['userid'] = $userid;
           $playlist['playlistname'] = $listname;

            $tokens = $tokensData[0]->tokens;
            $playlist['created_at'] = now();
            $playlist['updated_at'] = now();

            //print_r($playlist);die;

          $insert  =DB::table('playlist')->insert($playlist);

          $buyed = $this->buyVideo($lists);

          $returnData = $buyed ? $this->reduceTokens($tokensData,$userid,$tokens,$lists['art_id'])  : 0 ;

          $status_succedd = $returnData ? $this->insertPaymentStatus($userid,$lists['art_id'],$videoIds ? $videoIds : $ids[0],$tokens) : 0;

          //print_r($status_succedd);
          $return = $status_succedd;
        }

       

    }

    else{

      $return = 'Insufficient Paz Tokens';
    }

    //print_r($return);die;
    return $return;
  }

  public function insertPaymentStatus($uid,$artid,$vid,$paz){

    //echo $uid.$artid.$vid.$paz;die;

    $payment = array(
      'created_at'=>date("Y-m-d H:i:s"),
      'updated_at'=>date("Y-m-d H:i:s"),
      'userid'=>$uid,
      'artistid'=>$artid,
      'mediaid'=>$vid,
      'status'=>'success',
      'tokens'=>$paz
    );

    $insert_payment  = DB::table('payment_token')->insert($payment);

    //print_r($insert_payment);die;
  
    return $insert_payment;

  }

  public function personal_info($data){

    //print_r($data->all());die;

    $session_data =   Session::get('User');

    $userid =  $session_data->id;

    $update = DB::table('contentprovider')->where(array('id'=>$userid))->update($data->all());

    return $update ? 1 : 0;

  }

  public function month_PAZ(){

    $session_data =   Session::get('User');

    $userid =  $session_data->id;

      $value=DB::table('payment_token')
      ->select(DB::raw('SUM(tokens) as total_token'))
      ->where('artistid',$userid)
      ->whereMonth('created_at',Carbon::now()->month)
      ->get()->toArray();

            return $value;


  }

  public function year_PAZ(){

    $session_data =   Session::get('User');

    $userid =  $session_data->id;

      $value=DB::table('payment_token')
      ->select(DB::raw('SUM(tokens) as total_token'))
      ->where('artistid',$userid)
      ->whereYear('created_at',Carbon::now()->year)
  
         ->get()->toArray();

          return $value;
  }

public function reduceTokens($tokns,$userid,$tok,$artid){

  //print_r($artid);die;

  $databasetoks = $tokns[0]->tokens;

  //print_r($databasetoks);die;

        if($tok < $databasetoks){
         //echo "yes";die;
             $update = DB::table('users')->where(array('id'=>$userid))->update([
            'tokens' =>  DB::raw('tokens -'.$tok)
          ]);

            if($update){

              $update = DB::table('contentprovider')->where(array('id'=>$artid))->update([
                        'token' =>  DB::raw('token +'.$tok)
                          ]);

            }

           // print_r($return);die;

             return $update ? 1 : 0;

        }

        else
        {
       
            return 'Insufficient Paz Tokens';
        }
}

public function today_PAZ(){

      $session_data =   Session::get('User');

      $userid =  $session_data->id;

      $value=DB::table('payment_token')->where('artistid',$userid)
      ->whereDate('created_at', Carbon::now()->format('Y/m/d'))
      
      ->get()->toArray();

          return $value;

}

public function createList($create){

    $data['listname'] = $create->listname;

     $session_data =   Session::get('User');

    // print_r($create->all());die;

        $userid =  $session_data->id;

        $data['created_at']= now();

        $data['updated_at']= now();

        $data['userid']= $userid;

        //print_r($data);die;

        $insert  = DB::table('listname')->insert($data);

        return $insert ? 1 :0 ;




}

public function getAllPlaylist(){

      $data = \DB::table("playlist")
      ->select("playlist.id","playlist.playlistname",\DB::raw("GROUP_CONCAT(media.media) as videos"))
      ->leftjoin("media",\DB::raw("FIND_IN_SET(media.id,playlist.listvideo)"),">",\DB::raw("'0'"))
      ->groupBy("playlist.id","playlist.playlistname")
      ->get();

    return $data;
}

public function getPlayListName(){

    $session_data =   Session::get('User');

    $userid =  $session_data->id;

         $value=DB::table('playlist')->where('userid', $userid)->get()->toArray();

         return $value;

}


public function getPlaylistById($id){

      $data = \DB::table("playlist")
      ->select("playlist.id","playlist.playlistname",\DB::raw("media.media as videos"))
      ->leftjoin("media",\DB::raw("FIND_IN_SET(media.id,playlist.listvideo)"),">",\DB::raw("'0'"))
      ->groupBy("playlist.id","playlist.playlistname","media.media")
      ->where('playlist.id', $id)
      ->get();
    

    return $data;

}



public function addWishlist($data1){

    //print_r($data1);die;

  unset($data1['_token']);

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

 $data = $this->selectSingleById('userid','wishlist',$userid);


 
 
 if($data){
     $newArray =  explode(",",$data[0]);
    $aunion=  array_merge(array_intersect($data1, $newArray),array_diff($data1, $newArray),array_diff($newArray, $data1));
     
    $result_array = array_unique($aunion);
 }
 
 $returnData = count($data) >0 ? $this->updateWishlist(implode(',',$result_array),$userid) : $this->insertWishlist($data1,$userid);
 //print_r($returnData);die;
 return $returnData;

  
}

public function selectSingleById($key,$table,$where){

  $value=DB::table($table)->where(array($key=>$where))->pluck('videoid')->toArray();

  return $value;

}

public function updateWishlist($data,$uid){

      $update = DB::table('wishlist')->where(array('userid'=>$uid))
      ->update([
            'videoid' => $data//DB::raw("CONCAT(videoid,',".$data[0]."')"),
          ]);

      return $update;

}

public function insertWishlist($data,$uid){
        $array= array(
          'created_at'=>now(),
          'updated_at'=>now(),
          'userid'=>$uid,
          'videoid'=>$data[0]
        );
              $insert = DB::table('wishlist')->insert($array);

              return $insert;

  
}

public function getVideosbyList($id){


   $value=DB::table('playlist')->where(array('id'=>$id))->pluck('listvideo')->toArray();

   if($value){

          $ids = explode(',',$value[0]);

          $videos = DB::table("media")->whereIn('id', $ids)->get()->toArray();

         return $videos;

       }

}

public function addToHistory($data){
  $session_data =   Session::get('User');
  $userid =  $session_data->id;
  $data1 = $this->selectSingleById('userid','history',$userid);
  $popularData = $data;

  unset($data['types']);


  $returnadata = count($data1) > 0 ? $this->updateHistory($data,$userid,$data1) : $this->insertHistory($data,$userid);

   $this->getPopularTable($popularData,$userid);
      
}

public function getPopularTable($post,$uid){

  $vid = $post['id'];

  $videos = DB::table("popular")->where(array('userid'=>$uid,'mediaid'=>$vid))->get()->toArray();

    $return = count($videos) > 0 ? $this->updatePopular($post,$uid) : $this->insertPopular($post,$uid);

}

public function updatePopular($data,$uid){

      $count = 1;

      $update = DB::table('popular')->where(array('userid'=>$uid,'mediaid'=>$data['id']))->update([
        'count' =>  DB::raw('count +'.$count)
      ]);

        return $update ? 1 : 0;

}

public function PopularVideos($flag,$type){


  $videoId1 =  DB::table('popular')->where('type',$type)->orderBy('count','desc')->pluck('mediaid')->toArray();


      if($flag=='No'){


        $videos = DB::table("media")->whereIn('id', $videoId1)->take(3)->get()->toArray();

      }
      else{

        $videos = DB::table("media")->whereIn('id', $videoId1)->paginate(30);

      }
// echo "<pre>";
//       print_r($videos);die;

    return $videos;
}

public function insertPopular($data,$id){
  $popular = array(
    'created_at'=>now(),
    'updated_at'=>now(),
    'userid'=>$id,
    'mediaid'=>$data['id'],
    'type'=>$data['types']
  );

  $insert = DB::table('popular')->insert($popular);

  return $insert;

}

public function updateHistory($postdata,$uid,$tableData){



  $newArray =  explode(",",$tableData[0]);
 
  $aunion=  array_merge(array_intersect($postdata, $newArray),array_diff($postdata, $newArray),array_diff($newArray, $postdata));
   
  $result_array = array_unique($aunion);

  

      $updatedId = implode(",",$result_array);

  
      $update = DB::table('history')->where(array('userid'=>$uid))
      ->update([
            'videoid' =>  $updatedId//DB::raw("CONCAT(videoid,',".$data[0]."')"),
          ]);

      return $update;




}

public function getHistoryVideo(){

  $session_data =   Session::get('User');
  $userid =  $session_data->id;

  $videos = DB::table("history")->where(array('userid'=>$userid))->get()->toArray();
  $videoId = $videos ? $videos[0]->videoid:'';
  $arrayId = explode(",",$videoId);

  $all_videos = DB::table("media")->whereIn('id', $arrayId)->get()->toArray();
  return $all_videos;
}

public function getallOffer($flag){
        if($flag=='No'){

          return  DB::table('offer')
          ->leftjoin('category','offer.categoryid','=','category.id')
          ->select('offer.*','category.category')
          ->take(3)
          ->get()
          ->toArray();
        }
  else{

    $code = DB::table('offer')
    ->where('by_created',1)
    ->paginate(3);
    return $code;
  }
}

public function getallOffers(){

   $batch_data = DB::table('offer')->orderBy('id', 'DESC')->where('by_created', '=' , 1)->first();
 
   return $batch_data;


}

public function insertHistory($postData,$uid){
        $id = $postData['id'];

       $tableData = array(
            'created_at' => now(),
           'updated_at' => now(),
            'userid'=> $uid,
            'videoid' => $id
       );

       return DB::table('history')->insert($tableData);

}
public function getWishlist(){

  $session_data =   Session::get('User');
  $userid =  $session_data->id;

  $value=DB::table('wishlist')->where(array('userid'=>$userid))->pluck('videoid')->toArray();


  if($value){

       $ids = explode(',',$value[0]);

        $videos = DB::table("media")->whereIn('id', $ids)->get()->toArray();


         return $videos;
    }

}

public function getVideoWhereIn($mutli){
      
            $value = DB::table("media")

            ->select(DB::raw('*'))
          
            ->whereIn('id', $mutli)
            //->groupBy('id','media','price')
            ->get()->toArray();

            //print_r($value);die;

       $sum = array_sum(array_column($value, 'price'));
        return ['result'=>$value,'sum'=>$sum];

}


public function uploadSocialMedia($data){

  $session_data =   Session::get('User');
  $userid =  $session_data->id;

  $data['created_at']=now();
  $data['artist_id']=$userid;
  $data['updated_at']=now();


   return DB::table('social_media')->insert($data);

}


public function getSocialMediaCount(){

  $session_data =   Session::get('User');
  $userid =  $session_data->id;

   $count = DB::table('social_media')->where('artist_id',$userid)->count();

   return $count;


}

public function checkNameExist($data){

  //print_r($data);die;

   $tablename = $data['table'];

   $name = $data['nickname'];
   $feildname = $data['name'];

   $field = $feildname=='nickname' ? 'nickname':'email';

   $dataExist = $this->checkInTable($field,$name);


    return  count($dataExist) > 0 ? 1 : 0; 

   

}

public function checkInTable($field,$val){

      $table =  array('users','contentprovider');

      for($i=0; $i<count($table); $i++){

        $value=DB::table($table[$i])->where($field, $val)->get()->toArray();

          if($value){

            return $value;

              break;
          }

      }
}

public function updatePassword($email,$password){

  
  $value = $this->selectDataById('email','users',$email);

 

  if(count($value) > 0){

    //echo "yes";

    $update = DB::table('users')->where(array('email'=>$email))->update([
      'password' =>  $password
    ]);
  
      
  }

  else{

    $update = DB::table('contentprovider')->where(array('email'=>$email))->update([
      'password' =>  $password
    ]);

  }

  //print_r($update);die;

  return $update;


}

/*----------------------------------------------------Buy Offer --------------------------------------------------------------- */
    
     
public function buyofferVideo($data,$offer){

      unset($data['_token']);

      $ids = $data['user_id'];

      $session_data =   Session::get('User');

      $userid =  $session_data->id;

      $offer['userid'] = $userid;

      $id = explode('_',$ids);

      $checkTokn = $this->selectDataById('id','users',$userid);

      $return  = 0;
    

      $token = $checkTokn[0]->tokens;

      if($token > $data['price']){

        $value=DB::table('user_video')->where(array('userid'=>$userid,'type'=>'offer'))->get()->toArray();

        //print_r($value);die;

       $return  = count($value) > 0 ? $this->updateUserVideo($userid,$offer,$token,'offer') : $this->insertUserVideo($userid,$offer,$token,'offer');

        $reduced =  $return ? $this->reduceTokens($checkTokn,$userid,$data['price'],$data['art_id']): 0;

        $status_succedd = $reduced  ? $this->insertPaymentStatus($userid,$data['art_id'],$id[0],$data['price']) : 0;

          $return = $status_succedd;
    }

    else{

      $return =  0;
    }

    return $return;

}

/*-----------------------------------------------------------Subscribed To Artist--------------------------------------------------------- */


  public function subscribe($data){

          $session_data =   Session::get('User');

          $userid =  $session_data->id;

            $return = DB::table('subscriber')
      
            ->Where('artistid',$data['id'])

            ->get();

            $returnData = count($return) > 0 ? $this->updateSubscriberCount($userid,$data,$return): $this->insertSubscriber($userid,$data); 

            return $returnData;

}


public function updateSubscriberCount($uid,$data,$tableData){

  $userIds = $tableData[0]->userid;
  $count = 1;
  $ids = explode(',',$userIds);

  //print_r($data);die;

    if($data['bool']=='false'){

      //echo "yes";die;

          $update = $this->unsubscribe($ids,$uid,$data,$count);

          return $update;
    }

    else{

            if (!in_array($uid, $ids))
            {
              
                  $update = DB::table('subscriber')->where(array('artistid'=>$data['id']))
                ->update([
                    'userid' => DB::raw("CONCAT(userid,',".$uid."')"),
                    'count' =>  DB::raw('count +'.$count),
                    ]);
            
                  return $update;
            }
        }

}

public function unsubscribe($allIds,$userid,$postData,$count){

      $index = array_search($userid, $allIds);

      unset($allIds[$index]);

   

  $update = DB::table('subscriber')->where(array('artistid'=>$postData['id']))

  ->update([
        'userid' =>implode(',',$allIds),
        'count' =>  DB::raw('count -'.$count)
      ]);

    return $update;

}

public function isSubscribe($artistId){

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

  $isSubscribe = DB::table('subscriber')
  ->whereRaw('FIND_IN_SET(?,userid)',[$userid])
  ->Where('artistid',$artistId)
  ->get();

  return count($isSubscribe) > 0 ? true : false;

}

public function insertSubscriber($uid,$data){

  //print_r($data);die;

        $subscriber = array(
          'created_at'=>now(),
          'updated_at'=>now(),
          'artistid'=>$data['id'],
          'userid'=>$uid,
        );

        $insert = DB::table('subscriber')->insert($subscriber);

        return $insert;

}

public function update_cover($data,$req){

 // print_r($data->all());die;

    $session_data =   Session::get('User');

      $userid =  $session_data->id;

   

     $update = DB::table('contentprovider')->where(array('id'=> $userid))

     ->update([
           $req['image_type'] =>$data
         ]);
   
       return $update;

}


public function getlevel(){

  $session_data =   Session::get('User');

    $userid =  $session_data ? $session_data->id : '';

  $data = DB::select("SELECT level_name, id,fees, max,(SELECT count  FROM subscriber WHERE artistid=$userid) as countsubscriber FROM levelsystem as ls WHERE (SELECT count FROM subscriber WHERE artistid=$userid) BETWEEN ls.min AND ls.max");
    //print_r($data);die;
return $data;


  
}

public function count_collection_items(){

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

        return DB::table('media')->where('contentProviderid',$userid)->get()->count();
}


public function getSubscribeArtist(){


  $session_data =   Session::get('User');

  $userid =  $session_data->id;

  $subscriber_artist = DB::table('contentprovider')
       ->leftjoin('subscriber', 'subscriber.artistid', '=','contentprovider.id')
       ->select('contentprovider.nickname')
       ->whereRaw("find_in_set('".$userid."',subscriber.userid)")
       ->get()->toArray();

       if($subscriber_artist){
           return $subscriber_artist;
       }

}

public function getDayDiffrence(){

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

  $value=DB::table('media')
       
  ->select(DB::raw("DATEDIFF(DATE(DATE_ADD(created_at, INTERVAL 30 DAY)),now()) as difference"))

  ->where('contentProviderid',$userid)->skip(2)->take(1)->first();

  return $value;

}


public function update_due_to_process($data){

  //print_r($data);die;

     $table = $data['type']=='request' ? 'add_request' : 'offer';

  $update = DB::table($table)->where('id',$data['id'])->update([

    'status' => 'process'

  ]);

  return $update;

}


public function getSocialInfo($type){

         $data =  DB::table('social_media')
          ->leftjoin('contentprovider', 'contentprovider.id', '=','social_media.artist_id')
          ->select('contentprovider.nickname', 'social_media.*')
          ->where('social_media.type',$type)
          ->get()->toArray();
            
          return $data;

}

    public function deleteoffer($data){

     return DB::table('offer')->where('id', $data['id'])->delete();


    }

    public function getRandomData(){

      $session_data =   Session::get('User');

      $userid =  $session_data->id;

      $random  = DB::table('media')
      ->where('contentProviderid',$userid)
      // ->inRandomOrder()
      ->limit(1)
      ->get()
      ->toArray();

      return $random;

    }

    public function insert_data($data){

      //print_r($data);die;

          return DB::table('timeframe')->insert($data);
    }

    public function getAllData($table){

      return DB::table($table)->pluck('timeframe')->toArray();

    } 

    public function UpdateData($table,$key,$data,$where){

    
      $update = DB::table($table)->where(array($key=>$where))->update($data); 
    
        return $update;
    }
    


}
