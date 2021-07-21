<?php
require ('header.inc.php');

?>
    <!-- Main Content area -->
   <div class="container cart-page">
      <div class="row">
          <div class="col">
            <table>
                 <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php 
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key=>$val){
                            $productArr=get_product($con,'','',$key);
                            $pname=$productArr[0]['name'];
                            $mrp=$productArr[0]['mrp'];
                            $price=$productArr[0]['price'];
                            $image=$productArr[0]['image'];
                            $qty=$val['qty'];
                ?>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>">
                            <div>
                                <p><?php echo $pname ?></p>
                                <small><?php echo $price ?></small><br>
                                <a href="javascript:void(0)" onclick=" manage_cart('<?php echo $key?>','remove')">Remove</a>
                            </div>
                        </div>
                    </td>
                    <td><input type='number' id="<?php echo $key?>qty" value="<?php echo $qty ?>"><br>
                        <a href="javascript:void(0)" onclick=" manage_cart('<?php echo $key?>','update')">Update</a>
                    </td>
                    <td><?php echo $qty*$price ?></td>
                </tr>
                <?php }
                    }
                ?>
            </table>
          </div>
          <div class="col-4">
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>35</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>235</td>
                    </tr>
                </table>
                
            </div>
            <hr/>
            <div class="div checkout_button">
                <a href="checkout.php"><button type="submit">Checkout</button></a>
            </div>
          </div>
      </div>
       
   </div>
    <!-- footer  area-->
    
   
<?php 
   require('footer.inc.php');
?>