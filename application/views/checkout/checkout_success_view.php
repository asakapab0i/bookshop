<div class="panel panel-primary" id="panels">
            <div class="panel-heading">Payment Notification
            </div>
            <div class="text-center panel-body">
              

           
            	<?php
            	
              foreach ($paypal as $key => $value) {
                $order_id = $paypal['custom'];
              }

            	?>
           


           	<h1>Checkout Success!</h1>
           	<p>Thank you for shopping in <strong>La Belle Aurore Bookshop!</strong>! Hope to see you again soon!</p>
           	<a class="btn btn-success btn-lg" href="<?php echo base_url() . 'customer/invoice_log/'.$order_id.' '?>" title="">View Invoice Transaction </a>
           	<a class="btn btn-success btn-lg" href="<?php echo base_url() . 'customer/order/'.$order_id.' '?>" title="">View Order Transaction</a>

            </div>
 

</div>
   

