<?php

session_start();

include "config.php";
if (isset($_SESSION['username'])) {

    // Periksa apakah formulir dikirimkan untuk pembaruan pengguna, lalu arahkan kembali ke beranda setelah pembaruan
    if (isset($_POST['update'])) {
        $id_dokter = $_POST['id_dokter'];

        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $poliklinik = $_POST['poliklinik'];
        // perbarui data pengguna
        $result = mysqli_query($conn, "UPDATE dokter SET  nama='$nama',jenis_kelamin='$jenis_kelamin',poliklinik='$poliklinik' WHERE id_dokter='$id_dokter'");

        // Arahkan ulang ke beranda untuk menampilkan pengguna yang diperbarui dalam daftar
        echo "<script>alert('Data Berhasil DIUPDATE!')</script>";
        echo "<script>window.open('data_admin.php','_self')</script>";
    }

?>
    <?php
    // Tampilkan data pengguna yang dipilih berdasarkan id
    // Mendapatkan id dari url
    if (isset($_GET['id_dokter'])) {

        $id_dokter = $_GET['id_dokter'];
    } else {

        $id_dokter = "id tidak diset di Method GET";
    }
    // Fetech user data based on id
    $result = mysqli_query($conn, "SELECT * FROM dokter where id_dokter='$id_dokter'");

    while ($user_data = mysqli_fetch_array($result)) {
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

                    <form name="update_user" method="post" action="data_edit.php">
                        <table width='100%' class='table table-bordered table-striped'>
                            <br>
                            <tr>
                                <td><label for="nama">Nama</label></td>
                                <td><input type="text" name="nama" value="<?php echo $user_data['nama']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
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
                                <input type="hidden" name="id_dokter" value="<?php echo $_GET['id_dokter']; ?>">
                                <td colspan="2" align="middle"><input type="submit" name="update" value="Update" style="height:30px; width:70px"></td>
                            </tr>
                        </table>
                    </form>
                <?php
            }
                ?>
        </body>

        </html>

    <?php

} else {

    header("Location: login.php");

    exit();
}

    ?>