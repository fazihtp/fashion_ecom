<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toggle.css" />
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Banner</h1>
							<p class="breadcrumbs"><span><a href="">Settings</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>banner
							</p>
						</div>
						<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#addBanner" > Add Banner
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
												    <th>Images </th>
													<th>Heading </th>
													<th>Sub_Heading </th>
													<th>Shot Description </th>
													<th>Shop Link </th>
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
	<!-- Add banner  -->
				<div class="modal fade modal-add-contact" id="addBanner" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content" style="width: 636px; margin-left: 111px;">
								<form action="<?php echo base_url(); ?>Settings/add_Banner" method="post" enctype="multipart/form-data">
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New Banner</h5>
									</div>

									<div class="modal-body px-4">
									     <input type="hidden" name="id" id="bannerID" value="">
										<div class="form-group row mb-6">
										   <div class="mb-3">
										
										 <label for="Phone-field" class="form-label">Add Banner Image</label>
										
										<input name="image" id ="bannerImages" class="form-control"  type="file" accept="image/png, image/gif, image/jpeg"/ style="border-color: #ccc5c5;" onchange="checkFileDetails()" accept="image/*" / 	required>
										<p id="fileInfo"></p> 
										</div>

										</div>

										<div class="row mb-2">
											<div class="col-md-12">
												<div class="form-group">
													<label for="firstName">Heading</label>
													<input type="text" class="form-control" id="headings" name="heading" value=""style="border-color: #ccc5c5;" maxlength="55" required>
												</div>
											</div>
										</div>
											<div class="row mb-2">
											<div class="col-md-12">
												<div class="form-group">
													<label for="firstName">Sub Heading</label>
													<input type="text" class="form-control" id="Sub_headings" name="Sub_heading" value=""style="border-color: #ccc5c5;" maxlength="100" required>
												</div>
											</div>
										</div>
										<div class="row mb-2">
										<div class="col-md-12">
												<label class="firstName">Shot Description</label>
												<textarea name="shot_description"class="form-control" id="shot_descriptions" maxlength="150" rows="2" required></textarea>
											</div>
										</div>
												<div class="row mb-2">
											<div class="col-md-12">
												<div class="form-group">
													<label for="firstName">Go to shop link</label>
													<input type="text" class="form-control" id="shop_links" name="shop_link" value=""style="border-color: #ccc5c5;" maxlength="30" required  >
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

				    
                        <!-- edit banner  -->
				<div class="modal fade modal-add-contact" id="editBanner" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content" style="width: 636px; margin-left: 111px;">
								<form action="<?php echo base_url(); ?>Settings/edit_Banner" method="post" enctype="multipart/form-data">
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Banner</h5>
									</div>

									<div class="modal-body px-4">
									     <input type="hidden" name="id" id="banner_ID" value="">
										<div class="form-group row mb-6">
										   <div class="mb-3">
										 <label for="Phone-field" class="form-label">Edit Banner Image</label>
										
										<input name="image" id ="imageName" class="form-control"  type="file" accept="image/png, image/gif, image/jpeg"/ style="border-color: #ccc5c5;" onchange="checkFileDetails2()" accept="image/*" / > 
										<p id="fileInfo1"></p> 
										</div>
													
											<div class="col-lg-5 col-md-5 col-sm-6" style="margin-left: 165px;">
											<div class="card-wrapper">
												<div class="card-container">
													<div class="card-top">
													 <img class="card-image" id="bannerImagePreview" src="">
													</div>
												
													<div class="card-action">
														<!--<div class="card-edit"><i class="mdi mdi-circle-edit-outline"></i></div>-->
													</div>
												</div>
											</div>
										</div>
											<div class="row mb-2">
											<div class="col-md-12">
												<div class="form-group">
													<label for="firstName">Heading</label>
													<input type="text" class="form-control" id="heading" name="heading" value=""style="border-color: #ccc5c5;"  maxlength="50" >
												</div>
											</div>
										</div>
										
												<div class="row mb-2">
											<div class="col-md-12">
												<div class="form-group">
													<label for="firstName">Sub Heading</label>
													<input type="text" class="form-control" id="Sub_heading" name="Sub_heading" value=""style="border-color: #ccc5c5;"  maxlength="50" >
												</div>
											</div>
										</div>
										
											<div class="row mb-2">
										<div class="col-md-12">
												<label class="firstName">Shot Description</label>
												<textarea name="shot_description"class="form-control" id="shot_description" rows="2" style="border-color: #ccc5c5;" maxlength="50" ></textarea>
											</div>
										</div>
												<div class="row mb-2">
											<div class="col-md-12">
												<div class="form-group">
													<label for="firstName">Go to shop link</label>
													<input type="text" class="form-control" id="shop_link" name="shop_link" value="" style="border-color: #ccc5c5;"  maxlength="50" >
												</div>
											</div>
										</div>
										</div>
										<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn1">update</button>
									</div>
									</div>
								
								</form>
							</div>
						</div>
					</div>	
					 <!-- delete banner  -->
							<div class="modal fade zoomIn" id="deletebanner" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/delete_banner">
                                 <!--<div class="icon-box">-->
                        				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				<!--</div>	-->
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="id" id="banner_id">
                                    <h4 class="fs-semibold">You are about to delete a Banner?</h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">Deleting Banner List will remove all of your information from our database.</p>
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
                        
                        <!-- deactive banner  -->
                        	<div class="modal fade zoomIn" id="deactivaebannerModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!--<button onclick="toggleButton()" type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checkbannerActive">
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
                                    <!--<button onclick="toggleButton()" type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">-->
                                    <!--</button>-->
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Settings/checkbannerActive">
                               
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
            'url': '<?=base_url()?>Settings/getBannerlist',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});

