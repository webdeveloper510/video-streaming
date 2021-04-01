<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('design/artistDetail.css')); ?>" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="coverimg">
          <img src="<?php echo e(isset($details[0]->cover_photo) ? url('storage/app/public/uploads/'.$details[0]->cover_photo) : asset('images/cover-dummy.jpg')); ?>" width="100%" height="500px">
        </div>
        <div class="profileimg">
        <img src="<?php echo e(isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/profile-dummy.png')); ?>" width="200px" height="200px">
        </div>
        <div class="artistdetail11 mb-5">
            <h3><?php echo e(isset($details[0]->nickname) ? $details[0]->nickname: $artist[0]->nickname); ?>  
             <i class="fa fa-star" style="color:red;"></i>  <?php echo e(isset($countSub[0]) ? $countSub[0] : 0); ?>  
             <button class="btn btn-danger text-left <?php echo e($isSubscribed ? 'hide' : 'block'); ?>" id="subscribe" onclick="subscribe(<?php echo e(isset($details[0]->contentProviderid) ? $details[0]->contentProviderid: $artist[0]->id); ?>,true)" >Subscribe </button>
    
             <button class="btn btn-warning text-left <?php echo e($isSubscribed ? 'block' : 'hide'); ?>" data-toggle="modal" data-target="#Unsubscribe" id="unsubscribe" >Subscribed </button>
             </h3>

            <!------------------------------------ Modal  unSubscribe------------------------------->
            <div class="modal fade" id="Unsubscribe" tabindex="-1" aria-labelledby="UnsubscribeLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-body">
                  <h3> Unsubscribe from <?php echo e($details[0]->nickname); ?></h3>
                  <div class="text-center Artistxyz">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                    <button type="button" class="btn btn-primary" onclick="subscribe(<?php echo e(isset($details[0]->contentProviderid) ? $details[0]->contentProviderid: $artist[0]->id); ?>,false)">Unsubscribe</button>
                  </div>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
          <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist" >
    <a class="nav-link tabss " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
    <a class="nav-link tabss" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link tabss active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Collection</a>
    <!-- <a class="nav-link tabss " id="nav-feed-tab" data-toggle="tab" href="#nav-feed" role="tab" aria-controls="nav-feed" aria-selected="false"><i class="fa fa-newspaper-o"> </i> feed</a>
     -->
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">

     <!-- ------------------------------------------Offers videos -------------------------------------------------->

  <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
  
   <h2> Offers</h2>
              
          <div class="container">
                <div class="row mb-5">
                    <?php if($offerData): ?>

                       <?php $__currentLoopData = $offerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12">
                    <div class="artistoffer row">
                      <div class="col-md-2">
                      <video width="100%" class="hoverVideo" height="100%" controls controlsList="nodownload" disablePictureInPicture>
                              <source src="<?php echo e(url('storage/app/public/video/'.$offer->media)); ?>" type="video/mp4">
                              
                              Your browser does not support the video tag.
                        </video>
                        
               <div class="noti" style="<?php echo e($offer->is_seen=='no' ? 'display:block':'display:none'); ?>"></div>
               
                    </div>
       
        <div class="col-md-8 pl-5 showoffer">
        <a target="_blank" href="<?php echo e(url('artistoffers/'.$offer->id)); ?>">
           <h2><?php echo e($offer->title); ?></h2>
               <!-- <p><?php echo e($offer->description); ?></p> -->
                 <?php echo e($details[0]->nickname); ?>

           <br>
         Category :<?php echo e($offer->category); ?>

         </a>
        </div>
       
        <div class="col-md-2">
         <h4><?php echo e($offer->price); ?>PAZ/min</h4>
        </div>
        <hr>
      
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
          <div class="artistoffer1">
            <h4>No Offer available</h4>
          </div>
          <?php endif; ?>
   </div>

    </div>

    <style type="text/css">
    .row hr {
    width: 100%;
}
.text-left.buttons{
    display: inline-flex;
}
.text-left.buttons input {
    width: 300px;
    margin-right: 18px;
}
.text-center.Artistxyz {
    padding: 30px;
}

.noti {
  background: blue;
  height: 10px;
  width: 10px;
  border-radius: 50%;
  position: absolute;
  top: 10px;
  right: 15px;
}
 </style>
