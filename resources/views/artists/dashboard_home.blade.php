@include('artists.dashboard')

<section class="background1">
<div class="container">

<div class="row mt-5 pt-5 text-center">
    <div class="col-md-3">
    <h3 class="text-center">Due</h3>
    <div class="columesdashboard">
    <div class="row">
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

    </div>

            </div>   
    </div>
         
    <div class="col-md-3">
    <h3 class="text-center">In Process</h3>
    <div class="columesdashboard1">
    <div class="row">
      <div class="col-6">
     
                  <h1>{{$process_total}}</h1>
                  <h4>Order </h4>
            </div> 
   
      <div class="col-6">
     
                  <h1>{{$process_total}}</h1>
                  <h4>Project </h4>
            </div> 

    </div>

            </div>   
    </div>
    <div class="col-md-3">
    <h3 class="text-center">Project</h3>
    <div class="columesdashboard2">
    <div class="row">
      <div class="col-6">
     
          <h1>{{$count_new_projects}}</h1>
                  <h4>New </h4>
            </div> 
   
      <div class="col-6">
     
            <h1>{{$count_new_projects}}</h1>
                  <h4>Order </h4>
            </div> 

    </div>

            </div>   
    </div>
   
    <div class="col-md-3">
    <h3 class="text-center">Collection Items Online</h3>
    <div class="columesdashboard3">
           <h1>345</h1>
           
        </div>     
    </div>
</div>

<div class="row">
    <div class="col-md-4">
             <div class="card" style="width: 18rem;">
             <h5 class="card-title text-left pt-3 pl-3">New Messages:</h5>
             <hr>
              <div class="card-body">
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
              </div>
            </div>
    </div>
    <div class="col-md-4">
         <div class="card" style="width: 18rem;">
             <h5 class="card-title text-left pt-3 pl-3">Earnings:</h5>
             <hr>
              <div class="card-body text-center">
                <h3 class="card-title">Today:</h3>
                <h5>{{$today_paz ? $today_paz[0]->tokens:0}} PAZ</h5>
                <h3 class="card-title">This Month:</h3>
                <h5>{{$month_paz[0]->total_token}} PAZ</h5>
                <h3 class="card-title">This Year:</h3>
                <h5>{{$year_PAZ[0]->total_token}} PAZ</h5>
              </div>
            </div>
    </div>
    <!-- <div class="col-md-4">
         <div class="card" style="width: 18rem;">
             <h5 class="card-title text-left pt-3 pl-3">Additional Requests:</h5>
             <hr>
              <div class="card-body">
                <h5>customername  <button type="button" class="btn btn-primary ml-4">Open</button></h5>

                <h5>customername  <button type="button" class="btn btn-primary ml-4">Open</button></h5>
                
                <h5>customername  <button type="button" class="btn btn-primary ml-4">Open</button></h5>
                
              </div>
            </div>
    </div> -->
</div>
</div>
</section>
<style>
.columesdashboard {
    border: 3px solid lightblue;
    padding: 30px 18px;
    background: lightblue;
    color: white;
}
.columesdashboard1 {
    border: 3px solid #be7f5a;
    padding: 30px 18px;
    background: #be7f5a;
    color: white;
}
.columesdashboard2 {
    border: 3px solid #e84c3d;
    padding: 30px 18px;
    background: #e84c3d;
    color: white;
}
.columesdashboard3 {
    border: 3px solid #1abc9c;
    padding: 30px 18px;
    background: #1abc9c;
    color: white;
}
</style>

@include('artists.dashboard_footer')