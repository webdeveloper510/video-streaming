<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <section class="background1 pt-5">
   
    <div class="row">
      <div class="col"></div>
      <div class="col-md-5 mt-5">
        <div class="overlay1 mt-5 ">
     <table class="text-white table">
      <thead>
   <tr class="text-center">
   <img width="100px"; height="100px" src="<?php echo e(url('storage/app/public/uploads/1602525455_etsy inspo.jpg')); ?>">
 </tr>
          </thead>
          <tbody>
          <tr class="text-white">
            <th> Nick Name:-</th>
            <td><?php echo e($contentUser->nickname); ?></td>
          </tr>
          <tr class="text-white">
            <th>Email Id:-</th>
            <td><?php echo e($contentUser->email); ?></td>
          </tr>
          <tr class="text-white">
            <th>Model:-</th>
            <td></td>
          </tr>
      </tbody>

     </table>

   </div>
 </div>
<div class="col"></div>

   </div>


  </section>
      <!-- End Navbar -->

 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/personalattentio/public_html/video-streaming/resources/views/artists/profile.blade.php ENDPATH**/ ?>