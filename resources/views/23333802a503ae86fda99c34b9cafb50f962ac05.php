<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
   <div class="row">
   <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-12">
      <div class="artistoffer row">
        <div class="col-md-2">
        <video width="100%" height="100%" controls>
                <source src="<?php echo e(url('storage/app/public/video/'.$offerdata->media)); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>
      </div>
        <div class="col-md-8 pl-5">
        <h2><?php echo e($offerdata->title); ?></h2>
         <p><?php echo e($offerdata->description); ?></p>
           
         
        </div>
        <div class="col-md-2">
         <h4><?php echo e($offerdata->price); ?>/min PAZ</h4>
        </div>
        <hr>
        </div>
      </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
   	</div>
   </div>



	<style type="text/css">
		.row hr {
    width: 100%;
}
.checked {
  color: orange;
}
	</style>
	
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artistoffers.blade.php ENDPATH**/ ?>