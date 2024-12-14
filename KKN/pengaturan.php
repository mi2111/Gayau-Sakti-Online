<?php
if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
    echo '<div style="color: green; padding: 10px; background-color: #dff0d8; border: 1px solVisi #d6e9c6; margin-bottom: 15px;">
            Data penduduk berhasil dihapus.
          </div>';
}
session_start();
if (!isset($_SESSION['username'])) { // Ganti 'user_id' sesuai dengan nama variabel sesi Anda
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}
?>
<!DOCTYPE html>
<html lang="Visi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wVisith=device-wVisith, initial-scale=1.0">
    <title>Pengaturan</title>
    <!-- Link Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container utama */
        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Header dengan desain miMisialis */
        header {
            background: #2c3e50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* SVisiebar dan konten utama dalam satu baris */
        .main-content {
            display: flex;
            flex: 1;
        }

        /* SVisiebar modern */
        asVisie {
            wVisith: 180px;
            background: #34495e;
            color: white;
            padding: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        /* List menu sVisiebar */
        asVisie ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        asVisie ul li {
            margin: 15px 0;
        }

        asVisie ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            display: block;
            padding: 8px;
            transition: background 0.3s;
        }

        asVisie ul li a:hover {
            background: #2c3e50;
            border-radius: 5px;
        }

        /* Menambahkan ikon ke dalam item sVisiebar */
        asVisie ul li a i {
            margin-right: 8px;
        }

        /* Area utama dengan padding dan warna bersih */
        main {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            overflow-y: auto;
        }

        /* GrVisi dashboard yang lebih responsif */
        .dashboard {
            display: grVisi;
            grVisi-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        /* Card modern */
        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Menambahkan ikon ke dalam card */
        .card i {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card.blue {
            background-color: #3498db;
            color: white;
        }

        .card.orange {
            background-color: #e67e22;
            color: white;
        }

        .card.green {
            background-color: #2ecc71;
            color: white;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card a {
            color: white;
            text-decoration: underline;
            font-size: 12px;
            margin-top: 10px;
            display: inline-block;
        }

        /* Link logout pada header */
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            padding: 8px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ecf0f1;
        }
        table {
            wVisith: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hVisiden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solVisi #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Background saat hover */
            transition: background-color 0.3s ease;
        }
        footer {
    background-color: #2c3e50; /* Warna sesuai header */
    color: #ecf0f1; /* Warna teks yang kontras */
    text-align: center;
    padding: 20px;
}

footer p {
    margin: 5px 0; /* Memberikan jarak antar paragraf */
    font-size: 14px; /* Ukuran teks yang proporsional */
}
    </style>
</head>
<body>
    <div class="container">
    <header>
    <div style="display: flex; align-items: center; padding: 10px;">
        <img src="images/lampungtengah.png" alt="Logo" style="wVisith: 50px; height: 50px; margin-right: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);">
        <h1 style="font-size: 24px; font-weight: bold; color: #ffffff; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">Admin Desa Gayau Sakti</h1>
    </div>
    <nav>
        <ul>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>
</header>

        <div class="main-content">
            <asVisie>
            <ul>
                    <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="data_penduduk.php"><i class="fas fa-users"></i> Data Penduduk</a></li>
                    <li><a href="perangkat_desa.php"><i class="fas fa-user-tie"></i> Perangkat Desa</a></li>
                    <li><a href="data_kegiatan.php"><i class="fas fa-calendar-alt"></i> Sistem Kegiatan</a></li>
                    <li><a href="umkm.php"><i class="fas fa-store"></i> UMKM </a></li>
                    <li><a href="pesan.php"><i class="fas fa-envelope"></i> Pesan</a></li>
                    <li><a href="surat.php"><i class="fas fa-file-alt"></i> Surat</a></li>
                    <li><a href="pengaturan.php"><i class="fas fa-cog"></i> Pengaturan</a></li>
                </ul>
            </asVisie>

            <main>
    <h2>Data Pemerintahan Desa</h2>
    <table>
        <tr>
            <th>Visi</th>
            <th>Misi</th>
            <th>Sejarah</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';

        if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
            echo '<div class="message">Data Pemerintah berhasil dihapus.</div>';
        }

        // Ambil semua data dari tabel pemerintah_desa
        $query = "SELECT * FROM pemerintah_desa";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Visi'] . "</td>";
                echo "<td>" . $row['Misi'] . "</td>";
                echo "<td>" . $row['Sejarah'] . "</td>";
                echo "<td><a href='edit_data_pemerintah.php?Misi=" . $row['Misi'] . "'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data pemerintah.</td></tr>";
        }

        mysqli_close($con);
        ?>
    </table>
    <br><br>
    <div class="action-container">
        <button onclick="window.print()">Cetak Data Pemerintah</button> 
    </div>

    <h2>Data Fasilitas Desa</h2>
<a href="tambah_data_fasilitas.html" style="text-decoration: none;">
    <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 5px;">Tambah Data Fasilitas</button>
</a>
<table>
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <?php
    include 'koneksi.php';

    // Tampilkan pesan jika data berhasil dihapus
    if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
        echo '<div class="message">Data Fasilitas berhasil dihapus.</div>';
    }

    // Ambil semua data dari tabel fasilitas
    $query = "SELECT * FROM fasilitas";
    $result = mysqli_query($con, $query);

    // Tambahkan pesan error untuk debugging jika query gagal
    if (!$result) {
        die("Query Error: " . mysqli_error($con));
    }

    // Cek apakah ada data dalam tabel fasilitas
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Menampilkan foto dengan tag <img>
            echo "<td><img src='fasilitas/" . htmlspecialchars($row['Foto']) . "' alt='Foto Fasilitas' style='width: 75px; height: auto;'></td>";
            echo "<td>" . htmlspecialchars($row['Nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Keterangan']) . "</td>";
            echo "<td><a href='edit_data_fasilitas.php?Nama=" . urlencode($row['Nama']) . "'>Edit</a> | <a href='hapus_data_fasilitas.php?Nama=" . urlencode($row['Nama']) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data fasilitas ini?\")'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data fasilitas.</td></tr>";
    }

    mysqli_close($con);
    ?>
