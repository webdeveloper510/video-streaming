@include('artists.dashboard')
<section class="background1 pb-5 ">
    <div class="container">
        <div class="overlay1">
            @if(session('success'))
            <div class="alert alert-success set" id="success">
                {{session('success')}}
            </div>
            @endif @if(session('error'))
            <div class="alert alert-danger" id="error">
                {{session('error')}}
            </div>
            @endif @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>

            @endforeach {!!Form::open(['id' => 'artist_info', 'method' => 'post',
            'files'=>true])!!}
            {{Form::token()}}
            <div class="container profile">
                <div class="heading text-center">
            <h2 class="text-white ">Artist Detail</h2></p>
                </div>
                <!---------------------- First Step Form-------------------->
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-8"></div>
                    <div class="col"></div>
                </div>
                <!-- -------------------- second Step Form-------------------->
                 <div class="row align-items-center text-white">
                    <div class="col-md-6 pt-3">
                        {{Form::label('Gender', 'Gender')}}
                        <br>
                        {{Form::radio('gender', 'male',
                false,['class'=>'rad_But'])}}Male&nbsp;&nbsp;
                        {{Form::radio('gender',
                'female',false,['class'=>'rad_But'])}}Female&nbsp;&nbsp;
                        {{Form::radio('gender',
                'trans',false,['class'=>'rad_But','checked'])}}Trans @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo $errors->first('gender') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3">
                        {{Form::label('sexology', 'Sexology')}}
                        {{Form::select('sexology', ['Hetero' => 'Hetero', 'Homo' =>
                'Homo','Bisexual'=>'Bisexual'], null, ['class'=>'form-control','placeholder' =>
                'Choose','required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo $errors->first('sexology') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3">
                        {{Form::label('Body', 'Body')}}
                        {{Form::select('weight',
                ['Thin' => 'Thin', 'Normal' =>
                'Normal','Muscular'=>'Muscular','Chubby'=>'Chubby'], null,
                ['class'=>'form-control','placeholder' => 'Choose','required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo
                $errors->first('weight') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3">
                        {{Form::label('Height', 'Height')}}
                        {{Form::select('height', ['<140cm' =>
                '<140cm', '140-160cm' =>
                '140-160cm','160-180cm'=>'160-180cm','180cm<'=>'180cm<'], null,
                ['class'=>'form-control','placeholder' => 'Choose','required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo
                $errors->first('height') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3">
                        {{Form::label('Hair Color', 'Hair Color')}}
                        {{Form::select('haircolor', ['Brown'
                => 'Brown', 'blonde' => 'Blonde', 'Black' => 'Black', 'Red' => 'Red', 'Gray' =>
                'Gray', 'Silver' => 'Silver', 'White' => 'White', 'Orange' => 'Orange', 'Yellow'
                => 'Yellow', 'Green' => 'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet'
                => 'Violet'], null, ['class'=>'form-control','placeholder' =>
                'Choose','required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo $errors->first('haircolor') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3">
                        {{Form::label('Hair length', 'Hair length')}}
                        {{Form::select('hairlength', ['Very short' => 'Very short', 'Short' =>
                'Short','Long'=>'Long','Very Long'=>'Very Long'], null,
                ['class'=>'form-control','placeholder' => 'Choose','required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo
                $errors->first('hairlength') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3">
                        {{Form::label('Eye/Lenses Color', 'Eye/Lenses Color')}}
                        {{Form::select('eyecolor', ['Brown' => 'Brown', 'Blonde' => 'Blonde', 'Black' =>
                'Black', 'Red' => 'Red', 'Gray' => 'Gray', 'Brown-green' => 'Brown-green',
                'White' => 'White', 'Orange' => 'Orange', 'Yellow' => 'Yellow', 'Green' =>
                'Green', 'Blue' => 'Blue', 'Indigo' => 'Indigo','Violet' =>
                'Violet','Golden'=>'Golden'], null, ['class'=>'form-control','placeholder' =>
                'Choose','required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo $errors->first('eyecolor') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3">
                        {{Form::label('privy part', 'Privy Part')}}
                        {{Form::select('privy', ['Shaved' => 'Shaved', 'Unshaved' => 'Unshaved'], null,
                [ 'class'=>'form-control','placeholder' => 'Choose','required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo
                $errors->first('privy') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3 hide">
                        {{Form::label('tits Size', 'Tits Size')}}
                        {{Form::select('titssize', ['Small'
                => 'Small', 'Normal' => 'Normal','Big'=>'Big'], null,
                ['class'=>'form-control','id'=>'tits','placeholder' => 'Choose'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo $errors->first('titssize') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 pt-3 hide">
                        {{Form::label('Ass Size', 'Ass
                Size')}}
                        {{Form::select('ass', ['Normal' => 'Normal', 'Small' =>
                'Small','Big'=>'Big'], null, ['class'=>'form-control','id'=>'ass','placeholder' =>
                'Choose'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo
                $errors->first('ass') ?>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12 pt-3">
                        {{Form::label('ABOUT ME', 'ABOUT ME')}}
                        {{Form::textarea('aboutme',null,['class'=>'form-control', 'rows' =>
                20,'placeholder'=>'About Me','maxlength'=>'2000','cols' => 30,'required'])}}
                        @if(session('errors'))
                        <div class="alert alert-danger">
                            <?php echo
                $errors->first('aboutme') ?>
                        </div>
                        @endif
                    </div>
                    <!-- <div class="col-md-6 pt-4 "> {{Form::label('Choose Profilepicture', 'Choose
                    Profilepicture',['class'=>'custom-file-label'])}}
                    {{Form::file('image',['class'=>'custom-file-input chooseImage','required'])}}
                    <span id="filename" style="color:red;"></span> </div> <div class="col-md-6 pt-4
                    "> {{Form::label('Choose Backgroundimage', 'Choose
                    Backgroundimage',['class'=>'custom-file-label'])}}
                    {{Form::file('cover_photo',['class'=>'custom-file-input
                    chooseImage','required'])}} <span id="filename" style="color:red;"></span>
                    </div> <div class="col-md-6 pt-2 text-center"> <!-- <img id="blah"
                    src="https://dummyimage.com/300" width="100px" height="100px" /> -->
                    @if(session('errors'))
                     <div class="alert alert-danger">
                      <?php echo
                    $errors->first('image') ?>
                     </div>
                      @endif 
                      </div>
                    <div class="loader col-6" style="display:none">
                     <span style="color:green;
                    font-weight: bold;">Uploading...</span>
                    <img
                    src="{{asset('images/loading2.gif')}}" width="50px" height="50px"/> 
                    <span
                    class="percentage" style="color:green;font-weight: bold;"></span>
                     </div>
                      <div
                    class="col-md-12 text-center pt-3"> {{ Form::submit('Submit!',['class'=>'btn
                    btn-primary']) }}
                     </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </section>
    <style type="text/css">
    
        section.background1 {

            height: auto;
            width: 98%;
            position: absolute;
        }

        label {
            color: white;
        }
    </style>
    @include('artists.dashboard_footer')