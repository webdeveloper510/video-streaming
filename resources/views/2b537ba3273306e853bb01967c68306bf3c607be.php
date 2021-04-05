<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="<?php echo e(asset('design/artistVideo.css')); ?>" />
<div class="inner-page"> 
	 <section>
	   <div class="container-fluid">
		  <div class="main-cnt-sec">
			 <div class="row">
				<?php $__currentLoopData = $vedios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php 
			
			$GLOBALS['videoid'] = $video->id ;
			$GLOBALS['type'] = $video->type ;

			$GLOBALS['paz'] = $video->price ;
			$GLOBALS['artistid'] = $video->contentProviderid ;

			?>
			
			
				<?php if($video->type=='video' || $video->type=='audio'): ?>
			
				<div class="col-md-5">
				   <div class="content-area">
					  <h3><?php echo e($video->title); ?></h3>
					  <a href="<?php echo e(url('artistDetail/'.$video->contentProviderid)); ?>"><p><?php echo e($video->nickname); ?></p></a>
				   </div>
				</div>
				<div class="col-md-2">
				   <div class="content-price">
					  <h3 class="paz_price"><?php echo e($video->price); ?>PAZ</h3>
				   </div>
				</div>
				<div class="col-md-3">
				   <div class="content-cart">
				   
   
</div>		  
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
	<section>
	   <div class="container-fluid">
		  <div class="row">
			 <div class="col-md-12">
				<div class="vid-sec">
						<?php if($video->type=='video'): ?>
				   <video width="320" height="240" controls controlsList="nodownload" disablePictureInPicture>
				   	<source src="<?php echo e(url('storage/app/public/video/'.$video->media)); ?>" type="video/mp4">
				   </video>
				   <?php else: ?>

				   <div class="artistaudiopage col-md-4">
				   <img src="https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg" class="img-fluid">

				   <audio controls>
				   	<source src="<?php echo e(url('storage/app/public/audio/'.$video->media)); ?>" type="audio/mp3">
				   </audio>
					</div>
				   <?php endif; ?>
				   <div class="report-op">
				   		<i class="fa fa-ellipsis-v" onclick="showop()"></i>
						<ul style="display:none;" class="reporting">
						 <li><button class="btn btn-outline-light btn-sm text-dark"data-toggle="modal" data-target="#reportvideo" type="button">Report</button></li>
						</ul>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
          
       
	    <!-- Modal -->
		<div class="modal modal2" id="reportvideo" tabindex="-1" aria-labelledby="reportvideoLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header ">
                      <div class="row" style="width: 100%;">
                        <div class="col"></div>
                         <div class="col-md-8 my-3">
                            <div class="text-center">
                                <select class="form-select form-control " aria-label="Default select example">
                                  <option selected> Select Menu</option>
                                  <option value="1">Feature Request</option>
                                  <option value="2">Functionality Question</option>
                                  <option value="3">Techincal Issue</option>
                                  <option value="4">General</option>
                                  <option value="5">Website Fees</option>
                                  <option value="6">Delete Account</option>
                                  <option value="7">Other</option>
                                </select>
                              </div>
                          </div>
                          <div class="col"></div>
                          </div>
                        
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                      </div>
                      <div class="modal-body">
                      

                        <label>Description</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                      </div>
                      <div class="pb-3 pr-3 text-right">
                      <button class="btn btn-primary" type="button">Submit</button></div>
                    
                    </div>
                    
                    </div>
                  </div>
                </div>




	<section class="published">
	   <div class="container-fluid">
		  <div class="pubcontainer">
			 <div class="row">
				<div class="col-md-8">
				   <div class="published">
					  <div class="published1">
						 <h3><?php echo e($video->title); ?></h3>
						 <p><?php echo e($video->description); ?></p>
						 <p>Published <?php echo e($video->created_at); ?></p>
					  </div>
				   </div>
				</div>
				<div class="col-md-4">
				   <div class="main-mediacl">
					  <div class="media-property">
						 <div class="property-1">
							<div class="Media-Type">
							   <p>Media Type</p>
							</div>
							<div class="Media-Type1">
							   <p><?php echo e($video->type=='video' ? 'mp4':'mp3'); ?></p>
							</div>
						 </div>
					  </div>
					  <div class="media-property">
						 <div class="property-1">
							<div class="Media-Type">
							   <p>Play Time</p>
							</div>
							<div class="Media-Type1">
							   <p><?php echo e($video->duration); ?></p>
							</div>
						 </div>
					  </div>
					  <div class="media-property">
						 <div class="property-1">
							<div class="Media-Type">
							   <p><?php echo e($video->type=='video' ? Quality : ''); ?></p>
							</div>
							<div class="Media-Type1">
							   <p><?php echo e($video->type=='video' ? $video->convert.'p' : ''); ?></p>
							</div>
						 </div>
					  </div>
					 
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<!-- <section>
	   <div class="container-fluid">
			<div class="row">
					<div class="col-md-12">
						<h3 class="top selling-content">
						<span>$</span>Top Selling Content
						<h3>
					</div>
			</div>
		  <div class="row">
			 <div class="col-md-12">
				<div id="demo" class="carousel slide" data-ride="carousel">
				   <!-- Indicators 
						<ul class="carousel-indicators">
							<li data-target="#demo" data-slide-to="0" class="active"></li>
							<li data-target="#demo" data-slide-to="1"></li>
							<li data-target="#demo" data-slide-to="2"></li>
						</ul>
				   <!-- The slideshow 
				   <div class="carousel-inner">
					  <div class="carousel-item active">
						 <div class="main-video-search content">
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
						 </div>
					  </div>
					  <div class="carousel-item">
						 <div class="main-video-search content">
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
						 </div>
					  </div>
					  <div class="carousel-item">
						 <div class="main-video-search content">
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
							<div class="videos2">
							   <iframe width="100%" height="150" src="https://www.youtube.com/embed/dlu504XxrYA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
							   </iframe>
							   <div class="video-icon">
								  <p>Nasty balls whacking</p>
								  <div class="camera">
									 <i class="fa fa-video-camera" aria-hidden="true"></i>
									 <p>vid</p>
								  </div>
							   </div>
							   <p><span>MISTRESS KELLY KALASHNIK</span></p>
							</div>
						 </div>
					  </div>
				   </div>
				   <!-- Left and right controls 
				   <a class="carousel-control-prev" href="#demo" data-slide="prev">
				   <span class="carousel-control-prev-icon"></span>
				   </a>
				   <a class="carousel-control-next" href="#demo" data-slide="next">
				   <span class="carousel-control-next-icon"></span>
				   </a>
				</div>
			 </div>
		  </div>
	   </div>
	</section> -->
