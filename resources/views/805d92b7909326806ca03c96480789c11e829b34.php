

<!--?php echo HTML::assets('style.css');?!-->

<section class="background1">
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg text-white mt-5">
          <div class="row">
            <div class="col text-center ">
              <!-- <h1>Login</h1> -->
            </div>
          </div>
          <h1 class="text-white">Login</h1>
      
          <?php if(session('error')): ?>
        <div class="alert alert-danger" id="error">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
       
           <?php echo Form::open(['action' => 'AuthController@postLogin', 'method' => 'post']); ?>

          <div class="form-group">
               <?php echo e(Form::label('E-Mail Address', 'E-Mail Address')); ?> 
                <?php echo e(Form::text('email', '',['class'=>'form-control ','placeholder'=>'example@gmail.com'])); ?>

                <?php if($errors->first('email')): ?>
                <div class="alert alert-danger">
                <?php echo $errors->first('email'); ?>
            
             
          </div>
              <?php endif; ?>
        </div>
          <div class="form-group">
               <?php echo e(Form::label('Password', 'Password')); ?> 
                <?php echo e(Form::password('password',['class'=>'form-control','placeholder'=>'Password'])); ?>

                <?php if($errors->first('password')): ?>
                 <div class="alert alert-danger">
                <?php echo $errors->first('password'); ?>
              
          </div>  
                <?php endif; ?>
          </div>  

            

<!-- if there are login errors, show them here -->
<p>
  
</p>
   <div class="g-recaptcha" data-sitekey="<?php echo '6LdqSt4ZAAAAAEoqklLSyUv6x5siuZ3ynjSIG2mX'; ?>"></div>


            <p><?php echo e(Form::submit('Login!',['class'=>'btn btn-primary'])); ?></p>
            <?php echo e(Form::close()); ?>

           
        
<p class="text-white">Don't have an account yet ?</p>
<a href="<?php echo e(URL::to('register')); ?>" class="ffff text-white"> Signup Now</a>
        </div>
      </div>
    </div>
  </section>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/login.blade.php ENDPATH**/ ?>