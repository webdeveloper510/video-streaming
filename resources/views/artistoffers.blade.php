@include('layouts.header')

<div class="container">

<div class="offer ">
<h2 style="    margin-top: 10% !important;">Offer Tittle</h2>
<h5>Audio/Video</h5>
<p>{{$offer[0]->nickname}} <i class="fa fa-star"></i>  761 </p>
<div class="text-right"><button class="btn btn-primary">SUBSCRIBE</button>
</div>
<p>Sample</p>
@foreach($offer as $offerdata)
<div class="container">
<video width="100%" height="340" controls>
  <source src="{{url('storage/app/public/video/'.$offerdata->media) }}" type="video/mp4">
  Your browser does not support the video tag.
</video>
</div>
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
<div class="col-md-6">
	<h3>Set Duration</h3>
  <div class="row">
                              <div class="col">

                                 <label>Min :</label>
                  <input class="form-control" min="0" placeholder="Min" name="min" type="number" value="">
                              </div>
                                                             <div class="col">
                                 <label>Max :</label>
                          <input class="form-control" min="0" placeholder="Max" name="max" type="number" value="">
                              </div>
                                                           </div>
</div>
@endforeach
<h4>Additional Description<small>(not guaranteed)</small></h4>
<textarea class="form-control mb-4" placeholder="Add Description" id="floatingTextarea2" style="height: 100px"></textarea>
<div class="text-right">
<button class="btn btn-primary mb-5 btn-lg ">Order Now</button>
</div>
</div>
</div>
	
@include('layouts.footer')