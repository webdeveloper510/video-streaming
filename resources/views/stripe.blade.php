

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
<form class="form-horizontal form-group" method="POST" id="payment-form" role="form" action="{{ action('AuthController@postPaymentStripe') }}">
{{ csrf_field() }}
<div class="form-row">
<div class="col-md-12 card1 required mb-3">
<label>Card Number</label>
<input autocomplete="off" class="form-control card-number" size="20" type="text" name="card_no">
</div>
<div class="col-md-4 cvc required mb-3">
<label >CVV</label>
<input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" pattern="\d{3}" maxlength="3"  size="4" type="text" name="cvvNumber">
</div>
<div class="col-md-4 expiration required">
<label>Expiration Month</label>
<input class="form-control card-expiry-month" placeholder="MM" size="4" pattern="\d{2}" maxlength="2"  type="text" name="ccExpiryMonth">
</div>
<div class="col-md-4 expiration required">
 <label>Expiration Year</label>
<input class="form-control card-expiry-year" placeholder="YYYY" size="4" pattern="\d{4}" maxlength="4" type="text" name="ccExpiryYear">
<input class="form-control price" placeholder="YYYY" size="4" type="hidden" name="amount" value="300">
</div>
<input type="hidden" id="fees" value="" name = "fees"/>   
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

</form>
</div>
<div class="col"></div>
</div>
</div>

