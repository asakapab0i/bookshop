       <?php 

      if ($this->session->flashdata('checkout')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('checkout');
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '</div>';
  
      }
        

       ?>
       <!-- Start Index Body -->
       <div class="col-md-5">
                <h1>LabelleAurore Bookshop</h1>
                <p>is a second-hand bookstore located in Hernan Cortes St., Mandaue City, Cebu. It was established in December 2009. It currently carries more than seven thousand volumes of used and overstock books.</p>
                <p><a class="btn btn-primary btn-lg">Browse Books</a></p>
            </div>
			
			<div class="row">
       
         <section id="featured">
            <h2>Featured</h2>
            <hr/>
            <div class="row">
            
            {featured}
    <center>            

                <div class="col-md-2">
                    <a href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small> <br/> by <small>{author}</small>
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-default">Add cart</a>
                     
                    </div>

                </div>
</center>
            {/featured}
                                
            </div>
        </section>

             <section id="releases">
            <h2>New Releases</h2>
            <hr/>
            <div class="row">
            {releases}
            <center>
                <div class="col-md-2">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small> <br/> by <small>{author}</small>
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/releases}
            </div>
        </section>

            <section id="random">
            <h2>Random</h2>
            <hr/>
            <div class="row">
            {random}
            <center>
                <div class="col-md-2">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small> <br/> by <small>{author}</small>
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/random}
            </div>
        </section>

            </div>

        <!-- End Index Body -->