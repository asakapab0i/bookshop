
<div class="row">
	<div class="col-md-3">
	
		          <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item ">Books</a>
            <a id="reports" href="<?php echo site_url('administrator/accountlist'); ?>" class="list-group-item active">Accounts</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
           Account Information
            </div>
            <div class="panel-body">
            {personal}

            <div id="panel-head" data="{user_id}" class="panel panel-default" id="main">
                <div class="panel-heading">
                  Personal Information  
                </div>
                <div class="panel-body">
                    
                    <div class="col-md-6">
                        
                        <div class="panel panel-default">
                        <div class="panel-heading">Personal Information <span class="pull-right"><a href="<?php echo site_url('customer/account')?>">Edit</a></span></div>
                        <div class="panel-body">
                            <address>                
                            <strong>{fname} {lname}</strong>
                            <br>{email}<br>
                            <abbr title="Mobile">Phone:</abbr> {mobile}<br>
                            Account Type: <span id="user_type">{user_type}</span> &nbsp&nbsp<select id="admin_action">
                            <option value="">Set to ...</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="regular">Regular</option>
                        </select>
                            </address>
                        </div>
                        </div>


                    </div>

                    <div class="col-md-6">

                        <div class="panel panel-default">
                            <div class="panel-heading">Address Information 
                            <span class="pull-right"><a href="<?php echo site_url('customer/address')?>">Add</a></span>
                            </div>
                            <div class="panel-body">
                                <address>                
                                <strong>{fname} {lname}</strong>
                                <br>{company}<br>{street}
                                <br>{country}<br>       
                                </address>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="panel panel-default" id="main">
                <div class="panel-heading">
                  Order History  
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

                </div>
            </div>

{/personal}
	 
            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
	</div>
</div>


<script type="text/javascript">
    
                $(document).ready(function() {
                     var user_id = $('#panel-head').attr('data');
    $('#example').dataTable( {
        "aaSorting": [[ 2, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('administrator/datatables_orders_by_id/"+user_id+"'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="../order/'+oObj.aData[0]+'" class="btn btn-xs btn-primary">View</a>';
                },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

<script type="text/javascript">
  $(document).on('change', '#admin_action', function(event) {
    event.preventDefault();
    /* Act on the event */

    var status = $(this).val();
    var user_id = $('#panel-head').attr('data');

    if (status != '') {
      $.ajax({
      url: '<?php echo site_url("administrator/post_change_user_type") ?>',
      type: 'POST',
        data: {status: status, user_id:user_id},
      })
      .done(function(e) {
        $('#user_type').html(e);
      });
    };
    

  });
</script>
