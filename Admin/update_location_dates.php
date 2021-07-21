<?php 
    require ('connection.inc.php');
    require ('functions.inc.php');

    $tracking_id=$_SESSION['tracking_id'];
    $current_location=get_safe_value($con,$_POST['current_location']);
    $location_date=get_safe_value($con,$_POST['location_date']);

    mysqli_query($con,"INSERT INTO tracking_address (tracking_id,shippment_address,date_time) VALUES ('$tracking_id','$current_location','$location_date')") or die(mysqli_error());
    header("Location: {$hostname}/admin/update_tracking.php?tracking_id=$tracking_id");
    die();


?>