@include('artists.dashboard')

<link rel="stylesheet" href="{{asset('design/profile.css')}}" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="coverimg">
        <div class="verify text-center cover" style="{{$details[0]->background_verified==0 ? 'display:block' : 'display:none'}}">
                  <h3>Verifying...</h3>
               </div>
               <div class="verifyvideo  den text-center cover" >
               <button type="button"  style="{{$details[0]->background_verified==-1 ? 'display:block' : 'display:none'}}" class="btn btn-danger" data-toggle="modal" data-target="#denied">Denied</button>
            </div>
        <div class="overlayartist text-center">
           <img src=" {{asset('images/loaderartist.gif')}}" class="img-fluid cover_loader" style="display:none">
        </div>
           <img src="{{ $details && $details[0]->cover_photo!='' ? url('storage/app/public/uploads/'.$details[0]->cover_photo) : asset('images/dummy.png') }}" width="100%" height="500px">
          <div class="iconcamera">
        <i class="fa fa-camera image" data-id="cover_photo"></i>

        </div>
        
        <div style="display:none">
        {!!Form::open(['id'=>'filechange','method' => 'post', 'files'=>true])!!}
          {{Form::token()}}   
        <input type="file" class="image_change" name="image" onchange="imageUpdate()"/>
        <input type="hidden" id="image_type" name="image_type" value=""/>
        {{ Form::submit('change!',['class'=>'btn btn-primary mb-4','id'=>'imageChange']) }}

        {{ Form::close() }}
        </div>
        
        </div>
        <div class="profileimg">
        <div class="verifyvideo text-center" style="{{$detail->is_verified==0 ? 'display:block' : 'display:none'}}">
                  <h3>Verifying...</h3>
               </div>
               <div class="verifyvideo den text-center" style="{{$detail->is_verified== -1 ? 'display:block' : 'display:none'}}">
               <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#denied">Denied</button>
            </div>
        <div class="overlayprofile">
           <img src=" {{asset('images/loaderartist.gif')}}" style="display:none" width="100px" height="100px" class="img-fluid profile_loader">
        </div>
        <img src="{{($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/newlogo.png') }}" width="200px" height="200px">
        <div class="iconcamera" >
        <i class="fa fa-camera image" data-id="profilepicture"></i>

        </div>
        
        </div>
        <div class="artistdetail11 mb-5">
            <h3>{{isset($details[0]->nickname) ? $details[0]->nickname: $artist[0]->nickname}}  
             <i class="fa fa-star" style="color:red;"></i>  {{isset($getLevel[0]->countsubscriber) ? $getLevel[0]->countsubscriber:0}}    
            
             </h3>
        
          
          </div>
          <nav>
          <div class="modal fade" id="denied" tabindex="-1" role="dialog" aria-labelledby="deniedLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  
                  <div class="modal-body">
                    <p>We have found this Content to be categorized as
                        harmful / misleading / underge.<br>
                        If we learn that such Content was actively pusued, your account will be 
                        terminated.<br>
                        If you believe you are being treated wrong, please reach out to our support via ticket or directly at 
                        at artist@pornartistzone.com
                        </p>
                  </div>
                  <div class="modal-footer text-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                  
                  </div>
                </div>
              </div>
            </div>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link tabss" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Service(s)</a>
    <a class="nav-link tabss {{$collection_selection ? '' : 'active'}}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link tabss {{$collection_selection ? 'active' : ''}}" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Collection</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

     <!-- ------------------------------------------Offer videos -------------------------------------------------->

  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
  
   <h2> Service(s)</h2>
          <div class="container">
   <div class="row mb-5">
    @if($offerData)

   @foreach($offerData as $offer)
  
      <div class="col-md-12">
   
      <div class="artistoffer row">
        <div class="col-md-2 mt-5">
        <div class="verify text-center" style="{{$offer->is_verified==0 ? 'display:block' : 'display:none'}}">
                  <h3>Verifying...</h3>
               </div>
               <div class="verifyvideo den text-center" style="{{$offer->is_verified== -1? 'display:block' : 'display:none'}}">
                  <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#denied">Denied</button>
            </div>
               <a href=""  data-toggle="modal" data-target="#denied" style="{{$offer->is_verified== -1 ? 'display:block' : 'display:none'}}">Denied</a>
          @if($offer->type=='video')
        <video width="100%"  poster="{{url('storage/app/public/uploads/'.$offer->audio_pic) }}"   controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$offer->media) }}" type="video/mp4">
                
                Your browser does not support the video tag.
         </video>
         @elseif($offer->type=='audio')
         <video width="100%"  poster="{{url('storage/app/public/uploads/'.$offer->audio_pic) }}"   controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$offer->media) }}" type="video/mp4">
                
                Your browser does not support the video tag.
         </video>
         @endif

      </div>
       
        <div class="col-md-8 pl-5 showoffer pt-5">
        <a target="_blank" href="{{url('artist/offers/'.$offer->id)}}">
           <h2>{{$offer->title}}</h2>
               
                 {{$details[0]->nickname}}
           <br>
         Category :{{$offer->category}}
         </a>
        </div>
       
        <div class="col-md-2 text-center">
        
        <h3 class="text-green" style="{{$offer->offer_status == 'offline' ? 'color: red' : 'color: green' }}">{{strtoupper($offer->offer_status)}}</h3>
         <h4 ><span style="color:gold !important">{{$offer->price}} <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></span>/min </h4>
         
         <div class="text-right mr-3">
      <button class="btn btn-sm btn-light delete" table="offer" data-id="{{$offer->id}}"><i class="fa fa-trash-o"></i></button>
          <button type="button" data-toggle="modal" 
          data-target="#myModal" class="btn btn-info btn-sm" 
          onclick="edit_offer({{json_encode($offer)}})">
        Edit</button>
           </div>
        </div>
        <hr>

      
      </div>
    </div>
    @endforeach
    @else
          <div class="artistoffer1 pt-4">
            <h4> No Service published yet </h4>
            <a href="{{url('artist/offer')}}">Publish a Service </a>
          </div>
          @endif
   </div>

    </div>

    <style type="text/css">
        .row hr {
    width: 100%;
  }
  .overlayartist {
    position: absolute;
    top: 0;
    width: 97%;
}

