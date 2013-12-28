

<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
	
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="sales" href="#" class="list-group-item active">Sales</a>
            <a id="catalog" href="#" class="list-group-item">Catalog</a>
            <a id="customer" href="#" class="list-group-item">Customers</a>
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

<script type="text/javascript">
	$(function(){



		$('#sales').popover({
			trigger: 'click',
			html: true,
			placement: 'right',
			content: '<a href="sdss<?php echo site_url("administrator/orders")?>" class="list-group-item">Orders</a><a href="#" class="list-group-item">Invoices</a><a href="#" class="list-group-item">Shipments</a><a href="#" class="list-group-item">Transactions</a><a href="#" class="list-group-item">Tax</a>'
		})

		$('#catalog').popover({
			trigger: 'click',
			html: true,
			placement: 'right',
			content: '<a href="#" class="list-group-item">Manage Products</a><a href="#" class="list-group-item">Manage Categories</a><a href="#" class="list-group-item">Search Terms</a><a href="#" class="list-group-item">Ratings & Reviews</a>'
		});



	});
</script>