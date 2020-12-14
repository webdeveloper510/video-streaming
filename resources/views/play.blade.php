@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/play.css')}}" />
<!-- end header -->



  <!-- -------------------------- Play List  Start--------------------------->





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



       <!-- -------------------------- Video Section  Start--------------------------->



        <div class="row pb-row">
          @if($videos)
          <div id="recently_search" class="carousel slide carousel-multi-item" data-ride="carousel">


<div id="owl-example" class="owl-carousel">
@forelse ($videos as $vid)
      @if($vid->type=='video')
      <div class="col-md-4">
      
    <video width="370" height="245" controls allowfullscreen>
      <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    
      </div>
      @endif
      @empty
       @endforelse


</div>


</div>
            @endif
			
	</div>
	<br/>


  <!-- -------------------------- Wish list Start--------------------------->



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
		
	</div>
	<br/>

  <!-- -------------------------- History Section  Start--------------------------->


	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">History</h3>		  
		</div>
        <div class="row pb-row">

        @if($history)
              @foreach($history as $indx => $histories)
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%" controls>

               <source src="{{url('storage/app/public/video/'.$histories->media)}}" type="video/mp4">
				
             </video>
            </div>
            @endforeach
            @endif
			
	</div>	
  </div>
</div>
</div>
</div>

<script>
  $(document).ready(function() {
 
  $("#owl-example").owlCarousel({
    items:3
 loop:true,
margin:10,
autoPlay:true,
nav:true,
rewindNav:false
  });
});
 </script>

<style>
 .owl-carousel {
    display: block !important;
  }
</style>
<!--body end-->

<!--footer -->
@include('layouts.footer')

