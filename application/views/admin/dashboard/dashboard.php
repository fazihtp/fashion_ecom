<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<style>
    button.dt-button.buttons-excel.buttons-html5 {
    height: 38px;
    width: 69px;
    border: 1px solid;
}
a.btn.btn-soft-warning.\31 {
    padding: 0px;
    margin-top: -13px;
}
button.dt-button.buttons-pdf.buttons-html5 {
        height: 38px;
    width: 69px;
    border: 1px solid;
}
button.dt-button.buttons-print {
      height: 38px;
    width: 69px;
    border: 1px solid;
}
button.dt-button.buttons-copy.buttons-html5 {
      height: 38px;
    width: 69px;
    border: 1px solid;
}
div#customerTable_filter {
    width: 90%;
}

</style>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
				<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Dashboard</h1></h1>
							<p class="breadcrumbs"><span><a href="">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>
							</p>
						</div>
						<div>
						</div>
					</div>
						<div class="row" >
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
							    	<div class="card-header justify-content-between">
									<h2>Custom Details</h2>
									</div>
								<div class="card-body">
									<div class="table-responsive">
									 <div class="row" style="margin:20px">
						     	 
                                            <div class="col-md-2">
        								  	<label>Choose from Date</label>
        								  	<input type="date" class="form-control" name="custom_from_date" id="custom_from_date" onchange="get_custom_from_date();">
        								    </div>
                                     	    <div class="col-lg-2">
													<label for="owner-field" class="form-label">Choose to Date</label>
													<input type="date" class="form-control" name="custom_to_date" id="custom_to_date" onchange="get_custom_to_date();">
											</div> 
											<div class="col-md-1" style="margin-top: 28px;">
        							    	<button class="btn btn-info" type="button"onclick="searchCustom()">Search</button>
                                            </div>
                                            </div>
										<table id="customTable" class="table">
											<thead>
												<tr>
												    <th  style="width:15px">Sl</th>
												    <th>Order ID</th>
												    <th>User Name</th>
												    <th>Plan</th>
                                                    <th>SKU Code</th>
                                                    <th>Products</th>
                                                    <th>Non Member</th>
                                                    <th>For Member</th>
                                                    <th>Amount Paid</th>
                                                    </tr>
											</thead>
                                            <tfoot>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                             <td class="totalNon"></td>
                                              <td  class="totalFor"></td>
                                             <td class="totalPaid"></td>
                                            </tr>
                                            </tfoot>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" >
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
							    	<div class="card-header justify-content-between">
									<h2>Product Wise Sale Details</h2>
									</div>
								<div class="card-body">
									<div class="table-responsive">
									 <div class="row" style="margin:20px">
						     	 
                                            <div class="col-md-2">
        								  	<label>Choose from Date</label>
        								  	<input type="date" class="form-control" name="from_date" id="from_date" onchange="get_from_date();">
        								    </div>
                                     	    <div class="col-lg-2">
													<label for="owner-field" class="form-label">Choose to Date</label>
													<input type="date" class="form-control" name="to_date" id="to_date" onchange="get_to_date();">
											</div> 
											<div class="col-md-1" style="margin-top: 28px;">
        							    	<button class="btn btn-info" type="button"onclick="search()">Search</button>
                                            </div>
                                            </div>
										<table id="customerTable" class="table">
											<thead>
												<tr>
												    <th  style="width:15px">Sl</th>
												    <th>Product Name</th>
												    <th>SKU Code</th>
												    <th>Variant</th>
                                                    <th>In Stock</th>
                                                    <th>Total Qty Sold</th>
                                                    <th>Base Price</th>
                                                    </tr>
											</thead>
                                            <tfoot>
                                            <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th  class="totalBalanceAmount"></th>
                                             <th class="totalAm"></th>
                                            </tr>
                                            </tfoot>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 60px;">
					
							<div class="col-xl-12 col-md-12 p-b-15">
							    
							<!-- User activity statistics -->
						<div class="card card-table-border-none card-default recent-orders" id="recent-orders" >
								<div class="card-header justify-content-between">
									<h2>Users</h2>
									<div class="date-range-report">
										<span></span>
									</div>
								</div>
								<div class="row" style="margin:20px">
						     	 
                                            <div class="col-md-2">
        								  	<label>Choose from Date</label>
        								  	<input type="date" class="form-control" name="user_from_date" id="user_from_date">
        								    </div>
                                     	    <div class="col-lg-2">
													<label for="owner-field" class="form-label">Choose to Date</label>
													<input type="date" class="form-control" name="user_to_date" id="user_to_date">
											</div> 
											<div class="col-md-1" style="margin-top: 28px;">
        							    	<button class="btn btn-info" type="button" onclick="searchUser()">Search</button>
                                            </div>
                                            </div>
								<div class="card-body pt-0 pb-5">
									<table id="userProducts" class="table card-table table-responsive table-responsive-large" style="width:100%">
										<thead>
												<tr>
												    <th>Sl</th>
													<th>User Name</th>
													<th>No of Orders</th>
													<th>No Of Products Ordered</th>
                                                    <th>Total Amount</th>
												</tr>
											</thead>
									
									</table>
								</div>
							</div>
						</div>
					</div>
					
						<div class="row" style="margin-top: 60px;">
					       
							<div class="col-xl-12 col-md-12 p-b-15">
							<!-- User activity statistics -->
						<div class="card card-table-border-none card-default recent-orders" id="recent-orders" >
								<div class="card-header justify-content-between">
									<h2>Order Wise Details</h2>
									<div class="date-range-report">
										<span></span>
									</div>
								</div>
								<div class="row" style="margin:20px">
						     	 
                                            <div class="col-md-2">
        								  	<label>Choose from Date</label>
        								  	<input type="date" class="form-control" name="order_date" id="order_date">
        								    </div>
                                     	    <div class="col-lg-2">
													<label for="owner-field" class="form-label">Choose to Date</label>
													<input type="date" class="form-control" name="order_to_date" id="order_to_date">
											</div> 
											<div class="col-md-1" style="margin-top: 28px;">
        							    	<button class="btn btn-info" type="button" onclick="searchOrder()">Search</button>
                                            </div>
                                            </div>
								<div class="card-body pt-0 pb-5">
									<table id="orderTable" class="table card-table table-responsive table-responsive-large" style="width:100%">
										<thead>
												<tr>
												    <th>Sl</th>
												    <th>Order ID</th>
													<th>User Name</th>
													<th>User Phone</th>
													<th>Shipping Charge</th>
													<th>No of Products</th>
                                                    <th>Order Amount</th>
                                                    <th>Total Amount</th>
                                                    <th>Ordered On</th>
												</tr>
											</thead>
								            <tfoot>
                                            <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th  class="totalShipping"></th>
                                            <th  class="totalProducts"></th>
                                            <th  class="totalAmount"></th>
                                            <th  class="totalOrderAm"></th>
                                            <th  class="order_date"></th>
                                             
                                            </tr>
                                            </tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- Add User Modal  -->
				</div> <!-- End Content -->
			</div>
		
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
				</div> 
