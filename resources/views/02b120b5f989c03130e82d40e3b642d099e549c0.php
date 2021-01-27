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
          <div class="col-md-12 mt-5 ">
          <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              <i class="fa fa-money"></i>
              Content Upload
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="http://localhost/video-streaming/artist/offer">Create Offer</a>
            <a class="dropdown-item" href="http://localhost/video-streaming/artist/my-offer">My Offers</a>
            <a class="dropdown-item" href="http://localhost/video-streaming/artist/contentUpload">Content Upload</a>
        </div>
         

          </li>
          
        </ul>
        </div>
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
            <?php echo e(Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')); ?> 
                <?php echo e(Form::number('delieveryspeed', '',['class'=>'form-control','placeholder'=>'Delievery Speed'])); ?>

                 <?php if($errors->first('delieveryspeed')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('delieveryspeed') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5 ">
            <label>Quality:</label>
            <select name="quality" class="form-control" id="quality">
                    <option value="">Choose ...</option>
                    <option value="480">480p  </option>
                    <option value="720">HD 720p </option>
                    <option value="1080">Full HD 1080p  </option>
            </select>
            <?php if($errors->first('quality')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('quality') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5 ">
            <label>Duration(In Minutes)</label>
            <div class="row">

               <div class="col">
                  
               <label>Min :</label>
               <?php echo e(Form::number('min', '',['class'=>'form-control','placeholder'=>'Min'])); ?>

                 </div>
                     <div class="col">
                   <label>Max :</label>
                   <?php echo e(Form::number('max', '',['class'=>'form-control','min'=>0,'placeholder'=>'Max'])); ?>

                         </div>
                     </div>
            </div>
               <div class="col-md-6 mt-5 pt-4">
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>

         
             
           
            <div class="col-md-6 mt-5">
            <label>Sample Audio/Video/Image(Max 30s)</label>
                 <?php echo e(Form::label('Audio/Video', 'Audio/Video')); ?> <br>
            <?php echo e(Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label'])); ?> 
                <?php echo e(Form::file('media',['class'=>'custom-file-input','id'=>'file_input'])); ?>

                 <?php if($errors->first('media')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('media') ?>
                </div>
                <?php endif; ?>
                </div>

                <div class="col-md-6 mt-2 pt-4">
                <label>Offer Status</label>
            <select name="offer_status"  class='form-control'>
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
            </div>
              
            <div class="col-md-6 mt-5">
             <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 40])); ?>

                 <?php if($errors->first('description')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('description') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5">
             <?php echo e(Form::label('Additional Request', 'Additional Request')); ?> 
                <?php echo e(Form::textarea('additional',null,['class'=>'form-control', 'rows' => 5, 'cols' => 40])); ?>

                 <?php if($errors->first('additional')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('additional') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5">
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

  a#navbarDropdown23 {
    border: 1px solid #7b0000 ;
    color: #7b0000 ;
}
</style>
 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/offer.blade.php ENDPATH**/ ?>