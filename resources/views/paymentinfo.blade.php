 
 @include('layout.cdn')
<header>
   <div class="text-center">
      <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
     
      <h1 class="text-white mt-2"> Onboarding : Payment Information</h1>
   </div>
</header>
 
 
 <div class="container-fluid">
<div class="row">
    <div class="col"></div>
    <div class="col-md-8 my-5">
<div class="card">
    <div class="card-header text-center">
        <h5 class="card-title">Payment Method</h5>
        
      </div>
      <div class="card-body text-center">


      <form>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-6 col-form-label">Paxum Account</label>
              <div class="col-sm-6">
                <button class="btn btn-outline-primary"data-toggle="modal" data-target="#panxum" type="button">Enter payout Information</button>
              </div>
            </div>
          </form>
          <p class="text-center my-3">OR</p>
          <form>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-6 col-form-label">Bank Account</label>
              <div class="col-sm-6">
                <button class="btn btn-outline-primary"data-toggle="modal" data-target="#bank" type="button">Enter payout Information</button>
              </div>
            </div>
          </form>
               <button class="btn btn-primary" type="button">Save</button>
      </div>
</div>
</div>
<div class="col">
</div>
</div>
</div>
     <!-- Paxun Account popup -->

       

        <!-- Modal -->
        <div class="modal fade " id="panxum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Paxum Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body py-5">
              {!!Form::open(['id'=>'paxum','method' => 'post'])!!}
          {{Form::token()}} 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input type="email" name="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Reference</label>
                    <input type="text" name="refference" class="form-control" placeholder="Optional">
                  </div>
                  <div class="text-center my-3">
                  <button type="submit" name = "submit" class="btn btn-primary">Save</button>
                  </div>
                  {{ Form::close() }}
              </div>
           
            </div>
          </div>
        </div>


<!-- Bank Account popup -->

            

              <!-- Modal -->
              <div class="modal fade" id="bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bank Account</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    {!!Form::open(['id'=>'paxum','method' => 'post'])!!}
          {{Form::token()}} 
                      <div class="form-group">
                        <label >Accout no. or IBAN:</label>
                        <input type="text" name="acc_number" required class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Your Name/Company:</label>
                        <input type="text" name="company_name" required class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Your Address</label>
                        <input type="text" name="address" required class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Bank Name </label>
                        <input type="text" name="bank_name" required class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Bank address</label>
                        <input type="text" name="bank_address" required class="form-control" placeholder="Enter ">
                      </div>

                      <div class="form-group">
                        <label >BIC</label>
                        <input type="text" name="bic" required class="form-control" >
                      </div>
                    
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                      {{ Form::close() }}
</div>
                    
                  </div>
                </div>
              </div>
     
<style>
                 header {
   background: #7b0000;
   padding: 11px;
   }
   </style>
  @include('layouts.footer')