<!-- jQuery -->
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.css">
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.js"></script>
<script src="<?=base_url();?>admin_assets/jquery_files/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>admin_assets/jquery_files/buttons.print.min.js"></script>
<script src="<?=base_url();?>admin_assets/jquery_files/buttons.html5.min.js"></script>
<script src="<?=base_url();?>admin_assets/jquery_files/pdfmake.min.js"></script>
<script src="<?=base_url();?>admin_assets/jquery_files/vfs_fonts.js"></script>
<script src="<?=base_url();?>admin_assets/jquery_files/jszip.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
        $('#customTable').DataTable({
        dom: 'Bfrtip',
        "pagingType": "full_numbers",
        "pageLength": -1,
        "lengthMenu": [[10, 20, 50, 75, -1], [10, 20, 50, 75, "All"]],
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': false,
        'scrollY': false,
        'ajax': {
            'url': '<?=base_url()?>Dashboard/getCusOrderList',
            'type': 'POST',
            'data': function(d) {
                d.from_date = $("#custom_from_date").val();
                d.to_date = $("#custom_to_date").val();
            },
                   dataFilter: function(response) {
            var json_response = JSON.parse(response);
            if (json_response.recordsTotal) {
                $(".totalNon").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalNon+'</strong></font>');
                $(".totalFor").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalFor+'</strong></font>');
                $(".totalPaid").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalPaid+'</strong></font>');
                $(".total_pd").html('<font size="3px;" color="#FF0000"><strong> '+json_response.total_pd+'</strong></font>');
            }
            return response;
        }, 
        },
        'buttons': [
            'copy', 'excel', 'pdf', 'print',
        ],
    });
    
    $('#customerTable').DataTable({
        dom: 'Bfrtip',
        "pagingType": "full_numbers",
        "pageLength": -1,
        "lengthMenu": [[10, 20, 50, 75, -1], [10, 20, 50, 75, "All"]],
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': false,
        'scrollY': false,
        'ajax': {
            'url': '<?=base_url()?>Dashboard/getProductList',
            'type': 'POST',
            'data': function(d) {
                d.from_date = $("#from_date").val();
                d.to_date = $("#to_date").val();
            },
                   dataFilter: function(response) {
            var json_response = JSON.parse(response);
            if (json_response.recordsTotal) {
                $(".totalBalanceAmount").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalOrders+'</strong></font>');
                $(".totalAm").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalAm+'</strong></font>');
            }
            return response;
        }, 
        },

        'buttons': [
            'copy', 'excel', 'pdf', 'print',
        ],
    });
 $('#userProducts').DataTable({
    "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    'processing': true,
    'serverSide': true,
    'serverMethod': 'post',
    'ajax': {
      'url': '<?= base_url("Dashboard/getUserList") ?>',
      'type': 'POST',
      'data': function(d) {
                d.from_date = $("#user_from_date").val();
                d.to_date = $("#user_to_date").val(); 
          },
    },
  });
    $('#orderTable').DataTable({
        dom: 'Bfrtip',
        "pagingType": "full_numbers",
        "pageLength": -1,
        "lengthMeorderTablenu": [[10, 20, 50, 75, -1], [10, 20, 50, 75, "All"]],
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': false,
        'scrollY': false,
         "paging": false,
        'ajax': {
            'url': '<?=base_url()?>Dashboard/getOrderAmount',
            'type': 'POST',
            'data': function(d) {
                d.from_date = $("#order_date").val();
                d.to_date = $("#order_to_date").val();
            },
                    dataFilter: function(response) {
            var json_response = JSON.parse(response);
            // alert(response)
            if (json_response.recordsTotal) {
                $(".totalShipping").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalShipped+'</strong></font>');
                $(".totalProducts").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalProducts+'</strong></font>');
                $(".totalAmount").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalOrder+'</strong></font>');
                $(".totalOrderAm").html('<font size="3px;" color="#FF0000"><strong> '+json_response.totalAmount+'</strong></font>');
            }
            return response;
        }, 
        },

        'buttons': [
            'copy', 'excel', 'pdf', 'print',
        ],
    });
});

function search(){
        $('#customerTable').DataTable().ajax.reload();
    }
function searchOrder(){
        $('#orderTable').DataTable().ajax.reload();
    }
function searchUser(){
        $('#userProducts').DataTable().ajax.reload();
    }
function searchCustom(){
        $('#customTable').DataTable().ajax.reload();
    }
function custom_from_date(){
        $('#customTable').DataTable().ajax.reload();
    }
function custom_to_date(){
        $('#customTable').DataTable().ajax.reload();
    }
 </script>