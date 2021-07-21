<?php 
    require ('connection.inc.php');
    require ('functions.inc.php');
    $tracking_id=$_SESSION['tracking_id'];
    $packed_on=get_safe_value($con,$_POST['packed_on']);

    mysqli_query($con,"UPDATE tracking_order SET packed_on='$packed_on' WHERE tracking_id='$tracking_id'") or die(mysqli_error());
    header("Location: {$hostname}/admin/update_tracking.php?tracking_id=$tracking_id");
    die();
?>