

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
	<div class="container">
  <div class="row">
  <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <a href="<?php echo e(url('artistDetail/'.$artist->id)); ?>">
    <div class="col-md-4">
      <img src="<?php echo e(url('storage/uploads/'.$artist->profilepicture)); ?>" class="rounded-circle" alt="Cinque Terre" width="304" height="236">
        <h2 class="my-5 h2"><?php echo e($artist->nickname); ?></h2>
    </div>
</a>
    <br/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

​ <?php echo e($artists->links()); ?>

</body>
</html>
​

<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists.blade.php ENDPATH**/ ?>