.overlayartist img {
    margin-top: 16%;
} 
.overlayprofile img {z-index: 2;}
 </style>
</div>


  <!-------------------------------------------------Contant videos ---------------------------------------------------->

  <div class="tab-pane fade {{$collection_selection ? 'show active' : ''}}" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">           

   <div class="container">
    <div class="row mb-5">
        <div class="col"> <h2>Collection</h2></div>
        <div class="col"></div>
        <div class="col-md-4 text-right">
       
            <!-- <button type="button" class="btn btn-primary bardot">Choose</button> -->
      <select class="form-select form-control mt-3" id="change_section" aria-label="Default select example">
      <option selected value="all">All</option>
  <option  value="video">Video</option>
  <option value="audio">Audio</option>

  <!-- <option value="playlist">Playlists</option>
   -->
</select>
</div>
</div>

  <!-- ----------------------------------------------Simples Videos ------------------------------------------------>
           <div class="filter_div" id="video">     
  <h3>Videos</h3>  
          <div class="row mb-5 filter_div" id="video">
        @if(isset($details[0]->type))
              @foreach ($details as $detail)
                   @if($detail->type=='video') 
            <div class="col-md-4 mb-3 ">
            <div class="verifyvideo text-center" style="{{$detail->is_verified==0 ? 'display:block' : 'display:none'}}">
                  <h3>Verifying...</h3>
            </div>
            <div class="verifyvideo den text-center" style="{{$detail->is_verified==-1 ? 'display:block' : 'display:none'}}">
            <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#denied">Denied</button>
            </div>
               <div class="checkall" style="display:none">
               <form> 
                  <input type="checkbox" class="slct_video" id="{{$detail->id}}" data-id="{{$detail->price}}">
               </form></div>
               
               <a href="{{url('artistVideo/'.$detail->id)}}">
            <video width="100%" class="hoverVideo" poster="{{url('storage/app/public/uploads/'.$detail->audio_pic) }}"  id="collection_{{$detail->id}}"   controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$detail->media) }}" type="video/mp4">
                
                Your browser does not support the tag.
            </video>
            <div class="pricetime">
                  <div class="text-left">
                  <h6 class="text-white" >{{$detail->price}}<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
                  </div>
                  <div class="text-right">
                  <h6 class="text-white" id="duration1_{{$detail->id}}">{{ $detail->duration ? $detail->duration :'' }}</h6>
                  </div>
                  </div>
            
                </a>
                <div class="edit">
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#media" onclick="editVideoinfo({{json_encode($detail)}})">Edit</button>
               
                <button class="btn btn-sm btn-light delete" table="media" img-src="{{$detail->audio_pic}}" data-url="{{$detail->media}}" data-id="{{$detail->id}}"><i class="fa fa-trash-o"></i></button>
                </div>               
              </div>             
              @if($detail->duration=='' || $detail->duration=='0NaN:0NaN:0NaN')
 
          <script>
            //console.log('eeee');
           var video;
            var id;
              setTimeout(() => {
              video = $("#collection_"+"{{$detail->id}}");
              //console.log(video);
              seconds_to_min_sec(video[0].duration,"#duration1_"+"{{$detail->id}}","{{$detail->id}}");
            }, 2000);
          </script>
          @endif
             @endif
          @endforeach
          @else
          <div class="artistvideo">
          <h4> No <span class="textcolor"> Video </span> uploaded yet </h4>
            <a href="{{url('artist/contentUpload')}}"> <span class="textcolor">Upload Video</span></a>
          </div>
          @endif
          </div>
      </div>
     <!----------------------------------------------Audio Section------------------------------------------------------------>      
    <div class="filter_div" id="audio">
     <h3>Audios</h3>
     <div class="row mb-5">
      @if(isset($audio[0]->type))
          @foreach($audio as $aud)

