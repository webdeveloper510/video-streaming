@include('layouts.header')
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
				@if($video->type=='video')
				<?php 
				$GLOBALS['paz'] = $video->price ;

				$GLOBALS['videoid'] = $video->id ;

				?>
				<div class="col-md-5">
				   <div class="content-area">
					  <h3>{{$video->title}}</h3>
					  <p>{{$video->nickname}}</p>
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
                   	<a href="{{url('cart')}}">
                   	 <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                   	</a>
                      <span class="itemCount">{{$count}}</span>

                   </div>
 <button type="button" id="{{$video->id}}" class="addToCart">
 	 	
 	Add to Wishlist
 </button>

<button  type="button" class="btn-primary library" data-toggle="modal" data-target="#exampleModal">Add To Library</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <button type="button" class="btn btn-primary addNow">ADD NOW</button>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
				   <video width="320" height="240" controls>
				   	<source src="{{url('storage/app/public/video/'.$video->media)}}" type="video/mp4">
				   </video>
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
							   <p>mp4</p>
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
<style>
.image.area {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    padding-top: 20px;
}

.image.area img {
    width: 100%;
    width: 115px;
    height: 115px;
    border-radius: 50%;
  
}
a.aedit {
float: right;
margin-top: -18px;
}


.content-area h3 {
    color: #a60000;
    font-weight: 400;
    padding-left: 68px;
    line-height: 40px;
    margin-bottom: 0px;
}
.content-area p {
    padding-left: 68px;
    font-size: 18px;
    color: #000000b5;
}

.content-area {
    padding-top: 16px;
}

.content-price h3 {
    color: #36B1E9;
    font-size: 22px;
}


.cart1 {
    position: absolute;
    top: -58px;
    z-index: 9999;
    color: white;
    font-size: 28px;
}
.content-price {
    padding-top: 20px;
    text-align: end;
}


.published h3 {
    font-weight: 300;
    color: #a60000;
    line-height: 75px;
}

.content-cart {
    text-align: end;
}

.Playlist1 {
    border: 1px solid;
    padding: 10px;
}
.modal-backdrop {
    background-color: transparent !important;
}

.content-cart .addToCart, .library {
    background-color: #a60000;
    border: 2px solid #a60000;
    color: #fff;
    padding: 6px;
    
    margin-right:10px;

}

.content-cart {
    padding-top: 20px;
    text-align: end;
    display: flex;
    justify-content: flex-end;
	padding-right: 10px;
}

button.btn.btn-primary.dropdown-toggle {
    width: 100%;
    margin-left: 1px;
    border-radius: 0;
}

.main-cnt-sec {
    box-shadow: 0px 2px 18px 0px rgba(0,0,0,0.3);
}

.vid-sec {
    background-color: #ededed;
    text-align: center;
}

.published :nth-child(2) {
    color: #a60000;
    font-size: 18px;
}
.published :nth-child(3) {
    font-size: 19px;
    color: #00000087;
    font-style: oblique;
}

.published :nth-child(5) {
    color: #36b1e9;
    font-style: oblique;
    font-size: 18px;
    margin-top: 30px;
}

.property-1 {
    display: flex;
    justify-content: space-around;
}



.Media-Type p {
    color: #a60000;
    font-weight: bold;
}

.main-mediacl {
    margin-top: 135px;
}

.published {
    padding-bottom: 70px;
}


.Media-Type1 p {
    color: #a60000;
}


.pubcontainer {
    border-bottom: 1px solid #0000003b;
}

.main-video-search.content {
    width: 100%;
    display: flex;
}



.videos2 {
    width: 24%;
    margin: 10px;
}

.camera {
    display: flex;
    position: absolute;
    right: 1px;
    top: 0;
}

.videos2 p {
    font-size: 17px;
    margin-bottom: 0;
    padding-left: 9px;
}

.video-icon {
    position: relative;
}

