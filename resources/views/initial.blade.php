
@include('layouts.header')
<!-- end header -->

<!--1st slider start-->
 <!--1st slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
      <p class="text-center" style="font-size: 20px;">
      Get Personal Attention you deserve, build passive income and only let your fantasy give you limits to your creations!

At PAZ you can make your biggest dreams become reality!</p>
<div class="row">
  <div class="col-md-6">
      <div class="user1 mb-3">
      <div class="user-head text-center text-white">
      <h3>Artists Features</h3>
    </div>
    <div class="row">
      <div class="col-md-10">
    <div class="user-body">
      <p>You keep 90% of your profits
          <br>
          <br>
         Create content in categories you
like 
          <br>
          <br>
         Accept/reject/edit requests as
you wish
          <br><br>
         Create Samples for your fans to
let them know what you can
offer them
          <br><br>
        Invite other artists through our
partnerprogram and build up a
passive income 
          <br><br>
          Invite fans and get rewarded
with passive income
          <br><br>
         Stick out of the crowd with our
Top Lists and get the attention
from most paying fans
          <br><br>
         Use PAZ Tokens as a save way
for transactions
          <br><br>
         Reduced Ads
          <br><br>
         Exchange and withdraw your
Tokens at anytime
          <br><br>
         Upload free Audio
          <br><br>
         Upload free Video 
          <br><br>
          Personalized Audio/Video
offers
          </p>
    </div>
  </div>
  <div class="col-md-2 pt-3">
    <i class="fa fa-check" style="font-size:24px"></i>
      <br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
         <br>
      
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
       <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
  <i class="fa fa-check" style="font-size:24px"></i>
      <br>
    
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
         <br>
      
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
  <br>
 <i class="fa fa-check" style="font-size:24px"></i>
      <br>
  <br>      
    <i class="fa fa-check" style="font-size:24px"></i>
    <br>
    
  </div>
</div>

      </div>
      </div>
 
    <div class="col-md-6">
      <div class="user1 mb-3">
      <div class="user-head text-center text-white">
      <h3>User Features</h3>
    </div>
    <div class="row">
      <div class="col-md-10">
    <div class="user-body">
      <p>Personal attention 
          <br>
          <br>
          Let Artists create Video/Audio
          according to your imagination 
          <br>
          <br>
          Download your requested
          Video/Audio 
          <br><br>
          Save money by watching
          Samples on how your request
          could be carried out
          <br><br>
          Upload Requests and choose
          the best offer 
          <br><br>
          Stick out of the crowd with our
          Top Lists and get the attention
          from our most popular artists
          <br><br>
          Invite your favorite Artists
          through our partnerprogram
          and build up a passive income
          <br><br>
          Invite users and get rewarded
          with passive income
          <br><br>
          Create playlists and stream
          anytime 
          <br><br>
          Reduced Ads
          <br><br>
          Use PAZ Tokens as a save way
          for transactions 
          <br><br>
          Exchange and withdraw your
          Tokens at anytime 
          <br><br>
          </p>
    </div>
  </div>
  <div class="col-md-2 pt-3">
    <i class="fa fa-check" style="font-size:24px"></i>
      <br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
         <br>
      
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
       <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
       <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
   
      
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
      
    <i class="fa fa-check" style="font-size:24px"></i>
    <br>
      <br>
  </div>
</div>

      </div>

      </div>
</div>
       @if($login && $recently)
	  <h3 class="tittle">
     
     Recently Search

     </h3> 
     @endif
	</div>
    <!--Carousel Wrapper-->
    @if($login && $recently)
    <div id="recently_search" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
     
      <!--/.Controls-->

      <!--Indicators-->
     
      <!--/.Indicators-->


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

      <!--Slides-->
      
      <!--/.Slides-->

    </div>
    @endif
    <!--/.Carousel Wrapper-->


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
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">New Comers</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="New_comes" class="carousel slide carousel-multi-item" data-ride="carousel">

        <div id="owl-example2" class="owl-carousel">
            @foreach($newComes as $newcomes)
              @if($newcomes->type=='video')
              <div class="col-md-4">
            
            <video width="370" height="245" controls allowfullscreen>
              <source src="{{url('storage/app/public/video/'.$newcomes->media) }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
               
              </div>
          @endif
          @endforeach
  
            </div>
    

    
      

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div><br/><br/>
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
    tr:nth-child(even) {
    background-color: #fff;
    color: black;
}
.user1 {
    box-shadow: 1px 1px 6px 1px #0000003d;
}
.user-body {
    padding: 14px;
}
.user-head.text-center {
    padding: 13px;
    background: #f57070d9;
}
.user-head.text-center.text-white h3 {
    color: white;
    padding-top: 12px;
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
    items:3
  });
 
});
 </script>
@include('layouts.footer')
</body>

</html>
