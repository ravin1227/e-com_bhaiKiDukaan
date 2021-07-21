<?php
    require ('header.inc.php');
?>
<!-- main content area  starts here -->
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            
            <div class="row profile_avatar">
                <div class="vertical-menu col">
                    <a href="#" class="active">
                        <div class="col-3">
                            <img src="img_avatar.png" alt="Avatar">
                        </div>
                        <div class="col">
                            <small>Hello,</small>
                            <h5>Customer name</h5>
                        </div>
                     </a>
                  </div>
            </div>
            <div class="row profile_avatar">
                <div class="vertical-menu col">
                    <a href="#" class="active">
                        <div class="col">
                            <h5>MY ORDERS</h5>
                        </div>
                     </a>
                  </div>
            </div>
            <div class="row profile_avatar">
                <div class="vertical-menu col">
                    <a class="active">
                        <div class="col ">
                            <h5>SETTINGS</h5>
                        </div>
                    </a>
                    <a href="#">Profile Setting </a>
                    <a href="#">My Wishlist 3</a>
                    <a href="#">LOGOUT</a>
                  </div>
            </div>
           
        </div>
        <div class="col-7">
            <form class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" value="Daniel" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" value="Adams" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <input class="form-control" type="email" id="account-email" value="daniel.adams@example.com" disabled="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <input class="form-control" type="text" id="account-phone" value="+7 (805) 348 95 72" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <input class="form-control" type="password" id="account-pass">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirm Password</label>
                        <input class="form-control" type="password" id="account-confirm-pass">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox d-block">
                            <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                            <label class="custom-control-label" for="subscribe_me">Subscribe me to Newsletter</label>
                        </div>
                        <button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- main content area ends here -->

<!-- footer  area-->
<?php 
 require  ('footer.inc.php');
?>