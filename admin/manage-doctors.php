<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_GET['del'])) {
	mysqli_query($con, "delete from doctors where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Manage Doctors</title>
	<?php include 'include/head.php'; ?>
</head>

<body class="nav-md">
	<?php
	$page_title = 'Admin | Manage Doctors';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Docters</span></h5>
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Specialization</th>
						<th class="hidden-xs">Doctor Name</th>
						<th>Creation Date </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "select * from doctors");
					$cnt = 1;
					while ($row = mysqli_fetch_array($sql)) {
						$sid = $row['specilization'];
						$get_de = mysqli_query($con, "select * from doctorspecilization where id = $sid");
						$get_de = mysqli_fetch_assoc($get_de);
						$dep_name = $get_de['specilization'];
					?>
						<tr>
							<td class="center"><?php echo $cnt; ?>.</td>
							<td class="hidden-xs"><?php echo $dep_name; ?></td>
							<td><?php echo $row['doctorName']; ?></td>
							<td><?php echo $row['creationDate']; ?>
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="edit-doctor.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
									<a href="manage-doctors.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
								</div>
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