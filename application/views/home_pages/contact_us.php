<?= $this->load->view('includes/header.php','',TRUE);?>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Contact Us</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="<?php echo base_url();?>Home/index">Home</a></li>
                                <li class="ec-breadcrumb-item active">Contact Us</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

 <!--Contact Us-->
  <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-common-wrapper">
                    <div class="ec-contact-leftside">
                        <div class="ec-contact-container">
                            <div class="ec-contact-form">
                                <form action="<?php echo base_url();?>Home/sendMail" method="post">
                                    <span class="ec-contact-wrap">
                                        <label>First Name*</label>
                                        <input type="text" name="firstname" placeholder="Enter your first name"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>Last Name*</label>
                                        <input type="text" name="lastname" placeholder="Enter your last name"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>Email*</label>
                                        <input type="email" name="email" placeholder="Enter your email address"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>Phone Number*</label>
                                        <input type="text" name="phonenumber" placeholder="Enter your phone number"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>Comments/Questions*</label>
                                        <textarea name="address"
                                            placeholder="Please leave your comments here.."></textarea>
                                    </span>
                                    
                                    <span class="ec-contact-wrap ec-contact-btn">
                                         <input type="submit" value="Contact us" class="btn btn-primary">
                                        <!--<button class="btn btn-primary" type="submit">Submit</button>-->
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ec-contact-rightside">
                        <div class="ec_contact_map">
                            <div class="ec_map_canvas">
                                <iframe id="ec_map_canvas"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125322.4417315352!2d76.88483378631479!3d11.014126295233476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1706758142796!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <a href="https://goo.gl/maps/BSKNhhngxWmt7vhTA"></a>
                            </div>
                        </div>
                        <div class="ec_contact_info">
                            <h1 class="ec_contact_info_head">Contact us</h1>
                            <ul class="align-items-center">
                                <li class="ec-contact-item"><i class="ecicon eci-map-marker"
                                        aria-hidden="true"></i><span>Address :</span>71 Pilgrim Avenue Chevy Chase, east california</li>
                                <li class="ec-contact-item align-items-center"><i class="ecicon eci-phone"
                                        aria-hidden="true"></i><span>Call Us :</span><a href="tel:+440123456789">+91
                                              999 517 3402 </a></li>
                                <li class="ec-contact-item align-items-center"><i class="ecicon eci-envelope"
                                        aria-hidden="true"></i><span>Email :</span><a
                                        href="<?php echo base_url();?>Home/contact_us">sales@korean.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End-->
<?php echo $this->load->view('includes/footer.php','',TRUE);?>