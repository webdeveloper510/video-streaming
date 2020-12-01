
<!doctype html>
<html>
<title>mistree</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script-->
 

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
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<img src="<?php echo e(url('storage/app/public/uploads/'.$details[0]->profilepicture)); ?>">
</div>


<div class="misstress kelly">
<h3><?php echo e($details[0]->nickname); ?></h3>
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
      <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($detail->type=='video'): ?>
            <div class="col-md-4">

          <video width="300" height="245" controls allowfullscreen>
            <source src="<?php echo e(url('storage/app/public/video/'.$detail->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>

         </div>
            <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
       <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($detail->type=='video'): ?>
    <div class="col-md-4 pr-4">
        <a href="<?php echo e(url('artist-video/'.$detail->id)); ?>">
        <video width="300" height="200" controls allowfullscreen>
            <source src="<?php echo e(url('storage/app/public/video/'.$detail->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </a>
          <div class="price"><?php echo e('$'.$detail->price); ?></div>
          <div class="time">00:23:56</div>
<div class="video-icon">
    <a href="a<?php echo e(url('artist-video/'.$detail->id)); ?>">
<p><?php echo e($detail->title); ?></p>
</a>
<div class="camera">
<i class="fa fa-video-camera" aria-hidden="true"></i>
<p>vid</p>

<p><span><br>MISTRESS KELLY KALASHNIK</span></p>
    </div>
</div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>









</div>







</div>
</div>

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







  </body>

  </html>
 <?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artistDetail.blade.php ENDPATH**/ ?>