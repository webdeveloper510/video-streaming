@include('layout.cdn')
<header>
   <div class="text-center">
      <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
     
      <h1 class="text-white mt-2"> Paxum Account Information</h1>
   </div>
</header>
<div class="container">
              <div class="row my-5">
              <div class="col"></div>
              <div class="col-md-6">
                <div class="card">
                <div class="card-header text-center">
                <h3> Paxum Account</h3>
                </div>
                <div class="card-body">
               <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Reference</label>
                    <input type="text" class="form-control" placeholder="Optional">
                  </div>
                  <div class="text-center my-3">
                  <button type="submit" class="btn btn-primary">Save</button>
                  </div>
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