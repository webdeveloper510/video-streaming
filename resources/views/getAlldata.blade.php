@include('layouts.header')


<div class="container">
    @if($videos)
   <div class="row pt-5 mt-5">
   @foreach($videos as $vid)
       <div class="col-md-4 my-3">
           <video width="350px" height="275px" controls allowfullscreen>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
    </div>
    @endforeach
    @else
    <div class="row pt-5 mt-5">
   @foreach($audio as $aud)
       <div class="col-md-4 my-3">
       <img src="{{asset('images/logos/voice.jpg')}}">
           <audio width="350px" height="275px" controls>
            <source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
            Your browser does not support the video tag.
          </audio>
 </div>
    @endforeach
@endif
    </div>

{{$videos ? $videos->links(): $audio->links()}}



</div>
<style>
.col-md-4 img {
    height: 165px;
    padding-left: 7px;
    margin-bottom: -23px;
}
</style>

@include('layouts.footer')