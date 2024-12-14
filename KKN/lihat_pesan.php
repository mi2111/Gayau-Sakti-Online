<?php
include 'koneksi.php';

if (isset($_GET['nama_pengirim'])) {
    $nama_pengirim = mysqli_real_escape_string($con, $_GET['nama_pengirim']);
    $query = "SELECT * FROM pesan WHERE nama_pengirim='$nama_pengirim'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    // Redirect or handle the case when no nama_pengirim is provided
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Modern</title>
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

        /* Header dengan desain minama_pengirimalis */
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
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Background saat hover */
            transition: background-color 0.3s ease;
        }
        /* Gaya untuk tombol kembali */
.btn-back {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db; /* Warna latar belakang */
    color: white; /* Warna teks */
    border: none; /* Tanpa border */
    border-radius: 5px; /* Sudut melengkung */
    text-decoration: none; /* Menghilangkan garis bawah */
    font-size: 16px; /* Ukuran font */
    transition: background-color 0.3s, transform 0.3s; /* Efek transisi */
}

.btn-back:hover {
    background-color: #2980b9; /* Warna saat hover */
    transform: scale(1.05); /* Efek zoom saat hover */
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
            <aside>
            <ul>
                    <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="pesan.php"><i class="fas fa-users"></i> Data Penduduk</a></li>
                    <li><a href="perangkat_desa.php"><i class="fas fa-user-tie"></i> Perangkat Desa</a></li>
                    <li><a href="data_kegiatan.php"><i class="fas fa-calendar-alt"></i> Sistem Kegiatan</a></li>
                    <li><a href="umkm.php"><i class="fas fa-store"></i> UMKM </a></li>
                    <li><a href="pesan.php"><i class="fas fa-envelope"></i> Pesan</a></li>
                    <li><a href="pengaturan.php"><i class="fas fa-cog"></i> Pengaturan</a></li>
                </ul>
            </aside>

            <main>
                <h2>Pesan Masuk</h2>
                <form action="" method="post">
                    <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Nama yang akan dicari.." autocomplete="off">
                    <button type="submit" name="cari">Cari!</button>
                </form>
            <br>
<body>
    <h1>Detail Pesan</h1>
    <?php if ($data): ?>
        <p><strong>Nama Pengirim:</strong> <?php echo $data['nama_pengirim']; ?></p>
        <p><strong>No Telepon Pengirim:</strong> <?php echo $data['no_telepon']; ?></p>
        <p><strong>Email Pengirim:</strong> <?php echo $data['email']; ?></p>
        <p><strong>Isi Pesan:</strong> <?php echo $data['isi_pesan']; ?></p>
        <p><strong>Tanggal Kirim:</strong> <?php echo $data['tanggal_kirim']; ?></p>
    <?php else: ?>
        <p>Pesan tidak ditemukan.</p>
    <?php endif; ?>

    <!-- Tambahkan opsi Kembali dengan tombol yang lebih modern -->
<br>
<a href="pesan.php" class="btn-back">Kembali ke Pesan</a>

</body>
</html>