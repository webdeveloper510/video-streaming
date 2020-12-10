<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="container">
    <?php if($videos): ?>
   <div class="row">
   <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-4">
           <video width="350px" height="275px" controls allowfullscreen>
            <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="row">
   <?php $__currentLoopData = $audio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-4">
           <video width="350px" height="275px" controls allowfullscreen>
            <source src="<?php echo e(url('storage/app/public/audio/'.$aud->media)); ?>" type="audio/mp3">
            Your browser does not support the video tag.
          </video>
 </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    </div>

<?php echo e($videos ? $videos->links(): $audio->links()); ?>




</div><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/getAlldata.blade.php ENDPATH**/ ?>