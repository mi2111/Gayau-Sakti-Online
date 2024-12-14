-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2024 pada 10.36
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gayau_sakti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'ami', 'Fahmi RH', 'ramadhanhfahmi@gmail.com', '$2y$10$3kOojG3GwNOgdnSMrPLWd.2h90jdhH0SNGSGOS.x8T3FmlM6flGnG'),
(2, 'admin', 'Admin Gayau Sakti', 'gayausakti@gmail.com', '$2y$10$WpmKF1DDTNP0i94pY./plOD5EV9a97.s9tvAYoqqzSiAVn7s2Ia.q');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kegiatan`
--

CREATE TABLE `data_kegiatan` (
  `nama_kegiatan` text NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kegiatan`
--

INSERT INTO `data_kegiatan` (`nama_kegiatan`, `tanggal_kegiatan`, `isi`, `foto`) VALUES
('Jalan Sehat', '2024-10-14', 'Jalan sehat diselenggarakan oleh kknt', 'kkn.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int(4) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_tanggal_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('Kawin','Belum Kawin','Cerai Hidup','Cerai Mati') NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL
) ;

--
-- Dumping data untuk tabel `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `nik`, `nama`, `jenis_kelamin`, `tempat_tanggal_lahir`, `tanggal_lahir`, `alamat`, `nomor_telepon`, `email`, `status`, `kewarganegaraan`) VALUES
(3, '3207092111030004', 'sa', 'P', 'Ciamis', '2024-10-07', 'Jl Nanggela Rt01/ Rw 04', '0895383176475', 'sa@gmail.com', 'Kawin', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `Foto` varchar(100) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`Foto`, `Nama`, `Keterangan`) VALUES
('spontan.jpg', 'Alun Alun Gayau Sakti', 'Tempat Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fortofolio`
--

CREATE TABLE `fortofolio` (
  `Foto` varchar(100) NOT NULL,
  `Nama` varchar(75) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fortofolio`
--

INSERT INTO `fortofolio` (`Foto`, `Nama`, `Keterangan`) VALUES
('kkn.jpg', 'KKN', 'KKN Tematik Nusantara selama 4 bulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemerintah_desa`
--

CREATE TABLE `pemerintah_desa` (
  `Sejarah` text NOT NULL,
  `Visi` text NOT NULL,
  `Misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemerintah_desa`
--

INSERT INTO `pemerintah_desa` (`Sejarah`, `Visi`, `Misi`) VALUES
('Seperti desa-desa transmigrasi lainnya di daerah Lampung khasanya Lampung Tengah. maka kampung Gayau Sakti pada mulanya juga merupakan hutan belukar.', 'Memajukan Gayau Sakti yang beriligius', 'Mengembangkan wisata religi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `tanggal_pengangkatan` date DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perangkat_desa`
--

INSERT INTO `perangkat_desa` (`id`, `nama`, `jabatan`, `pendidikan`, `tanggal_pengangkatan`, `foto`) VALUES
(3, 'Prabowo', 'Bendahara', 'S3', '2024-11-04', 'prabowo.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `nama_pengirim` varchar(100) NOT NULL,
  `no_telepon` char(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`nama_pengirim`, `no_telepon`, `email`, `isi_pesan`, `tanggal_kirim`) VALUES
('Fahmi', '2147483647', '', 'Wisata Religi nya sangat bagus sekali', '2024-12-14 08:42:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `id` int(11) NOT NULL,
  `nama_umkm` varchar(100) NOT NULL,
  `lokasi` varchar(225) DEFAULT NULL,
  `foto_produk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `umkm`
--

INSERT INTO `umkm` (`id`, `nama_umkm`, `lokasi`, `foto_produk`) VALUES
(1, 'Tiwul MARKOTOP', 'https://maps.app.goo.gl/qQ2xQMNFMk9HgXPT8', 'TIWUL.jpg'),
(2, 'Bakmi WENAKKK', 'https://maps.app.goo.gl/PaJD9GmqpiruiaDK6', 'BAKMI.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
