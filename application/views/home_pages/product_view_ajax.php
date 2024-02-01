<style>
    h3 {
    text-align: center;
}
ul.ec-pro-tab-nav.nav.justify-content-center {
    margin-bottom: 98px;
}
</style>
<div class='row'>
    <?php if($product) { ?>
<?php foreach ($product as $products): ?>
       <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6   ec-product-content"  >
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" >
                                                         <img class="main-image" src="<?php echo base_url('assets/uploads/products_images') .'/'. $products->image; ?>" alt="" />
                                                    <!--<img class="main-image" src="<?php echo base_url('assets/uploads/products_images') .'/'. $products->image; ?>" alt="" />-->
                                                </a>
                                                <!--<span class="percentage">20%</span>-->
                                                <a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>" class="quickview" data-link-action="quickview"
                                                    title="Quick view"><i class="fi-rr-eye"></i></a>
                                                    <div class="ec-pro-actions">
                                                
                                                        <form method="post" action="<?php echo base_url();?>Cart/addToCart">
                                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $products->id?>">
                                                        <input type="hidden" name="quantity" id="quantity" value="1">
                                                        </form>
                                                </div>
                                                <!-- <div class="ec-pro-actions">-->
                                                     
                                                <!--    <a href="compare.html" class="ec-btn-group compare"-->
                                                <!--        title="Compare" style="    border-top-left-radius: 10px;-->
                                                <!--border-top-right-radius: 10px;"><i class="fi-rr-shopping-basket "></i></a>-->
                                                <!--</div>-->
                                            </div>
                                        </div>

                                        <div class="ec-pro-content">
                                         <h5 class="ec-pro-title"><a href="<?php echo base_url();?>Category/view_products/<?php echo base64_encode($products->id) ?>"><?php echo $products->product_name ?></a></h5>
                          		<span class="ec-price">
                                              <?php
											  $product_prize=getProductPrize($products->id);

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
                                                    <!--<div class="ec-pro-color">-->
                                                    <!--<span class="ec-pro-opt-label">Color</span>-->
                                                    <!-- <ul class="ec-opt">-->
                                                    <!--</?php $show_color = get_available_colours($products->id); ?>-->
                                                    <!-- </?php foreach ($show_color as $colour) { -->
                                                    <!--$style=$colour->colour_code;?>-->
                                                    <!-- <li class="active"><a href="#" class="ec-opt-clr-img"-->
                                                    <!--data-tooltip="Gray"><span-->
                                                    <!--style="background-color:</?php echo $style ?>; border: 1px solid black;"></span></a></li>-->
                                                    <!--</?php } ?>-->
                                                    <!--</ul>-->
                                                    <!--</div>-->
                                                     <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                 <ul class="">
                                                    <?php $available_colors=getProductVariantColour($products->id); foreach ($available_colors as $res){ ?>
                                                        <li class="active">
                                                            <span style="background-color:<?php echo $res->colour_code; ?>;border: 1px solid black;"></span>
                                                       </li>
                                                   <?php } ?>
                                                  </ul>
                                                </div>
                                                 <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                     <ul class="ec-opt-size">
                                                         <?php $available_size=getProductVariantSize($products->id); foreach ($available_size as $res){ ?>
                                                        <li class="active"><a href="#" class="ec-opt-sz" data-tooltip="<?php echo $res->size ?>"><?php echo $res->size_name ?></a></li>
                                                        <?php } ?>
                                                     </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
          <?php endforeach; ?>
           
                        </div>
          </div>
          <?php }
          else{?>
               <h3 class="empty">There are no products currently in stock</h3>
           <?php }?>
          
          
          