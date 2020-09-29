@extends('layout.cdn')
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
</head>
<body id="default_theme" class="it_service">
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- header bottom -->
  <div class="header_bottom">
		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="index.html" class="navbar-brand">
						<img src="images/logos/logo-2.png" height="28" alt="CoolBrand">
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
										<div id="home" class="tab-pane fade in active">
										<h3>Menu 1</h3>
										  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										</div>
										<div id="menu1" class="tab-pane fade">
										  <h3>Menu 1</h3>
										  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										</div>
										<div id="menu2" class="tab-pane fade">
										  <h3>Menu 2</h3>
										  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
										</div>
										<div id="menu3" class="tab-pane fade">
										  <h3>Menu 3</h3>
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

<!-- end header -->
<div class="inner-page">
  <div class="container">
      <div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">Play list</h3>		  
		</div>
        <div class="row pb-row">
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/wjT2JVlUFY4?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame " width="100%" height="230" src="https://www.youtube.com/embed/papuvlVeZg8?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/Y1_VsyLAGuk?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn"><i class="fa fa-plus" aria-hidden="true"></i>Load more</button></div>
        </div>
	</div>
	<br/>
	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">Wish list</h3>		  
		</div>
        <div class="row pb-row">
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
				
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/wjT2JVlUFY4?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame " width="100%" height="230" src="https://www.youtube.com/embed/papuvlVeZg8?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/Y1_VsyLAGuk?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn"><i class="fa fa-plus" aria-hidden="true"></i>Load more</button></div>
        </div>
	</div>
	<br/>
	<div class="col-md-12 uploa_outer">
		  <div class="slider_tittle">
		  <h3 class="tittle">History</h3>		  
		</div>
        <div class="row pb-row">
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
				
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/wjT2JVlUFY4?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame " width="100%" height="230" src="https://www.youtube.com/embed/papuvlVeZg8?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3 pb-video">
                <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/Y1_VsyLAGuk?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
            </div>
			<div class="out_red">
			<button onclick="myFunction()" id="myBtn"><i class="fa fa-plus" aria-hidden="true"></i>Load more</button></div>
        </div>
	</div>	
  </div>
</div>  

<!--body end-->

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
<style>
form.form-horizontal {
    width: 100%;
    float: left;
    display: flex;
}
button.btn.btn-default {
    background: #a60000;
}
.uploa_outer form {
    padding: 10px 20px;
}
.uploa_outer {
    float: left;
    width: 100%;
    margin: 20px 0px;
}
</style>
</html>
