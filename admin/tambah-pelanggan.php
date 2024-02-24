<?php
include 'layout/header.php';

// check tombol tambah
if (isset($_POST['tambah-pel'])) {
    if (create_pelanggan($_POST) > 0) {
        echo "<script>
                alert('Data Pelanggan Berhasil Ditambahkan!');    
                document.location.href = 'dashboard-pelanggan.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Pelanggan Gagal Ditambahkan!');
                document.location.href = 'dashboard-pelanggan.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Tambah Pelanggan</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan..." required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon..." required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Pelanggan</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pelanggan..." required>
        </div>
        <button type="submit" name="tambah-pel" class="btn btn-success">Tambah</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>