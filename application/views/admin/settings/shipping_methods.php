
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
 <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
 <style>
     
.rating {
  margin-top: 40px;
  border: none;
  float: left;
}

.rating > label {
  color: #90A0A3;
  float: right;
}

.rating > label:before {
  margin: 5px;
  font-size: 2em;
  font-family: FontAwesome;
  content: "\f005";
  display: inline-block;
}

.rating > input {
  display: none;
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #F79426;
}

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label {
  color: #FECE31;
}
label {
    float: left;
}
 </style>
 
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Shipping Methods</h1>
							<p class="breadcrumbs"><span><a href="">Settings</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Shipping Methods
							</p>
						</div>
						<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal-add-contact" > Add Shpping Methods
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
												    <th>Shipment Name</th>
													<th>Base Price(in kerala)</th>
													<th>Per Item Price(in kerala)</th>
													<th>Other state Price</th>
													<th>Other state per Item Price</th>
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
	<!-- Add Contact Button  -->
					<div class="modal fade modal-add-contact" id="modal-add-contact" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-sx" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/AddShippingMethods" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add Shipping Methods</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Name</label>
													<input type="text" class="form-control" id="name" name="name" style="border-color: #ccc5c5;" required>
                                                    
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Base Price(in kerala)</label>
													<input type="text" class="form-control" id="base_price" name="base_price" style="border-color: #ccc5c5;" required>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">per Item Price(in kerala)</label>
													<input type="text" class="form-control" id="per_item_price" name="per_item_price" style="border-color: #ccc5c5;" >
												</div>
											</div>
												<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Other State Price</label>
													<input type="text" class="form-control" id="other_state_amount" name="other_state_amount" style="border-color: #ccc5c5;" required>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Other state per Item Price</label>
													<input type="text" class="form-control" id="Other_State_item_price" name="Other_State_item_price" style="border-color: #ccc5c5;" >
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Method</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!-- End Content -->
 jQuery 
<!--edit Model-->
					<div class="modal fade modal-add-contact" id="viewModal1" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
							 <form id="category-form" action="<?php echo base_url(); ?>Admin/editShippingMethods" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Shipping Methods</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Name</label>
												<input class="form-control" type="hidden" id="id23" name="id"  >
													<input type="text" class="form-control" id="name1" name="name" style="border-color: #ccc5c5;" required>
                                                    
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Base Price(in kerala)</label>
													<input type="text" class="form-control" id="base_price1" name="base_price" style="border-color: #ccc5c5;" required>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">per Item Price(in kerala)</label>
													<input type="text" class="form-control" id="per_item_price1" name="per_item_price" style="border-color: #ccc5c5;" >
												</div>
											</div>
												<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Other State Price</label>
													<input type="text" class="form-control" id="other_state_amount1" name="other_state_amount" style="border-color: #ccc5c5;" required>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Other state per Item Price</label>
													<input type="text" class="form-control" id="Other_State_item_price1" name="Other_State_item_price" style="border-color: #ccc5c5;" >
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Update Method</button>
									</div>
								</form>
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
        <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Admin/deleteMethod">
         <!--<div class="icon-box">-->
				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
				<!--</div>	-->
          <div class="mt-4 text-center">
              <input type="hidden"  name="Shipping_id" id="Shipping_id1">
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
            'url': '<?=base_url()?>Admin/getshipping',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});

function editmethods(id)
{
    $.ajax({
		type: "POST",
		url: "<?= base_url() ?>Admin/getMethodsById/"+id,
		success: function(response)
		{
			data=JSON.parse(response);
			$("#id23").val(data.id);
			$("#name1").val(data.name);
			$("#base_price1").val(data.base_price);
			$("#per_item_price1").val(data.per_item_price);
			$("#other_state_amount1").val(data.other_state_amount);
			$("#Other_State_item_price1").val(data.Other_State_item_price);
	   },
	});
}

function delete_Method(id) {
	 $('#Shipping_id1').val(id);
}

 </script>