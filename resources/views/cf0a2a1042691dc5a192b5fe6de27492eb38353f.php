
<div class="container mt-5">
<!--   <div class="card card-block mb-2">
    <h4 class="card-title">Card 1</h4>
    <p class="card-text">Welcom to bootstrap card styles</p>
    <a href="#" class="btn btn-primary">Submit</a>
  </div>   -->
  <!--div class="row">
  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($key=='email' || $key=='nickname'): ?>
    <div class="col-md-3 col-sm-6 item">
      <div class="card item-card card-block">
    <input type="text" name="email" placeholder="E-mail" value="<?php echo e($val); ?>"class="form-control mt-2" >
    <!--input type="nickname" name="nickname" placeholder="Nickname" class="form-control mt-2 mb-3"-->
        <!-- <h5 class="item-card-title mt-3 mb-3">Sierra Web Development • Owner</h5> -->
        <!-- <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p> >
  </div>
    </div> 
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
  </div-->
<a href="<?php echo e(URL::to('logout/profile')); ?>" class="ffff text-white float-right"> Logout</a>
  <?php if(session('success')): ?>
        <div class="alert alert-success">
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
  <?php echo Form::open(['action' => 'AuthController@updateProfile', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
        <h1>USER PROFILE DETAILS</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Email', 'E-Mail Address')); ?> 
                <?php echo e(Form::text('backupemail', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Gender', 'Gender')); ?> 
                 <?php echo e(Form::radio('gender', 'value', true)); ?>Male
                <?php echo e(Form::radio('gender', 'female')); ?>Female
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('ABOUT ME', 'ABOUT ME')); ?> 
                <?php echo e(Form::textarea('aboutme',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])); ?> 
                <?php echo e(Form::file('image',['class'=>'custom-file-input'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Sexology', 'Sexology')); ?> 
                <?php echo e(Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','placeholder' => 'Pick a Sexology'])); ?>

            </div>
            <div class="col-md-6 mt-4" >
            <?php echo e(Form::label('Tits Size', 'Tits Size')); ?> 
                <?php echo e(Form::select('titssize', ['Small' => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null, ['class'=>'form-control','placeholder'  => 'Pick a Tits Size'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Ass', 'Ass')); ?> 
                <?php echo e(Form::select('ass', ['Normal' => 'Normal', 'Small' => 'Small'], null, ['class'=>'form-control','placeholder' => 'Pick a Ass'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Privy part', 'Privy part')); ?> 
                <?php echo e(Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','placeholder' => 'Privy part'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Hair length', 'Hair length')); ?> 
                <?php echo e(Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Length'])); ?>

            </div>
            <div class="col mt-4">
            <?php echo e(Form::label('Hair Color', 'Hair Color')); ?> 
                <?php echo e(Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Color'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Eye Color', 'Eye Color')); ?> 
                <?php echo e(Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' => 'Choose Eye Color'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Height', 'Height')); ?> 
                <?php echo e(Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','placeholder' => 'Choose Height'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Weight', 'Weight')); ?> 
                <?php echo e(Form::select('weight', ['Less than Average' => 'Less than Average', 'Normal' => 'Normal','Above Average'=>'Above Averag'], null, ['class'=>'form-control','placeholder' => 'Choose Weight'])); ?>

            </div>
            <?php echo e(Form::submit('Update!',['class'=>'btn btn-primary'])); ?>

     </div>
  <?php echo e(Form::close()); ?>

  </div>
</div>


<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/profile.blade.php ENDPATH**/ ?>