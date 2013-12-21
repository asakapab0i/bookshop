<!-- Start Index Body -->

      <div class="row">
       
          <div class="panel panel-primary" id="panels">
            <div class="panel-heading"><h4>Create an account</h4></div>
            <div class="panel-body">
               <span class="alert alert-success">Account Registration Successful</span><a href="<?php echo site_url('account/login')?>" class="btn btn-success">Account Login</a>
      
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
    <input value="<?php echo set_value('fname'); ?>" size="30" id="fname" name="fname" type="text" placeholder="" class="input-xlarge" required>
    <?php echo form_error('fname'); ?>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Email Address</label>
  <div class="controls">
    <input value="<?php echo set_value('email'); ?>" size="30" id="email" name="email" type="text" placeholder="" class="input-xlarge" required>
    <?php echo form_error('email'); ?>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="dob">Date of birth</label>
  <div class="controls">
    <input value="<?php echo set_value('dob'); ?>" size="30" id="dob" name="dob" type="date" placeholder="" class="input-xlarge" required>
    <?php echo form_error('dob'); ?>
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
      <?php echo form_error('mstatus'); ?>
    </div>
  </div>

</div>

<div class="col-md-9">
  <!-- Text input-->
  <div class="control-group">
    <label class="control-label" for="lname">Last Name</label>
    <div class="controls">
      <input value="<?php echo set_value('lname'); ?>" size="30" id="lname" name="lname" type="text" placeholder="" class="input-xlarge" required>
      <?php echo form_error('lname'); ?>
    </div>
  </div>

  <!-- Text input-->
  <div class="control-group">
    <label class="control-label" for="mobile">Mobile Number</label>
    <div class="controls">
      <input value="<?php echo set_value('mobile'); ?>" size="30" id="mobile" name="mobile" type="text" placeholder="" class="input-xlarge" required>
      <?php echo form_error('mobile'); ?>
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
      <?php echo form_error('gender'); ?>
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
    <input value="<?php echo set_value('company'); ?>" size="30" id="company" name="company" type="text" placeholder="" class="input-xlarge" required>
    <?php echo form_error('company'); ?>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="city">City</label>
  <div class="controls">
    <input value="<?php echo set_value('city'); ?>" size="30" id="city" name="city" type="text" placeholder="" class="input-xlarge" required>
    <?php echo form_error('city'); ?>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="zip">Zip/Postal Code</label>
  <div class="controls">
    <input value="<?php echo set_value('zip'); ?>" size="30" id="zip" name="zip" type="text" placeholder="" class="input-xlarge" required>
    <?php echo form_error('zip'); ?>
  </div>
</div>

</div>

<div class="col-md-9">
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telephone">Telephone</label>
  <div class="controls">
    <input value="<?php echo set_value('telephone'); ?>" id="telephone" name="telephone" type="text" placeholder="" class="input-xlarge" required>
    <?php echo form_error('telephone'); ?>
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
    <?php echo form_error('state'); ?>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="country">Country</label>
  <div class="controls">
    <select id="country" name="country" class="input-xlarge" required>
      <option>Philippines</option>
      <option>USA</option>
    </select>
    <?php echo form_error('country'); ?>
  </div>
</div>

</div>

<div class="col-md-11">
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="street">Street Address</label>
  <div class="controls">
    <input value="<?php echo set_value('street'); ?>" size="80" id="street" name="street" type="text" placeholder="" class="input-xlarge" required>
    <?php echo form_error('street'); ?>
  </div>
</div>
</div>




</div>
<h4>Login Information</h4>
<?php echo form_error('cpassword'); ?>
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
            <div class="panel-footer"></div>
          </div>



  
      </div>

        <!-- End Index Body -->