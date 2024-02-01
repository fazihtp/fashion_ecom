<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<style>
    .form-control {
    border-color: #c9bebe!important;
}
</style>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2">
						<h1>Invoice</h1>
						<p class="breadcrumbs"><span><a href="#">List</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>Invoice
						</p>
					</div>
					<div class="card invoice-wrapper border-radius border bg-white p-4">
						<div class="d-flex justify-content-between">
						<h3 class="text-dark font-weight-medium">
                            Order No: <?php echo isset($order_list->order_id) ? $order_list->order_id : 'N/A'; ?>
                        </h3>
                       
							</div>
                         <div id="print_div">
						<div class="row pt-5">
						    <div class="col-xl-6 col-lg-6 col-sm-6">
							<p class="text-dark mb-2">Details</p>

								<address>
									<!--<span>Invoice ID:</span>-->
									<!--<span class="text-dark">#2365546</span>	<br>-->
								<span>Date :</span> <?php
                                    if (!empty($order_list->created_at)) {
                                        echo date('F d, Y', strtotime($order_list->created_at));
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
								</address>
							</div>
							 <div class="col-xl-6 col-lg-6 col-sm-6">
							<!--<p class="text-dark mb-2">Tracking ID:	<span class="text-dark">#15465</span></p>-->
                            
								<address>
								     <img class="invoice-item-img" src="<?php echo base_url() . $barcodeImage ?>" alt="Barcode" style="width:110px">
									<!--<img  src="?php echo base_url();?>assets/uploads/bar_code/images.png" alt="product-image">-->
								
								</address>
							</div>
							<div class="col-xl-6 col-lg-6 col-sm-6">
								<p class="text-dark mb-2">To</p>

								<address>
									<span style="text-transform: capitalize;"><?php echo isset($order_list->from_name) ? $order_list->from_name : 'N/A'; ?></span>
									<br> <?php echo isset($order_list->from_house_name) ? $order_list->from_house_name : ''; ?>
									<!--<br> <php echo isset($order_list->from_street_name) ? $order_list->from_street_name : ''; ?>-->
									<!--<br> <php echo isset($order_list->from_post_address) ? $order_list->from_post_address : ''; ?>-->
									<!--<br > ?php echo isset($order_list->from_address) ? $order_list->from_address : ''; ?>-->
									<br>  <?php echo isset($order_list->from_pin) ? $order_list->from_pin : ''; ?>
									<?php echo isset($order_list->from_district) ?'<br> ' . $order_list->from_district : ''; ?>
									<?php echo isset($order_list->from_state) ?'<br> ' . $order_list->from_state : ''; ?>
								    <!--<br>  ?php echo isset($order_list->from_district) ? $order_list->from_district : ''; ?>-->
								    <!--<br>  ?php echo isset($order_list->from_country) ? $order_list->from_country : ''; ?>-->
									<!--<br> <span>Email:</span>  ?php echo isset($order_list->from_mail_id) ? $order_list->from_mail_id : ''; ?>-->
									<br> <span>Phone:</span>  <?php echo isset($order_list->from_phone) ?'<br> ' . $order_list->from_phone : ''; ?>
								</address>
							</div>
							
							<!--<div class="col-xl-6 disp-none"></div>-->
							
						</div>

						<div class="table-responsive">
							<table class="table mt-3 table-striped table-responsive table-responsive-large inv-tbl"
								style="width:100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Image</th>
										<th>Product</th>
										<th>In Stock</th>
										<th>Quantity</th>
										</tr>
								</thead>

								<tbody>
							    <?php $i=1; foreach ($lists as $products){ ?>
									<tr>
										<td><?=  $i ?></td>
										<td><img class="invoice-item-img" src="<?php echo base_url(); ?>assets/uploads/products_images/<?php echo $products->image; ?>" alt="product-image" /></td>
										<td><?php echo $products->product_name ?></td>
										
                                   
								       <td><?= $products->stock ?? 0; ?></td>

										<td><?php echo isset($products->quantity) ? $products->quantity : ''; ?></td>
									</tr>
									<?php  $i++; } ?>
                                </tbody>
							</table>
						</div>
						</div>
                	</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
<div class="modal fade modal-add-contact" id="addVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<form method="post" action="<?php echo base_url();?>Orders/editOrderAddress">
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Address</h5>
									</div>
									
									<div class="modal-body px-4">
										<div class="row mb-2">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="firstName">From name</label>
													<input type="text" class="form-control" name="from_name" id="from_name" value="<?php echo isset($order_list->from_name) ? $order_list->from_name : 'N/A'; ?>">
														<input type="hidden" class="form-control" name="from_id" value="<?php echo isset($order_list->from_id) ? $order_list->from_id : 'N/A'; ?>">
												</div>
											</div>
								
											<div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">To Name</label>
													<input type="hidden" class="form-control" name="to_id" value="<?php echo isset($order_list->to_id) ? $order_list->to_id : 'N/A'; ?>">
													<input type="text" class="form-control" name="to_name" value="<?php echo isset($order_list->to_name) ? $order_list->to_name : 'N/A'; ?>">
												</div>
											</div>
										<input type="hidden"	value="<?php echo isset($order_list->order_id) ? $order_list->order_id : 'N/A'; ?>" >
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="userName">From Phone No</label>
													<input type="text" class="form-control" id="from_phone" name="from_phone" value="<?php echo isset($order_list->from_phone) ? $order_list->from_phone : ''; ?>">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="userName">To Phone No</label>
													<input type="number" class="form-control" id="to_phone" name="to_phone" value="<?php echo isset($order_list->to_phone) ? $order_list->to_phone : ''; ?>">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="Birthday">From Address</label>
												<textarea  class="form-control" id="from_address" name="from_address" >  <?php echo isset($order_list->from_house_name) ? $order_list->from_house_name : ''; ?><?php echo isset($order_list->from_address) ? $order_list->from_address : ''; ?>,<?php echo isset($order_list->from_street_name) ? $order_list->from_street_name : ''; ?>,<?php echo isset($order_list->from_post_address) ? $order_list->from_post_address : ''; ?></textarea>
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">To Address</label>
													<textarea  class="form-control" id="to_address" name="to_address" >  <?php echo isset($order_list->to_house_name) ? $order_list->to_house_name : ''; ?><?php echo isset($order_list->to_address) ? $order_list->to_address : ''; ?>,<?php echo isset($order_list->to_street_name) ? $order_list->to_street_name : ''; ?>,<?php echo isset($order_list->to_post_address) ? $order_list->to_post_address : ''; ?></textarea>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="firstName">From PIN</label>
													<input type="text" class="form-control" name="from_pin" id="from_pin" value=" <?php echo isset($order_list->from_pin) ? $order_list->from_pin : ''; ?>">
												</div>
											</div>
													
											<div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">To PIN</label>
													<input type="text" class="form-control" name="to_pin" id="to_pin" value=" <?php echo isset($order_list->to_pin) ? $order_list->to_pin : ''; ?>">
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group">
													<label for="firstName">From State</label>
													<input type="text" class="form-control" name="from_state" id="from_state" value="<?php echo isset($order_list->from_state) ? $order_list->from_state : ''; ?>">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">To State</label>
													<input type="text" class="form-control" name="to_state" id="to_state" value="<?php echo isset($order_list->to_state) ? $order_list->to_state : ''; ?>">
												</div>
											</div>
												<div class="col-lg-6">
												<div class="form-group">
													<label for="firstName">From District</label>
													<input type="text" class="form-control" name="from_district" id="from_district" value="<?php echo isset($order_list->from_district) ? $order_list->from_district : ''; ?>">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">Alternative No</label>
													<input type="text" class="form-control" name="to_district" id="to_district" value="<?php echo isset($order_list->to_district) ? $order_list->to_district : ''; ?>">
												</div>
											</div>
										</div>
									</div>
									
									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill">Update Address</button>
									</div>
								</form>
							</div>
						</div>
					</div>
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>

	<script>
	
	</script>