i.fa.fa-video-camera {
    padding-top: 5px;
}

.camera p {
    padding-left: 3px;
}
.videos2 p {
    font-size: 17px;
    margin-bottom: 0;
    padding-left: 9px;
}

.videos2 p span {
    color: #36b1ea;
    font-size: 16px;
}

.videos2 {
    width: 24%;
    margin: 10px;
    margin: 0 auto;
    margin-right: 14px;
}

h3.top.selling-content {
    font-weight: 300;
	 margin-bottom: 21px;
	  font-size: 26px;
}


h3.top.selling-content span {
    font-size: 28px;
    color: #48b8eb;
    font-weight: bold;
    margin-right: 8px;
}
.carousel {
  
    padding-bottom: 100px;
}

a.carousel-control-next {
    background: #48b8eb;
    width: 40px;
    height: 40px;
    border-radius: 5px;
}

a.carousel-control-prev {
    background: #48b8eb;
    width: 40px;
    height: 40px;
    border-radius: 5px;
}

.carousel-control-next, .carousel-control-prev {
    position: absolute;
    top: 250px !important;
    bottom: 0;
    
}


h5.select_list.active {
    color: red;
}




span.itemCount {
    position: absolute;
    top: -23px;
    right: 4px;
}
@media only screen and (max-width: 768px) {

.image.area {
    
     display: flex; 
    
}

.content-cart button {
    
     font-size: 13px; 
}

.content-price h3 {
   
     font-size: 38px; 
   
}

.content-area h3 {
    
     line-height: 28px; 
    
     font-size: 20px; 
}



.content-area p {
    padding-left: 69px;
    font-size: 16px;
}

.image.area {
    width: 100%; 
     display: unset; 
   
    padding-left: 20px; 
}

.main-cnt-sec {
    
    padding-top: 7px;
}
.image.area img {
   
    width: 100px;
    height: 100px;
    border-radius: 50%;
  
}

.camera {
  
    top: 50px;
}

.content-area {
    padding-top: 12px;
}



}



@media only screen and (max-width: 767px) {



.image.area {
    width: 100% !important; 
    display: flex;
    padding-left: 20px;
    justify-content: center;
}

.content-cart button {
    
     font-size: 13px; 
}

.content-price h3 {
   
     font-size: 38px; 
   
}

.content-area h3 {
    
    padding-left: 0px;
    
}

.content-area p {
    padding-left: 0px;
   
}

.content-area p {
  
    margin-top: 20px;
}

.content-cart {
    
    display: flex;
    justify-content: center;
   
}
.content-price {
    padding-top: 0px;
    text-align: center;
}
.content-area h3 {
    line-height: 28px;
    font-size: 28px;
}

.content-area p {
    padding-left: 69px;
    font-size: 16px;
}

.image.area {
    width: 100%; 
     display: flex; 
   
    padding-left: 20px; 
}

.main-cnt-sec {
    
    padding-top: 7px;
}
.image.area img {
   
    width: 100px;
    height: 100px;
    border-radius: 50%;
  
}
.content-area {
  
    text-align: center;
}

.content-area p {
   
    padding-left: 0 ! important;
}

.content-cart {
   padding-top: 0px !important;
   padding-bottom: 20px;
  
    
}

.main-mediacl {
 
    margin-top: 0;
}

.camera {
   
    top: 48px;
}
.vid-sec iframe {
    WIDTH: 100% !IMPORTANT;
}

.videos2 {
    width: 100%;
   
}
.main-video-search.content {
    
    display: unset;
}

.camera {
    top: 0px !important;
}


.carousel-control-next, .carousel-control-prev {
    position: absolute;
    
    top: 92% !important;
   
}






}


@media only screen and (max-width: 748px){
.camera {
    top: 76px;
}
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
            $('.itemCount').text(result);
        },
        error: function(result) {
            alert('error');
        }
    });
});
</script>
@include('layouts.footer')