<?php
require('header.inc.php');


?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Order Master </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>Order ID</th>
                                       <th>Order Date</th>
                                       <th>Payment Type</th>
                                       <th>Payment Status</th>
                                       <th>Order Status</th>
                                       <th>Order Detail</th>
                                       <th>Update Tracking</th>

                                    </tr>
                                 </thead>
                                 <tbody>
								<?php
                                    $res=mysqli_query($con,"SELECT `order`.*,order_status.name AS order_status_str,order_detail.tracking_id FROM
                                        `order`,order_status,order_detail WHERE order_status.id=`order`.order_status AND order_detail.order_id=`order`.id ");
                                    while($row=mysqli_fetch_assoc($res)){
                                       $tracking_id=$row['tracking_id'];
								?>
								<tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['added_on'] ?></td>
                                    <td><?php echo $row['payment_type'] ?></td>
                                    <td><?php echo $row['payment_status'] ?></td>
                                    <td><?php echo $row['order_status_str'] ?></td>
                                    <td>
                                        <span class='badge badge-delete'> <a href='order_master_detail.php?id=<?php echo $row['id']?>'>Details </a></span>
                                    </td>
                                    <td>
                                        <span class='badge badge-delete'> <a href='update_tracking.php?tracking_id=<?php echo $row['tracking_id']?>'>Update Tracking </a></span>
                                    </td>
								</tr>
                                <?php
                                    } 
                                ?>
							</tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
require('footer.inc.php')
?> 