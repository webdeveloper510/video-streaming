@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/artistDetail.css')}}" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="coverimg">
          <img src="{{ isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/cover-dummy.jpg') }}" width="100%" height="300px">
        </div>
        <div class="profileimg">
        <img src="{{ isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/profile-dummy.png') }}" width="200px" height="200px">
        </div>
        <div class="artistdetail11 mb-5">
            <h3>{{isset($details[0]->nickname) ? $details[0]->nickname: $artist[0]->nickname}}  
             <i class="fa fa-star" style="color:red;"></i>  761  
             <button class="btn btn-danger text-left {{$isSubscribed ? 'hide' : 'block'}}" onclick="subscribe({{isset($details[0]->id) ? $details[0]->contentProviderid: $artist[0]->id}},true)" id="subscribe">Subscribe </button>
    
             <button class="btn btn-warning text-left {{$isSubscribed ? 'block' : 'hide'}}" id="unsubscribe" onclick="subscribe({{isset($details[0]->id) ? $details[0]->contentProviderid: $artist[0]->id}},false)">Subscribed </button>
             </h3>
            <button class="btn btn-light text-right msg mb-3" type="button"> Send Message</button>
            <br>
               <div class="text-left buttons">
                     <input type="text" id="paz_amount"  placeholder="PAZ Amount" class="form-control ">
                     <button class="btn btn-info" data-id="{{isset($details[0]->id) ? $details[0]->contentProviderid: $artist[0]->id}}" id="addTip" type="button">Send Tip</button>
                     <strong id="total_paz" style="display:none">{{$userProfile ? $userProfile[0]->tokens: ''}}</strong>
               </div>
          </div>
          <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist" >
    <a class="nav-link tabss " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
    <a class="nav-link tabss" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link tabss active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Collection</a>
    <a class="nav-link tabss " id="nav-feed-tab" data-toggle="tab" href="#nav-feed" role="tab" aria-controls="nav-feed" aria-selected="false"><i class="fa fa-newspaper-o"> </i> feed</a>
    
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">

     <!-- ------------------------------------------Offer videos -------------------------------------------------->

  <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
  
   <h2> Offers</h2>
              
          <div class="container">
                <div class="row mb-5">
                    @if($offerData)

                       @foreach($offerData as $offer)
                    <div class="col-md-12">
                    <div class="artistoffer row">
                      <div class="col-md-2">
                      <video width="100%" height="100%" controls>
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
 </style>
</div>


  <!-------------------------------------------------Contant videos ---------------------------------------------------->

  <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">           
  <div class=" col-md-4" style="float:right;z-index: 9999999 !important;"><select class="form-select form-control" id="change_section" aria-label="Default select example">
      <option selected value="all">All</option>
  <option  value="video">Video</option>
  <option value="audio">Audio</option>

  <option value="playlist">Playlists</option>
  
</select>
</div>
  
   <h3 class="mt-3">Videos</h3>

<div class="choosebutton text-right">
<button type="button" class="btn btn-primary bardot">Select</button>
</div>

  <!-- ----------------------------------------------Simples Videos ------------------------------------------------>

  <div class="filter_div" id="video">   
   
          <div class="row mb-5">
               @if($details)
                   @foreach ($details as $detail)
                       @if($detail->type=='video') 
            <div class="col-md-4 mb-3 hover">
                <div class='media_div'>
               <div class="checkall" style="display:none">
               <form> 
                  <input type="checkbox" class="slct_video" id="{{$detail->id}}" data-id="{{$detail->price}}">
               </form></div></div>
               <a href="{{url('artist-video/'.$detail->id)}}">
            <video width="100%" height="100%" controls>
                <source src="{{url('storage/app/public/video/'.$detail->media) }}" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>
                </a>

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
     <!----------------------------------------------Audio Section------------------------------------------------------------>      
     <div class="filter_div" id="audio">
  
     <h3>Audios</h3>
     <div class="row mb-5">
      @if($audio)
          @foreach($audio as $aud)

<div class="col-md-4 mb-3">
   <div class="checkall" style="display:none"><form> 
   <input type="checkbox" class="slct_video"></form></div>
     <a href="{{url('artist-video/'.$aud->id)}}">
    <img src="{{asset('images/logos/voice.jpg')}}">

<audio controls>

<source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
Your browser does not support the audio tag.
</audio>
</a>
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
  <div class="filter_div" id="playlist">

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
            <video width="100%" height="250" controls>
                <source src="{{url('storage/app/public/video/'.$videos[0]) }}" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>

            
        <h4 class="text-center mb-5">{{$play->playlistname}}</h4>
            </div>
           @endforeach
          </div>
</div>

            <!-- --------------Long videos -------------------->
      
    </div>

    <div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-12">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-12">
           <ul class="selected">
            <li>Name of the item <span class="delete"><i class="fa fa-trash"></i></span> </li>
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
  </div>
   <div class="modal" role="dialog" id="exampleModal" >
    </div>
    
    <div class="tab-pane fade mb-5" id="nav-feed" role="tabpanel" aria-labelledby="nav-feed-tab">
    <p><i class="fa fa-lock"></i> Please subscribe to see the feed. </p>
    </div>
  

        <div class="tab-pane fade mb-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
  <!----------------------------------------------- Profile veiw --------------------------------------------->
  
  <div class="container">
      <h2 >Profile</h2>
      <h1>Overview</h1>
      <div class="row">
        <div class="col-md-2 col-sm-2 col-lg-2">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
            <video width="100%" height="100%" controls>
                      <source src="{{isset($details[0]->media) ? url('storage/app/public/video/'.$details[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4' }}" type="video/mp4">
                      Your browser does not support the video tag.
                  </video>
                  
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
    flex-direction: column;
    color: #000 !important;
}
.hover:hover video {
    border: 2px solid yellow;
}

.price {
    border-top: 1px solid #0000003d;
    border-bottom: 1px solid #0000003d;
    padding: 24px 18px;
}
ul.selected {
    margin-bottom: 30px;
}
.choosebutton.text-right button {
    margin-top: -30%;
    margin-right: 17px;
}

.price h4 {
    margin: 0;
}
.choose1 * {
    color: #000 !important;
}
.choose1 {
    border: 2px solid;
    position: fixed;
    bottom: 10px;
    z-index: 9999999;
    background: white;
    width: 25% !important;
    right: 13px !important;
    height: 100% !important;
    box-shadow: 0 6px 12px #00000042;
}
.close {
     margin-top: 7px;
}
</style>
@include('layouts.footer')
