<?php
  require ('header.inc.php');
  if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    ?>
    <script>
      window.location.href='index.php';
    </script>
    <?php
  }
  
  $cart_total=0;
  if(isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $primary_number=get_safe_value($con,$_POST['primary_number']);
    $pincode=get_safe_value($con,$_POST['pincode']);
    $locality=get_safe_value($con,$_POST['locality']);
    $address=get_safe_value($con,$_POST['address']);
    $city=get_safe_value($con,$_POST['city']);
    $state=get_safe_value($con,$_POST['state']);
    $landmark=get_safe_value($con,$_POST['landmark']);
    $alternate_number=get_safe_value($con,$_POST['alternate_number']);
    $payment_type=get_safe_value($con,$_POST['payment_type']);

    $user_id=$_SESSION['USER_ID'];

    foreach($_SESSION['cart'] as $key=>$val){
      $productArr=get_product($con,'','',$key);
      $price=$productArr[0]['price'];
      $qty=$val['qty'];
      $cart_total=$cart_total+($price*$qty);
    }
    $total_price=$cart_total;
    $payment_status='pending';
    if($payment_type=='cod'){
      $payment_status='success';
    }
    $order_status='1';
    $added_on=date('Y-m-d h:i:s');
    
    $randomNum = substr(str_shuffle("0123456789"), 0, 4);
    $tracking_id= "BKD00".$user_id.$randomNum;

    mysqli_query($con,"insert into `order` (user_id,name,primary_num,pincode,locality,address,city,state,landmark,alternate_num,payment_type,total_price,payment_status,order_status,added_on) 
      values('$user_id','$name','$primary_number','$pincode','$locality','$address','$city','$state','$landmark','$alternate_number','$payment_type','$total_price','$payment_status','$order_status','$added_on')") or die('failed!' . mysql_error());

      

     $order_id=mysqli_insert_id($con);
      foreach($_SESSION['cart'] as $key=>$val){
          $productArr=get_product($con,'','',$key);
          $price=$productArr[0]['price'];
          $qty=$val['qty'];
          $cart_total=$cart_total+($price*$qty);

          mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price,added_on,tracking_id) 
          values ('$order_id','$key','$qty','$price','$added_on','$tracking_id')");

            mysqli_query($con,"insert into `tracking_order` (tracking_id,ordered_on)
            values ('$tracking_id','$added_on')");

            mysqli_query($con,"insert into `tracking_address` (tracking_id)
            values ('$tracking_id')");          
      }
      unset($_SESSION['cart']);
      ?>
      <script>
        window.location.href='index.php';
      </script>
      <?php
  }
?>
    <div class="container-fluid checkout-page">
    <?php 
			if(!isset($_SESSION['USER_LOGIN'])){
        ?>
        <script>
           window.location.href='login.php';
        </script>
    <?php } ?>
           <div class="row">
             <div class="col-8 address_sec" >
               <div class="card">
                <form action="" method="POST">
                  <div>
                   <input type="text" name="name" placeholder="Name" required>
                   <input type="text" name="primary_number" placeholder="10-digit mobile number">
                  </div>
                  <div>
                    <input type="text" name="pincode" placeholder="Pincode" required>
                    <input type="text" name="locality" placeholder="Locality" >
                  </div>
                  <div>
                    <textarea name="address" id="" cols="49" rows="5" placeholder="Address (Area and Street)" required></textarea>
                  </div>
                  <div>
                    <input type="text" name="city" placeholder="City/District/Town" required>
                    <input type="text" name="state" placeholder="State" required>
                  </div>
                  <div>
                    <input type="text" name="landmark" placeholder="Landmark(Optional)">
                    <input type="text" name="alternate_number" placeholder="Alternate Phone(Optional)">
                  </div>
                  <hr/>
                  <div class="payment_method">
                    <div>
                      COD <input type="radio" name="payment_type" value="COD" required>
                      &nbsp; &nbsp;PayU <input type="radio" name="payment_type" value="payU" required>
                    </div>
                    <hr/>
                    <div>
                      <button name="submit" >Proceed To Pay</button>
                    </div>
                  </div>
                </form>
               </div>
             </div>
             <div class="col-4">
              <div class="order-details">
                <div class="card">
                  <?php 
                    $cart_total=0;
                    foreach($_SESSION['cart'] as $key=>$val){
                      $productArr=get_product($con,'','',$key);
                      $pname=$productArr[0]['name'];
                      $mrp=$productArr[0]['mrp'];
                      $price=$productArr[0]['price'];
                      $image=$productArr[0]['image'];
                      $qty=$val['qty'];
                      $cart_total=$cart_total+($price*$qty);
                  ?>
                  <div class="single-item">
                    <div class="single-item__content single-item__thumb">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  />
                        <a href="#"><?php echo $pname?></a>
                        <span class="price"><?php echo $price*$qty?></span>
                    </div>
                    <div class="single-item__remove">
                      <a href="javascript:void(0)" onclick=" manage_cart('<?php echo $key?>','remove')">Remove</i></a>
                    </div>
                  </div>
                  <hr/>
                    <?php }?>
                  <div>
                    <h5>Order Total</h5>
                    <span class="price" id="order_total_price"><?php echo $cart_total?></span>
                  </div>
                </div>
              </div>
             </div>
           </div>
 <?php 
   require('footer.inc.php');
?>