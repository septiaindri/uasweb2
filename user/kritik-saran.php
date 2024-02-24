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
    <a href="../admin/tambah-kritiksaran.php" class="btn btn-success mb-3">Tambah Kritik & Saran</a>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include 'layout/footer.php';
?>