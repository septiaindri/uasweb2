<?php

include '../config/app.php';

// menerima id pelanggan yang dipilih pengguna
$id_pelanggan = (int)$_GET['id_pelanggan'];

if (delete_pelanggan($id_pelanggan) > 0) {
    echo "<script>
            alert('Data pelanggan Berhasil Dihapus!');
            document.location.href = 'dashboard-pelanggan.php';
        </script>";
} else {
    echo "<script>
            alert('Data pelanggan Gagal Dihapus!');
            document.location.href = 'dashboard-pelanggan.php';
        </script>";
}
