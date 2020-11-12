

<!--?php echo HTML::assets('style.css');?!-->
<section class="background1">
  @include('layouts.header')
    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg mt-5">
          <div class="row">
            <div class="col text-center">
              <h1 class="text-white">Register As</h1>
              @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert registration alert-danger">
          {{$error}}
        </div>
        @endforeach
        @endif
        @if(session('success'))
        <div class="alert alert-success" id="sucess">
        {{session('success')}}
        </div>
        @endif
            </div>
          </div>
          @if(session('error'))
        <div class="alert alert-success" id="error">
        {{session('error')}}
        </div>
        @endif
          {!!Form::open(['action' => 'AuthController@UserRegistration', 'method' => 'post'])!!}
          {{Form::token()}}
          <div class="row align-items-center">
            <div class="col mt-4">

               

        {{Form::radio('person', 'user', $checkRadio == 'user' ,['class'=>'user'])}} User

        {{Form::radio('person', 'artist',$checkRadio=='artist',['class'=>'user'])}} Artist
                @if($errors->first('email'))
                <div class="alert alert-danger">
                     <?php echo $errors->first('email'); ?>
                </div>
                @endif
            </div>
          </div>
           <div class="row align-items-center">
            <div class="col mt-4">
            {{Form::label('email', 'E-Mail Address')}} 
                {{Form::text('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
                @if($errors->first('email'))
                <div class="alert alert-danger">
                     <?php echo $errors->first('email'); ?>
                </div>
                @endif
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
            {{Form::label('Nickname', 'Nickname')}} 
                {{Form::text('nickname',null,['class'=>'form-control','placeholder'=>'Enter Nickname'])}}
                @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('nickname') ?>
                </div>
                @endif

            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
            {{Form::label('Password', 'Password')}}
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
                @if($errors->first('password'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('password') ?>
                </div>
            </div>
          </div>
          @endif
          <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
              {{Form::checkbox('terms','value',false,['class'=>'checkbox','placeholder'=>''])}}
              <label>I accept <a class="text-white" href="https://www.websitepolicies.com/policies/view/iV2Lze7O">Terms & Condition</a>  and <a class="text-white" href="https://www.websitepolicies.com/policies/view/GBVn25Ot">Privacy Policy</a> </label> <br>

               {{Form::checkbox('AgeRestriction','value',false,['class'=>'checkbox','placeholder'=>''])}}{{Form::label('Terms & Condition', 'I am at least 18+ years old')}}
                
              </div>

              {{ Form::submit('Register!',['class'=>'btn btn-primary register']) }}
            </div>
          </div>
          {{ Form::close() }}
     
           <p class="mt-2 text-white">Already have an account yet ?</p>
          <a href="{{ URL::to('login')}}" style="color:blue; font-size: 17px;">Login</a>
         
              
        </div>
      </div>
    </div>
  </section>
<style type="text/css">
  .register{
    border-radius: 28px !important;
  }
</style>