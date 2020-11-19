<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use App\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;

class artist extends Controller
{
    private $model;

	  public function __construct()
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
        $artists=$this->model->getArtists();
      }
      
      $data = $this->model->getCategory();
      

    	return view('artists',['artists'=>$artists, 'category'=>$data]);
    }


    public function showRequest(){

        $showRequest = $this->model->showRequests();

    

        return view('artists.request',['request'=>$showRequest]);

    }


    public function artistDetail($artistid){
         
    	   $allArtists=     $this->model->getArtistDetail($artistid);
         $category_data = $this->model->getCategory();
      	
    	   return view('artistDetail',['details'=>$allArtists,'category'=> $category_data ]);
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
              return count($arrayId);
           
    }

    public function cart(){
        $arrayId=Session::get('ids');
                
        $cartData= $this->model->getCart($arrayId);
        $totalPrice= $this->model->getTotalPrice($arrayId);

        
        return view('cart',['cart'=>$cartData,'totalPrice'=>$totalPrice]);
    }

    public function artistProfile(){
    
        return view('artistProfile');
    }

    public function artistVideo($vedioid){
      
          $allVedios = $this->model->getVideo($vedioid);

          $arrayId=Session::get('ids');
          $count=$arrayId ? count($arrayId) : '';
          $category_data = $this->model->getCategory();
  
       return view('artistVideo',['vedios'=>$allVedios,'category'=>$category_data, 'count'=>$count]);
    }

    public function getRespectedSubId(Request $req){

     
        $subCategory = $this->model->getRespectedSub($req);

        $returnData= $subCategory ? response()->json($subCategory) :response()->json(array('status'=>0, 'messege'=>'No Data Found'));

        return $returnData;
        
      
    }

    public function dashboard()
    {

        $contentType =   Session::get('User');
      return view('artists.dashboard_home',['contentUser'=>$contentType]);

  }

    public function profile(){


         $contentLogin =   Session::get('User');
      
      return view('artists.profile',['contentUser'=>$contentLogin]);

  }

}
