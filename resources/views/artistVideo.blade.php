@include('layouts.header') 
<link rel = "stylesheet" href = "{{asset('design/artistVideo.css')}}" /> <div class="inner-page">
    <section>
        <div class="container-fluid">
            <div class="main-cnt-sec">
                <div class="row">
                    <div class="col-md-2">
                        <div class="image area">

                            <img src="{{url('storage/app/public/uploads/'.$vedios[0]->profilepicture)}}"></div>
                        </div>
                        @foreach($vedios as $video)
                        <?php 
			
			$GLOBALS['videoid'] = $video->id ;
			$GLOBALS['type'] = $video->type ;

			$GLOBALS['paz'] = $video->price ;
			$GLOBALS['artistid'] = $video->contentProviderid ;

			?>

                        @if($video->type=='video' || $video->type=='audio')

                        <div class="col-md-5">
                            <div class="content-area">
                                <h3>{{$video->title}}</h3>
                                <a href="{{url('artistDetail/'.$video->contentProviderid)}}">
                                    <p>{{$video->nickname}}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="content-price">
                                <h3 class="paz_price" style="color:gold;">{{$video->price}}<b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="content-cart">

                                <button
                                    type="button"
                                    style="cursor:pointer;"
                                    id="{{$video->id}}"
                                    class="addToCart"
                                    text-data="{{$wishlist > 0 ? 'removed' : 'added'}}"
                                    style="{{$wishlist > 0 ? 'color:blue; background-color:blue' : 'color:red;background-color:red'}}"
                                    >

                                    {{$wishlist > 0 ? 'Remove Video From Playlist' : 'Add To Wishlist' }}
                                </button>

                                <button
                                    type="button"
                                    style="{{$buyed==1 ? 'cursor:default; background-color:grey;display:none;' : 'cursor:pointer'}}"
                                    class="btn-primary"
                                    {{$buyed==1 ? 'disabled ':''}}
                                    data-toggle="modal"
                                    data-target="#exampleModal">Add To Library</button>
                                <div
                                    class="modal "
                                    id="exampleModal"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">

                                                <h3>Choose Playlist</h3>
                                                <div class="Playlist1">
                                                    @foreach($listname as $index=>$val)
                                                    <h5 class="select_list">{{$val->listname}}
                                                    </h5>
                                                    <button
                                                        data-id="{{$val->id}}"
                                                        class="alert alert-primary btn-sm saveBtn"
                                                        onclick="savePlaylist(this)"
                                                        style="display:none;">Save</button>
                                                    <p class="aedit text-right">edit</p>
                                                    <br>
                                                        @endforeach
                                                        <div class="before">
                                                            <a href="#" class="show_list">Create New Playlist +</a>
                                                            <span class="create_playlistt" style="display: none">
                                                                <input
                                                                    type="text"
                                                                    class="list"
                                                                    placeholder="Play List Name"
                                                                    name="listname"
                                                                    value=""/>
                                                                <button class="create_list btn btn-primary" type="button">Create</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mt-4">
                                                        <h2>Value:<span style="color:gold">{{ $GLOBALS['paz'] }}
                                                            <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></span>
                                                        </h2>
                                                        <input type="hidden" id="vidid" name="videoid" value="{{$GLOBALS['videoid']}}">
                                                            <input type="hidden" class="token" name="token" value="{{ $GLOBALS['paz'] }}">
                                                                <input
                                                                    type="hidden"
                                                                    class="art_id"
                                                                    name="art_id"
                                                                    value="{{ $GLOBALS['artistid'] }}">
                                                                    <button type="button" class="addNow">Pay NOW</button>
                                                                    <div class="alert alert-success message" role="alert" style="display: none">
                                                                        A simple success alert—check it out!
                                                                    </div>
                                                                    <div class="insuffiecient modal" style="display:none;">
                                                                        @include('messagePopup')
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="vid-sec">
                                            <div class="row">
                                                <div class="col"></div>
                                                @if($video->type=='video')
                                                <div class="col-md-8">
                                                    <div class="lockicon" style="{{$buyed>0 ? 'display:none': 'display:block'}}">
                                                        <i class="fa fa-lock" style="font-size:48px;color:yellow"></i>
                                                    </div>

                                                    <video
                                                        width="100%"
                                                        height="100%"
                                                        poster="{{url('storage/app/public/uploads/'.$video->audio_pic) }}"
                                                        {{$buyed==1 ? 'controls' : ''}}
                                                        controlsList="nodownload"
                                                        disablePictureInPicture="disablePictureInPicture">
                                                        <source
                                                            src="{{url('storage/app/public/video/'.$video->media)}}"
                                                            type="video/mp4"></video>
                                                        <div class="report-op">
                                                            <i class="fa fa-ellipsis-v" onclick="showop()"></i>
                                                            <ul style="display:none;" class="reporting">
                                                                <li>
                                                                    <button
                                                                        class="btn btn-outline-light btn-sm text-dark"
                                                                        data-toggle="modal"
                                                                        data-target="#reportvideo"
                                                                        type="button">Report</button>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                    @else

                                                    <div class="artistaudiopage col-md-4">
                                                        <div class="lockicon">
                                                            <i class="fa fa-lock" style="font-size:48px;color:yellow"></i>
                                                        </div>

                                                        <img
                                                            src="https://pornartistzone.com/developing-streaming/public/images/logos/voice.jpg"
                                                            class="img-fluid">

                                                            <audio >
                                                                <source
                                                                    src="{{url('storage/app/public/audio/'.$video->media)}}"
                                                                    type="audio/mp3"></audio>
                                                                <div class="report-op">
                                                                    <i class="fa fa-ellipsis-v" onclick="showop()"></i>
                                                                    <ul style="display:none;" class="reporting">
                                                                        <li>
                                                                            <button
                                                                                class="btn btn-outline-light btn-sm text-dark"
                                                                                data-toggle="modal"
                                                                                data-target="#reportvideo"
                                                                                type="button">Report</button>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div class="col"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                   
				 
          
       
	    <!-- Modal -->
		<div class="modal modal2" id="reportvideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header ">
                      <div class="row" style="width: 100%;">
                        <div class="col"></div>
                         <div class="col-md-8 my-3">
                            <div class="text-center">
                                <select class="form-select form-control " aria-label="Default select example">
                                  <option selected> Select Menu</option>
                                  <option value="1">Harmful </option>
                                  <option value="2">Underage</option>
                                  <option value="3">Misleading </option>
                                  <option value="7">Other</option>
                                </select>
                              </div>
                          </div>
                          <div class="col"></div>
                          </div>
                        
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                      </div>
                      <div class="modal-body">
                      

                        <label>Description</label>
                        <textarea class="form-control"minlength="50" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                      </div>
                      <div class="pb-3 pr-3 text-right">
                      <button class="btn btn-primary" type="button">Submit</button></div>
                    </div>
                    
                    </div>
                  </div>
                </div>

                                                
                                <section class="published">
                                    <div class="container-fluid">
                                        <div class="pubcontainer">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="published">
                                                        <div class="published1">
                                                            <h3>{{$video->title}}</h3>
                                                            <p>{{$video->description}}</p>
                                                            <p>Published {{$video->created_at}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="main-mediacl">
                                                        <div class="media-property">
                                                            <div class="property-1">
                                                                <div class="Media-Type">
                                                                    <p>Media Type</p>
                                                                </div>
                                                                <div class="Media-Type1">
                                                                    <p>{{$video->type=='video' ? 'mp4':'mp3'}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-property">
                                                            <div class="property-1">
                                                                <div class="Media-Type">
                                                                    <p>Play Time</p>
                                                                </div>
                                                                <div class="Media-Type1">
                                                                    <p>{{$video->duration }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-property">
                                                            <div class="property-1">
                                                                <div class="Media-Type">
                                                                    <p>Resolution</p>
                                                                </div>
                                                                <div class="Media-Type1">
                                                                    <p>{{$video->convert}}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                  @endif
                                 @endforeach

                            </div>

                            <script>
                                var type = "{{$GLOBALS['type']}}";

                                addTohistory(type);
                            </script>
                            <style>
                                .lockicon {
                                    background: #00000080;
                                    height: 100%;
                                    width: 97%;
                                    position: absolute;
                                    left: -3px;
                                    right: 0;
                                    top: 0;
                                    display: flex;
                                    margin: 0 auto;
                                    text-align: center;
                                    z-index: 0;
                                }
.lockicon i {
    position: absolute;
    top: 42%;
    display: block;
    margin: 0 auto;
    left: 0;
    right: 0;
}
.report-op {
    position: absolute;
    top: 6px;
    right: 33px;
    cursor: pointer;
	z-index: 1000;
}
.content-cart .addToCart:hover {
    background: #0062cc !important;
    border: 1px solid #0062cc !important;
}
ul.reporting {
    background: #efefef;
    width: 241px;
    margin-left: 50%;
	position: absolute;
    box-shadow: 0 3px 6px #00000026;
    padding: 8px 6px 8px;
    text-align: left;
    font-size: 13px;
}
.artistaudiopage {
    margin: 1px auto;
    padding: 4px;
}

                                .lockicon i {
                                    position: absolute;
                                    top: 42%;
                                    display: block;
                                    margin: 0 auto;
                                    left: 0;
                                    right: 0;
                                }
                                .report-op {
                                    position: absolute;
                                    top: 6px;
                                    right: 33px;
                                    cursor: pointer;
                                    z-index: 1000;
                                }
                                .content-cart .addToCart:hover {
                                    background: #0062cc !important;
                                    border: 1px solid #0062cc !important;
                                }
                                ul.reporting {
                                    background: #efefef;
                                    width: 241px;
                                    margin-left: 50%;
                                    box-shadow: 0 3px 6px #00000026;
                                    padding: 8px 6px;
                                    text-align: left;
                                    font-size: 13px;
                                }
                                .artistaudiopage {
                                    margin: 1px auto;
                                    padding: 4px;
                                }

                                .artistaudiopage img {
                                    height: 184px;
                                }
                                @media only screen and (max-width: 768px) {
                                    .vid-sec video {
                                        width: 100%;
                                        height: 100%;
                                    }
                                    .lockicon {
                                        height: 100%;
                                        width: 100%;
                                    }
                                }
                            </style>
                            <script type="text/javascript">
                                $(".addToCart").click(function (e) {
                                    //alert('gee');
                                    var text = $(this).attr('text-data');
                                    //console.log(text);return false;
                                    e.preventDefault();
                                    $.ajax({
                                        type: "POST",
                                        url: "{{url('ajax-request')}}",
                                        data: {
                                            'id': $(this).attr('id'),
                                            'text': text == 'removed'
                                                ? 'remove'
                                                : 'added',
                                            '_token': "{{ csrf_token() }}"
                                        },
                                        success: function (result) {
                                            console.log(result);
                                            var new_text = text=='removed' ? 'added'  : 'removed'
                                            console.log(new_text);
                                            $('.addToCart').text(
                                                text == 'removed'
                                                    ? 'Add To Wishlist'
                                                    : 'Remove Media From Playlist'
                                            );
                                            $('.addToCart').attr('text-data',new_text)
                                            
                                        },
                                        error: function (result) {
                                            alert('error');
                                        }
                                    });
                                });
                                function showop() {
                                    //alert("asas");
                                    $(".reporting").toggle();
                                }
                            </script>

                            @include('layouts.footer')