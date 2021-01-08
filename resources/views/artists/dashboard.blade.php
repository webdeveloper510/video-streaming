<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>
   Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('design/dashboard.css')}}" />
  <!-- CSS Files -->
  <link href="{{asset('artistdashboard//css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('artistdashboard/css/demo/demo.css')}}" rel="stylesheet" />

    
    <!--  <script id="base_url" data-url="{{ URL::to('/')}}" src="{{asset('js/my.js')}}"></script> -->

<style type="text/css">
 
 </style>
</head>

<body class="">

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
     
      <div class="logo"><a href="" class="simple-text logo-normal">
      <img src="{{asset('images/logos/newlogo.png')}}" height="50" alt="CoolBrand">
        
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{$tab=='dashboard' ? 'active': ''}} ">
            <a class="nav-link " href="{{url('artists/dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='profile' ? 'active': ''}}">
            <a class="nav-link" href="{{url('artist/Profile')}}">
              <i class="material-icons">person</i>
              <p> Profile</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='feed' ? 'active': ''}}">
            <a class="nav-link" href="{{url('artists/dashboard')}}">
            <i class="fa fa-newspaper-o"> </i>
              <p>User Feed</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='upload' ? 'active': ''}}">
            <a class="nav-link" href="{{url('artist/contentUpload')}}">
              <i class="fa fa-upload"></i>
              <p>Upload</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='withdraw' ? 'active': ''}}">
            <a class="nav-link" href="{{url('/withdraw')}}">
              <i class="fa fa-money"></i>
              <p>Withdraw</p>
            </a>
          </li>
           <li class="nav-item {{$tab=='requests' ? 'active': ''}}">
            <a class="nav-link" href="{{url('artist/requests')}}">
              <i class="fa fa-money"></i>
              <p>Orders</p>
            </a>
          </li>
         <li class="nav-item dropdown {{$tab == 'offer' ? 'active': ''}}">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              <i class="fa fa-money"></i>
              My Offers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('/artist/offer')}}">Create Offer</a>
          <a class="dropdown-item" href="{{url('/artist/my-offer')}}">My Offers</a>
         
        </div>
         

          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper text-white ">
          
          <ul class="nav custom search">
          <li id="options" onclick="mufunc()">
              <a href="#"><img width="35px" src="{{asset('images/logos/filter.png')}}"></a></li>
             


              <ul class="subnav" style="display: none">
                  <ul class="nav nav-tabs text-center">
                    <li class="active link_click"><a data-toggle="tab" class="text-white" href="#home">Video</a></li>
                    </ul>
          
                    <div class="tab-content">
                    <div id="home" class="tab-pane fade1 in active">
                        <h3 style="color: #fff;">Projects</h3>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                  {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='video')
                   <label class=""> 
                     {{Form::checkbox('catid[]', $cat->id)}}
                     {{$cat->category}} 
                   </label><br>
                             @endif
                            @endforeach
                          
                      </div>
                     </div>

                          <div class="col-md-6 ">
                            <div class="bar ">
                        <div class="dropdown1 text-white">
                           <h4>Reward</h4>
                         
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} Lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Highest
                         <!--      orm::checkbox('price','desc')}}Higest   -->
                            
                            </label>
                       
                        </div>

                        <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                               {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
                         <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                           
                            </label><br>
                            <label class="">
                               {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
                          <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                            
                          </label><br>
                      
                        </div>
                          <div class="collapse pt-4" id="collapseExample1">
                @include('popup') 
              </div>
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-12 text-right pr-5">
              
               
         <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;" >
          {{ Form::submit('Apply!',['class'=>'btn btn-primary mb-4']) }}
              </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                      
                    
                     </div>
                    </div>
                    </ul>
              <form action="" method="get">
             
                  <input type="text" name="search_text" id="search_text" placeholder="Search"/>

                
              </form>
          
        
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
              <li class="nav-item">
               
              
           <div class="btn-group login-btn text-right" style="border-right: 3px solid white;">    
           <a href="{{url('/artist/offer')}}">

           <button type="button" class="btn btn-warning text-white mr-3 mt-2">Create Offer</button>

           </a>
           
           @if($artistProfile[0]->profilepicture)
            <img width="50px" height="50px" src="{{url('storage/app/public/uploads/'.$artistProfile[0]->profilepicture)}}">
          @else
 
    <div class="">
            <span class="firstName" style="display: none;">{{$artistProfile[0]->nickname}}</span>
              <div class="profileImage"></div>
    </div>
   @endif

   <span class="profile-img text-white text-center">
   <span class="nickname">{{$login->nickname}}</span>
   <button type="button" class="btn btn-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
    </button>
   
     <div class="dropdown-menu dropdown-menu-right">
         <button class="dropdown-item" type="button">
           <a href="{{url('/profile')}}">Edit Profile
           </a></button>
        <button class="dropdown-item" type="button">
          <a href="{{url('/logout')}}">Logout</a></button>
           <button class="dropdown-item" type="button">
          <a href="{{url('/my-requests')}}">Projects</a></button>
    </div>
   <hr/ style="color:white;background: white;">
  <b>{{isset($artistProfile[0]->token) ? $artistProfile[0]->token : ''}} </b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>

 </span>
  

</div>
               
              </li>
              
             
              <li class="nav-item dropdown">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <div class="noti-icon" style="{{ $count > 0 ? 'display: block' : 'display: none' }}"><h6>{{$count}}</h6></div> <i class="fa fa-bell"style="font-size:27px"></i>
                 
                </a>
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                 <h5 class="text-center"> <b>Notification</b></h5><br>
      @foreach($notification as $val)
    @if($val->notificationfor=='artist')
    
      <a href="{{url('notification/artist')}}">{{$val->message}}</a>
    
  
    <hr>
    @endif
    @endforeach
     <a href="{{url('notification/artist')}}"><span class="text-center text-dark">See More -></span></a>
                </div>
              </li>
              <!-- <li class="nav-item dropdown">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons"style="font-size:27px">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{url('artist/edit')}}">Edit Profile</a>
                  <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('logout')}}">Log out</a>
                </div>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
      <style>


</style>
      <!-- End Navbar -->