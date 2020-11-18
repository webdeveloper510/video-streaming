<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <title>Coming Soon</title>
  </head>
  <body style=" background:#750108;  color: white;">
    <div class="container">
    <div class="row mt-5 pt-5">
        <div class="col"></div>
        <div class="col-md-8">
            <div class="text-center my-5">
              <img src="<?php echo e(asset('images/logos/Color.png')); ?>" width="300px">
                <h1  style="font-size: 83px;font-family: 'Satisfy', cursive;">We're Coming Soon</h1>
            </div>

            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="alert alert-danger">
              <?php echo e($error); ?>

            </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo Form::open(['action' => 'AuthController@notifyEmail', 'method' => 'post']); ?>

          <?php echo e(Form::token()); ?>

                <div class="form-row">
                    <div class="col"></div>
         
                  <div class="col-sm-7">
                  <?php echo e(Form::label('Email', 'Enter your email here**')); ?> 
                <?php echo e(Form::text('emails', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])); ?>

                  </div>

                  <div class="col-sm-3 mt-2">
                
                      <br>
                       <?php echo e(Form::submit('Notify Me!',['class'=>'form-control btn btn-dark'])); ?>

                  </div>
                  <div class="col"></div>
                </div>
                 <?php echo e(Form::close()); ?>

       
    </div>
    <div class="col"></div>
    </div>
   </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/siteProcess.blade.php ENDPATH**/ ?>