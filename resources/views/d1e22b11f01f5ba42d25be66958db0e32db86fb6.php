
   <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
   <link rel = "preconnect" href = "https://fonts.gstatic.com" >
   <link
      href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="<?php echo e(asset('design/initial.css')); ?>"/>
   <?php  // include(app_path().'/include/includetop.php')?>
   <!------------ --------------------------Popup on login success
      ----------------------------------------->
   <?php if(session('success')): ?>
   <div
      class="modal fade"
      id="modal-subscribe"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header border-0">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
               <h1 class="text-center text-uppercase comimg1"><?php echo e(session('success')); ?></h1>
            </div>
            <div class="modal-footer">
               .
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <!-- end header -->
   <!--1st slider start-->
   <!--1st slider start-->
   <div class="container">
      <div class="slider_tittle">
         <?php if(!$login): ?>
         <style>
         </style>
         <div class="outer_slider">
            <style>
               header#default_header {
               display: none;
               }
               .header {
               background: black;
               }
               button.btn.btn-primary.btn-lg.form-control.freelog {
               padding: 13px;
               }
               .freelog {
               padding: 13px;
               font-size: 18px;
               }
               .free {
               padding: 13px;
               font-size: 18px;
               }
               .header img {
               display: block;
               margin: 0 auto;
               border: 2px solid gold;
               }
               .container.my-4.row {
               margin: 0 auto;
               }
            </style>
            <div class="header pt-3">
               <img
                  src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>"
                  width="60%"
                  alt="CoolBrand">
               <h3
                  style="font-size: 32px;font-family: 'Allerta Stencil', sans-serif;font-weight: 400; color:white; text-align:center; padding:24px 0px 0px 0px;">
                  THE ART OF PORN IS FINALLY VALUED
               </h3>
              
               </div>
               <div class="container row my-4">
                  <div class="col"></div>
                  <div class="col-md-4 mb-3 pl-5 text-center">
                     <a href="<?php echo e(url('/register')); ?>">
                     <button type="button" class="btn btn-success btn-lg free form-control">Join Free</button>
                     </a>
                  </div>
                  <div class="col-md-4 pr-5 text-center">
                     <a href="<?php echo e(url('/login')); ?>">
                     <button type="button" class="btn btn-primary btn-lg form-control freelog">Login</button>
                     </a>
                  </div>
                  <div class="col"></div>
               </div>
               
                    </div>
               </div>
            </div>
            <div class="row">
            <div class="col-md-12 text-center">
            <h1 class="ml4">
  <span class="letters letters-1">ASMR</span>
  <span class="letters letters-2">Affirmations</span>
  <span class="letters letters-3">Amateur</span>
  <span class="letters letters-4">Anonymous</span>
  <span class="letters letters-5">Appreciation</span>
  <span class="letters letters-6">Kinky</span>
  <span class="letters letters-8">Body fetish</span>
  <span class="letters letters-9">Bondage</span>
  <span class="letters letters-12">Cosplay</span>
  <span class="letters letters-13">Couples</span>
  <span class="letters letters-14">Dressed</span>
  <span class="letters letters-15">Erotic Fiction</span>
  <span class="letters letters-17">Goddess</span>
  <span class="letters letters-19">Hentai</span>
  <span class="letters letters-20">Hidden <br>cam <br> Fantasy</span>
  <span class="letters letters-21">Hypnosis</span>
  <span class="letters letters-22">JOI</span>
  <span class="letters letters-23">Lingerie</span>
  <span class="letters letters-24">Massage</span>
  <span class="letters letters-25">Masturbation</span>
  <span class="letters letters-26">Positive</span>
  <span class="letters letters-27">POV</span>
  <span class="letters letters-28">Public </span>
  <span class="letters letters-29">Role-play</span>
  <span class="letters letters-30">Sounds</span>
  <span class="letters letters-31">Spiritual</span>
  <span class="letters letters-32">Striptease</span>
  <span class="letters letters-33">Submissive</span>
  <span class="letters letters-34">Teen</span>
  <span class="letters letters-35">Toys</span>
 
