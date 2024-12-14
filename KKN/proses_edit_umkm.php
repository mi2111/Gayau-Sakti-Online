<?php
include 'koneksi.php';

// Mengambil data dari form
$id = $_POST['id'];
$nama_umkm = $_POST['nama_umkm'];
$lokasi = $_POST['lokasi'];


// Periksa apakah ada file foto_produk yang diunggah
if ($_FILES['foto_produk']['size'] > 0) {
    $foto_name = $_FILES['foto_produk']['name'];
    $foto_temp = $_FILES['foto_produk']['tmp_name'];

    // Tentukan lokasi folder untuk menyimpan foto_produk
    $upload_directory = "umkm/";

    // Pindahkan foto_produk baru ke folder upload
    $upload_path = $upload_directory . $foto_name;
    move_uploaded_file($foto_temp, $upload_path);

    // Update data umkm beserta id file foto_produk ke database
    $query = "UPDATE umkm SET  id='$id', nama_umkm='$nama_umkm', lokasi='$lokasi', foto_produk='$foto_name' WHERE id='$id'";
    } else {
    // Update data umkm ke database tanpa mengubah foto_produk
    $query = "UPDATE umkm SET id='$id', nama_umkm='$nama_umkm', lokasi='$lokasi' WHERE id='$id'";
    }

if (mysqli_query($con, $query)) {
    header('Location: umkm.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>

