<!--Creates the popup body-->
<div class="popup-overlay">
<!--Creates the popup content-->
 <div class="popup-content">
 <p>You have not enough PAZ Token!</p>
			<label class="text-left">Add PAZ Token :</label>
			<?php echo e(Form::text('token', '',['class'=>'form-control token ','placeholder'=>'Add Token'])); ?>


				<strong class="bonusPAZ" style="color:black; font-size:14px"></strong>

					<?php if($errors->first('token')): ?>
					<div class="alert alert-danger">
						<?php echo $errors->first('token') ?>
					</div>
					<?php endif; ?>
					<div class="col-md-12 text-center pt-3">
					
						<button class="btn btn-primary" type="button" id="checkPrice">Calculate Token Price</button>
				</div>
				<p class="text-center"> Or</p>
				<a href="<?php echo e(url('/addToken')); ?>" class="text-dark">Go to Add Token Page</a>
							</div>

				<div class="col-md-12 text-center pt-3" style="display: none;">
				<?php echo e(Form::submit('Pay!',['class'=>'btn btn-primary'])); ?>

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

.popup-content.active {
visibility:visible;
}

</style><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/messagePopup.blade.php ENDPATH**/ ?>