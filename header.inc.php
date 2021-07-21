

<?php
    require ('connection.inc.php');
    require ('functions.inc.php');
    require ('add_to_cart.inc.php');
    $cat_res=mysqli_query($con,"SELECT * FROM categories WHERE status=1 ORDER BY categories ASC");
    $cat_arr=array();
    while($row=mysqli_fetch_assoc($cat_res)){
        $cat_arr[]=$row;
    }

    $obj=new add_to_cart();
    $totalProduct=$obj->totalProduct();

    $script_name=$_SERVER['SCRIPT_NAME'];
    $script_name_arr=explode('/',$script_name);
    $mypage=$script_name_arr[count($script_name_arr)-1];

    $meta_title="Bhai Ki Dukaan";
    $meta_desc="Bhai Ki Dukaan";
    $meta_keyword="Bhai Ki Dukaan";
    if($mypage=='product.php'){
        $product_id=get_safe_value($con,$_GET['id']);
        $product_meta=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product WHERE id='$product_id'"));
        $meta_title=$product_meta['meta_title'];
        $meta_desc=$product_meta['meta_desc'];
        $meta_keyword=$product_meta['meta_keyword'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc ?>">
    <meta name="keywords" content="<?php echo $meta_keyword  ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="font/flaticon.css">
    <div class="alert alert-warning alert-dismissible ">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong> Site is under construction.
  </div>
  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container login_form" id="container">
                    <div class="form-container sign-up-container">
                        <form action="#">
                            <h1>Create Account</h1>
                            <div class="social-container">
                                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <span>or use your email for registration</span>
                            <input id="signupname" type="text" placeholder="Name" />
                            <input id="signupemail" type="text" placeholder="Email" />
                            <input id="signuppassword" type="password" placeholder="Password" />
                            <button onclick="signupvalidation()" type="button">Sign Up</button>
                        </form>
                    </div>
                    <div class="form-container sign-in-container">
                        <form action="#">
                            <h1>Sign in</h1>
                            <div class="social-container">
                                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <span>or use your account</span>
                            <input id="username" type="text" placeholder="Username" />
                            <input id="loginpassword" type="password" placeholder="Password" />
                            <a href="#">Forgot your password?</a>
                            <button onclick="loginValidation()" type="button">Sign In</button>
                        </form>
                    </div>
                    <div class="overlay-container">
                        <div class="overlay">
                            <div class="overlay-panel overlay-left">
                                <h1>Welcome Back!</h1>
                                <p>To keep connected with us please login with your personal info</p>
                                <button class="ghost" id="signIn">Sign In</button>
                            </div>
                            <div class="overlay-panel overlay-right">
                                <h1>Hello, Friend!</h1>
                                <p>Enter your personal details and start journey with us</p>
                                <button class="ghost" id="signUp">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div> -->
</head>
<body class='one-col ul_desktop body_home' data-hook='body' id='home'>
<div class="container-fluid">

        <div class="row bar_content border-bottom help_sec" >
            <div class="col-4 mr-auto">
               <ul>
                   <li><a href="#"><span class="flaticon-question"></span>  Help</a></li>
                   <li><a href="track_order.php"><span class="flaticon-delivery"></span> Track Order</a></li>
               </ul>
            </div>
            <div class="col-5 ml-auto">
                <ul>
                    <li><a href="Stores.php">Stores</a></li>
                    <li><a href="customorder.php">Custom/BULK Order</a></li>
                    <li><a href="Gift Cards">Gift Cards</a></li>
                </ul>
            </div>
        </div>
        <div class="row search_bar">
            <div class="col-md-2">
                <a class="site_logo" href="index.php"><img src="logo.jpg"></a>
            </div>
            <div class="col-md-6">
               <form action="search.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="str"class="form-control" placeholder="Search items...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
               </form>
            </div>
            <div class="col-md-4 nav_icons">
                <ul>
                    <li><a href="track_order.php"><span class="flaticon-express-delivery"></span></a></li>
                    <div class="dropdown">
                        <li class="droptbtn"><a><span class="flaticon-user-1"></span></a></li>
                        <div class="dropdown-content">
                        <?php
                        if(isset($_SESSION['USER_LOGIN'])){
                            echo' <a href="profile.php">Profile</a>';
                            echo' <a href="my_order.php">My Order</a>';
                            echo' <a href="logout.php">Logout</a>';
                        }else{
                           echo' <a href="login.php">Login</a>';
                           echo' <a href="login.php">SignUp</a>';
                        }
                    ?>
                        </div>
                    </div>
                    <li><a href="#"><span class="flaticon-like"></span></a></li>
                    <li><a href="cart.php"><span class="flaticon-shopping-cart">
                        <span class="fa-stack fa-2x has-badge cartCount" data-count='<?php echo $totalProduct?>'></span></a></li>
                </ul>
            </div>
        </div>
        <div class="row category_bar" id="category_bar_stick">
            <ul class="nav mx-auto">
            <?php
                 foreach($cat_arr as $list){
                 ?>
                  <li class="nav-item">
                  <a class="nav-link" href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a>
                  </li>
                 <?php
                  }
                 ?>
              </ul>
        </div>
