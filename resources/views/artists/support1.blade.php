<<<<<<< HEAD
@include('artists.dashboard')
=======
@include('layouts.header')
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4

<section class=" support">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video Files</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-audio-tab" data-toggle="pill" href="#pills-audio" role="tab" aria-controls="pills-audio" aria-selected="false">Audio Files</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-images-tab" data-toggle="pill" href="#pills-images" role="tab" aria-controls="pills-images" aria-selected="false">Images</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
    <!--------- Open  ticket tab------------------------------------------>
  <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
       
      <div class="row">
<<<<<<< HEAD
=======

        @foreach($social_info as $info)
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4
         
          <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="delete">
<<<<<<< HEAD
                       <h3> artistnamexyz</h3>
=======
                       <h3> {{$info->nickname}}</h3>
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4
                       <div class="text-right">
                          <button class="btn btn-outline-succes" type="button">Delete</button>
                       </div>
                    </div>
                    <div class="post">
                         <h3>Description for the Post :</h3>
<<<<<<< HEAD
                         <p>sdkjhsdgvhdsgvjhdsbvhjbdsvjbjds</p>
=======
                         <p>{{$info->description}}</p>
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4
                         <div class="text-right">
                             <button class="btn btn-outline-primary" type="button">Copy</button>
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                     <div class="soc">
                       <div class="mp4">
                         <video width="320" height="240" controls>
<<<<<<< HEAD
                            <source src="movie.mp4" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
=======
                            <source src="{{url('storage/app/public/video/'.$info->media) }}" type="video/mp4">
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4
                            Your browser does not support the video tag.
                         </video>
                         <div class="text-right">
                             <button class="btn btn-outline-primary" type="button">Delete</button>
                         </div>
                       </div>
                       <div class="accounts">
                             <h3> Social Accounts :</h3>
<<<<<<< HEAD
                             <h5> Instagram Accountname</h5>
                             <h5> Twitter Accountname</h5>
=======
                             <h5> Instagram {{$info->username}}</h5>
                             <h5> Twitter {{$info->username}}</h5>
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4
                             <div class="text-right">
                                  <button class="btn btn-primary" type="button">Copy</button>
                             </div>
                       </div>

                     </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
=======
        @endforeach
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4
       
      </div>
  </div>

  <!--------- tickets tab------------------------------------------>

  <div class="tab-pane fade" id="pills-audio" role="tabpanel" aria-labelledby="pills-audio-tab">
  <div class="row">
          <div class="col"></div>
          <div class="col-md-8">
   <div class="opentickettext">
       <div class="row">
       <a href="#" data-toggle="modal" data-target="#chat">
            <div class="col-9">
               <h3>#34567893 - Technical Issue</h3>
               <p>Last Updated: Monday,21.march,2021(15:03)</p>

            </div>
            </a>
            <div class="col-3 mt-4">
                
               <button type="button" class="btn btn-primary">Open</button>
               <button type="button"  disable class="btn btn-primary" style="display:none;">Close</button>
            </div>
            <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="chat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <div class="chat1">
                         <p>hello</p>

                         <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Message" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" ><i class="material-icons"id="button-addon2">send</i></button>
                    </div>
                    </div>

                        </div>
                    </div>
                    
                    </div>
                </div>
                </div>


        </div>   
        <hr>   

    </div>
</div>
<div class="col"></div>
</div>


</div>


  </div>
 
</div>


</section>



<style>
    section.support {
    margin-top: 10%;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #1d0101;
    background-color: white;
}
ul#pills-tab {
    background: #7b0000;
    color: white !important;
}

li.nav-item a {
    color: white;
}

</style>




<<<<<<< HEAD
@include('artists.dashboard_footer');
=======
@include('layouts.footer')
>>>>>>> 124e0379f7edccd1374a0462e0e5cc969c19f2d4
