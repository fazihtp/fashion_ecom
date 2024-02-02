



     <?php echo $this->load->view('includes/header.php','',TRUE);?>

<script src="https://kit.fontawesome.com/72a96b6cc8.js" crossorigin="anonymous"></script>

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
							
									<!--<div class="table-content cart-table-content">-->
									<!--	<table class="cartTable">-->
									<!--		<thead>-->
									<!--    <tr>-->
         <!--                                   <th scope="col">Order Id</th>-->
                                            <!--<th scope="col">Image</th>-->
                                            <!--<th scope="col">Name</th>-->
         <!--                                   <th scope="col">Date</th>-->
         <!--                                   <th scope="col">Price</th>-->
         <!--                                   <th scope="col">Status</th>-->
         <!--                                   <th scope="col"></th>-->
         <!--                               </tr>-->
									<!--		</thead>-->
									<!--	<tbody>-->
									<!--	    <?php foreach ($orders as $order): ?>-->
         <!--                                       <tr>-->
         <!--                                           <td data-label="Order Id" class="ec-cart-pro-price"><span class="amount"><?php echo $order->id?></span></td>-->
                                                 <!--   <td data-label="Product" class="ec-cart-pro-name"><a href="?php echo base_url(); ?>Category/view_products/?php echo base64_encode($order->product_id) ?>"><img class="ec-cart-pro-img mr-4" src="?php echo base_url(); ?>assets/uploads/products_images/?= $order->image ?>" alt=""> ?php echo $order->product_name?>-->
                                                 <!--<p>(?php echo $order->colors?>, ?php echo $order->size?>)</p>-->
                                                 <!--   </a>-->
            
                                                 <!--   </td>-->
                                                    
         <!--                                         <td data-label="Date" class="ec-cart-pro-price">-->
         <!--                                               <span class="amount"><?php echo date('d-m-y', strtotime($order->created_at)); ?></span>-->
         <!--                                           </td>-->
                                                
         <!--                                           <td data-label="Price" class="ec-cart-pro-subtotal">₹ <?php echo $order->total_amount?></td>-->
                                                    
         <!--                                            <td data-label="Status" class="ec-cart-pro-subtotal"><?php echo $order->order_status?></td>-->
                                                     
         <!--                                            <td data-label="" class="ec-cart-pro-subtotal">-->
         <!--                                                <span class="tbl-btn"><a class="btn btn-lg btn-primary" href="<?php echo base_url();?>User/my_order/<?php echo  base64_encode($order->id) ?>">View</a></span>-->
         <!--                                            </td>-->
                                                   
         <!--                                       </tr>-->
                                             
                                          
         <!--                                        <?php endforeach; ?>-->
         <!--                                   </tbody>-->
									<!--	</table>-->
									<!--</div>-->
							 <div class="ec-vendor-card-body padding-b-0">
                            <div class="page-content">
                                <div
                                                    class="text-95 col-sm-6 align-self-start d-sm-flex">
                                                    <hr class="d-sm-none" />
                                                    <div class="text-grey-m2">

                                                        <div class="my-2"><span class="text-600 text-90">Order ID : </span>
                                                            <?php echo isset($order_list->order_id  ) ? $order_list->order_id : ''; ?></div>
                                                        <div class="my-2"><span class="text-600 text-90">Issue Date :
                                                         </span> <?php echo isset($order_list->created_at) ? date('F d, Y', strtotime($order_list->created_at)) : 'N/A'; ?></div>
                                                       

                                                    </div>
                                                </div>
                                        <!--         
                                        <div class="toast" data-autohide="true" style="background: black;">-->
                                        <!--  <div class="toast-header"style="background: black;">-->
                                        <!--    <strong class="mr-auto"></strong>-->
                                        <!--    <small class="text-muted"></small>-->
                                        <!--    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="toast_close()"><span style="color: white" aria-hidden="true">&times;</span></button>-->
                                        <!--  </div>-->
                                        <!--  <div class="toast-body" style="color: white" 	>-->
                                              
                                        <!--           Tracking ID Copied-->
                                               
                                                 
                                            <!--Please select a Size and Colour to proceed-->
                                        <!--  </div>-->
                                        <!--</div>-->
                                <!--<div class="page-header text-blue-d2">-->
                                <!--    <img src="assets/images/logo/logo.png" alt="Site Logo">-->
                                <!--</div>-->
 <div class="toast" data-autohide="true" style="background: black;">
                                          <div class="toast-header"style="background: black;">
                                            <strong class="mr-auto"></strong>
                                            <small class="text-muted"></small>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="toast_close()"><span style="color: white" aria-hidden="true">&times;</span></button>
                                          </div>
                                          <div class="toast-body" style="color: white" 	>
                                             Tracking ID Copied
                                             
                                            <!--Please select a Size and Colour to proceed-->
                                          </div>
                                        </div>
                                <div class="container px-0">
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <hr class="row brc-default-l1 mx-n1 mb-4" />

                                            <div class="row">
                                                <div class="col-sm-6">
                                                   
                                                    <div class="text-grey-m2">

                                                        <div class="my-2"> <span class="text-sm text-grey-m2 align-middle">From : </span>
                                                        <span class="text-600 text-110 text-blue align-middle"><?php echo isset($order_list->from_name) ? $order_list->from_name : 'N/A'; ?></span></div>
                                                        <div class="my-2">
                                                           <?php echo isset($order_list->from_house_name) ? $order_list->from_house_name : ''; ?>
                                                        </div>
                                                        <div class="my-2">
                                                           <?php echo isset($order_list->from_street_name) ? $order_list->from_street_name : ''; ?>
                                                        </div>
                                                        <div class="my-2">
                                                           <?php echo isset($order_list->from_post_address) ? $order_list->from_post_address : ''; ?>
                                                        </div>
                                                        
                                                        <div class="my-2">
                                                           <?php echo isset($order_list->from_pin) ? $order_list->from_pin : ''; ?>
                                                        </div>
                                                        <div class="my-2">
                                                            <?php echo isset($order_list->from_district) ? $order_list->from_district : ''; ?>
                                                        </div>
                                                        <div class="my-2">
                                                           <?php echo isset($order_list->from_state) ? $order_list->from_state : ''; ?>
                                                        </div>
                                                        <div class="my-2">
                                                           <?php echo isset($order_list->from_country) ? $order_list->from_country : ''; ?>
                                                        </div>
                                                        <div class="my-2"><b class="text-600">Phone : </b> <?php echo isset($order_list->from_phone) ? $order_list->from_phone : ''; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->

                                                <div
                                                    class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                    <hr class="d-sm-none" />
                                                    
                                                </div>
                                                <!-- /.col -->
                                            </div>

                                            <div class="mt-4">

                                                <div class="text-95 text-secondary-d3">
                                                    <div class="ec-vendor-card-table">
                                                        <table class="table ec-table">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th scope="col">SKU</th> -->
                                                                    <th scope="col">Product</th>
                                                                    <!--<th scope="col">SKU</th>-->
                                                                    <th scope="col">Qty</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php foreach ($product_list as $order): ?>
                                                                <tr>
                                                                    <td><a href="<?php echo base_url(); ?>Category/view_products/<?php echo base64_encode($order->product_id) ?>"> <?php echo $order->product_name?>
                                               
                                                    </a></td>
                                                                   <td><span><?php echo $order->quantity?></span></td>
                                                                     <td data-label="" class="ec-cart-pro-subtotal">
                                                                        <span class="tbl-btn"><a href="<?php echo base_url(); ?>Category/view_products/<?php echo base64_encode($order->product_id) ?>" class="btn btn-lg btn-primary">View</a></span>
                                                                    </td>
 <!--<td data-label="" class="ec-cart-pro-subtotal">-->
 <!--                                                                       <span class="tbl-btn"><a href="?php echo base_url(); ?>Category/view_products/<php echo base64_encode($order->product_id) ?>" class="btn btn-lg btn-primary">View</a></span>-->
 <!--                                                                   </td>-->
                                                                </tr>
                                                                 <?php endforeach; ?>
                                                                </tbody>
                                                            <tfoot>
                                                                
                                                            </tfoot>
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
							
							
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
	
function copyTrackingId() {
  const trackingIdElement = document.getElementById('trackingId');
  const trackingId = trackingIdElement.textContent;
  
  const textarea = document.createElement('textarea');
  textarea.value = trackingId;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand('copy');
  document.body.removeChild(textarea);
  $('.toast').toast('show');
//   alert('Copied');
}
function toast_close(){
    $('.toast').toast('hide');
}
</script>			



             <!--delete__model-->

             
