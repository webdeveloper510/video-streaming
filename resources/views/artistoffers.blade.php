@include('layouts.header')

<div class="container">

<div class="offer">
<h2>Offer Tittle</h2>
<h5>Audio/Video</h5>
<p>Artistname<br/><i class=""></i>{{$offer[0]->nickname}}</p><button class="btn btn-primary">SUBSCRIBE</button>
<p>Sample</p>
@foreach($offer as $offerdata)
<video width="320" height="240" controls>
  <source src="{{url('storage/app/public/video/'.$offerdata->media) }}" type="video/mp4">
  Your browser does not support the video tag.
</video>
<h4>Description</h4>
<p>{{$offerdata->description}}</p>

<div class="row">
	<div class="col-md-3">
      <h3>Duration</h3>
      <p>5 Min - 20 Min</p>
	</div>
  <div class="col-md-3">
      <h3>Price</h3>
      <p>{{$offerdata->price}}/PAZ</p>
	</div>
  <div class="col-md-3">
      <h3>Category</h3>
      <p>{{$offerdata->category}}</p>
	</div>
  <div class="col-md-3">
      <h3>Delievery Speed</h3>
      <p>{{$offerdata->delieveryspeed}}</p>
	</div>
</div>
<div class="">
	<h3>Set Duration</h3>
	<input type="text" name="duration">
</div>
@endforeach
<button class="btn btn-primary">Order Now</button>
</div>
</div>
	
@include('layouts.footer')