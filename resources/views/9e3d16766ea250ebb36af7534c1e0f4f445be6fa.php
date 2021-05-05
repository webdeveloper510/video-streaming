<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="background1 ">
      <div class="container">
      <div class="overlay1 text-white">
       
      <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              Collection Upload       
 </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="<?php echo e(url('artist/offer')); ?>">Create Offer</a>
        </div>
         

          </li>
          
        </ul>

    
  
      
      
  
  <?php echo Form::open(['id'=>'myForm','method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

          
      <div class="container profile">
        <h2 class="text-center">Collection Upload</h2>

        <div class="alert alert-danger" id="error" style="display:none">
      
      </div>
       
          <div class="row align-items-center text-white">
            <div class="col-md-12">
            <div class="mt-5">
              <input type="radio" class="select_media_pic" name="radio" value="audio" /><p>Audio</p>
              <input type="radio" class="select_media_pic" name="radio" value="video"/><p>Video</p>
              </div>
            </div>
             <div class="col-md-6 mt-2 ">
            <?php echo e(Form::label('Title', 'Title')); ?> 
                <?php echo e(Form::text('title', '',['class'=>'form-control title','table'=>'media','placeholder'=>'Enter Title'])); ?>

                <div class="alert alert-success set1" id="messagediv" style="display:none"></div>

            </div>
         
            <div class="col-md-6 mt-2 ">
            <?php echo e(Form::label('Add Price', 'Price (PAZ)')); ?> 
            <?php echo Form::number('price', '' , ['class' => 'form-control','placeholder'=>'Price','min'=>0]); ?>

            </div>
            <div class="col-md-6 mt-2 ">
           
             
            <div class="video" style="display:none">
            <select name="video_cat"  class='form-control my-5 video'>
                    <option value="">Choose Category</option>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($cat->type=='video'): ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
            </select>
            </div>
            <div class="convert video">
            <?php echo e(Form::label('Quality:', 'Quality:')); ?> 
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
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($cat->type=='audio'): ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
            </select>
            </div>
            
            <div class=" mt-3 text-white file" style="display:none;">
            <label class="media_label12">Audio/Video</label>
                <?php echo e(Form::file('media',['class'=>'form-control file_input'])); ?>

                <span id="filename" style="color:yellow;"></span>
            </div>
            
            <div class=" mt-3 text-white thumbnail" style="display:none;">   
            <label class="thumbnail1"></label>        
                 <?php echo e(Form::file('thumbnail_pic',['class'=>'form-control chooseImage'])); ?>

                <span id="filename" style="color:yellow;"></span>
            </div>
            </div>
            <input type="hidden" class="created_at" name="created_at" value=""/>
               <input type="hidden" class="updated_at" name="updated_at" value=""/>
            <div class="col-md-6 mt-3">
            <?php echo e(Form::label('Description', 'Description')); ?> 
                <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'maxlength'=>'2000','rows' => 8, 'cols' => 40])); ?>

            </div>
            <div class="row">
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
            <div class="col text-center pt-3">
            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary disable_this'])); ?>

            <div class="alert alert-success sn" id="success" style="display:none">
    
    </div>

  
    <div class="alert alert-danger sn" id="error" style="display:none">

    </div>
     </div>
     </div>
   </div>
  <?php echo e(Form::close()); ?>

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

.loader img {
    background: #ffffff61;
    /* border-radius: 50%; */
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
  @media  only screen and (max-width: 767px){
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



       
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="//assets.transloadit.com/js/jquery.transloadit2-v3-latest.js"></script>
      <link rel="stylesheet" href="https://releases.transloadit.com/uppy/robodog/v1.10.7/robodog.min.css">
    <script src="https://releases.transloadit.com/uppy/robodog/v1.10.7/robodog.min.js"></script>
  <script type="text/javascript">
window.Robodog.form('#myForm', {
  waitForEncoding: true,
  waitForMetadata: true,
  submitOnSuccess: false,
  params: {
    auth: { key: '995b974268854de2b10f3f6844566287' },
    triggerUploadOnSubmit: true,
    steps: {
      ':original': {
        robot: '/upload/handle'
      },
      files_filtered: {
        use: ':original',
        robot: '/file/filter',
        result: true,
        accepts: [['${file.mime}','regex','audio']]
      },
      imported_image: {
        robot: '/http/import',
        url: 'https://images.pexels.com/photos/3429740/pexels-photo-3429740.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'
      },
      resized_image: {
        use: 'imported_image',
        robot: '/image/resize',
        result: true,
        height: 768,
        imagemagick_stack: 'v2.0.7',
        resize_strategy: 'fillcrop',
        width: 1024,
        zoom: false
     },
     merged: {
       use: {
          "steps": [
      { 
          "name": ":original", "fields": "media", "as": "audio" 
          
      },
      { 
          "name": ":original", "fields": "thumbnail_pic", "as": "image" 
          
      }
    ],
        "bundle_steps": true
       },    
       robot: '/video/merge',
       result: true,
       ffmpeg_stack: 'v4.3.1',
       preset: 'ipad-high'
     },
     exported: {
       use: ['imported_image','resized_image','merged',':original'],
       robot: '/s3/store',
       credentials: "mp3-img-to-mp4",
       "path": "uploads/${file.id}.${file.ext}"
     }
   }
 }
}).on('transloadit:complete', (assembly) => {
    console.log(assembly)
            var form = $("#myForm");
            var formData = new FormData($(form)[0]);
            $("<input />").attr("type", "hidden")
          .attr("name", "transloadit")
          .attr("value", assembly)
          .appendTo("#myForm");
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
})

</script><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/provider.blade.php ENDPATH**/ ?>