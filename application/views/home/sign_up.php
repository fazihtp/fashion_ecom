
<?= $this->load->view('includes/header.php','',TRUE);?>
<style>
        .custom-alert {
            background-color: #ff0000; /* Red background color */
            color: #ffffff; /* White text color */
            border: 1px solid #ff0000; /* Red border */
        }
    </style>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Register</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Register</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

 <!--Register Form-->
  <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Register</h2>
                        <h2 class="ec-title">Register</h2>
                        <p class="sub-title mb-3">Best place to buy and resellers your products </p>
                        
                    </div>
                </div>
                
                <div class="ec-register-wrapper">
                    <div class="ec-register-container">
                        <div class="ec-register-form">
                        <?php   if ($this->session->flashdata('flashPhone')) { ?>
                      <span class="ec-register-wrap ec-register-half">
                        <div class="alert custom-alert alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> The phone number already exists. Please try with another number.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                                                </span>
                                    <?php } ?>
                        


                        
                                                <form id="registrationForm" action="<?php echo base_url() ;?>Home/register" method="post">
                                <span class="ec-register-wrap ec-register-half">
                                    <label>First Name*</label>
                                    <input type="text" name="firstname" placeholder="Enter your first name" required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Last Name*</label>
                                    <input type="text" name="lastname" placeholder="Enter your last name" required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Email*</label>
                                    <input type="email" name="email" placeholder="Enter your email add..." required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Phone Number*</label>
                                    <input type="text" name="phonenumber" placeholder="Enter your Whatsapp number"
                                        required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Address*</label>
                                    <input type="text" name="address" placeholder="Address Line 1" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>City *</label>
                                    <span class="ec-rg-select-wrap">
                                      <input type="text" name="city" placeholder="City" />
                                    </span>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Post Code*</label>
                                    <input type="text" name="postalcode" placeholder="Post Code" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>District*</label>
                                    <input type="text" name="district_id" placeholder="Enter your District" />
                                </span>
                                 <span class="ec-register-wrap ec-register-half">
                                    <label>Password*</label>
                                    <input type="password" name="password" placeholder="Enter your password" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Confirm Password*</label>
                                    <input type="password" name="re_password" placeholder="Re Enter password" />
                                </span>
                                  <span class="ec-register-wrap ec-register-btn">
                                    <button class="btn btn-primary" type="submit">Register</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById("registrationForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent form submission to check the validation

            var password = document.getElementsByName("password")[0].value;
            var confirmPassword = document.getElementsByName("re_password")[0].value;

            if (password !== confirmPassword) {
                alert("Passwords do not match. Please re-enter.");
            } else if (password.length < 6) {
                alert("Password should be at least 6 characters long.");
            } 
            else {
               
                document.getElementById("registrationForm").submit();
                
            }
        });
        
//     document.getElementById("select_plan").addEventListener("change", function() {
//   var selectedValue = this.value;
//   if (selectedValue === "Custom") {
//     window.open("<?php echo base_url();?>Home/subscription_plan", "_blank");
//   }
// });

</script>