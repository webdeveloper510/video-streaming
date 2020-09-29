@extends('layout.cdn')
<div class="container mt-5">

<a href="{{ URL::to('logout')}}" class="ffff text-white float-right"> Logout</a>
  @if(session('success'))
        <div class="alert alert-success" id="success">
        {{session('success')}}
        </div>
        @endif
            </div>
          </div>
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
  {!!Form::open(['action' => 'AuthController@addCategory', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
        <h1>Add Category</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
                {{Form::label('Add Category', 'Add Category')}} 
                 {{Form::text('category', '',['class'=>'form-control','placeholder'=>'Add Category'])}}
            </div>
            <div class="col-md-6 mt-5">
            {{Form::label('Category Type', 'Category Type')}} 
                {{Form::select('type', ['audio' => 'Audio', 'video' => 'Video','artist'=>'Artist'], null, ['class'=>'form-control','placeholder' => 'Choose a type'])}}
            </div>
            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
     </div>
  {{ Form::close() }}
  </div>
</div>

