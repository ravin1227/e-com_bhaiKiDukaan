<?php
  require "header.inc.php";
  $str=mysqli_real_escape_string($con,$_GET['str']);
  if($str!=''){
    $get_product=get_product($con,'','','',$str);
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
                <h2>Search Result</h2>
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
<!-- footer  area-->

<?php 
require('footer.inc.php');
?>