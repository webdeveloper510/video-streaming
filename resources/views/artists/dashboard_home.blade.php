@include('artists.dashboard')

<section class="background1">
<div class="container">

<div class="row mt-5 pt-5 text-center">
  
<div class="titleheader col-md-12" >
     <h3><a href="{{url('artist/Profile')}}" class="text-white">Please upload Media for your Profile Overview here....</a></h3>
</div>
    <div class="col-md-3">
    <!-- <h3 class="text-center">Due</h3> -->
    <a href="{{url('artist/requests/due')}}">
    <div class="columesdashboard">
    <?php 
            $_GLOBEL['count'] =0;
          ?>
          @foreach($count_due_project as $data)
              @if(date('Y-m-d')== $data->dates)
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              @endif
          @endforeach
          
            <h1>{{$_GLOBEL['count']}}</h1>
                  <h4>Order  Due</h4>
    <!-- <div class="row">
      <div class="col-6">
      <?php 
            $_GLOBEL['count'] =0;
          ?>
          @foreach($count_due_project as $data)
              @if(date('Y-m-d')== $data->dates)
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              @endif
          @endforeach
          
            <h1>{{$_GLOBEL['count']}}</h1>
                  <h4>Order </h4>
            </div> 
   
      <div class="col-6">
      <?php 
            $_GLOBEL['count'] =0;
          ?>
          @foreach($count_due_project as $data)
              @if(date('Y-m-d')== $data->dates)
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              @endif
          @endforeach
          
            <h1>{{$_GLOBEL['count']}}</h1>
                  <h4>Project </h4>
            </div> 

    </div> -->

            </div> 
            </a>  
    </div>
         
    <div class="col-md-3">
    <!-- <h3 class="text-center">In Process</h3> -->
    <a href="{{url('artist/requests/process')}}">
    <div class="columesdashboard1">
    <h1>{{$process_total}}</h1>
                  <h4>Order In Process </h4>
    <!-- <div class="row">
      <div class="col-6">
     
                  <h1>{{$process_total}}</h1>
                  <h4>Order </h4>
            </div> 
   
      <div class="col-6">
     
                  <h1>{{$process_total}}</h1>
                  <h4>Project </h4>
            </div> 

    </div> -->

            </div>  
            </a> 
    </div>
    <div class="col-md-3">
    <!-- <h3 class="text-center">Project</h3> -->
    <a href="{{url('artist/requests/new')}}">
    <div class="columesdashboard2">
    <h1>{{$count_new_projects}}</h1>
    <h4 class="text-center">New Order  </h4>
    <!-- <div class="row">
      <div class="col-6">
     
          <h1>{{$count_new_projects}}</h1>
                  <h4>New </h4>
            </div> 
   
      <div class="col-6">
     
            <h1>{{$count_new_projects}}</h1>
                  <h4>Order </h4>
            </div> 

    </div> -->

            </div>   
            </a>
    </div>
   
    <div class="col-md-3">
   <a href="{{url('artist/Profile/collection')}}">
    <div class="columesdashboard3">
           <h1>{{$totalCollection ? $totalCollection : 0}}</h1>
           <h4 class="text-center">Collection Items  </h4>
        </div>  
        </a>   
    </div>
</div>

