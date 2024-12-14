<?php
include 'koneksi.php'; // Menghubungkan ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penduduk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: black;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgb(179, 211, 218);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid black;
        }
        th {
            text-align: left;
            font-weight: bold;
        }
        td input[type="text"],
        td input[type="date"],
        td input[type="email"],
        td input[type="submit"],
        td input[type="radio"],
        td select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        td input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        td input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Edit Data Penduduk</h1>

<?php
if (isset($_GET['nik'])) {
    // Mengambil NIK dari URL
    $nik = $_GET['nik'];
    
    // Query untuk mendapatkan data penduduk berdasarkan NIK
    $query = "SELECT * FROM data_penduduk WHERE nik = '$nik'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!-- Form untuk mengedit data penduduk -->
        <form action="proses_edit_data_penduduk.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>ID</th>
                    <td><input type="text" name="id" value="<?php echo $row['id']; ?>" readonly></td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td><input type="text" name="nik" value="<?php echo $row['nik']; ?>" required></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                        <input type="radio" name="jenis_kelamin" value="L" <?php if($row['jenis_kelamin'] == 'L') echo 'checked'; ?>> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="P" <?php if($row['jenis_kelamin'] == 'P') echo 'checked'; ?>> Perempuan
                    </td>
                </tr>
                <tr>
                    <th>Tempat Tanggal Lahir</th>
                    <td><input type="text" name="tempat_tanggal_lahir" value="<?php echo $row['tempat_tanggal_lahir']; ?>"></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td><input type="text" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input type="radio" name="status" value="Kawin" <?php if($row['status'] == 'Kawin') echo 'checked'; ?>> Kawin
                        <input type="radio" name="status" value="Belum Kawin" <?php if($row['status'] == 'Belum Kawin') echo 'checked'; ?>> Belum Kawin
                        <input type="radio" name="status" value="Cerai Hidup" <?php if($row['status'] == 'Cerai Hidup') echo 'checked'; ?>> Cerai Hidup
                        <input type="radio" name="status" value="Cerai Mati" <?php if($row['status'] == 'Cerai Mati') echo 'checked'; ?>> Cerai Mati
                    </td>
                </tr>
                <tr>
                    <th>Kewarganegaraan</th>
                    <td><input type="text" name="kewarganegaraan" value="<?php echo $row['kewarganegaraan']; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <?php
    } else {
        echo "Data penduduk tidak ditemukan.";
    }
} else {
    echo "NIK Penduduk tidak ditemukan.";
}
?>

</body>
</html>
