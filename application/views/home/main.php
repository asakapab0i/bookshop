       <?php 

      if ($this->session->flashdata('checkout')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('checkout');
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '</div>';
  
      }
        

       ?>
       <!-- Start Index Body -->


<!-- Facebook API -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=201652109992980";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End Facebook API -->

			<div class="row">

              
			<div class="col-md-8">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="3"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img width="100%" src="<?php echo base_url() .
      'assets/img/slider/content-slider-0.jpg'?>" alt="slider1">
    </div>
    <div class="item">
      <img width="100%" src="<?php echo base_url() .
      'assets/img/slider/content-slider-1.jpg'?>" alt="slider2">
    </div>
    <div class="item">
      <img width="100%" src="<?php echo base_url() .
      'assets/img/slider/content-slider-2.jpg'?>" alt="slider3">
    </div>
<div class="item">
      <img width="100%" src="<?php echo base_url() .
      'assets/img/slider/content-slider-3.jpg'?>" alt="slider4">
    </div>

  </div>


  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<hr>

        
                     <section id="featured">
           
<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Featured Books
            </div>
            <div class="panel-body">


            {featured}
            <center>
                <div class="col-md-3">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
 <small>{title}</small> <br/> </a> by <small><a href="<?php echo site_url('book/author/{author}')?>">{author}</a></small>
                   <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-xs btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/featured}


            </div>
          </div>

        </section>

                     <section id="bestseller">
           
<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Bestseller Books
            </div>
            <div class="panel-body">


            {bestseller}
            <center>
                <div class="col-md-3">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
 <small>{title}</small> <br/> </a> by <small><a href="<?php echo site_url('book/author/{author}')?>">{author}</a></small>
                   <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-xs btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/bestseller}


            </div>
          </div>

        </section>

             <section id="releases">
           
<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">New Releases 
            </div>
            <div class="panel-body">


            {releases}
            <center>
                <div class="col-md-3">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
 <small>{title}</small> <br/> </a> by <small><a href="<?php echo site_url('book/author/{author}')?>">{author}</a></small>
                                      <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-xs btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/releases}


            </div>
          </div>

        </section>

                     <section id="most-rated">
           
<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Most Rated Books
            </div>
            <div class="panel-body">


            {ratings}
            <center>
                <div class="col-md-3">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small> <br/> </a> by <small><a href="<?php echo site_url('book/author/{author}')?>">{author}</a></small>
                    
                    <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-xs btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/ratings}


            </div>
          </div>
        </section>

<!-- Most Viewed -->

              <section id="most-viewed">
           
<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Most Viewed Books
            </div>
            <div class="panel-body">


            {most_viewed}
            <center>
                <div class="col-md-3">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small> <br/> </a> by <small><a href="<?php echo site_url('book/author/{author}')?>">{author}</a></small>
                    
                    <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-xs btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/most_viewed}


            </div>
          </div>
        </section>


            </div>

            <div class="col-md-4">

          <div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Like us on Facebook
            </div>
            <div class="panel-body text-center">
            <div class="fb-like-box" data-href="https://www.facebook.com/labelleaurore" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
            </div>
          </div>

          <div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Live Tweets
            </div>
            <div class="panel-body">
            <a class="twitter-timeline" href="https://twitter.com/LaBelleAurore2" data-widget-id="422733484059152384">Tweets by @LaBelleAurore2</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  </div>
          </div>

            </div>

        </div>

        <!-- End Index Body -->
