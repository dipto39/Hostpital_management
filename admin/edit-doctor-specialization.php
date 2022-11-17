<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$id = intval($_GET['id']); // get value
if (isset($_POST['submit'])) {
	$docspecialization = $_POST['dname'];
	$fee = $_POST['dfee'];
	$dis = $_POST['dis'];
	$sql = mysqli_query($con, "update  doctorspecilization set specilization='$docspecialization',fee='$fee',dis='$dis' where id='$id'");
	$_SESSION['msg'] = "Doctor Specialization updated successfully !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Edit Doctor Specialization</title>
	<?php include 'include/head.php'; ?>
</head>

<body class="nav-md">
	<?php
	$page_title = 'Admin | Edit Doctor Specialization';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="row margin-top-30">
				<div class="col-lg-6 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Edit Doctor Specialization</h5>
						</div>
						<div class="panel-body">
							<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
								<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
							<form role="form" name="dcotorspcl" method="post">

								<?php
								$id = intval($_GET['id']);
								$sql = mysqli_query($con, "select * from doctorspecilization where id='$id'");
								$get_data = mysqli_fetch_assoc($sql);
								?>
								<div class="mb-3">
									<label for="dname" class="form-label">Department Name</label>
									<input type="text" class="form-control" id="dname" required value="<?php echo $get_data['specilization'] ?>" name="dname">
								</div>
								<div class="mb-3">
									<label for="dfee" class="form-label">Fees</label>
									<input type="number" class="form-control" id="dfee" required value="<?php echo $get_data['fee'] ?>" name="dfee">
								</div>
								<div class="mb-3">
									<label for="dis" class="form-label">Discription</label>
									<textarea class="form-control" required name="dis" id="dis" cols="30" rows="4"><?php echo $get_data['dis'] ?></textarea>
								</div>
								<button type="submit" name="submit" class="btn btn-o btn-primary">
									Update
								</button>
							</form>
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
	<?php include('include/footer.php'); ?>
	<?php include 'include/script.php'; ?>
</body>