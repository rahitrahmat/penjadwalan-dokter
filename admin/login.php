<?php


session_start();

$username = $_POST['username'];
$password = $_POST['password'];
include "config.php";

$query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
$result = mysqli_query($conn, $query);
if ($data = mysqli_fetch_array($result)) {
	$_SESSION['username'] = $_POST['username'];
	header('Location: home.php');
} else if ($username == "" or $password = "") {
	$_SESSION['kosong'] = 'kosong';
	header('Location: index.php');
} else {
	$_SESSION['salah'] = 'salah';
	header('Location: index.php');
}
?>
<?php 

// session_start(); 
// include "config.php";

// if (isset($_POST['username']) && isset($_POST['password'])) {

//     function validate($data){

//        $data = trim($data);

//        $data = stripslashes($data);

//        $data = htmlspecialchars($data);

//        return $data;

//     }

//     $username = validate($_POST['username']);

//     $pasword = validate($_POST['password']);

//     if (empty($username)) {

//         header("Location: index.php?error=User Name is required");

//         exit();

//     }else if(empty($password)){

//         header("Location: index.php?error=Password is required");

//         exit();

//     }else{

//         $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

//         $result = mysqli_query($conn, $sql);

//         if (mysqli_num_rows($result) === 1) {

//             $row = mysqli_fetch_assoc($result);

//             if ($row['username'] === $username && $row['password'] === $password) {

//                 echo "Logged in!";

//                 $_SESSION['username'] = $row['username'];

//                 header("Location: home.php");

//                 exit();

//             }else{

//                 header("Location: index.php?error=Incorect User name or password");

//                 exit();

//             }

//         }else{

//             header("Location: index.php?error=Incorect User name or password");

//             exit();

//         }

//     }

// }else{

//     header("Location: index.php");

//     exit();

// }