<?php
    session_start();

    $con=mysqli_connect("localhost","root","","bhaikidukaan");
    
    $hostname ="http://localhost:8080/bhaikidukaan";

    define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'//bhaikidukaan/');
    define('SITE_PATH','http://localhost:8080/bhaikidukaan/');

    define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
    define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

?>