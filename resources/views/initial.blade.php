@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/initial.css')}}" />


  <!------------ --------------------------Popup on login success ----------------------------------------->


 @if(session('success'))
<div class="modal fade" id="modal-subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <h1 class="text-center text-uppercase comimg1">{{session('success')}}</h1>
      </div>
       <div class="modal-footer">
        .
      </div>
    </div>
  </div>
</div>
@endif
<!-- end header -->

<!--1st slider start-->
 <!--1st slider start-->
 <div class="container">
   <div class="slider_tittle">

  @if(!$login) 
<div class="row mt-5">
  <div class="col-md-6">
      <div class="user1 mb-3">
      <div class="user-head text-center text-white">
      <h3>Artist</h3>
    </div>
    <div class="user-body">
    
      <p>  <i class="fa fa-check" style="font-size:24px"></i>  Easy and fast Signup Process</p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i> Setup several Offers with your favourite categories
          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  Sell unlimited Video and Audio Content

          </p>
        <p>  <i class="fa fa-check" style="font-size:24px"></i>  Referral Program for Lifetime Passive Revenue Stream

          </p>
       
         <p>  <i class="fa fa-check" style="font-size:24px"></i> Additional Promoting of your Profile through our Social Media box
          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i> Service fee reduction with every level you rise

          </p>
         <p>   <i class="fa fa-check" style="font-size:24px"></i>  Fee free account at level 10

          </p>
          <!-- <p>   <i class="fa fa-check" style="font-size:24px"></i>Be under the first 10 Artists to achieve level 10 and receive a trophy
          </p> -->
          <!-- <p>   <i class="fa fa-check" style="font-size:24px"></i>Share your ideas for future developments on the platform and let us grow together
          </p> -->
          <p>   <i class="fa fa-check" style="font-size:24px"></i>Commit now and get promoted for free
          </p>
         <div class="col-md-12 text-center mt-2">
  <button type="button" class="btn btn-primary btn-lg"><a href="{{url('/checkUser/artist')}}">Join Now</a></button>

    </div>
    </div>


      </div>
      </div>
 
    <div class="col-md-6">
      <div class="user1 mb-3">
      <div class="user-head text-center text-white">
      <h3>Customer </h3>
    </div>
     <div class="user-body">

   
      <p><i class="fa fa-check" style="font-size:24px"></i>  Free Registration </p>
         
        <p> <i class="fa fa-check" style="font-size:24px"></i>  Zero monthly fees </p>
         
        <p><i class="fa fa-check" style="font-size:24px"></i>  Order exclusive Custom Content</p>
         
         <p><i class="fa fa-check" style="font-size:24px"></i>  Make Additional Requests</p>
         
        
      
         <p><i class="fa fa-check" style="font-size:24px"></i>  Directly Download your Orders
          </p>
         <p><i class="fa fa-check" style="font-size:24px"></i>  Unlimited Streaming 24/7
          </p>
          <p><i class="fa fa-check" style="font-size:24px"></i>  Build your own Playlists
          </p>
           <p><i class="fa fa-check" style="font-size:24px"></i>  Explore our Advanced Filter Options
          </p>
          <p><i class="fa fa-check" style="font-size:24px"></i>  Enjoy Reduced Advertising
          </p>
          <div class="col-md-12 text-center mt-5 ">

 <button type="button" class="btn btn-primary btn-lg px-3"><a href="{{url('/checkUser/user')}}">Join Now </a></button>

    </div>
    </div>

     </div>
    
  </div>
 
</div>

      </div>

      </div>
    
    
</div>
@endif
 </div>
                    <!--------------------------------- On login show data ------------------------------------->

