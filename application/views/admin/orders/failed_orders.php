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
							<h1>Failed Orders</h1>
							<p class="breadcrumbs"><span><a href="#">List</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Failed Orders
							</p>
						</div>
						<div>
						    	</div>
					</div>
					<div class="row" >
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
									 <div class="row" style="margin:20px">
                                    <div class="col-md-2">
        									<label>Select Settings</label>
        									<select class="form-select" id="settings_id" name="settings_id" required="" style="border-radius: 15px;}">
													 <option value="0">Settings</option>
													 <option value="1">Print Pdf</option>
													 <option value="2">Procecced</option>
													 <!--<option value="3">Yellow </option>-->
													 <!--<option value="4"="">White</option>-->
													 </select>
        								 </div>
        								     <div class="col-md-1" style="    margin-top: 28px;">
        							    	<button class="btn btn-info" onclick="takeValues()">Apply</button>
                                            </div>
                                            <div class="col-md-2">
        								  	<label>Choose from Date</label>
        								  	<input type="date" class="form-control" name="from_date" id="from_date" onchange="get_from_date();">
        								    </div>
                                     	    <div class="col-lg-2">
													<label for="owner-field" class="form-label">Choose to Date</label>
													<input type="date" class="form-control" name="to_date" id="to_date" onchange="get_to_date();">
											</div> 
											<div class="col-md-1" style="    margin-top: 28px;">
        							    	<button class="btn btn-info" onclick="search()">Search</button>
                                            </div>
                                            </div>
										<table id="customerTable" class="table">
											<thead>
												<tr>
												     <!--<th style="width:15px"><input type="checkbox"   id="select_all" name="select_all"  style="height: 20px;width: 22px;}"/></th>-->
												    <th  style="width:15px">Sl</th>
												    <th>Order ID </th>
												    <th>User Name </th>
												    <th>User Mobile </th>
													<th>From </th>
													<!--<th>From Address</th>-->
													<th>To</th>
             <!--                                       <th>To Address</th>-->
                                                    <th>Total Price </th>
                                                    <th>Placed On </th>
                                                    <th> Payment Status</th>
                                                    <th>Action</th>
												</tr>
											</thead>

										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Add User Modal  -->
				</div> <!-- End Content -->
			</div>
		
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
<div class="modal fade modal-add-contact" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Orders/getOrderProductsById" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Order Products</h5>
									</div>
   <input type="text" class="form-control" id="order_id1" name="order_id1" value="">
   <div class="table_data" id="table_data"> 
   
   </div>
   
									<div class="modal-footer px-4">
									
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Contact</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!-- End Content -->
				
					<div class="modal fade zoomIn" id="change_status_modal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Orders/changeToPaid">
                                 <div class="icon-box">
                        				<i class="fa-sharp fa-regular fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="order_id3" id="order_id3">
                                      <input type="hidden"  name="user_id" id="user_id">
                                    <h4 class="fs-semibold">Are y   ou sure you want to make this orer paid! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                   <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" onclick="toggleButton()"><i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-danger" id="delete-record" >Yes,It</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                          <!-- deactive banner end  -->
                            <!-- active banner  -->
       <!-- active banner end  -->
				<!--delete modal-->
				
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
                <input type="text" id="deleteorder" name="deleteorder">
              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
              <button type="submit" class="btn btn-danger" id="delete-record" >Yes, Delete It!!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>		
				
				
<!-- jQuery -->
<!--<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toggle.css" />
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">-->
<!--<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js" ></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>-->
<!--<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js" ></script>-->
<!--<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js" ></script>-->

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
            'url': '<?=base_url()?>Orders/getFailedOrders',
            'type': 'POST',
            'data': function(d) {
                	d.from_date= $("#from_date").val()
					d.to_date= $("#to_date").val()
              },
        },
    });
    
});

function change_status(order_id,user_id){
    $('#order_id3').val(order_id);
     $('#user_id').val(user_id);
}
function delete_order(id){
    $('#deleteorder').val(id);
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
	function search(){
        $('#customerTable').DataTable().ajax.reload();
    }
 </script>