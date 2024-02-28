<?php 

class c_conn {

    public function conn() {
        $conn = mysqli_connect("localhost", "root", "", "galleryme");
        return $conn;

    }
}
