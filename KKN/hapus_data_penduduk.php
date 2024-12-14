<?php
include 'koneksi.php';

// Pastikan parameter 'nik' ada pada URL
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Query untuk menghapus data penduduk berdasarkan NIK
    $query = "DELETE FROM data_penduduk WHERE nik = '$nik'";
    $result = mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if ($result) {
        // Redirect ke halaman data_penduduk.php dengan pesan sukses
        header("Location: data_penduduk.php?status=deleted");
        exit();
    } else {
        // Menampilkan pesan error jika gagal
        echo "Gagal menghapus data penduduk: " . mysqli_error($con);
    }
} else {
    echo "NIK tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($con);
?>
