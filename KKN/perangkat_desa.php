<?php
if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
    echo '<div style="color: green; padding: 10px; background-color: #dff0d8; border: 1px solid #d6e9c6; margin-bottom: 15px;">
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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perangkat Desa</title>
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

        /* Header dengan desain minamaalis */
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

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card a {
            color: #e67e22;
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

        .action-container {
            margin-top: 20px;
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
            <aside>
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
            </aside>

            <main>
                <h2>Data Perangkat Desa</h2>
                <form action="" method="post">
                    <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Nama yang akan dicari.." autocomplete="off">
                    <button type="submit" name="cari">Cari!</button>
                </form>
                <br><br>
                <a href="tambah_perangkat_desa.html" style="text-decoration: none;">
                    <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 5px;">Tambah Data Perangkat Desa</button>
                </a>
                <br><br>
                <div class="dashboard">
                    <?php
                    include 'koneksi.php';

                    if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
                        echo '<div class="message">Data Perangkat  Desa berhasil dihapus.</div>';
                    }
                    
                    // Definisikan fungsi cari
                    function cari($keyword) {
                        global $con;  // Menggunakan variabel global $con
                        $query = "SELECT * FROM perangkat_desa WHERE nama LIKE '%$keyword%'";
                        return mysqli_query($con, $query);
                    }

                    if (isset($_POST["cari"])) {
                        $result = cari($_POST["keyword"]);
                    } else {
                        $query = "SELECT * FROM perangkat_desa";
                        $result = mysqli_query($con, $query);
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='card'>";
                             // Jalur foto
                             $foto_path = 'perangkat_desa/' . $row['foto']; // Perbaiki jalur foto jika diperlukan
                            
                             // Menampilkan foto
                             if (file_exists($foto_path)) {
                                 echo "<img src='" . $foto_path . "' alt='Foto Perangkat Desa' style='width:15%; height:auto; border-radius:10px;'>";
                             } else {
                                 echo "<p>Foto tidak ditemukan.</p>";
                             }
                            echo "<h3>" . $row['nama'] . "</h3>";
                            echo "<p><strong>Jabatan:</strong> " . $row['jabatan'] . "</p>";
                            echo "<p><strong>Pendidikan:</strong> " . $row['pendidikan'] . "</p>";
                            echo "<p><strong>Tanggal Pengangkatan:</strong> " . $row['tanggal_pengangkatan'] . "</p>";
                            echo "<div><a href='edit_perangkat_desa.php?nama=" . $row['nama'] . "'>Edit</a> | <a href='hapus_perangkat_desa.php?nama=" . $row['nama'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data perangkat desa ini?\")'>Hapus</a></div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>Tidak ada data perangkat desa.</p>";
                    }        
                    
                    mysqli_close($con);
                    ?>
                </div>
                <br>
                <div class="action-container">
                    <button onclick="window.print()">Cetak Data Perangkat Desa</button> 
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
