

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
           Edit Book <a href="<?php echo site_url('administrator/book_add'); ?>" class="pull-right btn btn-default">Add Book</a> <a href="#" class="pull-right btn btn-default">Add Category</a>
            </div>
            <div class="panel-body">

                  <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'edit_book');
                  echo form_open('administrator/book_edit', $attributes);
                  ?>


{book_info}


<div class="col-md-6">
    
    <fieldset>

<!-- Form Name -->
<legend>Edit Book</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="title">Title</label>
  <div class="controls">
    <input required value="{title}" id="title" name="title" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Author</label>
  <div class="controls">
    <input required value="{author}" id="author" name="author" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="description">Description</label>
  <div class="controls">                     
    <textarea style="margin: 0px; width: 366px; height: 109px;" id="description" name="description">{description}</textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="publisher">Publisher</label>
  <div class="controls">
    <input required value="{publisher}" id="publisher" name="publisher" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="format">Format</label>
  <div class="controls">
    <input required value="{format}" id="format" name="format" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="isbn">ISBN</label>
  <div class="controls">
    <input required value="{isbn}" id="isbn" name="isbn" type="text" placeholder="" class="input-xlarge">
    
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
     <select required id="category" name="category">
      <option value=""></option>
        {categories}
        <option value="{name}">{name}</option>
        {/categories}
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Price</label>
  <div class="controls">
    <input required value="{price}" id="author" name="author" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Quantity</label>
  <div class="controls">
    <input required value="{product_qty}" id="quantity" name="quantity" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="author">Image</label>
  <div class="controls">
    <input required id="userfile" name="userfile" type="File" placeholder="" class="input-xlarge">
    
  </div>
</div>

<br/>
<br/>
<br/>
<button type="submit" class="btn btn-lg btn-primary">Submit</button>
</fieldset>


</div>




{/book_info}
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