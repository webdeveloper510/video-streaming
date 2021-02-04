@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/artistVideo.css')}}" />
<div class="inner-page"> 
	 <section>
	   <div class="container-fluid">
		  <div class="main-cnt-sec">
			 <div class="row">
				<div class="col-md-2">
				   <div class="image area">
				   	
		 <img src="{{url('storage/app/public/uploads/'.$vedios[0]->profilepicture)}}">
				   </div>
				</div>
				@foreach($vedios as $video)
				<?php 
			
			$GLOBALS['videoid'] = $video->id ;
			$GLOBALS['type'] = $video->type ;

			$GLOBALS['paz'] = $video->price ;
			$GLOBALS['artistid'] = $video->contentProviderid ;

			?>
			
			
				@if($video->type=='video' || $video->type=='audio')
			
				<div class="col-md-5">
				   <div class="content-area">
					  <h3>{{$video->title}}</h3>
					  <a href="{{url('artistDetail/'.$video->contentProviderid)}}"><p>{{$video->nickname}}</p></a>
				   </div>
				</div>
				<div class="col-md-2">
				   <div class="content-price">
					  <h3 class="paz_price">{{$video->price}}PAZ</h3>
				   </div>
				</div>
				<div class="col-md-3">
				   <div class="content-cart">
				   
                   <div class="cart1">  
                   	<a href="{{url('play')}}">
                   	 <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                   	</a>
                      <span class="itemCount">{{$count}}</span>

                   </div>
 <button type="button" style="cursor:pointer;" id="{{$video->id}}" class="addToCart">
 	 	
 	Add to Wishlist
 </button>

<button  type="button" style="cursor:pointer;" class="btn-primary library" data-toggle="modal" data-target="#exampleModal">Add To Library</button>
<div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Playlist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
      	<div class="alert alert-success message" role="alert" style="display: none">
        A simple success alert—check it out!
   </div>
      <h3>Choose Playlist</h3>
      <div class="Playlist1">
      	@foreach($listname as $index=>$val)
      	<h5 class="select_list">{{$val->listname}} </h5> <a href="" class="aedit">edit</a><br>
      	@endforeach
      	<a href="#" class="show_list">Create New Playlist +</a>
      	<span class="create_playlistt" style="display: none">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>
      </div>
      <div class="text-center mt-4">
      <h2>Token:{{ $GLOBALS['paz'] }} PAZ</h2>
      <input type="hidden" id="vidid" name="videoid" value="{{$GLOBALS['videoid']}}">
      <input type="hidden" class="token" name="token" value="{{ $GLOBALS['paz'] }}">
      <input type="hidden" class="art_id" name="art_id" value="{{ $GLOBALS['artistid'] }}">
      <button type="button" class="addNow">ADD NOW</button>
  </div>
      </div>
    
    </div>
  </div>
