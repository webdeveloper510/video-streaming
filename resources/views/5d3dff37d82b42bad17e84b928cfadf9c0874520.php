<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('design/header.css')); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<header id="default_header" class="header_style_1">
  <!-- header bottom -->

  <div class="mobilebar">
    <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
         <div class="pl-3"> <span class="profile-img text-white">
            <?php echo e($login->nickname); ?>

          
            <div class="dropdown-menu dropdown-menu-right">
                <!-- <button class="dropdown-item" type="button">
                  <a href="<?php echo e(url('/profile')); ?>">Edit Profile
                  </a></button> -->
                <button class="dropdown-item" type="button">
                  <a href="<?php echo e(url('/logout')); ?>">Logout</a></button>
                  <!-- <button class="dropdown-item" type="button">
                  <a href="<?php echo e(url('/my-requests')); ?>">Projects</a></button> -->
            </div>
            <hr/ style="color:white;background: white;">
            <b><?php echo e($userProfile ? $userProfile[0]->tokens: ''); ?></b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
           
          </span>
        </div>
          
        <a href="<?php echo e(url('/addToken')); ?>"><i class="fa fa-plus text-white" aria-hidden="true"></i> Add Tocken</a>
        <a href="<?php echo e(url('/play')); ?>"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i> Library</a>
        <a href="<?php echo e(url('/seeall1/orders')); ?>"  class="nav-item nav-link">
    <i style="font-size: 21px !important;" class="fa fa-list-alt" aria-hidden="true"></i> Orders
    <?php if($login && $latestOffer): ?>
    <div class="noti" style="<?php echo e($latestOffer->userid == $login->id && $latestOffer->is_seen=='no' ? 'display: block' : 'display: none'); ?>">
    </div>
    <?php endif; ?>
    </a>
        <a href="<?php echo e(url('/logout')); ?>"> <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>

</div>


    <span style="font-size:30px;cursor:pointer" class="togg" onclick="openNav()">&#9776;</span>

    <div class="logomobile text-center">
    <a href="<?php echo e(url('/')); ?>" class="navbar-brand">
						<img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" height="50" alt="CoolBrand">
					</a>
     </div>
     <div class="subscrive">
       <ul>
       <li class="nav-item">
              <a class="nav-link text-white" onclick="$('.subss').toggle()" href="<?php echo e($login ? '#' : url('/register')); ?>" ><i class="fa fa-address-card-o"></i></a>
               
               
                <div class="col-md-4 subss" style="display:none;">
                  <h3>Subscriptions</h3>
                  <?php $__currentLoopData = $subscribed_artist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('artistDetail/'.$artist->artistid)); ?>">
                    <div class="row mb-3">
                      <div class="col">
                        <img src="<?php echo e(url('storage/app/public/uploads/'.$artist->profilepicture)); ?>" class="img-fluid">
                        </div>
                                <div class="col-6 mt-3">
                                <p><?php echo e($artist->nickname); ?></p>
                                </div>
                              <div class="col mt-3">
                                  <div class="online" style="<?php echo e($artist->by_created==1 ? 'display:block' :'display:none'); ?>">
                                      </div>
                              </div>
                    </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                                   </div>
                    </div>

                    
                </div>
                
              </li>
       </ul>
     </div>
