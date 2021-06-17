@include('layout.cdn')
<header>
<div class="text-center">
<img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
<div class="float-right">
<a href="{{url('/logout/default')}}"><button class="btn btn-primery">Logout</button></a>
</div>
<h1 class="text-white mt-2"> Content Review</h1>
</div>

</header>


<div class="container-fluid mt-5">
<div class="row">
  <div class="col-md-9">
     
      <video width="100%"  controls>
        <source src="{{url('storage/app/public/video/'.$notVerified[0]->media)}}" id="first" type="video/mp4">
      </video>
      <div class="float-left">
            <h3>Trustlevel : <span>0</span></h3>
      </div>
<div class="text-center my-3">
       <button class="btn btn-outline-success" type="button" onClick="permit(true)">Permit</button>
       &nbsp;	&nbsp;	&nbsp;	&nbsp;
      <button class="btn btn-outline-danger" type="button" onClick="permit(false)">Deny</button>
    </div>
<input type="hidden" class="verify_id" value=""/>
<div class="text-left description12">
    <h3>Description: <small>...</small></h3>
</div>
<div class="text-left description1">
    <h3>About Me: <small>...</small></h3>
</div>
   
  </div>
  <div class="col-md-3">
  @foreach($notVerified as $content)
     <div class="row mb-2">
    
              <div class="col-5" onClick="startReviw(this,{{$content->id}},'{{$type}}')">
                  <video width="100%" height="100%" class="video" controls>
                    <source src="{{url('storage/app/public/video/'.$content->media)}}" type="video/mp4">
                  </video>
              </div>
                <div class="col-7">
                    <h5>{{$content->title}}</h5>
                </div>   
            
     </div>
     @endforeach 
  </div>


</div>
</div>
<style>
   .text-right.buttons {
   position: absolute;
   top: 0;
   right: 20px;
   }
   .carousel-control-next-icon, .carousel-control-prev-icon {
   display: inline-block;
   width: 20px;
   height: 20px;
   background: #0000001a no-repeat center center;
   background-size: 100% 100%;
   }
   li.nav-item {
   width: 33.33%;
   text-align: center;
   padding: 10px;
   background: #7b0000;
   color: white !important;
   }
   li.nav-item  a{
   color:white;
   }
   .row.media {
   border: 1px solid black;
   padding: 13px;
   margin-bottom: 12px;
   }
   header {
   background: #7b0000;
   padding: 11px;
   }
   .float-right {
   position: absolute;
   right: 20px;
   top: 20px;
   }
</style>
@include('layouts.footer')