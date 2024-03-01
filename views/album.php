<?php

include_once "template/header.php";
include_once "../controllers/c_login.php";
include_once "../controllers/c_album.php";
include_once "template/sidebar.php";


$baru = new c_album();


?>



 <div class="container-fluid">
 
 <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">

                <a class="cta-btn" href="tambahalbum.php"><i class="ti ti-plus fs-6"> album</i></a>
 
                 </div>
              </div>
            </div>
         </div>
         <br>
        <div class="row">
        <?php if (empty($baru->read())) {
          echo'<h3 class="text-secondary">  tidak memiliki Album';
        }else{ ?>
          <?php foreach ($baru->read() as $read) : ?>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
              <?php
               if($_SESSION['userid'] == $read->userid){
                 ?>
               <a href="editalbum.php?albumid=<?= $read->albumid?>" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n6 me-5" data-bs-toggle="tooltip" data-bs-placement="" data-bs-title=""><i class="ti ti-pencil fs-6"></i></a>                     
               
               <a href="../routers/r_album.php?albumid=<?= $read->albumid ?>&aksi=delete"onclick="return confirm('Yakin ingin menghapus data ini?')"class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n8 me-8" data-bs-toggle="tooltip" data-bs-placement="" data-bs-title=""><i class="ti ti-trash fs-6"></i></a>                     
               
               <?php
               }
               ?>
                <a href="foto.php?albumid=<?= $read->albumid ?>"><img src="../assets/images/<?= $read->photo ?>" height="300px" width="200px" class="card-img-top rounded-5" alt="..."></a>
                
              </div>
              
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-6"><?= $read->namaalbum?></h6>
                
                <h4 class="fw-semibold fs-2 mb-0"><?= $read->tanggaldibuat ?><span class="ms-2 fw-normal text-muted fs-3"></h4>
                <div class="d-flex align-items-center justify-content-between">
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                  <p class="py-4">
                     <?= $read->deskripsi ?>
                    </p>                
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php } ?>
         
       
</body>

</html>
<?php
include_once "template/footer.php";
?>