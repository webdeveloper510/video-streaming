
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="header py-3">
 <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" width="100px" alt="CoolBrand">
 
 </a></div>
<section class="background1 ">

    <div class="container pt-5 pb-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg text-white mt-5">
          <div class="row">
            <div class="col text-center ">
              <!-- <h1>Login</h1> -->
            </div>
          </div>
          <h1 class="text-white">Login</h1>

          <div class="alert alert-success show_message" style="display:none"></div>
      
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

          <div class="form-group">
              <?php echo e(Form::radio('user', 'contentprovider', true)); ?> Artist

               <?php echo e(Form::radio('user', 'users', false )); ?>  Consumer  
          </div> 

            
<a href="#"  style="float:right; color:blue;" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Forgot Password?
</a>
<!-- if there are login errors, show them here -->
<p>
  
</p>
   <div class="g-recaptcha mb-3" data-sitekey="<?php echo '6LdmFu0ZAAAAAHLtJz0WN-gTc9bstIUt6lhNo2aq'; ?>"></div>
     <?php if(session('captcha')): ?>
                <div class="alert alert-danger">
                <?php echo e(session('captcha')); ?>

            
             
      </div>
          <?php endif; ?>
            <p class="text-white" style="<?php echo e($attempt=='5' ? 'display:block': 'display:none'); ?>"><b>Please Reset Password</b></p>
            <p class="pt-3"><?php echo e(Form::submit('Login!',['class'=>'btn btn-primary','id'=>$attempt, $attempt==5 ? 'disabled' : ''])); ?></p>
            <?php echo e(Form::close()); ?>

           
    <div class="bottom mt-5">
<p class="text-white">Don't have an account yet ?</p>
<a href="<?php echo e(URL::to('register')); ?>" class="ffff ">Join Free</a>
</div>

        </div>
      </div>
    </div>
  </section>
  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <label>Enter Email :</label>
        <input type="email" class="form-control" placeholder="Enter Register Email" id="email" requried/> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close_popup" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="forgetLink">Send Reset Link</button>
      </div>
    </div>
  </div>
</div>
  <style>

    a.ffff {
        color: blue;
    }
    .header_bottom {
        display: none;
   }
.header {
    background: #881114;
}
.header img {
    display: block;
    margin: -8px auto;
}
  </style>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/login.blade.php ENDPATH**/ ?>