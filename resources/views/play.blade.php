@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/play.css')}}" />
<!-- end header -->

<div class="row pb-row">
 
<div class="container">
<div class="text-right">
      <select class="form-select form-control col-md-4" aria-label="Default select example">
        <option selected>All</option>
        <option value="1">Collection</option>
        <option value="2">Playlists</option>
        <option value="3">Wishlist</option>
        <option value="4">History</option>
      </select>
  </div>
<div class="col-md-12 uploa_outer " id="collection">
		  <div class="slider_tittle">
		  <h3 class="tittle">My Collection</h3>		  
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
            @else
		             <div class="playwish">
                     <h4>Collection Empty</h4>

                   </div>
                   @endif
	</div>
  </div>
</div>
  <!-- -------------------------- Play List  Start--------------------------->


<div class="inner-page">
  <div class="container">
      <div class="col-md-12 uploa_outer" id="playlist">
		  <div class="slider_tittle">
		  <h3 class="tittle">Playlist</h3>	
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
       @else
       <div class="playhistory col-md-12">
                     <h4>No play list created yet. <span id="playlistCreate" class="show_list">Create play List +</span></h4>
                     <span class="create_playlistt" style="display: none">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>

                   </div>
            @endif
			
	</div>
	<br/>
</div>

  <!-- -------------------------- Wish list Start--------------------------->



	<div class="col-md-12 uploa_outer" id="wishlist">
		  <div class="slider_tittle" >
		  <h3 class="tittle">Wishlist</h3>		  
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
            @else
		             <div class="playwish playhistory col-md-12">
                     <h4>Wishlist Empty</h4>

                   </div>
                   @endif
	</div>
	<br/>
</div>
  <!-- -------------------------- History Section  Start--------------------------->


	<div class="col-md-12 uploa_outer" id="history">
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
            @else
            <div class="playhistory col-md-12">
                     <h4>History Empty</h4>

                   </div>
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
body{
  background: black;
}
 .owl-carousel {
    display: block !important;
  }
  select.form-select.form-control.col-md-4 {
    float: right;
    margin-top: 22px;
}
  .playhistory {
    border: none;
    width: 100%;
    text-align: left;
    padding-bottom: 0;
}
.playwish {
    border: 2px dashed red;
    width: 100%;
    text-align: center;
    padding-bottom: 11px;
}
.playhistory h4 {
    margin: 0;
    font-size: 12px;
}
.inner-page {
    display: inline-block;
    width: 100%;
}
h3.tittle {
    color: #ffffff;
}
.row.pb-row {
    background: black;
    color: white !important;
}
.playhistory.col-md-12 h4 {
    color: white !important;
}
.pb-video:hover {
    border: 1px solid gold;
    padding: 5px;
}
span#playlistCreate {
    font-size: 15px;
    font-weight: 700;
    cursor:pointer;
}
</style>
<!--body end-->

<!--footer -->
@include('layouts.footer')

