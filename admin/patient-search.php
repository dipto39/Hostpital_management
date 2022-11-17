<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | View Patients</title>
	<?php include 'include/head.php'; ?>
</head>
<body class="nav-md">
	<?php
	$page_title = 'Admin | View Patients';
	$x_content = true;
	?>
	<?php include('include/header.php');?>
	<div class="row">
		<div class="col-md-12">
			<form role="form" method="post" name="search">
				<div class="form-group">
					<label for="doctorname">
						Search by Name/Mobile No.
					</label>
					<input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
				</div>
				<button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
					Search
				</button>
			</form>
			<?php
			if(isset($_POST['search']))
			{
				$sdata=$_POST['searchdata'];
				?>
				<h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
				<table class="table table-hover" id="sample-table-1">
					<thead>
						<tr>
							<th class="center">#</th>
							<th>Patient Name</th>
							<th>Patient Contact Number</th>
							<th>Patient Gender </th>
							<th>Creation Date </th>
							<th>Updation Date </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql=mysqli_query($con,"select * from patient where patname like '%$sdata%'|| patcontact like '%$sdata%'");
						$num=mysqli_num_rows($sql);
						if($num>0){
							$cnt=1;
							while($row=mysqli_fetch_array($sql))
							{
								?>
								<tr>
									<td class="center"><?php echo $cnt;?>.</td>
									<td class="hidden-xs"><?php echo $row['patname'];?></td>
									<td><?php echo $row['patcontact'];?></td>
									<td><?php echo $row['gender'];?></td>
									<td><?php echo $row['cDate'];?></td>
									<td><?php echo $row['updateDate'];?>
								</td>
								<td>
									<a href="view-patient.php?viewid=<?php echo $row['id'];?>"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							<?php
							$cnt=$cnt+1;
						} } else { ?>
							<tr>
								<td colspan="8"> No record found against this search</td>
							</tr>
							<?php } }?></tbody>
						</table>
					</div>
				</div>
				<?php include('include/footer.php');?>
				<?php include 'include/script.php'; ?>
			</body>