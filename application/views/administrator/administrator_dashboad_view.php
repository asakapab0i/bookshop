

<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
	
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item active">Dashboard</a>
            <a id="sales" href="#" class="list-group-item">Sales</a>
            <a id="catalog" href="#" class="list-group-item">Catalog</a>
            <a id="customer" href="#" class="list-group-item">Customers</a>
            <a href="#" class="list-group-item">Settings</a>
          </div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Admin Dashboard
            </div>
            <div class="panel-body">
	 

            	

            </div>
            <div class="panel-footer">
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
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
			content: '<a href="#" class="list-group-item">Orders</a><a href="#" class="list-group-item">Invoices</a><a href="#" class="list-group-item">Shipments</a><a href="#" class="list-group-item">Transactions</a><a href="#" class="list-group-item">Tax</a>'
		})

		$('#catalog').popover({
			trigger: 'click',
			html: true,
			placement: 'right',
			content: '<a href="#" class="list-group-item">Manage Products</a><a href="#" class="list-group-item">Manage Categories</a><a href="#" class="list-group-item">Search Terms</a><a href="#" class="list-group-item">Ratings & Reviews</a>'
		});



	});
</script>