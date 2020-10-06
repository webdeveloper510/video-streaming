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
    $model=new Registration();
    	$artists=$model->getArtists();
    	return view('artists',['artists'=>$artists]);
    }
    public function artistDetail($artistid){
         $model=new Registration();
    	 $allArtists=$model->getArtistDetail($artistid);
    	// echo "<pre>";
    	 //print_r($allArtists);die;
    	 return view('artistDetail',['details'=>$allArtists]);
    }
}
