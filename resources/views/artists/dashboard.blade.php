<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="{{asset('images/logos/logo_black.png')}}" type="image/png" sizes="16x16">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title id="top_title">
   Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('design/dashboard.css')}}" />

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- CSS Files -->
  <link href="{{asset('artistdashboard//css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('artistdashboard/css/demo/demo.css')}}" rel="stylesheet" />
  <script src="https://www.yoti.com/share/client/"></script>
  

 

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script> -->



</head>

<body class="">


<!---------------------------------------------------------------- Mobile nav bar ------------------------------------>
      <div class="mobile-bar">
       <div class="headerbar">
       <button class="openbtn" onclick="openNav()">☰ </button> 

       <div id="mySidepanel" class="sidepanel">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
          <div class="side">
        <ul class="mobile">
        <li class="profileimagemobile">
       
         @if(array_key_exists(0,$artistProfile) && $artistProfile[0]->profilepicture)
           <img width="50px" height="50px" src="{{url('storage/app/public/uploads/'.$artistProfile[0]->profilepicture)}}">
          @else
 
    <div class="">
            <span class="firstName" style="display: none;">{{$artistProfile[0]->nickname}}</span>
              <div class="profileImage"></div>
    </div>
   @endif
   
   <span class="profile-img text-white text-center">
   <span class="nickname">{{$login->nickname}}</span>

  
   <hr style="color:white;background: white;">
  <b>{{isset($artistProfile[0]->token) ? $artistProfile[0]->token : ''}} </b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>

 </span>
  

</div>
</li>
          <li class="nav-item {{$tab=='dashboard' ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link " href="{{url('artists/dashboard')}}">
             
              <p> <i class="material-icons">dashboard</i> Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='profile'  ? 'active' : ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('artist/Profile')}}">
              
              <p><i class="material-icons">person</i>   Profile</p>
            </a>
          </li>
    
          <li class="nav-item active" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('artist/contentUpload')}}">
             
              <p> <i class="fa fa-upload"></i>  Upload</p>
            </a> 
          </li>
      
          <li class="nav-item {{$tab=='withdraw' ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/withdraw')}}">
              
              <p> <i class="fa fa-money"></i>  Withdraw</p>
            </a>
          </li>
           <li class="nav-item {{$tab=='requests'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('artist/requests')}}">
           
              <p>  <i class="fa fa-list-alt" aria-hidden="true"></i> Orders</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='support'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/artist/support')}}">
           
              <p>  <i class="fa fa-ticket" aria-hidden="true"></i>  Support</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='faq'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/artist/faq')}}">
           
              <p>  <i class="fa fa-question-circle-o"></i>  FAQ's</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='logout'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/logout')}}">
           
              <p> <i class="fa fa-power-off" aria-hidden="true"></i> Logout</p>
            </a>
          </li>
         <!-- <li class="nav-item dropdown {{$tab == 'offer' ? 'active': ''}}">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              <i class="fa fa-money"></i>
             Create Offer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{url('/artist/offer')}}">Create Offer</a>
            <a class="dropdown-item" href="{{url('/artist/my-offer')}}">My Offers</a>
         
        </div>
         

          </li> -->
          
        </ul> 
      </div>
        </div> 


       <div class="logo text-center">
       <a href="{{url('/artists/dashboard')}}"> <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand"></a>
        </a>
    </div>

       <div class="right">
      <!-- <a class=" text-white " href="javascript:;" ><i class="fa fa-comment"></i></a> -->

       </div>





       </div>
       </div>
 <!---------------------------------------------------------------- Desktop nav bar ------------------------------------>
  
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="https://cdn0.iconfinder.com/data/icons/user-interface-151/24/List_menu_toggle-512.png">
     
      <div class="logo text-center"><a href="{{url('/artists/dashboard')}}" class="simple-text logo-normal">
      <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
        
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{$tab=='dashboard' ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link " href="{{url('artists/dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='profile'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('artist/Profile')}}">
              <i class="material-icons">person</i>
              <p> Profile</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='upload' ? 'active': ''}}"  id="active" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('artist/contentUpload')}}">
              <i class="fa fa-upload"></i>
              <p>Upload</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='withdraw' ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/withdraw')}}">
              <i class="fa fa-money"></i>
              <p>Withdraw</p>
            </a>
          </li>
           <li class="nav-item {{$tab=='requests'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('artist/requests')}}">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='support'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/artist/support')}}">
            <i class="fa fa-ticket" aria-hidden="true"></i>
              <p>Support</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='faq'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/artist/faq')}}">
            <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              <p>FAQ's</p>
            </a>
          </li>
          <li class="nav-item {{$tab=='logout'  ? 'active': ''}}" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
            <a class="nav-link" href="{{url('/logout')}}">
            <i class="fa fa-power-off" aria-hidden="true"></i>
              <p>Logout</p>
            </a>
          </li>
     
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">  
       
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav" style="{{$tab=='artist_info' ? 'display:none':'display:block'}}">
              <li class="nav-item">
             
           <div class="btn-group login-btn text-right" style="border-right: 3px solid white;">    
           <a href="{{url('/artist/offer')}}">

           <button type="button" class="btn btn-warning text-white mr-3 mt-2">  Publish a Service</button>

           </a>
        
           <div class="levlv">
              <p>{{$levelData ? $levelData[0]->level_name: 'Lvl0'}} </p>
            <div class="progress" style="width: 160px;">
             
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{$percentage ? $percentage : 0}}%">
                          <span class="sr-only">70% Complete</span>
                    </div>
                   
                    @if($levelData)       
                <div class="leveltext text-white"> <p>{{($levelData[0]->max+1)-$levelData[0]->countsubscriber}} Subscribers for next level</p></div>
                 @else
                 <div class="leveltext text-white"> <p>100 Subscribers for next level</p></div>
                  @endif
                </div>
                
                  <p> Lvl{{$levelData ? $levelData[0]->id+1-1 : '1'}} </p>
                  </div>
     
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
  
   <hr style="color:white;background: white;">
  <b style="    color: gold !important;">{{isset($artistProfile[0]->token) ? $artistProfile[0]->token : ''}} </b>    <b style="color: gold !important;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>

 </span>
  

    </div>
    <div class="unverified">
    <i class="fa fa-exclamation-circle" style="font-size:24px"></i>
    <span class="textunveri">
        <p>Your Account is Unverified!<br>
        Please submit the Identity Check Selfie and/Or the signed Artist Agreement to get verified.<br>
        <br>
        You can upload them <a href="">here</a>.</p>
</span>
</div>
           </li>
            </ul>
          </div>

      </nav>
      <div class="container">
      <style>
      /* width */
::-webkit-scrollbar {
  width: 5px;
}
.red{
  color:red !important;
}
.green{
  color:green !important;
}
.orange{
  color:orange !important;
}
/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #ccc9c9; 
  border-radius: 10px;
}
.levlv p {
    padding-left: 6px;
    padding-right: 6px;
}
.verify.text-center {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-56%,-72%);
}

