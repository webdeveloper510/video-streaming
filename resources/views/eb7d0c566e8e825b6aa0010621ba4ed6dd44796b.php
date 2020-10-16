
<section class="background2">
<div class="container mt-5">
 <div class="overlay1">
<!--a href="<?php echo e(URL::to('logout')); ?>" class="ffff text-white float-right"> Logout</a-->
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
  <?php echo Form::open(['action' => 'AuthController@contentProvider1', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
        <div class="heading text-center"><h2 class="text-white ">Artist Detail</h2></div>
          <div class="row align-items-center text-white">       
                <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Eye Color', 'Eye Color')); ?> 
                <?php echo e(Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' => 'Choose Eye Color'])); ?>

                  <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('eyecolor') ?>
                </div>
                <?php endif; ?>
            </div>
             <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Gender', 'Gender')); ?> <br>
                 <?php echo e(Form::radio('gender', 'male', true,['class'=>'rad_But'])); ?>Male
                <?php echo e(Form::radio('gender', 'female',false,['class'=>'rad_But'])); ?>Female
                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('gender') ?>
                </div>
                <?php endif; ?>

            </div>
            <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Privy part', 'Privy part')); ?> 
                <?php echo e(Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','placeholder' => 'Privy part'])); ?>

                  <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('privy') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Hair length', 'Hair length')); ?> 
                <?php echo e(Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Length'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('hairlength') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Hair Color', 'Hair Color')); ?> 
                <?php echo e(Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Color'])); ?>

                   <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('haircolor') ?>
                </div>
                <?php endif; ?>
            </div>

               <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Sexology', 'Sexology')); ?> 
                <?php echo e(Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','placeholder' => 'Pick a Sexology'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('sexology') ?>
                </div>
                <?php endif; ?>
            </div>


            <div class="col-md-6 pt-3 hide" >
            <?php echo e(Form::label('Tits Size', 'Tits Size')); ?> 
                <?php echo e(Form::select('titssize', ['Small' => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null, ['class'=>'form-control','placeholder'  => 'Pick a Tits Size'])); ?>

                <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('titssize') ?>
                </div>
                <?php endif; ?>
            </div>
        
            <div class="col-md-6 pt-3 hide">
            <?php echo e(Form::label('Ass', 'Ass')); ?> 
                <?php echo e(Form::select('ass', ['Normal' => 'Normal', 'Small' => 'Small'], null, ['class'=>'form-control','placeholder' => 'Pick a Ass'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('ass') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Height', 'Height')); ?> 
                <?php echo e(Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','placeholder' => 'Choose Height'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('height') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 pt-3">
            <?php echo e(Form::label('Weight', 'Weight')); ?> 
                <?php echo e(Form::select('weight', ['Less than Average' => 'Less than Average', 'Normal' => 'Normal','Above Average'=>'Above Averag'], null, ['class'=>'form-control','placeholder' => 'Choose Weight'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('weight') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-3 pt-4">
                <select name="category" class='form-control'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            
             <div class="col-md-12 pt-3">
            <?php echo e(Form::label('ABOUT ME', 'ABOUT ME')); ?> 
                <?php echo e(Form::textarea('aboutme',null,['class'=>'form-control', 'rows' => 2,'placeholder'=>'About Me','cols' => 40])); ?>

                  <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('aboutme') ?>
                </div>
                <?php endif; ?>
            </div>
             <div class="col-md-6 pt-4 ">
            <?php echo e(Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])); ?> 
                <?php echo e(Form::file('image',['class'=>'custom-file-input'])); ?>

                  <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('image') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 text-center pt-3">
            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

     </div>
  <?php echo e(Form::close()); ?>

            </div>
          </div>
      </div>

       </section>



<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/content.blade.php ENDPATH**/ ?>