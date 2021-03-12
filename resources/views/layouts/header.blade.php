@include('layout.cdn')
<link rel="stylesheet" href="{{asset('design/header.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<header id="default_header" class="header_style_1">
  <!-- header bottom -->

  <div class="header_bottom">

		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="{{url('/')}}" class="navbar-brand">
						<img src="{{asset('images/logos/logo_black.png')}}" height="50" alt="CoolBrand">
					</a>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>

    
                     <!----------------------------- search Menu --------------------->


					<div class="search_meu">
				
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
                     

                     <!-- --------------------------Tab Content --------------------------->




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
                       

                          <!--    {{Form::checkbox('price','free')}}Free   -->
                          
                            </label><br>
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} Lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Highest
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


                      <!-- -------------------------- 2nd Tab  Start--------------------------->


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
            

                       
                            
                            </label><br>
                            <label class="">  
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} Lowest
                      
                            </label><br>
                            <label class=""> 
                          {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Highest
                             
                            
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


                        <!-- -------------------------- 3rd Tab  Start--------------------------->

                  
                    <div id="menu4" class="tab-pane fade">
                      <h3 style="color: #fff;">Artists</h3>
                      <div class="row">
                             {!!Form::open(['action' => 'AuthController@getSelectingArtist', 'method' => 'post', 'files'=>true])!!}
                      {{Form::token()}}
                          <div class="col-md-12">
                             <div class="scroll12">
                               
                            
                          <div class="row text-left text-white mt-3 red">
                                  <div class="col-md-4 mb-4  das">
                                    <label>Gender</label><br>
                                    {{Form::checkbox('gender[]','Male')}}Male <br>
                                    {{Form::checkbox('gender[]','Female')}}Female <br>
                                    {{Form::checkbox('gender[]','Trans')}}Trans 
                                  </div>
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
                                   <div class="col-md-4 mb-4 ">
                                    <label>Ass</label><br>
                                     {{Form::checkbox('ass[]','Small')}}Small <br>
                                    {{Form::checkbox('ass[]','Normal')}}Normal <br>
                                   
                                    {{Form::checkbox('ass[]','Big')}}Big 
                                    <br>
                                    <br>
                                    <label>Body</label><br>
                                    {{Form::checkbox('weight[]','Less than Average')}} Thin <br>
                                    {{Form::checkbox('weight[]','Normal')}}Normal <br>
                                    {{Form::checkbox('weight[]','Muscular')}}Muscular<br> 
                                    {{Form::checkbox('weight[]','Chubby')}}Chubby 
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
                                    <label>Eyes/lenses</label><br>
                                    {{Form::checkbox('eyecolor[]','blue')}}Blue <br>
                                    {{Form::checkbox('eyecolor[]','brown')}}Brown <br>
                                    {{Form::checkbox('eyecolor[]','brown-green')}}Brown-green<br> 
                                    {{Form::checkbox('eyecolor[]','golden')}}Golden <br>
                                    {{Form::checkbox('eyecolor[]','gray')}}Gray <br>
                                    {{Form::checkbox('eyecolor[]','green')}}Green<br>
                                    {{Form::checkbox('eyecolor[]','red')}}Red <br>
                                    {{Form::checkbox('eyecolor[]','white')}}White <br>
                                    {{Form::checkbox('eyecolor[]','yellow')}}Yellow <br>
                                    {{Form::checkbox('eyecolor[]','indigo')}}Indigo <br>
                                    {{Form::checkbox('eyecolor[]','violet')}}Violet <br>
                                  </div>
                                        <div class="col-md-4 mb-4 ">
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
                                   <div class="col-md-4 mb-4">
                                   
                                  </div>
                                  
                              </div>
                        </div>
                             </div>
                          <div class="col-md-12 text-right mt-3 pr-5">
              
                {{ Form::submit('Apply!',['class'=>'btn btn-primary mb-4']) }}
           
                       
            
            </div>
                     
                       
                         {{ Form::close() }}
                     </div> 
                   </div>



                         <!-- -------------------------- 4th Tab  Start--------------------------->





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
                      <div class="dropdown12 text-white" id="audio" style="display:none">
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
                               {{Form::radio('type', 'video', true ,['class'=>'media video'])}} Video 
                               
                          <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                            
                          </label><br>
                      
                        </div>
                        <div class="dropdown1 text-white">
                           <h4>Price</h4>
                            
                  
      
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} Lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Highest
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

                      <!-- -------------------------- 5th Tab  Start--------------------------->

                    
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
                         

                          <!--    {{Form::checkbox('price','free')}}Free   -->
                          
                            </label><br>
                            <label class="text-white">
                          {{Form::radio('price', 'asc', false ,['class'=>'user'])}} Lowest
                              <!--  {{Form::checkbox('price','asc')}}lowest   -->
                            </label><br>
                            <label class="">
                               {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Highest
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
					
					
					</div>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<div class="navbar-nav">
					
		<a href="{{url('/play')}}"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i>
    <div class="noti"></div></a>
    <a href="{{url('/seeall1/orders')}}"  class="nav-item nav-link">
    <i style="font-size: 21px !important;" class="fa fa-list-alt" aria-hidden="true"></i>
    @if($login && $latestOffer)
    <div class="noti" style="{{$latestOffer->userid !== $login->id && $latestOffer->is_seen=='no' ? 'display: block' : 'display: none' }}">
    </div>
    @endif
    </a>
    
              <!-- <a href="{{url('/userWithdraw')}}" class="nav-item nav-link"><i class="fa fa-money" aria-hidden="true"></i></a>   -->
              <!-- <a href="{{url('/feed')}}" class="nav-item nav-link"><i class="fa fa-newspaper-o"> </i></a>   -->
            


						</div>



<!-- ------------------------------------------ Registration & login Section  Start------------------------------------------->



						<div class="navbar-nav ml-auto">
              @if(!$login)
					  <a href="{{url('/register')}}" class="nav-item nav-link">Join Free</a>
              <a href="{{url('/login')}}" class="nav-item nav-link"> Login</a>  
           @endif             

            @if($login)
           <div class="btn-group login-btn text-right" style="border-right-color: white;border-right-style: solid;">    
             <!-- <a href="{{url('/my-requests')}}"><button type="button" class="btn btn-warning text-white">Create Project</button></a> -->
            <!-- @if($userProfile[0]->profilepicture!=null)
            <img width="50px;" height="50px;" src="{{url('storage/app/public/uploads/'.$userProfile[0]->profilepicture) }}">
    
    @else
    <div class="">
		    	  <span class="firstName" style="display: none;">{{$userProfile ? $userProfile[0]->nickname : ''}}</span>
	           	<div class="profileImage">
               
               </div>
	  </div>
   
   @endif -->
   <span class="profile-img text-white">
   {{$login->nickname}} <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0px;font-size: 16px;font-weight: 400;">
    
   
  </button>
 
   <div class="dropdown-menu dropdown-menu-right">
       <!-- <button class="dropdown-item" type="button">
         <a href="{{url('/profile')}}">Edit Profile
         </a></button> -->
      <button class="dropdown-item" type="button">
        <a href="{{url('/logout')}}">Logout</a></button>
         <!-- <button class="dropdown-item" type="button">
        <a href="{{url('/my-requests')}}">Projects</a></button> -->
  </div>
   <hr/ style="color:white;background: white;">
  <b>{{$userProfile ? $userProfile[0]->tokens: ''}}</b>    <b style="font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
   <a href="{{url('/addToken')}}"><i class="fa fa-plus text-white" aria-hidden="true"></i></a>
 </span>
  

</div>
@endif
 <!-- Modal -->


    <li class="nav-item dropdown" style="padding: 0px !important">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" onclick="updateRead()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  @if($login)
               
               <!-- <div class="noti-icon" style="{{ $count > 0 ? 'display: block' : 'display: none' }}"><p>{{$count}}</p></div--> 
               <i style="font-size: 27px !important;"   class="fa fa-bell" aria-hidden="true"></i>
               <div class="noti" style="{{ $count > 0 ? 'display: block' : 'display: none' }}"></div>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                @endif
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                <br>
                @if($notification)
      @foreach($notification as $val)
    @if($val->notificationfor=='user')
        <?php 
          $GLOBALS['ids'][] = $val->id;
        ?>
    
      <a href="{{url('notification/user')}}" id="bold" class="bold">{{$val->message}}</a>

     
    
  
    <hr>
    @endif
    @endforeach
   
    <input type="hidden" value="<?php echo implode(",",$GLOBALS['ids']); ?>" id="notids"/>
    @endif

    <a href="{{url('notification/user')}}"><span class="text-center text-dark">Notification History -></span></a>
     
                </div>
              </li>
              <li class="nav-item">
              <a class="nav-link text-white" onclick="$('.subss').toggle()" href="{{$login ? '#' : url('/register')}}" ><i class="fa fa-address-card-o"></i></a>
               
               
                <div class="col-md-4 subss" style="display:none;">
                  <h3>Subscriptions</h3>
                  @foreach($subscribed_artist as $artist)
                    <a href="{{url('artistDetail/'.$artist->artistid)}}">
                    <div class="row mb-3">
                      <div class="col">
                        <img src="{{url('storage/app/public/uploads/'.$artist->profilepicture)}}" class="img-fluid">
                        </div>
                                <div class="col-6 mt-3">
                                <p>{{$artist->nickname}}</p>
                                </div>
                              <div class="col mt-3">
                                  <div class="online">
                                      </div>
                              </div>
                    </div>
                    </a>
                    @endforeach
                 
                                   </div>
                    </div>

                    
                </div>
                
              </li>
						</div>
					</div>
				</nav>
		    </div>
	   </div>  
  </div>
  


</header>
<style>
.col-md-4.subss img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}
ul.nav.custom.search ul.subnav {
    width: 523px;
}
.noti-icon {
    color: white;
    border-radius: 50%;
    height: 20px;
    background: #ffa0ae;
    border: 1px solid silver;
    width: 20px;
    padding-left: 5px;
    position: absolute;
    right: 16px;
    top: 4px;
}
#search {
    width: 280px;
}
.online {
    background: red;
    height: 10px;
    margin-left: 20px;
    width: 10px;
    border-radius: 50%;
}
.col-md-4.subss {
    position: absolute;
    background: white;
    right: -82px;
    top: 76px;
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    height: 100vh;
    overflow-y: scroll;
}
.noti {
    background: blue;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    position: absolute;
    top: 10px;
    right: 15px;
}
button.btn.btn-warning.text-white {
    margin-bottom: auto;
    margin-top: 8px;
    height: 36px !important;
    background-color: #ffbb11 !important;
    margin-right: 10px;
    border-bottom-right-radius: 6px !important;
    border-top-right-radius: 6px !important;
    border-radius: 6px;
}
.borderhover:hover {
    border: 2px solid yellow;
    padding-left: 32px;
}

.noti-icon p {
    color: white;
    font-weight: bold;
    margin-top: -1px;
}

</style>
 @if($errors->all())
  <script type="text/javascript">
      //alert('rrr');
   </script>
  @endif