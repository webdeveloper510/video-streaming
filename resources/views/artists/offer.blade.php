@include('artists.dashboard')

 @if(session('success'))
        <div class="alert alert-success" id="success">
        {{session('success')}}
        </div>
        @endif
           
          @if(session('error'))
        <div class="alert alert-danger" id="error">
        {{session('error')}}
        </div>
        @endif
{!!Form::open(['action' => 'artist@createOffer', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile ">
        <h1 class="text-center">Create Offer</h1>
        
          <div class="row align-items-center text-white">
          <div class="col-md-12 mt-5 ">
          <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              <i class="fa fa-money"></i>
              Content Upload
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{url('artist/offer')}}">Create Offer</a>
            <a class="dropdown-item" href="{{url('artist/contentUpload')}}">Content Upload</a>
        </div>
         

          </li>
          
        </ul>
        </div>
                <div class="col-md-6 mt-5 ">
                {{Form::label('Title', 'Title')}} 
                    {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Title'])}}
                    @if($errors->first('title'))
                    <div class="alert alert-danger">
                      <?php echo $errors->first('title') ?>
                    </div>
                    @endif
                </div>
           
                    <div class="col-md-6 mt-5 ">
                    {{Form::label('Price(PAZ)', 'Price(PAZ)')}} 
                        {{Form::number('price', '',['class'=>'form-control','placeholder'=>'Price'])}}
                        @if($errors->first('price'))
                        <div class="alert alert-danger">
                          <?php echo $errors->first('price') ?>
                        </div>
                        @endif
                    </div>

        
           
            
            <div class="col-md-6 mt-5 ">
            {{Form::label('Delievery Speed(Days)', 'Delievery Speed(Days)')}} 
                {{Form::number('delieveryspeed', '',['class'=>'form-control','placeholder'=>'Delievery Speed'])}}
                 @if($errors->first('delieveryspeed'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('delieveryspeed') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-5 ">
            <label>Quality:</label>
            <select name="quality" class="form-control" id="quality">
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
            </div>
            <div class="col-md-6 mt-5 ">
            <label>Duration(In Minutes)</label>
            <div class="row">

               <div class="col">
                  
               <label>Min :</label>
               {{Form::number('min', '',['class'=>'form-control','placeholder'=>'Min'])}}
                 </div>
                     <div class="col">
                   <label>Max :</label>
                   {{Form::number('max', '',['class'=>'form-control','min'=>0,'placeholder'=>'Max'])}}
                         </div>
                     </div>
            </div>
               <div class="col-md-6 mt-5 pt-4">
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                    @endforeach
            </select>
            </div>

         
             
           
            <div class="col-md-6 mt-5">
            <label>Sample Audio/Video/Image(Max 30s)</label>
                 {{Form::label('Audio/Video', 'Audio/Video')}} <br>
            {{Form::label('Sample Media', 'Samples Media',['class'=>'custom-file-label'])}} 
                {{Form::file('media',['class'=>'custom-file-input','id'=>'file_input'])}}
                 @if($errors->first('media'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('media') ?>
                </div>
                @endif
                <span id="filename" style="color:red;"></span>
                <div class="col-md-6 mt-5">
              <video width="200" id="video_choose" controls style="display:none;">
             <source src="mov_bbb.mp4" id="video">
             Your browser does not support HTML5 video.
             </video>

             <img id="image" src="#" width="50px;" style="display:none;" height="50px;" alt="your image" />
            </div>
                </div>

                <div class="col-md-6 mt-2 pt-4">
                <label>Offer Status</label>
            <select name="offer_status"  class='form-control'>
                    <option value="">Choose...</option>
                    <option value="offline">Offline(Draft)</option>
                    <option value="online">Online</option>
                   
            </select>
            </div>
              
            <div class="col-md-6 mt-5">
             {{Form::label('Description', 'Description')}} 
                {{Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 40])}}
                 @if($errors->first('description'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('description') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-5">
             {{Form::label('Additional Request', 'Additional Request')}} 
                {{Form::textarea('additional',null,['class'=>'form-control', 'rows' => 5, 'cols' => 40])}}
                 @if($errors->first('additional'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('additional') ?>
                </div>
                @endif
            </div>
           
           
          
            

              <div class="col-md-12 text-center pt-3">
            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
          </div>
    
     </div>
  {{ Form::close() }}



   <style>
.btn.btn-secondary {
    color: #333333;
    background-color: #eeeeee;
  }

  a#navbarDropdown23 {
    border: 1px solid #7b0000 ;
    color: #7b0000 ;
}
</style>
 @include('artists.dashboard_footer');