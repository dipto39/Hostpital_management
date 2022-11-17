<?php
session_start();
include "admin/include/config.php";

// login 
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['lemail']);
    $pass = md5($_POST['lpass']);

    $quer = mysqli_query($con, "select * from users where email = '$email' and password ='$pass'");
    $num = mysqli_fetch_assoc($quer);
    if ($num > 0) {
        $uid = $num['id'];
        $pp = $num['pp'];
        echo "success";
        $_SESSION['uid'] = $uid;
        $_SESSION['pp'] = $pp;
    } else {
        echo "no";
    }
}

// logout 

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo "success";
}
// add user
if (isset($_POST['adduser'])) {
    $name = mysqli_real_escape_string($con, $_POST['rname']);
    $email = mysqli_real_escape_string($con, $_POST['remail']);
    $pass = md5($_POST['rpass']);
    $phone = mysqli_real_escape_string($con, $_POST['rphone']);
    $gender = mysqli_real_escape_string($con, $_POST['rgander']);
    $age = mysqli_real_escape_string($con, $_POST['rage']);
    $addr = mysqli_real_escape_string($con, $_POST['raddr']);
    $check = mysqli_real_escape_string($con, $_POST['ischeck']);
    $check_email = mysqli_query($con, "select * from users where email = '$email'");
    $check_email = mysqli_fetch_assoc($check_email);
    if ($check_email > 0) {
        echo "failed";
    } else {
        if ($check == "checked") {
            setcookie("email", "$email");
            setcookie("pass", "$pass");
        }

        if (mysqli_query($con, "insert into users(fullName,email,password,phn,gender,age,address) values('$name','$email','$pass',$phone,'$gender',$age,'$addr')")) {
            $id = mysqli_insert_id($con);
            echo "success";
            $_SESSION['uid'] = $id;
            $_SESSION['pp'] = "user.png";
        }
    }
}

// get user
if (isset($_POST['get_user'])) {
    $uid = $_SESSION['uid'];
    $quer = mysqli_query($con, "select * from users where id =$uid");
    $num = mysqli_fetch_assoc($quer);
    echo '<div class="card">
    <form id="edit_profile">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" name="ename" value="' . $num['fullName'] . '">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control"  name="eemail" value="' . $num['email'] . '">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control"  name="ephone" value="' . $num['phn'] . '">
            </div>
        </div>
        <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Age</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control"  name="eage" value="' . $num['age'] . '">
        </div>
    </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control"  name="eaddr" value="' . $num['address'] . '">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 text-secondary">
                <input type="submit" class="btn btn-info text-light px-4 pedit_btn" value="Save Changes">
            </div>
        </div>
    </div>
    </form>
</div>';
}

// update user
if (isset($_POST['upuser'])) {
    $id = $_SESSION['uid'];
    $name = mysqli_real_escape_string($con, $_POST['ename']);
    $email = mysqli_real_escape_string($con, $_POST['eemail']);
    $phone = mysqli_real_escape_string($con, $_POST['ephone']);
    $age = mysqli_real_escape_string($con, $_POST['eage']);
    $addr = mysqli_real_escape_string($con, $_POST['eaddr']);
    if (true) {
        if (mysqli_query($con, "update users set fullName ='$name',email='$email',phn=$phone,age = $age,address ='$addr' where id =$id")) {
            echo "success";
        }
    }
}

if (isset($_POST['up_profile'])) {
    $uid = $_SESSION['uid'];
    $name = $_FILES['pp']['name'];
    $tempnmae = $_FILES['pp']['tmp_name'];
    $size = $_FILES['pp']['size'];
    if ($size > 2097152) {
        echo "too big";
    } else {
        if (mysqli_query($con, "update users set pp ='$name' where id =$uid")) {
            if (move_uploaded_file($tempnmae, "img/user/" . $name)) {
                echo "success";
                $_SESSION['pp'] = $name;
            }
        }
    }
}

// cancel appintment
if (isset($_POST['cancel_appint'])) {
    $id = $_SESSION['uid'];
    $data = $_POST['cancel_appint'];
    $dataar = explode(",", $data);

    if (mysqli_query($con, "update appointment set userStatus = 1 where id =$dataar[0]")) {
        $get = mysqli_query($con, "select * from appointment where userId =$id");
        // echo "insert into docnoti(docid,useid,sms) values($dataar[1],$dataar[0],'Your appointment was canceled by authority')";
        if (mysqli_query($con, "insert into docnoti(docid,userid,sms) values($dataar[1],$dataar[0],'Your appointment was canceled by authority')")) {


            while ($row = mysqli_fetch_assoc($get)) {
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
                $i = 1;
                echo ' <tr>
        <th scope="row">' . $i . '</th>
        <td> ' . $user_name . '</td>
        <td> ' . $d_name . '</td>
        <td> ' . $dep . '</td>
        <td> ' . $row['appointmentDate'] . '</td>
        <td class="pointer">';

                if (($row['userStatus'] == 1)) {
                    echo "<p class='text-danger'>Cancel by you</p>";
                }
                if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 0)) {
                    echo "<p class='text-warning appc_btn' data-attr='" . $row['id'] . ",", $row['doctorId'] . "'>Pending</p>";
                }
                if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1) && ($row['appstatus'] == 0)) {
                    echo "<p class='text-success appc_btn' data-attr='" . $row['id'] . ",", $row['doctorId'] . "'>Confirm by Doctor</p>";
                }
                if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 0) && ($row['appstatus'] == 1)) {
                    echo "<p class='text-success appc_btn' data-attr='" . $row['id'] . ",", $row['doctorId'] . "'>Confirm by authority</p>";
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
        }
    }
}
// check session 
if (isset($_POST['check_session'])) {
    if (isset($_SESSION['uid'])) {
        echo "success";
    }
}

