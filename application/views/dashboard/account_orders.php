
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
                            <tr class="first odd">
                    <td>100007273</td>
                    <td><span class="">12/24/13</span></td>
                    <td>demo demo</td>
                    <td><span class="">PHP 2,392.00</span></td>
                    <td><em>Pending</em></td>
                    <td class="a-center last">
                        <span class="">
                        <a href="https://www.nationalbookstore.com.ph/sales/order/view/order_id/7150/">View Order</a>
                                                    <span class="separator">|</span> <a href="https://www.nationalbookstore.com.ph/sales/order/reorder/order_id/7150/" class="link-reorder">Reorder</a>
                                                </span>
                    </td>
                </tr>
                            <tr class="even">
                    <td>100007204</td>
                    <td><span class="">12/20/13</span></td>
                    <td>demo demo</td>
                    <td><span class="">PHP 1,104.00</span></td>
                    <td><em>Pending</em></td>
                    <td class="a-center last">
                        <span class="">
                        <a href="https://www.nationalbookstore.com.ph/sales/order/view/order_id/7089/">View Order</a>
                                                </span>
                    </td>
                </tr>
                            <tr class="last odd">
                    <td>100007195</td>
                    <td><span class="">12/20/13</span></td>
                    <td>demo demo</td>
                    <td><span class="">PHP 1,772.00</span></td>
                    <td><em>Canceled</em></td>
                    <td class="a-center last">
                        <span class="">
                        <a href="https://www.nationalbookstore.com.ph/sales/order/view/order_id/7080/">View Order</a>
                                                    <span class="separator">|</span> <a href="https://www.nationalbookstore.com.ph/sales/order/reorder/order_id/7080/" class="link-reorder">Reorder</a>
                                                </span>
                    </td>
                </tr>
                    </tbody>
         		</tbody>
         	</table>

         	</div>
         	<div class="panel-footer">
         		
         	</div>

    </div>

</div>
</div>

