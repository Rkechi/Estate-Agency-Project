<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>
    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main">
    <section class="container" style="margin-top: 10%;">
        <div class="row">
            <div class="col-md-8">
                <h3>Log Into Account</h3>
                <p>fill the form below to sign in.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="includes/loginsub.php" method="POST">

                    <?php if(isset($_GET['error'])){ ?>
                      <div class="alert alert-danger alert-dismissible">
                        <button class="btn-close" data-bs-dismiss="alert"></button>
                        <p><?php echo $_GET['error']?></p>
                      </div>
                      <?php }else if (isset($_GET['success'])) { ?>
                      <div class="alert alert-success alert-dismissible">
                        <button class="btn-close" data-bs-dismiss="alert"></button>
                        <p><?php echo $_GET['success']?></p>
                      </div>
                      <?php } ?>
                    
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" required id="">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" name="submit">submit</button>
                    </div>
                </form><br>
                <div>
                    <p>not yet a member? <a href="register.php" class="text-success">click Here</a> to register</p>
                </div>
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