<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Fashion Store</title>
    <meta name="keywords" />
    <meta name="description" content="The Destiny Of Your Fashion.">
    <meta name="author" content="Fashion Store,The Destiny Of Your Fashion">

    <!-- site Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/images/favicon/favicon.png" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/bootstrap.css" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/nouislider.css" />
    <!-- Main Style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo1.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom_includes.css" />
    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="<?php echo base_url(); ?>assets/css/backgrounds/bg-4.css">
</head>

<body>
    <div id="ec-overlay">
        <div class="ec-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Header start  -->
    <header class="ec-header">
        <!--Ec Header Top Start -->
         <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Header Top social Start -->
                    <div class="col text-left header-top-left d-none d-lg-block">
                        <div class="header-top-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook"  href=""><i
                                            class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href=""><i
                                            class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram"  href=""><i
                                            class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href=""><i
                                            class="fi fi-rr-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col text-center header-top-center">
                         <div class="header-top-message text-upper">
                            <span style="color:white">The Destiny Of</span>Your Fashion
                        </div>
                    </div>
                    <div class="col header-top-right d-none d-lg-block">
                        <div class="header-top-lan-curr d-flex justify-content-end">
                            <div class="header-top-curr dropdown">
                                <ul class="dropdown-menu"> </ul>
                            </div>
                            </div>
                        
                    </div>
                    <div class="col d-lg-none ">
                        
                        <div class="ec-header-bottons">
                             <?php if ($this->session->userdata('user')) {  
                             ?>  
                            <span style="font-style: italic;"> Hii <?= $this->session->userdata('user') ?></span>
                            <?php } ?>
                             <div class="ec-header-user dropdown">
                                   
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                        class="fi-rr-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                   
                                    <li><a class="dropdown-item" href="<?php echo base_url();  ?>Home/sign_up">Register</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url();  ?>User/dashboard">My Account</a></li>
                                      <?php if ($this->session->userdata('user_id')) { ?>   
                                    <li><a class="dropdown-item" href="<?php echo base_url();?>Home/logout">Logout</a></li>
                                      <?php } else { ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url();?>Home/log_in">Log In</a></li>  
                                           <?php } ?>
                                </ul>
                            </div>
                            <a href="<?php echo base_url();?>Cart" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon"><i class="fi-rr-shopping-bag"></i></div>
                                 <?php 
                                         if ($this->session->userdata('user_id')) {
                                          $user_id = $this->session->userdata('user_id');
                                          $cart_count = getCartCount($user_id);
                                          }else{
                                          $cart_count=0;
                                          } ?>
                                <span class="ec-header-count"><?php echo  $cart_count ?></span>
                            </a>
                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <i class="fi fi-rr-menu-burger"></i>
                            </a>
                            </div>
                    </div>
                    </div>
            </div>
        </div>
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a href="<?php echo base_url();?>Home/index"><img src="<?php echo base_url(); ?>assets/images/logo/logo.png" alt="Site Logo" /><img
                                        class="dark-logo" src="<?php echo base_url(); ?>assets/images/logo/dark-logo.png" alt="Site Logo"
                                        style="display: none;" /></a>
                            </div>
                        </div>
                        <div class="align-self-center">
                           <div class="header-search">
                            <form class="ec-btn-group-form" method="get" action="<?php echo base_url(); ?>Home/search">
                                <input type="text" name="search" class="form-control ec-search-bar" placeholder="Search products...">
                                <button class="submit" type="submit"><i class="fi-rr-search"></i></button>
                            </form>
                        </div>

                        </div>
                        <div class="align-self-center">
                            <div class="ec-header-bottons">
                                  <div class="ec-header-user dropdown">
                                   
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                            class="fi-rr-user"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="<?php echo base_url();  ?>Home/sign_up">Register</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url();?>User/dashboard">My Account</a></li>
                                         <?php if ($this->session->userdata('user_id')) { ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url();?>Home/logout">Logout</a></li>
                                    <?php } else { ?>
                                     <li><a class="dropdown-item" href="<?php echo base_url();?>Home/log_in">Login</a></li>
                                      <?php } ?>
                                    </ul>
                                </div>
                                <a href="<?php echo base_url();?>Cart" class="ec-header-btn ec-header-wishlist">
                                    <div class="header-icon"><i class="fi-rr-shopping-bag"></i></div>
                                        <?php 
                                         if ($this->session->userdata('user_id')) {
                                          $user_id = $this->session->userdata('user_id');
                                          $cart_count = getCartCount($user_id);
                                          }else{
                                          $cart_count=0;
                                          } ?>
                                    <span class="ec-header-count cart-count-lable"><?= $cart_count ?></span>
                                </a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">
                    <div class="col">
                        <div class="header-logo">
                            <a href="<?php echo base_url();?>Home"><img src="<?php echo base_url(); ?>assets/images/logo/logo.png" alt="Site Logo" /><img
                                    class="dark-logo" src="<?php echo base_url(); ?>assets/images/logo/dark-logo.png" alt="Site Logo"
                                    style="display: none;" /></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" method="get" action="<?php echo base_url(); ?>Home/search">
                                <input type="text" name="search" class="form-control ec-search-bar" placeholder="Search products...">
                                <button class="submit" type="submit"><i class="fi-rr-search"></i></button>
                            </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="ec-main-menu">
                            <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                                <i class="fi fi-rr-apps"></i>
                            </a>
                            <ul>
                                <li><a href="<?php echo base_url();?>Home">Home</a></li>
                            
                            <?php $categories=get_categories();  foreach ($categories as $rec): ?>
                            <li class="dropdown"><a href="<?php echo base_url(); ?>Category/product_view/<?php echo base64_encode($rec->id) ?>"><?php echo $rec->name; ?></a>
                                 
                                </li>
                                <?php endforeach; ?>
                           
                                <li class="dropdown"><a href="<?php echo base_url();?>Home/subscription_plan">Membership</a></li>
                                <li><a href="<?php echo base_url();?>Home/contact_us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="<?php echo base_url();?>Home">Home</a></li>
                        <li><a href="<?php echo base_url();?>Home/about_us">About Us</a></li>
                        <?php $categories=get_categories();  foreach ($categories as $rec): ?>
                            <li class="dropdown"><a href="<?php echo base_url(); ?>Category/product_view/<?php echo base64_encode($rec->id); ?>"><?php echo $rec->name; ?></a>
                                    <ul class="sub-menu">
                             <?php $sub_category=get_sub_categories($rec->id);  foreach ($sub_category as $res): ?>
                                        <li><a href="<?php echo base_url(); ?>Category/product_view/<?php echo base64_encode($rec->id) . (isset($res->id) ? '/' . base64_encode($res->id) : ''); ?>"><?php echo $res->sub_category_name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                            </li>
                                <?php endforeach; ?>
                        <li><a href="<?php echo base_url();?>Home/subscription_plan">Membership</a></li>
                        <li><a href="<?php echo base_url();?>Home/contact_us">Contact Us</a></li>
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                     <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i
                                            class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                            class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i
                                            class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                            class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End  -->