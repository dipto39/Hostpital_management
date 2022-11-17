
    <?php include "header.php"; ?>

    <section>
        <div class="contact row p-3 m-0">
            <div class="col-lg-6 p-5">
                <h3 class="hf text-info pb-3 border-1 border-info">GET IN TOUCH</h3>
                <form class="row g-3" id="contact_form">
                    <div class="col-md-6">
                        <label for="namevalid" class="form-label">Name</label>
                        <input type="text" class="form-control" name="cname" id="namevalid" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" name="cemail" id="inputEmail4" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">phone</label>
                        <input type="number" class="form-control" name="cphone" id="inputAddress" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Message</label>
                        <textarea class="form-control" name="cmessage" id="message" cols="30" rows="4"  required>  </textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-info text-light">Send message</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 p-5">
                <h3 class="hf text-info text-center">Our Location</h3>
                <div class="border border-info w-100 h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.9364169977475!2d89.5362039144052!3d22.84184178504493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9a90e51fdad5%3A0xd3b1f4bdfcee5740!2sBoikali%20Bazar!5e0!3m2!1sen!2sbd!4v1667834749192!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </section>
    <!-- footer  -->
    <?php include 'footer.php'?>

