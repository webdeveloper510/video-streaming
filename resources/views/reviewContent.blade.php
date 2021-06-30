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
   @if($type!='picture')
      <div class="col-md-9">
         <!-- <video width="100%" id="sample_video" onClick="startReviw(this,'{{$type}}',{{json_encode($notVerified)}})">
            <source src="{{url('storage/app/public/video/'.$notVerified[0]->media)}}" id="first" type="video/mp4">
         </video> -->
         <video width="100%" id="sample_video" >
            <source src="{{url('storage/app/public/video/'.$notVerified[0]->media)}}" id="first" type="video/mp4">
         </video>
         <div class="text-center">
            <button class="btn btn-primary" type="button" data-id="{{$notVerified[0]->id}}" onClick="permit(this,true,{{json_encode($notVerified)}},'{{$type}}')">Permit</button>
            <button class="btn btn-primary" type="button" data-id="{{$notVerified[0]->id}}" onClick="permit(this,false,{{json_encode($notVerified)}},'{{$type}}')">Deny</button>
         </div>
         <input type="hidden" class="verify_id" value="{{$notVerified[0]->id}}"/>
      </div>
      @else

      @if($profile || $backgound)
      <div class="col-md-9">
         <!-- <video width="100%" id="sample_video" onClick="startReviw(this,'{{$type}}',{{json_encode($notVerified)}})">
            <source src="{{url('storage/app/public/video/'.$notVerified[0]->media)}}" id="first" type="video/mp4">
         </video> -->
         <img src="{{$profile ? url('storage/app/public/uploads/'.$profile[0]->profilepicture) : url('storage/app/public/uploads/'.$backgound[0]->cover_photo)}}" id="imageSrc" width="100%" id="sample_video" >
         <div class="text-center">
            <button class="btn btn-primary" type="button" data-id="{{$profile[0]->id}}" onClick="permit(this,true,{{json_encode($profile)}},'{{$type}}')">Permit</button>
            <button class="btn btn-primary" type="button" data-id="{{$profile[0]->id}}" onClick="permit(this,false,{{json_encode($profile)}},'{{$type}}')">Deny</button>
         </div>
         <input type="hidden" class="verify_id" value="{{$profile ? $profile[0]->id : $backgound[0]->id}}"/>
         <input type="hidden" class="picture" value="{{$profile ? 'profilepicture' : 'background'}}"/>

      </div>
      @endif
      @endif
      @if($type!='picture')
      <div class="col-md-3">
     
         @foreach($notVerified as $content)
         
         <div class="row mb-2" id="{{$content->id}}">
               <div class="col-5">
                  <video width="100%" height="100%" class="video" controls onClick="startReviw(this,'{{$type}}',{{json_encode($notVerified)}})">
                     <source src="{{url('storage/app/public/video/'.$content->media)}}" type="video/mp4">
                  </video>
               </div>
            <div class="col-7">
               <h5>{{$content->title}}</h5>
            </div>
         </div>
         @endforeach 
     

      </div>
      @else
      <div class="col-md-3">
      <h3>Profile Image </h3>
         @foreach($profile as $artists)
         @if($artists->profilepicture!='')

         <div class="row mb-2" id="{{$artists->id}}">
               <div class="col-7">
                 <span>Profile Picture</span> <img type-image="profilepicture" width="100%" src="{{url('storage/app/public/uploads/'.$artists->profilepicture)}}" height="100%" class="video" controls onClick="startReviw(this,'{{$type}}',{{json_encode($artists)}})">

               </div>
            <div class="col-5">
               <h5>{{$artists->nickname}}</h5>
            </div>
         </div>
         @endif
         @endforeach 
         <hr class="mt-4">
         <h3>Background Image </h3>
         @foreach($backgound as $artists)
         @if($artists->cover_photo!='')
         <div class="row mb-2" id="{{$artists->id}}">
               <div class="col-7">
       <img type-image="background" width="100%" src="{{url('storage/app/public/uploads/'.$artists->cover_photo)}}" height="100%" class="video" controls onClick="startReviw(this,'{{$type}}',{{json_encode($artists)}})">

               </div>
            <div class="col-5">
               <h5>{{$artists->nickname}}</h5>
            </div>
         </div>
         @endif
         @endforeach 
      </div>
      @endif
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