<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="background1 "> 
<?php echo Form::open(['id'=>'create_offer','method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile ">
      <div class="overlay1 ">
            
      <div class="col-md-12 ">
        
          
          <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Publish a Service
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="<?php echo e(url('artist/contentUpload')); ?>">Collection Upload</a>
        </div>
         

          </li>
          
        </ul>
        </div>
        <h2 class="text-center text-white "> Publish a Service </h2>

     
        
          <div class="row align-items-center text-white">
         
                    <div class="col-md-4 mt-5 ">

            <?php echo e(Form::label('Media Offering', 'Media Offering')); ?> <br>
        <div class="radiobtn text-white">
          <input type="radio" class="select_media_pic" name="type" value="audio" /><p class="text-white">Audio</p>
          <input type="radio" class="select_media_pic" name="type" value="video"/><p class="text-white">Video</p>
   
            </div>
            </div>
                <div class="col-md-4 mt-5 ">

                <?php echo e(Form::label('Title', 'Title')); ?> 
                    <?php echo e(Form::text('title', '',['class'=>'form-control title','table'=>'offer','placeholder'=>'Title'])); ?>

                    <?php if($errors->first('title')): ?>
                    <div class="alert alert-danger">
                      <?php echo $errors->first('title') ?>
                    </div>
                    <?php endif; ?>
                    <div class="alert alert-success set1" id="messagediv" style="display:none"></div>

                </div>
           
                    <div class="col-md-4 mt-5 ">
                    <?php echo e(Form::label('Price(PAZ)', 'Price(PAZ/min)')); ?> 
                        <?php echo e(Form::number('price', '',['class'=>'form-control','placeholder'=>'Price','min'=>0])); ?>

                        <?php if($errors->first('price')): ?>
                        <div class="alert alert-danger">
                          <?php echo $errors->first('price') ?>
                        </div>
                        <?php endif; ?>
                    </div>

        
           
            
            <div class="col-md-6 mt-5 ">
            <?php echo e(Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')); ?> 
                <?php echo e(Form::number('delieveryspeed', '',['class'=>'form-control','placeholder'=>'Delievery Speed','min'=>0])); ?>

                 <?php if($errors->first('delieveryspeed')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('delieveryspeed') ?>
                </div>
                <?php endif; ?>
               </div>
               <div class="col-md-6 mt-5">
             <?php echo e(Form::label('Additional Request', 'Additional Request Price(PAZ)')); ?> 
                <?php echo e(Form::number('additional_price',null,['class'=>'form-control', 'min'=>0])); ?>

                 <?php if($errors->first('additional_price')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('additional_price') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mt-5">
            
            <label>Duration(In Minutes)</label>
            <div class="row">

               <div class="col">
                  
               <label>Min :</label>
               <?php echo e(Form::number('min', '',['class'=>'form-control','placeholder'=>'Min','min'=>0])); ?>

                 </div>
                     <div class="col">
                   <label>Max :</label>
                   <?php echo e(Form::number('max', '',['class'=>'form-control','min'=>0,'placeholder'=>'Max','min'=>0])); ?>

                         </div>
                     </div>
           <br>
           <div class="video" style="display:none">
           <label>Category</label>

            <select name="video_cat"  class='form-control video'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($cat->type=='video'): ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
            </select>
            </div>
            <div class="audio" style="display:none">
            <label>Category</label>
            <select name="audio_cat"  class='form-control audio'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($cat->type=='audio'): ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </select>
            </div>
            <br>
            <label>Offer Status</label>
            
            <select name="offer_status"  class='form-control'>
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
            <br>
            <label class="convert">Quality:</label>
            <select name="quality" class="form-control convert" id="quality">
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
            <div class="file" style="display:none">
            <label class="media_label"></label>

 <br>
               <?php echo e(Form::file('media',['class'=>'form-control file_input'])); ?>

               <span id="filename" style="color:yellow;"></span>
                 <?php if($errors->first('media')): ?>
                <div class="alert alert-danger">
                  <?php echo $errors->first('media') ?>
                </div>
                <?php endif; ?>
</div>
                <div class=" mt-3 text-white thumbnail" style="display:none;">
                <label class="thumbnail1"> Image Upload</label>
                <?php echo e(Form::file('thumbnail_pic',['class'=>'form-control chooseImage'])); ?>

                <span id="filename" style="color:yellow;"></span>
            </div>
                
               <br>
               <input type="hidden" class="created_at" name="created_at" value=""/>
               <input type="hidden" class="updated_at" name="updated_at" value=""/>
               
               
              <video width="200"   id="video_choose" controls style="display:none;">
             <source src="mov_bbb.mp4" id="video">
             Your browser does not support HTML5 video.
             </video>

             <img id="image" src="#" width="50px;" style="display:none;" height="50px;" alt="your image" />
            
               <br>
               
            </div>
              
            <div class="col-md-6 mt-5">
             <?php echo e(Form::label('Description', 'Description')); ?> 
            
                <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'maxlength'=>'2000','rows' => 20, 'cols' => 40])); ?>

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
            <div class="alert alert-success" id="success" style="display:none">
        </div>
        <div class="alert alert-danger"  style="display:none">
        </div>
              <div class="col text-center pt-3">

            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

          </div>
          </div>
     </div>
     </div>
  <?php echo e(Form::close()); ?>


</section>

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
.alert.alert-success {
    width: 50%;
    margin-top: 25%;
}

label.error {
    background: red;
    padding: 9px;
    font-size: 16px;
    display: flex;
    color: white;
    text-align: center;
    margin-top: 22px;
    border-radius: 9px;
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
    border: 1px solid #fff;
}
.modal-body img {
    width: 26rem;
}
label {
    color: white;
}
section.background1 {
    margin-top: -16px;
    padding-top: 2%;
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
    border: 1px solid #fff;
    color: #fff ;
}

</style>
 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/offer.blade.php ENDPATH**/ ?>