</div>


  <!-------------------------------------------------Contant videos ---------------------------------------------------->

  <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">           
  <div class=" col-md-4" style="float:right;z-index: 9999999 !important;"><select class="form-select form-control" id="change_section" aria-label="Default select example">
      <option selected value="all">All</option>
  <option  value="video">Video</option>
  <option value="audio">Audio</option>

  <!-- <option value="playlist">Playlists</option> -->
  
</select>
</div>
  
   

<div class="choosebutton text-right">
<button type="button" class="btn btn-primary bardot">Select</button>
</div>

  <!-- ----------------------------------------------Simples Videos ------------------------------------------------>
<div class="container">
  <div class="filter_div" id="video">

  <h3 class="mt-3">Videos</h3>   
   
          <div class="row mb-5">
               <?php if(isset($details[0]->type)): ?>
                   <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php if($detail->type=='video'): ?> 
            <div class="col-md-4 mb-3 hover">
                <div class='media_div'>
               <div class="checkall" style="display:none">
               <form> 
                  <input type="checkbox" class="slct_video" id="<?php echo e($detail->id); ?>" data-id="<?php echo e($detail->price); ?>">
               </form></div></div>
               <a href="<?php echo e(url('artist-video/'.$detail->id)); ?>">
            <video class="hoverVideo" id="detail_<?php echo e($detail->id); ?>" width="100%"  height="100%"   loop="true" controlsList="nodownload" disablePictureInPicture>
                <source src="<?php echo e(url('storage/app/public/video/'.$detail->media)); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>

            <div class="noti" style="<?php echo e($detail->is_seen==0 ? 'display:block' : 'display:none'); ?>"></div>
                </a>
              
                
          <div class="pricetime">
          <div class="text-left">
          <h6 class="text-white"><?php echo e($detail->price); ?>/<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
          </div>
          <div class="text-right">
          <h6 class="text-white" id="duration1_<?php echo e($detail->id); ?>"><?php echo e($detail->duration ? $detail->duration :''); ?></h6>
          </div>
          </div>
            </div>
                  <?php endif; ?>
                  <?php if($detail->duration==''): ?>
          <script>
           var video;
            var id;
              setTimeout(() => {
              video = $("#detail_"+"<?php echo e($detail->id); ?>");
              seconds_to_min_sec(video[0].duration,"#duration1_"+"<?php echo e($detail->id); ?>","<?php echo e($detail->id); ?>");
            }, 2000);
          </script>
          <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <div class="artistvideo">
                <h4> No video available.</h4>
              </div>
               <?php endif; ?>
          </div>
          </div>
  <!------------------------------------------------------------Audio Section---------------------------------------------------------------------->      
     <div class="filter_div pb-5" id="audio">
  
     <h3>Audios</h3>
     <div class="row mb-5">
      <?php if($audio): ?>
          <?php $__currentLoopData = $audio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-4 mb-3">
          <div class="checkall" style="display:none">
          <form> 
          <input type="checkbox" class="slct_video"></form></div>
            <a href="<?php echo e(url('artist-video/'.$aud->id)); ?>">
            <img src="<?php echo e(asset('images/logos/voice.jpg')); ?>">

        <audio controls controlsList="nodownload" disablePictureInPicture>

        <source src="<?php echo e(url('storage/app/public/audio/'.$aud->media)); ?>" type="audio/mp3">
        Your browser does not support the audio tag.
        </audio>
        <div class="noti" style="<?php echo e($detail->is_seen==0 ? 'display:block' : 'display:none'); ?>"></div>

        </a>


        <div class="pricetime">
                  <div class="text-left">
                  <h6 class="text-white"><?php echo e($aud->price); ?>/<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
                  </div>
                  <div class="text-right">
                  <h6 class="text-white"><?php echo e($aud->duration); ?></h6>
                  </div>
                  </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <div class="artistaudio">
                    <h4> No Audio available.</h4>
                  </div>
        <?php endif; ?>
        </div>
        </div>

  <!-- ---------------------------------------------------Playlists Videos ------------------------------------------------->
  <!-- <div class="filter_div" id="playlist">

         <h3>Playlists</h3>
          <div class="row mb-5 pb-5">
          <?php $__currentLoopData = $playlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $play): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
              $videos = explode(',',$play->videos);
              $count = count($videos);
              //print_r($videos);
            ?>
            <div class="col-md-4 mb-3 play1">
            <a href="<?php echo e(url('playlist/'.$play->id)); ?>">
                <div class="overlayplay1">
                    <h2 class="text-white"><?php echo e($count); ?></h2>
                     <i class="fa fa-play"></i>
                </div>
                </a>
            <video width="100%" class="hoverVideo" height="250" controls controlsList="nodownload" disablePictureInPicture>
                <source src="<?php echo e(url('storage/app/public/video/'.$videos[0])); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>

            
        <h4 class="text-center mb-5"><?php echo e($play->playlistname); ?></h4>
            </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
