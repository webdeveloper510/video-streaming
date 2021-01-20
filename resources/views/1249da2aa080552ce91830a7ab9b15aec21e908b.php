<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="<?php echo e(asset('design/artistDetail.css')); ?>" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="coverimg">
          <img src="<?php echo e(isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/cover-dummy.jpg')); ?>" width="100%" height="300px">
          <div class="iconcamera">
        <i class="fa fa-camera"></i>

        </div>
        </div>
        <div class="profileimg">
        <img src="<?php echo e(isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/profile-dummy.png')); ?>" width="200px" height="200px">
        <div class="iconcamera" >
        <i class="fa fa-camera"></i>

        </div>
        </div>
        <div class="artistdetail11 mb-5">
            <h3><?php echo e(isset($details[0]->nickname) ? $details[0]->nickname: $artist[0]->nickname); ?>  
             <i class="fa fa-star" style="color:red;"></i>  761  
            
             </h3>
        
          
          </div>
          <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link tabss " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
    <a class="nav-link tabss" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link tabss active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Collection</a>
   
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

     <!-- ------------------------------------------Offer videos -------------------------------------------------->

  <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
  
   <h2> Offers</h2>
  
          <div class="container">
   <div class="row mb-5">
    <?php if($offerData): ?>

   <?php $__currentLoopData = $offerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
      <div class="col-md-12">
      <div class="text-right">
         <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light" onclick="edit_offer('<?php echo e(json_encode($offer)); ?>')">Edit</button>
     </div>
      <div class="artistoffer row">
        <div class="col-md-2">
        <video width="100%" height="100%" controls>
                <source src="<?php echo e(url('storage/app/public/video/'.$offer->media)); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>
      </div>
       
        <div class="col-md-8 pl-5 showoffer">
        <a target="_blank" href="<?php echo e(url('artistoffers/'.$offer->id)); ?>">
           <h2><?php echo e($offer->title); ?></h2>
               <p><?php echo e($offer->description); ?></p>
                 <?php echo e($details[0]->nickname); ?>

           <br>
         Categories :<?php echo e($offer->category); ?>

         </a>
        </div>
       
        <div class="col-md-2">
        <h3 class="text-green" style="<?php echo e($offer->offer_status == 'offline' ? 'color: red' : 'color: green'); ?>"><?php echo e(strtoupper($offer->offer_status)); ?></h3>
         <h4><?php echo e($offer->price); ?>/min PAZ</h4>
        </div>
        <hr>
      
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
          <div class="artistoffer1">
            <h4> Artist does not Create any Offer</h4>
          </div>
          <?php endif; ?>
   </div>

    </div>

    <style type="text/css">
        .row hr {
    width: 100%;
  }
 </style>
</div>


  <!-------------------------------------------------Contant videos ---------------------------------------------------->

  <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">           

   <div class="container">
    <div class="row mb-5">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col-md-4 text-right">
            <button type="button" class="btn btn-primary bardot">Choose</button>
      <select class="form-select form-control" aria-label="Default select example">
  <option selected>Video</option>
  <option value="1">Audio</option>

  <option value="2">Playlists</option>
  
</select>
</div>
</div>

  <!-- ----------------------------------------------Simples Videos ------------------------------------------------>

             
  <h3>Videos</h3>  
          <div class="row mb-5">
        <?php if($details): ?>
              <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($detail->type=='video'): ?> 
            <div class="col-md-4 mb-3">
               <div class="checkall" style="display:none">
               <form> 
                  <input type="checkbox" class="slct_video" id="<?php echo e($detail->id); ?>" data-id="<?php echo e($detail->price); ?>">
               </form></div>
               <a href="<?php echo e(url('artist-video/'.$detail->id)); ?>">
            <video width="100%" height="100%" controls>
                <source src="<?php echo e(url('storage/app/public/video/'.$detail->media)); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>
                </a>

            </div>
             <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <div class="artistvideo">
            <h4> Artist does not upload any video</h4>
          </div>
          <?php endif; ?>
          </div>
     <!----------------------------------------------Audio Section------------------------------------------------------------>      
     <h3>Audios</h3>
     <div class="row mb-5">
      <?php if($audio): ?>
          <?php $__currentLoopData = $audio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-4 mb-3">
   <div class="checkall" style="display:none"><form> 
   <input type="checkbox" class="slct_video"></form></div>
     <a href="<?php echo e(url('artist-video/'.$aud->id)); ?>">
    <img src="<?php echo e(asset('images/logos/voice.jpg')); ?>">

<audio controls>

<source src="<?php echo e(url('storage/app/public/audio/'.$aud->media)); ?>" type="audio/mp3">
Your browser does not support the audio tag.
</audio>
</a>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="artistaudio">
            <h4> Artist does not upload any Audio</h4>
          </div>
