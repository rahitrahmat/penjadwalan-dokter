<?php

session_start();

include "config.php";
if (isset($_SESSION['username'])) {
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>Data Dokter</title>
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <h1>Sistem Penjadwalan Dokter RS Roemani</h1>
                    <span>Rekayasa Perangkat Lunak</span>
                </div>
                <div id="menu">
                    <ul>
                        <li><a href="home_admin.php">Halaman Utama</a></li>
                        <li><a href="data_admin.php">Data Dokter</a></li>
                        <li><a href="jadwal_admin.php">Jadwal Dokter</a></li>
                        <li><a href="tambah.php">Tambah Data</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <br class="clearfix" />
                </div>
            </div>
            <div id="page">
                <p>
                <h1> Silahkan pilih data yang akan ditambahkan
                    <br>
                    <br>
                    <h1> <a href="tambah_dokter.php">TAMBAH DATA DOKTER</a></h1>
                    <br>
                    <br>
                    <h1> <a href="tambah_jadwal.php">TAMBAH DATA PENJADWALAN</a></h1>
                    <br>
                    <br>
                    <br>
                    <br>
            </div>

    </body>

    </html>

<?php

} else {

    header("Location: login.php");

    exit();
}

?>