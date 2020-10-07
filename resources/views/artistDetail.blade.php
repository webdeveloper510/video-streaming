@extends('layout.cdn')

<!doctype html>
<html>
<title>mistree</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1">


   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>

  </head>
  
  
  <style>
  
  .owl-carousel {
    display: block !important;
}
   .main-mistree {
   margin-top: -22px;
}
.price {
    position: absolute;
    margin-top: -37px;
    background: white;
    padding: 8px;
}
.time {
    position: absolute;
    right: 18px;
    margin-top: -37px;
    padding: 8px;
    background: white;
}
/*.owl-item.active > div:after {
  content: 'active';
}
.owl-item.center > div:after {
  content: 'center';
}
.owl-item.active.center > div:after {
  content: 'active center';
}
.owl-item > div:after {
  font-family: sans-serif;
  font-size: 24px;
  font-weight: bold;
}*/
  </style>
  
  
  <body>
 <section class="mistress-sec">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="sec-video-area">
<h3><strong>$</strong> Top Selling Content</h3>
</div>
</div>
</div>

<div class="row">

<div class="col-md-3">

<div class="main-mistree-sec1">
<div class="main-mistree">
<div class="main-mistree-circle">
<img src="{{url('storage/uploads/'.$details[0]->profilepicture) }}">
</div>


<div class="misstress kelly">
<h3>{{$details[0]->nickname}}</h3>
</div>


<div class="clip-icon">
<i class="fa fa-play" aria-hidden="true"></i>

<p>Buy Clips</p>
</div>

<div class="clips-social-icons">
<div class="clips-social1">
<i class="fa fa-envelope" aria-hidden="true"></i>
<p>Tribute Me</p>
</div>
</div>

<div class="clips-social-icons">
<div class="clips-social1">
<i class="fa fa-envelope" aria-hidden="true"></i>
<p>Message Me</p>
</div>
</div>

<div class="clips-social-icons">
<div class="clips-social1">
<i class="fa fa-heart" aria-hidden="true"></i>
<p>Favorite Me</p>
</div>
</div>

<div class="clips-social-icons">
<div class="clips-social1">
<i class="fa fa-heart" aria-hidden="true"></i>
<p>About Me</p>
</div>
</div>


<div class="clips-social-icons">
<div class="clips-social1">
<i class="fa fa-share-alt" aria-hidden="true"></i>
<p>Share Me</p>
</div>
</div>


</div>
</div>
</div>


<div class="col-md-9">
<div id="owl-example" class="owl-carousel">
      @foreach ($details as $detail)
            @if($detail->type=='video')
            <div class="col-md-4">
               
          <video width="300" height="245" controls allowfullscreen>
            <source src="{{url('storage/video/'.$detail->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          
         </div>
            @endif
             @endforeach
</div>
 
  
  <!-- Left and right controls -->
  

<div class="feel my-shoe">
<div class="sub-feel my">
<h3>Feel My Shoes squeezing your balls</h3>


<div class="add to cart">
<button type="button" onclick="alert('Hello world!')">Add to Cart</button>
<div class="price-btn">
<a href="#"><p>$9.9</p></a>
</div>
</div>
</div>
<p>Extreme bondage/suspension, Ballbusting, Humiliation...</p>
</div>


<div class="rope bondag">
<p>Ballbusting, Rope Bondage</p>
<p>File Type: mp4</p>
<p>Resolution: HD 720p</p>
</div>


<div class="result">

<div class=" my content">
<h3>My Content</h3>
<p>199 results</p>
</div>

 <div class="search content">
<form action="/action_page.php">
      <input type="text" placeholder="Search content" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
	

<form action="/action_page.php">
  <label for="cars">Filter:</label>
  <select name="cars" id="cars">
    <option value="volvo">See All</option>
    <option value="saab">Saab</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>
  </select>
  
</form>	
	
	<div class="sortby">
	<i class="fa fa-filter" aria-hidden="true"></i>
	<p>Sort By</p>
	</div>
	
	<div class="newest">
	<form action="/action_page.php">
  <select name="cars" id="cars">
    <option value="volvo">Newest</option>
    <option value="saab">Oldest</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>
  </select>
  </div>
  </div>
</div>




<div class="row">
       @foreach ($details as $detail)
            @if($detail->type=='video')
    <div class="col-md-4 pr-4">
        <a href="{{url('videoDetail/'.$detail->id)}}">
        <video width="300" height="200" controls allowfullscreen>
            <source src="{{url('storage/video/'.$detail->media) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </a>
          <div class="price">{{'$'.$detail->price}}</div>
          <div class="time">00:23:56</div>
<div class="video-icon">
    <a href="">
<p>{{$detail->title}}</p>
</a>
<div class="camera">
<i class="fa fa-video-camera" aria-hidden="true"></i>
<p>vid</p>

<p><span><br>MISTRESS KELLY KALASHNIK</span></p>
    </div>
</div>
</div>
@endif
@endforeach
</div>









</div>







</div>
</div>

</div>
     <script>
  $(document).ready(function() {


 
  $("#owl-example").owlCarousel({
  // items : 3,
  // slideSpeed : 2000,
  // autoPlay: true,
  // center: true,
  // loop: true,
  // nav: true,
  // rewind:true
items:3,
   loop:true,
margin:10,
autoPlay:true,
nav:true,
rewindNav:false,

   
  


  });
 
});
 </script>
</section>





  
  
  </body>

  </html>

