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

    public function artistProfile(){
    
      return view('artistProfile');
    }

    public function artistVideo($vedioid){
       $model=new Registration();
        $allVedios=$model->getVideo($vedioid);

           $category_data = $model->getCategory();
  // print_r($allVedios);die;
      return view('artistVideo',['vedios'=>$allVedios,'category'=>$category_data]);
    }

}
