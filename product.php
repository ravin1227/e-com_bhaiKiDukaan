<?php 
require('header.inc.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>


<div class="container-fluid">
<?php 
    // if(count($get_product)>0){
?>
    <div class="row product_img">
        <div class="col-6 fiex_product_img" >
             <!-- Full-width images with number text -->
             <div class="mySlides" >
                <div class="numbertext">1 / 6</div>
                  <img src="img/1.jpg" style="width:100%;height:400px">
              </div>
            
              <div class="mySlides">
                <div class="numbertext">2 / 6</div>
                  <img src="img/2.jpg" style="width:100%;height:400px">
              </div>
            
              <div class="mySlides">
                <div class="numbertext">3 / 6</div>
                  <img src="img/3.jpg" style="width:100%;height:400px">
              </div>
            
              <div class="mySlides">
                <div class="numbertext">4 / 6</div>
                  <img src="img/4.jpg" style="width:100%;height:400px">
              </div>
            
              <div class="mySlides">
                <div class="numbertext">5 / 6</div>
                  <img src="img/3.jpg" style="width:100%;height:400px">
              </div>
            
              <div class="mySlides">
                <div class="numbertext">6 / 6</div>
                  <img src="img/2.jpg" style="width:100%;height:400px">
              </div>
            
              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
              <!-- Image text -->
              <div class="caption-container">
                <p id="caption"></p>
              </div>
            
              <!-- Thumbnail images -->
              <div class="row">
                    <div class="column">
                      <img class="demo cursor" src="img/1.jpg" style="width:100%" onclick="currentSlide(1)" >
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="img/2.jpg" style="width:100%" onclick="currentSlide(2)" >
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="img/3.jpg" style="width:100%" onclick="currentSlide(3)">
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="img/4.jpg" style="width:100%" onclick="currentSlide(4)" >
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="img/3.jpg" style="width:100%" onclick="currentSlide(5)" >
                    </div>
              </div>
            </div>
            <!-- detail section -->
            <div class="col-6">
              <div class="row">
                  <h3><?php echo $get_product['0']['name'] ?></h3>
              </div>
              <div class="row ratting_product1">
                  <button type="button" class="btn btn-success btn-sm">4.4 <i class="fas fa-star"></i> </button>
                  <h6> 4,789 Reviews  & 450 Comments</h6>
              </div>
              <div class="row price">
                  <ul>
                  <li class="new_price"><?php echo $get_product['0']['price'] ?></li>
                  <li class="old_price"><?php echo $get_product['0']['mrp'] ?></li>
                  <li class="offper">%OFF</li>
                  </ul>
              </div>
              <div class="row">
                <h6>Qty:</h6>
                <select id="qty" class="qty_num">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                </select>
              </div>
              <div class="row buy_button">
                <div class="col-7 m-auto">
                  <button type="button" class="btn btn-warning btn-lg add_cart" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">ADD TO CART</button>
                  <button type="button" class="btn btn-warning btn-lg buy_now">BUY NOW</button>
                </div>
              </div>
              <div class="row">
                  
              </div>
              <div class="row">
                  <section>
                  <h3>Description</h3>
                  <small><?php echo $get_product['0']['description'] ?></small>
                  </section>
                  <section>
                  <h3>Key Features</h3>
                  <hr>
                  <ul>
                      <li><?php echo $get_product['0']['short_desc'] ?></li>
                     
                  </ul>
                  </section>   
          </div>
          <div class="row">
              <div class="col">
              <div class="comment-wrapper">
                  <div class="panel panel-info">
                      <div class="product_panel-heading">
                          Comment panel
                      </div>
                      <div class="panel-body">
                          <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
                          <button type="button" class="btn btn-info pull-right">Post</button>
                          <div class="clearfix"></div>
                          <hr>
                          <ul class="media-list">
                              <li class="media">
                                  <a href="#" class="pull-left">
                                      <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                  </a>
                                  <div class="media-body">
                                      <span class="text-muted pull-right">
                                          <small class="text-muted">30 min ago</small>
                                      </span>
                                      <strong class="text-success">@MartinoMont</strong>
                                      <p>
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                          Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
                                      </p>
                                  </div>
                              </li>
                              <li class="media">
                                  <a href="#" class="pull-left">
                                      <img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">
                                  </a>
                                  <div class="media-body">
                                      <span class="text-muted pull-right">
                                          <small class="text-muted">30 min ago</small>
                                      </span>
                                      <strong class="text-success">@LaurenceCorreil</strong>
                                      <p>
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                          Lorem ipsum dolor <a href="#">#ipsumdolor </a>adipiscing elit.
                                      </p>
                                  </div>
                              </li>
                              <li class="media">
                                  <a href="#" class="pull-left">
                                      <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                                  </a>
                                  <div class="media-body">
                                      <span class="text-muted pull-right">
                                          <small class="text-muted">30 min ago</small>
                                      </span>
                                      <strong class="text-success">@JohnNida</strong>
                                      <p>
                                          Lorem ipsum dolor <a href="#">#sitamet</a> sit amet, consectetur adipiscing elit.
                                      </p>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
    </div>
 <?php
  //  }else{
  //    echo "Data not found";
  //   }
 ?>
</div>


<!-- footer  area-->
<?php
require("footer.inc.php");
?>
