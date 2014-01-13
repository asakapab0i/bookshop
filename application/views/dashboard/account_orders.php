
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
            My Order History
         	</div>

         <div class="panel-body"> 

         	<table id="account-orders-view" class="table table-striped table-condensed">
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
         			
                    </tbody>
         		</tbody>
         	</table>

         	</div>
         	<div class="panel-footer">
         		
         	</div>

    </div>

</div>
</div>

<script type="text/javascript">
    
                $(document).ready(function() {
    $('#account-orders-view').dataTable( {
        "aaSorting": [[ 1, "desc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('customer/datatables_order'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="order/'+oObj.aData[0]+'" class="btn btn-primary">View</a>';
                },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>