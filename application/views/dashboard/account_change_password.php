<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item active">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item">My Order History</a>
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
                  $attributes = array('class' => 'form-horizontal', 'id' => 'edit_personal');
                  echo form_open('customer/change_password', $attributes);
            ?>
<fieldset>

<!-- Form Name -->

<h4>Account Change Password</h4>
<?php 
echo validation_errors(); 

if ($this->session->flashdata('success_change_pw')) {
            $wishlist = $this->session->flashdata('success_change_pw');

            echo '<div class="text-center alert alert-warning">';
            echo $wishlist;
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'; 
            echo '</div>';
          }  
?>
<div class="row">
   <div class="col-md-5">
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="old_password">Old Password</label>
      <div class="controls">
        <input size="30" id="old_password" name="old_password" type="password" placeholder="" class="input-xlarge" required>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="password">New Password</label>
      <div class="controls">
        <input size="30" id="password" name="password" type="password" placeholder="" class="input-xlarge" required>
      </div>
    </div>


    </div>
    <div class="col-md-5">
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="conf_password">Confirm Password</label>
      <div class="controls">
        <input size="30" id="conf_password" name="conf_password" type="password" placeholder="" class="input-xlarge" required>
      </div>
    </div>


    </div>
	
</div>
<div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-info">Submit</button>
  </div>
</div>
            	</div>
</div>
            	

            </div>
            <!-- <div class="panel-footer">
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
            </div> -->
          </div>
	</div>
</div>