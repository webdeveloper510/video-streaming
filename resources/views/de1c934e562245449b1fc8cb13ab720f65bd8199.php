

<!--?php echo HTML::assets('style.css');?!-->
<section class="background1">
  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg mt-5">
          <div class="row">
            <div class="col text-center">
              <h1 class="text-white">Register As</h1>
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

               

        <?php echo e(Form::radio('person', 'user', $checkRadio == 'user' ,['class'=>'user'])); ?> User

        <?php echo e(Form::radio('person', 'artist',$checkRadio=='artist',['class'=>'user'])); ?> Artist
                <?php if($errors->first('email')): ?>
                <div class="alert alert-danger">
                     <?php echo $errors->first('email'); ?>
                </div>
                <?php endif; ?>
            </div>
          </div>
           <div class="row align-items-center">
            <div class="col mt-4">
            <?php echo e(Form::label('email', 'E-Mail Address')); ?> 
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
            <?php echo e(Form::label('Nickname', 'Nickname')); ?> 
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
            <?php echo e(Form::label('Password', 'Password')); ?>

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
              <?php echo e(Form::checkbox('terms','value',false,['class'=>'checkbox','placeholder'=>''])); ?><?php echo e(Form::label('Terms & Condition', 'I accept Terms & Conditions and Privacy Policy')); ?> <br>

               <?php echo e(Form::checkbox('AgeRestriction','value',false,['class'=>'checkbox','placeholder'=>''])); ?><?php echo e(Form::label('Terms & Condition', 'I am at least 18+ years old')); ?>

                
              </div>

              <?php echo e(Form::submit('Register!',['class'=>'btn btn-primary register'])); ?>

            </div>
          </div>
          <?php echo e(Form::close()); ?>

     
           <p class="mt-2 text-white">Already have an account yet ?</p>
          <a href="<?php echo e(URL::to('login')); ?>" style="color:blue; font-size: 17px;">Login</a>
         
              
        </div>
      </div>
    </div>
  </section>
<style type="text/css">
  .register{
    border-radius: 28px !important;
  }
</style>
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/registration.blade.php ENDPATH**/ ?>