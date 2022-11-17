<?php
include "include/config.php";
if (isset($_POST['cancel_app'])) {
    $id = $_POST['cancel_app'];
    $idr = explode(",", $id);
    print_r($idr);
    if (mysqli_query($con, "update appointment set appstatus = 2 where id=$idr[0]")) {
        if (mysqli_query($con, "update patient set status = 0 where aid=$idr[0]")) {
            if (mysqli_query($con, "insert into docnoti(docid,userid,sms) values($idr[2],$idr[1],'Your appointment was cancelled by authority')")) {
                if (mysqli_query($con, "insert into notification(message,author,did) values('Your appointment was cancelled by authority',$idr[1],$idr[2])")) {
                    echo "Appointment is cancelled";
                }
            }
        }
    }
}
if (isset($_POST['confirm_app'])) {
    $id = $_POST['confirm_app'];
    $idr = explode(",", $id);
    if (mysqli_query($con, "update appointment set appstatus = 1 where id=$idr[0]")) {

        if (mysqli_query($con, "update patient set status = 1 where aid=$idr[0]")) {
            print_r($idr);
            if (mysqli_query($con, "insert into docnoti(docid,userid,sms) values($idr[2],$idr[1],'Your appointment was confirmed by authority')")) {
                if (mysqli_query($con, "insert into notification(message,author,did) values('Your appointment was confirmed by authority',$idr[1],$idr[2])")) {
                    echo "Appointment is Confirmed";
                }
            }
        }
    }
}
