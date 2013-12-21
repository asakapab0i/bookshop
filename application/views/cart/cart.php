
<div class="panel panel-primary" id="panels">
            <div class="panel-heading"><h4>Shopping Cart</h4>
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
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('cart/update', $attributes);
              ?>

              {cart_contents}
              
              <tr>
                  <td class="text-center"><img src="<?php echo base_url().'assets/img/books_image' . '/{image}' ?>" width="75" height="75" alt="The Smurfs My Busy Books"></td>
                  <td><a href="<?php echo base_url() . 'book/view/' . '{id}/{link}' ?>">{name}</a></td>
                  <td><a href="#">Move</a></td>
                  <td>{price}</td>
                  <td><input size=5 name="cart[{rowid}]" type="text" value="{qty}"></td>
                  <td>PHP {subtotal}.00</td>
                  <td><a href="#">Edit</a>/<a href="#">Delete</a></td>
                </tr>

              {/cart_contents}
                


               


              </tbody>
</table>

            </div>


            <div class="panel-footer">
            <a href="<?php echo site_url() ?>" class="btn btn-info">Continue Shopping</a>
            <button type="submit" href="#" class="pull-right btn btn-primary">Update Shopping Cart</button>
            <a href="<?php echo site_url('cart/destroy') ?>" class="pull-right btn btn-danger">Clear Shopping Cart</a>
            
</form>
          	
            </div>
              <div class="text-right col-md-12">
                <h4>Total Items: {total_items}</h4>
              	<h2>Subtotal : PHP {total_price}</h2>
              	<h1><strong>Grand Total : PHP {total_price}</strong></h1>
              	<a href="#" class="btn btn-lg btn-success">Proceed to Checkout</a>
              </div>
          </div>

