
<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<script src="https://kit.fontawesome.com/003cca9935.js" crossorigin="anonymous"></script>
 <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
 <style>
     
.rating {
  margin-top: 40px;
  border: none;
  float: left;
}

.rating > label {
  color: #90A0A3;
  float: right;
}

.rating > label:before {
  margin: 5px;
  font-size: 2em;
  font-family: FontAwesome;
  content: "\f005";
  display: inline-block;
}

.rating > input {
  display: none;
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #F79426;
}

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label {
  color: #FECE31;
}
label {
    float: left;
}
 </style>
 
<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Review</h1>
							<p class="breadcrumbs"><span><a href="">Settings</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Review
							</p>
						</div>
						<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal-add-contact" > Add Review
							</button>
						</div>
					</div>
					<div class="row" >
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="customerTable" class="table">
											<thead>
												<tr>
												    <th>Sl</th>
												    <th>image</th>
													<th>Client Name</th>
													<th>Description </th>
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
	<!-- Add Contact Button  -->
					<div class="modal fade modal-add-contact" id="modal-add-contact" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-sx" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/addreview" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add Review</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Client Name</label>
													<input type="text" class="form-control" id="client_name" name="client_name" style="border-color: #ccc5c5;" required>
                                                    
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Description</label>
													<input type="text" class="form-control" id="discription" name="discription" style="border-color: #ccc5c5;" required>
                                                    
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Client image</label>
													<input type="file" class="form-control" id="imageUpload" name="image" onchange="checkFileDetails" style="border-color: #ccc5c5;" >
													<p id="fileInfo"></p>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Ratting</label>
                                        <div class="rating">
                                              <input type="radio" id="star5" name="rating" value="5" />
                                              <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                              <input type="radio" id="star4" name="rating" value="4" />
                                              <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                              <input type="radio" id="star3" name="rating" value="3" />
                                              <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                              <input type="radio" id="star2" name="rating" value="2" />
                                              <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                              <input type="radio" id="star1" name="rating" value="1" />
                                              <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                        </div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Review</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!-- End Content -->
<!-- jQuery -->
<!--edit Model-->
					<div class="modal fade modal-add-contact" id="edited_modal-add-contact" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-sx" role="document">
							<div class="modal-content">
								 <form id="category-form" action="<?php echo base_url(); ?>Admin/editSize" method="post" enctype="multipart/form-data">
                                    	<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Edit Size</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="firstName">Colour</label>
													<input type="text" class="form-control" id="edited_size_name" name="edited_size_name" style="border-color: #ccc5c5;" required>
														<input type="hidden" class="form-control" id="edited_size_id" name="edited_size_id">
                                                    
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4 mt-3">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill" id="submit-btn">Save Size</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> 
				<!--end edit modal-->
				<!--delete model-->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close">
        </button>
      </div>
      <div class="modal-body p-5 text-center">
        <form method="post" id="deleteForm" action="<?php echo base_url(); ?>Admin/deletereview">
         <!--<div class="icon-box">-->
				<i class="fa-solid fa-trash" style="font-weight: 1000;height: -30px;font-size: 58px;color: #ec4a58;}"></i>
				<!--</div>	-->
          <div class="mt-4 text-center">
              <input type="hidden"  name="review_id" id="review_id">
            <h4 class="fs-semibold">You are about to delete a Size?</h4>
            <p class="text-muted fs-14 mb-4 pt-1">Deleting size List will remove all of your information from our database.</p>
            <div class="hstack gap-2 justify-content-center remove">
              <button type="button" class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal"> <i class="ri-close-line me-1 align-middle"></i> Close </button>
              <button type="submit" class="btn btn-danger" id="delete-record" >Yes, Delete It!!</button>
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
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'scrollY': '100%',
        'ajax': {
            'url': '<?=base_url()?>Admin/getreview',
            'type': 'POST',
            'data': function(d) {
              },
        },
    });
});


function delete_review(id) {
	 $('#review_id').val(id);
}

$(document).ready(function() {
  $('#star-rating').raty({
    score: 0,
    click: function(score) {
      $('#rating-value').val(score);
    }
  });
});


function checkFileDetails() {
  document.getElementById('fileInfo').innerHTML ="";
  var fi = document.getElementById('imageUpload');
  var button = document.getElementById('submit-btn');
  if (fi.files.length > 0) { // FIRST CHECK IF ANY FILE IS SELECTED.
    for (var i = 0; i <= fi.files.length - 1; i++) {
      var fileName, fileExtension, fileSize, fileType, dateModified;
      fileName = fi.files.item(i).name;
      fileExtension = fileName.replace(/^.*\./, '');
       readImageFile(fi.files.item(i));
    }
    function readImageFile(file) {
      var reader = new FileReader(); // Create a new instance.
      reader.onload = function (e) {
        var img = new Image();
        img.src = e.target.result;

        img.onload = function () {
          var width = this.width;
          var height = this.height;

          document.getElementById('fileInfo').innerHTML =
            document.getElementById('fileInfo').innerHTML + '<br /> ' +
            'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
            'Width: <b>' + width + '</b> <br />' +
            'Height: <b>' + height + '</b> <br />';

          // Check the width and height condition
          if (width === 200 && height === 200) {
            button.removeAttribute('disabled'); // Enable the button
          } else {
               swal({
                        title: "oops!",
                        text: "Image must be size of 765 x 850!",
                        icon: "error",
                        button: "OK",
                    });
                 $('#fileInfo').empty(); 
                //  $('#imageUpload').empty(); 
            button.setAttribute('disabled', 'disabled'); // Disable the button
            
          }
        };
      };
      reader.readAsDataURL(file);
    }
  }
}



 </script>