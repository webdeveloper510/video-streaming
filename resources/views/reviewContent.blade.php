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


<div class="container-fluid mb-5">
<div class="row">
  <div class="col-md-9">
     
      <video width="100%"  controls>
        <source src="{{url('storage/app/public/video/'.$notVerified[0]->media)}}" type="video/mp4">
      </video>

<div class="text-center">
       <button class="btn btn-primary" type="button" onClick="permit(true)">Permit</button>
   
      <button class="btn btn-primary" type="button" onClick="permit(false)">Deny</button>
    </div>

  </div>
  <div class="col-md-3">
     <div class="row">
     @foreach($notVerified as $content)
              <div class="col-5">
                  <video width="100%" height="100%" controls>
                    <source src="{{url('storage/app/public/video/'.$content->media)}}" type="video/mp4">
                  </video>
              </div>
                <div class="col-7">
                    <h5>{{$content->title}}</h5>
                </div>   
                @endforeach 
     </div>
  </div>


</div>
</div>

@include('layouts.footer')