
      <div class="section mypan">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <ul class="list-dashboard-pages">
                     <li><a href="cart"><i class="fa fa-cart-arrow-down"></i>My Cart</a></li>
                     <li class="active"><a href="myorder"><i class="fa fa-clipboard-list"></i>My Orders</a></li>
                     <li><a href="myprofile"><i class="fa fa-user-alt"></i>Personal Profile</a></li>
                     <li><a href="updatepassword"><i class="fa fa-user-alt"></i>Update Password</a></li>
                     <li class="user-logout"><a href="logout"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                  </ul>
               </div>
               <div class="col-md-9">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4>Order History</h4>
                        <br>
                     </div>
                     <div class="panel-body">
                        
                        <div class="table-responsive">
                           <table class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>ORDER ID</th>
                                    <th>ORDER DATE</th>
                                    <th>AMOUNT</th>
                                    <th>STATUS</th>
                                    <th>VIEW</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php //$i=1; foreach ($orderlist as $eachorder) {?>
                                 <tr>
                                    <td>1</td>
                                    <td>00001</td>
                                    <td>18/05/2023</td>
                                    <td>100</td>
                                    <td>
                                    RECEIVED
                                     
                                    </td>
                                    <td><a href="order-details?id=">View Details</a></td>
                                 </tr>
                                 <?php //$i++;} ?>
                              </tbody>
                           </table>
                        </div>
                        <?php //}else{
                          // echo '<div class="alert alert-danger"><strong>Sorry No Past Order Found!</strong></div>';
                          // } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   