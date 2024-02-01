<?php echo $this->load->view('includes/header.php','',TRUE);?>
<style>
#color_code {
    background: transparent;
    border: none;
    width: 34px !important;
    height: 100% !important;
    margin: 0;
}

.inline-list {
  display: inline-flex;
  list-style: none;
  padding: 0;
  margin: 0;
}

.inline-list .inline-item {
  display: inline-block;
  margin-right: 10px;
}
.horizontal-colors {
  display: flex;
  list-style: none;
  align-items: center;
  padding: 0;
  margin: 0;
}


.horizontal-colors li {
  margin-right: 10px;
  
}
.horizontal-colors label {
  margin-right: 10px;
}

@media only screen and (max-width: 575px) {
	.ec-product-tab {
		.tab-pane {
			> .row {
				justify-content: center;
			}
		}
	}
	.col-lg-3.ec-product-content,
	.col-lg-4.ec-product-content {
		max-width: 342px !important; 
		margin: 0 auto !important;
		flex: 0 0 auto !important;
        width: 50% !important;
        padding: 10px !important ;
	}
		.ec-pro-color{
        	    display:none !important;
        	}
        	#eyeicon{
        	  display:none !important;  
        	}
         .ec-pro-image{
            border:none !important;
        }
        .ec-product-inner {
    	border: 1px solid $border-color-1;
    	padding: 0;
    	border-radius: 15px;
        }
        .ec-price{
        margin-bottom: 4px;
         padding-left: 10px;
        }
       .ec-pro-title{
            font-size: 20px;
            margin: 0 0 7px;
            padding-left: 10px;
       }
       .ec-pro-option{
           padding-left: 10px;
           margin-bottom: 6px;
       }
	.ec-product-inner {
		.ec-pro-image {
			.ec-pro-actions {
				justify-content: center;
		
			}
		}
	}
}
    </style>
    
    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            <div class="ec-cart-top">
                <div class="ec-cart-title">
                    <span class="cart_title">My Cart</span>
                    <button class="ec-close">×</button>
                </div>
                <ul class="eccart-pro-items">
                  
                </ul>
            </div>
            <div class="ec-cart-bottom">
                <div class="cart_btn">
                    <a href="<?php echo base_url();?>Cart" class="btn btn-primary">View Cart</a>
                    <!--<a href="checkout.html" class="btn btn-secondary">Checkout</a>-->
                </div>
            </div>
        </div>
    </div>
    <!-- ekka Cart End -->


    <!-- Main Slider Start -->
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
            <?php foreach ($banner as $bn): ?>
    <div class="ec-slide-item swiper-slide d-flex ec-slide-<?php echo $bn->id; ?>" style="background-image: url(<?php echo base_url();?>assets/uploads/banner_image/<?php echo $bn->image; ?>);">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                    <div class="ec-slide-content slider-animation">
                        <h1 class="ec-slide-title"><?php echo $bn->heading; ?></h1>
                        <h2 class="ec-slide-stitle"><?php echo $bn->sub_heading; ?></h2>
                        <p><?php echo $bn->shot_description; ?></p>
                        <a href="#" class="btn btn-lg btn-secondary"><?php echo $bn->shop_link; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Product tab Area Start -->
    <section class="section ec-product-tab section-space-p" id="collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">New Arrivals</h2>
                        <h2 class="ec-title">New Arrivals</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center">
                    <ul class="ec-pro-tab-nav nav justify-content-center">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" onclick="for_all()" href="#for_all">For
                                All</a></li>
                                    <?php
                                foreach ($categories as $rec):
                                ?>
                            <li  class="nav-item">
                <a class="nav-link" onclick="getCatId(<?php echo $rec->id;?>)" data-bs-toggle="tab"><?php echo $rec->name; ?></a> 
                           </li>
                                <?php endforeach; ?>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st Product tab start -->
                        
                        <div class="tab-pane fade show active"  id="for_all">
                            <div class="row">
                                <!-- Product Content -->
                               
                                 <?php foreach ($product as $products): ?>
                       
                         <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6   ec-product-content"  >
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image" style="border:none">
                     

                                                <a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" ><img class="main-image" src="<?php echo base_url('assets/uploads/products_images') .'/'. $products->image; ?>" alt="" />
                                                </a>
                                                <!--<a href="<php echo base_url();?>Category/view_products/<hp echo base64_encode($products->id) ?>" class="quickview" data-link-action="quickview"-->
                                                <!--    title="Quick view"><i class="fi-rr-eye"></i></a>-->
                                                <!--    <div class="ec-pro-actions">-->
                                                
                                                <!--        <form method="post" action="?php echo base_url();?>Cart/addToCart">-->
                                                <!--        <input type="hidden" name="product_id" id="product_id" value="<php echo $products->id?>">-->
                                                <!--        <input type="hidden" name="quantity" id="quantity" value="1">-->
                                                <!--        </form>-->
                                                <!--</div>-->
                                                </div>
                                        </div>

                                        <div class="ec-pro-content">
                                        <h5 class="ec-pro-title">
    <a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>">
        <?php echo ucwords($products->product_name) ?>
    </a>
