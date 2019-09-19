-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Sep 2019 pada 05.11
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapurtani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` tinyint(2) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `fullname`, `password`, `level`) VALUES
(1, 'qwerty', 'Administrator', '$2y$10$qFgUhKz0RbbhAWDmb2mSqe4lGQvIm5xlnnPEtagSQ2OFivIjfAr1.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_order`
--

CREATE TABLE `t_detail_order` (
  `id_order` varchar(10) NOT NULL,
  `id_sayur` int(7) NOT NULL,
  `nama_sayur` varchar(36) NOT NULL,
  `qty` int(4) NOT NULL,
  `biaya` int(9) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail_order`
--

INSERT INTO `t_detail_order` (`id_order`, `id_sayur`, `nama_sayur`, `qty`, `biaya`, `sub`, `total`) VALUES
('1564225732', 18, 'Kol', 1, 14500, 'Rp. 14.500', 'Rp. 23.500'),
('1564228407', 1, 'dgsdgsh', 1, 300000, 'Rp. 302.500', 'Rp. 452.500/bulan'),
('1564228407', 20, 'Kangkung', 1, 2500, 'Rp. 302.500', 'Rp. 452.500/bulan'),
('1564228570', 19, 'Cabe Keriting', 1, 13000, 'Rp. 13.000', 'Rp. 63.000/minggu'),
('1564228696', 20, 'Kangkung', 1, 2500, 'Rp. 2.500', 'Rp. 11.500'),
('1568802151', 19, 'Cabe Keriting', 2, 26000, 'Rp. 28.500', 'Rp. 30.500'),
('1568802151', 20, 'Kangkung', 1, 2500, 'Rp. 28.500', 'Rp. 30.500'),
('1568851555', 19, 'Cabe Keriting', 2, 13000, 'Rp. 28.500', 'Rp. 30.500'),
('1568851555', 20, 'Kangkung', 1, 2500, 'Rp. 28.500', 'Rp. 30.500'),
('1568856122', 19, 'Cabe Keriting', 1, 13000, 'Rp. 613.000', 'Rp. 615.000'),
('1568856122', 1, 'dgsdgsh', 2, 300000, 'Rp. 613.000', 'Rp. 615.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_d_kebutuhan`
--

CREATE TABLE `t_d_kebutuhan` (
  `id_d_kebutuhan` int(11) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_d_kebutuhan`
--

INSERT INTO `t_d_kebutuhan` (`id_d_kebutuhan`, `nm_barang`, `harga`, `satuan`, `stock`, `gambar`) VALUES
(1, 'dgsdgsh', 300000, 'kardus', 6, 'gambar1563067292.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_email`
--

CREATE TABLE `t_email` (
  `id_email` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_email`
--

INSERT INTO `t_email` (`id_email`, `email`) VALUES
('1551763366', 'ferdiansya777@gmail.com'),
('1551880880', 'ferdiansya779@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `id_order` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pengiriman` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `pembayaran` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_order`
--

INSERT INTO `t_order` (`id_order`, `id_user`, `tgl_pengiriman`, `nama`, `email`, `no_hp`, `kecamatan`, `alamat`, `tgl_pesan`, `tgl_bayar`, `status`, `pembayaran`) VALUES
('1564225732', 1, '28 July 2019', 'ferdi ansya', 'ferdiansya777@gmail.com', '1234567890', 'Tamalate', 'kima 10 biringkanaya', '27 July 2019', '2019-07-30', '', 'Bank Rp.23.569'),
('1564228407', 1, '28 July 2019', 'ferdi ansya', 'ferdiansya777@gmail.com', '1234567890', '-- Biring Kanaya --', 'kima 10 biringkanaya', '27 July 2019', '2019-07-30', '', 'Bank Rp.452.594'),
('1564228570', 1, '28 July 2019', 'ferdi ansya', 'ferdiansya777@gmail.com', '1234567890', '-- Biring Kanaya --', 'kima 10 biringkanaya', '27 July 2019', '2019-07-30', '', 'Bank Rp.63.009'),
('1564228696', 1, '28 July 2019', 'ferdi ansya', 'ferdiansya777@gmail.com', '1234567890', '-- Biring Kanaya --', 'kima 10 biringkanaya', '27 July 2019', '2019-07-30', '', 'Bank Rp.11.510'),
('1568802151', 1, '19 September 2019', 'ferdi ansya', 'ferdiansya777@gmail.com', '1234567890', '-- Biring Kanaya --', 'kima 10 biringkanaya', '18 September 2019', '2019-09-21', '', 'cod'),
('1568851555', 1, '20 September 2019', 'ferdi ansya', 'ferdiansya777@gmail.com', '1234567890', '-- Biring Kanaya --', 'kima 10 biringkanaya', '19 September 2019', '2019-09-22', '', 'cod'),
('1568856122', 1, '20 September 2019', 'ferdi ansya', 'ferdiansya777@gmail.com', '1234567890', '-- Biring Kanaya --', 'kima 10 biringkanaya', '19 September 2019', '2019-09-22', '', 'Bank Rp.615.009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sayur`
--

CREATE TABLE `t_sayur` (
  `id_sayur` int(7) NOT NULL,
  `nama_sayur` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `promo` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stock` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sayur`
--

INSERT INTO `t_sayur` (`id_sayur`, `nama_sayur`, `harga`, `promo`, `satuan`, `stock`, `status`, `gambar`) VALUES
(17, 'Bawang Merah', 20000, 0, '500gr', 3, 5, 'gambar1548662968.jpg'),
(18, 'Kol', 14500, 14000, 'kg', 10, 1, 'gambar1548663061.jpg'),
(19, 'Cabe Keriting', 13000, 11000, 'gr', 0, 2, 'gambar1548663112.jpg'),
(20, 'Kangkung', 2500, 0, 'ikat', 0, 1, 'gambar1548944607.jpg'),
(21, 'Kangkung', 3000, 0, 'ikat', 0, 1, 'gambar1548944794.jpg'),
(22, 'Daun Bawang', 6000, 0, 'ikat', 0, 1, 'gambar1548944920.jpg'),
(23, 'Sawi Hijau', 4000, 0, '250kg', 0, 1, 'gambar1548945148.jpg'),
(24, 'Sawi Sendok', 2500, 0, 'pohon', 0, 1, 'gambar1548945550.jpg'),
(25, 'Bayam Hijau', 2500, 0, 'ikat', 0, 1, 'gambar1548945742.jpg'),
(26, 'Selada Hijau', 3500, 0, 'pohon', 0, 1, 'gambar1548945968.jpg'),
(27, 'Selada Merah', 4000, 0, 'pohon', 0, 1, 'gambar1548946019.jpg'),
(28, 'Tomat Organik', 9500, 0, '500gr', 0, 4, 'gambar1548946100.jpg'),
(29, 'Cabe Rawit', 13000, 0, '500gr', 0, 2, 'gambar1548946200.jpg'),
(30, 'Kacang Panjang', 5500, 0, 'ikat', 0, 2, 'gambar1548946252.jpg'),
(31, 'Bawang Putih', 18000, 0, '500gr', 0, 3, 'gambar1548946342.jpg'),
(32, 'Wortel', 14500, 0, '500gr', 0, 3, 'gambar1548946388.jpg'),
(33, 'Jeruk Nipis', 7000, 0, '250gr', 0, 4, 'gambar1548946454.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_s_pemesanan`
--

CREATE TABLE `t_s_pemesanan` (
  `id_s_pemesanan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bintang` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_s_pemesanan`
--

INSERT INTO `t_s_pemesanan` (`id_s_pemesanan`, `nama`, `bintang`, `email`, `telp`, `komentar`) VALUES
(1, 'ferdi', '3', 'ferdiansya777@gmail.com', '1234567890', 'kjhgfdsdfg'),
(2, 'ferdi', '2', 'ferdiansya777@gmail.com', '1234567890', 'hgfds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `blkg` varchar(100) NOT NULL,
  `ktg_pelanggan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `s_pemesanan` enum('diantar','diterima','proses','selesai') NOT NULL,
  `reset` varchar(35) NOT NULL,
  `promo` enum('perbulan','perminggu') NOT NULL,
  `tgl_mulai` varchar(20) NOT NULL,
  `tgl_akhir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id_user`, `username`, `fullname`, `blkg`, `ktg_pelanggan`, `email`, `password`, `jk`, `telp`, `kecamatan`, `alamat`, `status`, `s_pemesanan`, `reset`, `promo`, `tgl_mulai`, `tgl_akhir`) VALUES
(1, 'ferdiansya', 'ferdi', 'ansya', 'individu', 'ferdiansya777@gmail.com', '$2y$10$bEXd7Ailf8C3j66E4guFGuaaRotQfBz.Hf1Y/RZ195mqCUkbQwgvy', 'L', '1234567890', 'Biring Kanaya', 'kima 10 biringkanaya', 1, 'selesai', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_voucher`
--

CREATE TABLE `t_voucher` (
  `id_voucher` int(11) NOT NULL,
  `kd_voucher` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_voucher`
--

INSERT INTO `t_voucher` (`id_voucher`, `kd_voucher`) VALUES
(2, 'dt-900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `t_d_kebutuhan`
--
ALTER TABLE `t_d_kebutuhan`
  ADD PRIMARY KEY (`id_d_kebutuhan`);

--
-- Indexes for table `t_email`
--
ALTER TABLE `t_email`
  ADD PRIMARY KEY (`id_email`);

--
-- Indexes for table `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `t_sayur`
--
ALTER TABLE `t_sayur`
  ADD PRIMARY KEY (`id_sayur`);

--
-- Indexes for table `t_s_pemesanan`
--
ALTER TABLE `t_s_pemesanan`
  ADD PRIMARY KEY (`id_s_pemesanan`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `t_voucher`
--
ALTER TABLE `t_voucher`
  ADD PRIMARY KEY (`id_voucher`,`kd_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_d_kebutuhan`
--
ALTER TABLE `t_d_kebutuhan`
  MODIFY `id_d_kebutuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_sayur`
--
ALTER TABLE `t_sayur`
  MODIFY `id_sayur` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `t_s_pemesanan`
--
ALTER TABLE `t_s_pemesanan`
  MODIFY `id_s_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_voucher`
--
ALTER TABLE `t_voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
