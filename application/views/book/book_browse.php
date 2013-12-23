<div class="row">
	
<div class="row col-md-9">
	
	<div class="panel panel-primary" id="panels">
            <div class="panel-heading"><h4>Books | Category All</h4>
            </div>
            <center>
            <div class="panel-body">
            	<ul class="pagination pagination-sm col-centered">
              <li>
                <a href="#">Prev</a>
              </li>
              <li>
                <a href="#">1</a>
              </li>
              <li>
                <a href="#">2</a>
              </li>
              <li>
                <a href="#">3</a>
              </li>
              <li>
                <a href="#">4</a>
              </li>
              <li>
                <a href="#">Next</a>
              </li>
            </ul>

            </center>
              <div class="col-md-12"> <small> View as: <a href="#">Grid</a> <a href="#">List</a> 
             
             	<div class="pull-right">
             		Show per page: <select class="">
            	<option>16</option>
            	<option>16</option>
            	<option>16</option>
            	<option>16</option>
            </select>
            Order by: <select class="">
            	<option>Ascending</option>
            	<option>Decending</option>
            	<option>Price</option>
            	<option>Name</option>
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
	            
	            <a style="margin-bottom: 10px;" class="btn btn-xs btn-success" href="<?php echo base_url() . 'cart/add/' . '{product_id}/' ?>">add to cart</a>
	            
            </div>
            </div>
            {/books}


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