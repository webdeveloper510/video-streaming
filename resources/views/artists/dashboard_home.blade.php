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
           <h4 class="text-center">Collection Items  Online</h4>
        </div>     
    </div>
</div>

<div class="row">
    <div class="col-md-4">
    <div class="card" style="width: 18rem;">
             <h5 class="card-title text-left pt-3 pl-3">Your Info:</h5>
             <hr>
             <div class="card-body pb-1">
             {{Form::label('First Name', 'First Name')}} 
                {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter name'])}}
                {{Form::label('Country', 'Country')}} 
                {{Form::text('title', '',['class'=>'form-control','placeholder'=>'Enter Country'])}}
                {{Form::label('Date of Birth', 'Date of Birth')}} 
                <input type="date" class="form-control" />
                <h5 class="card-title">Email : example@gmail.com</h5>
                <div class="text-right">
                <button class="btn btn-light btn-sm" type="button">Edit</button>
              </div>
              </div>
              <div class="card-body pb-1 " style="display:none;">
                <h5 class="card-title">First Name : artist Name </h5><br>
                <h5 class="card-title">Country : USA </h5><br>
                <h5 class="card-title"> Date of Birth : 05.02.1994 </h5><br>
               
                <h5 class="card-title">Email : example@gmail.com</h5>
                <div class="text-right">
                <button class="btn btn-light btn-sm" type="button">Edit</button>
              </div>
            </div>

            </div>
             <!-- <div class="card" style="width: 18rem;">
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
         <div class="card" style="width: 18rem;">
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
         <div class="card" style="width: 18rem;">
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