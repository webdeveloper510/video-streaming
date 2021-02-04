
@include('layouts.header')

<!-- end header -->
<div class="container mt-5">
    <!-- <div class="row my-5 pt-5 " >
      
    @if($subcategory)
      @forelse($subcategory as $sub)
      <div class="col-md-2  hello">

        <a href="{{url('show/'.$sub->id)}}"><p>{{$sub->subcategory}}</p></a>


      </div>
       @empty
       @endforelse
        @endif
      




    </div> -->
    <div class="alert alert-success message" id="message" style="display:none" role="alert">
  A simple success alert—check it out!
</div>
    
    @if(!$video->isEmpty())
 <div class="row mt-5 pt-5">
 <div class="col-md-12">
 <button type="button" class="btn btn-primary bardot mt-3">Select</button>
 </div>
 	  @foreach ($video as $vid)
 	   @if($vid->type=='video')
            <div class="col-md-4 pt-3 searchvideo1">
            <a href="{{url('artist-video/'.$vid->id)}}">
			  <div class="embed-responsive embed-responsive-16by9">
				<video width="320" height="240" controls controlsList="nodownload" disablePictureInPicture>
              <source src="{{url('storage/app/public/video/'.$vid->media) }}" type="video/mp4">
       Your browser does not support the video tag.
            </video>
				</div>
        </a>
        <div class="report-op">
				   		<i class="fa fa-ellipsis-v" onclick="showop()"></i>
						<ul style="display:none;" class="reporting">
						 <li>Report</li>
						 <li>You can not download this video.</li>
						</ul>
				   </div>
         <div class="checkall" style="display: none"><form> <input type="checkbox" class="slct_video"  id="{{$vid->id}}" data-id="{{$vid->price}}"></form></div>
			</div>
			@endif
			@endforeach
  </div>
  @else
  <div>
     <h1>Your specific taste is not served yet</h1>
     <a href="{{url('my-requests')}}"><button class="btn btn-warning text-white">
     Create Project
     </button></a>
  </div> 
  @endif
  <br/>
</div> 

<div class="choose1" style="display:none;">
  <button type="button" class="close off" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   <div class="row ">
      <div class="col-md-3">
           <h4><span class="count">0</span>Item  Selected</h4>
      </div>
      <div class="col-md-3">
           <h4>Price : <span class="paz">0</span>PAZ</h4>
      </div>
    <div class="col-md-3 pt-3">
             <button type="button" class="btn btn-primary library" data-toggle="modal"  data-target="#exampleModal">Add To Library</button>
    </div>
    <div class="col-md-3 pt-3">
           <button type="button" class=" btn btn-primary addTowishlist" >Add To Wishlist </button>
    </div>
   </div>
  </div>
    <div class="modal" role="dialog" id="exampleModal" >


    </div>
     
<!--body start>
<body end-->
<script>
function showop(){
	//alert("asas");
	$(".reporting").toggle();
}
</script>
<!--footer -->
@include('layouts.footer')
<style>
.report-op {
    position: relative;
    top: 45px;
    color: white;
    right: 56px;
}
ul.reporting {
    background: white;
    color: black;
    padding: 13px;
    border-radius: 7px;
}
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
input.slct_video {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    appearance: unset;
    z-index: 99999;
}
input.slct_video.selected:after {
    content: "\f14a" !important;
    font-family: 'FontAwesome';
    position: absolute;
    right: 16px;
    top: 12px;
    font-size: 20px;
    color: #007bff;
}
input.slct_video:after {
    content: "\f0c8";
    font-family: 'FontAwesome';
    position: absolute;
    right: 16px;
    top: 12px;
    font-size: 20px;
    color: #007bff;
}

</style>
</html>
