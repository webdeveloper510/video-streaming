
@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/initial.css')}}" />
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
  <!--   <div class="row">
    	<div class="col"></div>
    	<div class="col-md-8">
  
       </div>
       <div class="col"></div>
   </div> -->

 <!--  <div class="container my-4">
    <div class="row">
    <div class="slider_tittle">
    <h3 class="tittle">Get to know our Artists</h3>
    </div>
    
      <div id="owl-example4" class="owl-carousel">
      @foreach ($artists as $artist)
    <div class="artist_image">


  <a href="{{is_object($login) ? url('/artistDetail/'.$artist->id) : url('/register')}}">
  <img width="100%" height="200px"  src="{{url('storage/app/public/uploads/'.$artist->profilepicture) }}">
</a>

    </div>
     @endforeach

  
</div>
  </div>
  </div> --> 
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
       
          <p>   <i class="fa fa-check" style="font-size:24px"></i>  Stick out with our Top List

          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  Enjoy Reduced Advertising

          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  Exchange your Tokens Every Day

          </p>
         <p>   <i class="fa fa-check" style="font-size:24px"></i>  Upload free Content

          </p>
         <p>  <i class="fa fa-check" style="font-size:24px"></i>  90% Commission </p>
          <p>   <i class="fa fa-check" style="font-size:24px"></i> Join our Referral Program for Lifetime <br><span style="padding-left:50px">Passive Revenue Stream</span>
 
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
         
        <p> <i class="fa fa-check" style="font-size:24px"></i> Create Jobs for Artists according to Your  <br><span style="padding-left:50px">Imagination</span> </p>
         
        <p><i class="fa fa-check" style="font-size:24px"></i>  Enjoy our Advance Filter Options</p>
         
         <p><i class="fa fa-check" style="font-size:24px"></i> Save money by watching Samples</p>
         
        <p><i class="fa fa-check" style="font-size:24px"></i>  Stick out with our Top List
          </p>
        
      
         <p><i class="fa fa-check" style="font-size:24px"></i> Enjoy Reduced Advertising
          </p>
         <p><i class="fa fa-check" style="font-size:24px"></i>  Use Tokens for Buying and Donations
          </p>
          <p><i class="fa fa-check" style="font-size:24px"></i>  Exchange your Tokens Every Day
          </p>
           <p><i class="fa fa-check" style="font-size:24px"></i>  Join our Referral Program for Lifetime <br><span style="padding-left:50px">Passive Revenue Stream</span>
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
  @if($login) 
  <h1 class="text-white center">Welcome to the Porn-Artist-Zone!</h1>
  @endif
<div class="outer_slider">
  <div class="coner my-4">
    
       @if($login && $recently)
	  <h3 class="tittle">
     
     Recently Search

     </h3> 
     @endif
	</div>
    <!--Carousel Wrapper-->
    @if($login && $recently)
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


    </div>
    @endif

  </div>  </div>


  <br/><br/>

 
 <!--End 1st slider-->
 
 
 
 @if($recently)
 <!--2nd slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">Popular</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="Popular_slid" class="carousel slide carousel-multi-item" data-ride="carousel">

             <div id="owl-example1" class="owl-carousel">
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
    

  
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div>
  @endif


  <br/><br/>
 <!--End 2nd slider-->
 
 
 
  <!--3rd slider start-->
<br/><br/>
 <!--End 3rd slider-->
 
 @if($recently)
  <!--4th slider start-->
<div class="outer_slider last">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">Special offer</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="Special_offer" class="carousel slide carousel-multi-item" data-ride="carousel">

         <div id="owl-example3" class="owl-carousel">
            @foreach($recently as $recnt)
              @if($recnt->type=='video')
              <div class="col-md-4">
                
            <video width="370" height="245" controls allowfullscreen>

            <source src="{{url('storage/app/public/video/'.$recnt->media) }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
               
              </div>
          @endif
          @endforeach
  
            </div>
    

    

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div>
@endif
  <br/><br/>
  <style>
  .owl-carousel {
    display: block !important;
  }
  </style>
 <!--End 4th slider-->

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
</body>

</html>

<script type="text/javascript">
  $ (window).ready (function () {
  setTimeout (function () {
    $ ('#modal-subscribe').modal ("show")
  }, 1000)
})
</script>