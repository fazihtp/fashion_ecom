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
							<h1>Packed Orders</h1>
							<p class="breadcrumbs"><span><a href="#">List</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Packed Orders
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
                                                    <th>Status</th>
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
				
					<div class="modal fade zoomIn" id="deactivaebannerModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Products/checkbannerActive">
                                 <div class="icon-box">
                        				<i class="fa-sharp fa-regular fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="dactive">
                                    <h4 class="fs-semibold">Are tou sure you want to Deactive Banner! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                   <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" onclick="toggleButton()"><i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-danger" id="delete-record" >Yes,click it</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                          <!-- deactive banner end  -->
                            <!-- active banner  -->
                          <div   class="modal fade zoomIn" id="activaebannerModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true" >
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    
                                  </div>
                                  <div class="modal-body p-5 text-center">
                            <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Products/checkbannerActive">
                               
                                 <div class="icon-box">
                                     
                        				<i class="fa-solid fa-check fa-circle-exclamation" style="font-weight: 1000;height: -30px;font-size: 58px;color: #29cc97;}"></i>
                        				</div>	
                                  <div class="mt-4 text-center">
                                    <input type="hidden"  name="ID" id="active">
                                    <h4 class="fs-semibold">Are tou sure you want to Active Banner! </h4>
                                    <p class="text-muted fs-14 mb-4 pt-1">.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                       <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" id="deactivaebannerModal" data-bs-dismiss="modal" onclick="toggleButton()" > <i class="ri-close-line me-1 align-middle"></i> Close </button>
                                      <button type="submit" class="btn btn-success" id="active-record" >Yes,click it</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
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
                <input type="text" id="OrderID" name="deleteorder">
              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
              <button type="submit" class="btn btn-danger" id="delete-record" >Yes, Delete It!!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>		
					<div class="modal fade modal-add-contact" id="tracking_modal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Orders/changeToShipped" >
                         <!--<div class="icon-box">-->
                		<i class="fa fa-check" style="font-weight: 1000;height: -30px;font-size: 58px;color: #32CD32;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="order_id" id="order_id" value="1">
                            <h4 class="fs-semibold">Are you sure to ship the Order?</h4>
                            	<input type="text" class="form-control" id="tracking_id" name="tracking_id" 	style="border-color: #e1d8d8;margin-top: 17px;}" placeholder="Enter Tracking ID" required >
                            <p class="text-muted fs-14 mb-4 pt-1"></p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-success" id="delete-record" fdprocessedid="tib7hj" >Yes, Approved it!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>				
					<div class="modal fade modal-add-contact" id="rejectedModal" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Orders/changeToOrders" >
                         <!--<div class="icon-box">-->
                		<i class="fas fa-times" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="order_id2" id="order_id2" value="1">
                            <h4 class="fs-semibold">Are you sure to Move to Orders?</h4>
                            <p class="text-muted fs-14 mb-4 pt-1"></p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-danger" id="delete-record" fdprocessedid="tib7hj">Yes, Move it!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>
					<div class="modal fade modal-add-contact" id="freeze_model" tabindex="-1" role="dialog" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content" style="width: 507px;    margin-left: 132px;">
                      <div class="modal-header">
                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="v0hp98">
                        </button>
                      </div>
                      <div class="modal-body p-5 text-center">
                        <form method="post" action="<?php echo base_url(); ?>Orders/changeToFreezed" >
                         <!--<div class="icon-box">-->
                		<i class="fa fa-check" style="font-weight: 1000;height: -30px;font-size: 58px;color: #32CD32;}"></i>
                				<!--</div>	-->
                          <div class="mt-4 text-center">
                              <input type="hidden" name="order_id8" id="order_id8">
                            <h4 class="fs-semibold">Are you sure to freeze the Order?</h4>
                            	
                            <p class="text-muted fs-14 mb-4 pt-1"></p>
                            <div class="hstack gap-2 justify-content-center remove">
                              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal" fdprocessedid="2mc1b"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
                              <button type="submit" class="btn btn-success" id="delete-record" fdprocessedid="tib7hj" >Yes, Freeze it!</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
				
						</div>
					</div>	
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
            'url': '<?=base_url()?>Orders/getProcessedList',
            'type': 'POST',
            'data': function(d) {
                	d.from_date= $("#from_date").val()
					d.to_date= $("#to_date").val()
              },
        },
    });
    
});
function change_status(id){
    $('#order_id').val(id);
}
function change_to_pending(id){
    $('#order_id2').val(id);
}
function delete_order(id){
    $('#deleteorder').val(id);
}
function change_to_freeze(id){
    $('#order_id8').val(id);
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