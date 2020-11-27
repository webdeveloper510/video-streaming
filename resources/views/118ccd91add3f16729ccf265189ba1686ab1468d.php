<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="background1 ">
      <div class="container">
      <div class="overlay1 text-white">



  <?php if(session('success')): ?>
        <div class="alert alert-success" id="success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?> 
          <?php if(session('error')): ?>
        <div class="alert alert-danger" id="error">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="alert alert-danger">
        <?php echo e($error); ?>

        </div>
      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php echo Form::open(['action' => 'AuthController@providerContent', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
        <h2 class="text-center">Content Upload</h2>
          <div class="row align-items-center text-white">
             <div class="col-md-6 mt-2 ">
            <?php echo e(Form::label('Title', 'Title')); ?> 
                <?php echo e(Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter Title'])); ?>

            </div>
            <div class="col-md-6 mt-2 ">
           <?php echo e(Form::label('Duration', 'Duration')); ?> 
    <div class="row text-white">
      <div class="col-md-4">
        <div class="form-group">
                <?php echo e(Form::text('hour',null,['class'=>'form-control','placeholder'=>'Hour'])); ?>

          </div>
    </div>
       <div class="col-md-4">
           <div class="form-group">
              <?php echo e(Form::text('minutes','',['class'=>'form-control'])); ?>

            </div>
        </div>
           <div class="col-md-4">
             <div class="form-group">
                <?php echo e(Form::text('seconds','',['class'=>'form-control'])); ?>

            </div>
        </div>
            </div>
          </div>
            <div class="col-md-6 mt-2 ">
            <?php echo e(Form::label('Add Price', 'Price')); ?> 
            <?php echo Form::number('price', '' , ['class' => 'form-control','placeholder'=>'Price']); ?>

              
            </div>
            <div class="col-md-6 mt-2 ">
            <?php echo e(Form::label('Keyword', 'Keyword')); ?> 
                <?php echo e(Form::text('keyword', '',['class'=>'form-control','placeholder'=>'Enter Keyword'])); ?>

            </div>
            
            <div class="col-md-6 mt-4 pt-2">
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>

              <div class="col-md-6 mt-4 pt-2">
            <select name="subcategory" id="subCategory" class='form-control'>
                    <option value="">Choose Subcategory</option>
            </select>
            </div>
            <div class="col-md-6 mt-3 text-white">
            <?php echo e(Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label'])); ?> 
                <?php echo e(Form::file('media',['class'=>'custom-file-input'])); ?>

            </div>
            <div class="col-md-6 mt-3">
            <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])); ?>

            </div>
            <div class="col-md-12 text-center pt-3">
            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

     </div>
   </div>
  <?php echo e(Form::close()); ?>

  </div>
</div>
</div>
</section>

 <style>
  section.background1 {
    padding-top: 11%;
  }
  label {
    color: white;
}


.overlay1 {

    margin-top: 0%;
  }
  @media  only screen and (max-width: 767px){
section.background1 {
    height: 151%;
    padding-bottom: 30px;
}
.overlay1 {
    margin-top: 9% !important;
}
.custom-file-label {
    width: 91%;
    }
}
</style>
       
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/personalattentio/public_html/resources/views/artists/provider.blade.php ENDPATH**/ ?>