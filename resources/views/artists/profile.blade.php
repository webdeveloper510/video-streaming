@include('artists.dashboard')

<link rel="stylesheet" href="{{asset('design/profile.css')}}" />
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="coverimg">
        <div class="overlayartist text-center">
           <img src=" {{asset('images/loaderartist.gif')}}" class="img-fluid">
        </div>
  <img src="{{ isset($details[0]->cover_photo) ? url('storage/app/public/uploads/'.$details[0]->cover_photo) : asset('images/cover-dummy.jpg') }}" width="100%" height="500px">
          <div class="iconcamera">
        <i class="fa fa-camera image" data-id="cover_photo"></i>

        </div>
        <div style="display:none">
        {!!Form::open(['id'=>'filechange','method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
        <input type="file" class="image_change" name="image" onchange="imageUpdate(this)"/>
        <input type="hidden" id="image_type" name="image_type" value=""/>
        {{ Form::submit('change!',['class'=>'btn btn-primary mb-4','id'=>'imageChange']) }}

        {{ Form::close() }}
        </div>
        </div>
        <div class="profileimg">
        <div class="overlayprofile">
           <img src=" {{asset('images/loaderartist.gif')}}" width="200px" height="200px" class="img-fluid">
        </div>
        <img src="{{ isset($details[0]->profilepicture) ? url('storage/app/public/uploads/'.$details[0]->profilepicture) : asset('images/profile-dummy.png') }}" width="200px" height="200px">
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
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link tabss {{$collection_selection ? '' : 'active'}}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Offers</a>
    <a class="nav-link tabss" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link tabss {{$collection_selection ? 'active' : ''}}" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Collection</a>
   
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

     <!-- ------------------------------------------Offer videos -------------------------------------------------->

  <div class="tab-pane fade {{$collection_selection ? '' : 'show active'}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
  
   <h2> Offers</h2>
  
          <div class="container">
   <div class="row mb-5">
    @if($offerData)

   @foreach($offerData as $offer)
  
      <div class="col-md-12">
   
      <div class="artistoffer row">
        <div class="col-md-2 mt-5">
        <video width="100%"  controls controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$offer->media) }}" type="video/mp4">
                
                Your browser does not support the video tag.
            </video>
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
        
        <h3 class="text-green" style="{{ $offer->offer_status == 'offline' ? 'color: red' : 'color: green' }}">{{strtoupper($offer->offer_status)}}</h3>
         <h4>{{$offer->price}}PAZ/min </h4>
         
         <div class="text-right mr-3">
      <button class="btn btn-sm btn-light delete" table="offer" data-id="{{$offer->id}}"><i class="fa fa-trash-o"></i></button>
          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-sm" onclick="edit_offer('{{json_encode($offer)}}')">Edit</button>
           </div>
        </div>
        <hr>

      
      </div>
    </div>
    @endforeach
    @else
          <div class="artistoffer1">
            <h4> No Offer Created yet </h4>
            <a href="{{url('artist/offer')}}">Create Offer</a>
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
        <div class="col"></div>
        <div class="col"></div>
        <div class="col-md-4 text-right">
            <!-- <button type="button" class="btn btn-primary bardot">Choose</button> -->
      <select class="form-select form-control" id="change_section" aria-label="Default select example">
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
               <div class="checkall" style="display:none">
               <form> 
                  <input type="checkbox" class="slct_video" id="{{$detail->id}}" data-id="{{$detail->price}}">
               </form></div>
               <a href="{{url('artistVideo/'.$detail->id)}}">
            <video width="100%" class="hover"  id="collection_{{$detail->id}}" controls controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$detail->media) }}" type="video/mp4">
                
                Your browser does not support the tag.
            </video>
            <div class="pricetime">
                  <div class="text-left">
                  <h6 class="text-white">{{$detail->price}}/PAZ</h6>
                  </div>
                  <div class="text-right">
                  <h6 class="text-white" id="duration1_{{$detail->id}}">{{ $detail->duration ? $detail->duration :'' }}</h6>
                  </div>
                  </div>
            
                </a>
                <div class="edit">
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#media" onclick="editVideoinfo('{{json_encode($detail)}}')">Edit</button>
               
                <button class="btn btn-sm btn-light delete" table="media" data-id="{{$detail->id}}"><i class="fa fa-trash-o"></i></button>
                </div>
            
               
              </div>
             
              @if($detail->duration=='')
          <script>
           var video;
            var id;
              setTimeout(() => {
              video = $("#collection_"+"{{$detail->id}}");
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
   <div class="checkall" style="display:none"><form> 
   <input type="checkbox" class="slct_video"></form></div>
     <a href="{{url('artistVideo/'.$aud->id)}}">
    <img src="{{$aud->audio_pic ?  url('storage/app/public/uploads/'.$aud->audio_pic) : asset('images/logos/voice.jpg')}}">

<audio controls controlsList="nodownload" disablePictureInPicture>

<source src="{{url('storage/app/public/audio/'.$aud->media) }}" type="audio/mp3">
Your browser does not support the audio tag.
</audio>
</a>
<div class="edit">
<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#media">Edit</button>
<button class="btn btn-sm btn-light delete trans1" table="media" data-id="{{$aud->id}}"><i class="fa fa-trash-o"></i></button>
</div>
</div>
   
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


        <div class="tab-pane fade mb-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  
  <!----------------------------------------------- Profile View --------------------------------------------->
  
  <div class="container">
     
      <h2>Overview</h2>
      <div class="text-right">
   <button type="button" class="btn btn-light" data-target="#myModal1" data-toggle="modal" onclick="change_other_info('{{json_encode($details[0])}}')">Edit</button>
              </div>
      <div class="row">
      
        <div class="col-md-2 col-sm-2 col-lg-2">
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
       
          @if(isset($random[0]->type)&&$random[0]->type=='video')
            <video width="100%" height="100%" id="get_duration" controls controlsList="nodownload" disablePictureInPicture>
                      <source src="{{isset($random[0]->media) ? url('storage/app/public/video/'.$random[0]->media) :'https://www.radiantmediaplayer.com/media/big-buck-bunny-360p.mp4' }}" type="video/mp4">
                      Your browser does not support the video tag.
          </video>
          @else
          <img src="{{isset($random[0]->audio_pic) ? url('storage/app/public/uploads/'.$random[0]->audio_pic) : 'https://images.pexels.com/photos/6126313/pexels-photo-6126313.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'}}" width="100%;">
          <audio width="100%" height="100%" id="get_duration" controls controlsList="nodownload" disablePictureInPicture>
               <source src="{{isset($random[0]->media) ? url('storage/app/public/audio/'.$random[0]->media) :'' }}" type="audio/mp3">          
          </audio>
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
            <div class="col-md-3">
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
            <h4 class="modal-title" id="myModalLabel">Edit Offer</h4>
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
                   <label>Media Offering</label>
                   <div class="row">
                   
                  <div class="col-md-6">
              <input type="radio" class="select_media_pic" name="type" value="video"/><p>Video</p>
                  </div>
                  <div class="col-md-6">
                  <input type="radio" class="select_media_pic" name="type" value="audio" /><p>Audio</p>
                  </div>
                  </div>
                 {{Form::label('Title', 'Title')}} 
                  {{Form::text('title', '',['class'=>'form-control','name'=>'title','id'=>'title','placeholder'=>'Title'])}}
                  <br>
                   {{Form::label('Price(PAZ)', 'Price(PAZ)')}} 
                     {{Form::number('price', '',['class'=>'form-control','name'=>'price','id'=>'price','min'=>0,'placeholder'=>'Price'])}}
                  <br>
                  <label>Duration(Minutes):</label>
                  <div class="row">
                  <div class="col-md-6">
                  {{Form::label('Min', 'Min')}} 
                  {{Form::number('min', '',['class'=>'form-control','id'=>'min','min'=>1,'placeholder'=>'Min'])}}
                   </div>
                   <div class="col-md-6">
                  {{Form::label('Max', 'Max')}} 
                  {{Form::number('max', '',['class'=>'form-control','id'=>'max','min'=>1,'placeholder'=>'Max'])}}
                </div>
                </div>
                <br>
                {{Form::label('Additional Request Price', 'Additional Request Price')}} 
                {{Form::number('additional_price', '',['class'=>'form-control','name'=>'additional_price','id'=>'additional_price','min'=>0,'placeholder'=>'Additional Price'])}}
                <br>
                  {{Form::label('Description', 'Description')}} 
                {{Form::textarea('description',null,['class'=>'form-control','name'=>'description','id'=>'description','rows' => 5, 'cols' => 40])}}
                <br>
                <div class="col-md-12 mt-3 text-white audio_picture" style="display:none;">   
                   <label>Choose Image</label>        
                 {{Form::file('audio_pic',['class'=>'form-control chooseImage'])}}
                <span id="filename" style="color:red;"></span>
            </div>
                <input type="hidden" name="offerid" id="offerid" value="">
                <label class="media_label"></label>
                  <input type="file" name="file" class="file_input" value=""/>
                  <span id="filename" style="color:red;"></span>
                  
                  <input type="hidden" id="file_url" name="file_url" value=""/>
                  <br>
                  <br>
                <label>Offer Status</label>
            <select name="offer_status"  class='form-control' id="select_status">
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
            <br>
            <div class="convert">
                <label for="Convert to:">Convert to:</label> 
              <select name="quality" class="form-control" id="quality">
                        <option value="">Choose ...</option>
                        <option value="480">480p  </option>
                        <option value="720">HD 720p </option>
                        <option value="1080">Full HD 1080p  </option>
                </select>
            </div>
            <br>
            {{Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')}} 
                {{Form::number('delieveryspeed', '',['class'=>'form-control','id'=>'speed','placeholder'=>'Delievery Speed'])}}
                <br>
            <label>Choose Category</label>
            <div class="video" style="display:none">
            <select name="category[]"  class='form-control video'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                    @if($cat->type=='video')
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                      @endif
                    @endforeach
            </select>
            </div>
            <div class="audio" style="display:none">
            <select name="category[]"  class='form-control audio'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                          @if($cat->type=='audio')
                    <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endif
                    @endforeach
            </select>
            </div>
            </div>
            <div class="modal-footer">
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="{{asset('images/loading2.gif')}}" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
                <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {{ Form::close() }}
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
          <div class="col-md-6 mt-3 text-white">
            {{Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label media_label'])}} 
                {{Form::file('media',['class'=>'custom-file-input'])}}
                <!-- <span style="color:red;">{{isset($random[0]->media) ? $random[0]->media : ''}}</span> -->
            </div>
            <div class="col-md-6 mt-3 text-white audio_picture" style="display:none;">
            {{Form::label('Choose Media', 'Choose Picture',['class'=>'custom-file-label'])}} 
                {{Form::file('audio_pic',['class'=>'custom-file-input'])}}
            </div>
            <input type="hidden" value="{{isset($random[0]->id)}}" name="hid"/>
           
          <div class="col-md-6 mt-2 convert">
           {{Form::label('Convert to:', 'Convert to:')}} 
           <select name="convert"  class='form-control'>
                <option value="">Choose ...</option>
               @foreach($qualities as $q)
               <option  value="{{$q->quality}}" {{($random[0]->convert)==$q->quality ? 'selected' : ''}}>{{$q->quality}}px </option>
               @endforeach
            </select>
            </div>
                <div class="col-md-6 pt-3">
            {{Form::label('Eye/Lens Color', 'Eye/Lens Color')}} 
                {{Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','id'=>'eyecolor','placeholder' => 'Choose Eye Color'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('eyecolor') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 pt-3">
            {{Form::label('Privy part', 'Privy part')}} 
                {{Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','id'=>'privy','placeholder' => 'Privy part'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('privy') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 pt-3">
            {{Form::label('Hair length', 'Hair length')}} 
                {{Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','id'=>'hairlength','placeholder' => 'Choose Hair Length'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('hairlength') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 pt-3">
            {{Form::label('Hair Color', 'Hair Color')}} 
                {{Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','id'=>'haircolor','placeholder' => 'Choose Hair Color'])}}
                   @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('haircolor') ?>
                </div>
                @endif
            </div>

               <div class="col-md-6 pt-3">
            {{Form::label('Sexology', 'Sexology')}} 
                {{Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','id'=>'sexology','placeholder' => 'Pick a Sexology'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('sexology') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 pt-3">
            {{Form::label('Height', 'Height')}} 
                {{Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','id'=>'height','placeholder' => 'Choose Height'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('height') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 pt-3">
            {{Form::label('Body', 'Body')}} 
                {{Form::select('weight', ['Thin' => 'Thin', 'Normal' => 'Normal','Muscular'=>'Muscular','Chubby'=>'Chubby'], null, ['class'=>'form-control','id'=>'weight','placeholder' => 'Choose'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('weight') ?>
                </div>
                @endif
            </div>
            
             <div class="col-md-12 pt-3">
            {{Form::label('ABOUT ME', 'ABOUT ME')}} 
                {{Form::textarea('aboutme',null,['id'=>'aboutme','class'=>'form-control', 'rows' => 2,'placeholder'=>'About Me','cols' => 40])}}
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
                <button type="submit" class="btn btn-primary">Save changes</button>
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
                              {{Form::text('title', '',['class'=>'form-control video_title','placeholder'=>'Enter Title'])}}
                          </div>
                      
                          <div class="col-md-6 mt-2 ">
                          {{Form::label('Add Price', 'Price')}} 
                          {!! Form::number('price', '' , ['class' => 'form-control video_price','placeholder'=>'Price','min'=>0]) !!}
                          </div>
                          <div class="col-md-12 mt-2 ">
                                  <div class="convert video" style="display:none">
                                {{Form::label('Quality:', 'Quality:')}} 
                              <select name="convert"  class='form-control video_quality'>
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
                                        <select name="category[]"  class='form-control my-5 video_category'>
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
                              {{Form::textarea('description',null,['class'=>'form-control video_description', 'maxlength'=>'2000','rows' => 8, 'cols' => 40])}}
                          </div>

            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <div class="alert alert-success" id="success" style="display:none">
    
                           </div>
                        </div>
                        {{ Form::close() }}

                      </div>
                    </div>
                  </div>
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
@media only screen and (max-width: 768px) {
.coverimg img {
    object-fit: contain;
}
}
.pricetime .text-left h6 {
    background: black;
    padding: 5px;
    color: yellow !important;
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
