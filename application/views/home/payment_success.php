<!--========================================================= 
    Item Name: Ekka - Ecommerce HTML Template + Admin Dashboard.
    Author: ashishmaraviya
    Version: 3.4
    Copyright 2023
	Author URI: https://themeforest.net/user/ashishmaraviya
 ============================================================-->
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
 
      <title>HAK Collections</title>
    <meta name="keywords" />
    <meta name="description" content="The Destiny Of Your Fashion.">
    <meta name="author" content="HAK Collections,The Destiny Of Your Fashion">
 
     <!-- site Favicon -->
     <link rel="icon" href="<?php echo base_url();?>assets/images/favicon/favicon.png" sizes="32x32" />
     <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/images/favicon/favicon.png" />
     <meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/images/favicon/favicon.png" />
 
     <!-- css Icon Font -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/vendor/ecicons.min.css" />
 
     <!-- css All Plugins Files -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/animate.css" />
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/swiper-bundle.min.css" />
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/jquery-ui.min.css" />
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/countdownTimer.css" />
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/slick.min.css" />
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/bootstrap.css" />
 
     <!-- Main Style -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" />
 
     <!-- Background css -->
     <link rel="stylesheet" id="bg-switcher-css" href="<?php echo base_url();?>assets/css/backgrounds/bg-4.css">
 </head>
<body>

	<!-- Start maintenance Section -->
	<section class="ec-under-maintenance">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="under-maintenance">
						<div class="logo">
							<img src="<?php echo base_url();?>assets/images/logo/logo.png" alt="logo">
						</div>
						<h1>PAYMENT SUCCESSFUL</h1>
						<div>
						<p style="margin-bottom:2px;">Thankyou for shopping.</p>
						<p style="margin-bottom:2px;text-align: start;">Order ID :  <?php echo isset($order_list->order_id  ) ? $order_list->order_id : ''; ?></p>
						<p style="margin-bottom:2px;text-align: start;">From: <?php echo isset($order_list->from_name) ? $order_list->from_name : 'N/A'; ?></p>
						<p style="margin-bottom:2px;text-align: start;">Phone: <?php echo isset($order_list->from_phone) ? $order_list->from_phone : 'N/A'; ?></p>
						<p style="margin-bottom:2px;text-align: start;">To: <?php echo isset($order_list->to_name) ? $order_list->to_name : 'N/A'; ?></p>
						<p style="margin-bottom:2px;text-align: start;">Phone: <?php echo isset($order_list->to_phone) ? $order_list->to_phone : 'N/A'; ?></p>
						</div>
					<div class="ec-bg-swipe">
                    <a href="<?php echo base_url();?>Home"><button class="ec-btn-bg-swipe" style="width:14rem;">
                        <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Continue Shopping</span>
                    </button></a>
                </div>
					
					</div>
				</div>
				<div class="col-md-6 ">
					<div class="under-maintenance">
						<img class="maintenance-img" src="<?php echo base_url();?>assets/uploads/home_images/success.jpg" alt="success">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End maintenance Section -->

    <!-- Vendor JS -->
    <script src="<?php echo base_url();?>assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="<?php echo base_url();?>assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/countdownTimer.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/scrollup.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slick.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/infiniteslidev2.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/nouislider.js"></script>
    <!-- Google translate Js -->
    <script src="<?php echo base_url();?>assets/js/vendor/google-translate.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script>
    <!-- Main Js -->
    <script src="<?php echo base_url();?>assets/js/vendor/index.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>
</html>