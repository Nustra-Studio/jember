-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2023 pada 13.58
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori_hotspot`
--

CREATE TABLE `m_kategori_hotspot` (
  `id_kategori_hotspot` int(11) NOT NULL,
  `kd_kategori_hotspot` varchar(10) NOT NULL,
  `nm_kategori_hotspot` varchar(50) NOT NULL,
  `marker` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kategori_hotspot`
--

INSERT INTO `m_kategori_hotspot` (`id_kategori_hotspot`, `kd_kategori_hotspot`, `nm_kategori_hotspot`, `marker`) VALUES
(4, '01', 'Hipertensi', '912001201139571.png'),
(5, '02', 'Epiglotitis', '91200120113957_11.png'),
(6, '03', 'Nasofaringitis Akut (Flu)', '91200120113957_21.png'),
(7, '04', 'Diabetes Mellitus', '91200120113957_31.png'),
(8, '05', 'Sinusitis', '91200120113957_41.png'),
(9, '06', 'Kudis (Skabies)', '91200120113957_51.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kd_kecamatan` varchar(10) NOT NULL,
  `nm_kecamatan` varchar(50) NOT NULL,
  `geojson_kecamatan` varchar(50) NOT NULL,
  `warna_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`id_kecamatan`, `kd_kecamatan`, `nm_kecamatan`, `geojson_kecamatan`, `warna_kecamatan`) VALUES
(1, '36.09.10', 'Arjasa', 'Arjasa2.geojson', '#00ff11'),
(2, '36.09.20', 'Biting', 'Biting2.geojson', '#260080'),
(3, '36.09.30', 'Candijati', 'Candijati1.geojson', '#000000'),
(4, '36.09.40', 'Darsono', 'Darsono1.geojson', '#FF00FF'),
(5, '36.09.50', 'Kamal', 'Kamal1.geojson', '#800000'),
(6, '36.09.60', 'Kemuning Lor', 'Klor1.geojson', '#FF8000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_keluhan`
--

CREATE TABLE `m_keluhan` (
  `id_kategori_keluhan` int(11) NOT NULL,
  `kd_kategori_keluhan` varchar(50) NOT NULL,
  `nm_kategori_keluhan` varchar(100) NOT NULL,
  `marker_keluhan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_keluhan`
--

INSERT INTO `m_keluhan` (`id_kategori_keluhan`, `kd_kategori_keluhan`, `nm_kategori_keluhan`, `marker_keluhan`) VALUES
(2, '01', 'Sakit pada daerah kepala', 'ringan1.png'),
(3, '02', 'Sakit pada daerah gigi & mulut', 'sedang2.png'),
(4, '03', 'Sakit pada area pernafasan', 'parah1.png'),
(5, '04', 'Sakit pada area pendengaran', '11.png'),
(6, '05', 'Sakit pada area dalam', '21.png'),
(7, '06', 'Sakit pada area anggota gerak', '31.png'),
(8, '07', 'Sakit pada area pencernaan', '41.png'),
(9, '08', 'Periksa kehamilan, ibu dan anak', '51.png'),
(10, '09', 'TB Paru', '71.png'),
(11, '10', 'Gangguan kejiwaan', '81.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hotspot`
--

CREATE TABLE `t_hotspot` (
  `id_hotspot` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kategori_hotspot` int(11) NOT NULL,
  `id_kategori_keluhan` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `norm` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `kerja` varchar(100) NOT NULL,
  `kk` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `tanggal` date NOT NULL,
  `polygon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hotspot`
--

INSERT INTO `t_hotspot` (`id_hotspot`, `id_kecamatan`, `id_kategori_hotspot`, `id_kategori_keluhan`, `nik`, `norm`, `nama`, `tgl`, `kerja`, `kk`, `lokasi`, `keterangan`, `lat`, `lng`, `tanggal`, `polygon`) VALUES
(47, 6, 4, 9, 2147483647, '220312', 'Holifah', '2003-07-01', 'IRT', 'Sugianto', 'Kemuninglor, Jember, Jawa Timur, Jawa, 68111, Indo', 'dsn darungan 02/08 kemuninglor', -8.094788, 113.700035, '2022-11-15', ''),
(48, 4, 5, 10, 0, '226116', 'Muhammad nalendra zavier akhtar', '2022-05-13', 'Tidak Bekerja', 'Haryanto', 'Darsono, Jember, Jawa Timur, 68111, Indonesia', 'Dsn teratai 03/01 darsono', -8.101756, 113.720131, '2022-11-15', ''),
(49, 3, 5, 10, 0, '226224', 'Zayna Azkia Maulida', '2021-10-16', 'Tidak Bekerja', 'Andre Pujiono', 'Candijati, Jember, Jawa Timur, Indonesia', 'Dsn krajan barat 02/01 candijati', -8.099547, 113.746925, '2022-11-15', ''),
(50, 6, 4, 9, 2147483647, '227310', 'Antika sari', '2001-01-09', 'IRT', 'Abdullah', 'Kemuninglor, Jember, Jawa Timur, 68111, Indonesia', 'DSN RAYAP 03/01 KEMUNINGLOR', -8.120790, 113.716179, '2022-11-15', ''),
(51, 1, 5, 10, 0, '222109', 'Fauzan aulia D', '1996-10-12', 'Tidak Bekerja', 'Tri Wahyu', 'Arjasa, Jember, Jawa Timur, 68111, Indonesia', 'Dsn krajan 04/03 Arjasa', -8.107024, 113.744179, '2022-11-15', ''),
(52, 2, 5, 10, 2147483647, '224510', 'Giman', '1963-09-17', 'Petani', 'Giman', 'Biting, Jember, Jawa Timur, Jawa, 68111, Indonesia', 'Dsn krajan 01/10 biting', -8.116031, 113.758087, '2022-11-15', ''),
(53, 4, 5, 10, 0, '222517', 'Moch. Taufik Hidayat', '1988-06-24', 'Karyawan Swasta', 'Moch. Taufik Hidayat', 'Darsono, Jember, Jawa Timur, 68111, Indonesia', 'Dsn kopang krajan 03/01 Darsono', -8.090029, 113.710510, '2022-11-14', ''),
(54, 6, 8, 3, 0, '220915', 'Taufiqur ramadhani', '2007-09-25', 'Pelajar', 'Bahlul', 'Kemuninglor, Jember, Jawa Timur, 68111, Indonesia', 'Dsn darungan 04/06 kemuninglor', -8.122149, 113.732155, '2022-11-14', ''),
(55, 5, 7, 6, 0, '228324', 'Muhammad Ibrahim Junaidi', '2021-06-11', 'Tidak Bekerja', 'Junaidi', 'Kamal, Jember, Jawa Timur, Indonesia', 'Dsn klanceng 01/02 kamal', -8.091729, 113.728371, '2022-11-12', ''),
(57, 3, 8, 3, 2147483647, '226204', 'Hosaini', '1975-07-01', 'IRT', 'Sarito', 'Candijati, Jember, Jawa Timur, Indonesia', 'krajan  barat 05/02 candijati', -8.095468, 113.747093, '2022-10-24', ''),
(58, 6, 9, 6, 2147483647, '208223', 'Seniman', '1958-04-03', 'Lansia', 'Seniman', 'Kemuningllor, Jember, Jawa Timur, 68111, Indonesia', 'kemuning lor', -8.106921, 113.700401, '2022-10-22', ''),
(59, 4, 5, 7, 2147483647, '222317', 'Muhammad badri', '1999-10-17', 'Karyawan Swasta', 'Ahmad Yasin', 'Darsono, Jember, Jawa Timur, 68111, Indonesia', 'dusun teratai 02/02 darsono', -8.104815, 113.727341, '2022-10-19', ''),
(60, 3, 5, 8, 0, '222208', 'Ma\'ati', '1993-02-19', 'IRT', 'Ribut', 'Candijati, Jember, Jawa Timur, Indonesia', 'Krajan Timur 01/01 Candijati', -8.091559, 113.754997, '2022-10-18', ''),
(61, 1, 4, 9, 0, '227021', 'Emiril khan muntadz rahman', '2022-09-09', 'Tidak Bekerja', 'Abdur rahman', 'Arjasa, Jember, Jawa Timur, 68111, Indonesia', 'Dsn gumitir 03/16 arjasa', -8.099037, 113.731125, '2022-10-15', ''),
(62, 5, 5, 10, 0, '223611', 'Phurani', '1953-07-01', 'Buruh Tani', 'Samin', 'Kamal, Jember, Jawa Timur, Indonesia', 'duplang 01/05 kamal', -8.086460, 113.726486, '2022-10-12', ''),
(63, 6, 7, 8, 2147483647, '229617', 'Ahmad Suadi', '1982-03-05', 'Karyawan Proyek', 'Ahmad Suadi', 'Kemuningllor, Jember, Jawa Timur, 68111, Indonesia', 'Dsn krajan 902/01 kemuninglor', -8.108384, 113.706734, '2022-10-10', ''),
(64, 6, 6, 4, 0, '223715', 'Rini wulandari', '2003-05-12', 'Mahasiswi', 'M. Zainul Ulum', 'Kemuninglor, Jember, Jawa Timur, Jawa, 68111, Indo', 'Dsn darungan 04/06 kemuninglor', -8.117561, 113.715492, '2022-10-10', ''),
(66, 1, 4, 9, 2147483647, '227108', 'Nuriyatun Hofifah', '1980-07-02', 'IRT', 'Solihin', 'Kamal, Jember, Jawa Timur, 68111, Indonesia', 'Gumitir 03/16 Arjasa', -8.102606, 113.736961, '2022-10-05', ''),
(67, 6, 5, 7, 0, '229704', 'Saiya', '1958-07-01', 'Lansia', 'Saiya', 'Kemuningllor, Jember, Jawa Timur, 68111, Indonesia', 'Darungan 02/05 Kemuninglor ', -8.117561, 113.710510, '2022-10-04', ''),
(68, 2, 6, 2, 0, '229420', 'Muhammad Juhari', '1990-09-02', 'Karyawan Swasta', 'Muhammad Juhari', 'Biting, Jember, Jawa Timur, Jawa, Indonesia', 'Dsn tegallo biting 02/08  Biting', -8.112463, 113.763245, '2022-10-01', ''),
(69, 6, 5, 6, 0, '220117', 'Solikatin', '1970-11-15', 'IRT', 'Solikatin', 'Kemuningllor, Jember, Jawa Timur, 68111, Indonesia', 'Dsn darungan 03/07 kemuninglor', -8.088840, 113.685257, '2022-09-30', ''),
(70, 4, 8, 3, 0, '220420', 'Fitriatul Jannah', '2003-08-30', 'Mahasiswi', 'Marisin', 'Darsono, Jember, Jawa Timur, 68111, Indonesia', 'Dsn gading 05/04 darsono', -8.117051, 113.733353, '2022-09-30', ''),
(71, 3, 7, 6, 2147483647, '220818', 'Sumi', '1962-07-01', 'IRT', 'Subakti', 'JI-210, Candijati, Jember, Jawa Timur, Jawa, 68262', 'Sumberjati 01/01 candijati', -8.097167, 113.753448, '2022-09-22', ''),
(72, 4, 6, 2, 2147483647, '228117', 'Suharti', '1978-06-28', 'IRT', 'Niman Hadi', 'Darsono, Jember, Jawa Timur, Indonesia', 'DSN GADING 01/04 DARSONO', -8.084081, 113.712914, '2022-09-24', ''),
(73, 4, 4, 9, 0, '227706', 'Ina ristiyani', '1980-12-14', 'Guru', 'Adi Sugiyono', 'Darsono, Jember, Jawa Timur, 68111, Indonesia', 'KOPANG KRAJAN 02/01 DARSONO', -8.094618, 113.722191, '2022-09-21', ''),
(74, 6, 4, 9, 0, '222819', 'Izah Afkarima', '1996-05-11', 'IRT', 'Yudik Andiyanto', 'Kemuningllor, Jember, Jawa Timur, 68111, Indonesia', 'Dsn rayap 03/10 kemuninglor', -8.108026, 113.696198, '2022-09-19', ''),
(75, 4, 4, 9, 0, '222909', 'Nur Habibah', '1999-11-08', 'IRT', 'Agus Sugiarto', 'Darsono, Jember, Jawa Timur, 68111, Indonesia', 'Dsn kopang krajan 03/01 darsono', -8.105325, 113.720474, '2022-08-29', ''),
(76, 6, 8, 3, 0, '225511', 'Cahyo nur muhammad', '1997-09-19', 'Wiraswasta', 'Cahyo nur muhammad', 'Kemuninglor, Jember, Jawa Timur, Jawa, 68111, Indo', 'DSN KRAJAN 01/02KEMUNINGLOR', -8.124698, 113.727859, '2022-08-27', ''),
(77, 6, 8, 3, 0, '222416', 'Ainur safitri romadani', '2008-09-28', 'Pelajar', 'Asmad', 'Kemuninglor, Jember, Jawa Timur, 68111, Indonesia', 'Dsn kopang kebun 02/04 kemuninglor', -8.113992, 113.720818, '2022-08-24', ''),
(79, 1, 8, 3, 0, '227407', 'Dinda Agustia Dwi', '2003-08-17', 'Pelajar', 'Abdur Rofik', 'Arjasa, Jember, Jawa Timur, 68111, Indonesia', 'Tegalbogo no 24 01/03 arjasa', -8.106005, 113.739883, '2022-08-19', ''),
(81, 3, 4, 9, 2147483647, '221612', 'Siti komaria', '2004-04-29', 'IRT', 'Ahmad Zaini', 'Candijati, Jember, Jawa Timur, Jawa, 68111, Indone', 'Sumberjati 01/02 candijati', -8.097167, 113.750702, '2022-07-26', ''),
(83, 5, 8, 4, 0, '221207', 'muhammad muchlis', '1998-05-15', 'Karyawan Swasta', 'muhammad muchlis', 'Kamal, Jember, Jawa Timur, Indonesia', 'krajan 02/04 kamal', -8.091559, 113.742973, '2022-07-12', ''),
(86, 3, 6, 4, 2147483647, '220210', 'Kusnawati', '1958-07-01', 'IRT', 'Pak Man', 'Candijati, Jember, Jawa Timur, Jawa, Indonesia', 'krajan timur 03/01 candijati', -8.100057, 113.748985, '2022-06-14', ''),
(87, 1, 4, 9, 2147483647, '194104', 'Endang', '1994-07-11', 'IRT', 'SUJOTO', 'Arjasa, Jember, Jawa Timur, 68111, Indonesia', 'Dsn Calok 01/03 Arjasa', -8.110253, 113.742287, '2023-08-22', ''),
(89, 4, 8, 4, 2147483647, '101020', 'Fian', '2023-07-30', 'Swasta', 'Gracius', 'Darsono, Jember, Jawa Timur, 68111, Indonesia', 'Darsono Jember', -8.101717, 113.716843, '2023-08-30', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `nama`, `username`, `email`, `password`, `level`) VALUES
(2, 12233, 'admin', 'admin', 'admin@gmail.com', 'admin', 'Admin'),
(9, 123354, 'user', 'user', 'user@gmail.com', 'user', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_kategori_hotspot`
--
ALTER TABLE `m_kategori_hotspot`
  ADD PRIMARY KEY (`id_kategori_hotspot`);

--
-- Indeks untuk tabel `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `m_keluhan`
--
ALTER TABLE `m_keluhan`
  ADD PRIMARY KEY (`id_kategori_keluhan`);

--
-- Indeks untuk tabel `t_hotspot`
--
ALTER TABLE `t_hotspot`
  ADD PRIMARY KEY (`id_hotspot`),
  ADD KEY `id_kategori_hotspot` (`id_kategori_hotspot`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kategori_keluhan` (`id_kategori_keluhan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_kategori_hotspot`
--
ALTER TABLE `m_kategori_hotspot`
  MODIFY `id_kategori_hotspot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_keluhan`
--
ALTER TABLE `m_keluhan`
  MODIFY `id_kategori_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_hotspot`
--
ALTER TABLE `t_hotspot`
  MODIFY `id_hotspot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
