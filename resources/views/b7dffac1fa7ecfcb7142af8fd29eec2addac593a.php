<!--?php echo HTML::assets('style.css');?!-->
<section>

    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <!-- <h1>Login</h1> -->
            </div>
          </div>
          <h1>Login</h1>
      
       
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



<p><?php echo e(Form::submit('Login!',['class'=>'btn btn-primary'])); ?></p>
<?php echo e(Form::close()); ?>

           
        
<p>Don't have an account yet ?</p>
<a href="<?php echo e(URL::to('register')); ?>" class="ffff text-white"> Signup Now</a>
          <!--form action="" method="post" id="form_data">
          <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

          <div class="row align-items-center">
            <div class="col mt-4 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
              <input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
              <span class="text-danger p-1"><?php echo e($errors->first('email')); ?></span>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
              <input type="password" class="form-control" name="password" placeholder="Password" required="required">
              <span class="text-danger p-1"><?php echo e($errors->first('password')); ?></span>
            </div>  
            
          </div>
          <div class="row justify-content-start mt-4">
            <div class="col">
              

              <button id="submit" class="btn btn-primary mt-4">Submit</button>
              <strong id="msg"></strong>
            </div>
          </div>
          </form-->
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gv0heoa8vyih/public_html/video-streaming/resources/views/login.blade.php ENDPATH**/ ?>