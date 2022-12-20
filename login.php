<?php
include 'config.php';
if (isset($_GET['Message'])) {
	print '<script type="text/javascript">alert("Username atau Password yang dimasukkan salah! silahkan cek kembali");</script>';
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="container">
		<h1>Login</h1>
		<form action="login_proses.php" method="post">
			<label>User Name</label>

			<input type="text" name="username" placeholder="User Name"><br>

			<label>Password</label>

			<input type="password" name="password" placeholder="Password"><br>

			<button type="submit">Login</button>
			<br>
			<a href="index.php" class="previous">&laquo; Kembali</a>
		</form>
	</div>
</body>

</html>