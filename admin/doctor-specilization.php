<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
	$sql = mysqli_query($con, "insert into doctorspecilization values('" . $_POST['doctorspecilization'] . "')");
	$_SESSION['msg'] = "Doctor Specialization added successfully !!";
}
if (isset($_GET['del'])) {
	mysqli_query($con, "delete from doctorspecilization where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Doctor Specialization</title>
	<?php include 'include/head.php'; ?>
</head>

<body class="nav-md">
	<?php
	$page_title = 'Admin | Add Doctor Specialization';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="row margin-top-30">
				<div class="col-lg-6 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Doctor Department</h5>
						</div>
						<div class="panel-body">


							<a href="add-department.php" name="submit" class="btn btn-o btn-primary">
								Add Department
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-white">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-5">
			<h5 class="over-title">Manage <span class="text-bold">Docter Department</span></h5>
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Specialization</th>
						<th class="hidden-xs">Creation Date</th>
						<th>Updation Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "select * from doctorspecilization");
					$cnt = 1;
					while ($row = mysqli_fetch_array($sql)) {
					?>
						<tr>
							<td class="center"><?php echo $cnt; ?>.</td>
							<td class="hidden-xs"><?php echo $row['specilization']; ?></td>
							<td><?php echo $row['creationDate']; ?></td>
							<td><?php echo $row['updationDate']; ?>
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
									<a href="doctor-specilization.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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