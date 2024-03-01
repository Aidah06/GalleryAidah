<?php
include_once "template/header.php";
include_once "template/sidebar.php";

include_once "../controllers/c_foto.php";
$home = new c_foto();

?>

<div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4"></h5>
                <p class="mb-0">welcome to gallery </p>
            </div>
          </div>
        </div>
          
            <div class="row gy-4 container-fluid justify-content-center">
            <?php if (empty($home->home())) {
          echo'<h3 class="text-secondary"> tidak ada postingan';
        }else{ ?>
                
                <?php foreach($home->home() as $baru) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gallery-item h-100">
                        <a href="dfoto.php?fotoid=<?= $baru->fotoid ?>"><img src="../assets/images/<?= $baru->lokasifile ?>" class="img" height="250px" width="210px" ></a>
                <div class="gallery-links d-flex align-items-center justify-content-center">
                               
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php } ?>
   

        </div>

      </div>
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->

<?php

include_once "template/footer.php";

?>