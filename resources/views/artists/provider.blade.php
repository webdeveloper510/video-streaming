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

            <a class="dropdown-item" href="{{url('artist/offer')}}">Create Offer</a>
        </div>
         

          </li>
          
        </ul>

    
  
      
      
  
  {!!Form::open(['id'=>'myForm','method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
          
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
            {{Form::label('Title', 'Title')}} 
                {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter Title'])}}
            </div>
         
            <div class="col-md-6 mt-2 ">
            {{Form::label('Add Price', 'Price')}} 
            {!! Form::number('price', '' , ['class' => 'form-control','placeholder'=>'Price','min'=>0]) !!}
            </div>
            <div class="col-md-6 mt-2 ">
           
              <div class="convert video">
            {{Form::label('Quality:', 'Quality:')}} 
           <select name="convert"  class='form-control'>
                    <option value="">Choose ...</option>
                    <option value="480">480p  </option>
                    <option value="720">HD 720p </option>
                    <option value="1080">Full HD 1080p  </option>
            </select>
            </div>
            <div class="video" style="display:none">
            <select name="category[]"  class='form-control my-5'>
                    <option value="">Choose Category</option>
                    @foreach($category as $cat)
                        @if($cat->type=='video')
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endif
                        @endforeach
                  
            </select>
            </div>

            <div class="audio" style="display:none">
            <select name="category[]"  class='form-control my-5'>
                    <option value="">Choose Category</option>
                    @foreach($category as $cat)
                        @if($cat->type=='audio')
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                            @endif
                        @endforeach
                   
            </select>
            </div>
            
            <div class="col-md-12 mt-3 text-white">
            <label class="media_label12">Audio/Video</label>
                {{Form::file('media',['class'=>'form-control file_input'])}}
                <span id="filename" style="color:yellow;"></span>
            </div>
            <div class="col-md-12 mt-3 text-white audio_picture" style="display:none;">   
            <label>Choose Image</label>        
                 {{Form::file('audio_pic',['class'=>'form-control chooseImage'])}}
                <span id="filename" style="color:yellow;"></span>
            </div>
            </div>
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
            <div class="alert alert-success" id="success" style="display:none">
    
    </div>

  
    <div class="alert alert-danger" id="error" style="display:none">

    </div>
     </div>
     </div>
   </div>
  {{ Form::close() }}
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