</div>




  <div class="header_bottom">

		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="<?php echo e(url('/')); ?>" class="navbar-brand">
						<img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" height="50" alt="CoolBrand">
					</a>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>

    
         <!----------------------------- search Menu --------------------->

					<div class="search_meu">
				
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
                     

                     <!-- --------------------------Tab Content --------------------------->




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

                     <input type="hidden" name="type" value="video"/>

                          <div class="col-md-6 ">
                            <div class="bar">
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                            <label class="">
                       

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


                      <!-- -------------------------- 2nd Tab  Start--------------------------->


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
                         <input type="hidden" name="type" value="audio"/>
                       <div class="col-md-6">
                           <div class="dropdown1 text-white">
                           <h4>Price</h4>
  
                            <label class="">
            

                       
                            
                            </label><br>
                            <label class="">  
                          <?php echo e(Form::radio('price', 'asc', false ,['class'=>'user'])); ?> Lowest
                      
                            </label><br>
                            <label class=""> 
                          <?php echo e(Form::radio('price', 'desc', false ,['class'=>'user'])); ?> Highest
                             
                            
                            </label>
                       
                        </div>
                      
                             <div class="dropdown1 audio12 text-white">
                           <h4 >Duration</h4>
                            <label>  
                           <?php echo e(Form::radio('duration', 'asc', false ,['class'=>'user'])); ?> Shortest
  
                            </label><br>
                            <label >
                        <?php echo e(Form::radio('duration', 'desc', false ,['class'=>'user'])); ?> Longest
              
                          
                          </label>
                          <!-- Modal -->
                          <div class="collapse pt-4" id="audio123">
                                        <div class="row">
                                        <div class="col-md-12 mb-4">
                                                 <label>Gender</label><br>
                                                    <?php echo e(Form::checkbox('gender[]','Male')); ?>Male <br>
                                                    <?php echo e(Form::checkbox('gender[]','Female')); ?>Female <br>
                                                   <?php echo e(Form::checkbox('gender[]','Trans')); ?>Trans 
                                                  </div>
                                              <div class="col-md-12 mb-4">
                                              <label>Sexology</label><br>
                                                  <?php echo e(Form::checkbox('sexology[]','Hetero')); ?>Hetero <br>
                                                 <?php echo e(Form::checkbox('sexology[]','Homo')); ?>Homo <br>
                                                   <?php echo e(Form::checkbox('sexology[]','Bisexual')); ?>Bisexual 
                                               </div>
                                        </div>
                                  </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                              
                           </div>
                            <div class="col-md-12 pr-5 text-right">
                            <input type="button" class="btn btn-primary section_advance mb-4 mr-3" href="#audio123" data-toggle="collapse"   aria-controls="audio123"  aria-expanded="false"  aria-controls="collapseExample1" value=" Advance Filter option  &#8594;" >
                       <?php echo e(Form::submit('Apply!',['class'=>'btn btn-primary mb-4'])); ?>

                      <?php echo e(Form::close()); ?>

                     </div> 
                            </div>
                           
                      </div>
                      

                        <!-- -------------------------- 3rd Tab  Start--------------------------->

                  
                    <div id="menu4" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                      <div class="row">
                             <?php echo Form::open(['action' => 'AuthController@getSelectingArtist', 'method' => 'post', 'files'=>true]); ?>

                      <?php echo e(Form::token()); ?>

                          <div class="col-md-12">
                             <div class="scroll12">
                               
                            
                          <div class="row text-left text-white mt-3 red">
                                  <div class="col-md-4 mb-4  das">
                                    <label>Gender</label><br>
                                    <?php echo e(Form::checkbox('gender[]','Male')); ?>Male <br>
                                    <?php echo e(Form::checkbox('gender[]','Female')); ?>Female <br>
                                    <?php echo e(Form::checkbox('gender[]','Trans')); ?>Trans 
                                  </div>
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
                                   <div class="col-md-4 mb-4 ">
                                    <label>Ass</label><br>
                                     <?php echo e(Form::checkbox('ass[]','Small')); ?>Small <br>
                                    <?php echo e(Form::checkbox('ass[]','Normal')); ?>Normal <br>
                                   
                                    <?php echo e(Form::checkbox('ass[]','Big')); ?>Big 
                                    <br>
                                    <br>
                                    <input type="hidden" name="type" value="artists"/>

                                    <label>Body</label><br>
                                    <?php echo e(Form::checkbox('weight[]','Less than Average')); ?> Thin <br>
                                    <?php echo e(Form::checkbox('weight[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('weight[]','Muscular')); ?>Muscular<br> 
                                    <?php echo e(Form::checkbox('weight[]','Chubby')); ?>Chubby 
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
                                        <div class="col-md-4 mb-4 ">
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
                                   <div class="col-md-4 mb-4">
                                   
                                  </div>
                                  
                              </div>
                        </div>
                             </div>
                          <div class="col-md-12 text-right mt-3 pr-5">
              
                <?php echo e(Form::submit('Apply!',['class'=>'btn btn-primary mb-4'])); ?>

           
                       
            
            </div>
                     
                       
                         <?php echo e(Form::close()); ?>

                     </div> 
                   </div>



                         <!-- -------------------------- 4th Tab  Start--------------------------->





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
                      <div class="dropdown12 text-white" id="audio" style="display:none">
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

                      <!-- -------------------------- 5th Tab  Start--------------------------->

                    
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
                   
                </ul>
            
              <li id="search">
              <form action="" method="get">
              
                  <input type="text" name="search_text" id="search_text" placeholder="Search"/>

                  <input type="button" name="search_button" id="search_button"></a>
              </form>
              </li>
            </ul>
					
					
					</div>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<div class="navbar-nav">
					
		<a href="<?php echo e(url('/play')); ?>"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i>
    <div class="noti"></div></a>
    <a href="<?php echo e(url('/seeall1/orders')); ?>"  class="nav-item nav-link">
    <i style="font-size: 21px !important;" class="fa fa-list-alt" aria-hidden="true"></i>
    <?php if($login && $latestOffer): ?>
    <div class="noti" style="<?php echo e($latestOffer->userid == $login->id && $latestOffer->is_seen=='no' ? 'display: block' : 'display: none'); ?>">
    </div>
    <?php endif; ?>
    </a>
    
              <!-- <a href="<?php echo e(url('/userWithdraw')); ?>" class="nav-item nav-link"><i class="fa fa-money" aria-hidden="true"></i></a>   -->
              <!-- <a href="<?php echo e(url('/feed')); ?>" class="nav-item nav-link"><i class="fa fa-newspaper-o"> </i></a>   -->
            


						</div>



<!-- ------------------------------------------ Registration & login Section  Start------------------------------------------->



						<div class="navbar-nav ml-auto">
              <?php if(!$login): ?>
					  <a href="<?php echo e(url('/register')); ?>" class="nav-item nav-link">Join Free</a>
              <a href="<?php echo e(url('/login')); ?>" class="nav-item nav-link"> Login</a>  
           <?php endif; ?>             

            <?php if($login): ?>
           <div class="btn-group login-btn text-right" style="border-right-color: white;border-right-style: solid;">    
             <!-- <a href="<?php echo e(url('/my-requests')); ?>"><button type="button" class="btn btn-warning text-white">Create Project</button></a> -->
            <!-- <?php if($userProfile[0]->profilepicture!=null): ?>
            <img width="50px;" height="50px;" src="<?php echo e(url('storage/app/public/uploads/'.$userProfile[0]->profilepicture)); ?>">
    
    <?php else: ?>
    <div class="">
		    	  <span class="firstName" style="display: none;"><?php echo e($userProfile ? $userProfile[0]->nickname : ''); ?></span>
	           	<div class="profileImage">
               
               </div>
	  </div>
   
   <?php endif; ?> -->
   <span class="profile-img text-white">
   <?php echo e($login->nickname); ?> <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
  </button>
 
   <div class="dropdown-menu dropdown-menu-right">
       <!-- <button class="dropdown-item" type="button">
         <a href="<?php echo e(url('/profile')); ?>">Edit Profile
         </a></button> -->
      <button class="dropdown-item" type="button">
        <a href="<?php echo e(url('/logout')); ?>">Logout</a></button>
         <!-- <button class="dropdown-item" type="button">
        <a href="<?php echo e(url('/my-requests')); ?>">Projects</a></button> -->
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
  <?php if($login): ?>
               
               <!-- <div class="noti-icon" style="<?php echo e($count > 0 ? 'display: block' : 'display: none'); ?>"><p><?php echo e($count); ?></p></div--> 
               <i style="font-size: 27px !important;"   class="fa fa-bell" aria-hidden="true"></i>
               <div class="noti" style="<?php echo e($count > 0 ? 'display: block' : 'display: none'); ?>"></div>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <?php endif; ?>
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                <br>
                <?php if($notification): ?>
      <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($val->notificationfor=='user'): ?>
        <?php 
          $GLOBALS['ids'][] = $val->id;
        ?>
    
      <a href="<?php echo e(url('notification/user')); ?>" id="bold" class="bold"><?php echo e($val->message); ?></a>

     
    
  
    <hr>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
    <input type="hidden" value="<?php echo implode(",",$GLOBALS['ids']); ?>" id="notids"/>
    <?php endif; ?>

    <a href="<?php echo e(url('notification/user')); ?>"><span class="text-center text-dark">Notification History -></span></a>
     
                </div>
              </li>
              <li class="nav-item">
              <a class="nav-link text-white" onclick="$('.subss').toggle()" href="<?php echo e($login ? '#' : url('/register')); ?>" ><i class="fa fa-address-card-o"></i></a>
               
               
                <div class="col-md-4 subss" style="display:none;">
                  <h3>Subscriptions</h3>
                  <?php $__currentLoopData = $subscribed_artist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('artistDetail/'.$artist->artistid)); ?>">
                    <div class="row mb-3">
                      <div class="col">
                        <img src="<?php echo e(url('storage/app/public/uploads/'.$artist->profilepicture)); ?>" class="img-fluid">
                        </div>
                                <div class="col-6 mt-3">
                                <p><?php echo e($artist->nickname); ?></p>
                                </div>
                              <div class="col mt-3">
                                  <div class="online" style="<?php echo e($artist->by_created==1 ? 'display:block' :'display:none'); ?>">
                                      </div>
                              </div>
                    </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                                   </div>
                    </div>

                    
                </div>
                
              </li>
						</div>
					</div>
				</nav>
		    </div>
	   </div>  
  </div>
  


</header>
<style>
.dropdown1.audio12.text-white {
    height: 107px;
    overflow-y: scroll;
}
.col-md-4.subss img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}
ul.nav.custom.search ul.subnav {
    width: 523px;
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
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #7b0000;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #d7d2d2;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.mobilebar {
    display: none;
}
@media  screen and (max-width: 768px) {
.header_bottom {
    display: none;
}
.mobilebar {
    display: Block;
}
}
@media  screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
span.togg {
    float: left;
    margin-left: 11px;
    margin-top: 9px;
}

.subscrive {
    float: right;
    margin-top: -51px;
    font-size: 27px;
}
.mobilebar {
    background: #7b0000;
}
#search {
    width: 280px;
}
.online {
    background: #3390ff;
    height: 10px;
    margin-left: 20px;
    width: 10px;
    border-radius: 50%;
}
.col-md-4.subss {
    position: absolute;
    background: white;
    right: -82px;
    top: 76px;
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    height: 100vh;
    overflow-y: scroll;
}
.noti {
    background: blue;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    position: absolute;
    top: 10px;
    right: 15px;
}
button.btn.btn-warning.text-white {
    margin-bottom: auto;
    margin-top: 8px;
    height: 36px !important;
    background-color: #ffbb11 !important;
    margin-right: 10px;
    border-bottom-right-radius: 6px !important;
    border-top-right-radius: 6px !important;
    border-radius: 6px;
}
.borderhover:hover {
    border: 2px solid yellow;
    padding-left: 32px;
}

.noti-icon p {
    color: white;
    font-weight: bold;
    margin-top: -1px;
}

</style>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
 <?php if($errors->all()): ?>
  <script type="text/javascript">
      //alert('rrr');
   </script>
  <?php endif; ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/layouts/header.blade.php ENDPATH**/ ?>