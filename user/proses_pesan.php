<?php
session_start();

if (isset($_POST['submit'])) {
    $minuman = $_POST['minuman'];

    // Tambahkan minuman ke dalam troli
    $_SESSION['troli'][] = $minuman;

    // Redirect ke halaman troli atau halaman lain sesuai kebutuhan
    header("Location: troli.php");
    exit();
}
