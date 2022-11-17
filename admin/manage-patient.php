<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | View Patients</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-progressbar -->
	<link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- JQVMap -->
	<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
	<!-- bootstrap-daterangepicker -->
	<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="../assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<?php
	$page_title = 'Admin | View Patients';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">View <span class="text-bold">Patients</span></h5>

			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Patient Name</th>
						<th>Patient Contact Number</th>
						<th>Patient Gender </th>
						<th>Status </th>
						<th>Creation Date </th>
						<th>Updation Date </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$sql = mysqli_query($con, "select * from patient");
					$cnt = 1;
					while ($row = mysqli_fetch_array($sql)) {
					?>
						<tr>
							<td class="center"><?php echo $cnt; ?>.</td>
							<td class="hidden-xs"><?php echo $row['patname']; ?></td>
							<td><?php echo $row['patcontact']; ?></td>
							<td><?php if ($row['gender'] == 'm') {
									echo 'Male';
								} elseif ($row['gender'] == 'f') {
									echo 'Female';
								} else {
									echo "Other";
								} ?></td>
							<td><?php if ($row['status'] == 0) {
									echo '<span class="text-danger">block</span>';
								}  else {
									echo '<span class="text-success">active</span>';

								} ?></td>

							<td><?php echo $row['appDate']; ?></td>
							<td><?php echo $row['updateDate']; ?>
							</td>
							<td>

								<a href="view-patient.php?viewid=<?php echo $row['id']; ?>"><i class="fa fa-eye"></i></a>

							</td>
						</tr>
					<?php
						$cnt = $cnt + 1;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php include('include/footer.php'); ?>
	<?php include 'include/script.php'; ?>
</body>