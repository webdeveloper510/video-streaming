<!--Creates the popup body-->
<div class="popup-overlay">
<!--Creates the popup content-->
 <div class="popup-content">
 <p>You have not enough PAZ Token!</p>
			<label>Add PAZ Token :</label>
			{{Form::text('token', '',['class'=>'form-control token','placeholder'=>'Add Token'])}}

				<strong class="bonusPAZ" style="color:black; font-size:14px"></strong>

					@if($errors->first('token'))
					<div class="alert alert-danger">
						<?php echo $errors->first('token') ?>
					</div>
					@endif
					<div class="col-md-12 text-center pt-3">
					
						<button class="btn btn-primary" type="button" id="checkPrice">Calculate Token Price</button>
				</div>
				</div>

				<div class="col-md-12 text-center pt-3" style="display: none;">
				{{ Form::submit('Pay!',['class'=>'btn btn-primary']) }}
				</div>
   <!--popup's close button-->
    <button class="close">Close</button>    
</div>
</div>
<style>
.popup-overlay {
visibility:visible;
}

.popup-content {
visibility:visible;
}


.popup-overlay.active{
visibility:visible;
}

.popup-content.active {
visibility:visible;
}

</style>