

<div class="row">
	<div class="col-md-3">
	
		          <div class="list-group">
    
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item ">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item active">Books</a>
            <a id="reports" href="<?php echo site_url('administrator/accountlist'); ?>" class="list-group-item">Accounts</a>
            <a id="sales" href="<?php echo site_url('administrator/sales'); ?>" class="list-group-item">Sales</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
           Book <a href="<?php echo site_url('administrator/book_add'); ?>" class="pull-right btn btn-default">Add Book</a> <a href="<?php echo site_url('administrator/category_add'); ?>" class="pull-right btn btn-default">Add Category</a>
            </div>
            <div class="panel-body">

                  <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'edit_book');
                  echo form_open('administrator/edit_book', $attributes);
                  ?>





<div class="col-md-6">
    
    <fieldset>

<!-- Form Name -->
<legend>Edit Book</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="title">Title</label>
  <div class="controls">
    <input id="title" name="title" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Author</label>
  <div class="controls">
    <input id="author" name="author" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="description">Description</label>
  <div class="controls">                     
    <textarea style="margin: 0px; width: 366px; height: 109px;" id="description" name="description"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="publisher">Publisher</label>
  <div class="controls">
    <input id="publisher" name="publisher" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="format">Format</label>
  <div class="controls">
    <input id="format" name="format" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="isbn">ISBN</label>
  <div class="controls">
    <input id="isbn" name="isbn" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

</fieldset>

</div>

<div class="col-md-6">
    
<fieldset>

<!-- Form Name -->
<legend>Book Sales Information</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="title">Category</label>
  <div class="controls">
    <input id="title" name="title" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Price</label>
  <div class="controls">
    <input id="author" name="author" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Quantity</label>
  <div class="controls">
    <input id="author" name="author" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Image</label>
  <div class="controls">
    <input id="author" name="author" type="File" placeholder="" class="input-xlarge">
    
  </div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<button type="submit" class="btn btn-lg btn-primary">Submit</button>
</fieldset>


</div>





</form>





	 
            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
	</div>
</div>


<script type="text/javascript">
    

$(function(){



    $(document).on('hover', '.glyphicon', function(event) {
        event.preventDefault();
        /* Act on the event */

        $(this).addClass('glyphicon-star');
        alert('sdaasd');

    });



});

</script>