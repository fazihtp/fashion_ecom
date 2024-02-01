<?= $this->load->view('includes/header.php','',TRUE);?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/offer_zone/offer_zone.css" />
    
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/nouislider.css" /> 
    <!-- Product tab Area Start -->
      <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <?php
                            $category_name = $product->category_name;
                            ?>
                                                        
                            <h2 class="ec-breadcrumb-title"><?php echo $category_name; ?></h2>
                        </div>
                        
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
    <section class="section ec-product-tab section-space-p" id="collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Collection</h2>
                        <h2 class="ec-title">Our Top Collection</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center">
                    <ul class="ec-pro-tab-nav nav justify-content-center">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-pro-for-all"></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-men">For-->
                        <!--        Men</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-women">For-->
                        <!--        Women</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-child">For-->
                        <!--        Children</a></li>-->
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <div class="row">
               
                
                  
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st Product tab start -->
                        <div class="tab-pane fade show active" id="tab-pro-for-all">
                            <div class="row">
                               <?php foreach ($offer_products as $rec): ?>
                                <!-- Product Content -->
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content"
                                    data-animation="fadeIn">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                
                                                <a href="<?php echo base_url() . 'Offer_zone/show_offer_product/' . $rec->id; ?>">
                                                    <img class="main-image" src="<?php echo base_url('assets/uploads/offerzone_products') .'/'. $rec->image; ?>" alt="" />
                                                        
                                                  
                                                </a>
                                                <span class="percentage">20%</span>
                                                <a href="<?php echo base_url() . 'Offer_zone/show_offer_product/' . $rec->id; ?>" class="quickview" data-link-action="quickview"
                                                    title="Quick view" 
                                                    data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                <div class="ec-pro-actions">
                                                    <a href="<?php echo base_url();?>Offer_cart" class="ec-btn-group compare"
                                                        title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                        <form method="post" action="<?php echo base_url();?>Offer_cart/addCart">
                                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $rec->id?>">
                                                        <input type="hidden" name="quantity" id="quantity" value="1">
                                                    <button type="submit" title="Add To Cart" class="add-to-cart"><i
                                                            class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                                        </form>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><i
                                                            class="fi-rr-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="<?php echo base_url() . 'Offer_zone/show_offer_product/' . $rec->id; ?>"><?php echo $rec->product_name; ?></a></h5>
                                            <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star"></i>
                                            </div>
                                            <span class="ec-price">
                                                <span class="new-price">₹ <?php echo $rec->price; ?></span>
                                            </span>
                                            <div class="ec-pro-option">
                                                
                                                    <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt">
                                                       <?php $colors = get_offer_zone_colours($rec->id); ?>
                                                        <?php foreach ($colors as $color) { 
                                                       $style=$color->colour_code;
                                                       ?>
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:<?php echo $style ?>"></span></a></li>
                                                          <?php } ?>
                                                    </ul>
                                                </div>
                                        
                                                <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <!--</?php $colours = get_available_sizes($rec->id); ?>-->
                                                         <?php $available_size=get_offerzone_sizes($rec->id);  foreach ($available_size as $res){ ?>
                                                        <li class="active"><a href="#" class="ec-opt-sz" data-tooltip="<?php echo $res->size ?>"><?php echo $res->size ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
                             </div>
                        </div>
                        <!-- ec 1st Product tab end -->
                        
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- ec Product tab Area End -->


<?php echo $this->load->view('includes/footer.php','',TRUE);?>
 <script src="<?php echo base_url();?>assets/js/plugins/nouislider.js"></script> 