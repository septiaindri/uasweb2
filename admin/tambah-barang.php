<?php
include 'layout/header.php';

// check tombol tambah
if (isset($_POST['tambah'])) {
    if (create_barang($_POST) > 0) {
        echo "<script>
                alert('Data Barang Berhasil Ditambahkan!');    
                document.location.href = 'dashboard.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Tambah Barang</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang..." required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang..." required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Barang..." required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Barang</label>
            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar Barang...">
        </div>
        <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>