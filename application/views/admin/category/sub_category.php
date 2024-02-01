<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toggle.css" />
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Sub Category</h1>
							<p class="breadcrumbs"><span><a href="">Settings</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Sub Category
							</p>
						</div>
						<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal-add-contact" > Add SubCategory
							</button>
						</div>
					</div>
					<div class="row" >
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="Sub_categoryTable" class="table">
											<thead>
												<tr>
												    <th>Sl</th>
												    <th>Main Category </th>
													<th>Sub Category </th>
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
								 <form id="category-form" action="<?php echo base_url(); ?>Settings/Add_Subcategory" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New Category</h5>
									</div>

									<div class="modal-body px-4">
									
				                    	<div class="row mb-2">
				                    	    <input type="hidden" name="id" id="subcategory_id">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="lastName">Category</label>
                                                    <select class="form-control" id="sub_category" name="category" style="border-color: #ccc5c5;" required>
                                                        	<option selected>Select category </option>
                                                        <?php foreach ($category as $categorys) { ?>
                                                            <option value="<?= $categorys->id ?>"><?= $categorys->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
											<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="lastName">Sub Category</label>
													<input type="text" class="form-control" id="sub_category" name="sub_category"  style="border-color: #ccc5c5;" >
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
					</div>				
					<!-- edit_model  -->
					<div class="modal fade modal-add-contact" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Settings/edit_Subcategory" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Sub Category</h5>
									</div>

									<div class="modal-body px-4">
									     <input type="hidden" name="id" id="edit_ID" value="">
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
											     <div class="form-group">
                                                    <label for="lastName">Category</label>
                                                    <select class="form-control" id="category_main" name="Maincategory" style="border-color: #ccc5c5;width: 417px;" required>
                                                        	<option selected>Select category </option>
                                                        <?php foreach ($category as $categorys) { ?>
                                                            <option value="<?= $categorys->id ?>"><?= $categorys->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
    											</div>
    										</div>
											<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
												  
													<label for="lastName">Sub Category</label>
													<input type="text" class="form-control" id="subcategory" name="subcategory" style="border-color: #ccc5c5;" required>
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
					</div>
						<div class="modal fade zoomIn" id="deletesubModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
                                    </button>
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/delete_subcategory">
                                 <!--<div class="icon-box">-->
                        				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				<!--</div>	-->
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="id" id="category_id">
                                    <h4 class="fs-semibold">You are about to delete a SubCategory?</h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">Deleting Subcategory List will remove all of your information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                      <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"  > <i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-danger" id="delete-record" >Yes, Delete It!!</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>	
				</div> 
				                                  <!-- deactive banner  -->
                        	<div class="modal fade zoomIn" id="deactivasubcategoryModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checksubCategory">
                                 <div class="icon-box">
                        				<i class="fa-sharp fa-regular fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="dactive">
                                    <h4 class="fs-semibold">Are tou sure you want to Deactive Sub Category! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                   <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" onclick="toggleButton()" > <i class="ri-close-line me-1 align-middle"></i> Close </button>
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
                          <div class="modal fade zoomIn" id="activasubcategoryModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checksubCategory">
                               
                                 <div class="icon-box">
                                     
                        				<i class="fa-solid fa-check fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #29cc97;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="active">
                                    <h4 class="fs-semibold">Are tou sure you want to Active Sub Category! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                       <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" onclick="toggleButton()"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-success" id="delete-record" >Yes,click it</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
       <!-- active banner end  -->
				<!-- End Content -->

<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.css">
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
    $('#Sub_categoryTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Settings/get_SubCategoryList',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});

	function get_SubCategory(id)
	 {
		$.ajax({
        url: "<?php echo base_url();?>Settings/get_Subcategory",
        type: "post",
        data: {id:id},
        success: function(result){
            if(result){
                var data = JSON.parse(result);
				  $('#edit_ID').val(data.id);
                  $('#category_main').val(data.category_id);
                  $('#subcategory').val(data.sub_category_name);
            }else
			{ alert("Please Try Again Later");

            }
        }
    });
  }
  
  
  
   function delete_subcategory(id)
   { 
    $("#category_id").val(id);
   }
   

 function active_sub(id) {
    $("#active").val(id);
     var modalId = '#activasubcategoryModal' + id;
        $(modalId).modal('show');
 }
 


 function deactive_sub(id) {
    $("#dactive").val(id);
    var modalId = '#deactivasubcategoryModal' + id;
        $(modalId).modal('show');
     
 }
 
 function toggleButton() {
    //  alert('haii');
   
  $('#ID').toggleClass('active');
  location.reload();
}
 
 
 </script>