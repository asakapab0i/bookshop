
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item active">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item">My Orders</a>
            <a href="<?php echo site_url('customer/reviews'); ?>" class="list-group-item">My Product Reviews</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item">My Wishlist</a>
          </div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Account Information
            </div>
            <div class="panel-body">
            	<div class="col-md-12">

					      <div class="row">
       
            
            <div class="col-md-12">

        
           <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('account/register_validate', $attributes);
            ?>
<fieldset>

<!-- Form Name -->

<h4>Edit Account Information</h4>
<div class="row">

<div class="col-md-5">
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

<div class="col-md-7">
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

            	</div>

            	

            </div>
            <div class="panel-footer">
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
            </div>
          </div>
	</div>
</div>