 <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <div class="container">
   <div class="row mb-5 mt-5">
   	<div class="col"></div>
      <div class="col-md-6">
        <div class="successs p-3 text-center">
        	<img src="https://images.vexels.com/media/users/3/157931/isolated/preview/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png" width="300px">
        	<h1>Thank You! </h1>
            <h3> Email Verify Please click Log in </h3>

            <a href="<?php echo e(url('/login')); ?>"><button type="button" class="btn btn-primary">Login</button></a>
        </div>
      </div>
      <div class="col"></div>
   </div>
 </div>

 <style type="text/css">
 	.successs.p-3 {
   
    margin-top: 27px;
}
button.btn.btn-primary:hover {
    background: #0062cc;
}
 </style><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/emailVerifySuccess.blade.php ENDPATH**/ ?>