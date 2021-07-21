<?php
require('header.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
   $update_order_status=$_POST['update_order_status'];
   mysqli_query($con,"UPDATE `order` SET order_status='$update_order_status' WHERE id='$order_id'");
}

?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Order Detail </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>Product Name</th>
                                       <th>Product Image</th>
                                       <th>Qty</th>
                                       <th>Price</th>
                                       <th>Total Price</th>

                                    </tr>
                                 </thead>
                                 <tbody>
								<?php
                                    	$res=mysqli_query($con,"SELECT distinct(order_detail.id) ,order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.locality,`order`.pincode,`order`.state,`order`.landmark,`order`.alternate_num,`order`.primary_num,`order`.order_status,`order`.name AS o_person_name
                                        FROM order_detail,product ,`order` 
                                        where order_detail.order_id='$order_id' AND  order_detail.product_id=product.id AND order_detail.order_id=`order`.id
                                        GROUP by order_detail.id");
                                        $total_price=0;
									while($row=mysqli_fetch_assoc($res)){
                                        $primary_num=$row['primary_num'];
                                        $pincode=$row['pincode'];
                                        $locality=$row['locality'];
                                        $address=$row['address'];
                                        $city=$row['city'];
                                        $state=$row['state'];
                                        $landmark=$row['landmark'];
                                        $alternate_num=$row['alternate_num'];
                                        $order_status=$row['order_status'];
                                        $order_name=$row['o_person_name'];
                                        $tracking_id=$row['tracking_id'];
								?>
								<tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
                                    <td><?php echo $row['qty'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['qty']*$row['price']?></td>
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
                  <div class="row">
                     <div class="col-xl-12">
                           <div class="card">
                              <div class="row">
                                 <div class="col-3">
                                       <strong>Address:-</strong>      
                                 </div>
                                 <div class="col-9">
                                    <strong>Name:-</strong><?php echo $order_name ?> <br>
                                    <strong>Primary number:-</strong><?php echo $primary_num ?>,   <strong>Secondary Number:-</strong><?php echo $alternate_num ?> <br/> <strong>Address:-</strong><?php echo $locality ?>  <?php echo $address ?>  <?php echo $city ?>  <?php echo $pincode ?>
                                    <?php echo $state ?> <br> <strong>Landmark:-</strong> <?php echo $landmark ?>  
                                 </div>
                            </div>
                            <div class="row">
                              <div class="col-12">
                                 <Strong>Order Status:- </Strong>
                                 <?php 
                                    $order_status_arr =mysqli_fetch_assoc(mysqli_query($con,"SELECT order_status.name FROM order_status,`order` 
                                    WHERE `order`.id='$order_id' AND `order`.order_status=order_status.id"));
                                    echo $order_status_arr['name'];
                                 ?>
   
                                 <div>
                                    <form method="post">
                                       <select name="update_order_status" class="form-control">
                                       <option value="">Select Status</option>
                                       <?php 
                                          $res=mysqli_query($con,"SELECT * FROM order_status");
                                          while($row=mysqli_fetch_assoc($res)){
                                             if($row['id']==''){
                                                echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                             }else{
                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                             }
                                          } 
                                       ?>
                                       </select>
                                       <input type="submit" class="form-control"/>
                                    </form>
                                 </div>
                              </div>
                            </div>
                           </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xl-12">
                           <div class="card">
                              <div class="row">
                                 <div class="col-3">
                                       <strong>Tracking</strong>      
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12">
                                 <table style="width:100%">
                                    <tr>
                                       <th>Tracking ID <hr></th> 
                                       <th>Ordered On <hr></th>
                                       <th>Packed On<hr></th>
                                       <th>Shipped<hr></th>
                                       <th>Delivered<hr></th>
                                    </tr>
                                    <?php
                                       $sql1="SELECT tracking_order.*,tracking_address.shippment_address,tracking_address.date_time FROM tracking_order,tracking_address 
                                          WHERE tracking_order.tracking_id='$tracking_id' AND tracking_address.tracking_id='$tracking_id' ";
                                       $result=mysqli_query($con,$sql1) or die("Query Failed :".mysqli_error());
                                       while($row=mysqli_fetch_assoc($result)){
                                          $tracking_id=$row['tracking_id'];
                                          $ordered_on=$row['ordered_on'];
                                          $packed_on=$row['packed_on'];
                                          $shippment_address=$row['shippment_address'];
                                          $delivered_on=$row['delivered_on'];
                                          $dispatch_date=$row['date_time'];
                                    ?>
                                    <tr>
                                      <td><?php echo $row['tracking_id']; ?></td>
                                      <td><?php echo $row['ordered_on']; ?></td>
                                      <td><?php echo $row['packed_on']; ?></td>
                                      <td><?php echo $row['shippment_address']; ?>&nbsp;&nbsp;<?php echo $row['date_time']; ?></td>
                                      <td><?php echo $row['delivered_on']; ?></td>
                                    </tr>
                                       <?php }?>
                                 </table>
                                 <div>
                                 <span class='badge badge-delete'> <a href='update_tracking.php?tracking_id=<?php echo $tracking_id?>'>Update Tracking </a></span>
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