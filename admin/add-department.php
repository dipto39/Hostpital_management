<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');

if (isset($_POST['submit'])) {

	$dname = $_POST['dname'];
	$fees = $_POST['dfee'];
	$dis = $_POST['dis'];
	if (isset($_FILES['dimg'])) {

		$img_name = $_FILES['dimg']['name'];
		$tmp_name = $_FILES['dimg']['tmp_name'];
		$size = $_FILES['dimg']['size'];

		if (move_uploaded_file($tmp_name, "../img/" . $img_name)) {

			if (mysqli_query($con, "insert into doctorspecilization(specilization,fee,dis,img) values('$dname',$fees,'$dis','$img_name')")) {
				echo "<script>window.location.href= 'doctor-specilization.php'</script>";
			}
		}
	} else {
		echo "<script>alert('please select your file')</script>";
	}
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
							<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" name="add_dep" method="post">
								<div class="mb-3">
									<label for="dname" class="form-label">Department Name</label>
									<input type="text" class="form-control" id="dname" required name="dname">
								</div>
								<div class="mb-3">
									<label for="dfee" class="form-label">Fees</label>
									<input type="number" class="form-control" id="dfee" required name="dfee">
								</div>
								<div class="mb-3">
									<label for="dimg" class="form-label">Departemnt Photo</label>
									<input type="file" class="form-control" id="dimg" required name="dimg" accept="image/*">
								</div>
								<div class="mb-3">
									<label for="dis" class="form-label">Example label</label>
									<textarea class="form-control" required name="dis" id="dis" cols="30" rows="4"></textarea>
								</div>
								<button type="submit" name="submit" class="btn btn-o btn-primary">
									Add Department
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