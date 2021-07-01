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
  @foreach($earnings as $earn)
      @if($earn->pay_from=='multiple' || $earn->pay_from=='single')
          <?php 
            $type = explode(',', $earn->mediaType);
            //print_r($type);
          ?>
    <tr>
      <td scope="row">{{$earn->nickname}}</td>
       <td>{{is_array($type) ? 'collection-'.$type[0].','.'collection-'.$type[1] : $type}}</td>
      <td>{{$earn->mediaTitle}}</td>
      <td style="color:gold">{{$earn->tokens}}<b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></td>
      <td>{{date('m/ d/ Y  (H:i)', strtotime($earn->created_at))}}</td>
    </tr>
    @endif
    @if($earn->pay_from=='order')
    <tr>
      <td scope="row">{{$earn->nickname}}</td>
       <td >{{'order-'.$earn->types}}</td>
      <td>{{$earn->Offertitles}}</td>
      <td style="color:gold;">{{$earn->tokens}} <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ </b></td>
      <td>{{date('m/ d/ Y  (H:i)', strtotime($earn->created_at))}}</td>
    </tr>
    @endif
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