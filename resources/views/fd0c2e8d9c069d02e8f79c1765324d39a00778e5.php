
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service">
<!-- header -->
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end header -->
<div class="inner-page">
  <div class="container">
	 <div class="slider_tittle">
		  <h3 class="tittle text-center">Withdraw Money</h3>		  
	 </div> 
     <div class="row">
          <div class="col-md-12">
		   <div class="out_withdraw">
		       <div class="row">
          <div class="col-md-4">
		
			     <div class="amount">Enter PAZ Amount <br>
				 <input type="email" class="form-control" id="Amount" placeholder="PAZ Amount">
				 </div>
        </div>
        <div class="col-md-4">
			     <div>Amount <br>
				 <input type="text" class="form-control" id="Amount2" placeholder="Amount">
				 </div>	
        </div>
        <div class="col-md-4 mt-4">
			     <div class="money"><button onclick="myFunction()" id="myBtn">Withdraw</button></div>	</div></div>

           <div class="row">
            <div class="col-md-8">
			 
			   <div class="text_one"><p>Refer <a href="#">personalattentionz.com </a> and earn 5% on purchases of every invited person!</p></div>
       </div>
       <div class="col-md-4 mt-4">
          <div class="money"><button onclick="myFunction()" id="myBtn">Copy Link</button></div>
        </div>
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
</body>
</html>

<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views//withdraw.blade.php ENDPATH**/ ?>