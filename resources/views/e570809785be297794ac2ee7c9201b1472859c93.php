

<!--?php echo HTML::assets('style.css');?!-->
<section>
    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register</h1>
              <?php if(count($errors)>0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert registration alert-danger">
          <?php echo e($error); ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(session('success')): ?>
        <div class="alert alert-danger" id="sucess">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
            </div>
          </div>
          <?php if(session('error')): ?>
        <div class="alert alert-success" id="error">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
          <?php echo Form::open(['action' => 'AuthController@UserRegistration', 'method' => 'post']); ?>

          <?php echo e(Form::token()); ?>

          <div class="row align-items-center">
            <div class="col mt-4">
            <p>  <?php echo e(Form::label('email', 'E-Mail Address')); ?> </p>
                <?php echo e(Form::text('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com'])); ?>

                <?php if($errors->first('email')): ?>
                <div class="alert alert-danger">
                     <?php echo $errors->first('email'); ?>
                </div>
                <?php endif; ?>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
            <p><?php echo e(Form::label('Nickname', 'Nickname')); ?> </p>
                <?php echo e(Form::text('nickname',null,['class'=>'form-control','placeholder'=>'Enter Nickname'])); ?>

                <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('nickname') ?>
                </div>
                <?php endif; ?>

            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
            <p><?php echo e(Form::label('Password', 'Password')); ?> </p>
                <?php echo e(Form::password('password',['class'=>'form-control','placeholder'=>'Password'])); ?>

                <?php if($errors->first('password')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('password') ?>
                </div>
            </div>
          </div>
          <?php endif; ?>
          <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
              <p><?php echo e(Form::label('Terms & Condition', 'Terms & Condition')); ?> <br>
                <?php echo e(Form::checkbox('terms','value',false,['class'=>'checkbox','placeholder'=>''])); ?>

                I agree not to
                        upload content I have no right to</p>
              </div>

              <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

            </div>
          </div>
          <?php echo e(Form::close()); ?>

          <p>Already have an account yet ?</p>
              <a href="<?php echo e(URL::to('login')); ?>" class="ffff text-white"> <i>Login Now</i> </a>
        </div>
      </div>
    </div>
  </section>

<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/registration.blade.php ENDPATH**/ ?>