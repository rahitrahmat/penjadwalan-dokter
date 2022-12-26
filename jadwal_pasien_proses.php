<?php
session_start();

include "config.php";
if ($_SESSION['level'] == "") {
    header('Location: login.php?Warning=' . urlencode($Warning));
} else if ($_SESSION['level'] == "admin") {
    header('Location: login.php?Admin=' . urlencode($Admin));
}

if (isset($_GET['id_jadwal'])) {

    $id_jadwal = $_GET['id_jadwal'];

    $sql = mysqli_query($conn, "select pasien.*, admin.username from admin
    inner JOIN pasien on admin.nama = pasien.nama;");
    while ($data = mysqli_fetch_array($sql)) {
        if (strtolower($data['username']) == $_SESSION['username']) {
            $id_pasien = $data['id_pasien'];
        }
    }

    if ($id_jadwal and $id_pasien) {
        $query = mysqli_query($conn, "INSERT INTO perjanjian VALUES('','$id_pasien','$id_jadwal')");
    } else {
        echo "<script>alert('Nama yang dimasukkan tidak ada dalam daftar!')</script>";
        echo "<script>window.open('jadwal_pasien.php','_self')</script>";
    }
    // $sql = "INSERT INTO penjadwalan (id_jadwal, id_dokter, hari ,waktu_mulai, waktu_akhir) VALUE ('$id', '$id_dokter', '$hari', '$waktu_mulai', '$waktu_akhir')";
    // $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list_masuk.php dengan status=sukses
        echo "<script>alert('Data Berhasil DITAMBAHKAN!')</script>";
        echo "<script>window.open('jadwal_pasien.php','_self')</script>";
    } else {
        // kalau gagal alihkan ke halaman list_masuk.php dengan status=gagal
        echo "<script>alert('Data GAGAL DITAMBAHKAN!')</script>";
        echo "<script>window.open('jadwal_pasien.php','_self')</script>";
    }
} else {
    die("Akses dilarang...");
}

