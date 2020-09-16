@extends('layout.cdn')

<!--?php echo HTML::assets('style.css');?!-->
<section>

    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <!-- <h1>Login</h1> -->
            </div>
          </div>
          <h1>Login</h1>
        @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
          {{$error}}
        </div>
        @endforeach
        @endif
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
           {!!Form::open(['action' => 'AuthController@postLogin', 'method' => 'post'])!!}
          <div class="form-group">
               {{Form::label('email', 'E-Mail Address')}} 
                {{Form::text('email', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
          </div>
          <div class="form-group">
               {{Form::label('Password', 'Password')}} 
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
          </div>         
            

<!-- if there are login errors, show them here -->
<p>
  
</p>



<p>{{ Form::submit('Login!',['class'=>'btn btn-primary']) }}</p>
{{ Form::close() }}
<p>Don't have an account yet ?</p>
<a href="{{ URL::to('register')}}" class="ffff text-white"> Signup Now</a>
          <!--form action="" method="post" id="form_data">
          <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

          <div class="row align-items-center">
            <div class="col mt-4 @error('email') has-error @enderror">
              <input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
              <span class="text-danger p-1">{{ $errors->first('email') }}</span>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col  @error('password') has-error @enderror">
              <input type="password" class="form-control" name="password" placeholder="Password" required="required">
              <span class="text-danger p-1">{{ $errors->first('password') }}</span>
            </div>  
            
          </div>
          <div class="row justify-content-start mt-4">
            <div class="col">
              

              <button id="submit" class="btn btn-primary mt-4">Submit</button>
              <strong id="msg"></strong>
            </div>
          </div>
          </form-->
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  