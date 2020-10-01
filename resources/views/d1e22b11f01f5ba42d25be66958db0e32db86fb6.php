
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>PAZ html</title>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service">
<!-- header -->
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end header -->

<!--1st slider start-->
 <!--1st slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">Recently Searched</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="recently_search" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
      <div class="controls-top">
        <a class="btn-floating" href="#recently_search" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-floating" href="#recently_search" data-slide="next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <!--/.Controls-->

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#recently_search" data-slide-to="0" class="active"></li>
        <li data-target="#recently_search" data-slide-to="1"></li>
        <li data-target="#recently_search" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls allowfullscreen>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>
          </div>

        </div>
        <!--/.First slide-->

        <!--Second slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
					  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>			  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Second slide-->

        <!--Third slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Third slide-->

      </div>
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div><br/><br/>

 
 <!--End 1st slider-->
 
 
 
 
 <!--2nd slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">Popular</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="Popular_slid" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
      <div class="controls-top">
        <a class="btn-floating" href="#Popular_slid" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-floating" href="#Popular_slid" data-slide="next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <!--/.Controls-->

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#Popular_slid" data-slide-to="0" class="active"></li>
        <li data-target="#Popular_slid" data-slide-to="1"></li>
        <li data-target="#Popular_slid" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>
          </div>

        </div>
        <!--/.First slide-->

        <!--Second slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
					  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>			  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Second slide-->

        <!--Third slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Third slide-->

      </div>
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div><br/><br/>
 <!--End 2nd slider-->
 
 
 
  <!--3rd slider start-->
<div class="outer_slider">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">New Comes</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="New_comes" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
      <div class="controls-top">
        <a class="btn-floating" href="#New_comes" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-floating" href="#New_comes" data-slide="next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <!--/.Controls-->

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#New_comes" data-slide-to="0" class="active"></li>
        <li data-target="#New_comes" data-slide-to="1"></li>
        <li data-target="#New_comes" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>
          </div>

        </div>
        <!--/.First slide-->

        <!--Second slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
					  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>			  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Second slide-->

        <!--Third slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Third slide-->

      </div>
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div><br/><br/>
 <!--End 3rd slider-->
 
 
  <!--4th slider start-->
<div class="outer_slider last">
  <div class="container my-4">
    <div class="slider_tittle">
	  <h3 class="tittle">Special offer</h3>
	</div>
    <!--Carousel Wrapper-->
    <div id="Special_offer" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
      <div class="controls-top">
        <a class="btn-floating" href="#Special_offer" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-floating" href="#Special_offer" data-slide="next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <!--/.Controls-->

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#Special_offer" data-slide-to="0" class="active"></li>
        <li data-target="#Special_offer" data-slide-to="1"></li>
        <li data-target="#Special_offer" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>
          </div>

        </div>
        <!--/.First slide-->

        <!--Second slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
					  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>			  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Second slide-->

        <!--Third slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
				  <video width="370" height="245" controls>
					  <source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>				  
              </div>
            </div>
          </div>

        </div>
        <!--/.Third slide-->

      </div>
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->


  </div>  </div><br/><br/>
 <!--End 4th slider-->
<!--footer -->
<footer class="footer_style_2">
  <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="main-heading left_text">
              <h2>It Next Theme</h2>
            </div>
            <p>Tincidunt elit magnis nulla facilisis. Dolor sagittis maecenas. Sapien nunc amet ultrices, dolores sit ipsum velit purus aliquet, massa fringilla leo orci.</p>
            <ul class="social_icons">
              <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="main-heading left_text">
              <h2>Additional links</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="#"><i class="fa fa-angle-right"></i> About us</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i> Privacy policy</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i> News</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i> Contact us</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="main-heading left_text">
              <h2>Contact us</h2>
            </div>
            <p>123 Second Street Fifth Avenue,<br>
              Manhattan, New York<br>
              <span style="font-size:18px;"><a href="tel:+9876543210">+987 654 3210</a></span></p>
            <div class="footer_mail-section">
              <form>
                <fieldset>
                <div class="field">
                  <input placeholder="Email" type="text">
                  <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      <div class="cprt">
        <p>PAZ © Copyrights 2019 Design by PAZ</p>
      </div>
    </div>
  </div>
</footer>
</body>

</html>

<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views//initial.blade.php ENDPATH**/ ?>