{bookview}
<div class="row">


	


<div class="col-md-9">

<div class="panel panel-primary" id="panels">
            <div class="panel-heading">Book Details</div>
            
            <div class="panel-body">
            
		            <div class="row">
						<div class="col-md-3">
							
								<img style="float: left; margin-right: 20px; width: 100%;" width="" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/' . '{image}' ?>">
								 
								<ul class="ratings">
									<li data="1" title="Rate 1 out of 5" class="rated glyphicon glyphicon-star-empty"></li>
									<li data="2" title="Rate 2 out of 5" class="glyphicon glyphicon-star-empty"></li>
									<li data="3" title="Rate 3 out of 5" class="glyphicon glyphicon-star-empty"></li>
									<li data="4" title="Rate 4 out of 5" class="glyphicon glyphicon-star-empty"></li>
									<li data="5" title="Rate 5 out of 5" class="glyphicon glyphicon-star-empty"></li>
								</ul>
								
									<h4>Overall Ratings: <strong><span id="rates">{rate}</span></strong></h4>
									<h5>Out of <span class='people'>{people}</span> people rated.</h5>
								
		
 
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

							   				Qty: <input class="" value="1" name="qty" id="qty" type="text" size=6>
							   				<a class="btn btn-info" id="add_cart" href="<?php echo site_url('cart/add/{product_id}/1/')?>">Add to cart</a>
							   				<a class="btn btn-danger" href="<?php echo site_url('book/add_wishlist/{product_id}') ?>">Add to Wishlist</a>

              					
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
       	data: {rate: data, product_id: product_id, user_id: {user}},
       })
       .done(function(e) {
       	console.log("success");

       if (e == 'existed') {
       	var product_id = $('#title').attr('data');
       			// location.reload();
		       	$('.ratings').html('<small>User already rated.</small>');

		       		$.ajax({
       		 	       	url: '<?php echo site_url("book/avg_ratings"); ?>',
       		 	       	type: 'POST',
       		 	       	data: {product_id: product_id}
       		 	       })
       		 	       .done(function(e) {
       		 	       		$('#rates').html(e)
       		 	       });

       		 	      $.ajax({
       		 	       	url: '<?php echo site_url("book/people_rate"); ?>',
       		 	       	type: 'POST',
       		 	       	data: {product_id: product_id}
       		 	       })
       		 	       .done(function(e) {
       		 	       		$('.people').html(e)
       		 	       });

       }else{

       	var product_id = $('#title').attr('data');
       		 	$.ajax({
       		 	       	url: '<?php echo site_url("book/avg_ratings"); ?>',
       		 	       	type: 'POST',
       		 	       	data: {product_id: product_id}
       		 	       })
       		 	       .done(function(e) {
       		 	       		$('#rates').html(e)
       		 	       });

       		 	       $.ajax({
       		 	       	url: '<?php echo site_url("book/people_rate"); ?>',
       		 	       	type: 'POST',
       		 	       	data: {product_id: product_id}
       		 	       })
       		 	       .done(function(e) {
       		 	       		$('.people').html(e)
       		 	       });
       	}

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