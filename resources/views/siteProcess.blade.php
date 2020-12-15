<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

    <title>Coming Soon</title>

  </head>
  <body style=" background:#750108;  color: white;">
    
    <div class="container">
    <div class="row mt-5 pt-5">
        <div class="col"></div>
        <div class="col-md-8">
            <div class="text-center my-5">
              <img src="{{asset('images/logos/cominglogo.png')}}" width="300px">
                <h1  style="font-size: 83px;font-family: 'Satisfy', cursive;">We're Coming Soon</h1>
            </div>

            @foreach($errors->all() as $error)

            <div class="alert alert-danger">
              {{$error}}
            </div>
             @endforeach
                 {!!Form::open(['action' => 'AuthController@notifyEmail', 'method' => 'post'])!!}
          {{Form::token()}}
                <div class="form-row">
                    <div class="col"></div>
         
                  <div class="col-sm-7">
                  {{Form::label('Email', 'Enter your email here**')}} 
                {{Form::text('emails', '',['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
                  </div>

                  <div class="col-sm-3 mt-2">
                
                      <br>
                       {{ Form::submit('Notify Me!',['class'=>'form-control btn btn-dark']) }}
                  </div>
                  <div class="col"></div>
                </div>
                 {{ Form::close() }}
       
    </div>
    <div class="col"></div>
    </div>
   </div>
</div>



    <!--  jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

   
  </body>
</html>