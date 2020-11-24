
<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<style type="text/css">
	table.table {
    margin-top: 10%;
}
</style>


            <?php if(session('success')): ?>
        <div class="alert alert-success" id="success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
<div class="container">
<table class="table ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Keyword</th>
      <th scope="col">Category Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">User Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($index+1); ?></th>
      <td><?php echo e($val->title); ?></td>
      <td><?php echo e($val->keyword); ?></td>
      <td><?php echo e($val->category); ?></td>
      <td><?php echo e($val->price); ?></td>
      <td><?php echo e($val->description); ?></td>
      <td><?php echo e($val->userdescription); ?></td>
      <td><button class="edit" onclick="getofferid('<?php echo e($val->id); ?>','<?php echo e($val->description); ?>','<?php echo e($val->userid); ?>')" data-toggle="modal" data-target="#editdescription">Edit Description</button></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

</div>

<div class="modal fade" id="editdescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php echo Form::open(['action' => 'artist@editOffer', 'method' => 'post']); ?>

          <?php echo e(Form::token()); ?>

          <?php echo e(Form::label('Your Description', 'Your Description')); ?> 
                <?php echo e(Form::textarea('Description',null,['class'=>'form-control description','rows' => 4, 'cols' => 40])); ?>


       <input type="hidden" name="reqId" value="" id="offerid">

       <input type="hidden" name="user_id" value="" id="userid">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php echo e(Form::submit('Update!',['class'=>'btn btn-primary'])); ?>

      </div>
         <?php echo e(Form::close()); ?>

    </div>
  </div>
</div>


 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/myoffer.blade.php ENDPATH**/ ?>