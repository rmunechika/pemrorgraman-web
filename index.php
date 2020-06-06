<?php
session_start();
require "koneksi.php";
if (!isset($_SESSION["awal"])) {
    header("Location: awal.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pertanyaan</title>
</head>

<body>
    <form action="pelengkap.php" method="post" align="center">
        <?php
        $n1 = rand(0, 20);
        $n2 = rand(0, 20);
        $_SESSION["hasil"] = $n1 + $n2;
        echo "<p>Nyawa " . $_SESSION["nyawa"] . " | Skor " . $_SESSION["skor"] . "</p>";
        echo "<label for=jawab>" . $n1 . "+" . $n2 . "= </label>";
        ?>
        <input type="number" name="jawab" placeholder="Masukkan jawaban Anda" required>
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <br>
        <a href="akhir.php" class="text-white">Salah orang?</a>
    </form>
</body>
</html>