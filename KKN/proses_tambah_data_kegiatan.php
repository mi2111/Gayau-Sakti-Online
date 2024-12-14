<?php
include 'koneksi.php';

function reconnect($con) {
    mysqli_close($con);
    include 'koneksi.php';
    return $con;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kegiatan = $_POST['nama_kegiatan'] ?? null; // Gunakan null coalescing operator
    $tanggal_kegiatan = $_POST['tanggal_kegiatan'] ?? null; 
    $isi = $_POST['isi'] ?? null; 
    $foto_name = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : null;
    $foto_temp = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : null;
    
    // Memeriksa semua field yang dibutuhkan
    if ($nama_kegiatan && $tanggal_kegiatan && $isi && $foto_name && $foto_temp) {
        $upload_directory = "kegiatan/";
        $upload_path = $upload_directory . basename($foto_name);

        if (move_uploaded_file($foto_temp, $upload_path)) {
            // Masukkan data ke database
            $query_insert_data_kegiatan = "INSERT INTO data_kegiatan (nama_kegiatan, tanggal_kegiatan, isi, foto)
            VALUES ('$nama_kegiatan', '$tanggal_kegiatan', '$isi', '$foto_name')";

            // Jalankan query setelah memastikan benar
            if (mysqli_query($con, $query_insert_data_kegiatan)) {
                header('Location: data_kegiatan.php');
                exit(); // Tambahkan exit setelah header untuk menghentikan script
            } else {
                echo "Error: " . $query_insert_data_kegiatan . "<br>" . mysqli_error($con);
            }
        } else {
            echo "<script>alert('Error: Gagal mengunggah foto.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error: Semua field harus diisi.'); window.history.back();</script>"; // Kembalikan ke halaman sebelumnya
    }
}

mysqli_close($con);
?>
