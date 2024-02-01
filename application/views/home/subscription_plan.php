<?= $this->load->view('includes/header.php','',TRUE);?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-style.css" />
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">-->
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Subscription Plan</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="<?php echo base_url();?>Home/index">Home</a></li>
                                <li class="ec-breadcrumb-item active">Subscription Plan</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

 <!--Plam Page-->
 <section class="pricing-section">
        <div class="container">
            <div class="sec-title text-center">
                <span class="title">Get plan</span>
                <h2>Choose a Plan</h2>
            </div>

            <div class="outer-box">
                <div class="row">
                    <!-- Pricing Block -->
                    <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fa-solid fa-award"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Silver</div>
                                <h4 class="price"> &#x20B9; 2000/Year</h4>
                            </div>
                            <ul class="features">
                                <li class="true">Target of INR 3 lakhs for next renewal.</li>
                                <li class="true">The registration fee for next year will be weaved off if the reseller achieves this target.</li>
                                <li class="true">Achieve 50 orders per month and get extra cash vouchers</li>
                               </ul>
                               <div class="btn-box">
                                <?php 
                                // echo $member_id;
                                if($member_id) { ?>
                            <form action="<?php echo base_url('Home/postPlan'); ?>" method="post">
                                <input type="hidden" name="plan_id" value="1"> 
                                <input type="hidden" name="member_id" value="<?php echo $member_id ?>"> 
                                 <a href="" class="theme-btn"><button type="submit" class="theme-btn">BUY Plan</button></a>
                            </form>
                            <?php } else{?>
                             <a href="<?php echo base_url();?>Home/sign_up" class="theme-btn"><button type="submit" class="theme-btn">BUY Plan</button></a>
                            <? } ?>
                        </div>
                        
                            <!--<div class="btn-box">-->
                            <!--    <a href="https://codepen.io/anupkumar92" class="theme-btn">BUY plan</a>-->
                            <!--</div>-->
                        </div>
                    </div>

                    <!-- Pricing Block -->
                    <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fa-solid fa-medal"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Gold</div>
                                <h4 class="price">&#x20B9; 4000/Year</h4>
                            </div>
                            <ul class="features">
                                <li class="true">2 % additional discount</li>
                                <li class="true">Each purchase you will get 2% discount instantly</li>
                                <li class="true">Surprise gift for top 3 resellers of the month</li>
                                <li class="true">Achieve 70 orders per month and get extra cash vouchers</li>
                                </ul>
                                <div class="btn-box">
                                <?php 
                                // echo $member_id;
                                if($member_id) { ?>
                            <form action="<?php echo base_url('Home/postPlan'); ?>" method="post">
                                <input type="hidden" name="plan_id" value="2"> 
                                <input type="hidden" name="member_id" value="<?php echo $member_id ?>"> 
                                 <a href="" class="theme-btn"><button type="submit" class="theme-btn">BUY Plan</button></a>
                            </form>
                            <?php } else{?>
                             <a href="<?php echo base_url();?>Home/sign_up" class="theme-btn"><button type="submit" class="theme-btn">BUY Plan</button></a>
                            <? } ?>
                        </div>
                        
                            <!--<div class="btn-box">-->
                            <!--    <a href="https://codepen.io/anupkumar92" class="theme-btn">BUY plan</a>-->
                            <!--</div>-->
                        </div>
                    </div>

                    <!-- Pricing Block -->
                    <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fas fa-gem" style="color: #e2d436;"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Platinum</div>
                                <h4 class="price">&#x20B9; 10000/Year</h4>
                            </div>
                            <ul class="features">
                               <li class="true">6 % additional discount</li>
                                <li class="true">Each purchase you will get 6% discount instantly</li>
                                <li class="true">Surprise gift for top 3 resellers of the month</li>
                                <li class="true">Achieve 100 orders per month and get extra cash vouchers</li>
                             </ul>
                            <div class="btn-box">
                                <?php 
                                // echo $member_id;
                                if($member_id) { ?>
                            <form action="<?php echo base_url('Home/postPlan'); ?>" method="post">
                                <input type="hidden" name="plan_id" value="3"> 
                                <input type="hidden" name="member_id" value="<?php echo $member_id ?>"> 
                                 <a href="" class="theme-btn"><button type="submit" class="theme-btn">BUY Plan</button></a>
                            </form>
                            <?php } else{?>
                             <a href="<?php echo base_url();?>Home/sign_up" class="theme-btn"><button type="submit" class="theme-btn">BUY Plan</button></a>
                            <? } ?>
                        </div>
                        </div>
                    </div>
                    <div class="btn-box">
                                <?php 
                                // echo $member_id;
                                    if ($member_id  !="") { ?>
                                <form id="myForm" action="<?php echo base_url('Home/postPlan'); ?>" method="post">
            <input type="hidden" name="plan_id" value="4"> 
            <input type="hidden" name="member_id" value="<?php echo $member_id ?>"> 
            <div class="center-wrapper">
                <!-- Add onclick event to trigger SweetAlert -->
                <button value="4" type="button" class="btn btn-warning" onclick="show()">Continue without a plan</button>
            </div>
        </form>
                              <?php } ?>
                        </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!--End-->
<?php echo $this->load->view('includes/footer.php','',TRUE);?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 function show() {
            // Show the SweetAlert confirmation dialog
            Swal.fire({
                title: 'Attention!',
                text: "Without an active plan, you won't be eligible for any privileges. Are you sure you want to continue without a plan?",
                icon: 'question',
                showCancelButton: true,
                 reverseButtons: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Continue!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Yes," submit the form programmatically
                    document.getElementById("myForm").submit();
                }
            });
        }
</script>