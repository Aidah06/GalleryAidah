<?php

include_once "../controllers/c_login.php";
$login = new c_login();

if ($_GET['aksi'] == 'register') {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $jeniskelamin= $_POST['jeniskelamin'];
   
    $password = password_hash($password, PASSWORD_DEFAULT);

    $login->register($userid=0, $username, $password, $email, $namalengkap, $alamat, $jeniskelamin);
       echo "<script> alert('Akun telah berhasil di registrasi!');
        document.location.href = '../index.php';
        </script>";

}elseif ($_GET['aksi'] == 'login'){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login->login($email, $password);

    
} elseif ($_GET['aksi'] == 'logout'){
    
    $login->logout();
}