<div class="col-md-4 mb-3">
<div class="verifyvideo text-center" style="{{$detail->is_verified==0 ? 'display:block' : 'display:none'}}">
                  <h3>Verifying...</h3>
               </div>
               <div class="verifyvideo den text-center" style="{{$detail->is_verified== -1 ? 'display:block' : 'display:none'}}">
               <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#denied">Denied</button>
            </div>
   <div class="checkall" style="display:none"><form> 
   <input type="checkbox" class="slct_video"></form></div>
     <a href="{{url('artistVideo/'.$aud->id)}}">
    <!-- <img src="{{$aud->audio_pic ?  url('storage/app/public/uploads/'.$aud->audio_pic) : asset('images/logos/voice.jpg')}}" width="100%"> -->

<video width="100%" controls controlsList="nodownload" id="audio_{{$aud->id}}" poster="{{url('storage/app/public/uploads/'.$aud->audio_pic) }}" disablePictureInPicture>

<source src="{{url('storage/app/public/video/'.$aud->media) }}" type="video/mp4">
Your browser does not support the audio tag.
</video>
<div class="pricetime">
                  <div class="text-left">
                  <h6 class="text-white">{{$aud->price}}<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h6>
                  </div>
                  <div class="text-right">
                  <h6 class="text-white" id="aud_dur_{{$aud->id}}">{{ $aud->duration ? $aud->duration :'' }}</h6>
                  </div>
                  </div>
</a>
<div class="edit">
<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#media">Edit</button>
<button class="btn btn-sm btn-light delete trans1" table="media" data-id="{{$aud->id}}"><i class="fa fa-trash-o"></i></button>
</div>
</div>
@if($aud->duration=='' || $aud->duration=='0NaN:0NaN:0NaN')
          <script>
           var video;
            var id;
              setTimeout(() => {
              video = $("#audio_"+"{{$aud->id}}");
              seconds_to_min_sec(video[0].duration,"#aud_dur_"+"{{$aud->id}}","{{$aud->id}}");
            }, 2000);
          </script>
          @endif
   
@endforeach
@else
<div class="artistaudio">
<h4> No <span class="textcolor">Audio </span> uploaded yet </h4>
            <a href="{{url('artist/contentUpload')}}"> <span class="textcolor">Upload Audio</span></a>
          </div>
@endif
</div>
</div>

  <!-- ---------------------------------------------------Playlists Videos ------------------------------------------------->
         <!-- <div class="filter_div" id="playlist">
         <h3>Bundles</h3>
          <div class="row mb-5 pb-5 filter_div" id="playlist">
          @foreach ($playlist as $play)
            <?php 
              $videos = explode(',',$play->videos);
              $count = count($videos);
              //print_r($videos);
            ?>
            <div class="col-md-4 mb-3 play1">
                <div class="overlayplay1">
            <h2 class="text-white">{{$count}}</h2>
                <i class="fa fa-play"></i>
           </div>
    
            <video width="100%" height="250" controls controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$videos[0]) }}" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>

            
        <h4 class="text-center mb-5">{{$play->playlistname}}</h4>
            </div>
           @endforeach
          </div>