</div>  


<script>
	var type = "<?php echo e($GLOBALS['type']); ?>";

     addTohistory(type);
		

</script>
<style>
.report-op {
    position: absolute;
    width: 100%;
    top: 6px;
    padding-left: 267px;
}
.content-cart .addToCart:hover {
    background: #0062cc !important;
    border: 1px solid #0062cc !important;
}
ul.reporting {
    background: #efefef;
    width: 241px;
    margin-left: 50%;
    box-shadow: 0 3px 6px #00000026;
    padding: 8px 6px 8px;
    text-align: left;
    font-size: 13px;
}
.artistaudiopage {
    margin: 1px auto;
    padding: 4px;
}

.artistaudiopage img {
    height: 184px;
}
</style>
<script type="text/javascript">
$(".addToCart").click(function(e) {
	
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "<?php echo e(url('ajax-request')); ?>",
        data: { 
            id: $(this).attr('id'), // < note use of 'this' here
             "_token": "<?php echo e(csrf_token()); ?>", 
        },
        success: function(result) {
        	$('.addToCart').text('Added');
           // $('.itemCount').text(result);
        },
        error: function(result) {
            alert('error');
        }
    });
});
function showop(){
	//alert("asas");
	$(".reporting").toggle();
}
</script>



<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/videoDetail.blade.php ENDPATH**/ ?>