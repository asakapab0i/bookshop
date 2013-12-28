

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
        </tr>
    </thead>
    <tbody>
        
    </tbody>
    <tfoot>
		<tr>
			<th>Order Id</th>
		</tr>
	</tfoot>
</table>

            	<script>
            	$('#example').dataTable({
"bProcessing": true,
"bServerSide": true,
"iDisplayLength": 20,
//"bPaginate": true,
"bAutoWidth": false,
"iDisplayStart": 0,
"bLengthChange": false,//for sorting 10,20,30,50 ....
"sAjaxSource": "<?echo site_url('administrator/datatables_orders'); ?>",
"aaSorting": [[ 1, "desc" ]],
"sPaginationType": "full_numbers",
"aoColumns":[
    {"bSearchable": false,"bSortable": false,"bVisible": false},
    {"bSearchable": true,"bSortable": true},
    {"bSearchable": false,"bSortable": false},
    {"bSearchable": true,"bSortable": true},
    {"bSearchable": false,"bSortable": true},
    {"bSearchable": false,"bSortable": false}
],
"fnServerData": function(sSource, aoData, fnCallback){
    $.ajax(
          {
            'dataType': 'json',
            'type'  : 'POST',
            'url'    : sSource,
            'data'  : aoData,
            'success' : fnCallback
          }
      );//end ajx
    // console.log(fnCallback);
}    
});


            	
            	</script>

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