<!--Creates the popup body-->
<div class="popup-overlay">
<!--Creates the popup content-->
 <div class="popup-content">
 <p>You have not enough PAZ Token!</p>
 <div class="Coupon text-center">
          <h2> 10% OFF Coupon active</h2>

          </div>
			<label class="text-left">Add PAZ Tokens :</label>
			<?php echo e(Form::label('ADD', 'Token')); ?> 
                  <select class="custom-select mb-3">
                    <option selected>Select Token Amount</option>
                    <option value="200">200 Tokens $14USD</option>
                    <option value="500">500 Tokens $35 USD</option>
                    <option value="1000">1000 Tokens $69.50 USD (10 Bonus Tokens)</option>
                    <option value="1500">1500 Tokens $103.50 USD (30 Bonus Tokens)</option>
                    <option value="2000">2000 Tokens $137 USD (60 Bonus Tokens)</option>
                    <option value="2500">2500 Tokens $170 USD (100 Bonus Tokens)</option>
                    <option value="3000">3000 Tokens $202.50 USD (150 Bonus Tokens)</option>
                    <option value="3500">3500 Tokens $234.50 USD (210 Bonus Tokens)</option>
                    <option value="4000">4000 Tokens $266 USD (280 Bonus Tokens)</option>
                    <option value="4500">4500 Tokens $297 USD (360 Bonus Tokens)</option>
                    <option value="5000">5000 Tokens $327.50 USD (450 Bonus Tokens)</option>
                    <option value="10000">10000 Tokens $650 USD (1000 Bonus Tokens)</option>
                  </select>


                  <select class="custom-select mb-3">
                    <option selected>Choose Payment Options</option>
                    <option value="1">Credit/Debit Card (Visa/Mastercard/Discover)</option>
                    <option value="1">Paysafecard</option>
                    <option value="1">Epoch (Credit Card)</option>
                    <option value="1">PayPal</option>
                    <option value="2">Wire Transfer</option>
                    <option value="3">Google Pay</option>
                    <option value="3">Apple Pay</option>
                  </select>
                  <div class="text-center">
                     <button class="btn btn-primary" type="button"> Pay </button>
                  </div>
   <!--popup's close button-->
    <button class="close">X</button>    
</div>
</div>
<style>
.popup-overlay {
visibility:visible;
}
.popup-content {
visibility:visible;
}
.insuffiecient.modal {
    background: white;
    padding: 40px;
}
button.close {
    position: absolute;
    bottom: 19px;
    right: 20px;
}
.popup-overlay.active{
visibility:visible;
}
.Coupon.text-center h2 {     
    background: #7b0000;
    color: white;
    padding: 13px 0px;
    clip-path: polygon(100% 0%, 97% 50%, 100% 100%, 0 100%, 3% 50%, 0 0);
}
.popup-content.active {
visibility:visible;
}
</style><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/messagePopup.blade.php ENDPATH**/ ?>