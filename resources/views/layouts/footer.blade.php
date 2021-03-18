


<!--footer -->
<footer class="footer_style_2">
  <div class="container">
        <div class="row">
       
          <div class="col-md-12">
            <div class="main-heading left_text text-center">
              <h2>Additional links</h2>
            </div>
            <hr>
            
            <ul class="footer-menu">
              <li style="border-left-color: red;
                  border-left-style: solid;
                  border-left-width: 1px;">
              <a href="{{url('/terms')}}"><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
               <li><a href="{{url('/acceptable')}}"><i class="fa fa-angle-right"></i> Acceptable Use Policy</a></li>
               <li><a href="{{url('/privacy')}}"><i class="fa fa-angle-right"></i> Privacy policy</a></li>
               <li><a href="{{url('/dmca')}}"><i class="fa fa-angle-right"></i> DMCA Policy</a></li>
             
              <li><a href="{{url('/cookie')}}"><i class="fa fa-angle-right"></i> Cookie Policy</a></li>
            
              <li><a href="{{url('/disclaimer')}}"><i class="fa fa-angle-right"></i> Disclaimer</a></li>
              <li><a href="{{url('/userWithdraw')}}"><i class="fa fa-angle-right"></i>  Withdrawal</a></li> 
              <li><a href="#" data-toggle="modal" data-target="#exampleModal10"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                <!-- Modal -->
                <div class="modal modal2" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header ">
                      {!!Form::open(['id'=>'customer_issue','method' => 'post', 'files'=>true])!!}
               {{Form::token()}}
                      <div class="form-group"style=" width: 80%;">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="customer_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email to the public.</small>
                        </div>
                        
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
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
                                    <option value="Techincal Issue">Techincal Issue</option>
                                    <option value="General">General</option>
                                    <option value="Website Fees">Website Fees</option>
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

                    {{Form::close()}}
                    
                    </div>
                  </div>
                </div>
            </ul>
          </div>


       
      <div class="cprt">
      <p>BETA Version 1.0</p>
        <p>PAZ LLC © Copyrights 2021 Design by PAZ LLC</p>
      </div>
    </div>
  </div>
</footer>
<style>
  div#exampleModal10 {
    background: transparent;
}
</style>

    