{order_data}

<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
	
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item active">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/reports'); ?>" class="list-group-item">Reports</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Order No {id} (the order confirmation email was sent)
            </div>
            <div class="panel-body">

            <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Order # {id}</div>
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
            <div class="panel-heading">Shipping and Handling Information
            </div>
            <div class="panel-body">
            Standard Fixed: PHP 900.00
            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>


             <div class="col-md-11">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Items Ordered
            </div>
            <div class="panel-body">
                <p>{cart_data}</p>
                <p>{cart_data}</p>
                <p>{cart_data}</p>
                <p>{cart_data}</p>
                <p>{cart_data}</p>
                <p>{cart_data}</p>
                <p>{cart_data}</p>

            </div>
            <div class="panel-footer">
            </div>
          </div>
            </div>


 <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Comments History
            </div>
            <p class="panel-body">This is a panel</p>
            <div class="panel-footer">
            </div>
          </div>
            </div>

             <div class="col-md-6">
                <div class="panel panel-default" id="panels">
            <div class="panel-heading">Order Totals
            </div>
            <div class="panel-body">TOTALS HERE!</div>
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


{/order_data}