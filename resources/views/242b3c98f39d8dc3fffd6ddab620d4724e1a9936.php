<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

<div class="offer ">
<h2 style=" margin-top: 10% !important;">Offer Tittle</h2>
<h5>Audio/Video</h5>
<p><?php echo e($offer[0]->nickname); ?> <i class="fa fa-star"></i>  <?php echo e($offer[0]->count); ?> </p>
</div>
<p>Sample</p>
<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 
$GLOBALS['id'] = $offerdata->id;
$GLOBALS['user_id'] = $offerdata->userid;
$GLOBALS['artistid'] = $offerdata->artistid;

$GLOBALS['price'] = $offerdata->price;
?>
<div class="container">
<video width="100%" height="340" controls>
  <source src="<?php echo e(url('storage/app/public/video/'.$offerdata->media)); ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
</div>
<h4>Description</h4>
<p><?php echo e($offerdata->description); ?></p>

<div class="row">
	<div class="col">
      <h3>Duration</h3>
      <p><?php echo e($offerdata->min); ?>Min -<?php echo e($offerdata->max); ?> Min</p>
	</div>
  <div class="col">
      <h3>Media</h3>
      <p>video</p>
  </div>
  <div class="col">
      <h3>Price</h3>
      <p><?php echo e($offerdata->price); ?>/PAZ</p>
  </div>
  <div class="col">
      <h3>Quality</h3>
      <p>1080p</p>
	</div>
  <div class="col">
      <h3>Category</h3>
      <p><?php echo e($offerdata->category); ?></p>
	</div>
  <div class="col">
      <h3>Delievery Speed</h3>
      <p><?php echo e($offerdata->delieveryspeed); ?> Days</p>
	</div>
</div>




<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<div class="alert alert-success show_alert" role="alert" style="display:none">
  A simple success alert—check it out!
</div>
</div>
	
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/offerpage.blade.php ENDPATH**/ ?>