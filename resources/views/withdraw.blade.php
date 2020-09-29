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
<!-- site icons -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
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
										<div id="home" class="tab-pane fade1 in active">
										<div class="row">
										<div class="col-md-6">
											<div class="dropdown12">
												   <h4>Categories </h4>
												   <form action="" id="tableid">
													  <label class="container1">Free  <input type="checkbox" name="checkbox[]" id="35" value="Free">
													  <span class="checkmark"></span>
													  </label>
													  <label class="container1">lowest  <input type="checkbox" name="checkbox[]" id="28" value="lowest">
													  <span class="checkmark"></span></label>
													  <label class="container1">Higest  <input type="checkbox" name="checkbox[]" id="27" value="Necklaces">
													  <span class="checkmark"></span>
													  </label>
													  <label class="container1">Earlowest  <input type="checkbox" name="checkbox[]" id="5" value="Higest">
													  <span class="checkmark"></span>
													  </label>
												   </form>
											</div>
										</div>
										 <div class="col-md-6">
												<div class="dropdown12">
												   <h4>Price</h4>
												   <form action="/action_page.php" id="tableid">
													  <label class="container1">Free  <input type="checkbox" name="checkbox[]" id="35" value="Free">
													  <span class="checkmark"></span>
													  </label>
													  <label class="container1">lowest  <input type="checkbox" name="checkbox[]" id="28" value="lowest">
													  <span class="checkmark"></span></label>
													  <label class="container1">Higest  <input type="checkbox" name="checkbox[]" id="27" value="Necklaces">
													  <span class="checkmark"></span>
													  </label>
													  <label class="container1">Earlowest  <input type="checkbox" name="checkbox[]" id="5" value="Higest">
													  <span class="checkmark"></span>
													  </label>
												   </form>
												</div>
												<div class="dropdown12">
												   <h4 >Add Reques</h4>
												   <form action="/action_page.php" id="tableid">
													  <label class="container1">Shortest  <input type="checkbox" name="checkbox[]" id="35" value="Shortest">
													  <span class="checkmark"></span>
													  </label>
													  <label class="container1">Longest  <input type="checkbox" name="checkbox[]" id="28" value="Longest">
													  <span class="checkmark"></span></label>
												   </form>
												</div>
										   </div> </div>		

										</div>
										<div id="menu1" class="tab-pane fade">
										  <h3 style="color: #fff;">Audio</h3>
										  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										</div>
										<div id="menu2" class="tab-pane fade">
										  <h3 style="color: #fff;">Artists</h3>
										  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
						 <ul>
							<li><a href="#" class="nav-item nav-link active"><img src="images/icon/badge1.png">TOP LIST</a></li>
							<li><a href="1-page.html" class="nav-item nav-link"><img src="images/icon/phone-ringing.png">LIVE</a></li>
							<li><a href="upload.html" class="nav-item nav-link"><img src="images/icon/cloud-computing.png"></a></li>
							<li><a href="play.html" class="nav-item nav-link"><img src="images/icon/online-video.png"></a></li>
							<li><a href="withdrawmoney.html" class="nav-item nav-link"><img src="images/icon/save-money2.png"></a></li>
							<li><a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle"><img src="images/icon/user1.png">User Name </a>
								<ul class="dropdown-menu" style="display:none;">
									<li><a href="#">Account</a></li>
									<li><a href="#">Payment</a></li>
									<li><a href="#">Setting</a></li>
									<li><a href="#">About</a></li>
								</ul>
                            </li>				
                         </ul>
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
	 <div class="slider_tittle">
		  <h3 class="tittle">Withdraw Money</h3>		  
	 </div> 
     <div class="row">
          <div class="col-md-12">
		   <div class="out_withdraw">
		     <ul>
			   <li> 
			     <div class="amount">Enter PAZ Amount <br>
				 <input type="email" class="form-control" id="Amount" placeholder="PAZ Amount">
				 </div>
			     <div class="amount_two">Amount <br>
				 <input type="email" class="form-control" id="Amount2" placeholder="Amount">
				 </div>	
			     <div class="money"><button onclick="myFunction()" id="myBtn">Withdraw</button></div><br>				 
			  </li></br>
			   <li class="n-2"><div class="text_one"><p>Refer <a href="#">personalattentionz.com</a> and earn 5% on purchases of every invited person!</p></div> <div class="money"><button onclick="myFunction()" id="myBtn">Copy Link</button></div></li>
			 </ul>
		   </div>
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
<!-- revolution js files -->
</body>
<script>
$(document).ready(function(){
	$(".dropdown, .btn-group").hover(function(){
		var dropdownMenu = $(this).children(".dropdown-menu");
		if(dropdownMenu.is(":visible")){
			dropdownMenu.parent().toggleClass("open");
		}
	});
});		
</script>
</html>
