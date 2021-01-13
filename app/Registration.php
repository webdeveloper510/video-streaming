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
       // print_r($value);die;
        if(!$value){
            $userdata=$data->all();
            $userdata['email']=$data['email1'];
            unset($userdata['email1']);
            unset($userdata['confirm']);
            $userdata['password']= md5($data['confirm']);

            $userdata['created_at']= now();
            $userdata['updated_at']= now();
           // print_r($userdata);die;
                //$inserted_data =  DB::table('users')->insert($userdata);
                $insertedid=DB::table('users')->insertGetId($userdata);
             //echo $insertedid;die;
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
        if(!$value){

            $userdata = $data->all();
            $userdata['password']= md5($data['confirm']);
            $userdata['email']= $data['email1'];
            unset($userdata['email1']);
            unset($userdata['confirm']);
            $userdata['created_at']= now();
            $userdata['updated_at']= now();
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


      $update=DB::table('contentprovider')->where('id',$contentId)->update($array);

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
     // print_r($userid);die;
    $update = DB::table('profiletable')->where('userid',$userid)->update([
        'backupemail' => $data['backupemail'],
        'aboutme' => $data['aboutme'],
        'profilepicture' => $data['profilepicture'],
        'gender' => $data['gender'],
        'sexology' => $data['sexology'],
        'titssize' => $data['titssize'] ? $data['titssize']:'',
        'privy' => $data['privy'],
        'ass' =>$data['ass'] ? $data['ass'] :'',
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
     $contentdata['subid']=$contentdata['subcategory'];
      unset($contentdata['category']);
      unset($contentdata['subcategory']);
    $duration=$contentdata['hour'].':'.$contentdata['minutes'].':'.$contentdata['seconds'];
    $timeArr = explode(':', $duration);
     $contentdata['duration']= ($timeArr[0]*3600 ) + ($timeArr[1]*60) + ($timeArr[2]);
     unset($contentdata['hour']);
     unset($contentdata['minutes']);
     unset($contentdata['seconds']);
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

      $artists=DB::table('contentprovider')->take(3)->get()->toArray();
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
       ->orWhere('contentprovider.id',$artid)
       ->get()->toArray();
       if($artistsDetail){
           return $artistsDetail;
       }

  }

  public function onlyArtistDetail($id){
    $details = DB::table('contentprovider')->where('id',$id)->get()->toArray();
    return $details;
  }

  public function getArtistOffer($artistId){

    $offer=DB::table('offer')
    ->leftjoin('category', 'category.id', '=','offer.categoryid')
     ->select('offer.*', 'category.category')
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

        $update = DB::table($table_name)->where('id',$userId)->update([

            'verify' => 1

          ]);

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

      $update = DB::table('all_emails')->where('id',$notify)->update($data);

      return $update ? 1 : 0 ; 

    }


    public function showRequests(){

$data = DB::select("SELECT i.id,i.title,i.price,i.duration, i.artist_description ,i.status,i.description,i.media,i.userid,GROUP_CONCAT(c.category) as category_name, (SELECT nickname from users WHERE i.userid=users.id  ) as user_name FROM    add_request i, category c WHERE FIND_IN_SET(c.id, i.cat) GROUP BY i.id,i.title,i.price,i.duration, i.artist_description , i.status,i.description,i.media,i.userid");
  
        return $data;
    }


    public function addRequest($data){

        $session_data =   Session::get('User');

        $reqData = $data->all();

          $reqData['created_at']=now();
        $reqData['updated_at']=now();

         $reqData['userid'] =  $session_data->id ;

        $reqData['duration'] = $reqData['min'].' Minutes - '.$reqData['max'].'Minutes';

        $reqData['total_price'] = $reqData['total'] ? $reqData['total'] : 0;

         $reqData['artist_description']= '';

        unset($reqData['min']);
        unset($reqData['total']);
        unset($reqData['max']);
        

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

      $data['status'] = 'pending';
      $data['created_at'] = now();
      $data['updated_at'] = now();


      $data['artistid'] = $userid;

      $data['userid'] =0;


        $insert = DB::table('offer')->insert($data);


        return $insert ? 1 :0;
        //print_r($data);die;

    }

    public function showOfer($data){

        $result = $data;
       // print_r($result);die;
        $fetch = DB::table('offer')
        ->where(function($query) use ($result){

            foreach ($result as $key => $value) {

                if(is_array($value)){

                  $query->whereIn('categoryid',$value);

                }

                else{

                  if($key=='price'){

                    $query->orderBy('price',$value);
                  }

                  else{

                   $query->where($key,$value);

                 }
                }

            }

        });

          return $fetch->get();

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
     ->select('offer.*', 'category.category','contentprovider.nickname')
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


           $data = DB::table('notification')->orderBy('id','desc')->take(4)->get()->toArray();

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

        //print_r($vid);die;

        $session_data =   Session::get('User');

        $userid=  $session_data->id;

        //$vid['']

        $checkTokn = $this->selectDataById('id','users',$userid);
        $token = $checkTokn[0]->tokens;

        if($token > $vid['price']){

         // echo "yes";die;

        $value=DB::table('user_video')->where(array('userid'=>$userid,'type'=>'normal'))->get()->toArray();
        //print_r($value);die;
        $return  = count($value) > 0 ? $this->updateUserVideo($userid,$vid,$token,'normal') : $this->insertUserVideo($userid,$vid,$token,'normal');

          return $return;

        }


    }

    public function updateUserVideo($uid,$video,$tok,$type){

         // print_r($video);die;

      if(isset($video['user_id'])){
            $ids = $video['user_id'];
            $id = explode('_',$ids);

            $return = DB::table('offer')->where(array('id'=>$id[0]))->update([
              'userdescription' =>$video['description'],
              'choice'=>$video['duration']
              ]);

            $update = DB::table('user_video')->where(array('userid'=>$uid,'type'=>$type))
            ->update([
                  'videoid' => DB::raw("CONCAT(videoid,',".$id[0]."')"),
                ]);
      }

      else{

             $update = DB::table('user_video')->where(array('userid'=>$uid,'type'=>$type))
            ->update([
                  'videoid' => DB::raw("CONCAT(videoid,',".$video['videoid']."')"),
                ]);
      }

      return $update;
          //

          //print_r($update);die;
          //     if($update==1){

          //    $addTokenArtist = DB::table('contentprovider')->where(array('id'=>$video['art_id']))
          //     ->update([
          //       'token' =>  DB::raw('token +'.$video['price'])
          //     ]);

                
          //      if($addTokenArtist){   
          //           $return = DB::table('users')->where(array('id'=>$uid))
          //           ->update([
          //             'tokens' =>  DB::raw('tokens -'.$video['price'])
          //           ]);
          //      }

          //      //print_r($return);die;

          //     return $return;

          // }

          // else{

          //     return 0;
          // }
    }

    public function insertUserVideo($uid,$video,$tok,$type){

      //print_r($video);die;

      $artistId = $video['art_id'];

      $price = $video['price'];


         //print_r($video);

      if(isset($video['user_id'])){

           $ids = $video['user_id'];
           $description = $video['description'];
           $duration = $video['duration'];           
           $id = explode('_',$ids);

           $return = DB::table('offer')->where(array('id'=>$id[0]))->update([
            'userdescription' =>$description,
            'choice'=>$duration
            ]);
          //  unset($video['user_id']);
          //  unset($video['price']);
          //  unset($video['duration']);
          //  unset($video['description']);
          //  unset($video['art_id']);
      }
  
      $video_data['created_at'] = now();
      $video_data['updated_at'] = now();
      $video_data['userid'] =$uid;
      $video_data['videoid'] = isset($video['videoid']) ? $video['videoid'] : $id[0];
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

       // print_r($newData);die;

        $videoIds = implode(',',$newData);
      

        $lists['userid'] = $userid;

        $ids  = $newData ;

        $lists['videoid'] = $videoIds;

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

    //print_r($listname);die;

     $update = DB::table('playlist')->where(array('userid'=>$userid,'playlistname'=>$listname))->update([
            'listvideo' =>$newListid  //DB::raw("CONCAT(listvideo,',".$videoid."')")
          ]);

        //print_r($update);die;

         if(isset($update)){

           $buyed = $this->buyVideo($lists);

               // print_r($buyed);die;

              $reduce  = $buyed  ? $this->reduceTokens($tokensData,$userid,$tokens,$lists['art_id']): 0;

               // print_r($reduce);die;

               $status_succedd = $reduce  ? $this->insertPaymentStatus($userid,$lists['art_id'],$videoIds,$tokens) : 0;

                $return = $status_succedd;

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

          $status_succedd = $returnData ? $this->insertPaymentStatus($userid,$lists['art_id'],$videoIds,$tokens) : 0;

          //print_r($status_succedd);
          $return = $status_succedd;
        }

       

    }

    else{

      $return = 'Insufficient Paz Tokens';
    }
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

        if($tok < $databasetoks){
         // echo "yes";die;
             $update = DB::table('users')->where(array('id'=>$userid))->update([
            'tokens' =>  DB::raw('tokens -'.$tok)
          ]);

            if($update==1){

              $return = DB::table('contentprovider')->where(array('id'=>$artid))->update([
                        'token' =>  DB::raw('token +'.$tok)
                          ]);

            }

           // print_r($return);die;

             return $update==1 ? 1 : 0;

        }

        else
        {
          //echo "jj";die;
            return 'Insufficient Paz Tokens';
        }
}

public function today_PAZ(){

  $session_data =   Session::get('User');

   $userid =  $session_data->id;

  $value=DB::table('payment_token')->where('artistid',$userid)
  ->whereDate('created_at', Carbon::today())
  
  ->get()->toArray();

  // echo "<pre>";

  // print_r($value);die;

}

public function createList($create){

        $data['listname'] = $create->listname;

     $session_data =   Session::get('User');

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
  //print_r($data);die;
    return $data;
}

public function getPlayListName(){

    $session_data =   Session::get('User');
        $userid =  $session_data->id;

         $value=DB::table('playlist')->where('userid', $userid)->get()->toArray();

         return $value;

}



public function addWishlist($data1){

 // print_r($data1);die;

  // $wishlist = implode(',', $data1);

  unset($data1['_token']);

  $session_data =   Session::get('User');
  $userid =  $session_data->id;
 $data = $this->selectSingleById('userid','wishlist',$userid);


 //print_r($data);die;
 
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


    //print_r($videos);die;

         return $videos;
       }

}

public function addToHistory($data){



  //print_r($data);die;
  $session_data =   Session::get('User');
  $userid =  $session_data->id;
  $data1 = $this->selectSingleById('userid','history',$userid);
  $popularData = $data;

  unset($data['types']);

  //print_r($data1);die;
  $returnadata = count($data1) > 0 ? $this->updateHistory($data,$userid,$data1) : $this->insertHistory($data,$userid);
  //
   $this->getPopularTable($popularData,$userid);
      
}

public function getPopularTable($post,$uid){

  $vid = $post['id'];
  $videos = DB::table("popular")->where(array('userid'=>$uid,'mediaid'=>$vid))->get()->toArray();
    $return = count($videos) > 0 ? $this->updatePopular($post,$uid) : $this->insertPopular($post,$uid);
    //print_r($return);
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

  //$postdata['id'] = 11;
 // $postdata['id'] = 12;

  $newArray =  explode(",",$tableData[0]);
 
  $aunion=  array_merge(array_intersect($postdata, $newArray),array_diff($postdata, $newArray),array_diff($newArray, $postdata));
   
  $result_array = array_unique($aunion);

  

      $updatedId = implode(",",$result_array);

      //print_r($updatedId);die;

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

          return DB::table('offer')->take(3)->get()->toArray();
        }
  else{

        return DB::table('offer')->paginate(3);
  }
}

