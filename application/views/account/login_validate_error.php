       <!-- Start Index Body -->
       

      <div class="panel panel-primary" id="panels">
            <div class="panel-heading"><h4>Create/Register Account</h4>
            </div>
            <div class="panel-body">
              
       
            <div class="col-md-6">
              
                <h4>New Customers</h4>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.</p>
                <a href="<?php echo site_url('account/register');?>" class="btn btn-info">Create An Account</a >
              
            </div>
            <div class="col-md-6">
              <h4>Registered Customers</h4>

                  <?php
                  echo validation_errors();
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('account/login_validate', $attributes);
                  ?>

                <fieldset>

                <!-- Form Name -->

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="email">Email Address</label>
                  <div class="controls">
                    <input id="email" name="email" size="40" type="text" placeholder="" class="input-xlarge" required>
                    
                  </div>
                </div>

                <!-- Password input-->
                <div class="control-group">
                  <label class="control-label" for="password">Password</label>
                  <div class="controls">
                    <input id="password" name="password" size="40" type="password" placeholder="" class="input-xlarge" required>
                    
                  </div>
                </div>

                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="submit"></label>
                  <div class="controls">
                    <div class="btn-group">
                    <button type="submit" class="btn btn-info">Submit</button> 
                    <button type="button" class="btn btn-danger">Forgot Password</button>
                  </div>
                  </div>
                </div>

                </fieldset>
                </form>


            </div>

            </div>
            <div class="panel-footer">
            </div>
          </div>





        <!-- End Index Body -->