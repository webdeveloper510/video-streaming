@include('layouts.header')
<div class="seealldata1">

<div class="container">
<div class="choosebutton text-right pt-3" style="{{$flag=='offer' ? 'display:none' : 'display:block'}}"> 
<button type="button" class="btn btn-primary bardot">Select</button>
</div>
<div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-2">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-2">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
      <div class="col-md-2">
      <ul class="selected">
            
           </ul>
      </div>
    <div class="col-md-3 pt-3">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-3 pt-3">
           <button type="button" class=" btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div>
   <div class="modal" role="dialog" id="exampleModal" >
    </div>
    @if($videos)
   <div class="row pt-5">
   @foreach($videos as $vid)
    @if($flag!='offer' && $vid->profile_video!='yes')
       <div class="col-md-4 my-3">
       <div class="videotags row">
            <div class="col-4 blue text-left">
           <h4>Stream</h4>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4 green text-right" style="{{$vid->is_download==0 ? 'display:none' : 'display:block'}}">
            <h4>Download</h4>
            </div>

         </div>
       <div class="checkall" style="display:none">
          <form> 
          <input type="checkbox" class="slct_video" id="{{$vid->id}}" data-id="{{$vid->price}}"></form></div>
       <a href="{{url('artist-video/'.$vid->id)}}">
           <video class="borderhover" poster="{{url('storage/app/public/uploads/'.$vid->audio_pic) }}" width="350px" height="275px"  allowfullscreen controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <h3 class="text-white">{{$vid->title}}</h3>
        </a>
    </div>
    @else
    <div class="col-md-4 showoffer1 mb-3" style="{{$vid->offer_status=='offline' ? 'display:none' : 'display:block'}}">
    <a href="{{url('artistoffers/'.$vid->id)}}">

      <div class="card" >
        @if($vid->type=='video')
        <div class="checkall" style="display:none">
          <form> 
          <input type="checkbox" class="slct_video" id="{{$vid->id}}" data-id="{{$vid->price}}"></form></div>
      <video width="100%" height="240" poster="{{url('storage/app/public/uploads/'.$vid->audio_pic) }}" controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">

             Your browser does not support the video tag.
      </video>
      @else
      <div class="checkall" style="display:none">
          <form> 
          <input type="checkbox" class="slct_video" id="{{$vid->id}}" data-id="{{$vid->price}}"></form></div>
      <video width="100%" height="240" poster="{{url('storage/app/public/uploads/'.$vid->audio_pic) }}"  controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">

             Your browser does not support the video tag.
      </video>
      @endif

	  <div class="carad-body">
	      <h4 class="card-title text-center text-white"> {{$vid->title}}</h4>
	     
	      <hr class="cardhr">
	      <table class="table table-borderless text-center">
        <tr>
          <th>Category</th>
          <td>{{$vid->category}}</td>
        </tr>
        <tr>
          <th>Media</th>
          <td>{{$vid->type=='video'? 'Video/mp4' :'Audio/mp3' }}</td>
        </tr>
            <tr>
            	<th>Price</th>
            	<td> <span style="color:gold;">{{$vid->price}}  <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></span>/Minute </td>
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

    @if($aud->type=='audio' && $aud->profile_video!='yes')
       <div class="col-md-4 my-3">
            <div class="borderhover">
            <a href="{{url('artist-video/'.$aud->id)}}">
               <img src="{{$aud->audio_pic ? url('storage/app/public/uploads/'.$aud->audio_pic): 'https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg'}}">
           <audio width="350px" height="275px" poster="{{url('storage/app/public/uploads/'.$aud->audio_pic) }}" controlsList="nodownload" disablePictureInPicture>
            <source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
            Your browser does not support the video tag.
          </audio>
          <h3 class="text-white">{{$aud->title}}</h3>
          </a>
          </div>

 </div>
 @endif
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
    padding:0px !important;
}
.seealldata1{
    background:black;
    color:white;
}
.Playlist1 {
    max-height: 216px;
    overflow-y: scroll;
    padding-top: 10px;
}
.card {
    background: transparent;
    color: white;
    border:1px solid white;
}
.card:hover{
  border:1px solid yellow;
}
.checkall input {
    width: 20px;
    height: 20px;
    position: absolute;
    left: 17px;
    z-index: 9;
}
.choose1 .row {
   
   color: #000 !important;
}.choose1 {
   border: 2px solid;
   position: fixed;
   bottom: 10px;
   z-index: 9999999;
   background: white;
   width: 96% !important;
   right: 13px !important;
  
   box-shadow: 0 6px 12px #00000042;
}
</style>

@include('layouts.footer')