</div> -->
<!-- --------------------------------------------------------Long videos ----------------------------------------------------------->
      
    </div>

    <div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-3">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-3">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
    <div class="col-md-3 pt-3 text-center">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-3 pt-3 text-center">
           <button type="button" class="btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div>
   <div class="modal" role="dialog" id="exampleModal" >
    </div>
    </div>


        <div class="tab-pane fade mb-5 {{$collection_selection ? '' : 'show active'}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
  <!----------------------------------------------- Profile View --------------------------------------------->
  
  <div class="container">
     
      <h2>Overview</h2>
      <div class="text-right">
   <button type="button" class="btn btn-light" data-target="#myModal1" data-toggle="modal" onclick="change_other_info({{json_encode($details[0])}})">Edit</button>
              </div>
      <div class="row">
      
        <div class="col-md-2 col-sm-2 col-lg-2">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
        <div class="verify text-center" style="{{$random[0]->is_verified==0 ? 'display:block' : 'display:none'}}">
                  <h3>Verifying...</h3>
               </div>
               <div class="verifyvideo den text-center" >
               <button type="button"  class="btn btn-danger" data-toggle="modal" style="{{$random[0]->is_verified== -1 ? 'display:block' : 'display:none'}}" data-target="#denied">Denied</button>
            </div>
          @if(isset($random[0]->type)&&$random[0]->type=='video')
            <video width="100%" height="100%" id="get_duration"  poster="{{url('storage/app/public/uploads/'.$random[0]->audio_pic) }}" controls List="nodownload" disablePictureInPicture>
                      <source src="{{isset($random[0]->media) ? url('storage/app/public/video/'.$random[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4' }}" type="video/mp4">
                      Your browser does not support the video tag.
          </video>
          @else
          <video  poster="{{url('storage/app/public/uploads/'.$random[0]->audio_pic) }}" width="100%" height="100%" id="get_duration"  controls List="nodownload" disablePictureInPicture>
               <source src="{{isset($random[0]->media) ? url('storage/app/public/audio/'.$random[0]->media) :'' }}" type="video/mp4">          
          </video>
          @endif                 
          </div>
            <div class="col-md-2 col-sm-2 col-lg-2 mb-3">
            </div>
              <div class="col-md-12 col-sm-12 col-lg-12 text-center mt-5">
                <h1>About Me</h1>
                
                <hr>
                <p class="edittable">{{isset($details[0]->aboutme) ? $details[0]->aboutme : $artist[0]->aboutme}}</p>
                <hr>
              </div>
  
      </div>
      
      <div class="row text-center text-black">
     
        @if(isset($details[0]))
      @foreach($details[0] as $key=>$profile)
       @if($key=='gender' || $key=='sexology' || $key=='height' || $key=='privy' || $key=='weight' || $key=='hairlength' ||  $key=='eyecolor' || $key=='haircolor')
            <div class="col-md-3 col-6">
              <label><b>{{$key=='weight' ? ucwords('body'): ucwords($key)}}</b></label>
              <p class="edittable">{{$profile}}</p>
            </div>
          @endif
      @endforeach
      @endif
      </div>
      
        </div>
  
  </div>
  </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Service</h4>
                <button type="button" class="close" data-dismiss="modal" data-toggle="#myModal" aria-hidden="true">&times;</button>
                
                <div class="alert alert-success" role="alert" style="display:none">
                           This is a success alert—check it out!
                </div>
                <div class="alert alert-danger" role="alert" style="display:none">
                    This is a danger alert—check it out!
                </div>
            </div>
            <div class="modal-body">
            
              {!!Form::open([ 'id'=>'edit_form', 'method' => 'post','files'=>true])!!}
                   {{Form::token()}}
                  
                 {{Form::label('Title', 'Title')}} 
                  {{Form::text('title', '',['class'=>'form-control','name'=>'title','id'=>'title','required','placeholder'=>'Title'])}}
                  <br>
                   {{Form::label('Price(PAZ)', 'Price(PAZ)')}} 
                     {{Form::number('price', '',['class'=>'form-control','name'=>'price','id'=>'price','required','min'=>0,'placeholder'=>'Price'])}}
                  <br>
                  {{Form::label('Additional Request Price', 'Additional Request Price')}} 
                {{Form::number('additional_price', '',['class'=>'form-control','name'=>'additional_price','required','id'=>'additional_price','min'=>0,'placeholder'=>'Additional Price'])}}
                <br>
                <input type="hidden" class="created_at" name="created_at" value=""/>
               <input type="hidden" class="updated_at" name="updated_at" value=""/>
                  <label>Duration(Minutes):</label>
                  <div class="row">
                  <div class="col-md-6">
                  {{Form::label('Min', 'Min')}} 
                  {{Form::number('min', '',['class'=>'form-control','id'=>'min','min'=>1,'placeholder'=>'Min','required'])}}
                   </div>
                   <div class="col-md-6">
                  {{Form::label('Max', 'Max')}} 
                  {{Form::number('max', '',['class'=>'form-control','id'=>'max','min'=>1,'placeholder'=>'Max','required'])}}
                </div>
                </div>
                <br>
                {{Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')}} 
                {{Form::number('delieveryspeed', '',['class'=>'form-control','id'=>'speed','placeholder'=>'Delievery Speed'])}}
                <br>
                  {{Form::label('Description', 'Description')}} 
                {{Form::textarea('description',null,['class'=>'form-control','name'=>'description','id'=>'description','rows' => 5, 'cols' => 40])}}
                <br>
                <label>Media Offering</label>
                   <div class="row">
                   
                  <div class="col-md-6">
              <input type="radio" class="select_media_pic" name="type" value="video"/><p>Video</p>
                  </div>
                  <div class="col-md-6">
                  <input type="radio" class="select_media_pic" name="type" value="audio" /><p>Audio</p>
                  </div>
                  </div>
                  <input type="hidden" name="assembly_id" value="" class="assembly_id"/>

                  <br>
                  <label>Choose Category</label>
                  <div class="video" style="display:none">
                  <select name="video_cat"  class='form-control video'>
                          <option value="">Choose category</option>
                          @foreach($category as $cat)
                          @if($cat->type=='video')
                              <option value="{{$cat->id}}">{{$cat->category}}</option>
                            @endif
                          @endforeach
                  </select>
                  </div>
                  <br>
                  <div class="audio" style="display:none">
                    <select name="audio_cat"  class='form-control audio'>
                            <option value="">Choose category</option>
                            @foreach($category as $cat)
                                  @if($cat->type=='audio')
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                                @endif
                            @endforeach
                    </select>
                    </div>
            
                   <br>
                <div class="convert">
                <label for="quality:">quality:</label> 
                  <select name="quality" class="form-control" required id="quality">
                            <option value="">Choose ...</option>
                            <option value="480">480p  </option>
                            <option value="720">HD 720p </option>
                            <option value="1080">Full HD 1080p  </option>
                    </select>
                </div>
                <br>
            <label>Offer Status</label>
            
            <select name="offer_status" required id="select_status" class='form-control'>
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
                <br>

                <div class=" mt-3 text-white file" style="display:none;">
            <label class="media_label12">Audio/Video</label>
                {{Form::file('media',['class'=>'form-control file_input'])}}
                  <div class="progress"></div>
                <span id="filename" style="color:yellow;"></span>
            </div>

            <div class=" mt-3 text-white file1" style="display:none;">
            <label class="media_label12">Audio/Video</label>
               <button type="button" class="browse">Choose File</button>
                  <div class="progress"></div>
                <span id="filename" style="color:yellow;"></span>
            </div>
            
            <div class=" mt-3 text-white thumbnail" style="display:none;">   
            <label class="thumbnail1"></label>        
                 {{Form::file('audio_pic',['class'=>'form-control chooseImage'])}}
                <span id="filename" style="color:yellow;"></span>
            </div>
            

                <input type="hidden" name="offerid" id="offerid" value="">                  
                  <input type="hidden" id="file_name" name="file_name" value=""/>
                  <input type="hidden" id="file_image" name="file_image" value=""/>
                  <br>
                 
                  <div class="col-md-12 mt-3 text-white file" style="display:none;">
                  <label class="label12"></label><br>
                {{Form::file('file',['class'=>'form-control file_input','title'=>'eeeee'])}}
                <span id="filename" style="color:red;"></span>
            </div>
          
            
           <div class="modal-footer">
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="{{asset('images/loading2.gif')}}" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
                <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary button_disable">Save changes</button>
          </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
          </div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal" data-toggle="#myModal1" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
            {!!Form::open([ 'id'=>'edit_profile_info', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
        <div class="heading text-center"><h2 class="text-dark ">Artist Detail</h2></div>

          <div class="row align-items-center text-white">   
      
           <div class="col-md-12" style="display: flex;">
            <input type="radio" class="select_media_pic" name="radio" value="audio" {{$random[0]->type=='audio' ? 'checked': ''}}/><p class="text-dark">Audio</p>
            <input type="radio" class="select_media_pic" name="radio" value="video" {{$random[0]->type=='video' ? 'checked': ''}}/><p class="text-dark">Video</p>
          </div>
          
          <div class="col-md-12 mt-3 text-white file" style="{{$random[0]->type!='' ? 'display:block' : 'display:none'}}">
            <label class="media_label12">Overview Video (~30s)</label>
                {{Form::file('media',['class'=>'form-control file_input'])}}
                <span id="filename" style="color:#767605;">{{$random[0]->media}}</span>
                  <div class="progress"></div>
                <span id="filename" style="color:yellow;"></span>
            </div>

            <div class="col-md-12 mt-3 text-white file1" >
            <label class="media_label12">Overview  Audio (~30s)</label>
               <button type="button" class="browse">Choose File</button>
                  <div class="progress"></div>
                <span id="filename" style="color:yellow;"></span>
            </div>
            
            <div class="col-md-12 mt-3 text-white thumbnail" style="{{$random[0]->type!='' ? 'display:block' : 'display:none'}}">   
            <label class="thumbnail1">Video Thumbnail</label>        
                 {{Form::file('audio_pic',['class'=>'form-control chooseImage'])}}
                <span id="filename" style="color:yellow;"></span>
            </div>
            </div>
          <!-- <div class="col-md-12 mt-3 text-white file" style="{{$random[0]->type!='' ? 'display:block' : 'display:none'}}">
            {{Form::label('Choose Media', $random[0]->type=='audio' ? 'Overview  Audio (~30s)' : 'Overview Video (~30s)',['class'=>'custom-file-label label12'])}}
            <br> 
                {{Form::file('media',['class'=>'custom-file-input file_input'])}}
                <span id="filename" style="color:#767605;">{{$random[0]->media}}</span>
            </div> -->
            <!-- <div class="col-md-12 mt-3 text-white thumbnail" style="{{$random[0]->type!='' ? 'display:block' : 'display:none'}}">
            {{Form::label('', $random[0]->type=='audio' ? 'Audio Thumbnail' : 'Video Thumbnail',['class'=>'custom-file-label thumbnail1'])}} 
                {{Form::file('audio_pic',['class'=>'custom-file-input chooseImage'])}}
                <span id="filename" style="color:#767605;">{{$random[0]->audio_pic}}</span>
            </div> -->
            <input type="hidden" value="{{$random[0]->id}}" name="hid"/>
            <input type="hidden" name="type" value="{{$random[0]->type}}"/>
            <input type="hidden" name="media_url" value="{{$random[0]->media}}"/>
            <input type="hidden" name="created_at" value="" class="created_at"/>

            <input type="hidden" name="assembly_id" value="" class="assembly_id"/>


              <input type="hidden" name="updated_at" value="" class="updated_at"/>
             <input type="hidden" name="image_url" value="{{$random[0]->audio_pic}}"/>

          
            <div class="col-md-12 pt-3">
            {{Form::label('Sexology', 'Sexology')}} 
                {{Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','id'=>'sexology','required','placeholder' => 'Pick a Sexology'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('sexology') ?>
                </div>
                @endif
            </div>
            <div class="col-md-12 pt-3">
            {{Form::label('Body', 'Body')}} 
                {{Form::select('weight', ['Thin' => 'Thin', 'Normal' => 'Normal','Muscular'=>'Muscular','Chubby'=>'Chubby'], null, ['class'=>'form-control','id'=>'weight','placeholder' => 'Choose','required'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('weight') ?>
                </div>
                @endif
            </div>
            <div class="col-md-12 pt-3">
            {{Form::label('Height', 'Height')}} 
                {{Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','id'=>'height','placeholder' => 'Choose Height','required'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('height') ?>
                </div>
                @endif
            </div>
            <div class="col-md-12 pt-3">
            {{Form::label('Hair Color', 'Hair Color')}} 
                {{Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','id'=>'haircolor','placeholder' => 'Choose Hair Color','required'])}}
                   @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('haircolor') ?>
                </div>
                @endif
            </div>
            <div class="col-md-12 pt-3">
            {{Form::label('Hair length', 'Hair length')}} 
                {{Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','id'=>'hairlength','placeholder' => 'Choose Hair Length','required'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('hairlength') ?>
                </div>
                @endif
            </div>
                <div class="col-md-12 pt-3">
            {{Form::label('Eye/Lens Color', 'Eye/Lens Color')}} 
                {{Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','id'=>'eyecolor','placeholder' => 'Choose Eye Color','required'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('eyecolor') ?>
                </div>
                @endif
            </div>
            <div class="col-md-12 pt-3">
            {{Form::label('Privy part', 'Privy part')}} 
                {{Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','id'=>'privy','placeholder' => 'Privy part','required'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('privy') ?>
                </div>
                @endif
            </div>
             <div class="col-md-12 pt-3">
            {{Form::label('ABOUT ME', 'ABOUT ME')}} 
                {{Form::textarea('aboutme',null,['id'=>'aboutme','class'=>'form-control', 'rows' => 2,'placeholder'=>'About Me','cols' => 40,'required'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('aboutme') ?>
                </div>
                @endif
            </div>
            </div>
            <div class="modal-footer">
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="{{asset('images/loading2.gif')}}" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
                <button type="button" class="btn btn-default popup_close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary button_disable">Save changes</button>
                <div class="alert alert-success" role="alert" style="display:none">
                           This is a success alert—check it out!
                </div>
                <div class="alert alert-danger" role="alert" style="display:none">
                    This is a danger alert—check it out!
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="media" tabindex="-1" aria-labelledby="mediaLabel">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Media</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        
                        </div>
                        {!!Form::open([ 'id'=>'edit_Video_info', 'method' => 'post', 'files'=>true])!!}
                          {{Form::token()}}
                        <div class="modal-body">
                          <div class="row align-items-center text-white">
                          <input type="hidden" value="" name="mediaid" id="mediaid"/>
                          <input type="hidden" value="" name="type" id="type"/>
                          <div class="col-md-6 mt-2 ">
                          {{Form::label('Title', 'Title')}} 
                              {{Form::text('title', '',['required','class'=>'form-control video_title','placeholder'=>'Enter Title'])}}
                          </div>
                      
                          <div class="col-md-6 mt-2 ">
                          {{Form::label('Add Price', 'Price')}} 
                          {!! Form::number('price', '' , ['required','class' => 'form-control video_price','placeholder'=>'Price','min'=>0]) !!}
                          </div>
                          <div class="col-md-12 mt-2 ">
                                  <div class="convert video" style="display:none">
                                {{Form::label('Quality:', 'Quality:')}} 
                              <select name="convert" required class='form-control video_quality'>
                                        <option value="">Choose ...</option>
                                        <option value="480">480p  </option>
                                        <option value="720">HD 720p </option>
                                        <option value="1080">Full HD 1080p  </option>
                                </select>
                                </div>
                          <div class="video" style="display:none">
                          <label>Category</label>
                           <select name="category[]"  class='form-control mb-3 video_category'>
                          <option value="">Choose Category</option>
                              @foreach($category as $cat)
                                  @if($cat->type=='video')
                                      <option value="{{$cat->id}}">{{$cat->category}}</option>
                                  @endif
                                  @endforeach
                                  
                            </select>
                            </div>
                            <div class="audio" style="display:none">
                            <label>Category</label>
                                        <select name="category[]"   class='form-control my-5 audio_category'>
                                                <option value="">Choose Category</option>
                                                @foreach($category as $cat)
                                                    @if($cat->type=='audio')
                                                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                                                        @endif
                                                    @endforeach
                                              
                                        </select>
                            </div>      
                             <div class="col-md-12 mt-3">
                          {{Form::label('Description', 'Description')}} 
                              {{Form::textarea('description',null,['required','class'=>'form-control video_description', 'maxlength'=>'2000','rows' => 8, 'cols' => 40])}}
                          </div>

            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary button_disable">Save changes</button>
                          <div class="alert alert-success" id="success" style="display:none">
    
                           </div>
                        </div>
                        {{ Form::close() }}

                      </div>
                    </div>
                  </div>
                     

                    

            <!-- Modal -->
          


<style>

video:hover {
    border: 1px solid gold;
}
.pricetime .text-left {
    float: left;
    padding-left: 10px;
}
.pricetime .text-right {
    margin-top: -41px;
    margin-right: 7px;
}
.pricetime .text-right h6 {
    background: black;
    height: 30px;
    width: 70px;
    float: right;
    color: white !important;
    padding: 7px;
}
.overlayprofile img {
    display: flex;
    margin: -10% 4%;
}
.coverimg img{
  margin-top:50px;
}
.coverimg {
    margin-top: 37px;
}
.verifyvideo.text-center.den h3 {

  background:red !important;
}
@media only screen and (max-width: 768px) {
.coverimg img {
    object-fit: contain;
    margin-top:10px;
}
.overlayprofile img {
    display: flex;
    margin: -33% 14%;
}
}
.uppy-Root {
    z-index: 9999;
}
.pricetime .text-left h6 {
    background: black;
    padding: 4px;
    font-size: 16px;
    color: gold !important;
}
.pricetime {
    position: relative;
}
.edit {
    position: absolute;
    top: -1px;
    right: 13px;
}
.artistvideo {
    border: 2px dashed red;
    width: 100%;
    padding-top: 15px;
    text-align: center;
    padding-bottom: 10px;
}
.artistaudio {
    border: 2px dashed red;
    width: 100%;
    padding-top: 15px;
    text-align: center;
    padding-bottom: 10px;
}
.artistoffer1 {
    border: 2px dashed red;
    width: 100%;
    text-align: center;
    padding-bottom: 10px;
}

</style>



 @include('artists.dashboard_footer')


 <script src="//assets.transloadit.com/js/jquery.transloadit2-v3-latest.js"></script>
    <link rel="stylesheet" href="https://releases.transloadit.com/uppy/robodog/v1.10.7/robodog.min.css">
<script src="https://releases.transloadit.com/uppy/robodog/v1.10.7/robodog.min.js"></script>
<script>
  var url = $('#base_url').attr('data-url');
 console.log(url);
  // document.getElementById("browse").addEventListener("click", function () {
    $('.browse').click(function(){
    var uppy = window.Robodog.pick({
      providers: [
        "instagram",
        "url",
        "webcam",
        "dropbox",
        "google-drive",
        "facebook",
        "onedrive"
      ],
      waitForEncoding: false,
      statusBar: '#myForm .progress',
      params: {
        // To avoid tampering, use Signature Authentication
        auth: { key: "995b974268854de2b10f3f6844566287" },
        //"allow_steps_override": false,
        //'template_id':'c5de46c6498e4e0ba0f85499dd676bd3',
        // To hide your `steps`, use a `template_id` instead
        notify_url :url+'/notifyTrans',
        steps: {
          ":original": {
            robot: "/upload/handle"
          },
          "filtered_image": {
          use: ":original",
          robot: "/file/filter",
          accepts: [
            ["${file.mime}", "regex", "image"]
          ]
        },
        "filtered_audio": {
          use: ":original",
          robot: "/file/filter",
          accepts: [
            ["${file.mime}", "regex", "audio"]
          ]
        },
         
          resized_image: {
            use: "filtered_image",
            robot: "/image/resize",
            result: true,
            height: 768,
            imagemagick_stack: "v2.0.7",
            resize_strategy: "fillcrop",
            width: 1024,
            zoom: false
          },
          
          merged: {
            use: {
              steps: [
                { name: "filtered_audio", as: "audio" },
                { name: "filtered_image", as: "image" }
              ]
            },

            robot: "/video/merge",
            result: true,
            ffmpeg_stack: "v4.3.1",
            preset: "ipad-high"
          }
        },
      }
    })
      .then(function (bundle) {

        console.log(bundle.transloadit);

        $('.assembly_id').val(bundle.transloadit[0].assembly_id)
  
      })
      .catch(console.error);
  });
</script>