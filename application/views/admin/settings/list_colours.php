
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Colours</h1>
							<p class="breadcrumbs"><span><a href="">Settings</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Colours
							</p>
						</div>
						<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal-add-contact" > Add Colour
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
													<th>Name </th>
													<th>Colour</th>
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
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/add_colour" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New Colour</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Colour</label>
													<input type="text" class="form-control" id="color_name" name="color_name" style="border-color: #ccc5c5;" required>
                                                    
												</div>
											</div>
											<div class="col-lg-12 mt-10">
												<div class="form-group">
													<label for="lastName">Pick ur Colour</label>
													<input type="color" class="form-control form-control-color" id="exampleColorInput4" value="#009688" title="Choose your color" style="width: 65px;" name="color_code">
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Colour</button>
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
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/editColour" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Colour</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Colour</label>
													<input type="text" class="form-control" id="edited_color_name" name="edited_color_name" style="border-color: #ccc5c5;" required>
														<input type="hidden" class="form-control" id="edited_color_id" name="edited_color_id">
                                                    
												</div>
											</div>
											<div class="col-lg-12 mt-10">
												<div class="form-group">
													<label for="lastName">Colour Colour</label>
													<input type="color" class="form-control form-control-color" id="edited_color_code" title="Choose your color" style="width: 65px;" name="edited_color_code">
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Colour</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!--end edit modal-->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
        </button>
      </div>
      <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Admin/deletedColour">
         <!--<div class="icon-box">-->
				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
				<!--</div>	-->
          <div class="mt-4 text-center">
              <input type="hidden"  name="colour_id" id="colour_id">
            <h4 class="fs-semibold">You are about to delete a Colour?</h4>
            <p class="text-muted fs-14 mb-4 pt-1">Deleting colour List will remove all of your information from our database.</p>
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
            'url': '<?=base_url()?>Admin/getColourList',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});
function get_color_data(id) {
    $.ajax({
        url: "<?php echo base_url('Admin/getColorData'); ?>",
        method: "POST",
        data: { id: id },
        dataType: "json",
        success: function(data) {
            $('#edited_color_id').val(data.id);
            $('#edited_color_name').val(data.colors);
            $('#edited_color_code').val(data.colour_code);
        },
        error: function() {
            alert('Error occurred while fetching color data.');
        }
    });
}
function delete_color(id) {
    	var colour_id=id;
	 $('#colour_id').val(colour_id);
}

 </script>