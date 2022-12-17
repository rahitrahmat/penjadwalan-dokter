<?php

session_start();

include "config.php";
if (isset($_SESSION['username'])) {

    // cek apakah tombol daftar sudah diklik atau blum?
    if (isset($_POST['tambah'])) {

        // ambil data dari formulir
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $poliklinik = $_POST['poliklinik'];

        // buat query
        $sql = "INSERT INTO dokter VALUES ('', '$nama', '$jenis_kelamin', '$poliklinik')";
        $query = mysqli_query($conn, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman list_masuk.php dengan status=sukses
            echo "<script>alert('Data Berhasil DITAMBAHKAN!')</script>";
            echo "<script>window.open('data.php','_self')</script>";
        } else {
            // kalau gagal alihkan ke halaman list_masuk.php dengan status=gagal
            echo "<script>alert('Data GAGAL DITAMBAHKAN!')</script>";
            echo "<script>window.open('data.php','_self')</script>";
        }
    } else {
        die("Akses dilarang...");
    }

} else {

    header("Location: index.php");

    exit();
}

?>