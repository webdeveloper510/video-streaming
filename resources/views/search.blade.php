
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>PAZ html</title>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service">
<!-- header -->
@include('layouts.header')
<!-- end header -->
<div class="container">
    <div class="row" >
      
    @if($subcategory)
      @forelse($subcategory as $sub)
      <div class="col-md-2  hello">

        <a href="{{url('show/'.$sub->id)}}"><p>{{$sub->subcategory}}</p></a>


      </div>
       @empty
       @endforelse
        @endif
      




    </div>
    <button type="button" class="btn btn-primary bardot">Select</button>
    @if(!$video->isEmpty())
 <div class="row mt-5 pt-5">
 	  @foreach ($video as $vid)
 	   @if($vid->type=='video')
            <div class="col-md-4 pt-3">
			  <div class="embed-responsive embed-responsive-16by9">
				<video width="320" height="240" controls>
              <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
       Your browser does not support the video tag.
            </video>
				</div>
			</div>
			@endif
			@endforeach
  </div>
  @else
  <div>
     <h1>Your specific taste is not served yet</h1>
     <a href="{{url('my-requests')}}"><button class="btn btn-primary">
       Create Job
     </button></a>
  </div> 
  @endif
  <br/>
</div> 
 
<!--body start>

<body end-->

<!--footer -->
@include('layouts.footer')
<style>

.inner-page {
    float: left;
    width: 100%;
    padding: 10px;
}
.paginations.outer {
    float: left;
    width: 100%;
    padding: 20px 0px;
}
.pagination>li>a, .pagination>li>span {
    width: fit-content;
}
button.btn.btn-primary.bardot {
    float: right;
}
</style>
</html>
