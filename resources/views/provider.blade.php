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
  {!!Form::open(['action' => 'AuthController@providerContent', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
        <h1>Content Provider Detail</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
            {{Form::label('Email', 'E-Mail Address')}} 
                {{Form::text('email', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
            </div>
            <div class="col-md-6 mt-5 ">
            {{Form::label('Video/Audio Price', 'Video/Audio Price')}} 
                {{Form::text('price', '',['class'=>'form-control','placeholder'=>'Enter Price'])}}
            </div>
            <div class="col-md-6 mt-5 ">
            {{Form::label('Title', 'Title')}} 
                {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter Title'])}}
            </div>
            <div class="col-md-6 mt-5 ">
            {{Form::label('Keyword', 'Keyword')}} 
                {{Form::text('keyword', '',['class'=>'form-control','placeholder'=>'Enter Keyword'])}}
            </div>
            <div class="col-md-6 mt-5">
            {{Form::label('Description', 'Description')}} 
                {{Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])}} 
                {{Form::file('audio',['class'=>'custom-file-input'])}}
            </div>
            <div class="col-md-6 mt-4">
            <select name="category" class='form-control'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                    @endforeach
                </select>
            </div>
            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
     </div>
  {{ Form::close() }}
  </div>
</div>

