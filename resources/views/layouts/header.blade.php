@include('layout.cdn')

<link rel="stylesheet" href="{{asset('design/header.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>



<header id="default_header" class="header_style_1">
  <!-- header bottom -->

  <div class="mobilebar">
    <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="search_meu mt-1">
				
        <ul class="nav custom search">
            <li id="options" onclick="mufunc()">
              <a href="#"><img width="30px" src="{{asset('images/logos/filter.png')}}"></a></li>
             
          
            <li id="search">
            <form action="" method="get">
            
                <input type="text" name="search_text" id="search_text" placeholder="Search"/>

                <input type="button" name="search_button" id="search_button"></a>
            </form>
            </li>
          </ul>
        
        
        </div>
     
        <ul class="subnav" style="display: none">
                <ul class="nav nav-tabs text-center">
                  <li class="active link_click nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#home">Video</a>
                  </li>
                  <li class="link_click nav-item" role="presentation">
                  <a class="nav-link " id="menu1-tab" data-toggle="tab"  role="tab" aria-controls="menu1" aria-selected="true" href="#menu1">Audio</a>
                  </li>
                  <li class="link_click nav-item" role="presentation">
                  <a class="nav-link " id="menu4-tab" data-toggle="tab"  role="tab" aria-controls="menu4" aria-selected="true" href="#menu4">Artists</a>
                  </li>
                  <li  class="link_click nav-item" role="presentation" >
                  <a class="nav-link " id="menu2-tab" data-toggle="tab"  role="tab" aria-controls="menu2" aria-selected="true" href="#menu2">Service(s)</a>
                  </li>
                  </ul>
                   

                   <!-- --------------------------Tab Content --------------------------->




                  <div class="tab-content">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <h3 style="color: #fff;">Videos</h3>
                  <div class="row">
                  <div class="col-6">
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

                   <input type="hidden" name="type" value="video"/>

                        <div class="col-6 ">
                          <div class="bar rightbar">
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
                         <br>
                          <label class=""> 
                             {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
                       <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                         
                          </label><br>
                          <label class="">
                             {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
                        <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                          
                        </label><br>
                    
                      </div>
                        <div class="collapse pt-4" id="collapseExample1" style="display:block;">
              @include('popup') 
            </div>
                    </div>
                  </div>
                    
                  <div class="col-6">
                       <h4 class="text-white"><input type="checkbox">Save filter options</h4>
                      </div>
                      
                  <div class="col-6 text-right pr-5">
            
             
       <!-- <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;" > -->
        {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
            </div>
            <div class="col-md-6">
                     
          
          </div>
                   
                     
                       {{ Form::close() }}
                    
                  
                   </div>
                  </div>


                    <!-- -------------------------- 2nd Tab  Start--------------------------->


                  <div class="tab-pane fade " id="menu1" role="tabpanel" aria-labelledby="menu1-tab">
                    <h3 style="color: #fff;">Audio</h3>
                      <div class="row">
                    <div class="col-6">
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
                       <input type="hidden" name="type" value="audio"/>
                     <div class="col-6">
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
                    
                           <div class="dropdown1 audio12 text-white">
                         <h4 >Duration</h4>
                          <label>  
                         {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest

                          </label><br>
                          <label >
                      {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
            
                        
                        </label>
                        <!-- Modal -->
                        <div class="collapse pt-4" id="audio123">
                                      <div class="row">
                                      <div class="col-md-12 mb-4">
                                               <h4>Gender</h4><br>
                                                  {{Form::checkbox('gender[]','Male')}}Male <br>
                                                  {{Form::checkbox('gender[]','Female')}}Female <br>
                                                 {{Form::checkbox('gender[]','Trans')}}Trans 
                                                </div>
                                            <div class="col-md-12 mb-4">
                                            <h4>Sexology</h4><br>
                                                {{Form::checkbox('sexology[]','Hetero')}}Hetero <br>
                                               {{Form::checkbox('sexology[]','Homo')}}Homo <br>
                                                 {{Form::checkbox('sexology[]','Bisexual')}}Bisexual 
                                             </div>
                                      </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-6">
                       <h4 class="text-white"><input type="checkbox">Save filter options</h4>
                      </div>
                          <div class="col-6 pr-5 text-right">
                          <!-- <input type="button" class="btn btn-primary section_advance mb-4 mr-3" href="#audio123" data-toggle="collapse"   aria-controls="audio123"  aria-expanded="false"  aria-controls="collapseExample1" value=" Advance Filter option  &#8594;" > -->
                     {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
                    {{ Form::close() }}
                   </div> 
                          </div>
                         
                    </div>
                    

                      <!-- -------------------------- 3rd Tab  Start--------------------------->

                
                  <div  class="tab-pane fade " id="menu4" role="tabpanel" aria-labelledby="menu4-tab">
                    <!-- <h3 style="color: #fff;">Artists</h3> -->
                    <div class="row">
                           {!!Form::open(['action' => 'AuthController@getSelectingArtist', 'method' => 'post', 'files'=>true])!!}
                    {{Form::token()}}
                        <div class="col-md-12">
                           <div class="scroll12">
                             
                          
                           <div class=" text-left text-white mt-3 red">
                                <div class="col-md-4 mb-4  das">
                                  <label>Gender</label><br>
                                  {{Form::radio('gender[]','Male')}}Male <br>
                                  {{Form::radio('gender[]','Female')}}Female <br>
                                  {{Form::radio('gender[]','Trans')}}Trans 
                                </div>
                                <div class="col-md-4 mb-4 logy">
                                  <label>Sexology</label><br>
                                  {{Form::checkbox('sexology[]','Hetero')}}Hetero <br>
                                  {{Form::checkbox('sexology[]','Homo')}}Homo <br>
                                  {{Form::checkbox('sexology[]','Bisexual')}}Bisexual <br>
                                  <br>
                                  <label>Body</label><br>
                                  {{Form::checkbox('weight[]','Less than Average')}} Thin <br>
                                  {{Form::checkbox('weight[]','Normal')}}Normal <br>
                                  {{Form::checkbox('weight[]','Muscular')}}Muscular<br> 
                                  {{Form::checkbox('weight[]','Chubby')}}Chubby 
                                  <br>
                                            <br>
                                    <label>Height</label><br>
                                  {{Form::checkbox('height[]','<140cm')}}<140cm <br>
                                  {{Form::checkbox('height[]','140-160cm')}}140-160cm <br>
                                  {{Form::checkbox('height[]','160-180cm')}}160-180cm <br>
                                  {{Form::checkbox('height[]','180cm<')}}180cm< <br>
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
                                  <input type="hidden" name="type" value="artists"/>
</div>
                                  
                                <div class="col-md-4 mb-4 logy">
                                    <label>Privy part</label><br>
                                  {{Form::checkbox('privy[]','Shaved')}}Shaved <br>
                                  {{Form::checkbox('privy[]','Unshaved')}}Unshaved <br>
                                       
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
                        <div class="col-md-12 text-right mt-3 pr-5">
            
              {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
         
                     
          
          </div>
                   
                     
                       {{ Form::close() }}
                   </div> 
                 </div>



                       <!-- -------------------------- 4th Tab  Start--------------------------->





                  <div class="tab-pane fade " id="menu2" role="tabpanel" aria-labelledby="menu2-tab">
                      <h3 style="color: #fff;">Service(s)</h3>
                  <div class="row">
                  <div class="col-6">
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

                        <div class="col-6 ">
                          <div class="bar rightbar">
                             <div class="dropdown1 text-white">
                         <h4 >Media</h4>
                         <br>
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
                          
                          <br>
    
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
                    
                   
                     <div class="col-6">
                       <h4 class="text-white"><input type="checkbox">Save filter options</h4>
                      </div>
                  <div class="col-6 text-right pr-5">

             
       <!-- <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2"value=" Advance Filter option  &#8594;" > -->
        {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
            </div>
            <div class="col-md-6">
                     
          
          </div>
                   
                     
                       {{ Form::close() }}
                    
                  
                   </div>
                  </div>

                    <!-- -------------------------- 5th Tab  Start--------------------------->

                  
                      <div class="tab-pane fade " id="" role="tabpanel" aria-labelledby="-tab">
                  <div class="row">
                  <div class="col-6">
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

                        <div class="col-6 ">
                          <div class="bar rightbar">
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
                         <br>
                          <label class=""> 
                             {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
                       <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                         
                          </label><br>
                          <label class="">
                             {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
                      
                          
                        </label><br>
                    
                      </div>
                        <div class="collapse pt-4" id="collapseExample1" style="display:block;">
              @include('popup') 
            </div>
                    </div>
                  </div>
                    
                   
                      
                  <div class="col-md-12 text-right pr-5">
            
              {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
                     </div>
            <div class="col-md-6">
                     
          
          </div>
                   
                     
                       {{ Form::close() }}
                    
                  
                   </div>
                  </div>
                 
              </ul>



            <hr>
        <div class="mobilenav12">
         <div class="pl-5"> 
         @if(!$login)
					  <a href="{{url('/register')}}" class="nav-item nav-link">Join Free</a>
              <a href="{{url('/login')}}" class="nav-item nav-link"> Login</a>  
           @endif 
           @if($login)
         <span class="profile-img text-white">
            {{$login->nickname}}
            <hr/ style="color:white;background: white;">
            <b style="color:gold; font-family: 'Roboto';font-size: 16px;">{{$userProfile ? $userProfile[0]->tokens: ''}}</b>    <b style="color:gold; font-size:16px;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
           
          </span>
          @endif
        </div>
          <br>
        <a href="{{url('/addToken')}}"><i class="fa fa-plus text-white" aria-hidden="true"></i> Add Tocken</a>
       <br>
        <a href="{{url('/play')}}"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i> Library</a>
         <br>
        <a href="{{url('/seeall1/orders')}}"  class="nav-item nav-link">
    <i style="font-size: 21px !important;" class="fa fa-list-alt" aria-hidden="true"></i> Orders
    @if($login && $latestOffer)
    <div class="noti" style="{{$latestOffer->userid == $login->id && $latestOffer->is_seen=='no' ? 'display: block' : 'display: none' }}">
    </div>
    @endif
    </a>
    <br>
    <a href="{{url('notification/user')}}" class="nav-item nav-link"> <i style="font-size: 27px !important;"   class="fa fa-bell" aria-hidden="true"></i>  Notifications</a> 
    <br>
        <a href="{{url('/logout')}}"> <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
</div>

</div>


    <span style="font-size:30px;cursor:pointer" class="togg" onclick="openNav()">&#9776;</span>

    <div class="logomobile text-center">
    <a href="{{url('/')}}" class="navbar-brand">
						<img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
					</a>
     </div>
     <div class="subscrive">
       <ul>
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
                                  <div class="online" style="{{$artist->is_seen=='no' || $artist->mediaseen=='0' ? 'display:block' :'display:none' }}">
                                      </div>
                              </div>
                    </div>
                    </a>
                    @endforeach
                 
                                   </div>
                    </div>

                    
                </div>
                
              </li>
       </ul>
     </div>
</div>




  <div class="header_bottom">

		<div class="container">	
			<div class="bs-example">
				<nav class="navbar navbar-expand-md navbar-light">
					<a href="{{url('/')}}" class="navbar-brand">
						<img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
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
                  <li class="active link_click nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#home">Videos</a>
                  </li>
                  <li class="link_click nav-item" role="presentation">
                  <a class="nav-link " id="menu1-tab" data-toggle="tab"  role="tab" aria-controls="menu1" aria-selected="true" href="#menu1">Audios</a>
                  </li>
                  <li class="link_click nav-item" role="presentation">
                  <a class="nav-link " id="menu4-tab" data-toggle="tab"  role="tab" aria-controls="menu4" aria-selected="true" href="#menu4">Artists</a>
                  </li>
                  <li  class="link_click nav-item" role="presentation" >
                  <a class="nav-link " id="menu2-tab" data-toggle="tab"  role="tab" aria-controls="menu2" aria-selected="true" href="#menu2">Services</a>
                  </li>
                  </ul>
                   

                   <!-- --------------------------Tab Content --------------------------->




                  <div class="tab-content">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <h3 style="color: #fff;">Video</h3>
                  <div class="row">
                  <div class="col-6">
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

                   <input type="hidden" name="type" value="video"/>

                        <div class="col-6 ">
                          <div class="bar rightbar">
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
                         <br>
                          <label class=""> 
                             {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
                       <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                         
                          </label><br>
                          <label class="">
                             {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
                        <!--  {{Form::checkbox('duration','desc')}}Longest  -->
                          
                        </label><br>
                    
                      </div>
                        <div class="collapse pt-4" id="collapseExample1" style="display:block;">
                        <h4 class="text-white">Quality</h4>
                                            <label class=""></label>
                                            <label class="text-white"> {{Form::checkbox('Quality[]','480p')}}480p </label><br>
                                            <label class="text-white"> {{Form::checkbox('Quality[]','720p')}}720p HD</label> <br>
                                            <label class="text-white">  {{Form::checkbox('Quality[]','1080p')}}1080p Full HD </label>

              @include('popup') 
            </div>
                    </div>
                  </div>
                    
                  <div class="col-md-6">
                       <h4 class="text-white"><input type="checkbox">Save filter options</h4>
                      </div>
                      
                  <div class="col-md-6 text-right pr-5">
            
             
       <!-- <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1"value=" Advance Filter option  &#8594;" > -->
        {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
            </div>
            <div class="col-md-6">
                     
          
          </div>
                   
                     
                       {{ Form::close() }}
                    
                  
                   </div>
                  </div>


                    <!-- -------------------------- 2nd Tab  Start--------------------------->


                  <div class="tab-pane fade " id="menu1" role="tabpanel" aria-labelledby="menu1-tab">
                    <h3 style="color: #fff;">Audios</h3>
                      <div class="row">
                    <div class="col-6">
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
                       <input type="hidden" name="type" value="audio"/>
                     <div class="col-6">
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
                    
                           <div class="dropdown1 audio12 text-white">
                         <h4 >Duration</h4>
                         <label class="">
          

                     
                          
          </label><br>
                          <label>  
                         {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest

                          </label><br>
                          <label >
                      {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
            
                        
                        </label> <br>
                        <br>
                        <!-- Modal -->
                       
                                               <h4>Gender</h4>
                                               <label class=""></label><br>
                                               <label> {{Form::radio('gender[]','Male')}}Male </label><br>
                                               <label> {{Form::radio('gender[]','Female')}}Female </label><br>
                                               <label> {{Form::radio('gender[]','Trans')}}Trans </label>
                                                
                                               <br>
                                               <label class=""></label><br>
                                            <h4>Sexology</h4>
                                            <label class=""></label><br>
                                            <label> {{Form::checkbox('sexology[]','Hetero')}}Hetero </label><br>
                                            <label> {{Form::checkbox('sexology[]','Homo')}}Homo</label> <br>
                                            <label>  {{Form::checkbox('sexology[]','Bisexual')}}Bisexual </label>
                                            
                                     
                                
                              </div>
                              </div>
                       
                        <div class="col-md-6">
                       <h4 class="text-white"><input type="checkbox">Save filter options</h4>
                      </div>
                          <div class="col-md-6 pr-5 text-right">
                          <!-- <input type="button" class="btn btn-primary section_advance mb-4 mr-3" href="#audio123" data-toggle="collapse"   aria-controls="audio123"  aria-expanded="false"  aria-controls="collapseExample1" value=" Advance Filter option  &#8594;" > -->
                     {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
                    {{ Form::close() }}
                   </div> 
                          </div>
                         
                    </div>
                    

                      <!-- -------------------------- 3rd Tab  Start--------------------------->

                
                  <div  class="tab-pane fade " id="menu4" role="tabpanel" aria-labelledby="menu4-tab">
                    <h3 style="color: #fff;">Artists</h3>
                    <div class="row">
                           {!!Form::open(['action' => 'AuthController@getSelectingArtist', 'method' => 'post', 'files'=>true])!!}
                    {{Form::token()}}
                        <div class="col-md-12">
                           <div class="scroll12">
                             
                          
                        <div class="row text-left text-white mt-3 red">
                                <div class="col-4 mb-4  das">
                                  <label>Gender</label><br>
                                  <label>{{Form::radio('gender[]','Male')}}Male </label>
                                  <br>
                                  <label> {{Form::radio('gender[]','Female')}}Female</label>
                                  <br>
                                  <label>{{Form::radio('gender[]','Trans')}}Trans </label>
                                </div>
                                <div class="col-4 mb-4 logy">
                                  <label>Sexology</label><br>
                                  <label> {{Form::checkbox('sexology[]','Hetero')}}Hetero </label> <br>
                                  <label> {{Form::checkbox('sexology[]','Homo')}}Homo</label><br>
                                  <label> {{Form::checkbox('sexology[]','Bisexual')}}Bisexual </label><br>
                                  <br>
                                  </div>
                                  <div class="col-4 mb-4 logy">
                                  <label>Body</label><br>
                                  <label> {{Form::checkbox('weight[]','Less than Average')}} Thin </label><br>
                                  <label> {{Form::checkbox('weight[]','Normal')}}Normal </label><br>
                                  <label> {{Form::checkbox('weight[]','Muscular')}}Muscular</label> <br>
                                  <label> {{Form::checkbox('weight[]','Chubby')}}Chubby 
                                      </div>
                                      <div class="col-4 mb-4 logy">
                                    <label>Height</label><br>
                                    <label>{{Form::checkbox('height[]','<140cm')}}<140cm </label> <br>
                                    <label>{{Form::checkbox('height[]','140-160cm')}}140-160cm </label> <br>
                                    <label> {{Form::checkbox('height[]','160-180cm')}}160-180cm </label><br>
                                    <label> {{Form::checkbox('height[]','180cm<')}}180cm<  </label> <br>
                                </div>
                                
                                <div class="col-4 mb-4">
                                    <label>Tits size</label><br>
                                    <label> {{Form::checkbox('titssize[]','Small')}}Small </label><br>
                                    <label> {{Form::checkbox('titssize[]','Normal')}}Normal </label><br>
                                    <label> {{Form::checkbox('titssize[]','Big')}}Big </label>
                                </div>
                                 <div class="col-4 mb-4 ">
                                  <label>Ass</label><br>
                                  <label> {{Form::checkbox('ass[]','Small')}}Small </label><br>
                                  <label> {{Form::checkbox('ass[]','Normal')}}Normal </label><br>
                                 
                                  <label> {{Form::checkbox('ass[]','Big')}}Big </label>
                                  <br>
                                  <br>
                                  <input type="hidden" name="type" value="artists"/>

                                  </div>
                                <div class="col-4 mb-4 logy">
                                    <label>Privy part</label><br>
                                    <label> {{Form::checkbox('privy[]','Shaved')}}Shaved</label><br>
                                    <label> {{Form::checkbox('privy[]','Unshaved')}}Unshaved </label><br>
                                  <br>
                                  <br>
                                  <label>Hair Length</label><br>
                                  <label> {{Form::checkbox('hairlength[]','Very short')}}Very short </label><br>
                                  <label> {{Form::checkbox('hairlength[]','Short')}}Short </label><br>
                                  <label> {{Form::checkbox('hairlength[]','Long')}}Long </label><br>
                                  <label> {{Form::checkbox('hairlength[]','Very Long')}}Very Long </label><br>
                                       
                                </div>
                                 <div class="col-4 mb-4">
                                  <label>Eyes/lenses</label><br><br>
                                  <label> {{Form::checkbox('eyecolor[]','blue')}}Blue </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','brown')}}Brown </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','brown-green')}}Brown-green</label> <br>
                                  <label> {{Form::checkbox('eyecolor[]','golden')}}Golden </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','gray')}}Gray </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','green')}}Green</label><br>
                                  <label> {{Form::checkbox('eyecolor[]','red')}}Red </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','white')}}White </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','yellow')}}Yellow </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','indigo')}}Indigo </label><br>
                                  <label> {{Form::checkbox('eyecolor[]','violet')}}Violet </label><br>
                                </div>
                                      <div class="col-4 mb-4 ">
                                  <label>Hair color</label><br><br>
                                  <label> {{Form::checkbox('haircolor[]','blue')}}Blue </label><br>
                                  <label> {{Form::checkbox('haircolor[]','brown')}}Brown </label><br>
                                  <label> {{Form::checkbox('haircolor[]','black')}}Black</label> <br>
                                  <label> {{Form::checkbox('haircolor[]','blonde')}}Blonde </label><br>
                                  <label> {{Form::checkbox('haircolor[]','gray')}}Gray </label><br>
                                  <label> {{Form::checkbox('haircolor[]','green')}}Green</label><br>
                                  <label> {{Form::checkbox('haircolor[]','red')}}Red </label><br>
                                  <label> {{Form::checkbox('haircolor[]','white')}}White </label><br>
                                  <label>  {{Form::checkbox('haircolor[]','yellow')}}Yellow </label><br>
                                  <label> {{Form::checkbox('haircolor[]','silver')}}Silver </label><br>
                                  <label> {{Form::checkbox('haircolor[]','indigo')}}Indigo </label><br>
                                  <label> {{Form::checkbox('haircolor[]','violet')}}Violet </label><br>
                                </div>
                               
                                 <div class="col-4 mb-4 logy">
                                   
                                </div>
                                 <div class="col-md-4 mb-4">
                                 
                                </div>
                                
                            </div>
                      </div>
                           </div>
                        <div class="col-md-12 text-right my-3 pr-5">
            
              {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
         
                     
          
          </div>
                   
                     
                       {{ Form::close() }}
                   </div> 
                 </div>



                       <!-- -------------------------- 4th Tab  Start--------------------------->





                  <div class="tab-pane fade " id="menu2" role="tabpanel" aria-labelledby="menu2-tab">
                      <h3 style="color: #fff;">Service(s)</h3>
                  <div class="row">
                  <div class="col-6">
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

                        <div class="col-6 ">
                          <div class="bar rightbar">
                             <div class="dropdown1 text-white">
                         <h4 >Media</h4>
                         <br>
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
                          
                           <br>
    
                          <label class="text-white">
                        {{Form::radio('price', 'asc', false ,['class'=>'user'])}} Lowest
                            <!--  {{Form::checkbox('price','asc')}}lowest   -->
                          </label><br>
                          <label class="">
                             {{Form::radio('price', 'desc', false ,['class'=>'user'])}} Highest
                       <!--       {{Form::checkbox('price','desc')}}Higest   -->
                          
                          </label>
                     
                      </div>

                     
                      <div class="collapse pt-4" id="collapseExample1" style="display:block;">
              @include('popup') 
            </div>
                    </div>
                  </div>
                    
                   
                     <div class="col-md-6">
                       <h4 class="text-white"><input type="checkbox">Save filter options</h4>
                      </div>
                  <div class="col-md-6 text-right pr-5">

             
       <!-- <input type="button" class="btn btn-primary section_advance mb-4 mr-3" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2"value=" Advance Filter option  &#8594;" > -->
        {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
            </div>
            <div class="col-md-6">
                     
          
          </div>
                   
                     
                       {{ Form::close() }}
                    
                  
                   </div>
                  </div>

                    <!-- -------------------------- 5th Tab  Start--------------------------->

                  
                      <div class="tab-pane fade " id="" role="tabpanel" aria-labelledby="-tab">
                  <div class="row">
                  <div class="col-6">
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

                        <div class="col-6 ">
                          <div class="bar rightbar">
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
                         <br>
                          <label class=""> 
                             {{Form::radio('duration', 'asc', false ,['class'=>'user'])}} Shortest
                       <!--   {{Form::checkbox('duration','asc')}}Shortest  -->
                         
                          </label><br>
                          <label class="">
                             {{Form::radio('duration', 'desc', false ,['class'=>'user'])}} Longest
                      
                          
                        </label><br>
                    
                      </div>
                        <div class="collapse pt-4" id="collapseExample1" style="display:block;">
              @include('popup') 
            </div>
                    </div>
                  </div>
                    
                   
                      
                  <div class="col-md-12 text-right pr-5">
            
              {{ Form::submit('Apply!',['class'=>'btn btn-primary mt-4']) }}
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
					
		<a href="{{url('/play/'.$addedLibrary->id)}}"  class="nav-item nav-link"><i style="font-size: 21px !important;" class="fa fa-play" aria-hidden="true"></i> Library
    <div class="noti" style="{{$addedLibrary->read=='0' ? 'display:block' : 'display:none'}}"></div></a>
    <a href="{{url('/seeall1/orders')}}"  class="nav-item nav-link">
    <i style="font-size: 21px !important;" class="fa fa-list-alt" aria-hidden="true"></i> My Orders
    @if($login && $latestOffer)
    <div class="noti" style="{{$latestOffer[0]->userid == $login->id && $latestOffer[0]->is_seen=='no' ? 'display: block' : 'display: none' }}">
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
  <b style="color:gold;font-family: 'Roboto';font-size: 16px;">{{$userProfile ? $userProfile[0]->tokens: ''}}</b>    <b style="color:gold;font-size: 16px;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b>
   <a href="{{url('/addToken')}}"><i class="fa fa-plus text-white" aria-hidden="true"></i></a>
 </span>
  

</div>
@endif
 <!-- Modal -->


    <li class="nav-item dropdown" style="padding: 0px !important">
  <a class="nav-link text-white " href="javascript:;" id="navbarDropdownProfile" onclick="updateRead()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  @if($login)

               <input type='hidden' value="{{$addedLibrary->read}}" data="{{$count}}"/>
               <!-- <div class="noti-icon" style="{{ $count > 0 ? 'display: block' : 'display: none' }}"><p>{{$count}}</p></div--> 
               <i style="font-size: 27px !important;"   class="fa fa-bell" aria-hidden="true"></i>
               <div class="noti" style="{{ $count > 0 || $addedLibrary->read=='0' ? 'display: block' : 'display: none' }}"></div>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                @endif
                <div class="dropdown-menu dropdown-menu-right notif text-center" aria-labelledby="navbarDropdownProfile">
                <br>
                @if($notification)
      @foreach($notification as $val)
    @if($val->notificationfor=='user' || $val->notificationfor=='addedVideo')
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
                        <img src="{{$artist->profilepicture ? url('storage/app/public/uploads/'.$artist->profilepicture) : asset('images/profile-dummy.png')}}" class="img-fluid">
                        </div>
                                <div class="col-6 mt-3">
                                <p>{{$artist->nickname}}</p>
                                </div>
                              <div class="col mt-3">
                                  <div class="online" style="{{$artist->is_seen=='no' || $artist->mediaseen=='0' ? 'display:block' :'display:none' }}">
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
  .ml4 {
  position: relative;
  font-weight: 900;
  font-size: 4.5em;
}
.ml4 .letters {
  position: absolute;
  margin: auto;
  left: 0;
  top: 0.3em;
  right: 0;
  opacity: 0; 
}
.dropdown1.audio12.text-white {
    height: 159px;
    overflow-y: scroll;
}
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #ccc9c9; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #ccc9c9; 
}
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
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #7b0000;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #d7d2d2;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.mobilebar {
    display: none;
}
@media screen and (max-width: 768px) {
.header_bottom {
    display: none;
}
.col-md-4.subss{
  right:0px !important;
}
.mobilebar {
    display: Block;
}
ul.nav.custom.search {
    height: 40px;
    margin-left: 18px;
    display: inline-block;
    margin-bottom: 12px;
}
li#options {
    background: #fff;
    height: 100%;
    padding: 7px 8px 5px 8px;
    height: 35px;
    width: 40px;
}
ul.nav.nav-tabs li a {
    color: white;
    font-weight: bolder;
}
.tab-content {
    background: #7b0000;
}
.subnav{
  width:100%;
  position:unset;
}
footer {
    padding: 60px 0 !important;
}
footer {
    padding: 60px 0 !important;
}
ul.nav.custom.search img {
    margin-top: -12px;
    margin-left: -33px;
}
.search_meu {
    float: None;
}
.mobilenav12 {
    padding-left: 35px;
}
li.link_click.active a {
    color: gold !important;
    padding-right: 75px;
}
.logomobile.text-center a {
    margin-left: -25px;
}
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
span.togg {
    float: left;
    margin-left: 11px;
    margin-top: 9px;
}

.subscrive {
    float: right;
    margin-top: -51px;
    font-size: 27px;
}
.mobilebar {
    background: #7b0000;
}
#search {
    width: 280px;
}
.online {
    background: #3390ff;
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
.Playlist1 {
    max-height: 216px;
    overflow-y: scroll;
    padding-top: 10px;
}
.noti-icon p {
    color: white;
    font-weight: bold;
    margin-top: -1px;
}
}
.red{
  color:red !important;
}
.green{
  color:green !important;
}
.orange{
  color:orange !important;
}
</style>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
 @if($errors->all())
  <script type="text/javascript">
      //alert('rrr');
   </script>
  @endif
  <script>
    var ml4 = {};
ml4.opacityIn = [0,1];
ml4.scaleIn = [0.2, 1];
ml4.scaleOut = 3;
ml4.durationIn = 800;
ml4.durationOut = 600;
ml4.delay = 500;

anime.timeline({loop: true})
  .add({
    targets: '.ml4 .letters-1',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-1',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-2',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-2',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4 .letters-3',
    opacity: ml4.opacityIn,
    scale: ml4.scaleIn,
    duration: ml4.durationIn
  }).add({
    targets: '.ml4 .letters-3',
    opacity: 0,
    scale: ml4.scaleOut,
    duration: ml4.durationOut,
    easing: "easeInExpo",
    delay: ml4.delay
  }).add({
    targets: '.ml4',
    opacity: 0,
    duration: 500,
    delay: 500
  });
  </script>