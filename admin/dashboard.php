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
  <title>Admin | Dashboard</title>
<?php include 'include/head.php'; ?>
</head>

<body class="nav-md">
  <?php include('include/header.php'); ?>
  <div class="tile_count">
    <div class=" g-5">
      <?php

      $result = mysqli_query($con, "SELECT * FROM users ");
      $num_rows = mysqli_num_rows($result);
      $total_users = htmlentities($num_rows);

      $result1 = mysqli_query($con, "SELECT * FROM doctors ");
      $num_rows1 = mysqli_num_rows($result1);
      $total_doctors = htmlentities($num_rows1);

      $sql = mysqli_query($con, "SELECT * FROM appointment");
      $num_rows2 = mysqli_num_rows($sql);
      $total_appointments = htmlentities($num_rows2);

      $result = mysqli_query($con, "SELECT * FROM patient ");
      $num_rows = mysqli_num_rows($result);
      $total_patients = htmlentities($num_rows);

      $sql = mysqli_query($con, "SELECT * FROM contactus where  IsRead is null");
      $num_rows22 = mysqli_num_rows($sql);
      $total_queries = htmlentities($num_rows22);

      ?>
      <div class="col-lg-4 col-sm-4  tile_stats_count border border-info p-5 text-center">
        <span class="count_top "><i class="fa fa-users"></i> Total Users</span>
        <div class="count"><?php echo $total_users; ?></div>
        <a href="manage-users.php">
          <span class="count_bottom">View all users</span>
        </a>
      </div>
      <div class="col-lg-4 col-sm-4  tile_stats_count border border-info p-5 text-center">
        <span class="count_top"><i class="fa fa-user-md"></i> Total Doctors</span>
        <div class="count"><?php echo $total_doctors; ?></div>
        <a href="manage-doctors.php">
          <span class="count_bottom">View all doctors</span>
        </a>
      </div>
      <div class="col-lg-4 col-sm-4  tile_stats_count border border-info p-5 text-center">
        <span class="count_top"><i class="fa fa-list-alt"></i> Total Appointments</span>
        <div class="count"><?php echo $total_appointments; ?></div>
        <a href="appointment-history.php">
          <span class="count_bottom">View all appointments</span>
        </a>
      </div>
      <div class="col-lg-4 col-sm-4  tile_stats_count border border-info p-5 text-center">
        <span class="count_top"><i class="fa fa-user"></i> Total Patients</span>
        <div class="count"><?php echo $total_patients; ?></div>
        <a href="manage-patient.php">
          <span class="count_bottom">View all patients</span>
        </a>
      </div>
      <div class="col-md-4 col-sm-4  tile_stats_count border border-info p-5 text-center">
        <span class="count_top"><i class="fa fa-question"></i> Total Queries</span>
        <div class="count green"><?php echo $total_queries; ?></div>
        <a href="read-query.php">
          <span class="count_bottom">View all queries</span>
        </a>
      </div>

    </div>
  </div>


  <?php include('include/footer.php'); 
  include 'include/script.php';?>


</body>

</html>