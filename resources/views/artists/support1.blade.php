@include('layout.cdn')
<header>
    <div class="text-center">
        <img
            src="{{asset('images/logos/good_quality_logo.png')}}"
            height="50"
            alt="CoolBrand">
        <h1 class="text-white mt-2">
            Social Media Download
        </h1>
    </div>
</header>

<section class=" support1">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a
                class="nav-link active"
                id="pills-video-tab"
                data-toggle="pill"
                href="#pills-video"
                role="tab"
                aria-controls="pills-video"
                aria-selected="true">Video Files</a>
        </li>
        <li class="nav-item" role="presentation">
            <a
                class="nav-link"
                id="pills-images-tab"
                data-toggle="pill"
                href="#pills-images"
                role="tab"
                aria-controls="pills-images"
                aria-selected="false">Images</a>
        </li>
        <li class="nav-item" role="presentation">
            <a
                class="nav-link"
                id="pills-artist-tab"
                data-toggle="pill"
                href="#pills-artist"
                role="tab"
                aria-controls="pills-artist"
                aria-selected="false">Artist Social Account</a>
        </li>

    </ul>
    <div class="tab-content" id="pills-tabContent">
        <!--------- Open ticket tab------------------------------------------>
        <div
            class="tab-pane fade show active"
            id="pills-video"
            role="tabpanel"
            aria-labelledby="pills-video-tab">

            <div class="row">

                @foreach($social_video as $info)

                <div class="col-md-12 mb-3 px-3">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="delete1">
                                <h3>
                                    {{$info->nickname}}</h3>
                                    <div class="text-right">
                                        <button class="btn btn-outline-danger" type="button">Delete</button>
                                    </div>

                            </div>
                            <div class="post">
                                <h3>Description for the Post :</h3>
                                <p>{{$info->description}}</p>
                                <div class="text-right mr-3">
                                    <button class="btn btn-outline-primary" type="button">Copy</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="soc">
                                <div class="mp4">
                                    <video width="50%" poster="{{url('storage/app/public/uploads/'.$info->audio_pic) }}" controls="controls">
                                        <source
                                            src="{{url('storage/app/public/video/'.$info->media) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="text-right Delete">
                                        <a
                                            href="{{url('storage/app/public/video/'.$info->media) }}"
                                            download="download">
                                            <button class="btn btn-outline-primary" type="button">Download</button>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="card">
                                        <div class="card-header">
                                                <h3>Artist Social Media Accounts
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                            
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">App Name</th>
                                                        <th scope="col">User Name</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $count= array_filter(explode(',',$info->username));
                                                $social_plateform= array_filter(explode(',',$info->social_plateform));
                                            
                                                $a = count($count);
                                                ?>
                                          @for ($i = 0; $i < $a; $i++)
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>{{$count[$i]}}</td>
                                                        <td> {{$social_plateform[$i]}}</td>
                                                    
                                                    </tr>
                                                    @endfor                                                    
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        <div class="text-right m-3 ">
                                        <button class="btn btn-primary" type="button">Copy</button>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- ------- tickets tab---------------------------------------- -->
       <div
        class="tab-pane fade"
        id="pills-artist"
        role="tabpanel"
        aria-labelledby="pills-artist-tab">
        <div class="container-fluid">
               
                    </div>
                </div>

        <div
            class="tab-pane fade "
            id="pills-images"
            role="tabpanel"
            aria-labelledby="pills-images-tab">
            <div class="container-fluid">
                <div class="row">

                    @foreach($social_image as $info)

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="delete1">

                                    <h3>
                                        {{$info->nickname}}</h3>
                                    <div class="text-right">
                                        <button class="btn btn-outline-danger" type="button">Delete</button>
                                    </div>

                                </div>
                                
                                <div class="post">
                                    <h3>Description for the Post :</h3>
.
                                    <p>{{$info->description}}</p>
                                    <div class="text-right mr-3">
                                        <button class="btn btn-outline-primary" type="button">Copy</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="soc">
                                    <div class="mp4">

                                        <img
                                            src="{{url('storage/app/public/uploads/'.$info->media) }}"
                                            class="img-fluid">

                                        <div class="text-right Delete">
                                            <button class="btn btn-outline-primary" type="button">Download</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card">
                                        <div class="card-header">
                                                <h3>Artist Social Media Accounts
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                            
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">App </th>
                                                        <th scope="col">User Name</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $count= array_filter(explode(',',$info->username));
                                                $social_plateform= array_filter(explode(',',$info->social_plateform));
                                            
                                                $a = count($count);
                                                ?>
                                          @for ($i = 0; $i < $a; $i++)
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>{{$count[$i]}}</td>
                                                        <td> {{$social_plateform[$i]}}</td>
                                                    
                                                    </tr>
                                                    @endfor   
                                                    
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                   
                                        <div class="text-right m-3">
                                            <button class="btn btn-primary" type="button">Copy</button>
                                        </div>
                                

                                </div>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</section>

<style>
    section.support1 {
        margin-top: 10px;
    }
    .delete1 .text-right {
    margin: -24px 10px 10px 10px;
}
    li.nav-item {
        width: 33.33%;
        text-align: center;
    }
    .nav-pills .nav-link.active,
    .nav-pills .show > .nav-link {
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
    .text-right.Delete {
        position: absolute;
        right: 25px;
        top: 39px;
    }
    .text-right.artistname {
        position: absolute;
        right: 21px;
        top: 12px;
    }
    .delete1 {

        border-bottom-color: black;
        border-bottom-style: solid;
        border-bottom-width: 1px;
    }

    .delete1 h3 {
        padding-top: 13px;
    }

    .post {
        padding-top: 12px;
    }

    .post p {
        padding-left: 60px;
    }

    .col-md-8 {
        border: 1px solid;
        padding: 0;
    }

    .col-md-4 {
        border: 1px solid;
        padding: 10px;
    }
    header {
        background: #7b0000;
        padding: 11px;
    }
</style>

@include('layouts.footer')