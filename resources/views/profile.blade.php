@extends('layout.cdn')
<div class="container mt-5">
<a href="{{ URL::to('logout/profile')}}" class="ffff text-white float-right"> Logout</a>

  {!!Form::open(['action' => 'AuthController@updateProfile', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile">
        <h1>USER PROFILE DETAILS</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
            {{Form::label('Email', 'E-Mail Address')}} 
                {{Form::text('backupemail', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
                 @if($errors->first('email'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('email') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Gender', 'Gender')}} 
                 {{Form::radio('gender', 'value', true)}}Male
                {{Form::radio('gender', 'female')}}Female
                 @if($errors->first('gender'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('gender') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('ABOUT ME', 'ABOUT ME')}} 
                {{Form::textarea('aboutme',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])}}
                 @if($errors->first('aboutme'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('aboutme') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])}} 
                {{Form::file('profilepicture',['class'=>'custom-file-input'])}}
                 @if($errors->first('profilepicture'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('profilepicture') ?>
                </div>
                @endif
                {{Form::file('image',['class'=>'custom-file-input'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Sexology', 'Sexology')}} 
                {{Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','placeholder' => 'Pick a Sexology'])}}
                 @if($errors->first('sexology'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('sexology') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4" >
            {{Form::label('Tits Size', 'Tits Size')}} 
                {{Form::select('titssize', ['Small' => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null, ['class'=>'form-control','placeholder'  => 'Pick a Tits Size'])}}
                 @if($errors->first('titssize'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('titssize') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Ass', 'Ass')}} 
                {{Form::select('ass', ['Normal' => 'Normal', 'Small' => 'Small'], null, ['class'=>'form-control','placeholder' => 'Pick a Ass'])}}
                  @if($errors->first('ass'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('ass') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Privy part', 'Privy part')}} 
                {{Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','placeholder' => 'Privy part'])}}
                  @if($errors->first('privy'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('privy') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Hair length', 'Hair length')}} 
                {{Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Length'])}}
                     @if($errors->first('hairlength'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('hairlength') ?>
                </div>
                @endif
            </div>
            <div class="col mt-4">
            {{Form::label('Hair Color', 'Hair Color')}} 
                {{Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Color'])}}
                     @if($errors->first('haircolor'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('haircolor') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Eye Color', 'Eye Color')}} 
                {{Form::select('color', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' => 'Choose Eye Color'])}}
                   @if($errors->first('color'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('color') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Height', 'Height')}} 
                {{Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','placeholder' => 'Choose Height'])}}
                   @if($errors->first('height'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('height') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Weight', 'Weight')}} 
                {{Form::select('weight', ['Less than Average' => 'Less than Average', 'Normal' => 'Normal','Above Average'=>'Above Averag'], null, ['class'=>'form-control','placeholder' => 'Choose Weight'])}}
                   @if($errors->first('weight'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('weight') ?>
                </div>
                @endif
            </div>
            {{ Form::submit('Update!',['class'=>'btn btn-primary']) }}
     </div>
  {{ Form::close() }}
  </div>
</div>

