@include('artists.dashboard')

<div class="earningpage">
<div class="container-fluid">
<div class="earningtext">
<div class="card" >
  <h2 class="ml-5 mt-4">Earnings:</h2>
  <div class="card-body">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"> Name</th>
      <th scope="col">Type</th>
      <th scope="col">Title</th>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td scope="row">Customer Name</td>
       <td >Video</td>
      <td>Titlexyz</td>
      <td>500PAZ</td>
      <td>12.04.2021(21:23)</td>
    </tr>
    <tr>
    <td scope="row">Customer Name</td>
    <td>Video</td>
      <td>Titlexyz</td>
      <td>500PAZ</td>
      <td>12.04.2021(21:23)</td>
    </tr>
    <tr>
      <td colspan="5" class="text-center">No data available</td>
    </tr>
    
  </tbody>
</table>
  </div>
</div>
</div>
</div>

</div>






<style>

.earningtext {
    margin-top: 12%;
}
.table thead tr th {
    font-weight: bold;
}
</style>




@include('artists.dashboard_footer')