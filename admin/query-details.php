<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

//updating Admin Remark
if(isset($_POST['update']))
{
	$qid=intval($_GET['id']);
	$adminremark=$_POST['adminremark'];
	$isread=1;
	$query=mysqli_query($con,"update contactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
	if($query){
		echo "<script>alert('Admin Remark updated successfully.');</script>";
		echo "<script>window.location.href ='read-query.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Query Details</title>

	<?php include 'include/head.php'; ?>
</head>
<body class="nav-md">
	<?php
	$page_title = 'Admin | Query Details';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Query Details</span></h5>
			<table class="table table-hover" id="sample-table-1">

				<tbody>
					<?php
					$qid=intval($_GET['id']);
					$sql=mysqli_query($con,"select * from contactus where id='$qid'");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{
						?>

						<tr>
							<th>Full Name</th>
							<td><?php echo $row['fullname'];?></td>
						</tr>

						<tr>
							<th>Email Id</th>
							<td><?php echo $row['email'];?></td>
						</tr>
						<tr>
							<th>Conatact Numner</th>
							<td><?php echo $row['contactno'];?></td>
						</tr>
						<tr>
							<th>Message</th>
							<td><?php echo $row['message'];?></td>
						</tr>

						<?php if($row['AdminRemark']==""){?>
							<form name="query" method="post">
								<tr>
									<th>Admin Remark</th>
									<td><textarea name="adminremark" class="form-control" required="true"></textarea></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>
										<button type="submit" class="btn btn-primary pull-left" name="update">
											Update <i class="fa fa-arrow-circle-right"></i>
										</button>

									</td>
								</tr>

							</form>
						<?php } else {?>

							<tr>
								<th>Admin Remark</th>
								<td><?php echo $row['AdminRemark'];?></td>
							</tr>

							<tr>
								<th>Last Updatation Date</th>
								<td><?php echo $row['LastupdationDate'];?></td>
							</tr>

							<?php
						}} ?>


					</tbody>
				</table>
			</div>
		</div>
		<?php include('include/footer.php');?>
		<?php include 'include/script.php'; ?>
	</body>