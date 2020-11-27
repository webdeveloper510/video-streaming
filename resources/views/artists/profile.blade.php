@include('artists.dashboard')
      <section class="background1 pt-5">
   
    <div class="row">
      <div class="col"></div>
      <div class="col-md-5 mt-5">
        <div class="overlay1 mt-5 ">
           <div class="text-center p-3">
    
   <img width="150px"; height="100px" src="{{url('storage/app/public/uploads/1602525455_etsy inspo.jpg')}}">

 </div>
     <table class="text-white table">
      <thead>
  
          </thead>
          <tbody>
          <tr class="text-white">
            <th> Nick Name:-</th>
            <td>{{ $contentUser->nickname }}</td>
          </tr>
          <tr class="text-white">
            <th>Email Id:-</th>
            <td>{{ $contentUser->email }}</td>
          </tr>
          <tr class="text-white">
            <th>Model:-</th>
            <td></td>
          </tr>
      </tbody>

     </table>

   </div>
 </div>
<div class="col"></div>

   </div>


  </section>
      <!-- End Navbar -->

 @include('artists.dashboard_footer')
