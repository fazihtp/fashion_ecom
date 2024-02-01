<?= $this->load->view('includes/header.php','',TRUE);?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>-->
<!-- Ec breadcrumb start -->
<style>
    @media (max-width: 768px) {
  #hover-image-mobile {
    display: none!important;
  }
}
@media (min-width: 769px) {
  #hover-image {
    display: block!important;
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
											<div class="single-slide zoom-image-hover" id="main_img">
												<img  id="product_images"  class="img-responsive" src="<?php echo base_url();?>assets/uploads/products_images/<?= $rec->image ?>"
													 alt="">
											</div>
											<!--	<div class="single-slide zoom-image-hover" id="hover-image-mobile">-->
											<!--	<img  id="" role="presentation" src="</?php echo base_url();?>assets/uploads/products_images/</?= $rec->image ?>"-->
											<!--		 alt="">-->
											<!--</div>-->
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
											<span class="ec-single-ps-title">As low as</span>
											<div class="ec-single-sales-progress">
											<?php
												$product_prize=getProductPrize($products->id);
												//											  echo $position;
												if($position  == "1"){
													$discount= $product_prize->price_for_members;
													$price=round($discount);
												}else if ($position  == "2"){
													$discount= $product_prize->price_for_members*2/100;
													$price=round($product_prize->price_for_members-$discount);
												}else if ($position  == "3"){
													$discount= $product_prize->price_for_members*6/100;
													$price=round($product_prize->price_for_members-$discount);
												}else{
													$price=round($product_prize->price_for_non_members);
												}
												?>
												<?php

												if ($product_prize->in_stock > 0) { ?>
												<span class="ec-single-progress-desc" style="color: darkolivegreen; font-weight: bold" id="in_stock">
                                                        Hurry up! Left <?php echo $product_prize->in_stock; ?> in stock

                                                <?php } else { ?>
													<span class="ec-single-progress-desc" style="color: red; font-weight: bold">
                                                        Out of stock
                                                    </span>
												<?php } ?>

											</div>
											<div>
												<?php if ($products->is_offer == "Y") { ?>
													<?php
													// Assuming $expired contains the data retrieved from the database (e.g., using the getExpiredDates() function from the previous question)
													$expiryDateTime = strtotime($expired->expiry_date);
													$currentTime = time();
													if ($expiryDateTime > $currentTime) {
														// Calculate the time remaining
														$remainingTime = $expiryDateTime - $currentTime;
														$days = floor($remainingTime / (60 * 60 * 24));
														$hours = floor(($remainingTime % (60 * 60 * 24)) / (60 * 60));
														$minutes = floor(($remainingTime % (60 * 60)) / 60);
														$seconds = $remainingTime % 60;
														?>
														<div class="ec-single-sales-countdown">
															<div class="ec-single-countdown">
                                                            <span class="timerDisplay label4">
                                                                <span class="displaySection">
                                                                    <span class="numberDisplay"><?php echo $days; ?></span>
                                                                    <span class="periodDisplay">Days</span>
                                                                </span>
                                                                <span class="displaySection">
                                                                    <span class="numberDisplay"><?php echo $hours; ?></span>
                                                                    <span class="periodDisplay">Hours</span>
                                                                </span>
                                                                <span class="displaySection">
                                                                    <span class="numberDisplay"><?php echo $minutes; ?></span>
                                                                    <span class="periodDisplay">Min</span>
                                                                </span>
                                                                <span class="displaySection">
                                                                    <span class="numberDisplay"><?php echo $seconds; ?></span>
                                                                    <span class="periodDisplay">Sec</span>
                                                                </span>
                                                            </span>
															</div>
															<div class="ec-single-count-desc" style="color:red">Time is Running Out!</div>
														</div>
													<?php } else { ?>
														<div class="ec-single-count-desc"style="color:red">Offer expired!</div>
													<?php } ?>
												<?php } ?>
											</div>
											<span class="new-price" id="price">₹<?php echo $price?></span>
										</div>
										<div class="ec-single-stoke">
											<!--<span class="ec-single-ps-title">IN STOCK</span>-->
											<span class="ec-single-sku"><?php echo $products->sku_code?></span>
										</div>
									</div>
								
									<form method="post" action="<?php echo base_url();?>Cart/addToCart" id="productForm" onsubmit="return validateForm()">
										<div class="ec-pro-variation">
											<div class="ec-pro-variation-inner ec-pro-variation-size">
												<span>SIZE</span>
												<div class="ec-pro-variation-content">
													<ul>
														<?php $size = getProductVariantSize($products->id); ?>
														<?php foreach ($size as $rec) { ?>
															<li class="size_li">
																<span class="size" data-id="<?= $rec->size ?>"
																	  id="selectedSizeValue" onclick="getSizeDetails(<?= $rec->id ?>,<?= $position ?>),assignSizeValue(<?=$rec->size?>)"><?php echo $rec->size_name ?></span></li>
															<?php } ?>
													</ul>
												</div>
											</div>
											<div class="ec-pro-variation-inner ec-pro-variation-color">
												<span>Color</span>
												<div class="ec-pro-variation-content">
													<ul>
														<?php $colors = getProductVariantColour($products->id); ?>
														<?php foreach ($colors as $rec) { ?>
															<li class="colour_li"><span class="color" data-id="<?=
																$rec->colour ?>"  id="selectedColourValue"
																						style="background-color:<?php
																						echo $rec->colour_code ?>;"
																						onclick="getSizeDetails(<?= $rec->id ?>,<?= $position ?>),assignColourValue(<?=$rec->colour?>)"></span></li>
														<?php } ?>
													</ul>
												</div>
											</div>
										</div>
										<input type="hidden" name="spanSize" id="spanSize" required>
										<input type="hidden" name="spanColour" id="spanColour" required>
										
										<!--<input type="hidden" name="spanstock" id="spanColour" required>-->

										 <div class="toast" data-autohide="true" style="background: black;">
                                          <div class="toast-header"style="background: black;">
                                            <strong class="mr-auto"></strong>
                                            <small class="text-muted"></small>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="toast_close()"><span style="color: white" aria-hidden="true">&times;</span></button>
                                          </div>
                                          <div class="toast-body" style="color: white" 	>
                                               <?php if ($product_prize->in_stock > 0) { ?>
                                                    Please select a Size and Colour to proceed
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
												<!--<input type="hidden" name="quantity" id="quantity" value="1">-->
												<!--<button type="submit" title="Add To Cart" class="btn btn-primary" ><i-->
												<!--	></i> Add To Cart</button>-->
												<?php if ($product_prize->in_stock > 0) { ?>
                                                <button type="submit" title="Add To Cart" class="btn btn-primary">
                                                    <i></i> Add To Cart
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" title="Out of Stock" class="btn btn-secondary" disabled>
                                                    <i></i> Out of Stock
                                                </button>
                                            <?php } ?>
													
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
<!-- End Single product -->
<!--<div class="toast" id="toastMessage" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">-->
<!--	<div class="toast-header">-->
<!--		<strong class="mr-auto">Notification</strong>-->
<!--		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">-->
<!--			<span aria-hidden="true">&times;</span>-->
<!--		</button>-->
<!--	</div>-->
<!--	<div class="toast-body">-->
<!--		<strong>Error:</strong> Your condition is false!-->
<!--	</div>-->
<!--</div>-->


<?php echo $this->load->view('includes/footer.php','',TRUE);?>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">


function toast_close(){
    $('.toast').toast('hide');
}
// function reloadDivContent() {
//             $('#main_img').load(location.href + ' #main_img');
//         }
        
	function getSizeDetails(variant_id,position){
	    
		$.ajax({
			url: '<?php echo base_url('Category/getProductStock'); ?>',
			type: 'POST',
			data: { variant_id: variant_id },
			dataType: 'json',
			success: function (response) {
				if (response.success) {
					var product_details = response.product_details;
					var price = calculatePrice(position, product_details);
					$('#price').empty();
					$('#price').append('₹' + price);
					var inStock = product_details.in_stock;
					$('#in_stock').empty();

					if (inStock > 0) {
						$('#in_stock').append(' Hurry up! ' + inStock + ' Left in Stock');
					}
				
				var product_images = product_details.product_images;
				            //   $('#product_images').empty("");
                               var fullPath = '<?php echo base_url();?>assets/uploads/products_images/' + product_images;
                                // $('#main_img').html('<img src="' + fullPath + '" alt="New Image">');
                $('#product_images').attr('src', fullPath);
          
				} else {
					alert(response.message);
				}
			},
			error: function () {
				alert('Error occurred. Please try again.');
			}
		});
	}
	
	function calculatePrice(position, productPrice) {
		var price;

		if (position == "1") {
			price = Math.round(productPrice.price_for_members);
		} else if (position == "2") {
			var discount = productPrice.price_for_members * 2 / 100;
			price = Math.round(productPrice.price_for_members - discount);
		} else if (position == "3") {
			var discount = productPrice.price_for_members * 6 / 100;
			price = Math.round(productPrice.price_for_members - discount);
		} else {
			price = Math.round(productPrice.price_for_non_members);
		}

		return price;
	}
function validateForm() {
	var activeSizeElements = $("li.size_li.active");
	var activeColourElements = $("li.colour_li.active");
	if (activeSizeElements.length === 0 || activeColourElements.length === 0) {
		$('.toast').toast('show');
		return false;
	} else {
		return true;
	}
}
function assignColourValue(id) {
	$('#spanColour').val('');
	$('#spanColour').val(id);
}
function assignSizeValue(id) {
	$('#spanSize').val('');
	$('#spanSize').val(id);
}

function addToCart() {
    <?php if ($product_prize->in_stock > 0) { ?>
    var toast = document.getElementById('outOfStockToast');
        // var bsToast = new bootstrap.Toast(toast);
        bsToast.show();
     
    <?php } else { ?>
        var toast = document.getElementById('outOfStockToast');
        // var bsToast = new bootstrap.Toast(toast);
        bsToast.hide();
    <?php } ?>
}

function closeToast() {
    
     $('.outOfStockToast').toast('hide');
    // var toast = document.getElementById('outOfStockToast');
    // var bsToast = bootstrap.Toast.getInstance(toast);
    // bsToast.hide();
}

// function reloadPage() {
//     location.reload(); 
// }
// function changeProductImage(newImageSrc) {
    
    
//     $('#product_images').empty("");
//     var fullPath = '</?php echo base_url();?>assets/uploads/products_images/' + newImageSrc;
//     $('#product_images').attr('src', fullPath);
//     // alert(fullPath);

// }
</script>

