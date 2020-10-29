
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
                    <li class="active"><a data-toggle="tab" href="#home">Video</a></li>
                    <li><a data-toggle="tab" href="#menu1">Audio</a></li>
                    <li><a data-toggle="tab" href="#menu2">Artists</a></li>
                    <li><a data-toggle="tab" href="#menu3">Add Request</a></li>
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
                     <?php echo e(Form::checkbox('category[]', $cat->id)); ?>

                     <?php echo e($cat->category); ?> 
                     
                            </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                      </div>
                    </div>
                     <div class="col-md-6">
                        <div class="dropdown12 text-white">
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
                        <div class="dropdown12 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                             <?php echo e(Form::checkbox('duration','asc')); ?>Shortest 
                           
                            </label><br>
                            <label class="">
                           <?php echo e(Form::checkbox('duration','desc')); ?>Longest 
                            
                          </label><br>
                      
                        </div>
                          
                       </div> 
                       <div class="col-md-6 text-left">
                       <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary mb-4'])); ?>

                        
                     </div>  
                     <div class="col-md-6 text-center">
                         <input type="button" class="btn btn-primary text-center" value=" Advance Filter option"data-toggle="modal" data-target="#exampleModal">
                      <?php echo e(Form::close()); ?>

                     </div>  
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
                     <?php echo e(Form::checkbox('category[]', $cat->id)); ?><?php echo e($cat->category); ?> 
                          
                            </label><br>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          </div>
                          <div class="col-md-6">
                               <div class="dropdown12 text-white">
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
                         
                       
                             <div class="dropdown12 text-white">
                           <h4 >Duration</h4>
                            <label>  
                             <?php echo e(Form::checkbox('duration','asc')); ?>Shortest
                            </label><br>
                            <label >
                             <?php echo e(Form::checkbox('duration','desc')); ?>Longest 
                          
                          </label>
                          </div>
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
                               <div class="dropdown12 text-white">
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
                       
                           <div class="dropdown12 text-white">
                           <h4 >Duration</h4>
                            <label>  
                            <?php echo e(Form::checkbox('duration','asc')); ?>Shortest
                            
                            </label><br>
                            <label> 
                             <?php echo e(Form::checkbox('duration[]','desc')); ?>Longest
                            
                          </label>
                          </div>
                             </div>
                             <div class="col-md-12 text-left">
                       <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary mb-4'])); ?>

                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Filter option
                          </button>
                     
                      <?php echo e(Form::close()); ?>

                     </div> 
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
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog filter-popup modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Advance Filter Option</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body filter">
                                <div class="row">
                                  <div class="col-md-4 mb-4">
                                    <label>Sexology</label><br>
                                    <?php echo e(Form::checkbox('sex[]','Hetero')); ?>Hetero <br>
                                    <?php echo e(Form::checkbox('sex[]','Homo')); ?>Homo <br>
                                    <?php echo e(Form::checkbox('sex[]','Bisexual')); ?>Bisexual 
                                  </div>
                                  <div class="col-md-4 mb-4">
                                      <label>Tits size</label><br>
                                    <?php echo e(Form::checkbox('tits[]','Small')); ?>Small <br>
                                    <?php echo e(Form::checkbox('tits[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('tits[]','Big')); ?>Big 
                                  </div>
                                   <div class="col-md-4 mb-4">
                                    <label>Ass</label><br>
                                    <?php echo e(Form::checkbox('ass[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('ass[]','Small')); ?>Small <br>
                                    <?php echo e(Form::checkbox('ass[]','Big')); ?>Big 
                                  </div>
                                  <div class="col-md-4 mb-4">
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
                                    <label>Eye color</label><br>
                                    <?php echo e(Form::checkbox('eyecolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','brown')); ?>Brown <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','brown-green')); ?>Brown-green<br> 
                                    <?php echo e(Form::checkbox('eyecolor[]','golden')); ?>Golden <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','gray')); ?>Gray <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','green')); ?>Green<br>
                                    <?php echo e(Form::checkbox('eyecolor[]','red')); ?>Red <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','white')); ?>White <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','yellow')); ?>Yellow <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','indigo')); ?>Indigo <br>
                                    <?php echo e(Form::checkbox('eyecolor[]','violet')); ?>Violet <br>
                                  </div>
                                        <div class="col-md-4 mb-4">
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
                                    <?php echo e(Form::checkbox('haircolor[]','blue')); ?>Blue <br>
                                    <?php echo e(Form::checkbox('haircolor[]','indigo')); ?>Indigo <br>
                                    <?php echo e(Form::checkbox('haircolor[]','violet')); ?>Violet <br>
                                  </div>
                                 
                                   <div class="col-md-4 mb-4">
                                      <label>Hair Length</label><br>
                                    <?php echo e(Form::checkbox('hairlength[]','Very short')); ?>Very short <br>
                                    <?php echo e(Form::checkbox('height[]','Short')); ?>Short <br>
                                    <?php echo e(Form::checkbox('height[]','Long')); ?>Long <br>
                                    <?php echo e(Form::checkbox('height[]','Very Long')); ?>Very Long <br>
                                  </div>
                                   <div class="col-md-4 mb-4">
                                    <label>Weight</label><br>
                                    <?php echo e(Form::checkbox('weight[]','Less than Average')); ?>Less than Average <br>
                                    <?php echo e(Form::checkbox('weight[]','Normal')); ?>Normal <br>
                                    <?php echo e(Form::checkbox('weight[]','Muscular')); ?>Muscular<br> 
                                    <?php echo e(Form::checkbox('weight[]','Above Average')); ?>Above Average 
                                  </div>
                                  <div class="col-md-4 mb-4">
                                      <label>Age</label><br>
                                    <?php echo e(Form::checkbox('age[]','18-24')); ?>18-24 <br>
                                    <?php echo e(Form::checkbox('age[]','25-34')); ?>25-34<br>
                                    <?php echo e(Form::checkbox('age[]','35-44')); ?>35-44<br>
                                    <?php echo e(Form::checkbox('age[]','45 +')); ?>45 +
 
                                  </div>
                                </div>
                            </div>

                          </div>
                        </div>
                      </div>
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
  .modal-backdrop.show {
    opacity: 1;
    display:none;
}
.modal-dialog.filter-popup {
    width: 620px;
    position: absolute;
    right: 0;
    top: 103px;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/layouts/header.blade.php ENDPATH**/ ?>