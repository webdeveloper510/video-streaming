@include('layout.cdn')
<header>
<div class="text-center">
<img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
<div class="float-right">
<a href="{{url('/logout/default')}}"><button class="btn btn-primery">Logout</button></a>
</div>
<h1 class="text-white mt-2"> Content Review</h1>
</div>

</header>


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Reported Items</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Upload Verifying</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">History</a>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  
  <section class="reportmeadia">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="text-center">
                <h3>Oldest : <span>0h</span></h3>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
                <h3>In Queue : <span>0</span> </h3>
          </div>
      </div>
    </div>
  
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

  @foreach($reports as $is_not_veryfy)
    <div class="carousel-item active">
    <div class="row media">
          <div class="col-md-4">
          @if($is_not_veryfy->type=='video')
          <video width="100%" controls>
            <source src="{{url('storage/app/public/video/'.$is_not_veryfy->media)}}" type="video/mp4">
            </video>
            @else
            <video width="100%" controls>
            <source src="{{url('storage/app/public/video/'.$is_not_veryfy->media)}}" type="video/mp4">
            </video>
            @endif
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3>{{$is_not_veryfy->reason}}</h3>
                <p> {{$is_not_veryfy->description}} </p>
                     <div class="text-right buttons">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#legal" type="button">Start Review</button>
                         <button class="btn btn-outline-primary" type="button" onClick="legelorNot({{$is_not_veryfy->id.','.$is_not_veryfy->increamented.','.$is_not_veryfy->contentProviderid}},1)">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button" onClick="legelorNot({{$is_not_veryfy->id.','.$is_not_veryfy->increamented.','.$is_not_veryfy->contentProviderid}},-1)">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>
       </div>
    </div>
    

    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>
</section>
  
  </div>
      <!-- History -->
  <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
  <section class="reportmeadia">
  <div class="container">
  
    @foreach($verifyHistory as $is_not_veryfy)

      <div class="row media">
          <div class="col-md-4">
          @if($is_not_veryfy->type=='video')
          <video width="100%" controls>
            <source src="{{url('storage/app/public/video/'.$is_not_veryfy->media)}}" type="video/mp4">
            </video>
            @else
            <video width="100%" controls>
            <source src="{{url('storage/app/public/video/'.$is_not_veryfy->media)}}" type="video/mp4">
            </video>
            @endif
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3>{{$is_not_veryfy->title}}</h3>
                <p> {{$is_not_veryfy->description}} </p>
                     <div class="text-right buttons">
                     <button class="btn btn-primary" data-toggle="modal" data-target="#legal" type="button">Start Review</button>
                         <button class="btn btn-outline-primary" type="button">Permit</button>
                          <button class="btn btn-outline-primary" type="button">Deny</button>
                        </div>
                </div>
           </div>
       </div>

    
@endforeach



  </div>
</section>

