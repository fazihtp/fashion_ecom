
			<!-- Header -->
			<header class="ec-main-header" id="header">
				<nav class="navbar navbar-static-top navbar-expand-lg">
					<!-- Sidebar toggle button -->
					<button id="sidebar-toggler" class="sidebar-toggle"></button>
					<!-- search form -->
					<div class="search-form d-lg-inline-block">
						<div class="input-group">
							<input type="text" name="query" id="search-input" class="form-control"
								placeholder="search.." autofocus autocomplete="off" />
							<button type="button" name="search" id="search-btn" class="btn btn-flat">
								<i class="mdi mdi-magnify"></i>
							</button>
						</div>
						<div id="search-results-container">
							<ul id="search-results"></ul>
						</div>
					</div>

					<!-- navbar right -->
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<!-- User Account -->
							<li class="dropdown user-menu">
								<button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
									aria-expanded="false">
										<img class="" src="<?php echo base_url(); ?>admin_assets/img/logo/logo.png" alt="" style="max-width:80px"/>
								</button>
								<ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
									<!-- User image -->
									<li class="dropdown-header">
										<img src="<?php echo base_url(); ?>admin_assets/img/logo/logo.png" class="img-circle" alt="User Image" />									</li>
								
									<li class="dropdown-footer">
										<a href="<?php echo base_url();?>Admin/logout"> <i class="mdi mdi-logout"></i> Log Out </a>
									</li>
								</ul>
							</li>
							<li class="right-sidebar-in right-sidebar-2-menu">
								<i class="mdi mdi-settings-outline mdi-spin"></i>
							</li>
						</ul>
					</div>
				</nav>
			</header>