</h1>
</div>
</div>
            <div class="row">
               <div class="col"></div>
               <div class="col-md-10 mb-3">
                  <video
                     class="hoverVideo"
                     width="100%"
                     muted
                     allowfullscreen="allowfullscreen">
                     <source src="<?php echo e(asset('images/landingpage1.mp4')); ?>" type="video/mp4">
                     Your browser does not support the video tag.
                  </video>
               </div>
               <div class="col"></div>
            </div>





            <div class="container">
               <div class="row px-5">
                    <div class="col-md-6">
                    <p>
                        <button class="btn btn-primary form-control btn-lg" style="background:#8F00FF !important;" type="button" data-toggle="collapse" data-target="#artist" aria-expanded="false" aria-controls="collapseExample">
                        Artist Highlights
                        </button>
                        </p>
                        </div>

                        <div class="col-md-6">

                        <p>
                        <button class="btn btn-primary form-control btn-lg" style="background: #bf0000;" type="button" data-toggle="collapse" data-target="#consumer" aria-expanded="false" aria-controls="collapseExample">
                        Consumer Highlights
                        </button>
                        </p>
                        </div>
                        </div>
                        <div class="container">
                    <div class="col-md-12">
                   
                        <div class="collapse" id="consumer">
                        <div class="row">
                  <div class="col"></div>
                  <div class="col-md-8">
                     <div class="user1 mb-3">
                        <div class="user-head text-center text-white" >
                           <h3>Consumer 
                           </h3>
                        </div>
                        <div class="user-body">
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Free Registration
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Zero monthly fees
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Order Exclusive Content
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Fully Customizable Additional Requests
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Download your Orders
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Access and Stream Videos and Audios from Your Library
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Build  Playlists
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Explore our Advanced Filter Options
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Enjoy Reduced Advertising
                           </p>
                           <div class="reward1">
                              <h2>Get 10% OFF YOUR FIRST TOKEN PURCHASE! LIMITED TIME ONLY!</h2>
                           </div>
                           <div class="col-md-12 text-center  ">
                              <button type="button" class="btn btn-primary btn-lg px-3">
                              <a href="<?php echo e(url('/checkUser/user')); ?>">Join Now
                              </a>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col"></div>
               </div>
                        </div>
                  
                        <div class="collapse" id="artist">
                        <div class="card card-body">
                        <div class="row my-5">
                  <div class="col"></div>
                  <div class="col-md-8">
                     <div class="user1 mb-3">
                        <div class="user-head text-center text-white"style="background:#8F00FF !important;">
                           <h3>Artist</h3>
                        </div>
                        <div class="user-body">
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Quick and Easy Signup Process  
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Publish as many Services as You want
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              You choose how much Your Videos and Audios are worth
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Invite Artists and Consumers gain Bonus Payouts and generate passive Revenue Streams
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Setup your Posts for Social Media on our Dashboard and we will be happy to help you share them on our Channels
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Start with 80% Commission Rate and Push it Higher with every Level You Rise
                           </p>
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>
                              Have a permanent 100% Commission Rate at Level 10
                           </p>
                           <!-- <p> <i class="fa fa-check" style="font-size:24px"></i>Be under the first 10
                              Artists to achieve level 10 and receive a trophy </p> -->
                           <p>
                              <i class="fa fa-check" style="font-size:24px"></i>Share your Ideas with us and vote for upcoming Features
                           </p>
                           <!-- <p> <i class="fa fa-check" style="font-size:24px"></i>Commit now and get
                              promoted for free </p> -->
                           <div class="reward mt-2">
                              <h2>Get rewarded with 100 PAZ Tokens!</h2>
                           </div>
                           <div class="col-md-12 text-center mt-2">
                              <button type="button" class="btn btn-primary btn-lg">
                              <a href="<?php echo e(url('/checkUser/artist')); ?>">Join Now</a>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col"></div>
               </div>
                        </div>
                        </div>
                    </div>





            <div class="slider_tittle">
               <h3 class="tittle">
                  <a href="<?php echo e(url('seeall/artists')); ?>">Artists</a>
               </h3>
               <a href="<?php echo e(url('seeall/artists')); ?>">
               <button class="btn btn-primary seemore" type="button">See All</button>
               </a>
            </div>
            <div class="container-fluid">
               <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
                  <div class="carousel-inner row w-100 mx-auto" role="listbox">
                     <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="carousel-item col-md-4  active">
                        <div class="panel panel-default">
                           <div class="panel-thumbnail">
                              <a href="#" title="image 1" class="thumb">
                                 <div class="card mt-5">
                                    <img class="card-img-top" src="<?php echo e($val->profilepicture ? url('storage/app/public/uploads/'.$val->profilepicture) : 'https://med.gov.bz/wp-content/uploads/2020/08/dummy-profile-pic-300x300.jpg'); ?>" alt=" image cap">
                                    <div class="card-body text-cenxter">
                                       <h3 class="card-title text-center"><?php echo e($val->nickname); ?>  <small style="font-family: 'Poppins';">
                                          <i class="fa fa-star" style="color:red;"></i><?php echo e($val->count); ?> </small>
                                       </h3>
                                       <button class="btn btn-danger  my-3" type="button" onclick="subscribe(<?php echo e($val->id); ?>,true)"> Subscribe</button>
                                       <hr>
                                       <h5 class="text-dark">
                                       About me </h3>
                                       <p class="card-text"><?php echo e($val->aboutme); ?></p>
                                       <div class="row">
                                          <div class="col-6">
                                             <div class="">
                                                <h3><?php echo e($val->offercount); ?> </h3>
                                                <h5 class="text-dark">
                                                Service(s)</h3>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="">
                                                <h3><?php echo e($val->rowcount); ?> </h3>
                                                <h5 class="text-dark">
                                                Collection </h3>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
               
              
            </div>
         </div>
      </div>
      <?php endif; ?>
   </div>
   <!--------------------------------- On login show data
      ------------------------------------->
   <div class="outer_slider">
      <div class="coner my-4">
         <?php if($login && $recently): ?>
         <h3 class="tittle">
            Recently Searched
         </h3>
         <?php endif; ?>
      </div>
      <!--Carousel Wrapper-->
      <?php if($login): ?>
      <div id="recently_search" class="row">
         <?php $__empty_1 = true; $__currentLoopData = $recently; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php if($recnt->type=='video'): ?>
         <div class="col-md-4 hover cl">
         <div class="videotags row">
            <div class="col-4 blue text-left">
           <button class="btn btn-primary btn-sm" type="button">Stream</button>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4 green text-right">
            <button class="btn btn-success btn-sm" type="button">Download</button>
            </div>

         </div>
            <a href="<?php echo e(url('artist-video/'.$recnt->id)); ?>">
               <video
                  class="hoverVideo"
                  poster="<?php echo e(url('storage/app/public/uploads/'.$recnt->audio_pic)); ?>"
                  id="recently_<?php echo e($recnt->id); ?>"
                  width="100%"
                  height="275px"
                  controls="false"
                  allowfullscreen="allowfullscreen"
                  controlsList="nodownload"
                  disablePictureInPicture="disablePictureInPicture">
                  <source
                     src="<?php echo e(url('storage/app/public/video/'.$recnt->media)); ?>"
                     type="video/mp4">
                  Your browser does not support the video tag.
               </video>
               <div class="pricetime">
                  <div class="text-left">
                     <h6 class="text-white"><?php echo e($recnt->price); ?>

                        <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
                     </h6>
                  </div>
                  <div class="text-right">
                     <h6 class="text-white" id="duration_<?php echo e($recnt->id); ?>"><?php echo e($recnt->duration ? $recnt->duration :''); ?></h6>
                     <?php if($recnt->duration==''||$recnt->duration=='NaN:NaN:NaN'): ?>
                     <script>
                        var video1;
                        var id1;
                        setTimeout(() => {
                            video1 = $("#recently_<?php echo e($recnt->id); ?>");
                            console.log(video);
                            seconds_to_min_sec(
                                video[0].duration,
                                "#duration_<?php echo e($recnt->id); ?>",
                                "<?php echo e($recnt->id); ?>"
                            );
                        }, 2000);
                     </script>
                     <?php endif; ?>
                  </div>
               </div>
               <h5><?php echo e($recnt->title); ?></h5>
            </a>
         </div>
         <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <?php endif; ?>
      </div>
   </div>
