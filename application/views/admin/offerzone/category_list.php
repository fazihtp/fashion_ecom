<style> 
table,th{
    padding-right: 79px;
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toggle.css" />
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Offer Zone Category</h1>
							<p class="breadcrumbs"><span><a href="index.html">Offerzone</a></span>
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
										<table id="customerTable" class="table" >
											<thead >
												<tr >
												    <th >Sl</th>
													<th >Image </th>
													<th >Category Name</th>
													<th style="padding-right:300px">Description</th>
													<th  style="width: 15%" >Action</th>
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
													<label for="firstName">Category Name</label>
													<input type="text" class="form-control" id="category_address" name="category_address" style="border-color: #ccc5c5;" required>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="lastName">Description</label>
														<textarea name="category_description"class="form-control" id="category_description" maxlength="30" rows="2" style="border-color: #ccc5c5;" required></textarea>
													<!--<input type="text" class="form-control" id="category_description" name="category_description" style="border-color: #ccc5c5;" required>-->
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
				<!-- End Content -->
				
				<!-- editContact Button  -->
					<div class="modal fade modal-add-contact" id="modal-edit-contact" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content" style="width: 636px; margin-left: 111px;">
								 <form id="category-form" action="<?php echo base_url(); ?>Settings/edit_offer_products" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Offerzone Category</h5>
									</div>
									<div class="modal-body px-4">
									    <input type="hidden" name="id" id="category_ID" value="">
										<div class="form-group row mb-6">
											<label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Image</label>
											<div class="col-sm-8 col-lg-10">
												<div class="custom-file mb-1">
												<input type="file" id="file3" name="file3" class="custom-file-input"  onchange="checkFileDetail()" accept="image/*" / >
                                                    <p id="fileInform"></p>   <!--show the details-->
													<label class="custom-file-label" for="coverImage">Choose
														file...</label>
													<div class="invalid-feedback">Example invalid custom file feedback
													</div>
											
												</div>
													<div class="col-lg-5 col-md-5 col-sm-6" style="margin-left: 106px;">
        											<div class="card-wrapper">
        												<div class="card-container">
        													<div class="card-top">
        													 <img class="card-image" id="categoryImagePreview" src="">
        													</div>
        												</div>
        											</div>
        										</div>
											</div>
											<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Category Name</label>
													<input type="text" class="form-control" id="cat_name" name="category_name" style="border-color: #ccc5c5;" >
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="lastName">Description</label>
														<textarea name="category_description"class="form-control" id="cat_description"  rows="2" style="border-color: #ccc5c5; text-align: center;" ></textarea>
												</div>
											</div>
										</div>
										</div>
											<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="update-btn">Update</button>
									</div>
								
									</div>

								
								</form>
							</div>
						</div>
					</div>
				</div> 
				
				<!-- End Content -->
				
					 <!-- delete category -->
							<div class="modal fade zoomIn" id="deletecategory" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/delete_offerzonecategory">
                                 <!--<div class="icon-box">-->
                        				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				<!--</div>	-->
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="id" id="category_id">
                                    <h4 class="fs-semibold">You are about to delete a Banner?</h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">Deleting Category List will remove all of your information from our database.</p>
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
                    <!-- End Content -->
                    
                        <!-- deactive category  -->
                        	<div class="modal fade zoomIn" id="deactivecategoryModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                  
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checkofferzone_category">
                                 <div class="icon-box">
                        				<i class="fa-sharp fa-regular fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="dactive">
                                    <h4 class="fs-semibold">Are tou sure you want to Deactive Offer Zone Category! </h4>
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
                        
                          <!-- deactive category end  -->
                          
                            <!-- active category  -->
                          <div   class="modal fade zoomIn" id="activecategoryModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true" >
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button onclick="toggleButton()" type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checkofferzone_category">
                               
                                 <div class="icon-box">
                                     
                        				<i class="fa-solid fa-check fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #29cc97;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="active">
                                    <h4 class="fs-semibold">Are tou sure you want to Active Offer Zone Category! </h4>
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
       <!-- active category end  -->
    
                        
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
            'url': '<?=base_url()?>Admin/getCategoryList',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});
       // edit category_list//
       function getCategory_list(id)
	 {
		$.ajax({
        url: "<?php echo base_url();?>Admin/getCategory",
        type: "post",
        data: {id:id},
        success: function(result){
            if(result){
                var data = JSON.parse(result);
				  $('#category_ID').val(data.id);
                  $('#cat_name').val(data.sub_category_name);
                  $('#cat_description').val(data.category_description);
             
                  if (data.category_image) {
                    var imageSrc = '<?php echo base_url(); ?>assets/uploads/offerzone_category/' + data.category_image;
                    $('#categoryImagePreview').attr('src', imageSrc);
                     $('#file3').text(data.category_image);
                } else {
                    
                    $('#categoryImagePreview').attr('src', '');
                }
                  
            }else
			{ alert("Please Try Again Later");

            }
        }
    });
  }

