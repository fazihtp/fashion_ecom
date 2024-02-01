<?= $this->load->view('includes/header.php','',TRUE);?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/offer_zone/offer_zone.css" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins/nouislider.css" /> 
   <style>
       #custom_sale{
               width: 30%;
    display: block;
        background-color: #ff6285;
    color: white;
    font-weight: 400;
    padding: 5px;
        border-radius: 0 15px 15px 0;
        text-align: center;
}
    /*       position: absolute;*/
    /*       z-index: 8;*/
    /*top: 13px;*/
    /*left: 0;*/
    /*font-size: 12px;*/
    /*font-weight: 400;*/
    /*line-height: 24px;*/
    /*padding: 0 8px;*/
    /*text-align: center;*/
    /*text-transform: uppercase;*/
    /*color: #ffffff;*/
    /*display: -webkit-box;*/
    /*display: -ms-flexbox;*/
    /*display: flex;*/
    /*-webkit-box-align: center;*/
    /*-ms-flex-align: center;*/
    /*align-items: center;*/
    /*-webkit-box-pack: center;*/
    /*-ms-flex-pack: center;*/
    /*justify-content: center;*/
    /*background-color: #ff6285;*/

    /*font-weight: 700;*/
       }
   </style>
    <!-- Product tab Area Start -->
      <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                        </div>
                        
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Products</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section ec-product-tab section-space-p" id="collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Collection</h2>
                        <?php if($product == null): ?> 
                        <h2 class="ec-title">No Search results</h2>
                        <?php else: ?> 
                             <h2 class="ec-title"><?php echo $counts ?> Search results</h2>
                        <?php endif; ?> 
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>

                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center">
                    <ul class="ec-pro-tab-nav nav justify-content-center">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-pro-for-all"></a></li>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            
            <div class="row">
                <div class="col ">
                    <div class="tab-content">
                        <!-- 1st Product tab start -->
                        <div class="tab-pane fade show active" id="tab-pro-for-all">
                            <div class="row">
                                <!-- Product Content -->
                                 <?php foreach ($product as $products): ?>
                               <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3 mb-3 ec-product-content" >
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image" style="border:none">
                                               
                                                <a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" >
                                                         <img class="main-image" src="<?php echo base_url('assets/uploads/products_images') .'/'. $products->image; ?>" alt="" />
                                                    <!--<img class="main-image" src="<?php echo base_url('assets/uploads/products_images') .'/'. $products->image; ?>" alt="" />-->
                                                </a> 
                                                    <div class="ec-pro-actions">
                                                
                                                       
                                                        
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="ec-pro-content">
                                            
                                         <h5 class="ec-pro-title"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>"><?php echo $products->product_name ?></a></h5>
                          		    <span class="ec-price">
                                             
                                               <span class="old-price">₹<?php echo $products->price ?></span>
                                                <span class="new-price">₹<?php echo $products->price?>    </span>
                                            </span>
                                            <div class="ec-pro-size">
                                                     <ul class="ec-opt-size">
                                                        
                                                        <li class="active"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" class="ec-opt-sz" data-tooltip="<?php echo $products->quantity ." LEFT"?>"><?php echo $products->quantity ." LEFT" ?></a></li>
                                                       
                                                     </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <?php endforeach; ?>
                                <!--<div class="col-sm-12 shop-all-btn"><a href="home">Shop All-->
                                <!--        Collection</a></div>-->
                            </div>
                        </div>
                        <!-- ec 1st Product tab end -->
                        
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- ec Product tab Area End -->


<?php echo $this->load->view('includes/footer.php','',TRUE);?>
 <script src="<?php echo base_url();?>assets/js/plugins/nouislider.js"></script> 
  <style>
@media only screen and (max-width: 575px) {
	.ec-product-tab {
		.tab-pane {
			> .row {
				justify-content: center;
			}
		}
	}
	.col-lg-3.ec-product-content,
	.col-lg-4.ec-product-content {
		max-width: 342px !important; 
		margin: 0 auto !important;
		flex: 0 0 auto !important;
        width: 50% !important;
        padding: 10px !important ;
	}
		.ec-pro-color{
        	    display:none !important;
        	}
        	#eyeicon{
        	  display:none !important;  
        	}
         .ec-pro-image{
            border:none !important;
        }
        .ec-product-inner {
    	border: 1px solid $border-color-1;
    	padding: 0;
    	border-radius: 15px;
        }
        .ec-price{
        margin-bottom: 4px;
         padding-left: 10px;
        }
       .ec-pro-title{
            font-size: 20px;
            margin: 0 0 7px;
            padding-left: 10px;
       }
       .ec-pro-option{
           padding-left: 10px;
           margin-bottom: 6px;
       }
	.ec-product-inner {
		.ec-pro-image {
			.ec-pro-actions {
				justify-content: center;
		
			}
		}
	}
}




 </style>