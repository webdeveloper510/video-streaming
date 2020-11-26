
@if($viewName=='user')
@include('layouts.header');
@else
@include('artists.dashboard');

@endif
		<div class="container mt-5">
			<h2><b>Notification</b></h2>
			<hr>
		@foreach($notification1 as $val)
	      
		    <div class="row">
		    	<div class="col-md-2">
		    		<img src="" alt="artist profile pic">
		    	</div>
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

		@if($viewName=='user')
@include('layouts.footer');
@else
@include('artists.dashboard_footer');
@endif