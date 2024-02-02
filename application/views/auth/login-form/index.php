<!doctype html>
<html lang="en">
  <head>
  	<title>HAK COLLECTIONS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="<?php echo base_url(); ?>assets/img/favicon/favicon.png" rel="shortcut icon" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">

	</head>
	<style>
	    
	</style>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Korean Fashion Store</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>
						<form class="login-form" action="<?php echo base_url(); ?>Login/verifyUser" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="useremail" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url(); ?>assets/login/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/login/js/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/login/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>

	</body>
</html>
<script src="<?php echo base_url(); ?>assets/js/vendor/index.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/sweet-alert/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        <?php
        if ($this->session->flashdata('flashError')) {
            ?>
                    swal({
                        title: "Error",
                        text: "<?php echo $this->session->flashdata('flashError') ?>",
                        icon: "error",
                        button: "OK",
                    });
            <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('flashSuccess')) {
            ?>
                    swal({
                        title: "Success",
                        text: "<?php echo $this->session->flashdata('flashSuccess') ?>",
                        icon: "success",
                        button: "OK",
                    });
            <?php 
        } 
        ?>
    });
</script>
