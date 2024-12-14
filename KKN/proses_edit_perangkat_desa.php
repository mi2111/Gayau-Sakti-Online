<?php
include 'koneksi.php';

// Mengambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$pendidikan = $_POST['pendidikan'];
$tanggal_pengangkatan = $_POST['tanggal_pengangkatan'];

// Periksa apakah ada file foto yang diunggah
if ($_FILES['foto']['size'] > 0) {
    $foto_name = $_FILES['foto']['name'];
    $foto_temp = $_FILES['foto']['tmp_name'];

    // Tentukan lokasi folder untuk menyimpan foto
    $upload_directory = "perangkat_desa/";

    // Pindahkan foto baru ke folder upload
    $upload_path = $upload_directory . $foto_name;
    move_uploaded_file($foto_temp, $upload_path);

    // Update data perangkat_desa beserta nama file foto ke database
    $query = "UPDATE perangkat_desa SET  id='$id', nama='$nama', jabatan='$jabatan', pendidikan='$pendidikan', tanggal_pengangkatan='$tanggal_pengangkatan', foto='$foto_name' WHERE nama='$nama'";
    } else {
    // Update data perangkat_desa ke database tanpa mengubah foto
    $query = "UPDATE perangkat_desa SET nama='$nama', id='$id', jabatan='$jabatan', pendidikan='$pendidikan', tanggal_pengangkatan='$tanggal_pengangkatan' WHERE nama='$nama'";
    }

if (mysqli_query($con, $query)) {
    header('Location: perangkat_desa.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>

