
<?php if($viewName=='user'): ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php else: ?>
<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

<?php endif; ?>
		<div class="container">
			<h2><b>Notification</b></h2>
			<hr>
		<?php $__currentLoopData = $notification1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <div class="row">
		    	<?php if($val->profilepicture==''): ?>
		    	<div class="col-md-2 notification">
		    	  <span class="firstName" style="display: none;"><?php echo e($val->nickname); ?></span>
	           	<div class="profileImage"></div>
	          </div>
	          <?php else: ?>
		    	<div class="col-md-2">
		    		<img src="<?php echo e(url('storage/app/public/uploads/'.$val->profilepicture)); ?>" width="100px" height="100px" alt="artist profile pic">
		    	</div>
		    	<?php endif; ?>
		    	<div class="col-md-8">
		    		<h3><?php echo e($val->nickname); ?></h3>
		            <p><?php echo e($val->message); ?></p>
		        </div>
		        <div class="col-md-2">
		         	<p><?php echo e($val->created_at); ?></p>
		        </div>

			</div>
			<hr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</div>
		<style type="text/css">
.notification .profileImage {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #512DA8;
  font-size: 35px;
  color: #fff;
  text-align: center;
  line-height: 100px;
  margin: 20px 0;
}
		</style>

		<?php if($viewName=='user'): ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/notification.blade.php ENDPATH**/ ?>