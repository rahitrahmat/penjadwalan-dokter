<?php
session_start();

include "config.php";
if ($_SESSION['level'] == "") {
    header('Location: login.php?Warning=' . urlencode($Warning));
} else if ($_SESSION['level'] == "pasien") {
    header('Location: login.php?Pasien=' . urlencode($Pasien));
}

// Periksa apakah formulir dikirimkan untuk pembaruan pengguna, lalu arahkan kembali ke beranda setelah pembaruan
if (isset($_POST['update'])) {
    $id = $_POST['id_jadwal'];

    $hari = $_POST['hari'];
    $waktu_mulai = $_POST['waktu_mulai'];

    $waktu_akhir = $_POST['waktu_akhir'];
    // perbarui data pengguna
    $result = mysqli_query($conn, "UPDATE penjadwalan SET  hari='$hari',waktu_mulai='$waktu_mulai',waktu_akhir='$waktu_akhir' WHERE id_jadwal='$id'");

    // Arahkan ulang ke beranda untuk menampilkan pengguna yang diperbarui dalam daftar
    echo "<script>alert('Data Berhasil DIUPDATE!')</script>";
    echo "<script>window.open('jadwal_admin.php','_self')</script>";
}

?>
<?php
// Tampilkan data pengguna yang dipilih berdasarkan id
// Mendapatkan id dari url
if (isset($_GET['id_jadwal'])) {

    $id = $_GET['id_jadwal'];
} else {

    $id = "id tidak diset di Method GET";
}
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM penjadwalan where id_jadwal='$id'");

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
                <p>
                <form name="update_user" method="post" action="jadwal_edit.php">
                    <table width='100%' class='table table-bordered table-striped'>

                        <tr>
                            <td><label for="nama">Nama</label></td>
                            <?php
                            $sql = mysqli_query($conn, "select nama from dokter where id_dokter=$user_data[id_dokter]");
                            while ($data = mysqli_fetch_array($sql)) {
                                echo "<td><input type='text' size='32' name='nama' value='$data[nama]' readonly></td>";
                            }

                            ?>


                        </tr>
                        <tr>
                            <td>Hari</td>
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
                            <td>Waktu Mulai</td>
                            <td><input type="time" name="waktu_mulai" value="<?php echo $user_data['waktu_mulai']; ?>"></td>
                        </tr>
                        <tr>

                            <td>Waktu Akhir</td>
                            <td><input type="time" name="waktu_akhir" value="<?php echo $user_data['waktu_akhir']; ?>"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id_jadwal" value="<?php echo $_GET['id_jadwal']; ?>">
                            <td colspan="2" align="middle"><input type="submit" name="update" value="Update" style="height:30px; width:70px"></td>
                        </tr>
                    </table>
                </form>
            <?php
        }
            ?>
    </body>

    </html>