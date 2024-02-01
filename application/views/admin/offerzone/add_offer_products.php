<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<style>
   #color_code {
    background: transparent;
    border: none;
    width: 42px !important;
    height: 100% !important;
    margin: 0;
}
.form-check.form-check-inline {
    font-size: x-large;
}
select#Categories {
    border-radius: 15px;
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
							<h1>Add Offer Products</h1>
							<p class="breadcrumbs"><span><a href="index.html">Offerzone</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Add Product</p>
						</div>
						<div>
							<a href="<?php echo base_url('Admin/offer_products_list'); ?>" class="btn btn-primary" class="btn btn-primary"> View All
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Add Product</h2>
								</div>
                                <form class="row g-3" id="category-form" action="<?php echo base_url(); ?>Admin/post_offer_products" method="post" enctype="multipart/form-data">
								<div class="card-body">
									<div class="row ec-vendor-uploads">
                                   
										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' id="imageUpload" class="ec-image-upload" onchange="checkFileDetails()"
																accept=".png, .jpg, .jpeg" name="product_images[]"/>
															<label for="imageUpload"><img
																	src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																	class="svg_img header_svg" alt="edit" /></label>
																	<p id="fileInfo"></p>
														</div>
														<div class="avatar-preview ec-preview">
															<div class="imagePreview ec-div-preview">
																<img class="ec-image-preview"
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
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
																			<p id="fileInfo"></p> 
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
																<input type='file' id="imageUpload"
																	class="ec-image-upload" onchange="checkFileDetails()"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
																			<p id="fileInfo"></p> 
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
																<input type='file' id="imageUpload"
																	class="ec-image-upload" onchange="checkFileDetails()"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
																			<p id="fileInfo"></p> 
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
                                            <!-- <form class="" id="category-form" action="<?php echo base_url(); ?>Admin/post_offer_products" method="post" enctype="multipart/form-data"> -->
													<div class="row g-3 col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Product name</label>
														<input type="text" class="form-control slug-title" id="inputEmail4" name="product_name" required>
													</div>
													<div class="col-md-6 mb-3">
														<label class="form-label">Select Categories</label>
														<select name="sub_cat" id="sub_cat" class="form-select" >
                                                            <option value="">Select Category</option>
                                                        <?php foreach ($categories as $categories): ?>
                                                                <option value="<?php echo $categories->id; ?>"><?php echo $categories->sub_category_name; ?></option>
                                                            <?php endforeach; ?>
														</select>
													</div>
													<!-- <div class="col-md-12 mb-3">
														<label for="slug" class="col-12 col-form-label">Slug</label> 
														<div class="col-12 mb-3">
															<input id="slug" name="full_details" class="form-control here set-slug" type="text" required>
														</div>
													</div> -->
													<div class="col-md-12 mb-3">
														<label class="form-label">Sort Description</label>
														<textarea class="form-control" rows="2" name="description" required></textarea>
													</div>
													
													<div class="col-lg-12 mt-2 mb-2">
													       <br>
													 <button type="button" class="btn btn-success add-button" style="float: right;" id="add-button"><i class="fas fa-plus-circle"></i>&nbsp;Add</button>
													    </div>
                                                    <div class="appending_div">
													<div class="row mb-3">
													    <div class="col-lg-2">
													        <label class="form-label"> size </label> 
													        <select class="form-select" id="size" name="size[]" required>
													            <option>Select Size</option>
													            <?php foreach($size as $siz): ?>
													               <option value="<?php echo $siz->id; ?>"><?php echo $siz->size; ?></option>
													               <?php endforeach; ?>
													        </select>
													    </div>
													   	 <div class="col-lg-2">
													        <label class="form-label"> colour </label> 
													        <select class="form-select" id="colour" name="colour[]"required>
													            <option>Select Colour</option>
													            <?php foreach($colours as $color):  ?>
													                <option value="<?php echo $color->id; ?>"><?php echo $color->colors; ?></option>
													                 <?php endforeach; ?>
													        </select>
													    </div>
													     <div class="col-lg-2">
													        <label class="form-label"> Qty </label> 
													         <input type="number" class="form-control" id="qty" name="qty[]" required>
													    </div>
													     <div class="col-lg-2">
													   <label class="form-label">price non member</label> 
											            <input type="number" class="form-control" id="price" id="price_for_non_members" name="price_for_non_members[]" required>
													     </div>
													     <div class="col-lg-2">
													   <label class="form-label">price members</label> 
											            <input type="number" class="form-control" id="price" id="price_for_members" name="price_for_members[]" required>
													     </div>
													     	 <div class="col-lg-2"> 
    													   <div class="ec-vendor-img-upload" id="ImageS">
    											          	<div class="ec-vendor-main-img">
    												
    													<div class="thumb-upload-set colo-md-12">
    												
    														<div class="thumb-upload">
    															<div class="thumb-edit">
    																<input type='file' id="varientUpload" onchange="checkimageDetails()"
    																	class="ec-image-upload"
    																	accept=".png, .jpg, .jpeg"  name="offer_images[]"/ required>
    																	 
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
												
													</div>
													  </div>
                                                  <div class="col-md-12 mb-3">
														<label class="form-label">Ful Detail</label>
														
															<textarea name="other_details" id="editor" cols="40" rows="10" class="ckeditor" style="border-radius: 3px; border-color: #eee" required></textarea>
														<!--<textarea class="form-control" rows="4"  name="other_details" required></textarea>-->
													</div>
                                                    <div class="col-md-6 mb-3">
														<label class="form-label">Expiring At</label>
														<input type="datetime-local" class="form-control" id="expiring_time" name="expiring_time" required>
													</div>
													<div class="col-md-6 mb-3">
														<label class="form-label">SKU code</label>
														<input type="text" class="form-control" id="group_tag"
															name="skucode" value="" placeholder=""
															data-role="tagsinput"  required />
													</div>
													<div class="col-md-12 mb-3">
														<button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
													</div>
                                                      
												<!-- </form> -->
											</div>
										</div>
                                                        
									</div>
								</div>
                                
							</div>
							</form>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  
 $(document).ready(function() {
    $('#customerTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Admin/getofferProductList',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
}); 
  
  
 function checkFileDetails() {
  document.getElementById('fileInfo').innerHTML = "";
  var fi = document.querySelector('.ec-image-upload'); // Use querySelector('.ec-image-upload')
  var button = document.getElementById('submit-btn');
  if (fi.files.length > 0) {
    for (var i = 0; i <= fi.files.length - 1; i++) {
      var fileName, fileExtension, fileSize, fileType, dateModified;
      fileName = fi.files.item(i).name;
      fileExtension = fileName.replace(/^.*\./, '');
      readImageFile(fi.files.item(i));
    }
  }

  function readImageFile(file) {
    var reader = new FileReader();
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

        if (width === 765 && height === 850) {
          button.removeAttribute('disabled');
        } else {
          swal({
            title: "Oops!",
            text: "Image must be size of 765 x 850!",
            icon: "error",
            button: "OK",
          });
          $('#fileInfo').empty();
          $('#imageUpload').empty();
          button.setAttribute('disabled', 'disabled');
        }
      };
    };
    reader.readAsDataURL(file);
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
            button.setAttribute('disabled', 'disabled'); // Disable the button
            
          }
        };
      };
      reader.readAsDataURL(file);
    }
  }
}

