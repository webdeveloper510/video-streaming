@extends('layout.cdn')
<div class="container mt-5">

<a href="{{ URL::to('logout')}}" class="ffff text-white float-right"> Logout</a>
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
        <h1>Content Provider Detail</h1>
          <div class="row align-items-center">
            <div class="col-md-6 mt-5 ">
            {{Form::label('Email', 'E-Mail Address')}} 
                {{Form::text('email', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
            </div>
            <div class="col-md-6 mt-5 ">
            {{Form::label('Nickname', 'Nickname')}} 
                {{Form::text('nickname', '',['class'=>'form-control','placeholder'=>'Enter Nickname'])}}
            </div>
            <div class="col-md-6 mt-5 ">
            {{Form::label('Password', 'Password')}} 
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Gender', 'Gender')}} 
                 {{Form::radio('gender', 'value', true)}}Male
                {{Form::radio('gender', 'female')}}Female
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('ABOUT ME', 'ABOUT ME')}} 
                {{Form::textarea('aboutme',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])}} 
                {{Form::file('image',['class'=>'custom-file-input'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Sexology', 'Sexology')}} 
                {{Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' => 'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','placeholder' => 'Pick a Sexology'])}}
            </div>
            <div class="col-md-6 mt-4" >
            {{Form::label('Tits Size', 'Tits Size')}} 
                {{Form::select('titssize', ['Small' => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null, ['class'=>'form-control','placeholder'  => 'Pick a Tits Size'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Ass', 'Ass')}} 
                {{Form::select('ass', ['Normal' => 'Normal', 'Small' => 'Small'], null, ['class'=>'form-control','placeholder' => 'Pick a Ass'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Privy part', 'Privy part')}} 
                {{Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null, [ 'class'=>'form-control','placeholder' => 'Privy part'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Hair length', 'Hair length')}} 
                {{Form::select('hairlength', ['Very short' => 'Very short', 'Short' => 'Short','Long'=>'Long','Very Long'=>'Very Long'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Length'])}}
            </div>
            <div class="col mt-4">
            {{Form::label('Hair Color', 'Hair Color')}} 
                {{Form::select('haircolor', ['Brown' => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet'], null, ['class'=>'form-control','placeholder' => 'Choose Hair Color'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Eye Color', 'Eye Color')}} 
                {{Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' => 'Choose Eye Color'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Height', 'Height')}} 
                {{Form::select('height', ['<140cm' => '<140cm', '140-160cm' => '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null, ['class'=>'form-control','placeholder' => 'Choose Height'])}}
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Weight', 'Weight')}} 
                {{Form::select('weight', ['Less than Average' => 'Less than Average', 'Normal' => 'Normal','Above Average'=>'Above Averag'], null, ['class'=>'form-control','placeholder' => 'Choose Weight'])}}
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
</div>`

