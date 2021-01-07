
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
    <!--   <th scope="col">Action</th> -->
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
  
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

</div>
 <style>


</style>

 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/myoffer.blade.php ENDPATH**/ ?>