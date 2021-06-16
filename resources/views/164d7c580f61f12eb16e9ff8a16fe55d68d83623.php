<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header>
    <div class="text-center">
        <img
            src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>"
            height="50"
            alt="CoolBrand">
        <h1 class="text-white mt-2">
            PAZ Team Login</h1>
    </div>
</header>
<section class="background1">
    <div class="container pt-5 pb-5">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg text-white mt-5">
       

                <?php if(session('error')): ?>
                <div class="alert alert-danger" id="error">
                    <?php echo e(session('error')); ?>

                </div>
                <?php endif; ?> <?php echo Form::open(['action' => 'AuthController@pazLogin', 'method' =>
                'post' ,'autocomplete'=>'off']); ?>

                <div class="form-group">
      

                <input autocomplete="false" name="hidden" type="text" style="display:none;">


                    <?php echo e(Form::label('Username', 'U&#8204;sername')); ?>


                    <?php echo e(Form::text('data_email_field', '',['class'=>'form-control fields','readonly','spellcheck'=>'false' ,'autocomplete'=>'off'])); ?>

                    <?php if($errors->first('data_email_field')): ?>
                    <div class="alert alert-danger">
                        <?php echo $errors->first('data_email_field'); ?>   

                    </div>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="email" id="email" value/>

                <div class="text-left col-md-5 mb-3" >
                <select class="custom-select"autocomplete="off"  name="pagesUrl" id="inputGroupSelect01">
                    <option selected>Choose Page...</option>
                    <option value="admin">Admin Panel</option>
                    <option value="content">Content Review</option>
                    <option value="social">Social Media</option>
                    <option value="support">Support Team</option>
                    </select>
          </div>
                <div class="form-group">
                    <?php echo e(Form::label('Password', 'P&#8204;assword')); ?>

                    <?php echo e(Form::password('data_password_field',['class'=>'form-control fields','readonly','autocomplete'=>'new-password'])); ?>

                    <?php if($errors->first('data_password_field')): ?>
                    <div class="alert alert-danger">
                        <?php echo $errors->first('data_password_field'); ?>

                    </div>  
                    <?php endif; ?>
                </div>
                <input type="hidden" name="password" id="password" value=""/>

                <!-- if there are login errors, show them here -->
                <p></p>
                <div
                    class="g-recaptcha mb-3"
                    data-sitekey="<?php echo '6LdmFu0ZAAAAAHLtJz0WN-gTc9bstIUt6lhNo2aq'; ?>"></div>
                <?php if(session('captcha')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('captcha')); ?>


                </div>
                <?php endif; ?>

                <p class="pt-3"><?php echo e(Form::submit('Login!',['class'=>'btn btn-primary eventHandle'])); ?></p>
                <?php echo e(Form::close()); ?>


            </div>
        </div>
    </div>
</section>
<!-- Button trigger modal -->

<!-- Modal -->
<div
    class="modal"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                <div class="show_message"></div>
                <button
                    type="button"
                    class="btn-close close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <label>Enter Email :</label>
                <input
                    type="email"
                    class="form-control"
                    placeholder="Enter Register Email"
                    id="email"/>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary close_popup"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="forgetLink">Send Reset Link</button>
            </div>
        </div>
    </div>
</div>
<style>

    a.ffff {
        color: blue;
    }
    header {
        background: #7b0000;
        padding: 11px;
    }
</style>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- JavaScript Bundle with Popper -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous">
    </script>

    <script>

      $('.fields').focus(function(){
          $(this).removeAttr('readonly');
      })

      $(".fields").keyup(function(){
          var name = $(this).attr('name');
          if(name=='data_password_field'){

            $('#password').val($(this).val());


          }

          else{

            $('#email').val($(this).val());

          }
      
});

$('.eventHandle').click(function(){
    $('.fields').val('');
})
    </script>
<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/supportlogin.blade.php ENDPATH**/ ?>