<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header>
<div class="text-center">
<img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" height="50" alt="CoolBrand">
<h1 class="text-white mt-2"> Content Review</h1>
</div>
</header>


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Reported Items</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Upload Verifying</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">History</a>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  
  <section class="reportmeadia">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="text-center">
                <h3>Oldest : <span>0h</span>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
                <h3>In Queue : <span>0</span>
          </div>
      </div>
    </div>
    <?php $__currentLoopData = $notVerified; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is_not_veryfy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <div class="row media">
          <div class="col-md-4">
          <?php if($is_not_veryfy->type=='video'): ?>
          <video width="100%" controls>
            <source src="<?php echo e(url('storage/app/public/video/'.$is_not_veryfy->media)); ?>" type="video/mp4">
            </video>
            <?php else: ?>
            <audio width="100%" controls>
            <source src="<?php echo e(url('storage/app/public/audio/'.$is_not_veryfy->media)); ?>" type="audio/mp3">
            </audio>
            <?php endif; ?>
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3><?php echo e($is_not_veryfy->title); ?></h3>
                <p> <?php echo e($is_not_veryfy->description); ?> </p>
                     <div class="text-right buttons">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#legal" type="button">Start Review</button>
                         <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



  </div>
</section>
  
  
  </div>

  <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">


<div class="table table-responsive">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date_issued</th>
      <th scope="col">Date_reviewed</th>
      <th scope="col">Action</th>
      <th scope="col">Type</th>
      <th scope="col">Artist</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>



</div>

</div>

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    
  <section class="reportmeadia">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="text-center">
                <h3>Oldest : <span>0h</span> </h3>

                <select class="custom-select my-2"">
                    <option selected>All</option>
                    <option value="1">Audio</option>
                    <option value="2">Video</option>
                    <option value="3">Projects</option>
                    <option value="4">Orders</option>
                  </select>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
                <h3>In Queue : <span>0</span> </h3>

                <button class="btn btn-outline-primary my-2"  data-toggle="modal" data-target="#deny" type="button" >Start Reviewing</button>
          </div>
      </div>
      <div class="col-md-12 text-center my-4">
        
      </div>
    </div>
    <?php $__currentLoopData = $notVerified; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is_not_veryfy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row media" style="<?php echo e($is_not_veryfy->team_user_id == 1 || $is_not_veryfy->team_user_id=='' ? 'display:block' : 'display:none'); ?>">
    <div class="col-md-4">
    <?php if($is_not_veryfy->type=='video'): ?>
    <video width="100%" controls>
      <source src="<?php echo e(url('storage/app/public/video/'.$is_not_veryfy->media)); ?>" type="video/mp4">
      </video>
      <?php else: ?>
      <audio width="100%" controls>
      <source src="<?php echo e(url('storage/app/public/audio/'.$is_not_veryfy->media)); ?>" type="audio/mp3">
      </audio>
      <?php endif; ?>
     </div>
     <div class="col-md-8">
       <div class="reportitems">
          <h3><?php echo e($is_not_veryfy->title); ?></h3>
          <p> <?php echo e($is_not_veryfy->description); ?> </p>
               <div class="text-right buttons">
               <button class="btn btn-primary " data-toggle="modal" data-target="#legal_<?php echo e($is_not_veryfy->id); ?>" type="button" onClick="startReviw(<?php echo e($is_not_veryfy->id); ?>)">Start Review</button>
                   <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                    <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                  </div>
          </div>
     </div>
 </div>


 <div class="modal fade" id="legal_<?php echo e($is_not_veryfy->id); ?>" tabindex="-1" role="dialog" aria-labelledby="legalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
 <div class="data">
    <h3>Title : <?php echo e($is_not_veryfy->title); ?></h3>
    <p>Artist</p>
    <video width="100%" height="340" controls>
    <source src="<?php echo e(url('storage/app/public/video/'.$is_not_veryfy->media)); ?>" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <p class="text-center">Trustlevel : <span>0</span></p>

  <div class="row">
    <div class="col-md-6 text-center">
       <button class="btn btn-primary" type="button" oNClick="permit(<?php echo e($is_not_veryfy->id); ?>,true)">Permit</button>
    </div>
   <div class="col-md-6 text-center">
      <button class="btn btn-primary" type="button" onClick="permit(<?php echo e($is_not_veryfy->id); ?>,false)">Deny</button>
   </div>
 </div>
 <p><b>Description :<?php echo e($is_not_veryfy->description); ?></b> ..........</p>
</div>
</div>
</div>

</div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </section>
  
  </div>
</div>



<!-- Modal -->




<!-- Modal -->
<div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="denyLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="data">
          <h3>Title</h3>
          <p>Artist</p>
          <video width="100%" height="340" controls>
          <source src="movie.mp4" type="video/mp4">
          <source src="movie.ogg" type="video/ogg">
          Your browser does not support the video tag.
        </video>
        <p class="text-center">Trustlevel : <span>0</span></p>

        <div class="row">
          <div class="col-md-6 text-center">
             <button class="btn btn-primary" type="button">deny</button>
          </div>
         <div class="col-md-6 text-center">
            <button class="btn btn-primary" type="button">Permit</button>
         </div>
       </div>
       <p><b>Description :</b> ..........</p>
  </div>
  </div>
      </div>
     
    </div>
  </div>
</div>





<style>
.text-right.buttons {
    position: absolute;
    top: 0;
    right: 20px;
}
li.nav-item {
    width: 33.33%;
    text-align: center;
    padding: 10px;
    background: #7b0000;
    color: white !important;
}
li.nav-item  a{
 color:white;
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