<?php
// Include koneksi database
include('koneksi.php');

session_start();
if (!isset($_SESSION['username'])) { // Ganti 'user_id' sesuai dengan nama variabel sesi Anda
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Initialize variables
$totalPenduduk = 0;
$totalPerangkat = 0;
$totalPesan = 0;
$totalKegiatan = 0;
$totalUMKM = 0;

// Mengambil data jumlah penduduk
$resultPenduduk = $con->query("SELECT COUNT(*) AS total FROM data_penduduk");
if ($resultPenduduk) {
    $rowPenduduk = $resultPenduduk->fetch_assoc();
    $totalPenduduk = $rowPenduduk['total'];
} else {
    echo "Error fetching penduduk data: " . $con->error;
}

// Mengambil data jumlah perangkat desa
$resultPerangkat = $con->query("SELECT COUNT(*) AS total FROM perangkat_desa");
if ($resultPerangkat) {
    $rowPerangkat = $resultPerangkat->fetch_assoc();
    $totalPerangkat = $rowPerangkat['total'];
} else {
    echo "Error fetching perangkat data: " . $con->error;
}

$resultKegiatan = $con->query("SELECT COUNT(*) AS total FROM data_kegiatan"); // Pastikan nama tabel adalah 'pesan'
if ($resultKegiatan) {
    $rowKegiatan = $resultKegiatan->fetch_assoc();
    $totalKegiatan = $rowKegiatan['total']; // Menyimpan total pesan
} else {
    echo "Error fetching Kegiatan data: " . $con->error;
}

$resultUMKM = $con->query("SELECT COUNT(*) AS total FROM umkm"); // Pastikan nama tabel adalah 'pesan'
if ($resultUMKM) {
    $rowUMKM = $resultUMKM->fetch_assoc();
    $totalUMKM = $rowUMKM['total']; // Menyimpan total pesan
} else {
    echo "Error fetching Kegiatan data: " . $con->error;
}

$resultPesan = $con->query("SELECT COUNT(*) AS total FROM pesan"); // Pastikan nama tabel adalah 'pesan'
if ($resultPesan) {
    $rowPesan = $resultPesan->fetch_assoc();
    $totalPesan = $rowPesan['total']; // Menyimpan total pesan
} else {
    echo "Error fetching pesan data: " . $con->error;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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

        /* Header dengan desain minimalis */
        header {
            background: #2c3e50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar dan konten utama dalam satu baris */
        .main-content {
            display: flex;
            flex: 1;
        }

        /* Sidebar modern */
        aside {
            width: 180px;
            background: #34495e;
            color: white;
            padding: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        /* List menu sidebar */
        aside ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        aside ul li {
            margin: 15px 0;
        }

        aside ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            display: block;
            padding: 8px;
            transition: background 0.3s;
        }

        aside ul li a:hover {
            background: #2c3e50;
            border-radius: 5px;
        }

        /* Menambahkan ikon ke dalam item sidebar */
        aside ul li a i {
            margin-right: 8px;
        }

        /* Area utama dengan padding dan warna bersih */
        main {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            overflow-y: auto;
        }

        /* Grid dashboard yang lebih responsif */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
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
            background-color: #3498db; /* Blue */
            color: white;
        }

        .card.orange {
            background-color: #e67e22; /* Orange */
            color: white;
        }

        .card.green {
            background-color: #2ecc71; /* Green */
            color: white;
        }

        .card.red {
            background-color: #e74c3c; /* Red */
            color: white;
        }

        .card.purple {
            background-color: #9b59b6; /* Purple */
            color: white;
        }

        .card.yellow {
            background-color: #f1c40f; /* Yellow */
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
        <img src="images/lampungtengah.png" alt="Logo" style="width: 50px; height: 50px; margin-right: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);">
        <h1 style="font-size: 24px; font-weight: bold; color: #ffffff; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">Admin Desa Gayau Sakti</h1>
    </div>
    <nav>
        <ul>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>
</header>
        <div class="main-content">
        <aside id="sidebar">
                <ul>
                    <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="data_penduduk.php"><i class="fas fa-users"></i> Data Penduduk</a></li>
                    <li><a href="perangkat_desa.php"><i class="fas fa-user-tie"></i> Perangkat Desa</a></li>
                    <li><a href="data_kegiatan.php"><i class="fas fa-calendar-alt"></i> Sistem Kegiatan</a></li>
                    <li><a href="umkm.php"><i class="fas fa-store"></i> UMKM</a></li>
                    <li><a href="pesan.php"><i class="fas fa-envelope"></i> Pesan</a></li>
                    <li><a href="surat.php"><i class="fas fa-file-alt"></i> Surat</a></li>
                    <li><a href="pengaturan.php"><i class="fas fa-cog"></i> Pengaturan</a></li>
                </ul>
            </aside>

            <main>
                <h2>Dashboard Panel Kontrol</h2>
                <div class="dashboard">
    <div class="card orange">
        <i class="fas fa-users"></i>
        <h3>Data Penduduk Desa</h3>
        <p><?php echo $totalPenduduk; ?></p>
        <a href="data_penduduk.php">Info Selengkapnya</a>
    </div>
    <div class="card blue">
        <i class="fas fa-users-cog"></i>
        <h3>Data Perangkat Desa</h3>
        <p><?php echo $totalPerangkat; ?></p>
        <a href="perangkat_desa.php">Info Selengkapnya</a>
    </div>
    <div class="card green">
        <i class="fas fa-file-alt"></i>
        <h3>Kegiatan Desa</h3>
        <p><?php echo $totalKegiatan; ?></p>
        <a href="data_kegiatan.php">Info Selengkapnya</a>
    </div>
    <div class="card red">
        <i class="fas fa-store"></i>
        <h3>UMKM di Desa</h3>
        <p><?php echo $totalUMKM; ?></p>
        <a href="umkm.php">Info Selengkapnya</a>
    </div>
    <div class="card purple">
        <i class="fas fa-envelope"></i>
        <h3>Pesan</h3>
        <p><?php echo $totalPesan; ?></p>
        <a href="pesan.php">Info Selengkapnya</a>
    </div>
</div>

            </main>
        </div>
    </div>
    <footer>
    <p>&copy; 2024 | Under the LLDIKTI IV Institution</p>
    <p>Created by KKN Tematik Nusantara Team</p>
</footer>
</body>
</html>
