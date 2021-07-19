<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="background1">
   <div class="container">
      <div class="row mt-5 pt-5 text-center">
         <div class="titleheader col-md-12" style="<?php echo e($profileComplete > 0 ? 'display:none': 'display:block'); ?>">
            <h3><a href="<?php echo e(url('artist/Profile')); ?>" class="text-white">Please upload Media for your Profile Overview here....</a></h3>
         </div>
         <div class="col-md-3 mb-2">
            <!-- <h3 class="text-center">Due</h3> -->
            <a href="<?php echo e(url('artist/requests/due')); ?>">
               <div class="columesdashboard">
                  <h1><?php echo e($count_due_project ? $count_due_project : 0); ?></h1>
                  <h4>Order  Due</h4>
               </div>
            </a>
         </div>
         <div class="col-md-3 mb-2">
            <!-- <h3 class="text-center">In Process</h3> -->
            <a href="<?php echo e(url('artist/requests/process')); ?>">
               <div class="columesdashboard1">
                  <h1><?php echo e($process_total); ?></h1>
                  <h4>Order In Process </h4>
               </div>
            </a>
         </div>
         <div class="col-md-3 mb-2 ">
            <!-- <h3 class="text-center">Project</h3> -->
            <a href="<?php echo e(url('artist/requests/new')); ?>">
               <div class="columesdashboard2">
                  <h1><?php echo e($count_new_projects); ?></h1>
                  <h4 class="text-center">New Order  </h4>
               </div>
            </a>
         </div>
         <div class="col-md-3 mb-2">
            <a href="<?php echo e(url('artist/Profile/collection')); ?>">
               <div class="columesdashboard3">
                  <h1><?php echo e($totalCollection ? $totalCollection : 0); ?></h1>
                  <h4 class="text-center">Collection Items  </h4>
               </div>
            </a>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4">
            <div class="card" style=" height: 420px;">
               <h5 class="card-title text-left pt-3 pl-3">Your Info:</h5>
               <hr>
               <?php if($personal_info[0]->firstname==''): ?>
               <div class="card-body pb-1">
                  <?php echo Form::open(['action' => 'AuthController@personal_info', 'method' => 'post']); ?>

                  <?php echo e(Form::token()); ?>

                  <?php echo e(Form::label('First Name', 'First Name')); ?> <br>
                  <?php echo e(Form::text('firstname', '',['class'=>'form-control','placeholder'=>'Enter name','required'])); ?>  <br>
                  <?php echo e(Form::label('Country', 'Country')); ?> 
                  <br>
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
                  <br>
                  <h5 class="card-title">Email : <?php echo e($personal_info[0]->email); ?></h5>
                  <br>
                  <div class="text-right">
                     <?php echo e(Form::submit('Apply!',['class'=>'btn btn-light btn-sm'])); ?>

                  </div>
                  <?php echo e(Form::close()); ?>

               </div>
               <?php else: ?>
               <div class="card-body pb-1 ">
                  <?php echo Form::open(['id'=>'updateUser', 'method' => 'post']); ?>

                  <?php echo e(Form::token()); ?>

                  <h5 class="card-title">First Name : <span class="replace" id="firstname"><?php echo e($personal_info[0]->firstname); ?></span></h5>
                  <br>
                  <input type="hidden" value="<?php echo e($personal_info[0]->country); ?>" id="all_country"/>
                  <h5 class="card-title">Country : <span class="replace" id="country"><?php echo e($personal_info[0]->country); ?></span></h5>
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
                  <br>
                  <h5 class="card-title">Email : <span class="replace" id="email"><?php echo e($personal_info[0]->email); ?></span></h5>
                  <div class="text-right">
                     <?php echo e(Form::button('edit!',['class'=>'btn btn-light btn-sm edit12 reward-button' , 'id'=>'edit'])); ?>

                     <div style="display:none;  padding-top: 15%;">
                        <div class="text-left">
                           <button class="btn btn-outline-primary btn-sm " style="float:left" id="cancel" type="button"> Cancel</button>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm apply" data-toggle="modal" data-target="#exampleModal">Apply
                        </button>
                     </div>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Password :</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <input type="password" autocomplete="off"  class="form-control" name="password" placeholder="Enter Password">
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                 <?php echo e(Form::submit('Apply!',['class'=>'btn btn-light btn-sm ','id'=>'update'])); ?>

                              </div>
                           </div>
                        </div>
                     </div>
                     <?php echo e(Form::close()); ?>

                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
           <!-- Identity -->
           <div class="col-md-4" style="<?php echo e($idenetity && $idenetity[0]->is_verified==1 ? 'display:none' : 'display:block'); ?>">
               <div class="card" style="height: 420px;" >
               <div class="card-head text-center">
                    <h3>Identity Check </h3>
                    </div>
                    <?php if($idenetity && $idenetity[0]->is_verified==0): ?>
                    <div class="text-center">
                                    <h3 class="agreement"><?php echo e('pending'); ?> </h3>
                                       </div>
                    <?php else: ?>
                    <div class="text-center">
                    <button type="button" style="<?php echo e($idenetity && $idenetity[0]->is_verified==-1 ? 'display:none' : 'display:block'); ?>; margin:0 auto;" class="btn btn-danger my-4">Failed</button>
