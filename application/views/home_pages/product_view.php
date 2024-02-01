<?= $this->load->view('includes/header.php','',TRUE);?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>-->
<!-- Ec breadcrumb start -->
<style>
    @media (max-width: 768px) {
        #hover-image-mobile {
            display: none !important;
        }
        li.size_li.active {
            background-color: #f28d9f !important;
        }
    }

    @media (min-width: 769px) {
        #hover-image {
            display: block !important;
        }
      
        li.size_li.active {
            background-color: #f28d9f !important;
        }
    }
</style>

<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row ec_breadcrumb_inner">
					<div class="col-md-6 col-sm-12">
						<h2 class="ec-breadcrumb-title"><?php echo $products->category_name?></h2>
					</div>
					<div class="col-md-6 col-sm-12">
						<!-- ec-breadcrumb-list start -->
						<ul class="ec-breadcrumb-list">
							<li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="ec-breadcrumb-item active">Products</li>
						</ul>
						<!-- ec-breadcrumb-list end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Ec breadcrumb end -->
<!-- Sart Single product -->
<section class="ec-page-content section-space-p">
	<div class="container">
		<div class="row">
			<div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">
				<!-- Single product content Start -->
				<div class="single-pro-block">
					<div class="single-pro-inner">
					    	<?php   if ($this->session->flashdata('flashQuantity')) { ?>
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                      <strong>Sorry!</strong> Selected Quantity is out of stock.
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <?php } ?>
						<div class="row">
							<div class="single-pro-img single-pro-img-no-sidebar">
								<div class="single-product-scroll">
									<a class="ec-360-lbl" data-link-action="quickview" title="360 view" data-bs-toggle="modal" data-bs-target="#ec_360_view_modal">
										<img src="<?php echo base_url();?>assets/images/icons/360-degrees.png" alt="view image">
									</a>
									<div class="single-product-cover"  >
									    <?php foreach ($images as $rec) { ?>
											<div class="single-slide" id="main_img">
												<img  id="product_images"  class="img-responsive" src="<?php echo base_url();?>assets/uploads/products_images/<?= $rec->image ?>"
													 alt="">
											</div>
										<?php } ?>
									</div>
									<div class="single-nav-thumb">
										<?php foreach ($images as $rec) { ?>
											<div class="single-slide">
												<img  class="img-responsive"  src="<?= base_url('assets/uploads/products_images/' . $rec->image) ?>"
                                                     alt="" >
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="single-pro-desc single-pro-desc-no-sidebar">
								<div class="single-pro-content">
									<h5 class="ec-single-title"><?php echo $products->product_name ?></h5>
									<div class="ec-single-desc"><?php echo $products->product_description ?></div>
									<div class="ec-single-price-stoke">
										<div class="ec-single-price">
											<div class="ec-single-sales-progress">
											<span class="ec-single-progress-desc" style="color: darkolivegreen; font-weight: bold" id="in_stock">
													<span class="ec-single-progress-desc"  id="out_stock1" style="color: red; font-weight: bold">
                                                    </span>
                                                    
                                                    
                                                   
                                                
													<?php if ($products->quantity <= 0): ?>
													<span class="ec-single-progress-desc" style="color: red; font-weight: bold">Sorry, Sold Out</span>
													<?php else: ?>
														<span class="ec-single-progress-desc" style="color: green; font-weight: bold" id="in_stock">Hurry Up <?php echo $products->quantity ?> Left In Stock</span>
													<?php endif; ?>


											</div>
											<div>
											
											</div>
    											<span class="new-price" id="price">₹<?php echo $products->price?></span>
										</div>
										<div class="ec-single-stoke">
											<!--<span class="ec-single-ps-title">IN STOCK</span>-->
										</div>
									</div>
								
									<form method="post" action="<?php echo base_url();?>Cart/addToCart" id="productForm" onsubmit="return validateForm()">
									    
										<div class="ec-pro-variation">
										    
											
											
										</div>
										
										 <div class="toast" data-autohide="true" style="background: black;">
                                          <div class="toast-header"style="background: black;">
                                            <strong class="mr-auto"></strong>
                                            <small class="text-muted"></small>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="toast_close()"><span style="color: white" aria-hidden="true">&times;</span></button>
                                          </div>
                                          <div class="toast-body" style="color: white" 	>
                                               <?php if ($product_prize->in_stock > 0) { ?>
                                                    Please select a Size to proceed
                                                <?php } else { ?>
                                                     This product is currently out of stock.
                                                <?php } ?>
                                            <!--Please select a Size and Colour to proceed-->
                                          </div>
                                        </div>

										<div class="ec-single-qty">

											<div class="qty-plus-minus">
												<input class="qty-input" type="text" name="quantity" value="1" />
											</div>
											<div class="ec-single-cart ">

												<input type="hidden" name="product_id" id="product_id" value="<?= $products->id; ?>">
												<button type="submit" title="Add To Cart" class="btn btn-primary" id="cart_btn">
                                                    <i></i> Add To Cart
                                                </button>
													
											</div>
                                        <?php if ($this->session->userdata('quantity_not_available')){ ?>
                                        <div class="alert alert-warning" role="alert">
                                          Sorry! Selected quantity is not available!
                                        </div>
                                        <?php } ?>
                                        </div>
									</form>
									<div class="ec-pro-variation-inner ec-pro-variation-color">
										<span style="color: black; font-weight: bold">Product details</span>
										<div class="ec-single-desc"><?php echo $products->other_details ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>

		</div>
	</div>
</section>
<?php echo $this->load->view('includes/footer.php','',TRUE);?>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>