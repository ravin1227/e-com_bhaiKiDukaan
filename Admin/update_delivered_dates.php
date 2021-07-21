<?php 
    require ('connection.inc.php');
    require ('functions.inc.php');
    $tracking_id=$_SESSION['tracking_id'];
    $delivered_on=get_safe_value($con,$_POST['delivered_on1']);

    mysqli_query($con,"UPDATE tracking_order SET delivered_on='$delivered_on' WHERE tracking_id='$tracking_id'") or die(mysqli_error());
    header("Location: {$hostname}/admin/update_tracking.php?tracking_id=$tracking_id");
    die();
?>