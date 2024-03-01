<?php
include_once "../controllers/c_album.php";

$album = new c_album();

if ($_GET['aksi'] == 'tambah') {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST ['namaalbum'];
    $deskripsi = $_POST ['deskripsi'];
    $tanggaldibuat = $_POST ['tanggaldibuat'];
   
    $photo = $_FILES["photo"]["name"];
    $tmp = $_FILES["photo"]["tmp_name"];

    $userid = $_POST["userid"];

    move_uploaded_file($tmp, '../assets/images/' . $photo);

    $album->insert($albumid=0, $namaalbum, $deskripsi, $tanggaldibuat, $photo, $userid);

    echo "<script> alert('album berhasil ditambahkan');
    document.location.href = '../views/v_album.php';
    </script>";

    }elseif ($_GET['aksi'] == 'edit') {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum']; 
    $deskripsi = $_POST['deskripsi'];
    
    $photo = $_FILES["photo"]["name"];
     $tmp = $_FILES["photo"]["tmp_name"];
    move_uploaded_file("$tmp", "../assets/images/" . $photo);
        
    $album->update($albumid, $namaalbum, $deskripsi, $photo);
        
        if ($album){
            echo "<script> alert('Album telah diubah');
         document.location.href = '../views/album.php';
         </script>";
        }
    
    }elseif ($_GET["aksi"] == "delete") {
        $albumid = $_GET["albumid"];
        $album->delete($albumid);
        
        header("Location: ../views/album.php");
}