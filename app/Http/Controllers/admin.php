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

class admin extends Controller
{
    //
   private $model;

    public function __construct(Request $request, Redirector $redirect)
    {
        
        
       $this->model= new Registration();
         }
      
  

    public function showCategorypage(){
      
       $model = new Registration();

       $data = $model->getCategory();


         return view('admin.category',['category'=>$data]) ;     
  }

  public function addCategory(Request $req){
      $this->validate($req,[
        'category'=>'required'
      ]);
      $data=$req->all();
      unset($data['_token']);
      $model=new Registration();
      $categoryData = $model->addCategorytable($data);
      if($categoryData){
        return redirect('admin/getCategory#success')->with('success','Category Add Successfully!');
      }
      else{
        return redirect('admin/getCategory#error')->with('error','Some Error Occured!');

      }
    }

    public function showSubCategory($catId){
    	  $model = new Registration();

       $data = $model->getSubcategory();
    	//echo $catId;
    	return view('admin.subcategory',['catId'=>$catId, 'subcategory'=>$data]);
    }


    public function addSubCategory(Request $req){
    	$this->validate($req,[
        'subcategory'=>'required'
      ]);
      $data=$req->all();
      unset($data['_token']);
      $model=new Registration();
      $Subcategory = $model->insertSubcategory($data);
      if($Subcategory){
        return redirect('admin/sub/'.$data['catid'])->with('success','Subcategory Add Successfully!');
      }
      else{
        return redirect('admin/sub#error')->with('error','Some Error Occured!');

      }
    }
}
