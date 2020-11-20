<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   

  <style type="text/css">
      .io {
        height: 300px;
      }
      .nav-tabs {
    border: 1px solid #dee2e6;
    margin-top: 7%;
    background: none; 
}
.dropdown12 {
    border: 1px solid #cbc3c3;
}
.dropdown1 {
    border: 1px solid #cbc3c3;
}

li.nav-item {
    padding: 10px;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #ffffff;
    background-color: #7b0000;
}
.fade:not(.show) {
    opacity: 1;
}
  </style>
  </head>
  <body>
 
<div class="container">  

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Request</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">My Request</a>
    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          
 <div id="add" class="tab-pane fade">
                      <h3>Request</h3>
                      <hr>
                         <?php echo Form::open(['action' => 'AuthController@addRequest', 'method' => 'post']); ?>

                            <?php echo e(Form::token()); ?>

                      <div class="row">
                        <div class="col">
                          <div class="dropdown1">
                           <h4 >Media</h4>
                            <label class=""> 

                               <?php echo e(Form::radio('media', 'audio', true ,['class'=>'media1 audio1'])); ?> Audio
                           
                            </label><br>
                            <label>
                               <?php echo e(Form::radio('media', 'video', false ,['class'=>'media1 video1'])); ?> Video 

                            
                          </label><br>
                      
                        </div>
                           <div class="row">
                          <div class="col">
                             <div class="form-group">
                              <label >Pay</label>
                               <?php echo e(Form::text('price','',['class'=>'form-control price', 'placeholder'=>'PAZ/Min'])); ?>

                             
                            </div>
                            <?php if($errors->first('price')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('price') ?>
                            </div>
                            <?php endif; ?>
                          </div>
                          OR
                           <div class="col">
                             <div class="form-group">
                              <label class="text-white">Total Price</label>
                               <?php echo e(Form::text('total','',['class'=>'form-control price', 'placeholder'=>'PAZ'])); ?>

                             
                            </div>
                            <?php if($errors->first('total')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('total') ?>
                            </div>
                            <?php endif; ?>
                          </div>
                        </div>

                                <div class="form-group">
                               <label >Duration (in Minutes)</label><hr>
                              <div class="row">
                              <div class="col">

                                 <label >Min :</label>
                  <?php echo Form::number('min', '' , ['class' => 'form-control', 'min'=>0, 'placeholder'=>'Min']); ?>

                              </div>
                               <?php if($errors->first('min')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('min'); ?>
                            </div>
                            <?php endif; ?>
                              <div class="col">
                                 <label >Max :</label>
                          <?php echo Form::number('max', '' , ['class' => 'form-control', 'min'=>0, 'placeholder'=>'Max']); ?>

                              </div>
                               <?php if($errors->first('max')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('max'); ?>
                            </div>
                            <?php endif; ?>
                            </div>
                            </div>
                
                      </div>
                      <div class="col">
                             
                            <div class="form-group">
                              <label>Title</label>
                            <?php echo e(Form::text('title','',['class'=>'form-control'])); ?>

                            </div>
                            <?php if($errors->first('title')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('title'); ?>
                            </div>
                            <?php endif; ?>

                                      <div class="form-group">
                      <label >Description</label>
              <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 6, 'cols' => 40])); ?>

                      </div>
                <?php if($errors->first('description')): ?>
                <div class="alert alert-danger">
                     <?php echo $errors->first('description'); ?>
                </div>
                <?php endif; ?>


                    
                            
                        
                      </div>
                      <div class="col">
                        <div class="dropdown12 " id="video1">
                           <h4>Categories </h4>
                                      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($cat->type=='video'): ?>
                             <label class=""> 
                               <?php echo e(Form::checkbox('categories[]', $cat->id)); ?>

                               <?php echo e($cat->category); ?> 
                             </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                      </div>
                        <div class="dropdown12 " id="audio1">
                           <h4>Categories </h4>
                                      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($cat->type=='audio'): ?>
                             <label class=""> 
                               <?php echo e(Form::checkbox('categories[]', $cat->id)); ?>

                               <?php echo e($cat->category); ?> 
                             </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                      </div>

                    </div>

                    </div>
                     <?php echo e(Form::submit('Upload Now!',['class'=>'btn btn-primary mb-4'])); ?>

                     <?php echo e(Form::close()); ?>

                  </div>
              </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   
   <div id="my" class="tab-pane fade">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-md-10 io">
                <h2 class="text-center mb-5 mt-3">My Requests</h2>
                
             
                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Title</th>
                        <th scope="col">Media</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Username</th>
                        <th scope="col">Categories</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <th scope="row"><?php echo e($index); ?></th>
                        <td><?php echo e($req->description); ?></td>
                        <td><?php echo e($req->price); ?></td>
                       
                        <td><?php echo e($req->title); ?></td>
                        <td><?php echo e($req->media); ?></td>
                        <td><?php echo e($req->duration); ?></td>
                        <td><?php echo e($req->user_name); ?></td>
                         <td><?php echo e($req->category_name); ?></td>
                      </tr>
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                  </table>
            </div>
            <div class="col">
                
            </div>
        </div>
        </div>

             
        </div>
        </div>
  



</div>


    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  </body>

</html>
<?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/all_requests.blade.php ENDPATH**/ ?>