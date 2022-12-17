<?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "penjadwalan_dokter";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 

// Check connection
if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
    
}
?>

