<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header>
<div class="text-center">
<img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" height="50" alt="CoolBrand">
<div class="float-right">
<a href="<?php echo e(url('/logout/default')); ?>"><button class="btn btn-primery">Logout</button></a>
</div>
<h1 class="text-white mt-2"> Content Review</h1>
</div>

</header>


<div class="container-fluid mb-5">
<div class="row">
  <div class="col-md-9">
     
      <video width="100%"  controls>
        <source src="<?php echo e(url('storage/app/public/video/'.$notVerified[0]->media)); ?>" type="video/mp4">
      </video>

<div class="text-center">
       <button class="btn btn-primary" type="button" onClick="permit(true)">Permit</button>
   
      <button class="btn btn-primary" type="button" onClick="permit(false)">Deny</button>
    </div>

  </div>
  <div class="col-md-3">
     <div class="row">
     <?php $__currentLoopData = $notVerified; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-5" onClick="selectVideo(<?php echo e($content->id); ?>)">
                  <video width="100%" height="100%" controls>
                    <source src="<?php echo e(url('storage/app/public/video/'.$content->media)); ?>" type="video/mp4">
                  </video>
              </div>
                <div class="col-7">
                    <h5><?php echo e($content->title); ?></h5>
                </div>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
     </div>
  </div>


</div>
</div>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/reviewContent.blade.php ENDPATH**/ ?>