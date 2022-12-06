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
                        <li><a href="home.php">Halaman Utama</a></li>
                        <li><a href="data.php">Data Dokter</a></li>
                        <li><a href="jadwal.php">Jadwal Dokter</a></li>
                        <li><a href="tambah.php">Tambah Data</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <br class="clearfix" />
                </div>
            </div>
            <div id="page">
                <br>
                <h2>Selamat Datang!</h2>
                <p>
                <h1>Hello, <?php echo $_SESSION['username']; ?></h1>


                <?php
                $sql = mysqli_query($conn, "select * from dokter");

                echo "<table width='100%' id='table1'>
                        <thead>
                        <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Poliklinik</th>
                        <th>Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>";
                while ($data = mysqli_fetch_array($sql)) {
                    echo "<tr>
                            <td>$data[nama]</td>
                            <td>$data[jenis_kelamin]</td>
                            <td>$data[poliklinik] </td>
                            <td>
                            <a href='data_edit.php?id_dokter=$data[id_dokter]'>Edit</a> |
                            <a href='data_hapus.php?hapus=$data[id_dokter]'>Hapus</a> |
                            </td>
                            </tr>";
                }  echo "</tbody>"
                ?>
            </div>
            <br>
            <center>
            <label for="searchBox">Cari : </label>
            <input type="text" id="searchBox" placeholder="Search for names.." size="50">
            </center>
            <script>
            function performSearch() {

            // Declare search string 
            var filter = searchBox.value.toUpperCase();

            // Loop through first tbody's rows
            for (var rowI = 0; rowI < trs.length; rowI++) {

            // define the row's cells
            var tds = trs[rowI].getElementsByTagName("td");

            // hide the row
            trs[rowI].style.display = "none";

            // loop through row cells
            for (var cellI = 0; cellI < tds.length; cellI++) {

                // if there's a match
                if (tds[cellI].innerHTML.toUpperCase().indexOf(filter) > -1) {

                // show the row
                trs[rowI].style.display = "";

                // skip to the next row
                continue;

                }
            }
            }

            }

            // declare elements
            const searchBox = document.getElementById('searchBox');
            const table = document.getElementById("table1");
            const trs = table.tBodies[0].getElementsByTagName("tr");

            // add event listener to search box
            searchBox.addEventListener('keyup', performSearch);
            </script>
    </body>

    </html>

<?php

} else {

    header("Location: index.php");

    exit();
}

?>