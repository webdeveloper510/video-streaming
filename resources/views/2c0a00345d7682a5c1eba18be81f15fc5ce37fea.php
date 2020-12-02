<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
<h2>Playlist</h2>

<ol>
<?php $__currentLoopData = $listname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($val->playlistname); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ol>
</div>


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/listname.blade.php ENDPATH**/ ?>