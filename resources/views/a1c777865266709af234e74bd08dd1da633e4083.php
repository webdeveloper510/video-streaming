
<header id="default_header" class="header_style_1">
  <!-- header bottom -->
  <div class="header_bottom">

		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="<?php echo e(url('/')); ?>" class="navbar-brand">
						<img src="<?php echo e(asset('images/logos/logo-new.png')); ?>" height="50" alt="CoolBrand">
					</a>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="search_meu">
					<!--div class="menu_icon_custome"><i class="fa fa-bars" aria-hidden="true"></i></div-->
					<ul class="nav custom search">
              <li id="options" onclick="mufunc()">
                <a href="#"><img width="30px" src="<?php echo e(asset('images/logos/filter.png')); ?>"></a></li>
                <ul class="subnav" style="display: none">
                  <ul class="nav nav-tabs">
                    <li class="active link_click"><a data-toggle="tab" href="#home">Video</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu1">Audio</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu2">Artists</a></li>
                    <!-- <li><a data-toggle="tab" href="#menu3">Add Request</a></li> -->
                    </ul>

                    <div class="tab-content">
                    <div id="home" class="tab-pane fade1 in active">
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
                             <?php echo e(Form::checkbox('price','free')); ?>Free  
                          
                            </label><br>
                            <label class="text-white">
                               <?php echo e(Form::checkbox('price','asc')); ?>lowest  
                            </label><br>
                            <label class="">
                               <?php echo e(Form::checkbox('price','desc')); ?>Higest  
                            
                            </label>
                       
                        </div>

                        <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                             <?php echo e(Form::checkbox('duration','asc')); ?>Shortest 
                           
                            </label><br>
                            <label class="">
                           <?php echo e(Form::checkbox('duration','desc')); ?>Longest 
                            
                          </label><br>
                      
                        </div>
                          <div class="collapse pt-4" id="collapseExample1">
                <?php echo $__env->make('popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
              </div>
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-6 text-left">
              
                <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary mb-4'])); ?>

         <input type="button" class="btn btn-primary section_advance mb-4 ml-3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;" >
              </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         <?php echo e(Form::close()); ?>

                      
                    
                     </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3 style="color: #fff;">Audio</h3>
                        <div class="row">
                      <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                      <?php echo Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true]); ?>

                      <?php echo e(Form::token()); ?>

                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->type=='audio'): ?>
                   <label class="">
                     <?php echo e(Form::checkbox('catid[]', $cat->id)); ?><?php echo e($cat->category); ?> 
                          
                            </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                             </div>
                       <div class="col-md-6">
                           <div class="dropdown1 text-white">
                           <h4>Price</h4>
  
                            <label class="">
                             <?php echo e(Form::checkbox('price','free')); ?>Free 
                            
                            </label><br>
                            <label class="">  
                             <?php echo e(Form::checkbox('price','asc')); ?>lowest
                            </label><br>
                            <label class=""> 
                               <?php echo e(Form::checkbox('price','desc')); ?>Higest 
                            
                            </label>
                       
                        </div>
                      
                             <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label>  
                             <?php echo e(Form::checkbox('duration','asc')); ?>Shortest
                            </label><br>
                            <label >
                             <?php echo e(Form::checkbox('duration','desc')); ?>Longest 
                          
                          </label>
                          </div>
                          </div>
                          <div class="col-md-6">
                              
                           </div>
                            <div class="col-md-12 text-left">
                       <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary mb-4'])); ?>

                      <?php echo e(Form::close()); ?>

                     </div> 
                            </div>
                           
                      </div>
                  
                    <div id="menu2" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                      <div class="row">
                          <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                           <?php echo Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true]); ?>

                             <?php echo e(Form::token()); ?>

                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->type=='artist'): ?>
                   <label>
                     <?php echo e(Form::checkbox('category[]', $cat->id)); ?><?php echo e($cat->category); ?> 
                            
                            </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="bar">
                               <div class="dropdown1 text-white">
                           <h4>Price</h4>
  
                            <label> 
                               <?php echo e(Form::checkbox('price','free')); ?>Free 
                            </label><br>
                            <label> 
                               <?php echo e(Form::checkbox('price','asc')); ?>lowest 
                            </label><br>
                            <label> 
                               <?php echo e(Form::checkbox('price','desc')); ?>Higest
                            
                            </label>                       
                        </div>
                       
                           <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label>  
                            <?php echo e(Form::checkbox('duration','asc')); ?>Shortest
                            
                            </label><br>
                            <label> 
                             <?php echo e(Form::checkbox('duration[]','desc')); ?>Longest
                            
                          </label>
                          </div>
                           <div class="collapse pt-4" id="collapseExample">
                   <?php echo $__env->make('popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
                          </div>
                        </div>
                          <div class="col-md-6 text-left">
              
                <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary mb-4'])); ?>

                  <input type="button" class="btn btn-primary section_advance mb-4 ml-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;"  >
              </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         <?php echo e(Form::close()); ?>

                     </div> 
                   </div>
                       
                    
                    <div id="menu3" class="tab-pane fade">
                      <h3 style="color: #fff;">Menu 3</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    </div>
                </ul>
            
              <li id="search">
                <form action="" method="get">
                  <input type="text" name="search_text" id="search_text" placeholder="Search"/>
                  <input type="button" name="search_button" id="search_button"></a>
                </form>
              </li>
            </ul>
					
					<!--div class="search-box" style="font-size: 16px;">
						<input class="search-box__input" type="text" oninput="this.setAttribute('value',this.value)">
					<i class="fa fa-search" aria-hidden="true"></i>
					</div-->
					</div>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<div class="navbar-nav">
				<a href="<?php echo e(url('/getArtists')); ?>" class="nav-item nav-link active">
				    <i class="fa fa-trophy"></i>TOP LIST</a>
							<!-- <a href="1-page.html" class="nav-item nav-link"><i class="fa fa-phone" aria-hidden="true"></i>LIVE</a> -->
							<!--a href="upload.html" class="nav-item nav-link"><i class="fa fa-upload" aria-hidden="true"></i></a-->	
		<a href="play.html"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i></a>
    
							<a href="<?php echo e(url('/userWithdraw')); ?>" class="nav-item nav-link"><i class="fa fa-money" aria-hidden="true"></i></a>  


						</div>

						<div class="navbar-nav ml-auto">
              <?php if(!$login): ?>
					  <a href="<?php echo e(url('register')); ?>" class="nav-item nav-link">Register</a>
              <a href="<?php echo e(url('/login')); ?>" class="nav-item nav-link"> 
           Login</a>  
           <?php endif; ?>             

            <?php if($login): ?>
           <div class="btn-group login-btn"style="border-right-color: white;border-right-style: solid;">
            <img width="50px;" height="50px;" src="<?php echo e(url('storage/app/public/uploads/'.$userProfile[0]->profilepicture)); ?>">
             <?php if($userProfile[0]->profilepicture): ?>
    
    <?php else: ?>
   <i class="fa fa-user-circle-o" aria-hidden="true"></i>
   <?php endif; ?>
   <span class="profile-img text-white">
   <?php echo e($login->nickname); ?> <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
  </button>
 
   <div class="dropdown-menu dropdown-menu-right">
       <button class="dropdown-item" type="button">
         <a href="<?php echo e(url('/profile')); ?>">Edit Profile
         </a></button>
      <button class="dropdown-item" type="button">
        <a href="<?php echo e(url('/logout')); ?>">Logout</a></button>
  </div>
   <hr/ style="color:white;background: white;">
  <?php echo e($userProfile[0]->tokens); ?>PAZ
   <a href="<?php echo e(url('/addToken')); ?>"><i class="fa fa-plus text-white" aria-hidden="true"></i></a>
 </span>
  

</div>
<?php endif; ?>
 <!-- Modal -->
                   
<a href="#"  class="nav-item nav-link" style="border-right-color: white;border-right-style: solid;"><i style="font-size: 27px !important;" class="fa fa-comment" aria-hidden="true"></i></a>

						</div>
					</div>
				</nav>
		    </div>
	   </div>  
  
  </div>
  <!-- header bottom end -->
  <!-- Button trigger modal -->


</header>
<style type="text/css">
  
  i.fa.fa-comment:hover {
      color: #fc0 !important;
  }
  .dropdown12 {
     
     height: 248px;
      overflow-y: scroll;

  }
.dropdown1 h4{
   margin:0 !important;
   color:white;
}

.dropdown1 {
    background: #fff0;
    padding: 19px;
    margin-bottom: 19px;
    position: relative;
    padding-top: 7px !important;
    border: 1px solid #fff;
    margin-top: 10px;
    width: 98%;
  }
  .nav-tabs {
    border-bottom: 1px solid #dee2e6;
    background: #bf0000;
}
.rightbar {
    height: 300px;
    overflow-y: scroll;
}
.row.text-left.text-white.mt-3.red {
    width: 98%;
}
</style>

<script type="text/javascript">

</script>
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/layouts/header.blade.php ENDPATH**/ ?>