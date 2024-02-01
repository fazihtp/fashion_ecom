		
			<!-- Footer -->
			<footer class="footer mt-auto">
				<div class="copyright bg-white">
					<p>
						Copyright &copy; <span id="ec-year"></span><a class="text-primary"
						href="https://hakcollections.com/" target="_blank">Fashion Store The Destiny of Your Fashion</a>. All Rights Reserved.
					  </p>
				</div>
			</footer>

		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->

	<!-- Common Javascript -->
	
	<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
	<script src="<?php echo base_url(); ?>admin_assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>admin_assets/plugins/simplebar/simplebar.min.js"></script>
	<script src="<?php echo base_url(); ?>admin_assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="<?php echo base_url(); ?>admin_assets/plugins/slick/slick.min.js"></script>

	<!-- Chart -->
	<script src="<?php echo base_url(); ?>admin_assets/plugins/charts/Chart.min.js"></script>
	<script src="<?php echo base_url(); ?>admin_assets/js/chart.js"></script>

	<!-- Google map chart -->
	<script src="<?php echo base_url(); ?>admin_assets/plugins/charts/google-map-loader.js"></script>
	<script src="<?php echo base_url(); ?>admin_assets/plugins/charts/google-map.js"></script>

	<!-- Date Range Picker -->
	<script src="<?php echo base_url(); ?>admin_assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>admin_assets/js/date-range.js"></script>

	<!-- Option Switcher -->
	<script src="<?php echo base_url(); ?>admin_assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="<?php echo base_url(); ?>admin_assets/js/ekka.js"></script>
	    <script src="<?php echo base_url(); ?>admin_assets/sweet-alert/sweetalert.min.js"></script>
	
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
