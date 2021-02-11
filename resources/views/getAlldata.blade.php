@include('layouts.header')
<div class="seealldata1">

<div class="container">
    @if($videos)
   <div class="row pt-5 mt-5">
   @foreach($videos as $vid)
       <div class="col-md-4 my-3">
       <a href="{{url('artist-video/'.$vid->id)}}">
           <video class="borderhover" width="350px" height="275px" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h3 class="text-white">{{$vid->title}}</h3>
        </a>
    </div>
    @endforeach
    @else
    <div class="row pt-5 mt-5">
   @foreach($audio as $aud)
       <div class="col-md-4 my-3">
            <div class="borderhover">
            <a href="{{url('artist-video/'.$aud->id)}}">
               <img src="{{$aud->audio_pic ? url('storage/app/public/uploads/'.$aud->audio_pic): 'https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg'}}">
           <audio width="350px" height="275px" controls controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
            Your browser does not support the video tag.
          </audio>
          <h3 class="text-white">{{$aud->title}}</h3>
          </a>
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