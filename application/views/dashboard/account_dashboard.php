
{user_info}
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item active">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item">My Orders</a>
            <a href="<?php echo site_url('customer/reviews'); ?>" class="list-group-item">My Product Reviews</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item">My Wishlist</a>
          </div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Account Dashboard
            </div>
            <div class="panel-body">
            	<div class="col-md-12">

            		<p>Hello, {fname} {lname}!<br/><br/>
            	
From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
					</p>
					<h4>Account Information</h4>
            		<div class="col-md-6">

	            		<div class="panel panel-info">
			            <div class="panel-heading">Contact Information <span class="pull-right"><a href="#">Edit</a></span></div>
			            <div class="panel-body">
			            	<address>                
			            	<strong>{fname} {lname}</strong>
			            	<br>{email}<br>
			            	<abbr title="Mobile">Phone:</abbr> {mobile}<br>
			            	<a href="#">Change Password</a>
			            	</address>
		            	</div>

			            </div>

		          </div>
	            	
	            	<div class="col-md-6">

	            		<div class="panel panel-info">
			            <div class="panel-heading">Newsletters <span class="pull-right"><a href="#">Edit</a></span></div>
			            <div class="panel-body">
			            	<address>                
		            	<strong>No Newsletter</strong>
		            	<br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br><abbr title="Phone">P:</abbr> (123) 456-7890              </address>
		            	</div>
		            	</div>
	            	</div>
<h4>Address Information</h4>
	            	<div class="col-md-6">

	            		<div class="panel panel-info">
				            <div class="panel-heading">Primary Address 
				            <span class="pull-right"><a href="#">Edit</a></span>
				            </div>
				            <div class="panel-body">
				            	<address>                
				            	<strong>{fname} {lname}</strong>
				            	<br>{company}<br>{street}
				            	<br>{country}<br>
				            	<abbr title="Telephone">Phone:</abbr> {telephone}            
				            	</address>
				            </div>
			            </div>

	            	</div>
{/user_info}

{user_shipping_info}
	            	<div class="col-md-6">
	            		<div class="panel panel-info">
				            <div class="panel-heading">Default Shipping Address 
				            <span class="pull-right"><a href="#">Edit</a></span>
				            </div>
				            <div class="panel-body">
				            	<address>                
				            	<strong>{fname} {lname}</strong>
				            	<br>{company}<br>{street}
				            	<br>{country}<br>
				            	<abbr title="Telephone">Phone:</abbr> {telephone}            
				            	</address>
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
{/user_shipping_info}