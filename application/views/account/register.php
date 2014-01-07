       <!-- Start Index Body -->
      

              <div class="panel panel-primary" id="panels">
            <div class="panel-heading">Create an account
            </div>
            <div class="panel-body">


      <div class="row">
       
            
            <div class="col-md-12">

           <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('account/register_validate', $attributes);
            ?>
<fieldset>

<!-- Form Name -->


<h4>Personal Information</h4>
<div class="row">

<div class="col-md-3">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="fname">First Name</label>
  <div class="controls">
    <input size="30" id="fname" name="fname" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Email Address</label>
  <div class="controls">
    <input size="30" id="email" name="email" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="dob">Date of birth</label>
  <div class="controls">
    <input size="30" id="dob" name="dob" type="date" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

  <!-- Select Basic -->
  <div class="control-group">
    <label class="control-label" for="mstatus">Marital Status</label>
    <div class="controls">
      <select id="mstatus" name="mstatus" class="input-xlarge" required>
        <option>Single</option>
        <option>Married</option>
        <option>Widower</option>
      </select>
    </div>
  </div>

</div>

<div class="col-md-9">
  <!-- Text input-->
  <div class="control-group">
    <label class="control-label" for="lname">Last Name</label>
    <div class="controls">
      <input size="30" id="lname" name="lname" type="text" placeholder="" class="input-xlarge" required>
      
    </div>
  </div>

  <!-- Text input-->
  <div class="control-group">
    <label class="control-label" for="mobile">Mobile Number</label>
    <div class="controls">
      <input size="30" id="mobile" name="mobile" type="text" placeholder="" class="input-xlarge" required>
      
    </div>
  </div>

  <!-- Select Basic -->
  <div class="control-group">
    <label class="control-label" for="gender">Gender</label>
    <div class="controls">
      <select id="gender" name="gender" class="input-xlarge" required>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
  </div>
</div>

</div>

<h4>Address Information</h4>

<div class="row">

<div class="col-md-3">

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="company">Company</label>
  <div class="controls">
    <input size="30" id="company" name="company" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="city">City</label>
  <div class="controls">
    <input size="30" id="city" name="city" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="zip">Zip/Postal Code</label>
  <div class="controls">
    <input size="30" id="zip" name="zip" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

</div>

<div class="col-md-9">
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telephone">Telephone</label>
  <div class="controls">
    <input id="telephone" name="telephone" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="state">State/Province</label>
  <div class="controls">
    <select id="state" name="state" class="input-xlarge" required>
      <option>Cebu City</option>
      <option>Tacloban</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="country">Country</label>
  <div class="controls">
    <select id="country" name="country" class="input-xlarge" required>
    <option value=""> </option><option value="AU">Australia</option><option value="AT">Austria</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BT">Bhutan</option><option value="BR">Brazil</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="KH">Cambodia</option><option value="CA">Canada</option><option value="CN">China</option><option value="CY">Cyprus</option><option value="DK">Denmark</option><option value="EG">Egypt</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="DE">Germany</option><option value="GR">Greece</option><option value="HK">Hong Kong SAR China</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IE">Ireland</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KW">Kuwait</option><option value="LA">Laos</option><option value="LU">Luxembourg</option><option value="MO">Macau SAR China</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="MN">Mongolia</option><option value="MM">Myanmar [Burma]</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NZ">New Zealand</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PG">Papua New Guinea</option><option value="PH" selected="selected">Philippines</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="QA">Qatar</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="SA">Saudi Arabia</option><option value="SG">Singapore</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="ZA">South Africa</option><option value="KR">South Korea</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="TW">Taiwan</option><option value="TH">Thailand</option><option value="TR">Turkey</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="VN">Vietnam</option><option value="YE">Yemen</option>
    </select>
  </div>
</div>

</div>

<div class="col-md-11">
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="street">Street Address</label>
  <div class="controls">
    <input size="80" id="street" name="street" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>
</div>




</div>
<h4>Login Information</h4>
<div class="row">


<div class="col-md-3">
<!-- Text input-->
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="password">Password</label>
  <div class="controls">
    <input size="30" id="password" name="password" type="password" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

</div>
<div class="col-md-9">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="cpassword">Confirm Password</label>
  <div class="controls">
    <input size="30" id="cpassword" name="cpassword" type="password" placeholder="" class="input-xlarge" required>
    
  </div>
</div>
</div>




</div>




<div class="row">
  <div class="col-md-12">
  <!-- Button -->
<div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-info">Submit</button>
  </div>
</div>
</div>
</div>


</fieldset>
</form>


            </div>

            </div>


            </div>
            <!-- <div class="panel-footer">
            </div> -->
          </div>




        <!-- End Index Body -->