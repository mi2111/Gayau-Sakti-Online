<?php
include 'koneksi.php'; // Menghubungkan ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wNama Kegiatanth=device-wNama Kegiatanth, initial-scale=1.0">
    <title>Edit Data Kegiatan</title>
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

<h1>Edit Data Fasilitas</h1>

<?php
if (isset($_GET['Nama'])) {
    // Mengambil Nama dari URL dan mencegah SQL injection
    $Nama = mysqli_real_escape_string($con, $_GET['Nama']);
    
    // Query untuk mendapatkan data Kegiatan berdasarkan Nama
    $query = "SELECT * FROM fasilitas WHERE Nama = '$Nama'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!-- Form untuk mengedit data Kegiatan -->
        <form action="proses_edit_data_fasilitas.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Foto</th>
                    <td><input type="file" name="Foto"></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="Nama" value="<?php echo $row['Nama']; ?>"></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td><input type="text" name="Keterangan" value="<?php echo $row['Keterangan']; ?>"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <?php
    } else {
        echo "Data Fasilitas tidak ditemukan.";
    }
} else {
    echo "fasilitas tidak ditemukan.";
}
?>

</body>
</html>