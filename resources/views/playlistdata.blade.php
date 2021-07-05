@include('layouts.header')
<div class="container">
<div class="row">
      @foreach($playlist as $lists)
       <div class="col-md-4">
           <video width="350px" poster="{{url('storage/app/public/uploads/'.$lists->audio_pic) }}" height="275px" controls allowfullscreen controlsList="nodownload" disablePictureInPicture>
                <source src="{{url('storage/app/public/video/'.$lists->videos) }}" type="video/mp4">
                    Your browser does not support the video tag.
           </video>
   
    </div>
    <div class="report-op">
				   		<i class="fa fa-ellipsis-v" onclick="showop()"></i>
                   <ul style="display:none;" class="reporting">
						 <li><button class="btn btn-outline-light btn-sm text-dark"data-toggle="modal" data-target="#reportvideo" type="button">Report</button></li>
						 
						</ul>
    @endforeach
</div>
</div>



 <!-- Modal -->
 <div class="modal modal2" id="reportvideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header ">
                      <div class="row" style="width: 100%;">
                        <div class="col"></div>
                         <div class="col-md-8 my-3">
                            <div class="text-center">
                                <select class="form-select form-control " aria-label="Default select example">
                                  <option selected> Select Menu</option>
                                  <option value="1">Feature Request</option>
                                  <option value="2">Functionality Question</option>
                                  <option value="3">Techincal Issue</option>
                                  <option value="4">General</option>
                                  <option value="5">Website Fees</option>
                                  <option value="6">Delete Account</option>
                                  <option value="7">Other</option>
                                </select>
                              </div>
                          </div>
                          <div class="col"></div>
                          </div>
                        
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                      </div>
                      <div class="modal-body">
                      

                        <label>Description</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                      </div>
                      <div class="pb-3 pr-3 text-right">
                      <button class="btn btn-primary" type="button">Submit</button></div>
                    
                    </div>
                    
                    </div>
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