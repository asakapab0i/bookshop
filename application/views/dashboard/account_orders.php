
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item ">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item active">My Orders</a>
            <a href="<?php echo site_url('customer/reviews'); ?>" class="list-group-item">My Product Reviews</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item">My Wishlist</a>
          </div>
	</div>

	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            My Order History
         	</div>

         <div class="panel-body"> 

         	<table class="table table-striped table-bordered table-condensed">
         		<thead>
         			<tr>
         				<th>Order No.</th>
         				<th>Date</th>
         				<th>Ship To</th>
         				<th>Order Total</th>
         				<th>Order Status</th>
         				<th>Options</th>
         			</tr>
         		</thead>
         		<tbody>
         			<tbody>
         			{order_history}

         			        <tr class="first odd">
                    <td>{order_id}</td>
                    <td><span class="">{dateadd}</span></td>
                    <td>{fname} {lname}</td>
                    <td><span class="">{order_total}</span></td>
                    <td><em>{order_status}</em></td>
                    <td class="a-center last">
                        <span class="">
                        <a href="https://www.nationalbookstore.com.ph/sales/order/view/order_id/7150/">View Order</a>
                                                    <span class="separator">|</span> <a href="https://www.nationalbookstore.com.ph/sales/order/reorder/order_id/7150/" class="link-reorder">Reorder</a>
                                                </span>
                    </td>
                	</tr>

         			{/order_history}

                    
                    </tbody>
         		</tbody>
         	</table>

         	</div>
         	<div class="panel-footer">
         		
         	</div>

    </div>

</div>
</div>

