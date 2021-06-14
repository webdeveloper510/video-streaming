-<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="background1" style="height:100vh">
	 <div class="container ">

	

      <div class="row justify-content-center">

        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg text-white my-5">

        <?php if(session('error')): ?>
        <div class="alert alert-danger" id="error">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
		<?php if(session('success')): ?>
        <div class="alert alert-success" id="error">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>


          
          <h1 class="text-white">Reset Password</h1>
		  <?php echo Form::open(['action' => 'AuthController@passwordReset', 'method' => 'post']); ?>

          <?php echo e(Form::token()); ?>

			  <div class="form-group">
			  <?php echo e(Form::label('New Password', 'New Password')); ?> 
                <?php echo e(Form::password('password',['class'=>'form-control','placeholder'=>'New Password'])); ?>

				<?php if($errors->first('password')): ?>
                 <div class="alert alert-danger">
                <?php echo $errors->first('password'); ?>
              
          </div>  
                <?php endif; ?>
			 </div>
			  <div class="form-group">
			  <?php echo e(Form::label('Confirm New Password', 'Confirm New Password')); ?> 
                <?php echo e(Form::password('confirm',['class'=>'form-control','placeholder'=>'Confirm New Password'])); ?>

				<?php if($errors->first('confirm')): ?>
                 <div class="alert alert-danger">
                <?php echo $errors->first('confirm'); ?>
              
          </div>  
                <?php endif; ?>
			  </div>
			  
			  <?php echo e(Form::submit('Reset!',['class'=>'btn btn-primary'])); ?>

			  <?php echo e(Form::close()); ?>

		</div>
	  </div>
   </div>
</section>




<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/resetPass.blade.php ENDPATH**/ ?>