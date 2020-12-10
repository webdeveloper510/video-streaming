<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('design/play.css')); ?>" />
<!-- end header -->
<div class="inner-page">
  <div class="container">
      <div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">Play list</h3>	
      <form>	
       <div class="form-group">
    <label for="exampleFormControlSelect1"> Select Playlist</label>
    <select class="form-control" name="playlist" id="exampleFormControlSelect1">
      <option value="">Choose..</option>
       <?php $__currentLoopData = $listname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($val->id); ?>"><?php echo e($val->playlistname); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

  </div>
  </form>  
		</div>
        <div class="row pb-row">
          <?php if($videos): ?>
          <div id="recently_search" class="carousel slide carousel-multi-item" data-ride="carousel">


<div id="owl-example" class="owl-carousel">
<?php $__empty_1 = true; $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <?php if($vid->type=='video'): ?>
      <div class="col-md-4">
      
    <video width="370" height="245" controls allowfullscreen>
      <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    
      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
       <?php endif; ?>


</div>


</div>
            <?php endif; ?>
			
	</div>
	<br/>
	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">Wish list</h3>		  
		</div>
        <div class="row pb-row">
              <?php if($wishList): ?>
              <?php $__currentLoopData = $wishList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%" controls>
    <source src="<?php echo e(url('storage/app/public/video/'.$val->media)); ?>" type="video/mp4">
				
             </video>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
		
	</div>
	<br/>
	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">History</h3>		  
		</div>
        <div class="row pb-row">

        <?php if($history): ?>
              <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $histories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%" controls>

               <source src="<?php echo e(url('storage/app/public/video/'.$histories->media)); ?>" type="video/mp4">
				
             </video>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
			
	</div>	
  </div>
</div>
</div>
</div>

<script>
  $(document).ready(function() {
 
  $("#owl-example").owlCarousel({
    items:3
 loop:true,
margin:10,
autoPlay:true,
nav:true,
rewindNav:false
  });
});
 </script>

<style>
 .owl-carousel {
    display: block !important;
  }
</style>
<!--body end-->

<!--footer -->
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/play.blade.php ENDPATH**/ ?>