</div>
</div>
<br/><br/>
<!--End 1st slider-->
<!-- Videos -->
<div>
<div class="outer_slider">
   <div class="container my-4">
      <div class="slider_tittle">
         <h3 class="tittle">
            <a href="<?php echo e(url('seeall/video')); ?>">Videos</a>
         </h3>
         <button class="btn btn-primary seemore" type="button">
         <a href="<?php echo e(url('seeall/video')); ?>">See All</a>
         </button>
      </div>
      <script>
         var video;
         var id;
      </script>
      <div class="row">
         <?php $__empty_1 = true; $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php if($pop->type=='video' && $pop->profile_video!='yes'): ?>
         <div class="col-md-4 hover">
         <div class="videotags row">
            <div class="col-4 blue text-left">
           <h4>Stream</h4>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4 green text-right" style="<?php echo e($pop->is_download==0 ? 'display:none' : 'display:block'); ?>">
            <h4>Download</h4>
            </div>

         </div>
            <a id="anchor_<?php echo e($pop->id); ?>" href="<?php echo e(url('artist-video/'.$pop->id)); ?>">
               <video
                  class="hoverVideo"
                  poster="<?php echo e(url('storage/app/public/uploads/'.$pop->audio_pic)); ?>"
                  id="video_<?php echo e($pop->id); ?>"
                  width="100%"
                  height="275px"
                  controls="false"
                  allowfullscreen="allowfullscreen"
                  controlsList="nodownload"
                  disablePictureInPicture="disablePictureInPicture">
                  <source
                     src="<?php echo e(url('storage/app/public/video/'.$pop->media)); ?>"
                     type="video/mp4">
                  Your browser does not support the video tag.
               </video>
               <div class="pricetime">
                  <div class="text-left">
                     <h6 class="text-white"><?php echo e($pop->price); ?>

                        <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
                     </h6>
                  </div>
                  <div class="text-right">
                     <h6 class="text-white" id="duration_<?php echo e($pop->id); ?>"><?php echo e($pop->duration ? $pop->duration :''); ?></h6>
                     <?php if($pop->duration=='' || $pop->duration=='NaN:NaN:NaN'): ?>
                     <script>
                        var video;
                        var id;
                            setTimeout(() => {
                                 video = $("#video_<?php echo e($pop->id); ?>");
                                 id = $("#video_<?php echo e($pop->id); ?>");
                                 //console.log(video[0].duration);
                                seconds_to_min_sec(
                                    video[0].duration,
                                    "#duration_<?php echo e($pop->id); ?>",
                                    "<?php echo e($pop->id); ?>",
                                    "<?php echo e($pop->id); ?>"
                                );
                        
                            }, 2000);
                     </script>
                     <?php endif; ?>
                  </div>
               </div>
               <h5 class="mt-1"><?php echo e($pop->title); ?></h5>
            </a>
         </div>
         <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <?php endif; ?>
      </div>
   </div>
   <script></script>
   <!--/.Slides-->
