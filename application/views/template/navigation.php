    <?php

// Prepping Navigation Links
    $nav = array('home' => 'Home',
                 'books' => 'Books',
                 'categories' => 'Categories',
                 'cart' => 'My Cart',
                 'account' => 'My Account');



    function navigation($cur_nav){

        if ($cur_nav == 'home') {
            echo '<li class="active">
                                    <a href="#">Home</a>
                                </li>';
        }else if($cur_nav == 'categories'){
            echo '';
        }

    }



    ?>



    <!-- Start Navigation -->
    <div class="row">
                <div class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                            </button><a href="#" class="navbar-brand"></a>
                        </div>
                        <div class="collapse navbar-collapse">
                       
                       <center>
                        <img class="mainlogo" src="<?php echo base_url() . 'assets/img/logo.jpg' ?>" alt=""> 
                        </center>


                            <ul class="nav nav-tabs">

                               <?php
                               //START NAVIGATION
                               $home = site_url('home');
                               $book_browse = site_url('book/browse/all');
                               $cart = site_url('cart');
                               $checkout = site_url('checkout');


                               if ($page_cur_nav == 'home') {
                                    echo ' <li class="active">
                                    <a href="'.$home.'">Home</a>
                                </li>

                                <li>

                                    <a href="'.$book_browse.'">Books</a>

                                </li>


                                <li class="">

                                    <a href="'.$cart.'">Cart <i class="badge badge-info">'.$this->cart->total_items().'</i></a>

                                </li>


                              


                                <li class="dropdown pull-right">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    ';


                                  if ($this->session->userdata('login')) {
                                      $login = $this->session->userdata('login');

                                      echo '<li><a href="'.site_url('customer/dashboard').'">Account Dashboard</a></li>';
                                      echo ' <li><a href="'.site_url('account/logout').'">Account Logout</a></li>';
                                      
                                  }else{

                                    echo '<li><a href="'.site_url('account/login').'">Login Account</a></li>';
                                    echo '<li><a href="'.site_url('account/register').'">Register Account</a></li>';

                                  }

                                  echo '</ul>
                                </li>

                                  <li class="pull-right">

                                    <a href="'.$checkout.'">Checkout</a>

                                </li>   

                                ';
                               }else if($page_cur_nav == 'book'){
                                 echo ' <li class="">
                                    <a href="'.$home.'">Home</a>
                                </li>

                                <li class="active">

                                    <a href="'.$book_browse.'">Books</a>

                                </li>
                                <li class="">

                                    <a href="'.$cart.'">Cart <span class="badge badge-info">'.$this->cart->total_items().'</span></a>

                                </li>

                                 <li class="pull-right dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                   ';


                                  if ($this->session->userdata('login')) {
                                      $login = $this->session->userdata('login');

                                      echo '<li><a href="'.site_url('customer/dashboard').'">Account Dashboard</a></li>';
                                      echo ' <li><a href="'.site_url('account/logout').'">Account Logout</a></li>';
                                      
                                  }else{

                                    echo '<li><a href="'.site_url('account/login').'">Login Account</a></li>';
                                    echo '<li><a href="'.site_url('account/register').'">Register Account</a></li>';

                                  }

                                  echo '</ul>
                                </li>   

                                <li class="pull-right">

                                    <a href="'.$checkout.'">Checkout</a>

                                </li> 

                                ';

                               }else if($page_cur_nav == 'cart'){
                                 echo ' <li class="">
                                    <a href="'.$home.'">Home</a>
                                </li>

                                <li class="">

                                    <a href="'.$book_browse.'">Books</a>

                                </li>

                                 <li class="active">

                                    <a href="'.$cart.'">Cart <span class="badge badge-info">'.$this->cart->total_items().'</span></a>

                                </li>

                                 <li class="dropdown pull-right">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
                                  <ul class="dropdown-menu">';

                                  if ($this->session->userdata('login')) {
                                      $login = $this->session->userdata('login');

                                      echo '<li><a href="'.site_url('customer/dashboard').'">Account Dashboard</a></li>';
                                      echo ' <li><a href="'.site_url('account/logout').'">Account Logout</a></li>';

                                  }else{

                                    echo '<li><a href="'.site_url('account/login').'">Login Account</a></li>';
                                    echo '<li><a href="'.site_url('account/register').'">Register Account</a></li>';

                                  }

                                    // <li><a href="'.site_url('account/login').'">Login Account</a></li>
                                    // <li><a href="'.site_url('account/register').'">Register Account</a></li>
                                    // <li class="divider"></li>
                                    //  <li><a href="'.site_url('account/logout').'">Account Logout</a></li>
                                  echo '</ul>
                                </li>

                                <li class="pull-right">

                                    <a href="'.$checkout.'">Checkout</a>

                                </li>
                                ';

                               }else if ($page_cur_nav == 'dashboard' || $page_cur_nav == 'account') {
                                   
                                 echo ' <li class="">
                                    <a href="'.$home.'">Home</a>
                                </li>

                                <li class="">

                                    <a href="'.$book_browse.'">Books</a>

                                </li>

                                 <li class="">

                                    <a href="'.$cart.'">Cart <span class="badge badge-info">'.$this->cart->total_items().'</span></a>

                                </li>

                                 <li class="pull-right dropdown active">
                                  <a href="#" class=" dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
                                  <ul class="dropdown-menu">';

                                  if ($this->session->userdata('login')) {
                                      $login = $this->session->userdata('login');

                                      echo '<li><a href="'.site_url('customer/dashboard').'">Account Dashboard</a></li>';
                                      echo ' <li><a href="'.site_url('account/logout').'">Account Logout</a></li>';

                                  }else{

                                    echo '<li><a href="'.site_url('account/login').'">Login Account</a></li>';
                                    echo '<li><a href="'.site_url('account/register').'">Register Account</a></li>';

                                  }

                                    // <li><a href="'.site_url('account/login').'">Login Account</a></li>
                                    // <li><a href="'.site_url('account/register').'">Register Account</a></li>
                                    // <li class="divider"></li>
                                    //  <li><a href="'.site_url('account/logout').'">Account Logout</a></li>
                                  echo '</ul>
                                </li>

                                <li class="pull-right">

                                    <a href="'.$checkout.'">Checkout</a>

                                </li> 

                                ';

                               }else if ($page_cur_nav == 'checkout') {
                                   
                                 echo ' <li class="">
                                    <a href="'.$home.'">Home</a>
                                </li>

                                <li class="">

                                    <a href="'.$book_browse.'">Books</a>

                                </li>

                                 <li class="">

                                    <a href="'.$cart.'">Cart <span class="badge badge-info">'.$this->cart->total_items().'</span></a>

                                </li>

                                 <li class="pull-right dropdown">
                                  <a href="#" class=" dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
                                  <ul class="dropdown-menu">';

                                  if ($this->session->userdata('login')) {
                                      $login = $this->session->userdata('login');

                                      echo '<li><a href="'.site_url('customer/dashboard').'">Account Dashboard</a></li>';
                                      echo ' <li><a href="'.site_url('account/logout').'">Account Logout</a></li>';

                                  }else{

                                    echo '<li><a href="'.site_url('account/login').'">Login Account</a></li>';
                                    echo '<li><a href="'.site_url('account/register').'">Register Account</a></li>';

                                  }

                                    // <li><a href="'.site_url('account/login').'">Login Account</a></li>
                                    // <li><a href="'.site_url('account/register').'">Register Account</a></li>
                                    // <li class="divider"></li>
                                    //  <li><a href="'.site_url('account/logout').'">Account Logout</a></li>
                                  echo '</ul>
                                </li>

                                <li class="pull-right active">

                                    <a href="'.$checkout.'">Checkout</a>

                                </li> 

                                ';

                               }


                              


                               ?>


                                
                          <!--      <li class="dropdown pull-right">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('account/login');?>">Login Account</a></li>
                                    <li><a href="<?php echo site_url('account/register');?>">Register Account</a></li>
                                    <li class="divider"></li>
                                     <li><a href="<?php echo site_url('account/logout')?>">Account Logout</a></li>
                                  </ul>
                                </li>    

                                <li class="pull-right">
                                    <a href="<?php echo site_url('cart'); ?>">My Cart  <span class="badge badge-info"><?php echo $this->cart->total_items(); ?></span></a>
                                </li> -->


                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    <!-- End Navigation -->


<div class="row">
                    <div class="col-md-4">

                    <?php 
                    
                    if ($this->session->userdata('login')) {
                        $var = $this->session->userdata('login');
                        echo '<h4>Welcome! '.$var["name"].'</h4>';
                    }else{
                        echo '<h4>Welcome Guest!</h4>';
                    }

                    ?>

                   
                    </div>

                    <div class="col-md-8">
 
    <div class="input-group">
      <form method="post" action="<?php echo site_url('search')?>">     
          <input value="<?php isset($term) ? echo $term; : echo ''; ?>" placeholder="What will you find today?" type="text" name="search" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-success" type="button">Go!</button>
          </span>
      </form>
      </div><!-- /input-group -->

</div>

</div>