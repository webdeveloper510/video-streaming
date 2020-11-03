@extends('layout.cdn')

<!--?php echo HTML::assets('style.css');?!-->

<section class="background1">
@include('layouts.header')
    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg text-white mt-5">
          <div class="row">
            <div class="col text-center ">
              <!-- <h1>Login</h1> -->
            </div>
          </div>
          <h1 class="text-white">Login</h1>
      
          @if(session('error'))
        <div class="alert alert-danger" id="error">
        {{session('error')}}
        </div>
        @endif
       
           {!!Form::open(['action' => 'AuthController@postLogin', 'method' => 'post'])!!}
          <div class="form-group">
               {{Form::label('E-Mail Address', 'E-Mail Address')}} 
                {{Form::text('email', '',['class'=>'form-control ','placeholder'=>'example@gmail.com'])}}
                @if($errors->first('email'))
                <div class="alert alert-danger">
                <?php echo $errors->first('email'); ?>
            
             
          </div>
              @endif
        </div>
          <div class="form-group">
               {{Form::label('Password', 'Password')}} 
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
                @if($errors->first('password'))
                 <div class="alert alert-danger">
                <?php echo $errors->first('password'); ?>
              
          </div>  
                @endif
          </div>  

            

<!-- if there are login errors, show them here -->
<p>
  
</p>
   <div class="g-recaptcha mb-3" data-sitekey="<?php echo '6LdqSt4ZAAAAAEoqklLSyUv6x5siuZ3ynjSIG2mX'; ?>"></div>
     @if(session('captcha'))
                <div class="alert alert-danger">
                {{session('captcha')}}
            
             
          </div>
              @endif

            <p>{{ Form::submit('Login!',['class'=>'btn btn-primary']) }}</p>
            {{ Form::close() }}
           
        
<p class="text-white">Don't have an account yet ?</p>
<a href="{{ URL::to('register')}}" class="ffff "> Signup Now</a>
        </div>
      </div>
    </div>
  </section>
  <style>

    a.ffff {
        color: blue;
    }

  </style>
  @include('layouts.footer')

<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  