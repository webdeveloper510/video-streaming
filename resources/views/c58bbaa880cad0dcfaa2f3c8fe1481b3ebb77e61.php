
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <style>
  
  .owl-carousel {
    display: block !important;
}
.video-icon a {
    text-align: center;
    position: relative;
    left: 119px;
}
.addToCart, .library {
    background-color: #a60000;
    border: 2px solid #a60000;
    color: #fff;
    padding: 5px;
    
    margin-right:10px;

}
.show {
    background: transparent;
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
.choose1 {
    text-align: center;
    background: white;
    border: 1px solid red;
    position: fixed;
    z-index: 99999999999999;
    color: black;
    bottom: 10px;
    width: 60%;
    right: 39px;
    padding: 0px !important;
}
.checkall input {
    height: 20px;
    width: 20px;
}
.checkall {
    position: absolute;
    top: 1px;
    right: 2px;
}
.are {
    float: left;
    margin-right: 10px;
}
.time {
    position: absolute;
    right: 18px;
    margin-top: -37px;
    padding: 8px;
    background: white;
}
.search.content .form-control {
    float: left;
    width: 70%;
}
.newest form select#cars {
    width: 220px !important;
}
.sortby {
    margin-top: -11px;

}
button.close.off {
    margin-top: -3px;
    font-size: 31px;
}
button.iconsearch {
    padding: 4px;
    background: deepskyblue;
    border: 2px solid cornflowerblue;
    color: white;
    margin-left: 11px;
    padding-left: 10px;
    padding-right: 10px;
}
.Playlist1 {
    border: 2px solid;
    padding: 20px;
}
button.addNow {
    padding: 5px;
    background: #a60000;
    color: white;
    border-radius: 8px;
    border: 2px solid #a60000;
    font-size: 16px;
}
.bardot {
    font-size: 16px;
    padding: 4px;
    color: white;
    border: 2px solid #36b1ea;
    background: #36b1ea;
}
.camera {
    display: flex;
    position: absolute;
    left: 0;
}
.itemsel {
    border: 2px solid;
    padding: 6px;
}
  </style>



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
  <select class="form-control" name="cars" id="cars">
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

    <div class="checkall" style="display: none"><form> <input type="checkbox" class="slct_video" id="<?php echo e($detail->id); ?>" data-id="<?php echo e($detail->price); ?>"></form></div>

          <div class="price"><?php echo e('$'.$detail->price); ?></div>
          <div class="time">00:23:56</div>
<div class="video-icon">
    <a class="text-center" href="a<?php echo e(url('artist-video/'.$detail->id)); ?>">
<p><?php echo e($detail->title); ?></p>
</a>
<div class="camera">
<i class="fa fa-video-camera" aria-hidden="true"></i>
<p>vid</p>

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
      	
      <h3>Choose Playlist</h3>
      <div class="Playlist1">
     
      	<h5 class="select_list"> </h5> <a href="" class="aedit">edit</a><br>
      
      	<a href="#" class="show_list">Create New Playlist +</a>
      	<span class="create_playlistt" style="display: none">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>
      </div>
      <div class="container">
         <h3>Items </h3>
         <div class="itemsel">
         <div class="row ">
          <div class="col"><h5>hello</h5></div>
          <div class="col"><span>60PAZ</span>
          </div>
          <div class="col"><button type="button" class="close " data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          
      </div>
       <div class="row">
          <div class="col"><h5>hello</h5></div>
          <div class="col"><span>60PAZ</span>
          </div>
          <div class="col"><button type="button" class="close " data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          
      </div>
    </div>
  </div>
      <div class="text-center mt-4">
           <h3>Prize : 600PAZ</h3>
      <button type="button" class=" addNow">ADD NOW</button>
  </div>
      </div>
      
    </div>
  </div>
</div>
</div>
<div class="col-md-3 pt-3">
<button type="button" class="addToCart" >Add To Wishlist </button>
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
<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artistDetail.blade.php ENDPATH**/ ?>