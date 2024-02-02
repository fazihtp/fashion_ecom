<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>


<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>User Profile</h1>
							<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Profile
							</p>
						</div>
						<div>
							</div>
					</div>
					<div class="card profile-content" style="background:#e7f7e8">
						<div class="row">
							<div class="col-lg-4 col-xl-3">
								<div class="profile-content-left profile-left-spacing">
								     <form id="category-form" action="<?php echo base_url(); ?>Admin/updateMembersDetails" method="post" >
										<hr class="w-100">

									<div class="contact-info pt-4">
									   <input type="hidden" name="id" id="user_ID" value="<?php echo $member_details->id ?>">
										<h5 class="text-dark">Contact Information</h5>
										<p class="text-dark font-weight-medium pt-24px mb-2">Name </p> 
										
										<?php if (!empty($member_details->member_name)) { ?>
                                             <!--<input type="text" class="hidden-input" value="</?php echo $member_details->member_name; ?>" />-->
                                              <p><?php echo $member_details->member_name; ?></p>
                                             <!--<input type="text" class="form-control" name="firstname" id="firstName"  placeholder="Firstname" value="</?php echo $member_details->member_name; ?>">-->
                                            
                                        <?php } else { ?>
                                            <p>No name available. </p>
                                        <?php } ?>
										<p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
										<?php if (!empty($member_details->user_email)) { ?>
                                            <p><?php echo $member_details->user_email; ?></p>
                                              <!--<input type="text" class="form-control" name="firstemail" id="firstEmail" placeholder="Email Address"  value="</?php echo $member_details->user_email; ?>">-->
                                        <?php } else { ?>
                                            <p>No E-mail available.</p>
                                        <?php } ?>
										<p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
										<?php if (!empty($member_details->phone_number)) { ?>
                                            <p><?php echo $member_details->phone_number; ?></p>
                                             <!--<input type="text" class="form-control" name="firstphone" id="firstPhone" placeholder="Phone Number" value="</?php echo $member_details->phone_number; ?>">-->
                                        <?php } else { ?>
                                            <p>No Phone No available.</p>
                                        <?php } ?>
										<p class="text-dark font-weight-medium pt-24px mb-2">Address</p>
										<?php if (!empty($member_details->address) || !empty($member_details->city) || !empty($member_details->district) || !empty($member_details->pin_code)) { ?>
                                        <p><?php echo implode(', ', array_filter([$member_details->address, $member_details->city, $member_details->pin_code, $member_details->district_id])); ?></p>
                                        <!--<input type="text" class="form-control slug-title" id="inputaddress"  placeholder="Address" name="address" value="</?php echo $member_details->phone_number;?>" >-->
                                        
                                    	<!--<p class="text-dark font-weight-medium pt-24px mb-2">City</p>-->
                                     <!--   <input type="text" class="form-control slug-title" id="inputCity" name="city"  placeholder="city" value="</?php echo $member_details->city;?>"  >-->
                                        
                                        	<!--<p class="text-dark font-weight-medium pt-24px mb-2">Pincode</p>-->
                                        	
                                         <!-- <input type="text" class="form-control slug-title" id="inputPincode" name="pincode"  placeholder="pincode" value="</?php echo $member_details->pin_code;?>">-->
                                        		<!--<select name="district" id="userdistrict" class="form-select" required="" style="border-radius: 15px;border-color: #e1d8d8;" >-->
                                                         
                                          <!--              <option value="</option-->
                                          	<!--<p class="text-dark font-weight-medium pt-24px mb-2">District</p>-->
                                          	<!--	<select name="district" id="inputdistrict" class="form-select"  style="border-radius: 15px;border-color: #e1d8d8;" >-->
                                           <!--                 </?php foreach($districts as $rec){?>-->
                                           <!--             <option value="</?=$rec->districtid?>"></?=$rec->district_title?></option>-->
                                           <!--             </?php } ?>-->
                                                                         
                                           <!--  	  </select>-->
                                                       
                                         
                                        <?php } else { ?>
                                            <p>No address details available.</p>
                                        <?php } ?>
										
                                        <p class="text-dark font-weight-medium pt-24px mb-2">Total Orders</p>
										<?php if (!empty($count)) { ?>
                                         <!--<p></?php echo $member_details->total_orders; ?></p>-->
                                            <p><?php echo $count ?></p>
                                        <?php } else { ?>
                                            <p>No Orders available.</p>
                                        <?php } ?>
                                        <p class="text-dark font-weight-medium pt-24px mb-2">User Name </p>
										<?php if (!empty($member_details->user_name)) { ?>
                                         <!--<p></?php echo $member_details->total_orders; ?></p>-->
                                            <p><?php echo $member_details->user_name ?></p>
                                        <?php } else { ?>
                                            <p>No Username.</p>
                                        <?php } ?>
										
									</div>
									<!--<div>-->
									<!--<button type="submit" id="updateButton" class="btn btn-primary btn-pill">Update</button>-->
									<!--</div>-->
									</form>
								</div>
							</div>

							<div class="col-lg-8 col-xl-9">
								<div class="profile-content-right profile-right-spacing py-5">
									<ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
												data-bs-target="#profile" type="button" role="tab"
												aria-controls="profile" aria-selected="true">Profile</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="settings-tab" data-bs-toggle="tab"
												data-bs-target="#settings" type="button" role="tab"
												aria-controls="settings" aria-selected="false">Settings</button>
										</li>
									</ul>
									<div class="tab-content px-3 px-xl-5" id="myTabContent">

										<div class="tab-pane fade show active" id="profile" role="tabpanel"
											aria-labelledby="profile-tab">
											<div class="tab-widget mt-5">
												<div class="row">
													<div class="col-xl-4">
														<div class="media widget-media p-3 bg-white border">
															<div class="icon rounded-circle mr-3 bg-primary">
																<i class="mdi mdi-cart-outline text-white "></i>
															</div>

															<div class="media-body align-self-center">
																<h4 class="text-primary mb-2"><?php echo $count ?></h4>
																<p>Order</p>
															</div>
														</div>
													</div>

													<div class="col-xl-4">
														<div class="media widget-media p-3 bg-white border">
															<div class="icon rounded-circle bg-warning mr-3">
															<i class="mdi mdi-currency-inr text-white"></i>

															</div>

															<div class="media-body align-self-center">
																<h4 class="text-primary mb-2">Target</h4>
																<p></p>
															</div>
														</div>
													</div>

													<div class="col-xl-4">
														<div class="media widget-media p-3 bg-white border">
															<div class="icon rounded-circle mr-3 bg-success">
																<i class="mdi mdi-diamond text-white "></i>
															</div>

															<div class="media-body align-self-center" data-bs-toggle="modal"
								data-bs-target="#extendPlan">
																<h4 class="text-primary mb-2" ></h4>
																<p>Membership Plan</p>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-xl-12">

														<!-- Notification Table -->
														<div class="card card-default">
															<div class="card-header justify-content-between mb-1">
																<h2>Latest Order Details</h2>
																<div>
																	<button class="text-black-50 mr-2 font-size-20" id="reloadButton"><i
																			class="mdi mdi-cached"></i></button>
																	
																</div>

															</div>
															<!--start-->
													
                                                            <div class="card-body compact-notifications" data-simplebar style="height: 434px;">
                                                                <table class="table">
																	<thead>
																		<tr>
																			<th style="width: 10px;">ID</th>
																			<th>Product_Name</th>
																			<th>From Address</th>
																			<!-- <th>To Address</th> -->
																			<th>Status</th>
																			<th>Date&Time</th>
																		</tr>
																	</thead>

																</table>
                                                                 <?php foreach ($orders as $order): ?>
                                                                
                                                                <div class="media pb-3 align-items-center justify-content-between">
                                                                         <a  target="_blank" href="<?php echo base_url();?>Orders/viewOrders/<?php echo $order->order_id;?>"><p style="margin-right: 10px;font-weight:bold;font-size: 17px"><?php echo $order->order_id?></p></a>
                                                                <div class="media-image mr-3 rounded-circle">
															<a href=""><img class="profile-img rounded-circle w-45" src="<?php echo base_url(); ?>assets/uploads/products_images/<?= $order->image ?>" alt="customer image"></a>
													    	</div>
                                                                    <div class="media-body pr-3">
                                                                      <a class="mt-0 mb-1 font-size-15 text-dark" target="_blank" href="<?php echo base_url();?>Products/view_product/<?php echo base64_encode($order->product_id)?>"><?php echo $order->product_name?>

                                                                       
                                                                    </div>
                                                                    
                                                                        <?php $address = get_order_list1($order->order_id); ?>

                                                            <?php if ($address->from_name || $address->from_phone || $address->from_house_name || $address->from_pin || $address->from_state): ?>
                                                            <div class="media-body pr-3">
                                                                <a class="mt-0 mb-1 font-size-15 text-dark" target="_blank" href="<?php echo base_url();?>Orders/viewOrders/<?php echo $order->order_id;?>">
                                                                    <?php echo $address->from_name ?>
                                                                    <p><?php echo $address->from_phone ?>, <?php echo $address->from_house_name ?></p>
                                                                    <p><?php echo $address->from_pin ?>, <?php echo $address->from_state ?></p>
                                                                </a>
                                                            </div>
                                                            <?php endif; ?>
                                                            
                                                           

                                                                     <div class="media-body pr-3">
                                                                        <a  target="_blank" href="<?php echo base_url();?>Orders/viewOrders/<?php echo $order->order_id;?>">
                                                                        <p><?php echo $order->order_status?></p></a>
                                                                    </div>
                                                                    
                                                     
                                                          <span class="font-size-12"><i class=""></i><?php echo date('Y-m-d h:i:s a', strtotime($order->created_at)); ?></span>
                                                                </div>
                                                                
                                                                 <?php endforeach; ?>
                                                            </div>
                                                      
                                                        <!--end-->
															<!--end-->
															<div class="mt-3"></div>
														</div>

													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="settings" role="tabpanel"
											aria-labelledby="settings-tab">
											<div class="tab-pane-content mt-5">
												<form id="passwordForm" action="<?php echo base_url(); ?>Admin/updateUserPassword" method="post" >
												    	<div class="form-group mb-4">
														<label for="newPassword">New password</label>
														<input type="password" class="form-control" id="newPassword" name="newPassword">
														<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $member_details->id; ?>">
													</div>

													<div class="form-group mb-4">
														<label for="conPassword">Confirm password</label>
														<input type="password" class="form-control" id="conPassword" name="conPassword">
													</div>

													<div class="d-flex justify-content-end mt-5">
														<button type="submit"
															class="btn btn-primary mb-2 btn-pill">Update
															Password</button>
													</div>
												</form>
											</div>
										</div>
                            		</div>
								</div>
							</div>

						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->

					


