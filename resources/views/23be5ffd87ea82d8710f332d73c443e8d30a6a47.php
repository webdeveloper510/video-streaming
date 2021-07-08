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
      <th scope="col">Type</th>
      <th scope="col">Title</th>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $earnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($earn->pay_from=='multiple' || $earn->pay_from=='single'): ?>
          <?php 
            $type = explode(',', $earn->mediaType);
            //print_r($type);
          ?>
    <tr>
      <td scope="row"><?php echo e($earn->nickname); ?></td>
       <td><?php echo e(is_array($type) ? 'collection-'.$type[0].','.'collection-'.$type[1] : $type); ?></td>
      <td><?php echo e($earn->mediaTitle); ?></td>
      <td style="color:gold"><?php echo e($earn->tokens); ?><b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></td>
      <td><?php echo e(date('m/ d/ Y  (H:i)', strtotime($earn->created_at))); ?></td>
    </tr>
    <?php endif; ?>
    <?php if($earn->pay_from=='order'): ?>
    <tr>
      <td scope="row"><?php echo e($earn->nickname); ?></td>
       <td ><?php echo e('order-'.$earn->types); ?></td>
      <td><?php echo e($earn->Offertitles); ?></td>
      <td style="color:gold;"><?php echo e($earn->tokens); ?> <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ </b></td>
      <td><?php echo e(date('m/ d/ Y  (H:i)', strtotime($earn->created_at))); ?></td>
    </tr>
    <?php endif; ?>
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