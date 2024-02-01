<?php echo $this->load->view('includes/header.php','',TRUE);?>

<style>
    .pagination {
        color: black;
       
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(243, 244, 246, 1);
    /*color: #fffffe;*/
    /*background: #818181;*/
}
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom-style.css" />
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title"><?= $category_name?>Fashion</h2></h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active"><?= $category_name?></li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->
    <!-- Ec Shop page -->
        <!-- ekka Cart Start -->
    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            <div class="ec-cart-top">
                <div class="ec-cart-title">
                    <span class="cart_title">My Cart</span>
                    <button class="ec-close">×</button>
                </div>
                <ul class="eccart-pro-items">
                   
                </ul>
            </div>
            <div class="ec-cart-bottom">
                <div class="cart_btn">
                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                    <a href="checkout.html" class="btn btn-secondary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ekka Cart End -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn btn-grid active"><i class="fi-rr-apps"></i></button>
                                <button class="btn btn-list"><i class="fi-rr-list"></i></button>
                            </div>
                        </div>
                        <div class="col-md-6 ec-sort-select">
                            <span class="sort-by">Sort by</span>
                            <div class="ec-select-inner">
                              <select name="ec-select" id="ec-select">
                                <option selected disabled>Position</option>
                                <option value="1">Relevance</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Top End -->

                    <!-- Shop content Start -->
                    
                        <div class="shop-pro-content" >
                            
                        <div class="shop-pro-inner" id="filttered">
                            <div class="row" id="product-list">
                                <?php foreach ($products as $rec) { 
                                $image=$rec->image;
                                ?>
                                 <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image" style="border:none">
                                                  
                                                <a href="" class="image">
                                                   
                                                    <img class="main-image"
                                                        src="<?php echo base_url();?>assets/uploads/products_images/<?= $image ?>" alt="Product" style="height:304px"/>
                                                    <img class="hover-image"
                                                        src="<?php echo base_url();?>assets/uploads/products_images/<?= $image ?>" alt="Product" />
                                                </a>
                                                <!--<span class="percentage">20%</span>-->
												<div class="ec-pro-actions">
													<a href="<?php echo base_url();?>Category/view_products/<?php echo  base64_encode($rec->id) ?>" class="ec-btn-group wishlist" title="View Product" style="border-radius: 11px;"><i
															class="fi-rr-eye" ></i></a>
												</div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"  style="text-transform: capitalize;"><a href="<?php echo base_url();?>Category/view_products/<?php echo  base64_encode($rec->id) ?>"><?= $rec->product_name ?></a></h5>
                                             <div class="ec-pro-list-desc"><?php echo $rec->product_description ?></div>
                                            <span class="ec-price">
                                              
                                               <span class="old-price">₹<?php echo $rec->price ?></span>
                                                <span class="new-price">₹<?php echo $rec->price?>    </span>
                                            </span>
                                            <div class="ec-pro-option">
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!---->
                            </div>
                        </div>
                      
                       <div class="shop-pro-content" id="filteredResult1">
                        <div class="filteredResult">
                            
                        </div>
                        </div>
                        <div class="ec-pro-pagination">
                            <span></span>
                            <ul class="ec-pro-pagination-inner">
                                <!--<li><a class="active" href="#">1</a></li>-->
                                <!--<li><a href="#">2</a></li>-->
                                <!--<li><a href="#">3</a></li>-->
                                <!--<li><a href="#">4</a></li>-->
                              
                                <li><a class="next" id="load-more-btn">Next <i class="ecicon eci-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- Ec Pagination Start -->
                        <!--<div class="ec-pro-pagination">-->
                              <!--?php echo $pagination_links; ?>-->
                              
                        <!--</div>-->
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div id="shop_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1>Filter Products By</h1>
                        </div>
                        <form id='filterForm'>
                         
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Category</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                <?php $categories = get_categories(); ?>
                                <ul>
                                    <?php foreach ($categories as $recs): ?>
                                        <li>
                                            <input type="hidden" name="category_id" id="category_id" value="<?php echo $catid; ?>">
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="<?php echo $recs->id; ?>" name="category[]" id="category_<?php echo $recs->id; ?>" <?php if ($catid == $recs->id) echo 'checked'; ?> />
                                                <a href="#" onclick="redirectOnCheckboxClick('<?php echo base_url(); ?>Category/product_view/<?php echo base64_encode($recs->id); ?>')"><?php echo $recs->name; ?></a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                </div>
                            </div>
                            <!-- Sidebar Size Block -->
                            <div class="ec-sidebar-block">
                               
                            </div>
                            <!-- Sidebar Color item -->
                            
                                <div class="ec-sidebar-block">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Price</h3>
                                    </div>
                                    <div class="ec-sb-block-content es-price-slider">
                                        <div class="ec-price-filter">
                                            <div id="ec-sliderPrice" class="filter__slider-price" data-min="0 "
                                                data-max="50000" data-step="10"></div>
                                            <div class="ec-price-input">
                                             <label ><span class="rupee_sign">₹</span>
                                      <input   type="text" class="filter__input" id="filter__input" name="filterPrice"></label>
                                                <span class="ec-price-divider"></span>
                                                <label ><span  class="rupee_sign"  id="filter__input1" >₹</span>
                                                <input type="text" class="filter__input" id="filter__input_max" name="filterPrice1" ></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php echo $this->load->view('includes/footer.php','',TRUE);?>
<script type="text/javascript">
    var offset = 0;
    var loading = false;
    var cat_id = <?php echo $catid; ?>;
    
    function loadProducts() {
        var minPrice = $('#filter__input').val();
        var maxPrice = $('#filter__input_max').val();
        
        $.ajax({
            url: "<?php echo site_url('Category/get_products'); ?>",
            type: 'GET',
            data: {
                offset: offset,
                cat_id: cat_id,
                minPrice: minPrice,
                maxPrice: maxPrice
            },
            dataType: 'html',
            success: function(data) {
                if (data.length > 0) {
                    $('#product-list').empty();
                    $('#product-list').append(data);
                    offset += 12;
                }
                $('html, body').animate({
                    scrollTop: $('#product-list').offset().top
                }, 1000);
            }
        });
    }

    loadProducts();

    $('#load-more-btn').on('click', function() {
        loadProducts();
    });

    $('#filter__input, #filter__input_max').on('keyup', function() {
        offset = 0;
        loadProducts();
    });
</script>


<script>
    function redirectOnCheckboxClick(url) {
        // Get all checkboxes with the name 'category[]'
        var checkboxes = document.getElementsByName('category[]');

        // Check if any checkbox is checked
        var isChecked = Array.from(checkboxes).some(function (checkbox) {
            return checkbox.checked;
        });

        // If at least one checkbox is checked, redirect
        if (isChecked) {
            window.location.href = url;
        } else {
            // Handle the case where no checkbox is checked (if needed)
            console.log('No checkbox is checked.');
        }
    }
</script>


