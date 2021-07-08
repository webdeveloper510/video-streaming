<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

<div class="offer mt-5">
<h4 ><?php echo e($offer[0]->title); ?></h4> 
<!-- <h5>Audio/Video</h5> -->
<a href="<?php echo e(url('artistDetail/'.$offer[0]->artistid)); ?>"><h3><?php echo e($offer[0]->nickname); ?> <i class="fa fa-star"></i>  761 </h3></a>
<div class="text-right mb-4">
<button class="btn btn-danger text-left <?php echo e($isSubscribed ? 'hide' : 'block'); ?>"  onclick="subscribe(<?php echo e($offer[0]->artistid); ?>,true)" id="subscribe" >Subscribe </button>
    
 <button class="btn btn-secondary text-left <?php echo e($isSubscribed ? 'block' : 'hide'); ?>" data-toggle="modal" data-target="#Unsubscribe1"  id="unsubscribe" >Subscribed </button>
</div>

        <!------------------------------------ Modal  unSubscribe------------------------------->
        <div class="modal fade" id="Unsubscribe1" tabindex="-1" aria-labelledby="UnsubscribeLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              
              <div class="modal-body">
              <h3> Unsubscribe from Artistname</h3>
              <div class="text-center Artistxyz">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
                <button type="button" class="btn btn-primary" onclick="subscribe(<?php echo e($offer[0]->artistid); ?>,false)">Unsubscribe</button>
              </div>
              </div>
            
            </div>
          </div>
        </div>
      
        <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
        $GLOBALS['id'] = $offerdata->id;
        $GLOBALS['user_id'] = $offerdata->userid;
        $GLOBALS['artistid'] = $offerdata->artistid;
        $GLOBALS['add_price'] = $offerdata->additional_price;

        $GLOBALS['price'] = $offerdata->price;
        ?>
        <div class="container">
        <video width="100%" poster="<?php echo e(url('storage/app/public/uploads/'.$offerdata->audio_pic)); ?>" height="100%" controls  controlsList="nodownload" disablePictureInPicture>
          <source src="<?php echo e(url('storage/app/public/video/'.$offerdata->media)); ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        </div>
        <h4>Description</h4>
        <p><?php echo e($offerdata->description); ?></p>

        <div class="row">
          <div class="col">
              <h3>Duration</h3>
              <p><?php echo e($offerdata->min); ?>Min -<?php echo e($offerdata->max); ?> Min</p>
          </div>  
          <div class="col">
              <h3>Media</h3>
              <p>video</p>
          </div>
          <div class="col">
              <h3>Price</h3>
              <p> <span  style="color:gold !important;"><?php echo e($offerdata->price); ?> <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></span>/Minute</p>
          </div>
          <div class="col">
              <h3>Quality</h3>
              <p><?php echo e($offerdata->quality); ?> p</p>
          </div>
          <div class="col">
              <h3>Category</h3>
              <p><?php echo e($offerdata->category); ?></p>    
          </div>
          <div class="col">
              <h3>Delievery Speed</h3>
              <p><?php echo e($offerdata->delieveryspeed+1); ?> Days</p>
          </div>
        </div>
        <?php echo Form::open(['id'=>'form_sub',  'method' => 'post']); ?>

        <input type="hidden" name="user_id" value="<?php echo e($GLOBALS['id'].'_'.$GLOBALS['user_id']); ?>"/>
        <input type="hidden" name="price" id="offer_pay" value="<?php echo e($offerdata->max*$GLOBALS['price']); ?>"/>
        <input type="hidden" name="timezone" class="timezone" value="<?php echo e($offerdata->timezone); ?>"/>
        <input type="hidden" name="created_at" class="artist_time_at" value=""/>
        <input type="hidden" name="updated_at" class="artist_updated_at" value=""/>

        <input type="hidden" name="art_id" value="<?php echo e($GLOBALS['artistid']); ?>">
         
        <input type="hidden" name="add_price" id="additional" value="<?php echo e($GLOBALS['add_price']); ?>">

        <input type="hidden" name="allinfo" value="<?php echo e(json_encode($offerdata)); ?>"/>
        <div class="col-md-4">
          <h3>Set Duration in Minutes</h3>
          <?php echo e(Form::number('duration', $offerdata->max,['class'=>'form-control','pattern'=>'[A-Za-z]','data-id'=>$GLOBALS['price'],'id'=>'change_duration','min'=>$offerdata->min,'max'=>$offerdata->max,'placeholder'=>'Duration'])); ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <h4>Additional Request <small>(Price: <span style="color:gold !important; font-size:16px;"> <?php echo e($GLOBALS['add_price']); ?> </span><b style="font-size:16px;font-family: 'Alfa Slab One', cursive;color:gold !important;font-weight: 400;">PAZ</b>)</small>
        <input type="radio" id="Yes" class="add_price" name="gender"  value="Yes">
              <label for="male">Yes</label>
              <input type="radio" id="No" class="add_price" name="gender" value="No">
              <label for="female">No</label><h4>  
              <div class="extra_price">
        <?php echo e(Form::textarea('description',null,['class'=>'form-control', 'maxlength'=>1000,'rows' => 5, 'cols' => 30])); ?>

        </div>
        <br>
        <strong id="change_text"></strong>
        <div class="text-right mt-5">
        <?php echo e(Form::submit('Order Now !',['class'=>'btn btn-primary mb-5 btn-lg', 'name'=>'submit'])); ?>

        </div>
        <?php echo e(Form::close()); ?>

        </div>
        <input type="hidden" id="popup_visibile" value="<?php echo e($visible==1 ? 0 : 1); ?>"/>
        <div class="alert alert-success show_alert" role="alert" style="display:none">
          A simple success alert—check it out!
        </div>
        </div>

        <style>
        .text-center.Artistxyz {
            padding: 30px;
        }
        </style>

            <div class="modal successfull" tabindex="-1" style="display:none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="reloadPage()" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <h2 class="text-center"> Order Successful!</h2>
                      <p> You can check your order status anytime  under : My Order</p>
                      <p><input type="checkbox" id="orderPopup" aria-label="Checkbox for following text input"> 
                            Do not show again
                      </p>
                  </div>
                      <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reloadPage()">Close</button>
                      </div>
                </div>
              </div>
            </div>


        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script>

    var today = new Date();

    //console.log("Topday" + today);



    console.log("Topday" + today);

    // var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    // var dateTime = date+' '+time;



    var localTime = today.getTime();


   var localOffset = today.getTimezoneOffset(); 

   console.log("Local Time Offset in Minutes" +" " + localOffset);

    var timeOffset = $('.timezone').val();


    var offset = timeOffset < 0 ? Math.abs(timeOffset) : '-'+timeOffset;


var localOffset1 = today.getTimezoneOffset()*60000; 


var utc = localTime + localOffset1; 


var respectedCountry = utc + (3600000*offset);

//console.log("local time  country" + respectedCountry);

var nd = new Date(respectedCountry);

//console.log("My time" + nd);

//console.log("Expected Time" + nd.toLocaleString());

// var RespectedTime = nd.toLocaleString().toISOString();

// console.log(RespectedTime);

//var timeArtist = RespectedTime.split(',');

//console.log(timeArtist);

var day = nd.getFullYear()+'-'+(nd.getMonth()+1)+'-'+nd.getDate();

//console.log("Day" + day);

var time1 =  nd.getHours() + ":" + nd.getMinutes() + ":" + nd.getSeconds();

console.log(time1);

$('.artist_time_at').val(day+' '+time1)

$('.artist_updated_at').val(day+' '+time1)
        </script><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artistoffers.blade.php ENDPATH**/ ?>