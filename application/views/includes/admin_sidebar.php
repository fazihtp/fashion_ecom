<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	 <title>FASHION STORE</title>
    <meta name="keywords" />
    <meta name="description" content="The Destiny Of Your Fashion.">
    <meta name="author" content="HAK Collections,The Destiny Of Your Fashion">

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="<?php echo base_url(); ?>admin_assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>admin_assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" href="<?php echo base_url(); ?>admin_assets/css/ekka.css" rel="stylesheet" />
	<!--Custom CSS -->
	<link id="ekka-css" href="<?php echo base_url(); ?>admin_assets/css/custom_admin.css" rel="stylesheet" />

	<!-- FAVICON -->
	<link href="<?php echo base_url(); ?>admin_assets/img/favicon/favicon.png" rel="shortcut icon" />

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">
		
		<!-- LEFT MAIN SIDEBAR -->
		<div class="ec-left-sidebar ec-bg-sidebar">
			<div id="sidebar" class="sidebar ec-sidebar-footer">

				<div class="ec-brand">
					<a href="index.html" title="Ekka">
						<img class="" src="<?php echo base_url(); ?>admin_assets/img/logo/logo.png" alt="" style="max-width:91px"/>
						<!--<span class="ec-brand-name text-truncate">Ekka</span>-->
					</a>
				</div>

				<!-- begin sidebar scrollbar -->
				<div class="ec-navigation" data-simplebar>
					<!-- sidebar menu -->
					<ul class="nav sidebar-inner" id="sidebar-menu">
						<!-- Dashboard -->
						
						<li class="">
							<a class="sidenav-item-link" href="<?php echo base_url();?>Admin/approved_list">
								<i class="mdi mdi-account-group-outline"></i>
								<span class="nav-text">Members</span>
							</a>
							<hr>
						</li>
						
						
						<!-- Products -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">Products</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="active">
										<a class="sidenav-item-link" href="<?php echo base_url();?>Products">
											<span class="nav-text">Add Product</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo base_url();?>Products/list_products">
											<span class="nav-text">List Product</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-cart"></i>
								<?php $oder_count = getCountOfOrders() ?>
								<span class="nav-text">Orders</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									
									<li class="">
										<a class="sidenav-item-link" href="<?php echo base_url();?>Orders/newOrders">
										    	<?php $newoder_count = getOrderOrderPlacedDetails() ?>
											<span class="nav-text">New Orders <b> <?php echo $newoder_count ?></b></span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="<?php echo base_url();?>Orders/deliveredOrders">
										    	<?php $delivered_count = getOrderDeliveredDetails() ?>
											<span class="nav-text">Shipped Orders <b> <?php echo $delivered_count ?></b></span>
										</a>
									</li>
									
								</ul>
							</div>
			</li>
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-settings"></i>
								<span class="nav-text">Settings</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									
									<li class="">
										<a class="sidenav-item-link" href="<?php echo base_url();?>Admin/category">
											<span class="nav-text">Category</span>
										</a>
									</li>
									
										<li class="">
										<a class="sidenav-item-link" href="<?php echo base_url();?>Settings/view_Banner">
											<span class="nav-text">Banner</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                	</ul>
				</div>
			</div>
		</div>

		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">
