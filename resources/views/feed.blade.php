@include('layouts.header')
<section class="feed">

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Feed</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Bookmarks</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Gifts</button>
</div>

<div id="London" class="tabcontent">
<div class="row">
<div class="col">
 <div class="text-left">
 <h3>Artistname  <i class="fa fa-star" style="color:red;"></i>  761 </h3>
 </div>
 <div class="text-right">
       <p> 5 min ago.</p>
 </div>
 <div class="feedimg">
 
 <img src="" class="img-fluid">
 
 </div>
 <div class="feed text">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
       when an unknown printer took a galley of type and scrambled it to make a type 
       specimen book. It has survived not only five centuries, but also the leap into 
       electronic typesetting, remaining essentially unchanged. It was popularised in 
       the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
        and more recently with desktop publishing software like Aldus PageMaker including
         versions of Lorem Ipsum.</p>


 </div>
 <div class="text-right">
 <button type="button" class="btn btn-primary" >Tip PAZ</button>
</div>
</div>

<div class="col-md-3">
  <div class="sidebarfeed">
  <div class="">
      <h4> Set Tip: <input type="text" class="form-control"placeholder="Enter tip"></h3>
      <div class="row">
       <div class="col">
         <button type="button" class="btn btn-info">1 PAZ</button>
       </div>
       <div class="col">
         <button type="button" class="btn btn-info">3 PAZ</button>
       </div>
       <div class="col">
         <button type="button" class="btn btn-info">5 PAZ</button>
       </div>
      </div>
      <div class="text-center my-4">
      <button type="button" class="btn btn-primary ">Save</button>
      </div>
  </div>
  <hr> 
  <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">Additional Requests:</h5>
             <hr>
              <div class="card-body text-center">
                <h5>Aritist <button type="button" class="btn btn-primary ml-4">Send Message</button></h5>
                    <br>
                <h5>Aritist  <button type="button" class="btn btn-primary ml-4">Send Message</button></h5>
                <br>
                <h5>Aritist  <button type="button" class="btn btn-primary ml-4">Send Message</button></h5>
                
              </div>
            </div>
  </div>
  </div>

</div>
</div>
<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
</div>



</section>



<style>

.sidebarfeed {
    border: 1px solid;
    padding: 13px;
}
.card {
    border: none !important;
}

</style>
@include('layouts.footer')