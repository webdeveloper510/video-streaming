
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end header -->
<div class="container mt-5">

    <!-- <div class="row my-5 pt-5 " >
      
    <?php if($subcategory): ?>
      <?php $__empty_1 = true; $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="col-md-2  hello">

        <a href="<?php echo e(url('show/'.$sub->id)); ?>"><p><?php echo e($sub->subcategory); ?></p></a>

      </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
       <?php endif; ?>
        <?php endif; ?>
      
    </div> -->

    <div class="alert alert-success message" id="message" style="display:none" role="alert">
  A simple success alert—check it out!
</div>

    
    <?php if($video && $search=='searched'): ?>

 <div class="row mt-5 pt-5">
 <div class="col-md-12  text-right my-3">
 <button type="button" class="btn btn-primary bardot my-3">Select</button>
 </div>
 	  <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 	   
            <div class="col-md-4 pt-3 searchvideo1">
            <a href="<?php echo e(url('artist-video/'.$vid->id)); ?>">
			  <div class="embed-responsive embed-responsive-16by9">
        <?php if($vid->type=='video'): ?>
				<video width="320" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>" controlsList="nodownload" disablePictureInPicture>
              <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
                  Your browser does not support the video tag.
        </video>
        <?php else: ?>
        <img src="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>" width="100%"/>
        <audio width="320" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>" controlsList="nodownload" disablePictureInPicture>
              <source src="<?php echo e(url('storage/app/public/audio/'.$vid->media)); ?>" type="audio/mp3">
                  Your browser does not support the video tag.
        </audio>
        <?php endif; ?>
            <div class="pricetime">
          <div class="text-left">
          <h6 class="text-white"><?php echo e($vid->price); ?>/PAZ</h6>
          </div>
          <div class="text-right">
          <h6 class="text-white"><?php echo e($vid->duration); ?></h6>
          </div>
          </div>
				</div>
        <h3 class="text-center text-white"> <?php echo e($vid->title); ?></h3>
        </a>
        <!-- <div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div> -->
         <div class="checkall" style="display: none">
         <form>
          <input type="checkbox" class="slct_video"  id="<?php echo e($vid->id); ?>" data-id="<?php echo e($vid->price); ?>">
          </form></div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
 
  <div>
     <!-- <h1>Your specific taste is not served yet</h1>
     <a href="<?php echo e(url('my-requests')); ?>"><button class="btn btn-warning text-white">
     Create Project
     </button></a> -->
  </div> 
  <?php else: ?>
  <!--<h3 class="text-white"> Your search -<span>hello</span> - Did not match any content.<br>-->
  <!-- Please update your search/filter options.</h3>-->
   <h3 class="text-white">Your filter options did not match any content.
Please update your filter options  </h3>
  <br/>
  <div class="popularvideo">
    <h3 class="text-white">Popular Video :</h3>
    <div class="row">
    <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="col-md-4 mb-3 red">
     <?php if($vid->type=='video'): ?>
				<video width="320" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>" controlsList="nodownload" disablePictureInPicture>
              <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
                  Your browser does not support the video tag.
        </video>
        <?php else: ?>
        <audio width="320" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$vid->audio_pic)); ?>" controlsList="nodownload" disablePictureInPicture>
              <source src="<?php echo e(url('storage/app/public/audio/'.$vid->media)); ?>" type="audio/mp3">
                  Your browser does not support the video tag.
        </audio>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>


</div>

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
     
<!--body start>
<body end-->

<!--footer -->
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>

.tooltip {
 opacity:1 !important;
  display: inline-block;
  border-bottom: 1px dotted black;
  right: 12px;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 203px;
    background-color: white;
    color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}
.red{
  border:2px solid golden;
}
.tooltip:hover .tooltiptext {
  visibility: visible;
}
.alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    z-index: 99;
    border-radius: .25rem;
    top: 42px;
}
ul.selected li {
    margin: 10px 0px;
}
.price {
 
 padding: 24px 18px;
}
.price h4 {
    margin: 0;
}
.inner-page {
    float: left;
    width: 100%;
    padding: 10px;
}
.paginations.outer {
    float: left;
    width: 100%;
    padding: 20px 0px;
}
.pagination>li>a, .pagination>li>span {
    width: fit-content;
}
.choose1 {
    background: white;
}
body {
    background: black;
    color: white;
}
input.slct_video {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    appearance: unset;
    z-index: 99999;
}
input.slct_video.selected:after {
    content: "\f14a" !important;
    font-family: 'FontAwesome';
    position: absolute;
    right: 16px;
    top: 12px;
    font-size: 20px;
    color: #007bff;
}
input.slct_video:after {
    content: "\f0c8";
    font-family: 'FontAwesome';
    position: absolute;
    right: 16px;
    top: 12px;
    font-size: 20px;
    color: #007bff;
}

</style>
</html>
<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views//search.blade.php ENDPATH**/ ?>