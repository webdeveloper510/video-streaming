@extends('layout.cdn')

<!--?php echo HTML::assets('style.css');?!-->
<section class="background1">

    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg">
          <div class="row">
            <div class="col text-center">
              <!-- <h1>Login</h1> -->
            </div>
          </div>
          <h1 class="text-white">Content Provider Login</h1>
        @if(session('success'))
        <div class="alert alert-danger">
        {{session('success')}}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
        {{session('error')}}
        </div>
        @endif
           {!!Form::open(['action' => 'AuthController@contentPostLogin', 'method' => 'post'])!!}
          <div class="form-group">
               {{Form::label('email', 'E-Mail Address')}} 
                {{Form::text('email', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
                @if($errors->first('email'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('email') ?>
                </div>
                @endif
          </div>
          <div class="form-group">
               {{Form::label('Password', 'Password')}} 
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
                @if($errors->first('password'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('password') ?>
                </div>
                @endif
          </div>         
            

<!-- if there are login errors, show them here -->
<p>
  
</p>



<p>{{ Form::submit('Login!',['class'=>'btn btn-primary']) }}</p>
{{ Form::close() }}
<p class="text-white">Don't have an account yet ?</p>
<a href="{{ URL::to('register')}}" class="ffff text-white"> Signup Now</a><br>
<a href="{{ URL::to('/')}}" class="ffff text-white text-right" style="float: right; margin-top: -20px;">Return To Home</a>
          
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  