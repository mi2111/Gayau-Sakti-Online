<?php
include 'koneksi.php';

// Mengambil data dari form
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$nomor_telepon = $_POST['nomor_telepon'];
$email = $_POST['email'];
$status = $_POST['status'];
$kewarganegaraan = $_POST['kewarganegaraan'];

// Update data penduduk ke database
$query = "UPDATE data_penduduk SET 
    nik='$nik', 
    nama='$nama', 
    tempat_tanggal_lahir='$tempat_tanggal_lahir', 
    tanggal_lahir='$tanggal_lahir', 
    jenis_kelamin='$jenis_kelamin', 
    alamat='$alamat', 
    nomor_telepon='$nomor_telepon', 
    email='$email', 
    status='$status', 
    kewarganegaraan='$kewarganegaraan' 
    WHERE id='$id'";

if (mysqli_query($con, $query)) {
    header('Location: data_penduduk.php'); // Redirect to the data penduduk page after successful update
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>
