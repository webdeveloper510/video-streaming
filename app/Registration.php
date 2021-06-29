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
            $userdata['is_news']= $data['news'] ? 'yes' : 'no' ;
            $userdata['reffered_by']= $reffer_id ? $reffer_id : 0; 
            unset($userdata['news']);   
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

            $userdata['email'] = $data['email1'];

            unset($userdata['email1']);

            unset($userdata['confirm']);

            $userdata['created_at']= now();

            $userdata['updated_at']= now();

            $userdata['reffered_by']= $reffer_id ? $reffer_id : 0;
           
            $userdata['cover_photo']= '';
            $userdata['aboutme']= '';
            
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
                if(is_null($value)){
                    return 0;
                }
                else{
                    Session::put('User', $value);
                    Session::put('userType','contentUser');
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

public function pazLogin($data){

  $value = DB::table('team_login')->where(array(
    'email'=> $data['email'],
    'password'=>md5($data['password'])))
    ->get()
    ->first();

    if(count($value) > 0){

      Session::put('pazLogin',$value);

      return 1;

    }

    else{

      return 0;


    }

}

// public function updateStatusDue(){

//       return   DB::table('offer')->where(date('Y-m-d'),'DATE(DATE_ADD(created_at, INTERVAL delieveryspeed-1 DAY))')->update([
//           'status'=>'due'
//         ]);
// }
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


                $response = $result->where('type',$data['type'])->get()->toArray();
                      if($response){
                          
                         // echo "fff";die;

                        $response['search']= 'searched';

                        return $response;


                      }

                      else{
                        $data= DB::table('media')
                       ->leftjoin('popular', 'popular.mediaid', '=','media.id')
                      ->select('media.*')
                      ->where('popular.type',$data['type'])
                      ->orderBy('popular.count','desc')
                      ->get()->toArray();

                      $data['search']= 'popular';

                        return $data;

                      }


                     
   
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

public function insertRecentTable($data,$srh){
    
    if($srh=='searched'){
        
     $ids = array_column($data, 'id');

     $insertData['mediaId']=implode(',', $ids);

      $session_data =   Session::get('User');

      $insertData['userId']= $session_data->id;

      $insertData['created_at']=now();

    $insertData['updated_at']=now();

     $insert=DB::table('recentmedia')->insert($insertData);
     if($insert){

        Session::forget('recentSearch');
     
     }
        
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

     //$contentdata['catid']=$contentdata['category'][0] ? $contentdata['category'][0] : $contentdata['category'][1];
    // $contentdata['subid']=1;
      unset($contentdata['category']);
      unset($contentdata['subcategory']);
      unset($contentdata['radio']);
       $contentdata['duration']='';
     $inserted_data =  DB::table('media')->insertGetId($contentdata);
      if($inserted_data){

        $count  = $this->selectDataById('artistid','media_seen_notification',$contentid);

          if(count($count) > 0){

            $done = $this->updateDataInMedia($userid,$inserted_data,'media');

          }
        // $array = array(
        //   'created_at'=>now(),
        //   'updated_at'=>now(),
        //   'artistid'=>$userid,
        //   'userid'=>0,
        //   'message'=>'CM',
        //   'notificationfor'=>'created Media',
        // );
    
        //$inserted_data = $this->insertNotification($array);

      }
   
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
         $data = DB::table("media")->select('*')
            ->whereIn('id',$media_array)
            ->where('is_deleted',0)
            //->toSql();
            ->get()
            ->toArray();
           
    }
    
     return $data;
    }
  
}

public function saveUsername($data){

  $session_data =   Session::get('User');

    $data1 = $this->selectDataById('artistid','social_username',$session_data->id);

    $done = count($data1) > 0 ? $this->updateSaveUser($data1,$data,$session_data->id) : $this->insertSave($data,$session_data->id);
    return $done ? 1 : 0;
}

public function updateSaveUser($tableData,$data,$id){

  $username = explode(',',$tableData[0]->username);

  $name[]= $data['username'];

  $plateform[]= $data['social_plateform'];
 
  $social = explode(',',$tableData[0]->social_plateform);

  $aunion=  array_merge(array_intersect($name, $username),array_diff($name, $username),array_diff($username, $name));

  $result_array_name = array_unique($aunion);


   $names = implode(',',$result_array_name); 

   //print_r($names);

   $aunion1=  array_merge(array_intersect($plateform, $social),array_diff($plateform, $social),array_diff($social, $plateform));

   $result_array_account = array_unique($aunion1);
 
    $accounts = implode(',',$result_array_account); 

   // print_r($accounts);die;

        return DB::table('social_username')->where('artistid',$id)->update([
            'username'=>$names,
            'social_plateform'=>$accounts,
        ]);
}
public function insertSave($data,$id){
      unset($data['_token']);
        $data['created_at'] = now();
        $data['artistid'] = $id;
        $data['updated_at'] = now();
        return DB::table('social_username')->insert($data);
}

public function getSocialName($id){
      return DB::table('social_username')->where('artistid',$id)->get()->each(function($query){
        $query->username = array_filter(explode(",", $query->username));
        $query->social_plateform =   $array = array_filter(explode(",",$query->social_plateform));
        //$query->count = count(explode(",", $query->social_plateform));
      });
}

public function getArtistnotVerified(){

        return DB::table('contentprovider')->where('is_verified',0)->get();
}

// public function getArtistVerifiedNot($where){

//   return DB::table('contentprovider')->where(array('is_verified',0))->get();


// }

public function getArtists($flag){

    if($flag=='No'){

      $artists = DB::table('contentprovider')
      ->leftjoin('media', function($join)
      {
          $join->on('media.contentProviderid', '=', 'contentprovider.id')
               ->where(array('media.is_deleted'=> 0,'media.is_verified'=>1));
      })
      //->leftjoin('offer','offer.artistid','=','contentprovider.id')
      ->leftjoin('subscriber','subscriber.artistid','=','contentprovider.id')
      ->selectRaw('contentprovider.nickname,contentprovider.profilepicture,contentprovider.aboutme,contentprovider.id,subscriber.count,count(media.id) as rowcount')
      ->where('contentprovider.is_verified',1)
      ->groupBy('contentprovider.id','contentprovider.nickname','subscriber.count','contentprovider.profilepicture','contentprovider.aboutme')

      //->leftjoin('timeframe', 'contentprovider.id', '=','timeframe.artist_id')
      //->select('contentprovider.profilepicture', 'timeframe.timeframe','timeframe.created_at','contentprovider.id','contentprovider.nickname')
      ->inRandomOrder()->take(6)->get()->toArray();

        return $artists;
     
    }
    else{

      $artists=DB::table('contentprovider')
      ->leftjoin('media','media.contentProviderid','=','contentprovider.id')
      ->leftjoin('subscriber','subscriber.artistid','=','contentprovider.id')
      ->selectRaw('contentprovider.nickname,contentprovider.profilepicture,contentprovider.id,subscriber.count,count(media.id) as rowcount')
      ->where('contentprovider.is_verified',1)

      ->groupBy('contentprovider.id','contentprovider.nickname','subscriber.count','contentprovider.profilepicture')
      ->paginate(30);
    }
  return $artists;
}

