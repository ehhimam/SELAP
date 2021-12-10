-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2021 pada 16.38
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_selap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_futsal` int(11) NOT NULL,
  `id_penyedia` int(10) NOT NULL,
  `judul_lap_futsal` varchar(500) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `jam_buka_tutup` varchar(20) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id_futsal`, `id_penyedia`, `judul_lap_futsal`, `keterangan`, `harga`, `alamat`, `kategori`, `jam_buka_tutup`, `posted_by`, `gambar`) VALUES
(16, 7, 'Lapangan 1 FUTSAL - HAVI FUTSAL', '&lt;p&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;&quot;&gt;Lorem Ipsum&lt;/strong&gt;&lt;span style=&quot;font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;/p&gt;', '100000', 'Jalan Sentarum No 44', 'Futsal', '10.00 - 23.00', 'CARL JHONSON', 'http://localhost/selapku/assets/img/futsal/lap_fitsal.jpg'),
(17, 7, 'Lapangan 1 BADMINTON - HAVI FUTSAL', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '70000', 'Jl. Stasiun Wonokromo No00', 'Badminton', '10.00 - 23.00', 'CARL JHONSON', 'http://localhost/selapku/assets/img/futsal/lap_bad.jpg'),
(19, 8, 'Lapangan 1 FUTSAL - GOR PONTIANAK', '&lt;p&gt;lorem ipsum&lt;/p&gt;', '80000', 'Jl. Stasiun Wonokromo', 'Futsal', '10.00 - 23.00', 'WAHIDIN SULAIMAN', 'http://localhost/selapku/assets/img/futsal/lap_fitsal1.jpg'),
(20, 8, 'LAPANGAN 1 BADMINTON - GOR PONTIANAK', '<p>orerereer</p>', '80000', 'Jl. Stasiun Wonokromo', 'Badminton', '10.00 - 23.00', 'WAHIDIN SULAIMAN', 'http://localhost/selapku/assets/img/futsal/lap_bad3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `jumlah_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `tgl_dibayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_sewa`, `id_penyedia`, `nama_user`, `metode_pembayaran`, `jumlah_pembayaran`, `status_pembayaran`, `bukti_pembayaran`, `tgl_dibayar`) VALUES
(44, 71, 7, 'Emmett Wood', 'OVO/GOPAY/DANA/SHOPEEPAY/LINK-AJA', '300000', 'Lunas!', 'bukti.jpg', '0000-00-00'),
(45, 72, 7, 'Emmett Wood', 'BANK BNI', '210000', 'Lunas!', 'bukti1.jpg', '0000-00-00'),
(47, 74, 7, 'Emmett Wood', 'BANK BNI', '300000', 'Lunas!', '2.jpg', '0000-00-00'),
(49, 77, 7, 'IMAM FATURRAHMAN', 'OVO/GOPAY/DANA/SHOPEEPAY/LINK-AJA', '300000', 'Belum Bayar!', '', '0000-00-00'),
(50, 78, 7, 'Nana Fukada', 'BANK BNI', '300000', 'Lunas!', 'bukti2.jpg', '0000-00-00'),
(52, 80, 8, 'JAMET SUBOYO', 'BANK BNI', '240000', 'Lunas!', 'bukti3.jpg', '0000-00-00'),
(54, 82, 8, 'Emmett Wood', 'OVO/GOPAY/DANA/SHOPEEPAY/LINK-AJA', '240000', 'Lunas!', 'bukti4.jpg', '0000-00-00'),
(55, 83, 8, 'Emmett Wood', 'OVO/GOPAY/DANA/SHOPEEPAY/LINK-AJA', '240000', 'Lunas!', 'bukti5.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jumlah_penarikan` varchar(255) NOT NULL,
  `metode_penarikan` varchar(128) NOT NULL,
  `rekening_penarikan` varchar(255) NOT NULL,
  `status_penarikan` varchar(20) NOT NULL,
  `tgl_penarikan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `id_penyedia`, `nama_lengkap`, `jumlah_penarikan`, `metode_penarikan`, `rekening_penarikan`, `status_penarikan`, `tgl_penarikan`) VALUES
(7, 7, 'UCOK SUBEJO', '500000', 'BANK BNI', '89898989', 'Selesai', 1637944882),
(8, 7, 'UCOK SUBEJO', '500000', 'BANK BNI', '89898989', 'Ditolak', 1638430490),
(9, 8, 'WAHIDIN SULAIMAN', '700000', 'BANK BNI', '89898989', 'Selesai', 1639146014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyedia`
--

CREATE TABLE `penyedia` (
  `id_penyedia` int(11) NOT NULL,
  `nama_penyedia` varchar(128) NOT NULL,
  `email_penyedia` varchar(128) NOT NULL,
  `nohp_penyedia` varchar(20) NOT NULL,
  `alamat_penyedia` text NOT NULL,
  `password_penyedia` varchar(255) NOT NULL,
  `tgl_lahir` text NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyedia`
--

INSERT INTO `penyedia` (`id_penyedia`, `nama_penyedia`, `email_penyedia`, `nohp_penyedia`, `alamat_penyedia`, `password_penyedia`, `tgl_lahir`, `ktp`, `gambar`) VALUES
(7, 'CARL JHONSON', 'penyedia@gmail.com', '12345', 'Jl. Stasiun Wonokromo Nmor 22', '$2y$10$aPeFDRbBfJ1OgTf.tD9psubR9s2EnDik/EzYA.SCELC.dk64aLtVi', '2021-11-24', 'http://localhost/selapku/ktp/epep1.jpg', 'default.jpg'),
(8, 'WAHIDIN SULAIMAN', 'wajidin@gmail.com', '54321', 'Jalan Sentarum No 44', '$2y$10$PrpLazlBV3OywUuqP5o6iefAPHzXjrAQtdqYLmOaQDJ8Th0GcM1Zi', '2021-12-17', 'http://localhost/selapku/ktp/bsi.png', 'epep.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `kategori_lapangan` varchar(20) NOT NULL,
  `alamat_lapangan` text NOT NULL,
  `lama_sewa` varchar(11) NOT NULL,
  `jam_sewa` time NOT NULL,
  `tgl_sewa` date NOT NULL,
  `bayar_sewa` varchar(155) NOT NULL,
  `tgl_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_user`, `id_penyedia`, `id_lapangan`, `nama_lapangan`, `kategori_lapangan`, `alamat_lapangan`, `lama_sewa`, `jam_sewa`, `tgl_sewa`, `bayar_sewa`, `tgl_dibuat`) VALUES
(71, 18, 7, 16, 'Lapangan 1 FUTSAL - HAVI FUTSAL', 'Futsal', 'Jalan Sentarum No 44', '3', '14:37:00', '2021-11-19', '300000', 0),
(72, 18, 7, 17, 'Lapangan 1 BADMINTON - HAVI FUTSAL', 'Badminton', 'Jl. Stasiun Wonokromo No00', '3', '23:42:00', '2021-11-25', '210000', 0),
(74, 18, 7, 16, 'Lapangan 1 FUTSAL - HAVI FUTSAL', 'Futsal', 'Jalan Sentarum No 44', '3', '17:37:00', '2021-12-31', '300000', 0),
(76, 17, 7, 16, 'Lapangan 1 FUTSAL - HAVI FUTSAL', 'Futsal', 'Jalan Sentarum No 44', '3', '12:40:00', '2021-12-16', '300000', 0),
(77, 17, 7, 16, 'Lapangan 1 FUTSAL - HAVI FUTSAL', 'Futsal', 'Jalan Sentarum No 44', '3', '12:40:00', '2021-12-16', '300000', 0),
(78, 20, 7, 16, 'Lapangan 1 FUTSAL - HAVI FUTSAL', 'Futsal', 'Jalan Sentarum No 44', '3', '17:58:00', '2021-12-10', '300000', 0),
(80, 21, 8, 19, 'Lapangan 1 FUTSAL - GOR PONTIANAK', 'Futsal', 'Jl. Stasiun Wonokromo', '3', '22:13:00', '2021-12-10', '240000', 0),
(82, 18, 8, 20, 'LAPANGAN 1 BADMINTON - GOR PONTIANAK', 'Badminton', 'Jl. Stasiun Wonokromo', '3', '21:21:00', '2021-12-29', '240000', 0),
(83, 18, 8, 20, 'LAPANGAN 1 BADMINTON - GOR PONTIANAK', 'Badminton', 'Jl. Stasiun Wonokromo', '3', '21:21:00', '2021-12-24', '240000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `password_user` varchar(128) NOT NULL,
  `email_user` varchar(128) NOT NULL,
  `nohp_user` varchar(15) NOT NULL,
  `alamat_user` text NOT NULL,
  `gambar_user` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password_user`, `email_user`, `nohp_user`, `alamat_user`, `gambar_user`, `role`) VALUES
(17, 'IMAM FATURRAHMAN', '$2y$10$WMAhZdw.GR9ugf8GmzcL2.XS6SB5KoFlKjMJ7yPD57vyMx9ZLSwzG', 'imamkun2708@gmail.com', '089691307158', 'Jalan Menuju Hatimu No 000', 'http://localhost/selapku/assets/img/profile/asuka.jpg', 1),
(18, 'Emmett Wood', '$2y$10$soWr4hWzoDL2oH9Gpeb0gu7xqc8MwbW1c3jPKQLK8tHBjlkavg/V2', 'koronax2021@outlook.com', '12345', '1800 Timbercrest Road', 'default.jpg', 2),
(20, 'Nana Fukada', '$2y$10$XuupvN85mf8U4X0kYrob8uaIcsCquO7Nxzi8arqHulgHd5wmjjwCS', 'nana@gmail.com', '123456', 'Jalan Menuju Hatimu No 000', 'hehe.jpg', 2),
(21, 'JAMET SUBOYO', '$2y$10$nj/21cJxBQs1TBte4eSJc.AucOHEqYlJzEZbn6UD0HqwJKvkDe5O2', 'jamet@mail.com', '1234567', 'Jalan Menuju Hatimu No 000', 'default.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_futsal`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_sewa` (`id_sewa`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indeks untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indeks untuk tabel `penyedia`
--
ALTER TABLE `penyedia`
  ADD PRIMARY KEY (`id_penyedia`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_penyedia` (`id_penyedia`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_futsal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyedia`
--
ALTER TABLE `penyedia`
  MODIFY `id_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia` (`id_penyedia`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `penarikan_ibfk_1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia` (`id_penyedia`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_futsal`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
