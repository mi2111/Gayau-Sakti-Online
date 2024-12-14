<?php
include 'koneksi.php';

// Pastikan parameter 'nama_kegiatan' ada pada URL
if (isset($_GET['nama_kegiatan'])) {
    $nama_kegiatan = $_GET['nama_kegiatan'];

    // Query untuk menghapus data kegiatan berdasarkan nama_kegiatan
    $query = "DELETE FROM data_kegiatan WHERE nama_kegiatan = '$nama_kegiatan'";
    $result = mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if ($result) {
        // Redirect ke halaman data kegiatan dengan pesan sukses
        header("Location: data_kegiatan.php?status=deleted");
        exit();
    } else {
        // Menampilkan pesan error jika gagal
        echo "Gagal menghapus data kegiatan: " . mysqli_error($con);
    }
} else {
    echo "Nama Kegiatan tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($con);
?>
