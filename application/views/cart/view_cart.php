<?php echo $this->load->view('includes/header.php','',TRUE);?>
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

                            <h2 class="ec-breadcrumb-title">Cart</h2>

                        </div>

                        <div class="col-md-6 col-sm-12">

                            <!-- ec-breadcrumb-list start -->

                            <ul class="ec-breadcrumb-list">

                                <li class="ec-breadcrumb-item"><a href="<?php echo base_url();?>Home/index">Home</a></li>

                                <li class="ec-breadcrumb-item active">Cart</li>

                            </ul>

                            <!-- ec-breadcrumb-list end -->

                        </div>

                    </div>

                </div>

            </div>

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
                                        <li><a href="<?php echo base_url();?>Cart">Cart</a></li>
                                        
                                        <li><a href="<?php echo base_url()?>User/view_myorder">My Order</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php if($cart == null): ?>
                
                    <div class="emptycart">
                
                    <h3>YOUR CART IS EMPTY</h3>
                
                     <div class="ec-sidebar-wrap text-md-center mt-2">
                
                    <a href="<?php echo base_url() . 'home/' ?>" class="">Continue Shopping</a>
                
                </div>
                
                </div>
                
                    <?php else:{ ?>

                <div class="ec-shop-rightside col-lg-9 col-md-12">

                    <!-- cart content Start -->
					<div class="ec-cart-content">
						<div class="ec-cart-inner">
							<div class="row">
								<form action="#" method="get" >
									<div class="table-content cart-table-content">
										<table class="cartTable">
											<thead>
											<tr>
												<th>Product</th>
												<th></th>
												<th>Price </th>
												<!-- <th>Variant</th> -->
												<th style="text-align: center;">Quantity</th>
												<th>Total</th>
												<th></th>
											</tr>
											</thead>
											<tbody>
										<?php $i=1;$totalAmount = 0;$payingAmount=0;
										foreach ($cart as $rec):?>
											    
												<td data-label="Product" class="ec-cart-pro-name"><a href="<?php echo base_url(); ?>Category/view_products/<?php echo base64_encode($rec->product_id); ?>">
														<img
															class="ec-cart-pro-img mr-4"
															src="<?php echo base_url();
															?>assets/uploads/products_images/<?= $rec->image ?>" alt="" /><?= $rec->product_name ?></a></td>
												<td>
                                                <?php
        if ($rec->quantity > $rec->in_stock) {
            $style = "color: red;";
            $content = "Out Of Stock";
            
        } else {
            $style = "color: green;";
            $content = "In Stock";
            $payingAmount=$payingAmount+$rec->price*$rec->quantity;
        }
        echo "<span class='ec-single-progress-desc' style='$style'>$content</span>";
  
    ?>
												    	
  
</td>
												<td data-label="Price" class="ec-cart-pro-price"><span
														class="amount">
													
													</span>
													<input id="single_price<?php echo $rec->id; ?>"  type="hidden"
														   value="<?= $rec->price; ?>"/>
													₹<?= $rec->price?></td>
												<!-- <td data-label="Colour" class="ec-cart-pro-subtotal">Blue </td> -->
                                                
												<td data-label="Quantity" class="ec-cart-pro-qty" style="text-align: center;">
												
													<?= $rec->quantity ?>
												</td>
                                                <input id="my-total<?php echo $rec->id ?>" class="totalCartAmount" type="hidden"
														   value="<?= $rec->price *
												$rec->quantity ?>"/>
												<td data-label="Total" class="ec-cart-pro-subtotal 1" id="my-span<?php echo $rec->id ?>">₹ <?= $rec->price *
												$rec->quantity ?></td>
												
												<td data-label="Remove" class="ec-cart-pro-remove">
												<a  data-bs-target='#deleteModal' data-bs-toggle='modal' onclick="delete_category('<?php echo $rec->id; ?>')"><i class="ecicon eci-trash-o"></i></a>
												</td>
											</tr>
											<?php $quantity=$rec->price*$rec->quantity; $i++;$totalAmount += $quantity ;

										endforeach; ?>
                                 
											</tbody>
										</table>
									</div>
									<div class="row">
									    	<div class="col-lg-12">
											<div class="ec-cart-update-bottom">
												<a href="#"></a>
												 <h5 class="text-left">Total: <span id="totalAmount1">₹</span></h5>
												 <input type="hidden" class="tot" value=""/>
												<!--<button class="btn btn-primary">Check Out</button>-->
											</div>
										</div>
									<div class="col-lg-12">
											<div class="ec-cart-update-bottom">
												<a href="#"></a>
												 <h5 class="text-left">Amount Payable: <span id="paying">₹<?php echo $payingAmount?></span></h5>
												 <input type="hidden" class="tot" value=""/>
												 <!--<input type="hidden" name="paying_amount" value="</php echo $payingAmount?>"/>-->
												<!--<button class="btn btn-primary">Check Out</button>-->
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="ec-cart-update-bottom">
												<a href="<?php echo base_url();?>Home">Continue Shopping</a>
												<a style="text-decoration:none;color:#fff;" href="<?php echo base_url();?>Cart/postCart"  class="btn btn-primary">Check Out</a>
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

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



            </div>

        </div>

    </section>

<?php }endif; ?>