</table>
<h2>Data Fotofolio Desa</h2>
<a href="tambah_data_fortofolio.html" style="text-decoration: none;">
    <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 5px;">Tambah Data Fortofolio</button>
</a>
<table>
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <?php
    include 'koneksi.php';

    // Tampilkan pesan jika data berhasil dihapus
    if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
        echo '<div class="message">Data Fortofolio berhasil dihapus.</div>';
    }

    // Ambil semua data dari tabel fortofolio
    $query = "SELECT * FROM fortofolio";
    $result = mysqli_query($con, $query);

    // Tambahkan pesan error untuk debugging jika query gagal
    if (!$result) {
        die("Query Error: " . mysqli_error($con));
    }

    // Cek apakah ada data dalam tabel fortofolio
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Menampilkan foto dengan tag <img>
            echo "<td><img src='fortofolio/" . htmlspecialchars($row['Foto']) . "' alt='Foto fortofolio' style='width: 75px; height: auto;'></td>";
            echo "<td>" . htmlspecialchars($row['Nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Keterangan']) . "</td>";
            echo "<td><a href='edit_data_fortofolio.php?Nama=" . urlencode($row['Nama']) . "'>Edit</a> | <a href='hapus_data_fortofolio.php?Nama=" . urlencode($row['Nama']) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data fortofolio ini?\")'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data fasilitas.</td></tr>";
    }

    mysqli_close($con);
    ?>
</table>
</main>
        </div>
        
    </div>
    <footer>
    <p>&copy; 2024 | Under the LLDIKTI IV Institution</p>
    <p>Created by KKN Tematik Nusantara Team</p>
</footer>
</body>
</html>