</div>
                    <!-- Upload Verifying -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    
  <section class="reportmeadia">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="text-center">
                <h3>Oldest : <span>0h</span> </h3>

                <select class="custom-select my-2"">
                    <option selected>All</option>
                    <option value="1">Audio</option>
                    <option value="2">Video</option>
                    <option value="3">Projects</option>
                    <option value="4">Orders</option>
                  </select>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
                <h3>In Queue : <span>0</span> </h3>

                <button class="btn btn-outline-primary my-2"  data-toggle="modal" data-target="#deny" type="button" >Start Reviewing</button>
      
 


      </div>
    </div>
    </div>
    </div>

       <div class="row">
         <div class="col-md-3">

         <div class="text-center">
                 <h3>Oldest : <span>0h</span></h3>
                 <h3>Profile & Background pictures : (<span>0</span>)</h3>
                 <a class="btn btn-outline-primary" href="{{url('showContent/picture')}}">start Review</a>
         </div>
         <div class="table-responsive">
         <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">File Name</th>
                <th scope="col">Artist</th>
              
              </tr>
            </thead>
            <tbody>
            @foreach($artists as $artist)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$artist->profilepicture}}</td>
                <td>{{$artist->nickname}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
         </div>
         </div>
         <div class="col-md-3">

            <div class="text-center">
                    <h3>Oldest : <span>0h</span></h3>
                    <h3>Services : (<span>0</span>)</h3>
                    <a class="btn btn-outline-primary" href="{{url('showContent/offer')}}">start Review</a>
            </div>
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">filename</th>
                  <th scope="col">Artist</th>
                
                </tr>
              </thead>
              <tbody>
              @foreach($services as $services)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$services->media}}</td>
                <td>{{$services->nickname}}</td>
              </tr>
              @endforeach
              </tbody>
            </table>
            </div>
            </div>
            <div class="col-md-3">
            <div class="text-center">
                    <h3>Oldest : <span>0h</span></h3>
                    <h3>Overview : (<span>0</span>)</h3>
                    <a class="btn btn-outline-primary" href="{{url('showContent/overview')}}">start Review</a>
            </div>
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                
                </tr>
              </thead>
              <tbody>
              <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
              </tr>
              </tbody>
            </table>
            </div>
            </div>
            <div class="col-md-3">

            <div class="text-center">
                    <h3>Oldest : <span>0h</span></h3>
                    <h3>collection : (<span>0</span>)</h3>
                    <a class="btn btn-outline-primary" href="{{url('showContent/collection')}}">start Review</a>
            </div>
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">File Name	</th>
                  <th scope="col">Artist</th>
                
                </tr>
              </thead>
              <tbody>
              @foreach($notVerified as $notVerified)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$notVerified->media}}</td>
                <td>{{$notVerified->nickname}}</td>
              </tr>
              @endforeach
              </tbody>
            </table>
            </div>
            </div>
      


       </div>

 








     <div class="modal fade" id="legal_{{$is_not_veryfy->id}}" tabindex="-1" role="dialog" aria-labelledby="legalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
 <div class="data">
    <h3>Title : {{$is_not_veryfy->title}}</h3>
    <p>Artist</p>
    <video width="100%" height="340" controls>
    <source src="{{url('storage/app/public/video/'.$is_not_veryfy->media)}}" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <p class="text-center">Trustlevel : <span>0</span></p>

  <div class="row">
    <div class="col-md-6 text-center">
       <button class="btn btn-primary" type="button" onClick="permit({{$is_not_veryfy->id}},true)">Permit</button>
    </div>
   <div class="col-md-6 text-center">
      <button class="btn btn-primary" type="button" onClick="permit({{$is_not_veryfy->id}},false)">Deny</button>
   </div>
 </div>
 <p><b>Description :{{$is_not_veryfy->description}}</b> ..........</p>
</div>
</div>
</div>

</div>
</div>
      @endif
 </div>

@endforeach

    </section>
  
  </div>
</div>



<!-- Modal -->




<!-- Modal -->
<div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="denyLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="data">
          <h3>Title</h3>
          <p>Artist</p>
          <video width="100%" height="340" controls>
          <source src="movie.mp4" type="video/mp4">
          <source src="movie.ogg" type="video/ogg">
        
        </video>
        <p class="text-center">Trustlevel : <span>0</span></p>

        <div class="row">
          <div class="col-md-6 text-center">
             <button class="btn btn-primary" type="button">deny</button>
          </div>
         <div class="col-md-6 text-center">
            <button class="btn btn-primary" type="button">Permit</button>
         </div>
       </div>
       <p><b>Description :</b> ..........</p>
  </div>
  </div>
      </div>
     
    </div>
  </div>
</div>





<style>
.text-right.buttons {
    position: absolute;
    top: 0;
    right: 20px;
}
.carousel-control-next-icon, .carousel-control-prev-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
    background: #0000001a no-repeat center center;
    background-size: 100% 100%;
}
li.nav-item {
    width: 33.33%;
    text-align: center;
    padding: 10px;
    background: #7b0000;
    color: white !important;
}
li.nav-item  a{
 color:white;
}
.row.media {
    border: 1px solid black;
    padding: 13px;
    margin-bottom: 12px;
}
header {
    background: #7b0000;
    padding: 11px;
}
.float-right {
    position: absolute;
    right: 20px;
    top: 20px;
}
  </style>

@include('layouts.footer')