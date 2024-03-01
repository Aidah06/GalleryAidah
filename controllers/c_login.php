<?php 
session_start();

include_once "c_conn.php";

class c_login{
    public function register($userid, $username, $password, $email, $namalengkap, $alamat, $jeniskelamin){

        $conn = new c_conn();
        if (isset($_POST['register'])) {
        $cek = mysqli_query($conn->conn(), "SELECT * FROM user WHERE email = '$email' OR username = '$username'");
        $data = mysqli_num_rows($cek);
        if ($data > 0){
            echo "<script> alert('email/username sudah terdaftar');
            document.location.href = '../register.php';</script>";
        }else{
            $query =  mysqli_query($conn->conn(),"INSERT INTO user VALUES ('$userid', '$username', '$password', '$email','$namalengkap','$alamat', '$jeniskelamin')");
             
            echo "<script> alert('Akun telah berhasil di registrasi!');
            document.location.href = '../index.php';
            </script>";
    
            // header("location: ../index.php");
            // exit;

        }
     } 
        
 }

    public function login($email, $password){
         $conn = new c_conn();

        // jika tombol login di tekan maka jalankan perintah dibawah nya
        if(isset($_POST['login'])){

            $query = mysqli_query($conn->conn(), "SELECT * FROM user WHERE email = '$email'");

            // merubah data menjadi array assosiatif
            // array asosiatif adalah array yang index nya memiliki nama
            $data = mysqli_fetch_assoc($query);

            // untuk mengecek apakah query select data berhasil atau tidak
            if ($data){
                // mengecek password apakah sama atau tidak antara yang di inputkan oleh user sama atau tidak dengan database
                if (password_verify($password, $data['password'])){
                   
                        $_SESSION['data'] = $data;
                        $_SESSION['userid'] = $data['userid'];
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['namalengkap'] = $data['namalengkap'];
                        $_SESSION['alamat'] = $data['alamat'];
                        $_SESSION['jeniskelamin'] = $data['jeniskelamin'];
                       
                       header("location: ../views/home.php");
                       exit;
                    }else {
                        echo "<script> alert('password anda salah!');
                        document.location.href = '../index.php';
                        </script>";
    
                    }
                }else{
                    echo "<script> alert('username / email anda salah');
                        document.location.href = '../index.php';
                        </script>";
                }
            }
        }
    
    public function logout() {
        session_destroy();

        // menghapus/menghancurkan session
        header("location: ../index.php");
        exit;
    }
}

?>
