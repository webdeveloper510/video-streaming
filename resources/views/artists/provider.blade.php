@include('artists.dashboard')
    <section class="background1 ">
      <div class="container">
      <div class="overlay1 text-white">
       
      <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              Collection Upload       
 </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{url('artist/offer')}}">Publish a Service </a>
        </div>
         

          </li>
          
        </ul>

    
  
      
      
  
  {!!Form::open(['id'=>'myForm','method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
          
      <div class="container profile">
        <h2 class="text-center">Collection Upload</h2>

        <div class="alert alert-danger" id="error" style="display:none">
      
      </div>

           
       <div class="row">
         <div class="col"></div>
       
          <div class=" col-md-8 row align-items-center text-white">
            <!--  <div class="col-md-12">
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">Are there Co-Performers involved in this Content?</label>
              <div class="col-sm-7">
              <div class="radiobtn text-white">
          <input type="radio"  name="type" value="Yes" /><p class="text-white">yes</p>
          <input type="radio"class="ml-5" name="type" value="No"/><p class="text-white">No</p>

            </div>
              </div>
            </div>
            </div>
          <div class="col-md-6">
           <div class="form-group">
 
    <select class="custom-select selctc&r" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">Nicknames</option>
    
  </select>
  </div>
</div>
  <div class="col-md-6">
            <button class="btn btn-secondery selctc&r " type="button">+</button>
          </div>

        -->

            <div class="col-md-6 form-inline">
            <div class="mt-5">
              <input type="radio" class="select_media_pic" name="radio" value="audio" /><p>Audio</p>
              <input type="radio" class="select_media_pic" name="radio" value="video"/><p>Video</p>
              </div>
            </div>
            <div class="col-md-6">
            <div class="mt-5">
            <label class="mr-3">Allow Downloading ?</label>
              <input type="radio"  name="is_download" value="yes" /><p>Yes</p>
              <input type="radio" name="is_download" value="no"/><p>No</p>
              </div>
            </div>
             <div class="col-md-6 mt-2 ">
            {{Form::label('Title', 'Title')}} 
                {{Form::text('title', '',['class'=>'form-control title','table'=>'media','placeholder'=>'Enter Title'])}}
                <div class="alert alert-success set1" id="messagediv" style="display:none"></div>

            </div>

            <input type="hidden" name="created_at" value="" class="created_at"/>

                <input type="hidden" name="transloadit" value="" class="transloadit"/>
                <input type="hidden" name="transloadit_image" value="" class="transloadit_image"/>
                <input type="hidden" name="assembly_id" value="" class="assembly_id"/>
                
            <input type="hidden" name="updated_at" value="" class="updated_at"/>

         
            <div class="col-md-6 mt-2 ">
            {{Form::label('Add Price', 'Price (PAZ)')}} 
            {!! Form::number('price', '' , ['class' => 'form-control','placeholder'=>'Price','min'=>0]) !!}
            </div>
            <div class="col-md-6 mt-2 ">
           
             
            <div class="video" style="display:none">
            <select name="video_cat"  class='form-control my-5 video'>
                    <option value="">Choose Category</option>
                    @foreach($category as $cat)
                        @if($cat->type=='video')
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endif
                        @endforeach
                  
            </select>
            </div>
            <div class="convert video">
            {{Form::label('Quality:', 'Quality:')}} 
           <select name="convert"  class='form-control'>
                    <option value="">Choose ...</option>
                    <option value="480">480p  </option>
                    <option value="720">HD 720p </option>
                    <option value="1080">Full HD 1080p  </option>
            </select>
            </div>

            <div class="audio" style="display:none">
            <select name="audio_cat"  class='form-control my-5 audio'>
                    <option value="">Choose Category</option>
                    @foreach($category as $cat)
                        @if($cat->type=='audio')
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                            @endif
                        @endforeach
                   
            </select>
            </div>
            
            <div class=" mt-3 text-white file" style="display:none;">
            <label class="media_label12">Audio/Video</label>
                {{Form::file('media',['class'=>'form-control file_input'])}}
                  <div class="progress"></div>
                <span id="filename" style="color:yellow;"></span>
            </div>

            <div class=" mt-3 text-white file1" style="display:none;">
            <label class="media_label12">Audio/Video</label>
               <button type="button" id="browse">Choose File</button>
                  <div class="progress proaudio">Choose 1 Audio + 1 Image</div>
                <span id="filename" style="color:yellow;"></span>
            </div>
            
            <div class=" mt-3 text-white thumbnail" style="display:none;">   
            <label class="thumbnail1"></label>        
                 {{Form::file('thumbnail_pic',['class'=>'form-control chooseImage'])}}
                <span id="filename" style="color:yellow;"></span>
            </div>
            </div>
            <input type="hidden" class="created_at" name="created_at" value=""/>
               <input type="hidden" class="updated_at" name="updated_at" value=""/>
            <div class="col-md-6 mt-3">
            {{Form::label('Description', 'Description')}} 
                {{Form::textarea('description',null,['class'=>'form-control', 'maxlength'=>'2000','rows' => 8, 'cols' => 40])}}
            </div>
            <div class="row">
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="{{asset('images/loading2.gif')}}" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
            <div class="col text-center pt-3">
            {{ Form::submit('Submit!',['class'=>'btn btn-primary disable_this']) }}
            <div class="alert alert-success sn" id="success" style="display:none">
    
    </div>

  
    <div class="alert alert-danger sn" id="error" style="display:none">

    </div>
   
     </div>
     </div>
   </div>
  {{ Form::close() }}

  <div class="col"></div>
</div>
  
</div>
</div>
</section>

 <style>
  section.background1 {
    padding-top: 11%;
  }
  label {
    color: white;
}
.sn{
    width:200% !important;
}
.mt-5 p {
    font-size: 22px !important;
    padding-right: 18px;
}

.modal-dialog {
    background: transparent !important;
}

label.error {
    background: red;
    padding: 9px;
    font-size: 16px;
    display: flex;
    color: white;
    text-align: center;
    margin-top: 22px;
    border-radius: 9px;
}
.radiobtn{
  display:inline-flex;
}
.loader img {
    background: #ffffff61;
    
}

.modal-content {
    background: transparent;
    box-shadow: none;
}

.modal-body img {
    width: 26rem;
}
.modal {
    position: fixed;
    top: 50%;
    right: 0;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1050;
    display: none;
    overflow: hidden;
    outline: 0;
}

.mt-5 {
    display: inline-flex;
}

input.select_media_pic {
    height: 21px;
}

.overlay1 {

    margin-top: 0%;
  }
  a#navbarDropdown23 {
    border: 1px solid #fff;
    color: #fff;
}
  @media only screen and (max-width: 767px){
section.background1 {
    height: 151%;
    padding-bottom: 30px;
}
.overlay1 {
    margin-top: 9% !important;
}
.custom-file-label {
    width: 91%;
    }

}
</style>



       
@include('artists.dashboard_footer')
 <script src="//assets.transloadit.com/js/jquery.transloadit2-v3-latest.js"></script>
    <link rel="stylesheet" href="https://releases.transloadit.com/uppy/robodog/v1.10.7/robodog.min.css">
<script src="https://releases.transloadit.com/uppy/robodog/v1.10.7/robodog.min.js"></script>
<script>
  var url = $('#base_url').attr('data-url');
 console.log(url);
  document.getElementById("browse").addEventListener("click", function () {
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

        //console.log(bundle);

        console.log(bundle.transloadit);

       // return false;
      
      // var url = bundle.transloadit[0].results.merged[0].ssl_url; // Array of Assembly Statuses
       //var url1 = bundle.transloadit[0].results.resized_image[0].ssl_url; // Array of Assembly Statuses
       //var url1 = bundle.transloadit[0].results.resized_image[0].ssl_url; // Array of Assembly Statuses
       // $('.transloadit').val(url);
        $('.assembly_id').val(bundle.transloadit[0].assembly_id)
        //$('.transloadit_image').val(url1);
        //console.log(bundle.results); // Array of all encoding results
      })
      .catch(console.error);
  });
</script>

  <script type="text/javascript">


    
    function callajax(assembly){
             var form = $("#myForm");
            var formData = new FormData($(form)[0]);
		     formData["assembly"] = assembly;
            $('.loader').show();
            $('.percentage').html('0');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + "/postContent",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = $
                        .ajaxSettings
                        .xhr();
                    if (xhr.upload) {
                        xhr
                            .upload
                            .addEventListener('progress', function (event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                }
                                $('#top_title').html('Uploding...' + percent + '%');
                                $('.percentage').html(percent + '%');
                                if (percent == 100) {
                                    $('.loader').hide();
                                }
                            }, true);
                    }
                    return xhr;
                },
                success: function (response) {

                    console.log(response);
                    return false;

                    if (response.errors) {

                        jQuery.each(response.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                    } else {
                        $('.loader').hide();
                        //$('.percentage').hide();
                        if (response.status == 1) {
                            $('#success').show();
                            $('#success').html(response.messge);

                            setTimeout(function () {
                                location.reload();
                            }, 2000);

                            // location.reload(); $('.popup_close').trigger('click');

                        } else {

                            $('#error').show();
                            $('#error').html(response.messge);

                        }
  
                    }
                }
            });
    }

</script>