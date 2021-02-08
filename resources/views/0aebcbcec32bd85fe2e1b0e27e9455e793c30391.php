<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="seealldata1">

<div class="container">
    <?php if($videos): ?>
   <div class="row pt-5 mt-5">
   <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-4 my-3">
       <a href="<?php echo e(url('artist-video/'.$vid->id)); ?>">
           <video class="borderhover" width="350px" height="275px" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="row pt-5 mt-5">
   <?php $__currentLoopData = $audio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-4 my-3">
            <div class="borderhover">
            <a href="<?php echo e(url('artist-video/'.$aud->id)); ?>">
               <img src="<?php echo e($aud->audio_pic ? url('storage/app/public/uploads/'.$aud->audio_pic): 'https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg'); ?>">
           <audio width="350px" height="275px" controls controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/audio/'.$aud->media)); ?>" type="audio/mp3">
            Your browser does not support the video tag.
          </audio>
          </a>
          </div>
 </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    </div>

<?php echo e($videos ? $videos->links(): $audio->links()); ?>




</div>
</div>
<style>
.col-md-4 img {
    height: 165px;
    padding-left: 7px;
    margin-bottom: -23px;
}
.borderhover:hover {
    border:2px solid yellow;

}
.seealldata1{
    background:black;
    color:white;
}
</style>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/getAlldata.blade.php ENDPATH**/ ?>