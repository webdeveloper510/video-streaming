<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

<div class="offer ">
<h4 style=" margin-top: 10% !important;"><?php echo e($offer[0]->title); ?></h4> 
<!-- <h5>Audio/Video</h5> -->
<a href="<?php echo e(url('artistDetail/'.$offer[0]->artistid)); ?>"><h3><?php echo e($offer[0]->nickname); ?> <i class="fa fa-star"></i>  761 </h3></a>
<div class="text-right">
<button class="btn btn-danger text-left <?php echo e($isSubscribed ? 'hide' : 'block'); ?>"  data-toggle="modal" data-target="#Subscribe1" id="subscribe" >Subscribe </button>
    
 <button class="btn btn-secondary text-left <?php echo e($isSubscribed ? 'block' : 'hide'); ?>" data-toggle="modal" data-target="#Unsubscribe1"  id="unsubscribe" >Subscribed </button>
</div>
<!-- Modal  Subscribe-->
<div class="modal fade" id="Subscribe1" tabindex="-1" aria-labelledby="SubscribeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <h3> Subscribe from Artistname</h3>
      <div class="text-center Artistxyz">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
        <button type="button" class="btn btn-primary" onclick="subscribe(<?php echo e($offer[0]->artistid); ?>,true)" >Subscribe</button>
        </div>
      </div>
     
    </div>
  </div>
</div>


<!------------------------------------ Modal  unSubscribe------------------------------->
<div class="modal fade" id="Unsubscribe1" tabindex="-1" aria-labelledby="UnsubscribeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <h3> Unsubscribe from Artistname</h3>
      <div class="text-center Artistxyz">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
        <button type="button" class="btn btn-primary" onclick="subscribe(<?php echo e($offer[0]->artistid); ?>,false)">Unsubscribe</button>
       </div>
      </div>
     
    </div>
  </div>
</div>
<p>Sample</p>
<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 
$GLOBALS['id'] = $offerdata->id;
$GLOBALS['user_id'] = $offerdata->userid;
$GLOBALS['artistid'] = $offerdata->artistid;
$GLOBALS['add_price'] = $offerdata->additional_price;

$GLOBALS['price'] = $offerdata->price;
?>
<div class="container">
<video width="100%" height="100%" controls controlsList="nodownload" disablePictureInPicture>
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
      <p><?php echo e($offerdata->price); ?> PAZ/Minute</p>
  </div>
  <div class="col">
      <h3>Quality</h3>
      <p><?php echo e($offerdata->quality); ?> px</p>
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
<input type="hidden" name="price" id="offer_pay" value="<?php echo e($GLOBALS['price']); ?>"/>
<input type="hidden" name="art_id" value="<?php echo e($GLOBALS['artistid']); ?>">
<input type="hidden" name="add_price" id="additional" value="<?php echo e($GLOBALS['add_price']); ?>">

<input type="hidden" name="allinfo" value="<?php echo e(json_encode($offerdata)); ?>"/>
<div class="col-md-4">
	<h3>Set Duration</h3>
  <?php echo e(Form::number('duration', '',['class'=>'form-control','data-id'=>$GLOBALS['price'],'id'=>'change_duration','placeholder'=>'Duration'])); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<h4>Additional Request <small>(Price: <?php echo e($GLOBALS['add_price']); ?>PAZ)</small></h4>
<?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 30])); ?>


<br>
<strong id="change_text"></strong>
<div class="text-right mt-5">
<?php echo e(Form::submit('Pay !',['class'=>'btn btn-primary mb-5 btn-lg', 'name'=>'submit'])); ?>

</div>
<?php echo e(Form::close()); ?>

</div>
<div class="alert alert-success show_alert" role="alert" style="display:none">
  A simple success alert—check it out!
</div>
</div>

<style>
.text-center.Artistxyz {
    padding: 30px;
}
</style>
	
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artistoffers.blade.php ENDPATH**/ ?>