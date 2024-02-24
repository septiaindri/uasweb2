<?php

include '../config/app.php';

// menerima id kritiksaran yang dipilih pengguna
$id_kritiksaran = (int)$_GET['id_kritiksaran'];

if (delete_kritiksaran($id_kritiksaran) > 0) {
    echo "<script>
            alert('Kritik & Saran Berhasil Dihapus!');
            document.location.href = 'dashboard-kritik.php';
        </script>";
} else {
    echo "<script>
            alert('Kritik & Saran Gagal Dihapus!');
            document.location.href = 'dashboard-kritik.php';
        </script>";
}
