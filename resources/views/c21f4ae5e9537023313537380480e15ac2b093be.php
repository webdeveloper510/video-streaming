
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php if(session('success')): ?>
<div class="modal fade" id="modal-subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <h1 class="text-center text-uppercase"><?php echo e(session('success')); ?></h1>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
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
      <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="artist_image">


  <a href="<?php echo e(is_object($login) ? url('/artistDetail/'.$artist->id) : url('/register')); ?>">
  <img width="100%" height="200px"  src="<?php echo e(url('storage/app/public/uploads/'.$artist->profilepicture)); ?>">
</a>

    </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  
</div>
  </div>
  </div> --> 
  <?php if(!$login): ?> 
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
  <button type="button" class="btn btn-primary"><a href="<?php echo e(url('/checkUser/artist')); ?>">Register as Artist</a></button>

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

 <button type="button" class="btn btn-primary px-3"><a href="<?php echo e(url('/checkUser/user')); ?>">Register as Customer </a></button>

    </div>
    </div>

     </div>
    
  </div>
 
</div>

      </div>

      </div>
    
    
</div>
<?php endif; ?>
 </div>
<div class="outer_slider">
  <div class="coner my-4">
    
       <?php if($login && $recently): ?>
	  <h3 class="tittle">
     
     Recently Search

     </h3> 
     <?php endif; ?>
	</div>
    <!--Carousel Wrapper-->
    <?php if($login && $recently): ?>
    <div id="recently_search" class="carousel slide carousel-multi-item" data-ride="carousel">

    


      <div id="owl-example" class="owl-carousel">
      <?php $__empty_1 = true; $__currentLoopData = $recently; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($recnt->type=='video'): ?>
            <div class="col-md-4">
            
          <video width="370" height="245" controls allowfullscreen>
            <source src="<?php echo e(url('storage/app/public/video/'.$recnt->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
             <?php endif; ?>

  
</div>


    </div>
    <?php endif; ?>

  </div>  </div>


  <br/><br/>

 
 <!--End 1st slider-->
 
 
 
 <?php if($recently): ?>
 <!--2nd slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">Popular</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="Popular_slid" class="carousel slide carousel-multi-item" data-ride="carousel">

             <div id="owl-example1" class="owl-carousel">
            <?php $__empty_1 = true; $__currentLoopData = $recently; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($recnt->type=='video'): ?>
            <div class="col-md-4">
           
          <video width="370" height="245" controls allowfullscreen>
            <source src="<?php echo e(url('storage/app/public/video/'.$recnt->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
               </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
             <?php endif; ?>

  
            </div>
    

  
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div>
  <?php endif; ?>


  <br/><br/>
 <!--End 2nd slider-->
 
 
 
  <!--3rd slider start-->
<br/><br/>
 <!--End 3rd slider-->
 
 <?php if($recently): ?>
  <!--4th slider start-->
<div class="outer_slider last">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">Special offer</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="Special_offer" class="carousel slide carousel-multi-item" data-ride="carousel">

         <div id="owl-example3" class="owl-carousel">
            <?php $__currentLoopData = $recently; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($recnt->type=='video'): ?>
              <div class="col-md-4">
                
            <video width="370" height="245" controls allowfullscreen>

            <source src="<?php echo e(url('storage/app/public/video/'.$recnt->media)); ?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>
               
              </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
            </div>
    

    

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div>
<?php endif; ?>
  <br/><br/>
  <style>
  	body{

    background:black;

  	}
  	h3.tittle {
    color: white;
}
    tr:nth-child(even) {
    background-color: #fff;
    color: black;
}
.user-body i {
    padding-right: 21px;
    color: green;
}
.user1 {
    box-shadow: 1px 1px 6px 1px #0000003d;
}
.user-body {
    padding: 14px;
    background: white;
    border-bottom-right-radius: 25px;
    border-bottom-left-radius: 25px;
}
.user-head.text-center {
    padding: 13px;
    background: #bf0000;
    border-top-left-radius: 25px !important;
    border-top-right-radius: 25px !important;
}
.user-head.text-center.text-white h3 {
    color: white;
    padding-top: 12px;
    font-size: 28px;
}
a.btn, button.btn {
    line-height: 100% !important;
  }
  button.btn.btn-primary a {
    color: white;
}
.user-body p {
    font-size: 20px;
    padding-top: 12px;

}
.col-md-12.text-center button:hover {
    background: #bf0000 !important;
    border: 2px solid #bf0000 !important;
}
button.btn.btn-primary.partner_col:hover {
     background: #bf0000 !important;
    border: 2px solid #bf0000 !important;
}


.text-center.header-text {
    font-weight: 700;
    text-transform: capitalize;
    /* font-family: 'Playfair Display', serif; */
    color: white;
}
.PAZ.text-center.header-text {
    color: white;
    font-weight: 700;
    margin-top: -10px;
}
.user1-body.col-md-12 {
    background: white;
    color: white;
    padding-bottom: 12px;
    border-bottom-right-radius: 27px;
    border-bottom-left-radius: 27px;
}
.user1-head.text-center {

    background: #bf0000;
    border-top-left-radius: 25px !important;
    border-top-right-radius: 25px !important;
}
.user1-head.text-center.text-white.col-md-12 h3 {
    color: white;
    padding-top: 10px;
   font-size: 28px;
}
.modal-dialog {
    margin-top: 18% !important;
  }
  .modal{
        background: #7b0000;
  }
.artist_image img {
    padding: 12px;
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
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<script type="text/javascript">
  $ (window).ready (function () {
  setTimeout (function () {
    $ ('#modal-subscribe').modal ("show")
  }, 1000)
})
</script><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views//initial.blade.php ENDPATH**/ ?>