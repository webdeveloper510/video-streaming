@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/artistDetail.css')}}" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="coverimg">
          <img src="{{ isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/cover-dummy.jpg') }}" width="100%" height="500px">
        </div>
        <div class="profileimg">
        <img src="{{ isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/profile-dummy.png') }}" width="200px" height="200px">
        </div>
        <div class="artistdetail11 mb-5">
            <h3>{{isset($details[0]->nickname) ? $details[0]->nickname: $artist[0]->nickname}}  
             <i class="fa fa-star" style="color:red;"></i>  {{isset($countSub[0]) ? $countSub[0] : 0}}  
             <button class="btn btn-danger text-left {{$isSubscribed ? 'hide' : 'block'}}" data-toggle="modal" data-target="#Subscribe" id="subscribe" >Subscribe </button>
    
             <button class="btn btn-warning text-left {{$isSubscribed ? 'block' : 'hide'}}" data-toggle="modal" data-target="#Unsubscribe" id="unsubscribe" >Subscribed </button>
             </h3>
                 
          <!--------------- Button trigger modal -->


<!-- Modal  Subscribe-->
<div class="modal fade" id="Subscribe" tabindex="-1" aria-labelledby="SubscribeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <h3> Subscribe from Artistname</h3>
      <div class="text-center Artistxyz">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
        <button type="button" class="btn btn-primary" onclick="subscribe({{isset($details[0]->contentProviderid) ? $details[0]->contentProviderid: $artist[0]->id}},true)" >Subscribe</button>
        </div>
      </div>
     
    </div>
  </div>
</div>


<!------------------------------------ Modal  unSubscribe------------------------------->
<div class="modal fade" id="Unsubscribe" tabindex="-1" aria-labelledby="UnsubscribeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <h3> Unsubscribe from Artistname</h3>
      <div class="text-center Artistxyz">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
        <button type="button" class="btn btn-primary" onclick="subscribe({{isset($details[0]->contentProviderid) ? $details[0]->contentProviderid: $artist[0]->id}},false)">Unsubscribe</button>
       </div>
      </div>
     
    </div>
  </div>
</div>
          </div>
          <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist" >
    <a class="nav-link tabss " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
    <a class="nav-link tabss" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link tabss active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Collection</a>
    <!-- <a class="nav-link tabss " id="nav-feed-tab" data-toggle="tab" href="#nav-feed" role="tab" aria-controls="nav-feed" aria-selected="false"><i class="fa fa-newspaper-o"> </i> feed</a>
     -->
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">

     <!-- ------------------------------------------Offers videos -------------------------------------------------->

  <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
  
   <h2> Offers</h2>
              
          <div class="container">
                <div class="row mb-5">
                    @if($offerData)

                       @foreach($offerData as $offer)
                    <div class="col-md-12">
                    <div class="artistoffer row">
                      <div class="col-md-2">
                      <video width="100%" class="hoverVideo" height="100%" controls controlsList="nodownload" disablePictureInPicture>
                              <source src="{{url('storage/app/public/video/'.$offer->media) }}" type="video/mp4">
                              
                              Your browser does not support the video tag.
                          </video>
               
                    </div>
       
        <div class="col-md-8 pl-5 showoffer">
        <a target="_blank" href="{{url('artistoffers/'.$offer->id)}}">
           <h2>{{$offer->title}}</h2>
               <p>{{$offer->description}}</p>
                 {{$details[0]->nickname}}
           <br>
         Categories :{{$offer->category}}
         </a>
        </div>
       
        <div class="col-md-2">
         <h4>{{$offer->price}}/min PAZ</h4>
        </div>
        <hr>
      
      </div>
    </div>
    @endforeach
    @else
          <div class="artistoffer1">
            <h4> Artist does not Create any Offer</h4>
          </div>
          @endif
   </div>

    </div>

    <style type="text/css">
    .row hr {
    width: 100%;
}
.text-left.buttons{
    display: inline-flex;
}
.text-left.buttons input {
    width: 300px;
    margin-right: 18px;
}
.text-center.Artistxyz {
    padding: 30px;
}
 </style>
</div>


  <!-------------------------------------------------Contant videos ---------------------------------------------------->

  <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">           
  <div class=" col-md-4" style="float:right;z-index: 9999999 !important;"><select class="form-select form-control" id="change_section" aria-label="Default select example">
      <option selected value="all">All</option>
  <option  value="video">Video</option>
  <option value="audio">Audio</option>

  <!-- <option value="playlist">Playlists</option> -->
  
</select>
</div>
  
   

<div class="choosebutton text-right">
<button type="button" class="btn btn-primary bardot">Select</button>
</div>

  <!-- ----------------------------------------------Simples Videos ------------------------------------------------>
<div class="container">
  <div class="filter_div" id="video">

  <h3 class="mt-3">Videos</h3>   
   
          <div class="row mb-5">
               @if(isset($details[0]->type))
                   @foreach ($details as $detail)
                       @if($detail->type=='video') 
            <div class="col-md-4 mb-3 hover">
                <div class='media_div'>
               <div class="checkall" style="display:none">
               <form> 
                  <input type="checkbox" class="slct_video" id="{{$detail->id}}" data-id="{{$detail->price}}">
               </form></div></div>
               <a href="{{url('artist-video/'.$detail->id)}}">
            <video class="hoverVideo" width="100%"  height="100%" controls  loop="true" controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$detail->media) }}" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>
                </a>
                <div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>

            </div>
                    @endif
                @endforeach
              @else
              <div class="artistvideo">
                <h4> Artist does not upload any video</h4>
              </div>
               @endif
          </div>
          </div>
  <!------------------------------------------------------------Audio Section---------------------------------------------------------------------->      
     <div class="filter_div pb-5" id="audio">
  
     <h3>Audios</h3>
     <div class="row mb-5">
      @if(isset($audio->type))
          @foreach($audio as $aud)

