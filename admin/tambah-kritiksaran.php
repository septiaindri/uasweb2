<?php
include 'layout/header.php';

// check tombol tambah
if (isset($_POST['tambah-kritiksaran'])) {
    if (create_kritiksaran($_POST) > 0) {
        echo "<script>
                alert('Kritik & Saran Berhasil Ditambahkan!');    
                document.location.href = 'dashboard-kritik.php';
            </script>";
    } else {
        echo "<script>
                alert('Kritik & Saran Gagal Ditambahkan!');
                document.location.href = 'dashboard-kritik.php';
            </script>";
    }
}
?>

<div class="container mt-5">
    <h1 class="pt-5">Kritik & Saran</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama..." required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat..." required>
        </div>
        <div class="mb-3">
            <label for="kritik" class="form-label">Kritik</label>
            <input type="text" class="form-control" id="kritik" name="kritik" placeholder="Kritik..." required>
        </div>
        <div class="mb-3">
            <label for="saran" class="form-label">Saran</label>
            <input type="text" class="form-control" id="saran" name="saran" placeholder="Saran..." required>
        </div>
        <button type="submit" name="tambah-kritiksaran" class="btn btn-success mb-5">Tambah</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>