</div> -->
</div>
            <!-- --------------Long videos -------------------->
      
    </div>

    <!-- <div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-12">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-12">
           <ul class="selected">
            
           </ul>
      </div>
      <div class="col-md-12 price">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
    <div class="col-md-12 pt-3 text-center">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-12 pt-3 text-center">
           <button type="button" class="btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div> -->
  <div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-2">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-2">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
      <div class="col-md-2">
      <ul class="selected">
            
           </ul>
      </div>
    <div class="col-md-3 pt-3">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-3 pt-3">
           <button type="button" class=" btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div>
   <div class="modal" role="dialog" id="exampleModal" >
    </div>
    
    <!-- <div class="tab-pane fade mb-5" id="nav-feed" role="tabpanel" aria-labelledby="nav-feed-tab">
    <p><i class="fa fa-lock"></i> Please subscribe to see the feed. </p>
    </div> -->
  

        <div class="tab-pane fade mb-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
  <!----------------------------------------------- Profile veiw --------------------------------------------->
  
  <div class="container">
      <h2 >Profile</h2>
      <h1>Overview</h1>
      <div class="row">
        <div class="col-md-2 col-sm-2 col-lg-2">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
            <video width="100%" class="hoverVideo" height="100%"  controlsList="nodownload" disablePictureInPicture>
                      <source src="<?php echo e(isset($details[0]->media) ? url('storage/app/public/video/'.$details[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4'); ?>" type="video/mp4">
                      Your browser does not support the video tag.
                  </video>
                  <div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>
          </div>
            <div class="col-md-2 col-sm-2 col-lg-2 mb-3">
            </div>
              <div class="col-md-12 col-sm-12 col-lg-12 text-center mt-5">
                <h1>About Me</h1>
                <hr>
                <p><?php echo e($details[0]->aboutme ? $details[0]->aboutme : $artist[0]->aboutme ? $artist[0]->aboutme : 'Not Any Description'); ?></p>
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
<script>
    var artistid="<?php echo e($artistid); ?>";
    setTimeout(function(){ 
        removeBadge(artistid);
     }, 10000);
</script>
<style>


.fa-lock{
  font-size:30px;
}
.pricetime .text-right h6 {
    background: black;
   
    width: auto;
    float: right;
    color: white !important;
    padding: 10px;
}

.pricetime .text-left h6 {
  padding: 10px;
    color: gold !important;
    font-weight: 800;
    background:black;
}
select.form-select.form-control, select.form-select.form-control * {
    color: #000 !important;
}
.choose1 .row {
   
    color: #000 !important;
}
.hover:hover video {
    border: 2px solid yellow;
}
.coverimg img {
    object-fit: fill;
}
.price {
 
    padding: 24px 18px;
}
.pricetime .text-left {
    float: left;
    padding-left: 10px;
}
.pricetime .text-right {
    margin-top: -41px;
    margin-right: 7px;
}
.tooltip {
 opacity:1 !important;
  display: inline-block;
  border-bottom: 1px dotted black;
  right: 39px;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 203px;
    background-color: white;
    color: #000 !important;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
ul.selected li {
    margin: 10px 0px;
}

.price h4 {
    margin: 0;
}

.choose1 {
    border: 2px solid;
    position: fixed;
    bottom: 10px;
    z-index: 9999999;
    background: white;
    width: 96% !important;
    right: 13px !important;
   
    box-shadow: 0 6px 12px #00000042;
}
.profileimg img {
    position: absolute;
    border: 3px solid white;
    margin-top: -149px;
    border-radius: 50%;
}
.close {
     margin-top: 7px;
}

@media  only screen and (max-width: 768px) {
.coverimg img {
    object-fit: contain;
}
}
</style>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artistDetail.blade.php ENDPATH**/ ?>