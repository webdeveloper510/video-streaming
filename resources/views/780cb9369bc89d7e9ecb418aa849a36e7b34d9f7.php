<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="background1">
<div>
           <?php if(session('success')): ?>
        <div class="alert alert-success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
      </div>



</section>


<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/video-streaming/resources/views/artists/dashboard_home.blade.php ENDPATH**/ ?>