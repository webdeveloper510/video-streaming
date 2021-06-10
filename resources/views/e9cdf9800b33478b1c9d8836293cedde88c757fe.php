<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

<div class="offer ">
<h2 style=" margin-top: 10% !important;"><?php echo e($offer[0]->title); ?></h2>
<!-- <h5>Audio/Video</h5> -->
<h3><?php echo e($offer[0]->nickname); ?> <i class="fa fa-star"></i>  <?php echo e($offer[0]->count); ?> </h3>
</div>

<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 
$GLOBALS['id'] = $offerdata->id;
$GLOBALS['user_id'] = $offerdata->userid;
$GLOBALS['artistid'] = $offerdata->artistid;

$GLOBALS['price'] = $offerdata->price;
?>
<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-md-7">
<video width="100%" poster="<?php echo e(url('storage/app/public/uploads/'.$offerdata->audio_pic)); ?>" height="340" controls controlsList="nodownload" disablePictureInPicture>
  <source src="<?php echo e(url('storage/app/public/video/'.$offerdata->media)); ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
</div>
<div class="col"></div>
</div>
</div>
<h4>Description</h4>
<p><?php echo e($offerdata->description); ?></p>

<div class="row text-center">
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
      <p ><span style="color:gold !important"><?php echo e($offerdata->price); ?> <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b> </span> /minute</p>
  </div>
  <div class="col">
      <h3>Quality</h3>
      <p><?php echo e($offerdata->quality); ?>p</p>
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



<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/offerpage.blade.php ENDPATH**/ ?>