<div class="col-md-4 mb-3">
   <div class="checkall" style="display:none">
   <form> 
   <input type="checkbox" class="slct_video"></form></div>
     <a href="{{url('artist-video/'.$aud->id)}}">
    <img src="{{asset('images/logos/voice.jpg')}}">

<audio controls controlsList="nodownload" disablePictureInPicture>

<source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
Your browser does not support the audio tag.
</audio>

</a>
<div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>
</div>

@endforeach
@else
<div class="artistaudio">
            <h4> Artist does not upload any Audio</h4>
          </div>
@endif
</div>
</div>

  <!-- ---------------------------------------------------Playlists Videos ------------------------------------------------->
  <!-- <div class="filter_div" id="playlist">

         <h3>Playlists</h3>
          <div class="row mb-5 pb-5">
          @foreach ($playlist as $play)
            <?php 
              $videos = explode(',',$play->videos);
              $count = count($videos);
              //print_r($videos);
            ?>
            <div class="col-md-4 mb-3 play1">
            <a href="{{url('playlist/'.$play->id)}}">
                <div class="overlayplay1">
                    <h2 class="text-white">{{$count}}</h2>
                     <i class="fa fa-play"></i>
                </div>
                </a>
            <video width="100%" class="hoverVideo" height="250" controls controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$videos[0]) }}" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>

            
        <h4 class="text-center mb-5">{{$play->playlistname}}</h4>
            </div>
           @endforeach
          </div>
</div> -->
</div>
            <!-- --------------Long videos -------------------->
      
    </div>

    <!-- <div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-12">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-12">
           <ul class="selected">
            
           </ul>
      </div>
      <div class="col-md-12 price">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
    <div class="col-md-12 pt-3 text-center">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-12 pt-3 text-center">
           <button type="button" class="btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div> -->
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
    
    <!-- <div class="tab-pane fade mb-5" id="nav-feed" role="tabpanel" aria-labelledby="nav-feed-tab">
    <p><i class="fa fa-lock"></i> Please subscribe to see the feed. </p>
    </div> -->
  

        <div class="tab-pane fade mb-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
  <!----------------------------------------------- Profile veiw --------------------------------------------->
  
  <div class="container">
      <h2 >Profile</h2>
      <h1>Overview</h1>
      <div class="row">
        <div class="col-md-2 col-sm-2 col-lg-2">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
            <video width="100%" class="hoverVideo" height="100%" controls controlsList="nodownload" disablePictureInPicture>
                      <source src="{{isset($details[0]->media) ? url('storage/app/public/video/'.$details[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4' }}" type="video/mp4">
                      Your browser does not support the video tag.
                  </video>
                  <div class="tooltip text-white"> <i class="fa fa-ellipsis-v" ></i>
  <span class="tooltiptext">You can not download this video</span>
</div>
          </div>
            <div class="col-md-2 col-sm-2 col-lg-2 mb-3">
            </div>
              <div class="col-md-12 col-sm-12 col-lg-12 text-center mt-5">
                <h1>About Me</h1>
                <hr>
                <p>{{$details[0]->aboutme ? $details[0]->aboutme : $artist[0]->aboutme ? $artist[0]->aboutme : 'Not Any Description'}}</p>
              </div>
  
      </div>
      <div class="row text-center text-black">
        @if(isset($details[0]))
      @foreach($details[0] as $key=>$profile)
       @if($key=='gender' || $key=='sexology' || $key=='height' || $key=='privy' || $key=='weight' || $key=='hairlength' ||  $key=='eyecolor' || $key=='haircolor')
            <div class="col-md-3">
                 <label><b>{{ucwords($key)}}</b></label>
                 <p>{{$profile}}</p>
            </div>
          @endif
      @endforeach
      @endif
      </div>
      
        </div>
  
  </div>
  </div>
  
</div>

</div>
</div>
<style>
.fa-lock{
  font-size:30px;
}
div#nav-contact {
    background: #000;
    color: #fff !important;
}
div#nav-contact *{
    color: #fff;
}
select.form-select.form-control, select.form-select.form-control * {
    color: #000 !important;
}
.choose1 .row {
   
    color: #000 !important;
}
.hover:hover video {
    border: 2px solid yellow;
}
.coverimg img {
    object-fit: cover;
}
.price {
 
    padding: 24px 18px;
}

.tooltip {
 opacity:1 !important;
  display: inline-block;
  border-bottom: 1px dotted black;
  right: 39px;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 203px;
    background-color: white;
    color: #000 !important;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
ul.selected li {
    margin: 10px 0px;
}

.price h4 {
    margin: 0;
}

.choose1 {
    border: 2px solid;
    position: fixed;
    bottom: 10px;
    z-index: 9999999;
    background: white;
    width: 96% !important;
    right: 13px !important;
   
    box-shadow: 0 6px 12px #00000042;
}
.profileimg img {
    position: absolute;
    border: 3px solid white;
    margin-top: -149px;
    border-radius: 50%;
}
.close {
     margin-top: 7px;
}

</style>
@include('layouts.footer')
