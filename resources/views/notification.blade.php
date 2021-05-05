
@if($viewName=='user')
@include('layouts.header');
@else
@include('artists.dashboard');

@endif
		<div class="container">
			<h2><b>Notification</b></h2>
			<hr>
		@foreach($notification1 as $val)
		    <div class="row">
		    	@if($val->profilepicture=='')
		    	<div class="col-md-2 notification">
		    	  <span class="firstName" style="display: none;">{{$val->nickname}}</span>
	           	<div class="profileImage"></div>
	          </div>
	          @else
		    	<div class="col-md-2">
		    		<img src="{{url('storage/app/public/uploads/'.$val->profilepicture) }}" width="100px" height="100px" alt="artist profile pic">
		    	</div>
		    	@endif
		    	<div class="col-md-8">
		    		<h3>{{$val->nickname}}</h3>
		            <p>{{$val->message}}</p>
		        </div>
		        <div class="col-md-2">
		         	<p>{{$val->created_at}}</p>
		        </div>

			</div>
			<hr>
		@endforeach

	</div>
		<style type="text/css">
.notification .profileImage {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #512DA8;
  font-size: 35px;
  color: #fff;
  text-align: center;
  line-height: 100px;
  margin: 20px 0;
}
		</style>

		@if($viewName=='user')
@include('layouts.footer')
@else
@include('artists.dashboard_footer')
@endif