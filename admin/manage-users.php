<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_GET['del'])) {
	mysqli_query($con, "delete from users where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Manage Users</title>
	<?php include 'include/head.php'; ?>
</head>

<body class="nav-md">
	<?php
	$page_title = 'Admin | Manage Users';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Users</span></h5>
			<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
				<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Full Name</th>
						<th class="hidden-xs">Adress</th>
						<th>Gender </th>
						<th>Email </th>
						<th>Creation Date </th>
						<th>Updation Date </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "select * from users");
					$cnt = 1;
					while ($row = mysqli_fetch_array($sql)) {
					?>
						<tr>
							<td class="center"><?php echo $cnt; ?>.</td>
							<td class="hidden-xs"><?php echo $row['fullName']; ?></td>
							<td><?php echo $row['address']; ?></td>
							<td><?php if ($row['gender'] == "m") {
									echo "male";
								} elseif ($row['gender'] == 'f') {
									echo "Femail";
								} else {
									echo "Other";
								} ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['regDate']; ?></td>
							<td><?php echo $row['updationDate']; ?>
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a href="manage-users.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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