<?php
session_start();

include "config.php";
if ($_SESSION['level'] == "") {
    header('Location: login.php?Warning=' . urlencode($Warning));
} else if ($_SESSION['level'] == "pasien") {
    header('Location: login.php?Pasien=' . urlencode($Pasien));
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Penjadwalan</title>
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
    </script>
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
            <h2>Selamat Datang!</h2>
            <p>
            <h2>Hello, <?php echo $_SESSION['username']; ?></h2>
            <?php
            $sql = mysqli_query($conn, "select pasien.nama as nama_pasien, dokter.nama as nama_dokter, penjadwalan.hari, penjadwalan.waktu_mulai, penjadwalan.waktu_akhir, perjanjian.id_janji FROM dokter 
            inner JOIN penjadwalan on dokter.id_dokter=penjadwalan.id_dokter
            inner join perjanjian on penjadwalan.id_jadwal=perjanjian.id_jadwal
            INNER join pasien on perjanjian.id_pasien=pasien.id_pasien
            order by pasien.nama;");

            echo "<table id='table2' class='table table-bordered table-dark table-striped table-hover' width='100%'>
                    <thead class='text-center'>
                    <tr>
                    <th rowspan='2'>Nama Pasien</th>
                    <th rowspan='2'>Nama Dokter</th>
                    <th rowspan='2'>Hari</th>
                    <th colspan='2'>Jam Praktik</th>
                    <th rowspan='2'>Tindakan</th>
                    </tr>
                    <tr>
                        <th>Mulai Praktik</th>
                        <th>Selesai Praktik</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
            while ($data = mysqli_fetch_array($sql)) {
                echo "<tr>
                        <td>$data[nama_pasien]</td>
                        <td>$data[nama_dokter]</td>
                        <td>$data[hari]</td>
                        <td>$data[waktu_mulai]</td>
                        <td>$data[waktu_akhir]</td>
                        <td>
                            <a href='perjanjian_hapus.php?hapus=$data[id_janji]'>Hapus</a>
                        </td>
                        </tr>";
            }
            echo "</tbody>"
            ?>
        </div>
        <br>
        <script>
            // Initialize the DataTable
            $(document).ready(function() {
                $('#table2').DataTable({

                    // Disable the searching 
                    // of the DataTable
                    searching: true
                });
            });
        </script>
</body>

</html>