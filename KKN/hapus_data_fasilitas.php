<?php
include 'koneksi.php';

// Pastikan parameter 'Nama' ada pada URL
if (isset($_GET['Nama'])) {
    $Nama = $_GET['Nama'];

    // Query untuk menghapus data fasilitas berdasarkan Nama
    $query = "DELETE FROM fasilitas WHERE Nama = '$Nama'";
    $result = mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if ($result) {
        // Redirect ke halaman data fasilitas dengan pesan sukses
        header("Location: pengaturan.php?status=deleted");
        exit();
    } else {
        // Menampilkan pesan error jika gagal
        echo "Gagal menghapus data fasilitas: " . mysqli_error($con);
    }
} else {
    echo "Nama fasilitas tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($con);
?>
