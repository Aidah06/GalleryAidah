<?php
	
include_once "template/header.php";
include_once "template/sidebar.php";

include_once "../controllers/c_foto.php";
include_once "../controllers/c_komentar.php";
include_once "../controllers/c_like.php";

$foto = new c_foto();
$komentar = new c_komentar();
$like = new c_like();

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");
?>
<main id="main" class="main">
	<?php foreach ($foto->read_postingan($_GET['fotoid']) as $read) : ?>
		<div class="card">
		<div class="card-body">
			<div class="container">
				<div class="user-block">
					 
                    </a>
                </div>
            </div>
			<div class="card-body mt-2">
			<h4 style="margin-left: 2%; margin-bottom: 1%;"><?= $read->username ?></h4>
                <h6 style="margin-left: 2%; margin-bottom: 1%;"><?= $read->tanggalunggah ?></h6>
                <img src="../assets/images/<?= $read->lokasifile ?>" width="50%" height="50%" alt="">
                <h5 class="card-title"><?= $read->judulfoto ?></h5>		
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <p class="p mb-0 text-gray-800 m-0 font-weight-bold text-dark"><?= $read->deskripsifoto ?></p>
					<h6 class="text"><?= $like->jumlah($read->fotoid) ?> Like | <?= $komentar->jumlah($read->fotoid) ?> Comments</h6>
                </div>

				<?php if ($like->user($read->fotoid, $userid) == 0) { ?>
					<a href="../routers/r_like.php?fotoid=<?= $read->fotoid ?>&userid=<?= $userid ?>&aksi=like" title= "Like"><i class="ti ti-thumb-up"></i>Like</a>
					<?php } else { ?>
					<a href="../routers/r_like.php?fotoid=<?= $read->fotoid ?>&userid=<?= $userid ?>&aksi=delete" title= "Unlike"><i class="ti ti-thumb-down"></i>Unlike</a> 
						<?php } 
						if (empty($komentar->read_komentar($read->fotoid))) {
                    echo "";
                } else { ?>
                    <?php foreach ($komentar->read_komentar($read->fotoid) as $komen) : ?>
                        <div class="alert alert-dark alert-dismissible fade show" col-lg-12 role="alert">
                            <a class="nav-link nav-profile align-items-center pe-0" data-bs-toggle="dropdown">
							
                                <span class="username text-dark"><?= $komen->username ?>
                                <span style="margin-left: 70%;">
                                    <?= $komen->tanggalkomentar ?>
                                </span>
                                <br>
                                <span><?= $komen->isikomentar ?></span>
                            
							 <?php if ($userid == $komen->userid) { ?>
                                    <a href="../routers/r_komentar.php?komentarid=<?= $komen->komentarid ?>&aksi=hapus&fotoid=<?= $read->fotoid ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"  class="btn-close"></a>
                                <?php } ?>  
                            </a>
                        </div>
						<?php endforeach; ?>
						<?php } ?>
						<form class="row g-3 mt-3" action="../routers/r_komentar.php?aksi=tambah" method="post">
							<input type="text" name="isikomentar" class="form-control" placeholder="Comments">
							<input type="text" name="komentarid" id="id" hidden >
							<input type="text" name="userid" id="" value="<?= $userid ?>" hidden>
							<input type="text" name="fotoid" id="" value="<?= $read->fotoid ?>" hidden>
							<input type="text" name="tanggalkomentar" id="" value="<?= $waktu ?>" hidden>
							<button type="submit"hidden > </button>
						</form>
					</div>
				</div>
				</div>
			<?php endforeach; ?>
	
	</html>
</main>	<!-- Blog Page end -->
				
<?php
 include_once "template/footer.php";
?>