</div>		  
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
	<section>
	   <div class="container-fluid">
		  <div class="row">
			 <div class="col-md-12">
				<div class="vid-sec">
						@if($video->type=='video')
				   <video width="320" height="240" controls controlsList="nodownload" disablePictureInPicture>
				   	<source src="{{url('storage/app/public/video/'.$video->media)}}" type="video/mp4">
				   </video>
				   @else
				   <div class="artistaudiopage col-md-4">
				   <img src="https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg" class="img-fluid">
				   <audio controls>
				   	<source src="{{url('storage/app/public/video/'.$video->media)}}" type="audio/mp3">
				   </audio>
					</div>
				   @endif
				   <div class="report-op">
				   		<i class="fa fa-ellipsis-v" onclick="showop()"></i>
						<ul style="display:none;" class="reporting">
						 <li>Report</li>
						 <li>You can not download this video.</li>
						</ul>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>

	<section class="published">
	   <div class="container-fluid">
		  <div class="pubcontainer">
			 <div class="row">
				<div class="col-md-8">
				   <div class="published">
					  <div class="published1">
						 <h3>{{$video->title}}</h3>
						 <p>{{$video->description}}</p>
						 <p>Published {{$video->created_at}}</p>
					  </div>
				   </div>
				</div>
				<div class="col-md-4">
				   <div class="main-mediacl">
					  <div class="media-property">
						 <div class="property-1">
							<div class="Media-Type">
							   <p>Media Type</p>
							</div>
							<div class="Media-Type1">
							   <p>{{$video->type=='video' ? mp4:'mp3'}}</p>
							</div>
						 </div>
					  </div>
					  <div class="media-property">
						 <div class="property-1">
							<div class="Media-Type">
							   <p>Play Time</p>
							</div>
							<div class="Media-Type1">
							   <p>{{ convertSecondstoFormat($video->duration) }}</p>
							</div>
						 </div>
					  </div>
					  <div class="media-property">
						 <div class="property-1">
							<div class="Media-Type">
							   <p>Resolution</p>
							</div>
							<div class="Media-Type1">
							   <p>HD 720p</p>
							</div>
						 </div>
					  </div>
					  <div class="media-property">
						 <div class="property-1">
							<div class="Media-Type">
							   <p>File Size</p>
							</div>
							<div class="Media-Type1">
							   <p>{{$video->size}}</p>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
		@endif
	@endforeach
	<section>
	   <div class="container-fluid">
		  <div class="row">
			 <div class="col-md-12">
				<h3 class="top selling-content">
				<span>$</span>Top Selling Content
				<h3>
			 </div>
		  </div>
		  <div class="row">
			 <div class="col-md-12">
				<div id="demo" class="carousel slide" data-ride="carousel">
				   <!-- Indicators -->
				   <ul class="carousel-indicators">
					  <li data-target="#demo" data-slide-to="0" class="active"></li>
					  <li data-target="#demo" data-slide-to="1"></li>
					  <li data-target="#demo" data-slide-to="2"></li>
				   </ul>
				   <!-- The slideshow -->
				   <div class="carousel-inner">
					  <div class="carousel-item active">
						 <div class="main-video-search content">
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
						 </div>
					  </div>
					  <div class="carousel-item">
						 <div class="main-video-search content">
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
						 </div>
					  </div>
					  <div class="carousel-item">
						 <div class="main-video-search content">
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
						 </div>
					  </div>
				   </div>
				   <!-- Left and right controls -->
				   <a class="carousel-control-prev" href="#demo" data-slide="prev">
				   <span class="carousel-control-prev-icon"></span>
				   </a>
				   <a class="carousel-control-next" href="#demo" data-slide="next">
				   <span class="carousel-control-next-icon"></span>
				   </a>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
</div>  


<script>
	var type = "{{$GLOBALS['type']}}";

     addTohistory(type);
		

</script>
<style>
.report-op {
    position: absolute;
    width: 100%;
    top: 6px;
    padding-left: 267px;
}
.content-cart .addToCart:hover {
    background: #0062cc !important;
    border: 1px solid #0062cc !important;
}
ul.reporting {
    background: #efefef;
    width: 241px;
    margin-left: 50%;
    box-shadow: 0 3px 6px #00000026;
    padding: 8px 6px 8px;
    text-align: left;
    font-size: 13px;
}
.artistaudiopage {
    margin: 1px auto;
    padding: 4px;
}

.artistaudiopage img {
    height: 184px;
}
</style>
<script type="text/javascript">
$(".addToCart").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "{{url('ajax-request')}}",
        data: { 
            id: $(this).attr('id'), // < note use of 'this' here
             "_token": "{{ csrf_token() }}", 
        },
        success: function(result) {
        	console.log(result);return false;
           // $('.itemCount').text(result);
        },
        error: function(result) {
            alert('error');
        }
    });
});
function showop(){
	//alert("asas");
	$(".reporting").toggle();
}
</script>


@include('layouts.footer')