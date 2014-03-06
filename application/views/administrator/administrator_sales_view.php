<div class="row">
	<div class="col-md-3">
	
	
		      <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item">Books</a>
            <a id="reports" href="<?php echo site_url('administrator/accountlist'); ?>" class="list-group-item">Accounts</a>
            <a id="sales" href="<?php echo site_url('administrator/sales'); ?>" class="list-group-item active">Sales</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>

	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Admin Dashboard 
            </div>
            <div class="panel-body">

            
            <div class="text-area col-md-12">

                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">{date}'s Graph <span class="pull-right"> <input size="10" type="text" id="datepicker"> <button id="date-go" class="btn-xs btn btn-primary">Go</button> </span></div>
                            <div id="sales-show-area" class="panel-body">
                            </div>
                    </div>
            </div>

	           <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">{date}'s Sales </div>
                        <div class="panel-body">
                        <table id="sales" class="table">
    <thead>
        <tr>
            <th>Order Id</th>
            <th>Total Earned</th>
             <th>Ordered On</th>
              <th>Ordered By</th>
               <th>Action</th>
        </tr>
    </thead>
    <tbody>
{sales}
<tr> 
<td> {order_id} </td>
<td> {order_total} </td>
<td> {dateorder} </td>
<td> {name} </td>
<td> <a class="btn btn-xs btn-primary" href="<?php echo site_url('administrator/order/{order_id}');?>">View</a></td>
</tr>

{/sales}
<tr><b><td colspan="3"></td><td>Total Earnings</td><td>PHP {earnings}{totals}{/earnings}</td></b></tr>
    </tbody>
    <tfoot>

	</tfoot>
</table>

                        </div>
                    </div>

                            
               

            	

            </div>
   
          </div>
	</div>
</div>

<!-- Chart Scripts -->

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
         var jsonData = $.ajax({
          url: "<?php echo site_url('administrator/get_bookstore_sales_data/{date}')?>",
          async: false
          }).responseText;
         var data = google.visualization.arrayToDataTable($.parseJSON(jsonData));

        var options = {
          title: 'Labelle Aurore Bookstore Sales Statistics',
          hAxis: {title: 'Orders'}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('sales-show-area'));
        chart.draw(data, options);
      }
    </script>

<script>


    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
        autoclose: true
    }); 


    $(document).on('click', '#date-go', function(){

      var selected_date = $('#datepicker').val();
      var link = '<?php echo site_url('administrator/sales/'); ?>'+'/'+selected_date;
      location.replace(link); 

    
    });


</script>