<div class="row">
<!-- <div class="col-md-12">
         <div class="card" style="{{$existTimeFrame>=1 ? 'display:none': 'display:block'}}">
             <div class="week">
             <h5 class="card-title text-left pt-3 pl-3">We want to thank you for your early support!<br> You will be automatically promoted from us in the marked timeframe!</h5>
              <hr>
          <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-info send_time" type="button" value='1+2' style="{{array_key_exists('1+2',$count_time_fame) && $count_time_fame['1+2']=='6' ? 'color:grey' : ''}}">Week 1+2</button>
                  <button class="btn btn-info send_time" type="button" value='3+4' style="{{array_key_exists('3+4',$count_time_fame) && $count_time_fame['3+4']=='6' ? 'color:grey' : ''}}">Week 3+4</button>
                  <button class="btn btn-info send_time" type="button" value='5+6' style="{{array_key_exists('5+6',$count_time_fame) && $count_time_fame['5+6']=='6' ? 'color:grey' : ''}}">Week 5+6</button>
                  <button class="btn btn-info send_time" type="button" value='7+8' style="{{array_key_exists('7+8',$count_time_fame) && $count_time_fame['7+8']=='6' ? 'color:grey' : ''}}">Week 7+8</button>
                
                </div>
             <div class="col-md-4">
             <button class="btn btn-info send_time" type="button" style="{{array_key_exists('9+10',$count_time_fame) && $count_time_fame['9+10']=='6' ? 'color:grey' : ''}}">Week 9+10</button>
             <button class="btn btn-info send_time" type="button" style="{{array_key_exists('11+12',$count_time_fame) && $count_time_fame['11+12']=='6' ? 'color:grey' : ''}}">Week 11+12</button>
              <button class="btn btn-info send_time" type="button" style="{{array_key_exists('13+14',$count_time_fame) && $count_time_fame['13+14']=='6' ? 'color:grey' : ''}}">Week 13+14</button>
              <button class="btn btn-info send_time" type="button" style="{{array_key_exists('15+16',$count_time_fame) && $count_time_fame['15+16']=='6' ? 'color:grey' : ''}}">Week 15+16</button>
             </div>
             <div class="col-md-4 ">
             
              <button class="btn btn-info send_time" type="button" style="{{array_key_exists('17+18',$count_time_fame) && $count_time_fame['17+18']=='6' ? 'color:grey' : ''}}">Week 17+18</button>
              <button class="btn btn-info send_time" type="button" style="{{array_key_exists('19+20',$count_time_fame) && $count_time_fame['19+20']=='6' ? 'color:grey' : ''}}">Week 19+20</button>
              <button class="btn btn-info send_time" type="button" style="{{array_key_exists('21+22',$count_time_fame) && $count_time_fame['21+22']=='6' ? 'color:grey' : ''}}">Week 21+22</button>
              <button class="btn btn-info send_time" type="button" style="{{array_key_exists('23+24',$count_time_fame) && $count_time_fame['23+24']=='6' ? 'color:grey' : ''}}">Week 23+24</button>
             </div>
          </div>
          <h5 class="customer1 text-center pt-3 pl-3">--- weeks are counted from the start of customertraffic---</h5>
              <div class="text-right">
              To Confirm your promotion please type {{$timeArray}} :
                <input type="text" value="" id="timeframe"/>

              <button class="btn btn-primary" type="button" id="timeFrame">Activate</button>

              </div>
            </div>
    </div>
    </div> -->
    <div class="col-md-4">
    <div class="card" style=" height: 420px;">
             <h5 class="card-title text-left pt-3 pl-3">Your Info:</h5>
             <hr>
             @if($personal_info[0]->firstname=='')
             <div class="card-body pb-1">
                 {!!Form::open(['action' => 'AuthController@personal_info', 'method' => 'post'])!!}
                 {{Form::token()}}
             {{Form::label('First Name', 'First Name')}} 
                {{Form::text('firstname', '',['class'=>'form-control','placeholder'=>'Enter name','required'])}}
                {{Form::label('Country', 'Country')}} 
                 <select name="country" required>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
