<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS for modern style -->
    <style>
        /* Navbar Styling with Background Image from Folder */
        .navbar {
            background: url('images/coba.jpg') no-repeat center center; /* Background Image */
            background-size: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
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
            background: url('images/gayor.jpg') no-repeat center center; /* Updated to jpg */
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
                        <a href="Pemerintah_desa.php" class="nav-link text-light">Pemerintah Desa</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="fasilitas.php" class="nav-link text-light">Fasilitas</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="kegiatan.php" class="nav-link text-light">Event</a>
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

    <!-- Hero Section with Background Image from Folder -->
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2>Selamat Datang di Desa Gayau Sakti</h2>
            <p class="lead">Kecamatan Seputih Agung Kabupaten Lampung Tengah</p>
        </div>
    </div>

    <footer>
    <p>&copy; 2024 | Under the LLDIKTI IV Institution</p>
    <p>Created by KKN Tematik Nusantara Team</p>
</footer>

    <!-- Bootstrap requirement jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaIN1A2Cg-7RW0I5XoPB6y7amsddFEl3WP/" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+d6pWoa73pFkgKp3MhbM36vleHChP9zzsmXT2x3fRH5iJ7x3f" crossorigin="anonymous"></script>
</body>
</html>
