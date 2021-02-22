<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="<?php echo e(asset('design/play.css')); ?>" />
<!-- end header -->

<div class="row pb-row">
 
<div class="container">
<div class="text-right">
      <select class="form-select form-control col-md-4" aria-label="Default select example">
        <option selected>All</option>
        <option value="1">Collection</option>
        <option value="2">Playlists</option>
        <option value="3">Wishlist</option>
        <option value="4">History</option>
      </select>
  </div>
<div class="col-md-12 uploa_outer " id="collection">
		  <div class="slider_tittle">
		  <h3 class="tittle">My Collection</h3>		  
		</div>
        <div class="row pb-row">
              <?php if($wishList): ?>
              <?php $__currentLoopData = $wishList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%" controls controlsList="nodownload" disablePictureInPicture>
    <source src="<?php echo e(url('storage/app/public/video/'.$val->media)); ?>" type="video/mp4">
				
             </video>
             <div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
		             <div class="playwish">
                     <h4>Collection Empty</h4>

                   </div>
                   <?php endif; ?>
	</div>
  </div>
</div>
  <!-- -------------------------- Play List  Start--------------------------->


<div class="inner-page">
  <div class="container">
      <div class="col-md-12 uploa_outer" id="playlist">
		  <div class="slider_tittle">
		  <h3 class="tittle">Playlist</h3>	
      <form>	
       <div class="form-group">
    <label for="exampleFormControlSelect1"> Select Playlist</label>
    <select class="form-control" name="playlist" id="exampleFormControlSelect1">
      <option value="">Choose..</option>
       <?php $__currentLoopData = $listname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($val->id); ?>"><?php echo e($val->playlistname); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

  </div>
  </form>  
		</div>



       <!-- -------------------------- Video Section  Start--------------------------->



        <div class="row pb-row">
          <?php if($videos): ?>

<?php $__empty_1 = true; $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <?php if($vid->type=='video'): ?>
      <div class="col-md-4">
      
    <video width="370" height="245" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
      <source src="<?php echo e(url('storage/app/public/video/'.$vid->media)); ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    
    <div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>

      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
       <?php endif; ?>
       <?php else: ?>
       <div class="playhistory col-md-12">
                     <h4>No play list created yet. <span id="playlistCreate" class="show_list">Create play List +</span></h4>
                     <span class="create_playlistt" style="display: block">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
          <div class="alert alert-success message" role="alert" style="display: none">
        A simple success alert—check it out!
   </div>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>

                   </div>
            <?php endif; ?>
			
	</div>
	<br/>
</div>

  <!-- -------------------------- Wish list Start--------------------------->



	<div class="col-md-12 uploa_outer" id="wishlist">
		  <div class="slider_tittle" >
		  <h3 class="tittle">Wishlist</h3>		  
		</div>
        <div class="row pb-row">
              <?php if($wishList): ?>
              <?php $__currentLoopData = $wishList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%" controls controlsList="nodownload" disablePictureInPicture>
    <source src="<?php echo e(url('storage/app/public/video/'.$val->media)); ?>" type="video/mp4">
				
             </video>
             
				   	<div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>
              
				  
            </div>
           
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
		             <div class="playwish playhistory col-md-12">
                     <h4>Wishlist Empty</h4>

                   </div>
                   <?php endif; ?>
	</div>
	<br/>
</div>
  <!-- -------------------------- History Section  Start--------------------------->


	<div class="col-md-12 uploa_outer" id="history">
		  <div class="slider_tittle">
		  <h3 class="tittle">History</h3>		  
		</div>
        <div class="row pb-row">

        <?php if($history): ?>
              <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $histories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 pb-video">
             <video width="100%" height="100%" controls controlsList="nodownload" disablePictureInPicture>

               <source src="<?php echo e(url('storage/app/public/video/'.$histories->media)); ?>" type="video/mp4">
				
             </video>
             <div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="playhistory col-md-12">
                     <h4>History Empty</h4>

                   </div>
                   <?php endif; ?>
	</div>	
  </div>
</div>
</div>
</div>

<script>
  $(document).ready(function() {
 
  $("#owl-example").owlCarousel({
    items:3
 loop:true,
margin:10,
autoPlay:true,
nav:true,
rewindNav:false
  });
});
 </script>

<style>
body{
  background: black;
}

.tooltip {
 opacity:1 !important;
  display: inline-block;
  border-bottom: 1px dotted black;
  right: 12px;
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

.tooltip:hover .tooltiptext {
  visibility: visible;
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
  select.form-select.form-control.col-md-4 {
    float: right;
    margin-top: 22px;
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
.pb-video {
    border: 1px solid #e6e6e6;
    padding: 5px;
    margin-top: 16px;
}
h3.tittle {
    color: #ffffff;
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
    cursor:pointer;
}
</style>
<!--body end-->
<script>
function showop(){
	//alert("asas");
	$(".reporting").toggle();
}
</script>
<!--footer -->
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/play.blade.php ENDPATH**/ ?>