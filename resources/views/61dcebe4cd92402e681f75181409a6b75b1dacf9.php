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
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end header -->

<!--1st slider start-->
 <!--1st slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
       <?php if($login && $recently): ?>
	  <h3 class="tittle">
     
     Recently Search

     </h3> 
     <?php endif; ?>
	</div>
    <!--Carousel Wrapper-->
    <?php if($login && $recently): ?>
    <div id="recently_search" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
     
      <!--/.Controls-->

      <!--Indicators-->
     
      <!--/.Indicators-->


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

      <!--Slides-->
      
      <!--/.Slides-->

    </div>
    <?php endif; ?>
    <!--/.Carousel Wrapper-->


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
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">New Comers</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="New_comes" class="carousel slide carousel-multi-item" data-ride="carousel">

        <div id="owl-example2" class="owl-carousel">
            <?php $__currentLoopData = $newComes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newcomes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($newcomes->type=='video'): ?>
              <div class="col-md-4">
            
            <video width="370" height="245" controls allowfullscreen>
              <source src="<?php echo e(url('storage/app/public/video/'.$newcomes->media)); ?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>
               
              </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
            </div>
    

    
      

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div><br/><br/>
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
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/video-streaming/resources/views//initial.blade.php ENDPATH**/ ?>