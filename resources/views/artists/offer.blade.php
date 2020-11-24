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
            {{Form::label('Price', 'Price')}} 
                {{Form::number('price', '',['class'=>'form-control','placeholder'=>'Price'])}}
                 @if($errors->first('price'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('price') ?>
                </div>
                @endif
            </div>
              <div class="col-md-6 mt-5 ">
            {{Form::label('Keyword', 'Keywords')}} 
           {{Form::text('keyword', '',['class'=>'form-control','placeholder'=>'Keywords'])}}
                 @if($errors->first('keyword'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('keyword') ?>
                </div>
                @endif
            </div>
            
                <div class="col-md-6 mt-2 ">
            {{Form::label('Delievery Speed', 'Delievery Speed')}} 
                {{Form::number('delieveryspeed', '',['class'=>'form-control','placeholder'=>'Delievery Speed'])}}
                 @if($errors->first('delieveryspeed'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('delieveryspeed') ?>
                </div>
                @endif
            </div>

           
            <div class="col-md-6 mt-5">
                 {{Form::label('Audio/Video', 'Audio/Video')}} <br>
            {{Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label'])}} 
                {{Form::file('media',['class'=>'custom-file-input'])}}
                 @if($errors->first('media'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('media') ?>
                </div>
                @endif
            </div>
           <div class="col-md-12 mt-4">
            {{Form::label('Description', 'Description')}} 
                {{Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])}}
                 @if($errors->first('description'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('description') ?>
                </div>
                @endif
            </div>
               <div class="col-md-6 mt-4 pt-2">
            <select name="category" id="selectCategory" class='form-control'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                    @endforeach
            </select>
            </div>

              <div class="col-md-12 text-center pt-3">
            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
          </div>
    
     </div>
  {{ Form::close() }}
 @include('artists.dashboard_footer');