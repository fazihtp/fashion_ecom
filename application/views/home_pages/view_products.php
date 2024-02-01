<?php echo $this->load->view('includes/header.php','',TRUE);?>
<!--</?php echo $this->load->view('home_page/ajax_view_products.php','',TRUE);?>-->

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
                              <select name="ec-select" id="ec-select" onchange="SortOption()">
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
                            <div class="row">
                                <?php foreach ($products as $rec) { 
                                $image=$rec->image;
                                ?>
                                 <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image" style="border:none">
                                                   <?php $product_stock=getProductStock($rec->id);
                                                $stock_count=0;
                                                foreach ($product_stock as $stk){ 
                                                $stock_count=$stock_count+$stk->in_stock;
                                                } ?>
                                                
                                                 <?php if($stock_count <=0){?> 
                                                 <span class="percentage" style="width: 100%;display: block;margin-top: 50%;">SOLD OUT</span>
                                                 <? } ?>
                                                <a href="" class="image">
                                                    <?php $instock=getInstock($rec->id); ?>
                                                    <!--<span class="percentage">Out of stock+%</span>-->
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
                                              <?php
											  $product_prize=getProductPrize($rec->id);
										  //echo $position;
											  if($position  == "1"){
                                                 $discount= $product_prize->price_for_members;
                                                 $price=round($discount);
                                                }else if ($position  == "2"){
                                                $discount= $product_prize->price_for_members*2/100;
                                                $price=round($product_prize->price_for_members-$discount);
                                                }else if ($position  == "3"){
                                                $discount= $product_prize->price_for_members*6/100;
                                                $price=round($product_prize->price_for_members-$discount);
                                                }else{
                                                $price=round($product_prize->price_for_non_members);
                                                }
                                                ?>
                                               <span class="old-price">₹<?php echo $product_prize->price_for_non_members ?></span>
                                                <span class="new-price">₹<?php echo $price?>    </span>
                                            </span>
                                            <div class="ec-pro-option">
                                                
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                 <ul class="">
                                                    <?php $available_colors=getProductVariantColour($rec->id); foreach ($available_colors as $res){ ?>
                                                        <li class="active">
                                                            <span style="background-color:<?php echo $res->colour_code; ?>;border: 1px solid black;"></span>
                                                       </li>
                                                   <?php } ?>
                                                  </ul>
                                                </div>
                                                <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                     <ul class="ec-opt-size">
                                                         <?php $available_size=getProductVariantSize($rec->id); foreach ($available_size as $res){ ?>
                                                        <li class="active"><a href="#" class="ec-opt-sz" data-tooltip="<?php echo $res->size ?>"><?php echo $res->size_name ?></a></li>
                                                        <?php } ?>
                                                     </ul>
                                                </div>
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
                      
                        <!-- Ec Pagination Start -->
                        <div class="ec-pro-pagination">
                              <?php echo $pagination_links; ?>
                        </div>
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
                                    <ul>
                                        <?php foreach ($category as $recs){ ?>
                                        <li>
                                            <input type="hidden" name="category_id" id="category_id" value="<?php echo $recs->category_id?>">
                                           <div class="ec-sidebar-block-item">
                <input type="checkbox" value="<?php echo $recs->id?>" name="category[]" id="category_<?php echo $recs->id?>" onclick="filterCategoryItem(<?php echo $recs->id?>)" <?php if ($recs->category_id == $recs->id) echo 'checked'; ?> />
                        <a href="#"><?php echo $recs->sub_category_name ?></a>
                        <span class="checked"></span>
                    </div>

                                        </li>
                                        <?php } ?>
                                        
                                        </ul>
                                </div>
                            </div>
                            <!-- Sidebar Size Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Size</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <?php foreach ($size as $rec) { ?>
                                        <li>
                                     <div class="ec-sidebar-block-item">
                                    <input type="checkbox" name="category_size[]" id="categoryId_<?php echo $rec->id; ?>" value="<?php echo $rec->id ?>" onclick="filterCategoryItem(<?php echo $rec->id ?>)" />
                                    <a href="#"><?php echo $rec->size ?></a>
                                    <span class="checked"></span>
                                </div>

                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Color item -->
                            <div class="ec-sidebar-block ec-sidebar-block-clr">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Color</h3>
                                </div>
                                <div class="ec-sb-block-content" >
                                    <ul>
                                       <!--</?php $available_colours=get_available_colours($colors->id);  foreach ($available_colours as $res){ ?>-->
                                        <?php foreach ($colors as $clr) { 
                                        $style=$clr->colour_code;
                                        ?>
                                           <li>
                                            <div class="ec-sidebar-block-item">
                                                  <input type="checkbox" name="category_color[]" id="categoryId_<?php echo $rec->id; ?>" value="<?php echo $rec->id?>" onclick="filterCategoryItem(<?php echo $rec->id?>)" /><span
                                                    style="background-color:<?php echo $style ?>;border: 1px solid black;"></span>
                                                    </div>
                                        </li>
                                        <!--</?php } ?>-->
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
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
                                  <input   type="text" class="filter__input" id="filter__input" name="filterPrice" onchange="getPriceValue()"></label>
                                            <span class="ec-price-divider"></span>
                                            <label ><span  class="rupee_sign"  id="filter__input1" >₹</span>
                                            <input type="text" class="filter__input" name="filterPrice1" onchange="getPriceValue()"></label>
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
        function filterCategoryItem(categoryId) {
            var formData = $('#filterForm').serialize();
// alert(formData);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Category/filter_category_items'); ?>", 
                // data: {category_id: jsonString},
                data: formData,
                success: function (data) {
                     //  alert(data)
                    $('#filttered').html(data);
                },
            });
        }
function showPage(page) {
    var count = $(".ec-product-inner").length;
    // alert(count)
    var cat = "<?php echo base64_encode($catid); ?>";
    var siteurl = "<?php echo base_url(); ?>" + "Category/product_view/" + cat + "/" + page;
    window.location.href = siteurl;
}
       
               function SortOption() {
          
            var selectElement = document.getElementById("ec-select");
           
            var selectedValue = selectElement.value;
          //  alert(selectedValue);
           // console.log("Selected value:", selectedValue);
            
             $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Category/filter_category_items'); ?>", 
                // data: {category_id: jsonString},
                data:  { selectedValue: selectedValue },
                success: function (data) {
                //alert(data)
                    $('#filttered').html(data);
                },
            });
        }
</script>
