
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Membership</h1>
							<p class="breadcrumbs"><span><a href="">Membership</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>List
							</p>
						</div>
						<div>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#addUser"> Add Member
							</button>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="customerTable" class="table">
											<thead>
												<tr>
												    <th>Sl</th>
													<th>Plan</th>
													<th>Plan name</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Add User Modal  -->
					<div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog"
					
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content" style="width: 93%;">
								<form action="<?php echo base_url(); ?>Admin/addMembers" method="post" id="addUserform">
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
									</div>
								
								
									<div class="modal-body px-4">
								

										<div class="row mb-2">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="event">First name<span class="required" style="color:red";>*</span></label>
													<input type="text" class="form-control" id="firstName" name="fname" style="border-color: #e1d8d8;" required>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group">
													<label for="event">Last name<span class="required" style="color:red";>*</span></label>
													<input type="text" class="form-control" id="lastName" name="lname" style="border-color: #e1d8d8;" required>
												</div>
											</div>


											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Email<span class="required" style="color:red";>*</span></label>
													<input type="email" class="form-control" id="email" name="email"
													style="border-color: #e1d8d8;" required	>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Phone number<span class="required" style="color:red";>*</span></label>
													<input type="text" class="form-control" id="phone_number" name="phone_number" style="border-color: #e1d8d8;"  required	>
														<div id="showError"></div>
													<!--<span id="phoneError" class="text-danger"></span>																		-->
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Address</label>
													<input type="text" class="form-control" id="address" name="address"
													style="border-color: #e1d8d8;" required	>
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">City<span class="required" style="color:red";>*</span></label>
													<input type="text" class="form-control" id="city" name="city"
													style="border-color: #e1d8d8;" required	>
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Post Code <span class="required" style="color:red";>*</span></label>
													<input type="text" class="form-control" id="postcode" name="postcode"
													style="border-color: #e1d8d8;"  required	>
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">District<span class="required" style="color:red";>*</span></label>
														<input type="text" class="form-control" id="district" name="district"
													style="border-color: #e1d8d8;" required	>
													<!--<input type="text" class="form-control" id="district" name="district"-->
													<!--	>-->
											
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Password<span class="required" style="color:red";>*</span></label>
													<input type="text" class="form-control" id="password" name="password"
													style="border-color: #e1d8d8;" required	>
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Confirm Password<span class="required" style="color:red";>*</span></label>
													<input type="text" class="form-control" id="confirmpassword"name="confirmpassword"
													style="border-color: #e1d8d8;" required>
													<div id="showErrorpwd"></div>
												</div>
												
											</div>
													<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Plan<span class="required" style="color:red";>*</span></label>
															<select name="plan" id="plan" class="form-select" required="" style="border-radius: 15px; border-color: #e1d8d8;" required>
                                                            <option value="">Select plan</option>
                                                            <?php foreach($plans as $rec){?>
                                                        <option value="<?=$rec->id?>"><?=$rec->plan_name?></option>
                                                        <?php } ?>
                                                                         
                                             	  </select>
												</div>
											</div>
										
										</div>
									</div>

									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="SubmitBtn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
			
				<!-- editUser Modal  -->
				
					<div class="modal fade modal-add-contact" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
								<form id="category-form" action="<?php echo base_url(); ?>Admin/editUsermember" method="post" >
									<div class="modal-header px-4">
									     <input type="hidden" name="id" id="user_ID" value="">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit User Details</h5>
									</div>
									
									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="form-label">Name</label>
													<input type="text" class="form-control" id="uName" name="username" 	style="border-color: #e1d8d8;" >
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">Email</label>
													<input type="email" class="form-control" id="uEmail"  name="useremail" 	style="border-color: #e1d8d8;">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="userName">Phone no</label>
													<input type="text" class="form-control" id="uPhone" name="phone_number" 	style="border-color: #e1d8d8;">
														<div id="showErroredit"></div>
												</div>
											</div>
												
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="email">Address</label>
													<input type="text" class="form-control" id="uAddress" name="useraddress" 	style="border-color: #e1d8d8;" >
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="Birthday">City</label>
													<input type="text" class="form-control" id="uCity" name="usercity" 	style="border-color: #e1d8d8;" >
												</div>
											</div>
										
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Pincode</label>
													<input type="text" class="form-control" id="uPincode" name="userpincode" 	style="border-color: #e1d8d8;">
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">District</label>
													<input type="text" class="form-control" id="userdistrict" name="district" 	style="border-color: #e1d8d8;" >
													
												</div>
											</div>
														<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Plan*</label>
															<select name="plan" id="userplan" class="form-select" required="" style="border-radius: 15px; border-color: #e1d8d8;" >
                                                            <?php foreach($plans as $rec){?>
                                                        <option value="<?=$rec->id?>"><?=$rec->plan_name?></option>
                                                        <?php } ?>
                                                                         
                                             	  </select>
												</div>
											</div>
										</div>
									</div>
									
									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" id="updateButton" class="btn btn-primary btn-pill">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				
				<!-- End Content Wrapper -->
					<div class="modal fade modal-add-contact" id="approvedModal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Admin/approve_member" >
                         <!--<div class="icon-box">-->
                		<i class="fa fa-check" style="font-weight: 1000;height: -30px;font-size: 58px;color: #32CD32;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="approved" id="Approve_id" value="1">
                            <h4 class="fs-semibold">Are you sure to Approve Member?</h4>
                            <p class="text-muted fs-14 mb-4 pt-1"></p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-success" id="delete-record" fdprocessedid="tib7hj" >Yes, Approved it!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>
					
				<!-- start Content Wrapper -->
					<div class="modal fade modal-add-contact" id="rejectedModal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Admin/reject_member" >
                         <!--<div class="icon-box">-->
                		<i class="fas fa-times" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="reject" id="reject_id" value="1">
                            <h4 class="fs-semibold">Are you sure to Reject Member?</h4>
                            <p class="text-muted fs-14 mb-4 pt-1"></p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-danger" id="delete-record" fdprocessedid="tib7hj">Yes, Reject it!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>
				
				
                	<!-- start Content Wrapper -->
					<div class="modal fade modal-add-contact" id="deleteRecordModal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Admin/delete_member" >
                         <!--<div class="icon-box">-->
                		<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="delete" id="delectId" value="1">
                            <h4 class="fs-semibold">Are you sure to Deleting Member?</h4>
                            <p class="text-muted fs-14 mb-4 pt-1">Deleting member will remove all of your information from our database.</p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-danger" id="delete-record" fdprocessedid="tib7hj">Yes, Delete It!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>

