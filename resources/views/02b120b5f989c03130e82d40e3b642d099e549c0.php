<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="alert alert-success" id="success" style="display:none">
        </div>
 
           
         
        <div class="alert alert-danger" id="error" style="display:none">
      
        </div>
    
<?php echo Form::open(['id'=>'create_offer','method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile ">
        <h1 class="text-center">Create Offer</h1>
        
          <div class="row align-items-center text-white">
          <div class="col-md-12 mt-5 ">
          
          <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              <i class="fa fa-money"></i>
              Create Offer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="<?php echo e(url('artist/contentUpload')); ?>">Content Upload</a>
        </div>
         

          </li>
          
        </ul>
        </div>
                    <div class="col-md-4 mt-5 ">

            <?php echo e(Form::label('Media Offering', 'Media Offering')); ?> <br>
        <div class="radiobtn">
          <input type="radio" class="select_media_pic" name="type" value="audio" /><p>Audio</p>
          <input type="radio" class="select_media_pic" name="type" value="video"/><p>Video</p>
   
            </div>
            </div>
                <div class="col-md-4 mt-5 ">

                <?php echo e(Form::label('Title', 'Title')); ?> 
                    <?php echo e(Form::text('title', '',['class'=>'form-control','placeholder'=>'Title'])); ?>

                    <?php if($errors->first('title')): ?>
                    <div class="alert alert-danger">
                      <?php echo $errors->first('title') ?>
                    </div>
                    <?php endif; ?>
                </div>
           
                    <div class="col-md-4 mt-5 ">
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
               <div class="col-md-6 mt-5">
             <?php echo e(Form::label('Additional Request', 'Additional Request Price(PAZ)')); ?> 
                <?php echo e(Form::number('additional_price',null,['class'=>'form-control'])); ?>

                 <?php if($errors->first('additional_price')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('additional_price') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5">
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
            <br>
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
           <br>
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <br>
            <label>Offer Status</label>
            <select name="offer_status"  class='form-control'>
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
            <br>
            <label>Sample Audio/Video/Image(Max 30s)</label>
                 <?php echo e(Form::label('Audio/Video', 'Audio/Video')); ?> <br>
            
                <?php echo e(Form::file('media',['class'=>'form-control','id'=>'file_input'])); ?>

                 <?php if($errors->first('media')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('media') ?>
                </div>
                <?php endif; ?>
                <span id="filename" style="color:red;"></span>
               <br>
              <video width="200" id="video_choose" controls style="display:none;">
             <source src="mov_bbb.mp4" id="video">
             Your browser does not support HTML5 video.
             </video>

             <img id="image" src="#" width="50px;" style="display:none;" height="50px;" alt="your image" />
            
               <br>
               
            </div>
              
            <div class="col-md-6 mt-5">
             <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 20, 'cols' => 40])); ?>

                 <?php if($errors->first('description')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('description') ?>
                </div>
                <?php endif; ?>
            </div>
            
           
           
            <div class="row">
            
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span>
                <img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
              <div class="col text-center pt-3">

            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

          </div>
          </div>
     </div>
  <?php echo e(Form::close()); ?>




   <style>
.btn.btn-secondary {
    color: #333333;
    background-color: #eeeeee;
  }
  .mt-5 p {
    font-size: 22px !important;
    padding-right: 18px;
    color: #333333;
}
.radiobtn{
  display:inline-flex;
}

.custom-file-label {
    position: inherit;
}
.modal-dialog {
    background: transparent !important;
}

.modal-content {
    background: transparent;
    box-shadow: none;
}
li.nav-item.dropdown {
    border: 1px solid #9c27b0;
}
.modal-body img {
    width: 26rem;
}
.modal {
    position: fixed;
    top: 50%;
    right: 0;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1050;
    display: none;
    overflow: hidden;
    outline: 0;
}

.loader img {
    background: #ffffff61;
    /* border-radius: 50%; */
}


input.select_media_pic {
    height: 21px;
}
  a#navbarDropdown23 {
    border: 1px solid #7b0000 ;
    color: #7b0000 ;
}
</style>
 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/offer.blade.php ENDPATH**/ ?>