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
<div class="container-fluid mt-5">
   <div class="row">
      <div class="col-md-9">
         <video width="100%" id="sample_video" onClick="startReviw(this,'<?php echo e($type); ?>',<?php echo e(json_encode($notVerified)); ?>)">
            <source src="<?php echo e(url('storage/app/public/video/'.$notVerified[0]->media)); ?>" id="first" type="video/mp4">
         </video>
         <div class="text-center">
            <button class="btn btn-primary" type="button" data-id="<?php echo e($notVerified[0]->id); ?>" onClick="permit(this,false,<?php echo e(json_encode($notVerified)); ?>,'<?php echo e($type); ?>')">Permit</button>
            <button class="btn btn-primary" type="button" data-id="<?php echo e($notVerified[0]->id); ?>" onClick="permit(this,false,<?php echo e(json_encode($notVerified)); ?>,'<?php echo e($type); ?>')">Deny</button>
         </div>
         <input type="hidden" class="verify_id" value="<?php echo e($notVerified[0]->id); ?>"/>
      </div>
      <div class="col-md-3">
         <?php $__currentLoopData = $notVerified; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
         <div class="row mb-2" id="<?php echo e($content->id); ?>">
               <div class="col-5">
                  <video width="100%" height="100%" class="video" controls>
                     <source src="<?php echo e(url('storage/app/public/video/'.$content->media)); ?>" type="video/mp4">
                  </video>
               </div>
            <div class="col-7">
               <h5><?php echo e($content->title); ?></h5>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </div>
   </div>
</div>
<style>
   .text-right.buttons {
   position: absolute;
   top: 0;
   right: 20px;
   }
   .carousel-control-next-icon, .carousel-control-prev-icon {
   display: inline-block;
   width: 20px;
   height: 20px;
   background: #0000001a no-repeat center center;
   background-size: 100% 100%;
   }
   li.nav-item {
   width: 33.33%;
   text-align: center;
   padding: 10px;
   background: #7b0000;
   color: white !important;
   }
   li.nav-item  a{
   color:white;
   }
   .row.media {
   border: 1px solid black;
   padding: 13px;
   margin-bottom: 12px;
   }
   header {
   background: #7b0000;
   padding: 11px;
   }
   .float-right {
   position: absolute;
   right: 20px;
   top: 20px;
   }
</style>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/reviewContent.blade.php ENDPATH**/ ?>