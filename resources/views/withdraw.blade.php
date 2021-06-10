@include('artists.dashboard')
<link rel="stylesheet" href="{{asset('design/withdraw.css')}}" />
<section class="background1">
         

        <div class="row mt-5 ">
          <div class="col"></div>
          <div class="col-lg-10 mt-4">
          <div class="card">
            <div class="card-header text-center">
               <h3>Payout to your Account </h3>
            </div>
            <div class="card-body">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Period</th>
                    <th scope="col">Method</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    <div class="overlay1 text-white">
   <div class="slider_tittle text-center pb-4">
   <div class="float-right mr-3">
   <a style="cursor: pointer;" data-toggle="modal" data-target="#payment"><i class="material-icons">my_location</i></a>
   </div>
      <h3 class="tittle text-center">Withdraw Money <span class="iconss"> ? 
      <div class="data">
      @if($levelData)
      @foreach($level_system as $key=>$val) 
          @if($val['level']==$levelData[0]->level_name)
         <h3> <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ </b> Service Fee :20%</h3>
         <h3> {{$val['level']}} <small>(you save)</small>: {{$val['fee']}}%</h3>
         <hr>
         <h3>Current Fee : <span>{{20-$val['fee']}}%</span></h3>
        @endif
         @endforeach
         @else
           <h3> <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ </b> Service Fee :20%</h3>
         <h3> Lvl0 <small>(you save)</small>: 0%</h3>
         <hr>
         <h3>Current Fee : <span>{{20-0}}%</span></h3>
         @endif                                      
      </div>
  
       </span>
      </h3>
         
   </div> 
     <div class="row">
          <div class="col-md-12">
       <div class="out_withdraw">
           <div class="row">
          <div class="col-md-4">
    
           <div class="amount">Enter <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b> Amount <br>
              <input type="number"  min="0" class="form-control" id="calculate_tokens" placeholder="PAZ Amount">
         </div>
         <input type="hidden" id="fees" value="{{$levelData ? $levelData[0]->fees : 0}}"/>
         <strong class="show_fees" style="color:black"></strong>
        </div>
        <div class="col-md-4">
           <div>Amount 
         <span>($)</span><input type="text" class="form-control" id="real_amount" placeholder="Amount">
         </div> 
        </div>
        <div class="col-md-4 mt-3 text-center">
           <div class="money"><button class="btn btn-success" id="withdrawmoney">Withdraw</button></div> </div></div>
           <hr>
           <div class="row">
            <div class="col-md-8">
       

         <div class="text_one">
         <h6>Invite other passionate Artists to grow their business on PAZ and you both get rewarded with $100 USD! <span class="firsttext">? 
           <div class="firsttextbody">
            <p>The pay-out occurs when the invited Artist achieves Level 3 (400Subscribers) and a total income of +50 000 PAZ</p>
           </div>
         </span>
         </h6>
       <br>
       
         <h6>Get 10% of our revenue on every new customer you have invited as passive income ! 
         <span class="secondtext">?  <div class="secondtextbody">
            <p>Every time we collect our service fee on the customers token purchase you get 10% of it passively</p>
           </div> 
          
         </span>                 
         </h6>
         </div>
       </div>
       <div class="col-md-4 mt-4 text-center">
          <div class="money"><button class="btn btn-primary" onclick="copy('{{url('register/'.$artistid)}}')" id="myBtn">Copy Link</button></div>
        </div>
       </div>
      </div>
     </div> 
     </div>
    </div> 

    <div class=" invitedbox" style="{{$artistPassive[0]->reffered_by==0 ? 'display:none' : 'display:block'}}">
    <div class="card" >
        <div class="text-center">
       <h3>You've been invited from {{$artistPassive[0]->nickname}} </h3>
       <h4>Get your $100 USD with :</h4>
            </div>
  <div class="card-body">
    
        <table class="table table-bordered text-center">
  <thead>
    <tr>
      
      <th scope="col">lvl3</th>
      <th scope="col"><span style="color:gold;font-size: 16px;">50k <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b> </span> earned </th>
      <th scope="col">Bonus</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    
      <td>not yet</td>
      <td>not yet</td>
      <td>-</td>
    </tr>
   
  </tbody>
</table>
  </div>
</div>
    
        </div>





    <div class=" invitedbox">
    <div class="card" >
        <div class="text-center">
       <h3>Total Bonus  :  <b style="color:gray;"> $ 0{{$passive_income[0]->passive}} USD </b></h3>
            </div>
  <div class="card-body">
    <h5 class="card-title text-center">Customer Invitations
                <br> 
        passive revenue Stream:  <b style="color:gray;"> $ 0{{$passive_income[0]->passive}} USD </b></h5>
        <table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">Artists invited</th>
      <th scope="col">lvl3</th>
      <th scope="col"><span style="color:gold;font-size: 16px;">50k <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></span> earned </th>
      <th scope="col">Bonus</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">-</th>
      <td>-</td>
      <td>-</td>
      <td>-</td>
    </tr>
   
  </tbody>
</table>
  </div>
</div>
    
        </div>
  </div>
  <div class="col"></div>
   </div>
</section>  
      
<!-- Modal -->
<div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">


      <form>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-6 col-form-label">Paxum Account</label>
              <div class="col-sm-6">
                <button class="btn btn-outline-primary"data-toggle="modal" data-target="#panxum" type="button">Enter payout <br> Information</button>
              </div>
            </div>
          </form>
          <p class="text-center my-3">OR</p>
          <form>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-6 col-form-label">Bank Account</label>
              <div class="col-sm-6">
                <button class="btn btn-outline-primary"data-toggle="modal" data-target="#bank" type="button">Enter payout <br> Information</button>
              </div>
            </div>
          </form>
               <button class="btn btn-primary" type="button">Save</button>
      </div>
     
    </div>
  </div>
</div>


       <!-- Paxun Account popup -->

       

        <!-- Modal -->
        <div class="modal fade " id="panxum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Paxum Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body py-5">
              <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Reference</label>
                    <input type="text" class="form-control" placeholder="Optional">
                  </div>
                  <div class="text-center my-3">
                  <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
           
            </div>
          </div>
        </div>


<!-- Bank Account popup -->

            

              <!-- Modal -->
              <div class="modal fade" id="bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bank Account</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label >Accout no. or IBAN:</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Your Name/Company:</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Your Address</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Bank Name </label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>
                      <div class="form-group">
                        <label >Bank address</label>
                        <input type="text" class="form-control" placeholder="Enter ">
                      </div>

                      <div class="form-group">
                        <label >BIC</label>
                        <input type="text" class="form-control" >
                      </div>
                    
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                    
                  </div>
                </div>
              </div>

      <!-- End Navbar -->
     <style>
  .background1{
    height:unset !important;
  }
  .overlay1 {
    margin-top: 7% !important;
}

 </style>

 @include('artists.dashboard_footer')


