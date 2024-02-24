<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
    exit();
}
?>

<?php
include 'layout/header.php';
$data_kritiksaran = select("SELECT * FROM kritiksaran ORDER BY id_kritiksaran DESC");
?>

<div class="container mt-5">
    <h1 class="pt-5">Kritik & Saran</h1>
    <hr>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Kritik</th>
                <th>Saran</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_kritiksaran as $kritiksaran) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $kritiksaran['nama']; ?></td>
                    <td><?= $kritiksaran['telepon']; ?></td>
                    <td><?= $kritiksaran['alamat']; ?></td>
                    <td><?= $kritiksaran['kritik']; ?></td>
                    <td><?= $kritiksaran['saran']; ?></td>
                    <td><?= date('d-m-Y | H:i:s', strtotime($kritiksaran['tanggal'])); ?></td>
                    <td width="15%" class="text-center">
                        <a href="ubah-kritiksaran.php?id_kritiksaran=<?= $kritiksaran['id_kritiksaran']; ?>" class="btn btn-primary">Ubah</a>
                        <a href="hapus-kritiksaran.php?id_kritiksaran=<?= $kritiksaran['id_kritiksaran']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data kritik & saran dihapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

include 'layout/footer.php';

?>