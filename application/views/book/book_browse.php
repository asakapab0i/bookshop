
<div class="row">
	
   <?php
   				$categories = array(
   					'all' => 'All Categories',
   					'ecommerce' => 'E Commerce',
   					'antiquesandcollectible' => 'Antiques &amp; Collectibles'
   					);
   				$limit = array(
   					10, 20, 50, 100
   					);
   				$order = array(
   					'asc' => 'Ascending',
   					'desc' => 'Descending',
   					'price' => 'Price',
   					'name' => 'Name'
   				);

            	$link_segments =  array(
              				 'page' => $this->uri->segment(7),
              				 'limit' => $this->uri->segment(6),
              				 'order' => $this->uri->segment(5),
              				 'mode' => $this->uri->segment(4),
              				 'category' => $this->uri->segment(3)
              				 );
            ?>

<div class="row col-md-9">
	
	<div class="panel panel-primary" id="panels">
            <div class="panel-heading"><h4>Books | Category 

            <select class="category">

            <?php
            	foreach ($categories as $key => $value) {
            		
            		if ($key == $link_segments['category']) {
            			echo '<option selected value='.$key.'>'.$value.'</option>';
            		}else{
            			echo '<option value='.$key.'>'.$value.'</option>';
            		}
            	}
            ?>

            	<!-- <option value="all">All Books</option>
            	<option value="ecommerce">eCommerce Books</option>
            	<option value="antiquesandcollectible">Antiques &amp; Collectibles</option>
            	<option>16</option> -->
            </select></h4>
            </div>
         

            <div class="panel-body">
            <center>
         {pagination}

            </center>
              <div class="col-md-12"> <small> View as: <a class="
              <?php

              if ($link_segments['mode'] == "grid") {
              	echo 'btn btn-xs btn-default';
              }

              ?>

              " href="<?php 

              $default = 'grid';
              $attrib = array('book/browse',$link_segments['category'], $default, $link_segments['order'],$link_segments['limit'],$link_segments['page']);
              echo site_url($attrib); ?>">Grid</a> <a class="


              <?php

              if ($link_segments['mode'] == "list") {
              	echo 'btn btn-xs btn-default';
              }

              ?>

              ?>


              " href="

             <?php 

              $default = 'list';
		      $attrib = array('book/browse',$link_segments['category'], $default, $link_segments['order'],$link_segments['limit'],$link_segments['page']);
              echo site_url($attrib); ?>

              ">List</a> 
             
             	<div class="pull-right">
             		Show per page: 
			<select class="limit">

				<?php
					foreach ($limit as $key => $value) {


						if ($value == $link_segments['limit']) {
							echo '<option selected value='.$value.'>'.$value.'</option>';
						}else{
							echo '<option value='.$value.'>'.$value.'</option>';
						}
					}
				?>
            </select>
            Order by: <select class="order_by">
            	<?php

            	foreach ($order as $key => $value) {
            		
            		if ($key == $link_segments['order']) {
            			echo '<option selected value='.$key.'>'.$value.'</option>';
            		}else{
            			echo '<option value='.$key.'>'.$value.'</option>';
            		}
            	}

            	?>
            </select> 

             	</div>

</small>
              </div>


            
            <div style="padding-left: 20px;" class="panel-footer">

            <div  class="row text-center" >
            {books}
            <div class="col-md-3">
            <a href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>" title="{0} by {1}">
            <img class="image-size thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">	
            <small><strong><span class="text-center">{title}</span></strong> <br/> by {author}</small>
            </a>
            <hr>
            <div><button class="btn btn-xs btn-danger">Price: PHP {price}</button> <br> 
	            
	            <a style="margin-bottom: 10px;" class="btn btn-xs btn-success" href="<?php echo base_url() . 'cart/add/' . '{product_id}/' ?>">Add to cart</a>
	            
            </div>
            </div>
            {/books}


            </div>
            <hr/>
               
              <div class="col-md-12"> <small> View as: 

               <a class="grid" value="grid" href="<?php 

              $default = 'grid';
              $attrib = array('book/browse',$link_segments['category'], $default, $link_segments['order'],$link_segments['limit'],$link_segments['page']);
              echo site_url($attrib); ?>">Grid</a>
               <a class="list" href="<?php 

              $default = 'list';
		      $attrib = array('book/browse',$link_segments['category'], $default, $link_segments['order'],$link_segments['limit'],$link_segments['page']);
              echo site_url($attrib); ?>">List</a> 
             
             

</small>
              </div>
               <center>
         {pagination}

            </center>
            </div>
          </div>
</div>
</div>

	<div class="row pull-right col-md-3">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading"><h4>My Cart</h4></div>
            
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


   
            <script type="text/javascript">
         
            $(function(){

            	$(document).on('change', '.order_by', function(){

            		var cat = $('.category').val();
            		var order = $('.order_by').val();
            		var base = '<?php echo site_url().'book/browse/'?>'
            		var limit = '<?php echo $link_segments['limit']?>'
					var mode = '<?php echo $link_segments['mode']?>'
            		var page = '<?php echo $link_segments['page']?>'
            		
            		

            			if (mode == '') {
            				mode = 'grid';
            			}
            			if(order == ''){
            				order = 'asc'; 
            			}
            			if (limit =='') {
            				limit == 10;
            			}
            			
            			
            		var link = base+''+cat+'/'+mode+'/'+order+'/'+limit+'/'+page;
            		window.location.replace(link);

            	})

            	$(document).on('change', '.limit', function(){

            		var cat = $('.category').val();
            		var limit = $('.limit').val();
            		var base = '<?php echo site_url().'book/browse/'?>'
            		
					var mode = '<?php echo $link_segments['mode']?>'
            		var order = '<?php echo $link_segments['order']?>'
            		var page = '<?php echo $link_segments['page']?>'
            		
            		

            			if (mode == '') {
            				mode = 'grid';
            			}
            			if(order == ''){
            				order = 'asc'; 
            			}
            			if (limit =='') {
            				limit == 10;
            			}
            			
            			
            		var link = base+''+cat+'/'+mode+'/'+order+'/'+limit+'/'+page;
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
