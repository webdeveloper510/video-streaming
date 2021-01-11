<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="background1">
<div class="container">
<div>
           <?php if(session('success')): ?>
        <div class="alert alert-success">
        <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
      </div>

<div class="row mt-5 pt-5">
    <div class="col-md-3">
        <div class="columesdashboard">
           <h1>345</h1>
           <h4>Order/Project <br>Due</h4>
        </div>
    </div>
    <div class="col-md-3">
    <div class="columesdashboard">
           <h1>345</h1>
           <h4>Order/Project <br>In Process</h4>
        </div>    
    </div>
    <div class="col-md-3">
    <div class="columesdashboard">
           <h1>345</h1>
           <h4>Offer<br> Online</h4>
        </div>     
    </div>
    <div class="col-md-3">
    <div class="columesdashboard">
           <h1>345</h1>
           <h4>Collection Items <br>Online</h4>
        </div>     
    </div>
</div>

<div class="row">
    <div class="col-md-4">
             <div class="card" style="width: 18rem;">
             <h5 class="card-title text-left pt-3 pl-3">New Messages:</h5>
             <hr>
              <div class="card-body">
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
              </div>
            </div>
    </div>
    <div class="col-md-4">
         <div class="card" style="width: 18rem;">
             <h5 class="card-title text-left pt-3 pl-3">Earnings:</h5>
             <hr>
              <div class="card-body text-center">
                <h3 class="card-title">Today:</h3>
                <h5>4500 PAZ</h5>
                <h3 class="card-title">This Month:</h3>
                <h5>144 250 PAZ</h5>
                <h3 class="card-title">This Year:</h3>
                <h5>1 526 568 PAZ</h5>
              </div>
            </div>
    </div>
    <div class="col-md-4">
         <div class="card" style="width: 18rem;">
             <h5 class="card-title text-left pt-3 pl-3">Additional Requests:</h5>
             <hr>
              <div class="card-body">
                <h5>customername  <button type="button" class="btn btn-primary ml-4">Open</button></h5>
                <h5>customername  <button type="button" class="btn btn-primary ml-4">Open</button></h5>
                <h5>customername  <button type="button" class="btn btn-primary ml-4">Open</button></h5>
                
              </div>
            </div>
    </div>
</div>
</div>
</section>


<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/dashboard_home.blade.php ENDPATH**/ ?>