</div>
<!--/.Carousel Wrapper-->
<br/><br/>
<!--End 3rd slider-->
<!---------------------------------------------Offer Videos--------------------------------------------->
<div class="outer_slider last">
   <div class="container my-4">
      <div class="slider_tittle">
         <h3 class="tittle">
            <a href="<?php echo e(url('/seeall/offer')); ?>">Services</a>
         </h3>
         <a href="<?php echo e(url('/seeall/offer')); ?>">
         <button class="btn btn-primary seemore" type="button">See All</button>
         </a>
      </div>
      <div class="row">
         <?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php if($offer->type=='video'): ?>
         <div class="col-md-4 showoffer1 mb-3">
            <a href="<?php echo e(url('artistoffers/'.$offer->id)); ?>">
               <div class="card">
                  <video
                     width="100%"
                     height="275px"
                     poster="<?php echo e(url('storage/app/public/uploads/'.$offer->audio_pic)); ?>"
                     controlsList="nodownload"
                     disablePictureInPicture="disablePictureInPicture">
                     <source
                        src="<?php echo e(url('storage/app/public/video/'.$offer->media)); ?>"
                        type="video/mp4">
                     Your browser does not support the video tag.
                  </video>
                  <div class="carad-body">
                     <h4 class="card-title text-center">
                        <?php echo e($offer->title); ?>

                     </h4>
                     <hr class="cardhr">
                     <table class="table table-borderless text-center">
                        <tr>
                           <th>Category</th>
                           <td><?php echo e($offer->category); ?></td>
                        </tr>
                        <tr>
                           <th>Media</th>
                           <td><?php echo e($offer->type=='video'? 'Video/mp4' :'Audio/mp3'); ?></td>
                        </tr>
                        <tr>
                           <th>Price</th>
                           <td>
                              <span style="color:gold;"><?php echo e($offer->price); ?>

                              <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
                              </span>/Minute
                           </td>
                        </tr>
                     </table>
                  </div>
               </div>
            </a>
         </div>
         <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <?php endif; ?>
      </div>
   </div>
