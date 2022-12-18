<?php

session_start();

include "config.php";
if (isset($_SESSION['username'])) {

    // cek apakah tombol daftar sudah diklik atau blum?
    if (isset($_POST['tambah'])) {

        // ambil data dari formulir
        $nama = $_POST['nama'];
        $hari = $_POST['hari'];
        $waktu_mulai = $_POST['waktu_mulai'];
        $waktu_akhir = $_POST['waktu_akhir'];

        // buat query
        $sql = mysqli_query($conn, "select * from dokter");
        while ($data = mysqli_fetch_array($sql)) {
            if($data['nama'] == $nama){
                $id_dokter = $data['id_dokter'];
            }
        }

        if($id_dokter){
            $query = mysqli_query($conn, "INSERT INTO penjadwalan VALUES('','$id_dokter','$hari','$waktu_mulai','$waktu_akhir')");
        } else {
            echo "<script>alert('Nama yang dimasukkan tidak ada dalam daftar!')</script>";
            echo "<script>window.open('tambah_jadwal.php','_self')</script>";
        }
        // $sql = "INSERT INTO penjadwalan (id_jadwal, id_dokter, hari ,waktu_mulai, waktu_akhir) VALUE ('$id', '$id_dokter', '$hari', '$waktu_mulai', '$waktu_akhir')";
        // $query = mysqli_query($conn, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman list_masuk.php dengan status=sukses
            echo "<script>alert('Data Berhasil DITAMBAHKAN!')</script>";
            echo "<script>window.open('jadwal.php','_self')</script>";
        } else {
            // kalau gagal alihkan ke halaman list_masuk.php dengan status=gagal
            echo "<script>alert('Data GAGAL DITAMBAHKAN!')</script>";
            echo "<script>window.open('jadwal.php','_self')</script>";
        }
    } else {
        die("Akses dilarang...");
    }
    
} else {

    header("Location: login.php");

    exit();
}
