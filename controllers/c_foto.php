<?php
include_once "c_conn.php";

class c_foto{
    public function insert($fotoid, $judulfoto, $deskripsifoto, $tanggalunggah, $lokasifile, $albumid, $userid){
        $conn = new c_conn();
        $query = "INSERT INTO foto VALUES ('$fotoid', '$judulfoto', '$deskripsifoto', '$tanggalunggah', '$lokasifile','$albumid', '$userid')";
        $data = mysqli_query($conn->conn(), $query);
        
    }
    public function read($albumid){
        $conn = new c_conn();
        // perintah mengambil semua data dari barang dan mengurutkan sesuai data terbaru diatas
        $query = "SELECT * FROM foto WHERE albumid='$albumid' ORDER BY fotoid DESC";
        $data = mysqli_query($conn->conn(), $query);

        // mengubah query data menjadi objek
        while ($row = mysqli_fetch_object($data)) {
            // array kosong untuk menampung data objek
            $rows[] = $row;
        }   

        // mengembalikan nilai
        if (!empty($rows)) {
            return $rows;
        }
    }
    //read_postingan artinya adalah read foto yang ada dalam foto postingan
    public function read_postingan($fotoid){
        $conn = new c_conn();
        $query = "SELECT foto.*, user.* FROM foto INNER JOIN user ON foto.userid = user.userid WHERE fotoid = $fotoid";
        $data = mysqli_query($conn->conn(), $query);

        // mengubah query data menjadi objek
        while ($row = mysqli_fetch_object($data)) {
            // array kosong untuk menampung data objek
            $rows[] = $row;
        }

        // mengembalikan nilai
        if (!empty($rows)) {
            return $rows;
           
        }
    }
    
    public function home(){
        $conn = new c_conn();
        // perintah mengambil semua data dari barang dan mengurutkan sesuai data terbaru diatas
        $query = "SELECT * FROM foto";
        $data = mysqli_query($conn->conn(), $query);

        // mengubah query data menjadi objek
        while ($row = mysqli_fetch_object($data)) {
            // array kosong untuk menampung data objek
            $rows[] = $row;
        }   

        // mengembalikan nilai
        if (!empty($rows)) {
            return $rows;
        }
           
    }

    public function edit($fotoid) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM foto WHERE fotoid = $fotoid");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function update($fotoid, $judulfoto, $deskripsifoto, $lokasifile){
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile ='$lokasifile' WHERE fotoid = $fotoid");
    }

    public function delete($fotoid){
        $conn = new c_conn();

        // perintah untuk menghapus data dari foto berdasarkan id
        $query = "DELETE FROM foto WHERE fotoid = $fotoid";
        $data = mysqli_query($conn->conn(), $query);

    }
}

?>