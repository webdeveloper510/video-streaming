<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use App\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

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


    public function showRequest(){

      $navbaractive = 'requests';

      $showRequest = $this->model->showRequests();

    

        return view('artists.request',['tab'=>$navbaractive,'request'=>$showRequest]);

    }


    public function artistDetail($artistid){

         Session::forget('SessionmultipleIds');
         
         $allArtistsVideo =     $this->model->getArtistDetail($artistid,'video');
         
         $allArtistsAudio=      $this->model->getArtistDetail($artistid,'audio');

         $allArtistOffer =      $this->model->getArtistOffer($artistid);

          $isSubscribe =         $this->model->isSubscribe($artistid);

         $onlyArtistDetail =      $this->model->onlyArtistDetail($artistid);

         $allPlaylist =      $this->model->getAllPlaylist();

        //  echo "<pre>";

        //  print_r($allPlaylist);die;


         $category_data = $this->model->getCategory();      

         return view('artistDetail',['cartVideo'=>'','details'=>isset($allArtistsVideo) ? $allArtistsVideo:[],'artist'=>$onlyArtistDetail,'playlist'=>isset($allPlaylist) ? $allPlaylist:[],'audio'=>isset($allArtistsAudio) ? $allArtistsAudio : [],'category'=> $category_data, 'offerData'=>isset($allArtistOffer) ? $allArtistOffer :[],'isSubscribed'=>$isSubscribe]);
    
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

    public function artistVideo($vedioid){
      
          $allVedios = $this->model->getVideo($vedioid);

          //print_r($allVedios);die;

         $all_play_lists = $this->model->getPlaylist();

         //echo "<pre>";

         //print_r($allVedios);die;

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

        $returnData= $subCategory ? response()->json($subCategory) :response()->json(array('status'=>0, 'messege'=>'No Data Found'));

        return $returnData;
        
      
    }

    public function dashboard()
    {

      $navbaractive = 'dashboard';

      $contentType =   Session::get('User');

      $this->model->today_PAZ();

      $monthly_PAZ = $this->model->month_PAZ();

      $year_PAZ = $this->model->year_PAZ();

      //print_r($monthly_PAZ);die;

      return view('artists.dashboard_home',['contentUser'=>$contentType,'tab'=>$navbaractive,'month_paz'=>$monthly_PAZ,'year_PAZ'=>$year_PAZ]);

    }

    public function profile(){

      $navbaractive = 'profile';

      $session_data =   Session::get('User');

      $userid=  $session_data->id;

      $allArtistsVideo =     $this->model->getArtistDetail($userid,'video');
         
      $allArtistsAudio=     $this->model->getArtistDetail($userid,'audio');

       $allArtistOffer =      $this->model->getArtistOffer($userid);


      $allPlaylist =      $this->model->getAllPlaylist();

      $contentLogin =   Session::get('User');
      
      return view('artists.profile',['tab'=>$navbaractive,'contentUser'=>$contentLogin,'details'=>isset($allArtistsVideo) ? $allArtistsVideo:[],'playlist'=>isset($allPlaylist) ? $allPlaylist:[],'audio'=>isset($allArtistsAudio) ? $allArtistsAudio : [], 'offerData'=>isset($allArtistOffer) ? $allArtistOffer :[]]);

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

      $this->validate($req,[
          'media' => 'required|mimes:mp4,ppx,mp3,pdf,ogv,jpg,webm',
          'title'=>'required',
          'keyword'=>'required',
          'delieveryspeed'=>'required',
          'description'=>'required',
          'category'=>'required',
          'price'=>'required'
      ]
        );

        if($req->media){

            $data=$req->all();
              $fileName = time().'_'.$req->media->getClientOriginalName();
              $ext =$req->media->getClientOriginalExtension();
              $filePath= $ext=='mp3' ? $req->media->storeAs('audio', $fileName, 'public') : $req->media->storeAs('video', $fileName, 'public');

              unset($data['_token']);
              $data['media']=$fileName;
              $data['categoryid']=$req->category;
              $data['type']=  $ext=='mp3' ? 'audio' : 'video'; 
                if($filePath){

                $createOffer = $this->model->createOffer($data);
                  if($createOffer==1){
                      return redirect('artist/offer#success')->with('success','Offer Created Successfully!');
                    }
                    else
                    {
                        return redirect('artist/offer#error')->with('error','Some Error Occure!');
                    }
              }
      }


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

  }
