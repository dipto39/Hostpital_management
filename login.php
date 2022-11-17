<?php include "header.php";

if (isset($_SESSION['uid'])) {
    echo '<script> window.history.back()</script>';
} ?>
<!-- login and registation form -->
<div class="container bg-light mt-auto">
    <div class="lform d-lg-flex justify-content-center align-items-center mt-5">
        <div class="lrform p-2 ">
            <div class="rinfo d-none">
                <h5 class="text-center text-info">Hi, Please input your data.</h2>

                    <form class="row g-3 needs-validation" novalidate id="rform">
                        <div class="col-12 text-danger text-center rerror">

                        </div>
                        <div class="col-12">
                            <label for="inputame" class="form-label">Full Name</label>
                            <input pattern="[a-zA-Z]{3,}" type="name" class="form-control" name="rname" id="impuname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input pattern='^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' type="email" class="form-control" name="remail" id="inputEmail4" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input pattern=".{6,}" type="password" class="form-control" name="rpass" id="inputPassword4" required>
                            <div class="invalid-feedback">
                                At last 6 charcter
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputphone" class="form-label"> phone(<span class="small text-warning">without
                                    +88</span>)</label>
                            <input pattern="(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$" type="text" name="rphone" class="form-control" id="inputphone" required>
                        </div>
                        <div class="col-md-3">
                            <label for="inputgender" class="form-label">Gender</label>
                            <select id="inputgender" name="rgander" class="form-select" required>
                                <option value="" selected disabled>Selelect gender</option>
                                <option value="f">female</option>
                                <option value="m">Male</option>
                                <option value="o">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="inputphone" class="form-label">Age</label>
                            <input min="6" type="number" name="rage" class="form-control" id="inputphone" required>
                            <div class="invalid-feedback">
                                Inter a valid age.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="inputaddr" class="form-label">Address</label>
                            <input type="text" name="raddr" class="form-control" id="inputAddr" required>

                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" name="rcheck" type="checkbox" id="checkme">
                                <label class="form-check-label" for="checkme">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-info text-light">Sign in</button>
                        </div>
                    </form>
            </div>
            <div class="linfo">
                <h5 class="text-center text-info">Welcome Back sir!</h2>
                    <form class="row g-3 lform needs-validation" novalidate id="lform">
                        <div class="col-12 text-danger text-center lerror">

                        </div>
                        <div class="col-12">
                            <label for="validationCustom01" class="form-label">Email</label>
                            <input type="email" name="lemail" class="form-control" id="validationCustom01" required>

                        </div>
                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Password</label>
                            <input type="password" name="lpass" class="form-control" id="validationCustom02" required>

                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="validationCustom03">
                                <label class="form-check-label" for="validationCustom03">
                                    Remaind me.
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-info text-light">Login</button>
                        </div>
                    </form>

            </div>
        </div>

        <div class="limg w-lg-50 order-0">
            <p class="text-center lorrconform">Create an account <a href="" class="toglelr">Reginstar</a></p>
            <img class="img-fluid" src="img/demo.jpg" alt="doctor">
        </div>

    </div>

</div>

<?php include 'footer.php' ?>