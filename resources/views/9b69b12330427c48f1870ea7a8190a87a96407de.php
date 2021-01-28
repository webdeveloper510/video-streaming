
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
    
    <?php if(!$video->isEmpty()): ?>
 <div class="row mt-5 pt-5">
 <div class="col-md-12">
 <button type="button" class="btn btn-primary bardot mt-3">Select</button>
 </div>
 	  <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 	   <?php if($vid->type=='video'): ?>
            <div class="col-md-4 pt-3 searchvideo1">
            <a href="<?php echo e(url('artist-video/'.$vid->id)); ?>">
			  <div class="embed-responsive embed-responsive-16by9">
				<video width="320" height="240" controls>
              <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
       Your browser does not support the video tag.
            </video>
				</div>
        </a>
         <div class="checkall" style="display: none"><form> <input type="checkbox" class="slct_video"  id="<?php echo e($vid->id); ?>" data-id="<?php echo e($vid->price); ?>"></form></div>
			</div>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php else: ?>
  <div>
     <h1>Your specific taste is not served yet</h1>
     <a href="<?php echo e(url('my-requests')); ?>"><button class="btn btn-warning text-white">
     Create Project
     </button></a>
  </div> 
  <?php endif; ?>
  <br/>
</div> 

<div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-3">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-3">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
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
button.btn.btn-primary.bardot {
    float: right;
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