<?php
include 'koneksi.php';

// Pastikan parameter 'nama' ada pada URL
if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    // Query untuk menghapus data perangkat desa berdasarkan nama
    $query = "DELETE FROM perangkat_desa WHERE nama = '$nama'";
    $result = mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if ($result) {
        // Redirect ke halaman data perangkat desa dengan pesan sukses
        header("Location: perangkat_desa.php?status=deleted");
        exit();
    } else {
        // Menampilkan pesan error jika gagal
        echo "Gagal menghapus data perangkat desa: " . mysqli_error($con);
    }
} else {
    echo "Nama tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($con);
?>
