-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 17.12
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
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `jabatan`, `foto`, `nama`) VALUES
(1, 'admin', 'admin', 'PKA', 'img.jpg', 'abdi');

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
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nrp`, `nama`, `jurusan`, `semester`, `alamat`, `foto`, `tgl_lahir`, `password`, `nilai`) VALUES
(31, 1152200006, 'Lutfi Ekaprima Jannata', 'Teknik Informatika', 3, 'Perumahan Legok Indah', 'Hitori Gotoh.jpeg', '2003-01-22', 'lutfi123', 80);

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
(1, 1152200006, 1, 1, '2024-01-01', 25, ''),
(2, 1152200006, 1, 1, '2024-01-01', 20, ''),
(3, 1152200006, 14, 2, '2024-01-01', 20, ''),
(4, 1152200006, 63, 2, '2024-01-01', 10, ''),
(5, 1152200006, 48, 1, '2024-01-01', 30, '111123.JPG'),
(6, 1152200006, 51, 2, '2024-01-01', 25, '1678189237144.jpg'),
(7, 1152200006, 45, 1, '2024-01-01', 30, 'ab9fc248a1905231ecdafbc963df64c6.png');

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
(10, 'Budi', 'Budianto', 'budi123', 'budi23', '{The Villainess is gone}.jpeg', '2024-01-02', 'budia@gmail.com', 'Perum');

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
  ADD KEY `nilai` (`nilai`);

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
  MODIFY `id_mhs` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pka`
--
ALTER TABLE `pka`
  MODIFY `idpka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
