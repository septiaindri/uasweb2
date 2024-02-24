<?php
include 'layout/header.php';

// Mengambil id_pelanggan dari url
$id_pelanggan = (int)$_GET['id_pelanggan'];

$pelanggan = select("SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan")[0];

// check tombol ubah
if (isset($_POST['ubah-pel'])) {
    if (update_pelanggan($_POST) > 0) {
        echo "<script>
                alert('Data pelanggan Berhasil Diubah!');    
                document.location.href = 'dashboard-pelanggan.php';
            </script>";
    } else {
        echo "<script>
                alert('Data pelanggan Gagal Diubah!');
                document.location.href = 'dashboard-pelanggan.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Ubah pelanggan</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama pelanggan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pelanggan['nama']; ?>" placeholder="Nama Pelanggan..." required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $pelanggan['telepon']; ?>" placeholder="Telepon pelanggan..." required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pelanggan['alamat']; ?>" placeholder="Alamat pelanggan..." required>
        </div>
        <button type="submit" name="ubah-pel" class="btn btn-success">Ubah</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>