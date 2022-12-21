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
                <h2>Silahkan isi form berikut untuk menambahkan data dokter </h2>
                <form method="post" action="tambah_dokter_proses.php">
                    <table width='100%' class='table table-bordered table-striped'>
                        <tr>
                            <td><label for="nama">Nama Dokter</label></td>
                            <td><input type="text" name="nama" placeholder="nama" /></td>
                        </tr>
                        <tr>
                            <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                            <td>
                                <input type="radio" id="laki-laki" name="jenis_kelamin" value="L">
                                <label for="laki-laki">Laki-Laki</label><br>
                                <input type="radio" id="perempuan" name="jenis_kelamin" value="P">
                                <label for="perempuan">Perempuan</label>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="poliklinik">Poliklinik</label></td>
                            <td>
                                <select name="poliklinik" id="poliklinik">
                                    <option value="POLI GIGI UMUM">POLI GIGI UMUM</option>
                                    <option value="POLI KEBIDANAN DAN KANDUNGAN">POLI KEBIDANAN DAN KANDUNGAN</option>
                                    <option value="POLI MATA">POLI MATA</option>
                                    <option value="POLI ANAK">POLI ANAK</option>
                                    <option value="POLI BEDAH UMUM">POLI BEDAH UMUM</option>
                                </select>

                            </td>
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