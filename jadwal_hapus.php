<?php
include_once("config.php");
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    // perintah query untuk menghapus data pada tabel is_siswa
    $query = mysqli_query($conn, "DELETE FROM penjadwalan WHERE id_jadwal='$id'");

    // cek hasil query
    if ($query) {
        // jika berhasil tampilkan pesan berhasil delete data 
        echo "<script>alert('Data Berhasil Dihapus!')</script>";
        echo "<script>window.open('jadwal.php','_self')</script>";
    } else {
        // jika gagal tampilkan pesan kesalahan
        echo "<script>alert('Data GAGAL Dihapus!')</script>";
        echo "<script>window.open('jadwal.php','_self')</script>";
    }
}
