@include('layouts.header')
<div class="seealldata1">

<div class="container">
    @if($videos)
   <div class="row pt-5 mt-5">
   @foreach($videos as $vid)
       <div class="col-md-4 my-3">
           <video class="borderhover" width="350px" height="275px" controls allowfullscreen>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
    </div>
    @endforeach
    @else
    <div class="row pt-5 mt-5">
   @foreach($audio as $aud)
       <div class="col-md-4 my-3">
            <div class="borderhover">
                  <img src="{{asset('images/logos/voice.jpg')}}">
           <audio width="350px" height="275px" controls>
            <source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
            Your browser does not support the video tag.
          </audio>
          </div>
 </div>
    @endforeach
@endif
    </div>

{{$videos ? $videos->links(): $audio->links()}}



</div>
</div>
<style>
.col-md-4 img {
    height: 165px;
    padding-left: 7px;
    margin-bottom: -23px;
}
.borderhover:hover {
    border:2px solid yellow;

}
.seealldata1{
    background:black;
    color:white;
}
</style>

@include('layouts.footer')