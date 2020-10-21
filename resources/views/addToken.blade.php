
 <section class="background1">

  @include('layouts.header')

            <div class="container">
          <div class="overlay1">

  {!!Form::open(['action' => 'AuthController@updateProfile', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
      <div class="container profile ">
        <h1 class="text-center">Add Token</h1>
          <div class="row align-items-center text-white">
            <div class="col-md-6 mt-5 ">
            {{Form::label('ADD', 'Token')}} 

          {{Form::text('token', '',['class'=>'form-control token','placeholder'=>'Add Token'])}}

                 @if($errors->first('token'))
                <div class="alert alert-danger">
                  <?php echo $errors->first('token') ?>
                </div>
                @endif
            </div>
    
             <div class="col-md-12 text-center pt-3" style="display: none;">
            {{ Form::submit('Pay!',['class'=>'btn btn-primary']) }}
             </div>
             <div class="col-md-12 text-center pt-3">
            	<button class="btn btn-primary" type="button" id="checkPrice">Calculate Token Price</button>
             </div>
    
     </div>
  {{ Form::close() }}
  </div>
</div>
</div>
</section>
<style>

.overlay1 {
    margin-top: 7% !important;
  }

</style>