@include('layout.cdn')
<header>
   <div class="text-center">
      <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
      <div class="float-right">
         <a href="{{url('/logout/default')}}"><button class="btn btn-primery">Logout</button></a>
      </div>
      <h1 class="text-white mt-2"> Onboarding : Content Review</h1>
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
   <li class="nav-item">
      <a class="nav-link" id="pills-Identity-tab" data-toggle="pill" href="#pills-Identity" role="tab" aria-controls="pills-Identity" aria-selected="false">Contract & Identity Check</a>
   </li>   
</ul>
<div class="tab-content" id="pills-tabContent">
   <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
      </div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item tb2">
            <a class="nav-link active" id="Background-tab" data-toggle="tab" href="#Background" role="tab" aria-controls="Background" aria-selected="true">Profile & Background pictures (<span>0</span>) <br>
            Oldest : <span>0h</span><br>
            <a class="btn btn-outline-primary" href="{{url('showContent/picture')}}">start Review</a></a>
         </li>
         <li class="nav-item tb2">
            <a class="nav-link" id="Services-tab" data-toggle="tab" href="#Services" role="tab" aria-controls="Services" aria-selected="false">Services (<span>0</span>)<br><br>
            Oldest : <span>0h</span><br>
            <a class="btn btn-outline-primary" href="{{url('showContent/offer')}}">start Review</a></a>
         </li>
         <li class="nav-item tb2">
            <a class="nav-link" id="Overview-tab" data-toggle="tab" href="#Overview" role="tab" aria-controls="Overview" aria-selected="false">Overview (<span>0</span>)<br>
            <br> Oldest : <span>0h</span><br>
            <a class="btn btn-outline-primary" href="{{url('showContent/overview')}}">start Review</a></a>
         </li>
         <li class="nav-item tb2">
            <a class="nav-link" id="Collection-tab" data-toggle="tab" href="#Collection" role="tab" aria-controls="Collection" aria-selected="false">Collection (<span>0</span>)<br>
            <br> Oldest : <span>0h</span><br>
            <a class="btn btn-outline-primary" href="{{url('showContent/collection')}}">start Review</a></a>
         </li>
        
      </ul>
      <div class="tab-content" id="myTabContent">
         <!-- Background tab -->
         <div class="tab-pane fade show active" id="Background" role="tabpanel" aria-labelledby="Background-tab">
         <div class="row">
         <div class="col-md-6">
            <div class="table-responsive mb-5">
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
                     @if($artist->profilepicture!='')
                     <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>Profile Picture:{{$artist->profilepicture}}</td>
                        <td>{{$artist->nickname}}</td>
                     </tr>
                     @endif
                     @endforeach
                  </tbody>
               </table>
            </div>
            </div>
            <div class="col-md-6">
            <div class="table-responsive mb-5">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Artist</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($background as $artist)
                     @if($artist->cover_photo!='')
                     <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td> Background Picture : {{$artist->cover_photo}}</td>
                        <td>{{$artist->nickname}}</td>
                     </tr>
                     @endif
                     @endforeach
                  </tbody>
               </table>
            </div>
            </div>
            </div>
            
         </div>
         <!-- Services tab -->
         <div class="tab-pane fade" id="Services" role="tabpanel" aria-labelledby="Services-tab">
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
         <!-- Overview tab -->
         <div class="tab-pane fade" id="Overview" role="tabpanel" aria-labelledby="Overview-tab">
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
                     <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- Collection tab -->
         <div class="tab-pane fade" id="Collection" role="tabpanel" aria-labelledby="Collection-tab">
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
         <!-- Offer tab -->
         <div class="tab-pane fade" id="Offer" role="tabpanel" aria-labelledby="Offer-tab">
            <div class="text-center">
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
                     @foreach($notVerifyOrder as $notVerifyOrder)
                     <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$notVerifyOrder->deliever_media}}</td>
                        <td>{{$notVerifyOrder->nickname}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

<!-- History -->
<div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">


<section class="reportmeadia text-center">
      <div class="container">
      <div class="row my-3">
  <div class="col-md-6">
  <div class="input-group">
    <input type="search" class="form-control" placeholder="Search">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Search</button>
  </div>
</div>
  </div>

  <div class="col-md-6">
  <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>

  </div>
</div>
      <table class="table ">
         <thead class="thead-dark">
            <tr>
               <th scope="col">#</th>
               <th scope="col">File Name</th>
               <th scope="col">Artist</th>
               <th scope="col">Type</th>
               <th scope="col">Action</th>
               <th scope="col">Date</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td>File name</td>
               <td>Artist name</td>
               <td>5</td>
               <td>
                   Deny
               </td>
               <td> 25-06-2021</td>
            </tr>
            <tr>
               <th scope="row">2</th>
               <td>File name</td>
               <td>Artist name</td>
               <td>5</td>
               <td>
               Confirm
               </td>
               <td> 25-06-2021</td>
            </tr>
            <tr>
               <th scope="row">3</th>
               <td>File name</td>
               <td>Artist name</td>
               <td>5</td>
               <td>
               Deny
               </td>
               <td> 25-06-2021</td>
            </tr>
         </tbody>
         </table>


      </div>
   </section>
</div>

<!-- Identity check tab -->
<div class="tab-pane fade" id="pills-Identity" role="tabpanel" aria-labelledby="pills-Identity-tab">
   <section class="reportmeadia text-center">
      <div class="container">
      <table class="table text-center">

      <table class="table ">
         <thead class="thead-dark">
            <tr>
               <th scope="col">#</th>
               <th scope="col">Artist</th>
               <th scope="col">Content_Waiting</th>
               <th scope="col">Contract</th>
               <th scope="col">ID Check</th>
               <th scope="col">Date_of_Registration</th>
            </tr>
         </thead>
         <tbody>
            @foreach($signedProfile as $signedProfile)
            <tr>
               <th scope="row">{{$loop->iteration}}</th>
               <td> {{$signedProfile->nickname}}</td>
               <td>{{$signedProfile->mediacount + $signedProfile->offercount}}</td>
               <td class="text-center"> <h5>{{$signedProfile->agreement ? $signedProfile->agreement : ''}} </h5>
               <button class="btn btn-success agreement" type="button" onClick="statusUpdate('agreement',1)">Confirm</button>
                     <button class="btn btn-danger agreement" type="button" onClick="statusUpdate('agreement',-1)">Deny</button></td>
               <td class="text-center">
               <h5>{{$signedProfile->artist_profile ? $signedProfile->artist_profile : ''}} </h5>
               <button class="btn btn-success identify_artist" type="button" onClick="statusUpdate('identify_artist',1)">Confirm</button>
                     <button class="btn btn-danger identify_artist" type="button" onClick="statusUpdate('identify_artist',-1)">Deny</button>
               </td>
               <td>{{$signedProfile->created_at}}</td>
            </tr>

             
            @endforeach
         </tbody>
         </table>    


      </div>
   </section>
</div>
<!-- Upload Verifying -->
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

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
      </div>
   <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item tb1">
         <a class="nav-link active" id="Background-tab" data-toggle="tab" href="#Background" role="tab" aria-controls="Background" aria-selected="true">Profile & Background pictures (<span>0</span>) <br>
         Oldest : <span>0h</span><br>
         <a class="btn btn-outline-primary" href="{{url('showContent/picture')}}">start Review</a></a>
      </li>
      <li class="nav-item tb1">
         <a class="nav-link" id="Services-tab" data-toggle="tab" href="#Services" role="tab" aria-controls="Services" aria-selected="false">Services (<span>0</span>)<br><br>
         Oldest : <span>0h</span><br>
         <a class="btn btn-outline-primary" href="{{url('showContent/offer')}}">start Review</a></a>
      </li>
      <li class="nav-item tb1">
         <a class="nav-link" id="Overview-tab" data-toggle="tab" href="#Overview" role="tab" aria-controls="Overview" aria-selected="false">Overview (<span>0</span>)<br>
         <br> Oldest : <span>0h</span><br>
         <a class="btn btn-outline-primary" href="{{url('showContent/overview')}}">start Review</a></a>
      </li>
      <li class="nav-item tb1">
         <a class="nav-link" id="Collection-tab" data-toggle="tab" href="#Collection" role="tab" aria-controls="Collection" aria-selected="false">Collection (<span>0</span>)<br>
         <br> Oldest : <span>0h</span><br>
         <a class="btn btn-outline-primary" href="{{url('showContent/collection')}}">start Review</a></a>
      </li>
      <li class="nav-item tb1">
         <a class="nav-link" id="Offer-tab" data-toggle="tab" href="#Offer" role="tab" aria-controls="Offer" aria-selected="false">Orders (<span>0</span>)<br>
         <br> Oldest : <span>0h</span><br>
         <a class="btn btn-outline-primary" href="{{url('showContent/collection')}}">start Review</a></a>
      </li>
   </ul>
   <div class="tab-content" id="myTabContent">
      <!-- Background tab -->
      <div class="tab-pane fade show active" id="Background" role="tabpanel" aria-labelledby="Background-tab">
         <div class="row">
         <div class="col-md-6">
            <div class="table-responsive mb-5">
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
                     @if($artist->profilepicture!='')
                     <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>Profile Picture:{{$artist->profilepicture}}</td>
                        <td>{{$artist->nickname}}</td>
                     </tr>
                     @endif
                     @endforeach
                  </tbody>
               </table>
            </div>
            </div>
            <div class="col-md-6">
            <div class="table-responsive mb-5">
              <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Artist</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($background as $artist)
                     @if($artist->cover_photo!='')
                     <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>Profile Picture:{{$artist->profilepicture}}</td>
                        <td>{{$artist->nickname}}</td>
                     </tr>
                     @endif
                     @endforeach
                  </tbody>
               </table>
            </div>
            </div>
</div>
         </div>
      <!-- Services tab -->
      <div class="tab-pane fade" id="Services" role="tabpanel" aria-labelledby="Services-tab">
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
      <!-- Overview tab -->
      <div class="tab-pane fade" id="Overview" role="tabpanel" aria-labelledby="Overview-tab">
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
                  <tr>
                     <th scope="row">1</th>
                     <td></td>
                     <td></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- Collection tab -->
      <div class="tab-pane fade" id="Collection" role="tabpanel" aria-labelledby="Collection-tab">
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
      <!-- Offer tab -->
      <div class="tab-pane fade" id="Offer" role="tabpanel" aria-labelledby="Offer-tab">
         <div class="text-center">
         </div>
      </div>
   </div>
</div>
</div>
</div>
<section class="reportmeadia">
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
   </div>
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
   width: 25%;
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
   .tab-content{
   padding: 0 !important;
   }
   ul.nav.nav-tabs li.nav-item.tb1 {
   width: 20% !important;
   margin-bottom:20px;
   }
</style>
@include('layouts.footer')