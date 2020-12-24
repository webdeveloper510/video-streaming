@include('layouts.header')

<div class="container">
   <div class="row">
   @foreach($offer as $offerdata)
      <div class="col-md-12">
      <div class="artistoffer row">
        <div class="col-md-2">
        <video width="100%" height="100%" controls>
                <source src="{{url('storage/app/public/video/'.$offerdata->media) }}" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>
      </div>
        <div class="col-md-8 pl-5">
        <h2><a href="">{{$offerdata->title}}</a></h2>
         <p>{{$offerdata->description}}</p>
           
         
        </div>
        <div class="col-md-2">
         <h4>{{$offerdata->price}}/min PAZ</h4>
        </div>
        <hr>
        </div>
      </div>
        @endforeach
      
   	</div>
   </div>



	<style type="text/css">
		.row hr {
    width: 100%;
}
.checked {
  color: orange;
}
	</style>
	
@include('layouts.footer')