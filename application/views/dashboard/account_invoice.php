
  

<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item ">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item active">My Orders</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item">My Wishlist</a>
          </div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
           	Paypal Invoice Log
            </div>

            <div class="panel-body">


            <h4>Invoice Log for Order No. <?php echo $order_no; ?> </h4>




            <?php
            echo "<code>";
           if (count($paypal_log) != 0) {
           	 foreach ($paypal_log as $key => $value) {
            	echo $key.': '.$value;
            	echo '<br/>';
            }
           }else{
           	echo 'Payment must be approved to view the paypal invoice log.';
           }
            echo "</code>";
            ?>


          	</div>
	 
            
          </div>
	</div>
</div>




