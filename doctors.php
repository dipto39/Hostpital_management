<?php include "header.php"; ?>

<!-- filter doctor -->
<div class="filter">
    <div class="bar position-relative p-2">
        <div class="filter_doctor">
            <i class="fa fa-filter text-info"> Short by</i>
            <select class="filter_dep">
                <option selected disabled value="0">Select</option>
                <?php
                $get_dep = mysqli_query($con, "select * from doctorspecilization");

                while ($row = mysqli_fetch_assoc($get_dep)) {
                    echo '<option value="' . $row['id'] . '">' . $row['specilization'] . '</a></li>';
                }
                ?>
            </select>
            <select class="fil_doc_fee">
                <option selected disabled value="0">Fees</option>
                <option value="1">High to low</option>
                <option value="2">Low to high</option>
            </select>
        </div>

    </div>
</div>

<!-- all doctor section -->

<section id='doctors'>
    <?php
    $get_doc = mysqli_query($con, "select * from doctors");
    $num = mysqli_num_rows($get_doc);
    if ($num > 0) {


    ?>
        <div class="row g-5 m-0 mt-2 ">
            <?php
            while ($row = mysqli_fetch_assoc($get_doc)) {
                $docid = $row['specilization'];
                $get_dep = mysqli_query($con, "select * from doctorspecilization where id = $docid");
                $num2 = mysqli_fetch_assoc($get_dep);
                $dep = $num2['specilization'];
                echo '<div class="col-lg-3 col-md-4">
                <div class="card doc_pp">
                    <img src="img/doc/' . $row['pp'] . '" class="card-img-top img-fluid " alt="' . $row['doctorName'] . '">
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
            ?>

        </div>
    <?php } else {
        echo '<h2 class="text-center text-danger"> NO doctor found !</h2>';
    } ?>
    <!-- <div class="pagi text-center container  mt-5 ">
        <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">
                <li class="page-item "><a class="page-link" href="#">Previous</a></li>
                <li class="page-item "><a class="page-link actives" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div> -->

</section>
<?php include "footer.php" ?>