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
   <?php if($type!='picture'): ?>
      <div class="col-md-9">
         <!-- <video width="100%" id="sample_video" onClick="startReviw(this,'<?php echo e($type); ?>',<?php echo e(json_encode($notVerified)); ?>)">
            <source src="<?php echo e(url('storage/app/public/video/'.$notVerified[0]->media)); ?>" id="first" type="video/mp4">
         </video> -->
         <video width="100%" id="sample_video" >
            <source src="<?php echo e(url('storage/app/public/video/'.$notVerified[0]->media)); ?>" id="first" type="video/mp4">
         </video>
         <div class="text-center">
            <button class="btn btn-primary" type="button" data-id="<?php echo e($notVerified[0]->id); ?>" onClick="permit(this,true,<?php echo e(json_encode($notVerified)); ?>,'<?php echo e($type); ?>')">Permit</button>
            <button class="btn btn-primary" type="button" data-id="<?php echo e($notVerified[0]->id); ?>" onClick="permit(this,false,<?php echo e(json_encode($notVerified)); ?>,'<?php echo e($type); ?>')">Deny</button>
         </div>
         <input type="hidden" class="verify_id" value="<?php echo e($notVerified[0]->id); ?>"/>
      </div>
      <?php else: ?>
      <div class="col-md-9">
         <!-- <video width="100%" id="sample_video" onClick="startReviw(this,'<?php echo e($type); ?>',<?php echo e(json_encode($notVerified)); ?>)">
            <source src="<?php echo e(url('storage/app/public/video/'.$notVerified[0]->media)); ?>" id="first" type="video/mp4">
         </video> -->
         <img src="<?php echo e($profile[0]->profilepicture!='' ? url('storage/app/public/uploads/'.$profile[0]->profilepicture) : url('storage/app/public/uploads/'.$backgound[0]->cover_photo)); ?>" id="imageSrc" width="100%" id="sample_video" >
         <div class="text-center">
            <button class="btn btn-primary" type="button" data-id="<?php echo e($profile[0]->id); ?>" onClick="permit(this,true,<?php echo e(json_encode($profile)); ?>,'<?php echo e($type); ?>')">Permit</button>
            <button class="btn btn-primary" type="button" data-id="<?php echo e($profile[0]->id); ?>" onClick="permit(this,false,<?php echo e(json_encode($profile)); ?>,'<?php echo e($type); ?>')">Deny</button>
         </div>
         <input type="hidden" class="verify_id" value="<?php echo e($profile[0]->profilepicture ? $profile[0]->id : $backgound[0]->id); ?>"/>
         <input type="hidden" class="picture" value="<?php echo e($profile[0]->profilepicture ? 'profilepicture' : 'background'); ?>"/>

      </div>
      <?php endif; ?>
      <?php if($type!='picture'): ?>
      <div class="col-md-3">
     
         <?php $__currentLoopData = $notVerified; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
         <div class="row mb-2" id="<?php echo e($content->id); ?>">
               <div class="col-5">
                  <video width="100%" height="100%" class="video" controls onClick="startReviw(this,'<?php echo e($type); ?>',<?php echo e(json_encode($notVerified)); ?>)">
                     <source src="<?php echo e(url('storage/app/public/video/'.$content->media)); ?>" type="video/mp4">
                  </video>
               </div>
            <div class="col-7">
               <h5><?php echo e($content->title); ?></h5>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
     

      </div>
      <?php else: ?>
      <div class="col-md-3">
      <h3>Profile Image </h3>
         <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($artists->profilepicture!=''): ?>

         <div class="row mb-2" id="<?php echo e($artists->id); ?>">
               <div class="col-7">
                 <span>Profile Picture</span> <img type-image="profilepicture" width="100%" src="<?php echo e(url('storage/app/public/uploads/'.$artists->profilepicture)); ?>" height="100%" class="video" controls onClick="startReviw(this,'<?php echo e($type); ?>',<?php echo e(json_encode($artists)); ?>)">

               </div>
            <div class="col-5">
               <h5><?php echo e($artists->nickname); ?></h5>
            </div>
         </div>
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
         <hr class="mt-4">
         <h3>Background Image </h3>
         <?php $__currentLoopData = $backgound; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($artists->cover_photo!=''): ?>
         <div class="row mb-2" id="<?php echo e($artists->id); ?>">
               <div class="col-7">
       <img type-image="background" width="100%" src="<?php echo e(url('storage/app/public/uploads/'.$artists->cover_photo)); ?>" height="100%" class="video" controls onClick="startReviw(this,'<?php echo e($type); ?>',<?php echo e(json_encode($artists)); ?>)">

               </div>
            <div class="col-5">
               <h5><?php echo e($artists->nickname); ?></h5>
            </div>
         </div>
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      </div>
      <?php endif; ?>
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
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/reviewContent.blade.php ENDPATH**/ ?>