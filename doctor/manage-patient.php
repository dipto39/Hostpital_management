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
	<title>Doctor | Manage Patients</title>
	<?php include 'include/head.php'; ?>

</head>

<body class="nav-md">
	<?php
	$page_title = 'Doctor | Manage Patients';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>

			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Patient Name</th>
						<th>Patient Contact Number</th>
						<th>Email</th>
						<th>Patient Gender </th>
						<th>Creation Date </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$docid = $_SESSION['did'];
					$sql = mysqli_query($con, "select patient.id as pid,patient.patcontact,patient.patname,patient.patemail,patient.gender,patient.cDate from patient inner join appointment on patient.aid =appointment.id where patient.did='$docid' ");
					$cnt = 1;
					while ($row = mysqli_fetch_array($sql)) {
					?>
						<tr>
							<td class="center"><?php echo $cnt; ?>.</td>
							<td class="hidden-xs"><?php echo $row['patname']; ?></td>
							<td><?php echo $row['patcontact']; ?></td>
							<td><?php echo $row['patemail']; ?></td>
							<td><?php if ($row['gender'] == "m") {
									echo "Male";
								} elseif ($row['gender'] == "f") {
									echo "Female";
								} else {
									echo "Other";
								}  ?></td>
							<td><?php echo $row['cDate']; ?></td>
							<td>

								<a href="edit-patient.php?editid=<?php echo $row['pid']; ?>"><i class="fa fa-edit"></i></a> || <a href="view-patient.php?viewid=<?php echo $row['pid']; ?>"><i class="fa fa-eye"></i></a>

							</td>
						</tr>
					<?php
						$cnt = $cnt + 1;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<?php include('include/footer.php'); ?>
	<?php include 'include/script.php'; ?>

</body>

</html>