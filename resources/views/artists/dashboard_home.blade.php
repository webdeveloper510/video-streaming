@include('artists.dashboard')

<section class="background1">
<div class="container">

<div class="row mt-5 pt-5 text-center">
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
   
    <div class="columesdashboard3">
           <h1>{{$totalCollection ? $totalCollection : 0}}</h1>
           <h4 class="text-center">Collection Items  </h4>
        </div>     
    </div>
</div>

<div class="row">
<div class="col-md-12">
         <div class="card">
             <div class="week">
             <h5 class="card-title text-left pt-3 pl-3">Choose the timeframe available to get promoted
              on the landingpage and on the customer homepage for free</h5>
              <hr>
          <div class="row">
             <div class="col-md-4">
              <button class="btn btn-info" type="button">Week 1+2</button>
              <button class="btn btn-info" type="button">Week 3+4</button>
              <button class="btn btn-info" type="button">Week 5+6</button>
              <button class="btn btn-info" type="button">Week 7+8</button>
            
             </div>
             <div class="col-md-4">
             <button class="btn btn-info" type="button">Week 9+10</button>
             <button class="btn btn-info" type="button">Week 11+12</button>
              <button class="btn btn-info" type="button">Week 13+14</button>
              <button class="btn btn-info" type="button">Week 15+16</button>
             </div>
             <div class="col-md-4 ">
             
              <button class="btn btn-info" type="button">Week 17+18</button>
              <button class="btn btn-info" type="button">Week 19+20</button>
              <button class="btn btn-info" type="button">Week 21+22</button>
              <button class="btn btn-info" type="button">Week 23+24</button>
             </div>
          </div>
          <h5 class="customer1 text-center pt-3 pl-3">--- weeks are counted from the start of customertraffic---</h5>
          <div class="text-right">
          <button class="btn btn-primary" type="button">Submit</button>

          </div>
            </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="card" style=" height: 370px;">
             <h5 class="card-title text-left pt-3 pl-3">Your Info:</h5>
             <hr>
             @if($personal_info[0]->firstname=='')
             <div class="card-body pb-1">
                 {!!Form::open(['action' => 'AuthController@personal_info', 'method' => 'post'])!!}
                 {{Form::token()}}
             {{Form::label('First Name', 'First Name')}} 
                {{Form::text('firstname', '',['class'=>'form-control','placeholder'=>'Enter name'])}}
                {{Form::label('Country', 'Country')}} 
                 <select name="country">
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
                
                <input type="date" name="dob" class="form-control" />
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
                <label>Country</label>
                <select name="country" class="form-control" id="countries">
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
                <!-- <select class="form-control"  id="countries" name="country">
                        <option value="Albania"  {{ ( 'Albania' == $personal_info[0]->country) ? 'selected' : '' }}>Albania</option>
                        <option value="Algeria" {{ ( "Algeria" == $personal_info[0]->country) ? 'selected' : '' }}>Algeria</option>
                        <option value="American Samoa" {{ ( "American Samoa" == $personal_info[0]->country) ? 'selected' : '' }}>American Samoa</option>
                        <option value="Andorra" {{ ( "Andorra" == $personal_info[0]->country) ? 'selected' : '' }}>Andorra</option>
                        <option value="Angola" {{ ( "Angola" == $personal_info[0]->country) ? 'selected' : '' }}>Angola</option>
                        <option value="Anguilla" {{ ( "Anguilla" == $personal_info[0]->country) ? 'selected' : '' }}>Anguilla</option>
                        <option value="Antigua & Barbuda" {{ ( "Antigua & Barbuda" == $personal_info[0]->country) ? 'selected' : '' }}>Antigua & Barbuda</option>
                        <option value="Argentina" {{ ( "Argentina" == $personal_info[0]->country) ? 'selected' : '' }}>Argentina</option>
                        <option value="Aruba" {{ ( "Aruba" == $personal_info[0]->country) ? 'selected' : '' }}>Aruba</option>
                        <option value="Australia" {{ ( "Australia" == $personal_info[0]->country) ? 'selected' : '' }}>Australia</option>
                        <option value="Austria" {{ ( "Austria" == $personal_info[0]->country) ? 'selected' : '' }}>Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas" {{ ( "Bahamas" == $personal_info[0]->country) ? 'selected' : '' }}>Bahamas</option>
                        <option value="Barbados" {{ ( "Barbados" == $personal_info[0]->country) ? 'selected' : '' }}>Barbados</option>
                        <option value="Belgium" {{ ( "Belgium" == $personal_info[0]->country) ? 'selected' : '' }}>Belgium</option>
                        <option value="Belize" {{ ( "Belize" == $personal_info[0]->country) ? 'selected' : '' }}>Belize</option>
                        <option value="Benin" {{ ( "Benin" == $personal_info[0]->country) ? 'selected' : '' }}>Benin</option>
                        <option value="Bermuda" {{ ( "Bermuda" == $personal_info[0]->country) ? 'selected' : '' }}>Bermuda</option>
                        <option value="Bhutan" {{ ( "Bhutan" == $personal_info[0]->country) ? 'selected' : '' }}>Bhutan</option>
                        <option value="Bolivia" {{ ( "Bolivia" == $personal_info[0]->country) ? 'selected' : '' }}>Bolivia</option>
                        <option value="Bonaire" {{ ( "Bonaire" == $personal_info[0]->country) ? 'selected' : '' }}>Bonaire</option>
                        <option value="Bosnia & Herzegovina" {{ ( "Bosnia & Herzegovina" == $personal_info[0]->country) ? 'selected' : '' }}>Bosnia & Herzegovina</option>
                        <option value="Botswana" {{ ( "Botswana" == $personal_info[0]->country) ? 'selected' : '' }}>Botswana</option>
                        <option value="Brazil" {{ ( "Brazil" == $personal_info[0]->country) ? 'selected' : '' }}>Brazil</option>
                        <option value="British Indian Ocean Ter" {{ ( "British Indian Ocean Ter" == $personal_info[0]->country) ? 'selected' : '' }}>British Indian Ocean Ter</option>
                        <option value="Brunei" {{ ( "Brunei" == $personal_info[0]->country) ? 'selected' : '' }}>Brunei</option>
                        <option value="Bulgaria" {{ ( "Bulgaria" == $personal_info[0]->country) ? 'selected' : '' }}>Bulgaria</option>
                        <option value="Burkina Faso" {{ ( "Burkina Faso" == $personal_info[0]->country) ? 'selected' : '' }}>Burkina Faso</option>
                        <option value="Burundi" {{ ( "Burundi" == $personal_info[0]->country) ? 'selected' : '' }}>Burundi</option>
                        <option value="Cameroon" {{ ( "Cameroon" == $personal_info[0]->country) ? 'selected' : '' }}>Cameroon</option>
                        <option value="Canada" {{ ( "Canada" == $personal_info[0]->country) ? 'selected' : '' }}>Canada</option>
                        <option value="Canary Islands" {{ ( "Canary Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Canary Islands</option>
                        <option value="Cape Verde" {{ ( "Cape Verde" == $personal_info[0]->country) ? 'selected' : '' }}>Cape Verde</option>
                        <option value="Cayman Islands" {{ ( "Cayman Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Cayman Islands</option>
                        <option value="Central African Republic" {{ ( "Central African Republic" == $personal_info[0]->country) ? 'selected' : '' }}>Central African Republic</option>
                        <option value="Chad" {{ ( "Chad" == $personal_info[0]->country) ? 'selected' : '' }}>Chad</option>
                        <option value="Channel Islands" {{ ( "Channel Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Channel Islands</option>
                        <option value="Chile" {{ ( "Chile" == $personal_info[0]->country) ? 'selected' : '' }}>Chile</option>
                        <option value="Christmas Island" {{ ( "Christmas Island" == $personal_info[0]->country) ? 'selected' : '' }}>Christmas Island</option>
                        <option value="Cocos Island" {{ ( "Cocos Island" == $personal_info[0]->country) ? 'selected' : '' }}>Cocos Island</option>
                        <option value="Colombia" {{ ( "Colombia" == $personal_info[0]->country) ? 'selected' : '' }}>Colombia</option>
                        <option value="Comoros" {{ ( "Comoros" == $personal_info[0]->country) ? 'selected' : '' }}>Comoros</option>
                        <option value="Congo" {{ ( "Congo" == $personal_info[0]->country) ? 'selected' : '' }}>Congo</option>
                        <option value="Cook Islands" {{ ( "Cook Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Cook Islands</option>
                        <option value="Costa Rica" {{ ( "Costa Rica" == $personal_info[0]->country) ? 'selected' : '' }}>Costa Rica</option>
                        <option value="Cote DIvoire" {{ ( "Cote DIvoire" == $personal_info[0]->country) ? 'selected' : '' }}>Cote DIvoire</option>
                        <option value="Croatia" {{ ( "Croatia" == $personal_info[0]->country) ? 'selected' : '' }}>Croatia</option>
                        <option value="Curaco" {{ ( "Curaco" == $personal_info[0]->country) ? 'selected' : '' }}>Curacao</option>
                        <option value="Cyprus" {{ ( "Cyprus" == $personal_info[0]->country) ? 'selected' : '' }}>Cyprus</option>
                        <option value="Czech Republic" {{ ( "Czech Republic" == $personal_info[0]->country) ? 'selected' : '' }}>Czech Republic</option>
                        <option value="Denmark" {{ ( "Denmark" == $personal_info[0]->country) ? 'selected' : '' }}>Denmark</option>
                        <option value="Djibouti" {{ ( "Djibouti" == $personal_info[0]->country) ? 'selected' : '' }}>Djibouti</option>
                        <option value="Dominica" {{ ( "Dominica" == $personal_info[0]->country) ? 'selected' : '' }}>Dominica</option>
                        <option value="Dominican Republic" {{ ( "Dominican Republic" == $personal_info[0]->country) ? 'selected' : '' }}>Dominican Republic</option>
                        <option value="East Timor" {{ ( "East Timor" == $personal_info[0]->country) ? 'selected' : '' }}>East Timor</option>
                        <option value="Ecuador" {{ ( "Ecuador" == $personal_info[0]->country) ? 'selected' : '' }}>Ecuador</option>
                        <option value="Egypt" {{ ( "Egypt" == $personal_info[0]->country) ? 'selected' : '' }}>Egypt</option>
                        <option value="El Salvador" {{ ( "El Salvador" == $personal_info[0]->country) ? 'selected' : '' }}>El Salvador</option>
                        <option value="Equatorial Guinea" {{ ( "Equatorial Guinea" == $personal_info[0]->country) ? 'selected' : '' }}>Equatorial Guinea</option>
                        <option value="Estonia" {{ ( "Estonia" == $personal_info[0]->country) ? 'selected' : '' }}>Estonia</option>
                        <option value="Ethiopia" {{ ( "Ethiopia" == $personal_info[0]->country) ? 'selected' : '' }}>Ethiopia</option>
                        <option value="Falkland Islands" {{ ( "Falkland Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Falkland Islands</option>
                        <option value="Faroe Islands" {{ ( "Faroe Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Faroe Islands</option>
                        <option value="Fiji" {{ ( "Fiji" == $personal_info[0]->country) ? 'selected' : '' }}>Fiji</option>
                        <option value="Finland" {{ ( "Finland" == $personal_info[0]->country) ? 'selected' : '' }}>Finland</option>
                        <option value="France" {{ ( "France" == $personal_info[0]->country) ? 'selected' : '' }}>France</option>
                        <option value="French Guiana" {{ ( "French Guiana" == $personal_info[0]->country) ? 'selected' : '' }}>French Guiana</option>
                        <option value="French Polynesia" {{ ( "French Polynesia" == $personal_info[0]->country) ? 'selected' : '' }}>French Polynesia</option>
                        <option value="French Southern Ter" {{ ( "French Southern Ter" == $personal_info[0]->country) ? 'selected' : '' }}>French Southern Ter</option>
                        <option value="Gabon" {{ ( "Gabon" == $personal_info[0]->country) ? 'selected' : '' }}>Gabon</option>
                        <option value="Gambia" {{ ( "Gambia" == $personal_info[0]->country) ? 'selected' : '' }}>Gambia</option>
                        <option value="Georgia" {{ ( "Georgia" == $personal_info[0]->country) ? 'selected' : '' }}>Georgia</option>
                        <option value="Germany" {{ ( "Germany" == $personal_info[0]->country) ? 'selected' : '' }}>Germany</option>
                        <option value="Ghana" {{ ( "Ghana" == $personal_info[0]->country) ? 'selected' : '' }}>Ghana</option>
                        <option value="Gibraltar" {{ ( "Gibraltar" == $personal_info[0]->country) ? 'selected' : '' }}>Gibraltar</option>
                        <option value="Great Britain" {{ ( "Great Britain" == $personal_info[0]->country) ? 'selected' : '' }}>Great Britain</option>
                        <option value="Greece" {{ ( "Greece" == $personal_info[0]->country) ? 'selected' : '' }}>Greece</option>
                        <option value="Greenland" {{ ( "Greenland" == $personal_info[0]->country) ? 'selected' : '' }}> Greenland</option>
                        <option value="Grenada" {{ ( "Grenada" == $personal_info[0]->country) ? 'selected' : '' }}>Grenada</option>
                        <option value="Guadeloupe" {{ ( "Guadeloupe" == $personal_info[0]->country) ? 'selected' : '' }}>Guadeloupe</option>
                        <option value="Guam" {{ ( "Guam" == $personal_info[0]->country) ? 'selected' : '' }}>Guam</option>
                        <option value="Guatemala" {{ ( "Guatemala" == $personal_info[0]->country) ? 'selected' : '' }}>Guatemala</option>
                        <option value="Guinea" {{ ( "Guinea" == $personal_info[0]->country) ? 'selected' : '' }}>Guinea</option>
                        <option value="Haiti" {{ ( "Haiti" == $personal_info[0]->country) ? 'selected' : '' }}>Haiti</option>
                        <option value="Hawaii" {{ ( "Hawaii" == $personal_info[0]->country) ? 'selected' : '' }}>Hawaii</option>
                        <option value="Honduras" {{ ( "Honduras" == $personal_info[0]->country) ? 'selected' : '' }}>Honduras</option>
                        <option value="Hong Kong" {{ ( "Hong Kong" == $personal_info[0]->country) ? 'selected' : '' }}>Hong Kong</option>
                        <option value="Hungary" {{ ( "Hungary" == $personal_info[0]->country) ? 'selected' : '' }}>Hungary</option>
                        <option value="Iceland" {{ ( "Iceland" == $personal_info[0]->country) ? 'selected' : '' }}>Iceland</option>
                        <option value="India" {{ ( "India" == $personal_info[0]->country) ? 'selected' : '' }}>India</option>
                        <option value="Iraq" {{ ( "Iraq" == $personal_info[0]->country) ? 'selected' : '' }}>Iraq</option>
                        <option value="Ireland" {{ ( "Ireland" == $personal_info[0]->country) ? 'selected' : '' }}>Ireland</option>
                        <option value="Isle of Man" {{ ( "Isle of Man" == $personal_info[0]->country) ? 'selected' : '' }}>Isle of Man</option>
                        <option value="Israel" {{ ( "Israel" == $personal_info[0]->country) ? 'selected' : '' }}>Israel</option>
                        <option value="Italy" {{ ( "Italy" == $personal_info[0]->country) ? 'selected' : '' }}>Italy</option>
                        <option value="Jamaica" {{ ( "Jamaica" == $personal_info[0]->country) ? 'selected' : '' }}>Jamaica</option>
                        <option value="Japan" {{ ( "Japan" == $personal_info[0]->country) ? 'selected' : '' }}>Japan</option>
                        <option value="Jordan" {{ ( "Jordan" == $personal_info[0]->country) ? 'selected' : '' }}>Jordan</option>
                        <option value="Kazakhstan" {{ ( "Kazakhstan" == $personal_info[0]->country) ? 'selected' : '' }}>Kazakhstan</option>
                        <option value="Kenya" {{ ( "Kenya" == $personal_info[0]->country) ? 'selected' : '' }}>Kenya</option>
                        <option value="Kiribati" {{ ( "Kiribati" == $personal_info[0]->country) ? 'selected' : '' }}>Kiribati</option>
                        <option value="Kyrgyzstan" {{ ( "Kyrgyzstan" == $personal_info[0]->country) ? 'selected' : '' }}>Kyrgyzstan</option>
                        <option value="Latvia" {{ ( "Latvia" == $personal_info[0]->country) ? 'selected' : '' }}>Latvia</option>
                        <option value="Lebanon" {{ ( "Lebanon" == $personal_info[0]->country) ? 'selected' : '' }}>Lebanon</option>
                        <option value="Lesotho" {{ ( "Lesotho" == $personal_info[0]->country) ? 'selected' : '' }}>Lesotho</option>
                        <option value="Liberia" {{ ( "Liberia" == $personal_info[0]->country) ? 'selected' : '' }}>Liberia</option>
                        <option value="Liechtenstein" {{ ( "Liechtenstein" == $personal_info[0]->country) ? 'selected' : '' }}>Liechtenstein</option>
                        <option value="Lithuania" {{ ( "Lithuania" == $personal_info[0]->country) ? 'selected' : '' }}>Lithuania</option>
                        <option value="Luxembourg" {{ ( "Luxembourg" == $personal_info[0]->country) ? 'selected' : '' }}>Luxembourg</option>
                        <option value="Macau" {{ ( "Macau" == $personal_info[0]->country) ? 'selected' : '' }}>Macau</option>
                        <option value="Macedonia" {{ ( "Macedonia" == $personal_info[0]->country) ? 'selected' : '' }}>Macedonia</option>
                        <option value="Madagascar" {{ ( "Madagascar" == $personal_info[0]->country) ? 'selected' : '' }}>Madagascar</option>
                        <option value="Malawi" {{ ( "Malawi" == $personal_info[0]->country) ? 'selected' : '' }}>Malawi</option>
                        <option value="Mali" {{ ( "Mali" == $personal_info[0]->country) ? 'selected' : '' }}>Mali</option>
                        <option value="Malta" {{ ( "Malta" == $personal_info[0]->country) ? 'selected' : '' }}>Malta</option>
                        <option value="Marshall Islands" {{ ( "Marshall Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Marshall Islands</option>
                        <option value="Martinique" {{ ( "Martinique" == $personal_info[0]->country) ? 'selected' : '' }}>Martinique</option>
                        <option value="Mauritania" {{ ( "Mauritania" == $personal_info[0]->country) ? 'selected' : '' }}>Mauritania</option>
                        <option value="Mauritius" {{ ( "Mauritius" == $personal_info[0]->country) ? 'selected' : '' }}>Mauritius</option>
                        <option value="Mayotte" {{ ( "Mayotte" == $personal_info[0]->country) ? 'selected' : '' }}>Mayotte</option>
                        <option value="Mexico" {{ ( "Mexico" == $personal_info[0]->country) ? 'selected' : '' }}>Mexico</option>
                        <option value="Midway Islands" {{ ( "Midway Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Midway Islands</option>
                        <option value="Moldova" {{ ( "Moldova" == $personal_info[0]->country) ? 'selected' : '' }}>Moldova</option>
                        <option value="Monaco" {{ ( "Monaco" == $personal_info[0]->country) ? 'selected' : '' }}>Monaco</option>
                        <option value="Mongolia" {{ ( "Mongolia" == $personal_info[0]->country) ? 'selected' : '' }}>Mongolia</option>
                        <option value="Montserrat" {{ ( "Montserrat" == $personal_info[0]->country) ? 'selected' : '' }}>Montserrat</option>
                        <option value="Morocco" {{ ( "Morocco" == $personal_info[0]->country) ? 'selected' : '' }}>Morocco</option>
                        <option value="Mozambique" {{ ( "Mozambique" == $personal_info[0]->country) ? 'selected' : '' }}>Mozambique</option>
                        <option value="Myanmar" {{ ( "Myanmar" == $personal_info[0]->country) ? 'selected' : '' }}>Myanmar</option>
                        <option value="Nambia" {{ ( "Nambia" == $personal_info[0]->country) ? 'selected' : '' }}>Nambia</option>
                        <option value="Nauru" {{ ( "Nauru" == $personal_info[0]->country) ? 'selected' : '' }}> Nauru</option>
                        <option value="Netherland Antilles" {{ ( "Nevis" == $personal_info[0]->country) ? 'selected' : '' }}>Netherland Antilles</option>
                        <option value="Netherlands" {{ ( "Netherland Antilles" == $personal_info[0]->country) ? 'selected' : '' }}>Netherlands (Holland, Europe)</option>
                        <option value="Nevis" {{ ( "Nevis" == $personal_info[0]->country) ? 'selected' : '' }}>Nevis</option>
                        <option value="New Caledonia" {{ ( "New Caledonia" == $personal_info[0]->country) ? 'selected' : '' }}>New Caledonia</option>
                        <option value="New Zealand" {{ ( "New Zealand" == $personal_info[0]->country) ? 'selected' : '' }}>New Zealand</option>
                        <option value="Nicaragua" {{ ( "Nicaragua" == $personal_info[0]->country) ? 'selected' : '' }}>Nicaragua</option>
                        <option value="Niger" {{ ( "Niger" == $personal_info[0]->country) ? 'selected' : '' }}>Niger</option>
                        <option value="Nigeria" {{ ( "Nigeria" == $personal_info[0]->country) ? 'selected' : '' }}>Nigeria</option>
                        <option value="Niue" {{ ( "Niue" == $personal_info[0]->country) ? 'selected' : '' }}>Niue</option>
                        <option value="Norfolk Island" {{ ( "Norfolk Island" == $personal_info[0]->country) ? 'selected' : '' }}>Norfolk Island</option>
                        <option value="Norway" {{ ( "Norway" == $personal_info[0]->country) ? 'selected' : '' }}>Norway</option>
                        <option value="Palau Island" {{ ( "Palau Island" == $personal_info[0]->country) ? 'selected' : '' }}>Palau Island</option>
                        <option value="Palestine" {{ ( "Palestine" == $personal_info[0]->country) ? 'selected' : '' }}>Palestine</option>
                        <option value="Panama" {{ ( "Panama" == $personal_info[0]->country) ? 'selected' : '' }}>Panama</option>
                        <option value="Paraguay" {{ ( "Paraguay" == $personal_info[0]->country) ? 'selected' : '' }}>Paraguay</option>
                        <option value="Peru" {{ ( "Peru" == $personal_info[0]->country) ? 'selected' : '' }}>Peru</option>
                        <option value="Phillipines" {{ ( "Phillipines" == $personal_info[0]->country) ? 'selected' : '' }}>Philippines</option>
                        <option value="Pitcairn Island" {{ ( "Pitcairn Island" == $personal_info[0]->country) ? 'selected' : '' }}>Pitcairn Island</option>
                        <option value="Poland" {{ ( "Poland" == $personal_info[0]->country) ? 'selected' : '' }}>Poland</option>
                        <option value="Portugal" {{ ( "Portugal" == $personal_info[0]->country) ? 'selected' : '' }}>Portugal</option>
                        <option value="Puerto Rico" {{ ( "Puerto Rico" == $personal_info[0]->country) ? 'selected' : '' }}>Puerto Rico</option>
                        <option value="Republic of Montenegro" {{ ( "Republic of Montenegro" == $personal_info[0]->country) ? 'selected' : '' }}>Republic of Montenegro</option>
                        <option value="Republic of Serbia" {{ ( "Republic of Serbia" == $personal_info[0]->country) ? 'selected' : '' }}>Republic of Serbia</option>
                        <option value="Reunion" {{ ( "Reunion" == $personal_info[0]->country) ? 'selected' : '' }}>Reunion</option>
                        <option value="Romania" {{ ( "Romania" == $personal_info[0]->country) ? 'selected' : '' }}>Romania</option>
                        <option value="Rwanda" {{ ( "Rwanda" == $personal_info[0]->country) ? 'selected' : '' }}>Rwanda</option>
                        <option value="St Barthelemy" {{ ( "St Barthelemy" == $personal_info[0]->country) ? 'selected' : '' }}>St Barthelemy</option>
                        <option value="St Eustatius" {{ ( "St Eustatius" == $personal_info[0]->country) ? 'selected' : '' }}>St Eustatius</option>
                        <option value="St Helena" {{ ( "St Helena" == $personal_info[0]->country) ? 'selected' : '' }}>St Helena</option>
                        <option value="St Kitts-Nevis" {{ ( "St Kitts-Nevis" == $personal_info[0]->country) ? 'selected' : '' }}>St Kitts-Nevis</option>
                        <option value="St Lucia" {{ ( "St Lucia" == $personal_info[0]->country) ? 'selected' : '' }}>St Lucia</option>
                        <option value="St Maarten" {{ ( "St Maarten" == $personal_info[0]->country) ? 'selected' : '' }}>St Maarten</option>
                        <option value="St Pierre & Miquelon" {{ ( "St Pierre & Miquelon" == $personal_info[0]->country) ? 'selected' : '' }}>St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines" {{ ( "St Vincent & Grenadines" == $personal_info[0]->country) ? 'selected' : '' }}>St Vincent & Grenadines</option>
                        <option value="Saipan" {{ ( "Saipan" == $personal_info[0]->country) ? 'selected' : '' }}>Saipan</option>
                        <option value="Samoa" {{ ( "Samoa" == $personal_info[0]->country) ? 'selected' : '' }}>Samoa</option>
                        <option value="Samoa American" {{ ( "Samoa American" == $personal_info[0]->country) ? 'selected' : '' }}>Samoa American</option>
                        <option value="San Marino" {{ ( "San Marino" == $personal_info[0]->country) ? 'selected' : '' }}>San Marino</option>
                        <option value="Sao Tome & Principe" {{ ( "Sao Tome & Principe" == $personal_info[0]->country) ? 'selected' : '' }}>Sao Tome & Principe</option>
                        <option value="Senegal" {{ ( "Senegal" == $personal_info[0]->country) ? 'selected' : '' }}>Senegal</option>
                        <option value="Seychelles" {{ ( "Seychelles" == $personal_info[0]->country) ? 'selected' : '' }}>Seychelles</option>
                        <option value="Sierra Leone" {{ ( "Sierra Leone" == $personal_info[0]->country) ? 'selected' : '' }}>Sierra Leone</option>
                        <option value="Singapore" {{ ( "Singapore" == $personal_info[0]->country) ? 'selected' : '' }}>Singapore</option>
                        <option value="Slovakia" {{ ( "Slovakia" == $personal_info[0]->country) ? 'selected' : '' }}>Slovakia</option>
                        <option value="Slovenia" {{ ( "Slovenia" == $personal_info[0]->country) ? 'selected' : '' }}>Slovenia</option>
                        <option value="Solomon Islands" {{ ( "Solomon Islands" == $personal_info[0]->country) ? 'selected' : '' }}>Solomon Islands</option>
                        <option value="South Africa" {{ ( "South Africa" == $personal_info[0]->country) ? 'selected' : '' }}>South Africa</option>
                        <option value="Spain" {{ ( "Spain" == $personal_info[0]->country) ? 'selected' : '' }}>Spain</option>
                        <option value="Sri Lanka" {{ ( "Sri Lanka" == $personal_info[0]->country) ? 'selected' : '' }}>Sri Lanka</option>
                        <option value="Suriname" {{ ( "Suriname" == $personal_info[0]->country) ? 'selected' : '' }}>Suriname</option>
                        <option value="Swaziland" {{ ( "Swaziland" == $personal_info[0]->country) ? 'selected' : '' }}>Swaziland</option>
                        <option value="Sweden" {{ ( "Sweden" == $personal_info[0]->country) ? 'selected' : '' }}>Sweden</option>
                        <option value="Switzerland" {{ ( "Switzerland" == $personal_info[0]->country) ? 'selected' : '' }}>Switzerland</option>
                        <option value="Tahiti" {{ ( "Tahiti" == $personal_info[0]->country) ? 'selected' : '' }}>Tahiti</option>
                        <option value="Taiwan" {{ ( "Taiwan" == $personal_info[0]->country) ? 'selected' : '' }}>Taiwan</option>
                        <option value="Tajikistan" {{ ( "Tajikistan" == $personal_info[0]->country) ? 'selected' : '' }}>Tajikistan</option>
                        <option value="Tanzania" {{ ( "Tanzania" == $personal_info[0]->country) ? 'selected' : '' }}>Tanzania</option>
                        <option value="Thailand" {{ ( "Thailand" == $personal_info[0]->country) ? 'selected' : '' }}>Thailand</option>
                        <option value="Togo" {{ ( "Togo" == $personal_info[0]->country) ? 'selected' : '' }}>Togo</option>
                        <option value="Tokelau" {{ ( "Tokelau" == $personal_info[0]->country) ? 'selected' : '' }}>Tokelau</option>
                        <option value="Tonga" {{ ( "Tonga" == $personal_info[0]->country) ? 'selected' : '' }}>Tonga</option>
                        <option value="Trinidad & Tobago" {{ ( "Trinidad & Tobago" == $personal_info[0]->country) ? 'selected' : '' }}>Trinidad & Tobago</option>
                        <option value="Tunisia" {{ ( "Tunisia" == $personal_info[0]->country) ? 'selected' : '' }}>Tunisia</option>
                        <option value="Turks & Caicos Is" {{ ( "Turks & Caicos Is" == $personal_info[0]->country) ? 'selected' : '' }}>Turks & Caicos Is</option>
                        <option value="Tuvalu" {{ ( "Tuvalu" == $personal_info[0]->country) ? 'selected' : '' }}>Tuvalu</option>
                        <option value="United Kingdom" {{ ( "United Kingdom" == $personal_info[0]->country) ? 'selected' : '' }}>United Kingdom</option>
                        <option value="Ukraine" {{ ( "Ukraine" == $personal_info[0]->country) ? 'selected' : '' }}>Ukraine</option>
                        <option value="United States of America" {{ ( "United States of America" == $personal_info[0]->country) ? 'selected' : '' }}>United States of America</option>
                        <option value="Uraguay" {{ ( "Uraguay" == $personal_info[0]->country) ? 'selected' : '' }}>Uruguay</option>
                        <option value="Vanuatu" {{ ( "Vanuatu" == $personal_info[0]->country) ? 'selected' : '' }}>Vanuatu</option>
                        <option value="Vatican City State" {{ ( "Vatican City State" == $personal_info[0]->country) ? 'selected' : '' }}>Vatican City State</option>
                        <option value="Venezuela" {{ ( "Venezuela" == $personal_info[0]->country) ? 'selected' : '' }}>Venezuela</option>
                        <option value="Virgin Islands (Brit)" {{ ( "Virgin Islands (Brit)" == $personal_info[0]->country) ? 'selected' : '' }}>Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)" {{ ( "Virgin Islands (USA)" == $personal_info[0]->country) ? 'selected' : '' }}>Virgin Islands (USA)</option>
                        <option value="Wake Island" {{ ( "Wake Island" == $personal_info[0]->country) ? 'selected' : '' }}>Wake Island</option>
                        <option value="Wallis & Futana Is" {{ ( "Wallis & Futana Is" == $personal_info[0]->country) ? 'selected' : '' }}>Wallis & Futana Is</option>
                        <option value="Zaire" {{ ( "Zaire" == $personal_info[0]->country) ? 'selected' : '' }}>Zaire</option>
                        <option value="Zambia" {{ ( "Zambia" == $personal_info[0]->country) ? 'selected' : '' }}>Zambia</option>
</select> -->
                <h5 class="card-title"> Date of Birth : {{$personal_info[0]->dob}} </h5><br>
               
                <h5 class="card-title">Email : <span class="replace" id="email">{{$personal_info[0]->email}}</span></h5>
                <div class="text-right">
                {{ Form::button('edit!',['class'=>'btn btn-light btn-sm mt-5' , 'id'=>'edit']) }}
                <div style="display:none;">{{ Form::submit('Apply!',['class'=>'btn btn-light btn-sm mt-5','id'=>'update']) }}</div>
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
         <div class="card" style="    height: 370px;">
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
                <h5>{{$year_PAZ[0]->total_token}} PAZ</h5>
              </div>
            </div>
    </div>
    <div class="col-md-4">
         <div class="card" style="height: 370px;">
             <h5 class="card-title text-left pt-3 pl-3">Reward:</h5>
             <hr>
              <div class="card-body text-center">
                <h4 class="card-title">Setup your Profile and get 100 PAZ tokens!</h4>
                <p>-Upload 5 picture/videos on the social Media Box</p>
               
                <p>-Upload 3 videos/audios to the collection and keep them tere for a minimum of 30 days</p>
                <div class="text-right">
                   <button class="btn btn-primary btn-sm mt-5" type="button">Get my reward!</button>
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
                    <div class="linksonit mb-3">
                        <div class="custom-file">
                        {{Form::file('media',['class'=>'custom-file-input','id'=>'file_input'])}}
                        <span id="filename" style="color:red;"></span>
                          {{Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label text-left'])}}
                          <div class="alert alert-danger d-none">{{$errors->first('media') ?  $errors->first('media') : ''}}</div>
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
            <div class="primary primary-success" id="success" style="display:none"></div>
                  <div class="text-right">
                  {{ Form::submit('Submit!',['class'=>'btn btn-primary btn-sm']) }}
                    <!-- <button class="btn btn-primary btn-sm" type="button">Submit</button> -->
                  </div>
              </div>
            </div>
            {{ Form::close() }}
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

</style>

@include('artists.dashboard_footer')