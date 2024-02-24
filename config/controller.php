<?php

// Fungsi Menampilkan
function select($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data barang
function create_barang($post)
{
    global $koneksi;

    $nama       = $post['nama'];
    $jumlah     = $post['jumlah'];
    $harga      = $post['harga'];
    $gambar     = upload_file();

    // Check upload file
    if (!$gambar) {
        return false;
    }

    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$gambar', CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Upload File Gambar
function upload_file()
{
    $NamaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error      = $_FILES['gambar']['error'];
    $tmpName    = $_FILES['gambar']['tmp_name'];

    // check file yang diupload
    $extensifileValid   = ['jpg', 'jpeg', 'png'];
    $extensifile        = explode('.', $NamaFile);
    $extensifile        = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal
        echo "<script>
            alert('Format File Tidak Valid');
            document.location.href = 'tambah-barang.php';
            </script>";
        die();
    }

    // check ukuran 2 MV
    if ($ukuranFile > 2048000) {
        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'tambah-barang.php';
            </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru   = uniqid();
    $namaFileBaru   .= '.';
    $namaFileBaru   .= $extensifile;

    // pindakan ke folder lokal
    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}

// fungsi mengubah data barang
function update_barang($post)
{
    global $koneksi;

    $id_barang  = $post['id_barang'];
    $nama       = $post['nama'];
    $jumlah     = $post['jumlah'];
    $harga      = $post['harga'];

    // query uabh data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = '$id_barang'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $koneksi;

    // query hapus barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//! DATA PELANGGAN

// fungsi menambahkan data pelanggan
function create_pelanggan($post)
{
    global $koneksi;

    $nama           = $post['nama'];
    $telepon        = $post['telepon'];
    $alamat         = $post['alamat'];

    // query tambah data
    $query = "INSERT INTO pelanggan VALUES(null, '$nama','$telepon', '$alamat', CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi mengubah data pelanggan
function update_pelanggan($post)
{
    global $koneksi;

    $id_pelanggan       = $post['id_pelanggan'];
    $nama               = $post['nama'];
    $telepon            = $post['telepon'];
    $alamat             = $post['alamat'];

    // query uabh data
    $query = "UPDATE pelanggan SET nama = '$nama', telepon = '$telepon', alamat = '$alamat' WHERE id_pelanggan = '$id_pelanggan'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi menghapus data pelanggan
function delete_pelanggan($id_pelanggan)
{
    global $koneksi;

    // query hapus pelanggan
    $query = "DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//! KRITIK & SARAN

// Fungsi tambah kritik saran
function create_kritiksaran($post)
{
    global $koneksi;

    $nama       = $post['nama'];
    $telepon    = $post['telepon'];
    $alamat     = $post['alamat'];
    $kritik     = $post['kritik'];
    $saran     = $post['saran'];

    // query tambah data
    $query = "INSERT INTO kritiksaran VALUES(null, '$nama', '$telepon', '$alamat', '$kritik', '$saran', CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi update kritik saran
function update_kritiksaran($post)
{
    global $koneksi;

    $id_kritiksaran     = $post['id_kritiksaran'];
    $nama               = $post['nama'];
    $telepon            = $post['telepon'];
    $alamat             = $post['alamat'];
    $kritik             = $post['kritik'];
    $saran              = $post['saran'];

    // query uabh data
    $query = "UPDATE kritiksaran SET nama = '$nama', telepon = '$telepon', alamat = '$alamat', kritik = '$kritik', saran = '$saran', WHERE id_kritiksaran = '$id_kritiksaran'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi menghapus kritik saran
function delete_kritiksaran($id_kritiksaran)
{
    global $koneksi;

    // query hapus kritiksaran
    $query = "DELETE FROM kritiksaran WHERE id_kritiksaran = $id_kritiksaran";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


//! ORDER PESANAN

// fungsi tambah pesanan
function create_pesanan($post)
{
    global $koneksi;

    $makanan            = $post['makanan'];
    $jumlah_makanan     = $post['jumlah_makanan'];
    $minuman            = $post['minuman'];
    $jumlah_minuman     = $post['jumlah_minuman'];

    // query tambah data
    $query = "INSERT INTO pesanan VALUES(null, '$makanan','$jumlah_makanan', '$minuman', '$jumlah_minuman',CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi ubah pesanan
function update_pesanan($post)
{
    global $koneksi;

    $id_pesanan         = $post['id_pesanan'];
    $makanan            = $post['makanan'];
    $jumlah_makanan     = $post['jumlah_makanan'];
    $minuman            = $post['minuman'];
    $jumlah_minuman     = $post['jumlah_minuman'];

    // query uabh data
    $query = "UPDATE pesanan SET makanan = '$makanan', jumlah_makanan = '$jumlah_makanan', minuman = '$minuman', jumlah_minuman = '$jumlah_minuman', WHERE id_pesanan = '$id_pesanan'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi hapus pesanan
function delete_pesanan($id_pesanan)
{
    global $koneksi;

    // query hapus pesanan
    $query = "DELETE FROM pesanan WHERE id_pesanan = $id_pesanan";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
