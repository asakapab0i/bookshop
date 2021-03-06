

<div class="row">
	<div class="col-md-3">
	
		          <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item">Books</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
           Shipments
            </div>
            <div class="panel-body">

        
        <table id="shipments-view" class="table">
            <thead>
                <tr>
                    <th>Shipment No</th>
                    <th>Date Shipped</th>
                    <th>Order No</th>
                    <th>Order Date</th>
                    <th>Ship to Name</th>
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
    $('#orders-view').dataTable( {
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('administrator/datatables_shipments'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="shipment/'+oObj.aData[0]+'" class="btn btn-primary">View</a>';
                },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>