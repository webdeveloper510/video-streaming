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
<?php 
$GLOBALS['id'] = $offerdata->id;
$GLOBALS['user_id'] = $offerdata->userid;
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
	<div class="col-md-3">
      <h3>Duration</h3>
      <p><?php echo e($offerdata->min); ?>Min -<?php echo e($offerdata->max); ?> Min</p>
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
      <p><?php echo e($offerdata->delieveryspeed); ?> Days</p>
	</div>
</div>
<?php echo Form::open(['id'=>'form_sub',  'method' => 'post']); ?>

<input type="hidden" name="user_id" value="<?php echo e($GLOBALS['id'].'_'.$GLOBALS['user_id']); ?>"/>
<input type="hidden" name="price" value="<?php echo e($GLOBALS['price']); ?>"/>
<div class="col-md-4">
	<h3>Set Duration</h3>
  <?php echo e(Form::number('duration', '',['class'=>'form-control','placeholder'=>'Duration'])); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<h4>Additional Description<small>(not guaranteed)</small></h4>
<?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 30])); ?>

<div class="text-right">
<?php echo e(Form::submit('Order Now!',['class'=>'btn btn-primary mb-5 btn-lg', 'name'=>'submit'])); ?>

</div>
<?php echo e(Form::close()); ?>

</div>
</div>
	
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artistoffers.blade.php ENDPATH**/ ?>