@include('layouts.header')


<div class="container">
   <div class="row">
   @foreach($videos as $vid)
       <div class="col-md-4">
           <video width="350px" height="275px" controls allowfullscreen>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
    </div>
    @endforeach

    </div>

{{$videos->links()}}



</div>