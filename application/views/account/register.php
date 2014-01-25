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
      <option value=""></option>
      <option>Cebu City</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="country">Country</label>
  <div class="controls">
    <select id="country" name="country" class="input-xlarge" required>
    <option value=""></option>
    <option value="Philippines">Philippines</option>
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