

<!--?php echo HTML::assets('style.css');?!-->
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="header py-3">
 <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" width="100px" alt="CoolBrand"></a>
 </div>
<section class="background1">
 
    <div class="container pt-5 pb-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg mt-5">
          <div class="row">
            <div class="col text-center">
              <h1 class="text-white">Join as</h1>
        <?php if(session('success')): ?>
        <div class="alert alert-success" id="sucess">
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

        <?php echo e(Form::radio('person', 'users', $checkRadio == 'user' ,['class'=>'user'])); ?> Consumer  

        <?php echo e(Form::radio('person', 'contentprovider',$checkRadio=='artist',['class'=>'user'])); ?> Artist

        <?php if($errors->first('email')): ?>
                <div class="alert alert-danger">
                     <?php echo $errors->first('person'); ?>
                </div>
                <?php endif; ?>


            </div>
          </div>
           <div class="row align-items-center">
            <div class="col mt-4">
            <?php echo e(Form::label('email', 'E-Mail Address')); ?> 
                <?php echo e(Form::email('email1',null,['class'=>'form-control checknameExist','data-id'=>'email','placeholder'=>'example@gmail.com'])); ?>

                <?php if($errors->first('email')): ?>
                <div class="alert alert-danger">
                     <?php echo $errors->first('email'); ?>
                </div>
                <?php endif; ?>
                <div class="alert alert-danger alreadyNickname" id="email" style="display:none">
                </div>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
            <?php echo e(Form::label('Username', 'Username')); ?> 
                <?php echo e(Form::text('nickname',null,['class'=>'form-control checknameExist','data-id'=>'nickname','placeholder'=>'Enter Nickname'])); ?>

                <?php if($errors->first('nickname')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('nickname') ?>
                </div>
                <?php endif; ?>
                <div class="alert alert-danger alreadyNickname" id="nickname" style="display:none">
                </div>
               

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

          <div class="row align-items-center mt-4">
            <div class="col">
            <?php echo e(Form::label('Confirm-Password', 'Confirm-Password')); ?>

                <?php echo e(Form::password('confirm',['class'=>'form-control','placeholder'=>'Confirm-Password'])); ?>

                <?php if($errors->first('confirm')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('confirm') ?>
                </div>
            </div>
          </div>
          <?php endif; ?>

          <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
            
              <label>   <?php echo e(Form::checkbox('terms','value',false,['class'=>'checkbox','placeholder'=>''])); ?> I accept <a class="text-white" style="border-bottom-color: initial;
                border-bottom-style: solid;
                border-bottom-width: 1px; border-color: blue;" href="<?php echo e(url('/terms')); ?>">Terms & Conditions</a>  and <a class="text-white" style="border-bottom-color: initial;
                border-bottom-style: solid;
                border-bottom-width: 1px; border-color: blue;"  href="<?php echo e(url('/privacy')); ?>">Privacy Policy</a> </label> <br>

              <label><?php echo e(Form::checkbox('AgeRestriction','value',false,['class'=>'checkbox','placeholder'=>''])); ?><?php echo e(Form::label('Terms & Condition', 'I am at least 18+ years old')); ?></label><br>
              <span class="discount"> <label> <?php echo e(Form::checkbox('news','value',false,['class'=>'checkbox','placeholder'=>''])); ?>I would like to receive Discounts and News from PAZ</label></span>
                
              </div>

              <?php echo e(Form::submit('Register!',['class'=>'btn btn-primary register'])); ?>

            </div>
          </div>
          <?php echo e(Form::close()); ?>

     
           <p class="mt-2 text-white">Already have an account ?</p>
          <a href="<?php echo e(URL::to('login')); ?>" style="color:blue; font-size: 17px;">Login</a>
         
              
        </div>
      </div>
    </div>
  </section>
<style type="text/css">
  .register{
    border-radius: 28px !important;
  }

  .alert-danger {
    margin-top: 10px;
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
.alert-success {
    margin-top: 10px;
}
</style>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/registration.blade.php ENDPATH**/ ?>