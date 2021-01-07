
 <section class="background1">

  @include('layouts.header')

            <div class="container">
          <div class="overlay1 ovr my-5 ">

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

  <!-- --------------------------  Profile Update Section Start--------------------------->



  {!!Form::open(['action' => 'AuthController@updateProfile', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile ">
        <h1 class="text-center">USER PROFILE DETAILS</h1>
          <div class="row align-items-center text-white">
            <div class="col-md-6 mt-5 ">
            {{Form::label('Email', 'E-Mail Address')}} 
                {{Form::text('backupemail', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
                 @if($errors->first('email'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('backupemail') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4">
            {{Form::label('Gender', 'Gender')}} 
            <br>
                 {{Form::radio('gender', 'male', true,['class'=>'rad_But'])}}Male
                {{Form::radio('gender', 'female',false,['class'=>'rad_But'])}}Female
                 @if($errors->first('gender'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('gender') ?>
                </div>
                @endif
            </div>
           
            <div class="col-md-6 mt-4">

            {{Form::label('Choose Image', 'Choose Image',['class'=>'custom-file-label'])}} 
                {{Form::file('image',['class'=>'custom-file-input'])}}
                 @if($errors->first('image'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('image') ?>
                </div>
                @endif
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
            <!-- <div class="col-md-6 mt-4 hide" >
            {{Form::label('Tits Size', 'Tits Size')}} 
                {{Form::select('titssize', ['Small' => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null, ['class'=>'form-control','placeholder'  => 'Pick a Tits Size'])}}
                 @if($errors->first('titssize'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('titssize') ?>
                </div>
                @endif
            </div>
            <div class="col-md-6 mt-4 hide">
            {{Form::label('Ass', 'Ass')}} 
                {{Form::select('ass', ['Normal' => 'Normal', 'Small' => 'Small', 'Big'=>'Big'], null, ['class'=>'form-control','placeholder' => 'Pick a Ass'])}}

            </div>
              @if($errors->first('ass'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('ass') ?>
                </div>
                  @endif
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
                {{Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green', 'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' => 'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' => 'Choose Eye Color'])}}
                   @if($errors->first('eyecolor'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('eyecolor') ?>
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
                {{Form::select('weight', ['Less than Average' => 'Less than Average', 'Normal' => 'Normal','Above Average'=>'Above Average'], null, ['class'=>'form-control','placeholder' => 'Choose Weight'])}}
                   @if($errors->first('weight'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('weight') ?>
                </div>
                @endif
            </div> -->
           <div class="col-md-12 mt-4">
            {{Form::label('ABOUT ME', 'ABOUT ME')}} 
                {{Form::textarea('aboutme',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40])}}
                 @if($errors->first('aboutme'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('aboutme') ?>
                </div>
                @endif
            </div>
              <div class="col-md-12 text-center pt-3">
            {{ Form::submit('Update!',['class'=>'btn btn-primary']) }}
          </div>
    
     </div>
  {{ Form::close() }}
  </div>

  <!-- -------------------------- Profile Upadte section End--------------------------->

</div>
</div>
</section>
<style>
.custom-file-label{
z-index:0 !important;

}
.overlay1 {
    margin-top: 7% !important;
  }

</style>

@include('layouts.footer')