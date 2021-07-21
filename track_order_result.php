<?php 
require('header.inc.php');
$tracking_id=mysqli_real_escape_string($con,$_GET['tracking_id']);
$tracking_id=get_safe_value($con,$_GET['tracking_id']);

?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 track_order_search">
                    <form action="track_order_result.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="tracking_id"class="form-control" placeholder="<?php echo $tracking_id?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
               <div class="col-8">
                   <?php 
                    $res=mysqli_query($con,"SELECT * FROM tracking_order WHERE tracking_id='$tracking_id'") OR DIE("query failed".mysqli_error());
                    while($row=mysqli_fetch_assoc($res)){
                   ?>
                <section class="timeline_area">
                    <div>
                        <div class="card">
                         <h4>Ordered On</h4><hr>
                         <p>Item was orderd on</p>
                         <h6><?php echo $row['ordered_on'] ?></h6>
                        </div>
                    </div>
                    <div>
                        <div class="card">
                         <h4>Packed On</h4><hr>
                         <p>Item got packed on</p>
                         <h6><?php echo $row['packed_on'] ?></h6>
                        </div>
                    </div>
                    <div>
                        
                       <div class="card">
                         <h4>Shipped On</h4><hr>
                         <p>Item is at</p>
                         <?php
                            $query=mysqli_query($con,"SELECT * FROM tracking_address WHERE tracking_id='$tracking_id' ORDER BY id DESC ");
                            while($row1=mysqli_fetch_assoc($query)){ 
                        ?>
                         <h6><hr><?php echo $row1['shippment_address']  ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row1['date_time'] ?></h6>
                         <?php }
                            
                            ?>
                       </div>
                            
                    </div>
                    <div>
                        <div class="card">
                         <h4>Delivered On</h4><hr>
                         <p>Item delivered on</p>
                         <h6><?php echo $row['delivered_on'] ?></h6>
                        </div>
                    </div>
                </section>
                <?php
                    }
                ?>
               </div>
               <?php
                    $query2=mysqli_query($con,"SELECT * FROM order_detail WHERE tracking_id='$tracking_id'");
                    while($row2=mysqli_fetch_assoc($query2)){}
                   ?>
               <div class="col-4 track_order_product">
                   <div><h4>Ordered Item</h4></div>
                   <div class="card">
                      <div>
                        <img src="img_avatar.png" alt="">
                        <span><h6>Product name</h6></span>
                      </div>
                   </div>
               </div>
            </div>
        </div>

    </div>
<?php 
    require('footer.inc.php')
?>