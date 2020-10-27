  @include('layouts.header')
 <section class="background1">



            <div class="container">
          <div class="overlay1">
      <div class="container profile ">
        <h1 class="text-center">Add Token</h1>
          <div class="row align-items-center text-white">
            <div class="col-md-6 mt-2 ">
            {{Form::label('ADD', 'Token')}} 

          {{Form::text('token', '',['class'=>'form-control token','placeholder'=>'Add Token'])}}

                 @if($errors->first('token'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('token') ?>
                </div>
                @endif
                 <div class="col-md-12 text-center pt-3">
              <button class="btn btn-primary" style="line-height: 45px; min-width: 224px;" type="button" id="checkPrice">Calculate Token Price</button>
             </div>
            </div>
    
             <div class="col-md-12 text-center pt-3" style="display: none;">
            {{ Form::submit('Pay!',['class'=>'btn btn-primary']) }}
             </div>
            

             <div class="col-md-6  calculate text-center">
                        
             </div>
    
     </div>
  </div>
  <div class="text-white mt-5" id="stripeDiv" style="display: none">
  
@include('stripe')


</div>
</div>

</section>

<style>

.overlay1 {
    margin-top: 7% !important;
  }

</style>


