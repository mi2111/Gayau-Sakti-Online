<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kuasa</title>
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
    <h1>Form Surat Kuasa</h1>
    <form action="proses_surat_kuasa.php" method="post">
        <table>
            <tr>
                <th>Nomor Surat</th>
                <td><input type="text" name="nomor_surat" required></td>
            </tr>
        <table>    
    <h2>Data Surat Kuasa Pihak 1</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td><input type="text" name="nama_pihak1" required></td>
            </tr>
            <tr>
                <th>NIK</th>
                <td><input type="integer" name="nik_pihak1" required></td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                    <td>
                    <input type="text" name="tempat_lahir_pihak1" placeholder="Tempat Lahir" required>
                    <input type="date" name="tanggal_lahir_pihak1" required>
                </td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td><input type="text" name="pekerjaan_pihak1" required></td>
            </tr>
            <tr>
                <th>Agama</th>
                <td><input type="text" name="agama_pihak1" required></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><input type="text" name="alamat_pihak1" required></td>
            </tr>
        </table>
        <h2>Data Surat Kuasa Pihak 2</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td><input type="text" name="nama_pihak2" required></td>
            </tr>
            <tr>
                <th>NIK</th>
                <td><input type="integer" name="nik_pihak2" required></td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                    <td>
                    <input type="text" name="tempat_lahir_pihak2" placeholder="Tempat Lahir" required>
                    <input type="date" name="tanggal_lahir_pihak2" required>
                </td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td><input type="text" name="pekerjaan_pihak2" required></td>
            </tr>
            <tr>
                <th>Agama</th>
                <td><input type="text" name="agama_pihak2" required></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><input type="text" name="alamat_pihak2" required></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Jaminan Pinjaman</th>
                <td><input type="text" name="jaminan_pinjaman" required></td>
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
                <td><input type="submit" value="Buat Surat Kuasa"></td>
            </tr>
        </table>
    </form>
</body>
</html>
