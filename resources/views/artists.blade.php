
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
      
       
<section class="showartist">

<div class="">
    <div class="row">
    @foreach($artists as $key=>$artist)
     <div class="col-md-4">
     <a href="{{url('artistDetail/'.$artist->id)}}">

            <div class="card mt-5">
            <img class="card-img-top" src="{{$artist->profilepicture ?  url('storage/app/public/uploads/'.$artist->profilepicture) : asset('images/profile-dummy1.png') }}"  width="100%" height="300px" alt=" image cap">
            <div class="card-body text-center">
                <h3 class="card-title text-center">{{$artist->nickname}} <small style="    font-family: 'Poppins';"> <i class="fa fa-star" style="color:red;"></i>  999 </small></h3>
                <button class="btn btn-danger btn-lg" type="button"> Subscribe</button>
                <hr>
                <h5>Description</h5>
                <p class="card-text">{{$artist->aboutme}}</p>
                <div class="row">
                    <div class="col-6">
                           <div class="">
                               <h3>{{$artist->count ? $artist->count : 0}}</h3>
                               <h5>Service(S)</h3>
                               </div>

                           </div>
                           <div class="col-6">
                           <div class="">
                               <h3>{{$artist->rowcount}}</h3>
                               <h5>Collection </h3>
                                 
                           </div>
                    </div>
                </div>
            </div>
            </div>
            </a>
     </div>
     @endforeach
     

   </div>
</div>
</section>

    <div class="pagination">{{$artists->links()}}</div>

   </div>
</div>
<div class="center"></div>
  </body>
  @include('layouts.footer')