<div class="row">
	
     <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'check_out_form');
                  echo form_open('checkout/place_order', $attributes);
    ?>

<div class="col-md-9">
	
<div class="panel panel-primary" id="panels">
            <div class="panel-heading">Checkout Express
            </div>
            <div class="panel-body">
            	

<div class="panel-group" id="accordion">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#shipping-address">
          Select Address Information
        </a>
      </h4>
    </div>
    <div id="shipping-address" class="panel-collapse collapse in">
      <div class="panel-body">
      	
      
      <div class="row">
        
        <div class="col-md-10">
            Select a shipping address from your address book or add a <a href="<?php echo site_url('customer/address_add'); ?>" class="" title="">+ new address</a>.

          <select name="shipping_address" class="form-control">  
            
            {address}
            <option value="{address_id}">{fname} {lname}, {street} {state} {country}</option>
            {/address}
          </select>
        </div>

        <div class="col-md-2">
          <button id="shipping-address-submit" class="btn btn-lg btn-success">Continue</button>
        </div>

      </div>

        
      	
      </div>
    </div>
  </div>


   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#payment-type">
         Payment Information
        </a>
      </h4>
    </div>


    <div id="payment-type" class="panel-collapse collapse">
      <div class="panel-body">

        
        <div class="row">
          
          <div class="col-md-offset-5 col-md-5">
            
        <a class="btn btn-warning btn-lg">Paypal Checkout</a> <input checked name="payment_method" type="radio" value="paypal_checkout">
     
          </div>

          <div class="col-md-2">
            <button id="payment-type-submit" class="btn btn-lg btn-success">Continue</button>
          </div>

        </div>


      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#order-review">
         Order Review
        </a>
      </h4>
    </div>
    <div id="order-review" class="panel-collapse collapse">
      <div class="panel-body">
        
        <div class="col-md-12">
          
           <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Unit Price</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('cart/update', $attributes);
              ?>




              {cart_contents}
              
              <tr>
                  <td>{name}</td>
                  <td>PHP {price}</td>
                  <td>{qty}</td>
                  <td>PHP {subtotal}.00</td>
                </tr>

              {/cart_contents}

            

             
               <tr>
                
              <td colspan="1"></td>
              <td colspan="2"><strong>Grand total</strong></td>
              <td colspan="2">
              PHP {grand_total}
              </td>

              </tr>                  


               


              </tbody>
</table>
<div class="col-md-12">
  <div class="col-md-10">
      Forgot an item? <a href="<?php echo site_url('cart'); ?>">Edit your cart.</a>
    </div>


    <div class="col-md-2">
      <button type="submit" class="pull-right btn btn-lg btn-danger">Place Order</button>
    </div>

</div>

        </div>
      

  
    



<?php
  
  echo form_close();

?>

      </div>
    </div>
  </div>
</div>



            </div>
            <div class="panel-footer"></div>
          </div>



</div>

	<div class="col-md-3">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">My Cart</div>
            
            <div class="panel-body text-center">
            	<p>There are <span class="label label-danger">{items} item(s)</span> in your cart.</p>
            	<span class="btn btn-xs btn-info">Subtotal: PHP {total_price}</span>
            	
            	<p class="btn btn-sm btn-danger">Checkout</p>
            </div>
             
            <div class="panel-footer">
           	<small>Recently Added Item(s)</small>
           		{recent_cart}
	            <div class="row">
	            	<div class="col-md-6 text-center">
	            		
	            		<img style="height: 100px;" width="100" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/' . '{image}' ?>">
	            	</div>
	            	<div class="col-md-6">
	            		<small><strong>{name}</strong></small><br/>
	            		<small><strong>{qty}</strong> x PHP {price}</small>
	            		<a href="#" class="label label-info">Edit</a>
	            		<a href="#" class="label label-danger">Delete</a>
	            	</div>
	            	
	            </div>
	          	<hr/>

	          	 {/recent_cart}

            </div>
		</div>
	</div>

</div>


<script  type="text/javascript" charset="utf-8">
  
  $(function(){

    $(document).on('click', '#shipping-address-submit', function(event) {
      event.preventDefault();
      /* Act on the event */

      $('#shipping-address').collapse('hide');
      $('#payment-type').collapse('show');


      // $('#shipping-address').addClass('collapse').removeClass('in');
      // $('#shipping-method').addClass('in');
    });


    $(document).on('click', '#shipping-type-submit', function(event) {
      event.preventDefault();
      /* Act on the event */
      

      $('#shipping-method').collapse('hide');
      $('#payment-type').collapse('show');

    });

    $(document).on('click', '#payment-type-submit', function(event) {
      event.preventDefault();
      /* Act on the event */

      $('#payment-type').collapse('hide');
      $('#order-review').collapse('show');

    });


    
  });

</script>












