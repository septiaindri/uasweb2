<?php
include 'layout/header.php';

// Mengambil id_kritiksaran dari url
$id_pesanan = (int)$_GET['id_pesanan'];

$pesanan = select("SELECT * FROM pesanan WHERE id_pesanan = $id_pesanan")[0];

// check tombol ubah
if (isset($_POST['ubah-pesanan'])) {
    if (update_pesanan($_POST) > 0) {
        echo "<script>
                alert('Pesanan Berhasil Diubah!');    
                document.location.href = 'dashboard-pesanan.php';
            </script>";
    } else {
        echo "<script>
                alert('Pesanan Gagal Diubah!');
                document.location.href = 'dashboard-pesanan.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Ubah Kritik & Saran</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_pesanan" value="<?= $pesanan['id_pesanan']; ?>">

        <div class="mb-3">
            <label for="makanan" class="form-label">Makanan</label>
            <input type="text" class="form-control" id="makanan" name="makanan" value="<?= $pesanan['makanan']; ?>" placeholder="makanan..." required>
        </div>
        <div class="mb-3">
            <label for="jumlah_makanan" class="form-label">Jumlah Makanan</label>
            <input type="number" class="form-control" id="jumlah_makanan" name="jumlah_makanan" value="<?= $pesanan['jumlah_makanan']; ?>" placeholder="Jumlah Makanan..." required>
        </div>
        <div class="mb-3">
            <label for="minuman" class="form-label">Minuman</label>
            <input type="text" class="form-control" id="minuman" name="minuman" value="<?= $pesanan['minuman']; ?>" placeholder="Minuman..." required>
        </div>
        <div class="mb-3">
            <label for="jumlah_minuman" class="form-label">Jumlah Minuman</label>
            <input type="number" class="form-control" id="jumlah_minuman" name="jumlah_minuman" value="<?= $pesanan['jumlah_minuman']; ?>" placeholder="Jumlah Minuman..." required>
        </div>
        <button type="submit" name="ubah-pesanan" class="btn btn-success">Ubah</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>