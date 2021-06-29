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
<ul class="nav nav-pills mb-3 px-4" id="pills-tab" role="tablist">
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
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Bank">
 Start Payout
</button>
     </div>
  </div>


    <div class="table-responsive">
  <table class="table">
  <thead class="thead-dark">
  <tr>
    <th scope="col" colspan="7" class="text-center">Bank Account Payouts</th>
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
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paxum">
 Start Payout
</button>
     </div>
  </div>


    <div class="table-responsive">
  <table class="table">
  <thead class="thead-dark">
  <tr>
    <th scope="col" colspan="7" class="text-center">Paxum Account Payouts</th>
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
<!-- Button trigger modal -->


<!-- Bank Modal -->
<div class="modal fade" id="Bank" tabindex="-1" role="dialog" aria-labelledby="Bank Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="BankLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




<!-- Paxum Modal -->
<div class="modal fade" id="paxum" tabindex="-1" role="dialog" aria-labelledby="paxumLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paxumLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<style>

header {
   background: #7b0000;
   padding: 11px;
   }
   .float-right {
   position: absolute;
   right: 20px;
   top: 20px;
   }
   li.nav-item {
   width: 50%;
   text-align: center;
   padding: 10px;
   background: #7b0000;
   color: white !important;
   }
</style>


@include('layouts.footer')