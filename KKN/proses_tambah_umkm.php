<?php
include 'koneksi.php';

function reconnect($con) {
    mysqli_close($con);
    include 'koneksi.php';
    return $con;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null; // Gunakan null coalescing operator
    $nama_umkm = $_POST['nama_umkm'] ?? null; 
    $lokasi = $_POST['lokasi'] ?? null; 
    $foto_name = isset($_FILES['foto_produk']['name']) ? $_FILES['foto_produk']['name'] : null;
    $foto_temp = isset($_FILES['foto_produk']['tmp_name']) ? $_FILES['foto_produk']['tmp_name'] : null;
    
    // Memeriksa semua field yang dibutuhkan
    if ($id && $nama_umkm && $lokasi && $foto_name && $foto_temp) {
        $upload_directory = "umkm/"; // Pastikan folder 'umkm' sudah ada
        $upload_path = $upload_directory . basename($foto_name);

        if (move_uploaded_file($foto_temp, $upload_path)) {
            // Masukkan data ke database
            $query_insert_data_umkm = "INSERT INTO umkm (id, nama_umkm, lokasi, foto_produk)
            VALUES ('$id', '$nama_umkm', '$lokasi', '$foto_name')";

            // Jalankan query setelah memastikan benar
            if (mysqli_query($con, $query_insert_data_umkm)) {
                header('Location: umkm.php');
                exit(); // Tambahkan exit setelah header untuk menghentikan script
            } else {
                echo "Error: " . $query_insert_data_umkm . "<br>" . mysqli_error($con);
            }
        } else {
            echo "<script>alert('Error: Gagal mengunggah foto.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error: Semua field harus diisi.'); window.history.back();</script>"; // Perbaikan pesan error
    }
}

mysqli_close($con);
?>
