<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
    exit();
}
?>

<?php
include 'layout/header.php';
$data_pesanan = select("SELECT * FROM pesanan ORDER BY id_pesanan DESC");
?>

<div class="container mt-5 mb-5">
    <h1 class="pt-5">Data Pesanan</h1>
    <hr>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Makanan</th>
                <th class="text-center">Jumlah Makanan</th>
                <th class="text-center">Minuman</th>
                <th class="text-center">Jumlah Minuman</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_pesanan as $pesanan) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $pesanan['makanan']; ?></td>
                    <td class="text-center"><?= $pesanan['jumlah_makanan']; ?></td>
                    <td class="text-center"><?= $pesanan['minuman']; ?></td>
                    <td class="text-center"><?= $pesanan['jumlah_minuman']; ?></td>
                    <td class="text-center"><?= date('d-m-Y | H:i:s', strtotime($pesanan['tanggal'])); ?></td>
                    <td width=" 15%" class="text-center">
                        <a href="ubah-pesanan.php?id_pesanan=<?= $pesanan['id_pesanan']; ?>" class="btn btn-primary">Ubah</a>
                        <a href="hapus-pesanan.php?id_pesanan=<?= $pesanan['id_pesanan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data pesanan dihapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

include 'layout/footer.php';

?>