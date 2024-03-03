<?php
error_reporting(0);
include_once '../controllers/c_login.php';

$userid = $_SESSION['userid'];
$nama = $_SESSION['namalengkap'];
$alamat = $_SESSION['alamat'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$jeniskelamin = $_SESSION['jeniskelamin'];

include_once "validasi.php";

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gallery</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>




