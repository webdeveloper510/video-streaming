@include('layouts.header')
<div class="seealldata1">

<div class="container">
    @if($videos)
   <div class="row pt-5 mt-5">
   @foreach($videos as $vid)
    @if($flag!='offer')
       <div class="col-md-4 my-3">
       <a href="{{url('artist-video/'.$vid->id)}}">
           <video class="borderhover" width="350px" height="275px" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h3 class="text-white">{{$vid->title}}</h3>
        </a>
    </div>
    @else
    <div class="col-md-4 showoffer1 mb-3">
    <a href="{{url('artistoffers/'.$vid->id)}}">

      <div class="card">
        @if($vid->type=='video')
      <video width="100%" height="240" controls controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">

             Your browser does not support the video tag.
      </video>
      @else
      <img src="{{url('storage/app/public/uploads/'.$vid->audio_pic) }}"/>
      <audio width="100%" height="240" controls controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/audio/'.$vid->media) }}" type="audio/mp3">

             Your browser does not support the video tag.
      </audio>
      @endif

	  <div class="carad-body">
	      <h4 class="card-title text-center text-white"> {{$vid->title}}</h4>
	     
	      <hr class="cardhr">
	      <table class="table table-borderless text-center">
        <tr>
          <th>Media</th>
          <td>{{$vid->type=='video'? 'Video/mp4' :'Audio/mp3' }}</td>
        </tr>
            <tr>
            	<th>Price</th>
            	<td> {{$vid->price}}  <span style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</span>/Minute </td>
              </tr>
	      </table>
	         </div>
   </div>
   </a>
 </div>
 @endif
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
.card {
    background: transparent;
    color: white;
    border:1px solid white;
}
</style>

@include('layouts.footer')