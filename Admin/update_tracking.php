<?php
require('header.inc.php');
$tracking_id=get_safe_value($con,$_GET['tracking_id']);
$_SESSION['tracking_id']=$tracking_id;

?>
         <div class="content pb-0">
                  <div class="row">
                     <div class="col-xl-12">
                           <div class="card">
                              <div class="row">
                                 <div class="col">
                                       <strong>Update Tracking Dates</strong>      
                                       <hr>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-3">
                                    <form  method="post" action="update_packed_on_dates.php">
                                       <table style="width:100%">
                                          <tr>
                                             <th>Packed On<hr></th>
                                          </tr>
                                          <tr>
                                             <td><input name="packed_on" type="datetime-local" placeholder="Packed On"></td>
                                          </tr>
                                       </table>
                                       <span><button type="submit" class="form-control">Update Tracking Status</button></span>
                                    </form>
                                 </div>
                                 <div class="col-3">
                                    <form action="update_delivered_dates.php" method="post">
                                       <table style="width:100%">
                                          <tr>
                                             <th>Delivered<hr></th>
                                          </tr>
                                          <tr>
                                             <td><input name="delivered_on1" type="datetime-local" placeholder="delivered on" required></td>
                                          </tr>
                                       </table>
                                       <span><button type="submit"  class="form-control">Update Tracking Status</button></span>
                                    </form>
                                 </div>
                                 <div class="col-6">
                                    <form action="update_location_dates.php" method="post">
                                       <table style="width:100%">
                                          <tr>
                                             <th>Current Location<hr></th>
                                             <th>Date& Time<hr></th>
                                          </tr>
                                          <tr>
                                          <td><input name="current_location" type="text" placeholder="Current Location" required></td>
                                          <td><input name="location_date" type="datetime-local" required ></td>
                                          </tr>
                                       </table>
                                       <span><button type="submit"  class="form-control">Update Location Status</button></span>
                                    </form>
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
		  </div>
<?php
require('footer.inc.php')
?> 