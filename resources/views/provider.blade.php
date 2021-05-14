@include('artists.dashboard');
<section class="background1">

    <div class="container mt-5">
        <div class="overlay1 text-white">
            @if(session('success'))
            <div class="alert alert-success" id="success">
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
            @endforeach {!!Form::open(['action' => 'AuthController@providerContent',
            'method' => 'post', 'files'=>true])!!}
            {{Form::token()}}
            <div class="container profile">
                <h1 class="text-center">Content Upload</h1>
                <div class="row align-items-center text-white">
                    <div class="col-md-6 mt-2 ">
                        {{Form::label('Title', 'Title')}}
                        {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter Title'])}}
                    </div>
                    <div class="col-md-6 mt-2 ">
                        {{Form::label('Duration', 'Duration')}}
                        <div class="row text-white">
                            <div class="col-md-4">`
                                <div class="form-group">
                                    {{Form::text('hour',null,['class'=>'form-control','placeholder'=>'Hour'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::text('minutes','',['class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::text('seconds','',['class'=>'form-control'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2 ">
                        {{Form::label('Add Price', 'Price')}}
                        {!! Form::number('price', '' , ['class' =>
                        'form-control','placeholder'=>'Price']) !!}

                    </div>
                    <div class="col-md-6 mt-2 ">
                        {{Form::label('Keyword', 'Keyword')}}
                        {{Form::text('keyword', '',['class'=>'form-control','placeholder'=>'Enter Keyword'])}}
                    </div>

                    <div class="col-md-6 mt-4 pt-2">
                        <select name="category" id="selectCategory" class='form-control'>
                            <option value="">Choose category</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mt-4 pt-2">
                        <select name="subcategory" id="subCategory" class='form-control'>
                            <option value="">Choose Subcategory</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        {{Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label'])}}
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

    </section>