
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Rejected Membership</h1>
							<p class="breadcrumbs"><span><a href="">Rejected</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>List
							</p>
						</div>
						<div>
							<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal"-->
							<!--	data-bs-target="#addUser"> Add Member-->
							<!--</button>-->
						</div>
					</div>
					<div class="row" >
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="customerTable" class="table">
											<thead>
												<tr>
												    <th>Sl</th>
													<th>Plan</th>
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
				</div> <!-- End Content -->
			</div>
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.css">
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">
$(document).ready(function() {
    $('#customerTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Admin/get_rejected_members',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});

function approve_member(id) {
    // alert(id);
    var member_id = id;
    Swal.fire({
        title: 'Are you sure to Approve Member?',
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: '#008000',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Approve'
    }).then((result) => {
        if (result.value) { // Check if result.value is truthy
            $.ajax({
                url: '<?php echo base_url();?>Admin/approve_member/' + member_id,
                success: function(d) {
                    location.href = "<?php echo base_url();?>Admin";
                    Swal.fire(
                        'Member Approved!',
                        'success'
                    );
                }
            });
        }
    });
}
function approve_member(id) {
    // alert(id);
    var member_id = id;
    Swal.fire({
        title: 'Are you sure to Approve Member?',
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: '#008000',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Approve'
    }).then((result) => {
        if (result.value) { // Check if result.value is truthy
            $.ajax({
                url: '<?php echo base_url();?>Admin/approve_member/' + member_id,
                success: function(d) {
                    location.href = "<?php echo base_url();?>Admin";
                    Swal.fire(
                        'Member Approved!',
                        'success'
                    );
                }
            });
        }
    });
}
function delete_member(id) {
    // alert(id);
    var member_id = id;
    Swal.fire({
        title: 'Are you sure to Delete Member?',
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: '#FF0000',
        cancelButtonColor: '#0000FF',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) { 
            $.ajax({
                url: '<?php echo base_url();?>Admin/delete_member/' + member_id,
                success: function(d) {
                    location.href = "<?php echo base_url();?>Admin";
                    Swal.fire(
                        // timer: 3000,
                        'Member Rejected!',
                        'success'
                         
                    );
                }
            });
        }
    });
}
     </script>