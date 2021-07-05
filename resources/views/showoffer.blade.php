
@include('layouts.header')
<div class="show-offer">
<div class="container">
	 @if(session('success'))
        <div class="alert alert-success" id="success">
        {{session('success')}}
        </div>
        @endif   
          @if(session('error'))
        <div class="alert alert-danger" id="error">
        {{session('error')}}
        </div>
        @endif
<div class="row">

  @if($offer)
	@foreach($offer as $val)
	<div class="col-md-4 showoffer1">
    <a href="{{url('artistoffers/'.$val->id)}}">
      <div class="card">
          @if($val->type=='video')
	   <video width="100%" height="240" poster="{{url('storage/app/public/uploads/'.$val->audio_pic) }}" controls class="hoverVideo">
  <source src="{{url('storage/app/public/video/'.$val->media) }}" type="video/mp4">
  Your browser does not support the video tag.
</video>
@else
<img src="{{url('storage/app/public/uploads/'.$val->audio_pic) }}">
<audio  width="100%" height="240" poster="{{url('storage/app/public/uploads/'.$val->audio_pic) }}" controls>
  <source src="{{url('storage/app/public/audio/'.$val->media) }}" type="audio/mp3">
  Your browser does not support the video tag.
</audio>
@endif

	  <div class="carad-body">
	      <h4 class="card-title text-center text-white">{{$val->title}}</h4>
	      <hr>
	     
	      
	      <table class="table table-borderless text-center">
        <tr>
          <th>Category</th>
          <td>{{$val->category}}</td>
        </tr>
        <tr>
          <th>Media</th>
          <td>{{$val->type=='video' ? 'Video/mp4' : 'Audio/mp3'}}</td>
        </tr>
            <tr>
            	<th>Price</th>
            	<td> {{$val->price}}  <span style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</span>/Minute </td>
              </tr>
	      </table>	    
     </div>
   </div>
   </a>
 </div>
 @endforeach
 @endif
</div>

<div class="modal fade" id="addDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Request To Artist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!!Form::open(['action' => 'artist@addUserDescription', 'method' => 'post'])!!}
          {{Form::token()}}
          {{Form::label('Your Description', 'Your Description')}} 
                {{Form::textarea('Description',null,['class'=>'form-control description','rows' => 4, 'cols' => 40])}}

       <input type="hidden" name="reqId" value="" id="reqid">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{ Form::submit('Submit Request!',['class'=>'btn btn-primary']) }}
   {{ Form::close() }}
      </div>
      <div class="modal-footer">
   
      </div>
      
    </div>
  </div>
</div>
</div>
</div>
<style>
 .card {
    margin-top: 15%;
    margin-bottom: 15%;
}
a.btn.btn-primary.add {
    margin-left: 32%;
}
a.btn.btn-primary.add:hover {
 color:white;
 background: blue;
}
table.table.table-borderless tr td, th {
    text-align: center;
}
.col-4 {
    float: left;
    width: 33.333%;
    margin-bottom: 30px;
    display: flex;
}
.show-offer {
    background: black;
    color: white;
}
hr{
  background:white;
}

.card {
    background: black;
    border: 1px solid white;
    color: white;
    padding:13px;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    margin-top: 97px;
}
.showoffer1:hover  .card{
  border:2px solid yellow;
}
	</style>
@include('layouts.footer')