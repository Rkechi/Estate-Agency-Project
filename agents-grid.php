<?php 
require_once('includes/header.php');
require_once('includes/connection.php');
?>
  <main id="main">
    <!-- =======Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Agents</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Agents Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Agents Grid ======= -->
    <section class="agents-grid grid">
      <div class="container">
        <div class="row">
          <?php
          $sql = "SELECT * FROM agents";
          $res = mysqli_query($con, $sql);
          if(mysqli_num_rows($res)> 0){
            while($rows = mysqli_fetch_assoc($res)){
              $aname = $rows['name'];
              $aimg = $rows['img'];
              $aemail = $rows['email'];
              $aphone = $rows['phone'];
              $adescription = $rows['description'];
              $afacebook = $rows['facebook'];
              $ainstagram = $rows['instagram'];
              $atwitter = $rows['twitter'];  
              $aid = $rows['id'];  
          ?>
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="includes/dp/<?=$aimg?>" alt="" class="img-d" width="100%" height="350">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.php?aid=<?=$aid?>" class="link-two"><?=$aname?></a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    <?=$adescription?>
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234
                    </p>
                    <p>
                      <strong>Email: </strong> <?=$aemail?>
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>
          <?php }else{ ?>
            <div class="col-md-4">
              <h1>no relator has signed up yet...</h1>
            </div>
            <?php } ?>
        </div>
      </div>
    </section><!-- End Agents Grid-->

  </main><!-- End #main -->
  <?php require_once('includes/footer.php')?>

  