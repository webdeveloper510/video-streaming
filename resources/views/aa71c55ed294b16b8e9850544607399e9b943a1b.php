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
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('design/dashboard.css')); ?>" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- CSS Files -->
  <link href="<?php echo e(asset('artistdashboard//css/material-dashboard.css?v=2.1.2')); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo e(asset('artistdashboard/css/demo/demo.css')); ?>" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="">

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
     
      <div class="logo"><a href="" class="simple-text logo-normal">
      <img src="<?php echo e(asset('images/logos/newlogo.png')); ?>" height="50" alt="CoolBrand">
        
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php echo e($tab=='dashboard' ? 'active': ''); ?> ">
            <a class="nav-link " href="<?php echo e(url('artists/dashboard')); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php echo e($tab=='profile' ? 'active': ''); ?>">
            <a class="nav-link" href="<?php echo e(url('artist/Profile')); ?>">
              <i class="material-icons">person</i>
              <p> Profile</p>
            </a>
          </li>
          <li class="nav-item <?php echo e($tab=='feed' ? 'active': ''); ?>">
            <a class="nav-link" href="<?php echo e(url('artists/dashboard')); ?>">
            <i class="fa fa-newspaper-o"> </i>
              <p>User Feed</p>
            </a>
          </li>
          <li class="nav-item <?php echo e($tab=='upload' ? 'active': ''); ?>">
            <a class="nav-link" href="<?php echo e(url('artist/contentUpload')); ?>">
              <i class="fa fa-upload"></i>
              <p>Upload</p>
            </a>
          </li>
          <li class="nav-item <?php echo e($tab=='withdraw' ? 'active': ''); ?>">
            <a class="nav-link" href="<?php echo e(url('/withdraw')); ?>">
              <i class="fa fa-money"></i>
              <p>Withdraw</p>
            </a>
          </li>
           <li class="nav-item <?php echo e($tab=='requests' ? 'active': ''); ?>">
            <a class="nav-link" href="<?php echo e(url('artist/requests')); ?>">
              <i class="fa fa-message"></i>
              <p>Orders/Projects</p>
            </a>
          </li>
         <!-- <li class="nav-item dropdown <?php echo e($tab == 'offer' ? 'active': ''); ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
              <i class="fa fa-money"></i>
             Create Offer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="<?php echo e(url('/artist/offer')); ?>">Create Offer</a>
            <a class="dropdown-item" href="<?php echo e(url('/artist/my-offer')); ?>">My Offers</a>
         
        </div>
         

          </li> -->
          
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
                    <li class="active link_click"><a data-toggle="tab" class="text-white" href="#home"> <h4 style="color: #fff;">Projects</h4></a></li>
                    </ul>
          
                    <div class="tab-content">
                    <div id="home" class="tab-pane fade1 in active">
                       
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h5>Categories </h5>
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
                            <div class="bar ">
                            <div class="dropdown1 text-white">
                           <h5>Media : </h5>
                         
                            <label class="text-white">
                          <?php echo e(Form::radio('price', 'asc', false ,['class'=>'user'])); ?> Video
                              <!--  <?php echo e(Form::checkbox('price','asc')); ?>lowest   -->
                            </label><br>
                            <label class="">
                               <?php echo e(Form::radio('price', 'desc', false ,['class'=>'user'])); ?> Audio
                         <!--      orm::checkbox('price','desc')}}Higest   -->
                            
                            </label>
                       
                        </div>
                        <div class="dropdown1 text-white">
                           <h5>Reward</h5>
                         
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
                           <h5 >Duration</h5>
                            <label class=""> 
                               <?php echo e(Form::radio('duration', 'asc', false ,['class'=>'user'])); ?> Shortest
                         <!--   <?php echo e(Form::checkbox('duration','asc')); ?>Shortest  -->
                           
                            </label><br>
                            <label class="">
                               <?php echo e(Form::radio('duration', 'desc', false ,['class'=>'user'])); ?> Longest
                          <!--  <?php echo e(Form::checkbox('duration','desc')); ?>Longest  -->
                            
                          </label><br>
                      
                        </div>
                         
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-12 text-right pr-5">
              
               
       
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
               
              
           <div class="btn-group login-btn text-right" style="border-right: 3px solid white;">    
           <a href="<?php echo e(url('/artist/offer')); ?>">

           <button type="button" class="btn btn-warning text-white mr-3 mt-2">Create Offer</button>

           </a>
           
           <?php if($artistProfile[0]->profilepicture): ?>
            <img width="50px" height="50px" src="<?php echo e(url('storage/app/public/uploads/'.$artistProfile[0]->profilepicture)); ?>">
          <?php else: ?>
 
    <div class="">
            <span class="firstName" style="display: none;"><?php echo e($artistProfile[0]->nickname); ?></span>
              <div class="profileImage"></div>
    </div>
   <?php endif; ?>

   <span class="profile-img text-white text-center">
   <span class="nickname"><?php echo e($login->nickname); ?></span>
   <button type="button" class="btn btn-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
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
  <b><?php echo e(isset($artistProfile[0]->token) ? $artistProfile[0]->token : ''); ?> </b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>

 </span>
  

</div>
               
              </li>
              
             
              <!-- <li class="nav-item dropdown">
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
              </li> -->
              <li><a class="nav-link text-white " href="javascript:;" ><i class="fa fa-comment"></i></a></li>
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
      <!-- End Navbar --><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artists/dashboard.blade.php ENDPATH**/ ?>