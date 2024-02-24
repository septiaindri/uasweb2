<?php
include 'layout/header.php';

// Mengambil id_kritiksaran dari url
$id_kritiksaran = (int)$_GET['id_kritiksaran'];

$kritiksaran = select("SELECT * FROM kritiksaran WHERE id_kritiksaran = $id_kritiksaran")[0];

// check tombol ubah
if (isset($_POST['ubah-krt'])) {
    if (update_kritiksaran($_POST) > 0) {
        echo "<script>
                alert('Kritik & Saran Berhasil Diubah!');    
                document.location.href = 'dashboard-kritik.php';
            </script>";
    } else {
        echo "<script>
                alert('Kritik & Saran Gagal Diubah!');
                document.location.href = 'dashboard-kritik.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Ubah Kritik & Saran</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_kritiksaran" value="<?= $kritiksaran['id_kritiksaran']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $kritiksaran['nama']; ?>" placeholder="Nama..." required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $kritiksaran['telepon']; ?>" placeholder="Telepon..." required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $kritiksaran['alamat']; ?>" placeholder="Alamat..." required>
        </div>
        <div class="mb-3">
            <label for="kritik" class="form-label">Kritik</label>
            <input type="text" class="form-control" id="kritik" name="kritik" value="<?= $kritiksaran['kritik']; ?>" placeholder="Kritik..." required>
        </div>
        <div class="mb-3">
            <label for="saran" class="form-label">Saran</label>
            <input type="text" class="form-control" id="saran" name="saran" value="<?= $kritiksaran['saran']; ?>" placeholder="Saran..." required>
        </div>
        <button type="submit" name="ubah-krt" class="btn btn-success">Ubah</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>