@include('layout.cdn')
<header>
<div class="text-center">
<img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
<div class="float-right">
<a href="{{url('/logout/default')}}"><button class="btn btn-primery">Logout</button></a>
</div>
<h1 class="text-white mt-2"> Content Review</h1>
</div>

</header>


<div class="container-fluid">
<div class="row">
  <div class="col-md-9">
     
<video width="100%" height="100%" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
</video>

<
  </div>
  <div class="col-md-3">
     <div class="row">
        <div class="col-4">
         
<video width="100%" height="100%" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
</video>
        </div>
        <div class="col-8">
         <h5> Video title</h5>
        </div>  
        <div class="col-4">
         
         <video width="100%" height="100%" controls>
           <source src="movie.mp4" type="video/mp4">
           <source src="movie.ogg" type="video/ogg">
         </video>
                 </div>
                 <div class="col-8">
                  <h5> Video title</h5>
                 </div>  
                 <div class="col-4">
         
         <video width="100%" height="100%" controls>
           <source src="movie.mp4" type="video/mp4">
           <source src="movie.ogg" type="video/ogg">
         </video>
                 </div>
                 <div class="col-8">
                  <h5> Video title</h5>
                 </div>  
                 <div class="col-4">
         
         <video width="100%" height="100%" controls>
           <source src="movie.mp4" type="video/mp4">
           <source src="movie.ogg" type="video/ogg">
         </video>
                 </div>
                 <div class="col-8">
                  <h5> Video title</h5>
                 </div>  
     </div>
  </div>


</div>
</div>

@include('layouts.footer')