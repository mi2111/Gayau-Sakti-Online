<?php
include 'koneksi.php';

// Mengambil data dari form
$nama_kegiatan = $_POST['nama_kegiatan'];
$tanggal_kegiatan = $_POST['tanggal_kegiatan'];
$isi = $_POST['isi'];


// Periksa apakah ada file foto yang diunggah
if ($_FILES['foto']['size'] > 0) {
    $foto_name = $_FILES['foto']['name'];
    $foto_temp = $_FILES['foto']['tmp_name'];

    // Tentukan lokasi folder untuk menyimpan foto
    $upload_directory = "kegiatan/";

    // Pindahkan foto baru ke folder upload
    $upload_path = $upload_directory . $foto_name;
    move_uploaded_file($foto_temp, $upload_path);

    // Update data data_kegiatan beserta nama_kegiatan file foto ke database
    $query = "UPDATE data_kegiatan SET  nama_kegiatan='$nama_kegiatan', tanggal_kegiatan='$tanggal_kegiatan', isi='$isi', foto='$foto_name' WHERE nama_kegiatan='$nama_kegiatan'";
    } else {
    // Update data data_kegiatan ke database tanpa mengubah foto
    $query = "UPDATE data_kegiatan SET nama_kegiatan='$nama_kegiatan', tanggal_kegiatan='$tanggal_kegiatan', isi='$isi' WHERE nama_kegiatan='$nama_kegiatan'";
    }

if (mysqli_query($con, $query)) {
    header('Location: data_kegiatan.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>

