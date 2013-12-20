       <!-- Start Index Body -->
       <div class="jumbotron">
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
                

                <div class="col-md-2">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small>
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-default">Add cart</a>
                     
                    </div>

                </div>
            {/featured}
                                
            </div>
        </section>

             <section id="releases">
            <h2>New Releases</h2>
            <hr/>
            <div class="row">
            {releases}
                <div class="col-md-2">
                    <a  href="<?php echo base_url() . 'book/view/' . '{id}/{category}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small>
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-default">Add cart</a>
                     
                    </div>
                </div>
            {/releases}
            </div>
        </section>

            <section id="random">
            <h2>Random</h2>
            <hr/>
            <div class="row">
            {random}
                <div class="col-md-2">
                    <a  href="<?php echo base_url() . 'book/view/' . '{id}/{category}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small>
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-default">Add cart</a>
                     
                    </div>
                </div>
            {/random}
            </div>
        </section>

            </div>

        <!-- End Index Body -->