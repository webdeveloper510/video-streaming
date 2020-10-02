
<a href="<?php echo e(URL::to('logout/getLogin')); ?>" class="ffff text-white float-right"> Logout</a>
<div class="container mt-5">


  <?php if(session('success')): ?>
        <div class="alert alert-success" id="success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
            </div>
          </div>
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
  <?php echo Form::open(['action' => 'AuthController@providerContent', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
        <h1>Content Provider Detail</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Email', 'E-Mail Address')); ?> 
                <?php echo e(Form::text('email', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])); ?>

            </div>
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Add Price', 'Audio/Vedio Price')); ?> 
               <?php echo e(Form::number('price')); ?>

            </div>
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Duration', 'Duration')); ?> 
               <?php echo e(Form::text('hour')); ?>

               <?php echo e(Form::text('minutes')); ?>

               <?php echo e(Form::text('seconds')); ?>

            </div>
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Title', 'Title')); ?> 
                <?php echo e(Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter Title'])); ?>

            </div>
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Keyword', 'Keyword')); ?> 
                <?php echo e(Form::text('keyword', '',['class'=>'form-control','placeholder'=>'Enter Keyword'])); ?>

            </div>
            <div class="col-md-6 mt-5">
            <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])); ?> 
                <?php echo e(Form::file('audio',['class'=>'custom-file-input'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <select name="category" class='form-control'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

     </div>
  <?php echo e(Form::close()); ?>

  </div>
</div>


<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/provider.blade.php ENDPATH**/ ?>