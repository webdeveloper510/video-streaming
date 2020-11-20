<?php

namespace App;
use DB;
use Session;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Arr;

class Registration extends Model
{
    public function registration($data)
    {
        //print_r($data->all()); die;
        $value=DB::table('users')->where('email',$data['email'])->get();
        //print_r($value->count());die;
        if($value->count() == 0){
            $userdata=$data->all();
            $userdata['password']= md5($data['password']);
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
        //print_r($data->all()); die;
        $value=DB::table('contentprovider')->where('email', $data['email'])->get();
        //print_r($value->count());die;
        if($value->count() == 0){

            $userdata = $data->all();
            $userdata['password']= md5($data['password']);
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
       $value=DB::table('media')      
       ->whereIn('id',$cartid)
       ->get();
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
             
              
             // print_r($value);die;
          

           if(is_null($value)){
                  return 0;
            }
              else{

                if($value->verify!=1){

                            return 'Not Verify';
                }

                else{

                  //echo "yes";die;

    $data['user'] == 'users' ? Session::put('userType','User'): Session::put('userType','contentUser');
     Session::put('User', $value);
                return 1;
            }
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
          ->where(function($query) use ($data)
                {
                     foreach($data as $key=>$val){
                     
                  if(is_array($val))
                     $query->whereIn($key, $val);
                  
                }

                });

/* -------------------------------------------End Filter Data Using WhereIn-------------------------------------- */

/* -------------------------------------------Filter Data Using orderBy-------------------------------------- */

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
/*-----------------------------------------Get Vedio By Subcategory Id------------------------------------------------*/
public function getSubcatVid($subid){

    $value=DB::table('media')->where('subid', $subid)->get();

    return $value;

}
/*-----------------------------------------End------------------------------------------------*/
public function getNewComes(){
     $newComes = DB::table('media')->orderBy('contentProviderid','desc')->take(10)->get();
    return $newComes;
}


/*-------------------------------Insert Recent Vedio Media Id---------------------------------------------------*/

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
/*-------------------------------End---------------------------------------------------*/
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

public function getArtists(){
  $artists=DB::table('contentprovider')->paginate(10);
  return $artists;
}

public function getArtistDetail($artid){
      $artistsDetail=DB::table('contentprovider')
      ->leftjoin('media', 'contentprovider.id', '=','media.contentProviderid')
       ->select('contentprovider.*', 'media.*')
       ->where('contentprovider.id',$artid)
       ->get()->toArray();
       if($artistsDetail){
           return $artistsDetail;
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
       ->get();

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

      $table_name = $type == 'user' ? 'users' : 'contentprovider'; 

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


      $data = DB::select("SELECT i.id,i.title,i.price,i.duration, i.description,i.media,i.userid,GROUP_CONCAT(c.category) as category_name, (SELECT nickname from users WHERE i.userid=users.id  ) as user_name FROM    add_request i, category c WHERE FIND_IN_SET(c.id, i.cat) GROUP BY i.id,i.title,i.price,i.duration, i.description,i.media,i.userid");
  
        return $data;
        
//       echo "<pre>";
// print_r($data);die;
//             $requests = DB::table('add_request')->get()->toArray();

//             //return $requests;

//             $requests[] = DB::table("category")->select('*')
//             ->whereIn('id',function($query){
//                $query->select('cat')->from('add_request');
//             })
//             ->get()->toArray();

                 
//             return $requests;
    }


    public function addRequest($data){

        $session_data =   Session::get('User');

        $reqData = $data->all();

          $reqData['created_at']=now();
        $reqData['updated_at']=now();

         $reqData['userid'] =  $session_data->id ;

        $reqData['duration'] = $reqData['min'].' Minutes - '.$reqData['max'].'Minutes';

        $reqData['total_price'] = $reqData['total'] ? $reqData['total'] : 0;

        unset($reqData['min']);
        unset($reqData['total']);
        unset($reqData['max']);
        

       $category = implode(',', $reqData['categories']);

       unset($reqData['categories']);


       $reqData['cat'] = $category;

       //print_r($reqData);

        $req = DB::table('add_request')->insert($reqData);

        return $req ? 1 : 0 ;
    }

    // public function getUserProfile($uid){

    //    $value=DB::table('users')->where('id', $userId)->get()->toArray();

    // }


}
