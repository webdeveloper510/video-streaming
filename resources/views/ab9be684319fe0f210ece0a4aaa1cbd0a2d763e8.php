
<section class="background1">
<div class="container mt-5">

<a href="<?php echo e(URL::to('logout')); ?>" class="ffff text-white float-right"style="margin-top: -32px;"> Logout</a>
  <?php if(session('success')): ?>
        <div class="alert alert-success" id="success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
         
          <?php if(session('error')): ?>
        <div class="alert alert-danger" id="error">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="alert alert-danger">
        <?php echo e($error); ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="overlay1 text-white">
  <?php echo Form::open(['action' => 'admin@addSubCategory', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
        <h1 class="text-center">Add Category</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mb-3 ">
                <?php echo e(Form::label('Sub-Category', 'Sub-Category-Name')); ?> 
                 <?php echo e(Form::text('subcategory', '',['class'=>'form-control','placeholder'=>'Add Category'])); ?>

                 

                 <input type="hidden" name="catid" value="<?php echo e($catId); ?>">

            </div>
            <div class="col-md-6 text-left mt-4 mb-2 pb-2">
                 <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

            </div>
           
     </div>
  <?php echo e(Form::close()); ?>

  </div>


<table class="text-white table-responsibe">
  <tr>
    <th>Sr. No</th>
    <th>Subcategory Name</th>
  </tr>
  <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td><?php echo e($index+1); ?></td>
    <td><?php echo e($sub->subcategory); ?></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</table>
</section>
<style type="text/css">
  .background1{
    height:auto !important;
  }
</style>
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/admin/subcategory.blade.php ENDPATH**/ ?>