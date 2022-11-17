<?php
session_start();
error_reporting(0);
include "../admin/include/config.php";
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Dashboard</title>
	<?php include('include/head.php'); ?>


</head>

<body class="nav-md">
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-4 col-sm-4 ">
			<div class="x_panel tile fixed_height_320">
				<div class="x_title">
					<h2>My Profile</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="panel panel-white no-radius text-center">
						<div class="panel-body">
							<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
							<p class="links cl-effect-1">
								<a href="edit-profile.php">
									Update Profile
								</a>
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 ">
			<div class="x_panel tile fixed_height_320">
				<div class="x_title">
					<h2>My Appointments</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="panel panel-white no-radius text-center">
						<div class="panel-body">
							<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
							<p class="cl-effect-1">
								<a href="appointment-history.php">
									View Appointment History
								</a>
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>


	</div>



	<?php include('include/footer.php'); ?>
	<?php include('include/script.php'); ?>

</body>

</html>