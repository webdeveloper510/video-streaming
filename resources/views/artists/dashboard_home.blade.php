@include('artists.dashboard')

<section class="background1">
<div class="container">

<div class="row mt-5 pt-5 text-center">
    <div class="col-md-3">
    <!-- <h3 class="text-center">Due</h3> -->
    <div class="columesdashboard">
    <?php 
            $_GLOBEL['count'] =0;
          ?>
          @foreach($count_due_project as $data)
              @if(date('Y-m-d')== $data->dates)
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              @endif
          @endforeach
          
            <h1>{{$_GLOBEL['count']}}</h1>
                  <h4>Order  Due</h4>
    <!-- <div class="row">
      <div class="col-6">
      <?php 
            $_GLOBEL['count'] =0;
          ?>
          @foreach($count_due_project as $data)
              @if(date('Y-m-d')== $data->dates)
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              @endif
          @endforeach
          
            <h1>{{$_GLOBEL['count']}}</h1>
                  <h4>Order </h4>
            </div> 
   
      <div class="col-6">
      <?php 
            $_GLOBEL['count'] =0;
          ?>
          @foreach($count_due_project as $data)
              @if(date('Y-m-d')== $data->dates)
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              @endif
          @endforeach
          
            <h1>{{$_GLOBEL['count']}}</h1>
                  <h4>Project </h4>
            </div> 

    </div> -->

            </div>   
    </div>
         
    <div class="col-md-3">
    <!-- <h3 class="text-center">In Process</h3> -->
    <div class="columesdashboard1">
    <h1>{{$process_total}}</h1>
                  <h4>Order In Process </h4>
    <!-- <div class="row">
      <div class="col-6">
     
                  <h1>{{$process_total}}</h1>
                  <h4>Order </h4>
            </div> 
   
      <div class="col-6">
     
                  <h1>{{$process_total}}</h1>
                  <h4>Project </h4>
            </div> 

    </div> -->

            </div>   
    </div>
    <div class="col-md-3">
    <!-- <h3 class="text-center">Project</h3> -->
    <div class="columesdashboard2">
    <h1>{{$count_new_projects}}</h1>
    <h4 class="text-center">New Order  </h4>
    <!-- <div class="row">
      <div class="col-6">
     
          <h1>{{$count_new_projects}}</h1>
                  <h4>New </h4>
            </div> 
   
      <div class="col-6">
     
            <h1>{{$count_new_projects}}</h1>
                  <h4>Order </h4>
            </div> 

    </div> -->

            </div>   
    </div>
   
    <div class="col-md-3">
   
    <div class="columesdashboard3">
           <h1>345</h1>
           <h4 class="text-center">Collection Items  </h4>
        </div>     
    </div>
</div>

<div class="row">
<div class="col-md-12">
         <div class="card">
             <div class="week">
             <h5 class="card-title text-left pt-3 pl-3">Choose the timeframe available to get promoted
              on the landingpage and on the customer homepage for free</h5>
              <hr>
          <div class="row">
             <div class="col-4">
              <button class="btn btn-info" type="button">Week 1+2</button>
              <button class="btn btn-info" type="button">Week 3+4</button>
              <button class="btn btn-info" type="button">Week 5+6</button>
              <button class="btn btn-info" type="button">Week 7+8</button>
            
             </div>
             <div class="col-4">
             <button class="btn btn-info" type="button">Week 9+10</button>
              <button class="btn btn-info" type="button">Week 11+12</button>
              <button class="btn btn-info" type="button">Week 13+14</button>
              <button class="btn btn-info" type="button">Week 15+16</button>
             </div>
             <div class="col-4">
             
              <button class="btn btn-info" type="button">Week 17+18</button>
              <button class="btn btn-info" type="button">Week 19+20</button>
              <button class="btn btn-info" type="button">Week 21+22</button>
              <button class="btn btn-info" type="button">Week 23+24</button>
             </div>
          </div>
          <h5 class="customer1 text-center pt-3 pl-3">--- weeks are counted from the start of customertraffic---</h5>
          <div class="text-right">
          <button class="btn btn-primary" type="button">Submit</button>

          </div>
            </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">Your Info:</h5>
             <hr>
             @if($personal_info[0]->firstname=='')
             <div class="card-body pb-1">
  {!!Form::open(['action' => 'AuthController@personal_info', 'method' => 'post'])!!}
          {{Form::token()}}
             {{Form::label('First Name', 'First Name')}} 
                {{Form::text('firstname', '',['class'=>'form-control','placeholder'=>'Enter name'])}}
                {{Form::label('Country', 'Country')}} 
                {{Form::text('country', '',['class'=>'form-control','placeholder'=>'Enter Country'])}}
                {{Form::label('Date of Birth', 'Date of Birth')}} 
                
                <input type="date" name="dob" class="form-control" />
                <br>
                <h5 class="card-title">Email : example@gmail.com</h5>
                <div class="text-right">
                {{ Form::submit('Update!',['class'=>'btn btn-light btn-sm']) }}
              </div>
              </div>
              @else
              <div class="card-body pb-1 ">
                <h5 class="card-title">First Name : {{$personal_info[0]->firstname}}</h5><br>
                <h5 class="card-title">Country : {{$personal_info[0]->country}} </h5><br>
                <h5 class="card-title"> Date of Birth : {{$personal_info[0]->dob}} </h5><br>
               
                <h5 class="card-title">Email : {{$personal_info[0]->email}}</h5>
                <div class="text-right">
               
              </div>
            </div>
            @endif

            </div>
             <!-- <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">New Messages:</h5>
             <hr>
              <div class="card-body">
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
              </div>
            </div> -->
    </div>
    <div class="col-md-4">
         <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">Earnings:</h5>
             <hr>
              <div class="card-body text-center">
                <h4 class="card-title">Today:</h4>
                <h5>{{$today_paz ? $today_paz[0]->tokens:0}} PAZ</h5>
                <h4 class="card-title">This Month:</h4>
                <h5>{{$month_paz[0]->total_token}} PAZ</h5>
                <h4 class="card-title">This Year:</h4>
                <h5>{{$year_PAZ[0]->total_token}} PAZ</h5>
              </div>
            </div>
    </div>
    <div class="col-md-4">
         <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">Social Media:</h5>
             <hr>
              <div class="card-body text-center">
              <h5 class="card-title">Let us promote you on our social Media Channels</h5><br>
                <div class="linksonit">
                </div>
                <h5 class="card-title"> Add Descriptions that you want us to use:(optional)</h5><br>
                <div class="linksonit">
                </div>
                <h5 class="card-title">Provide us your Social Media Usernames for tagging!(optional)</h5>
                <div class="linksonit">
                </div>
              </div>
            </div>
    </div>
   
</div>
</div>
</section>
<style>
.columesdashboard {
    border: 3px solid #ed1c24;
    padding: 30px 18px;
    background: #ed1c24;
    color: white;
}
.columesdashboard1 {
    border: 3px solid #ff7f27;
    padding: 30px 18px;
    background: #ff7f27;
    color: white;
}
.columesdashboard2 {
    border: 3px solid #22b14c;
    padding: 30px 18px;
    background: #22b14c;
    color: white;
}
.columesdashboard3 {
    border: 3px solid #b97a57;
    padding: 30px 18px;
    background: #b97a57;
    color: white;
}
h5.customer1.text-center.pt-3.pl-3 {
    font-size: 13px;
}
.week {
    padding: 18px;
    text-align: center !important;
}
</style>

@include('artists.dashboard_footer')