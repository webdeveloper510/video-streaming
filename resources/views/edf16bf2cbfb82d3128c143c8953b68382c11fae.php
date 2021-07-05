
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="show-offer">
<div class="container">
	 <?php if(session('success')): ?>
        <div class="alert alert-success" id="success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>   
          <?php if(session('error')): ?>
        <div class="alert alert-danger" id="error">
        <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
<div class="row">
  <?php if($offer): ?>
	<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-md-4 showoffer1">
    <a href="<?php echo e(url('artistoffers/'.$val->id)); ?>">
      <div class="card">
          <?php if($val->type=='video'): ?>
	   <video width="100%" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$val->audio_pic)); ?>" controls class="hoverVideo">
  <source src="<?php echo e(url('storage/app/public/video/'.$val->media)); ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
<?php else: ?>
<img src="<?php echo e(url('storage/app/public/uploads/'.$val->audio_pic)); ?>">
<audio  width="100%" height="240" poster="<?php echo e(url('storage/app/public/uploads/'.$val->audio_pic)); ?>" controls>
  <source src="<?php echo e(url('storage/app/public/audio/'.$val->media)); ?>" type="audio/mp3">
  Your browser does not support the video tag.
</audio>
<?php endif; ?>

	  <div class="carad-body">
	      <h4 class="card-title text-center text-white"><?php echo e($val->title); ?></h4>
	      <hr>
	     
	      
	      <table class="table table-borderless text-center">
        <tr>
          <th>Category</th>
          <td><?php echo e($val->category); ?></td>
        </tr>
        <tr>
          <th>Media</th>
          <td><?php echo e($val->type=='video' ? 'Video/mp4' : 'Audio/mp3'); ?></td>
        </tr>
            <tr>
            	<th>Price</th>
            	<td> <?php echo e($val->price); ?>  <span style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</span>/Minute </td>
              </tr>
	      </table>	    
     </div>
   </div>
   </a>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
</div>

<div class="modal fade" id="addDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Request To Artist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php echo Form::open(['action' => 'artist@addUserDescription', 'method' => 'post']); ?>

          <?php echo e(Form::token()); ?>

          <?php echo e(Form::label('Your Description', 'Your Description')); ?> 
                <?php echo e(Form::textarea('Description',null,['class'=>'form-control description','rows' => 4, 'cols' => 40])); ?>


       <input type="hidden" name="reqId" value="" id="reqid">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php echo e(Form::submit('Submit Request!',['class'=>'btn btn-primary'])); ?>

   <?php echo e(Form::close()); ?>

      </div>
      <div class="modal-footer">
   
      </div>
      
    </div>
  </div>
</div>
</div>
</div>
<style>
 .card {
    margin-top: 15%;
    margin-bottom: 15%;
}
a.btn.btn-primary.add {
    margin-left: 32%;
}
a.btn.btn-primary.add:hover {
 color:white;
 background: blue;
}
table.table.table-borderless tr td, th {
    text-align: center;
}
.col-4 {
    float: left;
    width: 33.333%;
    margin-bottom: 30px;
    display: flex;
}
.show-offer {
    background: black;
    color: white;
}
hr{
  background:white;
}

.card {
    background: black;
    border: 1px solid white;
    color: white;
    padding:13px;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    margin-top: 97px;
}
.showoffer1:hover  .card{
  border:2px solid yellow;
}
	</style>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/showoffer.blade.php ENDPATH**/ ?>