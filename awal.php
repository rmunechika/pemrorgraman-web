<?php
session_start();
require "koneksi.php";
if (isset($_SESSION["awal"])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST["awal"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $_SESSION["nama"] = $nama;
    $_SESSION["skor"] = 0;
    $_SESSION["nyawa"] = 7;
    $_SESSION["awal"] = true;
    $query = "INSERT INTO users SET nama='$nama', email='$email', skor=$_SESSION[skor]";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1><center>GAME MATH</h1>
    <form action="" method="post" align="center">
        <div class="form group">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama anda" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" placeholder="Masukkan email anda" required>
        </div>
        <button class="btn btn-primary" type="submit" name="awal">Login</button>
    </form>
</body>
</html>