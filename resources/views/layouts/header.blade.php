@extends('layout.cdn')
<header id="default_header" class="header_style_1">
  <!-- header bottom -->
  <div class="header_bottom">

		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="{{url('/')}}" class="navbar-brand">
						<img src="{{asset('images/logos/logo-new.png')}}" height="50" alt="CoolBrand">
					</a>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="search_meu">
					<!--div class="menu_icon_custome"><i class="fa fa-bars" aria-hidden="true"></i></div-->
					<ul class="nav custom search">
              <li id="options" onclick="mufunc()">
                <a href="#"><img width="30px" src="{{asset('images/logos/filter.png')}}"></a></li>
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
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                  {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='video')
                   <label class=""> 
                     {{Form::checkbox('category[]', $cat->id)}}
                     {{$cat->category}} 
                     
                            </label><br>
                             @endif
                            @endforeach
                          
                      </div>
                    
                   
                        <div class="dropdown12 text-white">
                           <h4>Price</h4>
                            
                            <label class="">
                             {{Form::checkbox('price','free')}}Free  
                          
                            </label><br>
                            <label class="text-white">
                               {{Form::checkbox('price','asc')}}lowest  
                            </label><br>
                            <label class="">
                               {{Form::checkbox('price','desc')}}Higest  
                            
                            </label>
                       
                        </div>
                        <div class="dropdown12 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                             {{Form::checkbox('duration','asc')}}Shortest 
                           
                            </label><br>
                            <label class="">
                           {{Form::checkbox('duration','desc')}}Longest 
                            
                          </label><br>
                      
                        </div>
                      </div>
                            <div class="col-md-6 text-left">
                    <input type="button" class="btn btn-primary"data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"value=" Advance Filter option">
  
                  <div class="collapse" id="collapseExample">
                       @include('popup')
                  </div>

                  
                     </div>  
                       <div class="col-md-6 text-left">
                       {{ Form::submit('Submit!',['class'=>'btn btn-primary mb-4']) }}
                         {{ Form::close() }}
                     </div>  
                    
                     </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3 style="color: #fff;">Audio</h3>
                        <div class="row">
                      <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                      {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                      {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='audio')
                   <label class="">
                     {{Form::checkbox('category[]', $cat->id)}}{{$cat->category}} 
                          
                            </label><br>
                             @endif
                            @endforeach
                          </div>
                           <div class="dropdown12 text-white">
                           <h4>Price</h4>
  
                            <label class="">
                             {{Form::checkbox('price','free')}}Free 
                            
                            </label><br>
                            <label class="">  
                             {{Form::checkbox('price','asc')}}lowest
                            </label><br>
                            <label class=""> 
                               {{Form::checkbox('price','desc')}}Higest 
                            
                            </label>
                       
                        </div>
                         
                       
                             <div class="dropdown12 text-white">
                           <h4 >Duration</h4>
                            <label>  
                             {{Form::checkbox('duration','asc')}}Shortest
                            </label><br>
                            <label >
                             {{Form::checkbox('duration','desc')}}Longest 
                          
                          </label>
                          </div>
                          </div>
                          <div class="col-md-6">
                              
                           </div>
                            <div class="col-md-12 text-left">
                       {{ Form::submit('Submit!',['class'=>'btn btn-primary mb-4']) }}
                      {{ Form::close() }}
                     </div> 
                            </div>
                           
                      </div>
                  
                    <div id="menu2" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                      <div class="row">
                          <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                           {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                             {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='artist')
                   <label>
                     {{Form::checkbox('category[]', $cat->id)}}{{$cat->category}} 
                            
                            </label><br>
                             @endif
                            @endforeach
                          </div>
                          
                               <div class="dropdown12 text-white">
                           <h4>Price</h4>
  
                            <label> 
                               {{Form::checkbox('price','free')}}Free 
                            </label><br>
                            <label> 
                               {{Form::checkbox('price','asc')}}lowest 
                            </label><br>
                            <label> 
                               {{Form::checkbox('price','desc')}}Higest
                            
                            </label>                       
                        </div>
                       
                           <div class="dropdown12 text-white">
                           <h4 >Duration</h4>
                            <label>  
                            {{Form::checkbox('duration','asc')}}Shortest
                            
                            </label><br>
                            <label> 
                             {{Form::checkbox('duration[]','desc')}}Longest
                            
                          </label>
                          </div>
                          </div>
                            <div class="col-md-6 text-left">
                    <input type="button" class="btn btn-primary"data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"value=" Advance Filter option">
  
                  <div class="collapse" id="collapseExample">
                      @include('popup')
                  </div>

                     
                     </div> 
                             <div class="col-md-12 text-left">
                       {{ Form::submit('Submit!',['class'=>'btn btn-primary mb-4']) }}
                     
                      {{ Form::close() }}
                     </div> 
                   </div>
                       
                    </div>
                    <div id="menu3" class="tab-pane fade">
                      <h3 style="color: #fff;">Menu 3</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    </div>
                </ul>
            
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
				<a href="{{url('/getArtists')}}" class="nav-item nav-link active">
				    <i class="fa fa-trophy"></i>TOP LIST</a>
							<!-- <a href="1-page.html" class="nav-item nav-link"><i class="fa fa-phone" aria-hidden="true"></i>LIVE</a> -->
							<!--a href="upload.html" class="nav-item nav-link"><i class="fa fa-upload" aria-hidden="true"></i></a-->	
		<a href="play.html"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i></a>
    
							<a href="{{url('/userWithdraw')}}" class="nav-item nav-link"><i class="fa fa-money" aria-hidden="true"></i></a>  


						</div>

						<div class="navbar-nav ml-auto">
              @if(!$login)
					  <a href="{{url('register')}}" class="nav-item nav-link">Register</a>
              <a href="{{url('/login')}}" class="nav-item nav-link"> 
           Login</a>  
           @endif             

            @if($login)
           <div class="btn-group login-btn"style="border-right-color: white;border-right-style: solid;">
            <img width="50px;" height="50px;" src="{{url('storage/app/public/uploads/'.$userProfile[0]->profilepicture) }}">
             @if($userProfile[0]->profilepicture)
    
    @else
   <i class="fa fa-user-circle-o" aria-hidden="true"></i>
   @endif
   <span class="profile-img text-white">
   {{$login->nickname}} <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
  </button>
 
   <div class="dropdown-menu dropdown-menu-right">
       <button class="dropdown-item" type="button">
         <a href="{{url('/profile')}}">Edit Profile
         </a></button>
      <button class="dropdown-item" type="button">
        <a href="{{url('/logout')}}">Logout</a></button>
  </div>
   <hr/ style="color:white;background: white;">
  {{$userProfile[0]->tokens}}PAZ
   <a href="{{url('/addToken')}}"><i class="fa fa-plus text-white" aria-hidden="true"></i></a>
 </span>
  

</div>
@endif
 <!-- Modal -->
                   
<a href="#"  class="nav-item nav-link" style="border-right-color: white;border-right-style: solid;"><i style="font-size: 27px !important;" class="fa fa-comment" aria-hidden="true"></i></a>

						</div>
					</div>
				</nav>
		    </div>
	   </div>  
  
  </div>
  <!-- header bottom end -->
  <!-- Button trigger modal -->


</header>
<style type="text/css">
div#collapseExample {
    height: 380px;
    overflow: scroll;
}
i.fa.fa-comment:hover {
    color: #fc0 !important;
}
.dropdown12 {
   
    height: 100px;
    overflow-y: scroll;
}
</style>

