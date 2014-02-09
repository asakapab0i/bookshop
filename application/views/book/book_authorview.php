<div class="row">
	
   <?php
   				
   				$limit = array(
   					10, 20, 50, 100
   					);
   				$order = array(
   					'title' => 'Title',
   					'price' => 'Price',
   					'dateadd' => 'Date',
   					);

   				
            	$link_segments =  array(
              				 'page' => $this->uri->segment(8),
              				 'limit' => $this->uri->segment(7),
              				 'order' => $this->uri->segment(6), //asc, desc
              				 'mode' => $this->uri->segment(4),
              				 'order_by' => $this->uri->segment(5), 
              				 'category' => $this->uri->segment(3)
              				 );
            	


            	if ($link_segments['mode'] == '') {
            		$link_segments['mode'] = 'grid';
            	}
            ?>




<div class="col-md-9">
	
	<div class="panel panel-primary" id="panels">
            <div class="panel-heading">Books | Author     



            </div>
         

            <div class="panel-body">
            <center>

            <?php

            if ($this->session->flashdata('wishlist')) {
              $notice = $this->session->flashdata('wishlist');

              echo '<div class="alert alert-warning">';
              echo $notice;
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              echo '</div>';

            }

            ?>


        

            </center>
              <div class="col-md-12">
              <small>Books written by <strong><?php echo urldecode($authorname); ?></strong></small> 
              </div>


            
            <div style="padding-left: 20px;" class="panel-footer">

            <div  class="row text-center" >
            {book_author}
            <div style="margin-bottom: 10px;" class="col-md-3">
            <a href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>" title="{0} by {1}">
            <img class="image-size thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>"	
            <small><strong><span class="text-center">{title}</span></strong> <br/> by <a href="<?php echo site_url('book/author/{author}')?>">{author}</a> </small>
            </a>
            <hr>
            <div><button class="btn btn-xs btn-danger">Price: PHP {price}</button> <br> 
	            {available}
	            <a style="margin-bottom: 2px;" href="<?php echo site_url('book/add_wishlist/{product_id}') ?>" class="label label-info">Add  Wishlist</a>
            </div>
            </div>
            {/book_author}


            </div>
            <hr/>
             
               <center>
        

            </center>
            </div>
          </div>
</div>
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

            	$(document).on('change', '.order_by', function(){

            		var cat = $('.category').val();
            		var order_by = $('.order_by').val();
            		var limit = $('.limit').val();
            		var base = '<?php echo site_url().'book/browse/'?>';
            		var mode = '<?php echo $link_segments['mode']?>';
            		var page = '<?php echo $link_segments['page']?>';
            		var order = '<?php echo $link_segments['order']?>';
            		
            			if (mode == '') {
            				mode = 'grid';
            			}
            			if(order == ''){
            				order = 'asc'; 
            			}
            			if (limit == '') {
            				limit == 10;
            			}
            			if (order_by == '') {
            				order_by = 'name';
            			}
            			if (page == '') {
            				page = 0;
            			}
            			
            			
            		var link = base+''+cat+'/'+mode+'/'+order_by+'/'+order+'/'+limit+'/'+page;
            
            		window.location.replace(link);

            	})

            	$(document).on('change', '.limit', function(){

            		var cat = $('.category').val();
            		var limit = $('.limit').val();
            		var base = '<?php echo site_url().'book/browse/'?>'
            		
					var mode = '<?php echo $link_segments['mode']?>'
            		var order = '<?php echo $link_segments['order']?>'
            		var page = '<?php echo $link_segments['page']?>'
            		var order_by = '<?php echo $link_segments['order_by']?>';
            		

            			if (mode == '') {
            				mode = 'grid';
            			}
            			if(order == ''){
            				order = 'asc'; 
            			}
            			if (order_by == '') {
            				order_by = 'name';
            			}
            			if (limit =='') {
            				limit == 10;
            			}
            			
            			
            		var link = base+''+cat+'/'+mode+'/'+order_by+'/'+order+'/'+limit+'/'+page;
            		window.location.replace(link);

            	})


            	$(document).on('change', '.category', function(){

            		var cat = $('.category').val();
            		var base = '<?php echo site_url().'book/browse/'?>'
            		// var mode = '<?php echo $link_segments['mode']?>'
            		// var order = '<?php echo $link_segments['order']?>'
            		// var limit = '<?php echo $link_segments['limit']?>'
            		// var page = '<?php echo $link_segments['page']?>'

            		if (cat == '') {
            			cat = 'all';
            		}	

            		var link = base+''+cat;
            		window.location.replace(link);

            	})


            });

            </script>
