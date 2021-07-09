@include('layout.cdn')
<header>
   <div class="text-center">
      <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
      
      <h1 class="text-white mt-2"> Bank Account Information</h1>
   </div>
</header>

<div class="container">

              <div class="row my-5">
              <div class="col"></div>
              <div class="col-md-6">
                <div class="card">
                <div class="card-header text-center">
                <h3> Bank Account</h3>
                </div>
                <div class="card-body">
                <form>
                      <div class="form-group">
                        <label >Accout no. or IBAN:</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Your Name/Company:</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Your Address</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Bank Name </label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Bank address</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>

                      <div class="form-group">
                        <label >BIC</label>
                        <input type="text" class="form-control" >
                      </div>
                    
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                </div>
                </div>
                <div class="col"></div>
                </div>
                </div>
                <style>
                 header {
   background: #7b0000;
   padding: 11px;
   }
   </style>
  @include('layouts.footer')