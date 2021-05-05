
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('design/artist.css')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
  form.form-inline .form-control {
    width: 60% !important;
    background-color: #ffffff !important;
    color: black !important;
}
      button.btn.btn-primary.my-2.my-sm-0 {
          margin-left: -11px;
      }
      .artistpage{
        background:black;
        color:white;
      }

      .artist .profileImage {
    width: 125px;
    height: 125px;
    border-radius: 50%;
    background: #512DA8;
    font-size: 75px;
    color: #fff;
    text-align: center;
    line-height: 116px;
    margin-right: 14px;
    margin-top: 4px;
}
hr{
  background:white;
}
.artistnoimage a{
  margin: 0px 24px;
    display: block;

}
    </style>
  </head>
  <body>
    @include('layouts.header')
    <div class="artistpage">
   <div class="container">
       <div class="row">
           <div class="col-md-4">
            <div class="form-group mt-4">
               
              <form class="form-inline text-center align-center">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
              </form>
             
              
         </div>
           </div>
           <div class="col-md-4 text-right pt-3 mt-3">
              <span>Short:</span>
           </div>
           <div class="col-md-4 mt-3">
  
            <select class="custom-select form-inline m-2">
             
                 <option selected>Filter</option>
                 <option value="1">By Popular</option>
                 <option value="2">By Alphabetical</option>
                 
               </select>
           </div>
       </div>
       <hr>
       <div class="row mb-5">
    @foreach ($artists as $artist)
           <div class="col-md-2">
             
               <div class="artist text-center">
               @if($artist->profilepicture)
                <img src="{{url('storage/app/public/uploads/'.$artist->profilepicture) }}">
                <div class="overlay">
                  <a href="{{url('artistDetail/'.$artist->id)}}">{{$artist->nickname}}</a>
               </div>
               @else
               
               <div class="artistnoimage">
               <a href="{{url('artistDetail/'.$artist->id)}}">
		    	  <span class="firstName" style="display: none;">{{$artist->nickname}}</span>
	           	<div class="profileImage"></div>

               </a>
              </div>
             
             @endif
               </div>
           </div>
             @endforeach

       </div>

    <div class="pagination">{{$artists->links()}}</div>

   </div>
</div>
  </body>
  @include('layouts.footer')