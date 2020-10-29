
@include('layouts.header')
<!-- end header -->

<!--1st slider start-->
 <!--1st slider start-->
 <div class="container">
   <div class="slider_tittle">

      <p class="text-center  pt-3 header-text" style="font-size: 24px;">
      Get Personal Attention you deserve, build passive income and only let your fantasy give you limits to your<p> <p class="PAZ text-center header-text" style="font-size: 24px;">creations!At PAZ you can make your biggest dreams become reality!</p>

  <div class="container my-4">
    <div class="row">
    <div class="slider_tittle">
    <h3 class="tittle">Get to know our Artists</h3>
    </div>
     @foreach ($artists as $artist)
    <div class="col-md-2 artist_image">
      <img width="100%"  src="{{url('storage/app/public/uploads/'.$artist->profilepicture) }}">
    </div>
     @endforeach
  </div>
  </div>  
<div class="row">
  <div class="col-md-6">
      <div class="user1 mb-3">
      <div class="user-head text-center text-white">
      <h3>Artists Features</h3>
    </div>
    <div class="user-body">
    <div class="row">
     <div class="col-md-12">
       <div class="left pt-3">
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
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>

  <i class="fa fa-check" style="font-size:24px"></i>
      <br>

    
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
      
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
     <br>
 <i class="fa fa-check" style="font-size:24px"></i>
      <br><br>
   
   <i class="fa fa-check" style="font-size:24px"></i>
      <br>  
  
    
  </div>
      <div class="right pt-3">
    
      <p>You keep 90% of your profits</p>
         <p>
         Create content in categories you like 
          </p>
         <p>Accept/reject/edit requests as you wish
          </p>
        <p> Create Samples for your fans to let them know what you can offer them
          </p>
        <p>Invite other artists through our partnerprogram and build up a passive income 
          </p>
          <p>Invite fans and get rewarded with passive income
          </p>
         <p>Stick out of the crowd with our Top Lists and get the attention from most paying fans
          </p>
         <p>Use PAZ Tokens as a save way for transactions
          </p>
         <p>Reduced Ads
          </p>
         <p>Exchange and withdraw your Tokens at anytime
          </p>
         <p>Upload free Audio
          </p>
         <p>Upload free Video 
          </p>
          <p>Personalized Audio/Video offers
          </p>
    </div>
  </div>
    <div class="col-md-12 text-center">
  <button type="button" class="btn btn-primary"><a href="{{url('/register')}}">Register as Artist</a></button>

    </div>
  </div>
 
</div>

      </div>
      </div>
 
    <div class="col-md-6">
      <div class="user1 mb-3">
      <div class="user-head text-center text-white">
      <h3>User Features</h3>
    </div>
     <div class="user-body">
    <div class="row">
      <div class="col-md-12">
       <div class="left pt-3">

    <i class="fa fa-check" style="font-size:24px"></i>
      <br>
      <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br> <br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>

    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
       <br><br>
    <i class="fa fa-check" style="font-size:24px"></i>
<br>
      <br>
        
    <i class="fa fa-check" style="font-size:24px"></i>
<br> <br>
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
      <div class="right pt-3">
   
      <p>Personal attention </p>
         
          <p>Let Artists create Video/Audio
          according to your imagination </p>
         
          <p>Download your requested
          Video/Audio </p>
         
          <p>Save money by watching
          Samples on how your request
          could be carried out</p>
         
          <p>Upload Requests and choose
          the best offer 
          </p>
          <p>Stick out of the crowd with our
          Top Lists and get the attention
          from our most popular artists
          </p>
          <p>Invite your favorite Artists
          through our partnerprogram
          and build up a passive income
          </p>
          <p>Invite users and get rewarded
          with passive income
          </p>
          <p>Create playlists and stream
          anytime 
          </p>
          <p>Reduced Ads
          </p>
          <p>Use PAZ Tokens as a save way
          for transactions 
          </p>
          <p>Exchange and withdraw your
          Tokens at anytime 
          
          </p>
    </div>
     </div>
    <div class="col-md-12 text-center">

 <button type="button" class="btn btn-primary"><a href="{{url('/register')}}">Register as User</a></button>

    </div>
  </div>
 
</div>

      </div>

      </div>
      <div class="col-md-6 pl-5 pt-4 text-right">
      <p style="font-size: 17px;">Become a partner of PAZ and get up to 25% passive revenue-share.  </p>
    </div>
    <div class="col-md-6">
     <button type="button" class="btn btn-primary partner_col">Become Partner</button>
    </div>

</div>
 </div>
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
    tr:nth-child(even) {
    background-color: #fff;
    color: black;
}
.user1 {
    box-shadow: 1px 1px 6px 1px #0000003d;
}
.user-body {
    padding: 14px;
   /* border: 5px solid #bf0000;*/
}
.user-head.text-center {
    padding: 13px;
    background: #bf0000;
}
.user-head.text-center.text-white h3 {
    color: white;
    padding-top: 12px;
}
a.btn, button.btn {
    line-height: 100% !important;
  }
  button.btn.btn-primary a {
    color: white;
}
.left {
    float: left;
    width: 10%;
}
.right {
    float: left;
    width: 90%;
}
.left .fa {
    color: green;
}
button.btn.btn-primary.partner_col:hover {
    background: #007bff;
}
.col-md-12.text-center button:hover {
    background: #007bff;
}
.right p {
    font-size: 20px;
}
p.text-center.header-text {
    font-weight: 500;
    text-transform: capitalize;
    font-family: 'Playfair Display', serif;
}
p.PAZ.text-center.header-text {
    color: #bf0000;
    font-weight: 600;
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
