-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 14.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sikm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `jabatan`, `nama`, `email`, `nohp`) VALUES
(1, 'admin', '1234', 'Super Admin', 'abdi12', 'abd1231@gmail.com', '08123213322');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_jnskegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `bentuk_kegiatan` varchar(255) NOT NULL,
  `tingkatan` varchar(255) NOT NULL,
  `nilai_kegiatan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id_jnskegiatan`, `nama_kegiatan`, `bentuk_kegiatan`, `tingkatan`, `nilai_kegiatan`) VALUES
(1, 'MBKM', 'Magang', 'Nasional', 20),
(2, 'MBKM', 'KKN / Proyek Desa', 'Nasional', 20),
(3, 'MBKM', 'Mengajar Disekolah', 'Nasional', 20),
(4, 'MBKM', 'PMM / Bela Negara', 'Nasional', 20),
(5, 'MBKM', 'Penelitian / Riset', 'Nasional', 20),
(6, 'MBKM', 'Kegiatan Wirausaha', 'Nasional', 20),
(7, 'MBKM', 'Studi / Proyek Independen', 'Nasional', 20),
(8, 'MBKM', 'Proyek Kemanusiaan', 'Nasional', 20),
(9, 'Program Kreativitas Mahasiswa', 'Riset Eksata', 'Proposal', 10),
(10, 'Program Kreativitas Mahasiswa', 'Riset Eksata', 'Lolos Internal', 20),
(11, 'Program Kreativitas Mahasiswa', 'Riset Eksata', 'Pendanaan', 40),
(12, 'Program Kreativitas Mahasiswa', 'Riset Eksata', 'PIMNAS', 50),
(13, 'Program Kreativitas Mahasiswa', 'Penerapan IPTEK', 'Proposal', 10),
(14, 'Program Kreativitas Mahasiswa', 'Penerapan IPTEK', 'Lolos Internal', 20),
(15, 'Program Kreativitas Mahasiswa', 'Penerapan IPTEK', 'Pendanaan', 40),
(16, 'Program Kreativitas Mahasiswa', 'Penerapan IPTEK', 'PIMNAS', 50),
(17, 'Program Kreativitas Mahasiswa', 'Kewirausahaan', 'Proposal', 10),
(18, 'Program Kreativitas Mahasiswa', 'Kewirausahaan', 'Lolos Internal', 20),
(19, 'Program Kreativitas Mahasiswa', 'Kewirausahaan', 'Pendanaan', 40),
(20, 'Program Kreativitas Mahasiswa', 'Kewirausahaan', 'PIMNAS', 50),
(21, 'Program Kreativitas Mahasiswa', 'Pengabdian Masyarakat', 'Proposal', 10),
(22, 'Program Kreativitas Mahasiswa', 'Pengabdian Masyarakat', 'Lolos Internal', 20),
(23, 'Program Kreativitas Mahasiswa', 'Pengabdian Masyarakat', 'Pendanaan', 40),
(24, 'Program Kreativitas Mahasiswa', 'Pengabdian Masyarakat', 'PIMNAS', 50),
(25, 'Program Kreativitas Mahasiswa', 'Karsa Cipta', 'Proposal', 10),
(26, 'Program Kreativitas Mahasiswa', 'Karsa Cipta', 'Lolos Internal', 20),
(27, 'Program Kreativitas Mahasiswa', 'Karsa Cipta', 'Pendanaan', 40),
(28, 'Program Kreativitas Mahasiswa', 'Karsa Cipta', 'PIMNAS', 50),
(29, 'Program Kreativitas Mahasiswa', 'Karya Inovatif', 'Proposal', 10),
(30, 'Program Kreativitas Mahasiswa', 'Karya Inovatif', 'Lolos Internal', 20),
(31, 'Program Kreativitas Mahasiswa', 'Karya Inovatif', 'Pendanaan', 40),
(32, 'Program Kreativitas Mahasiswa', 'Karya Inovatif', 'PIMNAS', 50),
(33, 'Program Kreativitas Mahasiswa', 'Vidio Gagasan Konstruktif', 'Proposal', 10),
(34, 'Program Kreativitas Mahasiswa', 'Vidio Gagasan Konstruktif', 'Lolos Internal', 20),
(35, 'Program Kreativitas Mahasiswa', 'Vidio Gagasan Konstruktif', 'Pendanaan', 40),
(36, 'Program Kreativitas Mahasiswa', 'Vidio Gagasan Konstruktif', 'PIMNAS', 50),
(37, 'Program Kreativitas Mahasiswa', 'Gagasan Futuristik Tertulis', 'Proposal', 10),
(38, 'Program Kreativitas Mahasiswa', 'Gagasan Futuristik Tertulis', 'Lolos Internal', 20),
(39, 'Program Kreativitas Mahasiswa', 'Gagasan Futuristik Tertulis', 'Pendanaan', 40),
(40, 'Program Kreativitas Mahasiswa', 'Gagasan Futuristik Tertulis', 'PIMNAS', 50),
(41, 'Lomba', 'Lomba Akademik', 'Provinsi', 15),
(42, 'Lomba', 'Lomba Akademik', 'Nasional', 30),
(43, 'Lomba', 'Lomba Akademik', 'Internasional', 50),
(44, 'Lomba', 'Lomba Non Akademik', 'Provinsi', 15),
(45, 'Lomba', 'Lomba Non Akademik', 'Nasional', 30),
(46, 'Lomba', 'Lomba Non Akademik', 'Internasional', 50),
(47, 'Lomba', 'Rekognisi', 'Provinsi', 15),
(48, 'Lomba', 'Rekognisi', 'Nasional', 30),
(49, 'Lomba', 'Rekognisi', 'Internasional', 50),
(50, 'Kegiatan Non Lomba', 'PKKMB', 'Kampus', 20),
(51, 'Kegiatan Non Lomba', 'Menjadi Asisten Lab / Dosen, Asisten Penelitian / Abdimas Dosen', 'Kampus', 25),
(52, 'Kegiatan Non Lomba', 'Relawan Anti Narkoba', 'Kampus', 10),
(53, 'Kegiatan Non Lomba', 'Satgas PKKS', 'Kampus', 10),
(54, 'Kegiatan Non Lomba', 'Penelitian Adhoc ITI', 'Kampus', 10),
(55, 'Organisasi Kemahasiswaan', 'Pengurus Ormawa', 'Anggota', 5),
(56, 'Organisasi Kemahasiswaan', 'Pengurus Ormawa', 'Koordinator', 15),
(57, 'Organisasi Kemahasiswaan', 'Pengurus Ormawa', 'Wakil Ketua / Sekretaris', 20),
(58, 'Organisasi Kemahasiswaan', 'Pengurus Ormawa', 'Ketua', 25),
(59, 'Organisasi Kemahasiswaan', 'Panitian Kegiatan Ormawa', 'Anggota', 5),
(60, 'Organisasi Kemahasiswaan', 'Panitian Kegiatan Ormawa', 'Koordinator / Wakil Ketua / Sekretaris / Bendahara', 10),
(61, 'Organisasi Kemahasiswaan', 'Panitian Kegiatan Ormawa', 'Ketua', 15),
(62, 'Pengembangan Karir', 'Seminar', 'Kegiatan', 5),
(63, 'Pengembangan Karir', 'Workshop Softskill / Hardskill', 'Kegiatan', 10),
(64, 'Pengembangan Karir', 'Anggota Organisasi Profesi', 'Kegiatan', 15),
(65, 'Pengembangan Karir', 'Sertifikasi', 'Kegiatan', 20),
(66, 'Pengembangan Karir', 'Test TOEFL (Nilai minimal 425)', 'Kegiatan', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(5) NOT NULL,
  `nrp` int(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `semester` int(3) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(20) NOT NULL,
  `nilai` int(3) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nrp`, `nama`, `jurusan`, `semester`, `alamat`, `foto`, `tgl_lahir`, `password`, `nilai`, `email`) VALUES
(1, 101210001, 'Bahrudin Akbar Remid', 'Teknik Industri', 2, 'Gunung Sindur Dikit', '1678189237144.jpg', '2003-02-11', 'akbar23', 100, 'bahrudin123@gmail.com'),
(2, 101210002, 'Rivaldi Robby', '', 5, 'Tangerang Kota', 'download222.jpeg', '2003-05-12', 'roby22', 10, 'rivaldict@gmail.com'),
(3, 112190003, 'Renanda Ahmad', 'Teknik Sipil', 7, 'Cimone', 'Hitori Gotoh.jpeg', '2000-08-09', 'ahmad11', 0, 'renanda24@gmail.com'),
(4, 113180003, 'Alfiana Ticux', 'Teknik Industri', 7, 'Tangerang Kota', 'Hitori Gotoh.jpeg', '2000-01-20', 'ticux21', 0, 'tcux55@gmail.com'),
(5, 113190003, 'Ananda Wijaya', 'Teknik Industri', 7, 'Tangerang Selatan', 'Hitori Gotoh.jpeg', '2000-12-15', 'jaya88', 0, 'jayadoble@gmail.com'),
(6, 113220004, 'Asep Sutrisno', 'Teknik Industri', 3, 'Depok', 'Hitori Gotoh.jpeg', '2004-03-12', 'asep24', 0, 'Asep.Sutrisno@gmail.com'),
(7, 103220023, 'Agung Widyodiningrat', 'Teknik Industri Pertanian', 3, 'Depok', 'Hitori Gotoh.jpeg', '2004-05-01', 'agung14', 0, 'Agung.Widyodiningrat@gmail.com'),
(8, 103220011, 'Jidan Catur', 'Teknik Industri Pertanian', 3, 'Cimone', 'Hitori Gotoh.jpeg', '2003-06-22', 'jidan55', 0, 'Jidan.Catur@gmail.com'),
(9, 114220040, 'Rahmat Mustaqim', 'Teknik Elektro', 3, 'Alam Sutera', 'Hitori Gotoh.jpeg', '2004-04-07', 'rahmat32', 0, 'Rahmat.Mustaqim@gmail.com'),
(10, 103220055, 'Jashon Christ', 'Teknik Industri Pertanian', 3, 'Alam Sutera', 'Hitori Gotoh.jpeg', '2004-05-07', 'jashon25', 0, 'JashonChrist@gmail.com'),
(11, 103220087, 'Rizky Akbar', 'Teknik Industri Pertanian', 3, 'Cisauk', 'Hitori Gotoh.jpeg', '2004-08-09', 'taqim99', 0, 'Rizky.Akbar@gmail.com'),
(12, 111220028, 'Wahyu Agung', 'Teknik Kimia', 3, 'Cisauk', 'Hitori Gotoh.jpeg', '2004-03-09', 'wahyu86', 0, 'Wahyu.Agung@gmail.com'),
(13, 112220001, 'Yudha Dwi', 'Teknik Sipil', 3, 'Cisauk', 'Hitori Gotoh.jpeg', '2004-02-03', 'yudha65', 0, 'Yudha.Dwi@gmail.com'),
(14, 110220053, 'Rangga Kusuma', 'Perancangan Wilayah dan Kota', 3, 'Pamulang', 'Hitori Gotoh.jpeg', '2004-01-02', 'kusuma43', 0, 'RanggaKusuma@gmail.com'),
(15, 110220024, 'Joko Santoso', 'Perancangan Wilayah dan Kota', 3, 'Pamulang', 'Hitori Gotoh.jpeg', '2004-02-22', 'toso43', 0, 'Joko8Santoso@gmail.com'),
(16, 110220067, 'Rahmat Hakim', 'Perancangan Wilayah dan Kota', 3, 'Pamulang', 'Hitori Gotoh.jpeg', '2004-05-07', 'hakim25', 0, 'Rahmat1Hakim@gmail.com'),
(17, 109220004, 'Rudy Budiyono', 'Arsitektur', 3, 'Pamulang', 'Hitori Gotoh.jpeg', '2004-05-15', 'yono97', 0, 'Rudy.Budiyono@gmail.com'),
(18, 103220002, 'Syahrudin', 'Teknik Industri Pertanian', 3, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-07-18', 'udin90', 0, 'Syahrudin@gmail.com'),
(19, 110220004, 'Bunga Lestari', 'Perancangan Wilayah dan Kota', 3, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-05-24', 'lestari12', 0, 'Bunga33Lestari@gmail.com'),
(20, 114220004, 'Angel Lyka', 'Teknik Elektro', 3, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-12-23', 'lyka87', 0, 'Angel69Lyka@gmail.com'),
(21, 114220021, 'Diaz Ferdinan', 'Teknik Elektro', 3, 'Cisauk', 'Hitori Gotoh.jpeg', '2004-09-06', 'ferdi66', 0, 'Diaz2Ferdinan@gmail.com'),
(22, 103220034, 'Karina Putri', 'Teknik Industri Pertanian', 3, 'Cimone', 'Hitori Gotoh.jpeg', '2004-03-03', 'putri77', 0, 'Karina1Putri@gmail.com'),
(23, 110220018, 'Agnes Thea', 'Perancangan Wilayah dan Kota', 3, 'Serpong', 'Hitori Gotoh.jpeg', '2004-06-21', 'thea56', 0, 'Agnes2Thea@gmail.com'),
(24, 110200003, 'Audrey Lavina', 'Perancangan Wilayah dan Kota', 7, 'Serpong', 'Hitori Gotoh.jpeg', '2002-02-22', 'lavina32', 0, 'AudreyLavina@gmail.com'),
(25, 114200004, 'Nova Destriani', 'Teknik Elektro', 7, 'Serpong', 'Hitori Gotoh.jpeg', '2002-09-17', 'nova76', 0, 'NovaDestriani@gmail.com'),
(26, 109200004, 'Clarissa Putri', 'Arsitektur', 7, 'Serpong', 'Hitori Gotoh.jpeg', '2002-10-09', 'clarisa00', 0, 'ClarissaPutri@gmail.com'),
(27, 109210004, 'Jasmine Megah', 'Arsitektur', 5, 'Serpong', 'Hitori Gotoh.jpeg', '2003-08-07', 'jasmine33', 0, 'JasmineMegah@gmail.com'),
(28, 114200076, 'Nayla Putri', 'Teknik Elektro', 7, 'Serpong', 'Hitori Gotoh.jpeg', '2002-04-23', 'nayla44', 0, 'NaylaPutri@gmail.com'),
(29, 113210065, 'Fayed Yamani', 'Teknik Industri', 5, 'Serpong', 'Hitori Gotoh.jpeg', '2003-12-12', 'fayed10', 0, 'Fayed66Yamani@gmail.com'),
(30, 114190043, 'Riska Intan Purwoto', 'Teknik Elektro', 6, 'Serpong', 'Hitori Gotoh.jpeg', '2000-06-09', 'intan18', 0, 'RiskaIntanPurwoto55@gmail.com'),
(31, 114220022, 'Mita Iska', 'Teknik Elektro', 3, 'Pamulang', 'Hitori Gotoh.jpeg', '2004-05-18', 'mita14', 0, 'Mita.Iska@gmail.com'),
(32, 110200034, 'Salsabila Cinta Lestari', 'Perancangan Wilayah dan Kota', 6, 'Pamulang', 'Hitori Gotoh.jpeg', '2002-04-06', 'salsa20', 0, 'SalsabilaCintaLestari@gmail.com'),
(33, 115210044, 'Widya Ferdinan', 'Teknik Informatika', 5, 'Pamulang', 'Hitori Gotoh.jpeg', '2002-12-30', 'widya99', 0, 'WidyaFerdinan@gmail.com'),
(34, 115200090, 'Adi Kusuma', 'Teknik Informatika', 6, 'Pamulang', 'Hitori Gotoh.jpeg', '2002-07-26', 'adi27', 0, 'AdiKusuma@gmail.com'),
(35, 115220044, 'Satria Aji Kusumo', 'Teknik Informatika', 3, 'Pamulang', 'Hitori Gotoh.jpeg', '2004-02-13', 'aji25', 0, 'SatriaAji22@gmail.com'),
(36, 115220054, 'Satrio Aji Kusumo', 'Teknik Informatika', 3, 'Pamulang', 'Hitori Gotoh.jpeg', '2004-02-17', 'aji26', 0, 'SatrioKusumo22@gmail.com'),
(37, 115190002, 'Umar Bakri', 'Teknik Informatika', 5, 'Pamulang', 'Hitori Gotoh.jpeg', '2000-01-03', 'umar67', 0, 'UmarBakri@gmail.com'),
(38, 115200024, 'Bima Wasdianto', 'Teknik Informatika', 7, 'Serpong', 'Hitori Gotoh.jpeg', '2002-03-14', 'bima11', 0, 'BimaWasdianto@gmail.com'),
(39, 115200014, 'Raka Sanjaya', 'Teknik Informatika', 7, 'Serpong', 'Hitori Gotoh.jpeg', '2002-09-23', 'raka82', 0, 'RakaSanjaya@gmail.com'),
(40, 113200074, 'Dedy Rahmadi', 'Teknik Industri', 7, 'Serpong', 'Hitori Gotoh.jpeg', '2002-06-12', 'madi25', 0, 'Dedy78Rahmadi@gmail.com'),
(41, 110190003, 'Ahmad Hakim', 'Perancangan Wilayah dan Kota', 5, 'Serpong', 'Hitori Gotoh.jpeg', '2001-01-17', 'hakim14', 0, 'Ahmad.Hakim@gmail.com'),
(42, 115220064, 'Panji Rajali', 'Teknik Informatika', 3, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-08-25', 'panji03', 0, 'Panji.Rajali@gmail.com'),
(43, 113220041, 'Dedy Cahyadi', 'Teknik Industri', 3, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-06-12', 'dedi08', 0, 'Dedy67Cahyadi@gmail.com'),
(44, 114200005, 'Siti Nor Salma', 'Teknik Elektro', 7, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-03-19', 'salma08', 0, 'SitiSalma23@gmail.com'),
(45, 114190008, 'Siti Aisyah', 'Teknik Elektro', 7, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-09-27', 'siti45', 0, 'Siti.Aisyah@gmail.com'),
(46, 113220089, 'Reggie Purba', 'Teknik Industri', 1, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2003-11-09', 'purba03', 0, 'Reggie.Purba@gmail.com'),
(47, 113220032, 'Herlangga Putra', 'Teknik Industri', 1, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2003-10-23', 'putra76', 0, 'HerlanggaPutra@gmail.com'),
(48, 113220026, 'Dinia Saputri', 'Teknik Industri', 3, 'Gunung Sindur', 'Hitori Gotoh.jpeg', '2004-09-16', 'dinia63', 0, 'DiniaSaputri@gmail.com'),
(49, 113220076, 'Anandita Cety', 'Teknik Industri', 3, 'Alam Sutera', 'Hitori Gotoh.jpeg', '2004-10-10', 'cety32', 0, 'Anandita9Cety@gmail.com'),
(50, 113220020, 'Dewi Ferbriani', 'Teknik Industri', 1, 'Alam Sutera', 'Hitori Gotoh.jpeg', '2004-03-26', 'dewi52', 0, 'Dewi.Ferbriani@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `nrp` int(16) DEFAULT NULL,
  `id_jnskegiatan` int(11) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `nilai` int(3) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `nrp`, `id_jnskegiatan`, `status`, `tanggal_pengajuan`, `nilai`, `foto`) VALUES
(1, 101210001, 22, 1, '0000-00-00', 20, 'download__1_-removebg-preview.png'),
(2, 101210001, 1, 1, '0000-00-00', 20, 'download (1).jpeg'),
(3, 101210002, 9, 1, '0000-00-00', 10, 'bocchi-removebg-preview-removebg-preview1.png'),
(4, 101210001, 1, 1, '0000-00-00', 20, 'download (1).jpeg'),
(5, 101210001, 1, 2, '0000-00-00', 20, 'dazai.png'),
(6, 101210001, 50, 2, '2024-01-07', 20, 'Bocchi the rock!  Bocchi peeker Gotou Sticker Anime Stickers Gotou Bocchi Sticker Declas Sticker Sticker by SNArtAnimeShop.jpeg'),
(7, 101210001, 42, 2, '2024-01-07', 30, ''),
(8, 101210001, 9, 2, '2024-01-07', 10, '{The Villainess is gone}.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pka`
--

CREATE TABLE `pka` (
  `idpka` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pka`
--

INSERT INTO `pka` (`idpka`, `jabatan`, `nama`, `username`, `password`, `foto`, `tgl_lahir`, `email`, `alamat`) VALUES
(18, 'Ketua', 'Budiman', 'budiman', 'req', 'Hitori Gotoh.png', '2024-01-01', 'budiman@gmail.com', 'Perumnasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id_jnskegiatan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nrp` (`nrp`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `nrp` (`nrp`),
  ADD KEY `id_jnskegiatan` (`id_jnskegiatan`);

--
-- Indeks untuk tabel `pka`
--
ALTER TABLE `pka`
  ADD PRIMARY KEY (`idpka`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id_jnskegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pka`
--
ALTER TABLE `pka`
  MODIFY `idpka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`nrp`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_jnskegiatan`) REFERENCES `jenis_kegiatan` (`id_jnskegiatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