</div>
<br/><br/>
<!--------------------------------------------------------------Audio------------------------------------------------->
<div class="outer_slider">
   <div class="container my-4">
      <div class="slider_tittle">
         <h3 class="tittle">
            <a href="<?php echo e(url('/seeall/audio')); ?>">Audios</a>
         </h3>
         <a href="<?php echo e(url('/seeall/audio')); ?>">
         <button class="btn btn-primary seemore" type="button">See All</button>
         </a>
      </div>
      <div class="row">
         <?php $__empty_1 = true; $__currentLoopData = $popularAudios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php if($audio->type=='audio' && $audio->type!='yes'): ?>
         <div class="col-md-4 mb-3 audiohome">
            <a href="<?php echo e(url('artist-video/'.$audio->id)); ?>">
               <img
                  width="100%"
                  src="<?php echo e($audio->audio_pic ? url('storage/app/public/uploads/'.$audio->audio_pic): 'https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg'); ?>">
               <audio
                  controlsList="nodownload"
                  poster="<?php echo e(url('storage/app/public/uploads/'.$audio->audio_pic)); ?>"
                  id="audio_<?php echo e($audio->id); ?>"
                  disablePictureInPicture="disablePictureInPicture">
                  <source
                     src="<?php echo e(url('storage/app/public/audio/'.$audio->media)); ?>"
                     type="audio/mp3">
               </audio>
            </a>
            <div class="pricetime">
               <div class="text-left">
                  <h6 class="text-white"><?php echo e($audio->price); ?>/<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
                  </h6>
               </div>
               <div class="text-right">
                  <h6 class="text-white" id="audio_dur<?php echo e($audio->id); ?>"><?php echo e($audio->duration ? $audio->duration :''); ?></h6>
               </div>
            </div>
         </div>
         <?php if($audio->duration=='' || $audio->duration=='NaN:NaN:NaN'): ?>
         <script>
            var audio;
            var id;
            setTimeout(() => {
                audio = $("#audio_<?php echo e($audio->id); ?>");
                seconds_to_min_sec(
                    audio[0].duration,
                    "#audio_dur<?php echo e($audio->id); ?>",
                    "<?php echo e($audio->id); ?>"
                );
            }, 2000);
         </script>
         <?php endif; ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <?php endif; ?>
      </div>
   </div>
   <!--/.Slides-->
</div>
<div class="outer_slider">
<div class="container my-4">
   <div class="slider_tittle">
      <h3 class="tittle">
         <a href="<?php echo e(url('seeall/artists')); ?>">Artists</a>
      </h3>
      <a href="<?php echo e(url('seeall/artists')); ?>">
      <button class="btn btn-primary seemore" type="button">See All</button>
      </a>
   </div>
   <div class="container-fluid">
      <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
         <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item col-md-4  active">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                     <div class="card mt-5">
                        <a href="<?php echo e(url('artistDetail/'.$val->id)); ?>" title="image 1" class="thumb">
                        <img class="card-img-top" src="<?php echo e($val->profilepicture ? url('storage/app/public/uploads/'.$val->profilepicture) : 'https://med.gov.bz/wp-content/uploads/2020/08/dummy-profile-pic-300x300.jpg'); ?>" alt=" image cap">
                        </a>  
                        <div class="card-body text-center">
                           <h3 class="card-title text-center"><?php echo e($val->nickname); ?>  <small style="font-family: 'Poppins';"><i class="fa fa-star" style="color:red;"></i><?php echo e($val->count); ?> </small></h3>
                           <button class="btn btn-danger  my-3 <?php echo e($isSubscribed && in_array($val->id,$isSubscribed) ? 'hide' : 'block'); ?>" type="button" onclick="subscribe(<?php echo e($val->id); ?>,true)"> Subscribe</button>
                           <button class="btn btn-warning  <?php echo e($isSubscribed && in_array($val->id,$isSubscribed) ? 'block' : 'hide'); ?>" data-toggle="modal" data-target="#Unsubscribe_<?php echo e($val->id); ?>" id="unsubscribe" >Subscribed </button>
                           <hr>
                           <h5 class="text-dark">
                           About me</h3>
                           <p class="card-text"><?php echo e($val->aboutme); ?></p>
                           <div class="row">
                              <div class="col-6">
                                 <div class="">
                                    <h3><?php echo e($val->offercount); ?> </h3>
                                    <h5 class="text-dark">
                                    Service(s)</h3>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="">
                                    <h3><?php echo e($val->rowcount); ?> </h3>
                                    <h5 class="text-dark">
                                    Collection </h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="Unsubscribe_<?php echo e($val->id); ?>" tabindex="-1" aria-labelledby="UnsubscribeLabel" aria-hidden="true">
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
      <!--/.Slides-->
   </div>
