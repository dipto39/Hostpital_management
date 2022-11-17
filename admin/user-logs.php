<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
	$sql = mysqli_query($con, "delete from userlog");
	if ($sql) {
		$_SESSION['msg'] = "User logs deleted Successfully";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | User Session Logs</title>
	<?php include 'include/head.php'; ?>
</head>

<body class="nav-md">
	<?php
	$page_title = 'Admin  | User Session Logs';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">

		<div class="col-md-12">
			<div class="row margin-top-30">
				<div class="col-lg-6 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Delete all user logs</h5>
						</div>
						<div class="panel-body">
							<form role="form" name="dcotorspcl" method="post" onSubmit="if(!confirm('Do you really want to delete all user logs?')){return false;}">
								<button type="submit" name="delete_all" class="btn btn-o btn-primary">
									Delete
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
				<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th class="hidden-xs">User id</th>
						<th>Username</th>
						<th>User IP</th>
						<th>Login time</th>
						<th>Logout Time </th>
						<th> Status </th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "select * from userlog ");
					$cnt = 1;
					while ($row = mysqli_fetch_array($sql)) {
					?>
						<tr>
							<td class="center"><?php echo $cnt; ?>.</td>
							<td class="hidden-xs"><?php echo $row['uid']; ?></td>
							<td class="hidden-xs"><?php echo $row['username']; ?></td>
							<td><?php echo $row['userip']; ?></td>
							<td><?php echo $row['loginTime']; ?></td>
							<td><?php echo $row['logout']; ?>
							</td>
							<td>
								<?php if ($row['status'] == 1) {
									echo "Success";
								} else {
									echo "Failed";
								} ?>
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