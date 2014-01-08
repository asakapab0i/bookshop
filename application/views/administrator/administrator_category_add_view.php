

<div class="row">
	<div class="col-md-3">
	
		          <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item active">Books</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
           Add Category <a href="<?php echo site_url('administrator/book_add'); ?>" class="pull-right btn btn-default">Add Book</a> <a href="<?php echo site_url('administrator/category_add'); ?>" class="pull-right btn btn-default">Add Category</a>
            </div>
            <div class="panel-body">


     <?php

            if ($this->session->flashdata('category_success')) {
              $success = $this->session->flashdata('category_success');

              echo '<div class="alert alert-success">';
              echo $success;
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              echo '</div>';
            }


            ?>

                  <?php
                  echo validation_errors();
                  ?>

                  <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'add_category');
                  echo form_open('administrator/category_add_validate', $attributes);
                  ?>


                  <div class="col-md-offset-3 col-md-8">
                    <label for="category">Category Name </label><input type="text" name="category"> <button class="btn btn-success" type="submit">Submit</button>
                  </div>

            </form>





	 
            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
	</div>
</div>