<?php endif; ?>
</div>

  <!-- ---------------------------------------------------Playlists Videos ------------------------------------------------->
         <h3>Playlists</h3>
          <div class="row mb-5 pb-5">
          <?php $__currentLoopData = $playlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $play): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
              $videos = explode(',',$play->videos);
              $count = count($videos);
              //print_r($videos);
            ?>
            <div class="col-md-4 mb-3 play1">
                <div class="overlayplay1">
            <h2 class="text-white"><?php echo e($count); ?></h2>
                <i class="fa fa-play"></i>
           </div>
    
            <video width="100%" height="250" controls>
                <source src="<?php echo e(url('storage/app/public/video/'.$videos[0])); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>

            
        <h4 class="text-center mb-5"><?php echo e($play->playlistname); ?></h4>
            </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>


            <!-- --------------Long videos -------------------->
      
    </div>

    <div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-3">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-3">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
    <div class="col-md-3 pt-3 text-center">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-3 pt-3 text-center">
           <button type="button" class="btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div>
   <div class="modal" role="dialog" id="exampleModal" >
    </div>
    </div>



        <div class="tab-pane fade mb-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
  <!----------------------------------------------- Profile veiw --------------------------------------------->
  
  <div class="container">
     
      <h1>Overview</h1>
      <div class="row">
        <div class="col-md-2 col-sm-2 col-lg-2">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
            <video width="100%" height="100%" id="get_duration" controls>
                      <source src="<?php echo e(isset($details[0]->media) ? url('storage/app/public/video/'.$details[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4'); ?>" type="video/mp4">
                      Your browser does not support the video tag.
          </video>
           <h4>Duration:</h4>
                  
          </div>
            <div class="col-md-2 col-sm-2 col-lg-2 mb-3">
            </div>
              <div class="col-md-12 col-sm-12 col-lg-12 text-center mt-5">
                <h1>About Me</h1>
                <div class="text-right">
   <button type="button" class="btn btn-light">Edit</button>
              </div>
                <hr>
                <p><?php echo e($details[0]->aboutme ? $details[0]->aboutme : $artist[0]->aboutme); ?></p>
                <hr>
              </div>
  
      </div>
      
      <div class="row text-center text-black">
     
        <?php if(isset($details[0])): ?>
      <?php $__currentLoopData = $details[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php if($key=='gender' || $key=='sexology' || $key=='height' || $key=='privy' || $key=='weight' || $key=='hairlength' ||  $key=='eyecolor' || $key=='haircolor'): ?>
            <div class="col-md-3">
              <label><b><?php echo e(ucwords($key)); ?></b></label>
              <p><?php echo e($profile); ?></p>
            </div>
          <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      </div>
      
        </div>
  
  </div>
  </div>
  
</div>

</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" data-toggle="#myModal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Offer</h4>
                <div class="alert alert-success" role="alert" style="display:none">
                           This is a success alert—check it out!
                </div>
                <div class="alert alert-danger" role="alert" style="display:none">
                    This is a danger alert—check it out!
                </div>
            </div>
            <div class="modal-body">
            <?php echo Form::open([ 'id'=>'edit_form', 'method' => 'post','files'=>true]); ?>

                   <?php echo e(Form::token()); ?>

            <?php echo e(Form::label('Title', 'Title')); ?> 
              <?php echo e(Form::text('title', '',['class'=>'form-control','name'=>'title','id'=>'title','placeholder'=>'Title'])); ?>


            <?php echo e(Form::label('Price(PAZ)', 'Price(PAZ)')); ?> 
                <?php echo e(Form::number('price', '',['class'=>'form-control','name'=>'price','id'=>'price','placeholder'=>'Price'])); ?>


                <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control','name'=>'description','id'=>'description','rows' => 5, 'cols' => 40])); ?>

                <input type="hidden" name="offerid" id="offerid" value="">
                <video width="100" id="video" height="100" controls>
                  <source src="" type="video/mp4">
                </video>
                  <input type="file" name="file" value=""/>
                  <input type="hidden" id="file_url" name="file_url" value=""/>

                <label>Offer Status</label>
            <select name="offer_status"  class='form-control' id="select_status">
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
            <label>Choose Category</label>
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<style>
ul.nav.nav-tabs li {
    width: 20% !important;
}
ul.nav.nav-tabs li a {
    font-size: 15px !important;
    color: white;
}
.nav-tabs .nav-link.active {
    color: #333333;
    border-color: #fafafa !important;
}
.nav-tabs .nav-link.active:hover, .nav-tabs .nav-link.active:focus {
    border-color: #fafafa !important;
}
.nav-link.tabss {
    width: 33.33%;
    text-align: center;
    color: white;
}
.profileimg img {
    position: absolute;
    top: 133px;
    border: 3px solid white;
    border-radius: 50%;
}
.artistdetail11.mb-5 {
    margin-left: 14%;
    padding-top: 11px;
}
.col-md-4.mb-3 img {
    height: 165px;
    padding-left: 7px;
    margin-bottom: -23px;
}
.coverimg .iconcamera i{
 display:none;
}
.nav-tabs {
    border-bottom: 1px solid #fff;
    background: #7b0000;
    border-top: 1px solid #fff;
}
.coverimg:hover .iconcamera i{
    position: absolute;
    right: 15px;
    display:block;
    color: #746a6a;
    margin-top: -30px;
    background: #ffffff99;
    height: 30px;
    width: 80px;
    text-align: center;
    padding: 6px;
}
.profileimg .iconcamera i{
  display:none;
}
button.btn.btn-warning.text-white.mr-3.mt-2 {
    height: 36px !important;
    background-color: #ffbb11 !important;
}
.profileimg:hover .iconcamera i{
  position: absolute;
    top: 21%;
    color: #746a6a;
    display: block;
    background: #ffffff99;
    left: 88px;
    height: 23px;
    text-align: center;
    width: 57px;
    padding: 4px;
}
.col-md-4.mb-3.play1:hover .overlayplay1 {
  opacity: 1;
}

button.btn.btn-light {
    margin-top: -82px;
    margin-right: 17px;
}
.overlayplay1 {
    position: absolute;
    top: 0;
    right: 0px;
    height: 100%;
    background: rgb(245 243 243 / 51%) !important;
    color: #f1f1f1;
    width: 41%;
    opacity: 0;
    z-index: 999999999;
    color: white;
    font-size: 20px;
    padding: 20px;
    text-align: center;
}
.col-md-4.text-right .btn.btn-primary {
    margin-top: -244px;
}


</style>



 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/profile.blade.php ENDPATH**/ ?>