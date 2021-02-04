<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
<div class="row">
      <?php $__currentLoopData = $playlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-4">
           <video width="350px" height="275px" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
                <source src="<?php echo e(url('storage/app/public/video/'.$lists->videos)); ?>" type="video/mp4">
                    Your browser does not support the video tag.
           </video>
   
    </div>
    <div class="report-op">
				   		<i class="fa fa-ellipsis-v" onclick="showop()"></i>
						<ul style="display:none;" class="reporting">
						 <li>Report</li>
						 <li>You can not download this video.</li>
						</ul>
				   </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>


<style>

.report-op {
    position: relative;
    top: 45px;
    color: white;
    right: 56px;
}
ul.reporting {
    background: white;
    color: black;
    padding: 13px;
    border-radius: 7px;
}
</style>
<script>
function showop(){
	//alert("asas");
	$(".reporting").toggle();
}
</script>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/playlistdata.blade.php ENDPATH**/ ?>