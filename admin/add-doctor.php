<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docname = $_POST['docname'];
	$docaddress = $_POST['clinicaddress'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$password = md5($_POST['npass']);
	$about = $_POST['about'];
	$qual = $_POST['qual'];

	if (isset($_FILES['docimg'])) {
		$file_name = $_FILES['docimg']['name'];
		$file_size = $_FILES['docimg']['size'];
		$tempname = $_FILES['docimg']['tmp_name'];

		if (move_uploaded_file($tempname, "../img/doc/" . $file_name)) {
			$sql = mysqli_query($con, "insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password,pp,qual,about) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password','$file_name','$qual','$about')");
			if ($sql) {
				echo "<script>alert('Doctor info added Successfully');</script>";
				echo "<script>window.location.href ='manage-doctors.php'</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Add Doctor</title>

	<?php include 'include/head.php'; ?>
	<script type="text/javascript">
		function valid() {
			if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.adddoc.cfpass.focus();
				return false;
			} else {
				var fsize = document.getElementById('docimg').files.item(0).size; // THE SIZE OF THE FILE.
				if (fsize > 2097152) {
					alert("File size must be 2 MB")
					return false;
				} else {
					return true;

				}
			}

		}
	</script>


	<script>
		function checkemailAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'emailid=' + $("#docemail").val(),
				type: "POST",
				success: function(data) {
					$("#email-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</head>

<body class="nav-md">
	<?php
	$page_title = 'Add Doctor';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>

	<div class="row">
		<div class="col-md-12">

			<div class="row margin-top-30">
				<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-body">

							<form name="adddoc" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" onSubmit="return valid();">
								<div class="form-group">
									<label for="DoctorSpecialization">
										Doctor Specialization
									</label>
									<select name="Doctorspecialization" class="form-control" required="true">
										<option value="">Select Specialization</option>
										<?php $ret = mysqli_query($con, "select * from doctorspecilization");
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<option value="<?php echo htmlentities($row['id']); ?>">
												<?php echo htmlentities($row['specilization']); ?>
											</option>
										<?php } ?>

									</select>
								</div>

								<div class="form-group">
									<label for="doctorname">
										Doctor Name
									</label>
									<input type="text" name="docname" class="form-control" placeholder="Enter Doctor Name" required="true">
								</div>


								<div class="form-group">
									<label for="address">
										Doctor Clinic Address
									</label>
									<textarea name="clinicaddress" class="form-control" placeholder="Enter Doctor Clinic Address" required="true"></textarea>
								</div>
								<div class="form-group">
									<label for="fess">
										Doctor Consultancy Fees
									</label>
									<input type="number" name="docfees" class="form-control" placeholder="Enter Doctor Consultancy Fees" required="true">
								</div>

								<div class="form-group">
									<label for="fess">
										Doctor Contact no
									</label>
									<input type="text" name="doccontact" class="form-control" placeholder="Enter Doctor Contact no" required="true">
								</div>

								<div class="form-group">
									<label for="fess">
										Doctor Email
									</label>
									<input type="email" id="docemail" name="docemail" class="form-control" placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
									<span id="email-availability-status"></span>
								</div>

								<div class="form-group">
									<label for="docimg">
										Doctor Photo
									</label>
									<input type="file" class="form-control" id="docimg" required name="docimg" accept="image/*">
								</div>



								<div class="form-group">
									<label for="exampleInputPassword1">
										Password
									</label>
									<input type="password" name="npass" class="form-control" placeholder="New Password" required="required">
								</div>

								<div class="form-group">
									<label for="exampleInputPassword2">
										Confirm Password
									</label>
									<input type="password" name="cfpass" class="form-control" placeholder="Confirm Password" required="required">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword2">
										About (more than 100 char)
									</label>
									<textarea pattern="/.{100,}/" name="about" id="about" cols="30" rows="3" class="form-control"></textarea>
								</div>

								<div class="form-group">
									<label for="exampleInputPassword2">
										Qualifcation (separate by "|")
									</label>
									<textarea name="qual" id="qual" cols="30" rows="3" class="form-control"></textarea>
								</div>
								<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
									Submit
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
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<?php include 'include/script.php'; ?>
</body>

</html>