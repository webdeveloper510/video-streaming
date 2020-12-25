<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

<div class="offer">
<h2>Offer Tittle</h2>
<h5>Audio/Video</h5>
<p>Artistname<br/><i class=""></i><?php echo e($offer[0]->nickname); ?></p><button class="btn btn-primary">SUBSCRIBE</button>
<p>Sample</p>
<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<video width="320" height="240" controls>
  <source src="<?php echo e(url('storage/app/public/video/'.$offerdata->media)); ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
<h4>Description</h4>
<p><?php echo e($offerdata->description); ?></p>

<div class="row">
	<div class="col-md-3">
      <h3>Minimum</h3>
      <p>3min</p>
	</div>

	<div class="col-md-3">
       <h3>Minimum</h3>
      <p>3min</p>
	</div>
</div>
<div class="">
	<h3>Set Duration</h3>
	<input type="text" name="duration">
</div>
<div class="">
	<h3>Set Duration</h3>
	<textarea class="form-control"></textarea>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<button class="btn btn-primary">Order Now</button>
</div>
</div>
	
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artistoffers.blade.php ENDPATH**/ ?>