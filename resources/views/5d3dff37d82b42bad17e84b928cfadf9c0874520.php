<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header id="default_header" class="header_style_1">
  <!-- header bottom -->
  <div class="header_bottom">

		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="<?php echo e(url('/')); ?>" class="navbar-brand">
						<img src="<?php echo e(asset('images/logos/newlogo.gif')); ?>" height="50" alt="CoolBrand">
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
                  <ul class="nav nav-tabs text-center">
                    <li class="active link_click"><a data-toggle="tab" href="#home">Video</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu1">Audio</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu4">Artists</a></li>
                    <li  class="link_click" ><a data-toggle="tab" href="#menu2">Offers</a></li>
                    </ul>
                      <?php if($login): ?>
                    <div class="tab-content">
                    <div id="home" class="tab-pane fade1 in active">
                        <h3 style="color: #fff;">Video</h3>
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
            

                         <?php echo e(Form::radio('price', 'free', false ,['class'=>'user'])); ?> Free
                            
                            </label><br>
                            <label class="">  
                          <?php echo e(Form::radio('price', 'asc', false ,['class'=>'user'])); ?> Lowest
                      
                            </label><br>
                            <label class=""> 
                          <?php echo e(Form::radio('price', 'desc', false ,['class'=>'user'])); ?> Highest
                             
                            
                            </label>
                       
                        </div>
                      
                             <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label>  
                           <?php echo e(Form::radio('duration', 'asc', false ,['class'=>'user'])); ?> Shortest
  
                            </label><br>
                            <label >
                        <?php echo e(Form::radio('duration', 'desc', false ,['class'=>'user'])); ?> Longest
              
                          
                          </label>
                          </div>
                          </div>
                          <div class="col-md-6">
                              
                           </div>
                            <div class="col-md-12 pr-5 text-right">
                       <?php echo e(Form::submit('Apply!',['class'=>'btn btn-primary mb-4'])); ?>

                      <?php echo e(Form::close()); ?>

                     </div> 
                            </div>
                           
                      </div>
                  
                    <div id="menu4" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                      <div class="row">
                             <?php echo Form::open(['action' => 'AuthController@getSelectingArtist', 'method' => 'post', 'files'=>true]); ?>

                      <?php echo e(Form::token()); ?>

                          <div class="col-md-12">
                             <div class="scroll12">
                               
                            
                          <div class="row text-left text-white mt-3 red">
                                  <div class="col-md-4 mb-4 logy">
                                    <label>Sexology</label><br>
                                    <?php echo e(Form::checkbox('sexology[]','Hetero')); ?>Hetero <br>
                                    <?php echo e(Form::checkbox('sexology[]','Homo')); ?>Homo <br>
                                    <?php echo e(Form::checkbox('sexology[]','Bisexual')); ?>Bisexual 
                                  </div>
                                  <div class="col-md-4 mb-4">
                                      <label>Tits size</label><br>
                                    <?php echo e(Form::checkbox('titssize[]','Small')); ?>Small <br>
                                    <?php echo e(Form::checkbox('titssize[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('titssize[]','Big')); ?>Big 
                                  </div>
                                   <div class="col-md-4 mb-4 ass">
                                    <label>Ass</label><br>
                                     <?php echo e(Form::checkbox('ass[]','Small')); ?>Small <br>
                                    <?php echo e(Form::checkbox('ass[]','Normal')); ?>Normal <br>
                                   
                                    <?php echo e(Form::checkbox('ass[]','Big')); ?>Big 
                                    
 
                                  </div>
                                  <div class="col-md-4 mb-4 logy">
                                      <label>Privy part</label><br>
                                    <?php echo e(Form::checkbox('privy[]','Shaved')); ?>Shaved <br>
                                    <?php echo e(Form::checkbox('privy[]','Unshaved')); ?>Unshaved <br>
                                              <br>
                                              <br>
                                      <label>Height</label><br>
                                    <?php echo e(Form::checkbox('height[]','<140cm')); ?><140cm <br>
                                    <?php echo e(Form::checkbox('height[]','140-160cm')); ?>140-160cm <br>
                                    <?php echo e(Form::checkbox('height[]','160-180cm')); ?>160-180cm <br>
                                    <?php echo e(Form::checkbox('height[]','180cm<')); ?>180cm< <br>
                                  </div>
                                   <div class="col-md-4 mb-4">
                                    <label>Eyes/lenses</label><br>
                                    <?php echo e(Form::checkbox('eyecolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','brown')); ?>Brown <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','brown-green')); ?>Brown-green<br> 
                                    <?php echo e(Form::checkbox('eyecolor[]','golden')); ?>Golden <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','gray')); ?>Gray <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','green')); ?>Green<br>
                                    <?php echo e(Form::checkbox('eyecolor[]','red')); ?>Red <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','white')); ?>White <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','yellow')); ?>Yellow <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','indigo')); ?>Indigo <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','violet')); ?>Violet <br>
                                  </div>
                                        <div class="col-md-4 mb-4 ass">
                                    <label>Hair color</label><br>
                                    <?php echo e(Form::checkbox('haircolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('haircolor[]','brown')); ?>Brown <br>
                                    <?php echo e(Form::checkbox('haircolor[]','black')); ?>Black<br> 
                                    <?php echo e(Form::checkbox('haircolor[]','blonde')); ?>Blonde <br>
                                    <?php echo e(Form::checkbox('haircolor[]','gray')); ?>Gray <br>
                                    <?php echo e(Form::checkbox('haircolor[]','green')); ?>Green<br>
                                    <?php echo e(Form::checkbox('haircolor[]','red')); ?>Red <br>
                                    <?php echo e(Form::checkbox('haircolor[]','white')); ?>White <br>
                                    <?php echo e(Form::checkbox('haircolor[]','yellow')); ?>Yellow <br>
                                    <?php echo e(Form::checkbox('haircolor[]','silver')); ?>Silver <br>
                                    <?php echo e(Form::checkbox('haircolor[]','indigo')); ?>Indigo <br>
                                    <?php echo e(Form::checkbox('haircolor[]','violet')); ?>Violet <br>
                                  </div>
                                 
                                   <div class="col-md-4 mb-4 logy">
                                      <label>Hair Length</label><br>
                                    <?php echo e(Form::checkbox('hairlength[]','Very short')); ?>Very short <br>
                                    <?php echo e(Form::checkbox('hairlength[]','Short')); ?>Short <br>
                                    <?php echo e(Form::checkbox('hairlength[]','Long')); ?>Long <br>
                                    <?php echo e(Form::checkbox('hairlength[]','Very Long')); ?>Very Long <br>
                                  </div>
                                   <div class="col-md-8 mb-4">
                                    <label>Body</label><br>
                                    <?php echo e(Form::checkbox('weight[]','Less than Average')); ?> Thin <br>
                                    <?php echo e(Form::checkbox('weight[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('weight[]','Muscular')); ?>Muscular<br> 
                                    <?php echo e(Form::checkbox('weight[]','Chubby')); ?>Chubby 
                                  </div>
                                  <!--div class="col-md-4 mb-4">
                                   <label>Age</label><br>
                                    <?php echo e(Form::checkbox('age[]','18-24')); ?>18-24 <br>
                                    <?php echo e(Form::checkbox('age[]','25-34')); ?>25-34<br>
                                    <?php echo e(Form::checkbox('age[]','35-44')); ?>35-44<br>
                                    <?php echo e(Form::checkbox('age[]','45 +')); ?>45 +
                                </div-->
                              </div>
                        </div>
                             </div>
                          <div class="col-md-12 text-right mt-3 pr-5">
              
                <?php echo e(Form::submit('Apply!',['class'=>'btn btn-primary mb-4'])); ?>

           
                       
            
            </div>
                     
                       
                         <?php echo e(Form::close()); ?>

                     </div> 
                   </div>
                    <div id="menu2" class="tab-pane fade1 in ">
                        <h3 style="color: #fff;">Offers</h3>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12 text-white" id="video">
                           <h4>Categories </h4>
                <?php echo Form::open(['action' => 'AuthController@showOffer', 'method' => 'post', 'files'=>true]); ?>

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
                      <div class="dropdown12 text-white" id="audio">
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->type=='audio'): ?>
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
                           <h4 >Media</h4>
                            <label class=""> 

                               <?php echo e(Form::radio('type', 'audio', false ,['class'=>'media audio'])); ?> Audio
                         <!--   <?php echo e(Form::checkbox('duration','asc')); ?>Shortest  -->
                           
                            </label><br>
                            <label class="">
                               <?php echo e(Form::radio('type', 'video', true ,['class'=>'media video'])); ?> Video 
                          <!--  <?php echo e(Form::checkbox('duration','desc')); ?>Longest  -->
                            
                          </label><br>
                      
                        </div>
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                  
      
                            <label class="text-white">
                          <?php echo e(Form::radio('price', 'asc', false ,['class'=>'user'])); ?> Lowest
                              <!--  <?php echo e(Form::checkbox('price','asc')); ?>lowest   -->
                            </label><br>
                            <label class="">
                               <?php echo e(Form::radio('price', 'desc', false ,['class'=>'user'])); ?> Highest
                         <!--       <?php echo e(Form::checkbox('price','desc')); ?>Higest   -->
                            
                            </label>
                       
                        </div>

                       
                          <div class="collapse pt-4" id="collapseExample2">
                <?php echo $__env->make('popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
              </div>
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-12 text-right pr-5">

               
         <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2"value=" Advance Filter option  &#8594;" >
          <?php echo e(Form::submit('Apply!',['class'=>'btn btn-primary mb-4'])); ?>

              </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         <?php echo e(Form::close()); ?>

                      
                    
                     </div>
                    </div>
                    
                        <div id="menu4" class="tab-pane fade1 in ">
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
                         <!--       <?php echo e(Form::checkbox('price','desc')); ?>Higest   -->
                            
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
              
                <?php echo e(Form::submit('Apply!',['class'=>'btn btn-primary mb-4'])); ?>

                       </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         <?php echo e(Form::close()); ?>

                      
                    
                     </div>
                    </div>
                    <?php endif; ?>
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
							<!-- <a href="1-page.html" class="nav-item nav-link"><i class="fa fa-phone" aria-hidden="true"></i>LIVE</a> -->
							<!--a href="upload.html" class="nav-item nav-link"><i class="fa fa-upload" aria-hidden="true"></i></a-->	
		<a href="<?php echo e(url('/play')); ?>"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i></a>
    
							<a href="<?php echo e(url('/userWithdraw')); ?>" class="nav-item nav-link"><i class="fa fa-money" aria-hidden="true"></i></a>  


						</div>

						<div class="navbar-nav ml-auto">
              <?php if(!$login): ?>
					  <a href="<?php echo e(url('/register')); ?>" class="nav-item nav-link">Register</a>
              <a href="<?php echo e(url('/login')); ?>" class="nav-item nav-link">  Login</a>  
           <?php endif; ?>             

            <?php if($login): ?>
           <div class="btn-group login-btn text-center"style="border-right-color: white;border-right-style: solid;">
             <?php if($userProfile[0]->profilepicture): ?>
            <img width="50px;" height="50px;" src="<?php echo e(url('storage/app/public/uploads/'.$userProfile[0]->profilepicture)); ?>">
            
    
    <?php else: ?>
    <div class="">
		    	  <span class="firstName" style="display: none;"><?php echo e($userProfile[0]->nickname); ?></span>
	           	<div class="profileImage"></div>
	  </div>
   <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
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
         <button class="dropdown-item" type="button">
        <a href="<?php echo e(url('/my-requests')); ?>">Requests</a></button>
  </div>
   <hr/ style="color:white;background: white;">
  <b><?php echo e($userProfile ? $userProfile[0]->tokens: ''); ?></b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
   <a href="<?php echo e(url('/addToken')); ?>"><i class="fa fa-plus text-white" aria-hidden="true"></i></a>
 </span>
  

</div>
<?php endif; ?>
 <!-- Modal -->


    <li class="nav-item dropdown" style="padding: 0px !important">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" onclick="updateRead()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i style="font-size: 27px !important;"   class="fa fa-bell" aria-hidden="true"></i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                <br>
      <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($val->notificationfor=='user'): ?>
<?php 
  $GLOBALS['ids'][] = $val->id;
?>
    
      <a href="<?php echo e(url('notification/user')); ?>" id="bold" class="bold"><?php echo e($val->message); ?></a>
    
  
    <hr>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" value="<?php echo  implode(",",$GLOBALS['ids']); ?>" id="notids"/>
     <a href="<?php echo e(url('notification/user')); ?>"><span class="text-center text-dark">Notification History -></span></a>
                </div>
              </li>




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
.tab-content h3 {
    margin-left: -36px;
}
.col-md-4.mb-4.logy {
    padding-left: 36px;
}
.col-md-4.mb-4.ass {
    margin-left: -28px;
}
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
    text-align: center;
}

.notif.text-center ul li {
    list-style: none;
    text-align: center;
    padding: 0 !important;

}

.notif.text-center ul li a {
    font-weight: 900;
}
  i.fa.fa-comment:hover {
      color: #fc0 !important;
  }
  .dropdown12 {
     
     height: 248px;
      overflow-y: scroll;

  }
  i.fa.fa-plus.text-white {
    color: #ffbb11 !important;
}
  .dropdown-menu.notif.text-center.show {
    left: -156px;
}
.tab-pane h3 {
    padding-left: 51px;
}
  .scroll12{
    height: 250px;
    overflow-y: scroll;
  }
.dropdown1 h4{
   margin:0 !important;
   color:white;
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
  .dropdown1 label {
    display: inline-flex;
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
.price::placeholder { 
  color: red;
  opacity: 1;
}

.price:-ms-input-placeholder { 
  color: red;
}

.price::-ms-input-placeholder { 
  color: red;
}
span.profile-img hr {
    height: 2px !important;
    width: 100px;
}
  span.text-center.text-dark {
    padding: 9px;
    background: white;
    width: 298px;
    position: absolute;
    top: 263px;
    color: blue !important;
    right: 1px;
} 
.nav-tabs {
    border-bottom: 1px solid #dee2e6;
    background: #7b0000;
    border-top: 1px solid #dee2e6;
}
</style>
 <?php if($errors->all()): ?>
  <script type="text/javascript">
      //alert('rrr');
   </script>
  <?php endif; ?>
<?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/layouts/header.blade.php ENDPATH**/ ?>