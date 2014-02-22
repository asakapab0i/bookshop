

<div class="row">
	<div class="col-md-3">
	
        <div class="list-group">
    
            <a id="orders" href="<?php echo site_url('staff/'); ?>" class="list-group-item active">Orders</a>
            <a id="settings" href="<?php echo site_url('staff/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>
<div class="panel panel-primary">
	<div class="panel-heading">Lastest Claims</div>
		<div style="height: 250px; overflow:auto;" class="text-center panel-body">
<small>
	{latest_claims}
	<p><a href="<?php echo site_url('staff/order/{order_id}')?>">Order Id: {order_id}</a></p>
	{/latest_claims}
</small>
		</div>
</div>

</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Sales/Orders
            </div>
            <div class="panel-body">
	 
<table id="example" class="table">
    <thead>
        <tr>
            <th>Order Id</th>
            <th>Total Price</th>
             <th>Ordered On</th>
              <th>Ordered By</th>
		<th>Package Status</th>
               <th>Order Status</th>
               <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
    <tfoot>

	</tfoot>
</table>

            

            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
	</div>
</div>


<script type="text/javascript">
    
                $(document).ready(function() {
    $('#example').dataTable( {
        "aaSorting": [[ 2, "desc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('administrator/datatables_orders_staff'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="staff/order/'+oObj.aData[0]+'" class="btn btn-xs btn-primary">View</a>';
                },
                "aTargets": [ 6 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>
