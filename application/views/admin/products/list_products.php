
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>

<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Products</h1>
							<p class="breadcrumbs"><span><a href="">List</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Products
							</p>
						</div>
						<div>
                            <a href="<?php echo base_url();?>Products">
						<button type="button" class="btn btn-primary"  > Add Products
							</button>
                            </a>
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
													<th>Image </th>
													<th>Product</th>
													<th>Category</th>
													<th>Stock</th>
                          <th>Price</th>
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
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/upload" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New Offerzone Category</h5>
									</div>

									<div class="modal-body px-4">
										<div class="form-group row mb-6">
											<label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Image</label>
											<div class="col-sm-8 col-lg-10">
												<div class="custom-file mb-1">
												<input type="file" id="file2" name="file2" class="custom-file-input" onchange="checkFileDetails()" accept="image/*" / required>
                                                    <p id="fileInfo"></p>   <!--show the details-->
													<label class="custom-file-label" for="coverImage">Choose
														file...</label>
													<div class="invalid-feedback">Example invalid custom file feedback
													</div>
												</div>
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Category Address</label>
													<input type="text" class="form-control" id="category_address" name="category_address" style="border-color: #ccc5c5;" required>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="lastName">Description</label>
													<input type="text" class="form-control" id="category_description" name="category_description" style="border-color: #ccc5c5;" required>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Contact</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!-- End Content -->
				
					<div class="modal fade zoomIn" id="deactivaebannerModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Products/checkbannerActive">
                                 <div class="icon-box">
                        				<i class="fa-sharp fa-regular fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="dactive">
                                    <h4 class="fs-semibold">Are tou sure you want to Deactive Banner! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                   <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" onclick="toggleButton()"><i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-danger" id="delete-record" >Yes,click it</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                          <!-- deactive banner end  -->
                          
                            <!-- active banner  -->
                          <div   class="modal fade zoomIn" id="activaebannerModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true" >
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Products/checkbannerActive">
                               
                                 <div class="icon-box">
                                     
                        				<i class="fa-solid fa-check fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #29cc97;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="active">
                                    <h4 class="fs-semibold">Are tou sure you want to Active Banner! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                       <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" id="deactivaebannerModal" data-bs-dismiss="modal" onclick="toggleButton()" > <i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-success" id="active-record" >Yes,click it</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
       <!-- active banner end  -->
				<!--delete modal-->
				
				<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
        </button>
      </div>
      <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Products/deleteProduct">
         <!--<div class="icon-box">-->
				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
				<!--</div>	-->
          <div class="mt-4 text-center">
              <input type="hidden"  name="product_id" id="product_id">
            <h4 class="fs-semibold">You are about to delete a product?</h4>
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
	<div class="modal fade modal-add-contact" id="offerModal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Products/changeToOffer" >
                         <!--<div class="icon-box">-->
                		<i class="fa fa-check" style="font-weight: 1000;height: -30px;font-size: 58px;color: #32CD32;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="product_id_offer" id="product_id_offer" value="">
                            <h4 class="fs-semibold">Are you sure you want to move to the offer?</h4>
                            	<div class="row">
    <div class="col">
        <input type="text" class="form-control" id="non_members" name="non_members" style="border-color: #e1d8d8;margin-top: 17px;" placeholder="Non-members' price" required>
    </div>
    <div class="col">
        <input type="text" class="form-control" id="member_price" name="member_price" style="border-color: #e1d8d8;margin-top: 17px;" placeholder="Members' pri.ce" required>
    </div>
</div>

                            <p class="text-muted fs-14 mb-4 pt-1"></p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-success" id="delete-record" fdprocessedid="tib7hj" >Yes, Change it!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>	
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toggle.css" />
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.css">
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
    $('#customerTable').DataTable({
        'processing': true,
        'serverSide': true,
     "lengthMenu": [[10, 20, 50, 75, -1], [10, 20, 50, 75, "All"]],
    "paging": true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Products/getProductList',
            'type': 'POST',
            'data': function(d) {
                    d.from_date= $("#from_date").val()
					d.to_date= $("#to_date").val()
					d.stock_update= $("#stock_update").val()
              },
        },
    });
});
    function toggleButton() {
      $('#ID').toggleClass('active');
      location.reload();
    }
    function active_banner(id) {
      $("#activaebannerModal").modal("show");
      $("#active").val(id);
     }
    
     function deactive_banner(id) {
     
         $("#deactivaebannerModal").modal("show");
         $("#dactive").val(id);   
     }
     function delete_product(id){
    $("#product_id").val(id);
    }   
     function offer_product(id){
   
    
    
        $.ajax({
            url: "<?php echo base_url(); ?>Products/getProductPrice",
            type: "post",
            data: { id: id },
            success: function(result) {
                if (result) {
                    var data = JSON.parse(result);
                    $('#non_members').val(data.price_for_non_members);
                    $('#member_price').val(data.price_for_members);
                     $("#product_id_offer").val(data.product_id);
                } else {
                    alert("Please Try Again Later");
                }
            },
            error: function() {
                console.log("Error occurred during AJAX request.");
            }
        });
    
    }   
    function search(){
        $('#customerTable').DataTable().ajax.reload();
    }
 </script>