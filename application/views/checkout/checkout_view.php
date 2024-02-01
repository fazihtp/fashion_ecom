<?php echo $this->load->view('includes/header.php','',TRUE);?>
<style>
    textarea {
    background-color: transparent;
    border: 1px solid #ededed;
    color: #444444;
    font-size: 14px;
    margin-bottom: 26px;
    padding: 0 15px;
    width: 100%;
    outline: none;
    height: 100px;
}
.select {
    border: solid 1px #e2e1e1;
}
.col-md-12 {
    margin-bottom: 26px;
}
.ec-bl-block-content22 {
    margin-block: 29px;
}
span#cart_amount {
    font-family: ui-serif;
}
span#shipping_charge {
    font-family: ui-serif;
}
span#total_amount11 {
    font-family: ui-serif;
}
@media only screen and (max-width: 991px) {
    .checkout_page .ec-sidebar-wrap {
        margin-bottom: 60px;
        padding: 14px;
    }
}
</style>
 </head>

<body class="checkout_page">

    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="row ec_breadcrumb_inner">

                        <div class="col-md-6 col-sm-12">

                            <h2 class="ec-breadcrumb-title">Checkout</h2>

                        </div>

                        <div class="col-md-6 col-sm-12">

                            <!-- ec-breadcrumb-list start -->

                            <ul class="ec-breadcrumb-list">

                                <li class="ec-breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>

                                <li class="ec-breadcrumb-item active">Checkout</li>

                            </ul>

                            <!-- ec-breadcrumb-list end -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Ec breadcrumb end -->



    <!-- Ec checkout page -->

 <section class="ec-page-content section-space-p">

        <div class="container">
                <form  id="myform" action="<?= base_url(); ?>Checkout/postCheckout" method="post">
                                               
               <div class="row">

                <div class="ec-checkout-leftside col-lg-12 col-md-12 ">

                    <!-- checkout content Start -->

                    <div class="ec-checkout-content">

                        <div class="ec-checkout-inner">

                            <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                                <div class="row">
                                <div class="ec-checkout-block ec-check-bill col-lg-6 col-md-12">
                                  
                                    <h3 class="ec-checkout-title">Billing Address</h3>

                                    <div class="ec-bl-block-content22">



                                           <div class="ec-check-bill-form">
                                            
                                                <span class="ec-bill-wrap ec-bill-half">
                                                   
                                                    <label>Name*</label>
												<input type="hidden" name="id" id="id" >
 
												     <input type="text" name="name" id="name"

													 placeholder="Enter name" />

                                                </span>
                                                <span class="ec-bill-wrap ec-bill-half">
                                                    <label>Phone Number*</label>
                                                    <input type="number" name="phone" id="from_phone_number"   placeholder="Enter  Phone Number"/>
                                                </span>
                                               
                                                <span class="ec-bill-wrap ec-bill-half">
                                                    <label>Postal Code*</label>
                                     <input type="number" name="pin_code" id="from_postal_code"  placeholder="Enter  Postal Code"
			                               />
                                                </span>
                                                
                                                <span class="ec-bill-wrap ec-bill-half">
                                                    <label>District*</label>
                          <input type="text" name="district" id="from_district" placeholder="Enter  District">
                                                </span>
                                                 </div>
                                                 <div class="col-md-12">

											       <div class="ec-cart-summary-bottom">
 
											   <div class="ec-cart-summary">

											      <div class="ec-cart-summary-total">
                            <div>
                     	<?php $i=1;$totalAmount = 0; ?>
											<input type="hidden" id="total_amount" name="total_amount" value="<?= $totalAmount ?>" >
                 </div>
											   <!--<span class="text-right">Total Amount</span>-->

											   <!--<span class="text-right" name="total_amount1" >₹ <?php echo $totalAmount ?></span>-->

											 </div>

											

											</div>

											</div>
										</span>
                                        </div> 



                                    </div>

                                </div>

                                <div class="ec-checkout-block ec-check-bill col-lg-6 col-md-12" style="margin-top: -42px;>
                                  
                
                                    <div class="ec-bl-block-content">

                                        <div class="ec-check-subtitle"  style="color:white">C</div>

                                        <span class="ec-bill-option">

                                            <span>
                                                   <label for="bill1" style="color:white">U</label>

                                            </span>

                                            <span>
                                                    </span>

                                        </span>
                            
                                           <div class="ec-check-bill-form">
                                                <span class="ec-bill-wrap ec-bill-half">
                                                    <label>House Name*</label>
                                                 
														<input type="hidden" name="id" id="id" value="">

												     <input type="text" name="house_name" id="to_name"

													 placeholder="Enter House name" value="" required/>

                                                </span>
                                                <span class="ec-bill-wrap ec-bill">
                                                    <label>City*</label>
                                                    <input type="text" name="street_name" id="to_phone_number" placeholder="Enter City" required/>
                                                    <!--<input type="number" name="to_phone_number" id="to_phone_number" value="" placeholder="Enter their phone Number"  />-->

                                                </span>
                                             
                                                  <div class="col-md-12">
                                            <label>State*</label>
                                             <div class="select">
                                             <select class="form-select" name="state" id="to_state" required style="margin-top: 10px;>
                                                     <option value="">Select their state</option>
                                                    <?php foreach ($states as $state) { ?>
                                                        <option   value="<?php echo $state->state_id; ?> "><?php echo $state->state_title; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                       <span class="ec-bill-wrap ec-bill-half">
                                                    <label>Alternative No:</label>
                                                    <input type="text" name="alter_na_no" id="alter_na_no" value=""  placeholder="Enter  Alternative No "/>
                                                </span>  </div>
                                                <div class="col-md-12">

											       <div class="ec-cart-summary-bottom">
 
											   <div class="ec-cart-summary">

											      <div class="ec-cart-summary-total">
                            <div>
                     	<?php $i=1;$totalAmount = 0;
										 ?>
											<!--<input type="hidden" id="total_amount" name="total_amount" value="<= $totalAmount ?>" >-->
											
										    	<input type="hidden" id="total_values" name="total_values" value="<?php echo $paying_amount?>" >
												<input type="hidden" id="shipping_charge1" name="shipping_charge1" value="" >
												<input type="hidden" id="total_amount" name="total_amount" value="<?php echo $paying_amount?>" >
                               </div>
										
											 </div>

											</div>

											</div>

											</div>
										</span>
                                        </div> 



                                    </div>

                                </div>
                                
                                 <div class="ec-checkout-rightside col-lg-12 col-md-12">
                                <div class="row">
                                <div class="ec-sidebar-wrap ec-checkout-pay-wrap col-lg-12 col-md-12" style="height: 185px;">
                                      <div class="ec-sidebar-block">


                            <div class="ec-sb-block-content">

                                <div class="ec-checkout-pay">

                                  
                            </div>
                        </div>
                    </div>
                                 <h6 class="text-right"> <span id="cart_amount"></span></h6>
                                 <h6 class="text-right"> <span id="shipping_charge"></span></h6>
                                 <h5 class="text-right"> <span id="total_amount11">Payable Amount:         ₹<?php echo $paying_amount ?></span></h5>

                                  <div class="col-md-12 mt-4">

                                        <span class="ec-check-order-btn">

                                          <button type="submit"  target="_blank" id="payNowButton" class="btn btn-primary" style="float:right">Pay Now</button>

                                        </span>
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
    </section>
    <?php echo $this->load->view('includes/footer.php','',TRUE);?>
    
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

<script>

   
function validatePhone(input) { 
    const phoneNumber = input.value;
    const regex = /^[0-9]{10}$/; 
    
    if (regex.test(phoneNumber)) {
         $('#payNowButton').prop('disabled', false);
        // input.setCustomValidity('');
    } else {
        alert("Phone number must be 10 digits")
        $('#payNowButton').prop('disabled', true);
        // input.setCustomValidity('Phone number must be 10 digits');
    }
}
function validatePinCode(input) {
    const pinCode = input.value;
    const regex = /^[0-9]{6}$/; // This regex matches exactly 6 digits
    
    if (regex.test(pinCode)) {
        $('#payNowButton').prop('disabled', false);
    } else {
        alert("Postal code must be 6 digits")
        $('#payNowButton').prop('disabled', true);
        // input.setCustomValidity('Postal code must be 6 digits');
    }
}
function validateAddress(input) {
    const address = input.value;
    
    if (address.length >= 20) {
          $('#payNowButton').prop('disabled', false);
        // Minimum 20 characters, no action required
        input.setCustomValidity('');
    } else {
        alert("Address must be at least 20 characters")
        $('#payNowButton').prop('disabled', true);
        // Less than 20 characters, set a custom validation message
        // input.setCustomValidity('Address must be at least 20 characters');
    }
}
function shipment_methods() {
    // alert("hey")
    var id = document.querySelector('input[name=shipment_method]:checked').value;
    var state = document.getElementById('to_state').value;
    var amount = '<?php echo $paying_amount ?>';
    var qty = '<?php echo $cartqtybutton ?>';
    // $('#total_amount11').val(<?php echo $paying_amount ?>);
    if (id=='' || state=='' || state === null ) {
        return;
    }
    $.ajax({
        url: "<?php echo base_url('Cart/shippingMethods'); ?>",
        data: { 'id': id, 'state': state, 'amount': amount, 'qty': qty },
        type: "post",
        success: function (response) {
            // alert(response)
            var data=JSON.parse(response);
            
            console.log("Success:", data);
            $('#cart_amount').text('Cart Amount:         ₹'   + amount);
            $('#shipping_charge').text('Shipping charge: ₹'   + data.shipping_charge);
            $('#shipping_charge1').val(data.shipping_charge);
            var ttamount=(amount+data.shipping_charge);
            
             var variable1 = parseFloat(amount);
                var variable2 = parseFloat(data.shipping_charge);
                var result = variable1 + variable2;
                $('#total_amount11').text(result);
                $('#total_values').val(result);
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        }
    });
    // console.log("qty:", qty);
    // console.log("Amount:", amount);
    // console.log("id:", id);
    // console.log("state:", state);
}

$("#myform").submit(function (event) {
        var id = document.querySelector('input[name=shipment_method]:checked').value;
        var state = document.getElementById('to_state').value;
        var amount = '<?php echo $paying_amount ?>';
        var qty = '<?php echo $cartqtybutton ?>';
        if (id=='' || state=='' || state === null ) {
            alert("State / Shipment method is missing!");
            event.preventDefault();
        }
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url('Cart/shippingMethods'); ?>",
            data: { 'id': id, 'state': state, 'amount': amount, 'qty': qty },
            type: "post",
            success: function (response) {
                var data=JSON.parse(response);
                console.log("Success:", data);
                $('#cart_amount').text('Cart Amount:         ₹'   + amount);
                $('#shipping_charge').text('Shipping charge: ₹'   + data.shipping_charge);
                $('#shipping_charge1').val(data.shipping_charge);
                var ttamount=(amount+data.shipping_charge);
                var variable1 = parseFloat(amount);
                var variable2 = parseFloat(data.shipping_charge);
                var result = variable1 + variable2;
                $('#total_amount11').text(result);
                $('#total_values').val(result);
                $("#myform")[0].submit();
            },
            error: function (xhr, status, error) {
                alert("Please try again!");
                event.preventDefault();
            }
        });
    
});

</script>

</html>