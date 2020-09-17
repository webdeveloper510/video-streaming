
<?php if(session('success')): ?>
        <div class="alert css alert-success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
            </div>
          </div>
          <?php if(session('error')): ?>
        <div id="alert alert-success">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="alert alert-danger">
        <?php echo e($error); ?>

        </div>
      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="container">
    <a href="<?php echo e(URL::to('logout/content')); ?>" class="logout text-white float-right"> Logout</a>
        <div class="Dashbaord">
        <?php 
            
            print_r($user->nickname);
        
         ?>
        </div>
    </div>


<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/Dashboard.blade.php ENDPATH**/ ?>