<div class="outer_slider">
  <div class="coner my-4">
    
       @if($login && $recently)
	  <h3 class="tittle">
     
     Recently Search

     </h3> 
     @endif
	</div>
    <!--Carousel Wrapper-->
    @if($login)
    <div id="recently_search" class="row">

      @forelse ($recently as $recnt)
            @if($recnt->type=='video')
              
            <div class="col-md-4 hover" >
            <a href="{{url('artist-video/'.$recnt->id)}}">
            
          <video width="350px" height="275px" controls="false" allowfullscreen controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/video/'.$recnt->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <div class="pricetime">
          <div class="text-left">
          <h6 class="text-white">{{ $recnt->price }}/PAZ</h6>
          </div>
          <div class="text-right">
          <h6 class="text-white">2:00</h6>
          </div>
          </div>
          <h5>{{ $recnt->title }}</h5>
          </a>
            </div>
         
            @endif
            @empty
             @endforelse

  
</div>


    </div>
 

  </div>  </div>


  <br/><br/>
  

 
 <!--End 1st slider-->
 
 

 <!--   Videos    -->
<div>

<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle"><a href="{{url('seeall/video')}}">Videos</a></h3>
      <button class="btn btn-primary seemore" type="button"><a href="{{url('seeall/video')}}">See All</a></button>
	</div>
          <div class="row">
          @forelse ($popular as $pop)
            @if($pop->type=='video')
           
            <div class="col-md-4 hover">
                <a href="{{url('artist-video/'.$pop->id)}}">
                <video width="100%" height="100%" controls="false" allowfullscreen controlsList="nodownload" disablePictureInPicture>
                  <source src="{{url('storage/app/public/video/'.$pop->media) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <div class="pricetime">
                <div class="text-left">
          <h6 class="text-white">{{ $pop->price }}/PAZ</h6>
          </div>
          <div class="text-right">
          <h6 class="text-white">2:00</h6>
          </div>
</div>
                <h5>{{ $pop->title }}</h5>
                </a>
            </div> 
         

               @endif
              @empty
             @endforelse    

             </div>
            </div>
    

  
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->

<br/><br/>
 <!--End 3rd slider-->
 

  <!---------------------------------------------Offer Videos--------------------------------------------->

<div class="outer_slider last">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">  <a href="{{url('/seeall/offer')}}">Offers</a></h3>
     <a href="{{url('/seeall/offer')}}"><button class="btn btn-primary seemore" type="button">See All</button></a>
	</div>
   <div class="row">
         @forelse ($offers as $offer)
            @if($offer->type=='video')
            
            <div class="col-md-4 showoffer1 mb-3">
    <a href="{{url('artistoffers/'.$offer->id)}}">
      <div class="card">
	   <video width="100%" height="240" controls controlsList="nodownload" disablePictureInPicture>
  <source src="{{url('storage/app/public/video/'.$offer->media) }}" type="video/mp4">

  Your browser does not support the video tag.
</video>

	  <div class="carad-body">
	      <h4 class="card-title text-center"> {{$offer->title}}</h4>
	     
	      <hr class="cardhr">
	      <table class="table table-borderless text-center">
        <tr>
          <th>Category</th>
          <td>{{$offer->category}}</td>
        </tr>
        <tr>
          <th>Media</th>
          <td>{{$offer->type=='video'? 'Video/mp4' :'Audio/mp3' }}</td>
        </tr>
            <tr>
            	<th>Price</th>
            	<td> {{$offer->price}}  <span style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</span>/Minute </td>
              </tr>
	      </table>
	         </div>
   </div>
   </a>
 </div>
           
              @endif
              @empty
             @endforelse
           
        
        
  
            </div>
    </div>
  </div>
  <br/><br/>



 <!--------------------------------------------------------------Audio------------------------------------------------->


