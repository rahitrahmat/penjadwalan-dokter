<?php

include "config.php";
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
                <span>Rekayasa Perangkat Lunak</span>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="home.php">Halaman Utama</a></li>
                    <li><a href="data.php">Data Dokter</a></li>
                    <li><a href="jadwal.php">Jadwal Dokter</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
                <br class="clearfix" />
            </div>
        </div>
        <div id="page">
            <br>
            <h2>Selamat Datang!</h2>
            <p>
            <h1>Halo tamu!</h1>

            <?php
            $sql = mysqli_query($conn, "select * from dokter");

            echo "<table id='table1' class='table table-dark table-striped table-hover' width='100%'>
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Poliklinik</th>
                        </tr>
                        </thead>
                        <tbody>";
            while ($data = mysqli_fetch_array($sql)) {
                echo "<tr>
                            <td>$data[nama]</td>
                            <td>$data[jenis_kelamin]</td>
                            <td>$data[poliklinik] </td>
                        </tr>";
            }
            echo "</tbody>"
            ?>
        </div>
        <br>
        <script>
            // Initialize the DataTable
            $(document).ready(function() {
                $('#table1').DataTable({

                    // Disable the searching 
                    // of the DataTable
                    searching: true
                });
            });
        </script>
</body>

</html>

<?php
?>