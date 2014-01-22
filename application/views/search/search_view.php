{search_result}
<div class="row">


	


<div class="col-md-9">

<div class="panel panel-primary" id="panels">
            <div class="panel-heading">Book Details</div>
            
            <div class="panel-body">
            
		            <div class="row">
						<div class="col-md-3">
							
								<img style="float: left; margin-right: 20px; width: 100%;" width="" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/' . '{image}' ?>">
								<!-- Your rating: 
								<span class="ratings">
									<span data="1" title="Rate 1 out of 5" class="glyphicon glyphicon-star-empty"> </span>
									<span data="2" title="Rate 2 out of 5" class="glyphicon glyphicon-star-empty"> </span>
									<span data="3" title="Rate 3 out of 5" class="glyphicon glyphicon-star-empty"> </span>
									<span data="4" title="Rate 4 out of 5" class="glyphicon glyphicon-star-empty"> </span>
									<span data="5" title="Rate 5 out of 5" class="glyphicon glyphicon-star-empty"> </span>
									
								</span>

								
									<h4>Overall Ratings: <strong><span id="rates">4.5</span></strong></h4>
									<h5>Out of 10,000 people rated.</h5> -->
								
		
 
						</div>
						<div class="col-md-3">
							<h6 id="title" data="{product_id}"><strong>{title}</strong></h6>
							<small> 
							   Author: {author} <br/>
							   Publisher: {publisher} <br/>
							   Format: {format} <br/>
							   ISBN: {isbn} <br/>
							   </small>
							 
							   <span class="label label-success">PHP {price}</span><small><br/>
							  	This product will ship in 2 to 3 days.<br/>
							   </small><br/>
						</div>
						<div class="col-md-6">
							<h4>Description</h4>
							<p>{description}</p>
						</div>
					</div>	

					 <div class="text-center col-md-12 alert alert-primary">
							   <hr/>
                					
							   			<h4 class="">PHP {price}</h4>
							   				
							   				

							   				Qty: <input class="" value="1" name="qty" id="qty" type="text" size=6> <a id="add_cart" href="<?php echo site_url('cart/add/{product_id}/1/')?>" class="btn btn-info">Add to cart</a><a class="btn btn-danger" href="<?php echo site_url('book/add_wishlist/{product_id}') ?>">Add to Wishlist</a>
							   		
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

{/search_result}


		
	</div>
	<div class="col-md-3">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">My Cart</div>
            
            <div class="panel-body text-center">
            	<p>There are <span class="label label-danger">{items} item(s)</span> in your cart.</p>
            	<span class="btn btn-xs btn-info">Subtotal: PHP {subtotal}</span>
            	
            	<a href="<?php echo site_url('cart') ?>" class="btn btn-sm btn-danger">Checkout</a>
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
	            		<a href="<?php echo site_url('book/view/{id}') ?>" class="label label-info">Edit</a>
	            		<a href="<?php echo site_url('cart/remove_item/{rowid}') ?>" class="label label-danger">Delete</a>
	            	</div>
	            	
	            </div>
	          	<hr/>

	          	 {/recent_cart}

            </div>
		</div>
	</div>



</div>

<script type="text/javascript">
    

$(function(){



	$(document).on('click', '.glyphicon', function(event) {
        event.preventDefault();
        /* Act on the event */

        var data = $(this).attr('data');
       	var product_id = $('#title').attr('data');


       $.ajax({
       	url: '<?php echo site_url("book/ratings"); ?>',
       	type: 'POST',
       	data: {rate: data, product_id: product_id, user_id: 40},
       })
       .done(function() {
       	console.log("success");

       	// location.reload();

       })
       .fail(function() {
       	console.log("error");
       })
       .always(function() {
       	console.log("complete");
       });
       


    });



    $(document).on('mouseenter', '.glyphicon', function(event) {
        event.preventDefault();
        /* Act on the event */

        
        $(this).addClass('glyphicon-star');
		$(this).removeClass('glyphicon-star-empty');       
        //alert('sdaasd');

    });


    $(document).on('mouseout', '.glyphicon', function(event) {
        event.preventDefault();
        /* Act on the event */

        
      	$('.ratings span').each(function(index, val) {
      		 /* iterate through array or object */
      		 $(this).removeClass('glyphicon-star');
      		$(this).addClass('glyphicon-star-empty');  

      	});

    });



});

</script>