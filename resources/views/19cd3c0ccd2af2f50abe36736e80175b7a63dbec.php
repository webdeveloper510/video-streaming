<section class="background3">
<div class="container mt-5">
<div class="overlay1 mt-5">
<a href="<?php echo e(URL::to('logout')); ?>" class="ffff text-white float-right"> Logout</a>
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
  <?php echo Form::open(['action' => 'admin@addCategory', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
      <div class="inner_profile text-white">
        <h1 class="text-center">Add Category</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
                <?php echo e(Form::label('Add Category', 'Add Category')); ?> 
                 <?php echo e(Form::text('category', '',['class'=>'form-control','placeholder'=>'Add Category'])); ?>

            </div>
            <div class="col-md-6 mt-5">
            <?php echo e(Form::label('Category Type', 'Category Type')); ?> 
                <?php echo e(Form::select('type', ['audio' => 'Audio', 'video' => 'Video','artist'=>'Artist'], null, ['class'=>'form-control','placeholder' => 'Choose a type'])); ?>

            </div></br>
            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary cat_sub'])); ?>

     </div>
  <?php echo e(Form::close()); ?>


  <table class="table table-bordered text-white">
  <tr>
    <th>Sr. No</th>
    <th>Category Name</th>
    <th>Category Type</th>
    <th>Sub Category</th>
  </tr>
  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td><?php echo e($index); ?></td>
    <td><?php echo e($cat->category); ?></td>
    <td><?php echo e($cat->type); ?></td>
    <td><a href="<?php echo e(url('admin/sub/'.$cat->id)); ?>">Add Sub category</a></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</table>
</div>
  </div>
</div>
</div>
</section>

<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/resources/views/admin/category.blade.php ENDPATH**/ ?>