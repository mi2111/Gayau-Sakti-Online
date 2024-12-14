<?php
include 'koneksi.php';

function reconnect($con) {
    mysqli_close($con);
    include 'koneksi.php';
    return $con;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null; // Gunakan null coalescing operator
    $nama = $_POST['nama'] ?? null; 
    $jabatan = $_POST['jabatan'] ?? null; 
    $pendidikan = $_POST['pendidikan'] ?? null; 
    $tanggal_pengangkatan = $_POST['tanggal_pengangkatan'] ?? null; 
    $foto_name = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : null;
    $foto_temp = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : null;
    
    // Memeriksa semua field yang dibutuhkan
    if ($id && $nama && $jabatan && $pendidikan && $tanggal_pengangkatan && $foto_name && $foto_temp) {
        $upload_directory = "perangkat_desa/";
        $upload_path = $upload_directory . basename($foto_name);

        if (move_uploaded_file($foto_temp, $upload_path)) {
            // Periksa apakah id sudah ada
            $query_check_id = "SELECT id FROM perangkat_desa WHERE id = '$id'";
            $result_check_id = mysqli_query($con, $query_check_id);

            if (!$result_check_id) {
                $con = reconnect($con);
                $result_check_id = mysqli_query($con, $query_check_id);
            }

            if (mysqli_num_rows($result_check_id) > 0) {
                echo "<script>alert('ID $id sudah ada, gunakan ID yang berbeda.'); window.history.back();</script>";
            } else {
                // Periksa apakah jabatan sudah ada
                $query_check_jabatan = "SELECT jabatan FROM perangkat_desa WHERE jabatan = '$jabatan'";
                $result_check_jabatan = mysqli_query($con, $query_check_jabatan);

                if (!$result_check_jabatan) {
                    $con = reconnect($con);
                    $result_check_jabatan = mysqli_query($con, $query_check_jabatan);
                }

                if (mysqli_num_rows($result_check_jabatan) > 0) {
                    echo "<script>alert('Jabatan $jabatan sudah ada, gunakan Jabatan yang berbeda.'); window.history.back();</script>";
                } else {
                    // Masukkan data ke database
                    $query_insert_perangkat_desa = "INSERT INTO perangkat_desa (id, nama, jabatan, pendidikan, tanggal_pengangkatan, foto)
                    VALUES ('$id', '$nama', '$jabatan', '$pendidikan', '$tanggal_pengangkatan', '$foto_name')";

                    // Jalankan query setelah memastikan benar
                    if (mysqli_query($con, $query_insert_perangkat_desa)) {
                        header('Location: perangkat_desa.php');
                        exit(); // Tambahkan exit setelah header untuk menghentikan script
                    } else {
                        echo "Error: " . $query_insert_perangkat_desa . "<br>" . mysqli_error($con);
                    }
                }
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
