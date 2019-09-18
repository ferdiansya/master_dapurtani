-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jun 2019 pada 11.26
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
('1558639871', 18, 'Kol', 4, 58000, 'Rp. 58.000', 'Rp. 67.000'),
('1558640177', 18, 'Kol', 2, 29000, 'Rp. 29.000', 'Rp. 38.000'),
('1559034149', 18, 'Kol', 1, 14500, 'Rp. 34.500', 'Rp. 184.500'),
('1559034149', 17, 'Bawang Merah', 1, 20000, 'Rp. 34.500', 'Rp. 184.500'),
('1559035135', 19, 'Cabe Keriting', 1, 13000, 'Rp. 13.000', 'Rp. 22.000'),
('1559119439', 20, 'Kangkung', 1, 2500, 'Rp. 15.500', 'Rp. 165.500'),
('1559119439', 19, 'Cabe Keriting', 1, 13000, 'Rp. 15.500', 'Rp. 165.500'),
('1559122031', 19, 'Cabe Keriting', 1, 13000, 'Rp. 2.000', 'Rp. 11.000'),
('1559187911', 19, 'Cabe Keriting', 1, 13000, 'Rp. normal 13.000  Rp. promo 11.000', 'Rp. 20.000');

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
  `alamat` text NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `pembayaran` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_order`
--

INSERT INTO `t_order` (`id_order`, `id_user`, `tgl_pengiriman`, `nama`, `email`, `no_hp`, `alamat`, `tgl_pesan`, `tgl_bayar`, `status`, `pembayaran`) VALUES
('1558639871', 3, '25 Mey 2019', 'dvssvsdv', 'ferdiansya779@gmail.com', '987654321', 'jhgfdsahgf', '24 Mey 2019', '2019-05-26', '', 'cod'),
('1558640177', 2, '25 Mey 2019', 'ferdiansya', 'ferdiansya777@gmail.com', '085255611480', 'kima 10 biringkanaya', '24 Mey 2019', '2019-05-26', '', 'cod'),
('1559034149', 2, '29 Mey 2019', 'ferdiansya', 'ferdiansya777@gmail.com', '085255611480', 'kima 10 biringkanaya', '28 Mey 2019', '2019-05-31', '', 'bank'),
('1559035135', 2, '29 Mey 2019', 'ferdiansya', 'ferdiansya777@gmail.com', '085255611480', 'kima 10 biringkanaya', '28 Mey 2019', '2019-05-31', '', 'bank'),
('1559119439', 2, '30 Mey 2019', 'ferdiansya', 'ferdiansya777@gmail.com', '085255611480', 'kima 10 biringkanaya', '29 Mey 2019', '2019-06-01', '2', 'cod'),
('1559122031', 2, '30 Mey 2019', 'ferdiansya', 'ferdiansya777@gmail.com', '085255611480', 'kima 10 biringkanaya', '29 Mey 2019', '2019-06-01', '', 'cod'),
('1559187911', 2, '31 Mey 2019', 'ferdiansya', 'ferdiansya777@gmail.com', '085255611480', 'kima 10 biringkanaya', '30 Mey 2019', '2019-06-02', '1', 'cod');

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
(17, 'Bawang Merah', 20000, 0, '500gr', 3, 3, 'gambar1548662968.jpg'),
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
(6, 'dvssvsdv', '5', 'ferdiansya779@gmail.com', '987654321', 'kjhhggfds'),
(7, 'dvssvsdv', '1', 'ferdiansya779@gmail.com', '987654321', 'cjcj'),
(8, 'dvssvsdv', '1', 'ferdiansya779@gmail.com', '987654321', 'jghfgdrf'),
(9, 'dvssvsdv', '2', 'ferdiansya779@gmail.com', '987654321', 'kujyhtgrfedw'),
(10, 'dvssvsdv', '3', 'ferdiansya779@gmail.com', '987654321', 'aesrdhtxf'),
(11, 'dvssvsdv', '4', 'ferdiansya779@gmail.com', '987654321', 'olkujyhtgrf'),
(12, 'dvssvsdv', '5', 'ferdiansya779@gmail.com', '987654321', 'oolikujyhtgrfe'),
(13, 'dvssvsdv', '1', 'ferdiansya779@gmail.com', '987654321', 'dsvvsv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `ktg_pelanggan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `s_pemesanan` enum('diantar','diterima') NOT NULL,
  `reset` varchar(35) NOT NULL,
  `promo` enum('aktif','habis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id_user`, `username`, `fullname`, `ktg_pelanggan`, `email`, `password`, `jk`, `telp`, `alamat`, `status`, `s_pemesanan`, `reset`, `promo`) VALUES
(2, 'ferdiansya777', 'ferdiansya', '', 'ferdiansya777@gmail.com', '$2y$10$90fd8Nufti/siAbcYOpN.eoGJrzR4T38RaAfZU463hquwZ38C491q', 'L', '085255611480', 'kima 10 biringkanaya', 1, 'diantar', '', ''),
(3, 'dvdsv', 'dvssvsdv', 'individu', 'ferdiansya779@gmail.com', '$2y$10$QHsEgDsoq/0./G0zJxm1reNnEG6AGLq1ixCfkILlWyxZ/w6..W1y6', '', '987654321', 'jhgfdsahgf', 1, 'diantar', '', 'habis'),
(6, 'jfghgfgdsa', 'hgmdmgym', 'bisnis', 'ferdyansya778@gmail.com', '$2y$10$dGkUNGzg4I8bvRluk7VcsOmYd138EV/BGWAu4wFPnN1mPBhUiWNLC', 'L', '0987654321', 'kkjgfgdfds', 1, 'diterima', '', 'aktif'),
(7, 'fadly', 'muh dzulfadly', 'individu', 'mdzulfadly.93@gmail.com', '$2y$10$WepA4nUh/NmD7kqj/MSQ0.JHC/ZKYHReQeSvdmmEL9lQgLHO0SXVO', 'L', '085255611480', 'antara', 1, 'diantar', '', ''),
(8, 'ferdiansya', 'kjhgfds', 'individu', 'abc@gmail.com', '$2y$10$nlyzkdlRk.nN9VKYD0IWtuo/ez/n9Lp9lAArcf7vDtwLlcokilTGy', 'L', '98765432', 'lkjhgfdsa', 1, 'diantar', '', ''),
(34, 'qwerty', 'kjhgfd', 'individu', 'ferdiansya776@gmail.com', '$2y$10$lW385ETGNMBhS2yzpUiIHuq8vf9KvTt91Mi56.v9WCzk7Wbw9bqNW', 'L', '09876543', 'hgfd', 1, 'diantar', '', '');

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
(1, 'dt-980'),
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
-- AUTO_INCREMENT for table `t_sayur`
--
ALTER TABLE `t_sayur`
  MODIFY `id_sayur` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `t_s_pemesanan`
--
ALTER TABLE `t_s_pemesanan`
  MODIFY `id_s_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `t_voucher`
--
ALTER TABLE `t_voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
