
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item ">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item ">My Orders</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item active">My Wishlist</a>
          </div>
	</div>

	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
           My Wishlist
         	</div>

         <div class="panel-body"> 

          <?php

          if ($this->session->flashdata('wishlist')) {
            $wishlist = $this->session->flashdata('wishlist');

            echo '<div class="text-center alert alert-warning">';
            echo $wishlist;
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'; 
            echo '</div>';
          }

          ?>

       <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th></th>
                  <th>Product Name</th>
                  <th>Unit Price</th>
                  <th>Add to cart</th>
                </tr>
              </thead>
              <tbody>

              {wishlist}    
              <tr>
                  <td class="text-center"><img src="<?php echo base_url().'assets/img/books_image' . '/{image}' ?>" width="75" height="75" alt="The Smurfs My Busy Books"></td>
                  <td><a href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>">{title}</a>
                  <br>
                  </td>
                  <td>PHP {price}</td>
                  <td class="text-center">Qty: <input class="" value="1" name="qty" id="qty{product_id}" type="text" size=6> 

                  <a id="add_cart{product_id}" href="<?php echo site_url('cart/add/{product_id}/1/')?>" class="btn btn-success">Add to cart </a>
                  <a class="btn btn-danger" href="<?php echo site_url('customer/remove_wishlist/{product_id}/') ?>">Remove</a></td>
                </tr>

                <script type="text/javascript">
                                            $(document).on('keyup', '#qty{product_id}', function(){
                                                var value = $('#qty{product_id}').val();
                                                var link = "<?php echo site_url();?>";
                                                link = link.concat('cart/add/{product_id}/');
                                                link = link.concat(value);
                                                var pathname = window.location.pathname;
                                                link = link.concat(pathname);

                                                $("#add_cart{product_id}").attr("href", link);

                                            });
                </script>
              {/wishlist}


              </tbody>
</table>

         	</div>
         	<div class="panel-footer">
         		
         	</div>

    </div>

</div>
</div>


                                  