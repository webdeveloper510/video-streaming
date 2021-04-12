@include('artists.dashboard')
<section class="background1 "> 
{!!Form::open(['id'=>'create_offer','method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile ">
      <div class="overlay1 ">
            
      <div class="col-md-12 ">
          
          <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Create Offer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{url('artist/contentUpload')}}">Collection Upload</a>
        </div>
         

          </li>
          
        </ul>
        </div>
        <h2 class="text-center text-white ">Create Offer</h2>

     
        
          <div class="row align-items-center text-white">
         
                    <div class="col-md-4 mt-5 ">

            {{Form::label('Media Offering', 'Media Offering')}} <br>
        <div class="radiobtn text-white">
          <input type="radio" class="select_media_pic" name="type" value="audio" /><p class="text-white">Audio</p>
          <input type="radio" class="select_media_pic" name="type" value="video"/><p class="text-white">Video</p>
   
            </div>
            </div>
                <div class="col-md-4 mt-5 ">

                {{Form::label('Title', 'Title')}} 
                    {{Form::text('title', '',['class'=>'form-control title','table'=>'offer','placeholder'=>'Title'])}}
                    @if($errors->first('title'))
                    <div class="alert alert-danger">
                      <?php echo $errors->first('title') ?>
                    </div>
                    @endif
                    <div class="alert alert-success" id="messagediv" style="display:none"></div>

                </div>
           
                    <div class="col-md-4 mt-5 ">
                    {{Form::label('Price(PAZ)', 'Price(PAZ)')}} 
                        {{Form::number('price', '',['class'=>'form-control','placeholder'=>'Price','min'=>0])}}
                        @if($errors->first('price'))
                        <div class="alert alert-danger">
                          <?php echo $errors->first('price') ?>
                        </div>
                        @endif
                    </div>

        
           
            
            <div class="col-md-6 mt-5 ">
            {{Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')}} 
                {{Form::number('delieveryspeed', '',['class'=>'form-control','placeholder'=>'Delievery Speed','min'=>0])}}
                 @if($errors->first('delieveryspeed'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('delieveryspeed') ?>
                </div>
                @endif
               </div>
               <div class="col-md-6 mt-5">
             {{Form::label('Additional Request', 'Additional Request Price(PAZ)')}} 
                {{Form::number('additional_price',null,['class'=>'form-control', 'min'=>0])}}
                 @if($errors->first('additional_price'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('additional_price') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-5">
            
            <label>Duration(In Minutes)</label>
            <div class="row">

               <div class="col">
                  
               <label>Min :</label>
               {{Form::number('min', '',['class'=>'form-control','placeholder'=>'Min','min'=>0])}}
                 </div>
                     <div class="col">
                   <label>Max :</label>
                   {{Form::number('max', '',['class'=>'form-control','min'=>0,'placeholder'=>'Max','min'=>0])}}
                         </div>
                     </div>
           <br>
           <div class="video" style="display:none">
           <label>Category</label>

            <select name="category[]"  class='form-control'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                      @if($cat->type=='video')
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endif
                    @endforeach
                  
            </select>
            </div>
            <div class="audio" style="display:none">
            <label>Category</label>
            <select name="category[]"  class='form-control'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                      @if($cat->type=='audio')
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endif
                    @endforeach
                
            </select>
            </div>
            <br>
            <label>Offer Status</label>
            
            <select name="offer_status"  class='form-control'>
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
            <br>
            <label class="convert">Quality:</label>
            <select name="quality" class="form-control convert" id="quality">
                    <option value="">Choose ...</option>
                    <option value="480">480p  </option>
                    <option value="720">HD 720p </option>
                    <option value="1080">Full HD 1080p  </option>
            </select>
            @if($errors->first('quality'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('quality') ?>
                </div>
                @endif
            <br>
            <div class="file" style="display:none">
            <label class="media_label"></label>

 <br>
               {{Form::file('media',['class'=>'form-control file_input'])}}
               <span id="filename" style="color:yellow;"></span>
                 @if($errors->first('media'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('media') ?>
                </div>
                @endif
</div>
                <div class="col-md-12 mt-3 text-white thumbnail" style="display:none;">
                <label class="thumbnail1"> Image Upload</label>
                {{Form::file('thumbnail_pic',['class'=>'form-control chooseImage'])}}
                <span id="filename" style="color:yellow;"></span>
            </div>
                
               <br>
               
               
              <video width="200"   id="video_choose" controls style="display:none;">
             <source src="mov_bbb.mp4" id="video">
             Your browser does not support HTML5 video.
             </video>

             <img id="image" src="#" width="50px;" style="display:none;" height="50px;" alt="your image" />
            
               <br>
               
            </div>
              
            <div class="col-md-6 mt-5">
             {{Form::label('Description', 'Description')}} 
            
                {{Form::textarea('description',null,['class'=>'form-control', 'maxlength'=>'2000','rows' => 20, 'cols' => 40])}}
                 @if($errors->first('description'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('description') ?>
                </div>
                @endif
            </div>
            
           
           
            <div class="row">
            
            <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span>
                <img src="{{asset('images/loading2.gif')}}" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
            <div class="alert alert-success" id="success" style="display:none">
        </div>
        <div class="alert alert-danger"  style="display:none">
        </div>
              <div class="col text-center pt-3">

            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
          </div>
          </div>
     </div>
     </div>
  {{ Form::close() }}

</section>

   <style>
.btn.btn-secondary {
    color: #333333;
    background-color: #eeeeee;
  }
  .mt-5 p {
    font-size: 22px !important;
    padding-right: 18px;
    color: #333333;
}
.radiobtn{
  display:inline-flex;
}
.alert.alert-success {
    width: 50%;
    margin-top: 25%;
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

.custom-file-label {
    position: inherit;
}
.modal-dialog {
    background: transparent !important;
}

.modal-content {
    background: transparent;
    box-shadow: none;
}
li.nav-item.dropdown {
    border: 1px solid #fff;
}
.modal-body img {
    width: 26rem;
}
label {
    color: white;
}
section.background1 {
    margin-top: -16px;
    padding-top: 2%;
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

.loader img {
    background: #ffffff61;
    /* border-radius: 50%; */
}


input.select_media_pic {
    height: 21px;
}
  a#navbarDropdown23 {
    border: 1px solid #fff;
    color: #fff ;
}

</style>
 @include('artists.dashboard_footer')