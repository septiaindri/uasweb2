<?php

include '../config/app.php';

// menerima id pesanan yang dipilih pengguna
$id_pesanan = (int)$_GET['id_pesanan'];

if (delete_pesanan($id_pesanan) > 0) {
    echo "<script>
            alert('Pesanan Berhasil Dihapus!');
            document.location.href = 'dashboard-pesanan.php';
        </script>";
} else {
    echo "<script>
            alert('Pesanan Gagal Dihapus!');
            document.location.href = 'dashboard-pesanan.php';
        </script>";
}