</select>
                {{Form::label('Date of Birth', 'Date of Birth')}} 
                
                <input type="date" required name="dob" class="form-control" />
                <br>
                <h5 class="card-title">Email : {{$personal_info[0]->email}}</h5>
                <div class="text-right">
                {{ Form::submit('Apply!',['class'=>'btn btn-light btn-sm']) }}
              </div>
              {{Form::close()}}
              </div>
              @else
              <div class="card-body pb-1 ">
              {!!Form::open(['id'=>'updateUser', 'method' => 'post'])!!}
              {{Form::token()}}
                <h5 class="card-title">First Name : <span class="replace" id="firstname">{{$personal_info[0]->firstname}}</span></h5><br>
                <input type="hidden" value="{{$personal_info[0]->country}}" id="all_country"/>
                <h5 class="card-title">Country : <span class="replace" id="country">{{$personal_info[0]->country}}</span></h5>
                <select name="country" class="form-control country" id="countries" style="display:none">
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
</select>
              <br>
                <h5 class="card-title"> Date of Birth : {{$personal_info[0]->dob}} </h5><br>
               
                <h5 class="card-title">Email : <span class="replace" id="email">{{$personal_info[0]->email}}</span></h5>
                <div class="text-right">
                
                {{ Form::button('edit!',['class'=>'btn btn-light btn-sm edit12' , 'id'=>'edit']) }}
                
                <div style="display:none;">{{ Form::submit('Apply!',['class'=>'btn btn-light btn-sm mt-3','id'=>'update']) }}</div>
                {{Form::close()}}
              </div>
            </div>
            @endif

            </div>
             <!-- <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">New Messages:</h5>
             <hr>
              <div class="card-body">
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
                <h5 class="card-title">Clint Name :</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.<span class="text-right ml-5 pl-5"><a href="#">Ready</a></span></p>
               
              </div>
            </div> -->
           
    </div>
    <div class="col-md-4">
    <a href=" {{url('/artist/earning')}}">
         <div class="card" style="    height: 420px;">
             <h5 class="card-title text-left pt-3 pl-3">Earnings:</h5>
             <hr>
              <div class="card-body text-center">
                <h4 class="card-title">Today:</h4>
                <h5>{{$today_paz ? $today_paz[0]->tokens:0}} PAZ</h5>
                <br>
                <h4 class="card-title">This Month:</h4>
                <h5>{{$month_paz[0]->total_token ? $month_paz[0]->total_token : 0}} PAZ</h5>
                <br>
                <h4 class="card-title">This Year:</h4>
                <h5>{{$year_PAZ[0]->total_token ? $year_PAZ[0]->total_token : 0}} PAZ</h5>
              </div>
            </div>
            </a>
    </div>
    <div class="col-md-4">
         <div class="card" style="height: 420px;">
             <h5 class="card-title text-left pt-3 pl-3">Check Reward Status:</h5>
             <hr>
              <div class="card-body text-center">
                <h4 class="card-title">Setup your Profile and get 100 PAZ tokens!</h4>
                <p>-Upload 5 Picture/Videos on the social Media Box</p>
               
                <p>-Upload 3 Videos/Audios to the Collection and keep them  for a minimum of 30 days</p>
                <div class="text-right mt-5">
                   <button class="btn btn-primary btn-sm mt-5" data-toggle="modal" data-target="#reward" type="button"> Reward</button>
                   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="reward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="card text-center" style=" margin:0px !important;">
             <h5 class="card-title text-left pt-3 pl-3">Requirement status:</h5>
             <hr>
              <div class="card-body ">
               
                <p class="card-text " style="    font-size: 20px;">5 pictures or videos submited:<span class="text-right" style="{{$social_count < 5  ? 'display:block':'display:none'}}"><i class="fa fa-times"></i></span><span class="text-right cross" style="{{$social_count < 5 ? 'display:none':'display:block'}}"><i class="fa fa-check"></i></span></p>

                <p class="card-text"  style="    font-size: 20px;">3 audio or video for collection :  <span class="text-right " style="{{$totalCollection < 3 ? 'display:block':'display:none'}}"><i class="fa fa-times"></i></span><span class="text-right days" style="{{$totalCollection < 3 && $social_count < 5 ? 'display:none': 'display:block'}}">{{$day_difference ? $day_difference->difference : ''}} Remaining</span> <span class="text-right cross" style="{{$totalCollection < 3 ? 'display:none':'display:block'}}"><i class="fa fa-check"></i></span></p>
                
                <button class="btn btn-primary "  type="button">Get my reward!</button>
                <button class="btn btn-primary " data-dismiss="modal" aria-label="Close" type="button">Back</button>
              </div>
            </div>
    </div>
  </div>
