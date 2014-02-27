{order_data}

<div class="row">
    <div class="col-md-3">
    
        <div class="list-group">
            <a id="dashboard" href="<?php echo site_url('administrator'); ?>" class="list-group-item ">Dashboard</a>
            <a id="orders" href="<?php echo site_url('administrator/orders'); ?>" class="list-group-item active">Orders</a>
            <a id="reports" href="<?php echo site_url('administrator/books'); ?>" class="list-group-item">Books</a>
            <a id="reports" href="<?php echo site_url('administrator/accountlist'); ?>" class="list-group-item">Accounts</a>
            <a id="settings" href="<?php echo site_url('administrator/settings'); ?>" class="list-group-item">Settings</a>
          </div>

           <div class="panel panel-primary" id="panels">
                                

                                <div class="panel-heading" id="panel-head" data="{order_id}">Comment Box (<small>{order_id}</small>)</div>
                                  <div  class="panel-body">

                                  <small>
                                    <div style="max-width: 210px; height: 200px; overflow: auto;" class="chat-area">
                                   

                                  {message_box}
                                    <p><strong>{name}</strong>: {message} <br/><span>sent on: {date}</span></p>
                                    {/message_box}                                        
                                      
                                    </div>
                                  </small>
                                    <div class="char-interface text-center">

                                    <form name="post-message" action="" method="" accept-charset="utf-8">
                                       
                                       <textarea id="message" style="margin-top: 10px;" class="form-control"></textarea>
                                       <button id="post-message-btn" class="btn btn-success btn-xs">Send Message</button>
                                      
                                    </form>
                                      
                                    </div>
                                   

                                </div>

                                 
          </div>




    </div>

    <div class="col-md-9">

        <div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Order No {order_id}
            </div>
            <div class="panel-body">

            <!-- Start Structure -->
            <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Items Ordered</div>
                        <div class="panel-body">

                      

                 <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Unit Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('cart/update', $attributes);
              ?>




             
              {order_cart_contents}
              <tr>
                  <td>{name}</td>
                  <td>PHP {price}</td>
                  <td>{qty}</td>
                  <td>PHP {subtotal}.00</td>
                </tr>

            {/order_cart_contents}

            

            
            
               <tr>
                
              <td colspan="1"></td>
              <td colspan="2"><strong>Grand total</strong></td>
              <td colspan="2">
              PHP {total}{order_total}{/total}
              </td>

              </tr>                  


               


              </tbody>
    </table>
                          
                       
                        </div>
                    </div>

            </div>

             <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Order Information</div>
                        <div class="panel-body">

                         <div class="col-md-6">
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Order # {order_id}</div>
                                <div class="panel-body">
                             
                                  <p>Order Date: {dateorder}</p>
                 <p>
                 Order Status: <span class="order_status"><b>{order_status}</b></span> &nbsp &nbsp &nbsp
                
                     <select id="admin_action">
                       <option value="">Set Status ---</option>
                       <option value="Cancelled"> to Cancel</option>
                       <option value="Pending"> to Pending</option>
                       <option value="Refunded"> to Refund</option>
                       <option value="Approved"> to Approve</option>
                    </select>
               
                 </p>
		<p>
		Package Status: <b>{package_status}</b> | <i><a href="<?php echo site_url('staff/order/{order_id}') ?>">Go to staff</a></i>
		</p>

                               
                                </div>
                            </div>

                        </div>

            <div class="col-md-6">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Account Information</div>
                        <div class="panel-body">

                         <p>Customer Name: {fname} {lname}</p>
                          <p>Email: <a href="mailto:{email}?subject=Billing Inquiry" "Mail">{email}</a></p>
                          <p>Address: {street}</p>
                       
                        </div>
                    </div>

            </div>

                          
                       
                        </div>
                    </div>

            </div>



            <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Payment Information</div>
                        <div class="panel-body">

                    

                    <div class="col-md-6">
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Paypal Information</div>
                                <div class="panel-body">
                             
                                  Payment Method: <button type="button" class="btn btn-info btn-xs">{payment_method}</button> <a class="btn btn-success btn-xs" href="<?php echo base_url() . 'customer/invoice_log/{order_id}'?>">Invoice Log</a>

                               
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                        <div class="panel panel-default" id="panels">
                            <div class="panel-heading">Order Total Amount</div>
                            <div class="panel-body text-center">

                               
                                <span style="font-size: 15px;">PHP {total}{order_total}{/total}</span>
                               
                            
                         
                          </div>
                      </div>

                    </div>

                          
                       
                        </div>
                    </div>

            </div>

            <!-- End Structure -->

     
            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
    {/order_data}
    </div>
</div>

     <script type="text/javascript">
          //Chat Script
          
        

          setInterval(function (){
            //set interval every 10 second
               var order_id = $('#panel-head').attr('data');
               $('.chat-area').load('<?php echo site_url("chat/messages")?>', { order_id: order_id },  function(e) {
                });

          }, 10000);



          //Post Chat
          $(document).on('click', '#post-message-btn', function(event) {
            event.preventDefault();
            /* Act on the event */

            $(this).addClass('disabled');

            var message = $('#message').val();
            var order_id = $('#panel-head').attr('data');
            
            $.ajax({
              url: '<?php echo site_url("chat/post_message")?>',
              type: 'POST',
                data: {message: message, order_id: order_id},
              })
              .done(function() {
                 $('.chat-area').load('<?php echo site_url("chat/messages")?>', { order_id: order_id },  function(e) {
                });

                 $('#post-message-btn').removeClass('disabled');

                $('#message').val('');
              });
            

          });



          </script>

<script type="text/javascript">
  $(document).on('change', '#admin_action', function(event) {
    event.preventDefault();
    /* Act on the event */

    var status = $(this).val();
    var order_id = $('#panel-head').attr('data');

    if (status != '') {
      $.ajax({
      url: '<?php echo site_url("administrator/post_change_status") ?>',
      type: 'POST',
        data: {status: status, order_id:order_id},
      })
      .done(function(e) {
        $('.order_status').html(e);
      });
    };
    

  });
</script>
