@include('layout.cdn')
<div class="header py-3">
 <a href="{{url('/')}}"><img src="{{asset('images/logos/good_quality_logo.png')}}" width="100px" alt="CoolBrand">
 
 </a></div>
 <div class="container">
   <div class="row mb-5 mt-5">
   	<div class="col"></div>
      <div class="col-md-6">
        <div class="successs p-3 text-center">
        	<img src="https://images.vexels.com/media/users/3/157931/isolated/preview/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png" width="300px">
        	<h1>Thank You! </h1>
            <h3> Email Verified Please click Log in </h3>

            <a href="{{url('/login')}}"><button type="button" class="btn btn-primary">Login</button></a>
        </div>
      </div>
      <div class="col"></div>
   </div>
 </div>

 <style type="text/css">
 	.successs.p-3 {
    margin-top: 27px;
}
button.btn.btn-primary:hover {
    background: #0062cc;
}
.header {
    background: #881114;
}
.header img {
    display: block;
    margin: -8px auto;
}
  </style>