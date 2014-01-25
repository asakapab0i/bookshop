
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item ">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item active">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item ">My Orders</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item">My Wishlist</a>
          </div>
	</div>

	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            My Address
         	</div>

         <div class="panel-body"> 


         <?php 

      if ($this->session->flashdata('add_address')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('add_address');
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '</div>';
  
      }
        

       ?>


            <div class="row">
            <div class="col-md-6">
                 <h4>Primary Address</h4>
            {address_primary}
                                <address>
                                {fname} {lname}<br>{street}
                                <br>{country}<br>
                                <abbr title="Telephone">Phone:</abbr> {telephone}            
                                </address>
        {/address_primary}
            </div>

            <div class="col-md-6">
                <br>
                <br>
                <br>
                <a class="btn btn-success btn-large" href="<?php echo site_url('customer/address_add') ?>">Add new shipping address</a>

            </div>

            </div>


            <div class="row">
                
                 <div class="col-md-12">
                     <h4>Shipping Address</h4>

                     <ul class="">

                     {address_shipping}
                      <li class="active">{fname} {lname} {street} {state} {country}</li>
                     {/address_shipping}   

                     </ul>

                 </div>

            </div>

            

         	</div>
         	<div class="panel-footer">
         		
         	</div>

    </div>

</div>
</div>