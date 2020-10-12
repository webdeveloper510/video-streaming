<header id="default_header" class="header_style_1">
  <!-- header bottom -->
  <div class="header_bottom">
		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="<?php echo e(url('/home')); ?>" class="navbar-brand">
						<img src="<?php echo e(asset('images/logos/logo-2.png')); ?>" height="28" alt="CoolBrand">
					</a>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="search_meu">
					<!--div class="menu_icon_custome"><i class="fa fa-bars" aria-hidden="true"></i></div-->
					<ul class="nav custom search">
              <li id="options">
                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <ul class="subnav">
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
                      <div class="dropdown12">
                           <h4>Categories </h4>
                <?php echo Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true]); ?>

                  <?php echo e(Form::token()); ?>

                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->type=='video'): ?>
                   <label class="container1"><?php echo e($cat->category); ?> 
                     <?php echo e(Form::checkbox('category[]', $cat->id)); ?>

                      <span class="checkmark"></span>
                            </label>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                      </div>
                    </div>
                     <div class="col-md-6">
                        <div class="dropdown12">
                           <h4>Price</h4>
  
                            <label class="container1">Free  
                             <?php echo e(Form::checkbox('price','free')); ?>

                           <span class="checkmark"></span>
                            </label>
                            <label class="container1">lowest  
                               <?php echo e(Form::checkbox('price','asc')); ?>

                            <span class="checkmark"></span></label>
                            <label class="container1">Higest  
                               <?php echo e(Form::checkbox('price','desc')); ?>

                            <span class="checkmark"></span>
                            </label>
                       
                        </div>
                        <div class="dropdown12">
                           <h4 >Duration</h4>
                            <label class="container1">Shortest  
                             <?php echo e(Form::checkbox('duration','asc')); ?>

                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">Longest 
                           <?php echo e(Form::checkbox('duration','desc')); ?>

                            <span class="checkmark"></span>
                          </label>
                      
                        </div>
                          <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

                      <?php echo e(Form::close()); ?>

                       </div> 
                     </div>    

                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3 style="color: #fff;">Audio</h3>
                      <div class="col-md-6">
                      <div class="dropdown12">
                           <h4>Categories </h4>
                      <?php echo Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true]); ?>

                      <?php echo e(Form::token()); ?>

                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->type=='audio'): ?>
                   <label class="container1"><?php echo e($cat->category); ?> 
                     <?php echo e(Form::checkbox('category[]', $cat->id)); ?>

                            <span class="checkmark"></span>
                            </label>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          </div>
                          <div class="col-md-6">
                               <div class="dropdown12">
                           <h4>Price</h4>
  
                            <label class="container1">Free 
                             <?php echo e(Form::checkbox('price','free')); ?>

                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">lowest  
                             <?php echo e(Form::checkbox('price','asc')); ?>

                            <span class="checkmark"></span></label>
                            <label class="container1">Higest  
                               <?php echo e(Form::checkbox('price','desc')); ?>

                            <span class="checkmark"></span>
                            </label>
                       
                        </div>
                          </div>
                       
                             <div class="dropdown12">
                           <h4 >Duration</h4>
                            <label class="container1">Shortest  
                             <?php echo e(Form::checkbox('duration','asc')); ?>

                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">Longest 
                             <?php echo e(Form::checkbox('duration','desc')); ?>

                            <span class="checkmark"></span>
                          </label>
                          </div>
                            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

                        <?php echo e(Form::close()); ?>

                      </div>
                  
                    <div id="menu2" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                          <div class="col-md-6">
                      <div class="dropdown12">
                           <h4>Categories </h4>
                           <?php echo Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true]); ?>

                             <?php echo e(Form::token()); ?>

                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cat->type=='artist'): ?>
                   <label class="container1"><?php echo e($cat->category); ?> 
                     <?php echo e(Form::checkbox('category[]', $cat->id)); ?>

                            <span class="checkmark"></span>
                            </label>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          </div>
                          <div class="col-md-6">
                               <div class="dropdown12">
                           <h4>Price</h4>
  
                            <label class="container1">Free  
                               <?php echo e(Form::checkbox('price','free')); ?>

                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">lowest  
                               <?php echo e(Form::checkbox('price','asc')); ?>

                            <span class="checkmark"></span></label>
                            <label class="container1">Higest 
                               <?php echo e(Form::checkbox('price','desc')); ?>

                            <span class="checkmark"></span>
                            </label>                       
                        </div>
                          </div>
                           <div class="dropdown12">
                           <h4 >Duration</h4>
                            <label class="container1">Shortest  
                            <?php echo e(Form::checkbox('duration','asc')); ?>

                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">Longest 
                             <?php echo e(Form::checkbox('duration[]','desc')); ?>

                            <span class="checkmark"></span>
                          </label>
                          </div>
                            <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary'])); ?>

                          <?php echo e(Form::close()); ?>

                       
                    </div>
                    <div id="menu3" class="tab-pane fade">
                      <h3 style="color: #fff;">Menu 3</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    </div>
                </ul>
              </li>
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
							<a href="#" class="nav-item nav-link active"><i class="fa fa-trophy"></i>TOP LIST</a>
							<a href="1-page.html" class="nav-item nav-link"><i class="fa fa-phone" aria-hidden="true"></i>LIVE</a>
							<a href="upload.html" class="nav-item nav-link"><i class="fa fa-upload" aria-hidden="true"></i></a>	
							<a href="play.html" class="nav-item nav-link"><i class="fa fa-play" aria-hidden="true"></i></a>	
							<a href="#" class="nav-item nav-link"><i class="fa fa-money" aria-hidden="true"></i></a>
							<a href="#" class="nav-item nav-link"><i class="fa fa-user" aria-hidden="true"></i>User Name</a>								

						</div>
						<div class="navbar-nav ml-auto">
							<a href="#" class="nav-item nav-link">Login</a>
						</div>
					</div>
				</nav>
		    </div>
	   </div>  
  
  </div>
  <!-- header bottom end -->
</header>
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gv0heoa8vyih/public_html/video-streaming/resources/views/layouts/header.blade.php ENDPATH**/ ?>