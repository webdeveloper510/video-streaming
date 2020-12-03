
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Playlist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
      	
      <h3>Choose Playlist</h3>
      <div class="Playlist1">
     
      	<h5 class="select_list"> </h5> <a href="" class="aedit">edit</a><br>
      
      	<a href="#" class="show_list">Create New Playlist +</a>
      	<span class="create_playlistt" style="display: none">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>
      </div>
      <div class="container">
         <h3>Items </h3>
         <div class="itemsel">
          @if($cartVideo)
            @foreach($cartVideo as $index=>$value)
         <div class="row ">
          <div class="col"><h5>{{$value->title}}</h5></div>
          <div class="col"><span>{{$value->price}}PAZ</span>
          </div>
    <div class="col text-right"><button type="button" class="removeSession btn btn-light" id="{{$value->id}}" data-dismiss="choose1" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      </div>
      @endforeach
      @endif
    </div>
  </div>
      <div class="text-center mt-4">
           <h3>Prize : 600PAZ</h3>
      <button type="button" class=" addNow">ADD NOW</button>
  </div>
      </div>
      
    </div>
  </div>