var i = 2;
    $(document).on('click', '#add-button', function() {
        var field = `<br>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <label class="form-label">Size</label>
                    <select class="form-select" id="size_${i}" name="size[]" required>
                        <option>Select Size</option>`;
                        <?php   $size=getsize();
                        foreach ($size as $siz): ?>
                            field += `<option value="<?php echo $siz['id']; ?>"><?php echo $siz['size']; ?></option>`;
                        <?php endforeach; ?>
                    field += `</select>
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Colour</label>
                    <select class="form-select" id="colour_${i}" name="colour[]" required>
                        <option>Select Colour</option>
                        <?php $colours= getColours();
                        foreach ($colours as $color): ?>
                            <option value="<?php echo $color['id']; ?>"><?php echo $color['colors']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Qty</label>
                    <input type="number" class="form-control" id="qty_${i}" name="qty[]" required>
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Price non-member</label>
                    <input type="number" class="form-control" id="price_${i}_non_member" name="price_for_non_members[]" required>
                </div>
                <div class="col-lg-2">
                    <label class="form-label">Price members</label>
                    <input type="number" class="form-control" id="price_${i}_members" name="price_for_members[]" required>
                </div>
            
	 
		    	 <div class="col-lg-2"> 
        				   <div class="ec-vendor-img-upload" id="ImageS">
        		          	<div class="ec-vendor-main-img">
        			
        				<div class="thumb-upload-set colo-md-12">
        			
        					<div class="thumb-upload">
        						<div class="thumb-edit">
        							<input type='file' id="varientUpload" onchange="checkimageDetails()"
        								class="ec-image-upload"
        								accept=".png, .jpg, .jpeg"  name="offer_images[]"/ required>
        								 
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
            </div>`;
            
        $('.appending_div').append(field);
        i++;
    });

</script>
