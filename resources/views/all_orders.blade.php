@include('layouts.header')
<link rel="stylesheet" href="{{asset('design/header.css')}}" />
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
   /** --------------------------------------------------------- Data Table Css---------------------------------------------- */
   td.details-control {
   background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
   cursor: pointer;
   }
   tr.shown td.details-control {
   background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
   }
</style>
</head>
<body>
   <div class="container">
      <div class="tab">
         <button class="tablinks active" onclick="openCity(event, 'Paris')">Orders</button>
      </div>
      <div id="Paris" class="tabcontent mb-5" style="display:block">
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-success text-center" style="display: none" id="messge" role="alert">
               </div>
               <h2 class="text-center"></h2>
               <div class="dropreq text-right">
                  <select class="custom-select col-md-4" id="select_option" onchange="filterproject1(this)">
                     <option value>All</option>
                     <option value="new" {{($box) == 'new' ? 'selected' : '' }}>New</option>
                     <option value="process" {{($box) == 'process' ? 'selected' : '' }}>In Process</option>
                     <option value="due" {{($box) == 'due' ? 'selected' : '' }}>Due</option>
                     <option value="Expired">Expired</option>
                     <option value="cancelled">Cancelled</option>
                  </select>
               </div>
               <div class="table-responsive">
                  <button id="btn-show-all-children1" type="button">Expand All</button>
                  <button id="btn-hide-all-children1" type="button">Collapse All</button>
                  <hr>
                  <table id="example2" class="display filteration_table" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th></th>
                           <th>Title</th>
                           <th >Media</th>
                           <th>Duration</th>
                           <th>Delivery Time</th>
                           <th>Artist Name</th>
                           <th> Status</th>
                           <th>Date of order</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th></th>
                           <th>Title</th>
                           <th>Media</th>
                           <th>Duration</th>
                           <th>Delivery Time</th>
                           <th>Artist Name</th>
                           <th> Status</th>
                           <th>Date of order</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="download" tabindex="-1" aria-labelledby="downloadLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="downloadLabel"> Title</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body text-center">
               <p>The media has not been delivered yet,
                  please remain patient. Thank You!
               </p>
               <button type="button" class="btn btn-outline-primary">Okay</button>
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
   <!-- Button trigger modal -->
   <!-- Modal -->
   <div class="modal fade" id="Cancelled" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Cancelled</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body text-center" id="model_text">
               <p>
                  We have found this Content to be categorized as harmful / misleading / underage.
                  <cr>
                  If we learn that such Content was actively pursued, your account will be terminated.<br>
                  If you believe you are being treated wrong, please reach out to us at <a href="mailto: customer@pornartistzone.com">customer@pornartistzone.com  
               </p>
            </div>
            <button type="button" class="btn btn-success" data-dismiss="modal">ok</button>
         </div>
      </div>
   </div>
  
</body>
<style type="text/css">
   button.btn.btn-warning.text-white.mr-3.mt-2 {
   padding-top: 3px !important;
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
@include('layouts.footer')
</html>