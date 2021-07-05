<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="feed">

<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')">Feed</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Bookmarks</button>
  <button class="tablinks " onclick="openCity(event, 'Tokyo')">Gifts</button>
</div>

<div id="London" class="tabcontent ">
<div class="row">
<div class="col">
 <div class="text-left feedname">
 <h3>Artistname  <i class="fa fa-star" style="color:red;"></i>  761 </h3>
 </div>
 <div class="text-right feedmin">
       <p> 5 min ago.</p>
 </div>
 <div class="feedimg text-center">
 
 <img src="http://localhost/video-streaming/storage/app/public/uploads/1609193394_Hobbies- Fishing (1).jpg" class="img-fluid">
 
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

     <button class="btn btn-primery form-control">See All</button>
 </div>
 <div class="text-right">
 <button type="button" class="btn btn-primary" >Tip PAZ</button>
</div>
</div>

<div class="col-md-3">
  <div class="sidebarfeed">
  <div class="">
      <h4> Set Tip: <input type="text" value="" class="form-control set_paz" placeholder="Enter tip"></h3>
      <div class="row">
       <div class="col">
         <button type="button" class="btn btn-info" onclick="getPaz(1)">1 PAZ</button>
       </div>
       <div class="col">
         <button type="button" class="btn btn-info" onclick="getPaz(3)">3 PAZ</button>
       </div>
       <div class="col">
         <button type="button" class="btn btn-info" onclick="getPaz(5)">5 PAZ</button>
       </div>
      </div>
      <div class="text-center my-4">
      <button type="button" class="btn btn-primary ">Save</button>
      </div>
  </div>
  <hr> 
  <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">Your Subscriptions:</h5>
             <hr>
              <div class="card-body text-center">
              <?php $__currentLoopData = $artist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h5><?php echo e($val->nickname); ?> 
                <button type="button" class="btn btn-primary ml-4">
                Send Message
                </button>
                </h5>

                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </div>
            </div>
  </div>
  </div>

</div>
</div>
<div id="Paris" class="tabcontent" style="display:none">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent" style="display:none">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
</div>



</section>



<style>

div#Tokyo {
    padding: 40px;
}
div#Paris {
    padding: 40px;
}
div#London {
    padding: 40px;
}
.sidebarfeed {
    border: 1px solid;
    padding: 13px;
}
.card {
    border: none !important;
}
button.tablinks.active {
    color: #111111;
    width: 33%;
    background: #ffffff;
    padding: 8px;
    border: 1px solid #ffffff;
}
.text-right.feedmin {
    margin-top: -35px;
}
.tab {
    background: #ffffff;
    color: white !important;
    padding: 2px;
}
.feedimg.text-center {
    margin-bottom: 20px;
}
button.tablinks {
    color: white;
    width: 33%;
    background: #7b0000;
    padding: 8px;
    border: 1px solid #7b0000;
}

</style>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/feed.blade.php ENDPATH**/ ?>