</div>
                  <div class="card-body text-center">
 
                        <a href="https://pornartistzone.com/developing-streaming/IDcheck" class="btn btn-outline-primary">Reupload</a>
                        
                     </div>
                     <?php endif; ?>
               </div>
            </div>
            <!-- Identity -->
            <div class="col-md-4" style="<?php echo e($agreement && $agreement[0]->is_verified==1 ? 'display:none' : 'display:block'); ?>">
                        <div class="card" style="height: 420px;" >
                                 <div class="card-head text-center">

                                    <h3>Artist Agreement</h3>
                                    </div>
                                    <?php if($agreement && $agreement[0]->is_verified==0): ?>
                                       <div class="text-center">
                                    <h3 class="agreement"><?php echo e('pending'); ?> </h3>
                                       </div>
                                    <?php else: ?>

                                    <button type="button" style="<?php echo e($agreement && $agreement[0]->is_verified==-1 ? 'display:none' : 'display:block'); ?>" class="btn btn-danger my-4">Failed</button>


                                    <button class="btn btn-success" type="button">Download</button>

                               
                  <div class="card-body text-center">
                  <?php echo Form::open(['id'=>'idCheck','method' => 'post', 'files'=>true]); ?>

          <?php echo e(Form::token()); ?> 
     
                        <div class="form-group ">
                        <input type="file" class="custom-file-input" name="agreement" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label text-left" for="inputGroupFile01">Choose file</label>
                           
                        </div>
                        <div class="form-group text-center mt-4">
                              <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                        <?php echo e(Form::close()); ?>

                     </div>
                     <?php endif; ?>
               </div>
            </div>
         

         <div class="col-md-4">
            <a href=" <?php echo e(url('/artist/earning')); ?>">
               <div class="card" style="    height: 420px;">
                  <h5 class="card-title text-left pt-3 pl-3">Earnings:</h5>
                  <hr>
                  <div class="card-body text-center">
                     <h4 class="card-title">Today:</h4>
                     <h5 style="color:gold;"><?php echo e($today_paz ? $today_paz[0]->tokens:0); ?> <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h5>
                     <br>
                     <h4 class="card-title">This Month:</h4>
                     <h5 style="color:gold;"><?php echo e($month_paz[0]->total_token ? $month_paz[0]->total_token : 0); ?> <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h5>
                     <br>
                     <h4 class="card-title">This Year:</h4>
                     <h5 style="color:gold;"><?php echo e($year_PAZ[0]->total_token ? $year_PAZ[0]->total_token : 0); ?> <b style="color:gold;font-family: 'Alfa Slab One', cursive;font-weight: 400;">PAZ</b></h5>
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
                     <button class="btn btn-primary btn-sm mt-5 reward-button" data-toggle="modal" data-target="#reward" type="button"> Reward</button>
                     <!-- Button trigger modal -->
                     <!-- Modal -->
                     <div class="modal fade" id="reward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="card text-center" style=" margin:0px !important;">
                                 <h5 class="card-title text-left pt-3 pl-3">Requirement status:</h5>
                                 <hr>
                                 <div class="card-body ">
                                    <div class="row">
                                       <div class="col-8">
                                          <p class="card-text " style="    font-size: 20px;">5 pictures or videos submited:</p>
                                       </div>
                                       <div class="col-4">
                                          <p class="card-text " style="    font-size: 20px;"><span  style="<?php echo e($social_count < 5  ? 'display:block':'display:none'); ?>"><i class="fa fa-times"></i></span><span class="text-right cross" style="<?php echo e($social_count < 5 ? 'display:none':'display:block'); ?>"><i class="fa fa-check"></i></span></p>
                                       </div>
                                       <div class="col-8 mt-2">
                                          <p class="card-text"  style="    font-size: 20px;">3 audio or video for collection :  </p>
                                       </div>
                                       <div class="col-4 mt-2">
                                          <p class="card-text " style="    font-size: 20px;"><span class="text-right " style="<?php echo e($totalCollection < 3 ? 'display:block':'display:none'); ?>"><i class="fa fa-times"></i></span><span class=" days" style="<?php echo e($totalCollection < 3 && $social_count < 5 ? 'display:none': 'display:block'); ?>"><?php echo e($day_difference ? $day_difference->difference : ''); ?> Remaining</span> <span class="text-right cross" style="<?php echo e($totalCollection < 3 ? 'display:none':'display:block'); ?>"><i class="fa fa-check"></i></span></p>
                                       </div>
                                    </div>
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
               <h5 class="card-title text-left pt-3 pl-3">Social Media Submitted: <?php echo e($social_count); ?></h5>
               <hr>
               <div class="card-body text-center">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="alert alert-success d-none" id="msg_div">
                           <span id="res_message"></span>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <?php echo Form::open(['id'=>'social_media','method' => 'post', 'files'=>true]); ?>

                        <?php echo e(Form::token()); ?>

                        <div class="row">
                           <div class="col-md-6 promote">
                              <h5 class="card-title">Let us promote you on our social Media Channels</h5>
                              <br>
                              <input type="radio" id="video" name="gender" class="radioBtn" value="video">
                              <label for="male">Video</label>
                              <input type="radio" id="image" name="gender" class="radioBtn" value="image">
                              <label for="image">Image</label>
                              <div class="linksonit mb-3">
                                 <div class="custom-file">
                                    <div class="video" style="display:none;">
                                       <?php echo e(Form::file('media[]',['class'=>'custom-file-input file_input','id'=>'social'])); ?>

                                       <span id="filename" style="color:red;"></span>
                                    </div>
                                    <div class="image" style="display:none;">
                                       <?php echo e(Form::file('media[]',['class'=>'custom-file-input chooseImage','id'=>'social1'])); ?>

                                       <span id="filename" style="color:red;"></span>
                                    </div>
                                    <?php echo e(Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label text-left'])); ?>

                                    <!-- <div class="alert alert-danger d-none"><?php echo e($errors->first('media') ?  $errors->first('media') : ''); ?></div> -->
                                    <small>Upload social media friendly content here</small>
                                 </div>
                                 <div class="loader col-6 text-center" style="display:none">
                                    <span style="color:green; font-weight: bold;">Uploading...</span><img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                                    <span class="percentage" style="color:green;font-weight: bold;"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 Descriptions">
                              <h5 class="card-title"> Add Descriptions that you want us to use:(optional)</h5>
                              <br>
                              <div class="linksonit mb-3">
                                 <!-- <textarea class="form-control" aria-label="With textarea"></textarea> -->
                                 <?php echo e(Form::textarea('description',null,['class'=>'form-control','aria-label'=>'With textarea'])); ?>

                                 <div class="alert alert-danger d-none"><?php echo e($errors->first('description') ?  $errors->first('description') : ''); ?></div>
                              </div>
                              <div class="text-right"> <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary btn-sm'])); ?></div>
                           </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                     </div>
                     <div class="col-md-4 tagging">
                        <h5 class="card-title">Provide us your Social Media Usernames for tagging!(optional)</h5>
                        <br>
                        <div class="table12">
                           <div class="table table-responsive">
                              <table class="table text-left">
                                 <thead class="thead-light">
                                    <tr>
                                       <th scope="col">App</th>
                                       <th scope="col">Username</th>
                                       <th scope="col"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $__currentLoopData = $social_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                       //echo $name->username;
                                            $count = count($name->username);
                                         ?>
                                    <?php for($i = 0; $i < $count; $i++): ?>
                                    <tr>
                                       <th scope="row"><?php echo e($name->username[$i]); ?></th>
                                       <td><?php echo e($name->social_plateform[$i]); ?></td>
                                       <td> 
                                          <button class="btn btn-outline-danger btn-sm px-2 py-1 m-0" type="button" onclick="deleteName('<?php echo e($name->id); ?>','<?php echo e($name->username[$i]); ?>','<?php echo e($name->social_plateform[$i]); ?>')">
                                          <i class="fa fa-close" style="font-size: 10px !important;font-weight: 100 !important;"></i> 
                                          </button>
                                       </td>
                                    </tr>
                                    <?php endfor; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </tbody>
                              </table>
                           </div>
                           <?php echo Form::open(['id'=>'user','method' => 'post' ]); ?>

                           <?php echo e(Form::token()); ?>

                           <div class="linksonit mb-3">
                              <div class="amountmedia row">
                                 <div class="col-md-12 text-center">
                                    <button class="btn btn-outline-primary btn-sm" type="button" onclick="appendDiv(this)">+</button>
                                 </div>
                              </div>
                           </div>
                           <div class="text-right ">
                              <?php echo e(Form::submit('Save!',['class'=>'btn btn-primary btn-sm mt-2','id'=>'save','disabled'])); ?>

                           </div>
                           <?php echo e(Form::close()); ?>

                        </div>
                     </div>
                     <div class="alert alert-success" id="success" style="display:none"></div>
                     <div class="text-right">
                     </div>
                  </div>
               </div>
            </div>
            </div>
           
          
         <div class="col-md-8">
            <div class="card" style="height:376px;">
               <div class="card-body">
               <a href="<?php echo e(asset('images/Consentform.pdf')); ?>" download> 
                  <button class="btn btn-success float-right" type="button">Download</button>
               </a>
                        <h5 class="card-title">Consent and Release Form Co-Performers</h5> 
                        <div class="table12">
                           <div class="table table-responsive">
                              <table class="table text-left">
                                 <thead class="thead-light">
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Nickname</th>
                                       <th scope="col">Date Of Consent</th>
                                    </tr>
                                 </thead>  
                                 <tbody>
                                    
                                    <tr>
                                    <?php echo Form::open(['id'=>'consent','method' => 'post', 'files'=>true]); ?>

                                 <?php echo e(Form::token()); ?>

                                       <th class="d-flex" scope="row">1</th>
                                       <td><input type="text" name= "coformer_nickname" class="form-control"><br>
                                       <div class="custom-file">
                                          <input type="file" required class="custom-file-input" name="file" id="inputGroupFile01">
                                          <label class="custom-file-label form-control" for="inputGroupFile01">Choose file</label>
                                       </div>
                                       </td>
                                       <td class="d-flex"> 
                                         <input type="date" required name="DOC" class="form-control">
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
                           <div class="text-right ">
                              <?php echo e(Form::submit('Save!',['class'=>'btn btn-primary btn-sm mt-2','id'=>'save'])); ?>

                           </div>
                           <?php echo e(Form::close()); ?>

                        </div>
                     </div>
                     <div class="alert alert-success" id="success" style="display:none"></div>
                     <div class="text-right">
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
               <div class="card" style="height:376px;">
                  <div class="card-body text-center">
                     <h4 class="card-title">Download Our Logo</h4>
                     <img src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" download class="img-fliud w-100 logodownload">
                     <a href="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>" download> <button class=" btn btn-primary" type="button">Download</button></a>
                  </div>
               </div>
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
   border-radius: 16px;
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
   border-radius: 16px;
   color: white;
   }
   .form-group {
    padding-bottom: 10px;
    position: unset;
    }
   .amountmedia {
   max-height: 160px;
   overflow-y: scroll;
   overflow-x: hidden;
   }
   .table-responsive {
   max-height: 230px;
   overflow: scroll;
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
   border-radius: 16px;
   background: #22b14c;
   color: white;
   }
   h3.agreement {
    background: orange;
    width: 50%;
    display: block;
    margin: 58px auto;
    color: white;
    padding: 8px;
    text-transform: capitalize;
}
   .columesdashboard3 {
   border: 3px solid #b97a57;
   padding: 30px 18px;
   background: #b97a57;
   border-radius: 16px;
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
   .card .card-header {
   z-index: 0 !important;
   }
   @media  only screen and (max-width: 768px) {
   .row.mt-5.pt-5.text-center {
   margin: 0px !important;
   }
   }
   ::-webkit-scrollbar {
   display: none;
   }
</style>
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/dashboard_home.blade.php ENDPATH**/ ?>