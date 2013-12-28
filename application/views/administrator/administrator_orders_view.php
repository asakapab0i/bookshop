

<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
	
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="sales" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item active">Orders</a>
            <a id="catalog" href="#" class="list-group-item">Shipments</a>
            <a id="customer" href="#" class="list-group-item">Reports</a>
            <a href="#" class="list-group-item">Settings</a>
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
               <th>Order Status</th>
               <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
    <tfoot>

	</tfoot>
</table>

            	<script>


            	$(document).ready(function() {
    $('#example').dataTable( {
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('administrator/datatables_orders'); ?>",
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

            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
	</div>
</div>
