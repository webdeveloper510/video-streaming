@include('layout.cdn')
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
                  <ul class="nav nav-tabs text-center">
                    <li class="active link_click"><a data-toggle="tab" href="#home">Video</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu1">Audio</a></li>
                    <li class="link_click"><a data-toggle="tab" href="#menu4">Artists</a></li>
                    <li  class="link_click" ><a data-toggle="tab" href="#menu2">Offers</a></li>
                    </ul>

                    <div class="tab-content">
                    <div id="home" class="tab-pane fade1 in active">
                        <h3 style="color: #fff;">Video</h3>
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
                          {{Form::radio('price', 'free', false ,['class'=>'user'])}} Free

                          <!--    {{Form::checkbox('price','free')}}Free   -->
                          
                            </label><br>
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Higest
                         <!--      orm::checkbox('price','desc')}}Higest   -->
                            
                            </label>
                       
                        </div>

                        <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label class=""> 
                               {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
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
                      
                     
                        
                    <div class="col-md-12 text-right pr-5">
              
               
         <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;" >
          {{ Form::submit('Apply!',['class'=>'btn btn-primary mb-4']) }}
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
            

                         {{Form::radio('price', 'free', false ,['class'=>'user'])}} Free
                            
                            </label><br>
                            <label class="">  
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} lowest
                      
                            </label><br>
                            <label class=""> 
                          {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Higest
                             
                            
                            </label>
                       
                        </div>
                      
                             <div class="dropdown1 text-white">
                           <h4 >Duration</h4>
                            <label>  
                           {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
  
                            </label><br>
                            <label >
                        {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
              
                          
                          </label>
                          </div>
                          </div>
                          <div class="col-md-6">
                              
                           </div>
                            <div class="col-md-12 pr-5 text-right">
                       {{ Form::submit('Apply!',['class'=>'btn btn-primary mb-4']) }}
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
                               
                            
                          <div class="row text-left text-white mt-3 red">
                                  <div class="col-md-4 mb-4 logy">
                                    <label>Sexology</label><br>
                                    {{Form::checkbox('sexology[]','Hetero')}}Hetero <br>
                                    {{Form::checkbox('sexology[]','Homo')}}Homo <br>
                                    {{Form::checkbox('sexology[]','Bisexual')}}Bisexual 
                                  </div>
                                  <div class="col-md-4 mb-4">
                                      <label>Tits size</label><br>
                                    {{Form::checkbox('titssize[]','Small')}}Small <br>
                                    {{Form::checkbox('titssize[]','Normal')}}Normal <br>
                                    {{Form::checkbox('titssize[]','Big')}}Big 
                                  </div>
                                   <div class="col-md-4 mb-4 ass">
                                    <label>Ass</label><br>
                                    {{Form::checkbox('ass[]','Normal')}}Normal <br>
                                    {{Form::checkbox('ass[]','Small')}}Small <br>
                                    {{Form::checkbox('ass[]','Big')}}Big 
                                    
 
                                  </div>
                                  <div class="col-md-4 mb-4 logy">
                                      <label>Privy part</label><br>
                                    {{Form::checkbox('privy[]','Shaved')}}Shaved <br>
                                    {{Form::checkbox('privy[]','Unshaved')}}Unshaved <br>
                                              <br>
                                              <br>
                                      <label>Height</label><br>
                                    {{Form::checkbox('height[]','<140cm')}}<140cm <br>
                                    {{Form::checkbox('height[]','140-160cm')}}140-160cm <br>
                                    {{Form::checkbox('height[]','160-180cm')}}160-180cm <br>
                                    {{Form::checkbox('height[]','180cm<')}}180cm< <br>
                                  </div>
                                   <div class="col-md-4 mb-4">
                                    <label>Eye color</label><br>
                                    {{Form::checkbox('eyecolor[]','blue')}}Blue <br>
                                    {{Form::checkbox('eyecolor[]','brown')}}Brown <br>
                                    {{Form::checkbox('eyecolor[]','brown-green')}}Brown-green<br> 
                                    {{Form::checkbox('eyecolor[]','golden')}}Golden <br>
                                    {{Form::checkbox('eyecolor[]','gray')}}Gray <br>
                                    {{Form::checkbox('eyecolor[]','green')}}Green<br>
                                    {{Form::checkbox('eyecolor[]','red')}}Red <br>
                                    {{Form::checkbox('eyecolor[]','white')}}White <br>
                                    {{Form::checkbox('eyecolor[]','yellow')}}Yellow <br>
                                    {{Form::checkbox('eyecolor[]','blue')}}Blue <br>
                                    {{Form::checkbox('eyecolor[]','indigo')}}Indigo <br>
                                    {{Form::checkbox('eyecolor[]','violet')}}Violet <br>
                                  </div>
                                        <div class="col-md-4 mb-4 ass">
                                    <label>Hair color</label><br>
                                    {{Form::checkbox('haircolor[]','blue')}}Blue <br>
                                    {{Form::checkbox('haircolor[]','brown')}}Brown <br>
                                    {{Form::checkbox('haircolor[]','black')}}Black<br> 
                                    {{Form::checkbox('haircolor[]','blonde')}}Blonde <br>
                                    {{Form::checkbox('haircolor[]','gray')}}Gray <br>
                                    {{Form::checkbox('haircolor[]','green')}}Green<br>
                                    {{Form::checkbox('haircolor[]','red')}}Red <br>
                                    {{Form::checkbox('haircolor[]','white')}}White <br>
                                    {{Form::checkbox('haircolor[]','yellow')}}Yellow <br>
                                    {{Form::checkbox('haircolor[]','silver')}}Silver <br>
                                    {{Form::checkbox('haircolor[]','blue')}}Blue <br>
                                    {{Form::checkbox('haircolor[]','indigo')}}Indigo <br>
                                    {{Form::checkbox('haircolor[]','violet')}}Violet <br>
                                  </div>
                                 
                                   <div class="col-md-4 mb-4 logy">
                                      <label>Hair Length</label><br>
                                    {{Form::checkbox('hairlength[]','Very short')}}Very short <br>
                                    {{Form::checkbox('hairlength[]','Short')}}Short <br>
                                    {{Form::checkbox('hairlength[]','Long')}}Long <br>
                                    {{Form::checkbox('hairlength[]','Very Long')}}Very Long <br>
                                  </div>
                                   <div class="col-md-8 mb-4">
                                    <label>Weight</label><br>
                                    {{Form::checkbox('weight[]','Less than Average')}}Less than Average <br>
                                    {{Form::checkbox('weight[]','Normal')}}Normal <br>
                                    {{Form::checkbox('weight[]','Muscular')}}Muscular<br> 
                                    {{Form::checkbox('weight[]','Above Average')}}Above Average 
                                  </div>
                                  <!--div class="col-md-4 mb-4">
                                   <label>Age</label><br>
                                    {{Form::checkbox('age[]','18-24')}}18-24 <br>
                                    {{Form::checkbox('age[]','25-34')}}25-34<br>
                                    {{Form::checkbox('age[]','35-44')}}35-44<br>
                                    {{Form::checkbox('age[]','45 +')}}45 +
                                </div-->
                              </div>
                        </div>
                             </div>
                          <div class="col-md-12 text-right mt-3 pr-5">
              
                {{ Form::submit('Apply!',['class'=>'btn btn-primary mb-4']) }}
           
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                     </div> 
                   </div>
                    <div id="menu2" class="tab-pane fade1 in ">
                        <h3 style="color: #fff;">Offers</h3>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="dropdown12 text-white" id="video">
                           <h4>Categories </h4>
                {!!Form::open(['action' => 'AuthController@showOffer', 'method' => 'post', 'files'=>true])!!}
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

                               {{Form::radio('type', 'audio', false ,['class'=>'media audio'])}} Audio
                         <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                           
                            </label><br>
                            <label class="">
                               {{Form::radio('type', 'video', false ,['class'=>'media video'])}} Video 
                          <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                            
                          </label><br>
                      
                        </div>
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                  
      
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} lowest
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
                      
                     
                        
                    <div class="col-md-12 text-right pr-5">

               
         <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2"value=" Advance Filter option  &#8594;" >
          {{ Form::submit('Apply!',['class'=>'btn btn-primary mb-4']) }}
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
                          {{Form::radio('price', 'free', false ,['class'=>'user'])}} Free

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
                               {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
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
                      
                     
                        
                    <div class="col-md-12 text-right pr-5">
              
                {{ Form::submit('Apply!',['class'=>'btn btn-primary mb-4']) }}
                       </div>
              <div class="col-md-6">
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                      
                    
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
					  <a href="{{url('/register')}}" class="nav-item nav-link">Register</a>
              <a href="{{url('/login')}}" class="nav-item nav-link">  Login</a>  
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
         <button class="dropdown-item" type="button">
        <a href="{{url('/my-requests')}}">Requests</a></button>
  </div>
   <hr/ style="color:white;background: white;">
  <b>{{$userProfile[0]->tokens}}</b><b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
   <a href="{{url('/addToken')}}"><i class="fa fa-plus text-white" aria-hidden="true"></i></a>
 </span>
  

</div>
@endif
 <!-- Modal -->


    <li class="nav-item dropdown" style="padding: 0px !important">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i style="font-size: 27px !important;"   class="fa fa-comment" aria-hidden="true"></i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                 <h5 class="text-center"> Notification</h5><br>
      @foreach($notification as $val)
    @if($val->notificationfor=='user')
    
      <a href="{{url('artist/readNotification/'.$val->id)}}">{{$val->message}}</a>
    
  
    <hr>
    @endif
    @endforeach
     <a href="{{url('notification/user')}}"><span class="text-center text-dark">See More -></span></a>
                </div>
              </li>




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
.tab-content h3 {
    margin-left: -36px;
}
.col-md-4.mb-4.logy {
    padding-left: 36px;
}
.col-md-4.mb-4.ass {
    margin-left: -28px;
}
  .notif {
    width: 300px;
    background: white;
    max-height: 300px;
    height: auto;
    border: 1px solid;
    z-index: 999;
    overflow: hidden;
    padding: 12px;
    overflow-x: auto;
    text-align: center;
}

.notif.text-center ul li {
    list-style: none;
    text-align: center;
    padding: 0 !important;

}

.notif.text-center ul li a {
    font-weight: 900;
}
  i.fa.fa-comment:hover {
      color: #fc0 !important;
  }
  .dropdown12 {
     
     height: 248px;
      overflow-y: scroll;

  }
  .dropdown-menu.notif.text-center.show {
    left: -156px;
}
.tab-pane h3 {
    padding-left: 51px;
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
.price::placeholder { 
  color: red;
  opacity: 1;
}

.price:-ms-input-placeholder { 
  color: red;
}

.price::-ms-input-placeholder { 
  color: red;
}

  span.text-center.text-dark {
    padding: 9px;
    background: white;
    width: 298px;
    position: absolute;
    top: 263px;
    color: blue !important;
    right: 1px;
} 
.nav-tabs {
    border-bottom: 1px solid #dee2e6;
    background: #7b0000;
    border-top: 1px solid #dee2e6;
}
</style>
 @if($errors->all())
  <script type="text/javascript">
      //alert('rrr');
   </script>
  @endif
