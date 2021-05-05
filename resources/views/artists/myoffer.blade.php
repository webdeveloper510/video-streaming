
@include('artists.dashboard')


<style type="text/css">
	table.table {
    margin-top: 10%;
}
</style>

            @if(session('success'))
        <div class="alert alert-success" id="success">
        {{session('success')}}
        </div>
        @endif
<div class="container">
<table class="table ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Keyword</th>
      <th scope="col">Category Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">User Description</th>
    <!--   <th scope="col">Action</th> -->
    </tr>
  </thead>
  <tbody>
  	@foreach($offer as $index=>$val)
    <tr>
      <th scope="row">{{$index+1}}</th>
      <td>{{$val->title}}</td>
      <td>{{$val->keyword}}</td>
      <td>{{$val->category}}</td>
      <td>{{$val->price}}</td>
      <td>{{$val->description}}</td>
      <td>{{$val->userdescription}}</td>
  
    </tr>
    @endforeach
  </tbody>
</table>

</div>
 <style>
.leveltext.text-white {
    display: none;

    position: absolute;
    top: 47px !important;
}

</style>

 @include('artists.dashboard_footer')