function checkFileDetails() {
  document.getElementById('fileInfo').innerHTML ="";
  var fi = document.getElementById('file2');
  var button = document.getElementById('submit-btn');
  if (fi.files.length > 0) { // FIRST CHECK IF ANY FILE IS SELECTED.
    for (var i = 0; i <= fi.files.length - 1; i++) {
      var fileName, fileExtension, fileSize, fileType, dateModified;
      fileName = fi.files.item(i).name;
      fileExtension = fileName.replace(/^.*\./, '');
       readImageFile(fi.files.item(i));
    }
    function readImageFile(file) {
      var reader = new FileReader(); // Create a new instance.
      reader.onload = function (e) {
        var img = new Image();
        img.src = e.target.result;

        img.onload = function () {
          var width = this.width;
          var height = this.height;

          document.getElementById('fileInfo').innerHTML =
            document.getElementById('fileInfo').innerHTML + '<br /> ' +
            'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
            'Width: <b>' + width + '</b> <br />' +
            'Height: <b>' + height + '</b> <br />';

          // Check the width and height condition
          if (width === 800 && height === 800) {
            button.removeAttribute('disabled'); // Enable the button
          } else {
               swal({
                        title: "oops!",
                        text: "Image must be size of 800 x 800!",
                        icon: "error",
                        button: "OK",
                    });
            button.setAttribute('disabled', 'disabled'); // Disable the button
            
          }
        };
      };
      reader.readAsDataURL(file);
    }
  }
}

function checkFileDetail() {
  document.getElementById('fileInform').innerHTML ="";
  var fi = document.getElementById('file3');
  var button = document.getElementById('update');
  if (fi.files.length > 0) { // FIRST CHECK IF ANY FILE IS SELECTED.
    for (var i = 0; i <= fi.files.length - 1; i++) {
      var fileName, fileExtension, fileSize, fileType, dateModified;
      fileName = fi.files.item(i).name;
      fileExtension = fileName.replace(/^.*\./, '');
       readImageFile(fi.files.item(i));
    }
    function readImageFile(file) {
      var reader = new FileReader(); // Create a new instance.
      reader.onload = function (e) {
        var img = new Image();
        img.src = e.target.result;

        img.onload = function () {
          var width = this.width;
          var height = this.height;

          document.getElementById('fileInform').innerHTML =
            document.getElementById('fileInform').innerHTML + '<br /> ' +
            'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
            'Width: <b>' + width + '</b> <br />' +
            'Height: <b>' + height + '</b> <br />';

          // Check the width and height condition
          if (width === 800 && height === 800) {
            button.removeAttribute('disabled'); // Enable the button
          } else {
               swal({
                        title: "oops!",
                        text: "Image must be size of 800 x 800!",
                        icon: "error",
                        button: "OK",
                    });
            button.setAttribute('disabled', 'disabled'); // Disable the button
            
          }
        };
      };
      reader.readAsDataURL(file);
    }
  }
}

        function delete_category(id)
       { 
        $("#category_id").val(id);
       }
       
     function active_category(id) {
     
      $("#activecategoryModal").modal("show");
      $("#active").val(id);
     }
    

     function deactive_category(id) {
     
     $("#deactivecategoryModal").modal("show");
     $("#dactive").val(id);   
     }
      
    
 </script>
