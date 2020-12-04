
    @include('layouts.header')
<link rel="stylesheet" href="{{asset('design/artistDetail.css')}}" />


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
  <img src="{{url('storage/app/public/uploads/'.$details[0]->profilepicture) }}">
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
            <source src="{{url('storage/app/public/video/'.$detail->media) }}" type="video/mp4">
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
  <button type="button" onclick="alert('Hello world!')">Add to Wishlist</button>
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
<div class="row">
<div class="col-md-4">
 <div class="search content">
  <form action="/action_page.php">
        <input type="text" placeholder="Search content"class="form-control" name="search">
        <button class="iconsearch" type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
    </div>
    <div class="col-md-4 mb-3">
<form action="/action_page.php">
  <label for="cars">Filter:</label>
  <select class="form-control" name="cars" id="cars1">
    <option value="volvo">See All</option>
    <option value="saab">Saab</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>
  </select>

</form> 
</div>
<div class="col-md-3">
    <div class="sortby">
    <i class="fa fa-filter" aria-hidden="true"></i>
    <p>Sort By</p>
    </div>
    
    <div class="newest">
    <form action="/action_page.php">
  <select class="form-control are" name="cars" id="cars">
    <option value="volvo">Newest</option>
    <option value="saab">Oldest</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>
  </select>
  

  </form>
  </div>
  </div>
  <div class="col-md-1 pt-4">
    
      <div class="dropdown">
       <button class="bardot" type="button">
          Select
        </button>
   </div>
  </div>
</div>




<div class="row media_div">
       @foreach ($details as $detail)
            @if($detail->type=='video')
    <div class="col-md-4 pr-4">
        <a href="{{url('artist-video/'.$detail->id)}}">
        <video width="300" height="200" controls allowfullscreen>
            <source src="{{url('storage/app/public/video/'.$detail->media) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </a>

    <div class="checkall" style="display: none"><form> <input type="checkbox" class="slct_video" id="{{$detail->id}}" data-id="{{$detail->price}}"></form></div>

          <div class="price">{{'$'.$detail->price}}</div>
          <div class="time">00:23:56</div>
<div class="video-icon">
    <a class="text-center" href="a{{url('artist-video/'.$detail->id)}}">
<p>{{$detail->title}}</p>
</a>
<div class="camera">
<i class="fa fa-video-camera" aria-hidden="true"></i>
<p>vid</p>

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
<div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
<div class="row ">
<div class="col-md-3">
<h4><span class="count">0</span>Item  Selected</h4>
</div>
<div class="col-md-3">
<h4>Price : <span class="paz">0</span>PAZ</h4>
</div>
<div class="col-md-3 pt-3">
<button type="button" class="btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
</div>
<div class="col-md-3 pt-3">
<button type="button" class="addTowishlist" >Add To Wishlist </button>
</div>
</div>
</div>
<div class="modal" role="dialog" id="exampleModal" >


</div>
   <script> 
  $("#owl-example").owlCarousel({
    items:3,
	loop:true, //HERE YOU ARE SAYING I WANT THE INFINITE LOOP
	margin:0,
	autoPlay:true,
	autoPlay: 1000,
	autoPlayTimeout:1000,
	autoPlayHoverPause:true,
	nav:false,
	dots:false,
	 rewindNav:false //**This
  
  });
 
 </script>
</section>
