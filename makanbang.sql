-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 07.31
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerifoto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id`    int(11) NOT NULL,
  `admin_name`  varchar(50) NOT NULL,
  `username`    varchar(50) NOT NULL,
  `password`    varchar(100) NOT NULL,
  `admin_telp`  varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(2, 'iqis', 'iqis', 'adminiqis', '082383333063', 'iqis@gmail.com', 'SMKIT IBNUL QAYYIM'),
(3, 'rajie', 'rejes', '1234', '082383333063', 'rajie@gmail.com', 'ANTANG'),
(4, 'fayyadh', 'fayyadh', '123', '082383333063', 'fayyadh@gmail.com', 'PLANETE SUDIANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(14, 'Minuman'),
(15, 'Kue Kering'),
(16, 'Makanan Utama'),
(17, 'Makanan Ringan'),
(18, 'Makanan Tradiosonal'),
(19, 'Olahraga'),
(20, 'Sarapan'),
(21, 'Makanan Sehat'),
(22, 'Makanan Penutup'),
(23, 'Makanan Daerah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id`      int(11) NOT NULL,
  `category_id`   int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id`      int(11) NOT NULL,
  `admin_name`    varchar(100) NOT NULL,
  `image_name`    varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(34, 23, 'Makanan Daerah', 2, 'iqis', 'Pempek Palembang', '', '', 1, ''),
(35, 23, 'Makanan Daerah', 2, 'iqis', 'Soto Betawi', '', '', 1, ''),
(36, 17, 'Makanan Ringan', 3, 'rajie', 'Keripik Kentang', '
Membuat keripik kentang adalah proses yang mengasyikkan. Pertama-tama, kita memilih kentang yang besar dan berkulit halus, yang kemudian dicuci dan dikupas kulitnya dengan hati-hati. Setelah itu, kentang dipotong menjadi irisan tipis menggunakan pisau yang tajam atau mandolin. Tahap selanjutnya adalah merendam irisan kentang dalam air dingin untuk menghilangkan kelebihan pati, sehingga membuat keripik menjadi lebih renyah saat digoreng.', '', 1, ''),
(37, 17, 'Makanan Ringan', 3, 'rajie', 'Jagung Bakar', ' jagung bakar bisa dipanggang langsung di atas bara api atau menggunakan panggangan. Jika menggunakan jagung tongkol, tusukkan jagung pada tusuk sate sebelum dipanggang untuk memudahkan proses membalik jagung saat matang. Proses pemanggangan membutuhkan perhatian agar jagung matang secara merata tanpa terlalu gosong. Saat sudah berwarna kecokelatan yang menarik, jagung bakar siap disajikan.

Jagung bakar memiliki cita rasa yang unik dengan perpaduan manis dari jagung dan gurihnya mentega serta bumbu-bumbu yang digunakan. Camilan ini cocok dinikmati sebagai teman saat berkumpul bersama, pesta kebun, atau piknik keluarga di luar ruangan. Selain itu, jagung bakar juga bisa menjadi hidangan yang menyegarkan di musim panas atau saat acara barbekyu.', '', 1, ''),
(38, 16, 'Makanan Utama', 3, 'rajie', 'Nasi Goreng', 'Makanan khas Indonesia yang terdiri dari nasi yang digoreng bersama bumbu-bumbu seperti bawang putih, bawang merah, cabai, kecap, dan rempah-rempah lainnya. Biasanya disajikan dengan telur mata sapi, ayam, udang, atau daging sapi.', '', 1, ''),
(39, 16, 'Makanan Utama', 3, 'rajie', 'Rendang', 'Makanan khas Indonesia, khususnya dari daerah Minangkabau, yang terdiri dari daging sapi yang dimasak dalam santan dan rempah-rempah hingga empuk dan berbumbu kaya.', '', 1, ''),
(40, 14, 'Minuman', 4, 'fayyadh', 'Milkshake', 'Minuman yang terbuat dari campuran es krim, susu, dan berbagai tambahan seperti buah-buahan, kacang-kacangan, atau sirup rasa. Milkshake biasanya disajikan dalam gelas besar dengan sedotan.', '', 1, ''),
(41, 14, 'Minuman', 4, 'fayyadh', 'Cappuccino', 'Minuman kopi yang terdiri dari espresso, susu panas, dan busa susu. Cappuccino sering dihias dengan bubuk cokelat atau kayu manis di atas busa susunya.', '', 1, ''),
(42, 17, 'Makanan Ringan', 3, 'rajie', 'Bibimbap', 'Makanan khas Korea yang terdiri dari nasi yang disajikan dengan berbagai topping seperti daging (biasanya daging sapi), sayuran, telur, dan saus pedas gochujang.', '', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
