
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Playlist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
      	
      <h3>Choose Playlist</h3>
      <div class="Playlist1">
     
      	<h5 class="select_list"> </h5> <a href="" class="aedit">edit</a><br>
      
      	<a href="#" class="show_list">Create New Playlist +</a>
      	<span class="create_playlistt" style="display: none">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>
      </div>
      <div class="container">
         <h3>Items </h3>
         <div class="itemsel">
          <?php if($cartVideo): ?>
            <?php $__currentLoopData = $cartVideo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="row ">
          <div class="col"><h5><?php echo e($value->title); ?></h5></div>
          <div class="col"><span><?php echo e($value->price); ?>PAZ</span>
          </div>
          <div class="col"><button type="button" class="close " data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </div>
  </div>
      <div class="text-center mt-4">
           <h3>Prize : 600PAZ</h3>
      <button type="button" class=" addNow">ADD NOW</button>
  </div>
      </div>
      
    </div>
  </div><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/playlistpop.blade.php ENDPATH**/ ?>