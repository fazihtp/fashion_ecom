<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<style>
   #color_code {
  width: 42px !important;
  height: 100% !important;
  margin: 0;
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
							<a href="product-list.html" class="btn btn-primary"> View All
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
															<input type='file' id="imageUpload" class="ec-image-upload"
																accept=".png, .jpg, .jpeg" name="product_images[]"/>
															<label for="imageUpload"><img
																	src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																	class="svg_img header_svg" alt="edit" /></label>
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
																<input type='file' id="thumbUpload01"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
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
																<input type='file' id="thumbUpload02"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
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
																<input type='file' id="thumbUpload03"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
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
																<input type='file' id="thumbUpload04"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
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
																<input type='file' id="thumbUpload05"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
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
																<input type='file' id="thumbUpload06"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg"  name="product_images[]"/>
																<label for="imageUpload"><img
																		src="<?php echo base_url(); ?>admin_assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
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
														<select name="categories" id="Categories" class="form-select" required>
                                                            <option value="">Select Category</option>
                                                        <?php foreach ($categories as $categories): ?>
                                                                <option value="<?php echo $categories->id; ?>"><?php echo $categories->category_name; ?></option>
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
														<textarea class="form-control" rows="2" name="full_details" required></textarea>
													</div>
                                                    <div class="col-md-8 mb-25">
														<label class="form-label">Colours</label>
														<div class="form-checkbox-box">
                                                        <?php foreach ($colours as $colours): ?>
                                                            <div class="form-check form-check-inline">
																<input type="checkbox" name="colour[]" value="<?php echo $colours->id; ?>">
																<label><input type="color" class="form-control form-control-color"
															id="color_code" value="<?php echo $colours->colour_code; ?>"
															title="Choose your color" disabled>
															</div>
															<?php endforeach; ?>
														</div>
													</div>
                                                    
                                                    <div class="col-md-8 mb-25">
														<label class="form-label">Size</label>
														<div class="form-checkbox-box">
                                                        <?php foreach ($size as $size): ?>
                                                            <div class="form-check form-check-inline">
																<input type="checkbox" name="size[]" value="<?php echo $size->id; ?>">
																<label><?php echo $size->size; ?></label>
															</div>
															<?php endforeach; ?>
														</div>
													</div>
													<div class="col-md-6 mb-3">
														<label class="form-label">Price <span>( In INR
																)</span></label>
														<input type="number" class="form-control" id="prize" name="prize" required>
													</div>
													<div class="col-md-6 mb-3">
														<label class="form-label">Quantity</label>
														<input type="number" class="form-control" id="quantity" name="quantity" required>
													</div>
													<div class="col-md-12 mb-3">
														<label class="form-label">Ful Detail</label>
														<textarea class="form-control" rows="4"  name="other_details" required></textarea>
													</div>
                                                    <div class="col-md-6 mb-3">
														<label class="form-label">Expiring At</label>
														<input type="datetime-local" class="form-control" id="expiring_time" name="expiring_time" required>
													</div>
													<div class="col-md-6 mb-3">
														<label class="form-label">Product Tags</label>
														<input type="text" class="form-control" id="group_tag"
															name="group_tag" value="" placeholder=""
															data-role="tagsinput" />
													</div>
													<div class="col-md-12 mb-3">
														<button type="submit" class="btn btn-primary">Submit</button>
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
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>
