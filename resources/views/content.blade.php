@extends('layout.cdn')
<div class="container mt-5">

<!--a href="{{ URL::to('logout')}}" class="ffff text-white float-right"> Logout</a-->
  @if(session('success'))
        <div class="alert alert-success" id="success">
        {{session('success')}}
        </div>
        @endif
            </div>
          </div>
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
  {!!Form::open(['action' => 'AuthController@contentProvider1', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
        <div class="heading">Content Provider Detail</div>
          <div class="row align-items-center">
            <div class="col-md-6">
            {{Form::label('Email', 'E-Mail Address')}} 
                {{Form::text('email', null,['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
                 @if($errors->first('email')))
                <div class="alert alert-danger">
                  <?php echo $errors->first('email') ?>
                </div>
                @endif
            </div>

            <div class="col-md-6 ">
            {{Form::label('Nickname', 'Nickname')}} 
                {{Form::text('nickname',null,['class'=>'form-control','placeholder'=>'Enter Nickname'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('nickname') ?>
                </div>
                @endif
            </div>
             <div class="col-md-6 ">
            {{Form::label('Title', 'Title')}} 
                {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter Title'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('title') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Password', 'Password')}} 
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
                 @if($errors->first('password'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('password') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Gender', 'Gender')}} 
                 {{Form::radio('gender', 'value', true)}}Male
                {{Form::radio('gender', 'female')}}Female
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('gender') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('ABOUT ME', 'ABOUT ME')}} 
                {{Form::textarea('aboutme',null,['class'=>'form-control', 'rows' => 2,'placeholder'=>'About Me','cols' => 40])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('aboutme') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])}} 
                {{Form::file('image',['class'=>'custom-file-input'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('image') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Sexology', 'Sexology')}} 
                {{Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','placeholder' => 'Pick a Sexology'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('sexology') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6" >
            {{Form::label('Tits Size', 'Tits Size')}} 
                {{Form::select('titssize', ['Small' => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null, ['class'=>'form-control','placeholder'  => 'Pick a Tits Size'])}}
                @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('titssize') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Ass', 'Ass')}} 
                {{Form::select('ass', ['Normal' => 'Normal', 'Small' => 'Small'], null, ['class'=>'form-control','placeholder' => 'Pick a Ass'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('ass') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Privy part', 'Privy part')}} 
                {{Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','placeholder' => 'Privy part'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('privy') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Hair length', 'Hair length')}} 
                {{Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Length'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('hairlength') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Hair Color', 'Hair Color')}} 
                {{Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Color'])}}
                   @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('haircolor') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Eye Color', 'Eye Color')}} 
                {{Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' => 'Choose Eye Color'])}}
                  @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('eyecolor') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6">
            {{Form::label('Height', 'Height')}} 
                {{Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','placeholder' => 'Choose Height'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('height') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 ">
            {{Form::label('Weight', 'Weight')}} 
                {{Form::select('weight', ['Less than Average' => 'Less than Average', 'Normal' => 'Normal','Above Average'=>'Above Averag'], null, ['class'=>'form-control','placeholder' => 'Choose Weight'])}}
                 @if(session('errors'))
                <div class="alert alert-danger">
                    <?php echo $errors->first('weight') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6-mt-4">
                <select name="category" class='form-control'>
                    <option value="">Choose category</option>
                    @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                    @endforeach
                </select>
            </div>
            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
     </div>
  {{ Form::close() }}
            </div>
          </div>
      
       


