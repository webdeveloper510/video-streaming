
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo e(asset('design/artist.css')); ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
  form.form-inline .form-control {
    width: 60% !important;
    background-color: #ffffff !important;
    color: black !important;
}
      button.btn.btn-primary.my-2.my-sm-0 {
          margin-left: -11px;
      }

      .artist .profileImage {
    width: 125px;
    height: 125px;
    border-radius: 50%;
    background: #512DA8;
    font-size: 75px;
    color: #fff;
    text-align: center;
    line-height: 116px;
    margin-right: 14px;
    margin-top: 4px;
}

    </style>
  </head>
  <body>
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="container">
       <div class="row">
           <div class="col-md-4">
            <div class="form-group mt-4">
               
              <form class="form-inline text-center align-center">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
              </form>
             
              
         </div>
           </div>
           <div class="col-md-4 text-right pt-3 mt-3">
              <span>Short:</span>
           </div>
           <div class="col-md-4 mt-3">
  
            <select class="custom-select form-inline m-2">
             
                 <option selected>Filter</option>
                 <option value="1">By Popular</option>
                 <option value="2">By Alphabetical</option>
                 
               </select>
           </div>
       </div>
       <hr>
       <div class="row mb-5">
    <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="col-md-2">
             
               <div class="artist text-center">
               <?php if($artist->profilepicture): ?>
                <img src="<?php echo e(url('storage/app/public/uploads/'.$artist->profilepicture)); ?>">
                <div class="overlay">
                  <a href="<?php echo e(url('artistDetail/'.$artist->id)); ?>"><?php echo e($artist->nickname); ?></a>
               </div>
               <?php else: ?>
               <a href="<?php echo e(url('artistDetail/'.$artist->id)); ?>">
		    	  <span class="firstName" style="display: none;"><?php echo e($artist->nickname); ?></span>
	           	<div class="profileImage"></div>

               </a>
             
             <?php endif; ?>
               </div>
           </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </div>

    <div class="pagination"><?php echo e($artists->links()); ?></div>

   </div>

  </body>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artists.blade.php ENDPATH**/ ?>