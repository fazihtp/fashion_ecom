<!--?= print_r($offer_category);die; ?>-->
<?= $this->load->view('includes/header.php','',TRUE);?>
<!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Offer Zone</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="<?php echo base_url();?>Home/index">Home</a></li>
                                <li class="ec-breadcrumb-item active">Offer</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->
    <section class="labels section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <!--<h2 class="ec-bg-title">Grab Your Offer Today</h2>-->
                        <h2 class="ec-title">Grab Your Offer Today</h2>
                        <p class="sub-title">Browse The Collection of Top Categories</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                //  print_r($offer_category);  
                // foreach ($categories as $rec){ 
                foreach ($offer_category as $category){ ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 margin-b-30">
                    <div class="ec-offer-coupon">
                        <div class="ec-cpn-brand">
                            <img class="ec-brand-img" src="<?= $category['photo'] ?>" alt="" />
                        </div>
                        <div class="ec-cpn-title">
                            <h2 class="coupon-title"><?= $category['sub_category_name'] ?></h2>
                        </div>
                        <div class="ec-cpn-desc">
                            <p class="coupon-text"><?= $category['category_description'] ?></p>
                        </div>
                        <div class="ec-cpn-code">         
                            <a href="<?php echo base_url('Category/product_view/' . base64_encode($category['category_id'])); ?>" class="btn btn-secondary">Shop Now</a>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>


<?php echo $this->load->view('includes/footer.php','',TRUE);?>