<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troli</title>
</head>

<body>
    <h2>Isi Troli</h2>
    <ul>
        <?php
        if (isset($_SESSION['troli'])) {
            foreach ($_SESSION['troli'] as $minuman) {
                echo "<li>$minuman</li>";
            }
        } else {
            echo "<li>Troli kosong</li>";
        }
        ?>
    </ul>
    <a href="hapus_troli.php">Kosongkan Troli</a>
</body>

</html>