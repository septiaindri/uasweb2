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

// check tombol tambah
if (isset($_POST['tambah-pesanan'])) {
    if (create_pesanan($_POST) > 0) {
        echo "<script>
                alert('Pesanan Berhasil Ditambahkan!');    
                document.location.href = 'daftar-menu.php';
            </script>";
    } else {
        echo "<script>
                alert('Pesanan Gagal Ditambahkan!');
                document.location.href = 'daftar-menu.php';
            </script>";
    }
}
?>

<div class="container mt-5 mb-5">
    <h1 class="pt-5">Daftar Menu</h1>
    <hr>
    <form action="" method="post">
        <div class="mb-3">
            <label for="makanan" class="form-label">Makanan</label>
            <input type="text" class="form-control" id="makanan" name="makanan" placeholder="makanan..." required>
        </div>
        <div class="mb-3">
            <label for="jumlah_makanan" class="form-label">Jumlah Makanan</label>
            <input type="text" class="form-control" id="jumlah_makanan" name="jumlah_makanan" placeholder="Jumlah Makanan..." required>
        </div>
        <div class="mb-3">
            <label for="minuman" class="form-label">Minuman</label>
            <input type="text" class="form-control" id="minuman" name="minuman" placeholder="Minuman..." required>
        </div>
        <div class="mb-3">
            <label for="jumlah_minuman" class="form-label">Jumlah Minuman</label>
            <input type="text" class="form-control" id="jumlah_minuman" name="jumlah_minuman" placeholder="Jumlah Minuman..." required>
        </div>
        <button type="submit" name="tambah-pesanan" class="btn btn-success">Tambah</button>
    </form>
    <hr>
    <div class="container">
        <div class="row row-cols-2">
            <?php foreach ($data_barang as $barang) : ?>
                <div class="col-lg-3 d-flex align-items-stretch mb-3">
                    <div class=" card" style="width: 300px;">
                        <div class="card-body">
                            <img src="../assets/img/<?= $barang['gambar']; ?>" class="card-img-top" style="width: 150px;">
                            <h5 class="card-title"><?= $barang['nama']; ?></h5>
                            <p class="card-text">Rp <?= $barang['harga']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<?php
include 'layout/footer.php';
?>