.verify.text-center h3 {
    background: limegreen;
    padding: 4px 19px;
    color: white;
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #ccc9c9; 
}
.btn-group.login-btn.text-right a button {
    font-size: 12px !important;
}
.textunveri {
    background: white;
    padding: 8px 20px;
    border-radius: 21px;
    position: absolute;
    width: 300px;
    display: none;
    right: 14px;
    border: 3px solid #b97a57;
}

li.nav-item {
    margin-right: 45px;
}

.unverified i {
    position: absolute;
    right: 16px;
    top: 24px;
    cursor: pointer;
    font-size: 37px !important;
    color: red;
}

.fa.fa-exclamation-circle:hover .textunveri {
    display: block !important;
}
.levlv {
    width: auto;
    color: #fff;
    display: flex;
    padding-top: 13px;
    padding-left: 20px;
    padding-right: 20px;
}
.verify.text-center {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-56%,-72%);
}

.verify.text-center h3 {
    background: limegreen;
    padding: 4px 19px;
    color: white;
}

.verifyvideo.text-center {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.verifyvideo.text-center h3 {
    background: limegreen;
    color: white;
    padding: 5px 30px;
}

.leveltext.text-white {
    display: none;
    margin-left: -7%;
    position: absolute;
    top: 33px;
}
.navbar.navbar-absolute {
    padding-top: 7px !important;
}
.progress:hover .leveltext.text-white {
    display: block;
}
.wid {
    width: 160px !important ;
}
.profileImage {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #512DA8;
    font-size: 20px;
    color: #fff;
    text-align: center;
    line-height: 48px;
    margin-right: 14px;
    margin-top: 4px;
} 
@media only screen and (max-width: 768px) {
.alert.alert-success {
    margin-top: -4%;
}
}
</style>
      <!-- End Navbar -->