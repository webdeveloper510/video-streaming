@include('layouts.header')
<div class="container">
<div class="row">
      @foreach($playlist as $lists)
       <div class="col-md-4">
           <video width="350px" height="275px" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$lists->videos) }}" type="video/mp4">
                    Your browser does not support the video tag.
           </video>
   
    </div>
    <div class="report-op">
				   		<i class="fa fa-ellipsis-v" onclick="showop()"></i>
						<ul style="display:none;" class="reporting">
						 <li>Report</li>
						 <li>You can not download this video.</li>
						</ul>
				   </div>
    @endforeach
</div>
</div>


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
</style>
<script>
function showop(){
	//alert("asas");
	$(".reporting").toggle();
}
</script>

@include('layouts.footer')