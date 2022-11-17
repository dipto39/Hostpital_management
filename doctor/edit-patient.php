<?php
session_start();
error_reporting(0);
include "../admin/include/config.php";
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
	$eid=$_GET['editid'];
	$patname=$_POST['patname'];
	$patcontact=$_POST['patcontact'];
	$patemail=$_POST['patemail'];
	$gender=$_POST['gender'];
	$pataddress=$_POST['pataddress'];
	$patage=$_POST['patage'];
	$medhis=$_POST['medhis'];
	$sql=mysqli_query($con,"update patient set patname='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
	if($sql)
	{
		echo "<script>alert('Patient info updated Successfully');</script>";
		header('location:manage-patient.php');

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor | Add Patient</title>

	<?php include 'include/head.php'; ?>
</head>
<body class="nav-md">
	<?php
	$page_title = 'Patient | Edit Patient';
	$x_content = true;
	?>
	<?php include('include/header.php');?>

	<div class="row">
		<div class="col-md-12">
			<div class="row margin-top-30">
				<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Edit Patient</h5>
						</div>
						<div class="panel-body">
							<form role="form" name="" method="post">
								<?php
								$eid=$_GET['editid'];
								$ret=mysqli_query($con,"select * from patient where id='$eid'");
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {

									?>
									<div class="form-group">
										<label for="doctorname">
											Patient Name
										</label>
										<input type="text" name="patname" class="form-control"  value="<?php  echo $row['patname'];?>" required="true">
									</div>
									<div class="form-group">
										<label for="fess">
											Patient Contact no
										</label>
										<input type="text" name="patcontact" class="form-control"  value="<?php  echo $row['patcontact'];?>" required="true" maxlength="10" pattern="[0-9]+">
									</div>
									<div class="form-group">
										<label for="fess">
											Patient Email
										</label>
										<input type="email" id="patemail" name="patemail" class="form-control"  value="<?php  echo $row['patemail'];?>" readonly='true'>
										<span id="email-availability-status"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Gender: </label>
										<?php  if($row['Gender']=="f"){ ?>
											<input type="radio" name="gender" id="gender" value="Female" checked="true">Female
											<input type="radio" name="gender" id="gender" value="male">Male
										<?php } else { ?>
											<label>
												<input type="radio" name="gender" id="gender" value="Male" checked="true">Male
												<input type="radio" name="gender" id="gender" value="Female">Female
											</label>
										<?php } ?>
									</div>
									<div class="form-group">
										<label for="address">
											Patient Address
										</label>
										<textarea name="pataddress" class="form-control" required="true"><?php  echo $row['pataddress'];?></textarea>
									</div>
									<div class="form-group">
										<label for="fess">
											Patient Age
										</label>
										<input type="text" name="patage" class="form-control"  value="<?php  echo $row['patage'];?>" required="true">
									</div>
									<div class="form-group">
										<label for="fess">
											Medical History
										</label>
										<textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"><?php  echo $row['medhis'];?></textarea>
									</div>
									<div class="form-group">
										<label for="fess">
											Creation Date
										</label>
										<input type="text" class="form-control"  value="<?php  echo $row['cDate'];?>" readonly='true'>
									</div>
								<?php } ?>
								<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
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
	<?php include('include/footer.php');?>
	<?php include 'include/script.php'; ?>
</body>
</html>