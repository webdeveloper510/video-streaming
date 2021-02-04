@include('artists.dashboard')

<div class="container">

<div class="offer ">
<h2 style=" margin-top: 10% !important;">Offer Tittle</h2>
<h5>Audio/Video</h5>
<p>{{$offer[0]->nickname}} <i class="fa fa-star"></i>  {{$offer[0]->count}} </p>
</div>
<p>Sample</p>
@foreach($offer as $offerdata)
<?php 
$GLOBALS['id'] = $offerdata->id;
$GLOBALS['user_id'] = $offerdata->userid;
$GLOBALS['artistid'] = $offerdata->artistid;

$GLOBALS['price'] = $offerdata->price;
?>
<div class="container">
<video width="100%" height="340" controls controlsList="nodownload" disablePictureInPicture>
  <source src="{{url('storage/app/public/video/'.$offerdata->media) }}" type="video/mp4">
  Your browser does not support the video tag.
</video>
</div>
<h4>Description</h4>
<p>{{$offerdata->description}}</p>

<div class="row">
	<div class="col">
      <h3>Duration</h3>
      <p>{{$offerdata->min}}Min -{{$offerdata->max}} Min</p>
	</div>
  <div class="col">
      <h3>Media</h3>
      <p>video</p>
  </div>
  <div class="col">
      <h3>Price</h3>
      <p>{{$offerdata->price}}/PAZ</p>
  </div>
  <div class="col">
      <h3>Quality</h3>
      <p>1080p</p>
	</div>
  <div class="col">
      <h3>Category</h3>
      <p>{{$offerdata->category}}</p>
	</div>
  <div class="col">
      <h3>Delievery Speed</h3>
      <p>{{$offerdata->delieveryspeed}} Days</p>
	</div>
</div>




@endforeach

</div>
<div class="alert alert-success show_alert" role="alert" style="display:none">
  A simple success alert—check it out!
</div>
</div>
	
@include('artists.dashboard_footer')