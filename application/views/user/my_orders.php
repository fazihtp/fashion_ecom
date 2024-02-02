



     <?php echo $this->load->view('includes/header.php','',TRUE);?>



<!--</?php echo $this->load->view('includes/header.php','',TRUE);?>-->

    <!-- Ec breadcrumb start -->

    <style>

        a.btn.btn-primary.btn-jittery {

    text-decoration: none;

}

.underline-link {

    text-decoration: underline;

}

h3 {

    font-size: 30px;

    text-align: center;

}

		#style2 {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			background-color: transparent;
			width: 55px;
			height: 30px;
			border: none;
			cursor: pointer;
		}
		#style2::-webkit-color-swatch {
			border-radius: 50%;
			border: 7px solid #000000;
		}
		#style2::-moz-color-swatch {
			border-radius: 50%;
			border: 7px solid #000000;
		}


    </style>

    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="row ec_breadcrumb_inner">

                        <div class="col-md-6 col-sm-12">

                            <h2 class="ec-breadcrumb-title">My Orders</h2>

                        </div>

                        <div class="col-md-6 col-sm-12">

                            <!-- ec-breadcrumb-list start -->

                            <ul class="ec-breadcrumb-list">

                               <li class="ec-breadcrumb-item"><a href="<?php echo base_url();?>Home/index">Home</a></li>

                                 <li class="ec-breadcrumb-item active">My Orders</li>

                            </ul>

                            <!-- ec-breadcrumb-list end -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Ec breadcrumb end -->

    <!-- Ec cart page -->

    

</div>

</div>

 

    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">

        <div class="container">

            <div class="row">
                   <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap ec-border-box">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <!-- <div class="ec-vendor-block-bg"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                    <h5>Mariana Johns</h5>
                                </div> -->
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>User/dashboard">User Profile</a></li>
                                        <!--<li><a href="user-history.html">History</a></li>-->
                                        <!--<li><a href="wishlist.html">Wishlist</a></li>-->
                                        <li><a href="<?php echo base_url();?>Cart">Cart</a></li>
                                        
                                        <li><a href="<?php echo base_url()?>User/view_myorder">My Order</a></li>
                                        <!--<li><a href="track-order.html">Track Order</a></li>-->
                                        <!--<li><a href="user-invoice.html">Invoice</a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ec-shop-rightside col-lg-9 col-md-12">

                    <!-- cart content Start -->
					<div class="ec-cart-content">
						<div class="ec-cart-inner">
							<div class="row">
							<?php if($orders==null){ ?>
							<div class="emptycart">
                
                    <h3>No products have been ordered.</h3>
                
                     <div class="ec-sidebar-wrap text-md-center mt-2">
                
                    <a href="<?php echo base_url() . 'home/' ?>" class="">Continue Shopping</a>
                
                </div>
                
                </div>
                <?php } else{ ?>
									<div class="table-content cart-table-content">
										<table class="cartTable">
											<thead>
									    <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Date</th>
                                            <!-- <th scope="col">Shipping Charge</th> -->
                                            <th scope="col">Product Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
											</thead>
										<tbody>
										    <?php foreach ($orders as $order): ?>
                                                <tr>
                                                    <td data-label="Order Id" class="ec-cart-pro-price"><span class="amount"><?php echo $order->id?></span></td>
                                                    <td data-label="Date" class="ec-cart-pro-price">
                                                        <span class="amount"><?php echo date('d-m-Y h:i A', strtotime($order->created_at)); ?></span>
                                                    </td>
                                                    <td data-label="Product Amount" class="ec-cart-pro-subtotal">₹ <?php echo $order->total_amount?></td>
                                                    <!-- <td data-label="Shipping Charge" class="ec-cart-pro-subtotal">₹ <?php echo $order->shipping_amount?></td> -->
                                                    <td data-label="Status" class="ec-cart-pro-subtotal"><?php echo $order->order_status?></td>
                                                    <td data-label="" class="ec-cart-pro-subtotal">
                                                         <span class="tbl-btn"><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>User/my_order/<?php echo  base64_encode($order->id) ?>">View</a></span>
                                                     </td>
                                                </tr>
                                                 <?php endforeach; ?>
                                            </tbody>
										</table>
									</div>
							
							<?php } ?>
							
							</div>
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

</div>



            </div>

        </div>

    </section>



<?php echo $this->load->view('includes/footer.php','',TRUE);?>


			



             <!--delete__model-->

             
