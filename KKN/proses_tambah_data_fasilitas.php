<?php
include 'koneksi.php';

function reconnect($con) {
    mysqli_close($con);
    include 'koneksi.php';
    return $con;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Foto_name = isset($_FILES['Foto']['name']) ? $_FILES['Foto']['name'] : null;
    $Foto_temp = isset($_FILES['Foto']['tmp_name']) ? $_FILES['Foto']['tmp_name'] : null;
    $Nama = $_POST['Nama'] ?? null; // Gunakan null coalescing operator
    $Keterangan = $_POST['Keterangan'] ?? null; 
    
    // Memeriksa semua field yang dibutuhkan
    if ($Foto_name && $Foto_temp && $Nama && $Keterangan) {
        $upload_directory = "fasilitas/";
        $upload_path = $upload_directory . basename($Foto_name);

        if (move_uploaded_file($Foto_temp, $upload_path)) {
            // Masukkan data ke database
            $query_insert_data_fasilitas = "INSERT INTO fasilitas (Foto, Nama, Keterangan)
            VALUES ('$Foto_name', '$Nama', '$Keterangan')";

            // Jalankan query setelah memastikan benar
            if (mysqli_query($con, $query_insert_data_fasilitas)) {
                header('Location: pengaturan.php');
                exit(); // Tambahkan exit setelah header untuk menghentikan script
            } else {
                echo "Error: " . $query_insert_data_fasilitas . "<br>" . mysqli_error($con);
            }
        } else {
            echo "<script>alert('Error: Gagal mengunggah Foto.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error: Semua field harus diisi.'); window.history.back();</script>"; // Kembalikan ke halaman sebelumnya
    }
}

mysqli_close($con);
?>
