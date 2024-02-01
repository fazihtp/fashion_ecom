 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toggle.css" />
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Category</h1>
							<p class="breadcrumbs"><span><a href="">Settings</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Category
							</p>
						</div>
						<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal-add-contact" > Add Category
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
													<th>Category </th>
													<!--<th>Image</th>-->
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
						<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Settings/add_category" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New Category</h5>
									</div>

									<div class="modal-body px-4">
									
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="lastName">Category</label>
													<input type="text" class="form-control" id="new_category" name="new_category" style="border-color: #ccc5c5;" required>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
						<!-- edit_model  -->
					<div class="modal fade modal-add-contact" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Settings/edit_category" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit New Category</h5>
									</div>

									<div class="modal-body px-4">
									     <input type="hidden" name="id" id="edit_ID" value="">
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
												  
													<label for="lastName">Category</label>
													<input type="text" class="form-control" id="newcategory" name="newcategory" style="border-color: #ccc5c5;" required>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
						<!-- edit_model_end  -->
						<div class="modal fade zoomIn" id="deleteModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
                                    </button>
                                  </div>
                                  <div class="modal-body p-5 text-center">
                                                        <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/delete_category">
                                     <!--<div class="icon-box">-->
                            				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                            				<!--</div>	-->
                                      <div class="mt-4 text-center">
                                        <input type="hidden"  name="id" id="category_id">
                                        <h4 class="fs-semibold">You are about to delete a Category?</h4>
                                        <p class="text-muted fs-14 mb-4 pt-1">Deleting category List will remove all of your information from our database.</p>
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
                            
                                <!-- active category  -->
                          <div class="modal fade zoomIn" id="activecategoryModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checkCategory">
                               
                                 <div class="icon-box">
                                     
                        				<i class="fa-solid fa-check fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #29cc97;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="active">
                                    <h4 class="fs-semibold">Are tou sure you want to Active category! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                       <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" > <a href="<?= base_url('Admin/category'); ?> "<i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-success" id="delete-record" >Yes,click it</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
         <!-- active category end  -->
       
                               <!-- deactive categoty  -->
                        	<div class="modal fade zoomIn" id="deactivaecategoryModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checkCategory">
                                 <div class="icon-box">
                        				<i class="fa-sharp fa-regular fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="dactive">
                                    <h4 class="fs-semibold" style="color:#8a909d;">Are tou sure you want to Deactive category! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                   <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"  <i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-danger" id="delete-record" >Yes,click it</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- deactive category end  -->
                            				</div> 
				<!-- End Content -->
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
            'url': '<?=base_url()?>Settings/getCategoryList',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});

	function getCategory(id)
	 {
		$.ajax({
        url: "<?php echo base_url();?>Settings/get_category",
        type: "post",
        data: {id:id},
        success: function(result){
            if(result){
                var data = JSON.parse(result);
				  $('#edit_ID').val(data.id);
                  $('#newcategory').val(data.name);
            }else
			{ alert("Please Try Again Later");

            }
        }
    });
  }
  
  	function delete_category(id)
   { 
    $("#category_id").val(id);
   }
 
 


   function active_category(id) {
    $("#active").val(id);
     var modalId = '#activecategoryModal' + id;
        $(modalId).modal('show');
 }
 


 function deactive_category(id) {
    $("#dactive").val(id);
    var modalId = '#deactivaecategoryModal' + id;
        $(modalId).modal('show');
 }
 
function hidebutton(select){
    alert('haii')
     $('#deactivaecategoryModal').modal('hide');
}
 </script>