<?php echo $this->load->view('includes/footer.php','',TRUE);?>


			



             <!--delete__model-->

             	<div class="modal fade zoomIn" id="deleteModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">

                              <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                  <div class="modal-header">

                                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">

                                    </button>

                                  </div>

                                  <div class="modal-body p-5 text-center">

                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Cart/deleteFromCart">

                                 <!--<div class="icon-box">-->

                        				<i class="ecicon eci-trash-o" style="font-weight: 1000;height: -30px;
                        				font-size: 58px;color:black;}"></i>

                        				<!--</div>	-->

                                  <div class="mt-4 text-center">

                                    <input type="hidden"  name="id" id="category_id">

                                    <h4 class="fs-semibold">You are about to remote a  product?</h4>

                                    <p class="text-muted fs-14 mb-4 pt-1">Removing a product will
										remove	from your cart.</p>

                                    <div class="hstack gap-2 justify-content-center remove">

                                      <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"  > <i class="ri-close-line me-1 align-middle"></i> Close </button>

                                      <button type="submit" class="btn btn-danger" id="delete-record" >Yes, Delete It!!</button>

                                    </div>

                                  </div>

                                </form>

                              </div>

                            </div>

                          </div>

                        </div>	
<script>
    $(document).ready(function() {
        var savedData = {};

        $("#account2").on("click", function() {
            $("input[type=text], textarea").each(function() {
                savedData[this.name] = $(this).val();
                $(this).val("");
            });
        });
  calculateTotalAmount();
  
 });
        $("#account1").on("click", function() {
            showData();
        });
   
      
        
        function calculateTotalAmount() {
            var sum = 0;
            $(".totalCartAmount").each(function() {
                sum += +$(this).val();
            });
            $(".tot").val('');
            $(".tot").val(sum);

            var myTotalSpan = '#totalAmount1';
            $(myTotalSpan).empty();
            $(myTotalSpan).text('₹' + sum);
        }

        // Assuming you have elements with the class 'changeQuantity' and data-id attribute indicating the product ID.
        $(".changeQuantity").on("change", function() {
            var id = $(this).data("id");
            changeValue(id);
        });
function changeValue(id) {
    var sing_price = '#single_price' + id;
    var label = '#cartqtybutton' + id;
    var val = $(label).val();
    var prd_price = $(sing_price).val();
    var total = val * prd_price;
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>Cart/updateCartQty',
        data: {
            id: id,
            value: val
        },
        success: function(response) {
            if (response === 'success') {
                var mySpan = '#my-span' + id;
                $(mySpan).empty();
                $(mySpan).text('₹' + total);
                var myInput = '#my-total' + id;
                $(myInput).val('');
                $(myInput).val(total);
                calculateTotalAmount();
                console.log("Success: Quantity changed for product with ID " + id);
            } else {
                alert(response); // Show the error message
                console.log("Error: " + response);
            }
        },
        error: function() {
            console.log("Error occurred while updating quantity for product with ID " + id);
        }
    });
}

        function delete_category(id){
         $("#category_id").val(id);
}   

   
</script>