function getBanner_list(id)
	 {
		$.ajax({
        url: "<?php echo base_url();?>Settings/get_Banner",
        type: "post",
        data: {id:id},
        success: function(result){
            if(result){
                var data = JSON.parse(result);
				  $('#banner_ID').val(data.id);
				  $('#bannerImage').val(data.image);
                  $('#heading').val(data.heading);
                  $('#Sub_heading').val(data.sub_heading);
                  $('#shot_description').val(data.shot_description);
                  $('#shop_link').val(data.shop_link);
                  if (data.image) {
                    var imageSrc = '<?php echo base_url(); ?>assets/uploads/banner_image/' + data.image;
                    $('#bannerImagePreview').attr('src', imageSrc);
                     $('#imageName').text(data.image);
                } else {
                    
                    $('#bannerImagePreview').attr('src', '');
                }
                  
            }else
			{ alert("Please Try Again Later");

            }
        }
    });
  }
  
        function delete_banner(id)
       { 
        $("#banner_id").val(id);
       }
    
     function active_banner(id) {
     
      $("#activaebannerModal").modal("show");
      $("#active").val(id);
     }
    

     function deactive_banner(id) {
     
         $("#deactivaebannerModal").modal("show");
         $("#dactive").val(id);   
     }
      
     function toggleButton() {
      $('#ID').toggleClass('active');
      location.reload();
    }
    
    function checkFileDetails() {
      document.getElementById('fileInfo').innerHTML ="";
      var fi = document.getElementById('bannerImages');
      var button = document.getElementById('submit-btn"');
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
              if (width === 1920 && height === 800) {
                button.removeAttribute('disabled'); 
              } else {
                   swal({
                            title: "oops!",
                            text: "Image must be size of 1920 x 800!",
                            icon: "error",
                            button: "OK",
                        });
                button.setAttribute('disabled', 'disabled');
              }
            };
          };
          reader.readAsDataURL(file);
        }
      }
    }
    
    function checkFileDetails2() {
      document.getElementById('fileInfo1').innerHTML ="";
      var fi = document.getElementById('imageName');
      var button = document.getElementById('submit-btn1"');
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
    
              document.getElementById('fileInfo1').innerHTML =
                document.getElementById('fileInfo1').innerHTML + '<br /> ' +
                'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
                'Width: <b>' + width + '</b> <br />' +
                'Height: <b>' + height + '</b> <br />';
    
              // Check the width and height condition
              if (width === 1920 && height === 800) {
                button.removeAttribute('disabled'); // Enable the button
              } else {
                   swal({
                            title: "oops!",
                            text: "Image must be size of 1920 x 800!",
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
 
 </script>