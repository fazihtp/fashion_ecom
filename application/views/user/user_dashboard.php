<?= $this->load->view('includes/header.php','',TRUE);?>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">My Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">My Profile</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- User profile section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap ec-border-box">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <!-- <div class="ec-vendor-block-bg"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                    <h5>Mariana Johns</h5>
                                </div> -->
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>User/dashboard">User Profile</a></li>
                                        <!--<li><a href="user-history.html">History</a></li>-->
                                        <!--<li><a href="wishlist.html">Wishlist</a></li>-->
                                        <li><a href="<?php echo base_url();?>Cart">Cart</a></li>
                                        
                                        <li><a href="<?php echo base_url()?>User/view_myorder">My Order</a></li>
                                        <!--<li><a href="track-order.html">Track Order</a></li>-->
                                        <!--<li><a href="user-invoice.html">Invoice</a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <php print_r($records);die; ?> -->
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <h5>Account Information</h5> <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">

                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>Member Name <a href=" " data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong><?php
                                                    if (isset($records['member_name'])) {
                                                        echo $records['member_name'];
                                                    } else {
                                                        echo " Name Not Available";
                                                    }
                                                    ?>
                                                    </strong></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>Email Id<a href=" " data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong><?php
                                                    if (isset($records['user_email'])) {
                                                        echo $records['user_email'];
                                                    } else {
                                                        echo " Email ID Not Available";
                                                    }
                                                    ?>
                                                    </strong></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>Contact nubmer<a href=" " data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong>Phone Nubmer 1 : </strong><?php
                                                    if (isset($records['phone_number'])) {
                                                        echo $records['phone_number'];
                                                    } else {
                                                        echo " Phone No Not Available";
                                                    }
                                                    ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                    <h6>Address<a  data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="get_update_data(<?php echo $records['id'] ?>)"><i class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong>Home : </strong><?php
                                                        echo isset($records['address']) ? $records['address'] . ', ' : '';
                                                        echo isset($records['city']) ? $records['city'] . ', ' : '';
                                                        echo isset($records['pin_code']) ? $records['pin_code'] . ', ' : '';
                                                        echo isset($records['district_id']) ? $records['district_id'] : '';
                                                        ?>
                                                      </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address">
                                                    <h6>Total Amount<a href=" " data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong>Purchased: </strong> ₹ <?php echo $amount?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address">
                                                    <h6>Total Orders<a href=" " data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong>My Orders: </strong><?php echo $count?></li>
                                                        
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User profile section -->
     <!-- Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">
                           
                        
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" action="<?php echo base_url();?>User/updateMemberDetails" method="post">
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="member_name" value="<?php echo isset($records['member_name']) ? $records['member_name'] : ''; ?>">

                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="user_email" value="<?php echo isset($records['user_email']) ? $records['user_email'] : ''; ?>">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Phone No</label>
                                        <input type="text" class="form-control" name="phone_number" value="<?php echo isset($records['phone_number']) ? $records['phone_number'] : ''; ?>">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Address </label>
                                        <input type="text" class="form-control" name="address" value="<?php echo isset($records['address']) ? $records['address'] : ''; ?>">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" value="<?php echo isset($records['city']) ? $records['city'] : ''; ?>">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Pin Code</label>
                                        <input type="text" class="form-control" name="pin_code" value="<?php echo isset($records['pin_code']) ? $records['pin_code'] : ''; ?>">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">District</label>
                                        <input type="text" class="form-control" name="pin_code" value="<?php echo isset($records['district_id']) ? $records['district_id'] : ''; ?>">
                                       
                                             </div>
                                               
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo isset($records['id']) ? $records['id'] : ''; ?>">
                                 
                                        <div class="modal-footer px-4 " style="margin-top: 50px;">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal"
                                            aria-label="Close">Close</a>
                                    </div>
                                 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
<?php echo $this->load->view('includes/footer.php','',TRUE);?>