// open appintment form
if (isset($_POST['open_app_form'])) {
    $uid = $_SESSION["uid"];
    $doc = $_POST['open_app_form'];
    $get_user = mysqli_query($con, "select * from users where id = $uid");
    $get_user = mysqli_fetch_assoc($get_user);
    echo '<div class="col-md-6">
    <label for="aname" class="form-label">Patient Name</label>
    <input  pattern="[a-zA-Z ]{3,}" type="text" class="form-control" id="aname" name="aname" value="' . $get_user['fullName'] . '" required>
</div>
<div class="col-md-6">
    <label for="aphone" class="form-label">Phone</label>
    <input pattern="(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$"  " type="number" class="form-control" id="aphone" name="aphone" value="' . $get_user['phn'] . '" required>
</div>
<div class="col-12">
    <label for="aemail" class="form-label">Email</label>
    <input type="email" class="form-control" id="aemail" name="aemail" value="' . $get_user['email'] . '" required>
</div>

<div class="col-md-6">
    <label for="app_dep_select" class="form-label">Department</label>
    <select class="form-select" id="app_dep_select" name="adep" onchange="app_change_department()" required>
        <option selected value="">Choose...</option>';
    $get_dep = mysqli_query($con, "select * from doctorspecilization");
    // $get_dep = mysqli_fetch_assoc($get_dep);
    while ($row = mysqli_fetch_assoc($get_dep)) {
        echo '<option class="" value="' . $row['id'] . '">' . $row['specilization'] . '</option>';
    }

    echo '</select>
</div>
<div class="col-md-6">
    <label for="app_doctor_select" class="form-label">Doctor</label>
    <select class="form-select" id="app_doctor_select" name="adoc" onclick="app_change_doctor()" required>
    </select>
</div>
<div class="col-md-6">
    <label for="afees" class="form-label">Fees</label>
    <input class="form-control" type="number" name="afees" id="afees" value="" disabled>
</div>
<div class="col-md-6">
    <label for="aage" class="form-label">Age</label>
    <input class="form-control" type="number" name="aage" id="aage" value="' . $get_user['age'] . '" required>
</div>
<div class="col-md-6">
<label for="agander" class="form-label">Gender</label>
<select id="agander" name="agander" class="form-select" required>
    <option value="" selected disabled>Selelect gender</option>
    <option value="f">female</option>
    <option value="m">Male</option>
    <option value="o">Other</option>
</select>
</div>
<div class="col-md-6">
    <label for="adate" class="form-label">Date of Appointment</label>
    <input class="form-control"  min="' . date('Y-m-d', strtotime(date('Y-m-d') . ' + 2 days')) . '" type="date" name="adate" id="adate"  required>
</div>

<div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="aaddr" value="' . $get_user['address'] . '">
</div>
<div class="col-12">
    <label for="amessage" class="form-label">Tell about Deggist</label>
    <textarea class="form-control" name="amessage" id="amessage" cols="30" rows="3"></textarea>
</div>
<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
            Sent a mali
        </label>
    </div>
</div>
<div class="col-12">
    <button type="submit" class="btn btn-info text-white">Make Appointment</button>
</div>';
}

/// change department and get doctor

if (isset($_POST['change_dep'])) {
    $val = $_POST['change_dep'];
    $get_doc = mysqli_query($con, "select * from doctors where specilization = $val");
    // $get_doc=mysqli_fetch_assoc($get_doc);
    echo '<option selected value="">Choose...</option>';
    while ($row = mysqli_fetch_assoc($get_doc)) {
        echo '<option class="" value="' . $row['id'] . '">' . $row['doctorName'] . '</option>';
    }
}
/// get doctor fee
if (isset($_POST['get_fee'])) {
    $val = $_POST['get_fee'];
    $get_fee = mysqli_query($con, "select * from doctors where id = $val");
    $get_fee = mysqli_fetch_assoc($get_fee);
    echo $get_fee['docFees'];
}

