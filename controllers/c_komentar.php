<?php

include_once "c_conn.php";

class c_komentar
{
    public function insert_komentar($komentarid, $fotoid, $userid, $isikomentar, $tanggalkomentar) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "INSERT INTO komentarfoto VALUES ('$komentarid', '$fotoid', '$userid', '$isikomentar', '$tanggalkomentar')");
    }
    public function read_komentar($foto)
    {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT komentarfoto.*, user.* FROM komentarfoto INNER JOIN user ON komentarfoto.userid = user.userid WHERE fotoid = $foto");
        while ($row = mysqli_fetch_object($query)) {
            $rows[] = $row;
        }
        if (!empty($rows)) {
            return $rows;
        }
    }
    public function delete($komentarid) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "DELETE FROM komentarfoto WHERE komentarid = $komentarid");
    }
    public function jumlah($fotoid) {
        $conn = new c_conn();
        $query = mysqli_query($conn->conn(), "SELECT * FROM komentarfoto WHERE fotoid = $fotoid");
        $data = mysqli_num_rows($query);
        return $data;
    }
}