
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
      <th scope="col">Action</th>
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
      <td><button class="edit" onclick="getofferid('{{$val->id}}','{{$val->description}}','{{$val->userid}}')" data-toggle="modal" data-target="#editdescription">Edit Description</button></td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

<div class="modal fade" id="editdescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!!Form::open(['action' => 'artist@editOffer', 'method' => 'post'])!!}
          {{Form::token()}}
          {{Form::label('Your Description', 'Your Description')}} 
                {{Form::textarea('Description',null,['class'=>'form-control description','rows' => 4, 'cols' => 40])}}

       <input type="hidden" name="reqId" value="" id="offerid">

       <input type="hidden" name="user_id" value="" id="userid">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{ Form::submit('Update!',['class'=>'btn btn-primary']) }}
      </div>
         {{ Form::close() }}
    </div>
  </div>
</div>


 @include('artists.dashboard_footer')