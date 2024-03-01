<?php

include_once "template/header.php"; 
include_once '../controllers/c_login.php';
include_once "template/sidebar.php"; 

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
                  <!-- <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a> -->
                <h1 class="text-center">Tambah Album</h1>
                 <form action="../routers/r_album.php?aksi=tambah" method="post" enctype="multipart/form-data">
                    
                   <div class="mb-1">
                    <input type="id" class="form-control" name="albumid" id="albumid" hidden>
                  </div>
                  
                  <div class="mb-2">
                    <input type="text" class="form-control" name="namaalbum" id="namaalbum" placeholder="Nama Album" aria-describedby="textHelp" required>
                  </div>
                  
                  <div class="form-group mb-2 mt-3">
                    <textarea class="form-control" name="deskripsi" rows="4" placeholder="Deskripsi" required></textarea>
                  </div>

                  <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" value="<?= $tanggal ?>" placeholder="Tanggal Dibuat" aria-label="tanggaldibuat" name="tanggaldibuat" hidden>
                    </div>

                  <div class="col-md-12 form-group mb-3 mt-3 mt-md-0">
                   
                    <input type="file" class="form-control" name="photo" id="photo" aria-describedby="textHelp" required>
                  </div>

                  <div class="form-group">
                    <input type="id" class="form-control form-control-user"  id="userid" value="<?= $_SESSION['userid'] ?>" name="userid" hidden>
                  </div>
                  
                  
                 <input type="submit" name="tambah" value="simpan album" class="btn btn-primary w-100 py-6 fs-4 mb-4 rounded-2">
                 <p class="sign-up text-center"><a href="index.php"></a></p>
                  <div class="d-flex align-items-center justify-content-center">
                  </div>
                </form>
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

<?php
 include_once "template/footer.php";
?>
















</html>