
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
     <script id="base_url" data-url="{{ URL::to('/')}}" src="{{asset('js/my.js')}}"></script>

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
 </style>
</head>

<body class="">

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="" class="simple-text logo-normal">
      	@isset($contentUser)
       {{ $contentUser->nickname }}
          @endisset
        
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
            <a class="navbar-brand text-white" href="javascript:;">Dashboard</a>
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
                <a class="nav-link text-white " href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              
             
              <li class="nav-item dropdown">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                 <h5 class="text-center"> <b>Notification</b></h5><br>
      @foreach($notification as $val)
    @if($val->notificationfor=='artist')
    
      <a href="{{url('artist/readNotification/'.$val->id)}}">{{$val->message}}</a>
    
  
    <hr>
    @endif
    @endforeach
     <a href=""><span class="text-center text-dark">See More -></span></a>
                </div>
              </li>
              <li class="nav-item dropdown">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{url('artist/edit')}}">Edit Profile</a>
                  <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('logout')}}">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- End Navbar -->

