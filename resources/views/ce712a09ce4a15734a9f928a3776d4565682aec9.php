<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
<link rel="stylesheet" href="<?php echo e(asset('design/datatables.min.css')); ?>" />   

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
          margin-top: 25px;
      }
      .dropdown1 {
          border: 1px solid #cbc3c3;
          margin-top: 25px;
      }
      .dropdown12 {
          height: 330px;
          overflow-y: scroll;
      }

      li.nav-item {
          padding: 10px;
      }
      .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
          color: #ffffff;
          background-color: #7b0000;
          border: 1px solid #7b0000;
      }
      input.form-control.price::placeholder {
          color: grey;
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
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Upload Project</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">My Projects</a>
    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          
 <div id="add" class="tab-pane fade">

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
                      <h3>Project</h3>
                      <hr>
                         <?php echo Form::open(['action' => 'AuthController@addRequest', 'method' => 'post']); ?>

                            <?php echo e(Form::token()); ?>


                      <div class="row">
                        <div class="col">
                        <label >Media</label>
                          <div class="dropdown1">
                         
                            <label> 

                               <?php echo e(Form::radio('media', 'audio', false ,['class'=>'media1 audio1'])); ?> Audio
                           
                            </label><br>
                            <label>
                               <?php echo e(Form::radio('media', 'video', true ,['class'=>'media1 video1'])); ?> Video 

                            
                          </label><br>
                      
                        </div>
                           <div class="row">
                           <div class="col">
                             <div class="form-group">
                              <label>Artist Reward</label>
                               <?php echo e(Form::number('total','',['class'=>'form-control price', 'placeholder'=>'PAZ'])); ?>

                             
                            </div>
                            <?php if($errors->first('total')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('total') ?>
                            </div>
                            <?php endif; ?>
                            
                          </div>
                          <div class="col">
                             <div class="form-group quality">
                             <label for="Convert to:">Quality:</label> 
                        <select name="quality" class="form-control" id="quality">
                                  <option value="">Choose ...</option>
                                  <option value="480">480p  </option>
                                  <option value="720">HD 720p </option>
                                  <option value="1080">Full HD 1080p  </option>
                          </select>
                            
                          </div>
                          </div>
                        </div>

                                <div class="form-group">
                              <div class="row">
                              <div class="col">

                                 <label >Duration :</label>
                  <?php echo Form::number('duration', '' , ['class' => 'form-control', 'min'=>0, 'placeholder'=>'Duration']); ?>

                              </div>
                               <?php if($errors->first('duration')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('duration'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="col">
                            <label >Delievery Days :</label>
                            <?php echo Form::number('delieveryspeed', '' , ['class' => 'form-control', 'min'=>0, 'placeholder'=>'Delievery Speed']); ?>

                            </div>
                            <?php if($errors->first('delieveryspeed')): ?>
                            <div class="alert alert-danger">
                              <?php echo $errors->first('delieveryspeed'); ?>
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
              <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'rows' => 11, 'cols' => 40])); ?>

                      </div>
                <?php if($errors->first('description')): ?>
                <div class="alert alert-danger">
                     <?php echo $errors->first('description'); ?>
                </div>
                <?php endif; ?>
                        
                      </div>
                      <div class="col">
                        <div class="dropdown12 " id="video1">
                           <h4 style="color:black !important;">Video </h4>
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
                           <h4 style="color:black !important;">Audio </h4>
                                      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($cat->type=='audio'): ?>
                             <label class=""> 
                               <?php echo e(Form::checkbox('categories[]', $cat->id)); ?>

                               <?php echo e($cat->category); ?> 
                             </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                      </div>

                      <div class="collapse pt-4" id="collapseAdvance" style="background-color:black">
                <?php echo $__env->make('popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
              </div>

                    </div>

                    </div>
                     <?php echo e(Form::submit('Upload Now!',['class'=>'btn btn-primary mb-4'])); ?>

  <input type="button" class="btn btn-primary mb-4 mr-3" data-toggle="collapse" href="#collapseAdvance" role="button" aria-expanded="false"  aria-controls="collapseAdvance" value=" Advance Filter option  &#8594;" >
                     <?php echo e(Form::close()); ?>

                  </div>
              </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   
   <div id="my" class="tab-pane fade">
        <div class="row">
            <div class="col-md-12 mb-5">
                <h3 class="text-center  mt-3">My Projects</h3>
              <hr>   
             
                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Your Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Title</th>
                        <th scope="col">Media</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Username</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Status</th>
                        <th>Artist Description</th>
                       <!--  <th scope="col">Action</th>
                         -->
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <th scope="row"><?php echo e($index+1); ?></th>
                        <td><?php echo e($req->description); ?></td>
                        <td><?php echo e($req->price); ?></td>
                       
                        <td><?php echo e($req->title); ?></td>
                        <td><?php echo e($req->media); ?></td>
                        <td><?php echo e($req->duration); ?></td>
                        <td><?php echo e($req->user_name); ?></td>
                         <td><?php echo e($req->category_name); ?></td>
                         <td><?php echo e($req->status); ?></td>
                         <td><?php echo e($req->artist_description); ?></td>
                        <!--  <td><button class=" status" data-toggle="modal" data-target="#editdescription" onclick="editdesc('<?php echo e($req->id); ?>','<?php echo e($req->description); ?>')">Edit</button></td> -->
                      </tr>
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                  </table>
            </div>
        </div>
        </div>

             
        </div>
        </div>
  

<!-- <div class="modal fade" id="editdescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php echo Form::open(['action' => 'artist@editDescription', 'method' => 'post']); ?>

          <?php echo e(Form::token()); ?>

          <?php echo e(Form::label('Your Description', 'Your Description')); ?> 
                <?php echo e(Form::textarea('Description',null,['class'=>'form-control description','rows' => 4, 'cols' => 40])); ?>


       <input type="hidden" name="reqId" value="" id="offerid">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php echo e(Form::submit('Update!',['class'=>'btn btn-primary'])); ?>

      </div>
         <?php echo e(Form::close()); ?>

    </div>
  </div>
</div> -->

</div>
<style>
.collapse.show {
    display: block;
    background: white !important;
    height: 350px;
    color: black !important;
    overflow-y: scroll;
}
.row.text-left.text-white.mt-3.red {
    color: black !important;
}
</style>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/all_requests.blade.php ENDPATH**/ ?>