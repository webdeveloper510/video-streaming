<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    	.table td, .table th {
    
    border-top: 0px solid #dee2e6;
}
.success_page {
    box-shadow: 1px -11px 36px 9px #c1c1c1;
    padding: 22px;
    margin-top: 10%;
}
.print.text-center button {
    width: 39%;
}
    </style>
  </head>
  <body>
    <div class="container">
 <div class="row">
<div class="col"></div>
<div class="col-md-4 success_page">

    <div class="sucesss text-center">
      <h2 style="color:green;">Payment Successfull!</h2>
      <i class="fa fa-check" style="color:green;font-size:40px;"></i>
      <hr style="width:70%" >
        </div>
        	<div class="container">
      {{
        Session::get('test')
    }}
      <table class="table">
    
         <tr>
         	<th>Name</th>
         	<td>Rahul</td>
         </tr>
         <tr>
         	<th>Email</th>
         	<td>example@gmail.net</td>
         </tr>
         <tr>
         	<th>Amount Paid</th>
         	<td>$400.00</td>
         </tr>
         <tr>
         	<th>Transaction Id.</th>
         	<td>4567892549</td>
         </tr>
         
         
       
      </table>
  </div>
      <div class="print text-center">
        <button class="btn btn-primary">Print</button>
         	<button class="btn btn-primary">Close</button>
      </div>

   
</div>
<div class="col"></div>
 </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

   
  </body>
</html>