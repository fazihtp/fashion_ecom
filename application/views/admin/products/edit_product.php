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
select.form-select {
    border-radius: 15px;
}
</style>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Update Products</h1>
							<p class="breadcrumbs"><span><a href="index.html">Products</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Update Product</p>
						</div>
						<div>
							<a href="<?php echo base_url('Products/list_products'); ?>"  class="btn btn-primary"> View All
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Update Product</h2>
								</div>
                                <form class="row g-3" id="category-form" action="<?php echo base_url(); ?>Products/update_products" method="post" enctype="multipart/form-data">
								<div class="card-body">
									<div class="row ec-vendor-uploads">
                                   
										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">
													<div class="avatar-upload">
														<!--<div class="avatar-edit">-->
														<!--	<input type='file' id="imageUpload<?php echo $product_images[0]->id; ?> " class="ec-image-upload"-->
														<!--		accept=".png, .jpg, .jpeg" name="product_images[]" onchange="checkFileDetails(<?php echo $product_images[0]->id; ?> )"/>-->
							       <!--                    	<label for="imageUpload"><img-->
														<!--			src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"-->
														<!--			class="svg_img header_svg" alt="edit" /></label>-->
														<!--		<p id="fileInfo"></p>	-->
														<!--</div>-->
														
														
														<div class="avatar-edit">
                                            <input type="file" id="imageUpload<?php echo $product_images[0]->id; ?>" class="ec-image-upload" accept=".png, .jpg, .jpeg" name="product_images[]" onchange="checkFileDetails(<?php echo $product_images[0]->id; ?>)" />
                                           <label for="imageUpload<?php echo $product_images[0]->id; ?>"><img src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
                                                            <p id="fileInfo"></p>
                                       </div>

														
														
														<div class="avatar-preview ec-preview">
															<div class="imagePreview ec-div-preview">
															    <?php if(isset($product_images[0]->image)){ ?>
															       <input class="form-control" type="hidden" id="image_id1" name="image_id[]"  value="<?php echo $product_images[0]->id;?>" >
																<img class="ec-image-preview"
																	src="<?php echo base_url(); ?>assets/uploads/products_images/<?php echo $product_images[0]->image; ?> " 
																	alt="edit" onclick="showImagePopup(this.src)"/>
																	<?php } else{  ?>
															       <input class="form-control" type="hidden" id="image_id1" name="image_id[]" value="0">
																	<img class="ec-image-preview"
																	src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-preview.jpg"
																	alt="edit" onclick="showImagePopup(this.src)"/>
																	<?php } ?>
															</div>
														</div>
													</div>
											<div class="thumb-upload-set colo-md-12">
											 <?php 
										if(isset($product_images[1]->image)){ ?>
											      <div class="thumb-upload">
                                         <div class="thumb-edit">
                                        <input type="file" id="imageUpload<?php echo $product_images[1]->id; ?>" class="ec-image-upload" accept=".png, .jpg, .jpeg" name="product_images[]" onchange="checkDetails(<?php echo $product_images[1]->id; ?>)" />
                                        <!--<input type="text" name="product_images[]" value="?php echo $image->id?>"/>-->
                                        <label for="imageUpload<?php echo $product_images[1]->id; ?>">
                                            <img src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
                                        </label>
                                        <p id="fileInfo" ></p>
                                    </div>

                                            <div class="thumb-preview ec-preview">
                                              <div class="image-thumb-preview">
                                                  <input class="form-control" type="text" id="image_id2" name="image_id[]" value="<?php echo $product_images[1]->id; ?>">
                                                <img class="image-thumb-preview ec-image-preview" src="<?php echo base_url(); ?>assets/uploads/products_images/<?php echo $product_images[1]->image; ?>" alt="preview"  onclick="showImagePopup(this.src)"/>
                                              </div>
                                            </div>
                                         </div>
                                              
                                       <?php } else{ ?>
                                        <div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload01"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
															       <input class="form-control" type="hidden" id="image_id1" name="image_id[]" value="0">
																	<img class="image-thumb-preview ec-image-preview"
																		src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
												<?php } ?>
                                       <?php  if(isset($product_images[2]->image)){ ?>
											       <div class="thumb-upload">
                                                 <div class="thumb-edit">
                                        <input type="file" id="imgUpload<?php echo $product_images[2]->id; ?>" class="ec-image-upload" accept=".png, .jpg, .jpeg" name="product_images[]" onchange="checkFileDetails(<?php echo $product_images[2]->id; ?>)" />
                                        <!--<input type="text" name="product_images[]" value="?php echo $image->id?>"/>-->
                                        <label for="imageUpload<?php echo $product_images[2]->id; ?>">
                                            <img src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
                                        </label>
                                        <p id="fileInfo" ></p>
                                    </div>

                                            <div class="thumb-preview ec-preview">
                                              <div class="image-thumb-preview">
                                              <input class="form-control" type="text" id="image_id2" name="image_id[]" value="<?php echo $product_images[2]->id; ?>">
                                                <img class="image-thumb-preview ec-image-preview" src="<?php echo base_url(); ?>assets/uploads/products_images/<?php echo $product_images[2]->image; ?>" name="product_image" alt="preview" onclick="showImagePopup(this.src)"/>
                                              </div>
                                            </div>
                                         </div>
                                        <?php } else{ ?>
                                        <div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload01"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
															       <input class="form-control" type="hidden" id="image_id1" name="image_id[]" value="0">
																	<img class="image-thumb-preview ec-image-preview"
																		src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
												<?php } ?>
                                        <?php  if(isset($product_images[3]->image)){ ?>
											       <div class="thumb-upload">
                                           <div class="thumb-edit">
                                        <input type="file" id="imageUpload<?php echo $product_images[3]->id; ?>" class="ec-image-upload" accept=".png, .jpg, .jpeg" name="product_images[]" onchange="checkFileDetails(<?php echo $product_images[3]->id; ?>)" />
                                        <!--<input type="text" name="product_images[]" value="?php echo $image->id?>"/>-->
                                        <label for="imageUpload<?php echo $product_images[3]->id; ?>">
                                            <img src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
                                        </label>
                                        <p id="fileInfo" ></p>
                                    </div>
                                            <div class="thumb-preview ec-preview">
                                              <div class="image-thumb-preview">
                                                  <input class="form-control" type="text" id="image_id4" name="image_id[]" value="<?php echo $product_images[3]->id; ?>">
                                                <img class="image-thumb-preview ec-image-preview" src="<?php echo base_url(); ?>assets/uploads/products_images/<?php echo $product_images[3]->image; ?>" name="product_image"alt="preview" onclick="showImagePopup(this.src)"/>
                                              </div>
                                            </div>
                                         </div>
                                        <?php } else{ ?>
                                        <div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload01"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
															       <input class="form-control" type="hidden" id="image_id1" name="image_id[]" value="0">
																	<img class="image-thumb-preview ec-image-preview"
																		src="<?php echo base_url(); ?>admin_assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
												<?php } ?>
                                            
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8 row g-3">
											<div class="ec-vendor-upload-detail">
                                                <div class="row">
												                   <div class="col-md-6 mb-3">
                                              <label for="inputEmail4" class="form-label">Product name</label>
                                              <input type="text" class="form-control slug-title" id="updated_product_name" name="updated_product_name" value=" <?php if (isset($products['product_name'])) { echo $products['product_name'];} else {echo "No product name available";} ?>">
                                               <input type="hidden" class="form-control slug-title" id="updated_product_id" name="updated_product_id" value=" <?php if (isset($products['id'])) { echo $products['id'];} else {echo "No product name available";} ?>">
                                               
                                                
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                  <label class="form-label">Category</label>
                                                  <select name="updated_category" id="updated_category" class="form-select" required style="border-radius:15px">
                                                    <option value="">Select Category</option>
                                                    <?php foreach ($categories as $category): ?>
                                                      <option value="<?php echo $category->id; ?>" <?php echo ($products['category_id'] == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                              <label for="inputEmail4" class="form-label">Price</label>
                                              <input type="text" class="form-control slug-title" id="updated_price" name="updated_price" value=" <?php if (isset($products['price'])) { echo $products['price'];} else {echo "No product prcce available";} ?>">
                                               
                                                
                                            </div>
                                            <div class="col-md-6 mb-3">
                                              <label for="inputEmail4" class="form-label">Quantity</label>
                                              <input type="text" class="form-control slug-title" id="updated_product_quantity" name="updated_product_quantity" value=" <?php if (isset($products['quantity'])) { echo $products['quantity'];} else {echo "0";} ?>">
                                              
                                               
                                                
                                            </div>  
    											<div class="col-md-12 mb-3">
    														<label class="form-label">Sort Description</label>
    														<textarea class="form-control" rows="2" name="updated_full_details" required
    														> <?php if (isset($products['product_description'])) { echo $products['product_description'];} else {echo "No product description available";} ?></textarea>
    											</div>
													<div class="col-md-12 mb-3">
														<label class="form-label">Full Details</label>
			                                	     <textarea name="updated_other_details" id="editor" cols="40" rows="10" class="ckeditor" style="border-radius: 3px; border-color: #eee" required> <?php if (isset($products['other_details'])) { echo $products['other_details'];} else {echo "No Other Details  available";} ?></textarea>



													</div>
													<div class="col-md-12 mb-3">
														<button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
													</div>
                                                        </div>
												<!-- </form> -->
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
					<!--</div>-->
<div id="imagePopup" onclick="closeImagePopup()"></div>
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
				
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        <?php
        
        if ($this->session->flashdata('flashErrorrr')) {
            ?>
                    swal.fire({
                        title: "Error",
                        text: "<?php echo $this->session->flashdata('flashError') ?>",
                        icon: "error",
                        button: "OK",
                    });
            <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('flashSuccesss')) {
            ?>
                    swal.fire({
                        title: "Success",
                        text: "<?php echo $this->session->flashdata('flashSuccesss') ?>",
                        icon: "success",
                        button: "OK",
                    });
            <?php 
        } 
        ?>
    });

		function showImagePopup(imageSrc) {
  var popup = document.getElementById('imagePopup');
  var img = document.createElement('img');
  img.src = imageSrc;
  popup.appendChild(img);
  popup.style.display = 'block';
}

function closeImagePopup() {
  var popup = document.getElementById('imagePopup');
  popup.innerHTML = '';
  popup.style.display = 'none';
}
function getProductImgid(id){
       $('#image_id').val(id);
}

 function checkFileDetails(id) {
  document.getElementById('fileInfo').innerHTML ="";
  var fi = document.getElementById('imageUpload'+id);
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
              swal.fire({
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
</script>
