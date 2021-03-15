<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('design/withdraw.css')); ?>" />
<section class="background1">
        <div class="row">
          <div class="col"></div>
          <div class="col-lg-10">
    <div class="overlay1 text-white">
   <div class="slider_tittle text-center pb-4">
      <h3 class="tittle text-center">Withdraw Money <span class="iconss"> ? 
    
      <div class="data">
      <?php if($level_system): ?>
      <?php $__currentLoopData = $level_system; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
          <?php if($val['level']==$levelData[0]->level_name): ?>
         <h3> PAZ Service Fee :20%</h3>
         <h3> <?php echo e($val['level']); ?> <small>(you save)</small>: <?php echo e($val['fee']); ?>%</h3>
         <hr>
         <h3>Current Fee : <span><?php echo e(20-$val['fee']); ?>%</span></h3>
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
         <?php endif; ?>
      </div>
  
       </span>
      </h3>
         
   </div> 
     <div class="row">
          <div class="col-md-12">
       <div class="out_withdraw">
           <div class="row">
          <div class="col-md-4">
    
           <div class="amount">Enter PAZ Amount <br>
              <input type="number"  min="0" class="form-control" id="calculate_tokens" placeholder="PAZ Amount">
         </div>
         <input type="hidden" id="fees" value="<?php echo e($levelData ? $levelData[0]->fees : 0); ?>"/>
         <strong class="show_fees" style="color:black"></strong>
        </div>
        <div class="col-md-4">
           <div>Amount 
         <span>($)</span><input type="text" class="form-control" id="real_amount" placeholder="Amount">
         </div> 
        </div>
        <div class="col-md-4 mt-3 text-center">
           <div class="money"><button class="btn btn-success" id="withdrawmoney">Withdraw</button></div> </div></div>
           <hr>
           <div class="row">
            <div class="col-md-8">
       

         <div class="text_one">
         <h6>Invite other passionate Artists to grow their business on PAZ and you both get rewarded with $150 USD! <span class="firsttext">? 
           <div class="firsttextbody">
            <p>The pay-out occurs when the invited Artist achieves Level 3 (400Subscribers) and a total income of +20 000 PAZ</p>
           </div>
         </span>
         </h6>
       <br>
       
         <h6>Get 10% of our revenue on every new customer you have invited as passive income ! 
         <span class="secondtext">?  <div class="secondtextbody">
            <p>Every time we collect our service fee on the customers token purchase you get 10% of it passively</p>
           </div> 
          
         </span>
         </h6>
         </div>
       </div>
       <div class="col-md-4 mt-4 text-center">
          <div class="money"><button class="btn btn-primary" onclick="copy('<?php echo e(url('register/'.$artistid)); ?>')" id="myBtn">Copy Link</button></div>
        </div>
       </div>
      </div>
     </div> 
     </div>
    </div> 

    <div class=" invitedbox">
    <div class="card" >
        <div class="text-center">
       <h3>You've been invited from artistname </h3>
       <h4>Get your $150 USD with :</h4>
            </div>
  <div class="card-body">
    
        <table class="table table-bordered text-center">
  <thead>
    <tr>
      
      <th scope="col">lvl3</th>
      <th scope="col">20k PAZ earned </th>
      <th scope="col">Payout</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
      <td>not yet</td>
      <td>not yet</td>
      <td>-</td>
    </tr>
   
  </tbody>
</table>
  </div>
</div>
    
        </div>





    <div class=" invitedbox">
    <div class="card" >
        <div class="text-center">
       <h3>Total Bonus Payout : $184 USD</h3>
            </div>
  <div class="card-body">
    <h5 class="card-title text-center">Customer Invitations
                <br> 
        passive revenue Stream:  $34 USD</h5>
        <table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">Artists invited</th>
      <th scope="col">lvl3</th>
      <th scope="col">20k PAZ earned </th>
      <th scope="col">Payout</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Artistname</th>
      <td>not yet</td>
      <td>not yet</td>
      <td>-</td>
    </tr>
   
  </tbody>
</table>
  </div>
</div>
    
        </div>
  </div>
  <div class="col"></div>
   </div>
</section>  
       
      <!-- End Navbar -->
     <style>
  
 </style>

 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views//withdraw.blade.php ENDPATH**/ ?>