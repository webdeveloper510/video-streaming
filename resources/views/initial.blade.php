@extends('layout.cdn')
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>PAZ html</title>
</head>
<body id="default_theme" class="it_service">
<!-- header -->
@include('layouts.header')
<!-- end header -->

<!--1st slider start-->
 <!--1st slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
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
	  <h3 class="tittle">New Comes</h3>
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
