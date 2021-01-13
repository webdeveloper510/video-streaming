@include('layouts.header')


<div class="container">
    @if($videos)
   <div class="row">
   @foreach($videos as $vid)
       <div class="col-md-4">
           <video width="350px" height="275px" controls allowfullscreen>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
    </div>
    @endforeach
    @else
    <div class="row">
   @foreach($audio as $aud)
       <div class="col-md-4">
           <audio width="350px" height="275px" controls allowfullscreen>
            <source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
            Your browser does not support the video tag.
          </audio>
 </div>
    @endforeach
@endif
    </div>

{{$videos ? $videos->links(): $audio->links()}}



</div>