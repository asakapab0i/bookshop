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
            	
<table class="table table-striped table-bordered table-condensed">
              <thead>
                <tr>
                  <th></th>
                  <th>Product Name</th>
                  <th>Move to Wishlist</th>
                  <th>Unit Price</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                  <th>Option</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'cart');
                  echo form_open('cart/update', $attributes);
              ?>

              {updated_cart}
              
              <tr>
                  <td class="text-center"><img src="<?php echo base_url().'assets/img/books_image' . '/{image}' ?>" width="75" height="75" alt="{name}"></td>
                  <td><a href="<?php echo base_url() . 'book/view/' . '{id}/{link}' ?>">{name}</a>
                  <br><span  class="label label-danger">{availability}</span>
                  </td>
                  <td class="text-center"><a class="btn btn-xs btn-warning" href="<?php echo site_url('book/add_wishlist/{id}') ?>">Move</a></td>
                  <td>PHP {price}</td>
                  <td><input size=5 class="qty" name="cart[{rowid}]" type="text" value="{qty}"></td>
                  <td>PHP {subtotal}.00</td>
                  <td><a class="btn btn-xs btn-danger" href="<?php echo site_url('cart/remove_item/{rowid}') ?>">Delete</a></td>
                </tr>

              {/updated_cart}
                


               


              </tbody>
</table>

            </div>


            <div class="panel-footer">
            <a href="<?php echo site_url('book/browse') ?>" class="btn btn-info">Continue Shopping</a>
            <button type="submit" href="#" class="pull-right btn btn-primary">Update Shopping Cart</button>
            <a href="<?php echo site_url('cart/destroy') ?>" class="pull-right btn btn-danger">Clear Shopping Cart</a>
            
</form>
          	
            </div>


          

              <div class="text-right col-md-12">

                  <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'check_out_validate');
                    echo form_open('checkout', $attributes);
                  ?>

                  <input type="hidden" id="validated_cart" name="validated_cart" value="{ready_checkout}">

                <h4>Total Items: {total_items}</h4>
              	<h1><strong>Grand Total : PHP {total_price}</strong></h1>
              	<button id="checkout_submit" type="submit" class="btn btn-lg btn-success">Proceed to Checkout</button>
                <?php
                echo form_close();
                ?>
              </div>
          </div>


  <script type="text/javascript">


              $(function(){
                
                var qty = $('#validated_cart').val();                

                if (qty == 0 ) {
                  $('#checkout_submit').addClass('disabled');
                }


                $(document).on('keyup', '.qty', function(){

                  $('#checkout_submit').addClass('disabled');

                } );

              });
               
            </script>
