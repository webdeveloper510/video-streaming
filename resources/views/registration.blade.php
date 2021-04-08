

<!--?php echo HTML::assets('style.css');?!-->
@include('layouts.header')
<div class="header py-3">
 <img src="{{asset('images/logos/good_quality_logo.png')}}" width="60%" alt="CoolBrand">

      <h3 style="font-family: 'Alfa Slab One', cursive;font-weight: 400; color:white; text-align:center; padding:20px 0px;"> THE ART OF PORN IS FINALLY VALUED </h3>
       <div class=" row my-4">
          <div class="col-6 text-center">
             <a href="{{url('/register')}}"><button type="button" class="btn btn-primary">Join Fee</button></a>
          </div>
          <div class="col-6 text-center">
             <a href="{{url('/login')}}"><button type="button" class="btn btn-primary">Login</button></a>
          </div>
       </div>
 </div>
<section class="background1">
 
    <div class="container pt-5 pb-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg mt-5">
          <div class="row">
            <div class="col text-center">
              <h1 class="text-white">Join as</h1>
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

        {{Form::radio('person', 'users', $checkRadio == 'user' ,['class'=>'user'])}} Customer 

        {{Form::radio('person', 'contentprovider',$checkRadio=='artist',['class'=>'user'])}} Artist

        @if($errors->first('email'))
                <div class="alert alert-danger">
                     <?php echo $errors->first('person'); ?>
                </div>
                @endif


            </div>
          </div>
           <div class="row align-items-center">
            <div class="col mt-4">
            {{Form::label('email', 'E-Mail Address')}} 
                {{Form::email('email1',null,['class'=>'form-control checknameExist','data-id'=>'email','placeholder'=>'example@gmail.com'])}}
                @if($errors->first('email'))
                <div class="alert alert-danger">
                     <?php echo $errors->first('email'); ?>
                </div>
                @endif
                <div class="alert alert-danger alreadyNickname" id="email" style="display:none">
                </div>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
            {{Form::label('Nickname', 'Nickname')}} 
                {{Form::text('nickname',null,['class'=>'form-control checknameExist','data-id'=>'nickname','placeholder'=>'Enter Nickname'])}}
                @if($errors->first('nickname'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('nickname') ?>
                </div>
                @endif
                <div class="alert alert-danger alreadyNickname" id="nickname" style="display:none">
                </div>
               

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

          <div class="row align-items-center mt-4">
            <div class="col">
            {{Form::label('Confirm-Password', 'Confirm-Password')}}
                {{Form::password('confirm',['class'=>'form-control','placeholder'=>'Confirm-Password'])}}
                @if($errors->first('confirm'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('confirm') ?>
                </div>
            </div>
          </div>
          @endif

          <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
              {{Form::checkbox('terms','value',false,['class'=>'checkbox','placeholder'=>''])}}
              <label>I accept <a class="text-white" style="border-bottom-color: initial;
                border-bottom-style: solid;
                border-bottom-width: 1px; border-color: blue;" href="{{url('/terms')}}">Terms & Conditions</a>  and <a class="text-white" style="border-bottom-color: initial;
                border-bottom-style: solid;
                border-bottom-width: 1px; border-color: blue;"  href="{{url('/privacy')}}">Privacy Policy</a> </label> <br>

               {{Form::checkbox('AgeRestriction','value',false,['class'=>'checkbox','placeholder'=>''])}}{{Form::label('Terms & Condition', 'I am at least 18+ years old')}}<br>
               <span class="discount">{{Form::checkbox('news','value',false,['class'=>'checkbox','placeholder'=>''])}}{{Form::label('Terms & Condition', 'I would like to receive Discounts and News from PAZ')}}</span>
                
              </div>

              {{ Form::submit('Register!',['class'=>'btn btn-primary register']) }}
            </div>
          </div>
          {{ Form::close() }}
     
           <p class="mt-2 text-white">Already have an account ?</p>
          <a href="{{ URL::to('login')}}" style="color:blue; font-size: 17px;">Login</a>
         
              
        </div>
      </div>
    </div>
  </section>
<style type="text/css">
  .register{
    border-radius: 28px !important;
  }

  .alert-danger {
    margin-top: 10px;
}
header#default_header {
    display: none;
}
.header {
    background: #881114;
}
.header img {
    display: block;
    margin: 0px auto;
}
.alert-success {
    margin-top: 10px;
}
</style>
@include('layouts.footer')