<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Ahli Waris</title>
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
        h2 {
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
        td input[type="time"],
        td input[type="submit"] {
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
    <h1>Form Surat Keterangan Ahli Waris</h1>
    <form action="proses_surat_keterangan_ahli_waris.php" method="post">
        <table>
            <tr>
                <th>Nomor Surat</th>
                <td><input type="text" name="nomor_surat" required></td>
            </tr>
            <tr>
                <th>Nama Pewaris</th>
                <td><input type="text" name="nama_pewaris" required></td>
            </tr>
            <tr>
                <th>Tempat Tinggal Terakhir Pewaris</th>
                <td><input type="text" name="tempat_tinggal_terakhir_pewaris" required></td>
            </tr>
            <tr>
                <th>Tanggal Meninggal</th>
                <td><input type="date" name="tanggal_meninggal" required></td>
            </tr>
            <tr>
                <th>Tempat Meninggal</th>
                <td><input type="text" name="tempat_meninggal" required></td>
            </tr>
            <tr>
                <th>Penyebab Meninggal</th>
                <td><input type="text" name="penyebab_meninggal" required></td>
            </tr>
            <tr>
                <th>Meninggalkan</th>
                <td>
                    <select name="meninggalkan" id="meninggalkan" required>
                        <option value="">-- Pilih --</option>
                        <option value="Ibu">Ibu</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Suami">Suami</option>
                        <option value="Istri">Istri</option>
                    </select>
                    <br><br>
                    <label for="nama_meninggalkan">Nama :</label><br>
                    <textarea name="nama_meninggalkan" id="nama_meninggalkan" rows="4" cols="30" placeholder="Masukkan nama" required></textarea>
                </td>
            </tr>
            <tr>
                <th>Dan Meninggalkan</th>
                <td>
                    <select name="hubungan" id="hubungan" required>
                        <option value="">-- Pilih --</option>
                        <option value="Anak">Anak</option>
                        <option value="Saudara">Saudara</option>
                    </select>
                    <br><br>
                    <label for="nama_hubungan">Nama-nama:</label><br>
                    <textarea name="nama_hubungan" id="nama_hubungan" rows="4" cols="30" placeholder="Masukkan nama-nama, pisahkan dengan koma" required></textarea>
                </td>
            </tr>
            <tr>
                <th>Saksi 1</th>
                <td><input type="text" name="saksi1" required></td>
            </tr>
            <tr>
                <th>Saksi 2</th>
                <td><input type="text" name="saksi2" required></td>
            </tr>
            <tr>
                <th>Tanggal Pembuatan Surat</th>
                <td><input type="date" name="tanggal_pembuatan_surat" required></td>
            </tr>
            <tr>
                <th>Nama Kepala Kampung</th>
                <td><input type="text" name="nama_kepala_kampung" required></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Buat Surat Keterangan Ahli Waris"></td>
            </tr>
        </table>
    </form>
</body>
</html>
