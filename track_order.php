<?php 
    require ('header.inc.php');
?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-6 track_order_search">
                    <form action="track_order_result.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="tracking_id" class="form-control" placeholder="Enter Tracking Id" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
 <?php 
 require ('footer.inc.php');
 ?>