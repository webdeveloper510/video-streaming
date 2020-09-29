
<div class="container mt-5">
<a href="<?php echo e(URL::to('logout/profile')); ?>" class="ffff text-white float-right"> Logout</a>

  <?php echo Form::open(['action' => 'AuthController@updateProfile', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
        <h1>USER PROFILE DETAILS</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Email', 'E-Mail Address')); ?> 
                <?php echo e(Form::text('backupemail', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])); ?>

                 <?php if($errors->first('email')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('email') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Gender', 'Gender')); ?> 
                 <?php echo e(Form::radio('gender', 'value', true)); ?>Male
                <?php echo e(Form::radio('gender', 'female')); ?>Female
                 <?php if($errors->first('gender')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('gender') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('ABOUT ME', 'ABOUT ME')); ?> 
                <?php echo e(Form::textarea('aboutme',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])); ?>

                 <?php if($errors->first('aboutme')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('aboutme') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])); ?> 
                <?php echo e(Form::file('profilepicture',['class'=>'custom-file-input'])); ?>

                 <?php if($errors->first('profilepicture')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('profilepicture') ?>
                </div>
                <?php endif; ?>
                <?php echo e(Form::file('image',['class'=>'custom-file-input'])); ?>

            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Sexology', 'Sexology')); ?> 
                <?php echo e(Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','placeholder' => 'Pick a Sexology'])); ?>

                 <?php if($errors->first('sexology')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('sexology') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4" >
            <?php echo e(Form::label('Tits Size', 'Tits Size')); ?> 
                <?php echo e(Form::select('titssize', ['Small' => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null, ['class'=>'form-control','placeholder'  => 'Pick a Tits Size'])); ?>

                 <?php if($errors->first('titssize')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('titssize') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Ass', 'Ass')); ?> 
                <?php echo e(Form::select('ass', ['Normal' => 'Normal', 'Small' => 'Small'], null, ['class'=>'form-control','placeholder' => 'Pick a Ass'])); ?>

                  <?php if($errors->first('ass')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('ass') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Privy part', 'Privy part')); ?> 
                <?php echo e(Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','placeholder' => 'Privy part'])); ?>

                  <?php if($errors->first('privy')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('privy') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Hair length', 'Hair length')); ?> 
                <?php echo e(Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Length'])); ?>

                     <?php if($errors->first('hairlength')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('hairlength') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col mt-4">
            <?php echo e(Form::label('Hair Color', 'Hair Color')); ?> 
                <?php echo e(Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Color'])); ?>

                     <?php if($errors->first('haircolor')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('haircolor') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Eye Color', 'Eye Color')); ?> 
                <?php echo e(Form::select('color', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' => 'Choose Eye Color'])); ?>

                   <?php if($errors->first('color')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('color') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Height', 'Height')); ?> 
                <?php echo e(Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','placeholder' => 'Choose Height'])); ?>

                   <?php if($errors->first('height')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('height') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-4">
            <?php echo e(Form::label('Weight', 'Weight')); ?> 
                <?php echo e(Form::select('weight', ['Less than Average' => 'Less than Average', 'Normal' => 'Normal','Above Average'=>'Above Averag'], null, ['class'=>'form-control','placeholder' => 'Choose Weight'])); ?>

                   <?php if($errors->first('weight')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('weight') ?>
                </div>
                <?php endif; ?>
            </div>
            <?php echo e(Form::submit('Update!',['class'=>'btn btn-primary'])); ?>

     </div>
  <?php echo e(Form::close()); ?>

  </div>
</div>


<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/profile.blade.php ENDPATH**/ ?>