public function insertHistory($postData,$uid){

  //echo "yes";die;
       // print_r($postData);die;
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

public function checkNameExist($data){

  //print_r($data);die;

   $tablename = $data['table'];

   $name = $data['nickname'];
   $feildname = $data['name'];

  $dataExist = $this->selectDataById($feildname=='nickname' ? 'nickname':'email',$tablename,$name);

    return  count($dataExist) > 0 ? 1 : 0; 

   

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

    public function buyofferVideo($data){

      //print_r($data);die;

      unset($data['_token']);

      $ids = $data['user_id'];

  

      $session_data =   Session::get('User');

      $userid =  $session_data->id;

      $id = explode('_',$ids);

      $checkTokn = $this->selectDataById('id','users',$userid);

      $return  = 0;
    

      $token = $checkTokn[0]->tokens;

      if($token > $data['price']){

        $value=DB::table('user_video')->where(array('userid'=>$userid,'type'=>'offer'))->get()->toArray();

        //print_r($value);die;

       $return  = count($value) > 0 ? $this->updateUserVideo($userid,$data,$token,'offer') : $this->insertUserVideo($userid,$data,$token,'offer');

           $reduced =  $return ? $this->reduceTokens($checkTokn,$userid,$data['price'],$data['art_id']): 0;

        $status_succedd = $reduced  ? $this->insertPaymentStatus($userid,$data['art_id'],$id[0],$data['price']) : 0;

          $return = $status_succedd;
    }

    else{

      $return =  0;
    }

    return $return;

}


public function subscribe($data){

  $session_data =   Session::get('User');

  $userid =  $session_data->id;

  //print_r($data);die;

     $return = DB::table('subscriber')
     //->whereRaw('FIND_IN_SET(?,userid)',[$userid])
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

     // print_r($allIds);die;

  $update = DB::table('subscriber')->where(array('artistid'=>$postData['id']))
  ->update([
      'userid' =>implode(',',$allIds),
      'count' =>  DB::raw('count -'.$count),
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



    // public function addToLibrary1(){

    //  $data = DB::table('playlist')->where(array('userid'=>22,'playlistname'=>'hello'))->get()->toArray();

    //      // print_r($data);die;

    //       if(count($data)> 0){

    //         //echo "yes";die;

    //            $video = 'Xyz.mp4';
    //  $update = DB::table('playlist')->where(array('userid'=>22,'playlistname'=>'hello'))
    //  ->update([
    //         'listvideo' => DB::raw("CONCAT(listvideo,',".$video."')")
    //          ]);

    //        if($update==1){

    //           $tokens = 111;

    //             $reduce  = $this->reduceTokens($tokens,22,100);

    //             print_r($reduce);

    //      }

    // }



    // }


}
