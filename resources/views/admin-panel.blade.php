@include('layout.cdn')
<header>
   <div class="text-center">
      <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
      <div class="float-right">
         <a href="{{url('/logout/default')}}"><button class="btn btn-primery">Logout</button></a>
      </div>
      <h1 class="text-white mt-2"> Admin Panel</h1>
   </div>
</header>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Artist</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Payout</a>
  </li>
</ul>

<div class="container">
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <div class="row">
     <div class="col-md-6">
     <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     </div>
  </div>
  <div class="table-responsive">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Artist</th>
      <th scope="col">Signed Contract</th>
      <th scope="col">Verified ID Check </th>
      <th scope="col">Date of Completion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Artistname</td>
      <td>filename.png</td>
      <td>filename.png</td>
      <td>25-06-2021</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Artistname</td>
      <td>filename.png</td>
      <td>filename.png</td>
      <td>25-06-2021</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Artistname</td>
      <td>filename.png</td>
      <td>filename.png</td>
      <td>25-06-2021</td>
    </tr>
  </tbody>
</table>

  </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="container">
    <div class="row">
     <div class="col-md-3">
      <h3>Total USD :$<span>0</span></h3>
     </div>
     <div class="col-md-3">
      <h3>Fee USD :$<span>0</span></h3>
     </div>
     <div class="col-md-3">
      <h3>Pay USD :$<span>0</span></h3>
     </div>
     <div class="col-md-3">
      <h3>Total USD :$<span>0</span></h3>
     </div>
  </div>


    <div class="table-responsive">
  <table class="table">
  <thead class="thead-dark">
  <tr>
    <th scope="col" colspan="5">Bank Account Payouts</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Artist</th>
      <th scope="col">LVL</th>
      <th scope="col">%  </th>
      <th scope="col">Total USD</th>
      <th scope="col">Fee Amount USD  </th>
      <th scope="col">Pay Amount USD </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Artistname</td>
      <td>0</td>
      <td>20%</td>
      <td>$0</td>
      <td>$0</td>
      <td>$0</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Artistname</td>
      <td>0</td>
      <td>20%</td>
      <td>$0</td>
      <td>$0</td>
      <td>$0</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Artistname</td>
      <td>0</td>
      <td>20%</td>
      <td>$0</td>
      <td>$0</td>
      <td>$0</td>
    </tr>
  </tbody>
</table>

  </div>

    </div>
    <div class="container">
    <div class="row">
     <div class="col-md-3">
      <h3>Total USD :$<span>0</span></h3>
     </div>
     <div class="col-md-3">
      <h3>Fee USD :$<span>0</span></h3>
     </div>
     <div class="col-md-3">
      <h3>Pay USD :$<span>0</span></h3>
     </div>
     <div class="col-md-3">
      <h3>Total USD :$<span>0</span></h3>
     </div>
  </div>


    <div class="table-responsive">
  <table class="table">
  <thead class="thead-dark">
  <tr>
    <th scope="col" colspan="5">Paxum Account Payouts</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Artist</th>
      <th scope="col">LVL</th>
      <th scope="col">%  </th>
      <th scope="col">Total USD</th>
      <th scope="col">Fee Amount USD  </th>
      <th scope="col">Pay Amount USD </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Artistname</td>
      <td>0</td>
      <td>20%</td>
      <td>$0</td>
      <td>$0</td>
      <td>$0</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Artistname</td>
      <td>0</td>
      <td>20%</td>
      <td>$0</td>
      <td>$0</td>
      <td>$0</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Artistname</td>
      <td>0</td>
      <td>20%</td>
      <td>$0</td>
      <td>$0</td>
      <td>$0</td>
    </tr>
  </tbody>
</table>

  </div>

    </div>
  </div>
</div>
</div>
<style>

header {
   background: #7b0000;
   padding: 11px;
   }

</style>


@include('layouts.footer')