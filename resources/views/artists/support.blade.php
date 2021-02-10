@include('artists.dashboard')

<section class=" support">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Open Ticket</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tickets</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
    <!--------- Open  ticket tab------------------------------------------>
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
       
      <div class="row">
          <div class="col"></div>
          <div class="col-md-8">
     <div class="ticketstext">
        <label>Subject</label>
        <select class="custom-select">
            <option selected>Select menu</option>
            <option value="1">Feature Request</option>
            <option value="2">Functionality Question</option>
            <option value="3">Technical Issue</option>
            <option value="4">General</option>
            <option value="5">Website Fees</option>
            <option value="6">Delete Account</option>
            <option value="7">Other</option>
        </select>
    <div class="description mt-3">
    <label>Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
    <div class="mt-3">
        <div class="row">
            <div class="col-md-3">
                 <h3>Spam Bot Verification</h3>
            </div>
            <div class="col-md-6">
                <p>Please enter the characters you see in the image below into the text box provided.This is requred to prevent
                automated submissions.</p>
                <img src="" class="img-fluid" alt="qr image">
                <input type="text" class="form-control" >
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-light">Submit</button>
</div>
    </div>

    </div>
   
</div>
<div class="col"></div>
</div>
  </div>

  <!--------- tickets tab------------------------------------------>

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="row">
          <div class="col"></div>
          <div class="col-md-8">
   <div class="opentickettext">
       <div class="row">
            <div class="col-9">
               <h3>#34567893 - Technical Issue</h3>
               <p>Last Updated: Monday,21.march,2021(15:03)</p>

            </div>
            <div class="col-3 mt-4">
                
               <button type="button" class="btn btn-primary">Open</button>
               <button type="button"  disable class="btn btn-primary" style="display:none;">Close</button>
            </div>
        </div>   
        <hr>   

    </div>
</div>
<div class="col"></div>
</div>


</div>


  </div>
 
</div>


</section>



<style>
    section.support {
    margin-top: 10%;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #1d0101;
    background-color: white;
}
ul#pills-tab {
    background: #7b0000;
    color: white !important;
}

li.nav-item a {
    color: white;
}

</style>




@include('artists.dashboard_footer');