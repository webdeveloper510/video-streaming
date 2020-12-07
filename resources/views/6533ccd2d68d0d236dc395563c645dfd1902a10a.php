
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>PAZ html</title>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service">
<!-- header -->
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end header -->
<div class="container">
    <div class="row" >
      
    <?php if($subcategory): ?>
      <?php $__empty_1 = true; $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="col-md-2  hello">

        <a href="<?php echo e(url('show/'.$sub->id)); ?>"><p><?php echo e($sub->subcategory); ?></p></a>


      </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
       <?php endif; ?>
        <?php endif; ?>
      




    </div>
    <button type="button" class="btn btn-primary bardot">Select</button>
    <?php if(!$video->isEmpty()): ?>
 <div class="row mt-5 pt-5">
 	  <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 	   <?php if($vid->type=='video'): ?>
            <div class="col-md-4 pt-3">
			  <div class="embed-responsive embed-responsive-16by9">
				<video width="320" height="240" controls>
              <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
       Your browser does not support the video tag.
            </video>
				</div>
			</div>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php else: ?>
  <div>
     <h1>Your specific taste is not served yet</h1>
     <a href="<?php echo e(url('my-requests')); ?>"><button class="btn btn-primary">
       Create Job
     </button></a>
  </div> 
  <?php endif; ?>
  <br/>
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
</style>
</html>
<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views//search.blade.php ENDPATH**/ ?>