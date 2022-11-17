<?php include "header.php";
if (!isset($_GET['id'])) {
    echo '<script> window.history.back()</script>';
} else {
    $id = $_GET['id'];
    $get_dep = mysqli_query($con, "select * from doctorspecilization where id =$id");
    $num = mysqli_fetch_assoc($get_dep);
    if ($num > 0) {




?>

        <!-- breadcrumb -->
        <!-- another version - flat style with animated hover effect -->
        <div class="breadcrumb flat mt-3">
            <a href="index.php">Home</a>
            <a href="#">Department</a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>">cardiologists</a>
        </div>

        <!-- department info -->

        <section>
            <div class="row p-2 m-0 ">
                <div class=" left col-md-6 col-12 p-3 d-flex align-items-center justify-content-center bg-light animate__animated animate__fadeInLeft">
                    <div class=" border-1">
                        <h2 class="hf text-info  mb-4 text-uppercase"><?php echo $num['specilization'] ?> <span class="text-dark ">Department</span>

                        </h2>
                        <h5 class="text-body">What is meaning of this department?</h5>
                        <p>
                            <?php echo $num['dis'] ?>
                        </p>
                    </div>

                </div>
                <div class="right col-md-6 col-12 animate__animated animate__fadeInRight d-flex align-items-center p-3">
                    <img class="img-fluid" src="img/<?php echo $num['img'] ?>" alt="">
                </div>
            </div>
        </section>

        <!-- fee section  -->
        <section>
            <div class="mt-4">
                <div class="container">
                    <h2 class="hf text-info text-center">Treatment Costs</h2>
                    <div class="border border-info w-25 m-auto mb-3"></div>
                </div>
            </div>
            <div class="pricesection  text-center">
                <div class="d-flex justify-content-center bg-light p-4">
                    <div class="left">
                        <p> Doctor visit :</p>
                        <p> <?php echo $num['specilization'] ?> test :</p>
                        <p> x-ray :</p>
                        <p> etc :</p>
                        <p>Tootal :</p>
                    </div>
                    <div class="right">
                        <p> aprox(<?php echo $num['fee'] ?> tk)</p>
                        <p> aprox(500 tk)</p>
                        <p> aprox(500 tk)</p>
                        <p> aprox(00 tk)</p>
                        <p> aprox(<?php echo $num['fee'] + 500 + 500 ?> tk)</p>

                    </div>
                </div>

            </div>
        </section>
        <!-- spacilaside doctor -->
        <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
            <h3 class="hf text-info text-center text-uppercase">cardiologists doctors</h3>
            <div class="carousel-inner">
                <?php
                $id = $_GET['id'];
                $get_dep = mysqli_query($con, "select * from doctors where specilization =$id");
                $num2 = mysqli_num_rows($get_dep);
                if ($num2 > 0) {
                    while ($row = mysqli_fetch_assoc($get_dep)) {
                        echo '  <div class="carousel-item active bg-white">
                        <div class="spdoctor card m-auto border border-info p-3 bg-light" style="width: 28rem;">
                            <img src="img/doc/' . $row['pp'] . '" class="card-img-top" alt="Dr. ' . $row['doctorName'] . '">
                            <div class="card-body">
                                <h4 class="card-title hf">Dr. ' . $row['doctorName'] . '</h4>
                                <h5 class="card-title hf">' . $num['specilization'] . '</h5>
                                <p class="card-text">Hi , i am Jon Deo. I am a cardiologists.I must keep up with the latest
                                    advances in how to treat patients to provide the best care..</p>';

                        echo '<a class="btn btn-info text-light me-3"';
                        if (isset($_SESSION['uid'])) {
                            echo ' data-bs-toggle="modal" data-bs-target="#appointment"';
                        }
                        echo ' href="login.php">
Make Appointment
</a>';
                        echo ' </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo "<h2 class='text-center text-danger'>No doctor Found for this Department</h2>";
                }
                ?>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon  bg-info" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-info" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


<?php     } else {
        echo '<script> window.history.back()</script>';
    }
}

include 'footer.php'; ?>