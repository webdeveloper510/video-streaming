
 <section class="background1">

  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="container">
          <div class="overlay1">
      <div class="container profile ">
        <h1 class="text-center">Add Token</h1>
          <div class="row align-items-center text-white">
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('ADD', 'Token')); ?> 

          <?php echo e(Form::text('token', '',['class'=>'form-control token','placeholder'=>'Add Token'])); ?>


                 <?php if($errors->first('token')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('token') ?>
                </div>
                <?php endif; ?>
                 <div class="col-md-12 text-center pt-3">
              <button class="btn btn-primary" type="button" id="checkPrice">Calculate Token Price</button>
             </div>
            </div>
    
             <div class="col-md-12 text-center pt-3" style="display: none;">
            <?php echo e(Form::submit('Pay!',['class'=>'btn btn-primary'])); ?>

             </div>
            

             <div class="col-md-6 mt-5 calculate">

             </div>
    
     </div>
  </div>
</div>

</div>
</section>
<style>

.overlay1 {
    margin-top: 7% !important;
  }

</style><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/addToken.blade.php ENDPATH**/ ?>