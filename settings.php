<?php require_once('includes/header2.php')?>

  <main id="main">
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Account</h3>
                <p>fill the form below to update account.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Phone No</label>
                        <input type="text" class="form-control" name="phone" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Facebook Link</label>
                        <input type="text" class="form-control" name="fac" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Twitter Link</label>
                        <input type="text" class="form-control" name="twi" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Instagram Link</label>
                        <input type="text" class="form-control" name="inst" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" required id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <input type="file" class="form-control" name="file" required id="">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success">submit</button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </section>
  </main><!-- End #main -->

  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>