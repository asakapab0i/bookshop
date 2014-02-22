

<div class="row">
	<div class="col-md-3">
	
		          <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item active">Books</a>
            <a id="reports" href="<?php echo site_url('administrator/accountlist'); ?>" class="list-group-item">Accounts</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
             Books <a href="<?php echo site_url('administrator/book_add'); ?>" class="pull-right btn btn-default">Add Book</a> <a href="<?php echo site_url('administrator/category_add'); ?>" class="pull-right btn btn-default">Add Category</a>
          </div>
            <div class="panel-body">
<?php 

          if ($this->session->flashdata('featured')) {
            $wishlist = $this->session->flashdata('featured');

            echo '<div class="text-center alert alert-warning">';
            echo $wishlist;
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'; 
            echo '</div>';
          }


?>
        
        <table id="books-view" class="table">
            <thead>
                <tr>
                   <th>Product Id</th>
                   <th>Book Title</th>
                   <th>Author</th>
                   <th>Category</th>
                   <th>Qty</th>
                   <th>Price</th>
                   <th>Date Added</th>
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
    $('#books-view').dataTable( {
        "aaSorting": [[ 6, "desc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('administrator/datatables_books'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                   //return '<a href="book/'+oObj.aData[0]+'" class="btn btn-xs btn-primary">View</a><a href="add_featured/'+oObj.aData[0]+'" class="btn btn-xs btn-danger">Feature</a>';
		return '<a href="book/'+oObj.aData[0]+'" class="btn btn-xs btn-primary">View</a>';

                },
                "aTargets": [ 7 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>


