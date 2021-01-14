<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

       <style>

</style>
   

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
         
        <div class="row">
            <div class="col-md-12">
                   <div class="alert alert-success text-center" style="display: none" id="messge" role="alert">
              </div>
                <h2 class="text-center my-5 pt-5">List Of Requests</h2>
                <div class="dropreq">
                <select class="custom-select">
                    <option selected>All</option>
                    <option value="1">New</option>
                    <option value="2">In Process</option>
                    <option value="3">Due</option>
                  </select>
                </div>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Title</th>
                        <th scope="col">Media</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Username</th>
                        <th scope="col">Categories</th>
                        <th scope="col"> Status</th>
                        <th scope="col">Add Description</th>
                        <th scope="col">Artist Description</th>
                         <th>Action</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
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
                 <td>
                    <?php if($req->artist_description): ?>
                        <button class="btn"  onclick="getId('<?php echo e($req->id); ?>')" data-toggle="modal" data-target="#descri">Edit Description
                        </button>
                    <?php else: ?>
                         <button class="btn"  onclick="getId('<?php echo e($req->id); ?>')" data-toggle="modal" data-target="#descri">Add Description
                        </button>
                    <?php endif; ?>
                </td>


                        <td>
                           <?php echo e($req->artist_description); ?> 
                        </td>


                         <td>
        <input type="radio" name ="r1" class="action" user-id="<?php echo e($req->userid); ?>" data-key="<?php echo e($req->id); ?>" value="Accepted" >Accepted
         <input type="radio" name ="r1" user-id="<?php echo e($req->userid); ?>" class="action" data-key="<?php echo e($req->id); ?>" value="Rejected">Rejected
                         </td>
                      
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                  </table>
                  </div>
            </div>
        </div>

    </div>
<div class="modal fade" id="descri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php echo Form::open(['action' => 'artist@addDescription', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

          <?php echo e(Form::label('Your Description', 'Your Description')); ?> 
                <?php echo e(Form::textarea('Description',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40])); ?>


       <input type="hidden" name="reqId" value="" id="reqid">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php echo e(Form::submit('Update!',['class'=>'btn btn-primary'])); ?>

      </div>
         <?php echo e(Form::close()); ?>

    </div>
  </div>
</div>
  </body>
  <style type="text/css">
    
    button.btn.btn-warning.text-white.mr-3.mt-2 {
    height: 36px !important;
    padding-top: 3px !important;
    background-color: #ffbb11 !important;
}
  </style>
  <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
</html><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/request.blade.php ENDPATH**/ ?>