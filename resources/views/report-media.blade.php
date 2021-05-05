    @include('layout.cdn')
<header>
<div class="text-center">
<img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
<h1 class="text-white mt-2"> Content Review</h1>
</div>
</header>


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Reported Items</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Upload Verifying</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  
  <section class="reportmeadia">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="text-center">
                <h3>Oldest : <span>0h</span>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
                <h3>In Queue : <span>0</span>
          </div>
      </div>
      <div class="col-md-12 text-center my-4">
          <button class="btn btn-outline-primary" type="button">Start Reviewing</button>
      </div>
    </div>
      <div class="row media">
          <div class="col-md-4">
          <video width="100%" controls>
            <source src="movie.mp4" type="video/mp4">
            </video>
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3> Report item title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                     <div class="text-right buttons">
                         <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>
       <div class="row media">
          <div class="col-md-4">
          <video width="100%" controls>
            <source src="movie.mp4" type="video/mp4">
            </video>
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3> Report item title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                     <div class="text-right buttons">
                         <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>
       <div class="row media">
          <div class="col-md-4">
          <video width="100%" controls>
            <source src="movie.mp4" type="video/mp4">
            </video>
           </div>
           <div class="col-md-8">
             <div class="reportitems">
                <h3> Report item title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                     <div class="text-right buttons">
                         <button class="btn btn-outline-primary" type="button">Mark as legal</button>
                          <button class="btn btn-outline-primary" type="button">illegal + delete</button>
                        </div>
                </div>
           </div>
       </div>




  </div>
</section>
  
  
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    
  <section class="reportmeadia">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="text-center">
                <h3>Oldest : <span>0h</span> </h3>

                <select class="custom-select my-2"">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
          </div>
      </div>
      <div class="col-md-6">
          <div class="text-center">
                <h3>In Queue : <span>0</span> </h3>

                <button class="btn btn-outline-primary my-2"  type="button">Start Reviewing</button>
          </div>
      </div>
      <div class="col-md-12 text-center my-4">
        
      </div>
    </div>
    </div>
    </section>
  
  </div>
</div>

<style>
.text-right.buttons {
    position: absolute;
    top: 0;
    right: 20px;
}
li.nav-item {
    width: 50%;
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
  </style>

@include('layouts.footer')