<?php if (!empty($products)) { ?>
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
                                <?php } ?><?php } else { ?>
    <h3>No products are available in this category.</h3>
<?php } ?>
                                