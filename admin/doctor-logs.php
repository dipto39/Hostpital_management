<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Doctor Session Logs</title>
	<?php include 'include/head.php'; ?>
</head>
<body class="nav-md">
	<?php
	$page_title = 'Admin  | Doctor Session Logs';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
			<?php echo htmlentities($_SESSION['msg']="");?></p>
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
					$sql=mysqli_query($con,"select * from doctorslog ");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{
						?>
						<tr>
							<td class="center"><?php echo $cnt;?>.</td>
							<td class="hidden-xs"><?php echo $row['uid'];?></td>
							<td class="hidden-xs"><?php echo $row['username'];?></td>
							<td><?php echo $row['userip'];?></td>
							<td><?php echo $row['loginTime'];?></td>
							<td><?php echo $row['logout'];?>
						</td>
						<td>
							<?php if($row['status']==1)
							{
								echo "Success";
							}
							else
							{
								echo "Failed";
							}?>
						</td>
					</tr>
					<?php
					$cnt=$cnt+1;
				}?>
			</tbody>
		</table>
	</div>
</div>
<?php include('include/footer.php');?>
<?php include 'include/script.php'; ?>
</body>