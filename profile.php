<?php include "header.php";
if (!isset($_SESSION['uid'])) {
    echo "<script>window.history.back();</script>";
}

$uid = $_SESSION['uid'];
$get_user = mysqli_query($con, "select * from users where id= '$uid'");
$user = mysqli_fetch_assoc($get_user);
?>

<section>
    <div class="container mt-3">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="img/user/<?php echo $user['pp'] ?>" alt="Admin" class="rounded-circle user_image" width="150" height="150">
                                <div class="mt-3">
                                    <h4><?php echo $user['fullName'] ?></h4>
                                    <p class="text-secondary mb-1"> <?php if ($user['gender'] == "m") {
                                                                        echo "Male";
                                                                    } elseif ($user['gender'] == "f") {
                                                                        echo "Female";
                                                                    } elseif ($user['gender'] == "o") {
                                                                        echo "Other";
                                                                    }  ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $user['address'] ?></p>
                                    <form action="" class="d-flex my-2 justify-content-between d-none" id="change_pp_form" enctype="multipart/form-data">
                                        <input class="d-none" type="file" accept="image/*" name="pp" id="pp">
                                        <input class="btn btn-success" type="submit" value="Upload">
                                        <input class="btn btn-danger hide_pp" type="button" value="cancel">


                                    </form>
                                    <button class="btn btn-info change_pp">Changes profile picture</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 profile_info">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user['fullName'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user['email'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user['phn'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Aeg</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user['age'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user['address'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info edit_profile">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="container">
        <h3 class="hf text-uppercase text-info text-center p-3">Your record</h3>
        <table class="table border-1 border-info user_app_his">
            <thead>
                <tr class="bg-info text-light">
                    <th scope="col">SI</th>
                    <th scope="col">Pa Name</th>
                    <th scope="col">Dr Name</th>
                    <th scope="col">Depertment</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php $id = $_SESSION['uid'];
            $get_user_history = mysqli_query($con, "select * from appointment where userid = $id order by postingDate desc;");
            // $num = mysqli_fetch_assoc($get_user_history);

            ?>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($get_user_history)) {
                    $get_uname = mysqli_query($con, "select * from users where id = $id;");
                    $get_uname = mysqli_fetch_assoc($get_uname);
                    $user_name = $get_uname['fullName'];
                    $did = $row['doctorId'];
                    $get_doctor = mysqli_query($con, "select * from doctors where id = $did;");
                    $get_doctor = mysqli_fetch_assoc($get_doctor);
                    $d_name = $get_doctor['doctorName'];
                    $department = $get_doctor['specilization'];
                    $get_dep = mysqli_query($con, "select * from doctorspecilization where id = $department");
                    $num2 = mysqli_fetch_assoc($get_dep);
                    $dep = $num2['specilization'];

                    echo ' <tr>
                <th scope="row">' . $i . '</th>
                <td> ' . $user_name . '</td>
                <td> ' . $d_name . '</td>
                <td> ' . $dep . '</td>
                <td> ' . $row['appointmentDate'] . '</td>
                <td class="pointer">';
                    if (($row['userStatus'] == 1)) {
                        echo "<p class='text-denger'>Cancel by you</p>";
                    }
                    if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 0)) {
                        echo "<p class='text-warning appc_btn' data-attr='" . $row['id'] . ",", $row['doctorId'] . "'>Pending</p>";
                    }
                    if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1) && ($row['appstatus'] == 0)) {
                        echo "<p class='text-success ' data-attr='" . $row['id'] . ",", $row['doctorId'] . "'>Confirm by Doctor</p>";
                    }
                    if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 1)) {
                        echo "<p class='text-success ' data-attr='" . $row['id'] . ",", $row['doctorId'] . "'>Confirm by authority</p>";
                    }
                    if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 2) && ($row['appstatus'] == 0)) {
                        echo "<p class='text-danger '>Cancel by Doctor</p>";
                    }
                    if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 2)) {
                        echo "<p class='text-danger'>Cancel by Authority</p>";
                    }


                    echo '</td>
            </tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="scancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>
<script>

</script>