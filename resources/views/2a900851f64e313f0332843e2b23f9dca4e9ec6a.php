<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
    <title>Hello, world!</title>

<style type="text/css">
  
.total {
    width: 40%;
    float: right;
    margin-top: 30px;
}


</style>




  </head>
  <body>
    <div class="container pt-5">
      <div class="">
       <h1>Cart</h1>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">P.No.</th>
            <th scope="col">Video</th>
            <th scope="col">Price</th>
            <th scope="col"> Quantity</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
      <tbody>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
           <th scope="row"><?php echo e($index); ?></th>
           <td><video width="200px" height="200px" controls="">
             <source src="<?php echo e(url('storage/app/public/video/'.$carts->media)); ?>" type="">
           </video></td>
           <td><?php echo e($carts->price); ?></td>
           <td>1</td>
           <td><?php echo e($carts->price); ?></td>
        </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

   </table>
     <div class="row">
     <div class="col-md-6">
      
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Coupen Code" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Apply</button>
  </form>
</div>
    <div class="col-md-6 text-right">
      <button class="btn btn-success " type="button">Update Cart</button>

     </div>
     </div>

    <div class="row">
      <div class="col-md-12">
        <div class="total">
        <h2>Cart Total</h2>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Subtotal</th>
      <td scope="col">$100.00</td>
   
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Total</th>
      <td>$<?php echo e($totalPrice[0]->total_price); ?></td>
        </tr>
   
  </tbody>
</table>
        <button class="btn btn-danger " type="button">Proceed To Checkout</button>



      </div>

    </div>
     </div>



    </div>
     </div>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/cart.blade.php ENDPATH**/ ?>