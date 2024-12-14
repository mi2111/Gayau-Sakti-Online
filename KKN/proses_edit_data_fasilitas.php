<?php
include 'koneksi.php';

// Mengambil data dari form
$Foto = $_POST = $_POST['Foto']
$Nama = $_POST['Nama'];
$Keterangan = $_POST['Keterangan'];

// Periksa apakah ada file Foto yang diunggah
if ($_FILES['Foto']['size'] > 0) {
    $Foto_name = $_FILES['Foto']['name'];
    $Foto_temp = $_FILES['Foto']['tmp_name'];

    // Tentukan lokasi folder untuk menyimpan Foto
    $upload_directory = "fasilitas/";

    // Pindahkan Foto baru ke folder upload
    $upload_path = $upload_directory . $Foto_name;
    move_uploaded_file($Foto_temp, $upload_path);

    // Update data fasilitas beserta Nama file Foto ke database
    $query = "UPDATE fasilitas SET  Foto='$Foto_name', Nama='$Nama', Keterangan='$Keterangan' WHERE Nama='$Nama'";
    } else {
    // Update data fasilitas ke database tanpa mengubah Foto
    $query = "UPDATE fasilitas SET Foto='$Foto_name', Nama='$Nama', Keterangan='$Keterangan', WHERE Nama='$Nama'";
    }

if (mysqli_query($con, $query)) {
    header('Location: pengaturan.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>

