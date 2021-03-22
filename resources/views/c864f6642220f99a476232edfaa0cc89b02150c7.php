<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="faq mt-5 pt-4">
    <div class="container">
        <div class="faqimg">
             <img src="" class="img-fluid">
        </div>
        <div class="row">
           
            <div class="col-md-8">
                <div class="faqtext">
                <h1>FAQ's</h1>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <b class="text-dark"> How does status of orders change?</b>
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                        Orders that are coming in are always in status “New Order”<br>
                         By clicking on the green box, you will get directly to the list of new orders.<br>
                         Orders that you have seen in detail by expanding the order in the list will get the status “In Process”<br>
                         By clicking on the orange box, you will get directly to the list of the orders in process.<br>
                         Orders for which you have less than 24 hours left get the status “Due” <br>
                         By clicking on the red box, you will get directly to the list of due orders.
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <b class="text-dark">Where can I look up detailed information about my earnings?</b>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        You can click on the earnings box in the dashboard where you will get a detailed earnings list.
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingfour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapseTwo">
                            <b class="text-dark"> How do I know if my Customer/Artist invitations were accepted? </b>
                            </button>
                        </h5>
                        </div>
                        <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                        <div class="card-body">
                        On the withdrawal page you can see if you have successfully invited artists and what status they have in relation to the requirements of the invitation bonus. Thepassive revenue of Customer token purchases is also displayed.
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <b class="text-dark">Where can I see that I am getting promoted? </b>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        In the confirmed timeframe you are promoted on the landing page.Additionally, you are also promoted on the homepage of Customers.
                        </div>
                        </div>
                    </div>
                    </div>
                   
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="upcoming">
                    <h3>Upcoming Features</h3>
                    <ul>
                    <li>PAZ-Messenger</li>
                    <li>PAZ-Feed</li>
                    <li>Projects (For Freelancing)</li>
                    <li>PAZ-Live</li>
                    </ul>
                </div>
                <h3>Additional links</h3>
                <ul class="menufooter">
              <li>
              <a href="<?php echo e(url('/terms')); ?>"><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
               <li><a href="<?php echo e(url('/acceptable')); ?>"><i class="fa fa-angle-right"></i> Acceptable Use Policy</a></li>
               <li><a href="<?php echo e(url('/privacy')); ?>"><i class="fa fa-angle-right"></i> Privacy policy</a></li>
               <li><a href="<?php echo e(url('/dmca')); ?>"><i class="fa fa-angle-right"></i> DMCA Policy</a></li>
             
              <li><a href="<?php echo e(url('/cookie')); ?>"><i class="fa fa-angle-right"></i> Cookie Policy</a></li>
            
              <li><a href="<?php echo e(url('/disclaimer')); ?>"><i class="fa fa-angle-right"></i> Disclaimer</a></li>
              <li><a href="<?php echo e(url('/userWithdraw')); ?>"><i class="fa fa-angle-right"></i>  Withdrawal</a></li> 
              <li><a href="#" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-angle-right"></i> Contact Us</a></li>
              <li><a href="<?php echo e(url('/legal-notice')); ?>"><i class="fa fa-angle-right"></i>  Legal Notice</a></li> 
                <!-- Modal -->
                <div class="modal modal2" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header ">
                      <?php echo Form::open(['id'=>'customer_issue','method' => 'post', 'files'=>true]); ?>

               <?php echo e(Form::token()); ?>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="customer_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email to the public.</small>
                        </div>
                        
                      <button type="button" class="close footerclose" data-dismiss="modal" aria-label="Close">X</button>
                      </div>
                      <div class="modal-body">
                      <div class="row">
                        <div class="col"></div>
                         <div class="col-md-8 my-3">
                            <div class="text-center">
                                  <select class="form-select form-control" name="customer_issue" aria-label="Default select example" required>
                                    <option selected> Select Menu</option>
                                    <option value="Feature Request">Feature Request</option>
                                    <option value="Functionality Question">Functionality Question</option>
                                    <option value="Techincal Issue">Technical Issue</option>
                                    <option value="General">General</option>
                                    <option value="Delete Account">Delete Account</option>
                                    <option value="Other">Other</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col"></div>
                          </div>

                        <label>Description</label>
                        <textarea class="form-control" name="customer_description" placeholder="We would like to read your description..." id="floatingTextarea" required></textarea>
                        
                      </div>
                      <div class="pb-3 pr-3 text-right">
                      <div class="alert alert-success" style="display:none"></div>
                      <button class="btn btn-primary" type="submit">Submit</button></div>
                    
                    </div>

                    <?php echo e(Form::close()); ?>

                    
                    </div>
                  </div>
                </div>
            </ul>
            </div>
        </div>
    </div>
</section>
<style>
div#accordion .card-header {
    padding: 0;
}
</style>
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artists/faq.blade.php ENDPATH**/ ?>