<div class="row">
	<div class="col-md-3">
	
	
		      <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item active">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item">Books</a>
            <a id="reports" href="<?php echo site_url('administrator/accountlist'); ?>" class="list-group-item">Accounts</a>
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
                        <div class="panel-heading">Bookstore Statistics</div>
                            <div style="height: 200px; overflow:auto;"  class="panel-body">
                                <div id="chart_div_days">
                                 </div>
                                <div id="chart_div_weeks">
                                 </div>                                 
                                  <div id="chart_div_months">
                                 </div>

                            </div>
                    </div>
            </div>

	           <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Store Information</div>
                        <div class="panel-body">

                            <div class="col-md-5">
                                
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Net Income</div>
                                <div style="height: 150px; overflow: auto" class="panel-body text-center">
                                    <br/><br/><p style="font-size: 30px;"><strong>
                                    {net_income}
                                    PHP {total_net_income}
                                    {/net_income}
                                    </strong></p>
                                </div>
                                </div>

                            </div>

                            <div class="col-md-7">
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Recent Orders</div>
                                <div style="height: 150px; overflow: auto" class="panel-body">
                              
                                    
                       
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Total Price</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         {recent_orders}
                                            <tr>
                                                <td>{order_id}</td>
                                                <td>{order_total}</td>
                                                <td>{order_status}</td>
                                                <td><a class="label label-success" href="<?php echo site_url('administrator/order/{order_id}')?>" title="">View</a></td>
                                            </tr>
                                          {/recent_orders}
                                        </tbody>
                                    </table>
                        
                                </div>
                                </div>
                                
                            </div>
                       
                        </div>
                    </div>

                <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Recent Books & Order Messages</div>
                        <div class="panel-body">


                         <div class="col-md-7">
                                
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Recently Added Books</div>
                                <div style="height: 150px; overflow: auto" class="panel-body">
                              
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Book</th>
                                                <th>Author</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {recent_books}
                                            <tr>
                                                <td><a href="<?php echo site_url('')?>" title=""></a>{title}</td>
                                                <td>{author}</td>
                                                <td>
                                                <a class="label label-success" href="<?php echo site_url('book/view/{product_id}/{product_url}') ?>">Home</a><a class="label label-danger" href="<?php echo site_url('administrator/book/{product_id}') ?>">Edit</a>
                                                </td>
                                            </tr>
                                            {/recent_books}
                                        </tbody>
                                    </table>
                                
                                </div>
                                </div>
                                
                            </div>

                            <div class="col-md-5">
                                
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Recently Order Messages</div>
                                <div style="height: 150px; overflow: auto" class="panel-body">
                              
                                    
                       
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         {recent_message}
                                            <tr>
                                                <td>{name}</td>
                                                <td style="max-width: 120px;">{message}</td>
                                                <td><a class="label label-success" href="<?php echo site_url('administrator/order/{order_id}')?>" title="">View</a></td>
                                            </tr>
                                          {/recent_message}
                                        </tbody>
                                    </table>
                        
                                </div>
                                </div>
                                
                            </div>

                          
                       
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
          url: "<?php echo site_url('administrator/get_bookstore_data')?>",
          async: false
          }).responseText;
         var data = google.visualization.arrayToDataTable($.parseJSON(jsonData));

        var options = {
          title: 'Labelle Aurore Bookstore Monthly Income Statistics',
          hAxis: {title: 'Months'}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_months'));
        chart.draw(data, options);
      }
    </script>

   <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
         var jsonData = $.ajax({
          url: "<?php echo site_url('administrator/get_bookstore_data_days')?>",
          async: false
          }).responseText;
         var data = google.visualization.arrayToDataTable($.parseJSON(jsonData));

        var options = {
          title: 'Labelle Aurore Bookstore Daily Income Statistics',
          hAxis: {title: 'Days'}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_days'));
        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
         var jsonData = $.ajax({
          url: "<?php echo site_url('administrator/get_bookstore_data_weeks')?>",
          async: false
          }).responseText;
         var data = google.visualization.arrayToDataTable($.parseJSON(jsonData));

        var options = {
          title: 'Labelle Aurore Bookstore Weekly Income Statistics',
          hAxis: {title: 'Weeks'}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_weeks'));
        chart.draw(data, options);
      }
    </script>
