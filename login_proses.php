<?php


session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);
include "config.php";

//---CODING ASLI BAWAAN MULAI DARI BAWAH---
//$query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
//$result = mysqli_query($conn, $query);
//if ($data = mysqli_fetch_array($result)) {
//    $_SESSION['username'] = $_POST['username'];
//    header('Location: home_admin.php');
//} else if ($username == "" or $password = "") {
//    $_SESSION['kosong'] = 'kosong';
//    header('Location: login.php?Message=' . urlencode($Message));
//} else {
//    $_SESSION['salah'] = 'salah';
//    header('Location: login.php?Message=' . urlencode($Message));
//}
//---BATAS AKHIR CODING BAWAAN---


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "select * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:home_admin.php");

        // cek jika user login sebagai pasien
    } else if ($data['level'] == "pasien") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "pasien";
        // alihkan ke halaman dashboard pegawai
        header("location:home_pasien.php");
    } else {

        // alihkan ke halaman login kembali
        header('Location: login.php?Message=' . urlencode($Message));
    }
} else {
    header('Location: login.php?Message=' . urlencode($Message));
}
