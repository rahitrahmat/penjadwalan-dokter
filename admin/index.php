<?php
include 'config.php';
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
        <form action="login.php" method="post">
            <label>User Name</label>

            <input type="text" name="username" placeholder="User Name"><br>

            <label>Password</label>

            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>