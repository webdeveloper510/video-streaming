@include('artists.dashboard')
    <section class="background1 ">
      <div class="container">
      <div class="overlay1 text-white">

      <ul class="nav">
         
         <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              <i class="fa fa-money"></i>
       Content Upload       
 </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{url('artist/offer')}}">Create Offer</a>
        </div>
         

          </li>
          
        </ul>

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
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
        {{$error}}
        </div>
      
        @endforeach
  {!!Form::open(['action' => 'AuthController@providerContent', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
          <input type="radio" class="select_media_pic" name="radio" value="audio"/>Audio
          <input type="radio" class="select_media_pic" name="radio" value="video"/>Video
      <div class="container profile">
        <h2 class="text-center">Content Upload</h2>
          <div class="row align-items-center text-white">
             <div class="col-md-6 mt-2 ">
            {{Form::label('Title', 'Title')}} 
                {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter Title'])}}
            </div>
            <div class="col-md-6 mt-2 convert">
           {{Form::label('Convert to:', 'Convert to:')}} 
           <select name="Convert"  class='form-control'>
                    <option value="">Choose ...</option>
                    <option value="1">480p  </option>
                    <option value="2">HD 720p </option>
                    <option value="3">Full HD 1080p  </option>
            </select>
            </div>
            <div class="col-md-6 mt-2 ">
            {{Form::label('Add Price', 'Price')}} 
            {!! Form::number('price', '' , ['class' => 'form-control','placeholder'=>'Price']) !!}
              
            </div>
            <div class="col-md-6 mt-4 pt-2">
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                    @endforeach
            </select>
            </div>
            <div class="col-md-6 mt-3 text-white">
            {{Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label media_label'])}} 
                {{Form::file('media',['class'=>'custom-file-input'])}}
            </div>
            <div class="col-md-6 mt-3 text-white audio_picture" style="display:none;">
            {{Form::label('Choose Media', 'Choose Picture',['class'=>'custom-file-label'])}} 
                {{Form::file('media',['class'=>'custom-file-input'])}}
            </div>
            <div class="col-md-6 mt-3">
            {{Form::label('Description', 'Description')}} 
                {{Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])}}
            </div>
            <div class="col-md-12 text-center pt-3">
            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
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

