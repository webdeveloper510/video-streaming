@extends('layout.cdn')
<section class="background1">
<div class="container mt-5">

<a href="{{ URL::to('logout')}}" class="ffff text-white float-right"style="margin-top: -32px;"> Logout</a>
  @if(session('success'))
        <div class="alert alert-success" id="success">
        {{session('success')}}
        </div>
        @endif
         
          @if(session('error'))
        <div class="alert alert-danger" id="error">
        {{session('error')}}
        </div>
        @endif
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
        {{$error}}
        </div>
        @endforeach
        <div class="overlay1 text-white">
  {!!Form::open(['action' => 'admin@addSubCategory', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
        <h1 class="text-center">Add Category</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mb-3 ">
                {{Form::label('Sub-Category', 'Sub-Category-Name')}} 
                 {{Form::text('subcategory', '',['class'=>'form-control','placeholder'=>'Add Category'])}}
                 

                 <input type="hidden" name="catid" value="{{$catId}}">

            </div>
            <div class="col-md-6 text-left mt-4 mb-2 pb-2">
                 {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
            </div>
           
     </div>
  {{ Form::close() }}
  </div>


<table class="text-white table-responsibe">
  <tr>
    <th>Sr. No</th>
    <th>Subcategory Name</th>
  </tr>
  @foreach($subcategory as $index=>$sub)
  <tr>
    <td>{{$index+1}}</td>
    <td>{{$sub->subcategory}}</td>
  </tr>
  @endforeach
  
</table>
</section>
<style type="text/css">
  .background1{
    height:auto !important;
  }
</style>