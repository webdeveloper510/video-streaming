<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title>
   Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
 
  <!-- CSS Files -->
  <link href="<?php echo e(asset('artistdashboard//css/material-dashboard.css?v=2.1.2')); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo e(asset('artistdashboard/css/demo/demo.css')); ?>" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--  <script id="base_url" data-url="<?php echo e(URL::to('/')); ?>" src="<?php echo e(asset('js/my.js')); ?>"></script> -->

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
/* .tab-content {
    position: absolute;
    background: #7b0000;
    left: -260px;
    top: 71px;
    padding: 20px;
    width: 38%;
} */
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
    width: 49px;
    padding: 0px 8px;
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
/* .nav-tabs {
    border: 0;
    border-radius: 3px;
    padding: 0 15px;
    position: absolute;
    top: 51px;
    left: 0;
    opacity: 0;
} */
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
      <img src="<?php echo e(asset('images/logos/newlogo.png')); ?>" height="50" alt="CoolBrand">
        
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link " href="<?php echo e(url('artists/dashboard')); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo e(url('artist/Profile')); ?>">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo e(url('artist/contentUpload')); ?>">
              <i class="fa fa-upload"></i>
              <p>Upload Content</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo e(url('/withdraw')); ?>">
              <i class="fa fa-money"></i>
              <p>Withdraw</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="<?php echo e(url('artist/requests')); ?>">
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
          <a class="dropdown-item" href="<?php echo e(url('/artist/offer')); ?>">Create Offer</a>
          <a class="dropdown-item" href="<?php echo e(url('/artist/my-offer')); ?>">My Offers</a>
         
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
              <a href="#"><img width="35px" src="<?php echo e(asset('images/logos/filter.png')); ?>"></a></li>
             


              <ul class="subnav" style="display: none">
                  <ul class="nav nav-tabs text-center">
                    <li class="active link_click"><a data-toggle="tab" href="#home">Video</a></li>
                    </ul>
          
                    <div class="tab-content">
                    <div id="home" class="tab-pane fade1 in active">
                        <h3 style="color: #fff;">Projects</h3>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                <?php echo Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true]); ?>

                  <?php echo e(Form::token()); ?>

                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->type=='video'): ?>
                   <label class=""> 
                     <?php echo e(Form::checkbox('catid[]', $cat->id)); ?>

                     <?php echo e($cat->category); ?> 
                   </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                      </div>
                     </div>

                          <div class="col-md-6 ">
                            <div class="bar">
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                            <label class="">
                          <?php echo e(Form::radio('price', 'free', false ,['class'=>'user'])); ?> Free

                          <!--    <?php echo e(Form::checkbox('price','free')); ?>Free   -->
                          
                            </label><br>
                            <label class="text-white">
                          <?php echo e(Form::radio('price', 'asc', false ,['class'=>'user'])); ?> Lowest
                              <!--  <?php echo e(Form::checkbox('price','asc')); ?>lowest   -->
                            </label><br>
                            <label class="">
                               <?php echo e(Form::radio('price', 'desc', false ,['class'=>'user'])); ?> Highest
                         <!--      orm::checkbox('price','desc')}}Higest   -->
                            
                            </label>
                       
                        </div>

                        <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                               <?php echo e(Form::radio('duration', 'asc', false ,['class'=>'user'])); ?> Shortest
                         <!--   <?php echo e(Form::checkbox('duration','asc')); ?>Shortest  -->
                           
                            </label><br>
                            <label class="">
                               <?php echo e(Form::radio('duration', 'desc', false ,['class'=>'user'])); ?> Longest
                          <!--  <?php echo e(Form::checkbox('duration','desc')); ?>Longest  -->
                            
                          </label><br>
                      
                        </div>
                          <div class="collapse pt-4" id="collapseExample1">
                <?php echo $__env->make('popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
              </div>
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-12 text-right pr-5">
              
               
         <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;" >
          <?php echo e(Form::submit('Apply!',['class'=>'btn btn-primary mb-4'])); ?>

              </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         <?php echo e(Form::close()); ?>

                      
                    
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
           <a href="<?php echo e(url('/artist/offer')); ?>"><button type="button" class="btn btn-warning text-white mr-3 mt-1">Create Offer</button></a>
           
           
            <img width="50px" height="50px" src="">
    
 
    <div class="">
            <span class="firstName" style="display: none;"></span>
              <div class="profileImage"></div>
    </div>
   

   <span class="profile-img text-white">
   <?php echo e($login->nickname); ?><button type="button" class="btn btn-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
    </button>
   
     <div class="dropdown-menu dropdown-menu-right">
         <button class="dropdown-item" type="button">
           <a href="<?php echo e(url('/profile')); ?>">Edit Profile
           </a></button>
        <button class="dropdown-item" type="button">
          <a href="<?php echo e(url('/logout')); ?>">Logout</a></button>
           <button class="dropdown-item" type="button">
          <a href="<?php echo e(url('/my-requests')); ?>">Projects</a></button>
    </div>
   <hr/ style="color:white;background: white;">
  <b>66 </b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 800;">PAZ</b>

 </span>
  

</div>
               
              </li>
              
             
              <li class="nav-item dropdown">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <div class="noti-icon" style="<?php echo e($count > 0 ? 'display: block' : 'display: none'); ?>"><h6><?php echo e($count); ?></h6></div> <i class="fa fa-bell"style="font-size:27px"></i>
                 
                </a>
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                 <h5 class="text-center"> <b>Notification</b></h5><br>
      <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($val->notificationfor=='artist'): ?>
    
      <a href="<?php echo e(url('notification/artist')); ?>"><?php echo e($val->message); ?></a>
    
  
    <hr>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <a href="<?php echo e(url('notification/artist')); ?>"><span class="text-center text-dark">See More -></span></a>
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
                  <a class="dropdown-item" href="<?php echo e(url('artist/edit')); ?>">Edit Profile</a>
                  <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo e(url('logout')); ?>">Log out</a>
                </div>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
      <style>


</style>
      <!-- End Navbar --><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/dashboard.blade.php ENDPATH**/ ?>