<?= $this->load->view('includes/admin_footer.php','',TRUE);?>



<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.css">
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/sweet-alert/sweetalert.min.js"></script>
                  
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->

	<script type="text/javascript">
$(document).ready(function() {
    $('#customerTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Admin/get_requested_members',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});

// function approve_member(id) {
//     // alert(id);
//     var member_id = id;
//     Swal.fire({
//         title: 'Are you sure to Approve Member?',
//         icon: "success",
//         showCancelButton: true,
//         confirmButtonColor: '#008000',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Approve'
//     }).then((result) => {
//         if (result.value) { // Check if result.value is truthy
//             $.ajax({
//                 url: '</?php echo base_url();?>Admin/approve_member/' + member_id,
//                 success: function(d) {
//                     location.href = "</?php echo base_url();?>Admin";
//                     Swal.fire(
//                         'Member Approved!',
//                         'success'
//                     );
//                 }
//             });
//         }
//     });
// }
// function approve_member(id) {
//     // alert(id);
//     var member_id = id;
//     Swal.fire({
//         title: 'Are you sure to Approve Member?',
//         icon: "success",
//         showCancelButton: true,
//         confirmButtonColor: '#008000',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Approve'
//     }).then((result) => {
//         if (result.value) { // Check if result.value is truthy
//             $.ajax({
//                 url: '</?php echo base_url();?>Admin/approve_member/' + member_id,
//                 success: function(d) {
//                     location.href = "</?php echo base_url();?>Admin";
//                     Swal.fire(
//                         'Member Approved!',
//                         'success'
//                     );
//                 }
//             });
//         }
//     });
// }
// function reject_member(id) {
//     // alert(id);
//     var member_id = id;
//     Swal.fire({
//         title: 'Are you sure to Reject Member?',
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: '#FFA500',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Reject'
//     }).then((result) => {
//         if (result.value) { // Check if result.value is truthy
//             $.ajax({
//                 url: '</?php echo base_url();?>Admin/reject_member/' + member_id,
//                 success: function(d) {
//                     location.href = "</?php echo base_url();?>Admin";
//                     Swal.fire(
//                         // timer: 3000,
//                         'Member Rejected!',
//                         'success'
                         
//                     );
//                 }
//             });
//         }
//     });
// }
// function delete_member(id) {
//     // alert(id);
//     var member_id = id;
//     Swal.fire({
//         title: 'Are you sure to Delete Member?',
//         icon: "error",
//         showCancelButton: true,
//         confirmButtonColor: '#FF0000',
//         cancelButtonColor: '#0000FF',
//         confirmButtonText: 'Delete'
//     }).then((result) => {
//         if (result.value) { 
//             $.ajax({
//                 url: '</?php echo base_url();?>Admin/delete_member/' + member_id,
//                 success: function(d) {
//                     location.href = "</?php echo base_url();?>Admin";
//                     Swal.fire(
//                         // timer: 3000,
//                         'Member Rejected!',
//                         'success'
                         
//                     );
//                 }
//             });
//         }
//     });
// }

   function getmember(id) {
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/getmemberDetails",
            type: "post",
            data: { id: id },
            success: function(result) {
                if (result) {
                    var data = JSON.parse(result);
                    $('#user_ID').val(data.id);
                    $('#uName').val(data.member_name);
                    $('#uEmail').val(data.user_email);
                    $('#uPhone').val(data.phone_number);
                    $('#uAddress').val(data.address);
                    $('#uCity').val(data.city);
                    $('#uPincode').val(data.pin_code);
                    $('#userdistrict').val(data.district_id);
                    
                     $('#userplan option').each(function() {
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
    
     $(document).ready(function() {
    $('#confirmpassword').keyup(function(){
        var pwd = $('#password').val();
        var cpwd = $('#confirmpassword').val();
        
        if(cpwd!=pwd){
            $('#showErrorpwd').html('*password are not matching');
            $('#showErrorpwd').css('color','red');
            $('#SubmitBtn').prop('disabled', true);
            return false;
        }else{
            $('#showErrorpwd').html('');
            $('#SubmitBtn').prop('disabled', false);
            return true; 
        }
        
    });
    });
    
  function approve_member(id)
   { 
    $("#Approve_id").val(id);
   }
   
    function reject_member(id)
   { 
    $("#reject_id").val(id);
   }
   
     function delete_member(id)
   { 
    $("#delectId").val(id);
   }
   
            // $(function() {
            
            // jQuery.validator.addMethod("noSpace", function(value, element) { 
            //  return value == '' || value.trim().length != 0; 
            //  }, "space not allowed");
            //  $("#addUser").validate({
            // rules: {
            // phone_number: {
            //  required: true,
            //  minlength:10,
            //  maxlength:10,
            //  noSpace:true,
            // remote:{
            //  type: "post",
            //  url: "</?= base_url(); ?>Admin/check_phoneno_exists",
            //  dataType: "json",
            //  data:
            //  {
            //  phone_number: function(){ return $("#phone_number").val(); }
            // },
            //  }
            //  },
            
            // },
            //  messages: {
            //  phone_number: {
            //  required: "this field is required",
            //  minlength: "phone number must be 10 digits.",
            //  maxlength: "phone number must be 10 digits.",
            //  remote: "phone number already exists",
            // },
            
            //  }
            //  });
            // });

    // $(document).ready(function() {
      
        $('#phone_number').keyup(function() {
        // function checkPhone(){
            //alert("jhjkhjk");
            var phoneNumber = $('#phone_number').val();
            //alert(phoneNumber);
            $.ajax({
                url: "<?php echo base_url(); ?>Admin/check_phoneno_exists",
                type: "post",
                data: { phone_number: phoneNumber },
                dataType: "json",
                success: function(result) {
                    if (result) {
                        $('#showError').html('Phone number already exists.');
                        $('#showError').css('color','red');
                        $('#SubmitBtn').prop('disabled', true);
                    } else {
                        $('#showError').html(''); 
                          $('#SubmitBtn').prop('disabled', false);
                    }
                },
                error: function() {
                    console.log("Error occurred during AJAX request.");
                }
            });
        });
        
            $('#uPhone').keyup(function() {
        // function checkPhone(){
            //alert("jhjkhjk");
            var phoneNumber = $('#uPhone').val();
            //alert(phoneNumber);
            $.ajax({
                url: "<?php echo base_url(); ?>Admin/edit_phoneno_exists",
                type: "post",
                data: { phone_number: phoneNumber },
                dataType: "json",
                success: function(result) {
                    if (result) {
                        $('#showErroredit').html('Phone number already exists.');
                        $('#showErroredit').css('color','red');
                        $('#updateButton').prop('disabled', true);
                    } else {
                        $('#showErroredit').html(''); 
                          $('#updateButton').prop('disabled', false);
                    }
                },
                error: function() {
                    console.log("Error occurred during AJAX request.");
                }
            });
        });
        // }

     </script>