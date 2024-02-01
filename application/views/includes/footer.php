<style>
    .footer-bottom {
    background: pink;
}
</style>
    <!-- Footer Start -->
    <footer class="ec-footer section-space-mt">
        <div class="footer-container">
            <div class="footer-top section-space-footer-p">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 ec-footer-contact">
                            <div class="ec-footer-widget">
                                <div class="ec-footer-logo"><a href="#"><img src="<?php echo base_url(); ?>assets/images/logo/footer-logo.png"
                                            alt=""><img class="dark-footer-logo" src="<?php echo base_url(); ?>assets/images/logo/footer-logo.png"
                                            alt="Site Logo" style="display: none;" /></a></div>
                                <h4 class="ec-footer-heading">Contact us</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">Gandhi Road .</li>
                                        <li class="ec-footer-link"><span>Call Us:</span><a href="tel:+76896879798">+01
                                              999 5976 3402 </a></li>
                                        <li class="ec-footer-link"><span>Email:</span><a
                                                href="<?php echo base_url();?>Home/contact_us">sales@korean.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-info">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Information</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="<?php echo base_url(); ?>Home/about_us">About us</a></li>
                                        <li class="ec-footer-link"><a href="<?php echo base_url(); ?>Home/contact_us">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-account">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Account</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="<?php echo base_url();?>User/dashboard">My Account</a></li>
                                        <li class="ec-footer-link"><a href="<?php echo base_url();?>Cart">Cart</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-service">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Services</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="<?php echo base_url();?>Home/view_policy">Policy & policy </a>
                                        </li>
                                        <li class="ec-footer-link"><a href="<?php echo base_url();?>Home/view_termsConsition">Term & condition</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 ec-footer-news">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Newsletter</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">Get instant updates about our new products and
                                            special promos!</li>
                                    </ul>
                                    <div class="ec-subscribe-form">
                                        <form action="<?php echo base_url();?>Home/sendMail"  method="post">                    
                                            <div id="ec_news_signup" class="ec-form">
                                                <input class="ec-email" type="email" required=""
                                                    placeholder="Enter your email here..." id="enquiry_mail" name="enquiry_mail" value="" />
                                                <button id="ec-news-btn" class="button btn-primary" type="submit"
                                                    name="subscribe" value=""><i class="ecicon eci-paper-plane-o"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Footer social Start -->
                        <!--<div class="col text-left footer-bottom-left">-->
                        <!--    <div class="footer-bottom-social">-->
                        <!--        <span class="social-text text-upper">Follow us on:</span>-->
                        <!--        <ul class="mb-0">-->
                        <!--            <li class="list-inline-item"><a class="hdr-facebook" href="#"><i-->
                        <!--                        class="ecicon eci-facebook"></i></a></li>-->
                        <!--            <li class="list-inline-item"><a class="hdr-twitter" href="#"><i-->
                        <!--                        class="ecicon eci-twitter"></i></a></li>-->
                        <!--            <li class="list-inline-item"><a class="hdr-instagram" href="#"><i-->
                        <!--                        class="ecicon eci-instagram"></i></a></li>-->
                        <!--            <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i-->
                        <!--                        class="ecicon eci-linkedin"></i></a></li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- Footer social End -->
                        <!-- Footer Copyright Start -->
                        <div class="col text-center footer-copy">
                            <div class="footer-bottom-copy ">
                                <div class="ec-copy">Copyright © 2023 <a class="site-name text-upper"
                                        href="#">Fashion Store<span>.</span></a>. All Rights Reserved</div>
                            </div>
                        </div>
                        <!-- Footer Copyright End -->
                        <!-- Footer payment -->
                        <div class="col footer-bottom-right">
                            <div class="footer-bottom-payment d-flex justify-content-end">
                                <div class="payment-link">
                                    <img src="<?php echo base_url(); ?>assets/images/icons/payment.png" alt="">
                                </div>

                            </div>
                        </div>
                        <!-- Footer payment -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- Modal -->
    <div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <!-- Swiper -->
                            <div class="qty-product-cover">
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_1.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_2.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_3.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_4.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_5.jpg" alt="">
                                </div>
                            </div>
                            <div class="qty-nav-thumb">
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_1.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_2.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_3.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_4.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/product-image/3_5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="quickview-pro-content">
                                <h5 class="ec-quick-title"><a href="product-left-sidebar.html">Handbag leather purse for
                                        women</a>
                                </h5>
                                <div class="ec-quickview-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>

                                <div class="ec-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s,</div>
                                <div class="ec-quickview-price">
                                    <span class="old-price">$100.00</span>
                                    <span class="new-price">$80.00</span>
                                </div>

                                <div class="ec-pro-variation">
                                    <div class="ec-pro-variation-inner ec-pro-variation-color">
                                        <span>Color</span>
                                        <div class="ec-pro-color">
                                            <ul class="ec-opt-swatch">
                                                <li><span style="background-color:#ebbf60;"></span></li>
                                                <li><span style="background-color:#75e3ff;"></span></li>
                                                <li><span style="background-color:#11f7d8;"></span></li>
                                                <li><span style="background-color:#acff7c;"></span></li>
                                                <li><span style="background-color:#e996fa;"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="ec-pro-variation-inner ec-pro-variation-size ec-pro-size">
                                        <span>Size</span>
                                        <div class="ec-pro-variation-content">
                                            <ul class="ec-opt-size">
                                                <li class="active"><a href="#" class="ec-opt-sz"
                                                        data-tooltip="Small">S</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Medium">M</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Large">X</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Extra Large">XL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="ec-quickview-qty">
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                    </div>
                                    <div class="ec-quickview-cart ">
                                        <button class="btn btn-primary"><i class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Newsletter Modal Start -->
    
    <!--<div id="ec-popnews-bg"></div>-->
    <!--<div id="ec-popnews-box">-->
    <!--    <div id="ec-popnews-close"><i class="ecicon eci-close"></i></div>-->
    <!--    <div class="row">-->
    <!--        <div class="col-md-6 disp-no-767">-->
    <!--            <img src="<?php echo base_url(); ?>assets/images/banner/newsletter.png" alt="newsletter">-->
    <!--        </div>-->
    <!--        <div class="col-md-6">-->
    <!--            <div id="ec-popnews-box-content">-->
    <!--                <h2>Subscribe Newsletter</h2>-->
    <!--                <p>Subscribe the ekka ecommerce to get in touch and get the future update. </p>-->
    <!--                <form id="ec-popnews-form" action="#" method="post">-->
    <!--                    <input type="email" name="newsemail" placeholder="Email Address" required />-->
    <!--                    <button type="button" class="btn btn-primary" name="subscribe">Subscribe</button>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <!-- Newsletter Modal end -->

    <!-- Footer navigation panel for responsive display -->
    <div class="ec-nav-toolbar">
        <div class="container">
            <div class="ec-nav-panel">
                <div class="ec-nav-panel-icons">
                    <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><i
                            class="fi-rr-menu-burger"></i></a>
                </div>
                <!--<div class="ec-nav-panel-icons">-->
                <!--    <a href="<?php echo base_url();?>Cart" class="toggle-cart ec-header-btn ec-side-toggle"><i-->
                <!--            class="fi-rr-shopping-bag"></i><span-->
                <!--            class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>-->
                <!--</div>-->
                <div class="ec-nav-panel-icons">
                    <a href="<?php echo base_url();?>Cart" class="ec-header-btn"><i class="fi-rr-shopping-bag"></i><span
                            class="ec-cart-noti"></span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="<?php echo base_url();?>" class="ec-header-btn"><i class="fi-rr-home"></i></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="<?php echo base_url();?>Home/offer_zone" class="ec-header-btn"><i class="fi-rr-heart"></i></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="<?php echo base_url();?>User/dashboard" class="ec-header-btn"><i class="fi-rr-user"></i></a>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer navigation panel for responsive display end -->

    <!-- Recent Purchase Popup  -->
    <!--<div class="recent-purchase">-->
    <!--    <img src="<?php echo base_url(); ?>assets/images/product-image/1.jpg" alt="payment image">-->
    <!--    <div class="detail">-->
    <!--        <p>Someone in new just bought</p>-->
    <!--        <h6>stylish baby shoes</h6>-->
    <!--        <p>10 Minutes ago</p>-->
    <!--    </div>-->
    <!--    <a href="javascript:void(0)" class="icon-btn recent-close">×</a>-->
    <!--</div>-->
    <!-- Recent Purchase Popup end -->

    <!-- Cart Floating Button -->
    <div class="ec-cart-float">
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon"><i class="fi-rr-shopping-basket"></i>
            </div>
            <span class="ec-cart-count cart-count-lable">3</span>
        </a>
    </div>
    <!-- Cart Floating Button end -->

    <!-- Vendor JS -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="<?php echo base_url(); ?>assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/countdownTimer.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/scrollup.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slick.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/infiniteslidev2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/nouislider.js"></script>
    <!-- Google translate Js -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/google-translate.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script>
    <!-- Main Js -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/index.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/sweet-alert/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        <?php
        if ($this->session->flashdata('flashError')) {
            ?>
                    swal({
                        title: "Error",
                        text: "<?php echo $this->session->flashdata('flashError') ?>",
                        icon: "error",
                        button: "OK",
                    });
            <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('flashSuccess')) {
            ?>
                    swal({
                        title: "Success",
                        text: "<?php echo $this->session->flashdata('flashSuccess') ?>",
                        icon: "success",
                        button: "OK",
                    });
            <?php 
        } 
        ?>
    });
</script>

    
</body>

</html>