@extends('layout.cdn')
<section class="background3">
<div class="container mt-5">
<div class="overlay1 mt-5">
<a href="{{ URL::to('logout')}}" class="ffff text-white float-right"> Logout</a>
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
  {!!Form::open(['action' => 'admin@addCategory', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
      <div class="inner_profile text-white">
        <h1 class="text-center">Add Category</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
                {{Form::label('Add Category', 'Add Category')}} 
                 {{Form::text('category', '',['class'=>'form-control','placeholder'=>'Add Category'])}}
            </div>
            <div class="col-md-6 mt-5">
            {{Form::label('Category Type', 'Category Type')}} 
                {{Form::select('type', ['audio' => 'Audio', 'video' => 'Video','artist'=>'Artist'], null, ['class'=>'form-control','placeholder' => 'Choose a type'])}}
            </div></br>
            {{ Form::submit('Submit!',['class'=>'btn btn-primary cat_sub']) }}
     </div>
  {{ Form::close() }}

  <table class="table table-bordered text-white">
  <tr>
    <th>Sr. No</th>
    <th>Category Name</th>
    <th>Category Type</th>
    <th>Sub Category</th>
  </tr>
  @foreach($category as $index=>$cat)
  <tr>
    <td>{{$index}}</td>
    <td>{{$cat->category}}</td>
    <td>{{$cat->type}}</td>
    <td><a href="{{url('admin/sub/'.$cat->id)}}">Add Sub category</a></td>
  </tr>
  @endforeach
  
</table>
</div>
  </div>
</div>
</div>
</section>
