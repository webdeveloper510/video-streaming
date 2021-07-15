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
  <div class="row my-4">
     <div class="col-md-6">
     <div class="input-group mb-3">
  <input type="search" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Search</button>
  </div>
</div>
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
      <th scope="col">C & R Forms</th>
      <th scope="col">Status </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Artistname</td>
      <td>filename.png</td>
      <td>filename.png</td>
      <td>25-06-2021</td>
      <td><a data-toggle="modal" data-target="#Consent">filename.png</a></td>
      <td>25-06-2021</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Artistname</td>
      <td>filename.png</td>
      <td>filename.png</td>
      <td>25-06-2021</td>
      <td><a data-toggle="modal" data-target="#Consent">filename.png</a></td>
      <td>25-06-2021</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Artistname</td>
      <td>filename.png</td>
      <td>filename.png</td>
      <td>25-06-2021</td>
      <td><a data-toggle="modal" data-target="#Consent">filename.png</a></td>
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
     <button type="button" class="btn btn-primary">
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
      <th scope="col">Status </th>
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
  <div class="bankpayout">
  <div class="text-center">
  <h5 class="modal-title my-4" id="BankLabel">Bank Account Payouts</h5>
  </div>
  <form>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Account Nr/IBAN:</label>
      <input type="text" readonly  class="form-control" id="validationDefault01"  value="Mark" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Bank:</label>
      <input type="text" readonly  class="form-control" id="validationDefault02"  value="Otto" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Name/Company:</label>
      <input type="text" readonly  class="form-control" id="validationDefault03"value="Mark"  required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault04">Bank Address:</label>
      <input type="text" readonly  class="form-control" id="validationDefault04" value="Mark"  required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Address:</label>
      <input type="text" readonly  class="form-control" id="validationDefault03" value="Mark"  required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault04">BIC:</label>
      <input type="text" readonly  class="form-control" id="validationDefault04" value="Mark"  required>
    </div>
    
  </div>
  <div class="text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Canecl</button>
        <button type="submit" class="btn btn-primary">Payout Initiaed </button>
  </div>
 
</form>

  </div>
    </div>
    <hr class="my-4">
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
     <button type="button" class="btn btn-primary">
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
      <th scope="col">Status </th>
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
  <div class="paxumpayout my-4">
  <div class="text-center">
  <h5 class="modal-title mb-4" id="BankLabel">paxum Account Payouts</h5>
  </div>
  <form>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Email Address:</label>
      <input type="email" class="form-control" id="validationDefault01"  value="Mark" required>
      
    </div>
    <div class="col-md-6 mb-3">
    <label for="validationDefault02">Reference:</label>
      <input type="text" class="form-control" id="validationDefault02"  value="Otto" required>
     
 
    </div>
    
  </div>
  <div class="text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Canecl</button>
        <button type="submit" class="btn btn-primary">Payout Initiaed </button>
  </div>
</form>
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
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      </div>
    </div>
  </div>
</div>




<!-- Paxum Modal -->
<div class="modal fade" id="paxum" tabindex="-1" role="dialog" aria-labelledby="paxumLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paxumLabel">Paxum Account Payouts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      </div>
     
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="Consent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Consent and Release Form Co-Performers</h5> 
        <div class="text-right">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
      </div>
      
      <div class="modal-body text-center">
      <button class="btn btn-success float-right" type="button">Download</button>
      <div class="table12">
                           <div class="table table-responsive">
                              <table class="table text-left table-borderless">
                                 <thead class="thead-light">
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Nickname</th>
                                       <th scope="col">Date Of Consent</th>
                                    </tr>
                                 </thead>
                                 <tbody>                                    
                                    <tr>
                                       <th class="d-flex" scope="row">1</th>
                                       <td><input type="text" class="form-control"><br>
                                       <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile01">
                                          <label class="custom-file-label form-control" for="inputGroupFile01">Choose file</label>
                                       </div>
                                       </td>
                                       <td class="d-flex"> 
                                         <input type="date" class="form-control">
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <form>
                           <div class="linksonit mb-3">
                              <div class="amountmedia row">
                                 <div class="col-md-12 text-center">
                                    <button class="btn btn-outline-primary btn-sm" type="button" onclick="appendDiv(this)">+</button>
                                 </div>
                              </div>
                           </div>
                           <div class="text-right ">
                              {{ Form::submit('Save!',['class'=>'btn btn-primary btn-sm mt-2','id'=>'save','disabled']) }}
                           </div>
                           {{ Form::close() }}
                        </div>
                     </div>
                     <div class="alert alert-success" id="success" style="display:none"></div>
                     <div class="text-right">
                     </div>
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
   li.nav-item a{
    color: white !important;
   }
   td{
     border:none;
   }
   td a{
     cursor: pointer;
   }
</style>


@include('layouts.footer')