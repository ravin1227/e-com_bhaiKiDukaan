<?php 
require('header.inc.php')
?>

        <div class="row">
            <div class="col-12">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                      <li data-target="#demo" data-slide-to="3"></li>
                    </ul>
                  
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="img-fluid" src="img/1.jpg">
                      </div>
                      <div class="carousel-item">
                        <img class="img-fluid" src="img/2.jpg">
                      </div>
                      <div class="carousel-item">
                        <img class="img-fluid" src="img/3.jpg">
                      </div>
                      
                      <div class="carousel-item">
                        <img class="img-fluid" src="img/4.jpg">
                      </div>
                    </div>
                  
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  
                  </div>
            </div>
        </div>


<div class="container">
  <hr>

  <div class="row cat_icon">
    <div class="col-12"><ul>
      <li ><a href="#"><span class="flaticon-bed-2"></span></a></li>
      <li ><a href="#"><span class="flaticon-sofa-1"></span></a></li>
      <li ><a href="#"><span class="flaticon-mattress"></span></a></li>
      <li ><a href="#"><span class="flaticon-chair"></span></a></li>
      <li ><a href="#"><span class="flaticon-closet"></span></a></li>
      <li ><a href="#"><span class="flaticon-kitchen"></span></a></li>
      <li ><a href="#"><span class="flaticon-table"></span></a></li></ul>
    </div>
    <div class="col-12 cat_iconr2"><ul>
      <li ><a href="#"><span class="flaticon-tv-screen"></span></a></li>
      <li ><a href="#"><span class="flaticon-washing-machine"></span></a></li>
      <li ><a href="#"><span class="flaticon-fridge"></span></a></li>
      <li ><a href="#"><span class="flaticon-mixer-blender"></span></a></li>
      <li ><a href="#"><span class="flaticon-fan"></span></a></li>
      <li ><a href="#"><span class="flaticon-sound-system"></span></a></li>
      <li ><a href="#"><span class="flaticon-list"></span></a></li></ul>
    </div>
  </div>
  <hr>
</div>

<div class="container-fluid">
  <div class="row"> 
    <?php 
      $get_product=get_product($con,'');
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
    <?php }?>
   
  </div>
</div>
<!-- main content area ends here -->

<?php 
require('footer.inc.php')
?>