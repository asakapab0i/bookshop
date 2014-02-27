
{user_info}
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item active">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item">My Order History</a>
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

	            		<div class="panel panel-default">
			            <div class="panel-heading">Contact Information <span class="pull-right"><a href="<?php echo site_url('customer/account')?>">Edit</a></span></div>
			            <div class="panel-body">
			            	<address>                
			            	<strong>{fname} {lname}</strong>
			            	<br>{email}<br>
			            	<abbr title="Mobile">Phone:</abbr> {mobile}<br>
			            	<a href="<?php echo site_url('customer/change_password')?>">Change Password</a>
			            	</address>
		            	</div>

			            </div>

		          </div>
	            	
	            	<div class="col-md-6">

	            		<div class="panel panel-default">
				            <div class="panel-heading">Primary Address 
				            <span class="pull-right"><a href="<?php echo site_url('customer/address')?>">Add</a></span>
				            </div>
				            <div class="panel-body">
				            	<address>                
				            	<strong>{fname} {lname}</strong>
				            	<br>{country}<br>{street}<br/>
				            	<abbr title="Telephone">Phone:</abbr> {telephone}            
				            	</address>
				            </div>
			            </div>

	            	</div>
	            	{/user_info}

<h4>My Recent Orders</h4>
	            	
            		<div class="col-md-12">

	            		<div class="panel panel-default">
				            <div class="panel-heading">My Order History 
				            </div>
				            <div class="panel-body">
							           <table id="account-orders-view" class="table table-striped table-condensed">
						         		<thead>
						         			<tr>
						         				<th>Order No.</th>
						         				<th>Date</th>
						         				<th>Recipient</th>
						         				<th>Order Total</th>

     <th>Package Status</th>
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
			            </div>

	            	</div>

            </div>
            <div class="panel-footer">
            <!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
             -->
             </div>
          </div>
	</div>
</div>


<script type="text/javascript">
    
                $(document).ready(function() {
    $('#account-orders-view').dataTable( {
    	"iDisplayLength": 5,
    	"aLengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
        "aaSorting": [[ 1, "desc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('customer/datatables_recent_order'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="order/'+oObj.aData[0]+'" class="btn btn-xs btn-primary">View</a>';
                },
                "aTargets": [ 6 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>
