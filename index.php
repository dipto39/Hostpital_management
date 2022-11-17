<?php include 'header.php'; ?>
<!-- carousel start -->
<!-- Carousel wrapper -->
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active bg-info" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active bg-black zinde" data-bs-interval="4000">
            <img src="img/c1.jpeg" class="d-block w-100" alt="...">
            <div>

            </div>
            <div class="carousel-caption position-absolute top-50 translate-middle-x translate-middle-y">
                <h4 class="fw-bold text-info animate__animated animate__backInDown">Hi Welcome To HEALTH CARE</h4>
                <p>We guarantee your good health.</p>
                <a class="btn btn-info text-light me-3 app_btn" <?php if (isset($_SESSION['uid'])) {
                                                                    echo ' data-bs-toggle="modal" data-bs-target="#appointment"';
                                                                } ?> href="login.php">
                    Make Appointment
                </a>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <img src="img/c2.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption  position-absolute top-50 translate-middle-x translate-middle-y">
                <h4 class="fw-bold text-info animate__animated animate__backInDown">Modern equipment</h4>
                <p class="text-light"> If I could time travel into the future, my first port of call would be the
                    point where medical
                    technology is at its best because, like most people on this planet, I have this aversion to
                    dying.</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <img src="img/c3.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption position-absolute top-50 translate-middle-x translate-middle-y">
                <h4 class="fw-bold text-info animate__animated animate__backInDown">Experienced doctor</h4>
                <p class="text-light">All doctors treat, but a good doctor lets nature heal.</p>
                <a class="btn btn-info text-light  animate__animated animate__backInUp" href="doctors.php">See all Doctors</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel wrapper -->

<!-- choose us -->
<section>
    <div class="row p-2 m-0 ">
        <div class=" left col-md-6 col-12 p-3 d-flex align-items-center justify-content-center bg-light animate__animated animate__fadeInLeft">
            <div class=" border-1">
                <h2 class="hf text-info  mb-4 text-uppercase">Why chose us <span class="text-warning ">?</span>
                </h2>
                <h5 class="text-body">GET A WORLD CLASS HEALTH SERVICE NOW</h5>
                <p>
                    Our reputation for outstanding care and family-like atmosphere, together with advanced medical
                    technology and facilities ensures we attract leading consultants and specialists from the
                    industry
                    to work with us. All our clinicians are board-certified and come with very high credentials
                    within
                    their field of speciality. Many of our consultant doctors are internationally recognised as
                    well.
                    Whilst practicing at our facilities, our consultants comply with Clinical Governance system that
                    ensures adequate patient care. All our nurses are fully qualified and registered with the
                    Nursing
                    Council.
                </p>
            </div>

        </div>
        <div class="right col-md-6 col-12 animate__animated animate__fadeInRight d-flex align-items-center ">
            <img class="img-fluid" src="img/why.jpeg" alt="">
        </div>
    </div>
</section>
<!-- special fetures -->
<section>
    <div class="sheader my-5">
        <h2 class="text-uppercase text-center hf text-info ">special features</h2>
        <hr class="border border-info border-2 border-opacity-75  w-25 m-auto text-info">

    </div>
    <div class="d-flex justify-content-around row m-0 gap-3 my-4">
        <div class="fa-2x col-lg-3 col-md-6 d-flex justify-content-between p-3 hove">
            <div class="l">
                <i class="fa fa-clock-o"></i>
            </div>
            <div class=" d-flex justify-content-center align-items-center">
                <h5>24/7 hour service</h5>
            </div>
        </div>
        <div class="fa-2x col-lg-3 col-md-6 d-flex justify-content-between p-3 hove">
            <div class="l">
                <i class="fa-solid fa-truck-medical"></i>
                <i class="fa fa-ambulance"></i>
            </div>
            <div class=" d-flex justify-content-center align-items-center">
                <h5>Free Ambulance</h5>
            </div>
        </div>
        <div class="fa-2x col-lg-3 col-md-6 d-flex justify-content-between p-3 hove">
            <div class="l">
                <i class="fa fa-hotel"></i>
            </div>
            <div class=" d-flex justify-content-center align-items-center">
                <h5>High Quality Bed</h5>
            </div>
        </div>
        <div class="fa-2x col-lg-3 col-md-6 d-flex justify-content-between p-3 hove">
            <div class="l">
                <i class="fa fa-medkit"></i>
            </div>
            <div class=" d-flex justify-content-center align-items-center">
                <h5>Low Price Medicine</h5>
            </div>
        </div>
    </div>
</section>
<!-- our service start -->

<section>
    <div class="container my-5">
        <div class="section-title">
            <div class="row ">
                <div class=" text-center">
                    <h2 class="hf">Our <span class="text-info">Services</span></h2>
                    <div class="border bg-info w-25 m-auto mb-3"></div>
                    <p>Here is some services</p>
                </div>
            </div>
        </div>
        <div class="container ">

            <div class="row gx-3 gy-5 text-center">
                <?php
                $get_dep = mysqli_query($con, "select * from doctorspecilization limit 6");
                while ($row = mysqli_fetch_assoc($get_dep)) {
                    echo '<div class="col-md-6 col-lg-4 ">
                     <div class="service-item text-center servic_single">
                         <h4><a href="#">' . $row['specilization'] . '</a></h4>
                         <div class="border bg-info w-25 m-auto mb-3"></div>
                         <p> ';
                    $dis = $row['dis'];
                    echo  substr($dis, 0, 100);
                    echo "...";
                    echo '</p>
                         <a class="btn btn-info text-white margin-top-20" href="depertment.php?id=' . $row['id'] . '" >Read
                             More</a>
                     </div>
                 </div>';
                }
                ?>

            </div>
        </div>
    </div>
</section>

<!-- our happy claint  -->
<section class="home-testimonial mt-3">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center testimonial-pos">
            <div class="col-md-12 pt-4 d-flex justify-content-center">
                <h2 class="text-light hf text-uppercase">Our Happy Patient</h2>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <h6 class="text-light">Our patient opinion in public</h6>
            </div>
        </div>
        <section class="home-testimonial-bottom">
            <div class="container testimonial-inner">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">

                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="img/h2.jpeg" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Joy Hasan</div>
                                <div class="link-position d-flex justify-content-center">Business Man</div>
                                <div class="tour-text color-grey-3 text-center">&ldquo;At this School, our mission
                                    is to balance a rigorous comprehensive college preparatory curriculum with
                                    healthy social and emotional development.&rdquo;</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">

                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="img/h3.jpeg" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Sanjida Kathun</div>
                                <div class="link-position d-flex justify-content-center">Student</div>
                                <div class="tour-text color-grey-3 text-center">&ldquo;At this School, our mission
                                    is to balance a rigorous comprehensive college preparatory curriculum with
                                    healthy social and emotional development.&rdquo;</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">

                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="img/h1.jpeg" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Balbir Kaur</div>
                                <div class="link-position d-flex justify-content-center">Driver</div>
                                <div class="tour-text color-grey-3 text-center">&ldquo;At this School, our mission
                                    is to balance a rigorous comprehensive college preparatory curriculum with
                                    healthy social and emotional development.&rdquo;</div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
</section>
<!-- our happy scrtion end  -->
<?php include 'footer.php'; ?>