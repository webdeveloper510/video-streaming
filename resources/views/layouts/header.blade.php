@extends('layout.cdn')
<header id="default_header" class="header_style_1">
  <!-- header bottom -->
  <div class="header_bottom">
		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="{{url('/home')}}" class="navbar-brand">
						<img src="{{asset('images/logos/logo-2.png')}}" height="28" alt="CoolBrand">
					</a>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="search_meu">
					<!--div class="menu_icon_custome"><i class="fa fa-bars" aria-hidden="true"></i></div-->
					<ul class="nav custom search">
              <li id="options" onclick="mufunc()">
                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <ul class="subnav" style="display: none">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Video</a></li>
                    <li><a data-toggle="tab" href="#menu1">Audio</a></li>
                    <li><a data-toggle="tab" href="#menu2">Artists</a></li>
                    <li><a data-toggle="tab" href="#menu3">Add Request</a></li>
                    </ul>

                    <div class="tab-content">
                    <div id="home" class="tab-pane fade1 in active">
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12">
                           <h4>Categories </h4>
                {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                  {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='video')
                   <label class="container1">{{$cat->category}} 
                     {{Form::checkbox('category[]', $cat->id)}}
                      <span class="checkmark"></span>
                            </label>
                             @endif
                            @endforeach
                          
                      </div>
                    </div>
                     <div class="col-md-6">
                        <div class="dropdown12">
                           <h4>Price</h4>
  
                            <label class="container1">Free  
                             {{Form::checkbox('price','free')}}
                           <span class="checkmark"></span>
                            </label>
                            <label class="container1">lowest  
                               {{Form::checkbox('price','asc')}}
                            <span class="checkmark"></span></label>
                            <label class="container1">Higest  
                               {{Form::checkbox('price','desc')}}
                            <span class="checkmark"></span>
                            </label>
                       
                        </div>
                        <div class="dropdown12">
                           <h4 >Duration</h4>
                            <label class="container1">Shortest  
                             {{Form::checkbox('duration','asc')}}
                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">Longest 
                           {{Form::checkbox('duration','desc')}}
                            <span class="checkmark"></span>
                          </label>
                      
                        </div>
                          {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
                      {{ Form::close() }}
                       </div> 
                     </div>    

                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3 style="color: #fff;">Audio</h3>
                      <div class="col-md-6">
                      <div class="dropdown12">
                           <h4>Categories </h4>
                      {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                      {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='audio')
                   <label class="container1">{{$cat->category}} 
                     {{Form::checkbox('category[]', $cat->id)}}
                            <span class="checkmark"></span>
                            </label>
                             @endif
                            @endforeach
                          </div>
                          </div>
                          <div class="col-md-6">
                               <div class="dropdown12">
                           <h4>Price</h4>
  
                            <label class="container1">Free 
                             {{Form::checkbox('price','free')}}
                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">lowest  
                             {{Form::checkbox('price','asc')}}
                            <span class="checkmark"></span></label>
                            <label class="container1">Higest  
                               {{Form::checkbox('price','desc')}}
                            <span class="checkmark"></span>
                            </label>
                       
                        </div>
                          </div>
                       
                             <div class="dropdown12">
                           <h4 >Duration</h4>
                            <label class="container1">Shortest  
                             {{Form::checkbox('duration','asc')}}
                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">Longest 
                             {{Form::checkbox('duration','desc')}}
                            <span class="checkmark"></span>
                          </label>
                          </div>
                            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
                        {{ Form::close() }}
                      </div>
                  
                    <div id="menu2" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                          <div class="col-md-6">
                      <div class="dropdown12">
                           <h4>Categories </h4>
                           {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                             {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='artist')
                   <label class="container1">{{$cat->category}} 
                     {{Form::checkbox('category[]', $cat->id)}}
                            <span class="checkmark"></span>
                            </label>
                             @endif
                            @endforeach
                          </div>
                          </div>
                          <div class="col-md-6">
                               <div class="dropdown12">
                           <h4>Price</h4>
  
                            <label class="container1">Free  
                               {{Form::checkbox('price','free')}}
                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">lowest  
                               {{Form::checkbox('price','asc')}}
                            <span class="checkmark"></span></label>
                            <label class="container1">Higest 
                               {{Form::checkbox('price','desc')}}
                            <span class="checkmark"></span>
                            </label>                       
                        </div>
                          </div>
                           <div class="dropdown12">
                           <h4 >Duration</h4>
                            <label class="container1">Shortest  
                            {{Form::checkbox('duration','asc')}}
                            <span class="checkmark"></span>
                            </label>
                            <label class="container1">Longest 
                             {{Form::checkbox('duration[]','desc')}}
                            <span class="checkmark"></span>
                          </label>
                          </div>
                            {{ Form::submit('Submit!',['class'=>'btn btn-primary']) }}
                          {{ Form::close() }}
                       
                    </div>
                    <div id="menu3" class="tab-pane fade">
                      <h3 style="color: #fff;">Menu 3</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    </div>
                </ul>
              </li>
              <li id="search">
                <form action="" method="get">
                  <input type="text" name="search_text" id="search_text" placeholder="Search"/>
                  <input type="button" name="search_button" id="search_button"></a>
                </form>
              </li>
            </ul>
					
					<!--div class="search-box" style="font-size: 16px;">
						<input class="search-box__input" type="text" oninput="this.setAttribute('value',this.value)">
					<i class="fa fa-search" aria-hidden="true"></i>
					</div-->
					</div>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<div class="navbar-nav">
							<a href="#" class="nav-item nav-link active"><i class="fa fa-trophy"></i>TOP LIST</a>
							<a href="1-page.html" class="nav-item nav-link"><i class="fa fa-phone" aria-hidden="true"></i>LIVE</a>
							<a href="upload.html" class="nav-item nav-link"><i class="fa fa-upload" aria-hidden="true"></i></a>	
							<a href="play.html" class="nav-item nav-link"><i class="fa fa-play" aria-hidden="true"></i></a>	
							<a href="#" class="nav-item nav-link"><i class="fa fa-money" aria-hidden="true"></i></a>
							<a href="{{url('/getArtists')}}" class="nav-item nav-link">Artists</a>	

               
						</div>
						<div class="navbar-nav ml-auto">
					
              <div class="btn-group">
  <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -15px;
    font-size: 16px;font-weight: 400;"><i class="fa fa-user" aria-hidden="true"></i>
    {{$login ? $login->nickname : 'Login'}}
  </button>
  @if(!$login)
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button"><a href="{{url('/login')}}">Login</a></button>
    <button class="dropdown-item" type="button"><a href="{{url('/getLogin')}}">Login As a Artist</a></button>
  </div>
  @else
   <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button"><a href="{{url('/profile')}}">Edit Profile</a></button>
  </div>
@endif
</div>
						</div>
            <a href="{{ URL::to('logout/getLogin')}}" class="nav-item nav-link text-white">Logout</a>
					</div>
				</nav>
		    </div>
	   </div>  
  
  </div>
  <!-- header bottom end -->
</header>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>