@include('artists.dashboard')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>

.tab {
    overflow: hidden;
    margin-top: 10%;
    border: 1px solid #7b0000;
    background-color: #7b0000;
    
}
.tab button.active {
    background-color: #ffffff !important;
    color: black !important;
}
.tab button:hover {
    background-color: #ffffff !important;
    color: black !important;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  color: white !important;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}



/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
   

  
  </head>
  <body>
    <div class="container">
    <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')">Projects</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Orders</button>
  
</div>

<div id="London" class="tabcontent">
<div class="row">
            <div class="col-md-12">
                   <div class="alert alert-success text-center" style="display: none" id="messge" role="alert">
              </div>
              <h2 class="text-center ">List Of Requests</h2>
                <div class="dropreq text-right">
                <select class="custom-select col-md-4" onchange="filterproject()">
                    <option selected="">All</option>
                    <option value="New">New</option>
                    <option value="In Process">In Process</option>
                    <option value="Due">Due</option>
                  </select>
                </div>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Media</th>
                        <th scope="col">Duration</th>
                        <th>P/O</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col"> Status</th>              
                        <th scope="col"> Delievery Time</th>              
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($request as $index=>$req)
                       
                      <tr>                       
                        <td>{{$req->title}}</td>
                        <td>{{$req->media}}</td>
                        <td>{{$req->duration}}</td>
                        <td>Projects</td>
                        <td>{{$req->user_name}}</td>
                         <td>{{strtoupper($req->status)}}</td>
                         <td>{{$req->delieveryspeed}}</td>
                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                  </div>
            </div>
        </div>

    </div>
</div>

<div id="Paris" class="tabcontent">
<div class="row">
            <div class="col-md-12">
                   <div class="alert alert-success text-center" style="display: none" id="messge" role="alert">
              </div>
              <h2 class="text-center">List Of Requests</h2>
                <div class="dropreq text-right">
                <select class="custom-select col-md-4">
                    <option selected="">All</option>
                    <option value="1">New</option>
                    <option value="2">In Process</option>
                    <option value="3">Due</option>
                  </select>
                </div>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Media</th>
                        <th scope="col">Duration</th>
                        <th>P/O</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col"> Status</th>              
                        <th scope="col"> Delievery Time</th>              
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($request as $index=>$req)
                       
                      <tr>                       
                        <td>{{$req->title}}</td>
                        <td>{{$req->media}}</td>
                        <td>{{$req->duration}}</td>
                        <td>Projects</td>
                        <td>{{$req->user_name}}</td>
                         <td>{{strtoupper($req->status)}}</td>
                         <td>{{$req->delieveryspeed}}</td>
                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                  </div>
            </div>
        </div>

    </div>
</div>



      
<div class="modal fade" id="descri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!!Form::open(['action' => 'artist@addDescription', 'method' => 'post', 'files'=>true])!!}
          {{Form::token()}}
          {{Form::label('Your Description', 'Your Description')}} 
                {{Form::textarea('Description',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40])}}

       <input type="hidden" name="reqId" value="" id="reqid">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{ Form::submit('Update!',['class'=>'btn btn-primary']) }}
      </div>
         {{ Form::close() }}
    </div>
  </div>
</div>
  </body>
  <style type="text/css">
    
    button.btn.btn-warning.text-white.mr-3.mt-2 {
    height: 36px !important;
    padding-top: 3px !important;
    background-color: #ffbb11 !important;
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
  @include('artists.dashboard_footer');
</html>