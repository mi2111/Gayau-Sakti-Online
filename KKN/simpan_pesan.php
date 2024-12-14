<?php
session_start();
include 'koneksi.php';

function reconnect($con) {
    mysqli_close($con);
    include 'koneksi.php';
    return $con;
}

// Cek jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pengirim = isset($_POST['nama_pengirim']) ? $con->real_escape_string($_POST['nama_pengirim']) : '';
    $no_telepon = isset($_POST['no_telepon']) ? $con->real_escape_string($_POST['no_telepon']) : '';
    $email = isset($_POST['email']) ? $con->real_escape_string($_POST['email']) : ''; 
    $isi_pesan = isset($_POST['isi_pesan']) ? $con->real_escape_string($_POST['isi_pesan']) : '';

    $sql = "INSERT INTO pesan (nama_pengirim, no_telepon, email, isi_pesan) 
            VALUES ('$nama_pengirim', '$no_telepon', '$email', '$isi_pesan')";

    if ($con->query($sql) === TRUE) {
        $_SESSION['pesan'] = "Pesan berhasil dikirim!";
    } else {
        $_SESSION['pesan'] = "Error: " . $con->error; // Pesan error yang lebih jelas
    }

    $con->close();
    header("Location: kontak.php");
    exit();
}
?>