// adding appointment
if (isset($_POST['add_apppintment'])) {
    $uid = $_SESSION['uid'];
    $name = mysqli_real_escape_string($con, $_POST['aname']);
    $email = mysqli_real_escape_string($con, $_POST['aemail']);
    $phone = mysqli_real_escape_string($con, $_POST['aphone']);
    $gender = mysqli_real_escape_string($con, $_POST['agander']);
    $dep = mysqli_real_escape_string($con, $_POST['adep']);
    $doc = mysqli_real_escape_string($con, $_POST['adoc']);
    $age = mysqli_real_escape_string($con, $_POST['aage']);
    $adate = mysqli_real_escape_string($con, $_POST['adate']);
    $digg = mysqli_real_escape_string($con, $_POST['amessage']);
    $addr = mysqli_real_escape_string($con, $_POST['aaddr']);

    if (mysqli_query($con, "insert into appointment(PatientName,doctorId,userId,appointmentDate,userStatus,sms) values('$name',$doc,$uid,'$adate',0,'$digg')")) {
        $aid = mysqli_insert_id($con);
        if (mysqli_query($con, "insert into patient(aid,did,patname,patcontact,patemail,gender,pataddress,patage) values($aid,$doc,'$name',$phone,'$email','$gender','$addr',$age)")) {
            if(mysqli_query($con, "insert into docnoti(docid,userid,sms) values($doc,$uid,'Your have a New appointment')")){
                echo "success";

            }
        }
    }
}

// filter by dep
if (isset($_POST['filter_dep'])) {
    $val = $_POST['filter_dep'];
    // echo $val;
    if ($val == null) {
        $val = "";
    } else {
        $val = " where specilization = $val";
    }
    $val2 = $_POST['price_to'];
    $pric = "";
    if ($val2 == "1") {
        $pric = " order by docFees desc";
    } elseif ($val2 == "2") {
        $pric = " order by docFees asc";
    }
    $fi_dep = mysqli_query($con, "select * from doctors $val $pric");
    $num = mysqli_num_rows($fi_dep);
    echo ' <div class="row g-5 m-0 mt-2 ">';
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($fi_dep)) {
            $docid = $row['specilization'];
            $get_dep = mysqli_query($con, "select * from doctorspecilization where id = $docid");
            $num2 = mysqli_fetch_assoc($get_dep);
            $dep = $num2['specilization'];
            echo '<div class="col-lg-3 col-md-4">
            <div class="card">
                <img src="img/doc/' . $row['pp'] . '" class="card-img-top" alt="' . $row['doctorName'] . '">
                <div class="card-body bg-info text-light">
                    <h5 class="card-title hf">Dr. ' . $row['doctorName'] . '</h5>
                    <h6 class="card-title">' . $dep . '</h6>
                </div>
                <div class="card-body bg-light text-info p-2">
                    <div class="d-flex list-unstyled justify-content-between">
                        <ul class="list-unstyled">
                            <li class="p-1">Saturday-Tuesday</li>
                            <li class="p-1">Visit Fee</li>

                        </ul>

                        <ul class="list-unstyled">
                            <li class="p-1">10AM -2PM</li>
                            <li class="p-1">' . $row['docFees'] . ' TK</li>
                        </ul>
                    </div>
                </div>
                <a href="doctor.php?id=' . $row['id'] . '" class="btn btn-info text-light">View Profile</a>
            </div>
        </div>';
        }
    } else {
        echo "<h2 class='text-center text-danger'>No Doctor Fount...!</h2>";
    }
    echo '</div>';
    //     echo ' <div class="pagi text-center container  mt-5 ">
    //     <nav aria-label="Page navigation ">
    //         <ul class="pagination justify-content-center">
    //             <li class="page-item "><a class="page-link" href="#">Previous</a></li>
    //             <li class="page-item "><a class="page-link actives" href="#">1</a></li>
    //             <li class="page-item"><a class="page-link" href="#">2</a></li>
    //             <li class="page-item"><a class="page-link" href="#">3</a></li>
    //             <li class="page-item"><a class="page-link" href="#">Next</a></li>
    //         </ul>
    //     </nav>
    // </div>';
}

// inssert contact form
if (isset($_POST['insert_contact'])) {
    $name = mysqli_real_escape_string($con, $_POST['cname']);
    $email = mysqli_real_escape_string($con, $_POST['cemail']);
    $phone = mysqli_real_escape_string($con, $_POST['cphone']);
    $message = mysqli_real_escape_string($con, $_POST['cmessage']);
    if (mysqli_query($con, "insert into contactus(fullname,email,contactno,message) values('$name','$email','$phone','$message')")) {
        echo "Thank you... Our team will contact you soon";
    } else {
        echo "Something went wrong";
    }
}

// Read notification 
if (isset($_POST['read_noti'])) {
    $id = $_SESSION['uid'];
    if (mysqli_query($con, "update notification set status = 1 where author = $id")) {
        echo "success";
    }
}
