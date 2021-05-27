<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <link rel = "stylesheet" href = "<?php echo e(asset('design/play.css')); ?>" />
<!-- end header -->

<div class="row pb-row">

    <div class="container">
        <div class="text-right">
            <select
                class="form-select form-control col-md-4"
                aria-label="Default select example" onchange="selectVideoBasedOnOption(this)">
                <option selected="selected">All</option>
                <option value="collection">Collection</option>
                <option value="playlist">Playlists</option>
                <option value="wishlist">Wishlist</option>
                <option value="history">History</option>
            </select>
        </div>
        <div class="col-md-12 uploa_outer " id="collection">
            <div class="slider_tittle">
                <h3 class="tittle text-white">My Collection</h3>
            </div>
            <div class="choosebutton text-right pt-3" style="<?php echo e($flag=='offer' ? 'display:none' : 'display:block'); ?>"> 
                    <button type="button" class="btn btn-primary bardot">Select</button>
                    <button type="button" class="btn btn-danger closbtn">cancel</button>
                    </div>
                    <div class="choose1" style="display:none;">
                    <button type="button" class="close" data-dismiss="choose1" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                    <div class="row ">
                        <div class="col">
                            <h4><span class="count">0</span>Item  Selected</h4>
                        </div>
                        
                        <div class="col">
                        <ul class="selected">
                                
                            </ul>
                        </div>
                        <div class="col pt-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#playlist1">Add To Playlist</button>
                        </div>
                        
                    </div>
                    </div>
                    <div class="modal" role="dialog" id="playlist1" aria-hidden="false">

                    <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Playlist</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3> Create New Playlist</h3>
                                <div class="Playlist1">
                                     <?php $__currentLoopData = $listname1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <h5 class="select_list"><?php echo e($val->listname); ?>

                                                    </h5>
                                                    <button
                                                        data-id="<?php echo e($val->id); ?>"
                                                        class="alert alert-primary btn-sm saveBtn"
                                                        onclick="savePlaylist(this)"
                                                        style="display:none;">Save</button>
                                                    <p class="aedit text-right">edit</p>
                                                    <br>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                                </div>

                                <a href="#" class="show_list">Create New Playlist +</a>
                                <span class="create_playlistt" style="display: none">
                                        <input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
                                        <button class="create_list btn btn-primary" type="button">Create</button>
                                    </span>
                                <div class="text-center mt-4 ">
                                    <input type="hidden" id="art_id" value="<?php echo e($cartVideo ? $cartVideo[0]->contentProviderid : ''); ?>"/>
                                <button type="button" class="add_in_library btn btn-primary">ADD NOW</button>
                                <div class="alert alert-success" id="success_message" style="display: none" role="alert">
                                    </div>
                                
                            </div>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                         <div class="row pb-row">
                        <?php if($videos): ?> <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 pb-video">
                        <div class="checkall" style="display:none">
                             <form> 
                              <input type="checkbox" class="slct_video" id="<?php echo e($val->id); ?>" data-id="<?php echo e($val->price); ?>"></form></div>
                            <video
                                width="100%"
                                height="100%"
                                controls="controls"
                                poster="<?php echo e(url('storage/app/public/uploads/'.$val->audio_pic)); ?>"
                                controlsList="nodownload"
                                disablePictureInPicture="disablePictureInPicture">
                                <source
                                    src="<?php echo e(url('storage/app/public/video/'.$val->videos)); ?>"
                                    type="video/mp4"></video>
                                    <div class="outer">
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="<?php echo e($val->is_deleted==1 ? 'display:block' : 'display:none'); ?>">
                                      Content is no available
                                        </button>
                                        </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
                            <div class="playwish ">
                                <h4 class="text-white">Collection Empty</h4>

                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                   
                    </div>
                </div>
        <!-- -------------------------- Play List Start--------------------------->

        <div class="inner-page">
            <div class="container">
                <div class="col-md-12 uploa_outer" id="playlist">
                    <div class="slider_tittle">
                        <h3 class="tittle">Playlist</h3>
                        <!-- <form> <div class="form-group"> <label for="exampleFormControlSelect1">
                        Select Playlist</label> <select class="form-control" name="playlist"
                        id="exampleFormControlSelect1"> <option value="">Choose..</option>
                        <?php $__currentLoopData = $listname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option
                        value="<?php echo e($val->id); ?>"><?php echo e($val->playlistname); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select>
                        </div> </form> -->

                        <!-- Modal -->
                        <div
                            class="modal fade w-100"
                            id="exampleModalCenter"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="exampleModalCenterTitle"
                            aria-hidden="true">
                            <div
                                class="modal-dialog "
                                role="document"
                                style="max-width:100%;    z-index: 1099;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Playlists</h5>
                                        <button class="btn btn-outline-danger ml-5" type="button" id="deletePlaylist">Delete this Playlist</button>
                                        <input type="hidden" value="" name="playlistid" id="list"/>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 playlist_video_show">
                                                <div class="videodata"></div>
                                                <div class="text-right mt-5">
                                                    <button class="btn btn-outline-danger" type="button">Remove From Playlist</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="videoinfo">
