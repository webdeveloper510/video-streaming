<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
<div class="row">
      <?php $__currentLoopData = $playlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-4">
           <video width="350px" height="275px" controls allowfullscreen>
                <source src="<?php echo e(url('storage/app/public/video/'.$lists->videos)); ?>" type="video/mp4">
                    Your browser does not support the video tag.
           </video>
   
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/playlistdata.blade.php ENDPATH**/ ?>