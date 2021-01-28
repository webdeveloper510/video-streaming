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
      <h3>Artists Features</h3>
    </div>
    <div class="user-body">
    
      <p>  <i class="fa fa-check" style="font-size:24px"></i>  Offer Services in Categories You Love</p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  Receive Donations from Happy Customers
          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  Discover More Jobs with our Search Engine

          </p>
        <p>  <i class="fa fa-check" style="font-size:24px"></i>  Accept/Reject/Edit Requests as You Want

          </p>
       
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  Enjoy Reduced Advertising

          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  Exchange your Tokens Every Day

          </p>
         <p>   <i class="fa fa-check" style="font-size:24px"></i>  Upload free Content

          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  90% Commission </p>
          <p>   <i class="fa fa-check" style="font-size:24px"></i> Join our Referral Program for Lifetime Passive Revenue Stream
 
          </p>
         <div class="col-md-12 text-center mt-2">
  <button type="button" class="btn btn-primary btn-lg"><a href="{{url('/checkUser/artist')}}">Register as Artist</a></button>

    </div>
    </div>


      </div>
      </div>
 
    <div class="col-md-6">
      <div class="user1 mb-3">
      <div class="user-head text-center text-white">
      <h3>Customer Features</h3>
    </div>
     <div class="user-body">

   
      <p><i class="fa fa-check" style="font-size:24px"></i>  Build Playlists, Stream, Download Content </p>
         
        <p> <i class="fa fa-check" style="font-size:24px"></i> Create Project for Artists according to Your Imagination </p>
         
        <p><i class="fa fa-check" style="font-size:24px"></i>  Enjoy our Advance Filter Options</p>
         
         <p><i class="fa fa-check" style="font-size:24px"></i> Save money by watching Samples</p>
         
        
      
         <p><i class="fa fa-check" style="font-size:24px"></i> Enjoy Reduced Advertising
          </p>
         <p><i class="fa fa-check" style="font-size:24px"></i>  Use Tokens for Buying and Donations
          </p>
          <p><i class="fa fa-check" style="font-size:24px"></i>  Exchange your Tokens Every Day
          </p>
           <p><i class="fa fa-check" style="font-size:24px"></i>  Join our Referral Program for Lifetime Passive Revenue Stream
          </p>
          <div class="col-md-12 text-center mt-5">

 <button type="button" class="btn btn-primary btn-lg px-3"><a href="{{url('/checkUser/user')}}">Register as Customer </a></button>

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
              <a href="{{url('artist-video/'.$recnt->id)}}">
            <div class="col-md-4 hover" >
            
          <video width="350px" height="275px" controls="false" allowfullscreen>
            <source src="{{url('storage/app/public/video/'.$recnt->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h5>{{ $recnt->title }}</h5>
            </div>
            </a>
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
            <a href="{{url('artist-video/'.$pop->id)}}">
            <div class="col-md-4 hover">
                <video width="100%" height="100%" controls="false" allowfullscreen>
                  <source src="{{url('storage/app/public/video/'.$pop->media) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <h5>{{ $pop->title }}</h5>
            </div> 
            </a>

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
            <a href="{{url('artistoffers/'.$offer->id)}}">
              <div class="col-md-4 hover">
                
                  <video width="100%" height="100%" controls="false" allowfullscreen>

                  <source src="{{url('storage/app/public/video/'.$offer->media) }}" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                  <h5>{{ $offer->title }}</h5>
              </div>
              </a>
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
              <img src="https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg">
              <audio controls>
                 <source src="{{url('storage/app/public/audio/'.$audio->media) }}" type="audio/mp3">
            </audio>

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
   <div class="row">
         @foreach($artists as $artist)
                 @if($artist->profilepicture)
              
              <div class="col-md-4 artistprofilehome">
              <a href="{{url('artistDetail/'.$artist->id)}}"> 
                <img src="{{url('storage/app/public/uploads/'.$artist->profilepicture) }}" width="100%" height="200px">
                </a>
              </div>

              @endif
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
   h3.tittle a {
    color: white;
   }
   video::-webkit-media-controls {
  display:none !important;
}
.hover:hover video{ border: 2px solid yellow; }
h5{ color :#fff;}
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