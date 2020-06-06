<?php
session_start();
if (isset($_POST["submit"])) {
    if ($_POST["jawab"] == $_SESSION["hasil"]) {
        $_SESSION["skor"] += 5;
    } else {
        $_SESSION["skor"] -= 2;
        $_SESSION["nyawa"] -= 1;
    }
} 
if ($_SESSION["nyawa"] > 0) {
    header("Location: index.php");
    exit;
    } elseif ($_SESSION["nyawa"] == 0) {
        $nama = $_SESSION["nama"];
        $skor = $_SESSION["skor"];
        header("Location: final.php");
        exit;
    }
?>