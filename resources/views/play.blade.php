
@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/play.css')}}" />

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
           <div id="recently_search" class="carousel slide carousel-multi-item" data-ride="carousel">


      <div id="owl-example" class="owl-carousel">
      @forelse ($recently as $recnt)
            @if($recnt->type=='video')
            <div class="col-md-4">
            
          <video width="370" height="245" controls allowfullscreen>
            <source src="{{url('storage/app/public/video/'.$recnt->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          
            </div>
            @endif
            @empty
             @endforelse

  
</div>
          @if($videos)
          @foreach($videos as $indx=> $val)

            <div class="col-md-3 pb-video">
                <video width="100%" height="100%" controls>
               <source src="{{url('storage/app/public/video/'.$val->media)}}" type="video/mp4">
           </video>
            </div>
            @endforeach
            @endif
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn">See more</button></div>
        </div>
	</div>
	<br/>
	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">Wish list</h3>		  
		</div>
        <div class="row pb-row">
              @if($wishList)
              @foreach($wishList as $indx=> $val)
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%" controls>
    <source src="{{url('storage/app/public/video/'.$val->media)}}" type="video/mp4">
				
             </video>
            </div>
            @endforeach
            @endif
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn">See more</button></div>
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
			<button onclick="myFunction()" id="myBtn">See more</button></div>
        </div>
	</div>	
  </div>
</div>  

<!--body end-->

<!--footer -->
@include('layouts.footer')
</body>

</html>
