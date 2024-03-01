<?php

include_once "template/header.php";
include_once "template/sidebar.php";
include_once "../controllers/c_foto.php";
include_once "../controllers/c_login.php";

$foto = new c_foto();


date_default_timezone_set('Asia/jakarta');
$tanggal = date("Y-m-d H:i:s");
?>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6s col-xxl-4">
            <div class="card mb-0">
              <div class="card-body">
                <a class="text-nowrap logo-img text-center d-block py-1 w-100">
                  
                <h1 class="text-center">Edit foto</h1>
                <?php foreach($foto->edit($_GET['fotoid']) as $edit) : ?>
                 <form action="../routers/r_foto.php?aksi=update" method="post" enctype="multipart/form-data">
                    
                   <div class="mb-1">
                    <input type="text" class="form-control" name="fotoid" id="fotoid" value="<?= $edit->fotoid ?>"hidden>
                  </div>
                  
                  <div class="mb-2">
                    <input type="text" class="form-control" name="judulfoto"  placeholder="Judul Foto" aria-describedby="textHelp" value="<?= $edit->judulfoto ?>">
                  </div>

                  <div class="form-group mb-2 mt-3">
                    <textarea class="form-control" name="deskripsifoto" rows="4" placeholder="Deskripsi foto"required><?= $edit->deskripsifoto ?></textarea>
                  </div>
                  
                  <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" value="<?= $tanggal ?>" placeholder="Tanggal Unggah" aria-label="tanggalunggah" name="tanggalunggah" hidden>
                    </div>

                  <div class="col-md-12 form-group mb-3 mt-3 mt-md-0">
                   
                    <input type="file" class="form-control"  value="<?= $edit->lokasifile ?>" name="lokasifile" id="lokasifile" placeholder="lokasi foto" aria-describedby="textHelp">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="albumid" name="albumid" placeholder="albumid" value="<?= $edit->albumid ?>"hidden>
                    </div>

                    <div class="form-group">
                        <input type="id" class="form-control form-control-user" id="userid" value="<?= $_SESSION['userid']?>" name="userid" placeholder="userid"hidden>
                    </div>
                   <input type="submit" class="btn btn-primary w-100 py-6 fs-4 mb-4 rounded-2" value="Edit Foto">
                 <p class="sign-up text-center"></a></p>
                  <div class="d-flex align-items-center justify-content-center">
                  </div>
                </form>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
  <?php

 include_once "template/footer.php";

?>