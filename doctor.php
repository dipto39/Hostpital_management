<?php include "header.php";
if (!isset($_GET['id'])) {
    echo '<script> window.history.back()</script>';
} else {
    $docid = $_GET['id'];
    $get_doc = mysqli_query($con, "select * from doctors where id = $docid");
    $num = mysqli_num_rows($get_doc);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($get_doc);
        $docid = $row['specilization'];
        $get_dep = mysqli_query($con, "select * from doctorspecilization where id = $docid");
        $num2 = mysqli_fetch_assoc($get_dep);
        $dep = $num2['specilization'];

?>
        <!-- doctor details -->
        <section>

            <div class=" row m-lg-5 d-flex">
                <div class="position-relative col-lg-6 left col-12 p-3 d-flex align-items-center justify-content-center bg-light animate__animated animate__fadeInLeft">
                    <img class="img-fluid" src="./img/doc/<?php echo $row['pp'] ?>" alt="">
                    <div class="det bg-info text-light position-absolute text-center w-100 bottom-0">
                        <h4 class="hf ">Dr. <?php echo $row['doctorName'] ?></h4>
                        <h6 class="hf"> <?php echo $dep ?></h6>
                    </div>
                </div>
                <div class="right col-lg-6 col-12 animate__animated animate__fadeInRight d-flex align-items-center">
                    <div class="p-5">
                        <div class="name">
                            <h3 class="hf text-info">Dr. <?php echo $row['doctorName'] ?></h3>
                            <h6 class="hf"> <?php echo $dep ?></h6>
                            <hr>
                        </div>
                        <h5 class="hf"> About <span class="text-info"><?php echo $row['doctorName'] ?></span> </h5>
                        <p><?php echo $row['about'] ?></p>
                    </div>

                </div>
            </div>
            <div class="row g-5 text-info m-0 text-center">
                <div class="col-lg-4 col-md-4 left">
                    <div class="card  border border-info">
                        <h5 class="hf bg-info text-light p-3 text-uppercase"> Qualification </h5>
                        <?php
                        $qual = $row['qual'];
                        $quala = explode('|', $qual);
                        foreach ($quala as $val) {
                            echo '<p>' . $val . '</p>';
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4  mid">
                    <div class="card  border border-info">
                        <h5 class="hf bg-info text-light p-3 text-uppercase"> FEES </h5>
                        <p>Visit -<?php echo $row['docFees'];?>tk </p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4  right">
                    <div class="card  border border-info">

                        <h5 class="hf bg-info text-light p-3 text-uppercase"> Visite Hour </h5>
                        <div class="d-flex list-unstyled justify-content-around">
                            <ul class="list-unstyled">
                                <li class="p-1">Saturday-Tuesday</li>
                                <li class="p-1">Friday</li>
                                <li class="p-1">Wensday</li>

                            </ul>

                            <ul class="list-unstyled">
                                <li class="p-1">10AM -2PM</li>
                                <li class="p-1">3PM</li>
                                <li class="p-1">11AM</li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }
} ?>
<!-- footer  -->
<?php include 'footer.php'; ?>
<!-- import js file -->