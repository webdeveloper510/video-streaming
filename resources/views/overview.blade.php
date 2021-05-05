@include('layout.cdn')
<header>
<div class="text-center">
<img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
<h1 class="text-white mt-2"> Overview</h1>
</div>
</header>

<section class="overview p-3 my-4">
<div class="table table-responsive">
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Artist</th>
      <th scope="col">Reg.emails</th>
      <th scope="col">Cur.emalis</th>
      <th scope="col">Level</th>
      <th scope="col">Subscribers</th>
      <th scope="col">Trustlevel</th>
      <th scope="col">Reports</th>
      <th scope="col">Illegal_marked</th>
      <th scope="col">Media_subm</th>
      <th scope="col">Collection</th>
      <th scope="col">New</th>
      <th scope="col">Inprocess</th>
      <th scope="col">Due</th>
      <th scope="col">Delivered</th>
      <th scope="col">Expired</th>
      <th scope="col">balance</th>
      <th scope="col">Total_earning</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <th >mark</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
   
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Mark</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
   
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mark</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
   
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
   
    </tr>
    
  </tbody>
</table>

</div>


</section>













<style>
    section.support {
    margin-top: 1%;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #1d0101;
    background-color: white;
}
ul#pills-tab {
    background: #7b0000;
    color: white !important;
}
li.nav-item {
    width: 33.33%;
    text-align: center;
}

li.nav-item a {
    color: white;
}
header {
    background: #7b0000;
    padding: 11px;
}
  </style>

@include('layouts.footer')