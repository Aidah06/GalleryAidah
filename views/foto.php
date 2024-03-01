<?php


include_once "template/header.php";
include_once "template/sidebar.php";
include_once "../controllers/c_album.php";
include_once "../controllers/c_foto.php";

$baru = new c_album();
$foto = new c_foto();

?>

 <!--  Header End -->
      <div class="container-fluid">
        
        <div class="row">
          
          <?php foreach ($baru->edit($_GET["albumid"]) as $read) : ?>
            <div class="page-header d-flex align-items-center">
              <div class="container position-relative">
                 <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2><?= $read->namaalbum ?></h2>
                        <p><?= $read->deskripsi ?></p>
                   <?php
                   if($_SESSION['userid'] == $read->userid){
                  ?>
                  <a class="cta-btn" href="tambahfoto.php?albumid=<?php echo $_GET['albumid'];?>"><i class="ti ti-plus fs-6"> Foto</i></a>
                  <?php
                  }
                 ?>
                   </div>
                 </div>
             </div>
          </div>
          <?php endforeach; ?>
          
             <main id="main" data-aos="fade" data-aos-delay="1500">
             <br>
        <div class="row">
            <?php if (empty($foto->read($_GET['albumid']))) {
            echo'<h3 class="text-secondary"> tidak memiliki foto';
           }else{ ?>
          <section id="gallery" class="gallery">
       <div class="container-fluid">
         <div class="row gy-4 justify-content-center">
           <?php foreach ($foto->read($_GET['albumid']) as $read) : ?>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <?php
               if($_SESSION['userid'] == $read->userid){
                 ?>
                <a href="editfoto.php?fotoid=<?= $read->fotoid?>" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-4 end-0 mb-n6 me-5" data-bs-toggle="tooltip" data-bs-placement="" data-bs-title=""><i class="ti ti-pencil fs-6"></i></a>
                
                <a href="../routers/r_foto.php?fotoid=<?= $read->fotoid?>&aksi=delete&albumid=<?= $read->albumid?>" onclick="return confirm('Yakin ingin menghapus data ini?')"  class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-4 end-0 mb-n8 me-8" data-bs-toggle="tooltip" data-bs-placement="" data-bs-title=""><i class="ti ti-trash fs-6"></i></a>  
                <?php
                }
               ?>
               
                <a href="dfoto.php?fotoid=<?= $read->fotoid ?>"><img src="../assets/images/<?= $read->lokasifile ?>" height="300px" width="200px" class="card-img-top rounded-0" alt="..."></a>
                </div>

             <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4"><?= $read->judulfoto?></h6>
                <h4 class="fw-semibold fs-2 mb-0"><?= $read->tanggalunggah ?><span class="ms-2 fw-normal text-muted fs-3"></h4>
             <div class="d-flex align-items-center justify-content-between">
               <ul class="list-unstyled d-flex align-items-center mb-0">
                   <p class="py-4">
                  <?= $read->deskripsifoto ?>
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