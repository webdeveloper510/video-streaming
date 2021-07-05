<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="seealldata1">

<div class="container">
<div class="choosebutton text-right pt-3" style="<?php echo e($flag=='offer' ? 'display:none' : 'display:block'); ?>"> 
<button type="button" class="btn btn-primary bardot">Select</button>
</div>
<div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-2">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-2">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
      <div class="col-md-2">
      <ul class="selected">
            
           </ul>
      </div>
    <div class="col-md-3 pt-3">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-3 pt-3">
           <button type="button" class=" btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div>
   <div class="modal" role="dialog" id="exampleModal" >
    </div>
    <?php if($videos): ?>
   <div class="row pt-5">
   <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag!='offer' && $vid->profile_video!='yes'): ?>
       <div class="col-md-4 my-3">
       <div class="checkall" style="display:none">
          <form> 
          <input type="checkbox" class="slct_video" id="<?php echo e($vid->id); ?>" data-id="<?php echo e($vid->price); ?>"></form></div>
       <a href="<?php echo e(url('artist-video/'.$vid->id)); ?>">
           <video class="borderhover" poster="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>" width="350px" height="275px"  allowfullscreen controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h3 class="text-white"><?php echo e($vid->title); ?></h3>
        </a>
    </div>
    <?php else: ?>
    <div class="col-md-4 showoffer1 mb-3" style="<?php echo e($vid->offer_status=='offline' ? 'display:none' : 'display:block'); ?>">
    <a href="<?php echo e(url('artistoffers/'.$vid->id)); ?>">

      <div class="card" >
        <?php if($vid->type=='video'): ?>
        <div class="checkall" style="display:none">
          <form> 
          <input type="checkbox" class="slct_video" id="<?php echo e($vid->id); ?>" data-id="<?php echo e($vid->price); ?>"></form></div>
      <video width="100%" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>" controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">

             Your browser does not support the video tag.
      </video>
      <?php else: ?>
      <div class="checkall" style="display:none">
          <form> 
          <input type="checkbox" class="slct_video" id="<?php echo e($vid->id); ?>" data-id="<?php echo e($vid->price); ?>"></form></div>
      <img src="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>"/>
      <audio width="100%" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>"  controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/audio/'.$vid->media)); ?>" type="audio/mp3">

             Your browser does not support the video tag.
      </audio>
      <?php endif; ?>

	  <div class="carad-body">
	      <h4 class="card-title text-center text-white"> <?php echo e($vid->title); ?></h4>
	     
	      <hr class="cardhr">
	      <table class="table table-borderless text-center">
        <tr>
          <th>Category</th>
          <td><?php echo e($vid->category); ?></td>
        </tr>
        <tr>
          <th>Media</th>
          <td><?php echo e($vid->type=='video'? 'Video/mp4' :'Audio/mp3'); ?></td>
        </tr>
            <tr>
            	<th>Price</th>
            	<td> <span style="color:gold;"><?php echo e($vid->price); ?>  <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></span>/Minute </td>
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

    <?php if($aud->type=='audio' && $aud->profile_video!='yes'): ?>
       <div class="col-md-4 my-3">
            <div class="borderhover">
            <a href="<?php echo e(url('artist-video/'.$aud->id)); ?>">
               <img src="<?php echo e($aud->audio_pic ? url('storage/app/public/uploads/'.$aud->audio_pic): 'https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg'); ?>">
           <audio width="350px" height="275px" poster="<?php echo e(url('storage/app/public/uploads/'.$aud->audio_pic)); ?>" controlsList="nodownload" disablePictureInPicture>
            <source src="<?php echo e(url('storage/app/public/audio/'.$aud->media)); ?>" type="audio/mp3">
            Your browser does not support the video tag.
          </audio>
          <h3 class="text-white"><?php echo e($aud->title); ?></h3>
          </a>
          </div>

 </div>
 <?php endif; ?>
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
    padding:0px !important;
}
.seealldata1{
    background:black;
    color:white;
}
.Playlist1 {
    max-height: 216px;
    overflow-y: scroll;
    padding-top: 10px;
}
.card {
    background: transparent;
    color: white;
    border:1px solid white;
}
.card:hover{
  border:1px solid yellow;
}
.checkall input {
    width: 20px;
    height: 20px;
    position: absolute;
    left: 17px;
    z-index: 9;
}
.choose1 .row {
   
   color: #000 !important;
}.choose1 {
   border: 2px solid;
   position: fixed;
   bottom: 10px;
   z-index: 9999999;
   background: white;
   width: 96% !important;
   right: 13px !important;
  
   box-shadow: 0 6px 12px #00000042;
}
</style>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/getAlldata.blade.php ENDPATH**/ ?>