

<!--?php echo HTML::assets('style.css');?!-->
<section class="background1">

    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg">
          <div class="row">
            <div class="col text-center">
              <!-- <h1>Login</h1> -->
            </div>
          </div>
          <h1 class="text-white">Content Provider Login</h1>
        <?php if(session('success')): ?>
        <div class="alert alert-danger">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
           <?php echo Form::open(['action' => 'AuthController@contentPostLogin', 'method' => 'post']); ?>

          <div class="form-group">
               <?php echo e(Form::label('email', 'E-Mail Address')); ?> 
                <?php echo e(Form::text('email', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])); ?>

                <?php if($errors->first('email')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('email') ?>
                </div>
                <?php endif; ?>
          </div>
          <div class="form-group">
               <?php echo e(Form::label('Password', 'Password')); ?> 
                <?php echo e(Form::password('password',['class'=>'form-control','placeholder'=>'Password'])); ?>

                <?php if($errors->first('password')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('password') ?>
                </div>
                <?php endif; ?>
          </div>         
            

<!-- if there are login errors, show them here -->
<p>
  
</p>



<p><?php echo e(Form::submit('Login!',['class'=>'btn btn-primary'])); ?></p>
<?php echo e(Form::close()); ?>

<p class="text-white">Don't have an account yet ?</p>
<a href="<?php echo e(URL::to('register')); ?>" class="ffff text-white"> Signup Now</a><br>
<a href="<?php echo e(URL::to('/')); ?>" class="ffff text-white text-right" style="float: right; margin-top: -20px;">Return To Home</a>
          
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/contentLoginform.blade.php ENDPATH**/ ?>