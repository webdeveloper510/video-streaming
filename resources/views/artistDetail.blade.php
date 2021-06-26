@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/artistDetail.css')}}" />
<div class="row">
   <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="coverimg">
         <img src="{{ $details[0]->cover_photo ? url('storage/app/public/uploads/'.$details[0]->cover_photo) : asset('images/paz_logo_high_quality__.png') }}" width="100%" height="500px">
      </div>
      <div class="profileimg">
         <img src="{{ $details[0]->profilepicture ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/profile-dummy.png')}}" width="200px" height="200px">
      </div>
      <div class="artistdetail11 mb-5">
         <h3>{{isset($details[0]->nickname) ? $details[0]->nickname: $artist[0]->nickname}}  
            <i class="fa fa-star" style="color:red;"></i>  {{isset($countSub[0]) ? $countSub[0] : 0}}  
            <button class="btn btn-danger text-left {{$isSubscribed ? 'hide' : 'block'}}" id="subscribe" onclick="subscribe({{isset($details[0]->contentProviderid) ? $details[0]->contentProviderid: $artist[0]->id}},true)" >Subscribe </button>
            <button class="btn btn-warning text-left {{$isSubscribed ? 'block' : 'hide'}}" data-toggle="modal" data-target="#Unsubscribe" id="unsubscribe" >Subscribed </button>
         </h3>
         <!------------------------------------ Modal  unSubscribe------------------------------->
         <div class="modal fade" id="Unsubscribe" tabindex="-1" aria-labelledby="UnsubscribeLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-body">
                     <h3> Unsubscribe from {{$details[0]->nickname}}</h3>
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
            <a class="nav-link tabss " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
            Service(s)
               <div id="offerSelected" class="noti1" style="display:none;"></div>
            </a>
            <a class="nav-link tabss" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
            <a class="nav-link tabss active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
               Collection
               <div id="mediaSelected" class="noti1" style="display:none;">  </div>
            </a>
         </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
         <!-- ------------------------------------------Offers videos -------------------------------------------------->
         <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <h2> Service(s)</h2>
            <div class="container">
               <div class="row mb-5">
                  @if($offerData)
                  @foreach($offerData as $offer)
                  <div class="col-md-12">
                     <div class="artistoffer row">
                        <div class="col-md-2">
                           <video width="100%" poster="{{url('storage/app/public/uploads/'.$offer->audio_pic) }}" class="hoverVideo" height="100%" controls controlsList="nodownload" disablePictureInPicture>
                              <source src="{{url('storage/app/public/video/'.$offer->media) }}" type="video/mp4">
                              Your browser does not support the video tag.
                           </video>
                           <div class="noti" style="{{$offer->notificationseen=='0' && $offer->userid==$login->id && $offer->notiType=='offer'? 'display:block':'display:none'}}"></div>
                           @if($offer->notificationseen=='0' && $offer->notiType=='media') 
                           <script>
                              $('#mediaSelected').show();
                              
                           </script>
                           @endif
                        </div>
                        <div class="col-md-8 pl-5 showoffer">
                           <a target="_blank" href="{{url('artistoffers/'.$offer->id)}}">
                              <h2>{{$offer->title}}</h2>
                              <!-- <p>{{$offer->description}}</p> -->
                              {{$details[0]->nickname}}
                              <br> 
                              Category :{{$offer->category}}
                           </a>
                        </div>
                        <div class="col-md-2">
                           <h4 > <span style="color:gold;">{{$offer->price}} <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b> </span>/min</h4>
                        </div>
                        <hr>
                     </div>
                  </div>
                  @endforeach
                  @else
                  <div class="artistoffer1">
                     <h4>No Service available</h4>
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
               .noti {
               background: blue;
               height: 16px;
               width: 16px;
               border-radius: 50%;
               position: absolute;
               top: 5px;
               right: 11px;
               }
               .noti1 {
               background: blue;
               height: 16px;
               width: 16px;
               border-radius: 50%;
               }
            </style>
         </div>
         <!-------------------------------------------------Contant videos ---------------------------------------------------->
         <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class=" col-md-4" style="float:right;z-index: 9999999 !important;">
               <select class="form-select form-control" id="change_section" aria-label="Default select example">
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
                              </form>
                           </div>
                        </div>
                        <a href="{{url('artist-video/'.$detail->id)}}">
                           <video class="hoverVideo" id="detail_{{$detail->id}}" poster="{{url('storage/app/public/uploads/'.$detail->audio_pic) }}" width="100%"  height="100%"   loop="true" controlsList="nodownload" disablePictureInPicture>
                              <source src="{{url('storage/app/public/video/'.$detail->media) }}" type="video/mp4">
                              Your browser does not support the video tag.
                           </video>
                           <div class="noti" style="{{$detail->notification=='media' && $detail->userid==$login->id && $detail->is_seen=='0' ? 'display:block' : 'display:none'}}"></div>
                        </a>
                        @if($detail->is_seen=='0' && $detail->userid==$login->id && $detail->notification=='media') 
                        <script>
                           $('#mediaSelected').show();
                           
                        </script>
                        @endif
                        <div class="pricetime">
                           <div class="text-left">
                              <h6 class="text-white">{{$detail->price}}<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
                           </div>
                           <div class="text-right">
                              <h6 class="text-white" id="duration1_{{$detail->id}}">{{ $detail->duration ? $detail->duration :'' }}</h6>
                           </div>
                        </div>
                     </div>
                     @endif
                     @if($detail->duration=='' || $detail->duration=='NaN:NaN:NaN')
                     <script>
                        var video;
                         var id;
                           setTimeout(() => {
                           video = $("#detail_"+"{{$detail->id}}");
                           seconds_to_min_sec(video[0].duration,"#duration1_"+"{{$detail->id}}","{{$detail->id}}");
                         }, 2000);
                     </script>
                     @endif
                     @endforeach
                     @else
                     <div class="artistvideo">
                        <h4> No video available.</h4>
                     </div>
                     @endif
                  </div>
               </div>
               <!------------------------------------------------------------Audio Section---------------------------------------------------------------------->      
               <div class="filter_div pb-5" id="audio">
                  <h3>Audios</h3>
                  <div class="row mb-5">
                     @if($audio[0]->type)
                     @foreach($audio as $aud)
                     <div class="col-md-4 mb-3">
                        <div class="checkall" style="display:none">
                           <form> 
                              <input type="checkbox" class="slct_video">
                           </form>
                        </div>
                        <a href="{{url('artist-video/'.$aud->id)}}">
                           <img width="100%" src="{{asset('images/logos/voice.jpg')}}">
                           <audio controls controlsList="nodownload" disablePictureInPicture>
                              <source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
                              Your browser does not support the audio tag.
                           </audio>
                           <div class="noti" style="{{$aud->notification=='media' && $aud->userid==$login->id && $aud->is_seen=='0' ? 'display:block' : 'display:none'}}"></div>
                        </a>
                        @if($aud->is_seen=='0' &&  $aud->userid==$login->id && $aud->notification=='media') 
                        <script>
                           $('#mediaSelected').show();
                           
                        </script>
                        @endif
                        <div class="pricetime">
                           <div class="text-left">
                              <h6 style="color:yellow !important;">{{ $aud->price}}/<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
                           </div>
                           <div class="text-right">
                              <h6 class="text-white">{{$aud->duration}}</h6>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @else
                     <div class="artistaudio">
                        <h4> No Audio available.</h4>
                     </div>
                     @endif
                  </div>
               </div>
               <!-- ---------------------------------------------------Playlists Videos ------------------------------------------------->
           
            </div>
            <!-- --------------Long videos -------------------->
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
                     <video width="100%" height="100%" poster="{{url('storage/app/public/uploads/'.$overview->audio_pic) }}" Controls controlsList="nodownload" disablePictureInPicture>
                        <source src="{{$overview ? url('storage/app/public/video/'.$overview[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4' }}" type="video/mp4">
                        Your browser does not support the video tag.
                     </video>
                     <div class="report-op">
                        <i class="fa fa-ellipsis-v" onclick="showop()"></i>
                        <ul style="display:none;" class="reporting">
                           <li><button class="btn btn-outline-light btn-sm text-dark"data-toggle="modal" data-target="#reportvideo" type="button">Report</button></li>
                        </ul>
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
<script>
   var artistid="{{$artistid}}";
   setTimeout(function(){ 
       removeBadge(artistid);
    }, 10000);
