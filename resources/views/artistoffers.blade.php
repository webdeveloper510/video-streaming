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
<?php 
$GLOBALS['id'] = $offerdata->id;
$GLOBALS['user_id'] = $offerdata->userid;
$GLOBALS['price'] = $offerdata->price;
?>
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
      <p>{{$offerdata->min}}Min -{{$offerdata->max}} Min</p>
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
      <p>{{$offerdata->delieveryspeed}} Days</p>
	</div>
</div>
{!!Form::open(['id'=>'form_sub',  'method' => 'post'])!!}
<input type="hidden" name="user_id" value="{{$GLOBALS['id'].'_'.$GLOBALS['user_id']}}"/>
<input type="hidden" name="price" value="{{$GLOBALS['price']}}"/>
<div class="col-md-4">
	<h3>Set Duration</h3>
  {{Form::number('duration', '',['class'=>'form-control','placeholder'=>'Duration'])}}
</div>
@endforeach
<h4>Additional Description<small>(not guaranteed)</small></h4>
{{Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 30])}}
<div class="text-right">
{{ Form::submit('Order Now!',['class'=>'btn btn-primary mb-5 btn-lg', 'name'=>'submit']) }}
</div>
{{ Form::close() }}
</div>
</div>
	
@include('layouts.footer')