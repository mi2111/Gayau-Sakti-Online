<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS for modern style -->
    <style>
        /* Navbar Styling with Background Image from Folder */
        .navbar::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Overlay to make text readable */
            z-index: 1;
        }
        .navbar-brand, .nav-link {
            position: relative;
            z-index: 2;
        }
        .navbar-brand img {
            height: 40px; /* Adjust logo height */
            margin-right: 10px; /* Space between logo and text */
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center; /* Align logo and text vertically */
        }
        .nav-link {
            font-size: 1.1rem;
            padding: 0.5rem 1.5rem;
            transition: background-color 0.3s ease;
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        /* Hero Section with Background Image from Folder */
        .hero {
            background: url('images/kkn.jpg') no-repeat center center; /* Updated to jpg */
            background-size: cover;
            color: white;
            height: 90vh;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
        }
        .hero h2 {
            font-size: 3rem;
            font-weight: 700;
        }
        .hero p {
            font-size: 1.5rem;
            margin-top: 1rem;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            background-color: #f8f9fa; /* Light background color */
            padding: 20px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .card-text {
            font-size: 1.1rem;
            line-height: 1.5;
        }

        /* Button Style */
        .btn-custom {
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: white;
            color: #343a40;
        }
        footer {
        background-color: #343a40; /* Warna latar belakang */
        color: white; /* Warna teks */
        text-align: center;
        padding: 2rem 0;
    }
    footer p {
        margin: 0.5rem 0; /* Memberikan jarak pada paragraf */
    }
    </style>
</head>
<body>

    <!-- Navbar with Background Image and Logo -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="images/lampungtengah.png" alt="Logo"> <!-- Replace with your logo file -->
                DESA GAYAU SAKTI
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-light">
                            <i class="fas fa-home"></i> <!-- Font Awesome Home Icon -->
                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="pemerintah_desa.php" class="nav-link text-light">Pemerintah Desa</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="fasilitas.php" class="nav-link text-light">Fasilitas</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="data_umkm.php" class="nav-link text-light">UMKM</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="fortofolio.php" class="nav-link text-light">Fortofolio</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="kontak.php" class="nav-link text-light">Kontak</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="login.php" class="nav-link text-light">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<br><br>
    <?php
include 'koneksi.php'; // Menghubungkan ke database

$query = "SELECT * FROM data_kegiatan"; // Mengambil semua data UMKM dari database
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="row d-flex justify-content-center">'; // Flex container untuk meratakan ke tengah
    while ($row = mysqli_fetch_assoc($result)) {
        $nama_kegiatan = $row['nama_kegiatan'];
        $tanggal_kegiatan = $row['tanggal_kegiatan'];
        $isi = $row['isi'];
        $foto = $row['foto'];
// Mengubah tanggal ke format dengan nama bulan
$tanggalFormat = DateTime::createFromFormat('Y-m-d', $tanggal_kegiatan);
$tanggal_dengan_nama_bulan = $tanggalFormat->format('d F Y'); // Contoh: 10 Oktober 2024

        // Menampilkan setiap data perangkat desa dalam bentuk kartu organisasi
        echo '
        <div class="col-md-3 mb-4">
            <div class="card text-center shadow-sm">
            <p class="card-text">' . $nama_kegiatan . '</p>
                <img src="kegiatan/' . $foto . '" class="card-img-top" alt="' . $nama_kegiatan . '">
                <div class="card-body">
                    <h5 class="card-title">' . $tanggal_dengan_nama_bulan . '</h5>
                    <p class="card-text">' . $isi . '</p>
                </div>
            </div>
        </div>';
    }
    echo '</div>'; // Tutup div row
} else {
    echo '<p>Tidak ada data perangkat desa yang tersedia.</p>';
}
?>
  </div>
  <footer>
    <p>&copy; 2024 | Under the LLDIKTI IV Institution</p>
    <p>Created by KKN Tematik Nusantara Team</p>
</footer>

<!-- Bootstrap requirement jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-JjSmfB3yYx1Bc9C4x50tq84gF50z0u5hlW40Tyy0P/1Yh8H4mX8Pf7eFmZrjVByN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-7mGkQgs9P/Vx4eW1/ep/dNmPox5ukU5c1W6e/I1Fb6vOe+pOhE+gYqQ9Y/5WvMFA" crossorigin="anonymous"></script>

</body>
</html>
