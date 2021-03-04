<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="seealldata1">

<div class="container">
    <?php if($videos): ?>
   <div class="row pt-5 mt-5">
   <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag!='offer'): ?>
       <div class="col-md-4 my-3">
       <a href="<?php echo e(url('artist-video/'.$vid->id)); ?>">
           <video class="borderhover" width="350px" height="275px" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h3 class="text-white"><?php echo e($vid->title); ?></h3>
        </a>
    </div>
    <?php else: ?>
    <div class="col-md-4 showoffer1 mb-3">
    <a href="<?php echo e(url('artistoffers/'.$vid->id)); ?>">
      <div class="card">
      <video width="100%" height="240" controls controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">

             Your browser does not support the video tag.
      </video>

	  <div class="carad-body">
	      <h4 class="card-title text-center text-white"> <?php echo e($vid->title); ?></h4>
	     
	      <hr class="cardhr">
	      <table class="table table-borderless text-center">
        <tr>
          <th>Media</th>
          <td><?php echo e($vid->type=='video'? 'Video/mp4' :'Audio/mp3'); ?></td>
        </tr>
            <tr>
            	<th>Price</th>
            	<td> <?php echo e($vid->price); ?>  <span style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</span>/Minute </td>
              </tr>
	      </table>
	         </div>
   </div>
   </a>
 </div>
 <?php endif; ?>
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
          <h3 class="text-white"><?php echo e($aud->title); ?></h3>
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
.card {
    background: transparent;
    color: white;
    border:1px solid white;
}
</style>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/getAlldata.blade.php ENDPATH**/ ?>