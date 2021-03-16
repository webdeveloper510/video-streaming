<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header>
<div class="text-center">
<img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" height="50" alt="CoolBrand">
<h1 class="text-white mt-2"> Reported Items</h1>
</div>
</header>

<section class="reportmeadia">
  <div class="container">
    <h2></h2>
      <div class="row media">
          <div class="col-md-4">
          <video width="100%" controls>
            <source src="movie.mp4" type="video/mp4">
            </video>
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3> Report item title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                     <div class="text-right buttons">
                         <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>
       <div class="row media">
          <div class="col-md-4">
          <video width="100%" controls>
            <source src="movie.mp4" type="video/mp4">
            </video>
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3> Report item title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                     <div class="text-right buttons">
                         <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>
       <div class="row media">
          <div class="col-md-4">
          <video width="100%" controls>
            <source src="movie.mp4" type="video/mp4">
            </video>
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3> Report item title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                     <div class="text-right buttons">
                         <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>




  </div>
</section>
<style>
.text-right.buttons {
    position: absolute;
    top: 0;
    right: 20px;
}

.row.media {
    border: 1px solid black;
    padding: 13px;
    margin-bottom: 12px;
}
header {
    background: #7b0000;
    padding: 11px;
}
  </style>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/report-media.blade.php ENDPATH**/ ?>