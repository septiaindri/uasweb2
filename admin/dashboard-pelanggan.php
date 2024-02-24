<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
    exit();
}
?>

<?php
include 'layout/header.php';
$data_pelanggan = select("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
?>

<div class="container mt-5">
    <h1 class="pt-5">Data Pelanggan</h1>
    <hr>
    <a href="tambah-pelanggan.php" class="btn btn-success mb-3">Tambah Pelanggan</a>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_pelanggan as $pelanggan) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pelanggan['nama']; ?></td>
                    <td><?= $pelanggan['telepon']; ?></td>
                    <td><?= $pelanggan['alamat']; ?></td>
                    <td><?= date('d-m-Y | H:i:s', strtotime($pelanggan['tanggal'])); ?></td>
                    <td width="15%" class="text-center">
                        <a href="ubah-pelanggan.php?id_pelanggan=<?= $pelanggan['id_pelanggan']; ?>" class="btn btn-primary">Ubah</a>
                        <a href="hapus-pelanggan.php?id_pelanggan=<?= $pelanggan['id_pelanggan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data pelanggan dihapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

include 'layout/footer.php';

?>