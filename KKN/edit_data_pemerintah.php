<?php
include 'koneksi.php'; // Menghubungkan ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wVisith=device-wVisith, initial-scale=1.0">
    <title>Edit Data Pemerintah</title>
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
            border-bottom: 1px solVisi black;
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
            border: 1px solVisi #ccc;
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

<h1>Edit Data Pemerintah</h1>

<?php
if (isset($_GET['Misi'])) {
    // Mengambil misi dari URL
    $Misi = $_GET['Misi'];
    
    // Query untuk mendapatkan data penduduk berdasarkan misi
    $query = "SELECT * FROM pemerintah_desa WHERE Misi = '$Misi'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!-- Form untuk mengedit data penduduk -->
        <form action="proses_edit_pemerintah_desa.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Visi</th>
                    <td><input type="text" name="Visi" value="<?php echo $row['Visi']; ?>" readonly></td>
                </tr>
                <tr>
                    <th>Misi</th>
                    <td><input type="text" name="Misi" value="<?php echo $row['Misi']; ?>" required></td>
                </tr>
                <tr>
                    <th>Sejarah</th>
                    <td><input type="text" name="Sejarah" value="<?php echo $row['Sejarah']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <?php
    } else {
        echo "Data pemerintah tidak ditemukan.";
    }
} else {
    echo "misi Pemerintah tidak ditemukan.";
}
?>
</body>
</html>