0                                                    <div class="playlistname">
                                                        <h4 class="listname">hello</h4>
                                                        <p>1/</p><p class="lengthVideo">5</p>
                                                    </div>
                                                    <!------------start list------------------>
                                                <a href="#" onClick="getSrcUrl(this)">
                                                    <div class="video_append">

                                                        <!-- <div class="videolist col-4" > </div> -->
                                                        <div class="videonameq col-6">
                                                            <h3>title</h3>
                                                            <p>artistname</p>
                                                        </div>

                                                    </div>
</a>
                                                    <!------------end list------------------>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                                   <!-- Button trigger modal -->
                  

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-body">
                            <p>The artist has removed this Content. </p>
                            <p>For unlimited access please place Orders directly from the Artists Offers and download them under "My Orders"</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- -------------------------- Video Section Start--------------------------->

                    <div class="row pb-row">

                        <?php $__currentLoopData = $listname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
              $videos = explode(',',$playlist->videos);

              //print_r($videos);
             
              $count = count($videos);

             // print_r($count);
              
            ?>

                        <div class="col-md-4 mb-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalCenter">
                                    
                                <video width="320" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$videos[0]->audio_pic)); ?>">
                                    <source src="<?php echo e(url('storage/app/public/video/'.$videos[0])); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                </video>
                                    <div
                                        class="videooverlay text-white"
                                        onclick="showPlaylistVedio('<?php echo e(json_encode($playlist)); ?>')">

                                        <img
                                            src="<?php echo e(asset('images/playlisticon.png')); ?>"
                                            class="img-fluid"`
                                            width="200px"
                                            height="200px">
                                            <h2 class="text-white pl-5"><?php echo e($count); ?></h2>
                                            <p class="text-white"><?php echo e($playlist->playlistname); ?></p>

                                        </div>
                                    </a>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <br/>
                            </div>
                            </div>

                            <!-- -------------------------- Wish list Start--------------------------->

                            <div class="col-md-12 uploa_outer" id="wishlist">
                                <div class="slider_tittle">
                                    <h3 class="tittle">Wishlist</h3>
                                    <div class="text-right">
                                  
                                    <div class="row pb-row">
                                        <?php if($wishList): ?> <?php $__currentLoopData = $wishList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <div class="col-md-3 pb-video">
                                            <a href="<?php echo e(url('artist-video/'.$val->id)); ?>">
                                                <video
                                                    width="100%"
                                                    height="100%"
                                                    poster="<?php echo e(url('storage/app/public/uploads/'.$val->audio_pic)); ?>"
                                                    controlsList="nodownload"
                                                    disablePictureInPicture="disablePictureInPicture">
                                                    <source src="<?php echo e(url('storage/app/public/video/'.$val->media)); ?>" type="video/mp4"></video>
                                                    </a>
                                                    <h3 class="videotitle text-white">title</h3>
                                                </div>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
                                                <div class="playwish playhistory col-md-12 py-4">
                                                    <h4>Wishlist Empty</h4>

                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <br/>
                                        </div>
                                        </div>
                                        </div>
                                        <!-- -------------------------- History Section Start--------------------------->

                                        <div class="col-md-12 uploa_outer" id="history">
                                            <div class="slider_tittle">
                                                <h3 class="tittle">History</h3>
                                            </div>
                                            <div class="row pb-row">

                                                <?php if($history): ?>
                                                <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $histories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="col-md-3 pb-video">
                                                 <a href="<?php echo e(url('artist-video/'.$histories->id)); ?>">
                                                    <video
                                                        width="100%"
                                                        height="100%"
                                                        poster="<?php echo e(url('storage/app/public/uploads/'.$histories->audio_pic)); ?>"
                                                        controlsList="nodownload"
                                                        disablePictureInPicture="disablePictureInPicture">

                                                        <source
                                                            src="<?php echo e(url('storage/app/public/video/'.$histories->media)); ?>"
                                                            type="video/mp4">
                                                            </video>
                                                            </a>
                                                            <h4 class="videotitle text-white">title</h4>

                                                    </div>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
                                                    <div class="playhistory col-md-12">
                                                        <h4>History Empty</h4>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            body {
                                background: black;
                            }

                            .tooltip {
                                opacity: 1 !important;
                                display: inline-block;
                                border-bottom: 1px dotted black;
                                right: 12px;
                                z-index: 1 !important;
                            }

                            .tooltip .tooltiptext {
                                visibility: hidden;
                                width: 203px;
                                background-color: white;
                                color: #000;
                                text-align: center;
                                border-radius: 6px;
                                padding: 5px 0;

                                /* Position the tooltip */
                                position: absolute;
                                z-index: 1;
                            }
                            .outer {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                }

                            .tooltip:hover .tooltiptext {
                                visibility: visible;
                            }
                            button.addNow {
                                cursor: pointer;
                            }
                            ul.reporting {
                                background: white;
                                color: black;
                                padding: 13px;
                                border-radius: 7px;
                            }
                            .owl-carousel {
                                display: block !important;
                            }
                            .choose1 {
                                background: white;
                                position: fixed;
                                width: 50%;
                                bottom: 10px;
                                z-index: 2;
                            }
                            select.form-select.form-control.col-md-4 {
                                float: right;
                                margin-top: 22px;
                            }
                            .videooverlay {
                                background: #151515;
                                position: absolute;
                                height: 245px;
                                top: 11%;
                                width: 161px;
                                padding: 43px;
                                display: block;
                            }

                            .playhistory {
                                border: none;
                                width: 100%;
                                text-align: left;
                                padding-bottom: 0;
                            }
                            .playwish {
                                border: 2px dashed red;
                                width: 100%;
                                text-align: center;
                                padding-bottom: 11px;
                            }
                            .playhistory h4 {
                                margin: 0;
                                font-size: 12px;
                            }
                            .inner-page {
                                display: inline-block;
                                width: 100%;
                            }
                            h3.videotitle.text-white {
                                position: absolute;
                                top: 5px;
                                display: none;
                            }

                            .col-md-3.pb-video:hover h3.videotitle.text-white {
                                display: block !important;
                            }
                            .pb-video {
                                border: 1px solid #e6e6e6;
                                padding: 5px;
                                margin-top: 16px;
                            }
                            h3.tittle {
                                color: #ffffff;
                            }
                            input.slct_video {
                            position: absolute;
                            right: 2px;
                            top: 5px;
                            z-index: 1;
                            width: 20px;
                            height: 20px;
                        }
                        .active{
                            color:red;
                        }
                            .row.pb-row {
                                background: black;
                                color: white !important;
                            }
                            .playhistory.col-md-12 h4 {
                                color: white !important;
                            }
                            .pb-video:hover {
                                border: 1px solid gold;
                                padding: 5px;
                            }
                            span#playlistCreate {
                                font-size: 15px;
                                font-weight: 700;
                                cursor: pointer;
                            }
                        </style>
                        <!--body end-->
                        <script>
                            function showop() {
                                //alert("asas");
                                $(".reporting").toggle();
                            }
                        </script>
                        <!--footer -->
                        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/play.blade.php ENDPATH**/ ?>