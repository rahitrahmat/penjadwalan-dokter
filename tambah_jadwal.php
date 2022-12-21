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
                    <span>Pemrograman Website</span>
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
                <h2> Silahkan isi form berikut untuk menambahkan data jadwal </h2>
                <form method="post" action="tambah_jadwal_proses.php">
                    <table width='100%' class='table table-bordered table-striped'>

                        <tr>
                            <td><label for="nama">Nama :</label></td>
                            <td>
                                <select id="nama" name="nama">
                                    <?php
                                    $sql = mysqli_query($conn, "select nama from dokter order by nama");
                                    while ($data = mysqli_fetch_array($sql)) {
                                        echo "<option value='" . $data['nama'] . "'>$data[nama]</option>";
                                    }

                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="hari">Hari :</label></td>
                            <td>
                                <select id="hari" name="hari">
                                    <option value="SENIN">Senin</option>
                                    <option value="SELASA">Selasa</option>
                                    <option value="RABU">Rabu</option>
                                    <option value="KAMIS">Kamis</option>
                                    <option value="JUMAT">Jum'at</option>
                                    <option value="SABTU">Sabtu</option>
                                    <option value="MINGGU">Minggu</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="waktu_mulai">Waktu Mulai :</label></td>
                            <td><input type="time" id="waktu_mulai" name="waktu_mulai"></td>
                        </tr>
                        <tr>
                            <td><label for="waktu_akhir">Waktu Akhir :</label></td>
                            <td><input type="time" id="waktu_akhir" name="waktu_akhir"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center><input type="submit" value="Tambah" name="tambah" style="height:30px; width:70px"></center>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

    </body>

    </html>

<?php

} else {

    header("Location: login.php");

    exit();
}

?>