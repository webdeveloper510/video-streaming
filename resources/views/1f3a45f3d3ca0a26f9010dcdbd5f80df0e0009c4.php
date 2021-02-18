  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <section class="background01">



            <div class="container">
          <div class="overlay1">
      <div class="container profile ">
        <h1 class="text-center">Add PAZ Token</h1>
        <div class="Coupon text-center">
          <h2>Get 10% OFF Coupon active</h2>

          </div>
          <div class="row align-items-center text-white">
            <div class="col-md-6 mt-2 ">
            <?php echo e(Form::label('ADD', 'Token')); ?> 

          <?php echo e(Form::text('token', '',['class'=>'form-control token','placeholder'=>'Add Token'])); ?>


                 <?php if($errors->first('token')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('token') ?>
                </div>
                <?php endif; ?>
                 <div class="col-md-12 text-center pt-3">
    <button class="btn btn-primary" style="line-height: 45px; min-width: 224px;" type="button" id="checkPrice">Calculate Token Price</button>
             </div>
            </div>
    
             <div class="col-md-12 text-center pt-3" style="display: none;">
            <?php echo e(Form::submit('Pay!',['class'=>'btn btn-primary'])); ?>

             </div>
            

             <div class="col-md-6  calculate text-center">
                        
             </div>
    
     </div>
  </div>
  <div class="text-white mt-5" id="stripeDiv" style="display: none">
  
     <?php echo $__env->make('stripe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


   </div>
</div>

</section>

<style>

.overlay1 {
    margin-top: 7% !important;
  }
  section.background01 {
    background-image: url(data:image/jpeg;base64,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);
    height: 100vh;
    background-attachment: fixed;
    background-origin: content-box;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.Coupon.text-center h2 {
    background: #7b0000;
    color: white;
    padding: 13px 0px;
    clip-path: polygon(100% 0%, 97% 50%, 100% 100%, 0 100%, 3% 50%, 0 0);
}

</style>


<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/addToken.blade.php ENDPATH**/ ?>