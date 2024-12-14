<?php
include 'koneksi.php';

// Pastikan parameter 'id' ada pada URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus UMKM berdasarkan id
    $query = "DELETE FROM umkm WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if ($result) {
        // Redirect ke halaman umkm.php dengan pesan sukses
        header("Location: umkm.php?status=deleted");
        exit();
    } else {
        // Menampilkan pesan error jika gagal
        echo "Gagal menghapus UMKM: " . mysqli_error($con);
    }
} else {
    echo "nama umkm tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($con);
?>
