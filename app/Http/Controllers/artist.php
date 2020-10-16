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
	  public function __construct()
    {
    		
    }
    //
    public function getArtists(){
     $model = new Registration();

      $data = $model->getCategory();

    $artists=$model->getArtists();
    	return view('artists',['artists'=>$artists, 'category'=>$data]);
    }
    public function artistDetail($artistid){
         $model=new Registration();
    	 $allArtists=$model->getArtistDetail($artistid);

        $category_data = $model->getCategory();
    	 //echo "<pre>";
    	// print_r($allArtists);die;
    	 return view('artistDetail',['details'=>$allArtists,'category'=> $category_data ]);
    }

    public function cartSbmit(Request $req){
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

    public function cart(){
       $arrayId=Session::get('ids');
               // print_r($arrayId);die;
        $model=new Registration();
        $cartData=$model->getCart($arrayId);
        $totalPrice=$model->getTotalPrice($arrayId);
        //echo "<pre>";
       // print_r($totalPrice);
        
        return view('cart',['cart'=>$cartData,'totalPrice'=>$totalPrice]);
    }

    public function artistProfile(){
    
      return view('artistProfile');
    }

    public function artistVideo($vedioid){
       $model=new Registration();
        $allVedios=$model->getVideo($vedioid);

          $arrayId=Session::get('ids');
          $count=$arrayId ? count($arrayId) : '';
           $category_data = $model->getCategory();
  // print_r($allVedios);die;
      return view('artistVideo',['vedios'=>$allVedios,'category'=>$category_data, 'count'=>$count]);
    }

    public function getRespectedSubId(Request $req){
        
        $model=new Registration();

        $subCategory=$model->getRespectedSub($req);

        $returnData= $subCategory ? response()->json($subCategory) :response()->json(array('status'=>0, 'messege'=>'No Data Found'));

        return $returnData;
        
      
    }

    public function dashboard()
    {
      $contentLogin =   Session::get('contentUser');

      return view('artists.dashboard',['contentUser'=>$contentLogin]);
    }

    public function profile(){
      
      return view('artists.profile');
    }

}
