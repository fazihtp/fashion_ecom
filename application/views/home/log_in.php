<?= $this->load->view('includes/header.php','',TRUE);?>
     <!-- Ec breadcrumb start -->
     <style>
         span.mb-3.end {
    font-size: 12px;
    margin: 29px 119px;
}
     </style>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Login</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Login</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->
<!-- Ec login page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Log In</h2>
                        <h2 class="ec-title">Log In</h2>
                        <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                    </div>
                </div>
                <div class="ec-login-wrapper">
                    <div class="ec-login-container">
                        <div class="ec-login-form">
                            <form action="<?php echo base_url();?>Home/checkLoginUser" method="post">
                                <span class="ec-login-wrap">
                                    <label>Phone Number*</label>
                                    <input type="text" name="user_name" placeholder="Enter your phone no..." required />
                                </span>
                                <span class="ec-login-wrap">
                                    <label>Password*</label>
                                    <input type="password" name="password" placeholder="Enter your password" required />
                                </span>
                                <span class="ec-login-wrap ec-login-fp">
                                    <label><a href="#">Forgot Password?</a></label>
                                </span>
                              <span class="ec-login-wrap ec-login-btn">
                                <button class="btn btn-primary" type="submit">Login</button>
                                
                            </span>
                               <span class="ec-login-wrap ec-login-fp" style="text-align:center;margin-top: 8px;}">
                                    <label><a href="<?php echo base_url(); ?>Home/sign_up">Not a member?Register Now</a></label>
                                </span> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End-->
<?php echo $this->load->view('includes/footer.php','',TRUE);?>