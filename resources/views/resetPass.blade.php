-@include('layouts.header')

<section class="background1" style="height:100vh">
	 <div class="container ">

	

      <div class="row justify-content-center">

        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg text-white my-5">

        @if(session('error'))
        <div class="alert alert-danger" id="error">
        {{session('error')}}
        </div>
        @endif
		@if(session('success'))
        <div class="alert alert-success" id="error">
        {{session('success')}}
        </div>
        @endif


          
          <h1 class="text-white">Reset Password</h1>
		  {!!Form::open(['action' => 'AuthController@passwordReset', 'method' => 'post'])!!}
          {{Form::token()}}
			  <div class="form-group">
			  {{Form::label('New Password', 'New Password')}} 
                {{Form::password('password',['class'=>'form-control','placeholder'=>'New Password'])}}
				@if($errors->first('password'))
                 <div class="alert alert-danger">
                <?php echo $errors->first('password'); ?>
              
          </div>  
                @endif
			 </div>
			  <div class="form-group">
			  {{Form::label('Confirm New Password', 'Confirm New Password')}} 
                {{Form::password('confirm',['class'=>'form-control','placeholder'=>'Confirm New Password'])}}
				@if($errors->first('confirm'))
                 <div class="alert alert-danger">
                <?php echo $errors->first('confirm'); ?>
              
          </div>  
                @endif
			  </div>
			  
			  {{ Form::submit('Reset!',['class'=>'btn btn-primary']) }}
			  {{ Form::close() }}
		</div>
	  </div>
   </div>
</section>




@include('layouts.footer')