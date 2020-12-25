@include('layouts.header')

<div class="container">

<div class="offer">
<h2>Offer Tittle</h2>
<h5>Audio/Video</h5>
<p>Artistname<i class=""></i>761</p><button class="btn btn-primary">SUBSCRIBE</button>
<p>Sample</p>

<video width="320" height="240" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video>
<h4>Description</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

<div class="row">
	<div class="col-md-3">
      <h3>Minimum</h3>
      <p>3min</p>
	</div>
	<div class="col-md-3">
         <h3>Minimum</h3>
      <p>3min</p>
	</div>
	<div class="col-md-3">
       <h3>Minimum</h3>
      <p>3min</p>
	</div>
	<div class="col-md-3">
       <h3>Minimum</h3>
      <p>3min</p>
	</div>
    <div class="col-md-3">
       <h3>Minimum</h3>
      <p>3min</p>
	</div>
</div>
<div class="">
	<h3>Set Duration</h3>
	<input type="text" name="duration">
</div>
<div class="">
	<h3>Set Duration</h3>
	<textarea class="form-control"></textarea>
</div>
<button class="btn btn-primary">Order Now</button>
</div>
	
@include('layouts.footer')