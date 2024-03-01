<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gallery</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6s col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a class="text-nowrap logo-img text-center d-block py-1 w-100">
              
                <h1 class="text-center">Gallery</h1>
                 <form action="routers/r_login.php?aksi=register" method="post">
                    <div class="form-group row">
                  </div>
                   <div class="mb-1">
                    <input type="text" class="form-control" name="userid" id="userid" hidden>
                  </div>
                  <div class="mb-1">
                    <label for="exampleInputtext1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                  </div>
                  <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" class="form-control"  name="email" id="email" aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-1">
                    <label for="exampleInputtext1" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="namalengkap" id="namalengkap" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-1">
                    <label for="exampleInputtext1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-control" id="jeniskelamin" aria-describedby="textHelp" required>
                      <option>Laki-Laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                 <input type="submit" name="register" class="btn btn-primary w-100 py-6 fs-4 mb-4 rounded-2"  value="Register">
                 <p class="sign-up text-center">Already have an Account?<a href="index.php">Sign In</a></p>
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
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>