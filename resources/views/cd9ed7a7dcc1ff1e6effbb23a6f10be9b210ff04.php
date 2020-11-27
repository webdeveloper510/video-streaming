<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php echo Form::open(['action' => 'artist@createOffer', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile ">
        <h1 class="text-center">Create Offer</h1>
          <div class="row align-items-center text-white">
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Title', 'Title')); ?> 
                <?php echo e(Form::text('title', '',['class'=>'form-control','placeholder'=>'Title'])); ?>

                 <?php if($errors->first('title')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('title') ?>
                </div>
                <?php endif; ?>
            </div>
             <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Price(PAZ)', 'Price(PAZ)')); ?> 
                <?php echo e(Form::number('price', '',['class'=>'form-control','placeholder'=>'Price'])); ?>

                 <?php if($errors->first('price')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('price') ?>
                </div>
                <?php endif; ?>
            </div>
              <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Keyword', 'Keywords')); ?> 
           <?php echo e(Form::text('keyword', '',['class'=>'form-control','placeholder'=>'Keywords'])); ?>

                 <?php if($errors->first('keyword')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('keyword') ?>
                </div>
                <?php endif; ?>
            </div>
            
                <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')); ?> 
                <?php echo e(Form::number('delieveryspeed', '',['class'=>'form-control','placeholder'=>'Delievery Speed'])); ?>

                 <?php if($errors->first('delieveryspeed')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('delieveryspeed') ?>
                </div>
                <?php endif; ?>
            </div>

               <div class="col-md-6 ">
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
             <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 40])); ?>

                 <?php if($errors->first('description')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('description') ?>
                </div>
                <?php endif; ?>
            </div>

           
            <div class="col-md-6 mt-5">
                 <?php echo e(Form::label('Audio/Video', 'Audio/Video')); ?> <br>
            <?php echo e(Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label'])); ?> 
                <?php echo e(Form::file('media',['class'=>'custom-file-input','id'=>'file_input'])); ?>

                 <?php if($errors->first('media')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('media') ?>
                </div>
                <?php endif; ?>
                <video width="400" controls>
             <source src="mov_bbb.mp4" id="blah">
             Your browser does not support HTML5 video.
             </video>
            </div>
          
            

              <div class="col-md-12 text-center pt-3">
            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

          </div>
    
     </div>
  <?php echo e(Form::close()); ?>




   <style>
.btn.btn-secondary {
    color: #333333;
    background-color: #eeeeee;
  }
        li.nav-item a {
    color: black !important;
}
a.navbar-brand.text-white {
    color: black !important;
}
</style>
 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artists/offer.blade.php ENDPATH**/ ?>