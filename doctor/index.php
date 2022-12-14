<?php
session_start();
include "../admin/include/config.php";
error_reporting(0);
if (isset($_POST['submit'])) {
	$ret = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "dashboard.php";
		$_SESSION['dlogin'] = $_POST['username'];
		$_SESSION['did'] = $num['id'];
		$_SESSION['doctorName'] = $num['doctorName'];
		$_SESSION['dpp'] = $num['pp'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 1;
		$log = mysqli_query($con, "insert into doctorslog(uid,username,userip,status) values('" . $_SESSION['did'] . "','" . $_SESSION['dlogin'] . "','$uip','$status')");
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$host  = $_SERVER['HTTP_HOST'];
		$_SESSION['dlogin'] = $_POST['username'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 0;
		mysqli_query($con, "insert into doctorslog(username,userip,status) values('" . $_SESSION['dlogin'] . "','$uip','$status')");
		$_SESSION['errmsg'] = "Invalid username or password";
		$extra = "index.php";
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor Login</title>
	<?php include 'include/head.php'; ?>
</head>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>
		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<div class="box-login">
						<form class="form-login" method="post">
							<fieldset>
								<legend>
									HC | Doctor Login
								</legend>
								<p>
									Please enter your name and password to log in.<br />
									<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
								</p>
								<div class="form-group">
									<span class="input-icon">
										<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group form-actions">
									<span class="input-icon">
										<input type="password" class="form-control password" name="password" placeholder="Password">
									</span>
									<a href="forgot-password.php">
										Forgot Password ?
									</a>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary pull-right" name="submit">
										Login <i class="fa fa-arrow-circle-right"></i>
									</button>
								</div>
							</fieldset>
						</form>
						<div class="copyright">
							&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> 2022 healthcare.com</span>. <span> All Rights Reserved.</span>
						</div>
					</div>
			</div>
</body>
<!-- end: BODY -->

</html>