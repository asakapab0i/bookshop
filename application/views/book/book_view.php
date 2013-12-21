{bookview}
<div class="row">


	


<div class="col-md-9">

<div class="panel panel-primary" id="panels">
            <div class="panel-heading">Book Details</div>
            
            <div class="panel-body">
            
		            <div class="row">
						<div class="col-md-6">
							
								<img style="float: left; margin-right: 20px; height: 250;" width="150" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/' . '{image}' ?>">
								<h6>{title}</h6>
							<small> 
							   Author: {author} <br/>
							   Publisher: {publisher} <br/>
							   Format: {format} <br/>
							   ISBN: {isbn} <br/>
							   </small>
							   <small><a href="#">Email to a friend</a><br/></small>
							   <small><a href="#">Be the first to write a review</a></small><br/>
							   <span class="label label-success">PHP {price}</span><small><br/>
							    Availability: In Stock <br/> 
							  	This product will ship in 2 to 3 days.<br/>
							   </small><br/>
							   <div class="col-md-12">
							   	Recommend | Tweet here
							   </div>
						</div>
						<div class="col-md-6">
							<h4>Description</h4>
							<p>{description}</p>
						</div>
					</div>	

					 <div class="text-center col-md-12 alert alert-primary">
							   <hr/>
                					
							   			<h4 class="">PHP {price}</h4>
							   				
							   				

							   				Qty: <input class="" value="1" name="qty" id="qty" type="text" size=6> <a id="add_cart" href="<?php echo site_url('cart/add/{product_id}/1/') . $_SERVER['REQUEST_URI']; ?>" class="btn btn-info">Add to cart</a href="<?php echo site_url('cart/update/{product_id}/') ?>"><button class="btn btn-danger">Add to Wishlist</button>
							   		
							   			<script type="text/javascript">
							   				$(document).on('keyup', '#qty', function(){
							   					var value = $('#qty').val();
							   					var link = "<?php echo site_url();?>";
							   					link = link.concat('cart/add/{product_id}/');
							   					link = link.concat(value);
							   					var pathname = window.location.pathname;
							   					link = link.concat(pathname);

							   					$("#add_cart").attr("href", link);

							   				});
							   				</script>
							   		

              					
					 </div>

            </div>
            
            <div class="panel-footer">
            </div>
</div>

{/bookview}


		
	</div>
	<div class="col-md-3">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">My Cart</div>
            
            <div class="panel-body text-center">
            	<p>There are <span class="label label-danger">{items} item(s)</span> in your cart.</p>
            	<span class="btn btn-xs btn-info">Subtotal: PHP {subtotal}</span>
            	
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
	            		<small>{name}</small><br/>
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