</div>
<?php endif; ?>
<!--/.Carousel Wrapper-->
<style>
   .owl-carousel {
   display: block !important;
   }
   .ml4 {
  position: relative;
  font-weight: 900;
  height: 300px;
    color: white !important;
  font-size: 4.5em;
}
.ml4 .letters {
  position: absolute;
  margin: auto;
  left: 0;
  top: 0.3em;
  right: 0;
  opacity: 0; 
}
   .hoverVideo {
    border: 1px solid yellow;
}
   .col-md-4.mb-3 img {
   padding-left: 7px;
   margin-bottom: -23px;
   }
   button.btn.btn-primary.seemore {
   position: absolute;
   margin-top: -43px;
   right: 100px;
   }
   .artist.text-center:hover .overlay {
   opacity: 0.7;
   }
   a.tag {
   text-align: center;
   position: absolute;
   top: 41%;
   right: 0;
   display: none;
   left: 0;
   }
   .artist.text-center:hover a.tag {
   display: block !important;
   }
   .overlay {
   position: absolute;
   top: 0;
   bottom: 0;
   left: 19%;
   height: 125px;
   width: 125px;
   border-radius: 50%;
   background: white;
   opacity: 0;
   }

   .cardhr {
   background: white;
   }
   .col-4.blue.text-left h4 {
    background: gold;
    text-align: center;
    color: black;
    line-height: 16px;
    font-size: 13px;
}

.col-4.green.text-right h4 {
    color: white;
    background: green;
    text-align: center;
    line-height: 16px;
    font-size: 13px;
}
   .artist .profileImage {
   width: 125px;
   height: 125px;
   border-radius: 50%;
   background: #512DA8;
   font-size: 75px;
   color: #fff;
   text-align: center;
   line-height: 116px;
   margin-right: 14px;
   margin-top: 4px;
   }
   .card:hover {
   border: 1px solid gold !important;
   }
   .col-md-4.showoffer1 h5 {
   color: black !important;
   }
   .overlay a {
   text-align: center;
   position: absolute;
   top: 41%;
   left: 44px;
   }
   .card {
   background: black;
   color: white;
   padding: 13px;
   border: 1px solid white;
   }
   h4.card-title.text-center {
   color: white;
   }
   .artist img {
   height: 125px;
   width: 125px;
   border: 1px solid transparent;
   border-radius: 50%;
   }
   h3.tittle a {
   color: white;
   }
   video::-webkit-media-controls {
   display: none !important;
   }
   .hover:hover video {
   border: 2px solid yellow;
   }
   h5 {
   color: #fff;
   }
   .pricetime {
   margin-top: -43px;
   }
   .videotags.row {
    position: absolute;
    top: -22px;
    width: 100%;
    padding: 0px 10px;
}

   @media  only screen and (max-width: 768px) {
   .col-md-4.hover {
   margin-top: 10px;
   text-align: center;
   margin-bottom: 10px;
   }
   .ml4{
      height:300px;
   }
   .col-md-4.showoffer1 {
   margin: 10px auto;
   }
   .artist.text-center {
   margin: 10px auto;
   }
   }
   .reward h2 {
   color: white !important;
   width: 100%;
   background: #00adff;
   color: #fff;
   padding-left: 8px;
   text-align: center;
   line-height: 33px;
   clip-path: polygon(100% 0%, 97% 50%, 100% 100%, 0 100%, 3% 50%, 0 0);
   -ms-transform: rotate(-45deg);
   -webkit-transform: rotate(-45deg);
   transform: rotate(0deg);
   overflow: hidden;
   font-size: 14px;
   font-weight: bold;
   }
   .reward1 h2 {
   color: white !important;
   width: 100%;
   background: #00adff;
   text-align: center; 
   padding-left: 12px;
   line-height: 33px;
   left: -2px;
   clip-path: polygon(100% 0%, 97% 50%, 100% 100%, 0 100%, 3% 50%, 0 0);
   -ms-transform: rotate(-45deg);
   -webkit-transform: rotate(-45deg);
   transform: rotate(0deg);
   overflow: hidden;
   font-size: 14px;
   font-weight: bold;
   }
   .carousel-control-prev {
   left: 0% !important;
   }
   .carousel-control-next {
   right: 0 !important;
   }
   .card-body.text-center button {
   margin: 0 auto;
   }
   @media (min-width: 768px) {
   /* show 3 items */
   .carousel-inner .active,
   .carousel-inner .active + .carousel-item,
   .carousel-inner .active + .carousel-item + .carousel-item,
   .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item  {
   display: block;
   }
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
   .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
   transition: none;
   }
   .carousel-inner .carousel-item-next,
   .carousel-inner .carousel-item-prev {
   position: relative;
   transform: translate3d(0, 0, 0);
   }
   .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
   position: absolute;
   top: 0;
   right: -25%;
   z-index: -1;
   display: block;
   visibility: visible;
   } 
   /* left or forward direction */
   .active.carousel-item-left + .carousel-item-next.carousel-item-left,
   .carousel-item-next.carousel-item-left + .carousel-item,
   .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
   .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
   .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
   position: relative;
   transform: translate3d(-100%, 0, 0);
   visibility: visible;
   }
   /* farthest right hidden item must be abso position for animations */
   .carousel-inner .carousel-item-prev.carousel-item-right {
   position: absolute;
   top: 0;
   left: 0;
   z-index: -1;
   display: block;
   visibility: visible;
   }
   /* right or prev direction */
   .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
   .carousel-item-prev.carousel-item-right + .carousel-item,
   .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
   .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
   .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
   position: relative;
   transform: translate3d(100%, 0, 0);
   visibility: visible;
   display: block;
   visibility: visible;
   }
   }
   /* Bootstrap Lightbox using Modal */
   #profile-grid { overflow: auto; white-space: normal; } 
   #profile-grid .profile { padding-bottom: 40px; }
   #profile-grid .panel { padding: 0 }
   #profile-grid .panel-body { padding: 15px }
   #profile-grid .profile-name { font-weight: bold; }
   #profile-grid .thumbnail {margin-bottom:6px;}
   #profile-grid .panel-thumbnail { overflow: hidden; }
   #profile-grid .img-rounded { border-radius: 4px 4px 0 0;}
   .panel-thumbnail .card {
   background: white;
   }
