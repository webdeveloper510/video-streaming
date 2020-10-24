<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>Bootstrap 101 Template</title>
   <!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <style>
 .submit-button {
 margin-top: 10px;
}
 </style>
 </head>
 <body>
<div class="container">
<div class="row">
<div class="col"></div>
<div class="col-md-4">
<form class="form-horizontal form-group" method="POST" id="payment-form" role="form" action="<?php echo e(action('AuthController@postPaymentStripe')); ?>">
<?php echo e(csrf_field()); ?>

<div class="form-row">
<div class="col-md-12 card1 required">
<label>Card Number</label>
<input autocomplete="off" class="form-control card-number" size="20" type="text" name="card_no">
</div>
<div class="col-md-4 cvc required mb-3">
<label >CVV</label>
<input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4" type="text" name="cvvNumber">
</div>
<div class="col-md-4 expiration required">
<label>Expiration</label>
<input class="form-control card-expiry-month" placeholder="MM" size="4" type="text" name="ccExpiryMonth">
</div>
<div class="col-md-4 expiration required">
 <label>Year</label>
<input class="form-control card-expiry-year mt-3" placeholder="YYYY" size="4" type="text" name="ccExpiryYear">
<input class="form-control price" placeholder="YYYY" size="4" type="hidden" name="amount" value="300">
</div>
<input type="hidden" id="tokens" name="token" value="">
<div class="col-md-12">
<div class="form-control total btn btn-primary" >
Total:
<span class="amount">$300</span>
</div>
</div>

<div class="col-md-12">
<button class="form-control btn btn-success submit-button" type="submit">Pay »</button>
</div>
</div>
<div class="col-md-12 error hide">
<div class="alert-danger alert">
Please correct the errors and try again.
</div>
</div>

</form>
</div>
<div class="col"></div>
</div>
</div>
</body><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/stripe.blade.php ENDPATH**/ ?>