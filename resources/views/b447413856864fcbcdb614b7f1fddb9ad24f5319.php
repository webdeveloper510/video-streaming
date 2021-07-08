<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header>
   <div class="text-center">
      <img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" height="50" alt="CoolBrand">
      <h1 class="text-white mt-2"> Support Team</h1>
   </div>
</header>
<section class=" support">
   <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
         <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Open Ticket</a>
      </li>
      <li class="nav-item" role="presentation">
         <a class="nav-link" id="pills-Aritst-tab" data-toggle="pill" href="#pills-Aritst" role="tab" aria-controls="pills-Aritst" aria-selected="false">Aritst Support</a>
      </li>
      <li class="nav-item" role="presentation">
         <a class="nav-link" id="pills-message-tab" data-toggle="pill" href="#pills-message" role="tab" aria-controls="pills-message" aria-selected="false">Site Update info</a>
      </li>
   </ul>
   <div class="tab-content" id="pills-tabContent">
      <!--------- Open  ticket tab------------------------------------------>
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <div class="row">
            <div class="col"></div>
            <div class="col-md-8">
               <div class="ticketstext">
                  <label>Subject</label>
                  <select class="custom-select mb-4">
                     <option selected>Select menu</option>
                     <option value="1">Feature Request</option>
                     <option value="2">Functionality Question</option>
                     <option value="3">Technical Issue</option>
                     <option value="4">General</option>
                     <option value="5">Website Fees</option>
                     <option value="6">Delete Account</option>
                     <option value="7">Other</option>
                  </select>
                  <label>Search for Artist</label>
                  <form class="form-group my-2 my-lg-0 mb-4">
                     <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                  <div class="description mt-3">
                     <label>Message</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <br>
                  <input type="file" class="form-control" placeholder="add file">
                  <div class="text-right">
                     <button type="button" class="btn btn-primary my-4">Submit</button>
                  </div>
               </div>
            </div>
            <div class="col"></div>
         </div>
      </div>
      <!--------- tickets tab------------------------------------------>
      <div class="tab-pane fade " id="pills-message" role="tabpanel" aria-labelledby="pills-message-tab">
         <div class="row">
            <div class="col"></div>
            <div class="col-md-8">
               <div class="ticketstext">
                  <label>Subject</label>
                  <select class="custom-select mb-4">
                     <option selected>Select menu</option>
                     <option value="1">Feature Request</option>
                     <option value="2">Functionality Question</option>
                     <option value="3">Technical Issue</option>
                     <option value="4">General</option>
                     <option value="5">Website Fees</option>
                     <option value="6">Delete Account</option>
                     <option value="7">Other</option>
                  </select>
                  <label>Search for Artist</label>
                  <form class="form-group my-2 my-lg-0 mb-4">
                     <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                  <div class="description mt-3">
                     <label>Message</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <br>
                  <input type="file" class="form-control" placeholder="add file">
                  <div class="text-right">
                     <button type="button" class="btn btn-primary my-4">Submit</button>
                  </div>
               </div>
            </div>
            <div class="col"></div>
         </div>
      </div>
      <!--------- tickets tab------------------------------------------>
      <div class="tab-pane fade" id="pills-Aritst" role="tabpanel" aria-labelledby="pills-Aritst-tab">
         <div class="row">
            <div class="col"></div>
            <div class="col-md-8">
               <div class="text-center mb-4">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                     <label class="btn btn-outline-secondary active">
                     <input type="radio" name="options" id="option1" checked> New
                     </label>
                     <label class="btn btn-outline-secondary">
                     <input type="radio" name="options" id="option2"> Open
                     </label>
                     <label class="btn btn-outline-secondary">
                     <input type="radio" name="options" id="option3"> Closed
                     </label>
                  </div>
               </div>
               <div class="opentickettext">
                  <div class="row">
                     <div class="col-7">
                        <a href="#" data-toggle="modal" data-target="#chat">
                           <h3>#34567893 - Technical Issue</h3>
                           <p>Last Updated: Monday,21.march,2021(15:03)</p>
                        </a>
                     </div>
                     <div class="col-3">
                        <p>Artist Name</p>
                     </div>
                     <div class="col-2 mt-4">
                        <button type="button" class="btn btn-primary">Open</button>
                        <button type="button"  disable class="btn btn-primary" style="display:none;">Close</button>
                     </div>
                     <!-- Button trigger modal -->
                     <!-- Modal -->
                     <div class="modal fade" id="chat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h3>Artist Name</h3>
                              </div>
                              <div class="modal-body">
                                 <div class="chat1">
                                    <p>hello</p>
                                    <div class="input-group mb-3">
                                       <input type="text" class="form-control" placeholder="Message" aria-label="Recipient's username" aria-describedby="button-addon2">
                                       <div class="input-group-append">
                                          <button class="btn btn-outline-secondary" type="button" ><i class="material-icons"id="button-addon2">send</i></button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>
            <div class="col"></div>
         </div>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="open" tabindex="-1" aria-labelledby="openLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <p>close if you are sure that the artist has no open questions.</p>
                  <h3>  Close Ticket?   </h3>
                  <div class="text-center">
                     <button type="button" class="btn btn-primary">No</button>
                     <button type="button" class="btn btn-Success">Yes</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="cchat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="chat1">
                     <p>hello</p>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Message" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                           <button class="btn btn-outline-secondary" type="button" ><i class="material-icons"id="button-addon2">send</i></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <hr>
   </div>
   </div>
   <div class="col"></div>
   </div>
   </div>
   </div>
   </div>
</section>
<style>
   section.support {
   margin-top: 1%;
   }
   .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
   color: #1d0101;
   background-color: white;
   }
   ul#pills-tab {
   background: #7b0000;
   color: white !important;
   }
   li.nav-item {
   width: 33.33%;
   text-align: center;
   }
   li.nav-item a {
   color: white;
   }
   header {
   background: #7b0000;
   padding: 11px;
   }
</style>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/support-team.blade.php ENDPATH**/ ?>