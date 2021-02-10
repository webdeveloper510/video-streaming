<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="background1">
        <div class="row">
          <div class="col"></div>
          <div class="col-lg-10">
    <div class="overlay1 text-white">
   <div class="slider_tittle text-center pb-4">
      <h3 class="tittle text-center">Withdraw Money <span class="iconss"> !   <div class="data">
         <h3> PAZ Service Fee :20%</h3>
         <h3> Level 3 <small>(you save)</small>: 6%</h3>
         <hr>
         <h3>Current Fee : <span> 14%</span></h3>
      </div> </span>
      </h3>
         
   </div> 
     <div class="row">
          <div class="col-md-12">
       <div class="out_withdraw">
           <div class="row">
          <div class="col-md-4">
    
           <div class="amount">Enter PAZ Amount <br>
              <input type="text" class="form-control" id="calculate_tokens" placeholder="PAZ Amount">
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
           <div class="money"><button class="btn btn-success" onclick="myFunction()" id="myBtn">Withdraw</button></div> </div></div>
           <hr>
           <div class="row">
            <div class="col-md-8">
       

         <div class="text_one"><p>Invite other passionate Artists to grow their business on PAZ and you both get rewarded with $150 USD! <span class="firsttext">!  
           <div class="firsttextbody">
            <p>The pay-out occurs when the invited Artist achieves Level 3 (400Subscribers) and a total income of +20 000 PAZ</p>
           </div>
         </span>
         </p>

         <p>Get 10% of our revenue on every new customer you have invited as passive income ! 
         <span class="secondtext">!  
           <div class="secondtextbody">
            <p>Every time we collect our service fee on the customers token purchase you get 10% of it passively</p>
           </div>
         </span>
         </p>
         </div>
       </div>
       <div class="col-md-4 mt-4 text-center">
          <div class="money"><button class="btn btn-primary" onclick="myFunction()" id="myBtn">Copy Link</button></div>
        </div>
       </div>
      </div>
     </div> 
     </div>
    </div>      
  </div>
  <div class="col"></div>
   </div>
</section>  
       
      <!-- End Navbar -->
     <style>
     .background1{
        height:100vh !important;
     }
     .overlay1 {
   
    margin-top: 18% !important;
  
}
span.iconss {
    vertical-align: super;
    font-size: 14px;
    border: 1px solid;
    border-radius: 50%;
    padding: 0px 4px;
    cursor: pointer;
}
.data {
    background: white;
    color: black;
    width: 200px;
    position: absolute;
    padding: 10px;
    right: 151px;
    margin-top: -40px;
    z-index: 99999999999 !important;
    display: none;
}
span.iconss:hover .data {
    display: block !important;
}
.data hr {
    margin: 5px;
}
.data h3 {
    font-size: 12px;
    padding: 0px;
    margin: 0px;
}
span.firsttext {
    font-size: 14px;
    width: 50px;
    border: 1px solid white;
    padding: 0px 6px;
    cursor: pointer;
    border-radius: 50%;
}
span.secondtext {
    font-size: 14px;
    width: 50px;
    cursor: pointer;
    border: 1px solid white;
    padding: 0px 6px;
    border-radius: 50%;
}
span.secondtext:hover .secondtextbody{
   display:block !important;
} 
span.firsttext:hover .firsttextbody{
   display:block !important;
} 
.firsttextbody {
    display: none;
    background: white;
    color: black;
    padding: 7px;
    font-size: 12px;
    margin-top: -18px;
}
.secondtextbody {
    display: none;
    background: white;
    color: black;
    padding: 7px;
    font-size: 12px;
    margin-top: -18px;
}
.firsttextbody p {
    padding: 0px;
    margin: 0px;
}
.secondtextbody p {
    padding: 0px;
    margin: 0px;
}
 </style>

 <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\xampp\htdocs\video-streaming\resources\views//withdraw.blade.php ENDPATH**/ ?>