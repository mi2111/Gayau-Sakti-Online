<?php
include 'koneksi.php'; // Menghubungkan ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Perangkat Desa</title>
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
        td input[type="file"],
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

<h1>Edit Data Perangkat Desa</h1>

<?php
if (isset($_GET['nama'])) {
    // Mengambil nama dari URL
    $nama = $_GET['nama'];
    
    // Query untuk mendapatkan data Perangkat Desa berdasarkan nama
    $query = "SELECT * FROM perangkat_desa WHERE nama = '$nama'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!-- Form untuk mengedit data Perangkat Desa -->
        <form action="proses_edit_perangkat_desa.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>ID</th>
                    <td><input type="text" name="id" value="<?php echo $row['id']; ?>" readonly></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>" required></td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td><input type="text" name="jabatan" value="<?php echo $row['jabatan']; ?>"></td>
                </tr>
                <tr>
                    <th>Pendidikan</th>
                    <td><input type="text" name="pendidikan" value="<?php echo $row['pendidikan']; ?>"></td>
                </tr>
                <tr>
                    <th>Tanggal Pengangkatan</th>
                    <td><input type="date" name="tanggal_pengangkatan" value="<?php echo $row['tanggal_pengangkatan']; ?>"></td>
                </tr>
                <tr>
                <th>Foto</th>
                    <td><input type="file" name="foto" placeholder="Masukkan Foto Anda"></td>
                </tr>
                <tr>
                <th></th>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <?php
    } else {
        echo "Data Perangkat Desa tidak ditemukan.";
    }
} else {
    echo "nama Perangkat Desa tidak ditemukan.";
}
?>

</body>
</html>
