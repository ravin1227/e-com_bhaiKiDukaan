<?php
  require "header.inc.php";
  $cat_id=mysqli_real_escape_string($con,$_GET['id']);
  if($cat_id >0){
    $get_product=get_product($con,'',$cat_id);
  }else{
   ?>
   <script>
     window.location.href='index.php';
   </script>
   <?php
  }
?>

        <div class="row">
            <div class="col category_heading">
                <h2>Sofa Sets</h2>
                <p>Your sofa set is the centre of attention in your living room and the perfect spot to spend time with family or entertain guests. When shopping for sofa set designs online, look for the right material, colour, and size, especially because sofa set prices vary by material and design. Explore a variety of sofa set designs including L-shaped sofa sets, Wooden sofa sets, Leather sofa sets, Leatherette sofa sets, Fabric sofa sets, Sofa cum beds, Recliner sofa sets, Modular sofa sets, Loveseats and Divans with price on Urban Ladder. Less</p>
            </div>
        </div>

        <div class="row">
            
           <?php
              if(count($get_product)>0){
              foreach($get_product as $list){
            ?>
              <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                  <div class="card" style="width:300px ">
                      <a href="product.php?id=<?php echo $list['id']; ?>"><img class="card-img-top" src="<?php echo PRODUCT_IMAGE_SITE_PATH. $list['image']; ?>" alt="Card image"></a>
                      <div class="card-body">
                        <a href="product.php?id=<?php echo $list['id']; ?>"><h4 class="card-title"><?php echo $list['name']; ?></h4></a>
                        <ul>
                            <li class="card_old_price">&#8377; <?php echo $list['mrp']; ?></li>
                            <li class="card_new_price">&#8377; <?php echo $list['price']; ?></li>
                        </ul>
                      </div>
                    </div>
              </div>
            <?php }
            }else{
              echo "Data Not Found";
              }?>
            
            </div>
           
        </div>
       
</div>

<hr class="rounded">

<div class="container">
    <div class="row">
        <div class="col new_arrivals">
            <h2>Best Seller</h2>
            <p>Your sofa set is the centre of attention in your living room and the perfect spot to spend time with family or entertain guests. When shopping for sofa set designs online, look for the right material, colour, and size, especially because sofa set prices vary by material and design. Explore a variety of sofa set designs including L-shaped sofa sets, Wooden sofa sets, Leather sofa sets, Leatherette sofa sets, Fabric sofa sets, Sofa cum beds, Recliner sofa sets, Modular sofa sets, Loveseats and Divans with price on Urban Ladder. Less</p>
        </div>
    </div>
    <div class="row new_arrivals">
        <?php
              $get_product=get_product($con,'4','','','','yes');
              if(count($get_product)>0){
              foreach($get_product as $list){
            ?>
        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
            <div class="card new_arrivals_card" style="width:250px ">
            <a href="product.php?id=<?php echo $list['id']; ?>"><img class="card-img-top" src="<?php echo PRODUCT_IMAGE_SITE_PATH. $list['image']; ?>" alt="Card image"></a>
                <div class="card-body">
                <a href="product.php?id=<?php echo $list['id']; ?>"><h4 class="card-title"><?php echo $list['name']; ?></h4></a>
                  <ul>
                    <li class="card_old_price">&#8377; <?php echo $list['mrp']; ?></li>
                    <li class="card_new_price">&#8377; <?php echo $list['price']; ?></li>
                  </ul>
                </div>
              </div>
        </div>
        <?php }
            }else{
              echo "Data Not Found";
              }?>
    </div>
    
</div>
<!-- footer  area-->

<?php 
require('footer.inc.php');
?>