<?php

namespace App\Http\Controllers;
use App\Registration;
use Session;
use App\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;

class ArtistController extends Controller
{
	  private $model;

    public function __construct()
    {

       $this->model= new Registration();

    }
    //
    public function getArtists(){

      $data = $this->model->getCategory();

    $artists=$model->getArtists();
    	return view('artists',['artists'=>$artists, 'category'=>$data]);
    }
    public function artistDetail($artistid){
    	 $allArtists=$this->model->getArtistDetail($artistid);

        $category_data = $this->model->getCategory();
    	 //echo "<pre>";
    	// print_r($allArtists);die;
    	 return view('artistDetail',['details'=>$allArtists,'category'=> $category_data ]);
    }

    public function cart(Request $req){
               // Session::forget('ids');
               // die;
            $data=$req->all();
            //print_r($data['id']);
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

    public function cart1(){
       $arrayId=Session::get('ids');
               // print_r($arrayId);die;
       
        $cartData=$this->model->getCart($arrayId);
        $totalPrice=$this->model->getTotalPrice($arrayId);
        //echo "<pre>";
       // print_r($totalPrice);
        
        return view('cart',['cart'=>$cartData,'totalPrice'=>$totalPrice]);
    }

    public function artistProfile(){
    
      return view('artistProfile');
    }

    public function artistVideo($vedioid){

        $allVedios=$this->model->getVideo($vedioid);

          $arrayId=Session::get('ids');
          $count=$arrayId ? count($arrayId) : '';
           $category_data = $this->model->getCategory();
  // print_r($allVedios);die;
      return view('artistVideo',['vedios'=>$allVedios,'category'=>$category_data, 'count'=>$count]);
    }

    public function ShowArtistNotification(){

            return view('artists.notification');
    }



     public function addUserDescription(Request $req){
      echo "hh";
       // print_r($req->all());
    }



}