</h5>

                          		<span class="ec-price">
                                            
                                                
                                               <span  class="old-price"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>">₹<?php echo $products->price ?></a></span>
                                                <span class="new-price"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>">₹<?php echo $products->price?> </a></span>
                                            </span>
                                            <div class="ec-pro-size">
                                                     <ul class="ec-opt-size">
                                                        
                                                        <li class="active"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" class="ec-opt-sz" data-tooltip="<?php echo $products->quantity ." LEFT"?>"><?php echo $products->quantity ." LEFT" ?></a></li>
                                                       
                                                     </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                               
                                  <?php endforeach; ?>
                                <div class="col-sm-12 d-flex justify-content-center">
    <a href="<?php echo base_url(); ?>Category/product_view/Mg==" title="Shop All Collection" class="btn btn-primary" style="width: 10%;    min-width: 111px;">Shop All Collection</a>
</div>

                       
                            </div>
                            </div>
                             <div class="tab-pane fade" id="product_data">
                                  <div  id="product_data1">
                                   
                                </div>
                             
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section ec-services-section section-space-p" id="services">
        <h2 class="d-none">Services</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-truck-moving"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>Secure Shipping</h2>
                            <p> Ensure a secure and speedy delivery on your product with minimal shipping charge</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-hand-holding-seeding"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>24X7 Support</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-badge-percent"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>Huge Collection</h2>
                            <p>We offer wide verity of dress collection, with user friendly shopping cart</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-donate"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>Payment Secure</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services Section End -->

    <!--  offer Section Start -->
    <section class="section ec-offer-section section-space-p section-space-m" style="background-image: url(https://maraviyainfotech.com/projects/ekka/ekka-v37/ekka-html/assets/images/offer-image/offer_bg.jpg);">
        <h2 class="d-none">Offer</h2>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center ec-offer-content">
                    <h2 class="ec-offer-title">The Destiny</h2>
                    <h3 class="ec-offer-stitle" data-animation="slideInDown">Of Your Fashion</h3>
                    <span class="ec-offer-img" data-animation="zoomIn"><img src="https://maraviyainfotech.com/projects/ekka/ekka-v37/ekka-html/assets/images/offer-image/1.png"
                            alt="offer image" /></span>
                    <span class="ec-offer-desc">Get ready to turn heads with our exclusive offers</span>
                    <a class="btn btn-primary" href="<?php echo base_url();?>Home/offer_zone" data-animation="zoomIn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- offer Section End -->

   <!--show the lastest collection -->
    <section class="section ec-new-product section-space-p" id="arrivals">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Products</h2>
                        <h2 class="ec-title">New Arrivals</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>
            </div>
            <div class="row">
               <?php  foreach($new_product as $products) { ?>
  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6   ec-product-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                           
                                            <div class="ec-pro-image" style="border:none">
                                                     
                                                <a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" >
                                                         <img class="main-image" src="<?php echo base_url('assets/uploads/products_images') .'/'. $products->image; ?>" alt="" />
                                                    <!--<img class="main-image" src="<?php echo base_url('assets/uploads/products_images') .'/'. $products->image; ?>" alt="" />-->
                                                </a>
                                            </div>
                                        </div>

                                        <div class="ec-pro-content">
                                         <h5 class="ec-pro-title"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>"> <?php echo ucwords($products->product_name) ?></a></h5>
                          		<span class="ec-price">
                                              
											 
                                               <span class="old-price">₹<?php echo $products->price ?></span>
                                                <span class="new-price">₹<?php echo $products->price ?>    </span>
                                            </span>
                                            <div class="ec-pro-size">
                                                     <ul class="ec-opt-size">
                                                        
                                                        <li class="active"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" class="ec-opt-sz" data-tooltip="<?php echo $products->quantity ." LEFT"?>"><?php echo $products->quantity ." LEFT" ?></a></li>
                                                       
                                                     </ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
               <div class="col-sm-12 d-flex justify-content-center">
    <a href="<?php echo base_url(); ?>Category/product_view/Mg==" title="Shop All Collection" class="btn btn-primary" style="width: 10%;min-width: 111px;">Shop All Collection</a>
</div>


            </div>
        </div>
    </section>
    <!-- New Product end -->

    <!-- review ofthe client -->
    <section class="section ec-test-section section-space-ptb-100 section-space-m" id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title mb-0">
                        <h2 class="ec-bg-title">Testimonial</h2>
                        <h2 class="ec-title">Client Review</h2>
                        <p class="sub-title mb-3">What say client about us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">
                          <?php foreach ($review as $rev) { ?>
                        <li class="ec-test-item"> 
                            <i class="fi-rr-quote-right top"></i>
                            <div class="ec-test-inner">
                                <div class="ec-test-img">
                                       <img alt="testimonial" title="testimonial" src="<?php echo base_url('assets/uploads/client_image') .'/'. $rev->image; ?>">
                                 </div>
                                 <div class="ec-test-content">
                                        <div class="ec-test-desc"><?php echo $rev->discription ?></div>
                                        <div class="ec-test-name"><?php echo $rev->client_name ?></div>
                                        <!--<div class="ec-test-designation">General Manager</div>-->
                                        <div class="ec-test-rating">
                                            <?php for ($i = 1; $i <= $rev->rating; $i++) { ?>
                                                <i class="ecicon eci-star fill"></i>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </div>
                             <i class="fi-rr-quote-right bottom"></i>
                         </li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
<?php echo $this->load->view('includes/footer.php','',TRUE);?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function getCatId(id) {
    $('#product_data').addClass('show active');
    $('#for_all').removeClass('show active');
    $('#product_data').css('display','block');
    $.post("<?= base_url() ?>Home/category", { id: id })
    .done(function(result) {
        $('#product_data1').html(result);
    });
}

function for_all(){
    $('#for_all').show();
   $('#product_data').hide();
}
</script>