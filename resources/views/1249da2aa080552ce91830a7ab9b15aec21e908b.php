<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="<?php echo e(asset('design/profile.css')); ?>" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="coverimg">
        <div class="overlayartist text-center">
           <img src=" <?php echo e(asset('images/loaderartist.gif')); ?>" class="img-fluid" style="display:none">
        </div>
           <img src="<?php echo e(isset($details[0]->cover_photo) ? url('storage/app/public/uploads/'.$details[0]->cover_photo) : asset('images/cover-dummy.jpg')); ?>" width="100%" height="500px">
          <div class="iconcamera">
        <i class="fa fa-camera image" data-id="cover_photo"></i>

        </div>
        <div style="display:none">
        <?php echo Form::open(['id'=>'filechange','method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

        <input type="file" class="image_change" name="image" onchange="imageUpdate(this)"/>
        <input type="hidden" id="image_type" name="image_type" value=""/>
        <?php echo e(Form::submit('change!',['class'=>'btn btn-primary mb-4','id'=>'imageChange'])); ?>


        <?php echo e(Form::close()); ?>

        </div>
        </div>
        <div class="profileimg">
        <div class="overlayprofile">
           <img src=" <?php echo e(asset('images/loaderartist.gif')); ?>" style="display:none" width="100px" height="100px" class="img-fluid">
        </div>
        <img src="<?php echo e(isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/profile-dummy.png')); ?>" width="200px" height="200px">
        <div class="iconcamera" >
        <i class="fa fa-camera image" data-id="profilepicture"></i>

        </div>
        
        </div>
        <div class="artistdetail11 mb-5">
            <h3><?php echo e(isset($details[0]->nickname) ? $details[0]->nickname: $artist[0]->nickname); ?>  
             <i class="fa fa-star" style="color:red;"></i>  <?php echo e(isset($getLevel[0]->countsubscriber) ? $getLevel[0]->countsubscriber:0); ?>    
            
             </h3>
        
          
          </div>
          <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link tabss <?php echo e($collection_selection ? 'active' : ''); ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
    <a class="nav-link tabss <?php echo e($collection_selection ? '' : 'active'); ?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link tabss <?php echo e($collection_selection ? 'active' : ''); ?>" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Collection</a>
   
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

     <!-- ------------------------------------------Offer videos -------------------------------------------------->

  <div class="tab-pane fade <?php echo e($collection_selection ? 'show active' : ''); ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
  
   <h2> Offers</h2>
          <div class="container">
   <div class="row mb-5">
    <?php if($offerData): ?>

   <?php $__currentLoopData = $offerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
      <div class="col-md-12">
   
      <div class="artistoffer row">
        <div class="col-md-2 mt-5">
          <?php if($offer->type=='video'): ?>
        <video width="100%"  poster="<?php echo e(url('storage/app/public/uploads/'.$offer->audio_pic)); ?>"   controlsList="nodownload" disablePictureInPicture>
                <source src="<?php echo e(url('storage/app/public/video/'.$offer->media)); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
         </video>
         <?php else: ?>
         <audio width="100%"  poster="<?php echo e(url('storage/app/public/uploads/'.$offer->audio_pic)); ?>"   controlsList="nodownload" disablePictureInPicture>
                <source src="<?php echo e(url('storage/app/public/audio/'.$offer->media)); ?>" type="audio/mp3">
                
                Your browser does not support the video tag.
         </audio>
         <?php endif; ?>

      </div>
       
        <div class="col-md-8 pl-5 showoffer pt-5">
        <a target="_blank" href="<?php echo e(url('artist/offers/'.$offer->id)); ?>">
           <h2><?php echo e($offer->title); ?></h2>
               
                 <?php echo e($details[0]->nickname); ?>

           <br>
         Category :<?php echo e($offer->category); ?>

         </a>
        </div>
       
        <div class="col-md-2 text-center">
        
        <h3 class="text-green" style="<?php echo e($offer->offer_status == 'offline' ? 'color: red' : 'color: green'); ?>"><?php echo e(strtoupper($offer->offer_status)); ?></h3>
         <h4 ><span style="color:gold !important"><?php echo e($offer->price); ?> <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></span>/min </h4>
         
         <div class="text-right mr-3">
      <button class="btn btn-sm btn-light delete" table="offer" data-id="<?php echo e($offer->id); ?>"><i class="fa fa-trash-o"></i></button>
          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-sm" onclick="edit_offer('<?php echo e(json_encode($offer)); ?>')">Edit</button>
           </div>
        </div>
        <hr>

      
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
          <div class="artistoffer1">
            <h4> No Offer available </h4>
            <a href="<?php echo e(url('artist/offer')); ?>">Create Offer</a>
          </div>
          <?php endif; ?>
   </div>

    </div>

    <style type="text/css">
        .row hr {
    width: 100%;
  }
  .overlayartist {
    position: absolute;
    top: 0;
    width: 97%;
}

.overlayartist img {
    margin-top: 16%;
} 
.overlayprofile img {z-index: 2;}
 </style>
</div>


  <!-------------------------------------------------Contant videos ---------------------------------------------------->

  <div class="tab-pane fade <?php echo e($collection_selection ? 'show active' : ''); ?>" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">           

   <div class="container">
    <div class="row mb-5">
        <div class="col"> <h2>Collection</h2></div>
        <div class="col"></div>
        <div class="col-md-4 text-right">
            <!-- <button type="button" class="btn btn-primary bardot">Choose</button> -->
      <select class="form-select form-control mt-3" id="change_section" aria-label="Default select example">
      <option selected value="all">All</option>
  <option  value="video">Video</option>
  <option value="audio">Audio</option>

  <!-- <option value="playlist">Playlists</option>
   -->
</select>
</div>
</div>

  <!-- ----------------------------------------------Simples Videos ------------------------------------------------>
    
       <div class="filter_div" id="video">     
  <h3>Videos</h3>  
          <div class="row mb-5 filter_div" id="video">
        <?php if(isset($details[0]->type)): ?>
              <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($detail->type=='video'): ?> 
            <div class="col-md-4 mb-3 ">
               <div class="checkall" style="display:none">
               <form> 
                  <input type="checkbox" class="slct_video" id="<?php echo e($detail->id); ?>" data-id="<?php echo e($detail->price); ?>">
               </form></div>
               <a href="<?php echo e(url('artistVideo/'.$detail->id)); ?>">
            <video width="100%" class="hover" poster="<?php echo e(url('storage/app/public/uploads/'.$detail->audio_pic)); ?>"  id="collection_<?php echo e($detail->id); ?>"   controlsList="nodownload" disablePictureInPicture>
                <source src="<?php echo e(url('storage/app/public/video/'.$detail->media)); ?>" type="video/mp4">
                
                Your browser does not support the tag.
            </video>
            <div class="pricetime">
                  <div class="text-left">
                  <h6 class="text-white" ><?php echo e($detail->price); ?><b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
                  </div>
                  <div class="text-right">
                  <h6 class="text-white" id="duration1_<?php echo e($detail->id); ?>"><?php echo e($detail->duration ? $detail->duration :''); ?></h6>
                  </div>
                  </div>
            
                </a>
                <div class="edit">
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#media" onclick="editVideoinfo('<?php echo e(json_encode($detail)); ?>')">Edit</button>
               
                <button class="btn btn-sm btn-light delete" table="media" data-id="<?php echo e($detail->id); ?>"><i class="fa fa-trash-o"></i></button>
                </div>
            
               
              </div>
             
              <?php if($detail->duration==''): ?>
          <script>
           var video;
            var id;
              setTimeout(() => {
              video = $("#collection_"+"<?php echo e($detail->id); ?>");
              seconds_to_min_sec(video[0].duration,"#duration1_"+"<?php echo e($detail->id); ?>","<?php echo e($detail->id); ?>");
            }, 2000);
          </script>
          <?php endif; ?>
             <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <div class="artistvideo">
          <h4> No <span class="textcolor"> Video </span> uploaded yet </h4>
            <a href="<?php echo e(url('artist/contentUpload')); ?>"> <span class="textcolor">Upload Video</span></a>
          </div>
          <?php endif; ?>
          </div>
      </div>
     <!----------------------------------------------Audio Section------------------------------------------------------------>      
    <div class="filter_div" id="audio">
     <h3>Audios</h3>
     <div class="row mb-5">
      <?php if(isset($audio[0]->type)): ?>
          <?php $__currentLoopData = $audio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-4 mb-3">
   <div class="checkall" style="display:none"><form> 
   <input type="checkbox" class="slct_video"></form></div>
     <a href="<?php echo e(url('artistVideo/'.$aud->id)); ?>">
    <img src="<?php echo e($aud->audio_pic ?  url('storage/app/public/uploads/'.$aud->audio_pic) : asset('images/logos/voice.jpg')); ?>" width="100%">

<audio controls controlsList="nodownload" id="audio_<?php echo e($aud->id); ?>"   poster="<?php echo e(url('storage/app/public/uploads/'.$aud->audio_pic)); ?>" disablePictureInPicture>

<source src="<?php echo e(url('storage/app/public/audio/'.$aud->media)); ?>" type="audio/mp3">
Your browser does not support the audio tag.
</audio>
<div class="pricetime">
                  <div class="text-left">
                  <h6 class="text-white"><?php echo e($aud->price); ?><b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
                  </div>
                  <div class="text-right">
                  <h6 class="text-white" id="aud_dur_<?php echo e($aud->id); ?>"><?php echo e($aud->duration ? $aud->duration :''); ?></h6>
                  </div>
                  </div>
</a>
<div class="edit">
<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#media">Edit</button>
<button class="btn btn-sm btn-light delete trans1" table="media" data-id="<?php echo e($aud->id); ?>"><i class="fa fa-trash-o"></i></button>
</div>
</div>
<?php if($aud->duration==''): ?>
          <script>
           var video;
            var id;
              setTimeout(() => {
              video = $("#audio_"+"<?php echo e($aud->id); ?>");
              seconds_to_min_sec(video[0].duration,"#aud_dur_"+"<?php echo e($aud->id); ?>","<?php echo e($aud->id); ?>");
            }, 2000);
          </script>
          <?php endif; ?>
   
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="artistaudio">
<h4> No <span class="textcolor">Audio </span> uploaded yet </h4>
            <a href="<?php echo e(url('artist/contentUpload')); ?>"> <span class="textcolor">Upload Audio</span></a>
          </div>
<?php endif; ?>
</div>
</div>

  <!-- ---------------------------------------------------Playlists Videos ------------------------------------------------->
         <!-- <div class="filter_div" id="playlist">
         <h3>Bundles</h3>
          <div class="row mb-5 pb-5 filter_div" id="playlist">
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
    
            <video width="100%" height="250" controls controlsList="nodownload" disablePictureInPicture>
                <source src="<?php echo e(url('storage/app/public/video/'.$videos[0])); ?>" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>

            
        <h4 class="text-center mb-5"><?php echo e($play->playlistname); ?></h4>
            </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

</div> -->
<!-- --------------------------------------------------------Long videos ----------------------------------------------------------->
      
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


        <div class="tab-pane fade mb-5 <?php echo e($collection_selection ? '' : 'show active'); ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
  <!----------------------------------------------- Profile View --------------------------------------------->
  
  <div class="container">
     
      <h2>Overview</h2>
      <div class="text-right">
   <button type="button" class="btn btn-light" data-target="#myModal1" data-toggle="modal" onclick="change_other_info('<?php echo e(json_encode($details[0])); ?>')">Edit</button>
              </div>
      <div class="row">
      
        <div class="col-md-2 col-sm-2 col-lg-2">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
       
          <?php if(isset($random[0]->type)&&$random[0]->type=='video'): ?>
            <video width="100%" height="100%" id="get_duration"  poster="<?php echo e(url('storage/app/public/uploads/'.$random->audio_pic)); ?>" controlsList="nodownload" disablePictureInPicture>
                      <source src="<?php echo e(isset($random[0]->media) ? url('storage/app/public/video/'.$random[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4'); ?>" type="video/mp4">
                      Your browser does not support the video tag.
          </video>
          <?php else: ?>
          <img src="<?php echo e(isset($random[0]->audio_pic) ? url('storage/app/public/uploads/'.$random[0]->audio_pic) : 'https://static.vecteezy.com/system/resources/thumbnails/000/097/181/small/free-black-leather-vector.jpg'); ?>" width="100%;">
          <audio  poster="<?php echo e(url('storage/app/public/uploads/'.$random->audio_pic)); ?>" width="100%" height="100%" id="get_duration"  controlsList="nodownload" disablePictureInPicture>
               <source src="<?php echo e(isset($random[0]->media) ? url('storage/app/public/audio/'.$random[0]->media) :''); ?>" type="audio/mp3">          
          </audio>
          <?php endif; ?>
          
                  
          </div>
            <div class="col-md-2 col-sm-2 col-lg-2 mb-3">
            </div>
              <div class="col-md-12 col-sm-12 col-lg-12 text-center mt-5">
                <h1>About Me</h1>
                
                <hr>
                <p class="edittable"><?php echo e(isset($details[0]->aboutme) ? $details[0]->aboutme : $artist[0]->aboutme); ?></p>
                <hr>
              </div>
  
      </div>
      
      <div class="row text-center text-black">
     
        <?php if(isset($details[0])): ?>
      <?php $__currentLoopData = $details[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php if($key=='gender' || $key=='sexology' || $key=='height' || $key=='privy' || $key=='weight' || $key=='hairlength' ||  $key=='eyecolor' || $key=='haircolor'): ?>
            <div class="col-md-3 col-6">
              <label><b><?php echo e($key=='weight' ? ucwords('body'): ucwords($key)); ?></b></label>
              <p class="edittable"><?php echo e($profile); ?></p>
            </div>
          <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      </div>
      
        </div>
  
  </div>
  </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Offer</h4>
                <button type="button" class="close" data-dismiss="modal" data-toggle="#myModal" aria-hidden="true">&times;</button>
                
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

                  <br>
                   <?php echo e(Form::label('Price(PAZ)', 'Price(PAZ)')); ?> 
                     <?php echo e(Form::number('price', '',['class'=>'form-control','name'=>'price','id'=>'price','min'=>0,'placeholder'=>'Price'])); ?>

                  <br>
                  <?php echo e(Form::label('Additional Request Price', 'Additional Request Price')); ?> 
                <?php echo e(Form::number('additional_price', '',['class'=>'form-control','name'=>'additional_price','id'=>'additional_price','min'=>0,'placeholder'=>'Additional Price'])); ?>

                <br>
                <input type="hidden" class="created_at" name="created_at" value=""/>
               <input type="hidden" class="updated_at" name="updated_at" value=""/>
                  <label>Duration(Minutes):</label>
                  <div class="row">
                  <div class="col-md-6">
                  <?php echo e(Form::label('Min', 'Min')); ?> 
                  <?php echo e(Form::number('min', '',['class'=>'form-control','id'=>'min','min'=>1,'placeholder'=>'Min'])); ?>

                   </div>
                   <div class="col-md-6">
                  <?php echo e(Form::label('Max', 'Max')); ?> 
                  <?php echo e(Form::number('max', '',['class'=>'form-control','id'=>'max','min'=>1,'placeholder'=>'Max'])); ?>

                </div>
                </div>
                <br>
                <?php echo e(Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')); ?> 
                <?php echo e(Form::number('delieveryspeed', '',['class'=>'form-control','id'=>'speed','placeholder'=>'Delievery Speed'])); ?>

                <br>
                  <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control','name'=>'description','id'=>'description','rows' => 5, 'cols' => 40])); ?>

                <br>
                <label>Media Offering</label>
                   <div class="row">
                   
                  <div class="col-md-6">
              <input type="radio" class="select_media_pic" name="type" value="video"/><p>Video</p>
                  </div>
                  <div class="col-md-6">
                  <input type="radio" class="select_media_pic" name="type" value="audio" /><p>Audio</p>
                  </div>
                  </div>
                  <br>
                  <label>Choose Category</label>
                  <div class="video" style="display:none">
                  <select name="video_cat"  class='form-control video'>
                          <option value="">Choose category</option>
                          <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($cat->type=='video'): ?>
                              <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  </div>
                  <br>
                  <div class="audio" style="display:none">
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
                <div class="convert">
                <label for="quality:">quality:</label> 
                  <select name="quality" class="form-control" id="quality">
                            <option value="">Choose ...</option>
                            <option value="480">480p  </option>
                            <option value="720">HD 720p </option>
                            <option value="1080">Full HD 1080p  </option>
                    </select>
                </div>
                <br>
            <label>Offer Status</label>
            
            <select name="offer_status" id="select_status" class='form-control'>
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
                <br>
                <div class="col-md-12 mt-3 text-white thumbnail" style="display:none;">   
                   <label class="thumbnail1"></label>        
                 <?php echo e(Form::file('audio_pic',['class'=>'form-control chooseImage'])); ?>

                <span id="filename" style="color:red;"></span>
            </div>
                <input type="hidden" name="offerid" id="offerid" value="">
                <label class="label12"></label><br>
                  <input type="file" name="file" class="file_input" value=""/>
                  <span id="filename" style="color:red;"></span>
                  
                  <input type="hidden" id="file_url" name="file_url" value=""/>
                  <br>
                 
           
          
            </div>
            <div class="modal-footer">
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
                <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal" data-toggle="#myModal1" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
            <?php echo Form::open([ 'id'=>'edit_profile_info', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

      <div class="container profile">
        <div class="heading text-center"><h2 class="text-dark ">Artist Detail</h2></div>

          <div class="row align-items-center text-white">   
      
           <div class="col-md-12" style="display: flex;">
            <input type="radio" class="select_media_pic" name="radio" value="audio" <?php echo e($random[0]->type=='audio' ? 'checked': ''); ?>/><p class="text-dark">Audio</p>
            <input type="radio" class="select_media_pic" name="radio" value="video" <?php echo e($random[0]->type=='video' ? 'checked': ''); ?>/><p class="text-dark">Video</p>
          </div>   
          <!-- <div class="col-md-12 mt-2 convert">
           <?php echo e(Form::label('quality:', 'quality:')); ?> 
           <select name="convert"  class='form-control'>
                <option value="">Choose ...</option>
               <?php $__currentLoopData = $qualities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option  value="<?php echo e($q->quality); ?>" <?php echo e(($random[0]->convert)==$q->quality ? 'selected' : ''); ?>><?php echo e($q->quality); ?>px </option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div> -->
          <div class="col-md-12 mt-3 text-white file">
            <?php echo e(Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label label12'])); ?>

            <br> 
                <?php echo e(Form::file('media',['class'=>'custom-file-input file_input'])); ?>

                <span id="filename" style="color:#767605;"></span>
            </div>
            <div class="col-md-12 mt-3 text-white thumbnail" style="display:none;">
            <?php echo e(Form::label('', '',['class'=>'custom-file-label thumbnail1'])); ?> 
                <?php echo e(Form::file('audio_pic',['class'=>'custom-file-input chooseImage'])); ?>

                <span id="filename" style="color:#767605;"></span>
            </div>
            <input type="hidden" value="<?php echo e(isset($random[0]->id)); ?>" name="hid"/>
          
            <div class="col-md-12 pt-3">
            <?php echo e(Form::label('Sexology', 'Sexology')); ?> 
                <?php echo e(Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','id'=>'sexology','placeholder' => 'Pick a Sexology'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('sexology') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 pt-3">
            <?php echo e(Form::label('Body', 'Body')); ?> 
                <?php echo e(Form::select('weight', ['Thin' => 'Thin', 'Normal' => 'Normal','Muscular'=>'Muscular','Chubby'=>'Chubby'], null, ['class'=>'form-control','id'=>'weight','placeholder' => 'Choose'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('weight') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 pt-3">
            <?php echo e(Form::label('Height', 'Height')); ?> 
                <?php echo e(Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','id'=>'height','placeholder' => 'Choose Height'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('height') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 pt-3">
            <?php echo e(Form::label('Hair Color', 'Hair Color')); ?> 
                <?php echo e(Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','id'=>'haircolor','placeholder' => 'Choose Hair Color'])); ?>

                   <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('haircolor') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 pt-3">
            <?php echo e(Form::label('Hair length', 'Hair length')); ?> 
                <?php echo e(Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','id'=>'hairlength','placeholder' => 'Choose Hair Length'])); ?>

                 <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('hairlength') ?>
                </div>
                <?php endif; ?>
            </div>
                <div class="col-md-12 pt-3">
            <?php echo e(Form::label('Eye/Lens Color', 'Eye/Lens Color')); ?> 
                <?php echo e(Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','id'=>'eyecolor','placeholder' => 'Choose Eye Color'])); ?>

                  <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('eyecolor') ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 pt-3">
            <?php echo e(Form::label('Privy part', 'Privy part')); ?> 
                <?php echo e(Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','id'=>'privy','placeholder' => 'Privy part'])); ?>

                  <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('privy') ?>
                </div>
                <?php endif; ?>
            </div>
             <div class="col-md-12 pt-3">
            <?php echo e(Form::label('ABOUT ME', 'ABOUT ME')); ?> 
                <?php echo e(Form::textarea('aboutme',null,['id'=>'aboutme','class'=>'form-control', 'rows' => 2,'placeholder'=>'About Me','cols' => 40])); ?>

                  <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('aboutme') ?>
                </div>
                <?php endif; ?>
            </div>
            </div>
            <div class="modal-footer">
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
                <button type="button" class="btn btn-default popup_close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <div class="alert alert-success" role="alert" style="display:none">
                           This is a success alert—check it out!
                </div>
                <div class="alert alert-danger" role="alert" style="display:none">
                    This is a danger alert—check it out!
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="media" tabindex="-1" aria-labelledby="mediaLabel">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Media</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        
                        </div>
                        <?php echo Form::open([ 'id'=>'edit_Video_info', 'method' => 'post', 'files'=>true]); ?>

                          <?php echo e(Form::token()); ?>

                        <div class="modal-body">
                          <div class="row align-items-center text-white">
                          <input type="hidden" value="" name="mediaid" id="mediaid"/>
                          <input type="hidden" value="" name="type" id="type"/>
                          <div class="col-md-6 mt-2 ">
                          <?php echo e(Form::label('Title', 'Title')); ?> 
                              <?php echo e(Form::text('title', '',['class'=>'form-control video_title','placeholder'=>'Enter Title'])); ?>

                          </div>
                      
                          <div class="col-md-6 mt-2 ">
                          <?php echo e(Form::label('Add Price', 'Price')); ?> 
                          <?php echo Form::number('price', '' , ['class' => 'form-control video_price','placeholder'=>'Price','min'=>0]); ?>

                          </div>
                          <div class="col-md-12 mt-2 ">
                                  <div class="convert video" style="display:none">
                                <?php echo e(Form::label('Quality:', 'Quality:')); ?> 
                              <select name="convert"  class='form-control video_quality'>
                                        <option value="">Choose ...</option>
                                        <option value="480">480p  </option>
                                        <option value="720">HD 720p </option>
                                        <option value="1080">Full HD 1080p  </option>
                                </select>
                                </div>
                          <div class="video" style="display:none">
                          <label>Category</label>
                           <select name="category[]"  class='form-control mb-3 video_category'>
                          <option value="">Choose Category</option>
                              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($cat->type=='video'): ?>
                                      <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                                  <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  
                            </select>
                            </div>
                            <div class="audio" style="display:none">
                            <label>Category</label>
                                        <select name="category[]"  class='form-control my-5 video_category'>
                                                <option value="">Choose Category</option>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($cat->type=='audio'): ?>
                                                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              
                                        </select>
                            </div>      
                             <div class="col-md-12 mt-3">
                          <?php echo e(Form::label('Description', 'Description')); ?> 
                              <?php echo e(Form::textarea('description',null,['class'=>'form-control video_description', 'maxlength'=>'2000','rows' => 8, 'cols' => 40])); ?>

                          </div>

            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <div class="alert alert-success" id="success" style="display:none">
    
                           </div>
                        </div>
                        <?php echo e(Form::close()); ?>


                      </div>
                    </div>
                  </div>
<style>

video:hover {
    border: 1px solid gold;
}
.pricetime .text-left {
    float: left;
    padding-left: 10px;
}
.pricetime .text-right {
    margin-top: -41px;
    margin-right: 7px;
}
.pricetime .text-right h6 {
    background: black;
    height: 30px;
    width: 70px;
    float: right;
    color: white !important;
    padding: 7px;
}
.overlayprofile img {
    display: flex;
    margin: -10% 4%;
}
@media  only screen and (max-width: 768px) {
.coverimg img {
    object-fit: contain;
}
.overlayprofile img {
    display: flex;
    margin: -33% 14%;
}
}
.pricetime .text-left h6 {
    background: black;
    padding: 4px;
    font-size: 16px;
    color: gold !important;
}
.pricetime {
    position: relative;
}
.edit {
    position: absolute;
    top: -1px;
    right: 13px;
}
.artistvideo {
    border: 2px dashed red;
    width: 100%;
    padding-top: 15px;
    text-align: center;
    padding-bottom: 10px;
}
.artistaudio {
    border: 2px dashed red;
    width: 100%;
    padding-top: 15px;
    text-align: center;
    padding-bottom: 10px;
}
.artistoffer1 {
    border: 2px dashed red;
    width: 100%;
    text-align: center;
    padding-bottom: 10px;
}
</style>



 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/profile.blade.php ENDPATH**/ ?>