public function getArtistDetail($artid,$type){


      $artistsDetail = DB::table('contentprovider')
       ->leftjoin('media', 'contentprovider.id', '=','media.contentProviderid')
       ->leftjoin('media_seen_notification','media_seen_notification.mediaid','=','media.id')
       ->select('contentprovider.*', 'media.*','media_seen_notification.is_seen','media_seen_notification.userid','media_seen_notification.mediaid','media_seen_notification.type as notification')
       ->where(array('contentprovider.id'=>$artid,'media.type'=>$type,'media.is_deleted'=>0  ,'media.is_verified'=>1))
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

  public function getOverviewProfile($id){

    $overview = DB::table('media')
    ->where('contentProviderid',$id)
    ->where('is_verified',1)
    ->where('profile_video','yes')
    ->get()
    ->toArray();

    return $overview;

  }

  public function UpdateMediaNotification($artid){
    $session_data =   Session::get('User');
    $user = $session_data->id;
        return DB::table('media_seen_notification')->where(array('userid'=>$user,'artistid'=>$artid))->update([
            'is_seen'=>1
        ]);
  }

  public function UpdateOFFERnOTI($artid){
    $session_data =   Session::get('User');
    $user = $session_data->id;
      return DB::table('offer')->where(array('userid'=>$user,'artistid'=>$artid))->update([
            'is_seen'=>'yes'
        ]);
  }


  public function count_subscriber($id){

         return DB::table('subscriber')->where('artistid',$id)->pluck('count')->toArray();
  }

  public function edit_other($profile,$data){

    $session_data =   Session::get('User');

   
     $contentid=$session_data->id;

    $update = $this->UpdateData('contentprovider','id',$profile,$contentid);
    
      if($data){
        
        $id=$data['hid'];

        unset($data['hid']);
  
        $update = $this->UpdateData('media','id',$data,$id);

      }

      //print_r($update);die;
      

      return $update;


   // print_r($update);die;

    

    

  }


  public function getQuality(){

    return DB::table('quality')->get()->toArray();
  }

  public function onlyArtistDetail($id){
    $details = DB::table('contentprovider')->where('id',$id)->get()->toArray();
    return $details;
  }

  public function getArtistOffer($artistId,$user){
    $offer=DB::table('offer')
    ->leftjoin('category', 'category.id', '=','offer.categoryid')
    ->leftjoin('subscriber','subscriber.artistid','=','offer.artistid')
    ->leftjoin('media_seen_notification','media_seen_notification.mediaid','=','offer.id')
     ->select('offer.*', 'category.category','subscriber.count','media_seen_notification.is_seen as notificationseen','media_seen_notification.type as notiType');  
     if($user=='customer'){

      $data = $offer->where(array('offer.artistid'=>$artistId,'offer.is_deleted'=>'false','offer.offer_status'=>'online','offer.is_verified'=>1,'offer.by_created'=>1));

     }
     else{
      $data = $offer->where(array('offer.artistid'=>$artistId,'offer.is_deleted'=>'false','offer.by_created'=>1));
     }
     
      // if($offer){
      //      $offers = $offer;
      // }

      // else{

      //   $offers = DB::table('offer')
      //   ->leftjoin('category', 'category.id', '=','offer.categoryid')
      //   ->select('offer.*', 'category.category')
      //   ->where(['offer.artistid'=>$artistId,'offer.is_deleted'=>'false'])->get()->toArray();
      // }

        //print_r($offers);die;

     return $data->get()->toArray();
     

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
       //->join('profiletable', 'profiletable.userid', '=', 'users.id')
      // ->select('profiletable.profilepicture', 'users.tokens','users.nickname')
       ->where('id',$userId)
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

            unset($filter['_token']);


             $result = DB::table('contentprovider')
             ->leftjoin('media','media.contentProviderid','=','contentprovider.id')
             ->leftjoin('subscriber','subscriber.artistid','=','contentprovider.id')
             ->selectRaw('contentprovider.nickname,contentprovider.profilepicture,contentprovider.id,subscriber.count,count(media.id) as rowcount')
             ->groupBy('contentprovider.id','contentprovider.nickname','subscriber.count','contentprovider.profilepicture')
                     ->where(function($query) use ($filter)
                        {
                             foreach($filter as $key=>$val){
                             
                          if(is_array($val))
                             $query->whereIn($key, $val,'or');
                          
                        }

                        })->paginate(10);

                       // print_r($result);die;

                    
                    return $result;

    }

    public function notifyMe($data){

        $data= $data->all();

     $data['created_at']=now();
    $data['updated_at']=now();
    $data['status'] = 0 ;
    $inserted=DB::table('all_emails')->insertGetId($data);
    
   // print_r($inserted);die;
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

      $user=Session::get('User');

       $userId =$user->id;

       //print_r($sts);die;

      //DB::enableQueryLog();
      //echo "h";die;

      $data = \DB::table("offer")
      ->select("users.nickname","offer.userid","offer.paid_status","offer.artistid","offer.additional_price","offer.id","offer.title","offer.offer_status","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.userdescription","offer.description","offer.quality","offer.status",\DB::raw("GROUP_CONCAT(category.category) as catgories"),\DB::raw("DATEDIFF(DATE(DATE_ADD(offer.created_at, INTERVAL offer.delieveryspeed DAY)),now()) as remaining_days"),\DB::raw("DATE(DATE_ADD(offer.created_at, INTERVAL offer.delieveryspeed DAY)) as dates_submision"))
      ->join("category",\DB::raw("FIND_IN_SET(category.id,offer.categoryid)"),">",\DB::raw("'0'"))
      ->join("users","users.id","=","offer.userid")
      ->where('offer.artistid',$userId)
      ->groupBy("offer.id","offer.title","offer.paid_status","offer.userid","offer.additional_price","offer.artistid","offer.created_at","offer.description","offer.offer_status","offer.quality","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.userdescription","offer.status","users.nickname");
       
      if ($sts!='') {
            //echo $sts;
        $data = $data->where('status', '=', $sts);
    }      
         return $data->get();

    }

    public function show_customer_orders(){

      $session_data =   Session::get('User');

      $userid=  $session_data->id;
      
      $data = \DB::table("offer")
      ->select("contentprovider.nickname","offer.reason_of_cancel","reserved_tokens.tokens","offer.id","offer.is_seen","offer.title","offer.offer_status","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.userdescription","offer.description","offer.deliever_media","offer.quality","offer.status",\DB::raw("category.category as catgories"),\DB::raw("DATEDIFF(DATE(DATE_ADD(offer.created_at, INTERVAL offer.delieveryspeed DAY)),now()) as remaining_days"),\DB::raw("DATE(offer.created_at) as created_at"))
      ->leftjoin("category",\DB::raw("FIND_IN_SET(category.id,offer.categoryid)"),">",\DB::raw("'0'"))
      ->leftjoin("contentprovider","contentprovider.id","=","offer.artistid")
      ->leftjoin('reserved_tokens','reserved_tokens.customer_order_id','=','offer.id')
      ->where('offer.userid',$userid)
      ->orderby('offer.id','desc')
      ->groupBy("offer.id","offer.title","offer.reason_of_cancel","reserved_tokens.tokens","offer.is_seen","offer.created_at","offer.description","offer.offer_status","offer.quality","offer.type","offer.price","offer.choice","offer.delieveryspeed","offer.deliever_media","offer.userdescription","category.category","offer.status","contentprovider.nickname");
     
      if ($sts) {
            //echo $sts;
        $data = $data->where('status', '=', $sts);  
    }
  
  // echo "<pre>";
  // print_r($data->get());die;
         return $data->get();
    }


    public function count_orders($table){

      $session_data =   Session::get('User');

      $userid=  $session_data->id;

      $value=DB::table($table)->where('status','new');

      if($table=='offer'){

        $val = $value->where('artistid',$userid)->count();

      }

      else{
        $val = $value->count();
      }

      return $val;



    }

    public function count_process_orders($table){

      $session_data =   Session::get('User');

      $userid=  $session_data->id;

      $value=DB::table($table)->where('status','process')
        ->where('userid','!=',0);
      

      if($table=='offer'){
        $val = $value->where('artistid',$userid)->count();
      }
      else{
        $val = $value->count();
      }

      return $val;


    }

    public function sendTip($data){

      //print_r($data);die;

      $session_data =   Session::get('User');

      $userid=  $session_data->id;

      $checkTokn = $this->selectDataById('id','users',$userid);

      $getData = $this->reduceTokens($checkTokn,$userid,$data['price'],$data['artistid']);

      //$insert_in_payment = $getData==1 ? $this->insertPaymentStatus($userid,$data['artistid'],'',$data['price']):'';
      //print_r($getData);die;

      return $getData;




    }

    public function count_due_offer($table){

      $session_data =   Session::get('User');
          
      $userid=  $session_data->id;

        $current = date('Y-m-d');
        $data = DB::table($table)
        ->select('id',DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed-1 DAY)) as dates'));
       

       if($table=='offer'){

           $data = $data->where('artistid',$userid)
           ->where('userid','!=',0)
           ->where('status','due')
           ->count();

       }

       else{

        $data = $data->get()->toArray();
 
       }

       //print_r($data);die;

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
              'created_at'=>$data['created_at'],
              'updated_at'=>$data['updated_at'],
              'title'=>$data['title'],
              'price'=>$data['price'],
              'description'=>$data['description'],
              'categoryid'=>$data['type']=='video' ? $data['video_cat'] : $data['audio_cat'],
              'min'=>$data['min'],
              'max'=>$data['max'],
              'type'=>$data['type'],
              'additional_price'=>$data['additional_price'],
              'offer_status'=>$data['offer_status'],
              'delieveryspeed'=>$data['delieveryspeed'],
              'quality'=>$data['quality'],
              'media'=>$data['media'],
              'audio_pic'=>$data['thumbnail']  
           );


          $update = $this->UpdateData('offer','id',$update,$data['offerid']);
           

           return $update ? 1 : 0;
    }

    public function selectDataById($key,$table,$where){

        $value=DB::table($table)->where($key, $where)->get()->toArray();

        return $value;

    }

    public function insertNotification($data){

       $done = DB::table('notification')->insert($data);
      return $done ? 1 : 0;

    }
