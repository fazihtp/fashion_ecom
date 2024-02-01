<?= $this->load->view('includes/header.php','',TRUE);?>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">About Us</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                              <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="<?php echo base_url();?>Home/index">Home</a></li>
                                <li class="ec-breadcrumb-item active">About Us</li>
                            </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">About Us</h2>
                        <h2 class="ec-title">About Us</h2>
                        <p class="sub-title mb-3">About our business Firm</p>
                    </div>
                </div>
                <div class="ec-common-wrapper">
                    <div class="row">
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                            <img class="a-img" src="<?php echo base_url(); ?>assets/images/banner/about_us_image.png" alt="about">
                            </div>
                        </div>
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">What is the Korean Fashion Store</h3>
                                <p>Korean distribution began in 1974 based at Kannur as agent of Birla. H K enterprises was a whole sale division of Korean  distribution started four years back. To update with the new business trend we developed a resellers’ app named Fashion Store three years ago. Fashion Store is a resellers app and website for ladies fashion dressings and apparels. We plan to extend the range of products for reselling to gents fashion, kids fashion and other items. We assure high quality products and proper service to our customers and clients. We are up to your services with full hand stock and the products are purchased directly from manufactures so that you can avail high quality ladies fashion items in a very reasonable price.</p>
                                 </div>
                        </div>
                        <div class="row p-4">
                        <div class="col-md-12 ec-cms-block ec-abcms-block text-center">
                            <p>Today when everything is possible using a smartphone, most people do not want to open the computer. Korean Fashion Store registration is very possible through android as well as ios applications. Here are the steps you need to follow to register on Korean through the smartphone application. </p>
                        </div>
                        </div>
                         <div class="row">
                        <div class="col-md-12 ec-cms-block ec-abcms-block text-left">
                            <div class="ec-cms-block-inner typography margin-minus-b-15">
                                <ul class="ec-check-list">
                        <li> Install Korean application from Google Playstore</li>
<li> When you open the app after installation, an interface will come where you have to click on ‘Continue’ option available at the bottom of the screen</li>
<li> Now, another screen will come where you have to select the phone or mail id through which you want to register on the app</li>
<li> And the membership page opens the categories will show in the options. Silver ,gold, platinum is the categories.</li>
<li> After choosing the categories.</li>
<li> A form will displayed then fill the form and submit the request.</li>
<li> For verifications our representative contact you through call or email.</li>
<li> After the verification is complete, a page will open where you will find a video on the use of Korean. You can leave this page by clicking on the option at the bottom of the screen</li>
<li> After that you will enter your profile. Here, you have to select your profile which you will find on the bottom right side of the screen</li>
<li> Here you have to click on the option of Edit Profile</li>
<li> You have to fill all the details like your personal details, contact details and your work details in the blank form and click on save option available on the top right corner of the screen</li>
<li> After you’ve saved your details, now use the arrow in the top left corner to go back</li>
<li> Fill the details and click on submit option</li> 
                    </ul>
                                 </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ec testmonial Start -->
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
    <!-- ec testmonial end -->

    <!--  services Section Start -->
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
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order or order above $200</p>
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
                            <h2>30 Days Return</h2>
                            <p>Simply return it within 30 days for an exchange</p>
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
<?php echo $this->load->view('includes/footer.php','',TRUE);?>