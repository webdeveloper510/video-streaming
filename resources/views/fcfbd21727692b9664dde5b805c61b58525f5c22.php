<?php if(!$login): ?>
            <style>
               @media  only screen and (max-width: 768px){
.artist.text-center .overlay {
    left: 13% !important;
    top: 10px;
}
               }
            </style>
            <div class="outer_slider">

                <style>
                  .header_bottom {
                            display: none;
                        }
                    .header {
                        background: black;
                    }
                    . .j  tfreelog {
                        padding: 13px;
                        font-size: 18px;

                    }
                    .freelog {
                        padding: 13px;
                        font-size: 18px;

                    }
                    .free {
                        padding: 13px;
                        font-size: 18px;

                    }
                    img.card-img-top {
    filter: blur(6px);
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
             <?php endif; ?>


<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<link rel = "preconnect" href = "https://fonts.gstatic.com" > <link
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
                <div class="header py-3">
                    <img
                        src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>"
                        width="60%"
                        alt="CoolBrand">

                        <h3
                            style="font-size: 32px;font-family: 'Allerta Stencil', sans-serif;font-weight: 400; color:white; text-align:center; padding:20px 0px;">
                            THE ART OF PORN IS FINALLY VALUED
                        </h3>
                        <div class="container row my-4">
                            <div class="col-md-6 mb-3 text-center">
                                <a href="<?php echo e(url('/register')); ?>">
                                    <button type="button" class="btn btn-success btn-lg free form-control">Join Free</button>
                                </a>
                            </div>
                            <div class="col-md-6 text-center">
                                <a href="<?php echo e(url('/login')); ?>">
                                    <button type="button" class="btn btn-primary btn-lg form-control freelog">Login</button>
                                </a>
                            </div>
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
                        <div class="slider_tittle">
                            <h3 class="tittle">
                                <a href="<?php echo e(url('seeall/artists')); ?>">Artists</a>
                            </h3>
                            <a href="<?php echo e(url('seeall/artists')); ?>">
                                <button class="btn btn-primary seemore" type="button">See All</button>
                            </a>
                        </div>
                        

                       




                    <div class="slider">
    <div class="slider__wrapper">
    <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slider__item">
        <div style="height: auto;">
        <div class="card mt-5">
            <img class="card-img-top" src="https://med.gov.bz/wp-content/uploads/2020/08/dummy-profile-pic-300x300.jpg" alt=" image cap">
            <div class="card-body text-cenxter">
                                <h3 class="card-title text-center"><?php echo e($val->nickname); ?>  <small style="font-family: 'Poppins';"><i class="fa fa-star" style="color:red;"></i><?php echo e($val->count); ?> </small></h3>
                <button class="btn btn-danger  my-3" type="button"> Subscribe</button>
                <hr>
               <h5 class="text-dark">Description </h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.....</p>
                <div class="row">
                    <div class="col-6">
                           <div class="">
                               <h3><?php echo e($val->offercount); ?> </h3>
                               <h5 class="text-dark">Offer(S)</h3>
                               </div>

                           </div>
                           <div class="col-6">
                           <div class="">
                               <h3><?php echo e($val->rowcount); ?> </h3>
                               <h5 class="text-dark">Collection </h3>
                                 
                           </div>
                    </div>
                </div>
            </div>
            </div>
        
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a class="slider__control slider__control_left" href="#" role="button"></a>
    <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
  </div>

  

					
  </div>
                    </div>
                  





                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="user1 mb-3">
                                <div class="user-head text-center text-white">
                                    <h3>Artist</h3>
                                </div>
                                <div class="user-body">

                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Easy and fast Signup Process</p>
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Setup several Offers with your favourite categories
                                    </p>
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Sell unlimited Video and Audio Content

                                    </p>
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Referral Program for Lifetime Passive Revenue Stream

                                    </p>

                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Additional Promoting of your Profile through our Social Media box
                                    </p>
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Service fee reduction with every level you rise

                                    </p>
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Fee free account at level 10

                                    </p>
                                    <!-- <p> <i class="fa fa-check" style="font-size:24px"></i>Be under the first 10
                                    Artists to achieve level 10 and receive a trophy </p> -->
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>Share your ideas for future
                                        developments on the platform and let us grow together
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

                        <div class="col-md-6">
                            <div class="user1 mb-3">
                                <div class="user-head text-center text-white">
                                    <h3>Customer
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
                                        Order exclusive Custom Content</p>

                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Make Additional Requests</p>

                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Directly Download your Orders
                                    </p>
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Unlimited Streaming 24/7
                                    </p>
                                    <p>
                                        <i class="fa fa-check" style="font-size:24px"></i>
                                        Build your own Playlists
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

            <div class="col-md-4 hover">
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
                <?php $__empty_1 = true; $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php if($pop->type=='video'): ?>

                <div class="col-md-4 hover">
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

        <!---------------------------------------------Offer
        Videos--------------------------------------------->

        <div class="outer_slider last">
            <div class="container my-4">
                <div class="slider_tittle">
                    <h3 class="tittle">
                        <a href="<?php echo e(url('/seeall/offer')); ?>">Offers</a>
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
                                            <?php echo e($offer->title); ?></h4>

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
                            <?php $__empty_1 = true; $__currentLoopData = $popularAudios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php if($audio->type=='audio'): ?>
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
                                                type="audio/mp3"></audio>
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
                           



                       
                    <div class="slider">
    <div class="slider__wrapper">
    <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slider__item">
        <div style="height: auto;">
        <div class="card mt-5">
            <img class="card-img-top" src="https://med.gov.bz/wp-content/uploads/2020/08/dummy-profile-pic-300x300.jpg" alt=" image cap">
            <div class="card-body text-cenxter">
                                <h3 class="card-title text-center"><?php echo e($val->nickname); ?>  <small style="font-family: 'Poppins';"><i class="fa fa-star" style="color:red;"></i><?php echo e($val->count); ?> </small></h3>
                <button class="btn btn-danger  my-3" type="button"> Subscribe</button>
                <hr>
               <h5 class="text-dark">Description </h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.....</p>
                <div class="row">
                    <div class="col-6">
                           <div class="">
                               <h3><?php echo e($val->offercount); ?> </h3>
                               <h5 class="text-dark">Offer(S)</h3>
                               </div>

                           </div>
                           <div class="col-6">
                           <div class="">
                               <h3><?php echo e($val->rowcount); ?> </h3>
                               <h5 class="text-dark">Collection </h3>
                                 
                           </div>
                    </div>
                </div>
            </div>
            </div>
        
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a class="slider__control slider__control_left" href="#" role="button"></a>
    <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
  </div>

  

    
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
                    @media  only screen and (max-width: 768px) {

                        .col-md-4.hover {
                            margin-top: 10px;
                            text-align: center;
                            margin-bottom: 10px;
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

                    .slider {
      position: relative;
      overflow: hidden;
    }

    .slider__wrapper {
      display: flex;
      transition: transform 0.6s ease;
    }

    .slider__item {
      flex: 0 0 25%;
      max-width: 25%;
    }

    .slider__control {
      position: absolute;
      top: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      color: #fff;
      text-align: center;
      opacity: 0.5;
      height: 50px;
      transform: translateY(-25%);
      background: rgba(0, 0, 0, .5);
    }

    .slider__control:hover,
    .slider__control:focus {
      color: #fff;
      text-decoration: none;
      outline: 0;
      opacity: .9;
    }

    .slider__control_left {
      left: 0;
    }

    .slider__control_right {
      right: 0;
    }

    .slider__control::before {
      content: '';
      display: inline-block;
      width: 20px;
      height: 20px;
      background: transparent no-repeat center center;
      background-size: 100% 100%;
    }

    .slider__control_left::before {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
    }

    .slider__control_right::before {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
    }

    .slider__item>div {
      line-height: auto;
      font-size: 100px;
      text-align: center;
    }

                     
    .slider__item .card {
    background: white;
    margin: 12px;
}



                </style>
<script>

'use strict';
    var multiItemSlider = (function () {
      return function (selector, config) {
        var
          _mainElement = document.querySelector(selector), // основный элемент блока
          _sliderWrapper = _mainElement.querySelector('.slider__wrapper'), // обертка для .slider-item
          _sliderItems = _mainElement.querySelectorAll('.slider__item'), // элементы (.slider-item)
          _sliderControls = _mainElement.querySelectorAll('.slider__control'), // элементы управления
          _sliderControlLeft = _mainElement.querySelector('.slider__control_left'), // кнопка "LEFT"
          _sliderControlRight = _mainElement.querySelector('.slider__control_right'), // кнопка "RIGHT"
          _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width), // ширина обёртки
          _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width), // ширина одного элемента    
          _positionLeftItem = 0, // позиция левого активного элемента
          _transform = 0, // значение транфсофрмации .slider_wrapper
          _step = _itemWidth / _wrapperWidth * 100, // величина шага (для трансформации)
          _items = []; // массив элементов

        // наполнение массива _items
        _sliderItems.forEach(function (item, index) {
          _items.push({ item: item, position: index, transform: 0 });
        });

        var position = {
          getItemMin: function () {
            var indexItem = 0;
            _items.forEach(function (item, index) {
              if (item.position < _items[indexItem].position) {
                indexItem = index;
              }
            });
            return indexItem;
          },
          getItemMax: function () {
            var indexItem = 0;
            _items.forEach(function (item, index) {
              if (item.position > _items[indexItem].position) {
                indexItem = index;
              }
            });
            return indexItem;
          },
          getMin: function () {
            return _items[position.getItemMin()].position;
          },
          getMax: function () {
            return _items[position.getItemMax()].position;
          }
        }

        var _transformItem = function (direction) {
          var nextItem;
          if (direction === 'right') {
            _positionLeftItem++;
            if ((_positionLeftItem + _wrapperWidth / _itemWidth - 1) > position.getMax()) {
              nextItem = position.getItemMin();
              _items[nextItem].position = position.getMax() + 1;
              _items[nextItem].transform += _items.length * 100;
              _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
            }
            _transform -= _step;
          }
          if (direction === 'left') {
            _positionLeftItem--;
            if (_positionLeftItem < position.getMin()) {
              nextItem = position.getItemMax();
              _items[nextItem].position = position.getMin() - 1;
              _items[nextItem].transform -= _items.length * 100;
              _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
            }
            _transform += _step;
          }
          _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
        }

        // обработчик события click для кнопок "назад" и "вперед"
        var _controlClick = function (e) {
          var direction = this.classList.contains('slider__control_right') ? 'right' : 'left';
          e.preventDefault();
          _transformItem(direction);
        };

        var _setUpListeners = function () {
          // добавление к кнопкам "назад" и "вперед" обрботчика _controlClick для событя click
          _sliderControls.forEach(function (item) {
            item.addEventListener('click', _controlClick);
          });
        }

        // инициализация
        _setUpListeners();

        return {
          right: function () { // метод right
            _transformItem('right');
          },
          left: function () { // метод left
            _transformItem('left');
          }
        }

      }
    }());

    var slider = multiItemSlider('.slider')


</script>
                <!-- <script> $(document).ready(function() { $("#owl-example").owlCarousel({
                items:3 }); $("#owl-example1").owlCarousel({ items:3 });
                $("#owl-example2").owlCarousel({ items:3 }); $("#owl-example3").owlCarousel({
                items:3, }); $("#owl-example4").owlCarousel({ items:3, loop:true, margin:10,
                autoPlay:true, nav:true, rewindNav:false }); }); </script> -->

                <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php //include(app_path().'/include/includebottom.php');?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views//initial.blade.php ENDPATH**/ ?>