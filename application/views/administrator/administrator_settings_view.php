<div class="row">
	<div class="col-md-3">
	
		          <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item ">Books</a>
            <a id="reports" href="<?php echo site_url('administrator/accountlist'); ?>" class="list-group-item">Accounts</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item active">Settings</a>
          
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
           Administrative Settings
            </div>
            <div class="panel-body">
<?php

            if ($this->session->flashdata('banner')) {
              $banner = $this->session->flashdata('banner');

              echo '<div class="text-center alert alert-success">';
              echo $banner;
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              echo '</div>';
            }


?>
		<div class="panel panel-default">
			<div class="panel-heading">Profile</div>
			<div class="panel-body text-center">
				                  <a href="<?php echo site_url('customer/account') ?>" title=""><button class="btn btn-success">Change Profile Information</button></a>
			</div>
		</div>
<div class="panel panel-default">
			<div class="panel-heading">Home Slider</div>
			<div class="panel-body text-center">
			<p>Note: Image file should be 740 x 280 pixels and must be jpg file format or else you die.</p>
				<div class="slider text-center">
					<?php echo form_open_multipart('administrator/home_slider') ?>
					<input type="file" name="userfile[]" class="input-file">
					<input type="file" name="userfile[]" class="input-file">
					<input type="file" name="userfile[]" class="input-file">
					<input type="file" name="userfile[]" class="input-file">

					<input type="submit" class="btn btn-primary btn-xs upload-slider" value="Upload">		
				</div>
			</div>
		</div>





	 
            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
	</div>
</div>


