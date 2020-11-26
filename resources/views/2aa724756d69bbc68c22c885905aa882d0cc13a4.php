
<?php if($viewName=='user'): ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php else: ?>
<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

<?php endif; ?>
		<div class="container mt-5">
			<h2><b>Notification</b></h2>
			<hr>
		<?php $__currentLoopData = $notification1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      
		    <div class="row">
		    	<div class="col-md-2">
		    		<img src="" alt="artist profile pic">
		    	</div>
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

		<?php if($viewName=='user'): ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php else: ?>
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/notification.blade.php ENDPATH**/ ?>