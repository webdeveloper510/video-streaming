
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<div clas="row ">
	<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-4">
      <div class="card">
	   <video width="100%" height="240" controls>
  <source src="movie.mp4" type="video/mp4">

  Your browser does not support the video tag.
</video>

	  <div class="carad-body">
	      <h4 class="card-title text-center"><?php echo e($val->title); ?></h4>
	      <hr>
	      <h5 class="text-center">Artists Description</h5>
	    
	      <p class="card-text p-3"><?php echo e($val->description); ?></p>
	      <hr>
	      <table class="table table-borderless text-center">
            <tr>
            	<th>Price</th>
            	<td> <?php echo e($val->price); ?>  <span style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</span> </td>
              </tr>
	      </table>
	    
	      <a href="#" data-toggle="modal" onclick="getId('<?php echo e($val->id); ?>')" data-target="#addDescription" class="btn btn-primary add mb-3">Add Description</a>
     </div>
   </div>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<style>
   .card {
    margin-top: 30%;
}
a.btn.btn-primary.add {
    margin-left: 55px;
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

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    margin-top: 97px;
}
	</style>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/showoffer.blade.php ENDPATH**/ ?>