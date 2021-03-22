@include('layouts.header')

<div class="container">

<div class="offer ">
<h4 style=" margin-top: 10% !important;">{{$offer[0]->title}}</h4> 
<!-- <h5>Audio/Video</h5> -->
<a href="{{url('artistDetail/'.$offer[0]->artistid)}}"><h3>{{$offer[0]->nickname}} <i class="fa fa-star"></i>  761 </h3></a>
<div class="text-right">
<button class="btn btn-danger text-left {{$isSubscribed ? 'hide' : 'block'}}"  onclick="subscribe({{$offer[0]->artistid}},true)" id="subscribe" >Subscribe </button>
    
 <button class="btn btn-secondary text-left {{$isSubscribed ? 'block' : 'hide'}}" data-toggle="modal" data-target="#Unsubscribe1"  id="unsubscribe" >Subscribed </button>
</div>



        <!------------------------------------ Modal  unSubscribe------------------------------->
        <div class="modal fade" id="Unsubscribe1" tabindex="-1" aria-labelledby="UnsubscribeLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              
              <div class="modal-body">
              <h3> Unsubscribe from Artistname</h3>
              <div class="text-center Artistxyz">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
                <button type="button" class="btn btn-primary" onclick="subscribe({{$offer[0]->artistid}},false)">Unsubscribe</button>
              </div>
              </div>
            
            </div>
          </div>
        </div>
        <p>Sample</p>
        @foreach($offer as $offerdata)
        <?php 
        $GLOBALS['id'] = $offerdata->id;
        $GLOBALS['user_id'] = $offerdata->userid;
        $GLOBALS['artistid'] = $offerdata->artistid;
        $GLOBALS['add_price'] = $offerdata->additional_price;

        $GLOBALS['price'] = $offerdata->price;
        ?>
        <div class="container">
        <video width="100%" height="100%" controls  controlsList="nodownload" disablePictureInPicture>
          <source src="{{url('storage/app/public/video/'.$offerdata->media) }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        </div>
        <h4>Description</h4>
        <p>{{$offerdata->description}}</p>

        <div class="row">
          <div class="col">
              <h3>Duration</h3>
              <p>{{$offerdata->min}}Min -{{$offerdata->max}} Min</p>
          </div>
          <div class="col">
              <h3>Media</h3>
              <p>video</p>
          </div>
          <div class="col">
              <h3>Price</h3>
              <p>{{$offerdata->price}} PAZ/Minute</p>
          </div>
          <div class="col">
              <h3>Quality</h3>
              <p>{{$offerdata->quality}} p</p>
          </div>
          <div class="col">
              <h3>Category</h3>
              <p>{{$offerdata->category}}</p>
          </div>
          <div class="col">
              <h3>Delievery Speed</h3>
              <p>{{$offerdata->delieveryspeed}} Days</p>
          </div>
        </div>
        {!!Form::open(['id'=>'form_sub',  'method' => 'post'])!!}
        <input type="hidden" name="user_id" value="{{$GLOBALS['id'].'_'.$GLOBALS['user_id']}}"/>
        <input type="hidden" name="price" id="offer_pay" value="{{$GLOBALS['price']}}"/>
        <input type="hidden" name="art_id" value="{{$GLOBALS['artistid']}}">
        <input type="hidden" name="add_price" id="additional" value="{{$GLOBALS['add_price']}}">

        <input type="hidden" name="allinfo" value="{{json_encode($offerdata)}}"/>
        <div class="col-md-4">
          <h3>Set Duration</h3>
          {{Form::number('duration', '',['class'=>'form-control','data-id'=>$GLOBALS['price'],'id'=>'change_duration','min'=>1,'placeholder'=>'Duration'])}}
        </div>
        @endforeach
        <h4>Additional Request <small>(Price: {{$GLOBALS['add_price']}}PAZ)</small>
        <input type="radio" id="Yes" class="add_price" name="gender"  value="Yes">
              <label for="male">Yes</label>
              <input type="radio" id="No" class="add_price" name="gender" value="No">
              <label for="female">No</label><h4>  
              <div class="extra_price">
        {{Form::textarea('description',null,['class'=>'form-control', 'min'=>500,'rows' => 5, 'cols' => 30])}}
        </div>
        <br>
        <strong id="change_text"></strong>
        <div class="text-right mt-5">
        {{ Form::submit('Order Now !',['class'=>'btn btn-primary mb-5 btn-lg', 'name'=>'submit']) }}
        </div>
        {{ Form::close() }}
        </div>
        <div class="alert alert-success show_alert" role="alert" style="display:none">
          A simple success alert—check it out!
        </div>
        </div>

        <style>
        .text-center.Artistxyz {
            padding: 30px;
        }
        </style>
          
        @include('layouts.footer')