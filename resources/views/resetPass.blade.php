
@include('layouts.header')

<section class="background1">
	 <div class="container mt-5 mb-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6 need_bg text-white mt-5">
          
          <h1 class="text-white">Reset Password</h1>
	      <form>
			  <div class="form-group">
			    <label>New Pasword</label>
			    <input type="password" class="form-control" Placeholder="New Password" >
			 </div>
			  <div class="form-group">
			    <label>Confirm Password</label>
			    <input type="password" class="form-control"Placeholder="Confirm Password">
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	  </div>
   </div>
</section>




@include('layouts.footer')