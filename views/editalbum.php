<?php

include_once "template/header.php";
include_once "../controllers/c_album.php";
include_once '../controllers/c_login.php';
include_once "template/sidebar.php";
$album = new c_album();

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
                 
                <h1 class="text-center">Edit Album</h1>
                <?php foreach($album->edit($_GET['albumid']) as $edit) : ?>
                 <form action="../routers/r_album.php?aksi=edit" method="post" enctype="multipart/form-data">
                    
                   <div class="mb-1">
                    <input type="id" class="form-control" name="albumid" id="albumid" value="<?= $edit->albumid ?>" hidden>
                  </div>
                  
                  <div class="mb-2">
                    <input type="text" class="form-control" name="namaalbum" id="namaalbum" placeholder="Nama Album" aria-describedby="textHelp"  value="<?= $edit->namaalbum ?>">
                  </div>

                  <div class="form-group mt-3">
                      <textarea class="form-control" name="deskripsi" rows="4" placeholder="Deskripsi" required><?= $edit->deskripsi ?></textarea>
                    </div>

                  <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" value="<?= $tanggal ?>" placeholder="Tanggal Dibuat" aria-label="tanggaldibuat" name="tanggaldibuat" hidden>
                    </div>

                  <div class="col-md-12 form-group mt-3 mt-md-0 mb-3">
                   
                    <input type="file" class="form-control" value="<?= $edit->photo?>" name="photo" id="photo" aria-describedby="textHelp">
                  </div>

                  <div class="form-group">
                    <input type="id" class="form-control form-control-user"  id="userid" value="<?= $_SESSION['userid'] ?>" name="userid" hidden>
                  </div>
                  
                  
                 <input type="submit" name="edit" class="btn btn-primary w-100 py-6 fs-4 mb-4 rounded-2" value="Edit Album">
                 <p class="sign-up text-center"><a href="index.php"></a></p>
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
  <?php
 include_once "template/footer.php";
?>

</body>

</html>