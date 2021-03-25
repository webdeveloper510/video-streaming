@include('layouts.header')
<!-- <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script> -->

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
		  <h3 class="tittle text-white">My Collection</h3>		  
		</div>
        <div class="row pb-row">
              @if($videos)
              @foreach($videos as $indx=> $val)
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%"  controlsList="nodownload" disablePictureInPicture>
    <source src="{{url('storage/app/public/video/'.$val->videos)}}" type="video/mp4">
				
             </video>
           
            </div>
            @endforeach
            @else
		             <div class="playwish ">
                     <h4 class="text-white">Collection Empty</h4>

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
      <!-- <form>	
       <div class="form-group">
    <label for="exampleFormControlSelect1"> Select Playlist</label>
    <select class="form-control" name="playlist" id="exampleFormControlSelect1">
      <option value="">Choose..</option>
       @foreach($listname as $val)
<option value="{{$val->id}}">{{$val->playlistname}}</option>
@endforeach
    </select>

  </div>
  </form>  -->
 

        <!-- Modal -->
        <div class="modal fade w-100" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog " role="document" style="max-width:100%;    z-index: 1099;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Playlists</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <div class="row">
                  <div class="col-md-8 playlist_video_show">
                      <div class="videodata">         

                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="videoinfo">
                      <div class="playlistname">
                          <h4 class="listname">hello</h4>
                          <p>1/5</p>
                      </div>
       <!------------start list------------------>
                   <div class="row video_append">
                   <!-- <div class="videolist col-4" >
                     
                    </div> -->
                        <div class="videonameq col-6">
                              <h3>title</h3>
                              <p>artistname</p>
                        </div>
                   </div>
         <!------------end list------------------>

                   </div>

                  </div>


                  </div>

               </div>
              </div>
              
            </div>
          </div>
        </div> 
 



       <!-- -------------------------- Video Section  Start--------------------------->



        <div class="row pb-row">

        @foreach($listname as $playlist)
        <?php 
              $videos = explode(',',$playlist->videos);
              //print_r($videos);
              $count = count($videos);
              
            ?>
      
      <div class="col-md-4 mb-4">
              <a href="" data-toggle="modal" data-target="#exampleModalCenter">

              <video width="320" height="240" >
                <source src="{{url('storage/app/public/video/'.$videos[0])}}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <div class="videooverlay text-white" onclick="showPlaylistVedio('{{json_encode($playlist)}}')">
              
              <span class="fa-layers fa-fw fa-4x">
              <svg class="svg-inline--fa fa-play fa-w-14" data-fa-transform="shrink-1 right-6.5 down-4" data-fa-mask="fas fa-bars" aria-hidden="true" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><defs><clipPath id="clip-BI4jsYsO0ydT"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></clipPath><mask x="0" y="0" width="100%" height="100%" id="mask-NL2qReMfCV3W" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse"><rect x="0" y="0" width="100%" height="100%" fill="white"></rect><g transform="translate(224 256)"><g transform="translate(208, 128)  scale(0.9375, 0.9375)  rotate(0 0 0)"><path fill="black" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" transform="translate(-224 -256)"></path></g></g></mask></defs><rect fill="currentColor" clip-path="url(#clip-BI4jsYsO0ydT)" mask="url(#mask-NL2qReMfCV3W)" x="0" y="0" width="100%" height="100%"></rect></svg><!-- <i class="fas fa-play" data-fa-transform="shrink-1 right-6.5 down-4" data-fa-mask="fas fa-bars"></i> -->
              <svg class="svg-inline--fa fa-play fa-w-14" data-fa-transform="shrink-8 right-6 down-4" aria-hidden="true" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.8125em 0.75em;"><g transform="translate(224 256)"><g transform="translate(192, 128)  scale(0.5, 0.5)  rotate(0 0 0)"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" transform="translate(-224 -256)"></path></g></g></svg><!-- <i class="fas fa-play" data-fa-transform="shrink-8 right-6 down-4"></i> -->
            </span>
                <h2 class="text-white pl-5">{{$count}}</h2>
                <p class="text-white">{{$playlist->playlistname}}</p>

              </div>
              </a>
            
	</div>
  @endforeach
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
             <video width="100%" height="100%"  controlsList="nodownload" disablePictureInPicture>
    <source src="{{url('storage/app/public/video/'.$val->media)}}" type="video/mp4">
				
             </video>
             
				  
              
				  
            </div>
           
            @endforeach
            @else
		             <div class="playwish playhistory col-md-12 py-4">
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
             <video width="100%" height="100%"  controlsList="nodownload" disablePictureInPicture>

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
</div>


<style>
body{
  background: black;
}

.tooltip {
 opacity:1 !important;
  display: inline-block;
  border-bottom: 1px dotted black;
  right: 12px;
  z-index:1 !important;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 203px;
    background-color: white;
    color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
ul.reporting {
    background: white;
    color: black;
    padding: 13px;
    border-radius: 7px;
}
 .owl-carousel {
    display: block !important;
  }
  select.form-select.form-control.col-md-4 {
    float: right;
    margin-top: 22px;
}
.videooverlay {
    background: #151515;
    position: absolute;
    height: 245px;
    top: 17%;
    width: 161px;
    padding: 43px;
    display: block;
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
.pb-video {
    border: 1px solid #e6e6e6;
    padding: 5px;
    margin-top: 16px;
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
<script>
function showop(){
	//alert("asas");
	$(".reporting").toggle();
}
</script>
<!--footer -->
@include('layouts.footer')

