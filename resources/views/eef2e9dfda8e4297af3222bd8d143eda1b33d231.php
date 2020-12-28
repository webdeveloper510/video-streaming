<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

<div class="offer ">
<h2 style="    margin-top: 10% !important;">Offer Tittle</h2>
<h5>Audio/Video</h5>
<p><?php echo e($offer[0]->nickname); ?> <i class="fa fa-star"></i>  761 </p>
<div class="text-right"><button class="btn btn-primary">SUBSCRIBE</button>
</div>
<p>Sample</p>
<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container">
<video width="100%" height="340" controls>
  <source src="<?php echo e(url('storage/app/public/video/'.$offerdata->media)); ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
</div>
<h4>Description</h4>
<p><?php echo e($offerdata->description); ?></p>

<div class="row">
	<div class="col-md-3">
      <h3>Duration</h3>
      <p>5 Min - 20 Min</p>
	</div>
  <div class="col-md-3">
      <h3>Price</h3>
      <p><?php echo e($offerdata->price); ?>/PAZ</p>
	</div>
  <div class="col-md-3">
      <h3>Category</h3>
      <p><?php echo e($offerdata->category); ?></p>
	</div>
  <div class="col-md-3">
      <h3>Delievery Speed</h3>
      <p><?php echo e($offerdata->delieveryspeed); ?></p>
	</div>
</div>
<div class="col-md-6">
	<h3>Set Duration</h3>
  <div class="row">
                              <div class="col">

                                 <label>Min :</label>
                  <input class="form-control" min="0" placeholder="Min" name="min" type="number" value="">
                              </div>
                                                             <div class="col">
                                 <label>Max :</label>
                          <input class="form-control" min="0" placeholder="Max" name="max" type="number" value="">
                              </div>
                                                           </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<h4>Additional Description<small>(not guaranteed)</small></h4>
<textarea class="form-control mb-4" placeholder="Add Description" id="floatingTextarea2" style="height: 100px"></textarea>
<div class="text-right">
<button class="btn btn-primary mb-5 btn-lg ">Order Now</button>
</div>
</div>
</div>
	
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artistoffers.blade.php ENDPATH**/ ?>