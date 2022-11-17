<?php
session_start();
error_reporting(0);
include "../admin/include/config.php";
include('include/checklogin.php');
if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docname = $_POST['docname'];
	$docaddress = $_POST['clinicaddress'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno' where id='" . $_SESSION['id'] . "'");
	if ($sql) {
		echo "<script>alert('Doctor Details updated Successfully');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctr | Edit Doctor Details</title>

	<?php include 'include/head.php'; ?>

<body class="nav-md">
	<?php
	$page_title = 'Doctor | Edit Doctor Details';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row margin-top-30">
		<div class="col-lg-8 col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h5 class="panel-title">Edit Doctor</h5>
				</div>
				<div class="panel-body">
					<?php $sql = mysqli_query($con, "select * from doctors where docEmail='" . $_SESSION['dlogin'] . "'");
					while ($data = mysqli_fetch_array($sql)) {
						$did = $data['specilization'];
						// echo $did;
						// $get_res = mysqli_query($con, "select * from doctorspecilization where id = $did");
						// $dep = mysqli_fetch_assoc($get_res);
						// $dep = $dep['specilization'];
					?>
						<h4><?php echo htmlentities($data['doctorName']); ?>'s Profile</h4>
						<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']); ?></p>
						<?php if ($data['updationDate']) { ?>
							<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']); ?></p>
						<?php } ?>
						<hr />
						<form role="form" name="adddoc" method="post" onSubmit="return valid();">
							<div class="form-group">
								<label for="DoctorSpecialization">
									Doctor Specialization
								</label>
								<select name="Doctorspecialization" class="form-control" required="required">
									<?php $ret = mysqli_query($con, "select * from doctorspecilization");
									while ($row = mysqli_fetch_array($ret)) {
									?>
										<option <?php if ($row['id'] == $did) {
													echo "selected";
												} ?> value="<?php echo htmlentities($row['id']); ?>">
											<?php echo htmlentities($row['specilization']); ?>
										</option>
									<?php } ?>

								</select>
							</div>

							<div class="form-group">
								<label for="doctorname">
									Doctor Name
								</label>
								<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']); ?>">
							</div>


							<div class="form-group">
								<label for="address">
									Doctor Clinic Address
								</label>
								<textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
							</div>
							<div class="form-group">
								<label for="fess">
									Doctor Consultancy Fees
								</label>
								<input type="text" name="docfees" class="form-control" required="required" value="<?php echo htmlentities($data['docFees']); ?>">
							</div>

							<div class="form-group">
								<label for="fess">
									Doctor Contact no
								</label>
								<input type="text" name="doccontact" class="form-control" required="required" value="<?php echo htmlentities($data['contactno']); ?>">
							</div>

							<div class="form-group">
								<label for="fess">
									Doctor Email
								</label>
								<input type="email" name="docemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['docEmail']); ?>">
							</div>




						<?php } ?>


						<button type="submit" name="submit" class="btn btn-o btn-primary">
							Update
						</button>
						</form>
				</div>
			</div>
		</div>

	</div>
	<?php include('include/footer.php'); ?>
	<?php include 'include/script.php'; ?>
</body>

</html>