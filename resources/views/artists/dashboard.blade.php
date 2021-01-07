
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
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
 
  <!-- CSS Files -->
  <link href="{{asset('artistdashboard//css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('artistdashboard/css/demo/demo.css')}}" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--  <script id="base_url" data-url="{{ URL::to('/')}}" src="{{asset('js/my.js')}}"></script> -->

<style type="text/css">
  .notif {
    width: 300px;
    background: white;
     max-height: 300px;
    height: auto;
    border: 1px solid;
    z-index: 999;
    overflow: hidden;
    padding: 12px;
    overflow-x: auto;
}
.btn-group.login-btn img {
    border-radius: 50%;
    margin-right: 13px;
}
span.profile-img.text-white {
    margin-right: 14px;
    height: 50px;
    margin-top: -13px;
}
span.profile-img hr {
    height: 2px !important;
    width: 120px;
    margin: 0px !important;
}
.navbar-nav i.fa {
    padding: 0px 5px;
    font-size: 16px;
}

.dropdown12.text-white {
    border: 1px solid;
    padding: 16px;
    margin-bottom: 10px;
}
.sidebar[data-color="purple"] li.active>a {
    background-color: #7b0000 !important;
}
nav.navbar.navbar-expand-lg.navbar-transparent.navbar-absolute.fixed-top {
    background: #7b0000 !important;
}
.notif.text-center ol li {
    list-style: none;
    text-align: center;
    padding: 0 !important;
    margin-left: -40px;
}

.notif.text-center ol li a {
    font-weight: 900;
}
button.hell {
    border: 0px;
    background: transparent;
}
.btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle {
    background-color: transparent;
    border-color: transparent;
    color: black;
}
span.text-center.text-dark {
    position: absolute;
    top: 259px;
    right: 2px;
    z-index: 999;
    width: 295px;
    background: white;
    padding: 7px;
    color: blue !important;
}
.navbar-wrapper.text-white img {
    background: white;
    padding: 2px;
    height: 37px;
    
}
.dropdown-menu .dropdown-item:hover, .dropdown-menu .dropdown-item:focus, .dropdown-menu a:hover, .dropdown-menu a:focus, .dropdown-menu a:active {
    box-shadow: none;
    background-color: transparent;
    color: black;
}
button#dropdownMenuButton {
    background: transparent;
    box-shadow: none;
    border: transparent;
}
input#search_text {
    background: #7b0000;
    color: white !important;
    border: 1px solid;
    height: 36px;
}
input#search_text::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: white;
  opacity: 1; /* Firefox */
}

input#search_text:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: white;
}

input#search_text::-ms-input-placeholder { /* Microsoft Edge */
  color: white;
}
.noti-icon {
    color: white;
    border-radius: 50%;
    height: 20px;
    background: #ffa0ae;
    border: 1px solid silver;
    width: 20px;
    padding-left: 5px;
    position: absolute;
    right: 16px;
    top: 4px;
}
.dropdown1.text-white {
    padding: 10px;
    border: 1px solid;
    margin-bottom: 28px;
}

.noti-icon h6 {
    color: white;
    font-weight: bold;
    margin-top: -1px;
}
.sidebar .logo{
  background:#7b0000;
}
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
          <li class="nav-item active ">
            <a class="nav-link " href="{{url('artists/dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('artist/Profile')}}">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('artist/contentUpload')}}">
              <i class="fa fa-upload"></i>
              <p>Upload Content</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/withdraw')}}">
              <i class="fa fa-money"></i>
              <p>Withdraw</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="{{url('artist/requests')}}">
              <i class="fa fa-money"></i>
              <p>Requests</p>
            </a>
          </li>
         <li class="nav-item dropdown">
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
                    <li class="active link_click"><a data-toggle="tab" href="#home">Video</a></li>
                    </ul>
          
                 
                        
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
               
              
           <div class="btn-group login-btn text-right">    
           <a href="{{url('/artist/offer')}}"><button type="button" class="btn btn-warning text-white mr-3 mt-1">Create Offer</button></a>
           
           
            <img width="50px" height="50px" src="">
    
 
    <div class="">
		    	  <span class="firstName" style="display: none;"></span>
	           	<div class="profileImage"></div>
	  </div>
   

   <span class="profile-img text-white">
   {{$login->nickname}}<button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
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
  <b>66 </b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 800;">PAZ</b>

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

