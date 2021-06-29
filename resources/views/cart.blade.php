@include('layouts.header')
 

<style type="text/css">
  
.total {
    width: 40%;
    float: right;
    margin-top: 30px;
}
input.form-control.mr-sm-2 {
    width: 66%;
    float: left;
    background: transparent;
}
button.btn:hover {
    background: green;
}
button.btn-primary:hover {
    background: blue;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: inherit;
    border-top: 1px solid #dee2e6;
    text-align: center;
}
</style>
  </head>
  <body>
    <div class="container pt-5 mt-4">
      <div class="mt-5 pb-4">
       <h1>Cart</h1>

    <table class="table table-bordered ">
        <thead>
          <tr>
            <th scope="col">P.No.</th>
            <th scope="col">Video</th>
            <th scope="col">Price</th>
            <th scope="col"> Quantity</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
      <tbody >
        @foreach($cart as $index=>$carts)
        <tr>
           <th scope="row">{{$index+1}}</th>
           <td class="text-center"><video width="200px" poster="{{url('storage/app/public/uploads/'.$carts->audio_pic) }}" height="100px" controls="">
             <source src="{{url('storage/app/public/video/'.$carts->media)}}" type="">
           </video></td>
           <td>{{$carts->price}}</td>
           <td>1</td>
           <td>{{$carts->price}}</td>
        </tr>
          @endforeach
        </tbody>

   </table>
     <div class="row">
     <div class="col-md-6">
      
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Coupen Code" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Apply</button>
  </form>
</div>
    <div class="col-md-6 text-right">
      <button class="btn btn-success " type="button">Update Cart</button>

     </div>
     </div>

    <div class="row">
      <div class="col-md-12">
        <div class="total">
        <h2>Cart Total</h2>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Subtotal</th>
      <td scope="col">$100.00</td>
   
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Total</th>
      <td>${{$totalPrice[0]->total_price}}</td>
        </tr>
   
  </tbody>
</table>
        <button class="btn btn-primary px-4" type="button">Proceed To Checkout</button>



      </div>

    </div>
     </div>



    </div>
     </div>
  
  @include('layouts.footer')