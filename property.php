<?php 
require_once('includes/header.php');
require_once('includes/connection.php');
?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property grid">
      <div class="container">
        <div class="row">

          <?php
            $sql = "SELECT * FROM properties WHERE deleted = 1";
            $res = mysqli_query($con,$sql);
            if(mysqli_num_rows ($res) > 0){
              while($row = mysqli_fetch_assoc($res)){
                $pname = $row['pname'];
                $img = $row['img'];
                $plocation = $row['plocation'];
                $parea = $row['parea'];
                $pbed = $row['pbed'];
                $pbath = $row['pbath'];
                $pgarage = $row['pgarage'];
                $pprice = $row['pprice'];
                $pprice = $row['pprice'];
                $pid = $row['id'];
          ?>


          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="includes/post/<?=$img?>" width="100%" height="350"  alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property-single.php?pid=<?=$pid?>"><?=$pname?>
                        <br /> <?=$plocation?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | $ <?=number_format($pprice)?></span>
                    </div>
                    <a href="property-single.php?pid=<?=$pid?>" class="link-a">Click here to view
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?=$parea?>m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span><?=$pbed?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span><?=$pbath?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span><?=$pgarage?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
        <?php }else{?>


          <div class="col-md-4">
            <h4>no property uploaded yet....</h4>
          </div>

        <?php } ?>

        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->
  <?php require_once('includes/footer.php');?> 