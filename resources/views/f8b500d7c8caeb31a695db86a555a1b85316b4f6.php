<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="background1">
<div class="container">

<div class="row mt-5 pt-5 text-center">
    <div class="col-md-3">
    <!-- <h3 class="text-center">Due</h3> -->
    <a href="<?php echo e(url('artist/requests/due')); ?>">
    <div class="columesdashboard">
    <?php 
            $_GLOBEL['count'] =0;
          ?>
          <?php $__currentLoopData = $count_due_project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(date('Y-m-d')== $data->dates): ?>
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
            <h1><?php echo e($_GLOBEL['count']); ?></h1>
                  <h4>Order  Due</h4>
    <!-- <div class="row">
      <div class="col-6">
      <?php 
            $_GLOBEL['count'] =0;
          ?>
          <?php $__currentLoopData = $count_due_project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(date('Y-m-d')== $data->dates): ?>
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
            <h1><?php echo e($_GLOBEL['count']); ?></h1>
                  <h4>Order </h4>
            </div> 
   
      <div class="col-6">
      <?php 
            $_GLOBEL['count'] =0;
          ?>
          <?php $__currentLoopData = $count_due_project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(date('Y-m-d')== $data->dates): ?>
                <?php 
                $_GLOBEL['count']= $_GLOBEL['count']+1;
                ?>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
            <h1><?php echo e($_GLOBEL['count']); ?></h1>
                  <h4>Project </h4>
            </div> 

    </div> -->

            </div> 
            </a>  
    </div>
         
    <div class="col-md-3">
    <!-- <h3 class="text-center">In Process</h3> -->
    <a href="<?php echo e(url('artist/requests/process')); ?>">
    <div class="columesdashboard1">
    <h1><?php echo e($process_total); ?></h1>
                  <h4>Order In Process </h4>
    <!-- <div class="row">
      <div class="col-6">
     
                  <h1><?php echo e($process_total); ?></h1>
                  <h4>Order </h4>
            </div> 
   
      <div class="col-6">
     
                  <h1><?php echo e($process_total); ?></h1>
                  <h4>Project </h4>
            </div> 

    </div> -->

            </div>  
            </a> 
    </div>
    <div class="col-md-3">
    <!-- <h3 class="text-center">Project</h3> -->
    <a href="<?php echo e(url('artist/requests/new')); ?>">
    <div class="columesdashboard2">
    <h1><?php echo e($count_new_projects); ?></h1>
    <h4 class="text-center">New Order  </h4>
    <!-- <div class="row">
      <div class="col-6">
     
          <h1><?php echo e($count_new_projects); ?></h1>
                  <h4>New </h4>
            </div> 
   
      <div class="col-6">
     
            <h1><?php echo e($count_new_projects); ?></h1>
                  <h4>Order </h4>
            </div> 

    </div> -->

            </div>   
            </a>
    </div>
   
    <div class="col-md-3">
   
    <div class="columesdashboard3">
           <h1><?php echo e($totalCollection ? $totalCollection : 0); ?></h1>
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
             <?php if($personal_info[0]->firstname==''): ?>
             <div class="card-body pb-1">
  <?php echo Form::open(['action' => 'AuthController@personal_info', 'method' => 'post']); ?>

          <?php echo e(Form::token()); ?>

             <?php echo e(Form::label('First Name', 'First Name')); ?> 
                <?php echo e(Form::text('firstname', '',['class'=>'form-control','placeholder'=>'Enter name'])); ?>

                <?php echo e(Form::label('Country', 'Country')); ?> 
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
                <?php echo e(Form::label('Date of Birth', 'Date of Birth')); ?> 
                
                <input type="date" name="dob" class="form-control" />
                <br>
                <h5 class="card-title">Email : <?php echo e($personal_info[0]->email); ?></h5>
                <div class="text-right">
                <?php echo e(Form::submit('Apply!',['class'=>'btn btn-light btn-sm'])); ?>

              </div>
              <?php echo e(Form::close()); ?>

              </div>
              <?php else: ?>
              <div class="card-body pb-1 ">
              <?php echo Form::open(['id'=>'updateUser', 'method' => 'post']); ?>

              <?php echo e(Form::token()); ?>

                <h5 class="card-title">First Name : <span class="replace" id="firstname"><?php echo e($personal_info[0]->firstname); ?></span></h5><br>
                <label>Country</label>
                <select class="form-control"  id="countries" name="country">
                        <option value="Albania"  <?php echo e(( 'Albania' == $personal_info[0]->country) ? 'selected' : ''); ?>>Albania</option>
                        <option value="Algeria" <?php echo e(( "Algeria" == $personal_info[0]->country) ? 'selected' : ''); ?>>Algeria</option>
                        <option value="American Samoa" <?php echo e(( "American Samoa" == $personal_info[0]->country) ? 'selected' : ''); ?>>American Samoa</option>
                        <option value="Andorra" <?php echo e(( "Andorra" == $personal_info[0]->country) ? 'selected' : ''); ?>>Andorra</option>
                        <option value="Angola" <?php echo e(( "Angola" == $personal_info[0]->country) ? 'selected' : ''); ?>>Angola</option>
                        <option value="Anguilla" <?php echo e(( "Anguilla" == $personal_info[0]->country) ? 'selected' : ''); ?>>Anguilla</option>
                        <option value="Antigua & Barbuda" <?php echo e(( "Antigua & Barbuda" == $personal_info[0]->country) ? 'selected' : ''); ?>>Antigua & Barbuda</option>
                        <option value="Argentina" <?php echo e(( "Argentina" == $personal_info[0]->country) ? 'selected' : ''); ?>>Argentina</option>
                        <option value="Aruba" <?php echo e(( "Aruba" == $personal_info[0]->country) ? 'selected' : ''); ?>>Aruba</option>
                        <option value="Australia" <?php echo e(( "Australia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Australia</option>
                        <option value="Austria" <?php echo e(( "Austria" == $personal_info[0]->country) ? 'selected' : ''); ?>>Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas" <?php echo e(( "Bahamas" == $personal_info[0]->country) ? 'selected' : ''); ?>>Bahamas</option>
                        <option value="Barbados" <?php echo e(( "Barbados" == $personal_info[0]->country) ? 'selected' : ''); ?>>Barbados</option>
                        <option value="Belgium" <?php echo e(( "Belgium" == $personal_info[0]->country) ? 'selected' : ''); ?>>Belgium</option>
                        <option value="Belize" <?php echo e(( "Belize" == $personal_info[0]->country) ? 'selected' : ''); ?>>Belize</option>
                        <option value="Benin" <?php echo e(( "Benin" == $personal_info[0]->country) ? 'selected' : ''); ?>>Benin</option>
                        <option value="Bermuda" <?php echo e(( "Bermuda" == $personal_info[0]->country) ? 'selected' : ''); ?>>Bermuda</option>
                        <option value="Bhutan" <?php echo e(( "Bhutan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Bhutan</option>
                        <option value="Bolivia" <?php echo e(( "Bolivia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Bolivia</option>
                        <option value="Bonaire" <?php echo e(( "Bonaire" == $personal_info[0]->country) ? 'selected' : ''); ?>>Bonaire</option>
                        <option value="Bosnia & Herzegovina" <?php echo e(( "Bosnia & Herzegovina" == $personal_info[0]->country) ? 'selected' : ''); ?>>Bosnia & Herzegovina</option>
                        <option value="Botswana" <?php echo e(( "Botswana" == $personal_info[0]->country) ? 'selected' : ''); ?>>Botswana</option>
                        <option value="Brazil" <?php echo e(( "Brazil" == $personal_info[0]->country) ? 'selected' : ''); ?>>Brazil</option>
                        <option value="British Indian Ocean Ter" <?php echo e(( "British Indian Ocean Ter" == $personal_info[0]->country) ? 'selected' : ''); ?>>British Indian Ocean Ter</option>
                        <option value="Brunei" <?php echo e(( "Brunei" == $personal_info[0]->country) ? 'selected' : ''); ?>>Brunei</option>
                        <option value="Bulgaria" <?php echo e(( "Bulgaria" == $personal_info[0]->country) ? 'selected' : ''); ?>>Bulgaria</option>
                        <option value="Burkina Faso" <?php echo e(( "Burkina Faso" == $personal_info[0]->country) ? 'selected' : ''); ?>>Burkina Faso</option>
                        <option value="Burundi" <?php echo e(( "Burundi" == $personal_info[0]->country) ? 'selected' : ''); ?>>Burundi</option>
                        <option value="Cameroon" <?php echo e(( "Cameroon" == $personal_info[0]->country) ? 'selected' : ''); ?>>Cameroon</option>
                        <option value="Canada" <?php echo e(( "Canada" == $personal_info[0]->country) ? 'selected' : ''); ?>>Canada</option>
                        <option value="Canary Islands" <?php echo e(( "Canary Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Canary Islands</option>
                        <option value="Cape Verde" <?php echo e(( "Cape Verde" == $personal_info[0]->country) ? 'selected' : ''); ?>>Cape Verde</option>
                        <option value="Cayman Islands" <?php echo e(( "Cayman Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Cayman Islands</option>
                        <option value="Central African Republic" <?php echo e(( "Central African Republic" == $personal_info[0]->country) ? 'selected' : ''); ?>>Central African Republic</option>
                        <option value="Chad" <?php echo e(( "Chad" == $personal_info[0]->country) ? 'selected' : ''); ?>>Chad</option>
                        <option value="Channel Islands" <?php echo e(( "Channel Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Channel Islands</option>
                        <option value="Chile" <?php echo e(( "Chile" == $personal_info[0]->country) ? 'selected' : ''); ?>>Chile</option>
                        <option value="Christmas Island" <?php echo e(( "Christmas Island" == $personal_info[0]->country) ? 'selected' : ''); ?>>Christmas Island</option>
                        <option value="Cocos Island" <?php echo e(( "Cocos Island" == $personal_info[0]->country) ? 'selected' : ''); ?>>Cocos Island</option>
                        <option value="Colombia" <?php echo e(( "Colombia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Colombia</option>
                        <option value="Comoros" <?php echo e(( "Comoros" == $personal_info[0]->country) ? 'selected' : ''); ?>>Comoros</option>
                        <option value="Congo" <?php echo e(( "Congo" == $personal_info[0]->country) ? 'selected' : ''); ?>>Congo</option>
                        <option value="Cook Islands" <?php echo e(( "Cook Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Cook Islands</option>
                        <option value="Costa Rica" <?php echo e(( "Costa Rica" == $personal_info[0]->country) ? 'selected' : ''); ?>>Costa Rica</option>
                        <option value="Cote DIvoire" <?php echo e(( "Cote DIvoire" == $personal_info[0]->country) ? 'selected' : ''); ?>>Cote DIvoire</option>
                        <option value="Croatia" <?php echo e(( "Croatia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Croatia</option>
                        <option value="Curaco" <?php echo e(( "Curaco" == $personal_info[0]->country) ? 'selected' : ''); ?>>Curacao</option>
                        <option value="Cyprus" <?php echo e(( "Cyprus" == $personal_info[0]->country) ? 'selected' : ''); ?>>Cyprus</option>
                        <option value="Czech Republic" <?php echo e(( "Czech Republic" == $personal_info[0]->country) ? 'selected' : ''); ?>>Czech Republic</option>
                        <option value="Denmark" <?php echo e(( "Denmark" == $personal_info[0]->country) ? 'selected' : ''); ?>>Denmark</option>
                        <option value="Djibouti" <?php echo e(( "Djibouti" == $personal_info[0]->country) ? 'selected' : ''); ?>>Djibouti</option>
                        <option value="Dominica" <?php echo e(( "Dominica" == $personal_info[0]->country) ? 'selected' : ''); ?>>Dominica</option>
                        <option value="Dominican Republic" <?php echo e(( "Dominican Republic" == $personal_info[0]->country) ? 'selected' : ''); ?>>Dominican Republic</option>
                        <option value="East Timor" <?php echo e(( "East Timor" == $personal_info[0]->country) ? 'selected' : ''); ?>>East Timor</option>
                        <option value="Ecuador" <?php echo e(( "Ecuador" == $personal_info[0]->country) ? 'selected' : ''); ?>>Ecuador</option>
                        <option value="Egypt" <?php echo e(( "Egypt" == $personal_info[0]->country) ? 'selected' : ''); ?>>Egypt</option>
                        <option value="El Salvador" <?php echo e(( "El Salvador" == $personal_info[0]->country) ? 'selected' : ''); ?>>El Salvador</option>
                        <option value="Equatorial Guinea" <?php echo e(( "Equatorial Guinea" == $personal_info[0]->country) ? 'selected' : ''); ?>>Equatorial Guinea</option>
                        <option value="Estonia" <?php echo e(( "Estonia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Estonia</option>
                        <option value="Ethiopia" <?php echo e(( "Ethiopia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Ethiopia</option>
                        <option value="Falkland Islands" <?php echo e(( "Falkland Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Falkland Islands</option>
                        <option value="Faroe Islands" <?php echo e(( "Faroe Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Faroe Islands</option>
                        <option value="Fiji" <?php echo e(( "Fiji" == $personal_info[0]->country) ? 'selected' : ''); ?>>Fiji</option>
                        <option value="Finland" <?php echo e(( "Finland" == $personal_info[0]->country) ? 'selected' : ''); ?>>Finland</option>
                        <option value="France" <?php echo e(( "France" == $personal_info[0]->country) ? 'selected' : ''); ?>>France</option>
                        <option value="French Guiana" <?php echo e(( "French Guiana" == $personal_info[0]->country) ? 'selected' : ''); ?>>French Guiana</option>
                        <option value="French Polynesia" <?php echo e(( "French Polynesia" == $personal_info[0]->country) ? 'selected' : ''); ?>>French Polynesia</option>
                        <option value="French Southern Ter" <?php echo e(( "French Southern Ter" == $personal_info[0]->country) ? 'selected' : ''); ?>>French Southern Ter</option>
                        <option value="Gabon" <?php echo e(( "Gabon" == $personal_info[0]->country) ? 'selected' : ''); ?>>Gabon</option>
                        <option value="Gambia" <?php echo e(( "Gambia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Gambia</option>
                        <option value="Georgia" <?php echo e(( "Georgia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Georgia</option>
                        <option value="Germany" <?php echo e(( "Germany" == $personal_info[0]->country) ? 'selected' : ''); ?>>Germany</option>
                        <option value="Ghana" <?php echo e(( "Ghana" == $personal_info[0]->country) ? 'selected' : ''); ?>>Ghana</option>
                        <option value="Gibraltar" <?php echo e(( "Gibraltar" == $personal_info[0]->country) ? 'selected' : ''); ?>>Gibraltar</option>
                        <option value="Great Britain" <?php echo e(( "Great Britain" == $personal_info[0]->country) ? 'selected' : ''); ?>>Great Britain</option>
                        <option value="Greece" <?php echo e(( "Greece" == $personal_info[0]->country) ? 'selected' : ''); ?>>Greece</option>
                        <option value="Greenland" <?php echo e(( "Greenland" == $personal_info[0]->country) ? 'selected' : ''); ?>> Greenland</option>
                        <option value="Grenada" <?php echo e(( "Grenada" == $personal_info[0]->country) ? 'selected' : ''); ?>>Grenada</option>
                        <option value="Guadeloupe" <?php echo e(( "Guadeloupe" == $personal_info[0]->country) ? 'selected' : ''); ?>>Guadeloupe</option>
                        <option value="Guam" <?php echo e(( "Guam" == $personal_info[0]->country) ? 'selected' : ''); ?>>Guam</option>
                        <option value="Guatemala" <?php echo e(( "Guatemala" == $personal_info[0]->country) ? 'selected' : ''); ?>>Guatemala</option>
                        <option value="Guinea" <?php echo e(( "Guinea" == $personal_info[0]->country) ? 'selected' : ''); ?>>Guinea</option>
                        <option value="Haiti" <?php echo e(( "Haiti" == $personal_info[0]->country) ? 'selected' : ''); ?>>Haiti</option>
                        <option value="Hawaii" <?php echo e(( "Hawaii" == $personal_info[0]->country) ? 'selected' : ''); ?>>Hawaii</option>
                        <option value="Honduras" <?php echo e(( "Honduras" == $personal_info[0]->country) ? 'selected' : ''); ?>>Honduras</option>
                        <option value="Hong Kong" <?php echo e(( "Hong Kong" == $personal_info[0]->country) ? 'selected' : ''); ?>>Hong Kong</option>
                        <option value="Hungary" <?php echo e(( "Hungary" == $personal_info[0]->country) ? 'selected' : ''); ?>>Hungary</option>
                        <option value="Iceland" <?php echo e(( "Iceland" == $personal_info[0]->country) ? 'selected' : ''); ?>>Iceland</option>
                        <option value="India" <?php echo e(( "India" == $personal_info[0]->country) ? 'selected' : ''); ?>>India</option>
                        <option value="Iraq" <?php echo e(( "Iraq" == $personal_info[0]->country) ? 'selected' : ''); ?>>Iraq</option>
                        <option value="Ireland" <?php echo e(( "Ireland" == $personal_info[0]->country) ? 'selected' : ''); ?>>Ireland</option>
                        <option value="Isle of Man" <?php echo e(( "Isle of Man" == $personal_info[0]->country) ? 'selected' : ''); ?>>Isle of Man</option>
                        <option value="Israel" <?php echo e(( "Israel" == $personal_info[0]->country) ? 'selected' : ''); ?>>Israel</option>
                        <option value="Italy" <?php echo e(( "Italy" == $personal_info[0]->country) ? 'selected' : ''); ?>>Italy</option>
                        <option value="Jamaica" <?php echo e(( "Jamaica" == $personal_info[0]->country) ? 'selected' : ''); ?>>Jamaica</option>
                        <option value="Japan" <?php echo e(( "Japan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Japan</option>
                        <option value="Jordan" <?php echo e(( "Jordan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Jordan</option>
                        <option value="Kazakhstan" <?php echo e(( "Kazakhstan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Kazakhstan</option>
                        <option value="Kenya" <?php echo e(( "Kenya" == $personal_info[0]->country) ? 'selected' : ''); ?>>Kenya</option>
                        <option value="Kiribati" <?php echo e(( "Kiribati" == $personal_info[0]->country) ? 'selected' : ''); ?>>Kiribati</option>
                        <option value="Kyrgyzstan" <?php echo e(( "Kyrgyzstan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Kyrgyzstan</option>
                        <option value="Latvia" <?php echo e(( "Latvia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Latvia</option>
                        <option value="Lebanon" <?php echo e(( "Lebanon" == $personal_info[0]->country) ? 'selected' : ''); ?>>Lebanon</option>
                        <option value="Lesotho" <?php echo e(( "Lesotho" == $personal_info[0]->country) ? 'selected' : ''); ?>>Lesotho</option>
                        <option value="Liberia" <?php echo e(( "Liberia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Liberia</option>
                        <option value="Liechtenstein" <?php echo e(( "Liechtenstein" == $personal_info[0]->country) ? 'selected' : ''); ?>>Liechtenstein</option>
                        <option value="Lithuania" <?php echo e(( "Lithuania" == $personal_info[0]->country) ? 'selected' : ''); ?>>Lithuania</option>
                        <option value="Luxembourg" <?php echo e(( "Luxembourg" == $personal_info[0]->country) ? 'selected' : ''); ?>>Luxembourg</option>
                        <option value="Macau" <?php echo e(( "Macau" == $personal_info[0]->country) ? 'selected' : ''); ?>>Macau</option>
                        <option value="Macedonia" <?php echo e(( "Macedonia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Macedonia</option>
                        <option value="Madagascar" <?php echo e(( "Madagascar" == $personal_info[0]->country) ? 'selected' : ''); ?>>Madagascar</option>
                        <option value="Malawi" <?php echo e(( "Malawi" == $personal_info[0]->country) ? 'selected' : ''); ?>>Malawi</option>
                        <option value="Mali" <?php echo e(( "Mali" == $personal_info[0]->country) ? 'selected' : ''); ?>>Mali</option>
                        <option value="Malta" <?php echo e(( "Malta" == $personal_info[0]->country) ? 'selected' : ''); ?>>Malta</option>
                        <option value="Marshall Islands" <?php echo e(( "Marshall Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Marshall Islands</option>
                        <option value="Martinique" <?php echo e(( "Martinique" == $personal_info[0]->country) ? 'selected' : ''); ?>>Martinique</option>
                        <option value="Mauritania" <?php echo e(( "Mauritania" == $personal_info[0]->country) ? 'selected' : ''); ?>>Mauritania</option>
                        <option value="Mauritius" <?php echo e(( "Mauritius" == $personal_info[0]->country) ? 'selected' : ''); ?>>Mauritius</option>
                        <option value="Mayotte" <?php echo e(( "Mayotte" == $personal_info[0]->country) ? 'selected' : ''); ?>>Mayotte</option>
                        <option value="Mexico" <?php echo e(( "Mexico" == $personal_info[0]->country) ? 'selected' : ''); ?>>Mexico</option>
                        <option value="Midway Islands" <?php echo e(( "Midway Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Midway Islands</option>
                        <option value="Moldova" <?php echo e(( "Moldova" == $personal_info[0]->country) ? 'selected' : ''); ?>>Moldova</option>
                        <option value="Monaco" <?php echo e(( "Monaco" == $personal_info[0]->country) ? 'selected' : ''); ?>>Monaco</option>
                        <option value="Mongolia" <?php echo e(( "Mongolia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Mongolia</option>
                        <option value="Montserrat" <?php echo e(( "Montserrat" == $personal_info[0]->country) ? 'selected' : ''); ?>>Montserrat</option>
                        <option value="Morocco" <?php echo e(( "Morocco" == $personal_info[0]->country) ? 'selected' : ''); ?>>Morocco</option>
                        <option value="Mozambique" <?php echo e(( "Mozambique" == $personal_info[0]->country) ? 'selected' : ''); ?>>Mozambique</option>
                        <option value="Myanmar" <?php echo e(( "Myanmar" == $personal_info[0]->country) ? 'selected' : ''); ?>>Myanmar</option>
                        <option value="Nambia" <?php echo e(( "Nambia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Nambia</option>
                        <option value="Nauru" <?php echo e(( "Nauru" == $personal_info[0]->country) ? 'selected' : ''); ?>> Nauru</option>
                        <option value="Netherland Antilles" <?php echo e(( "Nevis" == $personal_info[0]->country) ? 'selected' : ''); ?>>Netherland Antilles</option>
                        <option value="Netherlands" <?php echo e(( "Netherland Antilles" == $personal_info[0]->country) ? 'selected' : ''); ?>>Netherlands (Holland, Europe)</option>
                        <option value="Nevis" <?php echo e(( "Nevis" == $personal_info[0]->country) ? 'selected' : ''); ?>>Nevis</option>
                        <option value="New Caledonia" <?php echo e(( "New Caledonia" == $personal_info[0]->country) ? 'selected' : ''); ?>>New Caledonia</option>
                        <option value="New Zealand" <?php echo e(( "New Zealand" == $personal_info[0]->country) ? 'selected' : ''); ?>>New Zealand</option>
                        <option value="Nicaragua" <?php echo e(( "Nicaragua" == $personal_info[0]->country) ? 'selected' : ''); ?>>Nicaragua</option>
                        <option value="Niger" <?php echo e(( "Niger" == $personal_info[0]->country) ? 'selected' : ''); ?>>Niger</option>
                        <option value="Nigeria" <?php echo e(( "Nigeria" == $personal_info[0]->country) ? 'selected' : ''); ?>>Nigeria</option>
                        <option value="Niue" <?php echo e(( "Niue" == $personal_info[0]->country) ? 'selected' : ''); ?>>Niue</option>
                        <option value="Norfolk Island" <?php echo e(( "Norfolk Island" == $personal_info[0]->country) ? 'selected' : ''); ?>>Norfolk Island</option>
                        <option value="Norway" <?php echo e(( "Norway" == $personal_info[0]->country) ? 'selected' : ''); ?>>Norway</option>
                        <option value="Palau Island" <?php echo e(( "Palau Island" == $personal_info[0]->country) ? 'selected' : ''); ?>>Palau Island</option>
                        <option value="Palestine" <?php echo e(( "Palestine" == $personal_info[0]->country) ? 'selected' : ''); ?>>Palestine</option>
                        <option value="Panama" <?php echo e(( "Panama" == $personal_info[0]->country) ? 'selected' : ''); ?>>Panama</option>
                        <option value="Paraguay" <?php echo e(( "Paraguay" == $personal_info[0]->country) ? 'selected' : ''); ?>>Paraguay</option>
                        <option value="Peru" <?php echo e(( "Peru" == $personal_info[0]->country) ? 'selected' : ''); ?>>Peru</option>
                        <option value="Phillipines" <?php echo e(( "Phillipines" == $personal_info[0]->country) ? 'selected' : ''); ?>>Philippines</option>
                        <option value="Pitcairn Island" <?php echo e(( "Pitcairn Island" == $personal_info[0]->country) ? 'selected' : ''); ?>>Pitcairn Island</option>
                        <option value="Poland" <?php echo e(( "Poland" == $personal_info[0]->country) ? 'selected' : ''); ?>>Poland</option>
                        <option value="Portugal" <?php echo e(( "Portugal" == $personal_info[0]->country) ? 'selected' : ''); ?>>Portugal</option>
                        <option value="Puerto Rico" <?php echo e(( "Puerto Rico" == $personal_info[0]->country) ? 'selected' : ''); ?>>Puerto Rico</option>
                        <option value="Republic of Montenegro" <?php echo e(( "Republic of Montenegro" == $personal_info[0]->country) ? 'selected' : ''); ?>>Republic of Montenegro</option>
                        <option value="Republic of Serbia" <?php echo e(( "Republic of Serbia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Republic of Serbia</option>
                        <option value="Reunion" <?php echo e(( "Reunion" == $personal_info[0]->country) ? 'selected' : ''); ?>>Reunion</option>
                        <option value="Romania" <?php echo e(( "Romania" == $personal_info[0]->country) ? 'selected' : ''); ?>>Romania</option>
                        <option value="Rwanda" <?php echo e(( "Rwanda" == $personal_info[0]->country) ? 'selected' : ''); ?>>Rwanda</option>
                        <option value="St Barthelemy" <?php echo e(( "St Barthelemy" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Barthelemy</option>
                        <option value="St Eustatius" <?php echo e(( "St Eustatius" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Eustatius</option>
                        <option value="St Helena" <?php echo e(( "St Helena" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Helena</option>
                        <option value="St Kitts-Nevis" <?php echo e(( "St Kitts-Nevis" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Kitts-Nevis</option>
                        <option value="St Lucia" <?php echo e(( "St Lucia" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Lucia</option>
                        <option value="St Maarten" <?php echo e(( "St Maarten" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Maarten</option>
                        <option value="St Pierre & Miquelon" <?php echo e(( "St Pierre & Miquelon" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines" <?php echo e(( "St Vincent & Grenadines" == $personal_info[0]->country) ? 'selected' : ''); ?>>St Vincent & Grenadines</option>
                        <option value="Saipan" <?php echo e(( "Saipan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Saipan</option>
                        <option value="Samoa" <?php echo e(( "Samoa" == $personal_info[0]->country) ? 'selected' : ''); ?>>Samoa</option>
                        <option value="Samoa American" <?php echo e(( "Samoa American" == $personal_info[0]->country) ? 'selected' : ''); ?>>Samoa American</option>
                        <option value="San Marino" <?php echo e(( "San Marino" == $personal_info[0]->country) ? 'selected' : ''); ?>>San Marino</option>
                        <option value="Sao Tome & Principe" <?php echo e(( "Sao Tome & Principe" == $personal_info[0]->country) ? 'selected' : ''); ?>>Sao Tome & Principe</option>
                        <option value="Senegal" <?php echo e(( "Senegal" == $personal_info[0]->country) ? 'selected' : ''); ?>>Senegal</option>
                        <option value="Seychelles" <?php echo e(( "Seychelles" == $personal_info[0]->country) ? 'selected' : ''); ?>>Seychelles</option>
                        <option value="Sierra Leone" <?php echo e(( "Sierra Leone" == $personal_info[0]->country) ? 'selected' : ''); ?>>Sierra Leone</option>
                        <option value="Singapore" <?php echo e(( "Singapore" == $personal_info[0]->country) ? 'selected' : ''); ?>>Singapore</option>
                        <option value="Slovakia" <?php echo e(( "Slovakia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Slovakia</option>
                        <option value="Slovenia" <?php echo e(( "Slovenia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Slovenia</option>
                        <option value="Solomon Islands" <?php echo e(( "Solomon Islands" == $personal_info[0]->country) ? 'selected' : ''); ?>>Solomon Islands</option>
                        <option value="South Africa" <?php echo e(( "South Africa" == $personal_info[0]->country) ? 'selected' : ''); ?>>South Africa</option>
                        <option value="Spain" <?php echo e(( "Spain" == $personal_info[0]->country) ? 'selected' : ''); ?>>Spain</option>
                        <option value="Sri Lanka" <?php echo e(( "Sri Lanka" == $personal_info[0]->country) ? 'selected' : ''); ?>>Sri Lanka</option>
                        <option value="Suriname" <?php echo e(( "Suriname" == $personal_info[0]->country) ? 'selected' : ''); ?>>Suriname</option>
                        <option value="Swaziland" <?php echo e(( "Swaziland" == $personal_info[0]->country) ? 'selected' : ''); ?>>Swaziland</option>
                        <option value="Sweden" <?php echo e(( "Sweden" == $personal_info[0]->country) ? 'selected' : ''); ?>>Sweden</option>
                        <option value="Switzerland" <?php echo e(( "Switzerland" == $personal_info[0]->country) ? 'selected' : ''); ?>>Switzerland</option>
                        <option value="Tahiti" <?php echo e(( "Tahiti" == $personal_info[0]->country) ? 'selected' : ''); ?>>Tahiti</option>
                        <option value="Taiwan" <?php echo e(( "Taiwan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Taiwan</option>
                        <option value="Tajikistan" <?php echo e(( "Tajikistan" == $personal_info[0]->country) ? 'selected' : ''); ?>>Tajikistan</option>
                        <option value="Tanzania" <?php echo e(( "Tanzania" == $personal_info[0]->country) ? 'selected' : ''); ?>>Tanzania</option>
                        <option value="Thailand" <?php echo e(( "Thailand" == $personal_info[0]->country) ? 'selected' : ''); ?>>Thailand</option>
                        <option value="Togo" <?php echo e(( "Togo" == $personal_info[0]->country) ? 'selected' : ''); ?>>Togo</option>
                        <option value="Tokelau" <?php echo e(( "Tokelau" == $personal_info[0]->country) ? 'selected' : ''); ?>>Tokelau</option>
                        <option value="Tonga" <?php echo e(( "Tonga" == $personal_info[0]->country) ? 'selected' : ''); ?>>Tonga</option>
                        <option value="Trinidad & Tobago" <?php echo e(( "Trinidad & Tobago" == $personal_info[0]->country) ? 'selected' : ''); ?>>Trinidad & Tobago</option>
                        <option value="Tunisia" <?php echo e(( "Tunisia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Tunisia</option>
                        <option value="Turks & Caicos Is" <?php echo e(( "Turks & Caicos Is" == $personal_info[0]->country) ? 'selected' : ''); ?>>Turks & Caicos Is</option>
                        <option value="Tuvalu" <?php echo e(( "Tuvalu" == $personal_info[0]->country) ? 'selected' : ''); ?>>Tuvalu</option>
                        <option value="United Kingdom" <?php echo e(( "United Kingdom" == $personal_info[0]->country) ? 'selected' : ''); ?>>United Kingdom</option>
                        <option value="Ukraine" <?php echo e(( "Ukraine" == $personal_info[0]->country) ? 'selected' : ''); ?>>Ukraine</option>
                        <option value="United States of America" <?php echo e(( "United States of America" == $personal_info[0]->country) ? 'selected' : ''); ?>>United States of America</option>
                        <option value="Uraguay" <?php echo e(( "Uraguay" == $personal_info[0]->country) ? 'selected' : ''); ?>>Uruguay</option>
                        <option value="Vanuatu" <?php echo e(( "Vanuatu" == $personal_info[0]->country) ? 'selected' : ''); ?>>Vanuatu</option>
                        <option value="Vatican City State" <?php echo e(( "Vatican City State" == $personal_info[0]->country) ? 'selected' : ''); ?>>Vatican City State</option>
                        <option value="Venezuela" <?php echo e(( "Venezuela" == $personal_info[0]->country) ? 'selected' : ''); ?>>Venezuela</option>
                        <option value="Virgin Islands (Brit)" <?php echo e(( "Virgin Islands (Brit)" == $personal_info[0]->country) ? 'selected' : ''); ?>>Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)" <?php echo e(( "Virgin Islands (USA)" == $personal_info[0]->country) ? 'selected' : ''); ?>>Virgin Islands (USA)</option>
                        <option value="Wake Island" <?php echo e(( "Wake Island" == $personal_info[0]->country) ? 'selected' : ''); ?>>Wake Island</option>
                        <option value="Wallis & Futana Is" <?php echo e(( "Wallis & Futana Is" == $personal_info[0]->country) ? 'selected' : ''); ?>>Wallis & Futana Is</option>
                        <option value="Zaire" <?php echo e(( "Zaire" == $personal_info[0]->country) ? 'selected' : ''); ?>>Zaire</option>
                        <option value="Zambia" <?php echo e(( "Zambia" == $personal_info[0]->country) ? 'selected' : ''); ?>>Zambia</option>
</select> <br>
                <h5 class="card-title"> Date of Birth : <?php echo e($personal_info[0]->dob); ?> </h5><br>
               
                <h5 class="card-title">Email : <span class="replace" id="email"><?php echo e($personal_info[0]->email); ?></span></h5>
                <div class="text-right">
                <?php echo e(Form::button('edit!',['class'=>'btn btn-light btn-sm mt-3' , 'id'=>'edit'])); ?>

                <div style="display:none;"><?php echo e(Form::submit('Apply!',['class'=>'btn btn-light btn-sm mt-5','id'=>'update'])); ?></div>
                <?php echo e(Form::close()); ?>

              </div>
            </div>
            <?php endif; ?>

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
                <h5><?php echo e($today_paz ? $today_paz[0]->tokens:0); ?> PAZ</h5>
                <br>
                <h4 class="card-title">This Month:</h4>
                <h5><?php echo e($month_paz[0]->total_token ? $month_paz[0]->total_token : 0); ?> PAZ</h5>
                <br>
                <h4 class="card-title">This Year:</h4>
                <h5><?php echo e($year_PAZ[0]->total_token); ?> PAZ</h5>
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
               
                <p class="card-text " style="    font-size: 20px;">5 pictures or videos submited:<span class="text-right "><i class="fa fa-check"></i></span><span class="text-right cross"><i class="fa fa-check"></i></span></p>

                <p class="card-text"  style="    font-size: 20px;">3audio or video for collection :  <span class="text-right "><i class="fa fa-check"></i></span><span class="text-right days">2d Remaining</span> <span class="text-right cross "><i class="fa fa-check"></i></span></p>
                
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
             <?php echo Form::open(['id'=>'social_media','method' => 'post', 'files'=>true]); ?>

              <?php echo e(Form::token()); ?>

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
                        <?php echo e(Form::file('media',['class'=>'custom-file-input','id'=>'file_input'])); ?>

                        <span id="filename" style="color:red;"></span>
                          <?php echo e(Form::label('Choose Media', 'Choose Media',['class'=>'custom-file-label text-left'])); ?>

                          <div class="alert alert-danger d-none"><?php echo e($errors->first('media') ?  $errors->first('media') : ''); ?></div>
                          <small>Upload social media friendly content here</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                      <h5 class="card-title"> Add Descriptions that you want us to use:(optional)</h5>
                      <br>
                        <div class="linksonit mb-3">
                        <!-- <textarea class="form-control" aria-label="With textarea"></textarea> -->
                        <?php echo e(Form::textarea('description',null,['class'=>'form-control','aria-label'=>'With textarea'])); ?>

                        <div class="alert alert-danger d-none"><?php echo e($errors->first('description') ?  $errors->first('description') : ''); ?></div>
                        </div>
                  </div>

               <div class="col-md-4">
                  <h5 class="card-title">Provide us your Social Media Usernames for tagging!(optional)</h5>
                  <br>
                      <div class="linksonit mb-3">
                      <?php echo e(Form::textarea('username',null,['class'=>'form-control','aria-label'=>'With textarea'])); ?>

                 <div class="alert alert-danger d-none"><?php echo e($errors->first('username') ?  $errors->first('username') : ''); ?></div>
                    </div>
                </div>

             </div>
             <div class="loader col-6" style="display:none">
                <span style="color:green; font-weight: bold;">Uploading...</span><img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                <span class="percentage" style="color:green;font-weight: bold;"></span>
            </div>
            <div class="primary primary-success" id="success" style="display:none"></div>
                  <div class="text-right">
                  <?php echo e(Form::submit('Submit!',['class'=>'btn btn-primary btn-sm'])); ?>

                    <!-- <button class="btn btn-primary btn-sm" type="button">Submit</button> -->
                  </div>
              </div>
            </div>
            <?php echo e(Form::close()); ?>

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

<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artists/dashboard_home.blade.php ENDPATH**/ ?>