{order_data}

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
            Order No {order_id} (the order confirmation email was sent)
            </div>
            <div class="panel-body">

            <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Order # {order_id}</div>
            <div class="panel-body">
                 <p>Order Date: {dateorder}</p>
                 <p>Order Status: {order_status}</p>
            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Account Information
            </div>
            <div class="panel-body">
                 <p>Customer Name: {fname} {lname}</p>
                 <p>Email: {email}</p>
            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>

              <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Billing Address
            </div>
            <div class="panel-body">
                               
                                <strong>{fname} {lname}</strong>
                                <br>{company}<br>{street}
                                <br>{country}<br>
                                <abbr title="Telephone">Phone:</abbr> {telephone}            
                                
            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Shipping Address
            </div>
            <div class="panel-body">
                               
                                <strong>{fname} {lname}</strong>
                                <br>{company}<br>{street}
                                <br>{country}<br>
                                <abbr title="Telephone">Phone:</abbr> {telephone}            
                                
            </div>  
            <div class="panel-footer">
            </div>
          </div>
            </div>

              <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Payment Information
            </div>
            <div class="panel-body">
            Payment Method: {payment_method}
            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Invoice Information
            </div>
            <div class="panel-body text-center">
            <button class="btn btn-success btn-lg" type="#">View Invoice</button>
            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>
{/order_data}

             <div class="col-md-offet-1 col-md-11">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Items Ordered
            </div>
            <div class="panel-body">
               


                 <table class="table table-striped table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Unit Price</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('cart/update', $attributes);
              ?>




             
              {order_cart_contents}
              <tr>
                  <td>{name}</td>
                  <td>PHP {price}</td>
                  <td>{qty}</td>
                  <td>PHP {subtotal}.00</td>
                </tr>

            {/order_cart_contents}

            

            
            
               <tr>
                
              <td colspan="1"></td>
              <td colspan="2"><strong>Grand total</strong></td>
              <td colspan="2">
              PHP {total}{order_total}{/total}
              </td>

              </tr>                  


               


              </tbody>
</table>


               

            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>


 <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Comments History
            </div>
            <div class="panel-body">
            <div class="panel-messages">
                Your comments!
            </div>
            <br/>
                <small><textarea class="form-control" placeholder="Comment here..."></textarea></small>
            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>

             <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Order Totals
            </div>
            <div class="text-center panel-body"> 

   
             <h1>PHP {total}{order_total}{/total}</h1>

            </div>
            <div class="panel-footer">
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


