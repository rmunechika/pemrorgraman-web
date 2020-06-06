<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION["awal"])) {
    header("Location: awal.php");
    exit;
}
$nama = $_SESSION["nama"];
$query = "UPDATE peserta SET skor=$_SESSION[skor] WHERE nama='$nama'";
mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>GAME OVER</title>
</head>

<body>
    <h1>GAME OVER</h1>
    <?php
    echo "<div class=result><p>Sayang permainan sudah selesai. Semoga lain kali bisa lebih baik</p>
        <p>Skor Anda: " . $_SESSION["skor"] . "</p></div>";
    ?>
    <div class="container">
        <a href="akhir.php" class="text-white">Logout</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $hasil = mysqli_query($koneksi, "SELECT * FROM users ORDER BY skor DESC LIMIT 10");
                while ($row = mysqli_fetch_array($hasil)) {
                    echo "<tr>
							<td>" . $row['nama'] . "</td>
							<td>" . $row['skor'] . "</td>
						  </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>