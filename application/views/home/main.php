       <?php 

      if ($this->session->flashdata('checkout')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('checkout');
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo '</div>';
  
      }
        

       ?>
       <!-- Start Index Body -->

			<div class="row">

              
			<div class="col-md-8">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img width="100%" src="http://www.nationalbookstore.com.ph/media/bannernext/resized/740x280//m/i/mitch-albom.jpg" alt="Mitch Albom">
    </div>
    <div class="item">
      <img width="100%" src="http://www.nationalbookstore.com.ph/media/bannernext/resized/740x280//r/a/rajo_1.jpg" alt="Mitch Albom">
    </div>
    <div class="item">
      <img width="100%" src="http://www.nationalbookstore.com.ph/media/bannernext/resized/740x280//w/e/website_banner_-_britto.jpg" alt="Mitch Albom">
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
                    <small>{title}</small> <br/> by <small>{author}</small>
                    </a>
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

             <section id="releases">
           
<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">New Releases 
            </div>
            <div class="panel-body">


            {releases}
            <center>
                <div class="col-md-3">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small> <br/> by <small>{author}</small>
                    </a>
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

                     <section id="random">
           
<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Random Book
            </div>
            <div class="panel-body">


            {random}
            <center>
                <div class="col-md-3">
                    <a  href="<?php echo base_url() . 'book/view/' . '{product_id}/{product_url}' ?>"> <img style="height: 150px;" height="150px" width="150px" class="thumbnail" src="<?php echo base_url() . 'assets/img/books_image/{image}' ?>">
                    <small>{title}</small> <br/> by <small>{author}</small>
                    </a>
                    <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-success">&#8369 {price}</button>
                      <a href="<?php $segments = array('cart', 'add', '{product_id}');
                                    echo site_url($segments); ?>" class="btn btn-xs btn-default">Add cart</a>
                     
                    </div>
                </div>
                </center>
            {/random}


            </div>
          </div>

        </section>


            </div>

            <div class="col-md-4">

<div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Feaured News
            </div>
            <div class="panel-body">
            <p>This is an <b>ordinary paragraph</b> that is <i>long enough</i> to wrap to <u>multiple lines</u> so that you can see how the line spacing looks.</p>
            </div>
          </div>

          <div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Like us on Facebook
            </div>
            <div class="panel-body">
            <p>This is an <b>ordinary paragraph</b> that is <i>long enough</i> to wrap to <u>multiple lines</u> so that you can see how the line spacing looks.</p>
            </div>
          </div>

          <div class="panel panel-default" id="content-formatting">
            <div class="panel-heading">Live Tweets
            </div>
            <div class="panel-body">
            <p>This is an <b>ordinary paragraph</b> that is <i>long enough</i> to wrap to <u>multiple lines</u> so that you can see how the line spacing looks.</p>
            </div>
          </div>

            </div>

        </div>

        <!-- End Index Body -->