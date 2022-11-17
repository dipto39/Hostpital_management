<?php
session_start();
error_reporting(0);
include "../admin/include/config.php";
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{

  $vid=$_GET['viewid'];
  $bp=$_POST['bp'];
  $bs=$_POST['bs'];
  $weight=$_POST['weight'];
  $temp=$_POST['temp'];
  $pres=$_POST['pres'];


  $query.=mysqli_query($con, "insert into tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
  if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Doctor | Manage Patients</title>

	<?php include 'include/head.php'; ?>

  <body class="nav-md">
    <?php
    $page_title = 'Doctor | Manage Patients';
    $x_content = true;
    ?>
    <?php include('include/header.php');?>

    <div class="row">
      <div class="col-md-12">
        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
        <?php
        $vid=$_GET['viewid'];
        $ret=mysqli_query($con,"select * from patient where id='$vid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
         ?>
         <table border="1" class="table table-bordered">
           <tr align="center">
            <td colspan="4" style="font-size:20px;color:blue">
            Patient Details</td></tr>

            <tr>
              <th scope>Patient Name</th>
              <td><?php  echo $row['patname'];?></td>
              <th scope>Patient Email</th>
              <td><?php  echo $row['patemail'];?></td>
            </tr>
            <tr>
              <th scope>Patient Mobile Number</th>
              <td><?php  echo $row['patcontact'];?></td>
              <th>Patient Address</th>
              <td><?php  echo $row['pataddress'];?></td>
            </tr>
            <tr>
              <th>Patient Gender</th>
              <td><?php  echo $row['gender'];?></td>
              <th>Patient Age</th>
              <td><?php  echo $row['patage'];?></td>
            </tr>
            <tr>

              <th>Patient Medical History(if any)</th>
              <td><?php  echo $row['medhis'];?></td>
              <th>Patient Reg Date</th>
              <td><?php  echo $row['cDate'];?></td>
            </tr>

          <?php }?>
        </table>
        <?php

        $ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



        ?>
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <tr align="center">
           <th colspan="8" >Medical History</th>
         </tr>
         <tr>
          <th>#</th>
          <th>Blood Pressure</th>
          <th>Weight</th>
          <th>Blood Sugar</th>
          <th>Body Temprature</th>
          <th>Medical Prescription</th>
          <th>Visit Date</th>
        </tr>
        <?php
        while ($row=mysqli_fetch_array($ret)) {
          ?>
          <tr>
            <td><?php echo $cnt;?></td>
            <td><?php  echo $row['BloodPressure'];?></td>
            <td><?php  echo $row['Weight'];?></td>
            <td><?php  echo $row['BloodSugar'];?></td>
            <td><?php  echo $row['Temperature'];?></td>
            <td><?php  echo $row['MedicalPres'];?></td>
            <td><?php  echo $row['CreationDate'];?></td>
          </tr>
          <?php $cnt=$cnt+1;} ?>
        </table>

        <p align="center">
         <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>

         <?php  ?>
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover data-tables">

               <form method="post" name="submit">

                <tr>
                  <th>Blood Pressure :</th>
                  <td>
                    <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
                  </tr>
                  <tr>
                    <th>Blood Sugar :</th>
                    <td>
                      <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
                    </tr>
                    <tr>
                      <th>Weight :</th>
                      <td>
                        <input name="weight" placeholder="Weight" class="form-control wd-450" required="true"></td>
                      </tr>
                      <tr>
                        <th>Body Temprature :</th>
                        <td>
                          <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
                        </tr>

                        <tr>
                          <th>Prescription :</th>
                          <td>
                            <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                          </tr>

                        </table>
                      </div>
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                     </form>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</div>

<?php include('include/footer.php');?>
<?php include 'include/script.php'; ?>

</body>
</html>