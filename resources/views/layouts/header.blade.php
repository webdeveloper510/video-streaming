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
                    <li class="active link_click"><a data-toggle="tab" href="#home">Video</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu1">Audio</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu4">Artists</a></li>
                    <li  class="link_click" ><a data-toggle="tab" href="#menu2">Offers</a></li>
                    <li  class="link_click"><a data-toggle="tab" href="#menu3">Add Request</a></li>
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
                     {{Form::checkbox('catid[]', $cat->id)}}
                     {{$cat->category}} 
                   </label><br>
                             @endif
                            @endforeach
                          
                      </div>
                     </div>

                          <div class="col-md-6 ">
                            <div class="bar">
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                            <label class="">
                          {{Form::radio('price', 'free', true ,['class'=>'user'])}} Free

                          <!--    {{Form::checkbox('price','free')}}Free   -->
                          
                            </label><br>
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Higest
                         <!--       {{Form::checkbox('price','desc')}}Higest   -->
                            
                            </label>
                       
                        </div>

                        <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                               {{Form::radio('duration', 'asc', true ,['class'=>'user'])}} Shortest
                         <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                           
                            </label><br>
                            <label class="">
                               {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
                          <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                            
                          </label><br>
                      
                        </div>
                          <div class="collapse pt-4" id="collapseExample1">
                @include('popup') 
              </div>
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-6 text-left">
              
                {{ Form::submit('Submit!',['class'=>'btn btn-primary mb-4']) }}
         <input type="button" class="btn btn-primary section_advance mb-4 ml-3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;" >
              </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                      
                    
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
                     {{Form::checkbox('catid[]', $cat->id)}}{{$cat->category}} 
                          
                            </label><br>
                             @endif
                            @endforeach
                          </div>
                             </div>
                       <div class="col-md-6">
                           <div class="dropdown1 text-white">
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
                      
                             <div class="dropdown1 text-white">
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
                  
                    <div id="menu4" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                      <div class="row">
                             {!!Form::open(['action' => 'AuthController@getSelectingArtist', 'method' => 'post', 'files'=>true])!!}
                      {{Form::token()}}
                          <div class="col-md-12">
                             <div class="scroll12">
                               
                            
                          @include('popup')
                        </div>
                             </div>
                          <div class="col-md-6 text-left mt-3">
              
                {{ Form::submit('Submit!',['class'=>'btn btn-primary mb-4']) }}
           
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                     </div> 
                   </div>
                    <div id="menu2" class="tab-pane fade1 in ">
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12 text-white" id="video">
                           <h4>Categories </h4>
                {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                  {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='video')
                   <label class=""> 
                     {{Form::checkbox('catid[]', $cat->id)}}
                     {{$cat->category}} 
                   </label><br>
                             @endif
                            @endforeach
                          
                      </div>
                      <div class="dropdown12 text-white" id="audio">
                           <h4>Categories </h4>
                {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                  {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='audio')
                   <label class=""> 
                     {{Form::checkbox('catid[]', $cat->id)}}
                     {{$cat->category}} 
                   </label><br>
                             @endif
                            @endforeach
                          
                      </div>
                     </div>

                          <div class="col-md-6 ">
                            <div class="bar">
                               <div class="dropdown1 text-white">
                           <h4 >Media</h4>
                            <label class=""> 

                               {{Form::radio('media', 'asc', true ,['class'=>'media', 'id'=>'audio'])}} Audio
                         <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                           
                            </label><br>
                            <label class="">
                               {{Form::radio('media', 'desc', false ,['class'=>'media', 'id'=>'video'])}} Video 
                          <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                            
                          </label><br>
                      
                        </div>
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                  
      
                            <label class="text-white">
                          {{Form::radio('price', 'asc', true ,['class'=>'user'])}} lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Higest
                         <!--       {{Form::checkbox('price','desc')}}Higest   -->
                            
                            </label>
                       
                        </div>

                       
                          <div class="collapse pt-4" id="collapseExample2">
                @include('popup') 
              </div>
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-6 text-left">

                {{ Form::submit('Submit!',['class'=>'btn btn-primary mb-4']) }}
         <input type="button" class="btn btn-primary section_advance mb-4 ml-3" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2"value=" Advance Filter option  &#8594;" >
              </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                      
                    
                     </div>
                    </div>
                    
                        <div id="menu4" class="tab-pane fade1 in ">
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                  {{Form::token()}}
                            @foreach($category as $cat)
                            @if($cat->type=='video')
                   <label class=""> 
                     {{Form::checkbox('catid[]', $cat->id)}}
                     {{$cat->category}} 
                   </label><br>
                             @endif
                            @endforeach
                          
                      </div>
                     </div>

                          <div class="col-md-6 ">
                            <div class="bar">
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                            <label class="">
                          {{Form::radio('price', 'free', true ,['class'=>'user'])}} Free

                          <!--    {{Form::checkbox('price','free')}}Free   -->
                          
                            </label><br>
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Higest
                         <!--       {{Form::checkbox('price','desc')}}Higest   -->
                            
                            </label>
                       
                        </div>

                        <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                               {{Form::radio('duration', 'asc', true ,['class'=>'user'])}} Shortest
                         <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                           
                            </label><br>
                            <label class="">
                               {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
                          <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                            
                          </label><br>
                      
                        </div>
                          <div class="collapse pt-4" id="collapseExample1">
                @include('popup') 
              </div>
                      </div>
                    </div>
                      
                     
                        
                    <div class="col-md-6 text-left">
              
                {{ Form::submit('Submit!',['class'=>'btn btn-primary mb-4']) }}
                       </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                      
                    
                     </div>
                    </div>
                    
                    <div id="menu3" class="tab-pane fade">
                      <h3 style="color: #fff;">Request</h3>
                      <div class="row">
                        <div class="col">
                          <div class="dropdown1 text-white">
                           <h4 >Media</h4>
                            <label class=""> 

                               {{Form::radio('media', 'asc', true ,['class'=>'Media', 'id'=>'audio'])}} Audio
                         <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                           
                            </label><br>
                            <label class="">
                               {{Form::radio('media', 'desc', false ,['class'=>'media', 'id'=>'video'])}} Video 
                          <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                            
                          </label><br>
                      
                        </div>
                      </div>
                      <div class="col">
                       <form>
                            <div class="form-group">
                              <label class="text-white">Video Price</label>
                              <input type="text" class="form-control" >
                             
                            </div>
                            <div class="form-group">
                              <label class="text-white">Title</label>
                              <input type="text" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label class="text-white">Description</label>
                             <textarea id="w3review" name="w3review" rows="4" class="form-control" >
                             </textarea>
                            </div>
                            
                          </form>
                      </div>
                      <div class="col">
                        <div class="dropdown12 text-white">
                           <h4>Categories </h4>
                          {!!Form::open(['action' => 'AuthController@getVedio', 'method' => 'post', 'files'=>true])!!}
                            {{Form::token()}}
                                      @foreach($category as $cat)
                                      @if($cat->type=='video')
                             <label class=""> 
                               {{Form::checkbox('catid[]', $cat->id)}}
                               {{$cat->category}} 
                             </label><br>
                             @endif
                            @endforeach
                          
                      </div>
                          <!-- <input type="button" class="btn btn-primary section_advance mb-4 ml-3" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3"value=" Advance Filter option  &#8594;" >
                       
                             <div class="collapse pt-4" id="collapseExample3">
                @include('popup') 
              </div> -->

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
  
  i.fa.fa-comment:hover {
      color: #fc0 !important;
  }
  .dropdown12 {
     
     height: 248px;
      overflow-y: scroll;

  }
  .scroll12{
    height: 250px;
    overflow-y: scroll;
  }
.dropdown1 h4{
   margin:0 !important;
   color:white;
}

.dropdown1 {
    background: #fff0;
    padding: 19px;
    margin-bottom: 19px;
    position: relative;
    padding-top: 7px !important;
    border: 1px solid #fff;
    margin-top: 10px;
    width: 98%;
  }
  .dropdown1 label {
    display: inline-flex;
  }
  .nav-tabs {
    border-bottom: 1px solid #dee2e6;
    background: #bf0000;
}
.rightbar {
    height: 300px;
    overflow-y: scroll;
}
.row.text-left.text-white.mt-3.red {
    width: 98%;
}
</style>

<script type="text/javascript">

</script>