<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
    exit();
}
?>

<?php
include 'layout/header.php';
$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");
?>

<div class="container mt-5 mb-5">
    <h1 class="pt-5">Data Barang</h1>
    <hr>
    <a href="tambah-barang.php" class="btn btn-success mb-3">Tambah Barang</a>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_barang as $barang) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $barang['nama']; ?></td>
                    <td><?= $barang['jumlah']; ?></td>
                    <td>Rp <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                    <td width="10%">
                        <img src="../assets/img/<?= $barang['gambar']; ?>" alt="gambar" width="70">
                    </td>
                    <td><?= date('d-m-Y | H:i:s', strtotime($barang['tanggal'])); ?></td>
                    <td width=" 15%" class="text-center">
                        <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-primary">Ubah</a>
                        <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data barang dihapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

include 'layout/footer.php';

?>