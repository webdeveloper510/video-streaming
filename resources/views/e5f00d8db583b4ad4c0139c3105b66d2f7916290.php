<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class=" support1">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video Files</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-audio-tab" data-toggle="pill" href="#pills-audio" role="tab" aria-controls="pills-audio" aria-selected="false">Audio Files</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-images-tab" data-toggle="pill" href="#pills-images" role="tab" aria-controls="pills-images" aria-selected="false">Images</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
    <!--------- Open  ticket tab------------------------------------------>
  <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
       
  <div class="container-fluid">
  <div class="row">
 
  <?php $__currentLoopData = $social_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
   <div class="col-md-12">
     <div class="row">
         <div class="col-md-8">
             <div class="delete1">
               
                <h3> <?php echo e($info->nickname); ?></h3>
                <div class="text-right artistname">
                   <button class="btn btn-outline-succes" type="button">Delete</button>
                </div>
             </div>
             <div class="post">
                  <h3>Description for the Post :</h3>
                 
                  <p><?php echo e($info->description); ?></p>
                  <div class="text-right mr-2">
                      <button class="btn btn-outline-primary" type="button">Copy</button>
                  </div>
             </div>
         </div>
         <div class="col-md-4">
              <div class="soc">
                <div class="mp4">
                  <video width="50%" controls>
                  <source src="<?php echo e(url('storage/app/public/video/'.$info->media)); ?>" type="video/mp4">
                             Your browser does not support the video tag.
                  </video>
                  <div class="text-right Delete">
                      <button class="btn btn-outline-primary" type="button">Delete</button>
                  </div>
                </div>
                <hr>
                <div class="accounts">
                      <h3> Social Accounts :</h3>
                      <h5> Instagram <?php echo e($info->username); ?></h5>
                      <br>
                      <h5> Twitter <?php echo e($info->username); ?></h5>
                      <div class="text-right my-3">
                           <button class="btn btn-primary" type="button">Copy</button>
                      </div>
                </div>

              </div>
         </div>
     </div>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

</div>
  <!--------- tickets tab------------------------------------------>

  <div class="tab-pane fade" id="pills-audio" role="tabpanel" aria-labelledby="pills-audio-tab">
  <div class="container-fluid">
  <div class="row">
 
  <?php $__currentLoopData = $social_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
   <div class="col-md-12">
     <div class="row">
         <div class="col-md-8">
             <div class="delete1">
               
                <h3> <?php echo e($info->nickname); ?></h3>
                <div class="text-right artistname">
                   <button class="btn btn-outline-succes" type="button">Delete</button>
                </div>
             </div>
             <div class="post">
                  <h3>Description for the Post :</h3>
                 
                  <p><?php echo e($info->description); ?></p>
                  <div class="text-right mr-2">
                      <button class="btn btn-outline-primary" type="button">Copy</button>
                  </div>
             </div>
         </div>
         <div class="col-md-4">
              <div class="soc">
                <div class="mp4">
                  <audio  width="50%" controls>
                  <source src="<?php echo e(url('storage/app/public/video/'.$info->media)); ?>" type="audio/mp3">
                             Your browser does not support the video tag.
                  </audio >
                  <div class="text-right Delete">
                      <button class="btn btn-outline-primary" type="button">Delete</button>
                  </div>
                </div>
                <hr>
                <div class="accounts">
                      <h3> Social Accounts :</h3>
                      <h5> Instagram <?php echo e($info->username); ?></h5>
                      <br>
                      <h5> Twitter <?php echo e($info->username); ?></h5>
                      <div class="text-right my-3">
                           <button class="btn btn-primary" type="button">Copy</button>
                      </div>
                </div>

              </div>
         </div>
     </div>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

</div>

<div class="tab-pane fade " id="pills-images" role="tabpanel" aria-labelledby="pills-images-tab">
<div class="container-fluid">
  <div class="row">
 
  <?php $__currentLoopData = $social_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
   <div class="col-md-12">
     <div class="row">
         <div class="col-md-8">
             <div class="delete1">
               
                <h3> <?php echo e($info->nickname); ?></h3>
                <div class="text-right artistname">
                   <button class="btn btn-outline-succes" type="button">Delete</button>
                </div>
             </div>
             <div class="post">
                  <h3>Description for the Post :</h3>
                 
                  <p><?php echo e($info->description); ?></p>
                  <div class="text-right mr-2">
                      <button class="btn btn-outline-primary" type="button">Copy</button>
                  </div>
             </div>
         </div>
         <div class="col-md-4">
              <div class="soc">
                <div class="mp4">
                  
                  <img src="<?php echo e(url('storage/app/public/video/'.$info->media)); ?>" class="img-fluid">
                         
                  <div class="text-right Delete">
                      <button class="btn btn-outline-primary" type="button">Delete</button>
                  </div>
                </div>
                <hr>
                <div class="accounts">
                      <h3> Social Accounts :</h3>
                      <h5> Instagram <?php echo e($info->username); ?></h5>
                      <br>
                      <h5> Twitter <?php echo e($info->username); ?></h5>
                      <div class="text-right my-3">
                           <button class="btn btn-primary" type="button">Copy</button>
                      </div>
                </div>

              </div>
         </div>
     </div>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

</div>
 
</div>


</section>



<style>
 section.support1 {
    margin-top: 10px;
}

li.nav-item {
    width: 33.33%;
    text-align: center;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #1d0101;
    background-color: white;
}
ul#pills-tab {
    background: #7b0000;
    color: white !important;
}

li.nav-item a {
    color: white;
}
.text-right.Delete {
    position: absolute;
    right: 25px;
    top: 39px;
}
.text-right.artistname {
    position: absolute;
    right: 21px;
    top: 12px;
}
.delete1 {
  
    border-bottom-color: black;
    border-bottom-style: solid;
    border-bottom-width: 1px;
}

.delete1 h3 {
    padding-top: 13px;
}

.post {
    padding-top: 12px;
}

.post p {
    padding-left: 60px;
}



.col-md-8 {
    border: 1px solid;
    padding: 0px;
}

.col-md-4 {
    border: 1px solid;
    padding: 10px;
}
</style>




<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artists/support1.blade.php ENDPATH**/ ?>