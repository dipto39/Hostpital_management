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
	<title>Patients | Appointment History</title>
	<?php include 'include/head.php'; ?>
</head>

<body class="nav-md">
	<?php
	$page_title = 'Patients  | Appointment History';
	$x_content = true;
	?>
	<?php include('include/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">Appointment <span class="text-bold">History</span></h5>
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th class="hidden-xs">Doctor Name</th>
						<th>Patient Name</th>
						<th>Specialization</th>
						<th>Appointment Date / Time </th>
						<th>Appointment Creation Date </th>
						<th>Current Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con, "select PatientName,specilization,doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId ");
					$cnt = 1;
					while ($row = mysqli_fetch_array($sql)) {
						$gedpid = $row['specilization'];
						$get_dep = mysqli_query($con, "select * from doctorspecilization where id = $gedpid");
						$getr = mysqli_fetch_assoc($get_dep);
						$dep = $getr['specilization'];
					?>
						<tr>
							<td class="center"><?php echo $cnt; ?>.</td>
							<td class="hidden-xs"><?php echo $row['docname']; ?></td>
							<td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
							<td><?php echo $dep ?></td>
							<td><?php echo $row['appointmentDate']; ?> / <?php echo
																			$row['appointmentTime']; ?>
							</td>
							<td><?php echo $row['postingDate']; ?></td>
							<td>
								<?php
								if (($row['userStatus'] == 1)) {
									echo "Cancel by Patient";
								}
								if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 0)) {
									echo "Painding";
								}
								if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1) && ($row['appstatus'] == 0)) {
									echo "Confirm by Doctor";
								}
								if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 1)) {
									echo "Confirm by you";
								}
								if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 2) && ($row['appstatus'] == 0)) {
									echo "cancel by Doctor";
								}
								if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 2)) {
									echo "cancel by You";
								}

								?></td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<?php if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 0)) {
										echo "<p data-attr='" . $row['id'].",".$row['userId'] .",".$row['doctorId'] . "' class='ctcor' style='cursor:pointer;'>Click to action</p>";
									}elseif(($row['userStatus'] == 1) or ($row['doctorStatus'] == 2) or ($row['appstatus'] == 2)) {
										echo "<p class='text-danger'>Canceled</p>";
									}elseif (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 0)) {
										echo "<p class='text-worning'>Painding</p>";
									} else {
										echo "<p class='text-success'>Confirmed</p>";
									} ?>
								</div>
							</td>
						</tr>
					<?php
						$cnt = $cnt + 1;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="confModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h2>Select your Action</h2>
				</div>
				<div class="modal-footer d-flex">
					<button type="button" class="btn btn-danger">Cancel</button>
					<button type="button" class="btn btn-primary">Confirm</button>
				</div>
			</div>
		</div>
	</div>
	<?php include('include/footer.php'); ?>
	<?php include 'include/script.php'; ?>
	<script>
		$(document).on("click", '.ctcor', function(e) {
			var dataid = $(this).attr("data-attr");

			$('#confModal .modal-footer').html('<button type="button" class="appcan btn btn-danger" data-attr="' + dataid + '" >Cancel</button><button type="button" class="appcon btn btn-primary" data-attr="' + dataid + '">Confirm</button>');
			$('#confModal').modal("show");
			// if (confirm("are you sure")) {
			// 	$.ajax({
			// 		url: "response.php",
			// 		type: 'post',
			// 		data: {
			// 			cancel_app,
			// 			dataid
			// 		},
			// 		success: function(e) {
			// 			alert(e);
			// 		}
			// 	})
			// } else {
			// 	alert('srooy')
			// }
		})
		$(document).on("click", '.appcan', function(e) {
			var data = $(this).attr("data-attr");
			$.ajax({
				url: 'response.php',
				type: 'post',
				data: {
					cancel_app: data
				},
				success: function(e) {
					alert(e)
					window.location.reload();

				}
			})
		})
		$(document).on("click", '.appcon', function(e) {
			var data = $(this).attr("data-attr");
			$.ajax({
				url: 'response.php',
				type: 'post',
				data: {
					confirm_app: data
				},
				success: function(e) {
					alert(e)
					window.location.reload();
				}
			})
		})
	</script>
</body>