</style>
<script>
   $('#carouselExample').on('slide.bs.carousel', function (e) {
   
     
   var $e = $(e.relatedTarget);
   var idx = $e.index();
   var itemsPerSlide = 4;
   var totalItems = $('.carousel-item').length;
   
   if (idx >= totalItems-(itemsPerSlide-1)) {
       var it = itemsPerSlide - (totalItems - idx);
       for (var i=0; i<it; i++) {
           // append slides to end
           if (e.direction=="left") {
               $('.carousel-item').eq(i).appendTo('.carousel-inner');
           }
           else {
               $('.carousel-item').eq(0).appendTo('.carousel-inner');
           }
       }
   }
   });
   
   
   $('#carouselExample').carousel({ 
               interval: 2000
       });
   
   
   $(document).ready(function() {
   /* show lightbox when clicking a thumbnail */
   $('a.thumb').click(function(event){
     event.preventDefault();
     var content = $('.modal-body');
     content.empty();
       var title = $(this).attr("title");
       $('.modal-title').html(title);        
       content.html($(this).html());
       $(".modal-profile").modal({show:true});
   });
   
   });
   
   
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script> var ml4 = {};
ml4.opacityIn = [0,1];
ml4.scaleIn = [0.2, 1];
ml4.scaleOut = 3;
ml4.durationIn = 800;
ml4.durationOut = 600;
ml4.delay = 500;

anime.timeline({loop: true})
  .add({
    targets: '.ml4 .letters-1',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-1',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-2',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-2',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-3',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-3',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-4',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-4',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-5',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-5',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-6',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-6',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-8',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-8',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-9',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-9',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-10',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-10',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-12',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-12',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-13',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-13',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-14',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-14',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-15',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-15',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-17',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-17',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-19',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-19',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-20',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-20',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-21',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-21',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-22',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-22',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-23',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-23',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-24',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-24',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-25',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-25',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-26',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-26',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-27',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-27',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-28',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-28',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-29',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-29',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-30',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-30',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-31',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-31',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-32',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-32',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-33',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-33',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-34',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-34',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-35',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-35',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4',
    opacity: 0,
    duration: 500,
    delay: 500
  }); </script> 
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php //include(app_path().'/include/includebottom.php');?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views//initial.blade.php ENDPATH**/ ?>