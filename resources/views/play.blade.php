
@include('layouts.header')

<!-- end header -->
<div class="inner-page">
  <div class="container">
      <div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">Play list</h3>	
      <form>	
       <div class="form-group">
    <label for="exampleFormControlSelect1"> Select Playlist</label>
    <select class="form-control" name="playlist" id="exampleFormControlSelect1">
      <option value="">Choose..</option>
       @foreach($listname as $val)
<option value="{{$val->id}}">{{$val->playlistname}}</option>
@endforeach
    </select>

  </div>
  </form>  
		</div>
        <div class="row pb-row">
          @if($videos)
          @foreach($videos as $indx=> $val)
            <div class="col-md-3 pb-video">
                <video width="320" height="240" controls>
    <source src="{{url('storage/app/public/video/'.$val->media)}}" type="video/mp4">
           </video>
            </div>
            @endforeach
            @endif
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn"><i class="fa fa-plus" aria-hidden="true"></i>Load more</button></div>
        </div>
	</div>
	<br/>
	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">Wish list</h3>		  
		</div>
        <div class="row pb-row">
              @if($videos)
              @foreach($videos as $indx=> $val)
            <div class="col-md-3 pb-video">
             <video width="320" height="240" controls>
    <source src="{{url('storage/app/public/video/'.$val->media)}}" type="video/mp4">
				
             </video>
            </div>
            @endforeach
            @endif
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn"><i class="fa fa-plus" aria-hidden="true"></i>Load more</button></div>
        </div>
	</div>
	<br/>
	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">History</h3>		  
		</div>
        <div class="row pb-row">
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
				
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/wjT2JVlUFY4?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame " width="100%" height="230" src="https://www.youtube.com/embed/papuvlVeZg8?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/Y1_VsyLAGuk?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn"><i class="fa fa-plus" aria-hidden="true"></i>Load more</button></div>
        </div>
	</div>	
  </div>
</div>  

<!--body end-->

<!--footer -->
@include('layouts.footer')
</body>
<style>
form.form-horizontal {
    width: 100%;
    float: left;
    display: flex;
}
button.btn.btn-default {
    background: #a60000;
}
.uploa_outer form {
    padding: 10px 20px;
}
.uploa_outer {
    float: left;
    width: 100%;
    margin: 20px 0px;
}
.form-group {
    float: right;
    width: 35%;
    margin-top: -74px;
}
</style>
</html>
