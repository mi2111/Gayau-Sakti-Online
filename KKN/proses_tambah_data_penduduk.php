<?php
include 'koneksi.php';

function reconnect($con) {
    mysqli_close($con);
    include 'koneksi.php';
    return $con;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nik = $_POST['nik']; 
    $nama = $_POST['nama']; 
    $tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir']; 
    $tanggal_lahir = $_POST['tanggal_lahir']; 
    $jenis_kelamin = $_POST['jenis_kelamin']; 
    $alamat = $_POST['alamat']; 
    $nomor_telepon = $_POST['nomor_telepon']; 
    $email = $_POST['email']; 
    $status = $_POST['status']; 
    $kewarganegaraan = $_POST['kewarganegaraan']; 
    
    if ($id && $nik && $nama && $tempat_tanggal_lahir && $tanggal_lahir && $jenis_kelamin && $status) {

        // Periksa apakah id sudah ada
        $query_check_id = "SELECT id FROM data_penduduk WHERE id = '$id'";
        $result_check_id = mysqli_query($con, $query_check_id);

        if (!$result_check_id) {
            $con = reconnect($con);
            $result_check_id = mysqli_query($con, $query_check_id);
        }

        if (mysqli_num_rows($result_check_id) > 0) {
            echo "<script>alert('ID $id sudah ada, gunakan ID yang berbeda.'); window.history.back();</script>";
        } else {
            // Periksa apakah nik sudah ada
            $query_check_nik = "SELECT nik FROM data_penduduk WHERE nik = '$nik'";
            $result_check_nik = mysqli_query($con, $query_check_nik);

            if (!$result_check_nik) {
                $con = reconnect($con);
                $result_check_nik = mysqli_query($con, $query_check_nik);
            }

            if (mysqli_num_rows($result_check_nik) > 0) {
                echo "<script>alert('NIK $nik sudah ada, gunakan NIK yang berbeda.'); window.history.back();</script>";
            } else {
                // Masukkan data ke database
                $query_insert_data_penduduk = "INSERT INTO data_penduduk (id, nik, nama, tempat_tanggal_lahir, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, email, status, kewarganegaraan)
                VALUES ('$id', '$nik', '$nama', '$tempat_tanggal_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$nomor_telepon', '$email', '$status', '$kewarganegaraan')";

                // Debugging: tampilkan query jika diperlukan
                // echo $query_insert_data_penduduk;

                // Jalankan query setelah memastikan benar
                if (mysqli_query($con, $query_insert_data_penduduk)) {
                    header('Location: data_penduduk.php');
                    exit(); // Tambahkan exit setelah header untuk menghentikan script
                } else {
                    echo "Error: " . $query_insert_data_penduduk . "<br>" . mysqli_error($con);
                }
            }
        }
    } else {
        echo "<script>alert('Error: Semua field harus diisi.'); window.history.back();</script>"; // Kembalikan ke halaman sebelumnya
    }
}

mysqli_close($con);
?>
