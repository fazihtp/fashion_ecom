<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<style>
    button.dt-button.buttons-excel.buttons-html5 {
    height: 38px;
    width: 69px;
    border: 1px solid;
}
</style>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
<div class="ec-content-wrapper">
				<div class="content">
				<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Freezed Orders</h1>
							<p class="breadcrumbs"><span><a href="">Orders</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Freezed Orders
							</p>
						</div>
						<div>
						    	<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#importExcel" > Upload Tracking ID
							</button>
						</div>
					</div>
					<div class="row" >
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
									    <form id="category-form" action="<?php echo base_url(); ?>Orders/getMultiplePdf" method="post" enctype="multipart/form-data">
									 <div class="row" style="margin:20px">
						     	 
                                    <div class="col-md-2">
        									<label>Select Settings</label>
        									<select class="form-select" id="settings_id" name="settings_id" required="" style="border-radius: 15px;}">
													 <!--<option value="0">Settings</option>-->
													 <!--<option value="1">Print Pdf</option>-->
													 <option value="2">Change To Print</option>
													 </select>
        								 </div>
        								 <input type="hidden" id="bulk_order_id"  name="bulk_order_id[]"/>
        								     <div class="col-md-1" style="    margin-top: 28px;">
        								         <button type="submit" class="btn btn-info" onclick="takeValues()" target="_blank">Apply</button>
        							    	<!--<button type="submit" class="btn btn-info" onclick="takeValues()">Apply</button>-->
                                            </div>
                                    <!--</form>-->
                                            <div class="col-md-2">
        								  	<label>Choose from Date</label>
        								  	<input type="date" class="form-control" name="from_date" id="from_date" onchange="get_from_date();">
        								    </div>
                                     	    <div class="col-lg-2">
													<label for="owner-field" class="form-label">Choose to Date</label>
													<input type="date" class="form-control" name="to_date" id="to_date" onchange="get_to_date();">
											</div> 
											  <div class="col-md-2">
        								<label>Select Shipment</label>
        								 
        							       <select class="form-select" id="shippingId"  name="shippingId" onchange="shipppingId(this.value)" style="border-radius: 15px;">
        							           <option value="">Select</option>
        							            <!--<option value=""> select Shipment</option>-->
                                        <?php foreach($shipment as $shipping): ?>
                                      
                                            <option value="<?php echo $shipping->id ?>"><?php echo $shipping->name; ?></option>
                                        <?php endforeach; ?>
                                        </select>
        								 </div>
											<div class="col-md-1" style="margin-top: 28px;">
        							    	<button class="btn btn-info" type="button"onclick="search()">Search</button>
                                            </div>
                    <!--                    <div class="col-md-2" style="margin-top: 28px;">-->
        							    	<!--<button class="btn btn-info" type="button" style="float: right;">Upload</button>-->
                    <!--                        </div>-->
                                            </div>
										<table id="customerTable" class="table">
											<thead>
												<tr>
												     <th style="width:15px"><input type="checkbox"   id="select_all" name="select_all"  style="height: 20px;width: 22px;}"/></th>
												    <th  style="width:15px">Sl</th>
												     <th  >Order ID</th>
												     <th  >User Name</th>
												     <th  >Placed On</th>
													<th>From </th>
													<!--<th>From Address</th>-->
													<th>To</th>
             <!--                                       <th>To Address</th>-->
                                                    <th>Total Price </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
												</tr>
											</thead>

										</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Add User Modal  -->
				</div> <!-- End Content -->
			</div>
		
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
				
				<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
        </button>
      </div>
      <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Orders/deleteOrderProduct">
         <!--<div class="icon-box">-->
				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
				<!--</div>	-->
          <div class="mt-4 text-center">
              <!--<input type="hidden"  name="deleteorder" id="OrderID">-->
            <h4 class="fs-semibold">You are about to delete a Order?</h4>
            <p class="text-muted fs-14 mb-4 pt-1">Deleting order List will remove all of your information from our database.</p>
            <div class="hstack gap-2 justify-content-center remove">
                <input type="text" id="delete_order_id" name="deleteorder">
              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
              <button type="submit" class="btn btn-danger" id="delete-record" >Yes, Delete It!!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>		
				<div class="modal fade modal-add-contact" id="approvedModal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Orders/ChangeToPrint" >
                         <!--<div class="icon-box">-->
                		<i class="fa fa-check" style="font-weight: 1000;height: -30px;font-size: 58px;color: #32CD32;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="order_id" id="order_id" >
                            <h4 class="fs-semibold">Are you sure about switching to the Print?</h4>
                            <p class="text-muted fs-14 mb-4 pt-1"></p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-success" id="delete-record" fdprocessedid="tib7hj" >Yes, Proccess it!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>				
 <div class="modal fade modal-add-contact" id="importExcel" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content" style="width: 636px; margin-left: 111px;">
								<form action="<?php echo base_url(); ?>orders/uploadExcelFileToShipped" method="post" enctype="multipart/form-data">
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Import from excel</h5>
									</div>

									<div class="modal-body px-4">
									     <input type="hidden" name="id" id="bannerID" value="">
										<div class="form-group row mb-6">
										   <div class="mb-3">
										
										 <label for="Phone-field" class="form-label">Add Excel Sheet Here</label>
										
										<input name="excel_file" id ="excel_file" class="form-control"  type="file"  accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  style="border-color: #ccc5c5;" 	required>
										<p id="fileInfo"></p> 
										</div>

										</div>
										</div>

									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>	  				
<!-- jQuery -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toggle.css" />
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.css">
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/jquery_files/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#customerTable').DataTable({
        "order": [], 
         "aaSorting": [],
         "columnDefs": [
        { 
            "targets": [0], 
            "orderable": false,
        },
        ],
       "lengthMenu": [[10,20, 50, 75, -1], [10,20, 50, 75, "All"]],
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Orders/getFreezedOrderList',
            'type': 'POST',
            'data': function(d) {
                	d.from_date= $("#from_date").val()
					d.to_date= $("#to_date").val()
					d.shippingId = $("#shippingId").val()
              },
        },
    });
    
});

  $("#select_all").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
var selectedValuesArray = [];
function takeValues() {
    var selectedValues = [];
    var settings_id;
    $(".cus_class:checked").each(function() {
        selectedValues.push($(this).val());
    });
    
    settings_id = $("#settings_id").val();
    
    if (selectedValues.length === 0) {
        alert("Select at least one order");
    } else if (settings_id.length === 0) {
        alert("Select method");
    } else {
        // Append the order IDs to the "order_id" input field
        $("#bulk_order_id").val(selectedValues.join(','));
    }
}
  function change_status(id)
   { 
    $("#order_id").val(id);
   }
     function delete_order(id)
   { 
    //   alert(id)
    $("#delete_order_id").val(id);
   }
function get_from_date(){
	var id=$('#from_date').val();
	$('#from_date').val(id);
	search();
		}
		    
function get_to_date(){
	var id=$('#to_date').val();
	$('#to_date').val(id);
	search();
		}
function shipppingId()
{   
    var id = $('#shippingId').val();
 //   alert(id)
    $('#shippingId').val(id);
    search();
}
	function search(){
        $('#customerTable').DataTable().ajax.reload();
    }
 </script>