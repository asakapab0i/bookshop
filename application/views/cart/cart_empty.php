<?php


      if ($this->session->flashdata('checkout')) {
        echo '<div class="alert alert-warning text-center">';
        echo $this->session->flashdata('checkout');
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '</div>';
  
      }

?>

  



<div class="panel panel-primary" id="panels">
            <div class="panel-heading">Shopping Cart
            </div>
            <div class="panel-body">
              
              <h1>Shopping Cart is Empty</h1>
              <p>You have no items in your shopping cart.</p>
              <p>Click <a class="label label-success" href="<?php echo site_url(); ?>">here</a> to continue shopping.</p>

            </div>



           

           

</div>
   

