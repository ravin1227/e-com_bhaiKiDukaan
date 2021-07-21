<?php 
require ('header.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<div class="container-fluid ">
    <div class="row">
            <div class="col my_order">
                <?php 
                   $uid=$_SESSION['USER_ID'];
                   $res=mysqli_query($con,"SELECT `order`.user_id,`order`.order_status,`order`.id,order_status.name AS order_status_str,order_detail.order_id,order_detail.product_id,order_detail.tracking_id,order_detail.price,order_detail.qty,order_detail.added_on,product.image,product.name 
                       FROM `order`,order_status,order_detail,product 
                       wHERE `order`.user_id='$uid' AND order_status.id=`order`.order_status AND `order`.id=order_detail.order_id  AND order_detail.product_id=product.id
                       ORDER BY `order`.id DESC ");
                   while($row=mysqli_fetch_assoc($res)){ 
                    $tracking_id1=$row['tracking_id'];
                ?> 
                <div class="card">
                    <div class="row">
                        <div>
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="">
                        </div>
                        <div class="p_name">
                         <h5><?php echo $row['name'] ?></h5>
                         <span><a href="track_order_result.php?tracking_id=$tracking_id">Track Order</a></span>
                        </div>
                        <div class="price">
                             <?php echo $row['qty']*$row['price'] ?>
                        </div>
                        <div class="o_date">
                            <h5>Ordered On</h5>
                            <h6><?php echo $row['added_on'] ?></h6>
                        </div>
                        <div class="delivery_date">
                            <h5><?php echo $row['order_status_str'] ?></h5>
                            <small>Return policy ended on july</small>
                            <a href=""><h5>Rate & Review Product</h5></a>
                        </div>
                    </div>
                </div>
                   <?php 
                    }
            ?>
        <div>       
    </div>
</div>
 <?php
 require ('footer.inc.php');
 ?>