public function getRefersArtist($id){

  $data = DB::select("SELECT cp.reffered_by,(SELECT nickname from contentprovider where id=cp.reffered_by) as nickname FROM contentprovider cp where cp.id='$id'");
    //$data = DB::table('contentprovider as mkd')->
   // select("(SELECT nickname from contentprovider where id=mkd.reffered_by) as nickname,'mkd.reffered_by','mkd.id'")->
   // leftJoin('contentprovider AS reffer', 'reffer.reffered_by', '=', 'mkd.id')->
   // where('mkd.id', $id)->
    //where('reffer.reffered_by', '=', 'mkd.id')->
   // get();

     //print_r($data);die;  
  
   return $data;

   

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
       $data['by_created']=1;
       $data['quality'] = $data['quality'] ? $data['quality'] : '';


      $data['artistid'] = $userid;
      $data['userdescription'] = '';

      $data['userid'] =0;

      //print_r($data);die;


        $insert = DB::table('offer')->insertGetId($data);

        if($insert){

              $array = array(
                'created_at'=>now(),
                'updated_at'=>now(),
                'artistid'=>$userid,
                'userid'=>0,
                'message'=>'CO',
                'notificationfor'=>'created offer',
              );

              $count  = $this->selectDataById('artistid','media_seen_notification',$userid);

              //print_r($count);die;

              if(count($count) > 0){

               $done = $this->updateDataInMedia($userid,$insert,'offer');
                

                   
    
                //$update = $this->UpdateData('media_seen_notification','artistid',$data,$userid);
    
              }

          $insert = $this->insertNotification($array);

      }        

        if($insert){

              $array = array(
                'created_at'=>now(),
                'updated_at'=>now(),
                'artistid'=>$userid,
                'userid'=>0,
                'message'=>'CO',
                'notificationfor'=>'created offer',
              );

          $insert = $this->insertNotification($array);

      }        


        return $insert ? 1 :0;

    }

    public function updateDataInMedia($aid,$insert,$type){

            $data = array(
              'is_seen'=>'0',
              'mediaid'=>$insert,
              'type'=>$type
            );

       return  DB::table('media_seen_notification')->where(array('artistid'=>$aid,'type'=>$type))->update($data);

    }

    public function showOfer($data){

     unset($data['type']);

     //print_r($data);die;

    $result = DB::table('offer')
    ->join('contentprovider', 'contentprovider.id', '=', 'offer.artistid')
    ->join('category','category.id','=','offer.categoryid')
    ->select('offer.*','category.category')
    ->where(function($query) use ($data)
    {
         foreach($data as $key=>$val){
         
      if(is_array($val)){
         $query->whereIn($key, $val);
      
    }

    else{
          if($key=='price'){

            $query->orderBy($key, $val);

          }
          else{
            $query->where($key, $val);
          }
    }
  }

    });

   return $result->get();
    
      
      // $offers = DB::table('offer')
      //          ->leftJoin('category', function($join) use($data) {
      //                 //$join->where('category.id','=', $data['catid'][0])
      //                 $join->on("category.id", "=", "offer.categoryid");
      //         })
      //         ->whereIn('offer.categoryid', $data['catid'])
      //         ->orderBy('offer.price', $data['price'])
      //          ->select('offer.*','category.category')
      //          ->get();

               //echo "<pre>";

               //return $offers;

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
              'message'=>'You`ve got a new Job-Request from'." ".$value[0]->nickname,
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
         $data = $offer;
     }
     else{
          $data = DB::table('offer')
          ->join('category', 'category.id', '=', 'offer.categoryid')
        ->join('contentprovider', 'contentprovider.id', '=', 'offer.artistid')
         ->select('offer.*', 'category.category','contentprovider.nickname')
          ->where('offer.id',$id)->get()->toArray();
     }

    // print_r($data);

        return $data;
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

      //print_r($where);

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
         ->orWhere('notification.notificationfor','addedVideo')
         ->orderby('notification.id','desc')
         ->get()->toArray();
      }
      else{
        $data=DB::table('notification')
        ->leftjoin('contentprovider', 'notification.artistid', '=','contentprovider.id')
         ->select('notification.*', 'contentprovider.*')
         ->where('notification.notificationfor',$user)
         ->orderby('notification.id','desc')

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
    
    public function addInLibrary($ids,$name){
        
     $session_data =   Session::get('User');
     
    $userid=  $session_data->id;
    
        
    $data = DB::table('playlist')->where(array('userid'=>$userid,'playlistname'=>$name))->get()->toArray();
         
        
        
               if(count($data)>0){ 

               // print_r($ids);

                   
                        $newArray = explode(",",$data[0]->listvideo);   
              
                        $aunion=  array_merge(array_intersect($ids, $newArray),array_diff($ids, $newArray),array_diff($newArray, $ids));

                         $result_array = array_unique($aunion);

                          $newListid = implode(',',$result_array); 

                          $update = $this->updateInPlayList($userid,$name,$newListid);    
                          
                          return $update;
                

      }

                else {
                  //print_r($ids);
                 $newListid = implode(',',$ids); 
                  $playlist['listvideo'] = $newListid;
                  $playlist['userid'] = $userid;
                  $playlist['playlistname'] = $name;

                  $playlist['created_at'] = now();
                  $playlist['updated_at'] = now();   

                  $created = $this->createPlayListUser($playlist);  
                  
                  return $created ? 1 : 0 ;


              }
            
                
    }

    public function buyVideo($vid){

        $session_data =   Session::get('User');

        $userid=  $session_data->id;


        $checkTokn = $this->selectDataById('id','users',$userid);

        $token = $checkTokn[0]->tokens;

        if($token > $vid['price']){
       
         $value=DB::table('user_video')->where(array('userid'=>$userid,'type'=>'normal'))->get()->toArray();

        $return  = count($value) > 0 ? $this->updateUserVideo($userid,$vid,$token,'normal','') : $this->insertUserVideo($userid,$vid,$token,'normal','');

          return $return;

        }


    }

    public function updateUserVideo($uid,$video,$tok,$type,$reserved){         

      if(isset($video['choice'])){

          $videoId = $video['id'];

          $getOffer = $this->selectDataById('id','offer',$videoId);
          


         // unset($video['id']);
          unset($video['nickname']);
          unset($video['category']);
          unset($video['count']);
          
        
        $done = $this->insertOffer($video,$reserved);


          //$done = $getOffer[0]->userid==0 || $getOffer[0]->userid==$uid ? $this->updateOffer($videoId,$video):$this->insertOffer($video);


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

    public function insertUserVideo($uid,$video,$tok,$type,$reserved){

    

      //print_r($video);die;
      if(isset($video['userdescription'])){

        $getOffer = $this->selectDataById('id','offer',$video['id']);

       $video_id = $video['id'];
     // unset($video['id']);
      unset($video['nickname']);
      unset($video['category']);
      unset($video['count']);

      $done = $this->insertOffer($video,$reserved);
      //$done = $getOffer[0]->userid==0 || $getOffer[0]->userid==$uid ? $this->updateOffer($video_id,$video):$this->insertOffer($video);

      }
  
      $video_data['created_at'] = now();
      $video_data['updated_at'] = now();
      $video_data['userid'] =$uid;
      $video_data['videoid'] = isset($video['videoid']) ? $video['videoid'] : $video_id;
      $video_data['type'] = $type;

      //echo "buy";
  
      $insert = DB::table('user_video')->insertGetId($video_data);

      return $insert ? $insert : 0;
      
    }

    public function updateOffer($vidid,$data){

      // echo "update";


      //     print_r($data);die;

      $return = DB::table('offer')->where(array('id'=>$vidid))->update([
        'userdescription' =>$data['userdescription'] ,
        'choice'=>$data['choice'],
        'userid'=>$data['userid'],
        'status'=>'new',
        'is_seen'=>'no',
        'updated_at'=>$data['updated']
        ]);

        if($return){

          $array= array(
            'created_at'=>$data['created_at'],
            'updated_at'=>$data['updated_at'],
            'artistid'=>$data['artistid'],
            'userid'=>$data['userid'],
            'message'=>$data['title'].'has been ordered',
            'notificationfor'=>'user',
            'mediaid'=>''

          );

          $return  = $this->insertNotification($array);
      }

        return $return;


    }

    public function insertOffer($data,$reserved){

         // print_r($data);die;

        $data['by_created'] = 0 ;

        $data['offerid'] = $data['id'];

        unset($data['id']);

      $insert  = DB::table('offer')->insertGetId($data);
     // print_r($insert);die;
      if($reserved!=''){

        $inserted = $this->insertReservedTable($reserved,$data['offerid'],$insert);


      }



          $array= array(
            'created_at'=>$data['created_at'],
            'updated_at'=>$data['updated_at'],
            'artistid'=>$data['artistid'],
            'userid'=>$data['userid'],
            'message'=>$data['title'].'has been ordered',
            'notificationfor'=>'user',
            'mediaid'=>''

          );

      $return  = $this->insertNotification($array);

      return $inserted ? 1 : 0;
    }

//     public function trialData(){

//       // echo date('Y-m-d');

//       // echo "<pre>";
 
//       // $data = DB::table('offer')
//       // ->select('id','artistid','userid','status','title',DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed DAY)) as dates'))
//       // ->where('userid','!=',0)
//       // ->get()->toArray();
 
//       // print_r($data);die;

//       $data1 = DB::table('offer')
//       ->select('id','artistid','userid','status','title',DB::raw('DATE(DATE_ADD(created_at, INTERVAL delieveryspeed+1 DAY)) as dates1'))
//       ->where('userid','!=',0)
//       ->get()->toArray();
 
//       foreach($data1 as $k=>$v){
 
//        if(date('Y-m-d')==$v->dates1 && ($v->status!='verifying' && $v->status!='delivered' && $v->status!='cancelled')){
//          echo $v->id."<br>";
//          echo $v->status."<br>";
//          echo "hello"."<br>";
//          echo $v->dates1."<br>";
 
//        }
   
//      }
 
//  die;

//     }

    public function addToLibrary($lists){

      $newData =array();

        $session_data =   Session::get('User');   

        $userid =  $session_data->id;

        $tokens = $lists['price'];
    
         $listname = Session::get('listname');

        $lists['playlistname'] = $listname;

        

        $newData = array_key_exists("videoid",$lists) ? $lists['videoid'] : Session::get('SessionmultipleIds');
      //print_r($newData);die;
        $videoIds = (is_array($newData)) ? implode(',',$newData):$newData;      
        
        $lists['userid'] = $userid;

        if(is_array($newData)){
             $ids  = $newData ;
        } 

        else{
          $ids[]  = $newData ;
        }      
       
        $return = 0;

      $tokensData = $this->selectDataById('id','users',$userid);   
          
        $data = DB::table('playlist')->where(array('userid'=>$userid,'playlistname'=>$listname))->get()->toArray();
        //print_r($data);die;
      if($tokens < $tokensData[0]->tokens){               

               if(count($data)>0){ 
                        $newArray = explode(",",$data[0]->listvideo);   
              
        
                        $aunion=  array_merge(array_intersect($ids, $newArray),array_diff($ids, $newArray),array_diff($newArray, $ids));

                         $result_array = array_unique($aunion);

                          $newListid = implode(',',$result_array); 

                          $update = $this->updateInPlayList($userid,$listname,$newListid);        
                
                           if(isset($update)){                  
                          
                            $return  = $this->checkIdInUserVideo($tokensData,$ids,$lists);  

                          }

                          else
                          {
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
                  
                  

                  $created = $this->createPlayListUser($playlist);  

                  $return  = $this->checkIdInUserVideo($tokensData,$ids,$lists);  

              }

       

  }

    else{

      $return = 'insufficient';
    }

    return $return;
  }

  public function createPlayListUser($playlist){

       $insert  = DB::table('playlist')->insert($playlist);

    return $insert;

  }

  public function updateInPlayList($userid,$listname,$newListid){
        
    return $update = DB::table('playlist')->where(array('userid'=>$userid,'playlistname'=>$listname))->update([
      'listvideo' =>$newListid  
      ]);

  }

  public function checkIdInUserVideo($tokensData,$ids,$lists){   

    $session_data =   Session::get('User');   

    $userid =  $session_data->id;
               
    $price = 0;   
    
    for($i=0; $i<count($ids);$i++){

        $videoExist = DB::table('user_video')
        ->whereRaw("find_in_set('".$ids[$i]."',videoid)")
        ->where('userid',$userid)
        ->count();
       // print_r($videoExist);die;
        if($videoExist==0){
          $yes = true; 

          $data_price = $this->selectDataById('id','media',$ids[$i]);

            $price = $price + $data_price[0]->price;
            $titles[] = $data_price[0]->title;
             $new_video_ids[] = $ids[$i];       

        }


   }    

          if($yes){
            $lists['videoid']= implode(',',$new_video_ids) ; 
            $titles= implode(',',$titles) ; 
            $lists['price']=  $price;  

            $buyed = $this->buyVideo($lists);
  
            $reduce  = $buyed  ? $this->reduceTokens($tokensData,$userid,$price,$lists['art_id']): 0;  
                          
            $status_succedd = $reduce  ? $this->insertPaymentStatus($userid,$lists['art_id'],count($new_video_ids > 1) ? $lists['videoid'] : $lists['videoid'],$price, count($new_video_ids == 1) ? 'single' : 'multiple',$titles) : 0;

            $return = $status_succedd;
         }

          else{
            $return = 'Already';
          }

         // print_r($return);die;

          return $return;


}

  public function insertPaymentStatus($uid,$artid,$vid,$paz,$from,$title){

    //echo $uid.$artid.$vid.$paz;die;

    $payment = array(
      'created_at'=>date("Y-m-d H:i:s"),
      'updated_at'=>date("Y-m-d H:i:s"),
      'userid'=>$uid,
      'artistid'=>$artid,
      'mediaid'=>$vid,
      'status'=>'success',
      'tokens'=>$paz,
      'pay_from'=>$from
    );

    $insert_payment  = DB::table('payment_token')->insert($payment);

    if($title!=''){
          $array= array(
            'created_at'=>now(),
            'updated_at'=>now(),
            'artistid'=>$artid,
            'userid'=>$uid,
            'message'=>$title." ".'has been added to your library',
            'notificationfor'=>'addedVideo',
            'mediaid'=>$vid

          );


          $insert_payment = $this->insertNotification($array);
    }

    //print_r($insert_payment);die;
  
    return $insert_payment ? 1 : 0;

  }

  public function personal_info($data){

    //print_r($data->all());die;

    $session_data =   Session::get('User');

    $userid =  $session_data->id;

    $update = DB::table('contentprovider')->where(array('id'=>$userid))->update($data->all());

    return $update ? 1 : 0;

  }


  public function libraryNotification(){

    $session_data =   Session::get('User');

    $userid =  $session_data->id;

    return DB::table('notification')->where(array('userid'=>$userid,'notificationfor'=>'addedVideo'))->orderBy('id', 'DESC')->first();
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


  $databasetoks = $tokns[0]->tokens;


        if($tok < $databasetoks){

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

public function insertPopupNotification(){

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

  $data = array('created_at'=>now(),'updated_at'=>now(),'userid'=>$userid);

    return DB::table('popup_visibility')->insert($data);

}

public function getAllPlaylist(){

      $session_data =   Session::get('User');

       $userid =  $session_data->id;

      $data = \DB::table("playlist")
      ->select("playlist.id","playlist.playlistname","playlist.created_at",\DB::raw("GROUP_CONCAT(media.media) as videos"),\DB::raw("GROUP_CONCAT(contentprovider.nickname) as names"),\DB::raw("GROUP_CONCAT(media.title) as titles"))
      ->join("media",\DB::raw("FIND_IN_SET(media.id,playlist.listvideo)"),">",\DB::raw("'0'"))
      ->join('contentprovider','contentprovider.id','=','media.contentProviderid')
      ->where('playlist.userid',$userid)
      ->groupBy("playlist.id","playlist.playlistname",'playlist.created_at')
      ->get();
     

    return $data;
}

// public function getPlayListName(){

//     $session_data =   Session::get('User');

//     $userid =  $session_data->id;

//     // $docomuntOrders = \DB::table("orders")
//     //         ->select("orders.*",\DB::raw("GROUP_CONCAT(documents.name) as docname"))
//     //         ->leftjoin("documents",\DB::raw("FIND_IN_SET(documents.id,orders.file_id)"),">",\DB::raw("'0'"))
//     //         ->where('user_id',getCurrentUser()->user_id)
//     //         ->groupBy("orders.id")
//     //         ->paginate(10);

//          $value=DB::table('playlist')->where('userid', $userid)->get()->toArray();

//          return $value;

// }


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
  $text = $data1['text'];

  unset($data1['text']);

 $data = $this->selectSingleById('userid','wishlist',$userid);


 
 
 if($data){
     $newArray =  explode(",",$data[0]);
    $aunion=  array_merge(array_intersect($data1, $newArray),array_diff($data1, $newArray),array_diff($newArray, $data1));
     
    $result_array = array_unique($aunion);
 }
 
 $returnData = count($data) >0 ? $this->updateWishlist(implode(',',$result_array),$userid,$data1,$text,$newArray) : $this->insertWishlist($data1,$userid);
 //print_r($returnData);die;
 return $returnData;

  
}

public function selectSingleById($key,$table,$where){

  $value=DB::table($table)->where(array($key=>$where))->pluck('videoid')->toArray();

  return $value;

}

public function updateWishlist($data,$uid,$data1,$bool,$arrayid){

  if($bool=='remove'){

    $index = array_search($data1['id'], $arrayid);

    unset($arrayid[$index]);

    $ids= implode(',',$arrayid);

  // print_r($ids1);die;

  }
  else{
    $ids = $data;
  }


        $update = DB::table('wishlist')->where(array('userid'=>$uid))
      ->update([
            'videoid' => $ids ? $ids : ''//DB::raw("CONCAT(videoid,',".$data[0]."')"),
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

              return $insert ? 1 : 0;

  
}

public function getVideosbyList(){

  $session_data =   Session::get('User');
  $userid =  $session_data->id;

  $data = \DB::table("user_video")
  ->select(DB::raw("media.media as videos"),"media.id","media.title","media.is_deleted")
  ->leftjoin("media",\DB::raw("FIND_IN_SET(media.id,user_video.videoid)"),">",\DB::raw("'0'"))
 // ->groupBy("playlist.id","playlist.playlistname","media.media")
  ->where(array('user_video.userid'=> $userid,'user_video.type'=>'normal'))
  ->get();

  return $data;

  //  $value=DB::table('playlist')->where(array('id'=>$id))->pluck('listvideo')->toArray();

  //  if($value){

  //         $ids = explode(',',$value[0]);

  //         $videos = DB::table("media")->whereIn('id', $ids)->get()->toArray();

  //        return $videos;

  //      }

}

public function checkVideoBuyed($table,$type,$id){

  $session_data =   Session::get('User');
  $userid =  $session_data->id;
      if($type=='normal'){
       $data = DB::table('user_video')
      ->whereRaw("FIND_IN_SET(?, videoid) > 0", [$id])
      ->where('type','normal')
      ->where('userid',$userid);
     }

     else{

      $data = DB::table('wishlist')
      ->whereRaw("FIND_IN_SET(?, videoid) > 0", [$id])
      ->where('userid',$userid);

     }
     return $data->get()->toArray();
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

      if($flag=='No'){

        $videos=DB::table('media') 
          ->leftjoin('popular', function($join)
        {
            $join->on('popular.mediaid', '=', 'media.id')
                 ->where('popular.type', '=', $type);
        })
        ->where('media.is_deleted',0)
        ->where('media.is_verified',1)
        ->orderBy('popular.count','desc')
        ->select('media.*')
        ->get()
        //->orWhere('popular.type',$type)
       // ->orWhere('media.is_deleted',0)
        //->orderBy('popular.count','desc')
        //->distinct('media.id')
        //->take(3)
        //->get()
        ->toArray();
     // $videos = $videoId1 ? DB::table("media")->whereIn('id', $videoId1)->take(3)->get()->toArray(): DB::table("media")->take(3)->get()->toArray();

      }
      else{

        $videos=DB::table('media') 
        ->leftjoin('popular', function($join)
        {
            $join->on('popular.mediaid', '=', 'media.id')
                 ->where('popular.type', '=', $type);
        })
        ->where('media.is_deleted',0)
        ->where('media.is_verified',1)
        ->orderBy('popular.count','desc')
        ->select('media.*')
        ->paginate(30);


        //$videos = $videoId1 ? DB::table("media")->whereIn('id', $videoId1)->paginate(30) : DB::table("media")->get()->toArray();

      }
// echo "<pre>";
      //print_r($videos);die;

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
          ->where('offer.offer_status','online')
          ->where('offer.by_created',1)
          ->where('offer.is_verified',1)
          ->where('offer.is_deleted','false')
          ->take(3)
          ->get()
          ->toArray();
        }
  else{

    $code = DB::table('offer')
    ->leftjoin('category','offer.categoryid','=','category.id')
    ->select('offer.*','category.category')
    ->where('offer.offer_status','online')
    ->where('offer.by_created',1)
    ->where('offer.is_verified',1)
    ->where('offer.is_deleted','false')
    ->paginate(30);
    return $code;
  }
}

public function getallOffers($id){

  //echo $id;

  $session_data =   Session::get('User');
  $userid =  $session_data->id;

  // $batch_data = DB::table('offer')->orderBy('id', 'DESC')->where('by_created', '=' , 1)->first();
   //$batch_data = DB::table('offer')->orderBy('id', 'DESC')->where('userid', '=' , $userid)->first();

   return DB::table('offer')->where('id',$id)->get()->toArray();

 
   //return $batch_data;


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


  //print_r($data);die;

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


        $reserved_exist = DB::table('reserved_tokens')->where(array('Offermediaid'=>$id[0],'userid'=>$userid))->get()->toArray();

       //print_r($data);die;
       $return  = count($value) > 0 ? $this->updateUserVideo($userid,$offer,$token,'offer',$data) : $this->insertUserVideo($userid,$offer,$token,'offer',$data);
       
       //$done = $this->insertReservedTable($data,$offer['id'],$return);

      // $done = count($reserved_exist) > 0  && $reserved_exist[0]->artistid==$data['art_id']  ? $this->updateReservedTable($userid,$data) : $this->insertReservedTable($data,$offer['id']);
       
      // print_r($done);die;
        // $reduced =  $return ? $this->reduceTokens($checkTokn,$userid,$data['price'],$data['art_id']): 0;

         //$status_succedd = $reduced  ? $this->insertPaymentStatus($userid,$data['art_id'],$id[0],$data['price']) : 0;

         //print_r($done);die;
          $return = $return!='' ? 1 : 0;
    }

    else{

      $return =  0;
    }

    return $return;

}

public function addonContentProvider($data){

    $exists = $this->selectDataById('id','offer',$data['offerid']);

    $tokensData = $this->selectDataById('Offermediaid','reserved_tokens',$exists[0]->offerid);


    if($tokensData[0]->userid==$data['userid'] && $tokensData[0]->artistid==$data['artistid']){

      $update = DB::table('contentprovider')->where(array('id'=>$data['artistid']))->update([
        'token' =>  DB::raw('token +'.$tokensData[0]->tokens)
      ]);

        $update1 = DB::table('offer')->where(array('id'=>$data['offerid']))->update([
          'paid_status' => 1
        
      ]);

      $status_done = $update ? $this->insertPaymentStatus($data['userid'],$data['artistid'],$exists[0]->offerid,$tokensData[0]->tokens,'order','') : 0;
  
    }

    return $status_done ? 1 : 0;     


}

public function getNotVerifiedOrders($table){

  $data = DB::table($table)
  ->leftjoin('video_verified','video_verified.mediaid','=',$table.'.id')
  ->leftjoin('contentprovider','contentprovider.id','=',$table.'.artistid')
  ->select($table.'.*','video_verified.team_user_id','contentprovider.nickname','video_verified.mediaid','video_verified.is_deleted as deletion')
  ->where(array($table.'.is_verified'=>0,$table.'.is_deleted'=>false))
  ->where($table.'.deliever_media','!=','')
  ->get();

  return $data;
}

public function updateReservedTable($uid,$data){

  

    $update = DB::table('reserved_tokens')->where(array('userid'=>$uid))->update([
      'tokens'=>$data['price'],
      'updated_at'=>$data['updated_at']
      ]);

  if($update){
      
        $deducted  = $this->deductUserTokens($uid,$data['price']);

  } 

  return $update;
      
}

public function deductUserTokens($uid,$token){
    
    $session_data =   Session::get('User');

    $userid =  $session_data->id;
    
    //print_r($uid);
    //print_r($token);die;

 

        $update = DB::table('users')->where(array('id'=>$userid))->update([
          'tokens' =>  DB::raw('tokens -'.$token)
          
        ]);


        return $update;
}

public function insertReservedTable($data,$vid,$customer_id)
{

  //print_r($data);

    
    $session_data =   Session::get('User');

    $userid =  $session_data->id;

  $deducted  = $this->deductUserTokens($userid,$data['price']);

  //  print_r($data);
  //  print_r($deducted);



  if($deducted || $data['price']==0){

   // echo "yes";die;

    $data  = array(
      'created_at'=>$data['created_at'],
      'updated_at'=>$data['updated_at'],
      'Offermediaid'=>$vid,
      'tokens'=>$data['price'],
      'userid'=>$userid,
      'artistid'=>$data['art_id'],
      'customer_order_id'=>$customer_id

    );

     $done = DB::table('reserved_tokens')->insert($data);

     return $done ? 1 : 0;


  }


  

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

                    $this->insertInMedia_update($data['id'],$uid);
            
                  return $update;
            }
        }

}


public function insertInMedia_update($artistid,$userid){

          $data = array(
            'created_at'=>now(),
            'updated_at'=>now(),
            'userid'=>$userid,
            'artistid'=>$artistid,
            'mediaid'=>0,
          );

          DB::table('media_seen_notification')->insert($data);
}


public function deleteFromMediaUpdate($id){

        DB::table('media_seen_notification')-where('userid',$id)->delete();

}

public function unsubscribe($allIds,$userid,$postData,$count){

      $index = array_search($userid, $allIds);

      unset($allIds[$index]);

   

  $update = DB::table('subscriber')->where(array('artistid'=>$postData['id']))

  ->update([
        'userid' =>implode(',',$allIds),
        'count' =>  DB::raw('count -'.$count)
      ]);

      $data = $this->selectDataById('userid','media_seen_notification',$userid);

      count($data) > 0 ? $this->deleteFromMediaUpdate($userid): '';

    return $update;

}

public function RemoveUsername($data){



      $database_data = DB::table('social_username')->where('id',$data['id'])->select('username','social_plateform')->get()->toArray();
      $username = explode(',',$database_data[0]->social_plateform);
      $plateform = explode(',',$database_data[0]->username);
      //print_r($data);die;
      $index = array_search($data['username'], $username);
      $index1= array_search($data['social_name'], $plateform);

     
      unset($username[$index]);
      unset($plateform[$index1]);

   

  $update = DB::table('social_username')->where(array('id'=>$data['id']))

  ->update([
        'username' =>implode(',',$plateform),
        'social_plateform' =>implode(',',$username),
      ]);


     return $update;


}

public function isSubscribe($artistId){


  $session_data =   Session::get('User');

  $userid =  $session_data->id;

  if($artistId==''){

    $isSubscribe = DB::table('subscriber')
  ->whereRaw('FIND_IN_SET(?,userid)',[$userid])
  ->pluck('artistid')
  ->toArray();

    return $isSubscribe;
  }

  else{
  $isSubscribe = DB::table('subscriber')
  ->whereRaw('FIND_IN_SET(?,userid)',[$userid])
  ->Where('artistid',$artistId)
  ->get();
  return count($isSubscribe) > 0 ? true : false;

  }


}

public function showSubscribeArtists(){

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

  $subscribedArtist = DB::table('subscriber')
  ->leftJoin ('contentprovider','contentprovider.id','=','subscriber.artistid')
  ->leftJoin('media_seen_notification', function($query) {
       $query->on('media_seen_notification.artistid','=','subscriber.artistid')
        // ->whereRaw('media_seen_notification.id IN (select MAX(a2.id) from media_seen_notification as a2 join subscriber as u2 on u2.artistid = a2.artistid group by u2.artistid)');
        ->where(['media_seen_notification.is_seen'=>0,'media_seen_notification.userid'=>$userid]);
     })
  ->distinct('contentprovider.nickname')
 // ->leftJoin('media_seen_notification','media_seen_notification.artistid','=','subscriber.artistid')
//   ->leftJoin('offer', function($query) {
//     $query->on('offer.artistid','=','subscriber.artistid')
//         ->whereRaw('offer.id IN (select MAX(a2.id) from offer as a2 join subscriber as u2 on u2.artistid = a2.artistid group by u2.artistid)')
//         ->where(['offer.by_created'=>1,'offer.offer_status'=>'online']);
// })
// ->leftJoin('media_seen_notification', function($query) {
//   $query->on('media_seen_notification.artistid','=','subscriber.artistid')
//       ->whereRaw('media_seen_notification.id IN (select MAX(a2.id) from media_seen_notification as a2 join subscriber as u2 on u2.artistid = a2.artistid group by u2.artistid)');
// })
  ->select('contentprovider.nickname','media_seen_notification.is_seen as mediaseen','contentprovider.profilepicture','subscriber.artistid')
  ->whereRaw('FIND_IN_SET(?,subscriber.userid)',[$userid])
  ->get();
    // echo "<pre>";
    //   print_r($subscribedArtist );die;
     return $subscribedArtist;

}

public function getSeen_noti_media($id){

  return DB::table('media_seen_notification')->select(array('mediaid', 'is_seen'))->get()->toArray();

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

        $this->insertInMedia_update($data['id'],$uid);

        return $insert ? 1 : 0;

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

public function insert_ticket_table($data){

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

        $data['created_at']=now();
        $data['updated_at']=now();
        $data['artistid']=$userid;

         $done = DB::table('ticket')->insert($data);

         return $done ? 1 : 0 ;

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

        return DB::table('media')
        ->where('contentProviderid',$userid)
        ->where('profile_video','!=','yes')
        ->where('is_deleted',0)
        ->get()->count();
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

     $status = $this->selectDataById('id','offer',$data['id']);

     if($status[0]->status=='new'){
      
          $update = DB::table($table)->where('id',$data['id'])->update([

            'status' => 'process'

          ]);

          return $update;

     }

  

}

public function insertVerifyMediaData($data){

  $sessionLogin = Session::get('pazLogin');

  $exist = DB::table('video_verified')->where(array('mediaid'=>$data['videoid'],'video_type'=>$data['type']))->get()->toArray();

 // $exist = $this->selectDataById('mediaid','video_verified',$data['videoid']);

    if(count($exist) > 0){

     return $exist;

    }

    else{

      $verifyData = array(
      'created_at'=>now(),
      'updated_at'=>now(),
      'team_user_id'=>$sessionLogin->id,
      'mediaid'=>$data['videoid'],
      'video_type'=>$data['type']
    );

    return DB::table('video_verified')->insert($verifyData);


  }


}

public function UpdateDatainVideoVerified($update,$data){


 return DB::table('video_verified')
  ->where(array('mediaid'=>$data['videoid'],'video_type'=>$data['type']))
  ->update($update);

}


public function getSocialInfo($type){

         $data =  DB::table('social_media')
          ->leftjoin('contentprovider', 'contentprovider.id', '=','social_media.artist_id')
          ->leftjoin('social_username','social_username.artistid','=','contentprovider.id')
          ->select('contentprovider.nickname', 'social_media.*','social_username.social_plateform','social_username.username')
          ->where('social_media.type',$type)
          ->get()->toArray();

    // echo "<pre>";
    //       print_r($data);die;
            
          return $data;

}


public function customer_issue($data){

          unset($data['_token']);

          $data['created_at']=now();
          $data['updated_at']=now();

           $done = DB::table('customer_issue')->insert($data);

           return $done ? 1 : 0;
}

public function getNotVerifiedContent($table){

  $where = $table=='media'  ? 'contentProviderid' : 'artistid';

         $data = DB::table($table)
        ->leftjoin('video_verified','video_verified.mediaid','=',$table.'.id')
        ->leftjoin('contentprovider','contentprovider.id','=',$table.'.'.$where)
        ->select($table.'.*','video_verified.team_user_id','contentprovider.nickname','video_verified.mediaid','video_verified.is_deleted as deletion')
        ->where(array($table.'.is_verified'=>0,$table.'.is_deleted'=>0));
          if($table=='offer'){

                $data = $data->where('by_created',1);

          }
          
        // echo "<pre>";
        // print_r($data);die;
        return $data->get();
}

public function getNotVerifiedOverview($table){

      return DB::table($table)->where(array('is_verified'=>0,'profile_video'=>'yes'))->get()->toArray();
}

public function getHistoryVerifiedContent($table){

  $data = DB::table($table)
  ->leftjoin('video_verified','video_verified.mediaid','=',$table.'.id')
  ->select('media.*','video_verified.team_user_id','video_verified.mediaid','video_verified.is_deleted as deletion')
  ->where(array('media.is_deleted'=>0,'video_verified.is_deleted'=>1))
  ->get();

  return $data;

}

public function getReportVerifiedContent($table){

  $data = DB::table($table)
  ->leftjoin('report_media','report_media.mediaid','=',$table.'.id')
  ->select('media.*','report_media.reason','report_media.description','report_media.id as increamented')
  ->where(array('report_media.is_report'=>0))
  ->get();
  

  return $data;

}

public function deleteIllegeContent($id){

        return DB::table('media')->where('id',$id)->delete();
}

    public function deleteoffer($data){

      $session_data =   Session::get('User');

      $userid =  $session_data->id;




     $done = DB::table('offer')->where('id', $data['id'])->update(array('is_deleted'=>'true'));

     if($done){

      $array= array(
        'created_at'=>now(),
        'updated_at'=>now(),
        'artistid'=>$userid,
        'userid'=>'',
        'message'=>'offer has been deleted From the Artist',
        'notificationfor'=>'user',
        'mediaid'=>''

      );


      $done = $this->insertNotification($array);

    }

    return $done;


    }

    public function deleteCollection($data){

      $session_data =   Session::get('User');

      $userid =  $session_data->id;

      // $folder = 'temporary_files';

      //   //Get a list of all of the file names in the folder.
      //   $files = glob($folder . '/*');

      //   //Loop through the file list.
      //   foreach($files as $file){
      //       //Make sure that this is a file and not a directory.
      //       if(is_file($file)){
      //           //Use the unlink function to delete the file.
      //           unlink($file);
      //       }
      //   }

        $updated = DB::table('media')->where('id',$data['id'])->update(array('is_deleted'=>1));

              if($deleted){

                $array= array(
                  'created_at'=>now(),
                  'updated_at'=>now(),
                  'artistid'=>$userid,
                  'userid'=>'',
                  'message'=>'Media has been deleted From the Artist',
                  'notificationfor'=>'user',
                  'mediaid'=>''
      
                );
      
      
                $deleted = $this->insertNotification($array);

              }

              return $deleted;
    }

    public function getRandomData(){

      $session_data =   Session::get('User');

      $userid =  $session_data->id;

      $random  = DB::table('media')
      ->where(array('contentProviderid'=>$userid,'profile_video'=>'yes'))
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
    
        return $update ? 1 : 0;
    }


    public function showEarnings(){

      $session_data =   Session::get('User');

      $userid =  $session_data->id;   

      $data = \DB::table("payment_token")    
      ->leftjoin("media",\DB::raw("FIND_IN_SET(media.id,payment_token.mediaid)"),">",\DB::raw("'0'"))
      ->leftjoin('offer','offer.id','=','payment_token.mediaid')
      ->leftjoin('users','users.id','=','payment_token.userid')
      ->select("users.nickname",\DB::raw("offer.type as types"),'payment_token.mediaid',\DB::raw("offer.title as Offertitles"),'payment_token.tokens','payment_token.pay_from','payment_token.created_at',\DB::raw("GROUP_CONCAT(media.title) as mediaTitle"),\DB::raw("GROUP_CONCAT(media.type) as mediaType"))
       ->groupBy('users.nickname','offer.type','payment_token.mediaid','payment_token.pay_from','offer.title','payment_token.tokens','payment_token.created_at')
      ->where('payment_token.artistid', $userid)
      ->get();
      //   echo "<pre>";
      // print_r($data);die;
  
       return $data;
    }

    public function insert_in_bonus($user,$artist,$amount){

            $data=array(
              'created_at'=>now(),
              'updated_at'=>now(),
              'userid'=>$user,
              'artistid'=>$artist,
              'passive_income'=>$amount,
            );

            return DB::table('show_bonus_passive')->insert($data);
    }
    
    
    public function deleteListFromLibrary($data){
           $deleted = DB::table('playlist')->where('id',$data['id'])->delete();
           if($deleted){
              return DB::table('listname')->where('listname',$data['listname'])->delete();
           }
    }

    public function getSumOfPassive($artid){

      return DB::table('show_bonus_passive')
      ->select(DB::raw('SUM(passive_income) as passive'))
      ->where('artistid',$artid)
      ->get()->toArray();

    }

    public function cancelOrder($data){
      $offer_data = $this->selectDataById('id','offer',$data['offerid']);

     // print_r($offer_data);die;

      $update_offer = array(
        'status'=>'cancelled',
        'reason_of_cancel'=>$data['reason'].','.$data['reason_cancel']
      );

      $updateStatus = $this->UpdateData('offer','id',$update_offer,$data['offerid']);
      if($updateStatus){
          $getToken = DB::table('reserved_tokens')
          ->where(array('customer_order_id'=>$data['offerid']))
          ->get()->toArray();

          $update = DB::table('users')->where('id',$offer_data[0]->userid)->update([
            'tokens' =>  DB::raw('tokens +'.$getToken[0]->tokens)
          ]);

          $notification = array(
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d'),
            'artistid'=>$offer_data[0]->artistid,
            'userid'=>$offer_data[0]->userid,
            'notificationfor'=>'user',
            'message'=>'Your order'.' ' .$offer_data[0]->title.' has canceled and your tokens have been returned',
          );

          DB::table('notification')->insert($notification);

      $delete =  DB::table('reserved_tokens') ->where(array('customer_order_id'=>$data['offerid']))->delete();

          return $delete ? 1 : 0;

      }

  

    }
    
    public function deleteFromVideoVerify($id){

      return DB::table('video_verified')->where('mediaid',$id)->delete();

}


public function insertReport($data){
  $session_data =   Session::get('User');

  $userid =  $session_data->id;  

      $array = array(
        'created_at'=>now(),
        'updated_at'=>now(),
        'userid'=>$userid,
        'mediaid'=>$data['mediaid'],
        'reason'=>$data['reason'],
        'description'=>$data['description']
      );
      $insert =DB::table('report_media')->insert($array);
      return $insert ? 1 : 0;
}

public function profileInfo($id){

  return DB::table('contentprovider')
  ->leftjoin('media', 'media.contentProviderid', '=', 'contentprovider.id')
  ->select('contentprovider.*', 'media.*')
  ->where('contentprovider.id',$id)
  ->where('media.profile_video','yes')
  ->get()
  ->toArray();



}


}