<?= $this->load->view('includes/admin_footer.php','',TRUE);?>

    <script>
        document.getElementById('reloadButton').addEventListener('click', function() {
            location.reload();
        });
        
           function getmember(id) {
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/getMemberProfile",
            type: "post",
            data: { id: id },
            success: function(result) {
                if (result) {
                    var data = JSON.parse(result);
                    $('#user_ID').val(data.id);
                    $('#firstName').val(data.member_name);
                    $('#firstEmail').val(data.user_email);
                    $('#firstPhone').val(data.phone_number);
                    $('#inputaddress').val(data.address);
                    $('#inputCity').val(data.city);
                    $('#endingdate').val(data.ending_date);

                    $('#userdistrict option').each(function() {
                        if ($(this).val() ==data.district_id) {
                            $(this).prop("selected", true);
                        }
                    });
                     $('#inputPlan option').each(function() {
                        if ($(this).val() ==data.subscription_id) {
                            $(this).prop("selected", true);
                        }
                    });
                } else {
                    alert("Please Try Again Later");
                }
            },
            error: function() {
                console.log("Error occurred during AJAX request.");
            }
        });
    }

    </script>
    <script>
document.getElementById("passwordForm").addEventListener("submit", function(event) {
    // Prevent the form from submitting by default
    event.preventDefault();

    // Get the values entered in the password fields
    var newPassword = document.getElementById("newPassword").value;
    var conPassword = document.getElementById("conPassword").value;

    // Check if the passwords match
    if (newPassword === conPassword) {
        // The passwords match, you can proceed to submit the form
        this.submit();
    } else {
        // The passwords don't match, display an error message or take other action
        alert("Passwords do not match. Please try again.");
    }
});
</script>
