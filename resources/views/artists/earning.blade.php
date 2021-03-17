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
      <th scope="col">Collection Media Title</th>
      <th scope="col">Offer Media Title</th>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
      <th scope="col">Pay From</th>
    </tr>
  </thead>
  <tbody>
  @foreach($earnings as $earn)
    <tr>
      <td scope="row">{{$earn->nickname}}</td>
       <td >{{$earn->mediaTitle}}</td>
      <td>{{$earn->Offertitles}}</td>
      <td>{{$earn->tokens}}PAZ</td>
      <td>{{$earn->created_at}}</td>
      <td>{{$earn->pay_from}}</td>
    </tr>
    @endforeach
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