<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
    <h3 class="tittle"> <a href="{{url('/seeall/audio')}}">Audios</a></h3>
     <a href="{{url('/seeall/audio')}}"><button class="btn btn-primary seemore" type="button">See All</button></a>
  </div>
   <div class="row">
         @forelse ($popularAudios as $audio)
                 @if($audio->type=='audio')
              <div class="col-md-4 mb-3 audiohome">
              <a href="{{url('artist-video/'.$audio->id)}}">
              
              <img src="{{$audio->audio_pic ? url('storage/app/public/uploads/'.$audio->audio_pic): 'https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg'}}">
              <audio controls controlsList="nodownload" disablePictureInPicture>
                 <source src="{{url('storage/app/public/audio/'.$audio->media) }}" type="audio/mp3">
            </audio>
            </a>
              </div>
              @endif
              @empty
             @endforelse
  
            </div>

  
            </div>
    

  
      <!--/.Slides-->

    </div>

    <div class="outer_slider">
  <div class="container my-4">
          <div class="slider_tittle">
              <h3 class="tittle"><a href="{{url('seeall/artists')}}">Artists</a></h3>
              <a href="{{url('seeall/artists')}}"><button class="btn btn-primary seemore" type="button">See All</button></a>
           </div>
           <div class="row mb-5">
    @foreach ($artists as $artist)
           <div class="col-md-2 col-6">
             
               <div class="artist text-center">
               @if($artist->profilepicture)
                <img src="{{url('storage/app/public/uploads/'.$artist->profilepicture) }}">
                <div class="overlay">
                  <a href="{{url('artistDetail/'.$artist->id)}}">{{$artist->nickname}}
               </div>
               @else
               <a href="{{url('artistDetail/'.$artist->id)}}">
		    	  <span class="firstName" style="display: none;">{{$artist->nickname}}</span>
	           	<div class="profileImage"></div>

               </a>
             
             @endif
               </div>
           </div>
             @endforeach

       </div>

  
            </div>
    </div>
  </div>


  
      <!--/.Slides-->

    </div>
    </div>
    @endif
    <!--/.Carousel Wrapper-->
  <style>
  .owl-carousel {
    display: block !important;
  }
  .col-md-4.mb-3 img {
    height: 165px;
    padding-left: 7px;
    margin-bottom: -23px;
}
  button.btn.btn-primary.seemore {
    position: absolute;
    margin-top: -43px;
    right: 100px;
  }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 19%;
    height: 125px;
    width: 125px;
    border-radius: 50%;
    background: white;
    opacity: 0;
}
.cardhr{
  background:white;
}
.artist .profileImage {
    width: 125px;
    height: 125px;
    border-radius: 50%;
    background: #512DA8;
    font-size: 75px;
    color: #fff;
    text-align: center;
    line-height: 116px;
    margin-right: 14px;
    margin-top: 4px;
}
.card:hover {
    border: 1px solid gold !important;
}
.col-md-4.showoffer1 h5{
  color:black !important;
}
.overlay a {
    text-align: center;
    position: absolute;
    top: 41%;
    left: 44px;
}
.card {
    background: black;
    color: white;
    padding: 13px;
    border: 1px solid white;
}

h4.card-title.text-center {
    color: white;
}
.artist img {
    height: 125px;
    width: 125px;
    border: 1px solid transparent;
    border-radius: 50%;
}
   h3.tittle a {
    color: white;
   }
   video::-webkit-media-controls {
  display:none !important;
}

.hover:hover video{ border: 2px solid yellow; }
h5{ color :#fff;}
@media only screen and (max-width: 768px) {

.col-md-4.hover {
    margin-top: 10px;
    text-align: center;
    margin-bottom: 10px;
}
.col-md-4.showoffer1 {
    margin: 10px auto;
}
.artist.text-center {
    margin: 10px auto;
}
}
  </style>
 

 <script>
  $(document).ready(function() {
 
  $("#owl-example").owlCarousel({
    items:3
  });
   $("#owl-example1").owlCarousel({
    items:3
  });
    $("#owl-example2").owlCarousel({
    items:3
  });
     $("#owl-example3").owlCarousel({
    items:3,

  });
    $("#owl-example4").owlCarousel({
    items:3,
    loop:true,
margin:10,
autoPlay:true,
nav:true,
rewindNav:false
  });
});
 </script>
@include('layouts.footer')


<script type="text/javascript">
  $ (window).ready (function () {
  setTimeout (function () {
    $ ('#modal-subscribe').modal ("show")
  }, 1000)
})
</script>