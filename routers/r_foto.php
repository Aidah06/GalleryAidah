<?php
    include_once "../controllers/c_foto.php";
    $foto = new c_foto();

    if ($_GET["aksi"] == "tambah") {
        $fotoid = $_POST["fotoid"];
        $judulfoto = $_POST["judulfoto"];
        $deskripsifoto = $_POST["deskripsifoto"];
        $tanggalunggah= $_POST["tanggalunggah"];

        $tipe = array('png','jpg');
        $lokasifile = $_FILES["lokasifile"]["name"];
        $tmp = $_FILES["lokasifile"]["tmp_name"];
        $x = explode('.',$lokasifile);
        $ekstensi = strtolower(end($x));
        $albumid= $_POST["albumid"];
        $userid= $_POST["userid"];
        if(in_array($ekstensi,$tipe) == true){
            move_uploaded_file($tmp, '../assets/images/' . $lokasifile);
         
        
        $foto->insert($fotoid=0, $judulfoto, $deskripsifoto, $tanggalunggah, $lokasifile, $albumid, $userid);

        echo "<script> alert('foto berhasil ditambahkan');
        document.location.href ='../views/foto.php?albumid=$albumid';
        </script>";
        
        }else{
            echo "<script> alert('tolong masukan file dengan ekstensi (png/jpg)');
            document.location.href = '../views/tambahalbum.php?albumid=$albumid';
            </script>";
        }
        
    }elseif ($_GET['aksi'] == 'update') {
        $fotoid = $_POST['fotoid'];
        $judulfoto = $_POST['judulfoto']; 
        $deskripsifoto = $_POST['deskripsifoto'];
        $albumid= $_POST["albumid"];

        $lokasifile = $_FILES["lokasifile"]["name"];
        $tmp = $_FILES["lokasifile"]["tmp_name"];
        move_uploaded_file("$tmp", "../assets/images/" . $lokasifile);

       $foto->update($fotoid, $judulfoto, $deskripsifoto, $lokasifile);
        
        if ($foto){
            echo "<script> alert('foto telah diubah');
         document.location.href ='../views/foto.php?albumid=$albumid';
         </script>";
        }
    
    }elseif ($_GET["aksi"] == "delete") {
        $fotoid = $_GET["fotoid"];
        $albumid = $_GET["albumid"];
        $foto->delete($fotoid);
        
        header("location: ../views/foto.php?albumid=$albumid");
    }
