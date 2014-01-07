
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item ">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item active">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item ">My Orders</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item">My Wishlist</a>
          </div>
	</div>

	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Add Address
         	</div>

                  <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'address_add');
                  echo form_open('customer/address_add_validation', $attributes);
                  ?>

         <div class="panel-body"> 
   <?php

         echo validation_errors();

         ?>

         <div class="row">

<div class="col-md-6">

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="company">Company</label>
  <div class="controls">
    <input value="<?php echo set_value('company'); ?>" size="30" id="company" name="company" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="city">City</label>
  <div class="controls">
    <input value="<?php echo set_value('city'); ?>" size="30" id="city" name="city" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="zip">Zip/Postal Code</label>
  <div class="controls">
    <input value="<?php echo set_value('zip'); ?>" size="30" id="zip" name="zip" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

</div>

<div class="col-md-6">
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telephone">Telephone</label>
  <div class="controls">
    <input value="<?php echo set_value('telephone'); ?>" id="telephone" name="telephone" type="text" placeholder="" class="input-xlarge" required>
    
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
    <input value="<?php echo set_value('street'); ?>" size="80" id="street" name="street" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>
<br/>
<button class="btn btn-success btn-lg" type="submit">Submit</button>
</form>
</div>



</div>

         	</div>
         	<div class="panel-footer">
         		
         	</div>

    </div>

</div>
</div>