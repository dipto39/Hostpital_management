    <!-- footer -->
    <section id="footer" class="mt-5 bg-info text-center text-white">
        <div class="container ">
            <div class="row ">
                <div class="col-md-4 pt-lg-4">
                    <h3 class="text-uppercase hf ">Follow us</h3>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class=" pt-lg-5">
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
                </div>
                <div class="col-md-4 p-4">
                    <H3 class="text-uppercase hf ">QUICK LINK</H3>
                    <div>
                        <ul class="list-unstyled">
                            <li> <a href="index.php">Home</a></li>
                            <li> <a href="gallery.php">Gallery</a></li>
                            <li> <a href="contact.php">contact</a></li>
                            <li> <a href="doctors.php">Doctors</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 pt-lg-4">
                    <H3 class="text-uppercase hf ">Our Department</H3>
                    <div>
                        <ul class="list-unstyled">
                            <?php $get_dep = mysqli_query($con, "select * from doctorspecilization limit 4");
                            while ($row = mysqli_fetch_assoc($get_dep)) {
                                echo '<li><a href="depertment.php?id=' . $row['id'] . '">' . $row['specilization'] . '</a></li>';
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy">
            <h6>© healthcare.com| All right reserved</h6>
        </div>
    </section>
    <!-- import js file -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>

    </script>