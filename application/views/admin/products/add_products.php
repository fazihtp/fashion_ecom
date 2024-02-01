<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<style>
 #color_code {
  width: 42px !important;
  height: 100% !important;
  margin: 0;
  background-color: transparent;
  border: none;
   }
#imagePopup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  z-index: 999;
}

#imagePopup img {
  display: block;
  max-width: 80%;
  max-height: 80%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.form-check.form-check-inline {
    font-size: x-large;
}
select.form-select {
    border-radius: 15px;
}
button#add-button {
    margin: 10px;
    width: 80px;
    height: 38px;
    border-radius: 15px;
}
</style>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Add Products</h1>
							<p class="breadcrumbs"><span><a href="<?php echo base_url(); ?>Products/list_products">Products</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Add Product</p>
						</div>
						<div>
							<a href="<?php echo base_url('Products/list_products'); ?>" class="btn btn-primary" class="btn btn-primary"> View All
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Add Product</h2>
								</div>
                                <form class="row g-3" id="category-form" action="<?php echo base_url(); ?>Products/post_products" method="post" enctype="multipart/form-data">
								<div class="card-body">
									<div class="row ec-vendor-uploads">
										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">
													<div class="avatar-upload">
														<div class="avatar-edit">
												<input type='file' id="imageUpload" class="ec-image-upload" onchange="checkFileDetails()"
																accept=".png, .jpg, .jpeg" name="product_images[]" required/>
																 
															<label for="imageUpload"><img
																	src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																	class="svg_img header_svg" alt="edit" /></label>
																	 <p id="fileInfo"></p> 
														</div>
														<div class="avatar-preview ec-preview">
															<div class="imagePreview ec-div-preview">
																<img class="ec-image-preview" id
																	src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-preview.jpg"
																	alt="edit" />
															</div>
														</div>
													</div>
													<div class="thumb-upload-set colo-md-12">
														<div class="thumb-upload">
															<div class="thumb-edit">
									            	<input type='file' id="imgUpload" onchange="checkDetails()"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																	 
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
																		 <p id="fileInfo"></p>   <!--show the details-->
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="imageUpload" onchange="checkFileDetails()"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																	 
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
																		 <p id="fileInfo"></p>   <!--show the details-->
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="imageUpload" onchange="checkFileDetails()"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
																			  <p id="fileInfo"></p>   <!--show the details-->
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8 row g-3">
											<div class="ec-vendor-upload-detail">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Product name</label>
														<input type="text" class="form-control slug-title" id="inputEmail4" name="product_name" required>
													</div>
													
													<div class="col-md-6 mb-3">
														<label class="form-label"> Category</label>
														<select name="categories" id="categories" class="form-select" required style="border-radius: 15px;">
                                                            <option value="">Select Category</option>
                                                        <?php foreach ($categories as $categories): ?>
                                                                <option value="<?php echo $categories->id; ?>"><?php echo $categories->name; ?></option>
                                                            <?php endforeach; ?>
														</select>
													</div>
													<div class="col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Price</label>
														<input type="number" class="form-control slug-title" id="inputEmail4" name="price" required>
													</div>
													<div class="col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Quantity</label>
														<input type="number" class="form-control slug-title" id="inputEmail4" name="quantity" required>
													</div>
													<div class="col-md-12 mb-3">
														<label class="form-label">Sort Description</label>
														<textarea class="form-control" rows="2" name="full_details" required></textarea>
														</div>
														
														
													
													<div class="col-md-12 mb-3">
														<label class="form-label">Ful Detail</label>
															<textarea name="other_details" id="editor" cols="40" rows="10" class="ckeditor" style="border-radius: 3px; border-color: #eee" required></textarea>
													</div>
                                                   	<div class="col-md-12 mb-3">
														<button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
													</div>
                                                        </div>
											</div>
										</div>
                                                        
									</div>
								</div>
                                </form>
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
			<div id="imagePopup" onclick="closeImagePopup()"></div>
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>


<script>


function closeImagePopup() {
  var popup = document.getElementById('imagePopup');
  popup.innerHTML = '';
  popup.style.display = 'none';
}

function checkFileDetails() {
  document.getElementById('fileInfo').innerHTML ="";
  var fi = document.getElementById('imageUpload');
  var button = document.getElementById('submit-btn');
  if (fi.files.length > 0) { 
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
          if (width === 765 && height === 850) {
            button.removeAttribute('disabled'); // Enable the button
          } else {
               swal({
                        title: "oops!",
                        text: "Image must be size of 765 x 850!",
                        icon: "error",
                        button: "OK",
                    });
                 $('#fileInfo').empty(); 
                  $('#imageUpload').empty(); 
            // button.setAttribute('disabled', 'disabled'); // Disable the button
			button.removeAttribute('disabled'); // Enable the button
            
          }
        };
      };
      reader.readAsDataURL(file);
    }
  }
}

function checkimageDetails() {
  document.getElementById('fileInfo').innerHTML ="";
  var fi = document.getElementById('varientUpload');
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
          if (width === 1024 && height === 1024) {
            button.removeAttribute('disabled'); // Enable the button
          } else {
               swal({
                        title: "oops!",
                        text: "Image must be size of 1024 x 1024!",
                        icon: "error",
                        button: "OK",
                    });
                 $('#fileInfo').empty(); 
                  $('#imageUpload').empty(); 
            button.setAttribute('disabled', 'disabled'); // Disable the button
            
          }
        };
      };
      reader.readAsDataURL(file);
    }
  }
}

function checkDetails() {
  document.getElementById('fileInfo').innerHTML ="";
  var fi = document.getElementById('imgUpload');
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
          if (width === 1024 && height === 1024) {
            button.removeAttribute('disabled'); // Enable the button
          } else {
               swal({
                        title: "oops!",
                        text: "Image must be size of 1024 x 1024!",
                        icon: "error",
                        button: "OK",
                    });
                 $('#fileInfo').empty(); 
                  $('#imageUpload').empty(); 
            button.setAttribute('disabled', 'disabled'); // Disable the button
            
          }
        };
      };
      reader.readAsDataURL(file);
    }
  }
}
</script>