</script>
<style>
   .col-md-12.col-sm-12.col-lg-12.text-center.mt-5 p {
   font-size: 20px;
   padding: 29px;
   line-height: 29px;
   }
   .fa-lock{
   font-size:30px;
   }
   .pricetime .text-right h6 {
   background: black;
   width: auto;
   float: right;
   color: white !important;
   padding: 10px;
   }
   .pricetime .text-left h6 {
   padding: 10px;
   color: gold !important;
   font-weight: 800;
   background:black;
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
   object-fit: fill;
   }
   .price {
   padding: 24px 18px;
   }
   .pricetime .text-left {
   float: left;
   padding-left: 10px;
   margin-top:-5px;
   }
   .pricetime .text-right {
   margin-top: -47px;
   margin-right: 7px;
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
   ul.reporting {
   background: #efefef;
   width: 241px;
   margin-left: 50%;
   box-shadow: 0 3px 6px #00000026;
   padding: 8px 6px 8px;
   text-align: left;
   position: absolute;
   font-size: 13px;
   }
   .report-op {
   position: absolute;
   top: 6px;
   right: 33px;
   cursor: pointer;
   z-index: 0;
   }
   .close {
   margin-top: 7px;
   }
   @media only screen and (max-width: 768px) {
   .coverimg img {
   object-fit: contain;
   }
   .col-md-12.col-sm-12.col-lg-12.text-center.mt-5 p {
   font-size: auto;
   padding: 10px;
   line-height: auto;
   }
   }
</style>
<!-- Modal -->
<div class="modal modal2" id="reportvideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header ">
            <div class="row" style="width: 100%;">
               <div class="col"></div>
               <div class="col-md-8 my-3">
                  <div class="text-center">
                     <select class="form-select form-control " aria-label="Default select example">
                        <option selected> Select Menu</option>
                        <option value="1">Harmful </option>
                        <option value="2">Underage</option>
                        <option value="3">Misleading </option>
                        <option value="7">Other</option>
                     </select>
                  </div>
               </div>
               <div class="col"></div>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
         </div>
         <div class="modal-body">
            <label>Description</label>
            <textarea class="form-control"minlength="50" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
         </div>
         <div class="pb-3 pr-3 text-right">
            <button class="btn btn-primary" type="button">Submit</button>
         </div>
      </div>
   </div>
</div>
</div>
<script>
   function showop(){
   //alert("asas");
   $(".reporting").toggle();
   }
</script>
@include('layouts.footer')