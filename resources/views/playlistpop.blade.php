
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
        @foreach($listname as $val)
      	<h5 class="select_list">{{$val->listname}} </h5><br>
        @endforeach
      

      </div>

      <a href="#" class="show_list">Create New Playlist +</a>
      <span class="create_playlistt" style="display: none">
      		<input type="text" class="list" placeholder="Play List Name" name="listname" value=""/>
      		<button class="create_list btn btn-primary" type="button">Create</button>
      	</span>
      <!--div class="container">
         <h3>Items </h3>
         <div class="itemsel">
                @if($cartVideo)
                  @foreach($cartVideo as $index=>$value)
            <div class="row py-2">
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
  </div-->
      <div class="text-center mt-4">
           <h3>Total Price : <span class="total">{{$total_sum}}</span>PAZ</h3>
           <input type="hidden" id="art_id" value="{{$cartVideo ? $cartVideo[0]->contentProviderid : ''}}"/>
      <button type="button" class="multipleAdd btn btn-primary">ADD NOW</button>
      <div class="alert alert-success" id="success_message" style="display: none" role="alert">
          A simple success alert—check it out!
        </div>
  </div>
      </div>
      
    </div>
  </div>