</div>
                </div>
              </div>
            </div>
    </div>
   
    <div class="col-md-12">
         <div class="card">
             <h5 class="card-title text-left pt-3 pl-3">Social Media Submitted: {{$social_count}}</h5>
             <hr>
             {!!Form::open(['id'=>'social_media','method' => 'post', 'files'=>true])!!}
              {{Form::token()}}
            <div class="card-body text-center">
              <div class="row">
                <div class="col-md-12">
                           <div class="alert alert-success d-none" id="msg_div">
                                   <span id="res_message"></span>
                              </div>
                        </div>
              <div class="col-md-4">
                  <h5 class="card-title">Let us promote you on our social Media Channels</h5>
                  <br>
                  <input type="radio" id="video" name="gender" value="Video">
                  <label for="male">Video</label>
                  <input type="radio" id="audio" name="gender" value="audio">
                  <label for="audio">Audio</label>
                  <input type="radio" id="image" name="gender" value="image">
                  <label for="image">Image</label>
                    <div class="linksonit mb-3">
                        <div class="custom-file">
                        {{Form::file('media',['class'=>'custom-file-input file_input','id'=>'social'])}}
                        <span id="filename" style="color:red;"></span>
                          {{Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label text-left'])}}
                          <!-- <div class="alert alert-danger d-none">{{$errors->first('media') ?  $errors->first('media') : ''}}</div> -->
                          <small>Upload social media friendly content here</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                      <h5 class="card-title"> Add Descriptions that you want us to use:(optional)</h5>
                      <br>
                        <div class="linksonit mb-3">
                        <!-- <textarea class="form-control" aria-label="With textarea"></textarea> -->
                        {{Form::textarea('description',null,['class'=>'form-control','aria-label'=>'With textarea'])}}
                        <div class="alert alert-danger d-none">{{ $errors->first('description') ?  $errors->first('description') : ''}}</div>
                        </div>
                  </div>

               <div class="col-md-4">
                  <h5 class="card-title">Provide us your Social Media Usernames for tagging!(optional)</h5>
                  <br>
                      <div class="linksonit mb-3">
                      {{Form::textarea('username',null,['class'=>'form-control','aria-label'=>'With textarea'])}}
                 <div class="alert alert-danger d-none">{{ $errors->first('username') ?  $errors->first('username') : ''}}</div>
                    </div>
                </div>

             </div>
             <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="{{asset('images/loading2.gif')}}" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
            <div class="alert alert-success" id="success" style="display:none"></div>
                  <div class="text-right">
                  {{ Form::submit('Submit!',['class'=>'btn btn-primary btn-sm']) }}
                    <!-- <button class="btn btn-primary btn-sm" type="button">Submit</button> -->
                  </div>
              </div>
            </div>
            {{ Form::close() }}
            <div class="col-md-4">
         <div class="card" >
              <div class="card-body text-center">
                <h4 class="card-title">Download Our Logo</h4>      
                  <img src="{{asset('images/logos/good_quality_logo.png')}}" download class="img-fliud w-100 logodownload">
                 <a href="{{asset('images/logos/good_quality_logo.png')}}" download> <button class=" btn btn-primary" type="button">Download</button></a>
              </div>
            </div>
    </div>
    </div>
   
   
</div>
</div>
</section>
<style>
.columesdashboard {
    border: 3px solid #ed1c24;
    padding: 30px 18px;
    background: #ed1c24;
    color: white;
}
label.error {
    background: red;
    padding: 9px;
    font-size: 16px;
    display: flex;
    color: white;
    text-align: center;
    margin-top: 22px;
    border-radius: 9px;
}
.columesdashboard1 {
    border: 3px solid #ff7f27;
    padding: 30px 18px;
    background: #ff7f27;
    color: white;
    
}
.edit12 {
    margin-top: 30%;
}
img.img-fliud.logodownload {
    border: 1px solid black;
    padding: 11px;
    margin: 13px 0px;
}
.columesdashboard2 {
    border: 3px solid #22b14c;
    padding: 30px 18px;
    background: #22b14c;
    color: white;
}

.columesdashboard3 {
    border: 3px solid #b97a57;
    padding: 30px 18px;
    background: #b97a57;
    color: white;
}
h5.customer1.text-center.pt-3.pl-3 {
    font-size: 13px;
}
.week {
    padding: 18px;
    text-align: center !important;
}
.titleheader.col-md-12 {
    margin-bottom: 10px;
    color: white;
    background: #80ad12;
    padding-bottom: 13px;
}

</style>

@include('artists.dashboard_footer')