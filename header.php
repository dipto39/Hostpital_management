   <?php
    include 'admin/include/config.php';
    session_start();
    // echo ;
    // $file1 = basename($_SERVER['PHP_SELF']);
    $file_name = basename($_SERVER['PHP_SELF'], ".php");

    ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>HEALTH CARE || GET A WORLD CLASS HEALTH SERVICE NOW</title>
       <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>

   <body>
       <!-- start contact bar -->
       <div class="contact_menu d-flex justify-content-around bg-light p-2 align-items-center">
           <div class="c_email px-2 py-1 text-info"><b>Email:</b> youremail@mail.com</div>
           <div class="c_phone  px-2 py-1 text-info"><b>Phone:</b> 01234567890</div>
           <div class="c_social">
               <a href="">
                   <i class="fa fa-facebook"></i>
               </a>

               <!-- Twitter -->
               <a href=""> <i class="fa fa-twitter"></i></a>


               <!-- Google -->
               <a href=""><i class="fa fa-youtube"></i></a>


               <!-- Instagram -->
               <a href=""><i class="fa fa-instagram"></i></a>

           </div>
       </div>
       <!-- end contact bar -->
       <!-- start nav bar -->
       <nav class="navbar navbar-expand-lg sticky-top ">
           <div class="container-fluid">
               <a class="navbar-brand logo" href="index.php">
                   <span class="h1 text-uppercase text-light bg-info ">HEALTH </span><span class="text-info h1 text-uppercase bg-light"> &nbsp;CARE</span>

               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse pt-md-2" id="navbarTogglerDemo02">
                   <ul class="navbar-nav ms-5 ms-sm-0 me-auto mb-2 mb-lg-0">
                       <li class="nav-item ac">
                           <a class="nav-link <?php if ($file_name == "index") {
                                                    echo "active";
                                                } ?>" aria-current="page" href="index.php">Home</a>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle <?php if ($file_name == "depertment") {
                                                                    echo "active";
                                                                } ?> " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Department
                           </a>
                           <ul class="dropdown-menu">
                               <?php
                                $get_dep = mysqli_query($con, "select * from doctorspecilization");
                                while ($row = mysqli_fetch_assoc($get_dep)) {
                                    echo '<li><a class="dropdown-item" href="depertment.php?id=' . $row['id'] . '">' . $row['specilization'] . '</a></li>';
                                }
                                ?>
                           </ul>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link <?php if ($file_name == "doctors") {
                                                    echo "active";
                                                } ?>" href="doctors.php">Doctors</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link <?php if ($file_name == "contact") {
                                                    echo "active";
                                                } ?>" href="contact.php">Contact</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link <?php if ($file_name == "gallery") {
                                                    echo "active";
                                                } ?>" href="gallery.php">Our Gallery</a>
                       </li>

                   </ul>
                   <div class="d-flex">
                       <a class="btn btn-info text-light me-3 app_btn" <?php if (isset($_SESSION['uid'])) {
                                                                            echo ' data-bs-toggle="modal" data-bs-target="#appointment"';
                                                                        } ?> href="login.php">
                           Make Appointment
                       </a>
                       <?php if (isset($_SESSION['uid'])) {
                        ?>
                           <div class="dropdown">
                               <a class="nav-item  me-4 text-info" role="button" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
                                   <i class="fa fa-bell badgee"></i>
                                   <span class="position-absolute top-0 start-1 translate-middle badge badgee rounded-pill bg-danger">
                                       <span class="visually">
                                           <?php
                                           $uid = $_SESSION['uid'];
                                            $get_noti = mysqli_query($con, "select * from notification where author =$uid and status = 0 order by date desc");
                                            $num_noti = mysqli_num_rows($get_noti);
                                            if($num_noti > 0){
                                                echo $num_noti;
                                            }else{
                                                echo 0;
                                            } 
                                            ?>
                                       </span>
                                   </span>
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end noti" aria-labelledby="navbarDropdownMenuLink">
                                   <div class="text-info text-center hf">Your notification</div>
                                   <?php 
                                    if (mysqli_num_rows($get_noti) > 0) {
                                        while ($row = mysqli_fetch_assoc($get_noti)) {
                                            echo '                            <li>
                                            <a class="dropdown-item ';
                                            if($row['feed'] == 1){echo "text-danger";}else{echo "text-success";}
                                            echo '" href="#"> ' . $row['message'] . '</a>
                                        </li>';
                                        }
                                    } else {
                                        echo '<li class="text-danger text-center"> No New Notification Found..! </li>';
                                    } ?>

                               </ul>
                           </div>


                           <div class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   <img src="img/user/<?php echo $_SESSION['pp']; ?>" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                   <li>
                                       <a class="dropdown-item" href="profile.php">My profile</a>
                                   </li>
                                   <li>
                                       <a class="dropdown-item" href="#">Settings</a>
                                   </li>
                                   <li>
                                       <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logout_model">Logout</a>
                                   </li>
                               </ul>
                           </div>
                       <?php } else {  ?>
                           <a class="btn btn-info text-light px-3 me-2" href="login.php">Login</a>


                       <?php } ?>


                   </div>
               </div>
           </div>
       </nav>
       <!-- logout conformation -->
       <!-- Modal -->
       <div class="modal fade" id="logout_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <h4>Are you sure to logout</h4>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                       <button type="button" class="btn btn-danger" id="logout">Logout</button>
                   </div>
               </div>
           </div>
       </div>

       <!-- apornment model -->
       <div class="modal fade" id="appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title text-info">Appointment Form</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <h6 class="hf text-info text-center py-2">You should make an appointment by fillup this form</h6>
                       <form class="row g-3 needs-validation" novalidate id="appointmentForm">

                       </form>
                   </div>
               </div>
           </div>
       </div>

       <!-- css loader -->
       <div class="loader_container position-fixed top-0 fixed d-none">
           <div class="position-absolute top-50 start-50 translate-middle">
               <div class="loader">
                   <span></span>
                   <span></span>
                   <span></span>
                   <span></span>
                   <span></span>
                   <span></span>
                   <span></span>
               </div>
               <h5 class="text-info">Health care</h5>
           </div>

       </div>
       <!-- nav bar end -->

   </body>

   </html>