<div class="container body">
	<div class="main_container">
		<!-- page content -->
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view bg-blue">
				<div class="navbar nav_title bg-dark" style="border: 0;">
					<a href="dashboard.php" class="site_title"><i class="fa fa-hospital-o"></i> <span>HEALTH CARE</span></a>
				</div>
				<div class="clearfix"></div>
				<!-- menu profile quick info -->
				<div class="profile clearfix">
					<div class="profile_pic">
						<img src="../img/doc/<?php echo $_SESSION['dpp'] ?>" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Welcome,</span>
						<h2><?php echo $_SESSION['doctorName']; ?></h2>
					</div>
				</div>
				<!-- /menu profile quick info -->
				<br />
				<?php include('include/sidebar.php'); ?>
				<!-- /sidebar menu -->
				<!-- /menu footer buttons -->
			</div>
		</div>
		<!-- top navigation -->
		<div class="top_nav">
			<div class="nav_menu bg-blue">
				<div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				</div>

				<nav class="nav navbar-nav">
					<ul class=" navbar-right">
						<li class="nav-item dropdown open" style="padding-left: 15px;">
							<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
								<img src="../img/doc/<?php echo $_SESSION['dpp'] ?>" alt=""><?php echo $_SESSION['doctorName']; ?>
							</a>
							<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="change-password.php"> Change Password</a>
								<a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
							</div>
						</li>
						<li role="presentation" class="nav-item dropdown open">
							<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-envelope-o text-light"></i>
								<span class="badge bg-green">

									<?php
									$id = $_SESSION['did'];
									$get_noti = mysqli_query($con, "select * from docnoti where docid = $id and status = 0");
									$span = mysqli_num_rows($get_noti);
									echo $span;
									?>
								</span>
							</a>
							<ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
								<?php
								$get_noti = mysqli_query($con, "select * from docnoti where docid = $id and status = 0");
								if ($num = mysqli_num_rows($get_noti) > 0) {
									while ($noti = mysqli_fetch_assoc($get_noti)) {
										echo '<li class="nav-item">
										<a class="dropdown-item" href="appointment-history.php">
											<span class="image"><img src="../img/user.png" alt="Profile Image" /></span>
											<span>
											<span class="name">Name</span>
												<span class="time">' . $noti['Ntime'] . '</span>
											</span>
											<span class="message">
											' . $noti['sms'] . '
											</span>
										</a>
									</li>';
									}
								} else {
									echo "<h2 class='text-danger text-center'> No New notification foound !</h2>";
								}
								?>

							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /top navigation -->
		<div class="right_col" role="main">
			<?php if (isset($x_content) && $x_content) : ?>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><?php echo $page_title ?? ''; ?></h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									</li>
									<li><a class="close-link"><i class="fa fa-close"></i></a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
							<?php endif; ?>
							<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
								<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>