<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo e(asset('design/datatables.min.css')); ?>" />   
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
  <!-- <button class="tablinks" onclick="openCity(event, 'London')">Projects</button> -->
  <button class="tablinks active" onclick="openCity(event, 'Paris')">Orders</button>
 
</div>


<div id="London" class="tabcontent" >
<div class="row">
            <div class="col-md-12">
                   <div class="alert alert-success text-center" style="display: none" id="messge" role="alert">
              </div>
              <h2 class="text-center "></h2>
                <button id="btn-show-all-children" type="button">Expand All</button>
<button id="btn-hide-all-children" type="button">Collapse All</button>
<hr>

<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
                         <th></th>
                         <th>Title</th>
                         <th >Media</th>
                          <th>Duration</th>
                        <th>P/O</th>
                        <th >Customer Name</th>
                        <th > Status</th>              
                        <th> Delievery Time</th>   
        </tr>
    </thead>
  
    <tfoot>
        <tr>
              <th></th>
                       <th>Title</th>
               
                        <th >Media</th>
                        <th>Duration</th>
                        <th>P/O</th>
                        <th >Customer Name</th>
                        <th > Status</th>              
                        <th> Delievery Time</th>   
        </tr>
    </tfoot>
</table>
            </div>
        </div>

    </div>
</div>

<div id="Paris" class="tabcontent" style="display:block">
<div class="row">
            <div class="col-md-12">
                   <div class="alert alert-success text-center" style="display: none" id="messge" role="alert">
              </div>
              <h2 class="text-center"></h2>
                <div class="dropreq text-right">
                <select class="custom-select col-md-4" id="select_option" onchange="filterproject(this)">
                    <option value>All</option>
                    <option value="new" <?php echo e(($box) == 'new' ? 'selected' : ''); ?>>New</option>
                    <option value="process" <?php echo e(($box) == 'process' ? 'selected' : ''); ?>>In Process</option>
                    <option value="due" <?php echo e(($box) == 'due' ? 'selected' : ''); ?>>Due</option>
                    <option value="Expired">Expired</option>
                    <option value="Cancelled">Cancelled</option>
                  </select>
                </div>
                <div class="table-responsive">
                <button id="btn-show-all-children1" type="button">Expand All</button>
                <button id="btn-hide-all-children1" type="button">Collapse All</button>
<hr>
<table id="example1" class="display filteration_table" cellspacing="0" width="100%">
    <thead>
        <tr>
                       <th></th>
                       <th>Title</th>
                        <th >Media</th>
                        <th>Duration</th>
                       
                        <th >Customer Name</th>
                        <th > Status</th>              
                        <th> Delivery Before</th>   
        </tr>
    </thead>
  
    <tfoot>
        <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Media</th>
                        <th>Duration</th>
                 
                        <th>Customer Name</th>
                        <th> Status</th>              
                        <th>Delivery Before</th>   
        </tr>
    </tfoot>
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
         <?php echo Form::open(['action' => 'artist@addDescription', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>

          <?php echo e(Form::label('Your Description', 'Your Description')); ?> 
                <?php echo e(Form::textarea('Description',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40, 'required'])); ?>


       <input type="hidden" name="reqId" value="" id="reqid">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php echo e(Form::submit('Update!',['class'=>'btn btn-primary'])); ?>

      </div>
         <?php echo e(Form::close()); ?>

    </div>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="ordercancel" tabindex="-1" role="dialog" aria-labelledby="ordercancelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
      <div class="modal-body">
         <div class="corder">
         <?php echo Form::open(['id'=>'cancelOrder', 'method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?>      
              <div class="form-group">
            <label for="exampleInputEmail1">Chosse Reason :</label>
            <select class="form-control" name="reason"id="reason" >
            <option selected value="">Choose...</option>
              <option value="I do not offer this kind of additional requests.">I do not offer this kind of additional requests.</option>
              <option value="Sorry, I receive to many orders right now">Sorry, I receive to many orders right now.</option>
              <option value="I am not available right now. (Block this customer)">I am not available right now.</option>
            </select>
          </div>
        <input type="hidden" name="offerid" value="" class="offer_id"/>
          <div class="form-group">
          <label> Or write a specific Message for your Customer :</label>
            <textarea class="form-control" id="reason_cancel" name="reason_cancel"  id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group text-center">
         <label> Do you really want to cancel this Order ? </label>
            <div class="row">
                 <div class="col">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                 </div>
                 <div class="col">
                 <button type="submit" name="btn" class="btn btn-success">Yes</button>
                 </div>

                 

              </div>
              <?php echo e(Form::close()); ?>

         </div>
      </div>
    
    </div>
  </div>
</div>


  </body>
  <style type="text/css">
    .leveltext.text-white {
    display: none;
    position: absolute;
    top: 47px !important;
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
  <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/request.blade.php ENDPATH**/ ?>