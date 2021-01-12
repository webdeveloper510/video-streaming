<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

<div class="offer ">
<h2 style=" margin-top: 10% !important;">Offer Tittle</h2>
<h5>Audio/Video</h5>
<p><?php echo e($offer[0]->nickname); ?> <i class="fa fa-star"></i>  761 </p>
<div class="text-right"><button class="btn btn-primary">SUBSCRIBE</button>
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
<?php echo Form::open(['id'=>'form_sub',  'method' => 'post']); ?>

<input type="hidden" name="user_id" value="<?php echo e($GLOBALS['id'].'_'.$GLOBALS['user_id']); ?>"/>
<input type="hidden" name="price" value="<?php echo e($GLOBALS['price']); ?>"/>
<input type="hidden" name="art_id" value="<?php echo e($GLOBALS['artistid']); ?>">
<div class="col-md-4">
	<h3>Set Duration</h3>
  <?php echo e(Form::number('duration', '',['class'=>'form-control','placeholder'=>'Duration'])); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<h4>Additional Description<small>(not guaranteed)</small></h4>
<?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 30])); ?>

<div class="text-right mt-5">
<?php echo e(Form::submit('Order Now!',['class'=>'btn btn-primary mb-5 btn-lg', 'name'=>'submit'])); ?>

</div>
<?php echo e(Form::close()); ?>

</div>
<div class="alert alert-success show_alert" role="alert" style="display:none">
  A simple success alert—check it out!
</div>
</div>
	
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artistoffers.blade.php ENDPATH**/ ?>