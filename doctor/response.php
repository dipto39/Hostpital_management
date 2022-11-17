<?php
include "../admin/include/config.php";
if(isset($_POST['cancel_app'])){
    $id=$_POST['cancel_app'];
    $idr = explode(",", $id);
    if(mysqli_query($con,"update appointment set doctorStatus = 2 where id=$idr[0]")){
        if(mysqli_query($con,"update patient set status = 0 where aid=$idr[0]")){
            if (mysqli_query($con, "insert into notification(message,author,did,feed) values('Your appointment was canceled by Doctor',$idr[1],$idr[2],1)")) {
                echo "Appointment is canceled";
            }
        }
    }
}
if(isset($_POST['confirm_app'])){
    $id=$_POST['confirm_app'];
    $idr = explode(",", $id);

    if(mysqli_query($con,"update appointment set doctorStatus = 1 where id=$idr[0]")){
        if(mysqli_query($con,"update patient set status = 1 where aid=$idr[0]")){
            if (mysqli_query($con, "insert into notification(message,author,did,feed) values('Your appointment was confirmed by Doctor',$idr[1],$idr[2],2)")) {
                echo "Appointment is confirmed";
            }
        }
    }
}