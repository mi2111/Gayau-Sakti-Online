<?php
session_start(); // Memulai sesi

// Memasukkan koneksi ke database
include 'koneksi.php';

// Memeriksa apakah ada pesan dalam sesi
if (isset($_SESSION['pesan'])) {
    $pesan = $_SESSION['pesan'];
    $alertType = strpos($pesan, "Error") === false ? "success" : "error";

    // Menampilkan alert
    echo "<div class='alert " . ($alertType === "success" ? "alert-success" : "alert-danger") . "'>
            <i class='fas " . ($alertType === "success" ? "fa-check-circle" : "fa-exclamation-circle") . "'></i>
            $pesan
            <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
          </div>";

    // Menghapus pesan dari sesi setelah ditampilkan
    unset($_SESSION['pesan']);
}
?>

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
        .form-container {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .form-group label {
            font-weight: 600;
            color: #343a40;
        }
        .form-control {
            border-radius: 30px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }
        .btn-custom {
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            border-radius: 30px;
            background-color: #007bff;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .form-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-header h2 {
            font-weight: 700;
            color: #343a40;
        }
        .alert {
    padding: 15px;
    color: white;
    opacity: 1;
    transition: opacity 0.6s, transform 0.3s; /* Animation transition */
    margin-bottom: 15px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between; /* Aligns icon and message */
    align-items: center; /* Center vertically */
    position: relative;
    transform: translateY(-10px);
    animation: slideIn 0.5s forwards; /* Animation on show */
}

.alert-success {
    background-color: #4CAF50; /* Green for success */
}

.alert-danger {
    background-color: #f44336; /* Red for error */
}

.alert i {
    margin-right: 10px; /* Space between icon and message */
    font-size: 1.5rem; /* Adjust icon size */
}

.closebtn {
    cursor: pointer;
    font-size: 1.5rem; /* Size of close button */
    margin-left: 15px; /* Space between message and close button */
}

.closebtn:hover {
    color: #fff; /* Change color on hover */
}

@keyframes slideIn {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
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
                        <a href="sistem_kegiatan.php" class="nav-link text-light">Event</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="data_umkm.php" class="nav-link text-light">UMKM</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="fortofolio.php" class="nav-link text-light">Fortofolio</a>
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
    <div class="container mt-5">
        <div class="form-container">
            <div class="form-header">
                <h2>Kontak Kami</h2>
            </div>
            <form action="simpan_pesan.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama_pengirim" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email_pengirim" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea class="form-control" id="pesan" name="isi_pesan" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom">Kirim Pesan</button>
            </form>
        </div>
    </div>
    <br><br>
    <footer>
    <p>&copy; 2024 | Under the LLDIKTI IV Institution</p>
    <p>Created by KKN Tematik Nusantara Team</p>
</footer>

    <!-- Bootstrap and JavaScript Dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBkWUrtyv7ON60Ia8J2JRfA/+QlF7AXW7r9H/zOz" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>