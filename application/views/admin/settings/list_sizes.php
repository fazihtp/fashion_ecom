
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
 <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Size</h1>
							<p class="breadcrumbs"><span><a href="">Settings</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Size
							</p>
						</div>
						<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal-add-contact" > Add Size
							</button>
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
													<th>Size </th>
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
	<!-- Add Contact Button  -->
					<div class="modal fade modal-add-contact" id="modal-add-contact" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-sx" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/add_size" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New Size</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Size</label>
													<input type="text" class="form-control" id="size" name="size" style="border-color: #ccc5c5;" required>
                                                    
												</div>
											</div>
											
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Size</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!-- End Content -->
<!-- jQuery -->
<!--edit Model-->
					<div class="modal fade modal-add-contact" id="edited_modal-add-contact" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-sx" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/editSize" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Size</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Size</label>
													<input type="text" class="form-control" id="edited_size_name" name="edited_size_name" style="border-color: #ccc5c5;" required>
														<input type="hidden" class="form-control" id="edited_size_id" name="edited_size_id">
                                                    
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Size</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!--end edit modal-->
				<!--delete model-->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
        </button>
      </div>
      <div class="modal-body p-5 text-center">
        <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Admin/deletedSize">
         <!--<div class="icon-box">-->
				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
				<!--</div>	-->
          <div class="mt-4 text-center">
              <input type="hidden"  name="size_id" id="size_id">
            <h4 class="fs-semibold">You are about to delete a Size?</h4>
            <p class="text-muted fs-14 mb-4 pt-1">Deleting size List will remove all of your information from our database.</p>
            <div class="hstack gap-2 justify-content-center remove">
              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
              <button type="submit" class="btn btn-danger" id="delete-record" >Yes, Delete It!!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.css">
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
    $('#customerTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Admin/getSizeList',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});
function get_size_data(id) {
    //  alert(id);
     $.ajax({ 
         url: "<?php echo base_url('Admin/getSizeData'); ?>",
         method: "POST", data: { id: id }, 
         dataType: "json", success: function(data) 
         { 
             $('#edited_size_id').val(data.id); 
             $('#edited_size_name').val(data.size);
             }, error: function() {
                 alert('Error occurred while fetching size data.');
                 } });
                 }

function delete_size(id) {
    	var size_id=id;
	 $('#size_id').val(size_id);
}



 </script>