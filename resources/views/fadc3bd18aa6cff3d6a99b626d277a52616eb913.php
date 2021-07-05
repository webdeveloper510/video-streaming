
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
      	
      <h3>Choose Playlist</h3>
      <div class="Playlist1">
        <?php $__currentLoopData = $listname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      	<h5 class="select_list"><?php echo e($val->listname); ?> </h5><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      

      </div>

      <a href="#" class="show_list">Create New Playlist +</a>
      <span class="create_playlistt" style="display: none">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>
      <div class="text-center mt-4">
           <h3>Value : <span class="total"><?php echo e($total_sum); ?></span>PAZ</h3>
           <input type="hidden" id="art_id" value="<?php echo e($cartVideo ? $cartVideo[0]->contentProviderid : ''); ?>"/>
      <button type="button" class="multipleAdd btn btn-primary">Pay NOW</button>
      <div class="alert alert-success" id="success_message" style="display: none" role="alert">
        </div>
       
  </div>
      </div>
      
    </div>
  </div><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/playlistpop.blade.php ENDPATH**/ ?>