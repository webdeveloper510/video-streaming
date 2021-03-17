<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="earningpage">
<div class="container-fluid">
<div class="earningtext">
<div class="card" >
  <h2 class="ml-5 mt-4">Earnings:</h2>
  <div class="card-body">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"> Name</th>
      <th scope="col">Collection Media Title</th>
      <th scope="col">Offer Media Title</th>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
      <th scope="col">Pay From</th>
    </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $earnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td scope="row"><?php echo e($earn->nickname); ?></td>
       <td ><?php echo e($earn->mediaTitle); ?></td>
      <td><?php echo e($earn->Offertitles); ?></td>
      <td><?php echo e($earn->tokens); ?>PAZ</td>
      <td><?php echo e($earn->created_at); ?></td>
      <td><?php echo e($earn->pay_from); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td colspan="5" class="text-center">No data available</td>
    </tr>
    
  </tbody>
</table>
  </div>
</div>
</div>
</div>

</div>






<style>

.earningtext {
    margin-top: 12%;
}
.table thead tr th {
    font-weight: bold;
}
</style>




<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/earning.blade.php ENDPATH**/ ?>