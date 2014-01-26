{order_data}

<div class="row">
    <div class="col-md-3">
    
       
<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item ">Account Dashboard</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Account Information</a>
            <a href="<?php echo site_url('customer/address'); ?>" class="list-group-item">Account Address</a>
            <a href="<?php echo site_url('customer/orders'); ?>" class="list-group-item active">My Orders</a>
            <a href="<?php echo site_url('customer/wishlist'); ?>" class="list-group-item">My Wishlist</a>
          </div>

           <div class="panel panel-primary" id="panels">
                                

                                <div class="panel-heading" id="panel-head" data="{order_id}">Comment Box ({order_id})</div>
                                  <div  class="panel-body">

                                  <small>
                                    <div style="height: 200px; overflow: auto;" class="chat-area">
                                   

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
              }).always(function(){
                $('#message').val('');
              });
            

          });



          </script>

    </div>
    <div class="col-md-9">

        <div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Order No {order_id} (the order confirmation email was sent)
            </div>
            <div class="panel-body">

            <!-- Start Structure -->
             <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Order Information</div>
                        <div class="panel-body">

                         <div class="col-md-6">
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Order # {order_id}</div>
                                <div class="panel-body">
                             
                                  <p>Order Date: {dateorder}</p>
                 <p>Order Status: {order_status}
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
                          
                       
                        </div>
                    </div>

            </div>

                          
                       
                        </div>
                    </div>

            </div>

            <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Payment & Shipping Information</div>
                        <div class="panel-body">

                         <div class="col-md-6">
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Billing Address</div>
                                <div class="panel-body">
                             
                                  <strong>{fname} {lname}</strong>
                                <br>{company}<br>{street}
                                <br>{country}<br>
                                <abbr title="Telephone">Phone:</abbr> {telephone}    

                               
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                        <div class="panel panel-default" id="panels">
                            <div class="panel-heading">Shipping Information</div>
                            <div class="panel-body">

                               <strong>{fname} {lname}</strong>
                                    <br>{company}<br>{street}
                                      <br>{country}<br>
                                       <abbr title="Telephone">Phone:</abbr> {telephone}    
                            
                         
                          </div>
                      </div>

                    </div>

                    <div class="col-md-6">
                                <div class="panel panel-default" id="panels">
                                <div class="panel-heading">Paypal Information</div>
                                <div class="panel-body">
                             
                                  Payment Method: <button type="button" class="btn btn-info btn-xs">{payment_method}</button> <a class="btn btn-success btn-xs" href="<?php echo base_url() . 'customer/invoice_log/{order_id}'?>">View Invoice Log</a>

                               
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

            <div class="col-md-12">
                    <div class="panel panel-default" id="panels">
                        <div class="panel-heading">Items Ordered Details</div>
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



            <!-- End Structure -->

     
            </div>
            <div class="panel-footer">
            <p class="footer">
            </div>
          </div>
    {/order_data}
    </div>
</div>





