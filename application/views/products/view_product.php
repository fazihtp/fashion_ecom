<?= $this->load->view('includes/header.php','',TRUE);?>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Girls Top</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Offer Zone</a></li>
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
                            <div class="row">
                                 <?php foreach ($offer_products as $rec): ?>
                                <div class="single-pro-img single-pro-img-no-sidebar">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/1.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/2.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/3.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/4.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/5.png"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="single-nav-thumb">
                                            <div class="single-slide">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/6.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/3.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/2.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/4.png"
                                                    alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="<?php echo base_url();?>assets/images/offer_products/3.png"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title"><?php echo $rec->product_name; ?></h5>
                                        <!--<div class="ec-single-rating-wrap">-->
                                        <!--    <div class="ec-single-rating">-->
                                        <!--        <i class="ecicon eci-star fill"></i>-->
                                        <!--        <i class="ecicon eci-star fill"></i>-->
                                        <!--        <i class="ecicon eci-star fill"></i>-->
                                        <!--        <i class="ecicon eci-star fill"></i>-->
                                        <!--        <i class="ecicon eci-star-o"></i>-->
                                        <!--    </div>-->
                                        <!--    <span class="ec-read-review"><a href="#ec-spt-nav-review">Be the first to-->
                                        <!--            review this product</a></span>-->
                                        <!--</div>-->
                                        <!--<div class="ec-single-desc">Lorem Ipsum is simply dummy text of the printing and-->
                                        <!--    typesetting industry. Lorem Ipsum has been the industry's standard dummy-->
                                        <!--    text ever since the 1990</div>-->

                                        <div class="ec-single-sales">
                                            <div class="ec-single-sales-inner">
                                                <div class="ec-single-sales-title">sales accelerators</div>
                                                <div class="ec-single-sales-visitor">real time <span>24</span> visitor
                                                    right now!</div>
                                                <div class="ec-single-sales-progress">
                                                    <span class="ec-single-progress-desc">Hurry up!left 29 in
                                                        stock</span>
                                                    <span class="ec-single-progressbar"></span>
                                                </div>
                                                <div class="ec-single-sales-countdown">
                                                    <div class="ec-single-countdown"><span
                                                            id="ec-single-countdown"></span></div>
                                                    <div class="ec-single-count-desc">Time is Running Out!</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">As low as</span>
                                                <span class="new-price">₹ <?php echo $rec->price; ?></span>
                                            </div>
                                            <div class="ec-single-stoke">
                                                <span class="ec-single-ps-title">IN STOCK</span>
                                                <span class="ec-single-sku">SKU#: WH12</span>
                                            </div>
                                        </div>
                                        <div class="ec-pro-variation">
                                            <div class="ec-pro-variation-inner ec-pro-variation-size">
                                                <span>SIZE</span>
                                                <div class="ec-pro-variation-content">
                                                    <ul>
                                                        <li class="active"><span>7</span></li>
                                                        <li><span>8</span></li>
                                                        <li><span>9</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="ec-pro-variation-inner ec-pro-variation-color">
                                                <span>Color</span>
                                                <div class="ec-pro-variation-content">
                                                    <ul>
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
                                            </div>
                                        </div>
                                        <div class="ec-single-qty">
                                            <div class="qty-plus-minus">
                                                <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                            </div>
                                            <div class="ec-single-cart ">
                                                <button class="btn btn-primary">Add To Cart</button>
                                            </div>
                                            <div class="ec-single-wishlist">
                                                <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                            </div>
                                            <div class="ec-single-quickview">
                                                <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                            </div>
                                        </div>
                                        <!--<div class="ec-single-social">-->
                                        <!--    <ul class="mb-0">-->
                                        <!--        <li class="list-inline-item facebook"><a href="#"><i-->
                                        <!--                    class="ecicon eci-facebook"></i></a></li>-->
                                        <!--        <li class="list-inline-item twitter"><a href="#"><i-->
                                        <!--                    class="ecicon eci-twitter"></i></a></li>-->
                                        <!--        <li class="list-inline-item instagram"><a href="#"><i-->
                                        <!--                    class="ecicon eci-instagram"></i></a></li>-->
                                        <!--        <li class="list-inline-item youtube-play"><a href="#"><i-->
                                        <!--                    class="ecicon eci-youtube-play"></i></a></li>-->
                                        <!--        <li class="list-inline-item behance"><a href="#"><i-->
                                        <!--                    class="ecicon eci-behance"></i></a></li>-->
                                        <!--        <li class="list-inline-item whatsapp"><a href="#"><i-->
                                        <!--                    class="ecicon eci-whatsapp"></i></a></li>-->
                                        <!--        <li class="list-inline-item plus"><a href="#"><i-->
                                        <!--                    class="ecicon eci-plus"></i></a></li>-->
                                        <!--    </ul>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                  <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <!--<div class="ec-single-pro-tab">-->
                    <!--    <div class="ec-single-pro-tab-wrapper">-->
                    <!--        <div class="ec-single-pro-tab-nav">-->
                    <!--            <ul class="nav nav-tabs">-->
                    <!--                <li class="nav-item">-->
                    <!--                    <a class="nav-link active" data-bs-toggle="tab"-->
                    <!--                        data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>-->
                    <!--                </li>-->
                    <!--                <li class="nav-item">-->
                    <!--                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"-->
                    <!--                        role="tablist">More Information</a>-->
                    <!--                </li>-->
                                 
                    <!--            </ul>-->
                    <!--        </div>-->
                    <!--        <div class="tab-content  ec-single-pro-tab-content">-->
                    <!--            <div id="ec-spt-nav-details" class="tab-pane fade show active">-->
                    <!--                <div class="ec-single-pro-tab-desc">-->
                    <!--                    <p> KIDS WESTERN DRESS-->
                    <!--                    </p>-->
                    <!--                    <ul>-->
                    <!--                        <li>TOP PATTERN : PRINTED</li>-->
                    <!--                        <li>FABRIC : COTTON</li>-->
                    <!--                        <li>TOP LENGTH : KNEE LENGTH</li>-->
                    <!--                        <li>SLEEVE : SHORT SLEEVE</li>-->
                    <!--                    </ul>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div id="ec-spt-nav-info" class="tab-pane fade">-->
                    <!--                <div class="ec-single-pro-tab-moreinfo">-->
                    <!--                    <ul>-->
                    <!--                        <li><span>Weight</span> 1000 g</li>-->
                    <!--                        <li><span>Dimensions</span> 35 × 30 × 7 cm</li>-->
                    <!--                        <li><span>Color</span> Black, Pink, Red, White</li>-->
                    <!--                    </ul>-->
                    <!--                </div>-->
                    <!--            </div>-->

                              
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- product details description area end -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Single product -->
<?php echo $this->load->view('includes/footer.php','',TRUE);?>